<?php
class Department_model
{
    function get_data()
    {
        $dept_obj = $admin->readInfo(
            'department',
            'department_id, department',
            'tbl_department',
            array('status','=','Active'));
        $results = array();
        //Extract array data from array object $dept_obj and store to respective columns
        $array_dept    = array_column($dept_obj, 'department');
        $array_id      = array_column($dept_obj, 'department_id');
    
        $x=0;
        //Merge those two arrays
        foreach($array_id as $id)
        {
            $results[$id] = $array_dept[$x];
            $x++;
        }
    }
}