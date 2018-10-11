<?php
session_start();

require_once('functions.php');
require_once('data.php');

$con = mysqli_connect("localhost", "root", "PasswordforMySQL","Yeticave");

mysqli_set_charset($con, "utf8");

$lots_id_result=mysqli_query($con, "SELECT * FROM lots WHERE id='".(int)$_GET['lot_id']."';");

if(!$lots_id_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);

}

$lots_id_query_array=mysqli_fetch_all($lots_id_result, MYSQLI_ASSOC);

$lots_related_query="SELECT lots.id AS lot_id, lots.name, lots.start_price, lots.image AS url, MAX(bets.price) AS last_bet_price, 
COUNT(bets.price) AS bets_numbers, creation_date_time, categories.name AS category, end_date_time
FROM lots 
LEFT OUTER JOIN bets ON lots.id=bets.lot_id 
JOIN categories ON lots.category_id=categories.id WHERE lots.id='".(int)$_GET['lot_id']."' GROUP BY lots.name 
ORDER BY creation_date_time DESC;";


$lots_related_result=mysqli_query($con, $lots_related_query);

if(!$lots_related_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$lots_related_query_array=mysqli_fetch_all($lots_related_result, MYSQLI_ASSOC);


if (!empty($lots_id_query_array)){
}
else {
    print('<h1>Error 404</h1>');
    die();
}

$page_name=$lots_id_query_array[0]['name'];

/*Вычисление оставшегося времени до закрытия торгов по лоту*/
$strdatetime = strtotime($lots_id_query_array[0]['end_date_time']);
$time_left = $strdatetime - time();



$page_content=include_template('lot.php', ['lot'=>$lots_id_query_array, 'lots_related'=>$lots_related_query_array,
    'time_left'=>$time_left]);
$layout_content = include_template('layout.php', ['page_name'=>$page_name, 'is_auth' => $is_auth,
    'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
    'page_content' => $page_content ]);
print($layout_content);

