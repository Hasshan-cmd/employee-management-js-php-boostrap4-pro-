<?php

include_once("employeeDao.php");

$errors = "";

if (!isset($_POST["employee"])) {
    $errors = "Employee not available";
} else {
    $employee = json_decode($_POST["employee"]);
    $result = EmployeeDao::deleteEmployee($employee);
    if ($result != 1) {
        echo("Database error");
    }
}