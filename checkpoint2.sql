-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2016 at 07:54 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `checkpoint2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `published` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `description`, `published`) VALUES
(5, 'Dark Days: A Memoir ', 'Randy Blythe', 'Lamb of god vocalist D. Randall Blythe finally tells the whole incredible story of his arrest, incarceration, trial, and acquittal for manslaughter in the Czech Republic over the tragic and accidental death of a concertgoer in this riveting, gripping, biting, bold, and brave memoir.', '2015-11-04'),
(6, 'THE GREAT GATSBY', 'F. Scott Fitzgerald', 'The Great Gatsby is a 1925 novel written by American author F. Scott Fitzgerald that follows a cast of characters living in the fictional town of West Egg on prosperous Long Island in the summer of 1922. The story primarily concerns the young and mysterious millionaire Jay Gatsby and his quixotic passion and obsession for the beautiful former debutante Daisy Buchanan. Considered to be Fitzgerald''s magnum opus, The Great Gatsby explores themes of decadence, idealism, resistance to change, social upheaval, and excess, creating a portrait of the Jazz Age or the Roaring Twenties that has been described as a cautionary tale regarding the American Dream.', '1925-11-04'),
(7, 'THE LORD OF THE RINGS', 'J.R.R. Tolkien', 'The Lord of the Rings is an epic high-fantasy novel written by English author J. R. R. Tolkien. The story began as a sequel to Tolkien''s 1937 fantasy novel The Hobbit, but eventually developed into a much larger work. Written in stages between 1937 and 1949, The Lord of the Rings is the second best-selling novel ever written, with over 150 million copies sold.', '1937-11-04'),
(8, 'CATCH-22', 'Joseph Heller', 'Catch-22 is a satirical novel by the American author Joseph Heller. He began writing it in 1953; the novel was first published in 1961. It is frequently cited as one of the greatest literary works of the twentieth century. It uses a distinctive non-chronological third-person omniscient narration, describing events from the points of view of different characters. The separate storylines are out of sequence so that the timeline develops along with the plot.', '1961-11-04'),
(10, 'Harry Potter', 'J. K. Rowling', 'Harry Potter is a series of seven fantasy novels written by British author J. K. Rowling. The main story arc concerns Harry''s struggle to kill the Dark wizard Lord Voldemort, who aims to become immortal, overthrow the Ministry of Magic, subjugate non-magic people and destroy anyone who stands in his way.', '1997-05-26'),
(11, 'test', 'test', 'test', '1991-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `google_users`
--

CREATE TABLE IF NOT EXISTS `google_users` (
  `google_id` decimal(21,0) NOT NULL,
  `google_name` varchar(60) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `google_link` varchar(60) NOT NULL,
  `google_picture_link` varchar(200) NOT NULL,
  PRIMARY KEY (`google_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_users`
--

INSERT INTO `google_users` (`google_id`, `google_name`, `google_email`, `google_link`, `google_picture_link`) VALUES
('112305318627275909336', 'Sarthak Joshi', 'iamsarthakjoshi@gmail.com', 'https://plus.google.com/112305318627275909336', 'https://lh3.googleusercontent.com/-cXkO5vbOx1k/AAAAAAAAAAI/AAAAAAAAAUU/Vs_Ml27Mr14/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@live.com', 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
