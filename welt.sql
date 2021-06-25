-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 13, 2021 at 11:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `welt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `username` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `username`, `password`, `razina`) VALUES
(2, 'Filip', 'Raić', 'Admin', '$2y$10$uC5QOfKbA9Mk23C4GnfNCOhXKDM6XAu/1LcqNyKP.Hcczte9teR0i', 1),
(3, 'Ivan', 'Ivić', 'Ivan', '$2y$10$01VXcDfWO5szcn9R.JhdMOYo7xcFgdDqQblStOewdpeXM9fnChyXe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(5, '13.06.2021.', 'Ein baskischer Käsekuchen mit einer dunklen', 'Ein baskischer Käsekuchen mit einer dunklen Kruste und einem cremigen, fast puddingartigen Kern - sagenhaft unkompliziert in der Zubereitung. Wir haben das Rezept leicht abgespeckt und um eine zitronige Zuckerschicht ergänzt. Ein Kuchen, der Ihnen wenig abverlangt und viel Freude schenkt.', 'Ein baskischer Käsekuchen mit einer dunklen Kruste und einem cremigen, fast puddingartigen Kern - sagenhaft unkompliziert in der Zubereitung. Wir haben das Rezept leicht abgespeckt und um eine zitronige Zuckerschicht ergänzt. Ein Kuchen, der Ihnen wenig abverlangt und viel Freude schenkt.\r\n0\r\n\r\nEin baskischer Käsekuchen schert sich nicht um Äußerlichkeiten. Was bleibt, ist das reine Glück aus gestocktem Quark, Eiern und Zucker, und das in einem Bruchteil der aktiven Zeit, die für einen traditionellen Käsekuchen anfällt. Der über die Oberfläche gestreute Zitronenzucker dagegen zerschmilzt im Ofen zu einem Karamell nicht unähnlich der Zuckerschicht bei einer Cr?me br?lée, das beim Essen des fertigen Kuchens auf eine angenehme Weise zwischen den Zähnen knirscht.\r\n\r\n', 'food1.jpg', 'food', 0),
(8, '25.5.2021.', 'Saftiges Fleisch, rundum knusprige Haut ? so gelingt das perfekt', 'Das Grillhähnchen vom Drehspieß, einst ein Festessen, ist zur Massenware verkommen, die zu Kampfpreisen unters Volk gebracht wird. Dabei ist der knusprige Vogel eine Delikatesse ? wenn man ihn richtig zubereitet.', 'Das Grillhähnchen vom Drehspieß, einst ein Festessen, ist zur Massenware verkommen, die zu Kampfpreisen unters Volk gebracht wird. Dabei ist der knusprige Vogel eine Delikatesse ? wenn man ihn richtig zubereitet.\r\n\r\nVom einst hochgeschätzten Sonntagsbraten bis zum halben Grillhähnchen vom Schnellimbiss in der Warmhaltetüte zum Kampfpreis von 3,99 Euro inklusive Erfrischungstuch: Der Niedergang des Grillhähnchens in der deutschen Esskultur ist ein Trauerspiel. Preisdruck und Massentierhaltung haben es in Verruf gebracht, die Qualität nahm dabei konstant ab. Was geschmacklich dann von dem Tier zu diesem lächerlichen Preis noch beim Kunden ankommt, ist hauptsächlich die Paprikagewürzmischung auf der Haut ? und sehr viel Salz. Das hat es zur idealen Durst-fördernden Essensbegleitung beim Münchner Oktoberfest gemacht. Dabei ist ein gutes, artgerecht aufgezogenes Grillhähnchen eigentlich eine Delikatesse. Wer so ein Huhn einmal zu Hause im Garten auf einem Drehspieß zubereitet hat, wird nie wieder einen der in den Geflügel-Knästen turbogemästeten morschen Flattermänner vom Grillwagen essen. Es gilt nur, ein paar einfache Tipps zu befolgen.\r\n\r\n', 'food2.jpg', 'Food', 0),
(9, '21.4.2021.', 'Ich muss manchem jungen Koch erst mal wieder zeigen, wie man ein', 'In der Spitzengastronomie sorgt der Neustart für Aufatmen, aber auch für neue Herausforderungen. Ein großes Problem ist der Mangel an qualifizierten Mitarbeitern, denn viele Fachkräfte haben sich während der Krise aus der Branche verabschiedet.', 'In der Spitzengastronomie sorgt der Neustart für Aufatmen, aber auch für neue Herausforderungen. Ein großes Problem ist der Mangel an qualifizierten Mitarbeitern, denn viele Fachkräfte haben sich während der Krise aus der Branche verabschiedet.\r\n\r\nAb dem zweiten Juniwochenende wird es auch für uns im Restaurant wieder mit einem regulären Betrieb losgehen, vorausgesetzt natürlich, die Inzidenzen bleiben so, wie es sich im Augenblick abzeichnet. Das bedeutet großes Aufatmen ? und neue Herausforderungen.\r\n\r\nUnsere Mitarbeiter haben sieben Monate nicht mehr in ihrem gewohnten Beruf gearbeitet. Die Routine, die man in der Küche und im Service für reibungslose Abläufe auf diesem Qualitätslevel braucht, muss neu erarbeitet werden. Die meisten Restaurants waren in den vergangenen 14 Monaten neun Monate geschlossen. Und selbst wenn man einen Teil der Mitarbeiter aus der Kurzarbeit herausholen konnte und so wie wir auf Menüboxen umgestiegen ist, sind die Bewegungsabläufe doch ganz andere gewesen.\r\n\r\nNach sieben Monaten auf dem Sofa müssen die Körperspannung und das Anspruchsdenken an die Qualität wieder gelernt werden. Wie ein Hochleistungsathlet, der sieben Monate nicht trainiert hat. Ich habe in der Küche bemerkt, dass ich manchem noch jungen Koch erst mal wieder zeigen musste, wie man ein Messer hält.', 'food3.jpg', 'Food', 0),
(12, '15.3.2020.', 'Warum hat die Schweiz es ganz anders gemacht als Deutschland?', 'Viele Deutsche blicken neidisch in die Schweiz. Eine Ausgangssperre gab es dort nie, Schulen und Skipisten blieben nach der ersten Welle geöffnet. Trotzdem steht die Alpenrepublik heute nicht schlechter da. Der zuständige Minister gibt im WELT-Interview Antworten.', 'Viele Deutsche blicken neidisch in die Schweiz. Eine Ausgangssperre gab es dort nie, Schulen und Skipisten blieben nach der ersten Welle geöffnet. Trotzdem steht die Alpenrepublik heute nicht schlechter da. Der zuständige Minister gibt im WELT-Interview Antworten.\r\n0\r\n\r\nWELT: Herr Berset, Ihre Maßnahmen in der Pandemie gehörten zu den lockersten Europas, trotzdem stehen Sie heute gut da und verfolgen eine weitreichende Öffnungsstrategie. Sind Sie besser gegen die Pandemie vorgegangen als Deutschland?\r\n\r\nAlain Berset: Wir sind da sehr bescheiden, weil wir bis heute nicht im Detail wissen, was gut funktioniert hat und was nicht. Man kann die Länder auch nicht einfach miteinander vergleichen. Denn in einer Pandemie ist die Geografie sehr wichtig oder es spielt auch die wirtschaftliche Situation eine große Rolle. Uns hat geholfen, dass der Dienstleistungssektor, den man einfacher ins Homeoffice verlegen kann, bei uns ausgeprägt ist. Länder mit einer starken Industrie wie Deutschland haben eine andere Ausgangslage. Und die Entwicklung der Infektionskurve war in Deutschland besser als in der Schweiz.', 'news2.jpg', 'Politics', 0),
(13, '20.5.2021.', 'Hacker legen Internetseite von Ken Jebsen lahm und erbeuten wohl', 'Mit allerlei kruden Thesen wurde Ken Jebsen zu einem Star der ?alternativen Medienszene?. Jetzt haben Hacker der Gruppe Anonymous den Blog des Ex-Journalisten lahmgelegt und offenbar brisante Daten an sich gerissen.', 'Mit allerlei kruden Thesen wurde Ken Jebsen zu einem Star der ?alternativen Medienszene?. Jetzt haben Hacker der Gruppe Anonymous den Blog des Ex-Journalisten lahmgelegt und offenbar brisante Daten an sich gerissen.\r\n150\r\n\r\nDas Hackerkollektiv Anonymous hat offenbar die Seite des Verschwörungstheoretikers Ken Jebsen gehackt. Die Hacker gaben an, unter anderem 39.000 persönliche Daten von Abonnenten und Spenderdaten erbeutet zu haben. Auf der Seite ?Ken FM? war am Samstagnachmittag eine Nachricht der Hacker zu lesen: Demnach habe Anonymous die Kontrolle über die Internetseite übernommen? Ken FM? gilt als einflussreiches ?Alternativmedium?. Gründer Jebsen, der bürgerlich Kayvan Soufi-Siavash heißt, war laut einem Medienbericht zuletzt ins Visier des Berliner Verfassungsschutzes geraten. Jebsen verbreite laut Einschätzung der Behörden Desinformation und Verschwörungsmythen.Anonymous schrieb in einem Blogartikel über Jebsen: ?Er hat mit Antisemitismus, Verschwörungsmythen und Umsturzphantasien viel Geld verdient. Journalist und damit der Wahrheit verpflichtet ist er seit langem nicht mehr. Er verarscht die Menschen einfach ganz offen.Ken Jebsen finanzierte sein Internetportal laut eigenen Angaben über Spenden. Anonymous verlautete, Jebsen habe bislang 38.000 Euro von Spendern und weitere 200.000 Euro in Krypwotährungen erhalten. Bislang äußerte sich Jebsen nicht zu dem Vorfall.\r\n\r\nIm Jahr 2011 war der Ex-Moderator vom RBB entlassen worden, da ?zahlreiche seiner Beiträge nicht den journalistischen Standards des RBB entsprachen?, wie der Sender mitteilte. Zuvor war unter anderem eine E-Mail veröffentlicht worden, in der Jebsen schrieb, er wisse, wer den ?Holocaust als PR erfunden hat?. Jebsen entschuldigte sich und wies Antisemitismusvorwürfe von sich.', 'news3.jpg', 'Politics', 0),
(14, '13.2.2021.', 'Die Extremen dominieren die AfD auch ohne Flügel', 'Eine Neugründung des AfD-Flügels ist gar nicht im Interesse der früheren Mitglieder, denn die völkische Organisation wird nicht mehr gebraucht. So ganz ohne Label lassen sich die tatsächlich gefährlichen Tendenzen viel effektiver verbreiten.', 'Eine Neugründung des AfD-Flügels ist gar nicht im Interesse der früheren Mitglieder, denn die völkische Organisation wird nicht mehr gebraucht. So ganz ohne Label lassen sich die tatsächlich gefährlichen Tendenzen viel effektiver verbreiten.\r\n122\r\n\r\nDie völkische Organisation innerhalb der AfD, der Flügel, steht vor einem Comeback, zumindest in Niedersachsen? Man lasse sich nicht täuschen: Nur weil einige besonders desolate Rechtsaußen dort ihre verzweifelten Bemühungen um sichere Listenplätze für die Bundestagswahl so gedeutet wissen wollen, heißt das noch nicht, dass der 2020 aufgelöste Flügel tatsächlich wiedererrichtet würde.\r\n\r\nDies wäre zum einen schädlich für die vielen Rechtsextremen in der Partei. Denn mit dem Flügel, mit Orden, Kyffhäusertreffen und Beauftragten sind sie viel leichter zu erkennen und anzugreifen als ohne. Zum anderen wird der Flügel nicht mehr gebraucht, seit den Rechtsextremen in der AfD nicht mehr ein ähnlich großes Lager von Liberalkonservativen gegenübersteht, sondern eine zerstreute Schar von Stilberatern, die den harten Ideologen bloß Aufrufe zu vorsichtigerem Gebaren entgegensetzen.\r\n\r\nLängst haben die Flügel-Anhänger, die ihre informellen Netzwerke aufrechterhalten, die Dominanz erlangt. Die ostdeutschen Landesverbände stehen fast ganz unter ihrer Kontrolle. Dort halten sie auch mit solchen Kontakt, die wegen Rechtsextremismus aus der Partei ausgeschlossen wurden. Und in großen West-Verbänden wurden Bündnisse mit jenen geschlossen, die zwar symbolisch auf Distanz zu Björn Höcke gehen, aber mit Radikalisierungen wie etwa auf dem letzten Bundesparteitag wenig Probleme haben.\r\n\r\nWarum sollten diese Bündnisse zwischen den Extremen und den Radikalen durch die Renaissance der polarisierenden Flügel-Marke gefährdet werden? Wenn immerzu auf sie wie auf einen Fetisch gestarrt wird, gerät aus dem Blick, dass sich die tatsächlich bedrohlichen Tendenzen der AfD ohne Label mittlerweile viel effektiver verbreiten lassen.', 'news1.jpg', 'Politics', 0),
(15, '20.5.2021.', 'Hacker legen Internetseite von Ken Jebsen lahm und erbeuten wohl', 'Mit allerlei kruden Thesen wurde Ken Jebsen zu einem Star der ?alternativen Medienszene?. Jetzt haben Hacker der Gruppe Anonymous den Blog des Ex-Journalisten lahmgelegt und offenbar brisante Daten an sich gerissen.', 'Mit allerlei kruden Thesen wurde Ken Jebsen zu einem Star der ?alternativen Medienszene?. Jetzt haben Hacker der Gruppe Anonymous den Blog des Ex-Journalisten lahmgelegt und offenbar brisante Daten an sich gerissen.\r\n150\r\n\r\nDas Hackerkollektiv Anonymous hat offenbar die Seite des Verschwörungstheoretikers Ken Jebsen gehackt. Die Hacker gaben an, unter anderem 39.000 persönliche Daten von Abonnenten und Spenderdaten erbeutet zu haben. Auf der Seite ?Ken FM? war am Samstagnachmittag eine Nachricht der Hacker zu lesen: Demnach habe Anonymous die Kontrolle über die Internetseite übernommen? Ken FM? gilt als einflussreiches ?Alternativmedium?. Gründer Jebsen, der bürgerlich Kayvan Soufi-Siavash heißt, war laut einem Medienbericht zuletzt ins Visier des Berliner Verfassungsschutzes geraten. Jebsen verbreite laut Einschätzung der Behörden Desinformation und Verschwörungsmythen.Anonymous schrieb in einem Blogartikel über Jebsen: ?Er hat mit Antisemitismus, Verschwörungsmythen und Umsturzphantasien viel Geld verdient. Journalist und damit der Wahrheit verpflichtet ist er seit langem nicht mehr. Er verarscht die Menschen einfach ganz offen.Ken Jebsen finanzierte sein Internetportal laut eigenen Angaben über Spenden. Anonymous verlautete, Jebsen habe bislang 38.000 Euro von Spendern und weitere 200.000 Euro in Krypwotährungen erhalten. Bislang äußerte sich Jebsen nicht zu dem Vorfall.\r\n\r\nIm Jahr 2011 war der Ex-Moderator vom RBB entlassen worden, da ?zahlreiche seiner Beiträge nicht den journalistischen Standards des RBB entsprachen?, wie der Sender mitteilte. Zuvor war unter anderem eine E-Mail veröffentlicht worden, in der Jebsen schrieb, er wisse, wer den ?Holocaust als PR erfunden hat?. Jebsen entschuldigte sich und wies Antisemitismusvorwürfe von sich.', 'news3.jpg', 'Politics', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
