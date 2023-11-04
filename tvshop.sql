-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Nov 04. 13:59
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `tvshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megvasarlas`
--

CREATE TABLE `megvasarlas` (
  `termekid` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `megvasarlas_datuma` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek`
--

CREATE TABLE `termek` (
  `termekid` int(10) UNSIGNED NOT NULL,
  `termek_neve` varchar(70) NOT NULL,
  `marka` varchar(60) NOT NULL,
  `kepernyomeret` varchar(30) NOT NULL,
  `felbontas` varchar(7) DEFAULT NULL,
  `kijelzo_felbontas` varchar(30) NOT NULL,
  `Smart` varchar(50) DEFAULT NULL,
  `Hangteljesitmeny` varchar(30) DEFAULT NULL,
  `WIFI` varchar(50) DEFAULT NULL,
  `Bluetooth` varchar(50) DEFAULT NULL,
  `AR` varchar(50) DEFAULT NULL,
  `Garancia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`termekid`, `termek_neve`, `marka`, `kepernyomeret`, `felbontas`, `kijelzo_felbontas`, `Smart`, `Hangteljesitmeny`, `WIFI`, `Bluetooth`, `AR`, `Garancia`) VALUES
(1, 'Crystal UHD 4K Smart TV', 'SAMSUNG', '55\"', 'UHD 4K', '3840x2160', 'igen', '20 Watt', 'igen', 'igen', '151.990Ft', '2 ev'),
(2, 'FULL HD SMART LED TV', 'SAMSUNG', '32\"', 'FULL HD', '1920x1080', 'igen', '10 Watt', 'igen', 'nem', '96.450Ft', '1 ev'),
(3, 'HD READY LED TV', 'ORION', '32\"', 'HD', '1366x768', 'nem', '10 Watt', 'nem', 'nem', '50.999Ft', '1 ev'),
(4, 'READY LED TV', 'SAMSUNG', '32\"', 'HD', '1366x768', 'nem', '10 Watt', 'nem', 'nem', '78.999Ft', '1 ev'),
(5, 'HD SMART LED TV', 'KIVI', '32\"', 'FULL HD', '1920x1080', 'igen', '16 Watt', 'igen', 'igen', '77.590Ft', '2 ev'),
(6, 'SMART LED TV', 'LG', '32\"', 'FULL HD', '1920x1080', 'igen', '10 Watt', 'igen', 'igen', '79.999Ft', '1 ev');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `userid` int(10) UNSIGNED NOT NULL,
  `emailcim` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`userid`, `emailcim`, `username`, `password`) VALUES
(6, 'asd132@gmail.com', 'asd', 'asd'),
(7, 'asd@gmail.com', 'YEEEEEEEEE', 'asd');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `megvasarlas`
--
ALTER TABLE `megvasarlas`
  ADD UNIQUE KEY `userid` (`userid`),
  ADD KEY `termekid` (`termekid`);

--
-- A tábla indexei `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`termekid`),
  ADD UNIQUE KEY `termek_neve` (`termek_neve`,`marka`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `emailcim` (`emailcim`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `termek`
--
ALTER TABLE `termek`
  MODIFY `termekid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
