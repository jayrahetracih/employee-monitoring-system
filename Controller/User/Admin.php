<?php 
require_once '../../../Controller/Information/InfoFactory.php';

class Admin
{

    function addInfo($type,$params)
    {
       $info_factory = new InfoFactory();
       $info = $info_factory->initializeInfo($type,$params);
       return $info->create();
    } 
      
}
