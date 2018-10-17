<?php
session_start();
require_once('functions.php');
require_once('data.php');
require_once('getwinner.php');

$page_name = 'Yeticave';

$page_content = include_template('index.php', ['categories' => $categories_query_array, 'adverts' => $newlots_query_array]);
$layout_content = include_template('layout.php', ['page_name' => $page_name, 'categories' => $categories_query_array,
    'page_content' => $page_content]);

print ($layout_content);

