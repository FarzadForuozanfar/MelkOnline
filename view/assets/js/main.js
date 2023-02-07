function timeDifference(current, previous) {

    var msPerMinute = 60 * 1000;
    var msPerHour = msPerMinute * 60;
    var msPerDay = msPerHour * 24;
    var msPerWeek = msPerDay * 7;
    var msPerMonth = msPerDay * 30;
    var msPerYear = msPerDay * 365;

    var elapsed = current - previous;

    if (elapsed < msPerMinute) {
        return Math.round(elapsed / 1000) + ' ثانیه پیش ';
    }

    else if (elapsed < msPerHour) {
        return Math.round(elapsed / msPerMinute) + ' دقیقه پیش ';
    }

    else if (elapsed < msPerDay) {
        return Math.round(elapsed / msPerHour) + ' ساعت پیش';
    }

    else if (elapsed < msPerWeek) {
        return Math.round(elapsed / msPerDay) + ' روز پیش ';
    }

    else if (elapsed < msPerMonth) {
        return Math.round(elapsed / msPerDay) + ' هفته پیش ';
    }

    else if (elapsed < msPerYear) {
        return Math.round(elapsed / msPerMonth) + ' ماه پیش ';
    }

    else {
        return Math.round(elapsed / msPerYear) + ' سال پیش ';
    }
}
function number_format(number, decimals, decPoint, thousandsSep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    const n = !isFinite(+number) ? 0 : +number
    const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    const dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    let s = ''
    const toFixedFix = function (n, prec) {
        if (('' + n).indexOf('e') === -1) {
            return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
            const arr = ('' + n).split('e')
            let sig = ''
            if (+arr[1] + prec > 0) {
                sig = '+'
            }
            return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
    }
    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }
    return s.join(dec)
}
const info_json = [
    {
        "head-header": "خرید ملک در مشهد",
        "body-header": "چگونه مشاور خرید شما خواهیم بود؟",
        "body-txt": "اگر به دنبال خرید آپارتمانی برای سکونت یا سرمایه گذاری در منطقهه هاشمیه یا شهرک غرب هستید، خوشحالیم که اینجا هستید! چرا که ملک آنلاین تمرکز فعالیتش در فاز نخست روی این دو منطقه است، فکر می‌کنیم بتوانیم کمک بزرگی به شما بکنیم.",
        "adds-img": "view/assets/images/for_buy.png",
        "icon1": "fa-solid fa-clock text-gold fs-1",
        "icon2": "fa-solid fa-map text-gold fs-1",
        "icon3": "fa-solid fa-comments text-gold fs-1",
        "title1": "در زمان کوتاه‌تر و با آرامش به نتیجه عالی برسید",
        "title2": "منطقه را بهتر از هر کسی میشناسیم!",
        "title3": "ابتدا خوب و دقیق می‌شنویم تا مشاوره درست دهیم!",
        "summery1": "دیگر نیازی نیست که زمان زیادی را صرف بررسی آگهی‌های دیوار و ارزیابی صحت و سقم آنها کنید و بارها و بارها به هر مشاوری از ابتدا تمام خواسته های خود را بگویید و وقت ارزشمند خود و خانوادتان را صرف بازدید از هر مورد و هر ملکی که در منطقه هست (بدون در نظر گرفتن خواسته ها، بودجه و سلیقه شما) کنید و با مشاوران بی شماری در تماس باشید! چرا که در مناطق تحت پوشش شرکت، اکثر ملک های عرضه شده در سامانه ما موجود و توسط کارشناسان ما بررسی و کارشناسی شده‌اند. ما از ثبت نیازهایتان تا معرفی ملک های مناسب شما، مذاکره با مالک، بررسی حقوقی دقیق اسناد و سوابق و انعقاد قرارداد مطمئن، پیگیری تعهدات طرف مقابل، زمان تحویل و زمان تنظیم سند در دفترخانه حضورا در کنارتان هستیم.",
        "summery2": "ما تیمی از کارشناسان خبره داریم که به صورت کاملا متمرکز در مناطق هاشمیه و شهرک غرب فعالیت می‌کنند. با کمک این کارشناسان خیابان به خیابان ملک‌های این منطقه را کارشناسی و تحلیل فنی کرده و از این طریق دیتابیسی جامع از آپارتمان های آماده خرید یا پیش خرید را فراهم کرده ایم. به این ترتیب خیالتان راحت باشد که کامل‌ترین گزینه‌ها برای انتخاب در اختیارتان قرار خواهد داشت.",
        "summery3": "با توجه با اینکه اکثر ملک‌های منطقه را بررسی و کارشناسی دقیق و برای ارائه به شما آماده شده، سعی می‌کنیم شنونده خوبی باشیم و با حوصله و دقت روی درک درست نیازها و خواسته‌های شما تمرکز کنیم. به این ترتیب می‌توانیم بهترین تطبیق را بین درخواست شما و ملک‌های کارشناسی شده سامانه جامع شرکت داشته باشیم و بهترین پیشنهادات را به شما ارائه دهیم."
    },
    {
        "head-header": "فروش ملک در مشهد",
        "body-header": "ملک شما را در کوتاه‌ترین زمان و با قیمت مناسب بفروشیم؟ ",
        "body-txt": "اگر می‌خواهید خانه خود در منطقه هاشمیه یا شهرک غرب را به سرعت و با قیمت مناسب بفروشید، می‌توانید مسئولیت فروش را به ما بسپارید. ما در ملک آنلاین با زیرساخت‌های تبلیغاتی و اطلاع رسانی گسترده خود و به واسطه فعالیت تخصصی در این دو منطقه، بانک اطلاعاتی بزرگی از متقاضیان خرید ملک را در اختیار داریم و هر لحظه آن را آپدیت کرده و گسترش می‌دهیم. به این ترتیب می‌توانیم به سرعت ملک شما را به متقاضیان بسیاری معرفی کنیم و فرایند معامله را با استانداردهای بالا تا آخرین مرحله برای شما پیش ببریم.",
        "adds-img": "view/assets/images/for_sale.png",
        "icon1": "fa-solid fa-clock text-gold fs-1",
        "icon2": "fa-solid fa-bullhorn text-gold fs-1",
        "icon3": "fa-solid fa-comments text-gold fs-1",
        "title1": "تنها به یک کارشناس بازدید دهید و در زمان صرفه جویی کنید",
        "title2": "بانک اطلاعاتی متفاضیان، به معامله شما سرعت می‌بخشد !",
        "title3": "ابتدا خوب و دقیق می‌شنویم تا مشاوره درست دهیم!",
        "summery1": "دیگر نیازی نیست که زمان زیادی را صرف بررسی آگهی‌های دیوار و ارزیابی صحت و سقم آنها کنید و بارها و بارها به هر مشاوری از ابتدا تمام خواسته های خود را بگویید و وقت ارزشمند خود و خانوادتان را صرف بازدید از هر مورد و هر ملکی که در منطقه هست (بدون در نظر گرفتن خواسته ها، بودجه و سلیقه شما) کنید و با مشاوران بی شماری در تماس باشید!",
        "summery2": "ما تیمی از کارشناسان خبره داریم که به صورت کاملا متمرکز در مناطق هاشمیه و شهرک غرب فعالیت می‌کنند. با کمک این کارشناسان خیابان به خیابان ملک‌های این منطقه را کارشناسی و تحلیل فنی کرده و از این طریق دیتابیسی جامع از آپارتمان های آماده اجاره را فراهم کرده‌ایم. به این ترتیب خیالتان راحت باشد که کامل‌ترین گزینه‌ها برای انتخاب در اختیارتان قرار خواهد داشت..",
        "summery3": "با توجه به استفاده از سیستم‌های هوشمند ثبت و تحلیل داده شرکت، هر سال نیز با توجه به شناخت کامل نیازها، سلیقه و خواسته‌های شما و آپدیت سریع آنها در تماس با شما، آپارتمان‌های جدیدی را پیش از پایان موعد اجاره‌نامه‌تان به شما پیشنهاد می‌کنیم. تا به سرعت ملک جدیدی را انتخاب و جا‌به‌جایی راحت و بی دغدغه‌ای داشته باشید."
    },
    {
        "head-header": "اجاره کردن ملک در مشهد",
        "body-header": "چگونه مشاور شما برای اجاره کردن خواهیم بود؟",
        "body-txt": "در شرکت ملک ‌آنلاین ما با استفاده از متدهای نوین خدمات‌دهی، مسیر معامله شما را بسیار آسان کرده‌ایم. به شکلی که از انتخاب خانه مناسب تا مذاکره با مالک، بررسی مدارک حقوقی و انعقاد اجاره‌نامه ملک و تحویل ملک را به سرعت برای شما پیش خواهیم برد.",
        "adds-img": "view/assets/images/for_rent.png",
        "icon1": "fa-solid fa-clock text-gold fs-1",
        "icon2": "fa-solid fa-map text-gold fs-1",
        "icon3": "fa-solid fa-arrows-rotate text-gold fs-1",
        "title1": "در زمان کوتاه‌تر و با آرامش به نتیجه عالی برسید",
        "title2": "منطقه را بهتر از هر کسی میشناسیم!",
        "title3": "اجاره کردن در سالهای بعدی آسانتر و سریع‌تر از امسال!",
        "summery1": "دیگر نیازی نیست که زمان زیادی را صرف بررسی آگهی‌های دیوار و ارزیابی صحت و سقم آنها کنید و بارها و بارها به هر مشاوری از ابتدا تمام خواسته های خود را بگویید و وقت ارزشمند خود و خانوادتان را صرف بازدید از هر مورد و هر ملکی که در منطقه هست (بدون در نظر گرفتن خواسته ها، بودجه و سلیقه شما) کنید و با مشاوران بی شماری در تماس باشید! چرا که در مناطق تحت پوشش شرکت، اکثر ملک های عرضه شده در سامانه ما موجود و توسط کارشناسان ما بررسی و کارشناسی شده‌اند. ما از ثبت نیازهایتان تا معرفی ملک های مناسب شما، مذاکره با مالک، بررسی حقوقی دقیق اسناد و سوابق و انعقاد قرارداد مطمئن، پیگیری تعهدات طرف مقابل، زمان تحویل و زمان تنظیم سند در دفترخانه حضورا در کنارتان هستیم.",
        "summery2": "ما تیمی از کارشناسان خبره داریم که به صورت کاملا متمرکز در مناطق هاشمیه و شهرک غرب فعالیت می‌کنند. با کمک این کارشناسان خیابان به خیابان ملک‌های این منطقه را کارشناسی و تحلیل فنی کرده و از این طریق دیتابیسی جامع از آپارتمان های آماده خرید یا پیش خرید را فراهم کرده ایم. به این ترتیب خیالتان راحت باشد که کامل‌ترین گزینه‌ها برای انتخاب در اختیارتان قرار خواهد داشت.",
        "summery3": "با توجه با اینکه اکثر ملک‌های منطقه را بررسی و کارشناسی دقیق و برای ارائه به شما آماده شده، سعی می‌کنیم شنونده خوبی باشیم و با حوصله و دقت روی درک درست نیازها و خواسته‌های شما تمرکز کنیم. به این ترتیب می‌توانیم بهترین تطبیق را بین درخواست شما و ملک‌های کارشناسی شده سامانه جامع شرکت داشته باشیم و بهترین پیشنهادات را به شما ارائه دهیم."
    },
    {
        "head-header": "اجاره دادن ملک در مشهد",
        "body-header": "چگونه مشاور  شما برای اجاره دادن ملک تان خواهیم بود؟",
        "body-txt": "اگر به دنبال خرید آپارتمانی برای سکونت یا سرمایه گذاری در منطقه هاشمیه یا شهرک غرب هستید، خوشحالیم که اینجا هستید! چرا که ملک آنلاین تمرکز فعالیتش در فاز نخست روی این دو منطقه است، فکر می‌کنیم بتوانیم کمک بزرگی به شما بکنیم.",
        "adds-img": "view/assets/images/to_rent.png",
        "icon1": "fa-solid fa-clock text-gold fs-1",
        "icon2": "fa-solid fa-map text-gold fs-1",
        "icon3": "fa-solid fa-arrows-rotate text-gold fs-1",
        "title1": "تنها به یک کارشناس بازدید دهید و در زمان صرفه جویی کنید",
        "title2": "بانک اطلاعاتی متفاضیان، به معامله شما سرعت می‌بخشد",
        "title3": "اجاره کردن در سالهای بعدی آسانتر و سریع‌تر از امسال",
        "summery1": "در این سازمان معاملاتی ملک شما به صورت حرفه‌ای و تنها توسط یکی از کارشناسان ما بررسی و ارزیابی دقیق شده و تمامی اطلاعات آن با جزئیات کامل در سیستم جامع ملک آنلاین ثبت می‌شود. از این پس در تمام شرکت از همین اطلاعات موجود استفاده است. به این ترتیب دیگر نیازی نیست، همچون املاک سنتی به تک تک مشاوران املاک ملک را بازدید داده و زمان زیادی از دست بدهید.",
        "summery2": ".از آنجایی که ملک آنلاین یک شرکت هوشمند در حوزه معاملات است، تمامی کارشناسان ما از سیستم‌های نوین ثبت و پردازش اطلاعات استفاده می‌کنند. از این رو درخواست تمام متفاضیان خرید ملک در این منطقه در سیستم جامع ما موجود است. به این ترتیب پس ثبت ملک شما در سیستم، به سرعت ملک‌تان به آنهایی که خواسته‌هایشان بیشترین میزان تطابق را با ویژگی های ملک شما دارد، معرفی می‌شود.",
        "summery3": "با توجه به استفاده از سیستم‌های هوشمند ثبت و تحلیل داده شرکت، هر سال نیز با توجه به شناخت ملک شما و  خواسته‌هایتان و به‌روز‌رسانی سریع آنها در تماس با شما، متقاضیان جدیدی را پیش از پایان موعد اجاره‌نامه به شما پیشنهاد می‌کنیم. تا به سرعت متقاضی جدیدی را انتخاب و جا‌به‌جایی مستاجران سریع و بی دغدغه انجام شود. و در صورتی که قصد تمدید اجاره را داشته باشید نیز تمدید قانونی اجاره‌نامه را با شرایط جدید مورد توافق طرفین در سامانه ملی کدرهگیری ثبت خواهیم کرد."
    }
]

