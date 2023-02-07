<!-- The Modal -->
<div id="sign-in-modal" <?php if (!empty($_SESSION['error-login'])) :
                          echo 'style="display:block;" ';
                        endif ?> class="modal">

  <!-- Modal Content -->
  <form id="sign-in-form" method="post" class="modal-content animate" action="login">
    <span onclick="document.getElementById('sign-in-modal').style.display='none'" class="close" title="بستن فرم ورود">&times;</span>
    <div class="imgcontainer">
      <img src="view/assets/images/login.jpg" width="35%" alt="Avatar" class="avatar">
    </div>

    <div class="container-cotent">
      <?php if (!empty($_SESSION['error-login'])) : ?>
        <div class="">
          <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-3"></i><strong>ایمیل-موبایل یا رمز عبور اشتباه است !!! </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      <?php endif; ?>
      <div class="form-floating mb-3" dir="rtl">
        <input name="email-phone" type="text" class="form-control" id="floatingInput" required>
        <label for="floatingInput">موبایل یا ایمیل</label>
      </div>

      <div class="form-floating" dir="rtl">
        <input name="password" type="password" class="form-control" id="floatingPassword" required>
        <label for="floatingPassword">رمز ورود</label>
      </div>

      <button id="login" type="submit">ورود</button>

    </div>
  </form>
</div>
<?php unset($_SESSION['error-login']); ?>