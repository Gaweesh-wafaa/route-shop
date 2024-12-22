CREATE TABLE users(
    `id` integer(11) unsigned NOT null AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(50) NOT null,
    `email` varchar(255) NOT null UNIQUE,
    `password` varchar(255) NOT null,
    `phone` varchar(20) DEFAULT null,
    `address` varchar(255) DEFAULT null,
    `status` ENUM('user', 'admin') DEFAULT 'user'
    )

CREATE TABLE categories(
    `id` integer(11) unsigned NOT null AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(100) NOT null
    )

CREATE TABLE reviews(
    `id` integer(11) unsigned NOT null AUTO_INCREMENT PRIMARY KEY,
    `star` ENUM('0', '1','2','3','4','5') 
    )

CREATE TABLE products (
	`id` integer(11) unsigned NOT null AUTO_INCREMENT PRIMARY KEY,
    `image` varchar(50) NOT null,
    `name` varchar(100) NOT null ,
    `description` text,
    `price` decimal(10,2),
    `quantity` integer(11),
    `catogery_id` integer(11) unsigned NOT null,
    `review_id` integer(11) unsigned DEFAULT null,
    CONSTRAINT category_relation
    FOREIGN KEY (`catogery_id`) REFERENCES categories(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT review_relation
    FOREIGN KEY (`review_id`) REFERENCES reviews(`id`) ON UPDATE CASCADE ON DELETE CASCADE
    )

CREATE TABLE orders(
    `id` integer(11) unsigned NOT null AUTO_INCREMENT PRIMARY key,
    `product_id` integer(11) unsigned,
    `quantity` integer(11) unsigned,
    `total_price` decimal(10,2)
    )