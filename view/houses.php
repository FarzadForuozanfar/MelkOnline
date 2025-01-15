<style>
    select, option{
        color: black !important;
    }
</style>
<section class="p-0 bg-dark-gray">
    <div class="container">
        <div class="row py-5">
            <header class="text-light">
                <h5>
                    جستجوی پیشرفته <strong class="text-gold ms-2">ملک آنلاین</strong>
                </h5>
            </header>
            <form id="ultimateSearch" class="row mt-3">
                <div class="col-lg-3 col-md-4 col-sm-12 mt-lg-0 mt-3 ">
                    <label for="regions" class="text-white" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>منطقه : </label>
                    <div class="w-100 mt-1">
                        <select name="regions" class="form-select" aria-label="Default select example" id="regions" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>همه موارد</option>
                            <?php foreach ($regions as $region) : ?>
                                <?php if (isset($_SESSION['selected-regions'])) : ?>
                                    <?php if ($_SESSION['selected-regions']['id'] == $region['id']) : ?>
                                        <option selected value="<?php echo $region['id']; ?>"><?php echo $region['title']; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $region['id']; ?>"><?php echo $region['title']; ?></option>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <option value="<?php echo $region['id']; ?>"><?php echo $region['title']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mt-lg-0 mt-3">
                    <label for="ad_type" class="text-light">نوع معامله : </label>
                    <div class="w-100 mt-1 ">
                        <select name="ad_type" id="ad_type" onfocus='this.size=4;' onblur='this.size=1;' onchange='this.size=1; this.blur();' class="form-select" aria-label="Default select example">
                            <option selected>همه موارد</option>
                            <option value="1">خرید</option>
                            <option value="2">رهن / اجاره</option>
                            <option value="3">رهن کامل</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mt-lg-0 mt-3">
                    <label for="metrage" class="text-light" v>متراژ : </label>
                    <div class="w-100 mt-1 ">
                        <select name="metrage" class="form-select" aria-label="Default select example" id="metrage" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>همه موارد</option>
                            <option value="50">تا 50 متر</option>
                            <option value="100">تا 100 متر </option>
                            <option value="150">تا 150 متر</option>
                            <option value="200">تا 200 متر</option>
                            <option value="250">تا 250 متر</option>
                            <option value="300">تا 300 متر</option>
                            <option value="350">تا 350 متر</option>
                            <option value="400">تا 400 متر</option>
                            <option value="450">تا 450 متر</option>
                            <option value="500">تا 500 متر</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 mt-lg-0 mt-3">
                    <label for="category" class="text-light">نوع ملک : </label>
                    <div class="w-100 mt-1 ">
                        <select name="category" class="form-select" aria-label="Default select example" id="category" onfocus='this.size=5;' onblur='this.size=1;' onchange='this.size=1; this.blur();'>
                            <option selected>همه موارد</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-12 mt-4 d-flex justify-content-end">
                    <span class="align-items-end align-self-end">
                        <button type="button" id="ultimate-search-btn" class="btn-gold">جستجو <i class="bi bi-search ms-3"></i></button>
                    </span>
                </div>
                
            </form>
        </div>
    </div>
</section>
<div class="container mt-3 <?= (!isset($notFound)) ? 'd-block' : 'd-none'?>" id="sort-container">
    <div class="row align-items-center bg-dark-gray shadow-light py-4 px-0 rounded-3">
        <div class="col-lg-6 col-md-6 col-sm-12 align-items-center align-self-center">
            <span class="d-flex align-items-center align-self-center">
                <span class="text-white me-3">مرتب سازی بر اساس :</span>
                <div class="col-lg-4 col-md-7 col-sm-5">
                    <select form="ultimateSearch" class="form-select" style="width: 210px !important;" width="120px" name="sort" id="sort-filter">
                        <option selected value="newest">به روزترین آگهی</option>
                        <option class="text-dark" value="price_acc">قیمت از کمتر به بیشتر</option>
                        <option class="text-dark" value="price_des">قیمت از بیشتر به کمتر</option>
                        <option class="text-dark" value="met_des">بیشترین متراژ</option>
                        <option class="text-dark" value="met_acc">کمترین متراژ</option>
                    </select>
                </div>
            </span>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end align-items-center align-self-center">
            <span>
                <b class="text-gold me-1 fs-5">
                    <strong id="total-house"><?= (!isset($notFound)) ? $houses->num_rows : '' ?></strong>
                </b>
                <span class="text-white">
                    آگهی یافت شد !
                </span>
            </span>
        </div>
    </div>
