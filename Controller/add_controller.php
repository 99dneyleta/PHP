<?php
$isFullTable = 1;

require_once "../View/header.phtml";
require_once "../View/add.phtml";
include "../Controller/table_controller.php";
include_once "../connectDB.php";
require_once "../Model/Address.php";
require_once "../Model/CreditCard.php";
$obj = new Client();
$db = new DB();
$obj->rel($db);

$address = new Address();
$address->rel($db);





if(isset($_POST['kkk'])) {
    $credit = new CreditCard();
    $credit->rel($db);
    $credit->setNumber($_POST['1'].$_POST['2'].$_POST['3'].$_POST['4']);
    $credit->setCV2($_POST['CV2']);
    $credit->setOwner($obj->setID(30));
    $credit->setOwner($obj->getID());
    $credit->addToDB();
}


if(isset($_POST['addUserBtn'])) {
    $required = array('birthday','gender','credit','phone');
    $error = false;
   /* foreach($required as $field) {
        if (empty($_POST[$field])) {
            $error = true;
        }
    }
*/


    echo $error;
    if(!$error){
       // echo 1;

    $address->setCity(($_POST['city']));
    $address->setStreet($_POST['phone']);
    $address->setHome($_POST['home']);
    $address->setIndex($_POST['phone']);

        $obj->setPhone($_POST['phone']);
        $obj->setDateOfBirthday($_POST['birthday']);
        $obj->setGender($_POST['gender']);
        $obj->setName($_POST['name']);


        $address->setID(1);
        $obj->setAddress(1);
        $obj->setAddressInfo($address);



        #$obj->setID(1);
       $formData = $_POST['name']."~".$_POST['birthday']."~".$_POST['gender']."~".$_POST['phone'];
            if($obj->isClient($formData)) {
                //$obj->addToFile($formData);
           // echo ("23457890-098732");
                $address->addToDB();
                $obj->addToDB();

                //header("https://localhost/PHP-master/Controller/add_controller.php");
            }
    }

    else
        echo("Inputed wrong data");
}



