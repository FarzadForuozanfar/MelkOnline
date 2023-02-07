<?php
require_once("lib/jdf.php");

function G2J($date){
    $time  = strtotime($date);

    $day   = date('d',$time);
    $month = date('m',$time);
    $year  = date('Y',$time);

    $jalali = explode("-",gregorian_to_jalali($year,$month,$day , '-'));

    $month_list = array("فروردین","اردیبهشت","خرداد","تیر","مرداد","شهریور","مهر","آبان","آذر","دی","بهمن","اسفند");
    $relative_date = array($jalali[0],$month_list[$jalali[1]], $jalali[2]);
    return $relative_date;
}
