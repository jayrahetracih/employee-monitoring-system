<?php 
require_once '../../../Model/Db.php';

class Employee_model 
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    function executeCreate($post = array())
    { 
        return $this->db->insertWithTransaction($post);
      
    }

    function executeRead()
    { 
        $read_data = array('column'=> array('*'),
                            'join_table'=> array('tbl_employee_details','tbl_department'),
                            'join_id'=> array('emp_details_id','department_id'));

        return $this->db->select('tbl_employees',$read_data);
    }
}