DROP DATABASE shop;
CREATE DATABASE shop;
USE shop;

CREATE TABLE Category
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	name VARCHAR(256) NOT NULL
);

CREATE TABLE Item
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
 	name VARCHAR(256) NOT NULL,
  	url VARCHAR(256), 
  	price INT NOT NULL, 
  	categoryId INT, 
  	FOREIGN KEY (categoryId) REFERENCES Category (id)
);

CREATE TABLE User
(
	id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	firstName VARCHAR(256) NOT NULL,
	lastName VARCHAR(256) NOT NULL,
	password VARCHAR(256) NOT NULL,
	username VARCHAR(256) NOT NULL,
	email VARCHAR(256) NOT NULL,
	role VARCHAR(256) NOT NULL,
	status VARCHAR(256) NOT NULL
);

