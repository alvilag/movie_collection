-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2015. márc. 11. 12:43
-- Szerver verzió: 5.5.40
-- PHP verzió: 5.4.35-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `movie`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet: `actor`
--

CREATE TABLE IF NOT EXISTS `actor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `actor`
--

INSERT INTO `actor` (`id`, `movie_id`, `name`, `birthdate`) VALUES
(1, 1, 'First actor', -1458691200),
(2, 2, 'Second actor', -58691200),
(3, 3, 'Third actor', 12345),
(4, 4, 'Fourth actor', 100000),
(5, 1, 'Fifth actor', -691200);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `runtime` int(11) NOT NULL,
  `release_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- A tábla adatainak kiíratása `movie`
--

INSERT INTO `movie` (`id`, `title`, `runtime`, `release_date`) VALUES
(1, 'First movie', 5400, 1388534400),
(2, 'Second movie', 6543, 138853440),
(3, 'Third movie', 4770, 1088534400),
(4, 'Fourth movie', 7400, 1288534400);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
