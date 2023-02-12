-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Lut 2023, 13:21
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `artykuły`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_polish_ci NOT NULL,
  `content` text COLLATE utf8mb4_polish_ci NOT NULL,
  `idCategory` int(11) NOT NULL,
  `ipCzytajacego` text COLLATE utf8mb4_polish_ci NOT NULL,
  `statID` text COLLATE utf8mb4_polish_ci NOT NULL,
  `endID` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `articles`
--

INSERT INTO `articles` (`id`, `status`, `title`, `content`, `idCategory`, `ipCzytajacego`, `statID`, `endID`) VALUES
(1, 0, 'pierwszy artykul', 'To jest to pierwszy artykuł który dodaje do bazy danych', 0, '127.0.0.1', '2022-03-12', '2022-03-19'),
(2, 0, 'drugi', 'drugi artykuł dodany do bazy danych', 0, '127.0.0.1', '2022-03-12', '2022-03-19'),
(82, 1, 'Przeykłądowy artykuł', 'sdkjfhg ksdhfg kjsdfhgh jksdhfgjk ', 1, '-', '2022-04-13', '2022-04-30'),
(84, 0, 'sg sdg srtg stg sdg s gt', 'fdf fdg sgf sdfg sfdg', 1, '-', '2022-04-05', '2022-04-22'),
(85, 1, 'ARTYKUŁ', 'POLITYKA MOTORYZACJA WSZYSTKO NA RAZ', 1, '-', '2022-04-27', '2022-04-28'),
(86, 1, 'osidf oisdufuoisfisuhfdg i', 'ksr ngkjsfdng jksldf hglskjhgsukjdhg lkjsdhgkldsjgkjhdsg', 5, '-', '2022-03-29', '2022-04-14'),
(88, 1, '34', '324', 2, '-', '2023-02-01', '2023-02-13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `toparticle`
--

CREATE TABLE `toparticle` (
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `toparticle`
--

INSERT INTO `toparticle` (`idArticle`) VALUES
(88);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `password` text COLLATE utf8mb4_polish_ci NOT NULL,
  `rola` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `rola`) VALUES
(122, 'adad', '209d5fae8b2ba427d30650dd0250942af944a0c9', 0),
(123, '123', '9adcb29710e807607b683f62e555c22dc5659713', 0),
(124, '123', '9adcb29710e807607b683f62e555c22dc5659713', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD KEY `id` (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
