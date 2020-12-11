<?php 
require_once '../../../Controller/Information/InfoFactory.php';

class Admin
{
    private $info_factory;

    public function __construct()
    {
        $this->info_factory = new InfoFactory();
    }

    function tempReadInfo($type)
    {
        $info = $this->info_factory->initializeInfo($type, NULL);
        return $info->read();
    }

    function addInfo($type, $params)
    {
       $info = $this->info_factory->initializeInfo($type,$params);
       return $info->create();
    }

    function readInfo($type)
    {
        $info = $this->info_factory->initializeInfo($type, NULL);
        return $info->read();
    }

    function updateInfo($type, $update_id)
    {
        $info = $this->info_factory->initializeInfo($type, NULL);
        return $info->update($update_id);
    }
      

}
