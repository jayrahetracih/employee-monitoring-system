<?php
require_once __DIR__.'../../../Controller/Information/Employee.php';
require_once __DIR__.'../../../Controller/Information/Department.php';

class InfoFactory 
{
    function initializeInfo($type,$post)
    {
        if ($type === 'employee') {
            return new Employee($post);
        } elseif ($type === 'department') {
            return new Department($post);
        }

        throw new Exception("Unsupported Info");        
    }
}
