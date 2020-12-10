<?php
require_once '../../../Controller/Information/Employee.php';

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
