<?php
if (isset($_POST['message']))
{
    $msg     = $_POST['message'];
    $user_id = $_POST['user_id'];
    $mag_id  = $_POST['mag_id'];
    include "model/database.php";
    $db->query("INSERT INTO comments(`user_id`, `mag_id`, `text`) VALUES($user_id, $mag_id, '$msg')");
    if($db->error)
    {
        echo json_encode(['status'=>'error', 'msg'=>'خطایی رخ داده لطفا دوباره تلاش کنید'], true);
    }
    else
    {
        echo json_encode(['status'=>'success', 'msg'=>'همه چی اوکیه'], true);
    }
}
else{
    echo json_encode(['status'=>'error', 'msg'=>'لطفا متنی برای نطر خود بنویسد فیلد نباید خالی باشد'], true);
}