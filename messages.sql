-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 26 2015 г., 12:43
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
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_target` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  UNIQUE KEY `id_message` (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id_message`, `id_target`, `id_author`, `date`, `message`) VALUES
(2, 445, 445, '2015-06-26 07:59:51', 'Hello there'),
(3, 445, 445, '2015-06-26 07:59:53', 'Hello again'),
(4, 445, 445, '2015-06-26 08:31:00', 'try5'),
(5, 445, 445, '2015-06-26 08:31:04', 'try2'),
(6, 445, 445, '2015-06-26 08:31:24', '231f'),
(7, 445, 445, '2015-06-26 08:31:26', '231'),
(8, 446, 446, '2015-06-26 09:29:16', 'хуй'),
(9, 446, 446, '2015-06-26 09:29:22', '12312'),
(10, 446, 446, '2015-06-26 09:30:16', '412'),
(11, 446, 446, '2015-06-26 09:30:18', '53123'),
(12, 446, 446, '2015-06-26 09:30:20', '32131'),
(13, 445, 446, '2015-06-26 09:33:50', 'хуй'),
(14, 446, 446, '2015-06-26 09:33:58', '132 1321'),
(15, 445, 446, '2015-06-26 09:40:31', '242'),
(16, 445, 446, '2015-06-26 09:41:17', 'В приложении Word можно выбирать любую из этих возможностей при каждой вставке текста. Если обычно применяется один из этих вариантов, ...\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