function show_detail(index, btn) {
    let info = info_json[index]
    $(".btn-blue").removeClass("active");
    btn.classList.add("active");
    $("#head-header").text(info["head-header"]);
    $("#body-header").text(info["body-header"]);
    $("#body-txt").text(info["body-txt"]);
    $("#adds-img").attr("src", info["adds-img"]);
    $("#icon1").removeClass().addClass(info["icon1"]);
    $("#icon2").removeClass().addClass(info["icon2"]);
    $("#icon3").removeClass().addClass(info["icon3"]);
    $("#title1").text(info["title1"]);
    $("#title2").text(info["title2"]);
    $("#title3").text(info["title3"]);
    $("#summery1").text(info["summery1"]);
    $("#summery2").text(info["summery2"]);
    $("#summery3").text(info["summery3"]);
    console.log(info["adds-img"]);
}

function DarkLightMode(mode = null) {
    if (mode == null) {
        if ($("body").hasClass("bg-dark")) {
            $("body").removeClass('bg-dark').addClass("bg-light");
            $(".btn-light-mode").removeClass().addClass("btn-dark-mode");
            $(".dark-scroll").removeClass("dark-scroll").addClass("light-scroll");
            $(".fa-sun").removeClass("fa-sun").addClass("fa-moon");
            $(".txt-light").removeClass("txt-light").addClass("txt-dark");
            $(".bg-dark-gray").removeClass("bg-dark-gray").addClass("bg-light-gray");
            $(".text-light").removeClass("text-light").addClass("text-dark");
            $(".text-white").removeClass("text-white").addClass("text-dark");
            $(".bg-dark-gray-glass").removeClass("bg-dark-gray-glass").addClass("bg-light-gray-glass");
            $(".btn-outline-light").removeClass("btn-outline-light").addClass("btn-outline-dark");
            document.cookie = "mode=light";
        }
        else if ($("body").hasClass("bg-light")) {
            $("body").removeClass('bg-light').addClass("bg-dark");
            $(".light-scroll").removeClass("light-scroll").addClass("dark-scroll");
            $(".btn-dark-mode").removeClass().addClass("btn-light-mode");
            $(".txt-dark").removeClass("txt-dark").addClass("txt-light");
            $(".fa-moon").removeClass("fa-moon").addClass("fa-sun");
            $(".bg-light-gray").removeClass("bg-light-gray").addClass("bg-dark-gray");
            $(".text-dark").removeClass("text-dark").addClass("text-light");
            $(".text-white").removeClass("text-white").addClass("text-dark");
            $(".bg-light-gray-glass").removeClass("bg-light-gray-glass").addClass("bg-dark-gray-glass");
            $(".btn-outline-dark").removeClass("btn-outline-dark").addClass("btn-outline-light");
            document.cookie = "mode=dark";
        }
    }
    else if (mode == 'dark') {
        console.log(mode, 1);
        $("body").removeClass('bg-light').addClass("bg-dark");
        $(".light-scroll").removeClass("light-scroll").addClass("dark-scroll");
        $(".btn-dark-mode").removeClass().addClass("btn-light-mode");
        $(".txt-dark").removeClass("txt-dark").addClass("txt-light");
        $(".fa-moon").removeClass("fa-moon").addClass("fa-sun");
        $(".bg-light-gray").removeClass("bg-light-gray").addClass("bg-dark-gray");

        $(".bg-light-gray-glass").removeClass("bg-light-gray-glass").addClass("bg-dark-gray-glass");
        $(".btn-outline-dark").removeClass("btn-outline-dark").addClass("btn-outline-light");
    }
    else if (mode == 'light') {
        console.log(mode, 2);
        $("body").removeClass("bg-dark").addClass("bg-light");
        $(".btn-light-mode").removeClass().addClass("btn-dark-mode");
        $(".dark-scroll").removeClass("dark-scroll").addClass("light-scroll");
        $(".fa-sun").removeClass("fa-sun").addClass("fa-moon");
        $(".txt-light").removeClass("txt-light").addClass("txt-dark");
        $(".bg-dark-gray").removeClass("bg-dark-gray").addClass("bg-light-gray");
        $(".text-light").removeClass("text-light").addClass("text-dark");
        $(".text-white").removeClass("text-white").addClass("text-dark");
        $(".bg-dark-gray-glass").removeClass("bg-dark-gray-glass").addClass("bg-light-gray-glass");
        $(".btn-outline-light").removeClass("btn-outline-light").addClass("btn-outline-dark");
    }
    return (mode);
}

