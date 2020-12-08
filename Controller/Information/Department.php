<?php 
require_once 'InfoInterface.php';
require_once '../../../Controller/Class/Validator.php';
require_once '../../../Model/Db.php';
/**
 * undocumented class
 */
class Department implements InfoInterface {
    private $db;
    private $validator;

    public function __construct($post=array())
    {
        $this->db = Db::getInstance();
        $this->post = $post;
        $this->validator = new Validator();
    }

    public function create()
    {
        if(isset($_POST['btn_addDepartment']))
        {
            $validation = $this->validator->checkInput($this->post , array(
                'dept_name' => array(
                    'name' => 'Department Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 30
                )
                ));

            if($validation->passed())
            {
                
                if($this->db->insert('tbl_department', array(

                    'department' => $_POST['dept_name'],
                    'status' => 'Active'

                )))
                {
                    return true;
                }
            }
            else
            {
                return $validation->errors();
            }
        }
    }

    public function read($field, $table, $condition = array())
    {
        return $this->db->get($table, $field, $condition);
    }

    public function update($table, $set_values = array(), $condition = array())
    {
        if($this->db->update($table, $set_values, $condition))
        {
            return true;
        }
    }

}
