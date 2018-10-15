<?php
require_once('functions.php');
require_once('data.php');

session_start();

$page_name = 'Вход на сайт Yeticave';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form = $_POST;

    $required = ['email', 'password'];
    $errors = [];
    foreach ($required as $field) {
        if (empty($form[$field])) {
            $errors[$field] = 'Это поле надо заполнить';
        }
    }

    $email = mysqli_real_escape_string($con, $form['email']);
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $sql);

    $user = $res ? mysqli_fetch_array($res, MYSQLI_ASSOC) : null;

    if (!count($errors) && $user) {
        if (password_verify($form['password'], $user['password'])) {
            $_SESSION['user'] = $user;
        } else {
            $errors['password'] = 'Неверный пароль';
        }
    } else {
        $errors['email'] = 'Такой пользователь не найден';
    }

    if (count($errors)) {
        $page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);
    } else {
        header("Location: /");
        exit();
    }
} else {
    if (isset($_SESSION['user'])) {
        $page_content = include_template('index.php', ['username' => $_SESSION['user']['name'],
            'categories' => $categories_query_array, 'adverts' => $newlots_query_array]);
    } else {
        $page_content = include_template('login.php', []);
    }
}

$layout_content = include_template('layout.php', ['page_content' => $page_content, 'is_auth' => $is_auth,
    'categories' => $categories_query_array, 'page_name' => $page_name]);


print($layout_content);


