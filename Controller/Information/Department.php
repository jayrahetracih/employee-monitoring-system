<?php 
require_once 'InfoInterface.php';
require_once '../../../Controller/Class/Validator.php';
require_once '../../../Model/Db.php';
require_once '../../../Model/Department_model.php';
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
                    return array('success_message' => $_POST['dept_name'] . ' Department Added Successfully!');
                }
            }
            else
            {
                return $validation->errors();
            }
        }
    }

    public function read()
    {
        $read_data = array('column'=> array('*'),
                            'condition'=>array(array(
                                'condition_field' => 'status',
                                'operator'=> '=',
                                'value'=>'Active'
                                )));
        return $this->db->get('tbl_department', $read_data);
    }

    public function update($update_id)
    {
        $read_data = array('set_clause'=> array(
                                'set_fields' => array('status'),
                                'set_values' => array('Inactive')),
                            'condition_field' => 'department_id',
                            'operator'=> '=',
                            'condition_value'=>$update_id);

        if($this->db->update('tbl_department', $read_data))
        {
            return true;
        }
    }

}
