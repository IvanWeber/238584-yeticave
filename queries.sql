INSERT INTO categories (id, name) VALUES
(1, 'Доски и лыжи'),
(2, 'Крепления'),
(3, 'Ботинки'),
(4, 'Одежда'),
(5, 'Инструменты'),
(6, 'разное');
	
INSERT INTO users (id, name, email, registration_date, password) VALUES
(1, 'Иван', 'ivan@yandex.ru', '18.09.15', 'ivanpass'),
(2, 'Константин', 'konst@google.com', '18.08.19', 'konstpass'),
(3, 'Евгений', 'evgeniy@mail.ru', '18.08.25', 'evgeniypass'),
(4, 'Семён', 'semyon@yahoo.com', '18.09.05', 'semyonpass');

INSERT INTO lots (id, name, category_id, start_price, image, creation_date_time, end_date_time, bet_step, description) VALUES 
(1, '2014 Rossignol District Snowboard', 1, 10999, 'img/lot-1.jpg', '18-09-21 16:57:12', '18-09-23 16:57:12', 500, 'Недорогой и качественный сноуборд от компании Rossignol'),
(2, 'DC Ply Mens 2016/2017 Snowboard', 1, 159999, 'img/lot-2.jpg', '18-09-22 18:23:21', '18-09-24 17:57:12', 5000, 'Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег
мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная
 геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется, 
 просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.'),
(3, 'Крепления Union Contact Pro 2015 года размер L/XL', 2, 8000, 'img/lot-3.jpg', '18-09-24 17:21:21', '18-09-25 12:57:12', 500, 'Крепления для сноуборда компании Union Contact Pro'),
(4, 'Ботинки для сноуборда DC Mutiny Charocal', 3, 10999, 'img/lot-4.jpg', '18-09-25 15:00:14', '18-09-27 16:30:12', 500, 'Ботинки для сноуборда компании DC Mutiny Charocal'),
(5, 'Куртка для сноуборда DC Mutiny Charocal', 4, 7500, 'img/lot-5.jpg', '18.09.26 22:31:15', '18-09-29 19:23:11', 500, 'Куртка для сноуборда компании DC Mutiny Charocal'),
(6, 'Маска Oakley Canopy', 6, 5400, 'img/lot-6.jpg', '18-09-27 21:23:10', '18-09-30 18:23:35', 100, 'Сноубордическая маска компании Oakley Canopy');

INSERT INTO bets (id, user_id, price, lot_id, date) VALUE
(1, 1, 11499, 1, '18.09.23'),
(2, 1, 164999, 2, '18.09.24'),
(3, 1, 11499, 4, '18.09.25'),
(4, 2, 11000, 3, '18.09.25'),
(5, 3, 10500, 5, '18.09.26'),
(6, 3, 11500, 3, '18.09.26'),
(7, 2, 11999, 4, '18.09.27');


/*получить все категории;*/
SELECT name FROM categories; 

/*получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;*/
SELECT lots.name, lots.start_price, lots.image, MAX(bets.price) AS price, COUNT(bets.price) AS bets_numbers, creation_date_time, categories.name
FROM lots 
JOIN bets ON lots.id=bets.lot_id 
JOIN categories ON lots.category_id=categories.id WHERE end_date_time is NULL GROUP BY lots.name ORDER BY creation_date_time DESC;


/*показать лот по его id. Получить также название категории, к которой принадлежит лот*/
SELECT lots.name, categories.name
FROM lots
JOIN categories ON lots.category_id=categories.id WHERE lots.id=3;

/*обновить название лота по его идентификатору;*/
UPDATE lots SET name='2015 Rossignol District Snowboard' WHERE id=1;

/*получить список самых свежих ставок для лота по его идентификатору;*/
SELECT * FROM bets WHERE lot_id=3 ORDER BY `date` ASC;  
 