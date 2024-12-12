<?php

$date = date("Y-m-d H:i:s");
require_once "./model/database.php";
$_SESSION['location'] = 'factor';
switch ($_REQUEST['status']) {
    case "canceled":
        $db->query("UPDATE factors SET update_time='$date', `status`='canceled' WHERE slug={$_REQUEST['factor']};");
        include "view/header.php";
        include "view/navbar.php";
        require "./view/payment/canceled.php";
        include "view/footer.php";
        break;

    case "success":
        $sqlFindFactor = "SELECT house_id,price FROM factors WHERE slug={$_REQUEST['factor']};";
        $factor = $db->query($sqlFindFactor)->fetch_assoc();
        $house_id = $factor['house_id'];
        $price = $factor['price'];
        $db->query("UPDATE houses SET `Status`='Reserved' WHERE id=$house_id;");
        $db->query("UPDATE factors SET pay_time='$date', update_time='$date', `status`='paid' WHERE slug={$_REQUEST['factor']};");
        $db->query("INSERT INTO reserved SET house_id=$house_id, user_id={$_SESSION['user-login']['id']}, price=$price;");
        if (empty($db->error)) {
            include "view/header.php";
            include "view/navbar.php";
            require "view/payment/success.php";
            include "view/footer.php";
            break;
        }
        else {
            error_log(print_r([
                'error' => $db->error_list,
                'factor' => $sqlFindFactor,
                'update_house' => "UPDATE houses SET `Status`='Reserved' WHERE id=$house_id;",
                'update_factor' => "UPDATE factors SET pay_time='$date', update_time='$date', `status`='paid' WHERE slug={$_REQUEST['factor']};",
                'reserved' => "INSERT INTO reserved SET house_id=$house_id, user_id={$_SESSION['user-login']['id']}, price=$price;"
            ], true) . PHP_EOL, 3, dirname($_SERVER['SCRIPT_FILENAME']) . "/logs/db_error.log");
        }

    default:
        include "view/header.php";
        include "view/navbar.php";
        require "view/payment/error.php";
        include "view/footer.php";
        break;
}