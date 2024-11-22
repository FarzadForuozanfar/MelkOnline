<?php
if (isset($_POST)) {
    if(isset($_POST['sort'])){
        if ($_POST['sort'] == 'newest')
        $sort_value = "ORDER BY h.created_at DESC";

        elseif ($_POST['sort'] == 'price_acc')
            $sort_value = "ORDER BY h.price_per_meter ASC";

        elseif ($_POST['sort'] == 'price_des')
            $sort_value = "ORDER BY h.price_per_meter DESC";

        elseif ($_POST['sort'] == 'met_des')
            $sort_value = "ORDER BY h.meterage DESC";

        elseif ($_POST['sort'] == 'met_acc')
            $sort_value = "ORDER BY h.meterage ASC";
        else
        $sort_value = "";
    }
    else
    $sort_value = "";
    if (isset($_POST['regions'])) {
        if ($_POST['regions'] == 'همه موارد')
            $region = " 1";
        else
            $region = " h.region_id = {$_POST['regions']}";
    }
    if (isset($_POST['ad_type']))
        if ($_POST['ad_type'] == 'همه موارد')
            $ad_type = " 1";
        else
            $ad_type = " h.ad_type_id = {$_POST['ad_type']}";

    if (isset($_POST['metrage']))
        if ($_POST['metrage'] == 'همه موارد')
            $metrage = " 1";
        else
            $metrage = " h.meterage < {$_POST['metrage']}";

    if (isset($_POST['category']))
        if ($_POST['category'] == 'همه موارد')
            $category = " 1";
        else
            $category = " h.category_id = {$_POST['category']}";
    
    include "model/database.php";
    include "relative_time.php";
    $query = "SELECT *,count(hi.url) AS 'total', h.title AS h_title, r.title AS r_title , a_t.title AS ad_title FROM houses h 
    LEFT join house_images hi on hi.house_id = h.id
    LEFT JOIN ad_types a_t ON h.ad_type_id =a_t.id 
    LEFT JOIN regions r ON r.id = h.region_id
    WHERE $region AND $ad_type AND $metrage AND $category AND `Status` = 'Accept'
    GROUP by h.id
    $sort_value";

    $records = $db->query($query);
    $result = [];
    if($records->num_rows > 0)
        {
            $result['status'] = array("status" => "success");
            while($record = $records->fetch_assoc())
            {   
                $record['relativeTime'] = time2str($record['created_at']);
                $result['houses'][] = $record; 
            }
            echo json_encode($result,true);
        }
    else
    {
        $result['status'] = array("status" => "notFound");
        echo json_encode($result, true);
    }
} 
else {
    $result['status'] = array("status" => "error");
    echo json_encode($result, true);
}
