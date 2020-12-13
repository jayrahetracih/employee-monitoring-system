<?php
require_once 'D:/xampp/htdocs/employee-monitoring-system/Model/Db.php';
class Department_model
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

 /*    public function get_params($params)
    {
        extract($params);

        $set_fields = 

        $read_data = array('set_clause'=> array(
            'set_fields' => array(implode($set_fields)),
            'set_values' => array(implode($set_values)),
        'condition_field' => $condition_field,
        'operator'=> $operator,
        'condition_value'=>$update_id);

        return $read_data;
    } */
    
}