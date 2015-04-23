-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2015 г., 11:43
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
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Sex` enum('M','F') NOT NULL,
  `GroupNumber` int(5) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mark` int(3) NOT NULL,
  `Local` enum('L','N') NOT NULL,
  `BirthDate` int(4) NOT NULL,
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `pswrd` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `Students`
--

INSERT INTO `Students` (`Name`, `Surname`, `Sex`, `GroupNumber`, `Email`, `Mark`, `Local`, `BirthDate`, `ID`, `pswrd`) VALUES
('Анна', 'Ахматова', 'F', 196, 'annushka1@mail.ru', 188, 'L', 1995, 31, 'a7b80787ed3549fc139e10331b27e6f258d56514');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
