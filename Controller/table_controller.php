<?php
require_once ("../helper.php");
$obj = new Client();
$db = new DB();
$obj->rel($db);

if(isset($isFullTable)) {
    require_once "../View/table.phtml";
   // printTable(getClients(),"defaults");
    printTable($obj->getTable(),"default");
}
else if (isset($isSortTable)) {
    require_once "../View/table.phtml";
    printTable(mSort($obj->getTable()),"mid");
}
else if (isset($isFind)) {
            if(isset($_POST['find']) && strlen(trim($_REQUEST['find'])) > 0){
                require_once "../View/table.phtml";
                printTable(whichClientsHadThisDigit($_POST['find']), "mid") ;
            }

    require_once "../View/inputFind.phtml";
}
