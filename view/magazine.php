<section id="mag-banner">
    <div class="container">
        <div class="row text-center pt-5">
            <div class="col-12 pt-5">
                <h2 class="text-gold text-shadow-dark">
                    <b>
                        <?php echo $article['title']; ?>
                    </b>
                </h2>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-7 col-12">
                <img width="100%" height="500px" id="mag-cover" src="<?php echo $article['image']; ?>" title="<?php echo $article['title']; ?>" alt="<?php echo $article['title']; ?>">
                <h6 class="text-light d-flex mt-3 ps-2 align-items-center align-self-center">
                    <i class="fa-brands fa-readme me-2"></i><a href="magazine"><span class="txt-light me-2">خواندنی ها</span></a>/ <span class="ms-2 align-items-center align-self-center"><i class="fa-regular fa-calendar-days me-2"></i><span><?php echo time2str($article['created_at']); ?></span></span>
                </h6>
                <p class="txt-justify text-light mt-5 text-break lh-lg"><?php echo $article['text']; ?></p>
                <div class="container-fluid my-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 col-md-9 col-sm-11">
                            <div class="d-grid gap-2">
                                <button id="show-hide" class="btn btn-outline-warning" type="button"> نمایش نظرات</button>
                            </div>
                        </div>
                        <div id="comments-container" style="display: none">
                            <?php if (isset($_SESSION['user-login'])) : ?>
                                <form class="mt-3">
                                    <div class="mb-3">
                                        <label for="message" class="form-label text-light">دیدگاه شما :
                                            <span id="alert" class="d-none mt-2">
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    لطفا متنی برای دیگاه خود بنوبسید .
                                                </div>
                                            </span>
                                        </label>
                                        <textarea name="message" class="form-control" required placeholder="اینجا بنویسید ... " id="message" rows="3"></textarea>
                                        <button id="btn-send-comment" type="button" class="btn-gold mt-3">ارسال دیدگاه</button>
                                    </div>
                                </form>
                            <?php endif; ?>
                            <div class="mt-3" id="contentId">
                                <div id="comments-list" class="list-group overflow-y-auto h-32 dark-scroll">
                                    <?php foreach ($comments as $comment) : ?>
                                        <div>
                                            <div class="list-group-item list-group-item-action bg-dark-gray text-white" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <div class="d-flex align-items-center mb-1">
                                                        <img loading="lazy" class="profile-comments" src="view/assets/images/user.png" alt="">
                                                        <span class="ms-2 cursor-pointer"><?php echo $comment['name'] ?></span>
                                                    </div>
                                                    <span>
                                                        <small class="bg-warning text-white px-1 d-flex justify-content-center align-items-center align-self-center rounded">
                                                            <i class="fa-solid fa-clock me-2"></i>
                                                            <span><?php echo time2str($comment['created_at']) ?></span>
                                                        </small>
                                                    </span>
                                                </div>
                                                <p class="p-0"><?php echo $comment['text'] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-5 col-12">
                <ul class="list-group bg-light align-items-center align-self-center">
                    <header class="align-items-center p-1 align-self-center">
                        <h4 class="">جدیدترین ها</h4>
                    </header>
                        <?php foreach ($articles as $magazine) : ?>
                            <li class="list-group-item list-group-item-warning p-1">
                                <a href="?id=<?php echo $magazine['id']?>" class="card text-bg-warning mb-3" style="max-width: 540px;">
                                    <div class="row g-0">
                                        <div class="col-md-4 align-items-center align-self-center">
                                            <img src="<?php echo $magazine['image'] ?>" class="img-fluid rounded-start" title="<?php echo $magazine['title'] ?>" alt="<?php echo $magazine['title'] ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body pb-1 pt-2">
                                                <h5 class="card-title"><?php
                                                                        echo $magazine['title'];
                                                                        $date = G2J($magazine['created_at'])
                                                                        ?>
                                                </h5>
                                                <p class="card-text"></p>
                                                <p class="card-text"><small class="text-muted">
                                                        <i class="fa-regular fa-calendar-days me-2"></i>
                                                        <span class="">
                                                            <?php echo $date[2] ?>
                                                        </span>
                                                        <span class="">
                                                            <?php echo $date[1] ?>
                                                        </span>
                                                        <span class="">
                                                            <?php echo $date[0] ?>
                                                        </span>
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['user-login']['name'])):?>
        <input type="hidden" value="<?= $article['id']?>" id="mag_id">
        <input type="hidden" value="<?= $_SESSION['user-login']['name']?>" id="username">
        <input type="hidden" value="<?= $_SESSION['user-login']['id']?>" id="user_id">
    <?php endif; ?>
</section>
