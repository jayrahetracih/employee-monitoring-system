<?php 
require_once __DIR__.'../../Controller/Information/InfoInterface.php';
require_once __DIR__.'../../Controller/Class/Validator.php';
require_once __DIR__.'../Db.php';
/**
 * undocumented class
 */
class Department implements InfoInterface {
    private $db;
    private $validator;
    private $post;

    public function __construct($post=array())
    {
        $this->db = Db::getInstance();
        $this->post = $post;
        $this->validator = new Validator();
    }

    public function create()
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

                'department' => $this->post['dept_name'],
                'status' => 'Active'

            )))
            {
                return array('success' => array('message' => $this->post['dept_name'] . ' Added Successfully!'));
            }
        }
        else
        {
            $errors = array(
                'error' => $validation->errors()
            );
            return $errors;
        }
    }

    public function read()
    {
        $read_data['column'] = array('*');
        extract($this->post);
        if(!empty($this->post['condition']))
        {
            $read_data['condition'] = array($condition);
        }
        if(!empty($this->post['order']))
        {
            $read_data['order'] = array($order);
        }
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
