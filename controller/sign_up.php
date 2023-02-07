<?php
include "check_location.php";
if(!empty($_POST['full-name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['national-code']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])){
    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $national_code = $_POST['national-code'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['confirm-password'];
    if($pass1 == $pass2){
        $password = md5($_POST['password']);
        include "model/database.php";
        $db->query("INSERT INTO users (name, password, email, phone, national_code) VALUES ('$name', '$password', '$email','$phone', '$national_code')");
        if($db->error != null)
            $_SESSION['register-error'] = "خظایی رخ داده لطفا دوباره تلاش کنید  !!! ";
        else
            {
                $_SESSION['user-login'] = $db->query("SELECT * FROM users order by id desc limit 1")->fetch_assoc();
                var_dump($_SESSION['user-login']);
            }

    }
    else{
        $_SESSION['register-error'] = "رمز های عبور باهم تطابق ندارند";
    }
}
else{
    $_SESSION['register-error'] = "لطفا تمام فیلد های لازمه را پر کنید";
}

Set_location();