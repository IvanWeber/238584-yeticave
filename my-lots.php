<?php
session_start();
if (!isset($_SESSION['user'])) {
    print('<h1>Ошибка 403</h1>');
    http_response_code(403);
    die();
}
require_once('functions.php');
require_once('data.php');

$page_name = 'Мои ставки';

$bets_query = 'SELECT lots.image, lots.name AS lot_name, lots.id AS lot_id, categories.name AS category,
 lots.end_date_time AS end_date_time, MAX(bets.price) AS price, bets.date AS bet_date_time,
users.contacts AS contacts, lots.user_id AS lot_owner, lots.winner_id AS winner_id, bets.user_id AS bet_user_id
FROM bets
JOIN lots ON bets.lot_id = lots.id
JOIN users ON bets.user_id = users.id
JOIN categories ON lots.category_id=categories.id
WHERE bets.user_id = "'.$_SESSION['user']['id'].'"
GROUP BY lots.id ORDER BY end_date_time DESC;';

$bets_result = mysqli_query($con, $bets_query);

if (!$bets_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$bets_query_array = mysqli_fetch_all($bets_result, MYSQLI_ASSOC);

$page_content = include_template('my-lots.php', ['bets_query_array' => $bets_query_array]);
$layout_content = include_template('layout.php', ['page_name' => $page_name, 'categories' => $categories_query_array,
    'page_content' => $page_content]);

print ($layout_content);