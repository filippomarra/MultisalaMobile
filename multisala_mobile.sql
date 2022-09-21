-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Gen 22, 2018 alle 10:04
-- Versione del server: 5.6.35
-- Versione PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multisala_mobile`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `cast`
--

CREATE TABLE `cast` (
  `codcast` int(3) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cast`
--

INSERT INTO `cast` (`codcast`, `nome`, `cognome`) VALUES
(1, 'Dennis', 'Villeneuve'),
(2, 'Ryan', 'Gosling'),
(3, 'Harrison', 'Ford'),
(4, 'Jared', 'Leto'),
(5, 'Petty', 'Jenckins'),
(6, 'Gal', 'Godot'),
(7, 'Zack', 'Snyder'),
(8, 'Henry', 'Cavill'),
(9, 'Ben', 'Affleck'),
(10, 'Jason', 'Mamoa'),
(11, 'Ezra', 'Miller'),
(12, 'Emma', 'Stone'),
(13, 'Damien', 'Chazelle'),
(14, 'Theodore', 'Melfi'),
(15, 'Taraji P.', 'Henson'),
(16, 'Octavia', 'Spencer'),
(17, 'Janelle', 'Monae'),
(18, 'Kevin', 'Costner'),
(19, 'Rian', 'Jonhson'),
(20, 'Mark', 'Hammil'),
(21, 'Carry', 'Fisher'),
(22, 'Daisy', 'Ridley'),
(23, 'Alan', 'Driver');

-- --------------------------------------------------------

--
-- Struttura della tabella `dirige`
--

CREATE TABLE `dirige` (
  `codcast` int(3) NOT NULL,
  `codfilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `dirige`
--

INSERT INTO `dirige` (`codcast`, `codfilm`) VALUES
(1, 1),
(5, 5),
(7, 6),
(13, 7),
(14, 8),
(19, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `codfilm` int(11) NOT NULL,
  `locandina` text NOT NULL,
  `titolo` varchar(150) NOT NULL,
  `genere` varchar(50) NOT NULL,
  `durata` varchar(20) NOT NULL,
  `produzione` varchar(50) NOT NULL,
  `trama` text NOT NULL,
  `data_uscita` date NOT NULL,
  `trailer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`codfilm`, `locandina`, `titolo`, `genere`, `durata`, `produzione`, `trama`, `data_uscita`, `trailer`) VALUES
