-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 18 2018 г., 15:33
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `testtask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `news_id` int(5) NOT NULL,
  `author` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `news_id`, `author`, `text`, `date`) VALUES
(1, 1, 'Ivan petrov', 'Это мой коментарий', ''),
(2, 1, 'Иван Петров', 'А это второй комментарий', ''),
(4, 1, 'Dima Volkow', 'Мой комент', ''),
(5, 1, 'Dima Volkow', 'И ещё один', ''),
(6, 1, 'Dima Volkow', 'вася, это ты?', '2017-01-15'),
(7, 2, 'Dima Volkow', 'Тест', ''),
(8, 1, 'Вася Пупкин', 'Тест даты комментария', '2018-01-16'),
(9, 1, 'Вася Пупкин', 'dfcz', '2018-01-16'),
(10, 1, 'Вася Пупкин', 'РїСЂРёРІРµРµРµРµС‚', '2018-01-16'),
(11, 1, 'Вася Пупкин', 'test coment', '2018-01-16'),
(12, 2, 'Вася Пупкин', 'two is no one', '2018-01-16'),
(13, 3, 'Вася Пупкин', 'hi', '2018-01-16'),
(14, 1, 'Вася Пупкин', 'hello all!', '2018-01-16'),
(15, 12, 'Вася Пупкин', 'help me', '2018-01-16'),
(16, 1, 'Вася Пупкин', 'Р’СЃРµРј РїСЂРёРІРµС‚', '2018-01-16'),
(17, 1, 'Вася Пупкин', 'wE are the herous', '2018-01-16'),
(18, 5, 'Вася Пупкин', 'test', '2018-01-16'),
(19, 1, 'Вася Пупкин', 'test reg', '2018-01-16'),
(20, 18, 'Вася Пупкин', 'hello', '2018-01-17'),
(21, 18, 'Вася Пупкин', 'j', '2018-01-17');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `img`, `text`, `author`, `date`) VALUES
(1, 'Поездка в Прагу (октябрь 2017)', 'images/news.jpg', '27 июля 2017 году мы решили отметить это событие поездкой в Париж. Это была наша первая поездка без детей за последние несколько лет. За 6 дней мы исходили и избегали по Парижу почти 100 километров и наделали гигабайты фотографий. Та поездка удалась. Нам повезло, что французское посольство выдало шенгенскую визу на полгода. Было жалко использовать ее только один раз, поэтому, когда мне подвернулись дешевые авиабилеты в Прагу, я решил, что таку...', 'Artem Sudakow', '15.01.2018'),
(2, 'English word 3', 'images/news.jpg', 'updated 3', 'Вася Пупкин', '15.01.2018'),
(4, '4', 'images/news.jpg', '4', 'Ас', '15.01.2018'),
(5, '5', 'images/news.jpg', '5', 'Artem Sudakow', '15.01.2018'),
(6, '6', 'images/news.jpg', '6', 'ас', '15.01.2018'),
(7, '7', 'images/news.jpg', '7', 'р', '15.01.2018'),
(8, '8', 'images/news.jpg', 'pusto', 'длыв', '15.01.2018'),
(9, '9', 'images/news.jpg', 'цауцацацуцуац уа цуа ц уацу ац уа цу а цу ац', 'Василий', '15.01.2018'),
(10, '10', 'images/news.jpg', 'ываываыаыва ываваываыва ываываываыва', 'Иван', '15.01.2018'),
(11, '11', 'images/news.jpg', 'ывмывмы вм ывмывмывмыв мыв мы вм ыв м ывмывмывмывмы вмывмывмывмывмыв мыв мывмывм', 'Вася Пупкин', '15.01.2018'),
(12, '12', 'images/news.jpg', 'ывмы мывмывмыв мывмыв мывмывм ывм вымывм', 'Вася Пупкин', '15.01.2018'),
(13, 'test news 12', 'images/news.jpg', 'test news text', 'admin admin', '17.01.18'),
(15, 'test 2', 'images/Lighthouse.jpg', 'add test', 'admin', '2018-01-17'),
(16, 'Test 3', 'images/floatingapps.jpg', 'test news', 'admin', '2018-01-17'),
(18, 'ADASD 5', 'images/615504079.jpg', 'SDA afs', 'ASDA', '2018-01-17');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `mail`, `pass`, `role`) VALUES
(1, 'Vasia', 'Petrov', 'mailseles@mail.ru', '12345678', 'user'),
(2, 'Вася', 'Пупкин', 'help@mail.ru', '1659848', 'admin'),
(3, 'Viktoria', 'Peter', 'vi_pet@mail.ru', 'qwe213fqff', 'user'),
(8, 'Vitek', 'Somarov', 'viteksomarov@mail.ru', 'mypass77', 'user'),
(9, 'Dima', 'Volkow', 'volkow@mail.ru', 'pass', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
