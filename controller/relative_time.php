<?php
function time2str($ts)
{
    if(!ctype_digit($ts))
        $ts = strtotime($ts);

    $diff = time() - $ts;
    if($diff == 0)
        return 'الان';
    elseif($diff > 0)
    {
        $day_diff = floor($diff / 86400);
        if($day_diff == 0)
        {
            if($diff < 60) return 'همین الان';
            if($diff < 120) return '1 دقیقه پیش';
            if($diff < 3600) return floor($diff / 60) . ' دقیقه پیش';
            if($diff < 7200) return '1 ساعت پیش';
            if($diff < 86400) return floor($diff / 3600) . ' ساعت پیش';
        }
        if($day_diff == 1) return 'دیروز';
        if($day_diff < 7) return $day_diff . ' روز پیش';
        if($day_diff < 31) return ceil($day_diff / 7) . ' هفته پیش';
        if($day_diff < 60) return 'ماه پیش ';
        if($day_diff > 60) return ceil($day_diff / 30) . ' ماه پیش';
        return ceil($day_diff / 30) . ' ماه پیش';//date('F Y', $ts);
    }
    else
    {
        $diff = abs($diff);
        $day_diff = floor($diff / 86400);
        if($day_diff == 0)
        {
            if($diff < 120) return 'چند لحظه پیش';
            if($diff < 3600) return 'در  ' . floor($diff / 60) . ' دقیقه';
            if($diff < 7200) return 'یک ساعت پیش';
            if($diff < 86400) return 'در ' . floor($diff / 3600) . ' ساعت';
        }
        if($day_diff == 1) return 'فردا';
        if($day_diff < 4) return date('l', $ts);
        if($day_diff < 7 + (7 - date('w'))) return 'هفته  بعد';
        if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
        if(date('n', $ts) == date('n') + 1) return 'next month';
        return date('F Y', $ts);
    }
}

?>