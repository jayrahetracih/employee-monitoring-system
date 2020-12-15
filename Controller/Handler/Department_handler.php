<?php

require_once __DIR__.'../../../Controller/User/Admin.php';


$admin = new Admin();
if(isset($_POST['set_fields']))
{
    $errors         = array();      // array to hold validation errors
    $data           = array();      // array to pass back data

    // validate the variables ======================================================
    
    if($_POST['set_fields'] === 'department')
    {
        $results = $admin->readInfo('department', $_POST);
        foreach ($results as $value)
        {
            if($value['department'] === $_POST['set_values'])
            {
                $errors = 'There\'s already a department named '. $_POST['set_values'];
            }
        }
    }

    // return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        // if there are no errors process our form, then return a message

        $message = $admin->updateInfo('department', $_POST);
        

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = $message['alert_message'];
    }

    // return all our data to an AJAX call
    echo json_encode($data);
}