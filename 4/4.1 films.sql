-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 01 2018 г., 00:41
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
-- База данных: `films`
--

-- --------------------------------------------------------

--
-- Структура таблицы `derectors`
--

CREATE TABLE `derectors` (
  `producer_id` int(11) NOT NULL,
  `Имя` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `derectors`
--

INSERT INTO `derectors` (`producer_id`, `Имя`) VALUES
(1, 'Питер Джексон'),
(2, 'Андрес Мускетти'),
(3, 'Мартин Скорсезе'),
(4, 'Джеймс Ганн'),
(5, 'Роберт Земекис'),
(6, 'Дени Вильнёв');

-- --------------------------------------------------------

--
-- Структура таблицы `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `Название` varchar(40) NOT NULL,
  `producer_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films`
--

INSERT INTO `films` (`film_id`, `Название`, `producer_id`) VALUES
(1, 'Назад в будущее', 5),
(2, 'Бегущий по лезвию 2049', 2),
(3, 'Стражи галактики', 4),
(4, 'Оно', 2),
(5, 'Остров проклятых', 3),
(7, 'Властелин колец: Братство кольца', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `films - genres`
--

CREATE TABLE `films - genres` (
  `film_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `films - genres`
--

INSERT INTO `films - genres` (`film_id`, `genre_id`) VALUES
(1, 7),
(1, 9),
(1, 3),
(2, 7),
(2, 5),
(2, 6),
(2, 2),
(3, 7),
(3, 8),
(3, 3),
(3, 9),
(4, 4),
(4, 5),
(4, 2),
(5, 5),
(5, 6),
(5, 2),
(7, 1),
(7, 2),
(7, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `Жанр` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`genre_id`, `Жанр`) VALUES
(1, 'Фентези'),
(2, 'Драма'),
(3, 'Приключения'),
(4, 'Ужасы'),
(5, 'Триллер'),
(6, 'Детектив'),
(7, 'Фантастика'),
(8, 'Боевик'),
(9, 'Комедия');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `derectors`
--
ALTER TABLE `derectors`
  ADD PRIMARY KEY (`producer_id`),
  ADD KEY `producer_id` (`producer_id`),
  ADD KEY `producer_id_2` (`producer_id`);

--
-- Индексы таблицы `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `producer_id` (`producer_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Индексы таблицы `films - genres`
--
ALTER TABLE `films - genres`
  ADD KEY `genre_id` (`genre_id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `derectors`
--
ALTER TABLE `derectors`
  MODIFY `producer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `films`
--
ALTER TABLE `films`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `films_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `derectors` (`producer_id`);

--
-- Ограничения внешнего ключа таблицы `films - genres`
--
ALTER TABLE `films - genres`
  ADD CONSTRAINT `films - genres_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`);

--
-- Ограничения внешнего ключа таблицы `genres`
--
ALTER TABLE `genres`
  ADD CONSTRAINT `genres_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `films - genres` (`genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
