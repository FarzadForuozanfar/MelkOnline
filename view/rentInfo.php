<div class="col-12 py-4 d-flex align_items-center align-self-center justify-content-between border-top">
    <h6 class="text-gray my-0 align_items-center align-self-center">
        رهن
    </h6>
    <h6 class="text-light my-0 align_items-center align-self-center">
        <?php echo number_format($house['mortgage']); ?> تومان
    </h6>
</div>
<div class="col-12 py-4 align_items-center align-self-center d-flex justify-content-between border-top">
    <h6 class="text-gray my-0 align_items-center align-self-center">
        اجاره ماهیانه 
    </h6>
    <h6 class="text-light my-0 align_items-center align-self-center">
        <?php echo number_format($house['rent']); ?> تومان
    </h6>
</div>
<div class="col-12 py-4 align_items-center align-self-center d-flex justify-content-between border-top">
    <h6 class="text-gray my-0 align_items-center align-self-center">
        رهن و اجاره 
    </h6>
    <h6 class="text-light my-0 align_items-center align-self-center">
        غیرقابل تبدیل
    </h6>
</div>

<div class="col-12 py-4 border-bottom align_items-center align-self-center d-flex justify-content-between border-top">
    <h6 class="text-gray my-0 align_items-center align-self-center">
        طبقه
    </h6>
    <h6 class="text-light my-0 align_items-center align-self-center">
        <?php echo ($house['floors']); ?>
    </h6>
</div>