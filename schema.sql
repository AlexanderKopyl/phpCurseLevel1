
--
-- База данных: `yeticave`
--

-- --------------------------------------------------------


-- Создание базы
CREATE DATABASE YetiCave
--Указуем кодировку Базы Данных
  CHARACTER SET utf8 COLLATE utf8_general_ci;


--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
   PRIMARY KEY(id)
) ENGINE=MyISAM
     DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(0, 'Доски и лыжи');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `title` char(32) NOT NULL,
  `description` text,
  `img_url` varchar(100) NOT NULL,
  `category` int(10) NOT NULL,
  `price` float NOT NULL,
  `lot_step` float NOT NULL,
  `cout_rate` int(11) NOT NULL DEFAULT '0',
  `date_end` date NOT NULL,
  `date_add` timestamp NOT NULL,
  PRIMARY KEY(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `rate`
--

CREATE TABLE `rate` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `lot_rate` float NOT NULL,
  `time_add_rate` date NOT NULL,
  `date_add_rate` timestamp NOT NULL,
  PRIMARY KEY(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--



--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `product_fk0` (`user_id`),
  ADD KEY `product_fk1` (`category`);

--
-- Индексы таблицы `rate`
--
ALTER TABLE `rate`
  ADD KEY `product_us` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `password` (`password`,`email`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_fk0` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `product_fk1` FOREIGN KEY (`category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_us` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
