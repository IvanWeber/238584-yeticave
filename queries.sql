INSERT INTO categories (id, name) VALUES
(1, 'Доски и лыжи'),
(2, 'Крепления'),
(3, 'Ботинки'),
(4, 'Одежда'),
(5, 'Инструменты'),
(6, 'разное');
	
INSERT INTO users (id, name) VALUES
(1, 'Иван'),
(2, 'Константин'),
(3, 'Евгений'),
(4, 'Семён');

INSERT INTO lots (id, name, category_id, start_price, image, creation_date, bet_step) VALUES
(1, '2014 Rossignol District Snowboard', 1, 10999, 'img/lot-1.jpg', '18.09.21', (SELECT COUNT(*) FROM bets WHERE lot_id=1)),
(2, 'DC Ply Mens 2016/2017 Snowboard', 1, 159999, 'img/lot-2.jpg', '18.09.22', (SELECT COUNT(*) FROM bets WHERE lot_id=2)),
(3, 'Крепления Union Contact Pro 2015 года размер L/XL', 2, 8000, 'img/lot-3.jpg', '18.09.24', (SELECT COUNT(*) FROM bets WHERE lot_id=3)),
(4, 'Ботинки для сноуборда DC Mutiny Charocal', 3, 10999, 'img/lot-4.jpg', '18.09.25', (SELECT COUNT(*) FROM bets WHERE lot_id=4)),
(5, 'Куртка для сноуборда DC Mutiny Charocal', 4, 7500, 'img/lot-5.jpg', '18.09.26', (SELECT COUNT(*) FROM bets WHERE lot_id=5)),
(6, 'Маска Oakley Canopy', 6, 5400, 'img/lot-6.jpg', '18.09.27', (SELECT COUNT(*) FROM bets WHERE lot_id=6));

UPDATE lots SET end_date='18.09.23' WHERE id=1;

UPDATE lots SET end_date='19.09.24' WHERE id=2;

INSERT INTO bets (id, user_id, sum, lot_id, date) VALUE
(1, 1, 11500, 4, '18.09.25'),
(2, 2, 11000, 3, '18.09.25'),
(3, 3, 10500, 5, '18.09.26'),
(4, 4, 10000, 6, '18.09.27'),
(5, 3, 11500, 3, '18.09.26');


UPDATE lots SET `bet_step`=(SELECT COUNT(*) FROM bets WHERE lot_id=1) WHERE id=1; 
UPDATE lots SET `price`=(SELECT sum FROM bets WHERE lot_id=1 AND id=(SELECT MAX(id) FROM bets WHERE lot_id=1)) WHERE id=1;
UPDATE lots SET `bet_step`=(SELECT COUNT(*) FROM bets WHERE lot_id=2) WHERE id=2; 
UPDATE lots SET `price`=(SELECT sum FROM bets WHERE lot_id=2 AND id=(SELECT MAX(id) FROM bets WHERE lot_id=2)) WHERE id=2;
UPDATE lots SET `bet_step`=(SELECT COUNT(*) FROM bets WHERE lot_id=3) WHERE id=3; 
UPDATE lots SET `price`=(SELECT sum FROM bets WHERE lot_id=3 AND id=(SELECT MAX(id) FROM bets WHERE lot_id=3)) WHERE id=3;
UPDATE lots SET `bet_step`=(SELECT COUNT(*) FROM bets WHERE lot_id=4) WHERE id=4; 
UPDATE lots SET `price`=(SELECT sum FROM bets WHERE lot_id=4 AND id=(SELECT MAX(id) FROM bets WHERE lot_id=4)) WHERE id=4;
UPDATE lots SET `bet_step`=(SELECT COUNT(*) FROM bets WHERE lot_id=5) WHERE id=5; 
UPDATE lots SET `price`=(SELECT sum FROM bets WHERE lot_id=5 AND id=(SELECT MAX(id) FROM bets WHERE lot_id=5)) WHERE id=5;
UPDATE lots SET `bet_step`=(SELECT COUNT(*) FROM bets WHERE lot_id=6) WHERE id=6; 
UPDATE lots SET `price`=(SELECT sum FROM bets WHERE lot_id=6 AND id=(SELECT MAX(id) FROM bets WHERE lot_id=6)) WHERE id=6;

/*получить все категории;*/
SELECT name FROM categories; 

/*получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;*/
SELECT name, start_price, image, price, bet_step, creation_date, (SELECT name FROM categories WHERE id=category_id) FROM lots WHERE end_date is NULL ORDER BY creation_date ASC;

/*показать лот по его id. Получить также название категории, к которой принадлежит лот*/
SELECT name, (SELECT name FROM categories WHERE id=category_id) FROM lots WHERE id=3;

/*обновить название лота по его идентификатору;*/
UPDATE lots SET name='2015 Rossignol District Snowboard' WHERE id=1;

/*получить список самых свежих ставок для лота по его идентификатору;*/
SELECT * FROM bets WHERE lot_id=3 ORDER BY `date` ASC;  
 