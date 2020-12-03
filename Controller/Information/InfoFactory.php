<?php
require_once '../../../Controller/Information/Employee.php';

class InfoFactory 
{
    function initializeInfo($type,$params)
    {
        if ($type === 'employee') {
            return new Employee($params);
        } elseif ($type === 'department') {
            return new Department();
        }

        throw new Exception("Unsupported Info");        
    }
}
