<?php
    if(isset($_POST['text'])){
        require '../db_conn.php';
        $text = $_POST['text'];

        if(empty($text)){
            header("Location: ../index.php?mess=error");
        } else {
            $task = ORM::for_table('todos')->create();
            $maxPosition = ORM::for_table('todos')->max('position');

            $task->text= $text;
            $task->color = 'colorRed';
            $task->position = (int)$maxPosition + 1;
            
            $status = $task->save();
            if($status){
                header("Location: ../index.php?mess=success");
            } else {
                header("Location: ../index.php");
            }
            exit();
        }
    }else {
        header("Location: ../index.php?mess=error");
    }
?>