INSERT INTO categories (id, name)
VALUES (1, 'Доски и лыжи'),
       (2, 'Крепления'),
       (3, 'Ботинки'),
       (4, 'Одежда'),
       (5, 'Инструменты'),
       (6, 'разное');

INSERT INTO `users` (`id`,`registration_date`,`email`,`name`,`password`,`avatar`,`contacts`) VALUES (1,'2018-09-15 00:00:00','ivan@yandex.ru','Иван','ivanpass',NULL,'Меня зовут Иван. Можете связаться со мной по телефону +7 777 777 77 77 в любое время');
INSERT INTO `users` (`id`,`registration_date`,`email`,`name`,`password`,`avatar`,`contacts`) VALUES (2,'2018-08-19 00:00:00','konstsupercoolguy@yandex.ru','Константин','konstpass',NULL,NULL);
INSERT INTO `users` (`id`,`registration_date`,`email`,`name`,`password`,`avatar`,`contacts`) VALUES (3,'2018-08-25 00:00:00','evgeniysupercoolguy@yandex.ru','Евгений','evgeniypass',NULL,NULL);
INSERT INTO `users` (`id`,`registration_date`,`email`,`name`,`password`,`avatar`,`contacts`) VALUES (4,'2018-09-05 00:00:00','semyon@yahoo.com','Семён','semyonpass',NULL,NULL);
INSERT INTO `users` (`id`,`registration_date`,`email`,`name`,`password`,`avatar`,`contacts`) VALUES (5,'2018-10-16 18:08:15','ivansupercoolguy@yandex.ru','Иван','$2y$10$KLRXzAd4oCukIofx4y9BzuZX/G36q4a1CH/CeV8EoNC79SnbrYxAu','uploads/5bc5fedf30c36people-2442565_960_720.jpg','123');


INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (1,'2018-09-21 16:57:12','2015 Rossignol District Snowboard','Недорогой и качественный сноуборд от компании Rossignol','img/lot-1.jpg',10999,'2018-10-23 16:57:12',500,1,NULL,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (2,'2018-09-22 18:23:21','DC Ply Mens 2016/2017 Snowboard','Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив снег\n       мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот снаряд отличной гибкостью и отзывчивостью, а симметричная\n        геометрия в сочетании с классическим прогибом кэмбер позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,\n        просто посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла равнодушным.','img/lot-2.jpg',159999,'2018-10-24 17:57:12',5000,1,NULL,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (3,'2018-09-24 17:21:21','Крепления Union Contact Pro 2015 года размер L/XL','Крепления для сноуборда компании Union Contact Pro','img/lot-3.jpg',8000,'2018-10-25 12:57:12',500,2,NULL,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (4,'2018-09-25 15:00:14','Ботинки для сноуборда DC Mutiny Charocal','Ботинки для сноуборда компании DC Mutiny Charocal','img/lot-4.jpg',10999,'2018-10-27 16:30:12',500,3,NULL,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (5,'2018-09-26 22:31:15','Куртка для сноуборда DC Mutiny Charocal','Куртка для сноуборда компании DC Mutiny Charocal','img/lot-5.jpg',7500,'2018-10-29 19:23:11',500,4,NULL,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (6,'2018-09-27 21:23:10','Маска Oakley Canopy','Сноубордическая маска компании Oakley Canopy','img/lot-6.jpg',5400,'2018-10-30 18:23:35',100,6,NULL,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (7,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (8,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (9,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (10,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (11,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (12,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (13,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (14,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (15,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (16,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (17,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (18,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (19,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (20,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (21,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-27 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (22,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-27 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (23,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-27 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (24,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (25,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (26,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (27,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (28,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (29,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (30,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (31,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (32,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (33,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (34,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (35,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (36,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (37,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (38,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (39,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (40,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (41,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (42,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (43,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (44,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-25 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (45,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-15 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (46,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-15 00:00:00',200,1,1,NULL,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (47,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-15 00:00:00',200,1,1,3,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (48,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-15 00:00:00',200,1,1,2,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (49,'2018-10-12 21:00:11','Превосходный сноуборд','Очень хороший сноуборд. Подойдёт всем.','img/superior_snowboard.jpg',20000,'2018-10-15 00:00:00',200,1,1,1,NULL);
INSERT INTO `lots` (`id`,`creation_date_time`,`name`,`description`,`image`,`start_price`,`end_date_time`,`bet_step`,`category_id`,`user_id`,`winner_id`,`price`) VALUES (50,'2018-10-18 12:10:57','фцв','фцв','uploads/5bc84e20efeb7DC YOUTH SCOUT.jpg',2000,'2018-10-25 00:00:00',100,3,5,NULL,NULL);


INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (1,'2018-09-23 00:00:00',11499,1,1);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (2,'2018-09-24 00:00:00',164999,1,2);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (3,'2018-09-25 00:00:00',11499,1,4);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (4,'2018-09-25 00:00:00',11000,2,3);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (5,'2018-09-26 00:00:00',10500,3,5);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (6,'2018-09-26 00:00:00',11500,3,3);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (7,'2018-09-27 00:00:00',11999,2,4);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (8,'2018-10-13 21:00:11',21000,1,49);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (9,'2018-10-13 22:00:11',22000,1,49);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (10,'2018-10-13 20:00:11',22000,1,48);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (11,'2018-10-13 21:23:11',23000,2,48);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (12,'2018-10-13 20:00:00',20500,3,47);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (13,'2018-10-13 20:30:00',21000,3,47);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (14,'2018-10-16 20:35:12',20500,5,29);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (15,'2018-10-16 20:35:29',12500,5,4);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (16,'2018-10-14 20:35:29',21000,5,46);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (17,'2018-10-14 20:35:29',21000,5,45);
INSERT INTO `bets` (`id`,`date`,`price`,`user_id`,`lot_id`) VALUES (18,'2018-10-13 19:00:00',20300,5,47);


/*получить все категории;*/
SELECT name
FROM categories;

/*получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, количество ставок, название категории;*/
SELECT lots.name,
       lots.start_price,
       lots.image,
       MAX(bets.price)   AS price,
       COUNT(bets.price) AS bets_numbers,
       creation_date_time,
       categories.name
FROM lots
       JOIN bets ON lots.id = bets.lot_id
       JOIN categories ON lots.category_id = categories.id
WHERE end_date_time is NULL
GROUP BY lots.name
ORDER BY creation_date_time DESC;


/*показать лот по его id. Получить также название категории, к которой принадлежит лот*/
SELECT lots.name, categories.name
FROM lots
       JOIN categories ON lots.category_id = categories.id
WHERE lots.id = 3;

/*обновить название лота по его идентификатору;*/
UPDATE lots
SET name = '2015 Rossignol District Snowboard'
WHERE id = 1;

/*получить список самых свежих ставок для лота по его идентификатору;*/
SELECT *
FROM bets
WHERE lot_id = 3
ORDER BY `date` ASC;
 