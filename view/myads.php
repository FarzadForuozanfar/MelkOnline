<?php
require_once "model/database.php";
include "controller/relative_time.php";
$user_id = (int) $_SESSION['user-login']['id'];

$records = $db->query("SELECT * FROM houses WHERE user_id = $user_id;");

$houses = [];
if ($records->num_rows > 0) {
    while (@$row = mysqli_fetch_array($records, MYSQLI_ASSOC)) {
        $houses[] = $row;
    }
}


?>
<header id="header-detail-profile" class="rounded-3 pt-4">
    <h4 class="text-center text-shadow-dark" style="color: white;">آگهی های من </h4>
</header>
<div class="w-100 bg-light p-4">
    <div class="row" id="main-container">
        <?php if (count($houses) > 0): ?>
            <table class="table table-striped table-hover">
                <thead class="text-center">
                    <tr class="text-center">
                        <th scope="col">شناسه</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تاریخ ایجاد</th>
                        <th scope="col">عملیات</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($houses as $house): ?>
                        <?php
                        $status = '';
                        if ($house['status'] == 'paid') {
                            $status = "پرداخت شده";
                            $color = "text-success";
                        } elseif ($house['status'] == 'unpaid') {
                            $status = 'پرداخت نشده';
                            $color = "text-primary";
                        } elseif ($house['status'] == 'canceled') {
                            $status = 'لغو شده';
                            $color = "text-secondary ";
                        } else {
                            $status = 'خطا';
                            $color = "text-danger";
                        }
                        ?>
                        <tr>
                            <th scope="row">
                                <a target="_blank" href="houses?id=<?= $house['id']; ?>">
                                    <?= $house['id']; ?>
                                </a>
                            </th>
                            <td><?= getPersianAdsStatus($house['Status']); ?></td>
                            <td dir="ltr"><?= miladi2jalali($house['created_at']); ?></td>
                            <td>
                                <?php if (in_array($house['Status'], ['Accept', 'Pending'])): ?>
                                <a class="btn btn-sm btn-outline-danger mx-2" href="removeAd?id=<?= $house['id']; ?>">
                                    حذف
                                </a>
                                <a class="btn btn-sm btn-info mx-2" href="updateAd?id=<?= $house['id']; ?>">
                                    ویرایش
                                </a>
                                <?php endif;?>
                                <a target="_blank" class="btn btn-sm btn-outline-primary mx-2"
                                    href="houses?id=<?= $house['id']; ?>">
                                    مشاهده
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="col-12 jutify-content-center text-center">
                <p>                آگهی موجود نمی باشد.
                </p>
                <button type="button" onclick="window.location.href='http://localhost/MelkOnline/create-ad'" class="ms-3 btn-gold">
                    افزودن آگهی
                </button>
            </div>
        <?php endif; ?>
    </div>
</div>