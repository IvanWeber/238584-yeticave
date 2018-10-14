<?php
session_start();

require_once('functions.php');
require_once('data.php');

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

/*Сценарий для поля ставок*/
if (isset($lots_related[0]['last_bet_price'])) {
    $min_bet=$lots_related_query_array[0]['last_bet_price']+$lots_id_query_array[0]['bet_step'];
}
else {
    $min_bet=$lots_related_query_array[0]['start_price']+$lots_id_query_array[0]['bet_step'];
}

$error_add_bet=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['cost']>=$min_bet && $_POST['cost']%$lots_id_query_array[0]['bet_step']==0){
    $email=mysqli_real_escape_string($con, $_SESSION['user']['email']);
    $cost=$_POST['cost'];
    $lot_id=(int)$_GET['lot_id'];
    $bet_date_time = date('Y-m-d H:i:s');
    $add_bet_query='INSERT INTO bets (user_id, price, lot_id, date) VALUES ("'.$_SESSION['user']['id'].'", ?, ?, ?)';
    $stmt = mysqli_prepare($con, $add_bet_query);
    mysqli_stmt_error($stmt );
    mysqli_stmt_bind_param($stmt,'sss',$cost, $lot_id, $bet_date_time);
    mysqli_stmt_execute($stmt);
    header("Location: /lot.php?lot_id=" . (int)$_GET['lot_id']);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $error_add_bet=true;
}

/*Сценарий для добавления последний ставок в таблицу*/

$bet_query='SELECT users.name AS name, bets.price AS price, bets.date AS date FROM bets 
JOIN lots ON lots.id=bets.lot_id
JOIN users ON users.id=bets.user_id
WHERE lot_id="'.(int)$_GET['lot_id'].'"
ORDER BY date DESC;';
$bet_query_result=mysqli_query($con, $bet_query);
if(!$bet_query_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();}
$bet_query_array=mysqli_fetch_all($bet_query_result, MYSQLI_ASSOC);



$page_content=include_template('lot.php', ['lot'=>$lots_id_query_array, 'lots_related'=>$lots_related_query_array,
    'time_left'=>$time_left, 'error_add_bet'=>$error_add_bet, 'bet_query_array'=>$bet_query_array]);
$layout_content = include_template('layout.php', ['page_name'=>$page_name, 'is_auth' => $is_auth,
    'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
    'page_content' => $page_content ]);
print($layout_content);

