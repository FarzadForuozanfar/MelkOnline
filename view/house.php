<section class="p-0 m-0 mt-5">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            <div class="col-lg-6 col-12">
                <div id="add-carousel" class="owl-carousel owl-theme text-light">

                <?php foreach ($images as $image) : ?>
                    <div class="swiper-slide">
                        <img src="<?php echo $image['url']; ?>" width="600px" height="400px" class="img-carousel-lg" alt="">
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-1 col-12">
            </div>
            <div class="col-lg-5 mt-lg-0 mt-5 col-12">
                <h4 class="text-light">
                    <?php echo $house['h_title']; ?>
                </h4>
                <h6 class="text-gray mt-2">
                    <?php echo time2str($house['created_at']); ?> در <?php echo $house['r_title']; ?> | <?php echo ($house['cat_title']); ?>
                </h6>
                <div class="row justify-content-between mt-4">
                    <div class="col">
                        <button class="btn-gold" onclick="
                        <?php if (!isset($_SESSION['user-login'])) : ?> 
                        document.getElementById('sign-in-modal').style.display='block'
                        <?php else : ?>
                        show_contacts(this)
                        <?php endif; ?>
                                                        ">اطالاعات تماس</button>
                    </div>
                    <div class="col justify-content-end d-flex">
                        <?php if (isset($_SESSION['user-login'])) :?>
                            <?php if(isset($bookmark)): ?>
                                <button id="bookmark-btn" class="kt-btn"><i id="bookmark" class="bi bi-bookmark-fill text-light"></i></button>
                            <?php else :?>
                                <button id="bookmark-btn" class="kt-btn"><i id="bookmark" class="bi bi-bookmark text-light"></i></button>
                            <?php endif; ?>
                            <form id="bookmark-form">
                                    <input type="hidden" value="<?php echo $house['h_id'] ?>" name="house_id">
                                    <input type="hidden" value="<?php echo $_SESSION['user-login']['id'] ?>" name="user_id">
                                </form>
                        <?php endif?>
                        <button id="btn-share" class="kt-btn"><i class="bi bi-share-fill text-light"></i></button>
                    </div>
                </div>
                <div style="display: none;" id="Contacts" class="row justify-content-between mt-4">
                    <div class="col align-items-center align-self-center">
                        <span class="text-gray"> شماره موبایل </span>
                    </div>
                    <div class="col justify-content-end d-flex align-items-center align-self-center">
                        <input type="text" class="d-none" value="<?php echo $house['call_number'] ?>" id="call-namber">
                        <span class="text-gold me-1"><?php echo $house['call_number'] ?></span>
                        <div class="tooltips">
                            <button style="background-color: none; border:none;" class="kt-btn" onclick="myFunction()" onmouseout="outFunc()">
                                <span class="text-light tooltipstext" id="myTooltip">کپی کردن</span>
                                <i class="fa-regular fa-copy text-white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 alert alert-info" role="alert">
                            <h6>هشدار پلیس</h6>
                            <p><small>لطفاً پیش از انجام معامله و هر نوع پرداخت وجه، از صحت کالا یا خدمات ارائه‌شده، به‌صورت حضوری اطمینان حاصل نمایید.</small></p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center  mt-5">
                    <div class="d-block border-end col-3 text-center">
                        <h6 class="text-gray">
                            متراژ
                        </h6>
                        <h6 class="text-light mt-2">
                            <?php echo $house['meterage']; ?>
                        </h6>
                    </div>
                    <div class="d-block border-end col-3 text-center">
                        <h6 class="text-gray">
                            ساخت
                        </h6>
                        <h6 class="text-light mt-2">
                            <?php echo $house['year_construction']; ?>
                        </h6>
                    </div>
                    <div class="d-block col-3 text-center">
                        <h6 class="text-gray">
                            اتاق
                        </h6>
                        <h6 class="text-light mt-2">
                            <?php echo $house['bedrooms']; ?>
                        </h6>
                    </div>
                </div>
                <div class="row px-2 mt-3">
                    <?php
                    if ($house['ad_title'] == 'فروش')
                        include "saleInfo.php";

                    elseif ($house['ad_title'] == 'رهن کامل')
                        include "mortgageInfo.php";

                    else
                        include "rentInfo.php";
                    ?>
                </div>
                <div class="row mt-4">
                    <div class="col-11 border-bottom">
                        <h5 class="text-gray">ویژگی ها و امکانات</h5>
                        <div class="row border-bottom">
                            <?php foreach($options as $option):?>
                                <div class="col-4 pb-3">
                                    <div class="bg-info-light py-4 px-0 text-light align-items-center align-self-center text-center">
                                        <i class="p-0 m-0 <?php echo $option['icon'];?> fs-1"></i>
                                        <p class="p-0 m-0 mt-3"><?php echo $option['title'];?></p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h5 class="text-gray"> توضیحات  </h5>
                        <p class="text-light text-break lh-lg txt-justify">
                            <?php echo $house['description'];?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
