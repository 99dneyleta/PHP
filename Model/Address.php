<?php

/**
 * Created by PhpStorm.
 * User: a99dneyleta
 * Date: 5/16/17
 * Time: 10:02 AM
 */
class Address extends DBEntity
{
    private $city;
    private $street;
    private $home;
    private $index;

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * @param mixed $home
     */
    public function setHome($home)
    {
        $this->home = $home;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @param mixed $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }



    protected function getProperty() {
        return "(`id`, `city`, `street`, `home`, `index`)";
    }

    protected function getValue() {
        return "(\"".$this->getID()."\", \""
            .$this->getCity()."\", \""
            .$this->getStreet()."\", \""
            .$this->getHome()."\", \""
            .$this->getIndex()."\");";
    }

    public function getTableName()
    {
        return "`address_info`";
    }
}