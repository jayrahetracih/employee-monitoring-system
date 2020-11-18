<?php 

class Db {

    private static $instance = null;
    private  $pdo;
    private  $host = '127.0.0.1';
    private  $user = 'root';
    private  $password = 'Bendamandes';
    private  $db = 'db_employee_monitoring_system';
   
  private function __construct() 
  {
    try
    {
      $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->password);
    } catch(PDOException $e) 
    {
      die($e->getMessage());
    }
  }

  public static function getInstance() 
  {
    if(!isset(self::$instance)) 
    {
        self::$instance = new Db();
    }
    return self::$instance;
  }

  public function test(){
    echo 'lolo';
  }

}