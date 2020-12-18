<?php

require_once __DIR__.'../../../Controller/Class/Validator.php';
require_once __DIR__.'../../../Model/Db.php';

class User {

    private $db;
    private $post;
    private $validator;

    public function __construct($post=array())
    {
        $this->post = $post;
        $this->validator = new Validator();
        $this->db = Db::getInstance();
    }
    
    public function login()
    {
        if (isset($_POST['btn_login'])) {
            
            $validation = $this->validator->checkInput($this->post, array(
                'tb_id_number' => array(
                    'name' => 'ID Number',
                    'required' => true
                ),
                'tb_password' => array(
                    'name' => 'Password',
                    'required' => true
                )           
            ));

            if($validation->passed()) {

                return $this->db->userLogin($this->post);

            } else {
                
                return $validation->errors(); 
            }

        }

    }

}
