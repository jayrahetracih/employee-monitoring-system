<?php 
require_once __DIR__.'../../Core/Config.php';

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
    
    /**
     * Insert data into multiple table from ($post = $_POST) using Transaction
     *
     * @param  array $post
     * @return void
     */
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
            `last_name`, `gender`,`age`, `address`, `mobile_number`, `email`)
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
    /**
     * Check data if it has join_table,condition and logical operator
     *
     * @param  string $table
     * @param  array $read_data
     * @return string $query
     */
    public function checkQuery($table,$read_data)
    {
        $query = '';

        if (array_key_exists('join_table',$read_data)) {
            
            extract($read_data);

            $join_table_query = array();

            foreach ($join_table as $key => $value) {
                $join_table_query[$key] = "INNER JOIN {$join_table[$key]} 
                ON {$table}.{$join_id[$key]} = {$join_table[$key]}.{$join_id[$key]}";
            } 

            $query  .= implode(' ',array_values($join_table_query)); 

        }

        if(array_key_exists('condition',$read_data)) {

            extract($read_data);

            $condition_query = array();

            foreach ($condition as $key => $value) {
                $condition_query[$key] = " WHERE {$condition[$key]['condition_field']} 
                {$condition[$key]['operator']} ? ";
            }

            if (count($condition) > 1) {
                $query  .= implode(" {$logical_operator[0]} ",array_values($condition_query));
            } else {
                $query  .= implode(' ',array_values($condition_query));
            } 
        }

        return $query;

    }
    /**
     * action
     *
     * @param  string $action
     * @param  string $table
     * @param  array $read_data
     * @return array result
     */
    public function select($table,$read_data)
    {
        $query = $this->checkQuery($table,$read_data);
        
        extract($read_data);

        $column = implode(',',array_values($column));

        $sql = "SELECT {$column} FROM {$table} {$query}";
    
        $stmt = $this->pdo->prepare($sql);

        $has_condition = strpos($sql,'WHERE');
        if ($has_condition) {
            $stmt->execute([$condition[0]['value']]); 
            return $stmt->fetchAll(); 
        } else {
            $stmt->execute(); 
            return $stmt->fetchAll(); 
        }
    }
        
    /**
     * userLogin
     *
     * @param  array $data
     * @return void
     */
    public function userLogin($data = array()){

        $stmt = $this->pdo->prepare("SELECT * FROM tbl_employees WHERE emp_id_number = ?");
        $stmt->execute([$data['tb_id_number']]);
        $has_user = $stmt->fetch();

        if ($has_user) {

            if ($has_user['role_id'] == 1) {

                        if (!password_verify($data['tb_password'], $has_user['password'])) {
                    
                            return  '<div class="alert alert-danger alert-dismissible fade show" role="alert ">
                                        Your Password is incorrect.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>'; 

                        }else{

                            header('Location:Admin/employee.php');
                            exit();
        
                        }

            } else {

                if (!password_verify($data['tb_password'], $has_user['password'])) {
                    
                    return  '<div class="alert alert-danger alert-dismissible fade show" role="alert ">
                                Your Password is incorrect.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>'; 

                }else{

                   echo "NOT YET FINISHED!!!!";
 
                }

            }
            
        } else {

             return  '<div class="alert alert-danger alert-dismissible fade show" role="alert ">
                               Your ID Number or Password is incorrect.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>'; 
        }

    }

  public function delete($table, $where)
  {
      return $this->action('DELETE',$in,$table,$where);
  }

  public function update($table, $read_data)
  {
    extract($read_data);
    extract($set_clause);
    
    $set_query = implode(' = ?', $set_fields) . ' = ?';
    
    $sql = "UPDATE `$table` SET $set_query WHERE $condition_field $operator '$condition_value'";
    
    if(!$this->query($sql, $set_values)->error())
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


}
