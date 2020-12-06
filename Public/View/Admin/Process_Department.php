<?php
include_once '../../../Controller/Information/Department.php';

$dept = new Department();

$data = array();
     if($dept->create())
     {
        $data['success'] = true;
        $data['message'] = $_POST["dept_name"].' Added!';
        echo json_encode($data);
     }
     else
     {
        $data['success'] = true;
        $data['message'] = 'Failed!';
        echo json_encode($data);
     }