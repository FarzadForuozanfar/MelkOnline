<div class="bg-dark-gray shadow-light rounded-3">
    <header id="header-profile" class="rounded-3">
        <img width="24%" class="avatar-profile " src="view/assets/images/user.png" alt="">
        <h5 style="color: white;" class="text-shadow-dark mt-3"><?php echo $_SESSION['user-login']['name'] ?></h5>
    </header>
    <div class="w-100">
        <ul class="ul-profile-side-bar">
            <div class="p-0 <?php if($_SESSION['sub-location'] == "personalInfo") echo "active"?> contant">
                <div class="">
                    <a href="personalInfo"><i class="fa-solid fa-user me-3 fs-5 "></i>اطلاعات شخصی </a>
                </div>
            </div>
            <div class="p-0 <?php if($_SESSION['sub-location'] == "reserved") echo "active"?> contant">
                <div class="">
                    <a href="reserved"><i class="fa-solid fa-book-bookmark me-3 fs-5 "></i>رزرو شده ها </a>
                </div>
            </div>
            <div class="p-0 <?php if($_SESSION['sub-location'] == "factors") echo "active"?> contant">
                <div class="">
                    <a href="factors"><i class="fa-solid fa-receipt me-3 fs-5 "></i>پرداخت ها </a>
                </div>
            </div>
            <div class="p-0 <?php if($_SESSION['sub-location'] == "bookmarks") echo "active"?> contant">
                <div class="">
                    <a href="bookmarks"><i class="fa-solid fa-bookmark me-3 fs-5 "></i>نشان شده ها</a>
                </div>
            </div>
            <div class="p-0 <?php if($_SESSION['sub-location'] == "myads") echo "active"?> contant">
                <div class="">
                    <a href="myads"><i class="fa-solid fa-home me-3 fs-5 "></i>آگهی های من</a>
                </div>
            </div>
            <div class="p-0 <?php if($_SESSION['sub-location'] == "changePass") echo "active"?> contant">
                <div class="">
                    <a href="changePass"><i class="fa-solid fa-key me-3 fs-5 "></i>تغییر رمز ورود</a>
                </div>
            </div>
        </ul>
    </div>
</div>