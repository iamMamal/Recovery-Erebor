<?php

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

if (!function_exists('toJalaliDatetime')) {
    function toJalaliDatetime($datetime)
    {
        if ($datetime) {
            return Jalalian::fromDateTime($datetime)->format('%A, %d %B  H:i');
        }
        return '';
    }
    function toJalaliDatetimeWithoutHour($datetime)
    {
        if ($datetime) {
            return Jalalian::fromDateTime($datetime)->format('%A, %d %B ');
        }
        return '';
    }
    if (!function_exists('jalaliAgo')) {
        function jalaliAgo($date)
        {
            if (!$date) {
                return '-';
            }

            return Jalalian::fromCarbon(\Carbon\Carbon::parse($date))->ago();
        }
    }

    if (!function_exists('jalaliDiffForHumans')) {
        function jalaliDiffForHumans($date)
        {
            if (!$date) {
                return '-';
            }

            $carbonDate = Carbon::parse($date);
            $now = Carbon::now();

            // فاصله به روز (گرد شده)
            $diffInDays = (int) round($now->diffInDays($carbonDate, false));

            if ($diffInDays === 0) {
                return 'امروز';
            }

            $diffAbs = abs($diffInDays);

            if ($diffInDays > 0) {
                return "در {$diffAbs} روز دیگر";
            } else {
                return "{$diffAbs} روز پیش";
            }
        }
    }

}
