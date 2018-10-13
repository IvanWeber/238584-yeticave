<?php
session_start();
if (!isset($_SESSION['user'])){
    print('Ошибка 403');
    http_response_code(403);
    die();
}
require_once('functions.php');
require_once('data.php');

    $page_name = 'Добавить лот';
    $required_fields = ['lot-name', 'category', 'description', 'lot-rate', 'lot-step', 'lot-date'];
    $form_invalid = false;
    $category_check = false;
    /*Валидация для формы и полей*/
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
    }

    /*Валидация для поля выбора категории*/
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($categories_query_array as $key => $val){
        if ($val['id']==$_POST['category']) {
            $category_check=true;
        }
    }
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$category_check) {
        $field_invalid['category'] = true;
        $form_invalid = true;
    } else {
        $field_invalid['category'] = false;
    }

    /*Запомнить введенные в форму данные*/
    foreach ($required_fields as $field) {
        $filled_field_array[$field] = $_POST[$field] ?? '';
    }

    /*Формирование ссылки на загруженное изображение*/
    if (isset($_FILES['lot-photo'])) {
        $file_name = uniqid() . $_FILES['lot-photo']['name'];
        $file_path = 'uploads/';
        $file_url = $file_path . $file_name;
        $tmp_name = $_FILES["lot-photo"]["tmp_name"];
        move_uploaded_file($tmp_name, $file_url);}


	
	$lots_query="SELECT * FROM lots";

    $lots_query_result=mysqli_query($con, $lots_query);

    if(!$lots_query_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
    }

    $lots_query_array=mysqli_fetch_all($lots_query_result, MYSQLI_ASSOC);


    /*Сценарий выполнится, если все поля заполнены верно*/
    if ($form_invalid==false && $_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['lot-name'];
    $start_price = $_POST['lot-rate'];
    $end_date_time = $_POST['lot-date'];
    $bet_step = $_POST['lot-step'];
    $description = $_POST['description'];
    $image = $file_url;
    $category_id = $_POST['category'];
    $creation_date_time = date('Y-m-d H:i:s');

    $add_lot_query='INSERT INTO lots (name, start_price, end_date_time, bet_step, description, image, category_id, creation_date_time)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = mysqli_prepare($con, $add_lot_query);
    mysqli_stmt_error($stmt);
    mysqli_stmt_bind_param($stmt,'ssssssss',$name,$start_price, $end_date_time, $bet_step, $description,
        $image,  $category_id, $creation_date_time);
        mysqli_stmt_execute($stmt);
        $add_lot_related_query="SELECT MAX(lots.id) AS id FROM lots;";
    $add_lot__related_query_result=mysqli_query($con, $add_lot_related_query);
    if(! $add_lot__related_query_result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
        die();}
    $add_lot_related_query_array=mysqli_fetch_all($add_lot__related_query_result, MYSQLI_ASSOC);

    header("Location: lot.php?lot_id=" . $add_lot_related_query_array[0][id]);
    die();
    }

    $page_content = include_template('add.php', ['categories' => $categories_query_array, 'field_invalid' => $field_invalid, 'form_invalid' => $form_invalid, 'filled_field_array' => $filled_field_array]);
    $layout_content = include_template('layout.php', ['page_name' => $page_name, 'is_auth' => $is_auth,
        'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
        'page_content' => $page_content]);

    print ($layout_content);





