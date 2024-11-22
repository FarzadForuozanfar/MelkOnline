<section class="p-0 m-0 mt-5">
    <div class="container">
        <div class="row flex-lg-row-reverse">
            <div class="col-lg-6 col-12">
                <div id="add-carousel" class="owl-carousel owl-theme text-light">
                    <?php foreach ($images as $image): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo $image['url']; ?>" width="600px" height="400px" class="img-carousel-lg"
                                alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (!isset($_SESSION['admin']) && isset($_SESSION['user-login'])): ?>
                    <div data-bs-toggle="modal" data-bs-target="#reserve-modal" style="cursor: pointer;"
                        class="row justify-content-between mt-4 text-white border-top border-bottom py-3">
                        <div class="d-flex align-items-center col">
                            <i class="fa-solid fa-money-check-dollar  me-3 fs-5"></i>
                            <span>رزرو آگهی</span>
                        </div>
                        <div class="d-flex justify-content-end align-items-center col">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-1 col-12">
            </div>
            <div class="col-lg-5 mt-lg-0 mt-5 col-12">
                <h4 class="text-light">
                    <?php echo $house['h_title']; ?>
                </h4>
                <h6 class="text-gray mt-2">
                    <?php echo time2str($house['created_at']); ?> در <?php echo $house['r_title']; ?> |
                    <?php echo ($house['cat_title']); ?>
                </h6>
                <div class="row justify-content-between mt-4">
                    <div class="col">
                        <?php if (isset($_SESSION['admin'])): ?>
                            <button class="btn-gold" onclick="show_contacts(this)">اطالاعات تماس</button>
                        <?php else: ?>
                            <button class="btn-gold" onclick="
                            <?php if (!isset($_SESSION['user-login'])): ?> 
                            document.getElementById('sign-in-modal').style.display='block'
                            <?php else: ?>
                            show_contacts(this)
                            <?php endif; ?>">اطالاعات تماس</button>
                        <?php endif; ?>
                    </div>
                    <div class="col justify-content-end d-flex">
                        <?php if (isset($_SESSION['user-login'])): ?>
                            <?php if (isset($bookmark)): ?>
                                <button id="bookmark-btn" class="kt-btn"><i id="bookmark"
                                        class="bi bi-bookmark-fill text-light"></i></button>
                            <?php else: ?>
                                <button id="bookmark-btn" class="kt-btn"><i id="bookmark"
                                        class="bi bi-bookmark text-light"></i></button>
                            <?php endif; ?>
                            <form id="bookmark-form">
                                <input type="hidden" value="<?php echo $house['h_id'] ?>" name="house_id">
                                <input type="hidden" value="<?php echo $_SESSION['user-login']['id'] ?>" name="user_id">
                            </form>
                        <?php endif ?>
                        <button id="btn-share" class="kt-btn"><i class="bi bi-share-fill text-light"></i></button>
                    </div>
                </div>
                <div style="display: none;" id="Contacts" class="row justify-content-between mt-4">
                    <div class="col align-items-center align-self-center">
                        <span class="text-gray"> شماره موبایل </span>
                    </div>
                    <div class="col justify-content-end d-flex align-items-center align-self-center">
                        <input type="text" class="d-none" value="<?php echo $house['call_number'] ?>" id="call-namber">
                        <a href="tel:+"></a>
                        <a href="tel:<?= add98Number($house['call_number']); ?>" class="text-gold me-1"><?php echo $house['call_number'] ?></a>
                        <div class="tooltips">
                            <button style="background-color: none; border:none;" class="kt-btn" onclick="myFunction()"
                                onmouseout="outFunc()">
                                <span class="text-light tooltipstext" id="myTooltip">کپی کردن</span>
                                <i class="fa-regular fa-copy text-white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 alert alert-info" role="alert">
                            <h6>هشدار پلیس</h6>
                            <p><small>لطفاً پیش از انجام معامله و هر نوع پرداخت وجه، از صحت کالا یا خدمات ارائه‌شده،
                                    به‌صورت حضوری اطمینان حاصل نمایید.</small></p>
                        </div>
                    </div>
                </div>
                <?php if (!isset($_SESSION['admin'])): ?>
                    <div data-bs-toggle="modal" data-bs-target="#report-modal" style="cursor: pointer;"
                        class="row justify-content-between mt-4 text-white border-top border-bottom py-3">
                        <div class="d-flex align-items-center col">
                            <i class="fa-solid fa-triangle-exclamation me-3 fs-5"></i>
                            <span>گزارش آگهی</span>
                        </div>
                        <div class="d-flex justify-content-end align-items-center col">
                            <i class="fa-solid fa-angle-left"></i>
                        </div>
                    </div>
                <?php else: ?>
                    <div>
                        <p class="text-white mt-4">
                            وضعیت آگهی: <b><?= getPersianAdsStatus($house['Status']) ?></b>
                        </p>
                    </div>
                <?php endif; ?>
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
                    {
                        include "saleInfo.php";
                        $reserved_price = getReservedPrice($house['price']);
                    }
                    elseif ($house['ad_title'] == 'رهن کامل')
                    {
                        include "mortgageInfo.php";
                        $reserved_price = getReservedPrice($house['mortgage']);
                    }
                    else
                    {
                        include "rentInfo.php";
                        $reserved_price = getReservedPrice($house['mortgage']);
                    }
                    ?>
                </div>
                <div class="row mt-4">
                    <div class="col-11 border-bottom">
                        <h5 class="text-gray">ویژگی ها و امکانات</h5>
                        <div class="row border-bottom">
                            <?php foreach ($options as $option): ?>
                                <div class="col-4 pb-3">
                                    <div
                                        class="bg-info-light py-4 px-0 text-light align-items-center align-self-center text-center">
                                        <i class="p-0 m-0 <?php echo $option['icon']; ?> fs-1"></i>
                                        <p class="p-0 m-0 mt-3"><?php echo $option['title']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h5 class="text-gray"> توضیحات </h5>
                        <p class="text-light text-break lh-lg txt-justify">
                            <?php echo $house['description']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once "utility/reports_type_list.php"; ?>
