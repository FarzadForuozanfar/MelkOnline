<?php

    $_SESSION['location'] = "magazines";

    include "model/database.php";
    include "relative_time.php";
    include "miladi2jalali.php";

    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $article = $db->query("SELECT * FROM articles WHERE id = $id")->fetch_assoc();
        $articles = $db->query("SELECT * FROM articles WHERE NOT id = $id ORDER BY created_at DESC LIMIT 4");
        $comments = $db->query("SELECT * , users.id AS id_user FROM comments LEFt JOIN users ON comments.user_id = users.id WHERE mag_id = $id ORDER BY comments.created_at DESC");
    }
    else{
        $articles = $db->query("SELECT * FROM articles ORDER BY created_at DESC");
    }

    include "view/header.php";
    include "view/navbar.php";
    if(!empty($id))
    {
        $_SESSION['magazinLocation'] = "Location:magazine?id=".$id;
        include "view/magazine.php";
        $_SESSION['location'] = "magazine";
    }
    else
        include "view/magazines.php";

    include "view/footer.php";

?>
