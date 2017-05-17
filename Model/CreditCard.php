<?php

/**
 * Created by PhpStorm.
 * User: a99dneyleta
 * Date: 5/16/17
 * Time: 9:57 AM
 */
class CreditCard extends DBEntity
{
    private $number;
    private $CV2;
    private $pin;
    private $type;
    private $balance;
    private $currency;
    private $owner;
    private $credit;

    /**
     * @return mixed
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * @param mixed $credit
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;
    }



    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getCV2()
    {
        return $this->CV2;
    }

    /**
     * @param mixed $CV2
     */
    public function setCV2($CV2)
    {
        $this->CV2 = $CV2;
    }

    /**
     * @return mixed
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param mixed $pin
     */
    public function setPin($pin)
    {
        $this->pin = $pin;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }





    protected function getProperty() {
        return "(`id`, `number`, `CV2`,  `owner`)";
    }

    protected function getValue() {
        return "(\"".$this->getID()."\", \""
            .$this->getNumber()."\", \""
            .$this->getCV2()."\", \""
            //.$this->getPin()."\", \""
            //.$this->getType()."\", \""
            //.$this->getBalance()."\", \""
            //.$this->getCurrency()."\", \""
            .$this->getOwner()."\");";
            //.$this->getCredit()."\")";
    }

    public function getTableName()
    {
        return "`credit_card`";
    }
}

