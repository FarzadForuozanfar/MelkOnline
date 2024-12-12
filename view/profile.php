<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <?php include "view/panel.php"; ?>
            </div>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="bg-dark-gray shadow-light rounded-3">
                    <?php 
                        if($_SESSION['sub-location'] == "personalInfo")
                            include "view/personal_info.php"; 

                        elseif($_SESSION['sub-location'] == "bookmarks")
                            include "view/bookmarks.php";

                        elseif($_SESSION['sub-location'] == "reserved")
                            include "view/reserved.php";

                        elseif($_SESSION['sub-location'] == "factors")
                            include "view/factors.php";

                        elseif($_SESSION['sub-location'] == "myads")
                            include "view/myads.php";

                        else
                            include "view/changePassword.php";
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>