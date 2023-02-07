<?php   
    if(isset($_GET['id']))
    {
        $house_id = $_GET['id'];
        include "model/database.php";
        $house = $db->query("SELECT *,h.id AS h_id, h.title AS h_title, r.title AS r_title, a_t.title AS ad_title,c.title AS cat_title FROM houses h 
        LEFT JOIN regions r on r.id = h.region_id
        LEFT JOIN ad_types a_t ON a_t.id = h.ad_type_id
        LEFT JOIN categories c ON c.id = h.category_id 
        WHERE h.id = $house_id")->fetch_assoc();
        if($house['id']){
            $options_str = $house['options'];
            $options_str = explode(",",$options_str);
            $options = [];
            foreach($options_str as $key=>$value){
                $record = $db->query("SELECT * FROM options WHERE id = '$value'")->fetch_assoc();
                if($record)
                $options[] = $record;
            }
            $_SESSION['house-title'] = "<title>".$house['h_title']." | املاک آنلاین "."</title";
            $_SESSION['location'] = 'house';
            $_SESSION['houseLocation'] = "Location:houses?id=".$id;
            $_SESSION['magazinLocation'] = "Location:magazine?id=".$id;
            $images = [];
            $result = $db->query("SELECT * FROM house_images WHERE house_id = '$house_id'");
            if($result->num_rows > 0){
            while ( $record = $result->fetch_assoc() ) {
                    $images[] = $record;
                }
            }
            if(isset($_SESSION['user-login']))
            {
                $user_id = $_SESSION['user-login']['id'];
                $record = null;
                $record = $db->query("SELECT * FROM bookmarks WHERE user_id = $user_id AND house_id = $house_id");
                if($record->num_rows > 0){
                    $bookmark = $record->fetch_assoc();
                }
            }
            include "relative_time.php";
            include "view/header.php";
            include "view/navbar.php";
            include "view/house.php";
            include "view/footer.php";
            unset($_SESSION['house-title']);
        }
        else
        {
            include "404.php";
        }
    }
    else
    {
        include "404.php";
    }    
