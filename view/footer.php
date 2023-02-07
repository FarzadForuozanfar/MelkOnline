<section id="footer" class="bg-white p-0 pt-5 mt-5">
    <footer class="p-0 pt-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 pt-3 ">
                    <div class="bg-glass-footer p-3 text-break txt-justify align-items-center align-self-centeer">
                        <h5 class="text-gold">
                            درباره ملک آنلاین
                        </h5>
                        <p class="txt-justify" style="color: #fff;">
                            رویکرد شرکت ملک آنلاین ایجاد تلفیق صحیحی از فرایندهای کلاسیک معاملات املاک با فناوری‌های روز IT است تا دریافت خدمات برای مشتریان ساده‌ اما حرفه‌ای‌تر شود. در این سازمان معاملاتی، کارشناسان خبره در حوزه‌های معاملات املاک، حقوقی، IT، مارکتینگ، CRM و… در کنار هم می‌کوشند تا فرایندهای سنتی را در امر مشاوره امور ملکی تغییر داده و خدماتی ویژه و متفاوتی را که شایسته جامعه ایرانی باشد، ارائه دهند. ما در مسیر خلق این تحول بزرگ، گام‌هایی کوچک اما پیاپی برمی‌داریم. پس هر روز منتظر تغییری جدید در ملک آنلاین باشید
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 ps-3 pt-3 ">
                    <div class="bg-glass-footer p-3 text-break txt-justify align-items-center align-self-centeer">
                        <div class="row ">
                            <div class="col-1">
                                <i class="fa-solid fa-users text-gold fs-4 me-3"></i>
                            </div>
                            <div class="col-11 ps-5">
                                <h6 class="">
                                    <span style="color: white;">در شبکه های اجتماعی همراه ما باشید</span>
                                </h6>
                                <h5 class="text-gold ">
                                    <i class="fa-brands fa-facebook"></i>
                                    <i class="fa-brands fa-telegram mx-2"></i>
                                    <i class="fa-brands fa-instagram mx-2"></i>
                                    <i class="fa-brands fa-whatsapp mx-2"></i>
                                    <i class="fa-brands fa-linkedin mx-2"></i>
                                    <i class="fa-brands fa-twitter "></i>
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-1">
                                <i class="fa-solid fa-envelope text-gold fs-4 me-3"></i>
                            </div>
                            <div class="col-11">
                                <span style="color: white; font-family:iran">آیا مایلید نکات و فنون مهم معاملات املاک را برای شما ایمیل کنیم تا معاملات موفقی داشته باشید؟</span>
                            </div>
                        </div>
                        <div class="row d-flex mt-3">
                            <div class="col-12">
                                <input id="email" width="70%" height="100%" placeholder="ایمیل خود را وارد کنید" type="email" name="" id="">
                                <button id="submit-email">عضو خبرنامه شوید</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12  pb-2 pt-3">
                    <div class="bg-glass-footer p-3 text-break txt-justify align-items-center align-self-centeer">
                        <header>
                            <h5 class="text-gold">
                                آدرس شرکت
                            </h5>
                            <div class="row mb-4">
                                <div class="col-1">
                                    <i class="fa-solid fa-map text-gold fs-4"></i>
                                </div>
                                <div class="col-11">
                                    <span style="color: white;">
                                        خراسان رضوی , مشهد , بلوار فردوسی , فردوسی 15 , میلاد 20 , ساختمان نگین شرق
                                    </span>
                                </div>
                            </div>
                        </header>
                        <iframe width="95%" height="270" loading="lazy" allowfullscreen src="https://map.ir/lat/36.3238301/lng/59.5586102/z/17/p/%D9%85%D8%A7%20%D8%A7%DB%8C%D9%86%D8%AC%D8%A7%DB%8C%DB%8C%D9%85 " frameborder="1"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div style="background-color: black; color: white" class="col-12 p-4  text-center">
            <h6>کلیه حقوق این وبسایت محفوظ است</h6>
            <span>
                Copyright (c) 2022
            </span>
        </div>
    </footer>
</section>
<!-- end footer-->

<script src="view/assets/vendor/aos/aos.js"></script>
<script src="view/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<?php if ($_SESSION['location'] == "404" && !(isset($_SESSION['house-title']))) : ?>
    <script src="view/assets/js/scripts.js"></script>
<?php endif; ?>

<script src="view/assets/js/jquery.js"></script>
<?php if ($_SESSION['location'] == "index") : ?>
    <script src="view/assets/js/text-plugin.js"></script>
    <script src="view/assets/js/validation.js"></script>
<?php endif; ?>
<script src="view/assets/js/modal.js"></script>
<script src="view/assets/js/owl.carousel.js"></script>
<script src="view/assets/js/popper.min.js"></script>
<script src="view/assets/js/bootstrap.js"></script>
<?php if (isset($_SESSION['house-title'])) : ?>
<script src="view/assets/js/jquery.jcarousel.min.js"></script>
<script src="view/assets/js/jcarousel.basic.js"></script>
<?php endif; ?>
<script src="view/assets/js/main.js"></script>
<script>
    $(document).ready(function () {
        let cookies = document.cookie.split(';');
        //console.log(cookies[0].includes('mode'))
        if(cookies[0].includes('light'))
        var mode = "light";
        else if(cookies[0].includes('dark'))
        var mode = "dark";
        console.log(DarkLightMode(mode));
    });
    $('#adds-carousel').owlCarousel({
        loop: true,
        autoplayHoverPause: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2500,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: true
            },
            1000: {
                items: 3,
                nav: true
            }
        }
    })
    AOS.init();
    <?php if (isset($house)) :?>
        let h_title = " اشتراک گذاری آگهی "
        let h_url = "<?php echo isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '' ?>"
        const shareData = {
        title: h_title,
        url: h_url
        }

        const btn = document.getElementById('btn-share');

        // Share must be triggered by "user activation"
        if(btn)
        {
            btn.addEventListener('click', async () => {
            try {
                await navigator.share(shareData);
            } catch (err) {
            }
            });
        }
    <?php endif; unset($house) ?>
</script>
</body>

</html>