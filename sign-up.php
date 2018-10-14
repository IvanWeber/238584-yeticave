<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: /");
    die();
}
require_once('functions.php');
require_once('data.php');

$page_name = 'Регистрация на сайте Yeticave';
$required_fields = ['email', 'password', 'name', 'message'];
$form_invalid = false;
$field_invalid = false;
$email_valid = true;

/*Валидация для формы и полей(заполнены ли поля)*/
$post_valid_email = $_POST['email'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $field_invalid[$field] = true;
        } else {
            $field_invalid[$field] = false;
        }
        if ($field_invalid[$field] == true) {
            $form_invalid = true;
        }
    }

    if (!filter_var($post_valid_email, FILTER_VALIDATE_EMAIL)) {
        $field_invalid['email'] = true;
        $form_invalid = true;
    }
}


/*Валидация для поля email(проверка email на совпадение с имеющимися в БД)*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_query = "SELECT email FROM users";
    $email_query_result = mysqli_query($con, $email_query);
    if (!$email_query_result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
        die();
    }
    $email_query_array = mysqli_fetch_all($email_query_result, MYSQLI_ASSOC);
    foreach ($email_query_array as $key => $val) {
        if ($val['email'] == $_POST['email']) {
            $email_valid = false;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /*Запомнить введенные в форму данные*/
    foreach ($required_fields as $field) {
        $filled_field_array[$field] = $_POST[$field] ?? '';
    }


    /*Формирование ссылки на загруженное изображение*/
    if (isset($_FILES['avatar'])) {
        $file_name = uniqid() . $_FILES['avatar']['name'];
        $file_path = 'uploads/';
        $file_url = $file_path . $file_name;
        $tmp_name = $_FILES["avatar"]["tmp_name"];
        move_uploaded_file($tmp_name, $file_url);
    }

    /*Сценарий выполнится, если валидация прошла успешно*/
    if ($form_invalid == false && $email_valid == true && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $name = $_POST['name'];
        $message = $_POST['message'];
        $avatar = $file_url;
        $registration_date = date('Y-m-d H:i:s');
        $add_user_query = 'INSERT INTO users (email, password, name, contacts, registration_date, avatar) VALUES (?, ?, ?, ?, ?, ?)';
        $stmt = mysqli_prepare($con, $add_user_query);
        mysqli_stmt_error($stmt);
        mysqli_stmt_bind_param($stmt, 'ssssss', $email, $password, $name, $message, $registration_date, $avatar);
        mysqli_stmt_execute($stmt);

        header("Location: login.php");
        die();
    }
}
$page_content = include_template('sign-up.php', ['field_invalid' => $field_invalid, 'form_invalid' => $form_invalid, 'filled_field_array' => $filled_field_array, 'email_valid' => $email_valid]);
$layout_content = include_template('layout.php', ['page_name' => $page_name, 'is_auth' => $is_auth,
    'categories' => $categories_query_array, 'page_content' => $page_content]);

print ($layout_content);