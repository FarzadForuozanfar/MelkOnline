<?php
require_once "utility/reports_type_list.php";
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    die( json_encode([
        'status' => 'error',
        'message' => 'متد درخواستی غیرمجاز می باشد'
    ]) );
}

if (!isset($_POST['house_id'], $_POST['report_type']) || !is_numeric($_POST['house_id']) || !in_array($_POST['report_type'], REPORTS_LIST)) {
    http_response_code(400);
    die( json_encode([
        'status' => 'error',
        'message' => 'اطلاعات ارسالی نامعتبر می باشند'
    ]) );
}

if (empty($_SESSION['user-login'])) {
    http_response_code(401);
    die( json_encode([
        'status' => 'error',
        'message' => 'برای گزارش آگهی باید به حساب خود وارد شوید'
    ]) );
}

require_once "model/database.php";

if ($db->query("SELECT id FROM reports WHERE house_id = {$_POST['house_id']} AND user_id = {$_SESSION['user-login']['id']}")->num_rows > 0) {
    die( json_encode([
        'status' => 'error',
        'message' => 'قبلاً برای این آگهی گزارش ثبت کرده‌اید و نمی‌توانید دوباره برای آن گزارش ثبت کنید.'
    ]) );
}
$sql = "INSERT INTO reports SET house_id = {$_POST['house_id']}, user_id = {$_SESSION['user-login']['id']}, report_type = '{$_POST['report_type']}';";
$result = $db->query($sql);
if (!$result || $db->insert_id <= 0) {
    error_log("$db->error , $sql" . PHP_EOL, 3, dirname($_SERVER['SCRIPT_FILENAME']) . "/logs/db_error.log");

    die( json_encode([
        'status' => 'error',
        'message' => " خطای داخلی بروز کرده است. " . $db->error
    ]) );
}
die( json_encode([
    'status' => 'success',
    'message' => "گزارش شما با موفقیت ثبت شد."
]) );