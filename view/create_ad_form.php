<link rel="stylesheet" href="view/assets/css/multi_select.css" />
<style>
    input {
        padding: 0.575rem 0.75rem !important;
        margin: 0px 0px 18px 0px !important;
    }

    label {
        margin: 15px 0px 5px 0px;
    }


    .container-content {
        background-color: #ffffff;
        width: 100%;
        min-width: 300px;
        position: relative;
        margin: 50px auto;
        padding: 50px 20px;
        border-radius: 7px;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.05);
    }

    .container-content input[type="file"] {
        display: none;
    }

    .container-content label {
        display: block;
        position: relative;
        background-color: #025bee;
        color: #ffffff;
        font-size: 18px;
        text-align: center;
        width: 280px;
        padding: 18px 0;
        margin: auto;
        border-radius: 5px;
        cursor: pointer;
    }

    .container-content p {
        text-align: center;
        margin: 20px 0 30px 0;
    }

    .container-content #images {
        width: 100%;
        position: relative;
        margin: auto;
        display: flex;
        justify-content: space-evenly;
        gap: 20px;
        flex-wrap: wrap;
    }

    .container-content figure {
        width: 20%;
    }

    .container-content img {
        width: 100%;
    }

    .container-content figcaption {
        text-align: center;
        margin-top: 0.5vmin;
        font-size: 11px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    #card {
        position: relative;
        width: 320px;
        display: block;
        margin: 40px auto;
        text-align: center;
        font-family: 'Source Sans Pro', sans-serif;
        box-shadow: 10px 10px 20px #cecece;
    }

    #upper-side {
        padding: 2em;
        background-color: #8BC34A;
        display: block;
        color: #fff;
        border-top-right-radius: 8px;
        border-top-left-radius: 8px;
    }

    #checkmark {
        font-weight: lighter;
        fill: #fff;
        margin: -3.5em auto auto 20px;
    }

    #status {
        font-weight: lighter;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 1em;
        margin-top: -.2em;
        margin-bottom: 0;
    }

    #lower-side {
        padding: 2em 2em 5em 2em;
        background: rgb(248, 248, 248);
        display: block;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }

    #message {
        margin-top: -.5em;
        color: #757575;
        letter-spacing: 1px;
    }

    #contBtn {
        position: relative;
        top: 1.5em;
        text-decoration: none;
        background: #8bc34a;
        color: #fff;
        margin: auto;
        padding: 11px;
        -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
        -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
        box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
        border-radius: 25px;
        -webkit-transition: all .4s ease;
        -moz-transition: all .4s ease;
        -o-transition: all .4s ease;
        transition: all .4s ease;
    }

    #contBtn:hover {
        -webkit-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
        -moz-box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
        box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
        -webkit-transition: all .4s ease;
        -moz-transition: all .4s ease;
        -o-transition: all .4s ease;
        transition: all .4s ease;
    }
