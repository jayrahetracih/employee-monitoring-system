<?php 
require_once '../../Controller/Information/InfoInterface.php';
/**
 * undocumented class
 */
class Department implements InfoInterface {
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function create()
    {
        
    }

}
