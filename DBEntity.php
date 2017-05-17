<?php

/**
 * Created by PhpStorm.
 * User: a99dneyleta
 * Date: 5/12/17
 * Time: 10:51 AM
 */
class DBEntity
{
    private $id;
    private $link;

    public function __construct()
    {
        $this->id = 0;
    }

    public function link($DB) {

    }

    public function rel($db)
    {
        $this->link = $db->link();
    }

    public function addToDB() {
        if($this->isLinked()) {
            $check = $this->link->query("SELECT * FROM".$this->getTableName(). "WHERE `id` = \"".$this->getID()."\"");
            if($check === null || $check->num_rows === 0 ){
                $query = "INSERT INTO ".$this->getTableName()." ".$this->getProperty()."VALUES".$this->getValue();
                $this->link->query($query) or die("insert err: ".$query."<br>".mysqli_error($this->link));
            } else {
                #die("ID already exist");
                $this->id+= 1;
                $this->addToDB();

            }
        }
    }


    public function getTable()
    {
        if ($this->isLinked()) {
            $sql = "SELECT `name`, `birth_date`, `gender`, `phone` FROM" . $this->getTableName();
            $res = $this->getLink()->query($sql);
            $table = array();
                if ($res->num_rows > 0) {
                // output data of each row
                    while ($row = $res->fetch_assoc()) {
                        $client = new Client();
                        $str = $row["name"] . "~" . "~" . $row["birth_date"] .
                          "~".  $row["gender"] . "~"  . "~" . $row["phone"];
                        $client->parseStrToObj($str);
                        array_push($table,$client);
                    }
                } else
                    echo "0 results";
        }
        return $table;
    }


    public function update() {
        $this->delete();
        $this->addToDB();
    }

    public function delete() {
        if($this->isLinked()) {
            $q = "DELETE FROM".$this->getTable()."WHERE `id`=\"".$this->getID()."\"";
            $this->link->query($q) or die("delete err");
        }
    }


    private function isLinked() {
        if(!isset($this->link)) {
            die("Set db");
            return false;
        }

        return true;
    }
    
    
    public function getTableName()
    {
        return "`" . get_called_class() . "`";
    }


    public function getID() {
        return $this->id;
    }


    public function setID($id) {
        $this->id = $id;
    }


    public function getLink() {
        return $this->link;
    }

    



}