<div id="report-modal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">گزارش آگهی !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>مشکل آگهی چیست ؟</h4>
                <form id="report-form">
                    <?php foreach (REPORTS_LIST as $item): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="<?= $item ?>" name="report_type">
                            <label class="form-check-label">
                                <?= $item ?>
                            </label>
                            <input type="hidden" name="house_id" value="<?= $house['h_id']; ?>">
                        </div>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                <button type="button" id="send-report-btn" onclick="sendReport(<?= $house['h_id']; ?>)"
                    class="btn btn-primary">تایید</button>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['user-login'])): ?>
    <div id="reserve-modal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">شرایط رزرو آگهی</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-bold fw-bold">راهنمای پرداخت امن</h4>
                    <p class="text-break text-justify">در «پرداخت امن» برای جلوگیری از هر نوع کلاهبرداری و داشتن معامله‌ای
                        امن، پول پرداخت شده توسط خریدار در حسابی واسط قرار می‌گیرد و تنها پس از تایید دریافت کالا یا خدمات
                        توسط خریدار به حساب فروشنده واریز می‌شود. همچنین فروشنده هم مطمئن است که پولش در حسابی امن قرار دارد
                        و می‌تواند کالای خود را با اطمینان ارسال کند.

                        «پرداخت امن»، از جمله سرویس‌هایی است که به عنوان بخشی از راهکار تازه «کنار ملک آنلاین» به ملک آنلاین اضافه شده
                        است. با استفاده از «کنار ملک آنلاین»، حالا کاربران ملک آنلاین می‌توانند از خدمات شرکت‌ها و استارت‌آپ‌های دیگر
                        در مراحل انجام معامله استفاده کنند تا تجربه‌ای امن‌تر و راحت‌تر داشته باشند. در حال حاضر سرویس دهنده
                        «تومن» در حال ارائه افزونه‌ٔ «پرداخت امن» در ملک آنلاین است و این شرکت پاسخگوی کاربران درباره هر نوع سوال
                        و مشکلی در این رابطه خواهد بود. برای رفع هر نوع ابهام و مشکلی در رابطه با «پرداخت امن» باید با
                        پشتیبانی «تومن» به شماره تلفن ۰۲۱۹۱۰۰۷۸۹۱ تماس بگیرید.
                    </p>
                    <br>
                    <h4 class="wp-block-heading" id="h-استفاده-از-پرداخت-امن-به-چه-صورت-است"><strong>استفاده از «پرداخت امن»
                            به چه صورت است؟</strong></h4>
                    <p class="has-medium-font-size">به صورت خلاصه مسیر استفاده از «پرداخت امن» این مراحل را دارد:&zwnj;</p>
                    <p>۱- آگهی مورد نظرتان را در انتخاب کنید.</p>
                    <p>۲- وارد صفحه جزییات شوید.</p>
                    <p>۳- با فروشنده یا خریدار برای استفاده از «پرداخت امن» هماهنگ کنید.</p>
                    <p>۴- رزرو آگهی را انتخاب کنید.</p>
                    <p>۵- مبلغ بیعانه برابر با یک درصد مبلغ رهن یا خرید آگهی می باشد</p>
                    <p>۶- حداقل مبلغ بیعانه ۱۰۰,۰۰۰ تومان می باشد.</p>
                    <p>۷- شروع فرآیند پرداخت امن را بزنید.</p>
                    <p>&nbsp;</p>
                    <br>
                    <p class="text-center fs-4">
                        مبلغ پراختی شما : <strong class="text-gold"><?= number_format($reserved_price) ?></strong> تومان است.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                    <button type="button" id="send-report-btn" onclick="sendReport(<?= $house['h_id']; ?>)"
                        class="btn btn-primary">پرداخت</button>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<script>
    const sendBtnEl = document.getElementById('send-report-btn');
    function sendReport(house_id) {
        const selected = document.querySelector('input[name="report_type"]:checked');
        if (selected) {
            sendBtnEl.setAttribute('disabled', true);
            fetch('send-report', {
                mode: 'no-cors',
                method: "POST",
                body: new FormData(document.getElementById('report-form'))
            })
                .then(response => response.json())
                .then(data => {
                    Toast.fire({
                        icon: data.status,
                        title: data.message
                    });
                })
                .catch((xhr, status, msg) => {
                    Toast.fire({
                        icon: "error",
                        title: msg
                    });
                })
                .finally(() => sendBtnEl.removeAttribute('disabled'))
        } else {
            Toast.fire({
                icon: "error",
                title: "انتخاب یکی از موارد الزامی است."
            });
        }
    }
</script>