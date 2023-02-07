<?php
    if(isset($_POST['user_id']) && isset($_POST['house_id']))
    {
        $user_id = (int)$_POST['user_id'];
        $house_id = (int)$_POST['house_id'];
        include "model/database.php";
        $record = $db->query("SELECT * FROM bookmarks WHERE user_id = $user_id AND house_id = $house_id ");
        if($record->num_rows > 0){
            $response = $db->query("DELETE FROM bookmarks WHERE user_id = $user_id AND house_id = $house_id");            
        }
        else{
            $response = $db->query("INSERT INTO bookmarks(user_id, house_id) VALUES($user_id, $house_id)");
        }
        if($response){
            $result[] = array("status" => "success");
            echo json_encode($result, true);
        }
        else{
            $result[] = array("status" => "error");
            echo json_encode($result, true);
        }
    }
    else{
        $result[] = array("status" => "error");
        echo json_encode($result, true);
    }