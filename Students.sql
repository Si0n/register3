-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 26 2015 г., 12:47
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
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_2` (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=447 ;

--
-- Дамп данных таблицы `Students`
--

INSERT INTO `Students` (`name`, `surname`, `sex`, `groupNumber`, `email`, `mark`, `local`, `birthDate`, `ID`, `password`, `photo`) VALUES
('Екатерина', 'Резник', 'F', 144, 'DuckTales3@mail.ru', 198, 'N', 1998, 445, 'TYIYRpRuRW', NULL),
('Сергей', 'Винский', 'M', 196, 'annushka1@mail.ru', 188, 'N', 1998, 446, '644T1E0gjF', 'bk7ol7Mlp_A.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
