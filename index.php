<?php
require_once('functions.php');
require_once('data.php');
$con = mysqli_connect("localhost", "root", "PasswordforMySQL","Yeticave");

mysqli_set_charset($con, "utf8");

$newlots_query="SELECT lots.name, lots.start_price AS price, lots.image AS url, MAX(bets.price) AS price_now, 
COUNT(bets.price) AS bets_numbers, creation_date, categories.name AS category
FROM lots 
INNER JOIN bets ON lots.id=bets.lot_id 
INNER JOIN categories ON lots.category_id=categories.id WHERE end_date is NULL GROUP BY lots.name 
ORDER BY creation_date DESC;";

$newlots_result=mysqli_query($con, $newlots_query);

if(!$newlots_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$newlots_query_array=mysqli_fetch_all($newlots_result, MYSQLI_ASSOC);

$categories_query="SELECT name FROM categories GROUP BY name;";

$categories_result=mysqli_query($con, $categories_query);

if(!$categories_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$categories_query_array=mysqli_fetch_all($categories_result, MYSQLI_ASSOC);

$page_content = include_template('index.php', ['categories' => $categories_query_array, 'adverts' => $newlots_query_array, 'time_left' =>
$time_left]);
$layout_content = include_template('layout.php', ['page_name' => $page_name, 'is_auth' => $is_auth,
    'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
    'page_content' => $page_content ]);

print ($layout_content);
print_r($categories_query_array);

