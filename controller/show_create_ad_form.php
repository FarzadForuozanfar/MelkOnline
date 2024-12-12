<?php
require_once "model/database.php";

$adTypes    = $db->query("SELECT * FROM ad_types");
$categories = $db->query("SELECT * FROM categories");
$options    = $db->query("SELECT * FROM options");
$regions    = $db->query("SELECT * FROM regions WHERE NOT id = 100");

include "view/header.php";
include "view/navbar.php";
include "view/create_ad_form.php";
include "view/footer.php";
