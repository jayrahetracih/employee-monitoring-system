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

    public function read($field, $table, $condition = array())
    {
        $x = 1;
        $results = array();
        foreach($this->db->get($table, $field, $condition) as $obj)
        {
            foreach($obj as $dept => $value)
            {
                $results[$x] = $value;
                $x++;
            }
        }
        return $results;
    }

    public function update()
    {
        
    }

}
