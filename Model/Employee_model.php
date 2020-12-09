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
        return $this->db->select('tbl_employees','*','tbl_employee_details','emp_details_id');
    }
}
