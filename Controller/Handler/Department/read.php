<?php

require_once __DIR__.'../../../../Controller/User/Admin.php';


$admin = new Admin();

$department_table = $admin->readInfo('department'); //Get all data from db

$json_post = json_decode(file_get_contents('php://input')); //Get the json post that was submitted


foreach($json_post as $key => $value)
{
    $json_key = $key; //json key
    $json_value = $value; // json value
}

$data = array(); //create empty array to store filtered results
$x = 0;

foreach($department_table as $table_row)
{
    if($table_row[$json_key] === $json_value)
    {
        $data[$x] = array(
            'department_id' => $table_row['department_id'],
            'department'    => $table_row['department'],
            'status'        => $table_row['status'],
        );
        $x++;
    }
}
echo json_encode($data);
