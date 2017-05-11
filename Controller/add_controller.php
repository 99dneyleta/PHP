<?php
$isFullTable = 1;
//require_once "../View/header.phtml";
require_once "../View/add.phtml";
include "../Controller/table_controller.php";
include_once "../connectDB.php";

$ob = new Client();
$ob->addToDB("12");


if(isset($_POST['addUserBtn'])) {
    $required = array('Address','birthday','gender','credit','phone');
    $error = false;
    foreach($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
    }

    if(!$error){
        $obj = new Client();
        $formData = $_POST['name']."~".$_POST['Address']."~".$_POST['birthday']."~".$_POST['gender']."~".$_POST['credit']."~".$_POST['phone'];
            if($obj->isClient($formData)) {
                $obj->addToFile($formData);
                header("location: https://localhost/PHP-master/Controller/add_controller.php");
            }
    }

    else
        echo("Inputed wrong data");
}



