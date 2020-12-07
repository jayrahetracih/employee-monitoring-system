<?php 
require_once '../../../Controller/Information/InfoInterface.php';
require_once '../../../Controller/Class/Validator.php';
require_once '../../../Model/Db.php';

/**
 * undocumented class
 */
class Employee implements InfoInterface{

    private $db;

    public function __construct($post=array())
    {
        $this->db = Db::getInstance();
        $this->post = $post;
        $this->validator = new Validator();
    }

    public function timeIn(){
        echo 'Employee time in';
    }

    public function timeOut(){
        echo 'Employee time out';
    }

    public function create()
    {

        if (isset($_POST['btn_register'])) {

            $validation = $this->validator->checkInput($this->post , array(
                'first_name' => array(
                    'name' => 'First Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 30
                ),
                'middle_name' => array(
                    'name' => 'Middle Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 30
                ),
                'last_name' => array(
                    'name' => 'Last Name',
                    'required' => true,
                    'min' => 2,
                    'max' => 30
                ),
                'gender' => array(
                    'name' => 'Gender',
                    'required' => true
                ),            
                'age' => array(
                    'name' => 'Age',
                    'required' => true
                ),         
                'address' => array(
                    'name' => 'Address',
                    'required' => true,
                    'min' => 10,
                    'max' => 50
                ),           
                'mobile_number' => array(
                    'name' => 'Mobile Number',
                    'required' => true
                ),                 
                'email' => array(
                    'name' => 'Email',
                    'required' => true
                )           
            )); 

            if($validation->passed()) {

                /* $execute_register['query_result'] =  parent::executeRegister($this->post);
            
                return $execute_register; */

                echo 'Success';

            } else {
              
                return  $validation->errors(); 
            } 

        }
    }

    public function read($field, $table, $condition = array()){
        echo 'read employee info';
    }

    public function update(){
        echo 'update employee info';
    }

    public function changeStatus(){
        echo 'change employee status';
    }



}