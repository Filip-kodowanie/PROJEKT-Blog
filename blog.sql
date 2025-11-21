-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 21, 2025 at 02:35 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `articles`
--

CREATE TABLE `articles` (
  `article_id` mediumint(9) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL DEFAULT 'użytkownik nie napisał jeszcze treści',
  `summary` text NOT NULL DEFAULT 'użytkownik nie napisał jeszcze treści'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `summary`) VALUES
(1, 'elo', 'zelo', 'użytkownik nie napisał jeszcze treści'),
(2, 'SIEMA', 'hej', 'supoer'),
(5, 'paweł', 'Jeszcze gdy chodziłem do podstawówki, to był tam taki Paweł, i ja jechałem na rowerze, i go spotkałem, i potem jeszcze pojechałem do biedronki na lody, i po drodze do domu wtedy jeszcze, już do domu pojechałem', 'użytkownik nie napisał jeszcze treści'),
(7, 'hejka', '', 'halo'),
(8, '5', '5', '5'),
(9, '2', '', '3');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` mediumint(9) NOT NULL,
  `login` text NOT NULL,
  `haslo` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `login`, `haslo`, `email`) VALUES
(1, 'admin', 'admin1234', 'filip2137@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