</style>
<div class="content-wrapper" style="min-height: 417px;">
    <div class="container pt-5">
        <div class="row px-4">
            <form enctype="multipart/form-data" id="newAds" class="needs-validation pb-3 text-white" novalidate>
                <header>
                    <h3>افزودن آگهی جدید</h3>
                </header>
                <div class="row mt-5">
                    <div class="col-md-6 form-group">
                        <label for="">عنوان آگهی</label>
                        <input value="<?php if (!empty($_POST['title']))
                            echo $_POST['title'] ?>" name="title" type="text" class="form-control"
                                placeholder="عنوان آگهی" required>
                            <div class="invalid-feedback">
                                این فیلد ضروری است !!!
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">متراژ</label>
                            <input value="<?php if (!empty($_POST['meterage']))
                            echo $_POST['meterage'] ?>" name="meterage" min="10" max="9000" type="number"
                                class="form-control" id="" placeholder="متراژ(متر)" required>
                            <div class="invalid-feedback">
                                این فیلد ضروری است !!!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">قیمت هر متر(تومان)</label>
                            <input value="<?php if (!empty($_POST['price_per_meter']))
                            echo $_POST['price_per_meter'] ?>" name="price_per_meter" min="0" type="number"
                                class="form-control" required>
                            <div class="invalid-feedback">
                                این فیلد ضروری است !!!
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">نوع آگهی</label>
                            <select required style="cursor: pointer;" onchange="show_adtype()" class="form-select"
                                name="ad_type" id="ad_type_options">
                                <option value="" selected>انتخاب کنید ...</option>
                            <?php foreach ($adTypes as $adtype): ?>
                                <option <?php $status = (!empty($_POST['ad_type'])) ? ((int) ($_POST['ad_type'] == (int) ($adtype['id'])) ? "selected" : '') : ''; ?>     <?= $status ?>
                                    value="<?= $adtype['id']; ?>">
                                    <?= $adtype['title']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            این فیلد ضروری است !!!
                        </div>
                    </div>
                </div>
                <div class="row <?= (!empty($_POST['ad_type'])) ? (($_POST['ad_type'] == 1) ? 'd-block' : 'd-none') : 'd-none' ?>"
                    id="sale">
                    <div class="col-md-6 form-group">
                        <label for="">قیمت کل(تومان)</label>
                        <input value="<?php if (!empty($_POST['price']))
                            echo $_POST['price'] ?>" name="price" min="0" max="" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row <?= (!empty($_POST['ad_type'])) ? (($_POST['ad_type'] == 2) ? 'd-flex' : 'd-none') : 'd-none' ?>"
                    id="rent">
                    <div class="col-md-6 form-group">
                        <label for="">قیمت اجاره(تومان)</label>
                        <input value="<?php if (!empty($_POST['rent']))
                            echo $_POST['rent'] ?>" name="rent" min="0" max="" type="number" class="form-control" id=""
                                placeholder="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">قیمت رهن(تومان)</label>
                            <input value="<?php if (!empty($_POST['mortgage1']))
                            echo $_POST['mortgage1'] ?>" name="mortgage1" min="0" max="" type="number"
                                class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="row <?= (!empty($_POST['ad_type'])) ? (($_POST['ad_type'] == 3) ? 'd-block' : 'd-none') : 'd-none' ?>"
                    id="mortgage">
                    <div class="col-md-6 form-group">
                        <label for="">قیمت رهن(تومان)</label>
                        <input value="<?php if (!empty($_POST['mortgage2']))
                            echo $_POST['mortgage2'] ?>" name="mortgage2" min="0" max="" type="number"
                                class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">دسته بندی</label>
                            <select required style="cursor: pointer;" class="form-select" name="category">
                                <option value="" selected>انتخاب کنید ...</option>
                            <?php foreach ($categories as $category): ?>
                                <?php if ($category['id'] != 100): ?>
                                    <option <?php $status = (!empty($_POST['category'])) ? ((int) ($_POST['category'] == (int) $category['id']) ? "selected" : '') : ''; ?>         <?= $status ?>
                                        value="<?= $category['id']; ?>">
                                        <?= $category['title']; ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            این فیلد ضروری است !!!
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="slim-select">امکانات</label>
                        <select placeholder="امکانات را انتخاب کنید" multiple name="option[]" id="slim-select">
                            <?php foreach ($options as $option): ?>
                                <option <?php
                                if (!empty($_POST['option'])) {
                                    if (count($_POST['option']) > 0) {
                                        foreach ($_POST['option'] as $post_option) {
                                            if ($post_option == $option['id'])
                                                echo " selected ";
                                        }
                                    }
                                }
                                ?> value="<?= $option['id'] ?>"><?= $option['title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">منطقه</label>
                        <select class="form-select" required name="region" aria-label="Default select example">
                            <option value="" selected>انتخاب کنید ...</option>
                            <?php foreach ($regions as $region): ?>
                                <option <?php $status = (!empty($_POST['region'])) ? ((int) ($_POST['region'] == (int) $region['id']) ? "selected" : '') : ''; ?>     <?= $status ?> value="<?= $region['id'] ?>">
                                    <?= $region['title'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">تعداد طبقات</label>
                        <input value="<?php if (!empty($_POST['floors']))
                            echo $_POST['floors'] ?>" type="number" min=1 max=15 required name="floors"
                                onchange="set_floor()" id="floors-input" class="form-control">
                            <div class="invalid-feedback">
                                این فیلد ضروری است !!!
                            </div>
                        </div>
                        <div class="col-md-6 form-group <?= (!empty($_POST['floors'])) ? 'd-block' : 'd-none' ?>"
                        id="floor-container">
                        <label for="">طبقه</label>
                        <input value="<?php if (!empty($_POST['floor']))
                            echo $_POST['floor'] ?>" type="number" name="floor" id="floor-input" class="form-control">
                            <div class="invalid-feedback">
                                این فیلد ضروری است !!!
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">سال ساخت</label>
                            <select required name="year" class="form-select" aria-label="Default select example">
                                <option value="" selected>انتخاب کنید ...</option>
                            <?php for ($i = 1403; 1380 <= $i; $i--): ?>
                                <option <?php $status = (!empty($_POST['year'])) ? ((int) ($_POST['year'] == $i) ? "selected" : '') : ''; ?>     <?= $status ?> value="<?= $i ?>">
                                    <?= $i ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                        <div class="invalid-feedback">
                            این فیلد ضروری است !!!
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="">تعداد اتاق</label>
                        <input value="<?php if (!empty($_POST['bedrooms']))
                            echo $_POST['bedrooms'] ?>" min="0" max="20" type="number" name="bedrooms" required id=""
                                class="form-control">
                            <div class="invalid-feedback">
                                این فیلد ضروری است !!!
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="">شماره همراه</label>
                            <input placeholder="09XXXXXXXXX" value="<?php if (!empty($_POST['call_number']))
                            echo $_POST['call_number'] ?>" type="text" name="call_number" required id=""
                                class="form-control">
                            <div class="invalid-feedback">
                                این فیلد ضروری است !!!
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTextarea" class="form-label">توضیحات </label>
                            <textarea name="description" class="form-control" rows="5" id="validationTextarea"
                                placeholder="لطفا برای بازدید بهتر توضیحات مناسبی برای آگهی خود بنویسید" required><?php if (!empty($_POST['description']))
                            echo $_POST['description'] ?></textarea>
                            <div class="invalid-feedback">
                                لطفا برای بازدید بهتر توضیحات مناسبی برای آگهی خود بنویسید
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationTextarea" class="form-label">آدرس </label>
                            <textarea name="address" class="form-control" rows="5" id="validationTextarea"
                                placeholder="آدرس کامل بهمراه کوچه و پلاک" required><?php if (!empty($_POST['address']))
                            echo $_POST['address'] ?></textarea>
                            <div class="invalid-feedback">
                                این فیلد ضروری است !!!
                            </div>
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="container-content" style="color: #000;">
                            <input name="images[]" type="file" id="file-input" accept="image/*" onchange="preview()"
                                multiple>
                            <label for="file-input">
                                <span>برای آپلود کلیک کنید</span>
                                <i class="fas fa-upload ms-2"></i> &nbsp;
                            </label>
                            <p id="num-of-files">هیچ عکسی بارگذاری نشده است</p>
                            <div id="images"></div>
                        </div>
                    </div>
                    <div class="w-100 d-flex justify-content-center">
                        <button id="post-btn" class="btn btn-primary w-25 py-3" type="button">ایجاد آگهی</button>
                    </div>
                </form>
            <?php if (isset($_FILES['images'])): ?>
                <img src="<?= $_FILES['images']['tmp_name'][0] ?>" alt="">
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    if (document.getElementById("ad_type_options")) {
        let select_elem = document.getElementById("ad_type_options");
        function show_adtype() {
            if (select_elem.value != "0" && (select_elem.value == "1" || select_elem.value == "2" || select_elem.value == "3")) {
                if (select_elem.value == "1") {
                    $("#sale").removeClass("d-none").addClass("d-flex");
                    $("#rent").removeClass("d-flex").addClass("d-none");
                    $("#mortgage").removeClass("d-flex").addClass("d-none");

                    $("#sale").children().children().attr("required", true);
                    $("#rent").children().children().attr("required", false);
                    $("#mortgage").children().children().attr("required", false);
                }
                else if (select_elem.value == "2") {
                    $("#sale").removeClass("d-flex").addClass("d-none");
                    $("#rent").removeClass("d-none").addClass("d-flex");
                    $("#mortgage").removeClass("d-flex").addClass("d-none");

                    $("#sale").children().children().attr("required", false);
                    $("#rent").children().children().attr("required", true);
                    $("#mortgage").children().children().attr("required", false);
                }
                else if (select_elem.value == "3") {
                    $("#sale").removeClass("d-flex").addClass("d-none");
                    $("#rent").removeClass("d-flex").addClass("d-none");
                    $("#mortgage").removeClass("d-none").addClass("d-flex");

                    $("#sale").children().children().attr("required", false);
                    $("#rent").children().children().attr("required", false);
                    $("#mortgage").children().children().attr("required", true);
                }
                else {
                    $("#sale").removeClass("d-flex").addClass("d-none");
                    $("#rent").removeClass("d-flex").addClass("d-none");
                    $("#mortgage").removeClass("d-flex").addClass("d-none");

                    $("#sale").children().children().attr("required", false);
                    $("#rent").children().children().attr("required", false);
                    $("#mortgage").children().children().attr("required", false);
                }
            }
            else {
                $("#sale").removeClass("d-flex").addClass("d-none");
                $("#rent").removeClass("d-flex").addClass("d-none");
                $("#mortgage").removeClass("d-flex").addClass("d-none");

                $("#sale").children().children().attr("required", false);
                $("#rent").children().children().attr("required", false);
                $("#mortgage").children().children().attr("required", false);
            }
        }
    }
    if (document.getElementsByClassName("ss-main").length) {
        $(".ss-placeholder").html('انتخاب کنید ...');
        $(".ss-main").hover(function add_Xmark() {
            let xmark = document.getElementsByClassName("ss-value-delete");
            if (xmark) {
                $(".ss-value-delete").addClass("fa-solid");
                $(".ss-value-delete").addClass("fa-xmark");
                $(".ss-value-delete").children().remove();
                $(".ss-placeholder").html('انتخاب کنید ...');
            }
        });
    }

    let fileInput = document.getElementById("file-input");
    let imageContainer = document.getElementById("images");
    let numOfFiles = document.getElementById("num-of-files");

    function preview() {
        imageContainer.innerHTML = "";
        numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

        for (i of fileInput.files) {
            let reader = new FileReader();
            let figure = document.createElement("figure");
            let figCap = document.createElement("figcaption");
            figCap.innerText = i.name;
            figure.appendChild(figCap);
            reader.onload = () => {
                let img = document.createElement("img");
                img.setAttribute("src", reader.result);
                figure.insertBefore(img, figCap);
            }
            imageContainer.appendChild(figure);
            reader.readAsDataURL(i);
        }
    }
    function set_floor() {
        if ($("#floors-input").val() >= 1) {
            $("#floor-container").removeClass("d-none").addClass("d-block");
            $("#floor-input").attr("min", "1");
            $("#floor-input").attr("required", true);
            $("#floor-input").attr("max", $("#floors-input").val());
        }
        else {
            $("#floor-container").removeClass("d-block").addClass("d-none");
            $("#floor-input").attr("min", "0");
            $("#floor-input").attr("required", false);
            $("#floor-input").attr("max", "0");
        }
    }


    let checkedAll = true;
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')
        const btn = document.getElementById('post-btn');
        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            btn.addEventListener('click', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    checkedAll = false;
                } else {
                    checkedAll = true;
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
    document.querySelector('#post-btn').addEventListener('click', function () {
        if (checkedAll) {
            const form = document.getElementById('newAds');
            let formData = new FormData(form);
            console.log(form, formData);
            fetch("CreateAd", {
                method: 'POST',
                body: formData
            }).then(response => response.json())
                .then(data => {
                    console.log(data);
                    form.innerHTML = '';
                    let successMsg = `
<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- partial:index.partial.html -->
<div id='card' class="animated fadeIn">
  <div id='upper-side'>
  <h1 class="bi bi-patch-check-fill text-center fs-1"></h1>
      <h3 id='status'>
      عملیات موفقیت آمیز بود
    </h3>
  </div>
  <div id='lower-side'>
    <p id='message'>
      آگهی شما با  موفقت در ملک آنلاین ثبت شد :)
    </p>
    <a href="myads" id="contBtn">برو به صفحه آگهی های من</a>
  </div>
</div>
<!-- partial -->
            
           
            </div>
        </div>
    </div>
</section>`;
                    form.innerHTML = successMsg;
                })
        }
    });
</script>
<script src="view/assets/js/multi_select.js"></script>
<script>
    new SlimSelect({
        select: '#slim-select',
        placeholder: 'امکانات را انتخاب کنید',
        showSearch: true, // shows search field
        searchText: 'متاسفانه پیدا نشد',
    });

    document.addEventListener("DOMContentLoaded", function (event) {
        document.querySelector('.ss-placeholder').textContent = 'امکانات را انتخاب کنید';
        console.log('window');
    });
</script>