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
(3, 'Евгений', 'evgenyy@mail.ru', '18.08.25', 'evgenyypass'),
(4, 'Семён', 'semyon@yahoo.com', '18.09.05', 'semyonpass');

INSERT INTO lots (id, name, category_id, start_price, image, creation_date, bet_step) VALUES
(1, '2014 Rossignol District Snowboard', 1, 10999, 'img/lot-1.jpg', '18.09.21', 500),
(2, 'DC Ply Mens 2016/2017 Snowboard', 1, 159999, 'img/lot-2.jpg', '18.09.22', 5000),
(3, 'Крепления Union Contact Pro 2015 года размер L/XL', 2, 8000, 'img/lot-3.jpg', '18.09.24', 500),
(4, 'Ботинки для сноуборда DC Mutiny Charocal', 3, 10999, 'img/lot-4.jpg', '18.09.25', 500),
(5, 'Куртка для сноуборда DC Mutiny Charocal', 4, 7500, 'img/lot-5.jpg', '18.09.26', 500),
(6, 'Маска Oakley Canopy', 6, 5400, 'img/lot-6.jpg', '18.09.27', 100);

UPDATE lots SET end_date='18.09.23' WHERE id=1;

UPDATE lots SET end_date='19.09.24' WHERE id=2;

INSERT INTO bets (id, user_id, price, lot_id, date) VALUE
(1, 1, 11499, 4, '18.09.25'),
(2, 2, 11000, 3, '18.09.25'),
(3, 3, 10500, 5, '18.09.26'),
(4, 4, 5700, 6, '18.09.27'),
(5, 3, 11500, 3, '18.09.26'),
(6, 2, 11999, 4, '18.09.27');


/*получить все категории;*/
SELECT name FROM categories; 

/*получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;*/
SELECT lots.name, lots.start_price, lots.image, MAX(bets.price) AS price, COUNT(bets.price) AS bets_numbers, creation_date, categories.name
FROM lots 
INNER JOIN bets ON lots.id=bets.lot_id 
INNER JOIN categories ON lots.category_id=categories.id WHERE end_date is NULL GROUP BY lots.name ORDER BY creation_date DESC;


/*показать лот по его id. Получить также название категории, к которой принадлежит лот*/
SELECT lots.name, categories.name
FROM lots
INNER JOIN categories ON lots.category_id=categories.id WHERE lots.id=3;

/*обновить название лота по его идентификатору;*/
UPDATE lots SET name='2015 Rossignol District Snowboard' WHERE id=1;

/*получить список самых свежих ставок для лота по его идентификатору;*/
SELECT * FROM bets WHERE lot_id=3 ORDER BY `date` ASC;  
 