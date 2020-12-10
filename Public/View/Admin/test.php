<?php
require_once '../../../Model/Db.php';

$db = new Db();


$res = $db->get(array(
    'main_table' => 'tbl_employees', //Select the main reference table
    'join_table' => array('tbl_employee_details', 'tbl_department')), //Select which tables to be joined
     array('emp_id_number', 'first_Name', 'department'), // Columns to be selected
     array('emp_details_id', 'department_id'), //Select Join id to respective table
     array(
        'clause' => array(
            'clause_field' => 'status',
            'clause_operator' => '=',
            'clause_value' => 'active'),
        'reference_table' => 'tbl_employees')); 
