<?php 
require_once 'Controller/User/Admin.php';


$action = $_POST['action'];

switch($action) {
    case 'firstFunction':
        firstFunction('first');
        break;
    case 'secondFunction':
        secondFunction('second');
        break;
    case 'read':
        read();
        break;
    default:
        die('Access denied for this function!');
}


    function firstFunction($name)
    {
        echo "Hello - this is the first function " . $name;
    }

    function secondFunction($name)
    {
        echo "Now I am calling the second function " .$name;
    }
   
    function read()
    {
        $admin = new Admin();
        $result = $admin->readInfo('employee');
        $employeeJSON=json_encode($result); 
        echo $employeeJSON; 
    }
