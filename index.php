<?php
require_once('functions.php');
require_once('data.php');

session_start();
$page_name = 'Yeticave';
$con = mysqli_connect("localhost", "root", "PasswordforMySQL","Yeticave");

mysqli_set_charset($con, "utf8");

$page_content = include_template('index.php', ['categories' => $categories_query_array, 'adverts' => $newlots_query_array]);
$layout_content = include_template('layout.php', ['page_name' => $page_name, 'is_auth' => $is_auth,
    'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
    'page_content' => $page_content ]);

print ($layout_content);

