<?php 
require_once __DIR__.'../InfoInterface.php';
require_once __DIR__.'../../../Controller/Class/Validator.php';
require_once __DIR__.'../../../Model/Db.php';
require_once __DIR__.'../../../Model/Department_model.php';
/**
 * undocumented class
 */
class Department implements InfoInterface {
    private $db;
    private $validator;
    private $dpt_model;
    private $post;

    public function __construct($post=array())
    {
        $this->db = Db::getInstance();
        $this->post = $post;
        $this->validator = new Validator();
        $this->dpt_model = new Department_model();
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
                    return array('alert_message' => $_POST['dept_name'] . ' Department Added Successfully!');
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

    public function update($post)
    {
        $read_data = array('set_clause'=> array(
            'set_fields' => array($post['set_fields']),
            'set_values' => array($post['set_values']),
        'condition_field' => $post['condition_field'],
        'operator'=> $post['operator'],
        'condition_value'=>$post['condition_value']));

        if($this->db->update('tbl_department', $read_data))
        {
            return array('alert_message' => ucFirst($post['set_fields']) . ' Updated!');
        }
        else
        {
            die('error');
        }
    }

}
