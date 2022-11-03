<?php

class Employee
{
    public $id;
    public $name;
    public $age;
    public $nic;
    public $gender;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function getNic()
    {
        return $this->nic;
    }

    public function setNic($nic)
    {
        $this->nic = $nic;
    }

}