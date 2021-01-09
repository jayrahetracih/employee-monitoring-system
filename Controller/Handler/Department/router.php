<?php
require_once __DIR__.'../../../../Controller/User/Admin.php';
$admin = new Admin();
$json_post = json_decode(file_get_contents('php://input')); //Get the json post that was submitted

switch($json_post->type)
{
    case 'employee':
                switch($json_post->action)
                {
                    case 'create':
                        echo json_encode($json_post);
                        break;
                    case 'read':
                        echo json_encode($json_post);
                        break;
                    case 'update':
                        echo json_encode($json_post);
                        break;
                }
        break;
    case 'department':
                switch($json_post->action)
                {
                    case 'create':
                        foreach($json_post as $key => $value)
                        {
                            if($key != 'type' && $key != 'action')
                            {
                                $post[$key] = $value;   
                            }
                        }
                        $result = $admin->addInfo('department',$post);
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
                        break;
                    case 'read':
                        $filter_params = null;
                        if(!empty($json_post->search))
                        {
                            foreach($json_post as $key => $value)
                            {
                                $json_key   = $key; //json key
                                $json_value = $value; // json value
                            }

                            $condition_field    = $json_key != 'search' ? $json_key : 'department';
                            $operator           = $json_key != 'search' ? '=' : 'LIKE';
                            $value              = $json_key != 'search' ? $json_value : '%' . $json_value . '%';
                            
                            $filter_params['condition'] = array(
                                'condition_field'   => $condition_field,
                                'operator'          => $operator,
                                'value'             => $value
                            );
                        }
                        if(!empty($json_post->order_field))
                        {
                            $filter_params['order'] = array(
                                'field' => $json_post->order_field,
                                'modifier' => $json_post->order_mod
                            );
                        }

                        $department_table = $admin->readInfo('department',$filter_params); //Get all data from db
                        echo json_encode($department_table);
                        break;
                    case 'update':
                        $json_id        = $json_post->id;
                        $json_value     = $json_post->value;
                        $json_field     = $json_post->field;

                        $read_data = array(
                            'set_fields'        => $json_field,
                            'set_values'        => $json_value,
                            'condition_field'   => 'department_id',
                            'operator'          => '=',
                            'condition_value'   => $json_id
                        );

                        $res = $admin->updateInfo('department', $read_data);
                        echo json_encode($res);
                        break;
                }
        break;
}
