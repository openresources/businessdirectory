<?php

use Carbon\Carbon;

if (!function_exists('militaryTime')) {
    function militaryTime($carbonTime)
    {
        return formatDate($carbonTime, 'h:i');
    }
}

if (!function_exists('formatDate')) {
    function formatDate($carbonDate, $dateFormat = 'j, M Y')
    {
        return Carbon::parse($carbonDate)->format($dateFormat);
    }
}
