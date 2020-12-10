<?php 
require_once '../../../Core/Config.php';

class Db {

    private static $instance = null;
    private $pdo,
            $_results,
            $_errors = false,
            $_query,
            $_rowcount;

    // Using  Singleton for db connection
    public function __construct()
    {
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

    public function insertWithTransaction($post = array())
    {
        try {

            $this->pdo->beginTransaction();    
            // Remove last two value of array
            $employee_details = array_slice($post, 0, count($post) - 2); 
            // Hash Password 
            $password = password_hash($post['password'],PASSWORD_DEFAULT);
            // select all users
            $stmt = $this->pdo->query("SELECT employee_id FROM tbl_employees");
            $number_of_employees = $stmt->rowCount();
            $employee_number_id = date("Ym") . "000" . strval($number_of_employees + 1);

             // Insert the metadata of the employee_details into the database
            $stmt_employee_details = $this->pdo->prepare(
            'INSERT INTO `tbl_employee_details`(`first_name`, `middle_name`,
            `last_name`, `age`,`gender`, `address`, `mobile_number`, `email`)
            VALUES (?,?,?,?,?,?,?,?)');

            $stmt_employee_details->execute(array_values($employee_details));
            $employee_details_id = $this->pdo->lastInsertId();

            $stmt_employees = $this->pdo->prepare(
                'INSERT INTO tbl_employees (`emp_details_id`,`emp_id_number`,`password`) 
                VALUES(?,?,?)');
            $stmt_employees->execute([$employee_details_id ,$employee_number_id,$password]);
            
            // Make the changes to the database permanent
            if ($this->pdo->commit()) {
                echo 'success';
            } 
            
        }
        catch ( PDOException $e ) { 
            // Failed to insert into database so we rollback any changes
            $this->pdo->rollback();
            throw $e;
        }
    }

    public function select($table,$read_data){

       if (array_key_exists('join_table',$read_data)) {

            extract($read_data);

            $query_array = array();

            foreach ($join_table as $key => $value) {
                $query_array[$key] = "INNER JOIN {$join_table[$key]} 
                ON {$table}.{$join_id[$key]} = {$join_table[$key]}.{$join_id[$key]}";
            } 

            $query = implode(' ',array_values($query_array));

       }else {
           echo 'this is for single table';
       }

        $column = implode(',',array_values($column));

        $sql = "SELECT {$column} FROM {$table} {$query}";

      

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(); 

        return $stmt->fetchAll(); 
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

  public function action($action,$table,$read_data)
  {

    if (array_key_exists('join_tablek',$read_data)) {

            extract($read_data);

            $join_table_query = array();

            foreach ($join_table as $key => $value) {
                $join_table_query[$key] = "INNER JOIN {$join_table[$key]} 
                ON {$table}.{$join_id[$key]} = {$join_table[$key]}.{$join_id[$key]}";
            } 

            $join_table_query  = implode(' ',array_values($join_table_query)); 
            echo 'one';


       }elseif(array_key_exists('condition',$read_data)) {

            echo 'two';

            extract($read_data);

            $condition_query = array();

            foreach ($condition as $key => $value) {
                $condition_query[$key] = "WHERE {$condition['condition_field']} {$condition['operator']} {$condition['value']}";
            } 

            $condition_query  = implode(' ',array_values($condition_query));
       }

       echo  $condition_query;


die();
        /* if(!is_array($tables))
        {
            if(count($where) === 3)
            {
                $conditionField = $where[0];
                $operator = $where[1];
                $value = $where[2];

                $sql = "$action $actionField FROM $tables WHERE $conditionField $operator ?";
                if(!$this->query($sql,array($value))->error())
                {
                    return $this;
                }
            }
        }
        else
        {
            extract($tables);
            foreach($join_table as $key => $value)
            {
                $query_array[$key] = "INNER JOIN {$join_table[$key]} 
                ON {$main_table}.{$join_id[$key]} = {$join_table[$key]}.{$join_id[$key]}";
            }

            $query = implode(' ',array_values($query_array));

            extract($where);
            extract($clause);
            $w = $reference_table . '.' . $clause_field . $clause_operator . "'" . $clause_value . "'";
            $query .= " WHERE {$w}";

            $columns = implode(',',array_values($actionField));

            $sql = "SELECT {$columns} FROM {$main_table} {$query}";
            
            die($sql);
            $stmt = $this->pdo->prepare($sql);
            if($stmt->execute())
            {
            return $stmt->fetchAll(); 
            }

        }
        return false; */
  }

  public function get($table,$read_data)
  {
    return $this->action('SELECT',$table,$read_data);
  }

  public function delete($table, $where)
  {
      return $this->action('DELETE',$in,$table,$where);
  }

  public function update($table, $set_values = array(), $condition = array())
  {

    $field_identifier = $condition[0];
    $operator = $condition[1];
    $identifier_value = $condition[2];

    $set = '';
    foreach($set_values as $field => $value)
    {
        $set .= $field . " = ?";
        $child_post[$field] = $value;
    }
    
    $sql = "UPDATE `$table` SET $set WHERE $field_identifier $operator $identifier_value";
    if(!$this->query($sql, $child_post)->error())
    {
        return true;
    }
    
    return false; 

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
