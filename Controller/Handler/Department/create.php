<?php
require_once __DIR__.'../../../../Controller/User/Admin.php';

$admin = new Admin();

$result = $admin->addInfo('department',$_POST);

echo json_encode($result);