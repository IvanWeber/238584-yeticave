<?php
$is_auth = 0;

$categories = [
    "Доски и лыжи", "Крепления", "Ботинки",
    "Одежда", "Инструменты", "Разное"];

date_default_timezone_set("Europe/Moscow");

/* Формирование массивов с данными результатов SQL-запросов */
$con = mysqli_connect("localhost", "root", "PasswordforMySQL", "Yeticave");

mysqli_set_charset($con, "utf8");

$categories_query = "SELECT id, name FROM categories GROUP BY name;";

$categories_result = mysqli_query($con, $categories_query);

if (!$categories_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$categories_query_array = mysqli_fetch_all($categories_result, MYSQLI_ASSOC);

$newlots_query = "SELECT lots.id AS lot_id, lots.name, lots.start_price, lots.image AS url, MAX(bets.price) AS price, 
COUNT(bets.price) AS bets_num, creation_date_time, categories.name AS category, end_date_time, bets.id AS bet_id
FROM lots 
LEFT OUTER JOIN bets ON lots.id=bets.lot_id 
JOIN categories ON lots.category_id=categories.id WHERE end_date_time>CURRENT_DATE GROUP BY lots.name 
ORDER BY creation_date_time DESC;";

$newlots_result = mysqli_query($con, $newlots_query);

if (!$newlots_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$newlots_query_array = mysqli_fetch_all($newlots_result, MYSQLI_ASSOC);


error_reporting(E_ALL);
ini_set('display_errors', 1);
