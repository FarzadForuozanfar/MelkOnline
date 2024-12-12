<?php
require_once "model/database.php";
include "controller/relative_time.php";
$user_id = (int) $_SESSION['user-login']['id'];

$records = $db->query("SELECT * FROM factors WHERE user_id = $user_id;");

$factors = [];
if ($records->num_rows > 0) {
    while (@$row = mysqli_fetch_array($records, MYSQLI_ASSOC))
    {
        $factors[] = $row;
    }
}


?>
<header id="header-detail-profile" class="rounded-3 pt-4">
    <h4 class="text-center text-shadow-dark" style="color: white;">پرداخت شده ها </h4>
</header>
<div class="w-100 bg-light p-4">
    <div class="row" id="main-container">
        <?php if (count($factors) > 0): ?>
            <table class="table table-striped table-hover">
                <thead class="text-center">
                    <tr class="text-center">
                        <th scope="col">شناسه فاکتور</th>
                        <th scope="col">شناسه آگهی</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">قیمت</th>
                        <th scope="col">تاریخ ایجاد</th>
                        <th scope="col">آخرین تغییر</th>
                        <th scope="col">تاریخ پرداخت</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($factors as $factor): ?>
                        <?php
                            $status = '';
                            if ($factor['status'] == 'paid') {
                                $status = "پرداخت شده";
                                $color = "text-success";
                            }
                            elseif ($factor['status'] == 'unpaid') {
                                $status = 'پرداخت نشده';
                                $color = "text-primary";
                            }
                            elseif ($factor['status'] == 'canceled') {
                                $status = 'لغو شده';
                                $color = "text-secondary ";
                            } else {
                                $status = 'خطا';
                                $color = "text-danger";   
                            }
                        ?>
                        <tr>
                            <th scope="row"><?= $factor['slug']; ?></th>
                            <td><?= $factor['house_id']; ?></td>
                            <td class="fw-bold <?= $color ?>"><?=  $status; ?></td>
                            <td><?= number_format($factor['price']); ?></td>
                            <td dir="ltr"><?= miladi2jalali($factor['set_time']); ?></td> 
                            <td dir="ltr"><?= miladi2jalali($factor['update_time']); ?></td>                        
                            <td dir="ltr"><?= miladi2jalali($factor['pay_time'] ?? ''); ?></td>                                               
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="col-12 jutify-content-center text-center">
                فاکتوری موجود نمی باشد.
            </div>
        <?php endif; ?>
    </div>
</div>