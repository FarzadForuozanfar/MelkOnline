<?php
    $db = new mysqli("localhost","root","","melkonline");
    if($db->connect_error)
    {
        echo $db->connect_error;
    }
    else
    {
        date_default_timezone_set("Asia/Tehran");
        $db->set_charset('utf8mb4');
        $db->query("SET CHARACTER SET utf8mb4");
    }
?>