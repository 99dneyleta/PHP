<?php

/**
 * Created by PhpStorm.
 * User: a99dneyleta
 * Date: 3/14/17
 * Time: 8:03 PM
 */
class Client
{
    private $name;
    private $address;
    private $dateOfBirthday;
    private $gender;
    private $credit;
    private $phone;


   /* public function __construct($obj)
    {
        $this->name = obj['name'];
        $this->address = obj['address'];
        $this->dateOfBirthday = obj['birth_date'];
        $this->gender = obj['gender'];
        $this->credit = obj['credit'];
        $this->phone = obj['phone'];
    }*/



    public  function getInfoWithDb($date) {

    }

    public  function  addToDB($str) {
        echo"1";
        $server_name = "localhost";
        $username = "root";
        $password = "";
        $db_name = "Bank";

        $conn = mysqli_connect($server_name, $username, $password, $db_name);
        $sql = "INSERT INTO Client (key, name, address, birth_date, gender, credit, phone)
                 VALUES ('1','ww', 'asd', '21.12.1996', 'male', '24242423')";

        if(mysqli_query($conn,$sql)) {
            echo "OK";
        } else {
            echo "Err" .$sql."<br>".mysqli_error($conn);
        }
        mysqli_close($conn);

    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getDateOfBirthday()
    {
        return $this->dateOfBirthday;
    }

    public function setDateOfBirthday($dateOfBirthday)
    {
        $this->dateOfBirthday = $dateOfBirthday;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getCredit()
    {
        return $this->credit;
    }

    public function setCredit($credit)
    {
        $this->credit = $credit;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function isClient($str) {  //being better
        $array = explode("~", $str);
            if(count($array) == 6 && $str != "")
                return true;
            else
                return false;
    }

    public function parseStrToObj($line) {  //от він
        if(!empty($line)) {
            $separateWords = explode("~", $line);
            $this->name = $separateWords[0];
            $this->address = $separateWords[1];
            $this->dateOfBirthday = $separateWords[2];
            $this->gender = $separateWords[3];
            $this->credit = $separateWords[4];
            $this->phone = $separateWords[5];
            return $this;
        }
    }

    public function addToFile($str) {
        if(!empty($str)) {
            $f = '/Applications/XAMPP/xamppfiles/htdocs/PHP-master/Data/Clients.txt';
            if($f) {
                file_put_contents($f, $str."\n", FILE_APPEND);
                return true;
            }
            else
                return false;
        }
        else
            return false;
    }

    public function __toString()
    {
        return $this->getName()." ".$this->getAddress()." ".$this->dateOfBirthday." ".$this->getGender()." ".$this->getCredit()." ".$this->getPhone();
    }

}