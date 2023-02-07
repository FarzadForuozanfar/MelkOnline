<header id="header-detail-profile" class="rounded-3 pt-4">
    <h4 class="text-center text-shadow-dark" style="color: white;"> تغییر رمز ورود </h4>
</header>
<div class="w-100 bg-light p-4">
        <?php if(isset($_SESSION['changePass-status']['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon-fill me-1"></i><strong><?php echo $_SESSION['changePass-status']['error']; ?></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php elseif(isset($_SESSION['changePass-status']['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-shield-fill-check me-1"></i><strong> <?php echo $_SESSION['changePass-status']['success']; ?></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    
    <form method="POST" action="changePassword">
        <div class="">
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label"> رمز فعلی : </label>
                <input required name="oldPass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-md-6 mb-3">
                <label for="exampleInputPassword1" class="form-label"> رمز جدید : </label>
                <input required name="newPass" type="password" class="form-control" id="exampleInputPassword1">
            </div>
        </div>
        <div class="">
            <div class="col-md-6 mb-3">
                <label for="exampleInputEmail1" class="form-label">تکرار رمز جدید : </label>
                <input required name="confirmPass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <button type="submit" class="btn-gold mt-4">تغییر رمز </button>
    </form>
</div>
<?php unset($_SESSION['changePass-status']); ?>
