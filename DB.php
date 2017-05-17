<?php

/**
 * Created by PhpStorm.
 * User: a99dneyleta
 * Date: 5/12/17
 * Time: 10:01 AM
 */
class DB
{
    private $server_name;
    private $username;
    private $password;
    private $db_name;

    public function __construct()
    {
       $this->server_name = "localhost";
       $this->username = "root";
       $this->password = "";
       $this->db_name = "Bank";
    }


    public function link() {
        $conn = mysqli_connect($this->server_name, $this->username, $this->password, $this->db_name);
            if (!$conn) {
                die(" conn failed" . mysqli_connect_error());
            }
        return $conn;
    }



}