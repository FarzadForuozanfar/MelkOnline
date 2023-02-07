<?php
$_SESSION["location"] = "index";
include "model/database.php";
include "relative_time.php";
include "num2word.php";
$FAQs_list = $db->query("SELECT * FROM `faqs`");
$records = $db->query("SELECT * FROM (SELECT *,houses.id AS house_id FROM houses ORDER BY houses.created_at DESC) as subq LEFT JOIN house_images ON subq.id = house_images.house_id");
$tmp = array();
$cnt = 1;
$houses_array = array();
foreach ($records as $key => $value) {
    if ("$cnt" != $value['house_id']) {
        $cnt = (int)$value['house_id'];
        $houses_array[] = $tmp;
        $tmp = array();
    }
    $tmp[] = $value;
    if ($key + 1 == $records->num_rows)
        $houses_array[] = $tmp;
}

$articles = $db->query("SELECT * FROM articles order by created_at limit 4");
include "view/header.php";
include "view/navbar.php";
include "view/index.php";
include "view/footer.php";
?>