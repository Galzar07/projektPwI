-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Cze 2020, 19:14
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
-- Struktura tabeli dla tabeli `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `zdjecie` varchar(255) NOT NULL,
  `polubienia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `galeria`
--

INSERT INTO `galeria` (`id`, `zdjecie`, `polubienia`) VALUES
(50, 'https://ocdn.eu/pulscms-transforms/1/0kGk9kpTURBXy8yM2M5ZTFkNTdlNmFhMjRjYWU2YWJjYjc3NGM2N2VhYi5qcGeUlQMAH80EAM0CQJMFzQMUzQG8lQfZMi9wdWxzY21zL01EQV8vMjMzN2M5ZmQ2YjkzMWVlNmNiMGQyM2RjYmEyNThhOWQucG5nAMIAkwmmMDM0NDIwBoGhMAE/000-1jz0kb.jpg', 3),
(55, 'https://ocdn.eu/pulscms-transforms/1/RqkktkqTURBXy81ZWIzZWU2MDIzZjVkOTM4OGRiN2IwNWQwNTYxODEyMy5qcGVnkZMCAM0B5A', 3),
(55, 'https://ocs-pl.oktawave.com/v1/AUTH_2887234e-384a-4873-8bc5-405211db13a2/spidersweb/2018/11/2018-Comedy-Wildlife-Photography-Awards_wyniki_01-1180x541.jpg', 3);

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
(1, 55, 'WITAM WSZYSTKICH'),
(2, 55, 'dudaryk naprawde fajna panda');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konto`
--

CREATE TABLE `konto` (
  `id_konto` int(11) NOT NULL,
  `polubienia` int(11) NOT NULL,
  `data_zalozenia` date NOT NULL,
  `profilowe` varchar(1000) NOT NULL,
  `obserwatorzy` int(11) NOT NULL,
  `obserwujacy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `konto`
--

INSERT INTO `konto` (`id_konto`, `polubienia`, `data_zalozenia`, `profilowe`, `obserwatorzy`, `obserwujacy`) VALUES
(46, 0, '2020-06-02', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.tapetus.pl%2F57515%2Cludzik-3d-puzzle.php&psig=AOvVaw1D2gO6wH5SRQPJawSHpnSh&ust=1591440224952000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCNDkgYO_6ukCFQAAAAAdAAAAABAE', 0, 0),
(47, 0, '2020-06-02', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.tapetus.pl%2F57515%2Cludzik-3d-puzzle.php&psig=AOvVaw1D2gO6wH5SRQPJawSHpnSh&ust=1591440224952000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCNDkgYO_6ukCFQAAAAAdAAAAABAE', 0, 0),
(48, 0, '2020-06-02', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.tapetus.pl%2F57515%2Cludzik-3d-puzzle.php&psig=AOvVaw1D2gO6wH5SRQPJawSHpnSh&ust=1591440224952000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCNDkgYO_6ukCFQAAAAAdAAAAABAE', 0, 0),
(49, 0, '2020-06-02', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.tapetus.pl%2F57515%2Cludzik-3d-puzzle.php&psig=AOvVaw1D2gO6wH5SRQPJawSHpnSh&ust=1591440224952000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCNDkgYO_6ukCFQAAAAAdAAAAABAE', 0, 0),
(50, 0, '2020-06-02', 'https://ocdn.eu/pulscms-transforms/1/0kGk9kpTURBXy8yM2M5ZTFkNTdlNmFhMjRjYWU2YWJjYjc3NGM2N2VhYi5qcGeUlQMAH80EAM0CQJMFzQMUzQG8lQfZMi9wdWxzY21zL01EQV8vMjMzN2M5ZmQ2YjkzMWVlNmNiMGQyM2RjYmEyNThhOWQucG5nAMIAkwmmMDM0NDIwBoGhMAE/000-1jz0kb.jpg', 0, 0),
(51, 0, '2020-06-05', 'https://r-scale-20.dcs.redcdn.pl/scale/o2/tvn/web-content/m/p1/i/c1fea270c48e8079d8ddf7d06d26ab52/f132e851-9c81-4fe9-b985-95240e6fdeca.jpg?type=1&srcmode=0&srcx=1%2F1&srcy=1%2F1&srcw=1%2F1&srch=1%2F1&dstw=1920&dsth=1080&quality=80&fbclid=IwAR1G38f08oOGFJP6v2HsH2n6tgUCuIKTYadDtRM2okuVcjsg_6aM2lqbFDs', 0, 0),
(55, 3, '2020-06-05', 'https://www.swiatobrazu.pl/zdjecie/artykuly/546733/16.png', 0, 0);

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
(46, 'albor@wp.pl', 'albor', '$2y$10$LOPc2iTdQp7qPzeKpTrlTuFikIMRL2RLjXnO3emaZPHilsxjiMvr.', 46),
(47, 'luber@wp.pl', 'luber', '$2y$10$gr6tdSjIfl2yQ0EIvKzA4eCQNz7Hf36N.vMjTBOmdLehQdtPNqbje', 47),
(48, 'kowalweszlo@gmail.com', 'kowal', '$2y$10$jTmTBtaN0k1B1YKxu9q.zejpseE/fl6uZiFcT3Qbieij4rPxPix72', 48),
(49, 'dudaryk123@wp.pl', 'dudarykson', '$2y$10$8Vpnot3Surz/ZP327f1Q0eRI6XC9PJDXI/phxqin3FWj/ziAzCiyO', 49),
(50, 'dudaryk@wp.pl', 'dudaryk', '82fd19a151c55f2fce5f5b7d86e58f3610010621c9e4a4aab00bfba0', 50),
(54, 'michal@wp.pl', 'michal', '296950d50c3f6e50e7294387fe600a96a6bfbc1c20f99d1cf85fcf4a', 51),
(55, 'malpa@wp.pl', 'malpa', 'ef1e1c3f77c3f91a51a2a8e45f12eb5338ddc4923960de9438706642', 55);

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
  ADD PRIMARY KEY (`id_konto`);

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
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_konto`) REFERENCES `konto` (`id_konto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
