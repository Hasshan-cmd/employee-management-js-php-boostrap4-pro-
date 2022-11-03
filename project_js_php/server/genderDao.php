<?php
include_once ('db.php');
include_once ('gender.php');

class GenderDao{
    public static function setData($row){
        $gender = new gender();

        $gender->setId($row['id']);
        $gender->setName($row['name']);

        return $gender;
    }
    
    static function getById($id){

        $gender = null;

        $query = "SELECT * FROM gender WHERE id = '$id'";
        $result = CommonDao::getResult($query);

        if ($row = $result->fetch_assoc()){
            $gender = self::setData($row);
        }
        return $gender;
    }

    static function getAll(){

        $genders = array();

        $query = "SELECT * FROM gender";
        $result = CommonDao::getResult($query);

        while ($row = $result->fetch_assoc()){
            $gender = self::setData($row);
            array_push($genders, $gender);
        }
        return $genders;
    }
}
