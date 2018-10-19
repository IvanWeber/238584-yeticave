<?php
//подключаем composer
require_once 'vendor/autoload.php';
require_once 'data.php';
require_once 'functions.php';

$winner_lots_query = 'SELECT lots.id AS lot_id, MAX(bets.id) as bet_id, MAX(users.id) AS winner_id, end_date_time,
 MAX(bets.date) AS last_bet_date, lots.winner_id AS lot_winner_id, lots.name AS lot_name, 
MAX(users.name) AS user_name, email
FROM bets 
JOIN lots ON lots.id=bets.lot_id
JOIN users ON users.id=bets.user_id 
 WHERE lots.end_date_time<=CURRENT_DATE GROUP BY lots.id 

ORDER BY lot_id ASC;';

$winner_lot_result = mysqli_query($con, $winner_lots_query);

if (!$winner_lot_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$winner_lots_query_array = mysqli_fetch_all($winner_lot_result, MYSQLI_ASSOC);


foreach ($winner_lots_query_array as $winner_lots_key => $winner_lots_val) {
    if (empty ($winner_lots_val['lot_winner_id'])) {
        $add_winner_query = 'UPDATE lots
SET winner_id ="' . $winner_lots_val['winner_id'] . '"
WHERE lots.id="' . $winner_lots_val['lot_id'] . '"';
        $stmt = mysqli_prepare($con, $add_winner_query);
        mysqli_stmt_error($stmt);
        mysqli_stmt_execute($stmt);


        $mail_content = include_template('email.php', ['user_name' => $winner_lots_val['user_name'],
            'lot_name' => $winner_lots_val['lot_name'], 'lot_id' => $winner_lots_val['lot_id']]);
// Конфигурация траспорта
        $transport = (new Swift_SmtpTransport('phpdemo.ru', 25))
            ->setUsername('keks@phpdemo.ru')
            ->setPassword('htmlacademy');
// Формирование сообщения
        $message = new Swift_Message("Ваша ставка победила");
        $message->setTo([$winner_lots_val['email'] => $winner_lots_val['user_name']]);
        $message->setBody($mail_content, 'text/html');
        $message->setFrom("keks@phpdemo.ru", "Кекс");
// Отправка сообщения
        $mailer = new Swift_Mailer($transport);
        $mailer->send($message);
    }
}