(1, 'Blade_Runner_2049.jpg', 'BLADE RUNNER 2049', 'Fantascienza', '180min', 'Alcon Entertainment', 'In Blade Runner 2049, lo si può intuire dal titolo del sequel diretto da Denis Villeneuve, sono trascorsi trent\'anni dai fatti accaduti nel film originale, diretto nel 1982 da Ridley Scott. Dopo una serie di violente rivolte avvenute nel 2020, i replicanti prodotti dalla Tyrell sono stati messi al bando. Nello stesso anno, un grande black out che ha distrutto quasi completamente ogni dato digitale del pianeta, e gravi cambiamenti climatici hanno dato il via a una stagione di carestie, cui si è sopravvissuti solo grazie alle colture sintetiche della Wallace, una società con a capo il misterioso Neander Wallace (Jared Leto) che - grazie a quei profitti - ha poi ha acquisito anche le tecnologie della Tyrell, sviluppando così una nuova serie di replicanti completamente ubbidienti all\'uomo e dalla longevità indefinita. Nel 2049 a Los Angeles regna quindi un ordine apparente: o almeno fino quando l\'Agente K (Ryan Gosling), uno dei Blade Runner incaricati di ritirare i vecchi modelli che ancora vivono in clandestinità, fa una strana scoperta nel corso di una missione, dissotterrando così un segreto rimasto tale per anni, la cui rivelazione potrebbe rivelarsi un evento catastrofico. Seguendo gli ordini dei suoi superiori, K indaga per trovare ogni persona legata a quel segreto, per nascondere così definitivamente ogni traccia di quanto va insabbiato a tutti i costi. Nel corso delle sue indagini, K inizirà a nurtire dei dubbi sulla moralità del suo operato, e arriverà a incrociare la sua strada con quella di Rick Deckart (Harrison Ford), svanito nel nulla trent\'anni prima senza lasciare alcuna traccia di sé.', '2017-10-05', 'https://www.youtube.com/embed/f2jW75Q8EaI?rel=0'),
(2, 'Tomb_Raider.jpg', 'TOMB RAIDER', 'Azione/Avventura', '140 min', 'Warner Bros', 'Lara Croft è una ragazza indipendente, sicura di sé e poco incline a seguire le lezioni all\'università. Determinata a trovare da sola la sua strada, Lara rifiuta di prendere le redini dell\'azienda di famiglia e decide di partire in cerca del padre, un avventuriero disperso da anni mentre era alla ricerca di un\'isola misteriosa al largo delle coste del Giappone', '2018-03-15', 'https://www.youtube.com/embed/5cM5v_i43fc?rel=0'),
(3, 'Shape_of_Water.jpg', 'SHAPE OF WATER', 'Horror', '150 min', '20th Century Fox', 'Nel 1962 Elisa, un\'addetta alle pulizie affetta da mutismo, e la sua collega, che lavorano all\'interno di un laboratorio governativo, finiranno per scoprire una creatura anfibia all\'interno di una cisterna d\'acqua. In particolare Elisa, spinta dalla solitudine, inizierà a sviluppare un rapporto di amicizia con lo strano essere.', '2018-02-14', 'https://www.youtube.com/embed/pZ1ZJ08oicg?rel=0'),
(4, 'Deadpool_2.jpg', 'DEADPOOL 2', 'Azione', '130 min', 'Marvel Comics', 'Deadpool 2 è l\'atteso sequel del film con Ryan Reynolds nei panni del mercenario chiacchierone Wade Wilson.\r\nIl totomorte dei sicari, organizzato nel losco bar di Weasel (T.J. Miller), ha perso da tempo uno dei suoi più quotati concorrenti. Grazie al fattore rigenerante che lo rende praticamente immortale, l\'irriverente Deadpool può esibirsi in battutine provocatorie ed eccessi metateatrali senza pensare alle conseguenze, arrivando perfino a zittire Stan Lee nel teaser trailer del film.\r\nOltre al ritorno dell\'assennato Colosso e della ragazzina punk Testata Mutante Negasonica (Brianna Hildebrand), la pellicola segna il debutto di nuovi imprevedibili mutanti che daranno filo da torcere al supereroe insolente e sboccato. La fortunata Domino (Zazie Beetz), in grado di piegare le probabilità a proprio vantaggio, il potente Cable (Josh Brolin), per molti versi l\'opposto di Deadpool, e Black Tom Cassidy (Jack Kesy), capace di manipolare l\'energia attraverso le piante.', '2018-05-21', 'https://www.youtube.com/embed/BiSps4y7kY8?rel=0'),
(5, 'Wonder_Woman.jpg', 'WONDER WOMAN', 'Azione', '135min', 'Warner Bros. Pictures, DC Comics', 'Potenza, grazia, saggezza e meraviglia: qualità ispiratrici intrinseche di una delle più grandi supereroine di tutti i tempi, famosa in tutto il mondo come Wonder Woman. Rinomato e durevole archetipo della DC oltre che simbolo globale di forza ed uguaglianza per oltre 75 anni - come e quando lo è diventata e perché il benessere della razza umana è diventato così importante per lei? \r\nNata Diana di Themyscira, principessa delle amazzoni, e cresciuta su un\'isola paradisiaca al riparo dal mondo esterno, fin da bambina la futura Wonder Woman (Gal Gadot) è stata protetta dalle attenzioni di sua madre, la regina Hippolyta (Connie Nielsen), e del suo popolo. Ma ciò non significa che non abbia dovuto affrontare prove durissime. Il faticoso allenamento tradizionale per diventare una combattente invincibile, per lei è stato cinque, dieci volte più aspro di quello di qualsiasi altra giovane amazzone, eppure le ha permesso di scoprire le sue doti nascoste, abilità innate fuori del comune persino su un\'isola di grandi guerriere. I poteri la investono di una responsabilità che sconfina dal suo piccolo regno e l\'arrivo del pilota americano Steve Trevor (Chris Pine), costretto a un atterraggio di emergenza sulle coste di Themyscira, la mette di fronte a una verità che non può ignorare: tra gli uomini imperversa un atroce conflitto mondiale e Diana è decisa a intervenire. Cresciuta con lo spauracchio della storia di Ares, di come il dio della Guerra ha corrotto gli uomini, di come fosse responsabilità delle Amazzoni distruggere lui e tutto ciò che rappresenta, che la loro missione era di portare pace e amore tra gli uomini, Diana è convinta di poter fermare la minaccia, al fianco dell\'uomo appena conosciuto, e così lascia la sua casa per la prima volta nella vita, diretta verso il mondo degli uomini di cui ha sentito parlare soltanto nelle fiabe. Armata di scudo, spada, lazo e tiara, sbarca nella Londra del 1918, dove assume l\'identità di Diana Prince e viene a patti con gli stretti tailleur militari dell\'epoca. Alla fine della farsa, la principessa delle amazzoni si trasformerà nella supereroina Wonder Woman, per sconfiggere il perfido villain Doctor Poison (Elena Anaya), dottoressa assoldata dall\'esercito tedesco per sviluppare micidiali composti chimici, e porre fine alla sanguinosa guerra. Al fianco della statuaria guerriera, per aiutarla a orientarsi prima nella vecchia e polverosa capitale inglese, poi nell\'oscura campagna belga, ci sarà l\'affidabile e capace segretaria di Trevor, Etta Candy (Lucy Davis), giovane risoluta ed esempio di donna moderna (per il 1918); e la coppia di soldati reietti composta dall\'artista della truffa Sameer (Saïd Taghmaoui) e dall\'ex cecchino rissoso Charlie (Ewen Bremner). L\'attore Danny Huston, invece, interpreta il grande cattivo del film, il maniacale Generale Ludendorff, cuore di tenebra e vero burattinaio di Poison.', '2017-06-01', 'https://www.youtube.com/embed/1IXlwhk5d1c\" frameborder=\"0\" allow=\"0\"'),
(6, 'JL.jpg', 'JUSTICE LEAGUE', 'Azione', '170min', 'RatPac Entertainment', 'Dopo la morte di Superman, il vigilante Batman rivaluta i suoi metodi estremi e inizia a cercare altri straordinari eroi per assemblare una squadra per difendere la Terra da ogni minaccia. Assieme a Diana Prince, si mette alla ricerca del cibernetico ed ex giocatore di football Victor Stone, del velocista Barry Allen e del Re di Atlantide Arthur Curry. Insieme dovranno lottare contro Steppenwolf, incaricato dallo zio Darkseid di trovare tre artefatti nascosti sulla Terra.', '2017-11-19', 'https://www.youtube.com/embed/ydtXqUmlMzU?rel=0'),
(7, 'La_La_Land.jpg', 'LA LA LAND', 'Musical', '128min', 'Black Label Media', 'La La Land racconta un\'intensa e burrascosa storia d\'amore tra un\'attrice e un musicista che si sono appena trasferiti a Los Angeles in cerca di fortuna. Mia e\' un\'aspirante attrice che, tra un provino e l\'altro, serve cappuccini alle star del cinema. Sebastian e\' un musicista jazz che sbarca il lunario suonando nei piano bar. Dopo alcuni incontri casuali, fra Mia e Sebastian esplode una travolgente passione nutrita dalla condivisione di aspirazioni comuni, da sogni intrecciati e da una complicita\' fatta di incoraggiamento e sostegno reciproco. Ma quando iniziano ad arrivare i primi successi, i due si dovranno confrontare con delle scelte che metteranno in discussione il loro rapporto. La minaccia piu\' grande sara\' rappresentata proprio dai sogni che condividono e dalle loro ambizioni professionali.', '2017-01-26', 'https://www.youtube.com/embed/YbtJyxjXpMI?rel=0'),
(8, 'Il_Diritto_di_Contare.jpg', 'IL DIRITTO DI CONTARE', 'Drammatico', '127min', 'Chernin Entertainment', 'L\'incredibile storia mai raccontata di Katherine Johnson, Dorothy Vaughn e Mary Jackson, tre brillanti donne afroamericane che - alla NASA - lavorarono ad una delle più grandi operazioni della storia: la spedizione in orbita dell\'astronauta John Glenn, un obbiettivo importante che non solo riportò fiducia nella nazione, ma che ribaltò la Corsa allo Spazio, galvanizzando il mondo intero.', '2017-03-08', 'https://www.youtube.com/embed/LrM27IHgrpI?rel=0'),
(9, 'Star_Wars_VIII.jpg', 'STAR WARS VIII: GLI ULTIMI JEDI', 'Fantascienza', '152min', 'Lucasfilm', 'Rey è riuscita finalmente a trovare Luke, ma Skywalker non sembra poi così felice di avere una nuova apprendista, al contrario ha l\'aria di essere determinato a mandarla via, sebbene la ragazza sia determinata a restare. Nel frattempo la Ribellione vive il suo momento più disperato: colpiti duramente durante una fuga, Leia e i suoi si sono andati a cacciare in una trappola ancora più grande e più temibile. Poe, Finn e Rose, una coraggiosa combattente con una sorella da vendicare, cercano di trovare una via d\'uscita a quella che sembra una situazione impossibile. Per riuscire a liberarsi della flotta nemica infatti dovrebbero intrufolarsi a bordo della nave ammiraglia e disattivare un congegno che consente a Hux e ai suoi di tracciarli anche nell\'iperspazio. Rose e Finn partono quindi alla ricerca di un misterioso hacker che dovrebbe aiutarli a trovare i codici per salire a bordo della nave imperiale. Intanto Rey scopre di avere una connessione mentale con Kylo Ren e si convince che Ben Solo si possa ancora salvare. Luke accetta di darle aiuto per sviluppare la Forza, seppure di controvoglia. Kylo Ren però incita la ragazza a liberarsi di Luke e a spingerlo a raccontargli cosa è davvero accaduto fra zio e nipote. Le versioni di Kylo e di Luke sono diverse, ma entrambi altrettanto inquietanti. Incapace di convincere Luke a seguira, Rey parte per andare ad aiutare i suoi amici, con l\'idea però di recarsi prima da Kylo Ren per farlo tornare al lato della luce. Riuscirà Rey a convertire Kylo? E Luke resterà davvero a guardare mentre la Ribellione e sua sorella Leia rischiano di soccombere?', '2017-12-13', 'https://www.youtube.com/embed/WgcUW-P_SeA?rel=0');

