<section id="mag-banner">
    <div class="container">
        <div class="row text-center pt-5">
            <div class="col-12 pt-5">
                <h2 class="text-gold text-shadow-dark">
                    <b>
                        مقالات آموزشی ملک آنلاین
                    </b>
                </h2>
            </div>
        </div>
    </div>
</section>
<section class="mt-6">
    <div class="container">
        <div class="row">
            <?php foreach ($articles as $article) : ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="?id=<?php echo $article['id']; ?>">
                        <div class="card mt-4 bg-dark-gray cursor-pointer" dir="rtl">
                            <img width="100%" height="280px" src="<?php echo $article['image']; ?>" class="card-img-top mag-img" title="<?php echo $article['title']; ?>" alt="<?php echo $article['title']; ?>">
                            <div class="card-body text-light">
                                <h6 class="card-title"><?php echo $article['title']; ?></h6>

                            </div>
                            <div class="d-flex justify-content-end p-1">
                                <a href="?id=<?php echo $article['id']; ?>" class="btn btn-sm btn-outline-warning">ادامه مطلب</a>
                            </div>
                            <div class="card-footer text-warning text-shadow-dark">
                                <?php echo time2str($article['created_at']); ?>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>