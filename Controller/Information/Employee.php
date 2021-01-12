<?php 
require_once __DIR__.'../../../Controller/Information/InfoInterface.php';
require_once __DIR__.'../../../Controller/Class/Validator.php';
require_once __DIR__.'../../../Model/Employee_model.php';


class Employee implements InfoInterface{

    private $employee_model;
    private $employee_data;

    public function __construct($employee_data=array())
    {
        $this->employee_data = $employee_data;
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

        $validation = $this->validator->checkInput($this->employee_data , array(
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

            return $this->employee_model->createData($this->employee_data);

        } else {

            $result = array('result' => 'failed','result_data'=> $validation->errors());

            return $result;            
        } 

    }

    public function read(){

        return $this->employee_model->readData();
    }
    public function readOne(){

       return $this->employee_model->displayDataById($this->employee_data);
    }

    public function update(){

        $validation = $this->validator->checkInput($this->employee_data , array(
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

            return $this->employee_model->updateData($this->employee_data);

        } else {
            
            $result = array('result' => 'failed','result_data'=> $validation->errors());
            
            return $result;    
        } 
        
    }

    public function changeStatus(){
        echo 'change employee status';
    }

}