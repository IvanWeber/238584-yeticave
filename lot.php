<?php
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

$lots_related_query="SELECT lots.id AS lot_id, lots.name, lots.start_price AS price, lots.image AS url, MAX(bets.price) AS price_now, 
COUNT(bets.price) AS bets_numbers, creation_date, categories.name AS category, end_date
FROM lots 
INNER JOIN bets ON lots.id=bets.lot_id 
INNER JOIN categories ON lots.category_id=categories.id WHERE lot_id='".(int)$_GET['lot_id']."' GROUP BY lots.name 
ORDER BY creation_date DESC;";

$lots_related_result=mysqli_query($con, $lots_related_query);

if(!$lots_related_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$lots_related_query_array=mysqli_fetch_all($lots_related_result, MYSQLI_ASSOC);

$categories_query="SELECT name FROM categories GROUP BY name;";

$categories_result=mysqli_query($con, $categories_query);

if(!$categories_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$categories_query_array=mysqli_fetch_all($categories_result, MYSQLI_ASSOC);



if (!empty($lots_id_query_array)){
}
else {
    print('<h1>Error 404</h1>');
    die();
}

$page_name=$lots_id_query_array[0]['name'];

$page_content=include_template('lot.php', ['lot'=>$lots_id_query_array, 'lots_related'=>$lots_related_query_array ]);
$layout_content = include_template('layout.php', ['page_name'=>$page_name, 'is_auth' => $is_auth,
    'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
    'page_content' => $page_content ]);
print($layout_content);

