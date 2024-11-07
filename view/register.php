<style>
    .register-form {
        background-color: gray;
        padding: 10px;
        border-radius: 25px;
    }

    button {
        cursor: pointer;
    }

    .form-check {
        padding-right: 2.5rem !important;
    }
</style>
<div class="container my-5">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-5 col-md-6 col-12">
            <form class="register-form" method="POST" class="" action="register">
                <div class="row justify-content-center align-items-center">
                    <img class="w-75" src="view/assets/images/signup.jpg" alt="register">
                </div>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="">
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-3"></i>
                            <strong><?= $_SESSION['error'];?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php unset($_SESSION['error']); endif; ?>
                <div class="container-cotent">
                    <div class="form-floating mb-3" dir="rtl">
                        <input name="full-name" type="text" class="form-control" id="floatingInput" required>
                        <label for="floatingInput">نام و نام خانوادگی</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col form-floating">
                            <input name="phone" type="text" class="form-control" id="floatingInput" required>
                            <label for="floatingInput">موبایل</label>
                        </div>
                        <div class="col form-floating">
                            <input name="national-code" type="text" class="form-control" id="national-code" required>
                            <label for="national-code">کد ملی</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3" dir="rtl">
                        <input name="email" type="email" class="form-control" id="floatingPassword" required>
                        <label for="floatingPassword">ایمیل</label>
                    </div>
                    <div class="row">
                        <div class="form-floating col" dir="rtl">
                            <input name="password" type="password" class="form-control" id="floatingPassword" required>
                            <label for="floatingPassword">رمز عبور</label>
                        </div>
                        <div class="form-floating col" dir="rtl">
                            <input name="confirm-password" type="password" class="form-control"
                                id="floatingconfirmPassword" required>
                            <label for="floatingconfirmPassword">تکرار رمز عبور</label>
                        </div>
                        <div class="row mt-3 text-white">
                            <h6 class="">نوع کاربری :</h6>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="seller" name="type"
                                        id="seller-type">
                                    <label class="form-check-label" for="seller-type">
                                        فروشنده
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="buyer" name="type"
                                        id="buyer-type" checked>
                                    <label class="form-check-label" for="buyer-type">
                                        خریدار
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="login" type="submit">ثبت نام</button>

                </div>
            </form>
        </div>
    </div>
</div>