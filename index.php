<?php
session_start();
require_once('functions.php');
require_once('data.php');
require_once('getwinner.php');

$page_name = 'Yeticave';

$page_error = 1;

/*Пагинация*/
$cur_page = $_GET['page'] ?? 1;
$page_items = 9;


$pag_sql = "SELECT COUNT(*) AS cnt
    FROM lots 
    JOIN categories ON lots.category_id=categories.id 
    LEFT OUTER JOIN bets ON lots.id=bets.lot_id
    WHERE end_date_time>CURRENT_TIMESTAMP GROUP BY lots.id";
$pag_sql_result = mysqli_query($con, $pag_sql);

if (!$pag_sql_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$pag_lots_searching_array = mysqli_fetch_all($pag_sql_result, MYSQLI_ASSOC);

$items_count = count($pag_lots_searching_array);

$pages_count = ceil($items_count / $page_items);


/*Проверка на наличие запрашиваемой страницы*/
$pages = range(1, $pages_count);
if (isset ($_GET['page'])) {
    foreach ($pages as $key => $val) {
        if (((int)$val === (int)$_GET['page'])) {
            $page_error = 0;
        }
    }

    if ($page_error) {
        print('<h1>Ошибка 404</h1>');
        die();
    }
}

if (!empty($pag_lots_searching_array)) {
    /*Вывод лотов на страницу*/
    $offset = ($cur_page - 1) * $page_items;

    $sql = 'SELECT lots.id, creation_date_time, lots.name, description, image, start_price, end_date_time, bet_step,
 categories.name AS category, lots.category_id AS category_id, COUNT(bets.id) AS bets_num, bets.id AS bet_id, MAX(bets.price) AS price,
  bets.date AS bet_date, COUNT(lots.id)
    FROM lots 
    JOIN categories ON lots.category_id=categories.id 
    LEFT OUTER JOIN bets ON lots.id=bets.lot_id
    WHERE end_date_time>CURRENT_TIMESTAMP GROUP BY lots.id ORDER BY end_date_time ASC LIMIT ? OFFSET ?;';
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_error($stmt);
    mysqli_stmt_bind_param($stmt, 'ss', $page_items, $offset);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $lots_searching_array = mysqli_fetch_all($result, MYSQLI_ASSOC);


    $page_content = include_template('index.php', ['lots' => $lots_searching_array, 'categories' => $categories_query_array,
        'all_lots' => $pag_lots_searching_array, 'pages_count' => $pages_count]);
}
else {
    $page_content = include_template('index-fail.php', ['categories' => $categories_query_array]);
}
$layout_content = include_template('layout.php', ['page_content' => $page_content, 'categories' => $categories_query_array,
    'page_name' => $page_name]);
print($layout_content);

