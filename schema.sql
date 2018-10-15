CREATE DATABASE Yeticave
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_general_ci;


USE Yeticave;

CREATE TABLE categories (
  id   INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR(64)
);

CREATE TABLE users (
  id                INT AUTO_INCREMENT PRIMARY KEY,
  registration_date DATETIME,
  email             CHAR(128),
  name              CHAR(128),
  password          CHAR(64),
  avatar            CHAR(128),
  contacts          CHAR(255)
);

CREATE TABLE lots (
  id                 INT AUTO_INCREMENT PRIMARY KEY,
  creation_date_time DATETIME,
  name               CHAR(128),
  description        TEXT,
  image              CHAR(128),
  start_price        INT,
  end_date_time      DATETIME,
  bet_step           SMALLINT,
  category_id        INT,
  user_id            INT,
  winner_id          INT,
  price              INT,
  FOREIGN KEY (category_id) REFERENCES categories (id),
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (winner_id) REFERENCES users (id)
);

CREATE TABLE bets (
  id      INT AUTO_INCREMENT PRIMARY KEY,
  date    DATETIME,
  price   INT,
  user_id INT,
  lot_id  INT,
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (lot_id) REFERENCES lots (id)
);

CREATE FULLTEXT INDEX gif_ft_search
  ON gifs(title, description)

	