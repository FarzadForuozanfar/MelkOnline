<?php
require_once "check_location.php";
if(!empty($_POST['full-name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['national-code']) && !empty($_POST['password']) && !empty($_POST['confirm-password'])){
    $name = $_POST['full-name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $national_code = $_POST['national-code'];
    $pass1 = $_POST['password'];
    $pass2 = $_POST['confirm-password'];
    $type = $_POST['type'];
    if (!in_array($type, ['buyer', 'seller']))
    {
        $_SESSION['error'] = 'مقدار انتخابی برای نوع کاربری نامعتبر می باشد.';
    }
    elseif($pass1 == $pass2){
        require_once "model/database.php";
        
        if (!is_null($db->query("SELECT id FROM users WHERE phone = '$phone' OR email = '$email';")->fetch_row()))
        {
            $_SESSION['error'] = "کاربر دیگری با این اطلاعات قبلاََ ثبت نام کرده است.";
        }
        else
        {
            $password = md5($_POST['password']);
            $result = $db->query("INSERT INTO users (name, password, email, phone, national_code, type) VALUES ('$name', '$password', '$email','$phone', '$national_code', '$type')");
            
            if($db->error != null)
                $_SESSION['error'] = "خظایی رخ داده لطفا دوباره تلاش کنید  !!! ";
            else
            {
                $_SESSION['user-login'] = $db->query("SELECT * FROM users WHERE id = {$db->insert_id};")->fetch_assoc();
                $_SESSION['notif']      = "کاربر عزیز به سایت ملک آنلاین خوش آمدید.";
            }
        }

    }
    else{
        $_SESSION['error'] = "رمز های عبور باهم تطابق ندارند";
    }
}
else{
    $_SESSION['error'] = "لطفا تمام فیلد های لازمه را پر کنید";
}

Set_location();