<section class="m-0 p-0">
    <nav style="font-size:small;">
        <ul class="nav justify-content-end align-items-center align-self-center p-1">
            <li class="nav-item">
                <button onclick="DarkLightMode()" class="btn-light-mode"><i style="margin-top: 7.5px !important;" class="fa-solid fa-sun DarkLightMode()"><input type="hidden" value="dark" name="mode"></i></button>
            </li>
            <?php if (!isset($_SESSION['user-login'])) : ?>
                <li class="nav-item">
                    <a href="register" class="nav-link txt-light cursor-pointer"><i class="fa fa-user-large me-2"></i>عضویت </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link txt-light cursor-pointer" onclick="document.getElementById('sign-in-modal').style.display='block'"><i class="fa-solid fa-lock me-2"></i>ورود</a>
                </li>
            <?php else : ?>
                <li class="nav-item align-items-center align-self-center">
                    <a href="personalInfo" class="nav-link txt-light  align-items-center align-self-center cursor-pointer"><i class="bi bi-person-circle me-2 fs-6"></i> <span>پروفایل</span></a>
                </li>
                <li class="nav-item align-items-center align-self-center">
                    <a href="logOut" class="nav-link txt-light  align-items-center align-self-center cursor-pointer"><i class="fs-6 fa-solid fa-power-off me-2"></i> <span>خروج</span> </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <nav class="navbar navbar-expand-lg bg-dark-gray shadow-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img width="50px" width="55px" src="view/assets/images/logo.jpg" alt=""></a>
            <button class="navbar-toggler" id="toggleNav" type="button" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul style="font-size: 15px;" class="navbar-nav  me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link txt-light mx-1" href="<?php if($_SESSION['location'] != "index")
                            echo 'index'; else echo '#'?>"><i class="fa-solid fa-house"></i> ملک آنلاین</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light mx-1" href="<?php if($_SESSION['location'] != "index")
                            echo 'houses'; else echo '#NewestHouse'?>"><i class="fa-solid fa-building"></i> آگهی ها </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light mx-1" href="<?php if($_SESSION['location'] != "index")
                            echo 'index#services'; else echo '#services'?>"><i class="fa-solid fa-gem"></i> خدمات ما </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light mx-1" href="<?php if($_SESSION['location'] != "index")
                            echo 'index#faq'; else echo '#faq'?>"><i class="fa-solid fa-circle-question"></i> سوالات متداول</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light mx-1" href="magazine"><i class="fa-solid fa-book-open"></i> مقالات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link txt-light mx-1" href="contact-us"><i class="fa-solid fa-square-phone-flip"></i> ارتباط با ما</a>
                    </li>
                </ul>
                <form class="d-flex col-12 col-lg-5" action="searchRegions" method="POST" role="search">
                    <div class="autocomplete w-100 px-2">
                        <input name="regions" id="myInput" class="form-control me-2 rounded-4" type="search" placeholder="جستجوی منطقه محله . . ." aria-label="Search">
                    </div>
                    <button disabled style=" position: relative; width: 42px !important; height: 40px !important; border-radius: 50%;" id="search-btn" class="btn btn-outline-gold rounded-5" type="submit"><i style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
    </nav>
</section>