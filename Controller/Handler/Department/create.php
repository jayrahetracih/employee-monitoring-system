<?php
require_once __DIR__.'../../../../Controller/User/Admin.php';

$admin = new Admin();

$result = $admin->addInfo('department',$_POST);
if(isset($result['success']))
{
    extract($result['success']);
    $callback = array('result' => 'success', 'message' => $message);
}
else
{
    extract($result['error']);
    $callback = array('result' => 'error', 'message' => strip_tags($message));
}


echo json_encode($callback);