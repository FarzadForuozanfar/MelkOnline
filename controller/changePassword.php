<?php
include "check_location.php";

    if(isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['confirmPass'])){
        if($_POST['newPass'] == $_POST['confirmPass'])
        {
            include "model/database.php";
            $oldPass = md5($_POST['oldPass']);
            $id = $_SESSION['user-login']['id'];
            $currentPass = $db->query("SELECT password FROM users WHERE `id` = '$id'")->fetch_assoc();
            if($currentPass['password'] == $oldPass)
            {
                $new_pass = md5($_POST['newPass']);
                $db->query("UPDATE users SET password = '$new_pass' WHERE id = '$id' ");
                $_SESSION['user-login']['password'] = $new_pass;
                $_SESSION['changePass-status']['success'] = "رمز عبور شما با موفقیت تغییر کرد .";
            }
            else
            {
                $_SESSION['changePass-status']['error'] = "رمز فعلی اشتباه است لطفا دوباره تلاش کنید .";
            }
        }
        else
            $_SESSION['changePass-status']['error'] = "رمز جدید با تکرار رمز جدید مطابقت ندارد ";

    }
    else 
        $_SESSION['changePass-status']['error'] = "پر کردن تمام فیلد ها ضروری است ";

Set_location();