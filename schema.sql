-- Создание базы
CREATE DATABASE YetiCave
--Указуем кодировку Базы Данных
  CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Удаление Базы
-- DROP DATABASE YetiCave

-- Создание таблицы User
create table `user`
(
id int(10) NOT NULL Primary key,
name char(25) NOT NULL,
password varchar(32) NOT NULL,
salt varchar(10) NOT NULL,
email varchar(50) NOT NULL
);

--Удаление таблицы
-- DROP TABLE user;

--Проставляем уникальность email
ALTER TABLE `user` ADD UNIQUE( `email`);
--Добавляем индекс для увеличения скорости поиска
ALTER TABLE `user` ADD INDEX( `password`, `email`);

-- Создание таблицы Product
create table  `product`
(
id int(10) NOT NULL PRIMARY KEY,
user_id int(10) NOT NULL,
title char(32) NOT NULL,
description text,
img_url varchar(100) NOT NULL,
category int(10) NOT NULL,
price float(10) NOT NULL,
lot_step float(10) NOT NULL,
date_end DATE NOT NULL,
date_add TIMESTAMP NOT NULL,
cout_rate int(11) default '0';
)

-- Создание таблицы category
CREATE table `category`
(
id int(10) NOT NULL PRIMARY KEY,
title varchar(20) NOT NULL
)

-- Добавляем зависимость от юзер айди(Какой юзер добавил продукт)
ALTER TABLE `product` ADD CONSTRAINT `product_fk0` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`);

-- К какой категории пренадлежит
ALTER TABLE `product` ADD CONSTRAINT `product_fk1` FOREIGN KEY (`category`) REFERENCES `category`(`id`);

--Проставляем уникальность title
ALTER TABLE `product` ADD UNIQUE(`title`);


-- Создание таблицы rate
create table  `rate`
(
id int(10) NOT NULL PRIMARY KEY,
user_id int(10) NOT NULL,
lot_rate float(20) NOT NULL,
time_add_rate DATE NOT NULL,
date_add_rate TIMESTAMP NOT NULL,
product_id int(10)NOT NULL
)

-- Добавляем зависимость от юзер айди(Какой юзер добавил продукт)
ALTER TABLE `rate` ADD CONSTRAINT `product_us` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`);
-- Добавляем зависимость от продукта(за какой проголосовали)
ALTER TABLE `rate` ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product`(`id`);
