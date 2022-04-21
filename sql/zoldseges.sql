-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 21. 12:20
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `zoldseges`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bevetelezes`
--

CREATE TABLE `bevetelezes` (
  `id` int(11) NOT NULL,
  `termek_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `ar` int(11) NOT NULL,
  `be_ki` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `bevetelezes`
--

INSERT INTO `bevetelezes` (`id`, `termek_id`, `mennyiseg`, `ar`, `be_ki`) VALUES
(1, 3, 124, 140, 1),
(2, 4, 50, 188, 1),
(3, 4, -30, 188, 0),
(4, 4, -10, 188, 0),
(12, 1, -10, 188, 1),
(13, 4, -50, 188, 1),
(14, 4, -50, 188, 0),
(15, 4, -40, 220, 0),
(16, 4, -30, 220, 0),
(17, 1, -38, 255, 1),
(18, 5, 50, 233, 1),
(19, 1, -52, 255, 0),
(20, 1, -42, 255, 0),
(21, 5, 0, 233, 1),
(22, 8, 20, 180, 1),
(23, 8, -10, 180, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `keszlet`
--

CREATE TABLE `keszlet` (
  `termek_id` int(11) NOT NULL,
  `mennyiseg` int(11) NOT NULL,
  `ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `keszlet`
--

INSERT INTO `keszlet` (`termek_id`, `mennyiseg`, `ar`) VALUES
(1, 42, 324),
(3, 191, 170),
(4, 30, 220),
(5, 100, 233),
(8, 10, 180);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek`
--

CREATE TABLE `termek` (
  `id` int(11) NOT NULL,
  `nev` text COLLATE utf8_hungarian_ci NOT NULL,
  `egyseg` text COLLATE utf8_hungarian_ci NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`id`, `nev`, `egyseg`, `valid`) VALUES
(1, 'Alma', 'kg', 1),
(2, 'Krumpli', 'kg', 0),
(3, 'Tej', 'L', 1),
(4, 'Narancs', 'kg', 0),
(5, 'Cola', 'L', 1),
(6, 'Kiwi', 'kg', 1),
(7, 'Banán', 'kg', 0),
(8, 'Fanta', 'L', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bevetelezes`
--
ALTER TABLE `bevetelezes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bevetelezes_ibfk_1` (`termek_id`);

--
-- A tábla indexei `keszlet`
--
ALTER TABLE `keszlet`
  ADD PRIMARY KEY (`termek_id`);

--
-- A tábla indexei `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bevetelezes`
--
ALTER TABLE `bevetelezes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT a táblához `termek`
--
ALTER TABLE `termek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `bevetelezes`
--
ALTER TABLE `bevetelezes`
  ADD CONSTRAINT `bevetelezes_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `keszlet`
--
ALTER TABLE `keszlet`
  ADD CONSTRAINT `keszlet_ibfk_1` FOREIGN KEY (`termek_id`) REFERENCES `termek` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
