<!-- The Modal -->
<div id="sign-up-modal" class="modal">

  <!-- Modal Content -->
  <form id="sign-up-form" method="POST" class="modal-content animate" action="register">
    <span onclick="document.getElementById('sign-up-modal').style.display='none'" class="close" title="بستن فرم ورود">&times;</span>
    <div class="imgcontainer">
      <img src="view/assets/images/signup.jpg" width="35%" alt="Avatar" class="avatar">
    </div>

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
          <input name="confirm-password" type="password" class="form-control" id="floatingconfirmPassword" required>
          <label for="floatingconfirmPassword">تکرار رمز عبور</label>
        </div>
      </div>
      <button id="login" type="submit">ثبت نام</button>

    </div>
  </form>
</div>