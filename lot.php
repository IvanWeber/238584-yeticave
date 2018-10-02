<?php
require_once('functions.php');





$con = mysqli_connect("localhost", "root", "PasswordforMySQL","Yeticave");

mysqli_set_charset($con, "utf8");

$max_id_result=mysqli_query($con, "SELECT MAX(lots.id) AS max_id FROM lots;");

if(!$max_id_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$max_id_query_array=mysqli_fetch_all($max_id_result, MYSQLI_ASSOC);

if (isset($_GET['lot_id']) and $_GET['lot_id']<=$max_id_query_array[0]['max_id']) {
}
else {
    print('<h1>Error 404</h1>');
    die();
}




$newlots_result=mysqli_query($con, "SELECT lots.id, lots.name AS name, lots.start_price AS price, lots.image AS url, MAX(bets.price) AS price_now, 
COUNT(bets.price) AS bets_numbers, creation_date, categories.name AS category
FROM lots 
INNER JOIN bets ON lots.id=bets.lot_id 
INNER JOIN categories ON lots.category_id=categories.id WHERE end_date is NULL AND lots.id='".$_GET['lot_id']."' GROUP BY lots.name
ORDER BY creation_date DESC;");

if(!$newlots_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$newlots_query_array=mysqli_fetch_all($newlots_result, MYSQLI_ASSOC);
$page_content=include_template('lot.php', ['lot'=>$newlots_query_array]);
print($page_content);

