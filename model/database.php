<?php
    /**
     * @var mysqli
     */
    $db;
    $db = new mysqli("localhost","root","123456","melkonline");
    if($db->connect_error)
    {
        echo $db->connect_error;
    }
    else
    {
        $db->set_charset('utf8mb4');
        $db->query("SET CHARACTER SET utf8mb4;" );
        $db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
    }
