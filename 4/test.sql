-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2018 г., 13:14
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `first`
--

CREATE TABLE `first` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `first`
--

INSERT INTO `first` (`id`, `first_name`) VALUES
(1, 'first'),
(2, 'second'),
(3, 'third'),
(4, 'fourth');

-- --------------------------------------------------------

--
-- Структура таблицы `first_second`
--

CREATE TABLE `first_second` (
  `first_id` int(10) NOT NULL,
  `second_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `first_second`
--

INSERT INTO `first_second` (`first_id`, `second_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `second`
--

CREATE TABLE `second` (
  `id` int(10) NOT NULL,
  `second_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `second`
--

INSERT INTO `second` (`id`, `second_name`) VALUES
(1, 'first'),
(2, 'second'),
(3, 'third'),
(4, 'fourth');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `first`
--
ALTER TABLE `first`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `first_second`
--
ALTER TABLE `first_second`
  ADD KEY `first_id` (`first_id`),
  ADD KEY `second_id` (`second_id`);

--
-- Индексы таблицы `second`
--
ALTER TABLE `second`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `first`
--
ALTER TABLE `first`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `second`
--
ALTER TABLE `second`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `first`
--
ALTER TABLE `first`
  ADD CONSTRAINT `first_ibfk_1` FOREIGN KEY (`id`) REFERENCES `first_second` (`first_id`);

--
-- Ограничения внешнего ключа таблицы `second`
--
ALTER TABLE `second`
  ADD CONSTRAINT `second_ibfk_1` FOREIGN KEY (`id`) REFERENCES `first_second` (`second_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
