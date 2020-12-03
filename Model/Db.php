<?php 
require_once '../../../Core/Config.php';
/**
 * undocumented class
 */
class Db {

    private static $instance = null;
    private $pdo,
            $_results,
            $_errors = false,
            $_query,
            $_rowcount;

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

  public function query($sql, $params = array())
  {

    $this->_errors = false;
    $x = 1;
    if($this->_query = $this->_pdo->prepare($sql))
    {               
        foreach($params as $param)
        {
          $this->_query->bindValue($x, $param);
          $x++;
        }

      if($this->_query->execute())
      {
        $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
        $this->_rowcount = $this->_query->rowCount();
      }
      else
      {
        $this->_errors = true;
      }
    }
    return $this;

  }

  public function insert($table,$post = array()){
  
    foreach($post as $key => $value)
    {
        $child_post[$key] = $value;
        $post[$key] ='?';
    }

    print_r($child_post);
    echo '<br>';
    print_r($post);

   /*  $sql = "INSERT INTO $table (`". implode('`, `', $keys) ."`) VALUES ({$values})";
    if(!$this->query($sql, $fields)->error())
    {
        return true;
    }
    
    return false; */
  }


}