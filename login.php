<?php 
require_once('functions.php');
require_once('data.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    if (!count($errors) and $user) {
        if (password_verify($form['password'], $user['password'])) {
            $_SESSION['user'] = $user;
        }
        else {
            $errors['password'] = 'Неверный пароль';
        }
    }
    else {
        $errors['email'] = 'Такой пользователь не найден';
    }

    if (count($errors)) {
        $page_content = include_template('login.php', ['form' => $form, 'errors' => $errors]);
    }
    else {
        header("Location: /yeticave/login.php");
        exit();
    }
}
else {
    if (isset($_SESSION['user'])) {
        $page_content = include_template('index.php', ['username' => $_SESSION['user']['name'],
            'categories' => $categories_query_array, 'adverts' => $newlots_query_array]);
    }
    else {
        $page_content = include_template('login.php', []);
    }
}

$layout_content = include_template('layout.php', [
    'page_content'   => $page_content,'is_auth' => $is_auth, 'user_name' => $user_name, 'user_avatar' => $user_avatar,
    'categories' => $categories_query_array, 'username' => $_SESSION['user']['name']]);


print($layout_content);



//$page_name = 'Login Yeticave';
//$required_fields = ['email', 'password'];
//$form_invalid = false;
//$field_invalid = false;
//
//
//    /*Валидация для формы и полей(заполнены ли поля)*/
//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//        foreach ($required_fields as $field) {
//            if (empty($_POST[$field])) {
//                $field_invalid[$field] = true;
//            }
//            if ($field_invalid[$field] == true) {
//                $form_invalid = true;
//            }
//        }
//    }
//
//	/*Запомнить введенные в форму данные*/
//	  foreach ($required_fields as $field) {
//        $filled_field_array[$field] = $_POST[$field] ?? '';
//    }
//	/*Перевод запроса на email и пароль в ассоциативный массив*/
//	$login_query="SELECT email, password FROM users";
//	$login_query_result=mysqli_query($con, $login_query);
//
//if(!$login_query_result) {
//    $error = mysqli_error($con);
//    print("Ошибка MySQL: " . $error);
//
//}
//$login_query_array=mysqli_fetch_all($login_query_result, MYSQLI_ASSOC);
//
//
//
//	if ($_SERVER['REQUEST_METHOD'] == 'POST' and $form_invalid==false) {
//		foreach ($login_query_array as $key => $val) {
//			if($val['email']==$_POST['email'] and password_verify($_POST['password'], $val['password'])) {
//				$is_auth=true;
//				header("Location: index.php");
//				die();
//			}
//			else {
//                $field_invalid['email']=true;
//				$field_invalid['password']=true;
//			}
//		}
//	}
//
//
//$page_content = include_template('login.php', ['field_invalid' => $field_invalid, 'form_invalid' => $form_invalid, 'filled_field_array' => $filled_field_array]);
//    $layout_content = include_template('layout.php', ['page_name' => $page_name, 'is_auth' => $is_auth,
//        'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
//        'page_content' => $page_content]);
//
//    print ($layout_content);