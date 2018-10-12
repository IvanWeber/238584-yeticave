<?php

/*Функция-шаблонизатор*/
function include_template($name, $data) {
$name = 'templates/' . $name;
$result = '';

if (!file_exists($name)) {
return $result;
}

ob_start();
extract($data);
require_once $name;

$result = ob_get_clean();

return $result;
}

/*Функция для отображения цены в рублях*/
function ruble_display ($number) {
    return number_format ( ceil ($number), 0 , "." , " " ) . ' ₽';
}

/*Функция для отображения времени в формате д, ч, м, с*/
function timestamp_format ($timestamp) {
    $days=floor($timestamp/86400);
    $remain_time=$timestamp - $days*86400;
    $hours=floor($remain_time/3600);
    $remain_time=$remain_time - $hours*3600;
    $minutes=floor($remain_time/60);
    $remain_time=$remain_time - $minutes*60;
    $seconds=$remain_time;
  return $days . 'д. ' . $hours . 'ч. ' . $minutes . 'м. ' . $seconds . 'с.';
}

/**
 * Создает подготовленное выражение на основе готового SQL запроса и переданных данных.
 *
 * @param mysqli $link Ресурс соединения
 * @param string $sql  SQL запрос с плейсхолдерами вместо значений
 * @param array  $data Данные для вставки на место плейсхолдеров
 *
 * @throws \UnexpectedValueException Если тип параметра не поддерживается
 *
 * @return mysqli_stmt Подготовленное выражение
 */
$link = mysqli_connect("localhost", "root", "PasswordforMySQL","Yeticave");

mysqli_set_charset($link, "utf8");
function db_get_prepare_stmt($link, $sql, array $data = [])
{
    $stmt = mysqli_prepare($link, $sql);
    if (empty($data)) {
        return $stmt;
    }
    static $allowed_types = [
        'integer' => 'i',
        'double' => 'd',
        'string' => 's',
    ];
    $types = '';
    $stmt_data = [];
    foreach ($data as $value) {
        $type = gettype($value);
        if (!isset($allowed_types[$type])) {
            throw new \UnexpectedValueException(sprintf('Unexpected parameter type "%s".', $type));
        }
        $types .= $allowed_types[$type];
        $stmt_data[] = $value;
    }
    mysqli_stmt_bind_param($stmt, $types, ...$stmt_data);
    return $stmt;
}




