<?php
    $_SESSION['location'] = "houses";
    if(isset($_SESSION['house-title'])){
        unset($_SESSION['house-title']);
    }
    include "model/database.php";
    include "relative_time.php";
    $regions = $db->query("SELECT * FROM regions");
    $categories = $db->query("SELECT * FROM categories");
    if(isset($_SESSION['selected-regions']))
    {
        $region_title = $_SESSION['selected-regions']['title'];
        $region_id = $_SESSION['selected-regions']['id'];
        $houses = $db->query("SELECT *,count(hi.url) AS 'total', h.title AS h_title, r.title AS r_title , a_t.title AS ad_title FROM houses h 
        LEFT join house_images hi on hi.house_id = h.id
        LEFT JOIN ad_types a_t ON h.ad_type_id =a_t.id 
        LEFT JOIN regions r ON r.id = h.region_id
        WHERE r.title = '$region_title' AND r.id = $region_id AND `Status` = 'Accept'
        GROUP by h.id
        ORDER BY h.created_at DESC 
        ");
    }
    else{
    $houses = $db->query("SELECT *,count(hi.url) AS 'total', h.title AS h_title, r.title AS r_title , a_t.title AS ad_title FROM houses h 
    LEFT join house_images hi on hi.house_id = h.id
    LEFT JOIN ad_types a_t ON h.ad_type_id =a_t.id 
    LEFT JOIN regions r ON r.id = h.region_id
    WHERE `Status` = 'Accept'
    GROUP by h.id
    ORDER BY h.created_at DESC 
    ");}
    if(isset($houses->num_rows))
    {
        if($houses->num_rows == 0)
        $notFound = true;
    }
    else
        $notFound = true;
    
    include "view/header.php";
    include "view/navbar.php";
    include "view/houses.php";
    include 'view/footer.php';