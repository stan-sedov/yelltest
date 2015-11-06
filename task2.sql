-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.23-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных task2
CREATE DATABASE IF NOT EXISTS `task2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `task2`;


-- Дамп структуры для таблица task2.authorship
CREATE TABLE IF NOT EXISTS `authorship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL DEFAULT '0',
  `writer_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы task2.authorship: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `authorship` DISABLE KEYS */;
INSERT INTO `authorship` (`id`, `book_id`, `writer_id`) VALUES
	(1, 1, 1),
	(2, 1, 3),
	(3, 2, 1),
	(4, 2, 2),
	(5, 2, 3),
	(6, 3, 3),
	(7, 3, 2),
	(8, 4, 3),
	(9, 5, 1);
/*!40000 ALTER TABLE `authorship` ENABLE KEYS */;


-- Дамп структуры для таблица task2.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы task2.books: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id`, `title`) VALUES
	(1, 'Города Европы'),
	(2, 'Практическое растениеводство'),
	(3, '99 Luftballons'),
	(4, 'Йога для начинающих'),
	(5, 'Букварь');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


-- Дамп структуры для таблица task2.writers
CREATE TABLE IF NOT EXISTS `writers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '0',
  `surname` varchar(100) NOT NULL DEFAULT '0',
  `patronymic` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы task2.writers: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `writers` DISABLE KEYS */;
INSERT INTO `writers` (`id`, `name`, `surname`, `patronymic`) VALUES
	(1, 'Иванов', 'Иван', 'Иванович'),
	(2, 'Петров', 'Петр', 'Петрович'),
	(3, 'Сидоров', 'Сидор', 'Сидорович');
/*!40000 ALTER TABLE `writers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
