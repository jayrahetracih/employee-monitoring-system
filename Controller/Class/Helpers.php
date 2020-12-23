<?php

class Helpers{

    public static function redirectTo($location = null) {
		if($location) {
			
		    header('Location: ' . $location);
			exit();
		}
	}
    
    public static function displayInput($item) {
        
        if(isset($_POST[$item])) {
            return htmlspecialchars($_POST[$item], ENT_QUOTES);
        }else{
           return ''; 
        }
           
    }
    
  /*   public static function checkTextbox($item) {

        if (!empty($item)) {
           return 'is-invalid';
        } else {
           return '';
        }
        
    } */
}
