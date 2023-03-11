-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Lut 2023, 22:33
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ankiety`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankiety`
--

CREATE TABLE `ankiety` (
  `id` int(11) NOT NULL,
  `id_tworcy` int(11) NOT NULL,
  `ilosc_pytan` int(11) NOT NULL,
  `nazwa` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ankiety`
--

INSERT INTO `ankiety` (`id`, `id_tworcy`, `ilosc_pytan`, `nazwa`) VALUES
(1, 1, 23, 'tak'),
(2, 1, 332, 'nie'),
(3, 2, 21, 'dziala'),
(21, 1, 2, 'awdwadad'),
(50, 1, 1, ''),
(51, 1, 1, ''),
(55, 1, 1, ''),
(64, 1, 1, ''),
(65, 1, 1, ''),
(102, 1, 2, 'awdd'),
(103, 1, 2, 'Test'),
(104, 1, 5, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `linki`
--

CREATE TABLE `linki` (
  `id` int(11) NOT NULL,
  `id_ankiety` int(11) NOT NULL,
  `data_stworzenia` date NOT NULL,
  `data_wygaszenia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `id` int(11) NOT NULL,
  `id_pytania` int(11) NOT NULL,
  `odpowiedz` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_odpowiedzi` int(11) DEFAULT NULL,
  `id_ankiety` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`id`, `id_pytania`, `odpowiedz`, `id_odpowiedzi`, `id_ankiety`) VALUES
(115, 129, 'Tam', 1, 102),
(116, 129, 'Gdze', 2, 102),
(117, 130, 'tak', 1, 102),
(118, 130, 'nie', 2, 102),
(119, 131, 'nie', 1, 103),
(120, 131, 'tak', 2, 103),
(121, 132, 'awd', 1, 103),
(122, 132, 'sad', 2, 103);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odp_uz`
--

CREATE TABLE `odp_uz` (
  `id` int(11) NOT NULL,
  `id_arkusza` int(11) DEFAULT NULL,
  `id_pytania` int(11) DEFAULT NULL,
  `id_odpowiedzi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `odp_uz`
--

INSERT INTO `odp_uz` (`id`, `id_arkusza`, `id_pytania`, `id_odpowiedzi`) VALUES
(1, 3, 2, 2),
(2, 102, 129, 2),
(3, 102, 129, 2),
(4, 102, 129, 2),
(5, 102, 129, 2),
(6, 102, 129, 2),
(7, 102, 129, 2),
(8, 102, 129, 2),
(9, 102, 129, 2),
(10, 102, 129, 2),
(11, 102, 129, 2),
(12, 102, 129, 2),
(13, 102, 130, 2),
(14, 102, 130, 0),
(15, 102, 130, 0),
(16, 102, 129, 2),
(17, 102, 130, 2),
(18, 102, 130, 0),
(19, 102, 130, 0),
(20, 102, 129, 2),
(21, 102, 130, 1),
(22, 102, 130, 2),
(23, 102, 130, 2),
(24, 102, 129, 2),
(25, 102, 130, 1),
(26, 102, 130, 2),
(27, 102, 130, 2),
(28, 102, 129, 2),
(29, 102, 130, 1),
(30, 102, 130, 2),
(31, 102, 130, 2),
(32, 102, 129, 2),
(33, 102, 130, 1),
(34, 102, 130, 2),
(35, 102, 129, 2),
(36, 102, 130, 2),
(37, 102, 129, 0),
(38, 102, 129, 2),
(39, 102, 130, 2),
(40, 102, 129, 2),
(41, 102, 130, 1),
(42, 102, 129, 2),
(43, 102, 130, 1),
(44, 102, 130, 2),
(45, 103, 131, 2),
(46, 103, 132, 2),
(47, 103, 131, 2),
(48, 103, 132, 1),
(49, 103, 131, 2),
(50, 103, 132, 2),
(51, 103, 131, 1),
(52, 103, 132, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `id` int(11) NOT NULL,
  `id_ankiety` int(11) NOT NULL,
  `rodzaj_pytania` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `tresc_pytania` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`id`, `id_ankiety`, `rodzaj_pytania`, `tresc_pytania`) VALUES
(129, 102, 'radio', 'napewno'),
(130, 102, 'checkbox', 'czy'),
(131, 103, 'radio', 'Czy'),
(132, 103, 'checkbox', 'Man'),
(133, 104, '', ''),
(134, 104, '', ''),
(135, 104, '', ''),
(136, 104, '', ''),
(137, 104, '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `pass`) VALUES
(1, 'Mikolaj', '1234'),
(2, 'Jakub', '1127');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tworcy` (`id_tworcy`);

--
-- Indeksy dla tabeli `linki`
--
ALTER TABLE `linki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ankiety` (`id_ankiety`);

--
-- Indeksy dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pytania` (`id_pytania`);

--
-- Indeksy dla tabeli `odp_uz`
--
ALTER TABLE `odp_uz`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ankiety` (`id_ankiety`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT dla tabeli `linki`
--
ALTER TABLE `linki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT dla tabeli `odp_uz`
--
ALTER TABLE `odp_uz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ankiety`
--
ALTER TABLE `ankiety`
  ADD CONSTRAINT `ankiety_ibfk_1` FOREIGN KEY (`id_tworcy`) REFERENCES `uzytkownicy` (`id`);

--
-- Ograniczenia dla tabeli `linki`
--
ALTER TABLE `linki`
  ADD CONSTRAINT `linki_ibfk_1` FOREIGN KEY (`id_ankiety`) REFERENCES `ankiety` (`id`);

--
-- Ograniczenia dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD CONSTRAINT `odpowiedzi_ibfk_1` FOREIGN KEY (`id_pytania`) REFERENCES `pytania` (`id`);

--
-- Ograniczenia dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD CONSTRAINT `pytania_ibfk_1` FOREIGN KEY (`id_ankiety`) REFERENCES `ankiety` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
