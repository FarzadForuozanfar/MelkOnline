<?php
    if(isset($_POST['regions'])){
        $region = $_POST['regions'];
        include "model/database.php";
        $record = $db->query("SELECT * FROM regions WHERE title = '$region'");
        if($record->num_rows > 0 ){
            $_SESSION['selected-regions'] = $record->fetch_assoc();
        }
        else
            $_SESSION['selected-regions'] = array("id" => null , "title" => "none");
    }
    else{
        var_dump($_POST);
        echo "empty";
    }
    header("Location:houses");
