<?php
session_start();

require_once('functions.php');
require_once('data.php');

$page_content=include_template('search.php', []);
$layout_content = include_template('layout.php', ['page_content'=>$page_content, 'categories'=>$categories_query_array]);
print($layout_content);
print_r($_GET['search']);