<?php
include_once "./employeeController.php";
include_once "./genderController.php";

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$resource = explode('?',(explode('/',$request)[3]))[0];

$output = null;

switch ($resource) {
    case "employees":
        switch ($method) {
            case "GET": $output = EmployeeController::get();
                break;
            case "POST": $output = EmployeeController::post(getData());
                break;
            case "PUT": $output = EmployeeController::put(getURLId($request), getData());
                break;
            case "DELETE": $output = EmployeeController::delete(getURLId($request));
                break;
        }
    break;
    case "genders":
        switch ($method) {
            case "GET": $output = GenderController::get();
                break;
            case "POST": $output = GenderController::post();
                break;
        }
    break;
}
echo ($output);

function getURLId($request){
    if (count(explode('/',$request))>4){
        return explode('/',$request)[4];
    }else{
        die('ID not found');
    }
}

function getData(){
    $jsonFile = fopen('php://input', 'r');
    $jsonString = fread($jsonFile, 1024);
    return json_decode($jsonString);

}