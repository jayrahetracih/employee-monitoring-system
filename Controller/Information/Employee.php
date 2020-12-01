<?php 
/**
 * undocumented class
 */
class Employee {

    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function timeIn(){
        echo 'Employee time in';
    }

    public function timeOut(){
        echo 'Employee time out';
    }

    public function create(){
        echo 'create employee info';
    }

    public function read(){
        echo 'read employee info';
    }

    public function update(){
        echo 'update employee info';
    }

    public function delete(){
        echo 'delete employee info';
    }



}