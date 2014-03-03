# Create the TacoTruck database

CREATE DATABASE TacoTruck;
use TacoTruck;

DROP TABLE IF EXISTS TacoTruck.Users;
DROP TABLE IF EXISTS TacoTruck.Orders;
DROP TABLE IF EXISTS TacoTruck.TacoDetails;
DROP TABLE IF EXISTS TacoTruck.TacoOrders;
DROP TABLE IF EXISTS TacoTruck.Tortillas;
DROP TABLE IF EXISTS TacoTruck.Rice;
DROP TABLE IF EXISTS TacoTruck.Cheeses;
DROP TABLE IF EXISTS TacoTruck.Beans;
DROP TABLE IF EXISTS TacoTruck.Sauces;
DROP TABLE IF EXISTS TacoTruck.Type;
DROP TABLE IF EXISTS TacoTruck.TacoVegetables;
DROP TABLE IF EXISTS TacoTruck.TacoExtras;
DROP TABLE IF EXISTS TacoTruck.Vegetables;
DROP TABLE IF EXISTS TacoTruck.Extras;
DROP TABLE IF EXISTS TacoTruck.TacoFixings;
DROP TABLE IF EXISTS TacoTruck.Tacos;
DROP TABLE IF EXISTS TacoTruck.Fillings;


CREATE TABLE Users (
	user_id INT(30) NOT NULL AUTO_INCREMENT,
	givenName VARCHAR(255),
	surname VARCHAR(255),
	email VARCHAR(255),
	password VARCHAR(255),
	phoneNumber VARCHAR(255),
	CC_Provider VARCHAR(255),
	CC_Number VARCHAR(255),
	Primary Key (user_id)
) ENGINE=InnoDB;

CREATE TABLE Orders (
	order_id INT(30) NOT NULL AUTO_INCREMENT,
	user_id INT(30) NOT NULL,
	price DECIMAL(10,2),
	timePlaced DATETIME,
	Primary Key (order_id),
	Foreign Key (user_id) REFERENCES Users(user_id)
) ENGINE=InnoDB;

CREATE TABLE TacoOrders (
	tacoorder_id INT(30) NOT NULL AUTO_INCREMENT,
	order_id INT(30) NOT NULL,
	quantity INT(5) NOT NULL,
	Foreign Key (order_id) REFERENCES Orders(order_id),
	Primary Key (tacoorder_id)
) ENGINE=InnoDB;

CREATE TABLE TacoFixings (
	tacofixing_id int(11) NOT NULL AUTO_INCREMENT,
	itemType varchar(255) NOT NULL,
	name varchar(255) NOT NULL,
	price DECIMAL(10,2) NOT NULL,
	heatRating varchar(11) DEFAULT '0',
	PRIMARY KEY (tacofixing_id)
) ENGINE=InnoDB;

CREATE TABLE TacoDetails (
	tacodetails_id INT(30) NOT NULL AUTO_INCREMENT,
	tacoorder_id INT(30) NOT NULL,
	tacofixing_id INT(30) NOT NULL,
	Foreign Key (tacoorder_id) REFERENCES TacoOrders(tacoorder_id),
	Foreign Key (tacofixing_id) REFERENCES TacoFixings(tacofixing_id),
	Primary Key (tacodetails_id)
) ENGINE=InnoDB;



-- CREATE TABLE Tortillas (
-- 	tortilla_id INT(30) NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255),
-- 	price DECIMAL(10,2),
-- 	Primary Key (tortilla_id)
-- );

-- CREATE TABLE Rice (
-- 	rice_id INT(30) NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255),
-- 	price DECIMAL(10,2),
-- 	Primary Key (rice_id)
-- );

-- CREATE TABLE Cheese (
-- 	cheese_id INT(30) NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255),
-- 	price DECIMAL(10,2),
-- 	Primary Key (cheese_id)
-- );

-- CREATE TABLE Beans (
-- 	bean_id INT(30) NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255),
-- 	price DECIMAL(10,2),
-- 	Primary Key (bean_id)
-- );

-- CREATE TABLE Sauces (
-- 	sauce_id INT(30) NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255),
-- 	price DECIMAL(10,2),
-- 	heatRating INT(5),
-- 	Primary Key (sauce_id)
-- );

-- CREATE TABLE Type (
-- 	type_id INT(30) NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255),
-- 	price DECIMAL(10,2),
-- 	Primary Key (type_id)
-- );

-- CREATE TABLE TacoVegetables (
-- 	taco_id INT(30) NOT NULL,
-- 	vegetable_id INT(30) NOT NULL,
-- 	Foreign Key (taco_id) REFERENCES Tacos.taco_id,
-- 	Foreign KEY (vegetable_id) REFERENCES Vegetables.vegetable_id,
-- 	Primary Key (taco_id, vegetable_id)
-- );

-- CREATE TABLE TacoExtras (
-- 	taco_id INT(30) NOT NULL,
-- 	extra_id INT(30) NOT NULL,
-- 	Foreign Key (taco_id) REFERENCES Tacos.taco_id,
-- 	Foreign Key (extra_id) REFERENCES Extras.extra_id,
-- 	Primary Key (taco_id, extra_id)
-- );

-- CREATE TABLE Vegetables (
-- 	vegetable_id INT(30) NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255),
-- 	price DECIMAL(10,2),
-- 	Primary Key (vegetable_id)
-- );

-- CREATE TABLE Extras (
-- 	extra_id INT(30) NOT NULL AUTO_INCREMENT,
-- 	name VARCHAR(255),
-- 	price DECIMAL(10,2),
-- 	Primary Key (extra_id)
-- );





