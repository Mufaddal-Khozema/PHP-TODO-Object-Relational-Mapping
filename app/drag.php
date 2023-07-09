<?php
    if(isset($_POST['values']) && $_POST['values'] != 0){
        require '../db_conn.php';
        $len = $_POST['values'];
        $order = [];
        for($i = 0; $i < $len; $i++){
            array_push($order, $_POST[(string)($i)]);
        }

        if(empty($order)){
            echo 'error';
        } else {
            for($i = 0;$i < $len; $i++){
                $todo = ORM::for_table('todos')->find_one($order[$i]);
                if($todo){
                    $todo->position = $i+1;
                    $status = $todo->save();
                    if($status){
                    } else {
                        echo "Status Error";
                    }
                }else {
                    echo "Couldn't get Todo/Task";
                }
            }
            exit();
        }
    }else {
        echo 'Values is 0 or not set';   
    }
?>