<?php

/*Функция-шаблонизатор*/
function include_template($name, $data) {
$name = 'templates/' . $name;
$result = '';

if (!file_exists($name)) {
return $result;
}

ob_start();
extract($data);
require_once $name;

$result = ob_get_clean();

return $result;
}

/*Функция для отображения цены в рублях*/
function ruble_display ($number) {
return number_format ( ceil ($number), 0 , "." , " " ) . ' ₽';
}

/*Функция для форматирования временной метки(перевод секунд в дни, часы, минуты, секунды)*/
function timestamp_format ($timestamp) {
    $days_remainder=$timestamp%86400;
    $days=$timestamp/86400;
    if ($days<1) {$days=0;}
    else {$days=($timestamp-$days_remainder)/86400;}
    $remain_time=$timestamp-$days*86400;
    $hours_remainder=$remain_time%3600;
    $hours=$remain_time/3600;
    if ($hours<1) {$hours=0;}
    else {$hours=($remain_time-$hours_remainder)/3600;}
    $remain_time=$remain_time-$hours*3600;
    $minutes_remainder=$remain_time%60;
    $minutes=$remain_time/60;
    if ($minutes<1) {$minutes=0;}
    else {$minutes=($remain_time-$minutes_remainder)/60;}
    $remain_time=$remain_time-$minutes*60;
    $seconds=$remain_time;
    print($days . 'д. ' . $hours . 'ч. ' . $minutes . 'м. ' . $seconds . 'с.');
}


