CREATE DATABASE Yeticave
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;
	
CREATE TABLE category (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name CHAR(64)
);

CREATE TABLE lot (
	id INT AUTO_INCREMENT PRIMARY KEY,
	creation_date  DATE,
	name CHAR(128),
	discription CHAR(255),
	image CHAR(128),
	start_price MEDIUMINT,
	end_date DATE,
	rate_step SMALLINT
);

CREATE TABLE rate (
	id INT AUTO_INCREMENT PRIMARY KEY,
	date DATE,
	sum MEDIUMINT
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

USE Yeticave;

	
	