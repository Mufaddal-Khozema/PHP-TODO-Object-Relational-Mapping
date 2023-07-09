<?php
    if(isset($_POST['id'])){
        require '../db_conn.php';
        $id = $_POST['id'];

        if(empty($id)){
            echo 'error';
        } else {
            $todo = ORM::for_table('todos')->find_one($id);

            if($todo){
                $todoChecked = $todo->is_checked;
                $checked = $todoChecked ? 0 : 1;

                $todo->is_checked = $checked;
                $status = $todo->save();
                
                if($status){
                    echo $checked;
                }else {
                    echo "error";
                }
            }
            exit();
        }
    } else {
        echo 'error';
    }

?>