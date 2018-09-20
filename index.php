<?php
require_once('functions.php');
require_once('data.php');
$page_content = include_template('index.php', ['categories' => $categories, 'adverts' => $adverts]);
$layout_content = include_template('layout.php', ['page_name' => $page_name, 'is_auth' => $is_auth,
    'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories,
    'page_content' => $page_content ]);
print ($layout_content);