</div>
<section class="p-0 mt-4" id="content-container" style="font-family:iran;">
    <?php if (isset($notFound)) : ?>
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
    <?php elseif (!isset($notFound)) : ?>

        <section class="p-0 m-0 mt-3">
            <div class="container-fluid">
                <div class="row px-lg-5" id="house-container">
                    <?php foreach ($houses as $house) : ?>
                        <div class="col-lg-6 col-12 mt-4 pe-3">
                            <div class="w-100 d-flex">
                                <div class="col-4">
                                    <div class="container-img-overlay">
                                        <img width="100%" height="180px" class="house-img border border-end-0" src="<?php echo $house['url']; ?>" title="<?php echo $house['h_title']; ?>" alt="<?php echo $house['h_title']; ?>">
                                        <div class="txt-overlay d-flex justify-content-between">
                                            <span>
                                                <?php echo time2str($house['created_at']); ?>
                                            </span>
                                            <span style="font-size: 0.95rem;">
                                                (<?php echo $house['total']; ?>) <i class="bi bi-camera-fill ms-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="position-relative col-8 bg-dark-gray round-4 pt-3 ps-2 text-light">
                                    <h6 class="line-clamp-1"><?php echo $house['h_title']; ?></h6>
                                    <small class="d-flex">
                                        <span class="badge text-bg-warning me-2"><?php echo $house['meterage']; ?> متر</span>
                                        <span class="badge text-bg-warning me-2"><?php echo $house['bedrooms']; ?> خواب</span>
                                        <span class="badge text-bg-warning"><?php
                                                                            echo ($house['ad_title']);
                                                                            ?>
                                        </span>
                                    </small>
                                    <?php if ($house['ad_title'] == 'فروش') : ?>
                                        <div class="mt-3 d-flex ">
                                            <small class="me-1">قیمت کل : </small>
                                            <h5 class="text-gold text-shadow-dark"><?php echo number_format($house['price']) ?> </h5>
                                            <small class="ms-2">تومان </small>
                                        </div>
                                        <div class="mt-2  d-flex">
                                            <small class="me-1">قیمت هرمتر مربع : </small>
                                            <h6 class="text-gold text-shadow-light"><?php echo number_format($house['price_per_meter']) ?> </h6>
                                            <small class="ms-2">تومان </small>
                                        </div>
                                    <?php elseif ($house['ad_title'] == 'رهن کامل') : ?>
                                        <div class="mt-4 d-flex ">
                                            <small class="me-1"> رهن : </small>
                                            <h5 class="text-gold text-shadow-dark"><?php echo number_format($house['mortgage']) ?> </h5>
                                            <small class="ms-2">تومان </small>
                                        </div>
                                    <?php else : ?>
                                        <div class="mt-3 d-flex ">
                                            <small class="me-1"> رهن : </small>
                                            <h5 class="text-gold text-shadow-dark"><?php echo number_format($house['mortgage']) ?> </h5>
                                            <small class="ms-2">تومان </small>
                                        </div>
                                        <div class="mt-2  d-flex">
                                            <small class="me-1"> اجاره : </small>
                                            <h6 class="text-gold text-shadow-light"><?php echo number_format($house['rent']) ?> </h6>
                                            <small class="ms-2">تومان </small>
                                        </div>
                                    <?php endif; ?>
                                    <div class="position-absolute pe-2 bottom-0 col-12 d-flex justify-content-between">
                                        <small class="text-light"><i class="bi bi-geo-alt-fill text-gold me-1"></i><?php echo $house['r_title']; ?></small>
                                        <a href="?id=<?php echo $house['house_id']; ?>" class="btn btn-sm rounded-bl-4  btn-outline-warning">مشاهده جزییات</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
</section>

<?php endif;
    unset($_SESSION['selected-regions']);
    unset($notFound);
?>