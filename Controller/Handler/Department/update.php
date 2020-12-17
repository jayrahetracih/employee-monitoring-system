<?php

require_once __DIR__.'../../../../Controller/User/Admin.php';

$admin = new Admin();

$json_post = json_decode(file_get_contents('php://input')); //Get the json post that was submitted

$json_id        = $json_post->id;
$json_value     = $json_post->value;
$json_field     = $json_post->field;

$read_data = array(
    'set_fields'        => $json_field,
    'set_values'        => $json_value,
    'condition_field'   => 'department_id',
    'operator'          => '=',
    'condition_value'   => $json_id
);

$res = $admin->updateInfo('department', $read_data);

echo json_encode($res);