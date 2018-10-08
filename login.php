<?php 
require_once('functions.php');
require_once('data.php');

$page_name = 'Login Yeticave';
$required_fields = ['email', 'password'];
$form_invalid = false;
$field_invalid = false;


    /*Валидация для формы и полей(заполнены ли поля)*/
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
	
	/*Запомнить введенные в форму данные*/
	  foreach ($required_fields as $field) {
        $filled_field_array[$field] = $_POST[$field] ?? '';
    }
	/*Перевод запроса на email и пароль в ассоциативный массив*/
	$login_query="SELECT email, password FROM users";
	$login_query_result=mysqli_query($con, $login_query);

if(!$login_query_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);

}
$login_query_array=mysqli_fetch_all($login_query_result, MYSQLI_ASSOC);

	if ($_SERVER['REQUEST_METHOD'] == 'POST' and $form_invalid==false) {
		foreach ($login_query_array as $key => $val) {
			if($val['email']==$_POST['email'] and $val['password']==$_POST['password']) {
				$is_auth=true;
				header("Location: index.php");
				die();
			}
			else {
				$field_invalid['password']=false;
			}
		}
	}
				

$page_content = include_template('login.php', ['field_invalid' => $field_invalid, 'form_invalid' => $form_invalid, 'filled_field_array' => $filled_field_array]);
    $layout_content = include_template('layout.php', ['page_name' => $page_name, 'is_auth' => $is_auth,
        'user_name' => $user_name, 'user_avatar' => $user_avatar, 'categories' => $categories_query_array,
        'page_content' => $page_content]);

    print ($layout_content);