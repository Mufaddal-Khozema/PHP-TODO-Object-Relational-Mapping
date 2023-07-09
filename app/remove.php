<?php
    if(isset($_POST['id'])){
        require '../db_conn.php';
        $id = $_POST['id'];

        if(empty($id)){
            echo 0;
        } else {
            $res = ORM::for_table('todos')->find_one($id)->delete();

            if($res){
                echo 1;
            }else {
                echo 0;
            }
            exit();
        }
    }else {
        echo "No ID for deletion";
    }
?>