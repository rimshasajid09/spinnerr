<?php

function app_time($end=null,$start=LARAVEL_START)
{
    $end = $end ?? microtime(true);
    return number_format(($end - $start)*1000,2).'ms';
}

function dbb($message,$level='info')
{
//    \Debugbar::info($message);
}

function str_to_bool($string)
{
    return filter_var($string,FILTER_VALIDATE_BOOLEAN);
}