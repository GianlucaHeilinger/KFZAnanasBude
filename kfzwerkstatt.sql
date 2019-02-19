-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 19. Feb 2019 um 10:58
-- Server-Version: 5.7.25-0ubuntu0.18.04.2
-- PHP-Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(5, 11, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(6, 11, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(7, 11, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(8, 11, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(9, 11, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(10, 11, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(11, 12, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(12, 12, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(13, 12, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(14, 12, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(15, 12, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(16, 12, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(17, 13, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(18, 13, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29'),
(19, 13, 'Audi', 'A4', 'S-1234-AB', '123', '123', '123', '123', 'schwarz', 'Benzin', 120, 1800, '2017-10-29');

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
  `newsletter` tinyint(1) DEFAULT NULL,
  `kommentar` text COLLATE utf8_german2_ci NOT NULL,
  `kundeseit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `kunde`
--

INSERT INTO `kunde` (`kundennummer`, `anrede`, `titel`, `vorname`, `nachname`, `gebdat`, `strasse`, `plz`, `ort`, `telefon`, `email`, `newsletter`, `kommentar`, `kundeseit`) VALUES
(11, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(12, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(13, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(14, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(15, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(16, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(17, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(18, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(19, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(20, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(21, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(22, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(23, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(24, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(25, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19'),
(26, 'Herr', 'Dr.', 'Max', 'Mustermann', '1977-12-16', 'Musterstrasse 5', 1234, 'Musterhausen', '067612345678', 'max@mustermann.at', 1, 'Toller Kunde!', '2018-02-19');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechnung`
--

CREATE TABLE `rechnung` (
  `rechnungid` int(11) NOT NULL,
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
  `teileid` int(11) NOT NULL,
  `anzahl` int(11) NOT NULL,
  `preis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reparatur`
--

CREATE TABLE `reparatur` (
  `repid` int(11) NOT NULL,
  `fzid` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reparaturdetails`
--

CREATE TABLE `reparaturdetails` (
  `repdetid` int(11) NOT NULL,
  `repid` int(11) NOT NULL,
  `teileid` int(11) NOT NULL,
  `anzahl` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `teile`
--

CREATE TABLE `teile` (
  `teileid` int(11) NOT NULL,
  `bezeichnung` text COLLATE utf8_german2_ci NOT NULL,
  `teileart` enum('Lohn','Teil') COLLATE utf8_german2_ci NOT NULL DEFAULT 'Lohn',
  `preis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `teile`
--

INSERT INTO `teile` (`teileid`, `bezeichnung`, `teileart`, `preis`) VALUES
(28, 'Lohn Meister', 'Lohn', 20),
(29, 'Lohn Lehrling', 'Lohn', 10),
(30, 'Schraube 3M', 'Teil', 0);

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
  ADD KEY `rechnungsnummer` (`rechnungsnummer`),
  ADD KEY `kundenid` (`kundenid`),
  ADD KEY `fahrzeugid` (`fahrzeugid`);

--
-- Indizes für die Tabelle `rechnungdetails`
--
ALTER TABLE `rechnungdetails`
  ADD PRIMARY KEY (`rechnungdetailid`),
  ADD KEY `teileid` (`teileid`),
  ADD KEY `rechnungsnummer` (`rechnungsnummer`);

--
-- Indizes für die Tabelle `reparatur`
--
ALTER TABLE `reparatur`
  ADD PRIMARY KEY (`repid`),
  ADD KEY `fzid` (`fzid`);

--
-- Indizes für die Tabelle `reparaturdetails`
--
ALTER TABLE `reparaturdetails`
  ADD PRIMARY KEY (`repdetid`),
  ADD KEY `repid` (`repid`),
  ADD KEY `teileid` (`teileid`);

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
  MODIFY `fzid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT für Tabelle `kunde`
--
ALTER TABLE `kunde`
  MODIFY `kundennummer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT für Tabelle `rechnungdetails`
--
ALTER TABLE `rechnungdetails`
  MODIFY `rechnungdetailid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `reparatur`
--
ALTER TABLE `reparatur`
  MODIFY `repid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `reparaturdetails`
--
ALTER TABLE `reparaturdetails`
  MODIFY `repdetid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `teile`
--
ALTER TABLE `teile`
  MODIFY `teileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
  ADD CONSTRAINT `rechnung_ibfk_2` FOREIGN KEY (`fahrzeugid`) REFERENCES `fahrzeug` (`fzid`);

--
-- Constraints der Tabelle `rechnungdetails`
--
ALTER TABLE `rechnungdetails`
  ADD CONSTRAINT `rechnungdetails_ibfk_1` FOREIGN KEY (`rechnungsnummer`) REFERENCES `rechnung` (`rechnungsnummer`),
  ADD CONSTRAINT `rechnungdetails_ibfk_2` FOREIGN KEY (`teileid`) REFERENCES `teile` (`teileid`);

--
-- Constraints der Tabelle `reparatur`
--
ALTER TABLE `reparatur`
  ADD CONSTRAINT `reparatur_ibfk_1` FOREIGN KEY (`fzid`) REFERENCES `fahrzeug` (`fzid`);

--
-- Constraints der Tabelle `reparaturdetails`
--
ALTER TABLE `reparaturdetails`
  ADD CONSTRAINT `reparaturdetails_ibfk_1` FOREIGN KEY (`repid`) REFERENCES `reparatur` (`repid`),
  ADD CONSTRAINT `reparaturdetails_ibfk_2` FOREIGN KEY (`teileid`) REFERENCES `teile` (`teileid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
