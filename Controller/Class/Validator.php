<?php

class Validator
{

    private $passed = false;
    private $errors = [];
    private $conn = null;

    public function checkInput($source, $items = array()) {

        foreach($items as $item => $rules) {
           foreach ($rules as $rule => $rule_value) {

            $value = $source[$item];
            $name = $rules['name'];

            if ($rule === 'required' && empty($value)) {

                $this->addError($item,$name . " is {$rule}" . "<br>");

            }else if(!empty($value)){

               switch ($rule) {

                   case 'min':
                        if(strlen($value) < $rule_value) {
                            $this->addError($item,$name . " must be a minimum of {$rule_value} characters.". "<br>");
                        } 
                       break;
                   case 'max':
                        if(strlen($value) > $rule_value) {
                            $this->addError($item,$name . " must be a maximum of {$rule_value} characters.". "<br>");
                        } 
                       break;
                   case 'valid':
                        if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
                            $this->addError($item,$name ." is not {$rule}" . "<br>");
                        } 
                       break;
           
               }
            }
 
            } 
          
        }

        if(empty($this->errors)) {
            $this->passed = true;
        }
    
       // this method chaining or returning this object
       return $this;
           
    }

    private function addError($key,$val){
        $this->errors[$key] = $val;
    }
     public function passed() {
        return $this->passed;
    }
    
    public function errors() {
        return $this->errors;
    }

}