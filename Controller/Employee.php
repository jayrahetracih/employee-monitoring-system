<?php 

class Employee {

    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function display_awesome(){
         $this->db->test();
    }

    public function register(){
        echo 'lolo';
    }

    public function login(){
        echo 'lolo';
    }

    public function logout(){
        echo 'lolo';
    }


}