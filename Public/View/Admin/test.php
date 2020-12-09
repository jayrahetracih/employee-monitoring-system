<?php
require_once '../../../Model/Db.php';

$db = new Db();
            //$fields = 
            // Usage

$res = $db->get(array('tbl_employees', 'tbl_employee_details'), array(
            
    'tbl_employees' => array(
         'emp_id_number'
     ),
    'tbl_employee_details' => array(
         '*'
    )), array(
        'tbl_employee_details.emp_details_id', '=', 'tbl_employees.emp_details_id'
    ));