-- --------------------------------------------------------

--
-- Struttura della tabella `partecipazione`
--

CREATE TABLE `partecipazione` (
  `codcast` int(3) NOT NULL,
  `codfilm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `partecipazione`
--

INSERT INTO `partecipazione` (`codcast`, `codfilm`) VALUES
(2, 1),
(3, 1),
(4, 1),
(6, 5),
(8, 6),
(9, 6),
(6, 6),
(10, 6),
(11, 6),
(2, 7),
(12, 7),
(15, 8),
(16, 8),
(17, 8),
(18, 8),
(20, 9),
(21, 9),
(22, 9),
(23, 9);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `codproiezione` int(3) NOT NULL,
  `matricola` int(11) NOT NULL,
  `data_prenotazione` datetime NOT NULL,
  `numero_biglietti` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`codproiezione`, `matricola`, `data_prenotazione`, `numero_biglietti`) VALUES
(2, 1, '2018-01-19 16:44:55', 3),
(1, 2, '2018-01-20 16:02:17', 1),
(26, 2, '2018-01-21 16:29:17', 2),
(66, 2, '2018-01-21 16:29:45', 1),
(86, 2, '2018-01-21 16:29:58', 2),
(130, 2, '2018-01-21 16:30:15', 5),
(139, 3, '2018-01-21 16:31:57', 2),
(83, 3, '2018-01-21 16:32:09', 2),
(129, 3, '2018-01-21 16:32:24', 4),
(55, 4, '2018-01-21 16:32:59', 5),
(45, 4, '2018-01-21 16:33:16', 3),
(119, 4, '2018-01-21 16:33:32', 4),
(95, 1, '2018-01-21 16:34:17', 2),
(66, 1, '2018-01-21 16:34:27', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `proiezione`
--

CREATE TABLE `proiezione` (
  `codproiezione` int(3) NOT NULL,
  `orario` varchar(10) NOT NULL,
  `2D_3D` varchar(2) NOT NULL,
  `data` date NOT NULL,
  `prezzo` int(3) NOT NULL,
  `codfilm` int(11) NOT NULL,
  `numsala` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `proiezione`
--

INSERT INTO `proiezione` (`codproiezione`, `orario`, `2D_3D`, `data`, `prezzo`, `codfilm`, `numsala`) VALUES
(1, '17:00', '2D', '2018-01-21', 5, 8, 5),
(2, '20:20', '2D', '2018-01-21', 5, 8, 5),
(3, '22:30', '2D', '2018-01-21', 5, 8, 5),
(4, '17:00', '2D', '2018-01-22', 5, 8, 5),
(5, '20:20', '2D', '2018-01-22', 5, 8, 5),
(6, '22:30', '2D', '2018-01-22', 5, 8, 5),
(7, '17:00', '2D', '2018-01-23', 5, 8, 5),
(8, '20:20', '2D', '2018-01-23', 5, 8, 5),
(9, '22:30', '2D', '2018-01-23', 5, 8, 5),
(10, '17:00', '2D', '2018-01-24', 5, 8, 5),
(11, '20:20', '2D', '2018-01-24', 5, 8, 5),
(12, '22:30', '2D', '2018-01-24', 5, 8, 5),
(13, '17:00', '2D', '2018-01-25', 5, 8, 5),
(14, '20:20', '2D', '2018-01-25', 5, 8, 5),
(15, '22:30', '2D', '2018-01-25', 5, 8, 5),
(16, '17:00', '2D', '2018-01-26', 5, 8, 5),
(17, '20:20', '2D', '2018-01-26', 5, 8, 5),
(18, '22:30', '2D', '2018-01-26', 5, 8, 5),
(19, '17:00', '2D', '2018-01-27', 5, 8, 5),
(20, '20:20', '2D', '2018-01-27', 5, 8, 5),
(21, '22:30', '2D', '2018-01-27', 5, 8, 5),
(22, '17:00', '2D', '2018-01-28', 5, 8, 5),
(23, '20:20', '2D', '2018-01-28', 5, 8, 5),
(24, '22:30', '2D', '2018-01-28', 5, 8, 5),
(25, '17:00', '2D', '2018-01-21', 5, 5, 2),
(26, '20:20', '2D', '2018-01-21', 5, 5, 2),
(27, '22:30', '2D', '2018-01-21', 5, 5, 2),
(28, '17:00', '2D', '2018-01-22', 5, 5, 2),
(29, '20:20', '2D', '2018-01-22', 5, 5, 2),
(30, '22:30', '2D', '2018-01-22', 5, 5, 2),
(31, '17:00', '2D', '2018-01-23', 5, 5, 2),
(32, '20:20', '2D', '2018-01-23', 5, 5, 2),
(33, '22:30', '2D', '2018-01-23', 5, 5, 2),
(34, '17:00', '2D', '2018-01-24', 5, 5, 2),
(35, '20:20', '2D', '2018-01-24', 5, 5, 2),
(36, '22:30', '2D', '2018-01-24', 5, 5, 2),
(37, '17:00', '2D', '2018-01-25', 5, 5, 2),
(38, '20:20', '2D', '2018-01-25', 5, 5, 2),
(39, '22:30', '2D', '2018-01-25', 5, 5, 2),
(40, '17:00', '2D', '2018-01-26', 5, 5, 2),
(41, '20:20', '2D', '2018-01-26', 5, 5, 2),
(42, '22:30', '2D', '2018-01-26', 5, 5, 2),
(43, '17:00', '2D', '2018-01-27', 5, 5, 2),
(44, '20:20', '2D', '2018-01-27', 5, 5, 2),
(45, '22:30', '2D', '2018-01-27', 5, 5, 2),
(46, '17:00', '2D', '2018-01-28', 5, 5, 2),
(47, '20:20', '2D', '2018-01-28', 5, 5, 2),
(48, '22:30', '2D', '2018-01-28', 5, 5, 2),
(49, '17:00', '2D', '2018-01-21', 5, 6, 3),
(50, '20:20', '3D', '2018-01-21', 7, 6, 3),
(51, '22:30', '2D', '2018-01-21', 5, 6, 3),
(52, '17:00', '2D', '2018-01-22', 5, 6, 3),
(53, '20:20', '3D', '2018-01-22', 7, 6, 3),
(54, '22:30', '2D', '2018-01-22', 5, 6, 3),
(55, '17:00', '2D', '2018-01-23', 5, 6, 3),
(56, '20:20', '3D', '2018-01-23', 7, 6, 3),
(57, '22:30', '2D', '2018-01-23', 5, 6, 3),
(58, '17:00', '2D', '2018-01-24', 5, 6, 3),
(59, '20:20', '3D', '2018-01-24', 7, 6, 3),
(60, '22:30', '2D', '2018-01-24', 5, 6, 3),
(61, '17:00', '2D', '2018-01-25', 5, 6, 3),
(62, '20:20', '3D', '2018-01-25', 7, 6, 3),
(63, '22:30', '2D', '2018-01-25', 5, 6, 3),
(64, '17:00', '2D', '2018-01-26', 5, 6, 3),
(65, '20:20', '3D', '2018-01-26', 7, 6, 3),
(66, '22:30', '2D', '2018-01-26', 5, 6, 3),
(67, '17:00', '2D', '2018-01-27', 5, 6, 3),
(68, '20:20', '3D', '2018-01-27', 7, 6, 3),
(69, '22:30', '2D', '2018-01-27', 5, 6, 3),
(70, '17:00', '2D', '2018-01-28', 5, 6, 3),
(71, '20:20', '3D', '2018-01-28', 7, 6, 3),
(72, '22:30', '2D', '2018-01-28', 5, 6, 3),
(73, '17:00', '2D', '2018-01-21', 5, 7, 4),
(74, '20:20', '2D', '2018-01-21', 5, 7, 4),
(75, '22:30', '2D', '2018-01-21', 5, 7, 4),
(76, '17:00', '2D', '2018-01-22', 5, 7, 4),
(77, '20:20', '2D', '2018-01-22', 5, 7, 4),
(78, '22:30', '2D', '2018-01-22', 5, 7, 4),
(79, '17:00', '2D', '2018-01-23', 5, 7, 4),
(80, '20:20', '2D', '2018-01-23', 5, 7, 4),
(81, '22:30', '2D', '2018-01-23', 5, 7, 4),
(82, '17:00', '2D', '2018-01-24', 5, 7, 4),
(83, '20:20', '2D', '2018-01-24', 5, 7, 4),
(84, '22:30', '2D', '2018-01-24', 5, 7, 4),
(85, '17:00', '2D', '2018-01-25', 5, 7, 4),
(86, '20:20', '2D', '2018-01-25', 5, 7, 4),
(87, '22:30', '2D', '2018-01-25', 5, 7, 4),
(88, '17:00', '2D', '2018-01-26', 5, 7, 4),
(89, '20:20', '2D', '2018-01-26', 5, 7, 4),
(90, '22:30', '2D', '2018-01-26', 5, 7, 4),
(91, '17:00', '2D', '2018-01-27', 5, 7, 4),
(92, '20:20', '2D', '2018-01-27', 5, 7, 4),
(93, '22:30', '2D', '2018-01-27', 5, 7, 4),
(94, '17:00', '2D', '2018-01-28', 5, 7, 4),
(95, '20:20', '2D', '2018-01-28', 5, 7, 4),
(96, '22:30', '2D', '2018-01-28', 5, 7, 4),
(121, '22:30', '2D', '2018-01-28', 5, 9, 6),
(122, '20:20', '3D', '2018-01-28', 7, 9, 6),
(123, '17:00', '2D', '2018-01-28', 5, 9, 6),
(124, '22:30', '2D', '2018-01-27', 5, 9, 6),
(125, '20:20', '3D', '2018-01-27', 7, 9, 6),
(126, '17:00', '2D', '2018-01-27', 5, 9, 6),
(127, '22:30', '2D', '2018-01-26', 5, 9, 6),
(128, '20:20', '3D', '2018-01-26', 7, 9, 6),
(129, '17:00', '2D', '2018-01-26', 5, 9, 6),
(130, '22:30', '2D', '2018-01-25', 5, 9, 6),
(131, '20:20', '3D', '2018-01-25', 7, 9, 6),
(132, '17:00', '2D', '2018-01-25', 5, 9, 6),
(145, '22:30', '2D', '2018-01-26', 5, 9, 6),
(146, '20:20', '3D', '2018-01-26', 7, 9, 6),
(147, '17:00', '2D', '2018-01-26', 5, 9, 6),
(148, '22:30', '2D', '2018-01-25', 5, 9, 6),
(149, '20:20', '3D', '2018-01-25', 7, 9, 6),
(150, '17:00', '2D', '2018-01-25', 5, 9, 6),
(151, '22:30', '2D', '2018-01-24', 5, 9, 6),
(152, '20:20', '3D', '2018-01-24', 7, 9, 6),
(153, '17:00', '2D', '2018-01-24', 5, 9, 6),
(154, '22:30', '2D', '2018-01-23', 5, 9, 6),
(155, '20:20', '3D', '2018-01-23', 7, 9, 6),
(156, '17:00', '2D', '2018-01-23', 5, 9, 6),
(157, '22:30', '2D', '2018-01-22', 5, 9, 6),
(158, '20:20', '3D', '2018-01-22', 7, 9, 6),
(159, '17:00', '2D', '2018-01-22', 5, 9, 6),
(160, '22:30', '2D', '2018-01-21', 5, 9, 6),
(161, '20:20', '3D', '2018-01-21', 7, 9, 6),
(162, '17:00', '2D', '2018-01-21', 5, 9, 6),
(163, '17:00', '2D', '2018-01-21', 5, 1, 1),
(164, '20:20', '3D', '2018-01-21', 7, 1, 1),
(165, '22:30', '2D', '2018-01-21', 5, 1, 1),
(166, '17:00', '2D', '2018-01-22', 5, 1, 1),
(167, '20:20', '3D', '2018-01-22', 7, 1, 1),
(168, '22:30', '2D', '2018-01-22', 5, 1, 1),
(169, '17:00', '2D', '2018-01-23', 5, 1, 1),
(170, '20:20', '3D', '2018-01-23', 5, 1, 1),
(171, '22:30', '2D', '2018-01-23', 5, 1, 1),
(172, '17:00', '2D', '2018-01-24', 5, 1, 1),
(173, '20:20', '3D', '2018-01-24', 7, 1, 1),
(174, '22:30', '2D', '2018-01-24', 5, 1, 1),
(175, '17:00', '2D', '2018-01-25', 5, 1, 1),
(176, '20:20', '3D', '2018-01-25', 7, 1, 1),
(177, '22:30', '2D', '2018-01-25', 5, 1, 1),
(178, '17:00', '2D', '2018-01-26', 5, 1, 1),
(179, '20:20', '3D', '2018-01-26', 7, 1, 1),
(180, '22:30', '2D', '2018-01-26', 5, 1, 1),
(181, '17:00', '2D', '2018-01-27', 5, 1, 1),
(182, '20:20', '3D', '2018-01-27', 7, 1, 1),
(183, '22:30', '2D', '2018-01-27', 5, 1, 1),
(184, '17:00', '2D', '2018-01-28', 5, 1, 1),
(185, '20:20', '3D', '2018-01-28', 7, 1, 1),
(186, '22:30', '2D', '2018-01-28', 5, 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `sala`
--

CREATE TABLE `sala` (
  `numsala` int(1) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `header` varchar(20) NOT NULL,
  `posti` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `sala`
--

INSERT INTO `sala` (`numsala`, `nome`, `header`, `posti`) VALUES
(1, 'sala1', 'Sala1.png', 300),
(2, 'sala2', 'Sala2.png', 200),
(3, 'sala3', 'Sala3.png', 200),
(4, 'sala4', 'Sala4.png', 300),
(5, 'sala5', 'Sala5.png', 150),
(6, 'sala6', 'Sala6.png', 250);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `matricola` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`matricola`, `nome`, `cognome`, `email`, `password`, `tipo`) VALUES
(1, 'Filippo', 'Marra', 'filippo.marra93@outlook.it', 'filippo', 'admin'),
(2, 'Giuseppe', 'Di Maria', 'giuseppedimaria95@gmail.com', 'peppe', 'admin'),
(3, 'Tizio', 'Caio', 'tiziocaio@email.it', 'tiziocaio', 'cliente'),
(4, 'Mario', 'Rossi', 'mariorossi@gmail.com', 'mariorossi', 'cassiere');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`codcast`);

--
-- Indici per le tabelle `dirige`
--
ALTER TABLE `dirige`
  ADD KEY `Dirige` (`codfilm`) USING BTREE,
  ADD KEY `Regista` (`codcast`) USING BTREE;

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`codfilm`);

--
-- Indici per le tabelle `partecipazione`
--
ALTER TABLE `partecipazione`
  ADD KEY `Attore` (`codcast`),
  ADD KEY `Partecipa` (`codfilm`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD KEY `Proiezione` (`codproiezione`),
  ADD KEY `Utente` (`matricola`);

--
-- Indici per le tabelle `proiezione`
--
ALTER TABLE `proiezione`
  ADD PRIMARY KEY (`codproiezione`),
  ADD KEY `Riproduce` (`codfilm`),
  ADD KEY `Proietta` (`numsala`);

--
-- Indici per le tabelle `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`numsala`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`matricola`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `cast`
--
ALTER TABLE `cast`
  MODIFY `codcast` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `codfilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT per la tabella `proiezione`
--
ALTER TABLE `proiezione`
  MODIFY `codproiezione` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT per la tabella `sala`
--
ALTER TABLE `sala`
  MODIFY `numsala` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `matricola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `dirige`
--
ALTER TABLE `dirige`
  ADD CONSTRAINT `Cast` FOREIGN KEY (`codcast`) REFERENCES `cast` (`codcast`),
  ADD CONSTRAINT `Film` FOREIGN KEY (`codfilm`) REFERENCES `film` (`codfilm`);

--
-- Limiti per la tabella `partecipazione`
--
ALTER TABLE `partecipazione`
  ADD CONSTRAINT `Attore` FOREIGN KEY (`codcast`) REFERENCES `cast` (`codcast`),
  ADD CONSTRAINT `Partecipa` FOREIGN KEY (`codfilm`) REFERENCES `film` (`codfilm`);

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `Proiezione` FOREIGN KEY (`codproiezione`) REFERENCES `proiezione` (`codproiezione`),
  ADD CONSTRAINT `Utente` FOREIGN KEY (`matricola`) REFERENCES `utenti` (`matricola`);

--
-- Limiti per la tabella `proiezione`
--
ALTER TABLE `proiezione`
  ADD CONSTRAINT `Proietta` FOREIGN KEY (`numsala`) REFERENCES `sala` (`numsala`),
  ADD CONSTRAINT `Riproduce` FOREIGN KEY (`codfilm`) REFERENCES `film` (`codfilm`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
