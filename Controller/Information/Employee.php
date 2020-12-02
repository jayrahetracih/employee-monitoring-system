<?php 
require_once '../../Controller/Information/InfoInterface.php';

/**
 * undocumented class
 */
class Employee implements InfoInterface{

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

    public function changeStatus(){
        echo 'change employee status';
    }



}