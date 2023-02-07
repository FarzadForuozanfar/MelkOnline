<?php
if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])) {
    include "model/database.php";
    header("Content-type: application/json; charset=utf-8");
    $name = $_POST['first_name'] . " " . $_POST["last_name"];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $db->query("INSERT INTO messages(name, email, phone, text) VALUES('$name','$email','$phone','$message')");
    if ($db->error)
    {
        $result[] = array("status" => "error");
        echo json_encode($result, true);
    }
    else
    {
        $result[] = array("status" => "success");
        echo json_encode($result, true);
    }
} 
else
    {
        $result[] = array("status" => "error");
        echo json_encode($result, true);
    }