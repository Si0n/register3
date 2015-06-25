-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2015 г., 16:17
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `students_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Students`
--

CREATE TABLE IF NOT EXISTS `Students` (
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `sex` enum('M','F') NOT NULL,
  `groupNumber` int(5) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mark` int(3) NOT NULL,
  `local` enum('L','N') NOT NULL,
  `birthDate` year(4) NOT NULL,
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=441 ;

--
-- Дамп данных таблицы `Students`
--

INSERT INTO `Students` (`name`, `surname`, `sex`, `groupNumber`, `email`, `mark`, `local`, `birthDate`, `ID`, `password`, `photo`) VALUES
('Виктория', 'Заленская', 'F', 1885, 'vika@mail.ru', 177, 'N', 1995, 12, '243113sfsdf1223a', ''),
('Валентин', 'Матвиенко', 'M', 2513, 'val@mail.ru', 188, 'N', 1989, 15, '42718312d9sa9as7d18221', ''),
('Анна', 'Ахматовая', 'M', 144, 'annushka1@mail.ru', 188, 'L', 1995, 31, 'a7b80787ed3549fc139e10331b27e6f258d56514', ''),
('Витек', 'Викский', 'M', 1231, 'vik@maul.ru', 231, 'N', 1988, 424, '5fds21312', ''),
('Екатерина', 'Винский', 'M', 18992, 'DuckTales@mail.ru', 177, 'L', 1994, 425, 'b1a34ad21876ed6e0db55bf7e42a9f6108a74932', ''),
('Екатерина', 'Резник', 'M', 18992, 'DuckTales2@mail.ru', 188, 'L', 1998, 426, 'ea17ed996290982ae9b1897f2971c5d56aa6e21e', ''),
('Сергей', 'Фишерманс', 'M', 1261, 'DuckTales3@mail.ru', 199, 'L', 1997, 427, '508b7ab8c82edc12a4b1de6a391d7453bc77e6cd', ''),
('Вася', 'Викин', 'M', 1441, 'senior@example.com', 177, 'L', 1988, 428, 'aa3be12cc5c83f68430481c4a363c5720c5a3f4f', ''),
('Анон', 'Ан-он''о вич', 'M', 145, 'anon@example.com', 188, 'L', 1989, 429, 'f89f31b2cc22f8adbeb676c7d795a1a6c2f3dd1d', ''),
('Игорь', 'Про''ценко', 'M', 1852, 'igor2@example.com', 188, 'L', 1988, 430, 'waB7b8cZIO', ''),
('Екатерина', 'Резник', 'F', 18992, 'DuckTales4@mail.ru', 166, 'L', 1994, 431, 'E8ExT4Altk', ''),
('Андрей', 'Лебедин', 'M', 24918, 'DuckTales5@mail.ru', 178, 'L', 1988, 432, 'GQoCTqCGWr', ''),
('Екатерина', 'Резник', 'F', 18992, 'DuckTales6@mail.ru', 188, 'L', 1994, 433, '8DjU5jvxCz', ''),
('Игорь', 'Проценко', 'F', 1312, 'DuckTales35@mail.ru', 166, 'L', 1994, 434, 'FcjzIx4XQ4', ''),
('Екатерина', 'Резник', 'F', 18992, 'DuckTale2@mail.ru', 188, 'N', 1998, 435, 'ahyPNA1pFR', ''),
('Екатерина', 'Резник', 'M', 18992, 'DuckTale3s@mail.ru', 188, 'N', 1995, 436, 'fBCUspxAYd', ''),
('Полина', 'Семенова', 'F', 3214, 'Polina@example.ru', 188, 'L', 1997, 437, 'n5wu5XPA50', ''),
('Екатерина', 'Резник', 'F', 18992, 'Duck2ales2@mail.ru', 166, 'N', 1994, 438, '6 9GFmisVl', ''),
('Игорь', 'Проценко', 'M', 196, 'DuckTal2es@mail.ru', 199, 'L', 1998, 439, 'kwW1BK1Tg1', ''),
('Полина', 'Семенова', 'F', 17853, 'Polina_Semenova@example.com', 188, 'L', 1996, 440, 'o1Z2NGce7M', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
