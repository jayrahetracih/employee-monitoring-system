<?php

require_once __DIR__.'../../../../Controller/User/Admin.php';


$admin = new Admin();



$json_post = json_decode(file_get_contents('php://input')); //Get the json post that was submitted

if(!empty($json_post))
{
    foreach($json_post as $key => $value)
    {
        $json_key   = $key; //json key
        $json_value = $value; // json value
    }

    $condition_field    = $json_key != 'search' ? $json_key : 'department';
    $operator           = $json_key != 'search' ? '=' : 'LIKE';
    $value              = $json_key != 'search' ? $json_value : '%' . $json_value . '%';
    
    $filter_params = array(
        'condition_field'   => $condition_field,
        'operator'          => $operator,
        'value'             => $value
    );
}else{$filter_params = null;}

$department_table = $admin->readInfo('department',$filter_params); //Get all data from db

/* $data = array(); //create empty array to store filtered results
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
} */
echo json_encode($department_table);
