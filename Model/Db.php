<?php 
require_once '../../Core/Config.php';
/**
 * undocumented class
 */
class Db {

    private static $instance = null;
    private  $pdo;

  private function __construct() {

    try {
      
      $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
      
    } catch(PDOException $e) {

      die($e->getMessage());

    }

  }

  public static function getInstance() {

    if(!isset(self::$instance)) {

        self::$instance = new Db();

    }

    return self::$instance;
  }


}