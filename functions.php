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

/*Функция для отображения времени в формате д, ч, м, с*/
function timestamp_format ($timestamp) {
    $days=floor($timestamp/86400);
    $remain_time=$timestamp - $days*86400;
    $hours=floor($remain_time/3600);
    $remain_time=$remain_time - $hours*3600;
    $minutes=floor($remain_time/60);
    $remain_time=$remain_time - $minutes*60;
    $seconds=$remain_time;
  return $days . 'д. ' . $hours . 'ч. ' . $minutes . 'м. ' . $seconds . 'с.';
}






