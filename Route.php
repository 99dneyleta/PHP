<?php


/**
 * Created by PhpStorm.
 * User: a99dneyleta
 * Date: 3/26/17
 * Time: 4:03 PM
 */

class Route
{
    function start($URL)
    {
        $controllerName = 'index';

        $d = self::getControllerName($URL);
        if($d)
            $controllerName = $d.'_Controller';

        $controllerFile = strtolower($controllerName).'.php';
        $controllerPath = "/Applications/XAMPP/xamppfiles/htdocs/PHP-master/Controller/".$controllerFile;
        if(file_exists($controllerPath)) {
            include ("Controller/".$controllerFile);
        }
        else {
            //later will do exeption
            echo "Error 404";
        }
    }


    function getTableContent($URL) {
        require_once("../Model/AllClients.php");
        $k = self::getControllerName($URL);
        //echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            switch ($k) {

                case "add":
                    $model = new AllClients();
                    $model->printTable($model->getAllClients());
                    break;


                case "sorted":
                    $model = new AllClients();
                    $model->printTable($model->sort($model->getAllClients()));
                    break;
                case "index":
                case "find":
                $model = new AllClients();
                $model->getAllClients();
                echo "<!Doctype html>
<html>
<head>
    <title>Find Number</title>
    <meta charset=\"utf-8\">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
</head>

<body>
<form style=\"  \" action=\"find.php\" method=\"GET\">
    <input style=\"margin-top: 40px; text-align: center; outline-width: 0; width: 59vw;  border-radius: 10px;\" type=\"text\" name=\"findPhone\" placeholder=\"Set part of phone number\">

</form>";
                $model->printTable($model->whichClientsHadThisDigit($_GET['findPhone']));


                    break;
                default:
                    echo "ERROR 404";
        }

    }


    static function getControllerName($URL) {
        $routes = explode('/', $URL);
        $routes[5] = explode('.', $routes[5]);
        if(!empty($routes[5])) {
            $controllerName = $routes[5][0];
            return $controllerName;
        }
        else
            return 0;
    }

}