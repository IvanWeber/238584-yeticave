CREATE DATABASE Yeticave
	DEFAULT CHARACTER SET utf8mb4
	DEFAULT COLLATE utf8mb4_general_ci;
	
	
USE Yeticave;
	
CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(64)
);

CREATE TABLE users (
	id INT AUTO_INCREMENT PRIMARY KEY,
	registration_date DATETIME,
	email CHAR(128),
	name CHAR(128),
	password CHAR(64),
	avatar CHAR(128),
	contacts CHAR(255)
);

CREATE TABLE lots (
	id INT AUTO_INCREMENT PRIMARY KEY,
	creation_date  DATE,
	name CHAR(128),
	discription CHAR(255),
	image CHAR(128),
	start_price MEDIUMINT,
	end_date DATE,
	bet_step SMALLINT,
	category_id INT,
	user_id INT,
	winner_id INT,
	price MEDIUMINT,
	FOREIGN KEY (category_id) REFERENCES categories(id),
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (winner_id) REFERENCES users(id)
);

CREATE TABLE bets (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date DATE,
	price MEDIUMINT,
	user_id INT,
	lot_id INT,
	FOREIGN KEY (user_id) REFERENCES users(id),
	FOREIGN KEY (lot_id) REFERENCES lots(id)
);


	