const mybutton = document.getElementById("scroll-up-btn");

if (mybutton) {
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
            mybutton.style.display = "block";
            mybutton.classList.add("animate__animated");
            mybutton.classList.add("animate__bounce");
            mybutton.classList.add("animate__infinite");
        } else {
            mybutton.style.display = "none";
        }
    }

    function scroll_up() {
        window.scroll({
            top: 0,
            left: 0,
            behavior: 'smooth'
        });
    }
}

function send_message(form_id) {
    let form = document.getElementById(form_id);
    let formData = new FormData(form);
    let unsucces_alert = document.getElementById("unsucces-alert");
    let succes_alert = document.getElementById("succes-alert");

    fetch("SendMessage", {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(data => {
            console.table(data, data[0], data[0]['status'])
            if (data[0]['status'] == 'success') {
                succes_alert.classList.remove("d-none");
                succes_alert.classList.add("d-block");
                unsucces_alert.classList.add("d-none");
                unsucces_alert.classList.remove("d-block");
                $("#first_name").val("");
                $("#last_name").val("");
                $("#mail").val("");
                $("#phone").val("");
                $("#message").val("");
            }
            else {
                console.log("fill the field");
                succes_alert.classList.remove("d-block");
                succes_alert.classList.add("d-none");
                unsucces_alert.classList.add("d-block");
                unsucces_alert.classList.remove("d-none");
            }
        }).catch(error => console.log(error));
}

let display = "none";
$("#show-hide").click(function () {
    $("#comments-container").toggle(1000);
});

$("#btn-send-comment").click(function () {
    console.log((document.getElementById('message')));
    if ($("#message").val()) {
        $("#alert").removeClass("d-block").addClass("d-none");
        const message_txt = document.getElementById('message').value;
        const userid = document.getElementById('user_id').value;
        const magid = document.getElementById('mag_id').value;
        let Comments_list = document.getElementById('comments-list');
        console.log(message_txt)
        $.ajax({
            type: "POST",
            url: 'send-comment',
            dataType: 'json',
            data: { message: message_txt, mag_id: magid, user_id: userid },
            success:
                function (response) {
                    if (response['status'] == 'success') {
                        let cookies = document.cookie.split(';');
                        if (cookies[0].includes('light')) {
                            var txt = "dark";
                            var mode = "light";
                        }
                        else if (cookies[0].includes('dark')) {
                            var mode = "dark";
                            var txt = "light";
                        }

                        document.getElementById('message').innerHTML = '';
                        alert('دیدگاه شما با موفقیت پست شد');
                        let username = document.getElementById('username').value;
                        let comment = `
                            <div class="list-group-item list-group-item-action bg-${mode}-gray text-${txt}" aria-current="true">
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="d-flex align-items-center mb-1">
                                        <img loading="lazy" class="profile-comments" src="view/assets/images/user.png" alt="">
                                        <span class="ms-2 cursor-pointer">${username}</span>
                                    </div>
                                    <span>
                                        <small class="bg-warning text-${txt} px-1 d-flex justify-content-center align-items-center align-self-center rounded">
                                            <i class="fa-solid fa-clock me-2"></i>
                                            <span>همین الان </span>
                                        </small>
                                    </span>
                                </div>
                                <p class="p-0">${message_txt}</p>
                            </div>`;
                        let comment_div = document.createElement('div');
                        comment_div.innerHTML += comment;
                        Comments_list.prepend(comment_div);
                        document.getElementById('message').innerHTML = '';
                        $('#message').val('')

                    }
                    else {
                        alert('1خطایی رخ داده لطفا دوباره سعی کنید');
                    }
                }
            ,
            error:
                function (error) {
                    let error_msg = error;
                    alert('2خطایی رخ داده لطفا دوباره سعی کنید')
                    console.log(error_msg)
                }
        })
    }
    else {
        $("#alert").removeClass("d-none").addClass("d-block");
    }
});

function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function (e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].toString().substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function (e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

function myFunction() {
    var copyText = document.getElementById("call-namber");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    console.log(copyText);
    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "کپی شد ";
}

function outFunc() {
    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "کپی کردن";
}
function show_contacts(btn) {
    document.getElementById('Contacts').style.display = 'flex';
    btn.disabled = true;
    btn.style.cursor = "not-allowed";
    btn.classList.remove('btn-gold');
    btn.classList.add('disable-btn');
}
let regions = [];
$("#myInput").click(function () {
    regions = []
    fetch("GetRegion", {
        method: "GET"
    }).then(response => response.json())
        .then(data => {
            for (var i = 0; i < data.length; i++) {
                regions.push(data[i]['title']);
            }
            autocomplete(document.getElementById("myInput"), regions);
        }).catch(error => { console.log(error) })
});

$("#bookmark-btn").click(function () {
    const form = document.getElementById("bookmark-form");
    let formData = new FormData(form);
    fetch("ManageBookmarks", {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(data => {
            console.log(data);
            if ($("#bookmark").hasClass("bi-bookmark-fill")) {
                $("#bookmark").removeClass("bi-bookmark-fill").addClass("bi-bookmark");
            }
            else if ($("#bookmark").hasClass("bi-bookmark")) {
                $("#bookmark").removeClass("bi-bookmark").addClass("bi-bookmark-fill");
            }
        }).catch(error => console.log(error))
});

function bookmarkProcces(house_id) {
    const form = document.getElementById("bookmark-form" + house_id);
    const container = document.getElementById("bookmark-container" + house_id);
    let formData = new FormData(form);
    fetch("ManageBookmarks", {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(data => {
            if (data[0]['status'] == "success") {
                console.table();
                if ($(container).parent(".row").children().length == 1) {
                    let new_container = `<div class="col-12 jutify-content-center text-center">
                                            <img src="view/assets/images/download.svg">
                                            <h6 style="color: #555;">
                                                <small> برای نشان‌کردن آگهی‌ها از دکمهٔ <span class="bi bi-bookmark"></span> در صفحهٔ آگهی استفاده کنید.</small>
                                            </h6>
                                        </div>`;
                    $(container).parent(".row").html(new_container);
                }
                container.remove();
            }
        }).catch(error => console.log(error))
}
$("#myInput").change(function () {
    if ($(this).val()) {
        $($("#search-btn")).prop('disabled', false);
    }
    else {
        $($("#search-btn")).prop('disabled', true);
    }
});
$("#ultimate-search-btn").click(function () {
    const form = document.getElementById("ultimateSearch");
    const container = document.getElementById("content-container");
    container.innerHTML = "";
    let house_container = document.getElementById("house-container");
    let formData = new FormData(form);
    var stat = null;
    fetch("searchHouse", {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(records => {
            let cookies = document.cookie.split(';');
            if (cookies[0].includes('light')) {
                var txt = "dark";
                var mode = "light";
            }
            else if (cookies[0].includes('dark')) {
                var mode = "dark";
                var txt = "light";
            }
            if (house_container) {
                house_container.innerHTML = "";
                stat = true;
            }
            else {
                stat = false;
                house_container = document.createElement('div');
                house_container.classList.add('row');
                house_container.classList.add('px-lg-5');
            }
            if (records['status']['status'] == 'success') {
                var element;
                for (let record of records['houses']) {
                    var ad_type
                    if (record['ad_type_id'] == "1") {
                        ad_type = `
                        <div class="mt-3 d-flex ">
                            <small class="me-1">قیمت کل : </small>
                            <h5 class="text-gold text-shadow-${mode}">${number_format(record['price'])}</h5>
                            <small class="ms-2">تومان </small>
                        </div>
                        <div class="mt-2  d-flex">
                            <small class="me-1">قیمت هرمتر مربع : </small>
                            <h6 class="text-gold text-shadow-${txt}">${number_format(record['price_per_meter'])}</h6>
                            <small class="ms-2">تومان </small>
                        </div>`

                    }
                    else if (record['ad_type_id'] == "3") {
                        ad_type = `
                        <div class="mt-4 d-flex ">
                            <small class="me-1"> رهن : </small>
                            <h5 class="text-gold text-shadow-${mode}">${number_format(record['mortgage'])} </h5>
                            <small class="ms-2">تومان </small>
                        </div>`
                    }
                    else if (record['ad_type_id'] == "2") {
                        ad_type = `
                        <div class="mt-3 d-flex ">
                            <small class="me-1"> رهن : </small>
                            <h5 class="text-gold text-shadow-${txt}">${number_format(record['mortgage'])}</h5>
                            <small class="ms-2">تومان </small>
                        </div>
                    <div class="mt-2  d-flex">
                        <small class="me-1"> اجاره : </small>
                        <h6 class="text-gold text-shadow-${mode}">${number_format(record['rent'])}</h6>
                        <small class="ms-2">تومان </small>
                    </div>`
                    }
                    element = `
                    <div class="col-lg-6 col-12 mt-4 pe-3">
                        <div style="width: 99%;" class="d-flex">
                            <div class="col-4">
                                <div class="container-img-overlay">
                                    <img width="100%" height="180px" class="house-img border border-end-0" src="${record['url']}" title="${record['h_title']}" alt="${record['h_title']} ">
                                        <div class="txt-overlay d-flex justify-content-between">
                                            <span>
                                                ${record['relativeTime']} 
                                            </span>
                                            <span style="font-size: 0.95rem;">
                                                ${(record['total'])}<i class="bi bi-camera-fill ms-1"></i>
                                            </span>
                                        </div>
                                </div>
                            </div>
                            <div class="position-relative col-8 bg-${mode}-gray round-4 pt-3 ps-2 text-${txt}">
                                <h6 class="line-clamp-1">${record['h_title']} </h6>
                                <small class="d-flex">
                                    <span class="badge text-bg-warning me-2">${record['meterage']}  متر</span>
                                    <span class="badge text-bg-warning me-2">${record['bedrooms']}  خواب</span>
                                    <span class="badge text-bg-warning">
                                        ${record['ad_title']}                        
                                    </span>
                                </small>
                                ${ad_type}

                                <div class="position-absolute pe-2 bottom-0 col-12 d-flex justify-content-between">
                                    <small class="text-${txt}"><i class="bi bi-geo-alt-fill text-gold me-1"></i>${record['r_title']} </small>
                                    <a href="?id=${record['house_id']} " class="btn btn-sm rounded-bl-4  btn-outline-warning">مشاهده جزییات</a>
                                </div>
                            </div>
                        </div>
                    </div>`;
                    $("#total-house").html(records['houses'].length);
                    house_container.innerHTML += element;
                    if (document.getElementById('sort-container')) {
                        document.getElementById('sort-container').classList.remove('d-none');
                        document.getElementById('sort-container').classList.add('d-block');
                    }
                }
                if (stat) {
                    container.appendChild(house_container);
                }
                else {
                    container.appendChild(house_container);
                }
                console.log(house_container)
            }
            else {
                console.table(records);
                if (document.getElementById('sort-container')) {
                    document.getElementById('sort-container').style.display = "none";
                }
                element = `<section class="p-0 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 bg-dark-gray text-center rounded-3 p-4">
                            <h5 class="text-light my-4">مطابق با جستجوی شما در این لحظه موردی یافت نشد.</h5>
                            <h3 class="text-light my-4">اما</h3>
                            <h5 class="text-light my-4">از آنجا که <span class="text-gold">هر روز</span> املاک جدیدی به سایت افزوده می شود و ماندگاری املاک در سایت <span class="text-gold">کوتاه مدت</span> می باشد،</h5>
                            <h5 class="text-light my-4">لطفاً <span class="text-gold">فردا و روزهای دیگر</span> هم به سایت مراجعه کنید.</h5>
                        </div>
                    </div>
                </div>
                </section>`;
                let div = document.createElement('div');
                div.innerHTML = element;
                container.appendChild(div);
            }
        }).catch(error => {
            if (document.getElementById('sort-container')) {
                document.getElementById('sort-container').style.display = "none";
            }
            element = `<section class="p-0 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12 bg-dark-gray text-center rounded-3 p-4">
                            <h5 class="text-light my-4">مطابق با جستجوی شما در این لحظه موردی یافت نشد.</h5>
                            <h3 class="text-light my-4">اما</h3>
                            <h5 class="text-light my-4">از آنجا که <span class="text-gold">هر روز</span> املاک جدیدی به سایت افزوده می شود و ماندگاری املاک در سایت <span class="text-gold">کوتاه مدت</span> می باشد،</h5>
                            <h5 class="text-light my-4">لطفاً <span class="text-gold">فردا و روزهای دیگر</span> هم به سایت مراجعه کنید.</h5>
                        </div>
                    </div>
                </div>
                </section>`;
            let div = document.createElement('div');
            div.innerHTML = element;
            container.appendChild(div);
            console.log(error)
        })

});
//action="searchHouse" method="POST" 