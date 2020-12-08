<?php 
require_once '../../../Model/Db.php';

class Employee_model 
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    function executeCreate($post = array())
    { 
        return $this->db->insertWithTransaction($post);
      
    }
}
