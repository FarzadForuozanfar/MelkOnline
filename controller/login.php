<?php
include "check_location.php";

if($_POST['email-phone'] && $_POST['password'])
{
    
    include "model/database.php";
    $input = $_POST['email-phone'];
    $password = md5($_POST['password']);

    if(strpos($input,"@") !== false)
        $email = $input;
    else
        $phone = $input;

    if(!empty($phone))
    {
        $exist = $db->query("SELECT * FROM users WHERE `phone` = '$phone' AND `password` = '$password'");
    }
    else
    {
        $exist = $db->query("SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password'");
    }
    
    if($exist->num_rows > 0)
    {
        $user = $exist->fetch_assoc();
        $_SESSION["user-login"] = $user;
        $_SESSION['notif'] = "کاربر {$user['name']} خوش آمدید.";
    }
    else
    {
        $_SESSION['error-login'] = "not found";
    }
}
else
    {
        $_SESSION['error-login'] = "not found";
    }
Set_location();