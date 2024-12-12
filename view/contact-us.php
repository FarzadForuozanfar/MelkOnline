<section id="contact-us">
    <div class="container">
        <div class="row text-center pt-5">
            <h1 class="text-gold text-shadow-dark">
                <b> ارتباط با ما</b>
            </h1>
        </div>
    </div>
</section>
<section>
    <div class="container mt-5">
        <div class="row align-content-stretch flex-wrap">
            <div class="col-lg-6 col-md-6 col-12 p-1">
                <div class="bg-dark-gray rounded-4 p-3 align-content-stretch flex-wrap align-items-center align-self-center d-flex h-100">
                    <div class="row text-center">
                        <i class="fa-solid fa-house text-gold fs-1"></i>
                        <h5 class="text-light mt-3">حضوری در خدمت باشیم</h5>
                        <h6 class="text-gold mt-3">خراسان رضوی , مشهد , بلوار فردوسی , فردوسی 15 , میلاد 20 , ساختمان نگین شرق</h6>
                        <hr>
                    </div>
                    <div class="w-100 row ms-1 text-center align-items-center align-self-center justify-content-center">
                        <i class="fa-solid fa-envelope text-gold fs-1"></i>
                        <h5 class="text-light mt-3">ایمیل هم بزنید عالی است</h5>
                        <h6 class="text-gold mt-3">ایمیل : <a target="_blank" href="mailto:melkonline@info.com">melkonline@info.com</a></h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 p-1">
                <form id="message_data" class="bg-dark-gray rounded-4 p-3">
                    <h2 class="text-light">پیام شما</h2>
                    <div class="row ">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label text-light">نام : <b class="text-danger fs-4">*</b></label>
                            <input name="first_name" type="text" class="form-control" id="first_name" required>

                        </div>
                        <div class="col-md-6 mt-lg-0 mt-md-0 mt-3">
                            <label for="last_name" class="form-label text-light">نام خانوادگی : <b class="text-danger fs-4">*</b></label>
                            <input name="last_name" type="text" class="form-control" id="last_name" required>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="phone" class="form-label text-light">شماره همراه : <b class="text-danger fs-4">*</b></label>
                            <input name="phone" type="text" class="form-control" id="phone" required>

                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="mail" class="form-label text-light"> ایمیل : <b class="text-danger fs-4">*</b></label>
                            <input name="email" type="text" class="form-control" id="mail" required>
                        </div>
                        <div class="my-3">
                            <label for="message" class="form-label text-light">پیام شما : <b class="text-danger fs-4">*</b></label>
                            <textarea name="message" class="form-control" rows="4" id="message" placeholder="لطفا نظر و انتقاد و پیشنهادت رو برامون بنویس ..." required></textarea>
                            <div class="invalid-feedback">
                                لطفا متنی برای انتقاد یا پیشنهاد برایمان بنویسید .
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-8">
                            <button type="button" onclick="send_message('message_data')" class=" btn-gold">ارسال</button>
                        </div>
                        <div id="succes-alert" class="px-3 d-none">
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <i class="bi bi-check-circle-fill me-3"></i><strong>پیام شما با موفقیت ارسال شد</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        <div id="unsucces-alert" class="px-3 d-none">
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-3"></i><strong>خطایی رخ داده لطفا فیلد های بالا را پر کنید</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>