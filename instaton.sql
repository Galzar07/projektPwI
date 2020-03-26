-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Mar 2020, 19:52
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `instaton`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id_kom` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tresc` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`id_kom`, `id_user`, `tresc`) VALUES
(1, 1, 'asdadsa'),
(2, 2, 'siemanko');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto`
--

CREATE TABLE `konto` (
  `id_konto` int(11) NOT NULL,
  `polubienia` int(11) NOT NULL,
  `data_zalozenia` date NOT NULL,
  `id_obserwujacy` int(11) NOT NULL,
  `id_obserwatorzy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `konto`
--

INSERT INTO `konto` (`id_konto`, `polubienia`, `data_zalozenia`, `id_obserwujacy`, `id_obserwatorzy`) VALUES
(1, 1212, '2020-03-03', 2, 1),
(2, 231, '2020-03-03', 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obserwatorzy`
--

CREATE TABLE `obserwatorzy` (
  `id_obserwatorzy` int(11) NOT NULL,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `obserwatorzy`
--

INSERT INTO `obserwatorzy` (`id_obserwatorzy`, `nazwa`) VALUES
(1, 'sdasda'),
(2, 'dasasxa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obserwujacy`
--

CREATE TABLE `obserwujacy` (
  `id_obserwujacy` int(11) NOT NULL,
  `nazwa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `obserwujacy`
--

INSERT INTO `obserwujacy` (`id_obserwujacy`, `nazwa`) VALUES
(1, 'dsadas'),
(2, 'cascsa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(64) NOT NULL,
  `id_konto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `password`, `id_konto`) VALUES
(1, 'albercik@wp.pl', 'AlfaBetea', 'sdfsadd', 1),
(2, 'mila@gmail.com', 'milo', 'milenko11', 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id_kom`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeksy dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD PRIMARY KEY (`id_konto`),
  ADD KEY `id_obserwujacy` (`id_obserwujacy`) USING BTREE,
  ADD KEY `id_obserwatorzy` (`id_obserwatorzy`) USING BTREE;

--
-- Indeksy dla tabeli `obserwatorzy`
--
ALTER TABLE `obserwatorzy`
  ADD PRIMARY KEY (`id_obserwatorzy`);

--
-- Indeksy dla tabeli `obserwujacy`
--
ALTER TABLE `obserwujacy`
  ADD PRIMARY KEY (`id_obserwujacy`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_konto` (`id_konto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id_kom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `konto`
--
ALTER TABLE `konto`
  MODIFY `id_konto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `obserwatorzy`
--
ALTER TABLE `obserwatorzy`
  MODIFY `id_obserwatorzy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `obserwujacy`
--
ALTER TABLE `obserwujacy`
  MODIFY `id_obserwujacy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ograniczenia dla tabeli `konto`
--
ALTER TABLE `konto`
  ADD CONSTRAINT `konto_ibfk_1` FOREIGN KEY (`id_obserwatorzy`) REFERENCES `obserwatorzy` (`id_obserwatorzy`),
  ADD CONSTRAINT `konto_ibfk_2` FOREIGN KEY (`id_obserwujacy`) REFERENCES `obserwujacy` (`id_obserwujacy`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_konto`) REFERENCES `konto` (`id_konto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
