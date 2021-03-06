<?php
session_start();
if (!isset($_SESSION['user'])) {
    print('<h1>Ошибка 403</h1>');
    http_response_code(403);
    die();
}
require_once('functions.php');
require_once('data.php');

$page_name = 'Добавить лот';
$required_fields = ['lot-name', 'category', 'description', 'lot-rate', 'lot-step', 'lot-date'];
$form_invalid = false;
$category_check = false;
/*Валидация для формы и полей(проверка на заполненность)*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $field_invalid[$field] = true;
        } else {
            $field_invalid[$field] = false;
        }
        if ($field_invalid[$field] === true) {
            $form_invalid = true;
        }
    }
}


if ($form_invalid === false) {
    /*Валидация полей стартовой цены и шага ствки*/

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ((int)$_POST['lot-rate'] <= 0) {
            $field_invalid['lot-rate'] = true;
            $form_invalid = true;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ((int)$_POST['lot-step'] <= 0) {
            $field_invalid['lot-step'] = true;
            $form_invalid = true;
        }
    }

    /*Валидация поля даты*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $date = new DateTime($_POST['lot-date']);
        $formatted_date = $date->format('d-m-Y');

        if ((strtotime($formatted_date) - strtotime('Today')) < 86400) {
            $field_invalid['lot-date'] = true;
            $form_invalid = true;
        }
    }
    /*Валидация для поля выбора категории(выбрана ли категория)*/
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($categories_query_array as $key => $val) {
            if ($val['id'] === $_POST['category']) {
                $category_check = true;
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$category_check) {
        $field_invalid['category'] = true;
        $form_invalid = true;
    } else {
        $field_invalid['category'] = false;
    }
}

/*Запомнить введенные в форму данные*/

foreach ($required_fields as $field) {
    $filled_field_array[$field] = $_POST[$field] ?? '';
}

/*Формирование ссылки на загруженное изображение и валидация загрузки изображения*/
$image_invalid = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['lot-photo']['name'])) {
        $file_name = uniqid() . $_FILES['lot-photo']['name'];
        $file_path = 'uploads/';
        $file_url = $file_path . $file_name;
        $tmp_name = $_FILES["lot-photo"]["tmp_name"];
        move_uploaded_file($tmp_name, $file_url);
    } else {
        $image_invalid = true;
        $form_invalid = true;
    }
}

/*Сценарий выполнится, если все поля заполнены верно*/
if ($form_invalid === false && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = htmlspecialchars($_POST['lot-name']);
    $start_price = (int)$_POST['lot-rate'];
    $end_date_time = $_POST['lot-date'];
    $bet_step = (int)$_POST['lot-step'];
    $description = htmlspecialchars($_POST['description']);
    $image = $file_url;
    $category_id = $_POST['category'];
    $creation_date_time = date('Y-m-d H:i:s');
    $user_id = $_SESSION['user']['id'];


    $add_lot_query = 'INSERT INTO lots (name, start_price, end_date_time, bet_step, description, image, category_id, creation_date_time, lots.user_id)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = mysqli_prepare($con, $add_lot_query);
    mysqli_stmt_error($stmt);
    mysqli_stmt_bind_param($stmt, 'sssssssss', $name, $start_price, $end_date_time, $bet_step, $description,
        $image, $category_id, $creation_date_time, $user_id);
    mysqli_stmt_execute($stmt);
    $add_lot_related_query = "SELECT MAX(lots.id) AS id FROM lots;";
    $add_lot__related_query_result = mysqli_query($con, $add_lot_related_query);
    if (!$add_lot__related_query_result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
        die();
    }
    $add_lot_related_query_array = mysqli_fetch_all($add_lot__related_query_result, MYSQLI_ASSOC);

    header("Location: lot.php?lot_id=" . $add_lot_related_query_array[0][id]);
    die();
}

$page_content = include_template('add.php', ['categories' => $categories_query_array, 'field_invalid' => $field_invalid
    , 'form_invalid' => $form_invalid, 'filled_field_array' => $filled_field_array, 'image_invalid' => $image_invalid]);
$layout_content = include_template('layout.php', ['page_name' => $page_name, 'categories' => $categories_query_array,
    'page_content' => $page_content]);

print ($layout_content);



