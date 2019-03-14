-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Mrz 2019 um 17:27
-- Server-Version: 10.1.34-MariaDB
-- PHP-Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kfzwerkstatt`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrzeug`
--

CREATE TABLE `fahrzeug` (
  `fzid` int(11) NOT NULL,
  `kundeid` int(11) NOT NULL,
  `marke` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `kennzeichen` varchar(10) COLLATE utf8_german2_ci NOT NULL,
  `fahrgestellnummer` varchar(30) COLLATE utf8_german2_ci NOT NULL,
  `nationalcode` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `motorkennzeichen` varchar(4) COLLATE utf8_german2_ci NOT NULL,
  `getriebekennzeichen` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `farbe` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `treibstoff` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `leistung` int(3) NOT NULL,
  `hubraum` int(5) NOT NULL,
  `erstzulassung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `fahrzeug`
--

INSERT INTO `fahrzeug` (`fzid`, `kundeid`, `marke`, `type`, `kennzeichen`, `fahrgestellnummer`, `nationalcode`, `motorkennzeichen`, `getriebekennzeichen`, `farbe`, `treibstoff`, `leistung`, `hubraum`, `erstzulassung`) VALUES
(1, 6, 'Audi', 'A8', 'S-1337-DD', '12345', '12345', '1234', '12345', 'pink', 'benzin', 60, 1400, '2019-02-11'),
(2, 7, 'Seat', 'Ibiza', 'VB-123-A', '123', '213', '987', '987', 'weiss', 'Benzin', 60, 1400, '2008-02-29'),
(3, 6, 'BMW', 'X5', 'VB-RBS-1', '12345', '12345', '1234', '12345', 'rot', 'benzin', 60, 1400, '2019-02-11'),
(4, 6, 'Toyota', 'Yaris', 'VB-FCS-1', '12345', '12345', '1234', '12345', 'rot', 'benzin', 60, 1400, '2019-02-11'),
(6, 6, 'Dacia', 'Sandero', 'S-LOLSCR-0', '12345', '12345', '1234', '12345', 'rot', 'benzin', 60, 1400, '2019-02-11'),
(7, 6, 'VW', 'Golf V', 'R-BFI-69', '12345', '12345', '1234', '12345', 'rot', 'benzin', 60, 1400, '2019-02-11'),
(9, 6, 'Nissan', 'Micra', 'W-STINKT-1', '123', '123', '123', '123', 'schwarz', 'Benzin', 50, 1000, '2016-03-03'),
(11, 22, 'Porsche', '911', 'S-FTW-11', '876', '86', '867', '876', 'schwarz', 'Benzin', 100, 1000, '2018-11-30'),
(12, 23, 'Skoda', 'Octavia', 'VB-1337-DD', '123', '213', '987', '987', 'schwarz', 'Benzin', 29, 21, '2017-11-30');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kunde`
--

CREATE TABLE `kunde` (
  `kundennummer` int(10) NOT NULL,
  `anrede` varchar(15) COLLATE utf8_german2_ci NOT NULL,
  `titel` varchar(10) COLLATE utf8_german2_ci NOT NULL,
  `vorname` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `nachname` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `gebdat` date NOT NULL,
  `strasse` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `plz` int(10) NOT NULL,
  `ort` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_german2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_german2_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `kommentar` text COLLATE utf8_german2_ci NOT NULL,
  `kundeseit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kundennummer`, `anrede`, `titel`, `vorname`, `nachname`, `gebdat`, `strasse`, `plz`, `ort`, `telefon`, `email`, `newsletter`, `kommentar`, `kundeseit`) VALUES
(6, 'Fr.', 'Dr.', 'Susi', 'Musterfrau', '2019-02-04', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'susi@mustermann.com', 0, 'servus susi', '2019-02-14'),
(7, 'Frau', 'Dipl. Ing.', 'Mariabc', 'Schreiber', '1991-02-16', 'Schreiberstrasse 5', 1337, 'Schreiberort', '33388833', 'schreiber@schreiber.com', 0, 'schreiberkommentar', '2019-02-16'),
(9, 'Herr', 'Dr.', 'Maxxxxx', 'Musti', '2015-02-16', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 1, 'on', '2019-02-16'),
(10, 'Herr', 'Dr.', 'Maxllll', 'Musti', '2014-02-16', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 1, 'ON', '2019-02-16'),
(11, 'Herr', 'Dr.', 'Maxll', 'Musti', '2011-02-16', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 0, 'OFF', '2019-02-16'),
(12, 'Herr', 'Dr.', 'Maxl', 'Musti', '2014-02-16', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 0, 'off again', '2019-02-16'),
(13, 'Herr', 'Dr.', 'Maxl', 'Musti', '2016-02-16', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 0, 'off', '2019-02-16'),
(14, 'Fr.', 'Dr.', 'Susi', 'Musterfrau', '2009-02-16', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'susi@mustermann.com', 0, 'susi off', '2019-02-16'),
(15, 'Frau', 'Dr.', 'Maria', 'Schreiber', '2008-02-16', 'Schreiberstrasse 5', 1337, 'Schreiberort', '033388833', 'schreiber@schreiber.com', 0, 'off', '2019-02-16'),
(16, 'Herr', '', 'Maxl', 'Musti', '2016-02-16', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 1, 'ooonnn', '2019-02-16'),
(17, 'Herr', 'Dr.', 'Manfred', 'Baumann', '2005-02-18', 'Baumannweg 3', 3239, 'Bauhausen', '304932840932', 'bau@mann.com', 1, 'baumann', '2019-02-18'),
(18, 'Herr', 'Dr.', 'Manfred', 'Baumann', '2005-02-18', 'Baumannweg 3', 3239, 'Bauhausen', '304932840932', 'bau@mann.com', 1, 'baumann', '2019-02-18'),
(19, 'Herr', 'asdf', 'Maxlsdf', 'Musti', '2013-02-18', 'Musterstrasse 5', 1234, 'Musterortasdf', '+491234567890', 'max@mustermann.com', 1, 'asdfdsafds', '2019-02-18'),
(20, 'Herr', 'asdf', 'Maxlsdf', 'Musti', '2013-02-18', 'Musterstrasse 5', 1234, 'Musterortasdf', '+491234567890', 'max@mustermann.com', 1, 'asdfdsafds', '2019-02-18'),
(21, 'Herr', 'dsfgs', 'Maxl', 'Musti', '2019-02-18', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 1, 'sdfg', '2019-02-18'),
(22, 'Herr', 'asdf', 'Maxl', 'Musti', '2019-02-18', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 1, '', '2019-02-18'),
(23, 'Herr', '', 'Maxl', 'Musti', '2019-02-18', 'Musterstrasse 5', 1234, 'Musterort', '+491234567890', 'max@mustermann.com', 0, '', '2019-02-18');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnung`
--

CREATE TABLE `rechnung` (
  `rechnungid` int(11) NOT NULL,
  `repid` int(11) DEFAULT NULL,
  `rechnungsnummer` int(11) NOT NULL,
  `rechnungsdatum` date NOT NULL,
  `kundenid` int(11) NOT NULL,
  `fahrzeugid` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnungdetails`
--

CREATE TABLE `rechnungdetails` (
  `rechnungdetailid` int(11) NOT NULL,
  `rechnungsnummer` int(11) NOT NULL,
  `gesamtpreis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reparatur`
--

CREATE TABLE `reparatur` (
  `repid` int(11) NOT NULL,
  `fzid` int(11) NOT NULL,
  `datum` date NOT NULL,
  `rechnungerstellt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `reparatur`
--

INSERT INTO `reparatur` (`repid`, `fzid`, `datum`, `rechnungerstellt`) VALUES
(7, 1, '2019-03-12', 0),
(10, 7, '2019-03-12', 0),
(11, 1, '2019-03-12', 0),
(12, 6, '2019-03-14', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reparaturteile`
--

CREATE TABLE `reparaturteile` (
  `reparaturteileid` int(11) NOT NULL,
  `repid` int(11) NOT NULL,
  `teileid` int(11) NOT NULL,
  `anzahl` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `reparaturteile`
--

INSERT INTO `reparaturteile` (`reparaturteileid`, `repid`, `teileid`, `anzahl`) VALUES
(22, 7, 28, 234),
(24, 12, 28, 10),
(25, 12, 29, 3),
(27, 10, 29, 2),
(28, 10, 35, 12),
(29, 10, 43, 12),
(30, 12, 34, 10),
(31, 7, 28, 3),
(32, 7, 40, 12),
(33, 7, 40, 12);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teile`
--

CREATE TABLE `teile` (
  `teileid` int(11) NOT NULL,
  `bezeichnung` text COLLATE utf8_german2_ci NOT NULL,
  `teileart` enum('Lohn','Teil') COLLATE utf8_german2_ci NOT NULL DEFAULT 'Lohn',
  `preis` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `teile`
--

INSERT INTO `teile` (`teileid`, `bezeichnung`, `teileart`, `preis`) VALUES
(28, 'Lohn Meister', 'Lohn', 120),
(29, 'Lohn Lehrling', 'Lohn', 40),
(31, 'Mutter M6', 'Teil', 0.1),
(33, 'Mutter M8', 'Teil', 0.12),
(34, 'Mutter M10', 'Teil', 0.15),
(35, 'Mutter M12', 'Teil', 0.18),
(36, 'Mutter M14', 'Teil', 0.22),
(37, 'Mutter M16', 'Teil', 0.28),
(38, 'Mutter M18', 'Teil', 0.35),
(39, 'Mutter M20', 'Teil', 0.47),
(40, 'Schraube M6', 'Teil', 0.1),
(41, 'Schraube M8', 'Teil', 0.12),
(42, 'Schraube M10', 'Teil', 0.15),
(43, 'Schraube M12', 'Teil', 0.18),
(44, 'Schraube M14', 'Teil', 0.22),
(45, 'Schraube M16', 'Teil', 0.28),
(46, 'Schraube M18', 'Teil', 0.35),
(47, 'Schraube M20', 'Teil', 0.47);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fahrzeug`
--
ALTER TABLE `fahrzeug`
  ADD PRIMARY KEY (`fzid`),
  ADD KEY `kundeid` (`kundeid`);

--
-- Indizes für die Tabelle `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`kundennummer`);

--
-- Indizes für die Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  ADD PRIMARY KEY (`rechnungid`),
  ADD UNIQUE KEY `rechnungsnummer_2` (`rechnungsnummer`),
  ADD KEY `rechnungsnummer` (`rechnungsnummer`),
  ADD KEY `kundenid` (`kundenid`),
  ADD KEY `fahrzeugid` (`fahrzeugid`),
  ADD KEY `repid` (`repid`);

--
-- Indizes für die Tabelle `rechnungdetails`
--
ALTER TABLE `rechnungdetails`
  ADD PRIMARY KEY (`rechnungdetailid`),
  ADD KEY `rechnungsnummer` (`rechnungsnummer`);

--
-- Indizes für die Tabelle `reparatur`
--
ALTER TABLE `reparatur`
  ADD PRIMARY KEY (`repid`),
  ADD KEY `fzid` (`fzid`);

--
-- Indizes für die Tabelle `reparaturteile`
--
ALTER TABLE `reparaturteile`
  ADD PRIMARY KEY (`reparaturteileid`),
  ADD KEY `teileid` (`teileid`),
  ADD KEY `reparaturdetails` (`repid`);

--
-- Indizes für die Tabelle `teile`
--
ALTER TABLE `teile`
  ADD PRIMARY KEY (`teileid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fahrzeug`
--
ALTER TABLE `fahrzeug`
  MODIFY `fzid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `kundennummer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT für Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  MODIFY `rechnungid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `rechnungdetails`
--
ALTER TABLE `rechnungdetails`
  MODIFY `rechnungdetailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `reparatur`
--
ALTER TABLE `reparatur`
  MODIFY `repid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `reparaturteile`
--
ALTER TABLE `reparaturteile`
  MODIFY `reparaturteileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT für Tabelle `teile`
--
ALTER TABLE `teile`
  MODIFY `teileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `fahrzeug`
--
ALTER TABLE `fahrzeug`
  ADD CONSTRAINT `fahrzeug_ibfk_1` FOREIGN KEY (`kundeid`) REFERENCES `kunde` (`kundennummer`);

--
-- Constraints der Tabelle `rechnung`
--
ALTER TABLE `rechnung`
  ADD CONSTRAINT `rechnung_ibfk_1` FOREIGN KEY (`kundenid`) REFERENCES `kunde` (`kundennummer`),
  ADD CONSTRAINT `rechnung_ibfk_2` FOREIGN KEY (`repid`) REFERENCES `reparatur` (`repid`);

--
-- Constraints der Tabelle `reparatur`
--
ALTER TABLE `reparatur`
  ADD CONSTRAINT `reparatur_ibfk_1` FOREIGN KEY (`fzid`) REFERENCES `fahrzeug` (`fzid`);

--
-- Constraints der Tabelle `reparaturteile`
--
ALTER TABLE `reparaturteile`
  ADD CONSTRAINT `reparaturteile_ibfk_1` FOREIGN KEY (`repid`) REFERENCES `reparatur` (`repid`),
  ADD CONSTRAINT `reparaturteile_ibfk_2` FOREIGN KEY (`teileid`) REFERENCES `teile` (`teileid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
