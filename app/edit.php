<?php
    if(isset($_POST['id']) && isset($_POST['text'])){
        require '../db_conn.php';
        $id = $_POST['id'];
        $text = $_POST['text'];

        if(empty($text)){
            echo false;
        } else {
            $todo = ORM::for_table('todos')->find_one($id);
            if($todo){
                $todo->text = $text;
                $res = $todo->save();
                if($res){
                    echo 1;
                }else {
                    echo "error";
                }
            }
        }
        exit();
    }else {
        echo 'ID or Text is not set';
    }
?>