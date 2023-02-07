<?php
include "model/database.php";
include "controller/relative_time.php";
$user_id = (int)$_SESSION['user-login']['id'];
$records = $db->query("SELECT *,hi.url,b.user_id,b.house_id, h.created_at AS h_create FROM houses h 
LEFT join house_images hi on hi.house_id = h.id
LEFT JOIN bookmarks b ON b.house_id = h.id
WHERE b.user_id = $user_id
GROUP by h.id
ORDER BY h.created_at DESC");
$bookmark_houses = ($records->num_rows > 0) ? $records : null;
?>
<header id="header-detail-profile" class="rounded-3 pt-4">
    <h4 class="text-center text-shadow-dark" style="color: white;"> نشان شده ها </h4>
</header>
<div class="w-100 bg-light p-4">
    <div class="row" id="main-container">
        <?php if ($bookmark_houses) : ?>
            <?php foreach ($bookmark_houses as $house) : ?>
                <div class="col-lg-6 col-12" id="bookmark-container<?php echo $house['house_id']; ?>">
                    <div  class="card mb-3 p-3 pb-1">
                        <form id="bookmark-form<?php echo $house['house_id']; ?>">
                            <input type="hidden" value="<?php echo $house['house_id']; ?>" name="house_id">
                            <input type="hidden" value="<?php echo $house['user_id']; ?>" name="user_id">
                        </form>
                        <a href="houses?id=<?php echo $house['house_id']; ?>" class="row g-0">
                            <div class="col-4">
                                <img width="100%" height="120px" class="house-img-bookmark" src="<?php echo $house['url']; ?>" class="img-fluid" alt="<?php echo $house['title']; ?>" title="<?php echo $house['title']; ?>">
                            </div>
                            <div class="col-8 align-items-center align-self-center">
                                <div class="card-body ps-3 p-0 align-items-center align-self-center">
                                    <h6 style="color: #444;" class="card-title"><?php echo $house['title']; ?></h6>
                                    <p class="card-text"><small class="text-muted"><?php echo time2str($house['h_create']); ?></small></p>
                                </div>
                            </div>
                        </a>
                        <footer class="d-flex justify-content-end">
                            <span onclick="bookmarkProcces('<?php echo $house['house_id']; ?>')" id="bookmark-btn<?php echo $house['house_id']; ?>" class="mx-2"><i id="bookmark<?php echo $house['house_id']; ?>" style="color: #555; cursor:pointer;" class="bi bi-bookmark-fill"></i></span>
                            <span class="mx-2"><b onclick="share(this)" style="color: #555; cursor:pointer;" class="bi bi-share-fill "></b></span>
                        </footer>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 jutify-content-center text-center">
                <img src="view/assets/images/download.svg">
                <h6 style="color: #555;">
                    <small> برای نشان‌کردن آگهی‌ها از دکمهٔ <span class="bi bi-bookmark"></span> در صفحهٔ آگهی استفاده کنید.</small>
                </h6>
            </div>
        <?php endif; ?>
    </div>
</div>
<script>
    function share(el)
    {
        let h_title = " اشتراک گذاری آگهی "
        let h_url = "<?php echo isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '' ?>"
        const shareData = {
        title: h_title,
        url: h_url
        }
    
        try {
            navigator.share(shareData);
        } 
        catch (err) {
        }
        
    }
</script>