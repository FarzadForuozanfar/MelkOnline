<?php 
    if(isset($_SESSION['user-login'])){
        $_SESSION['location'] = "profile";

        if(strpos($_SERVER['REQUEST_URI'], "personalInfo") !== false)
            $_SESSION['sub-location'] = "personalInfo";

        elseif(strpos($_SERVER['REQUEST_URI'] , "bookmarks") !== false)
            $_SESSION['sub-location'] = "bookmarks";
        
        elseif(strpos($_SERVER['REQUEST_URI'] , "changePass") !== false)
            $_SESSION['sub-location'] = "changePass";

        elseif(strpos($_SERVER['REQUEST_URI'] , "reserved") !== false)
            $_SESSION['sub-location'] = "reserved";

        elseif(strpos($_SERVER['REQUEST_URI'] , "factors") !== false)
            $_SESSION['sub-location'] = "factors";
        elseif(strpos($_SERVER['REQUEST_URI'] , "myads") !== false)
            $_SESSION['sub-location'] = "myads";
        
        include "view/header.php";
        include "view/navbar.php";
        include "view/profile.php";
        include "view/footer.php";
        
    }
    else{
        header("Location:index");
    }