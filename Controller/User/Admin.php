<?php 
require_once '../../../Controller/Information/InfoFactory.php';

class Admin
{
    private $info_factory;

    public function __construct()
    {
        $this->info_factory = new InfoFactory();
    }

    function tempAddInfo($type,$post)
    {
        $info = $this->info_factory->initializeInfo($type,$post);
        return $info->create();
    }

    function tempReadInfo($type)
    {
        $info = $this->info_factory->initializeInfo($type, NULL);
        return $info->read();
    }

    function addInfo($type, $table, $params)
    {
       $info = $this->info_factory->initializeInfo($type,$params);
       return $info->create();
    }

    function readInfo($type, $fields, $table, $condition = array())
    {
        $info = $this->info_factory->initializeInfo($type, NULL);
        return $info->read($fields, $table, $condition);
    }

    function updateInfo($type, $table, $set_values = array(), $condition = array())
    {
        $info = $this->info_factory->initializeInfo($type, NULL);
        return $info->update($table, $set_values, $condition);
    }
      

}
