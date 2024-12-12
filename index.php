<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    ini_set('display_errors', 'On');

    date_default_timezone_set("Asia/Tehran");
    if(session_status() === PHP_SESSION_NONE) session_start();
    
    require_once "utility/base.php";
    
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
        "register" => "<title> املاک آنلاین | ثبت نام </title>",
        "factor" => "<title> املاک آنلاین | پرداخت رزور </title>"

    );

    $_SESSION['titels'] = $titles;
    $request            = $_SERVER["REQUEST_URI"];
    $id                 = $_GET['id'] ?? '';
    $factor             = $_GET['factor'] ?? '';
    $status             = $_GET['status'] ?? '';

    
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
        case("/MelkOnline/bookmarks"):
        case("/MelkOnline/changePass"):
        case("/MelkOnline/reserved"):
        case("/MelkOnline/factors"):
        case("/MelkOnline/myads"):    
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
        case("/MelkOnline/sendtobank?id=$id"):
            require __DIR__."/controller/send_to_bank.php";
            break; 
        case("/MelkOnline/payment?status=$status&factor=$factor"):
            require __DIR__."/controller/handle_payment.php";
            break; 
        case ("/MelkOnline/create-ad"):
            $_SESSION["location"] = "index";
            if (!isset($_SESSION['user-login'])) return header("Location: /MelkOnline");
            require __DIR__."/controller/show_create_ad_form.php";
            break;
        case ("/MelkOnline/CreateAd"):
            $_SESSION["location"] = "index";
            if (!isset($_SESSION['user-login'])) return header("Location: /MelkOnline");
            require __DIR__."/controller/handle_create_ad.php";
            break;
        default:
            require __DIR__."/controller/404.php";
            break;

    }
