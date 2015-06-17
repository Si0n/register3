-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 16 2015 г., 18:19
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=432 