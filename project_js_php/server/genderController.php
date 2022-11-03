<?php
include_once("genderDao.php");

class GenderController{
    public static function get(){
        $genders = GenderDao::getAll();
        echo (json_encode($genders));
    }
}