<?php
include "check_location.php";

    if(isset($_SESSION['user-login']))
    {
        $_SESSION['user-login'] = null;
        unset($_SESSION['user-login']);
    }
Set_location();    