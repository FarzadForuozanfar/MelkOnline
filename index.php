<?php
    session_start();
    if (!isset($_COOKIE['mode']))
    {
        setcookie("mode", "dark");
    }
    $titles = array(
        "index"=>"<title> خرید رهن اجاره آپارتمان خانه ویلایی و تجاری و اداری 🏠 | املاک آنلاین</title>",
        "404"=> "<title> 404 :: صفحه مورد نظر پیدا نشد| املاک آنلاین</title>",
        "magazines" => "<title> مقالات ملک آنلاین | املاک آنلاین </title>",
        "contact-us" => "<title> ارتباط با ما | املاک آنلاین </title>",
        "profile" => "<title> صفحه پروفایل شما | املاک آنلاین </title>",
        "houses"=>"<title> خرید رهن اجاره آپارتمان خانه ویلایی و تجاری و اداری | املاک آنلاین</title>",
        "register" => "<title> املاک آنلاین | ثبت نام </title>"
    );
    $_SESSION['titels'] = $titles;
    date_default_timezone_set("Asia/Tehran");

    $request = $_SERVER["REQUEST_URI"];
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
    }
    else
    {
        $id = '';
    }

    require_once "utility/base.php";
    
    switch ($request) {
        case("/MelkOnline"):
        case("/MelkOnline/"):
        case("/MelkOnline/index"):
        case("/MelkOnline/index/"):
            require __DIR__."/controller/index.php";
            break;
        
        case("/MelkOnline/magazine"):
            require __DIR__."/controller/magazine.php";
            break;
            
        case("/MelkOnline/magazine?id=".$id):
            require __DIR__."/controller/magazine.php";
            break;

        case("/MelkOnline/contact-us"):
            require __DIR__."/controller/contact-us.php";
            break;

        case("/MelkOnline/SendMessage"):
            require __DIR__."/controller/send_message.php";
            break;

        case("/MelkOnline/login"):
            require __DIR__."/controller/login.php";
            break;

        case("/MelkOnline/GetRegion"):
            require __DIR__."/controller/postRegion.php";
            break;
        case("/MelkOnline/logOut"):
            require __DIR__."/controller/logout.php";
            break;

        case("/MelkOnline/personalInfo"):
            require __DIR__."/controller/profile.php";
            break;

        case("/MelkOnline/bookmarks"):
            require __DIR__."/controller/profile.php";
            break;

        case("/MelkOnline/changePass"):
            require __DIR__."/controller/profile.php";
            break;
        
        case("/MelkOnline/changePassword"):
            require __DIR__."/controller/changePassword.php";
            break;

        case("/MelkOnline/changePersonalInfo"):
            require __DIR__."/controller/changePersonalInfo.php";
            break; 

        case("/MelkOnline/houses"):
            require __DIR__."/controller/houses.php";
            break;  

        case("/MelkOnline/houses?id=".$id):
            require __DIR__."/controller/house.php";
            break;

        case("/MelkOnline/ManageBookmarks"):
            require __DIR__."/controller/manage_bookmarks.php";
            break; 
        case("/MelkOnline/send-comment"):
            require __DIR__."/controller/add_comment.php";
            break;

        case("/MelkOnline/searchRegions"):
            require __DIR__."/controller/searchRegions.php";
            break;
            
        case("/MelkOnline/searchHouse"):
            require __DIR__."/controller/searchHouse.php";
            break; 
        case("/MelkOnline/register"):
            if ($_SERVER['REQUEST_METHOD'] == 'GET')
                require __DIR__."/controller/show_register_form.php";
            else
                require __DIR__."/controller/register.php";
            break;
        case("/MelkOnline/send-report"):
            require __DIR__."/controller/handle_report.php";
            break; 
        default:
            require __DIR__."/controller/404.php";
            break;

    }
