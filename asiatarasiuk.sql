-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Sty 2019, 06:26
-- Wersja serwera: 10.1.37-MariaDB-2.cba
-- Wersja PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `asiatarasiuk`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane`
--

CREATE TABLE `dane` (
  `id` int(11) NOT NULL,
  `imie` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `plec` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nazwisko_panienskie` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kod_pocztowy` varchar(8) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `dane`
--

INSERT INTO `dane` (`id`, `imie`, `nazwisko`, `plec`, `nazwisko_panienskie`, `email`, `kod_pocztowy`) VALUES
(1, 'asddsa', 'fddf', 'Kobieta', 'dssad', 'ds@wp.pl', '70-454'),
(2, 'vfds', 'dfdfs', 'Kobieta', 'asddsa', 'dsads@wp.pl', '70-432');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `data`
--

CREATE TABLE `data` (
  `ID` int(11) NOT NULL,
  `IMIE` text COLLATE latin1_general_ci NOT NULL,
  `NAZWISKO` text COLLATE latin1_general_ci NOT NULL,
  `PLEC` text COLLATE latin1_general_ci NOT NULL,
  `NAZWISKO_PANIENSKIE` text COLLATE latin1_general_ci NOT NULL,
  `EMAIL` text COLLATE latin1_general_ci NOT NULL,
  `KOD_POCZTOWY` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `data`
--

INSERT INTO `data` (`ID`, `IMIE`, `NAZWISKO`, `PLEC`, `NAZWISKO_PANIENSKIE`, `EMAIL`, `KOD_POCZTOWY`) VALUES
(1, 'adsdsa', 'dassaddsa', 'Kobieta', 'asd', 'asd@wp.pl', ''),
(2, 'dsaadsds', 'daasddsa', 'Kobieta', 'add', 'dsas@wp.pl', ''),
(3, 'Piotr', 'Gorzelak', 'Mezczyzna', 'Gorzelakowski', 'asf@wp.pl', ''),
(5, 'ads', 'dsdsd', 'Kobieta', 'dd', 'fff@wp.pl', '70-464'),
(6, 'dsdd', 'ddff', 'Kobieta', 'Iglewski', 'dsds@wp.pl', '70-464'),
(7, 'ccvf', 'dffd', 'Mezczyzna', 'ddd', 'dssd@wp.pl', '70-232'),
(8, 'dfff', 'dsdsd', 'Mezczyzna', 'sdfsdsd', 'dssd@wp.pl', '70-464'),
(9, 'fff', 'ffff', 'Kobieta', 'fff', 'dsdsd@wp.pl', '23-472'),
(10, 'ddfd', 'fff', 'Kobieta', 'ffff', 'jurza@wp.pl', '70-232'),
(11, 'dss', 'dsdssd', 'Kobieta', 'dsdsds', 'ddsds@wp.pl', '70-423'),
(12, 'fdsfs', 'ff', 'Mezczyzna', 'f', 'ggg@gg.kk', '55-555'),
(13, 'ff', 'f', 'Mezczyzna', 'v', 'ggg@gg.kk', '55-555');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `formularz`
--

CREATE TABLE `formularz` (
  `ID` int(2) NOT NULL,
  `Imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Plec` varchar(1) COLLATE utf8_polish_ci NOT NULL,
  `Panienskie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Kod` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `formularz`
--

INSERT INTO `formularz` (`ID`, `Imie`, `Nazwisko`, `Plec`, `Panienskie`, `Email`, `Kod`) VALUES
(3, 'znend', 'Bogdanski', 'M', '--', 'andrzej@wp.pl', '32-104'),
(4, 'ZMiena', 'Zielenowa', 'K', 'sdsd', 'dssdds@wp.pl', '44-321'),
(6, 'Marianna', 'Niezgoda', 'K', 'Wyzwolenia', 'dsd@wp.pl', '44-324'),
(8, 'Anna', 'Zukowska', 'K', 'Makowska', 'dasdsds@wp.pl', '44-321'),
(9, 'Mikolaj', 'Rydz', 'M', '--', 'ddfffd@wp.pl', '44-329'),
(10, 'Mariusz', 'Jedrzej', 'M', '--', 'ffffcc@wp.pl', '44-321'),
(11, 'Patryk', 'Swiestrzak', 'M', 'adamz', 'fgfgg@wp.pl', '44-329'),
(36, 'dfdf', 'fdf', 'M', '--', 'ggg@gg.kk', '55-666'),
(12, 'fdddfs', 'dsdasds', 'K', 'dasds', 'adsas@wp.pl', '70-431'),
(13, 'cxfdfd', 'dsdasdsa', 'K', 'sddsad', 'adsdsa@wp.pl', '23-431'),
(14, 'Borys', 'Borysowski', 'M', 'Jurewicz', 'dsds@wp.pl', '70-321'),
(35, 'g', 'bbbb', 'M', '--', 'ggg@gg.kk', '55-666');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `uprawnienia` int(11) NOT NULL,
  `imie` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`login`, `haslo`, `uprawnienia`, `imie`, `nazwisko`) VALUES
('user', 'user', 0, 'Adam', 'User'),
('admin', 'admin', 4, 'Adam', 'Administrator'),
('user1', 'user1', 1, 'user1', 'user1'),
('user2', 'user2', 2, 'user2', 'user2'),
('user3', 'user3', 3, 'user3', 'user3');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `dane`
--
ALTER TABLE `dane`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `formularz`
--
ALTER TABLE `formularz`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `dane`
--
ALTER TABLE `dane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `data`
--
ALTER TABLE `data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT dla tabeli `formularz`
--
ALTER TABLE `formularz`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
