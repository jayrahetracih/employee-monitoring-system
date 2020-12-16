<?php
require_once '../../Controller/User/Admin.php';

$admin = new Admin();
$result = $admin->readInfo('employee');

$employeeJSON=json_encode($result); 

echo $employeeJSON;


