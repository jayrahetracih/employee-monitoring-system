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

  public function __construct() {

    try {
      
      $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
      
    } catch(PDOException $e) {

      die($e->getMessage());

    }

  }

  public static function getInstance() 
  {

    if(!isset(self::$instance)) {

        self::$instance = new Db();

    }

    return self::$instance;
  }

  public function query($sql, $params = array())
  {

    $this->_errors = false;
    $x = 1;
    if($this->_query = $this->pdo->prepare($sql))
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

  public function action($action,$actionField,$table, $where = array())
  {
      if(count($where) === 3)
      {
          $conditionField = $where[0];
          $operator = $where[1];
          $value = $where[2];

          $sql = "$action $actionField FROM $table WHERE $conditionField $operator ?";
          if(!$this->query($sql,array($value))->error())
          {
              return $this;
          }
          
      }
      return false;
  }

  public function get($table, $field, $where)
  {
      return $this->action('SELECT', $field, $table, $where);
  }

  public function delete($table, $where)
  {
      return $this->action('DELETE',$in,$table,$where);
  }


  public function insert($table,$post = array())
  {
    $fields = array_keys($post);

    foreach($post as $key => $value)
    {
        $child_post[$key] = $value;
        $post[$key] ='?';
    }

     $sql = "INSERT INTO $table (`". implode('`, `', $fields) ."`) VALUES (". implode(', ', $post) .")";
     
    if(!$this->query($sql, $child_post)->error())
    {
        return true;
    }
    
    return false; 
  }

  public function error()
  {
    
      return $this->_errors;
  }


}