<?php 
require_once "./lib/jdf.php";


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

function add98Number($number)
{
    if (substr($number, 0, 2) == '09') {
        return '98' . substr($number, 1);
    } elseif (substr($number, 0, 2) == '98') {
        return $number;
    }
}


function miladi2jalali(string $dateTime, string $dateTimeSep = ' ')
{
    if ($dateTime == '') return '-';

    [$date, $time] = explode($dateTimeSep, $dateTime);
    $dateTimeStamp = strtotime($date);
    $day           = date('d',$dateTimeStamp);
    $month         = date('m',$dateTimeStamp);
    $year          = date('Y',$dateTimeStamp);
    $jalali        = gregorian_to_jalali($year,$month,$day );

    return implode('/', $jalali) . " $time ";
}