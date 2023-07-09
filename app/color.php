<?php
    if(isset($_POST['id'])){
        require '../db_conn.php';
        $id = $_POST['id'];

        if(empty($id)){
            echo 'error';
        } else {
            $validColors = ['colorRed', 'colorGreen', 'colorBlue', 'colorYellow'];
            $todo = ORM::for_table('todos')->find_one($id);
            if($todo){
                $todoColor = $todo->color;
    
                $idx = array_search($todoColor, $validColors);
                
                // Pick the next color in validColor
                $nextColor = isset($validColors[$idx+1]) ? $validColors[$idx+1] : $validColors[0];
                
                $todo->color = $nextColor;
                $status = $todo->save();
                if($status){
                    echo $nextColor;
                }else {
                    echo "error";
                }
            }
            exit();
        }
    }else {
        echo 'error';
    }
?>