<?php
session_start();

require_once('functions.php');
require_once('data.php');

$page_name = 'Поиск по лотам';
$search = $_GET['search'] ?? '';
$page_error = 1;

/*Пагинация*/
$cur_page = $_GET['page'] ?? 1;
$page_items = 9;
$category_id = $_GET['category_id'] ?? '';

$pag_sql = "SELECT COUNT(*) AS cnt
    FROM lots 
    JOIN categories ON lots.category_id=categories.id 
    LEFT OUTER JOIN bets ON lots.id=bets.lot_id
    WHERE category_id = ? GROUP BY lots.id";
$pag_stmt = mysqli_prepare($con, $pag_sql);
mysqli_stmt_error($pag_stmt);
mysqli_stmt_bind_param($pag_stmt, 's', $search);
mysqli_stmt_execute($pag_stmt);
$pag_result = mysqli_stmt_get_result($pag_stmt);
$pag_lots_searching_array = mysqli_fetch_all($pag_result, MYSQLI_ASSOC);

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


/*Вывод лотов на страницу*/
$offset = ($cur_page - 1) * $page_items;
if ($category_id) {
    $sql = 'SELECT lots.id, creation_date_time, lots.name, description, image, start_price, end_date_time, bet_step,
 categories.name AS category, lots.category_id AS category_id, COUNT(bets.id) AS bets_num, bets.id AS bet_id, MAX(bets.price) AS price,
  bets.date AS bet_date, COUNT(lots.id)
    FROM lots 
    JOIN categories ON lots.category_id=categories.id 
    LEFT OUTER JOIN bets ON lots.id=bets.lot_id
    WHERE category_id = ? GROUP BY lots.id ORDER BY end_date_time DESC LIMIT ? OFFSET ?;';
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_error($stmt);
    mysqli_stmt_bind_param($stmt, 'sss', $category_id, $page_items, $offset);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $lots_searching_array = mysqli_fetch_all($result, MYSQLI_ASSOC);
}


$page_content = include_template('lots-by-category.php', ['lots' => $lots_searching_array, 'all_lots' => $pag_lots_searching_array,
    'pages_count' => $pages_count]);
$layout_content = include_template('layout.php', ['page_content' => $page_content, 'categories' => $categories_query_array,
    'page_name' => $page_name]);
print($layout_content);