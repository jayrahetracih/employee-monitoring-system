<?php 
require_once __DIR__.'../../../Controller/Information/InfoFactory.php';

class Admin
{
    private $info_factory;

    public function __construct()
    {
        $this->info_factory = new InfoFactory();
    }
    
    function addInfo($type,$post)
    {
        $info = $this->info_factory->initializeInfo($type,$post);
        return $info->create();
    }

    function readInfo($type)
    {
        $info = $this->info_factory->initializeInfo($type, NULL);
        return $info->read();
    }

    function readSingleInfo($type,$get)
    {
        $info = $this->info_factory->initializeInfo($type, $get);
        return $info->readOne();
    }
    
    function updateInfo($type, $post)
    {
        $info = $this->info_factory->initializeInfo($type, $post);
        return $info->update($post);
    }

}
