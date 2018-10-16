<?php
//подключаем composer
require_once 'vendor/autoload.php';
require_once 'data.php';
require_once 'functions.php';

$winner_lots_query = 'SELECT lots.id AS lot_id, MAX(bets.id) as bet_id, MAX(users.id) AS winner_id, end_date_time,
 MAX(bets.date) AS last_bet_date, lots.winner_id AS lot_winner_id, lots.name AS lot_name
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

$users_query = 'SELECT * FROM users';

$users_result = mysqli_query($con, $users_query);

if (!$users_result) {
    $error = mysqli_error($con);
    print("Ошибка MySQL: " . $error);
    die();
}

$users_query_array = mysqli_fetch_all($users_result, MYSQLI_ASSOC);


$no_winner = false;
foreach ($winner_lots_query_array as $winner_lots_key => $winner_lots_val) {
    if (empty ($winner_lots_val['lot_winner_id'])) {
        $no_winner = true;
        print('GOOOOOD!!!');
    }
}





if (!$no_winner) {
    foreach ($users_query_array as $user_key => $user_val) {
        foreach ($winner_lots_query_array as $winner_key => $winner_val) {
            if ((int)$user_val['id'] === (int)$winner_val['winner_id']) {
                print('SUCCESS!!!!!');
                $add_winner_query = 'UPDATE lots
SET winner_id ="' . $user_val['id'] . '"
WHERE lots.id="' . $winner_val['lot_id'] . '"';
                $stmt = mysqli_prepare($con, $add_winner_query);
                mysqli_stmt_error($stmt);
                mysqli_stmt_execute($stmt);

                print($user_val['email']);

                $mail_content = include_template('email.php', ['user_name' => $user_val['name'],
                    'lot_name' =>$winner_val['lot_name']]);
// Конфигурация траспорта
                $transport = (new Swift_SmtpTransport('phpdemo.ru', 25))
                    ->setUsername('keks@phpdemo.ru')
                    ->setPassword('htmlacademy');
// Формирование сообщения
                $message = new Swift_Message("Ваша ставка победила");
                $message->setTo([$user_val['email'] => $user_val['name']]);
                $message->setBody($mail_content);
                $message->setFrom("keks@phpdemo.ru", "Кекс");
// Отправка сообщения
                $mailer = new Swift_Mailer($transport);
                $mailer->send($message);
            }

        }
    }
}


print_r($users_query_array);
print_r($winner_lots_query_array);








