<?php
class Inputs
{
    public function get($name)
    {
        return ($_GET[$name] ?? $_GET[$name]) || ($_POST[$name] ?? $_POST[$name]);
    }
}