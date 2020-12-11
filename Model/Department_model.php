<?php
require_once '../../../Model/Db.php';
class Department_model
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
    
}