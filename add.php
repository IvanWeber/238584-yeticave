<?php
require_once('functions.php');
require_once('data.php');

    $page_name = 'Yeti add';
    $required_fields = ['lot-name', 'category', 'description', 'lot-rate', 'lot-step', 'lot-date'];
    $errors = [];
    $form_invalid = '';
    /*Валидация для формы и полей*/
    if (!$_POST == NULL) {
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = ' (Поле не заполнено)';
                $field_invalid[$field] = 'form__item--invalid';
            } else {
                $errors[$field] = '';
                $field_invalid[$field] = '';
            }
            if ($field_invalid[$field] == 'form__item--invalid') {
                $form_invalid = 'form--invalid';
            }
        }
        if (count($errors)) {
            print('Ошибка валидации');
        }
    } else {
        foreach ($required_fields as $field) {
            $errors[$field] = '';
            $field_invalid[$field] = '';
        }
        $form_invalid = '';
    }

    /*Валидация для поля выбора категории*/
    if (!$_POST == NULL and $_POST['category'] == 'Выберите категорию') {
        $errors['category'] = 'Поле не заполнено';
        $field_invalid['category'] = 'form__item--invalid';
        $form_invalid = 'form--invalid';
    } else {
        $errors['category'] = '';
        $field_invalid['category'] = '';
    }

    /*'lot-name', 'category', 'description', 'lot-rate', 'lot-step', 'lot-date'*/

    foreach ($required_fields as $field) {
        $filled_field_array[$field] = $_POST[$field] ?? '';
    }

    if (isset($_FILES['lot-photo'])) {
        $file_name = $_FILES['lot-photo']['name'];
        $file_path = 'img/';
        $file_url = $file_path . $file_name;
        move_uploaded_file($_FILES['lot-photo']['tmp_name'], $file_path . $file_name);
        print("<a href='$file_url'>$file_name
<a>");
    }
	
	$lots_query="SELECT * FROM lots";

$lots_query_result=mysqli_query($con, $lots_query);

if(!$lots_query_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$lots_query_array=mysqli_fetch_all($lots_query_result, MYSQLI_ASSOC);
/*Сценарий выполнится, если все поля заполнены верно*/
if ($form_invalid=='' and !$_POST==NULL) {

    $con = mysqli_connect("localhost", "root", "PasswordforMySQL","Yeticave");
    mysqli_set_charset($con, "utf8");

    $add_lot_query="INSERT INTO lots (name, start_price, end_date_time, bet_step, description, image, category_id, creation_date_time) 
VALUES ('".$_POST['lot-name']."', '".$_POST['lot-rate']."', '".$_POST['lot-date']."', '".$_POST['lot-step']."', '".$_POST['description']."', '".$file_url."', '".$_POST['category']."', '".date('Y-m-d H:i:s')."')";
    $add_lot_query_result=mysqli_query($con, $add_lot_query);
	if(! $add_lot_query_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
	}

    $add_lot_related_query="SELECT * FROM lots WHERE lots.id=(SELECT MAX(lots.id) FROM lots);";
    $add_lot__related_query_result=mysqli_query($con, $add_lot_related_query);
    if(! $add_lot__related_query_result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
        die();}
    $add_lot_related_query_array=mysqli_fetch_all($add_lot__related_query_result, MYSQLI_ASSOC);

    header("Location: lot.php?lot_id=" . $add_lot_related_query_array[0]['id']);
    print_r($_POST);
    print_r($_POST['category']);
    print_r($add_lot_related_query_array);
    print_r($add_lot_related_query_array[0]['category_id']);}

    $page_content = include_template('add.php', ['categories' => $categories_query_array, 'time_left' =>
        $time_left, 'errors' => $errors, 'field_invalid' => $field_invalid, 'form_invalid' => $form_invalid, 'filled_field_array' => $filled_field_array]);
    $layout_content = include_template('layout.php', ['page_name' => $page_name, 'is_auth' => $is_auth,
        'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
        'page_content' => $page_content]);

    print ($layout_content);





