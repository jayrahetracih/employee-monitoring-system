<?php 
require_once 'InfoInterface.php';
require_once '../../../Model/Db.php';
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
        if($this->db->insert('department', array(

            'department' => $_POST['dept_name'],
            'department_status' => 'Active'

        )))
        {
            return true;
        }
        return false;
    }

    public function read()
    {
        
    }

    public function update()
    {
        
    }

}
