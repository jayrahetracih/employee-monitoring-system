<?php
require_once __DIR__.'../../../Controller/User/Admin.php';

$admin = new Admin();
$json_post = json_decode(file_get_contents('php://input')); //Get the json post that was submitted

switch($json_post->type)
{
    case 'employee':
                switch($json_post->action)
                {
                    case 'create':
                       
                        foreach($json_post->fields_values as $key => $value)
                        {
                                $post[$key] = $value;   
                        }

                        $result = $admin->addInfo('employee',$post);

                        if ($result['result'] == 'success') {
                            echo json_encode($result);
                        } elseif($result['result'] == 'failed') {
                            echo json_encode($result);
                        }

                        break;

                    case 'read':
 
                        $result = $admin->readInfo('employee');
                        echo json_encode($result); 

                        break;

                    case 'readOne':

                        $result = $admin->readSingleInfo('employee', $json_post->data_id);

                        echo json_encode($result); 

                        break;

                    case 'update':

                        foreach($json_post->fields_values as $key => $value)
                        {
                                $post[$key] = $value;   
                        }

                        $result = $admin->updateInfo('employee',$post);

                        if ($result['result'] == 'success') {
                            echo json_encode($result);
                        } elseif($result['result'] == 'failed') {
                            echo json_encode($result);
                        }

                        break;
                }
        break;
 }
