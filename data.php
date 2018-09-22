<?php
// ставки пользователей, которыми надо заполнить таблицу
$bets = [
    ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
    ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
    ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
    ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];
$is_auth = rand(0, 1);

$user_name = 'Иван'; // укажите здесь ваше имя
$user_avatar = 'img/user.jpg';
$page_name = 'Yeticave';




$categories = [
    "Доски и лыжи", "Крепления", "Ботинки",
    "Одежда", "Инструменты", "Разное"];
$adverts = [
    [
        'name' => "2014 Rossignol District Snowboard",
        'category' => "Доски и лыжи",
        'price' => 10999,
        'url' => "img/lot-1.jpg"
    ],
    [
        'name' => "DC Ply Mens 2016/2017 Snowboard",
        'category' => "Доски и лыжи",
        'price' => 159999,
        'url' => "img/lot-2.jpg"
    ],
    [
        'name' => "Крепления Union Contact Pro 2015 года размер L/XL",
        'category' => "Крепления",
        'price' => 8000,
        'url' => "img/lot-3.jpg"
    ],
    [
        'name' => "Ботинки для сноуборда DC Mutiny Charocal" ,
        'category' => "Ботинки",
        'price' => 10999,
        'url' => "img/lot-4.jpg"
    ],
    [
        'name' => "Куртка для сноуборда DC Mutiny Charocal",
        'category' => "Одежда",
        'price' => 7500,
        'url' => "img/lot-5.jpg"
    ],
    [
        'name' => "Маска Oakley Canopy",
        'category' => "Разное",
        'price' => "5400",
        'url' => "img/lot-6.jpg"
    ]
];

date_default_timezone_set("Europe/Moscow");
$tomorrow_midnight = strtotime ('tomorrow');
$time_left = gmdate ("H:i", $tomorrow_midnight - time());

