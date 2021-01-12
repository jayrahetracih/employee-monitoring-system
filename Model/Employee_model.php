<?php 
require_once __DIR__.'../../Model/Db.php';

class Employee_model 
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    function createData($post = array())
    { 
        return $this->db->insertWithTransaction($post);
    }

    public function readData()
    { 
        // array key must be column/join_table/join_id/condition/logical_operator
        $read_data = array('column'=> array('tbl_employee_details.*','tbl_employees.*','tbl_department.department'),
                            'join_table'=> array('tbl_employee_details','tbl_department'),
                            'join_id'=> array('emp_details_id','department_id')/* ,
                            'condition'=>array(array('condition_field' => 'tbl_employees.employee_status','operator'=> '=','value'=>'Inactive')) */
                        );

        return $this->db->select('tbl_employees',$read_data);
    }

    public function displayDataById($post_data){
         return $this->db->selectOne($post_data);
    }

    public function updateData($post_data = array()){

        
        $read_data = array('post_data'=> $post_data,
                            'join_table'=> array('tbl_employee_details','tbl_department'),
                            'join_id'=> array('emp_details_id','department_id'),
                            'condition'=>array('condition_field' => 'employee_id','operator'=> '=','value'=>'?') 
                            );

         return $this->db->update('tbl_employees',$read_data);
         
    }

}