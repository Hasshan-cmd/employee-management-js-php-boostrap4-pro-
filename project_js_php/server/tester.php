<?php

include_once("genderDao.php");
include_once("employeeDao.php");

echo ("Testing");

$gender = GenderDao::getById(2);

echo (json_encode($gender));

//echo ("[{'id':'".$gender->getId()."','name':'".$gender->getName()."'}]");

echo ("<br>");

$genders = GenderDao::getAll();

echo (json_encode($genders));


$employee = EmployeeDao::getById(2);

echo (json_encode($employee));

//echo ("[{'id':'".$employee->getId()."','name':'".$employee->getName()."'}]");

echo ("<br>");

$employees = EmployeeDao::getAll();

echo (json_encode($employees));
