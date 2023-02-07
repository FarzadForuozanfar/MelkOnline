<?php
    function Set_location(){
        if($_SESSION['location'] == 'index')
            $location = "Location:index";
        elseif($_SESSION['location'] == 'magazines')
            {
                $location = "Location:magazine";
            }
        elseif($_SESSION['location'] == 'magazine')
            {
                $location = $_SESSION['magazinLocation'];
            }  
        elseif($_SESSION['location'] == 'contact-us')
            $location = "Location:contact-us";
        elseif($_SESSION['location'] == 'profile')
        {
            if(isset($_SESSION['user-login']))
            {
                if(isset($_SESSION['sub-location'])){
                    if($_SESSION['sub-location'] == "personalInfo")
                        $location = "Location:personalInfo";
                    elseif($_SESSION['sub-location'] == "changePass")
                        $location = "Location:changePass";
                    else
                    $location = "Location:index";
                }
                else
                $location = "Location:index";
            }
            else
                $location = "Location:index";
        }
        elseif($_SESSION['location'] == "houses")
            $location = "Location:houses";

        elseif($_SESSION['location'] == "house")
        {   
            $location = $_SESSION['houseLocation'];
        }
        else
            $location = "Location:index";
            
        header($location);
    }
    
?>