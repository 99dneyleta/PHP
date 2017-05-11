<?php
include "Model/Client.php";

function getClients() {
    $count = 0;
    $userDetails = explode("\n", file_get_contents("/Applications/XAMPP/xamppfiles/htdocs/PHP-master/Data/Clients.txt"));
    $rez = array();
    while ($count < count($userDetails) - 1) {
        $client = new Client();
        $obj = $client->parseStrToObj($userDetails[$count]);
        array_push($rez,$obj);
        $count+=1;
    }
    return $rez;
}



function sumAllCredits() {
    $sum = 0;
    $allClients = getClients();
    foreach ($allClients as $obj=>$credit) {
        $sum += $credit->credit;
    }
    return $sum;
}

function cmp($a, $b)
{
    return $a->getPrice() > $b->getPrice();
}

function mSort($array)
{
    usort($array, function ($a, $b) {
        return ($a->getCredit() < $b->getCredit());
    });

    return $array;
}
// universal
function whichClientsHadThisDigit($digit) {
    $rez = array();
    $allClients = getClients();
    foreach ($allClients as $client=>$value) {
        if(strpos($value->getPhone(), $digit) !== false){
            array_push($rez,$value);
        }
    }
    return $rez;
}

function printTable($array, $tablepos) {
    if($tablepos == "mid") {
        $style = 'style="position:relative; margin: 0 auto;"';
    }
    else{
        $style = 'style=""';
    }

    if(!empty($array)) {
        echo "<table $style class='table-fill'>";
        echo "<tr>";
        echo "<th class=\"text-left\">";
        echo "Name";
        echo "</th >";
        echo "<th class=\"text-left\">";
        echo "Address";
        echo "</th>";
        echo "<th class=\"text-left\">";
        echo "Date Of Birthday";
        echo "</th>";
        echo "<th class=\"text-left\">";
        echo "Gender";
        echo "</th>";
        echo "<th class=\"text-left\">";
        echo "Credit";
        echo "</th>";
        echo "<th class=\"text-left\">";
        echo "Phone";
        echo "</th>";
        echo "</tr>";
        foreach ($array as $value) {
                if (!empty($value)) {
                    echo "<tr>";
                    echo "<td class=\"text-left\">";
                    echo $value->getName();
                    echo "</td >";
                    echo "<td class=\"text-left\">";
                    echo $value->getAddress();
                    echo "</td>";
                    echo "<td class=\"text-left\">";
                    echo $value->getDateOfBirthday();
                    echo "</td>";
                    echo "<td class=\"text-left\">";
                    echo $value->getGender();
                    echo "</td>";
                    echo "<td class=\"text-left\">";
                    echo $value->getCredit();
                    echo "</td>";
                    echo "<td class=\"text-left\">";
                    echo $value->getPhone();
                    echo "</td>";
                    echo "</tr>";
                }
        }
        echo "</table>";
    }
}


function printRowForSum() {
    echo "<tr>";
    echo "<td class=\"text-left\">";
    echo "All Sum Of Credits";
    echo "</td >";
    echo "<td class=\"text-left\">";
    echo sumAllCredits();
    echo "</td >";
    echo "</tr>";
}