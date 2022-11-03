<?php

include_once("employeeDao.php");

class EmployeeController
{
    public static function get()
    {
        $hasName = !empty($_GET['name']);
        $hasGender = !empty($_GET['gender']);

        if ($hasName) {
            $name = $_GET['name'];
        }
        if ($hasGender) {
            $gender = $_GET['gender'];
        }

        $employee = array();

        if (!$hasName && !$hasGender) {
            $employee = employeeDao::getAll();
        }
        if ($hasName && !$hasGender) {
            $employee = employeeDao::getByName($name);
        }
        if (!$hasName && $hasGender) {
            $employee = employeeDao::getByGender($gender);
        }
        if ($hasName && $hasGender) {
            $employee = employeeDao::getByNameAndGender($name, $gender);
        }

        echo(json_encode($employee));
    }

    public static function post($employee)
    {
        $errors = "";

        if ($employee === null) {
            $errors = "Employee not available";
        } else {
            if (!(isset($employee->name)) && (isset($employee->age)) && (isset($employee->nic)) && (isset($employee->gender))) {
                $errors = "Employee data missing";
            } else {
                if (!preg_match("/^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$/", $employee->name)) {
                    $errors = $errors . "Name is invalid\n";
                }
                if (!preg_match("/^([1-1][8-9]|[2-4][0-9]|50)$/", $employee->age)) {
                    $errors = $errors . "Age is invalid\n";
                }
                if (!preg_match("/^(([0-9]{12})|([0-9]{9}[vVxX]))$/", $employee->nic)) {
                    $errors = $errors . "NIC is invalid\n";
                }
                if ($employee->gender == null) {
                    $errors = $errors . "Gender not selected";
                }
            }
        }
        if ($errors != "") {
            echo($errors);
        } else {
            if (EmployeeDao::getByNic($employee->nic) != null) {
                echo("This NIC is already excisted");
            } else {
                $result = EmployeeDao::insertEmployee($employee);
                if ($result != 1) {
                    echo("Database error");
                }
            }
        }
    }

    public static function put($id, $employee)
    {
        $errors = "";

        if ($employee === null) {
            $errors = "Employee not available";
        } else {
            if (!(isset($employee->name)) && (isset($employee->age)) && (isset($employee->nic)) && (isset($employee->gender))) {
                $errors = "Employee data missing";
            } else {
                if (!preg_match("/^[a-zA-Z]{4,}(?: [a-zA-Z]+){0,2}$/", $employee->name)) {
                    $errors = $errors . "Name is invalid\n";
                }
                if (!preg_match("/^([1-1][8-9]|[2-4][0-9]|50)$/", $employee->age)) {
                    $errors = $errors . "Age is invalid\n";
                }
                if (!preg_match("/^(([0-9]{12})|([0-9]{9}[vVxX]))$/", $employee->nic)) {
                    $errors = $errors . "NIC is invalid\n";
                }
                if ($employee->gender == null) {
                    $errors = $errors . "Gender not selected";
                }
            }
        }
        if ($errors != "") {
            echo($errors);
        } else {
            $empById = EmployeeDao::getById($id);
            if (!$empById) {
                echo("Employee does not exist in DB");
            }else {
                $emp = EmployeeDao::getByNic($employee->nic);
                if ($emp != null && $emp->id != $id) {
                    echo("This NIC is already excisted");
                } else {
                    $employee->id = $id;
                    $result = EmployeeDao::updateEmployee($employee);
                    if ($result != 1) {
                        echo("Database error");
                    }
                }
            }
        }
    }

    public static function delete($id){
        $empById = EmployeeDao::getById($id);
        if (!$empById) {
            echo("Employee does not exist in DB");
        }else {
            $result = EmployeeDao::deleteEmployee($empById);
            if ($result != 1) {
                echo("Database error");
            }
        }
    }
}

