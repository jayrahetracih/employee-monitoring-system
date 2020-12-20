<?php
require_once __DIR__.'../../../../Controller/User/Admin.php';

$admin = new Admin();

$result = $admin->addInfo('department',$_POST);
if(isset($result['success']))
{
    extract($result['success']);
    $callback = array('result' => 'success', 'message' => $message); //INSERT query succeeded and has only 1 message returned
}
else
{
    //initialize callback array
    $callback = array(
        'result'    => 'error', //indicate that INSERT query did not succeeded
        'messages'  => array() //initialize key to recieve array of error messages
        );
    foreach($result['error'] as $error)
    {
        $callback['messages'][] = array( //set auto incrementing array
            'field'     => $error['field'], // initialize which input field to display the error
            'message'   => strip_tags($error['message']) //initialize error message
        );
    }
}


echo json_encode($callback);