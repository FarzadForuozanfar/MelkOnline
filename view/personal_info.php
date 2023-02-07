<header id="header-detail-profile" class="rounded-3 pt-4">
    <h4 class="text-center text-shadow-dark" style="color: white;"> ویرایش اطلاعات فردی </h4>
</header>
<div class="w-100 bg-light p-4">
    <form method="POST" action="changePersonalInfo">
        <?php if (isset($_SESSION['changeInfo']['error'])) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon-fill me-1"></i><strong><?php echo $_SESSION['changeInfo']['error']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif (isset($_SESSION['changeInfo']['success'])) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-shield-fill-check me-1"></i><strong> <?php echo $_SESSION['changeInfo']['success']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">نام و نام خانوادگی : </label>
                <input name="name" required value="<?php echo $_SESSION['user-login']['name'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputPassword1" class="form-label"> موبایل : </label>
                <input name="phone" required value="<?php echo $_SESSION['user-login']['phone'] ?>" type="text" class="form-control" id="exampleInputPassword1">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">شماره ملی : </label>
                <input name="national-code" required value="<?php echo $_SESSION['user-login']['national_code'] ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputPassword1" class="form-label">ایمیل : </label>
                <input name="email" required value="<?php echo $_SESSION['user-login']['email'] ?>" type="text" class="form-control" id="exampleInputPassword1">
            </div>
        </div>
        <button type="submit" class="btn-gold mt-4">اعمال</button>
    </form>
</div>
<?php unset($_SESSION['changeInfo']);?>