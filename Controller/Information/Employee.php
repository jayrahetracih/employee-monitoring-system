<?php 
require_once '../../../Controller/Information/InfoInterface.php';
require_once '../../../Controller/Class/Validator.php';
require_once '../../../Model/Employee_model.php';


class Employee implements InfoInterface{

    private $employee_model;
    private $post;

    public function __construct($post=array())
    {
        $this->post = $post;
        $this->validator = new Validator();
        $this->employee_model = new Employee_model();
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
                ),         
                'password' => array(
                    'name' => 'Password',
                    'required' => true,
                    'min' => 6
                )         
            )); 

            if($validation->passed()) {

               return $this->employee_model->executeCreate($this->post);
 
            } else {
              
                return  $validation->errors(); 
            } 

        }
    }

    public function read(){
        echo 'read employee info';
    }

    public function update(){
        echo 'update employee info';
    }

    public function changeStatus(){
        echo 'change employee status';
    }

}