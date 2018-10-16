<?php

/**
 * Функция-шаблонизатор получает название шаблона и данные для него, возвращает результат в виде шаблона с переданными данными
 * @param $name
 * @param $data
 * @return false|string
 */
function include_template($name, $data)
{
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

/**
 * Представляет переданное число в виде числа с пробелами между разрядами, кратными тысяче, а также со знаком рубля после числа
 * @param $number
 * @return string
 */
function ruble_display($number)
{
    return number_format(ceil($number), 0, ".", " ") . ' ₽';
}

/**
 * Переводит временную метку или секунды в формат дней, часов, минут, секунд
 *
 * @param $timestamp int Временная метка или количество секунд
 *
 * @return string Время в формате д. ч. м. с.
 */
function timestamp_format($timestamp)
{
    $days = floor($timestamp / 86400);
    $remain_time = $timestamp - $days * 86400;
    $hours = floor($remain_time / 3600);
    $remain_time = $remain_time - $hours * 3600;
    $minutes = floor($remain_time / 60);
    $remain_time = $remain_time - $minutes * 60;
    $seconds = $remain_time;
    return $days . 'д. ' . $hours . 'ч. ' . $minutes . 'м. ' . $seconds . 'с.';
}






