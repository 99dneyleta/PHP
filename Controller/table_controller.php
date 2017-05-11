<?php
require_once ("../helper.php");


if(isset($isFullTable)) {
    require_once "../View/table.phtml";
    printTable(getClients(),"default");
}
else if (isset($isSortTable)) {
    require_once "../View/table.phtml";
    printTable(mSort(getClients()),"mid");
}
else if (isset($isFind)) {
            if(isset($_POST['find']) && strlen(trim($_REQUEST['find'])) > 0){
                require_once "../View/table.phtml";
                printTable(whichClientsHadThisDigit($_POST['find']), "mid") ;
            }

    require_once "../View/inputFind.phtml";
}
