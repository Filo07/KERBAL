-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 29 maj 2026 kl 10:45
-- Serverversion: 10.4.32-MariaDB
-- PHP-version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `kerbal`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `username`, `message`, `created_at`) VALUES
(1, 'filo', 'Hello', '2026-05-22 08:29:16'),
(2, 'filo', 'Hi!', '2026-05-22 08:29:24'),
(3, 'filo', 'Hi', '2026-05-22 08:31:22'),
(4, 'filo', 'test', '2026-05-22 08:31:58'),
(5, 'filo', 'test', '2026-05-22 08:33:35'),
(6, 'filo', 'this is another test', '2026-05-22 08:35:25'),
(7, 'filo', 'This is a test for long strings of letters. blah blah blah blah blah blah blah blah blah blah blah blah blah.', '2026-05-22 08:36:17'),
(8, 'filo', 'Test', '2026-05-22 08:39:04'),
(9, 'filo', 'Hello my friends! The chat function is now finished!', '2026-05-22 08:49:04'),
(10, 'filo', 'll', '2026-05-22 08:59:11'),
(11, 'dreamybull', 'ambatubas', '2026-05-22 09:00:00'),
(12, 'dreamybull', 'ambatukamambatukamambatukamambatukamambatukamambatukamambatukamambatukamambatukamambatukamambatukam', '2026-05-22 09:00:32'),
(13, 'dreamybull', 'ambatukamambatukamambatukamambatukamambatukamambatukamambatukamambatukamambatukamambatukam', '2026-05-22 09:00:40'),
(14, 'dreamybull', 'ambatukamambatukamambatukamambatukam ambatukamambatukamambatukamambatukamambatukam ambatukamambatukam', '2026-05-22 09:00:46'),
(15, 'filo', 'Hello!', '2026-05-28 17:09:53'),
(16, 'filo', 'Hi!', '2026-05-28 17:09:55'),
(17, 'filo', 'Hello!', '2026-05-29 08:07:06');

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_kerbal`
--

CREATE TABLE `tbl_kerbal` (
  `id` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userlevel` int(11) NOT NULL DEFAULT 5,
  `lastlogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_kerbal`
--

INSERT INTO `tbl_kerbal` (`id`, `username`, `password`, `userlevel`, `lastlogin`, `created`) VALUES
(1, 'filo', '$2y$10$viTL/vhgtz38iZZXgo3ZUu0nqSOfObla0g72KFzvLyGaQH.k322wa', 5, '2026-05-29 08:22:16', '2026-04-24 09:07:23'),
(2, 'dreamybull', '$2y$10$.B/8rDQuAJ6nxeTUJJbTDOZsOy3./Q.3AQcx5N9od81ZJMEQsVI1q', 5, '2026-05-22 08:59:50', '2026-05-22 08:59:28'),
(3, 'dsadsa', '$2y$10$Otrfvmd1G9q7.9EjkicbQePSwaTFO5U/mJyRBt5GQMQ3YCoAr3dzC', 5, '2026-05-22 08:59:41', '2026-05-22 08:59:41'),
(4, 'bullu', '$2y$10$4lPqZ6L3Fcg8.STIyQ9hFO3sxtT9flhIedsrgJsh.HD3aRaXCGXwS', 5, '2026-05-29 08:30:42', '2026-05-29 08:30:42');

-- --------------------------------------------------------

--
-- Tabellstruktur `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `description`, `price`) VALUES
(1, 'T-shirt', 'T-shirt for fans', 199.00),
(2, 'Jebediah Kerman', 'Jeb', 299.00);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbl_kerbal`
--
ALTER TABLE `tbl_kerbal`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT för tabell `tbl_kerbal`
--
ALTER TABLE `tbl_kerbal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
