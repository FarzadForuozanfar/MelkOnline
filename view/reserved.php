<?php
require_once "model/database.php";
include "controller/relative_time.php";
$user_id = (int)$_SESSION['user-login']['id'];

$records = $db->query("SELECT *,hi.url,b.user_id,b.house_id, b.price AS ReservedPrice, h.created_at AS h_create FROM houses h 
LEFT join house_images hi on hi.house_id = h.id
LEFT JOIN reserved b ON b.house_id = h.id
WHERE b.user_id = $user_id
GROUP by h.id
ORDER BY h.created_at DESC");

$reserved_house = ($records->num_rows > 0) ? $records : null;
?>
<header id="header-detail-profile" class="rounded-3 pt-4">
    <h4 class="text-center text-shadow-dark" style="color: white;">رزرو شده ها </h4>
</header>
<div class="w-100 bg-light p-4">
    <div class="row" id="main-container">
        <?php if ($reserved_house) : ?>
            <?php foreach ($reserved_house as $house) : ?>
                <div class="col-lg-6 col-12" id="bookmark-container<?php echo $house['house_id']; ?>">
                    <div  class="card mb-3 p-3 pb-1">
                        <form id="bookmark-form<?php echo $house['house_id']; ?>">
                            <input type="hidden" value="<?php echo $house['house_id']; ?>" name="house_id">
                            <input type="hidden" value="<?php echo $house['user_id']; ?>" name="user_id">
                        </form>
                        <div class="row g-0">
                            <div class="col-4">
                                <img width="100%" height="120px" class="house-img-bookmark" src="<?php echo $house['url']; ?>" class="img-fluid" alt="<?php echo $house['title']; ?>" title="<?php echo $house['title']; ?>">
                            </div>
                            <div class="col-8 align-items-center align-self-center">
                                <div class="card-body ps-3 p-0 align-items-center align-self-center">
                                    <h6 style="color: #444;" class="card-title"><?php echo $house['title']; ?></h6>
                                    <p class="card-text"><small class="text-muted"><?php echo time2str($house['h_create']); ?></small></p>
                                    <p>مبلغ رزرو: <span class="text-gold"><?= number_format($house['ReservedPrice'] ?? 0) ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="col-12 jutify-content-center text-center">
                <p>درحال حاضر هیچ آگهی رزرو شده ای ندارید.</p>
            </div>
        <?php endif; ?>
    </div>
</div>