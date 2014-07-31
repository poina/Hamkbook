-- phpMyAdmin SQL Dump
-- version 3.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2014 at 05:11 PM
-- Server version: 5.0.26
-- PHP Version: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trtknu11a3`
--

-- --------------------------------------------------------

--
-- Table structure for table `HB_Kayttajat`
--

CREATE TABLE IF NOT EXISTS `HB_Kayttajat` (
  `id` int(11) NOT NULL auto_increment,
  `etunimi` text NOT NULL,
  `sukunimi` text NOT NULL,
  `email` text NOT NULL,
  `syntymaaika` date NOT NULL,
  `salasana` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `HB_Kayttajat`
--

INSERT INTO `HB_Kayttajat` (`id`, `etunimi`, `sukunimi`, `email`, `syntymaaika`, `salasana`) VALUES
(2, 'Testi', 'Poika', 'testi@poika.fi', '2012-01-01', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(6, 'toni', 'Jarvinen', 'toni@gmail.com', '1999-05-15', 'bd462d5d7e7d5f8416515c6b0f3ed640'),
(8, 'Anssi', 'Päivinen', 'apaivinen@gmail.com', '1988-05-20', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(9, 'sdasd', 'asdasd', 'asd@asd.asd', '2012-01-01', '7815696ecbf1c96e6894b779456d330e'),
(10, 'Kalevi', 'Kekkonen', 'kaleviizthebest@suckit.com', '1912-01-01', '34eaa4671f1a4682337d966651ec21b1'),
(11, 'pera', 'tähti', 'pera@gmail.com', '1980-09-16', '6dbd0fe19c9a301c4708287780df41a2'),
(12, 'manne', 'mustalainen', 'manne@gmail.com', '1996-08-15', '235bdb83b7f0f617b62431b1583f7c55'),
(13, 'asd', 'asd', 'asd@asd.fi', '1989-09-03', 'a8f5f167f44f4964e6c998dee827110c'),
(14, 'Katja', 'Heino', 'katja.heino@gmail.com', '1984-03-18', '8e2219ccb0dd3f9942a6901c0767a834'),
(15, 'sperma', 'spördö', 'spudde@spud.com', '2012-02-02', 'fedfb26e5fb9d5cebbfe3245ec5daf7c'),
(16, 'Tommi', 'Saksa', 'tommi.saksa@hamk.fi', '1994-01-03', 'd4043d2f9265e18c794be4159faaef5c'),
(17, 'Anu', 'Saukko', 'anu.saukko@hamkbook.fi', '1987-05-12', 'aafb4adb7447bcb3a8bc718eba53be20');

-- --------------------------------------------------------

--
-- Table structure for table `HB_seina`
--

CREATE TABLE IF NOT EXISTS `HB_seina` (
  `id` int(20) NOT NULL auto_increment,
  `Nimi` longtext NOT NULL,
  `email` longtext NOT NULL,
  `viesti` longtext NOT NULL,
  `aika` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `HB_seina`
--

INSERT INTO `HB_seina` (`id`, `Nimi`, `email`, `viesti`, `aika`) VALUES
(1, ' ', '', '', '0000-00-00 00:00:00'),
(2, ' ', 'testi@poika.fi', 'Testi		', '2012-04-28 21:01:10'),
(3, ' ', 'testi@poika.fi', 'Testi		', '2012-04-28 21:01:28'),
(4, 'Testi Poika', 'testi@poika.fi', 'testi 2 toimiiko nyt', '2012-04-28 21:04:48'),
(5, 'Testi Poika', 'testi@poika.fi', 'testi 2 toimiiko nyt', '2012-04-28 21:06:15'),
(6, 'Testi Poika', 'testi@poika.fi', 'testi 2 toimiiko nyt', '2012-04-28 21:06:48'),
(7, 'Testi Poika', 'testi@poika.fi', 'testi 2 toimiiko nyt', '2012-04-28 21:08:09'),
(8, 'Testi Poika', 'testi@poika.fi', 'testi 2 toimiiko nyt', '2012-04-28 21:08:14'),
(9, 'Testi Poika', 'testi@poika.fi', 'testi 2 toimiiko nyt', '2012-04-28 21:08:32'),
(10, 'Testi Poika', 'testi@poika.fi', 'testi 2 toimiiko nyt', '2012-04-28 21:08:34'),
(11, 'Testi Poika', 'testi@poika.fi', 'testi3		', '2012-04-28 21:11:59'),
(12, 'Testi Poika', 'testi@poika.fi', 'testi3		', '2012-04-28 21:14:21'),
(13, 'Testi Poika', 'testi@poika.fi', 'testi3		', '2012-04-28 21:17:00'),
(14, 'Testi Poika', 'testi@poika.fi', 'testi3		', '2012-04-28 21:17:37'),
(15, 'Testi Poika', 'testi@poika.fi', 'testi3		', '2012-04-28 21:17:41'),
(16, 'Testi Poika', 'testi@poika.fi', 'Toimiiko nyt', '2012-04-28 21:20:41'),
(17, 'testi poika', 'testi@poika.fi', 'toimiiko seinä nyt			', '2012-04-28 22:48:02'),
(18, 'testi poika', 'testi@poika.fi', 'toimiiko seinä nyt			', '2012-04-28 22:48:32'),
(19, 'Testi Poika', 'testi@poika.fi', 'toimiiko seinä nyt			', '2012-04-28 22:49:15'),
(20, 'Testi Poika', 'testi@poika.fi', 'toimiiko seinä nyt			', '2012-04-28 22:50:32'),
(21, 'Testi Poika', 'testi@poika.fi', 'Nyt tässä on paljon tekstiä, tämän pitäisi olla ensimmäinen viesti ylhäällä', '2012-04-28 23:14:14'),
(22, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Toimiikohan rivitys oikein pitkässä tekstissä', '2012-04-28 23:21:35'),
(23, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Toimiikohan rivitys oikein pitkässä tekstissä  EI TOIMI vai toimiikohan sittenkin? 		', '2012-04-28 23:22:54'),
(24, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Nyt tämä tulostaa vain 10 viimeisintä viestiä\r\n						', '2012-04-28 23:35:29'),
(25, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Vielä kun saisi \\"Historia\\"-napin ja sinne yksinkertainen taulukko tulostus kaikista viesteistä aika järjestyksestä uusin ensin', '2012-04-28 23:47:59'),
(26, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Niin ja joku järkevä viestien päivityskin puuttuu, ellei sitä sitten joudu tekemään manuaalisesti', '2012-04-28 23:49:37'),
(27, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Sori Toni, tää suorastaan houkutteli tekemään seinän loppuun, varsinkin sen jälkeen kun tajusin kuinka yksinkertainen tämä on :D', '2012-04-29 00:07:05'),
(28, 'toni Jarvinen', 'toni@gmail.com', 'Voi hemmetti.. Ja mä olen laiskotellut täällä\r\n', '2012-04-29 17:08:12'),
(29, 'toni Jarvinen', 'toni@gmail.com', 'No nyt on ainakin alustavasti tehty alasvetovalikko. En tajunnut juurikaan siitä koodista, mutta leikkaaliimaa-menetelmä toimi. Jos jaksat, niin vilkaise sitä koodia. ', '2012-04-29 19:41:24'),
(30, 'toni Jarvinen', 'toni@gmail.com', 'Vielä varmaan tarvitisis jonkinlainen dokumentointi kirjoittaa\r\n', '2012-04-29 19:44:16'),
(31, 'toni Jarvinen', 'toni@gmail.com', 'AAAAAArrrggghhhh... IE ei suostu avaamaan tuota alasvetovalikkoa ollenkaan. \r\n', '2012-04-29 19:47:21'),
(32, 'toni Jarvinen', 'toni@gmail.com', 'Korjauksia tehty, mutta ei vaan suostu toimimaan.\r\n', '2012-04-30 09:20:39'),
(33, 'toni Jarvinen', 'toni@gmail.com', 'Tökkii tuo oikea facebook', '2012-04-30 15:55:31'),
(34, 'Testi Poika', 'testi@poika.fi', 'Joo, tässä on vastaus niihin validator erroreihin\r\nhttp://dl.dropbox.com/u/46675007/validatorerrorit.JPG', '2012-04-30 16:01:14'),
(35, 'Testi Poika', 'testi@poika.fi', 'CSS tiedostot pitäs määritellä <head> </head> tagien sisällä, se kitisee noistaki\r\nekalla sivulla on korjattu loopista tulevat 135 virhettä mutta esim. muuta tietoja sivulla sitä ei oo vielä fixattu', '2012-04-30 16:02:32'),
(36, 'toni Jarvinen', 'toni@gmail.com', 'Nyt on laitettu kaikkea mahdollista ja mahdotonta css- tiedostossa sekaisin', '2012-04-30 16:02:45'),
(37, 'toni Jarvinen', 'toni@gmail.com', 'Mutta miksi sitten laittaa ollenkaan div id, kun laittaisi aina div class, niin ei tule varmasti ongelmaa\r\n', '2012-04-30 16:11:43'),
(38, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Niimpä', '2012-04-30 16:42:51'),
(39, 'toni Jarvinen', 'toni@gmail.com', 'Nyt on muutettu yhtä jos toista. Pitäisi toimia kaikilla selaimilla.\r\n', '2012-04-30 21:46:58'),
(40, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Kirjoita viesti tähän ', '2012-04-30 22:00:11'),
(41, 'toni Jarvinen', 'toni@gmail.com', 'Linux:n firefox edelleen tiukenta tämän kaiken yhteen. :(', '2012-05-01 01:28:59'),
(42, 'toni Jarvinen', 'toni@gmail.com', 'Toimiiko, eikö toimi', '2012-05-01 11:44:10'),
(43, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Toimiikohan', '2012-05-01 14:33:33'),
(44, 'toni Jarvinen', 'toni@gmail.com', 'Jokohan tämä nyt alkaisi olla valmista kauraa..\r\n', '2012-05-01 14:56:31'),
(45, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Näyttäisi siltä', '2012-05-01 15:04:33'),
(46, 'Anssi Päivinen', 'apaivinen@gmail.com', 'Viesti', '2012-05-03 13:26:17'),
(47, 'sdasd asdasd', 'asd@asd.asd', 'HamkBook :D', '2012-05-03 14:25:43'),
(48, 'sdasd asdasd', 'asd@asd.asd', 'a', '2012-05-03 14:25:57'),
(49, 'Kalevi Kekkonen', 'kaleviizthebest@suckit.com', 'MOI KAIKKI!! TÄÄ ON IHQ!', '2012-05-03 16:31:32'),
(50, 'manne mustalainen', 'manne@gmail.com', 'HOIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII!', '2012-05-04 09:52:00'),
(51, 'manne mustalainen', 'manne@gmail.com', 'HYVIN HÖNKÄÄ PÅALOÖLJYMERSU! voi veikkonen caps', '2012-05-04 09:52:25'),
(52, 'asd asd', 'asd@asd.fi', '123', '2012-05-04 10:27:05'),
(53, 'toni Jarvinen', 'toni@gmail.com', 'Näköjään toimii, kun jengi testailee. :D Voikin laittaa nämä testaukset vielä Tommille.\r\n', '2012-05-07 15:40:12'),
(54, 'katja Heino', 'katja.heino@gmail.com', ':)', '2012-05-14 09:33:44'),
(55, 'Tommi Saksa', 'tommi.saksa@hamk.fi', 'Testiä jees ja omalla rivillä\r\nä ja ö', '2012-06-04 12:50:03'),
(56, 'Anu Saukko', 'anu.saukko@hamkbook.fi', 'hamkbook on tosi siisti paikka. kyllä nyt kelpaa', '2012-06-05 15:14:42'),
(57, 'toni Jarvinen', 'toni@gmail.com', '\r\nLäpi meni...  :D', '2012-06-05 15:16:12'),
(58, 'Testi Poika', 'testi@poika.fi', 'Toimiiko viela?', '2014-04-23 11:37:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
