<?php 
/**
 * undocumented interface
 */
interface InfoInterface {
    
    function create();
    function read();
    //function read($field, $table, $condition = array());
    function update($table, $set_values = array(), $condition = array());

}
