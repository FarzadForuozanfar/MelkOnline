<?php 

function getPersianAdsStatus($status) {
    $Statuses = [
        'Accept'    => 'فعال',
        'Reserved'  => 'رزرو شده',
        'Suspend'   => 'رد شده',
        'Pending'   => 'در انتظار تایید'
    ];

    return $Statuses[$status] ?? 'نامشخص';
}

function getPersianReportStatus($status) {
    $Statuses = [
        'Accept'    => 'تایید شده',
        'Reject'    => "پذیرفته نشده",
        'Pending'   => "بررسی نشده"
    ];

    return $Statuses[$status] ?? 'نامشخص';
}

function getReservedPrice($price)
{
    $price  = intval($price);
    $result = round($price / 100) > 100000 ? round($price / 100) : 100000;
    $result = $result > 1000000 ? 1000000 : $result;
    return $result;
}