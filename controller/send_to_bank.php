<?php
require_once "./model/database.php";

$house = $db->query("SELECT * FROM houses WHERE ID={$_GET['id']};")->fetch_assoc();

if (empty($house) || empty($_SESSION['user-login'])) {
    return header("Location: /MelkOnline/");
}

$price = getReservedPrice($house['ad_type_id'] == 1 ? $house['price'] : $house['mortgage']);
$slug = '';

do {
    $slug = intval("1000" . rand(100000, 999999));
} while (empty($db->query("SELECT * FROM factors WHERE slug=$slug;")));

$sql = "INSERT INTO factors SET house_id={$_GET['id']}, user_id={$_SESSION['user-login']['id']}, slug=$slug, `status`='unpaid', price=$price";
$db->query($sql);

if (!empty($db->error)) {
    //handle error
}

return header("Location: http://127.0.0.1/payment?price=$price&factor=$slug");