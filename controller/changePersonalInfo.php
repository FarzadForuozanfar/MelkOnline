<?php 
include "check_location.php";

    if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['national-code']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $national_code = $_POST['national-code'];
        include "model/database.php";
        $user_id = $_SESSION['user-login']['id'];
        $db->query("UPDATE users SET name = '$name', email = '$email', phone = '$phone', national_code = '$national_code' WHERE id = '$user_id' ");
        if ($db->error)
            $_SESSION['changeInfo']['error'] = "خطایی رخ داده لطفا دوباره تلاش کنید !!!";
        else
        {
            $_SESSION['changeInfo']['success'] = "تغییرات با موفقیت اعمال شدند . ";
            $_SESSION['user-login']['name'] = $name;
            $_SESSION['user-login']['email'] = $email;
            $_SESSION['user-login']['phone'] = $phone;
            $_SESSION['user-login']['national_code'] = $national_code;
        }
    }
    else
    {
        $_SESSION['changeInfo']['error'] = "لطفا تمام فیلد های ضرروی را پر کنید !!!";
    }

Set_location();