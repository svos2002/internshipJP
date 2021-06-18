-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 10:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern`
--

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `id` int(3) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `country` varchar(13) DEFAULT NULL,
  `age` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`id`, `name`, `email`, `gender`, `phone`, `country`, `age`) VALUES
(1, 'Reeta Bowering', 'rbowering0@soundcloud.com', 'Female', '174-215-4066', 'Japan', 22),
(2, 'Janice Nenci', 'jnenci1@google.com.hk', 'Bigender', '121-560-7745', 'Panama', 24),
(3, 'Herbie Mallord', 'hmallord2@mozilla.org', 'Female', '547-665-6525', 'Indonesia', 41),
(4, 'Mattias Brooks', 'mbrooks3@blogs.com', 'Agender', '837-924-3034', 'China', 40),
(5, 'Conan Fosdyke', 'cfosdyke4@myspace.com', 'Agender', '464-221-4685', 'Sweden', 38),
(6, 'Bradly Crauford', 'bcrauford5@buzzfeed.com', 'Female', '309-527-2145', 'Poland', 62),
(7, 'Vergil Le Grove', 'vle6@nyu.edu', 'Bigender', '677-529-4647', 'Indonesia', 28),
(8, 'Augusta Farnsworth', 'afarnsworth7@hud.gov', 'Agender', '659-952-7227', 'China', 54),
(9, 'Jeremiah Fennell', 'jfennell8@biblegateway.com', 'Polygender', '220-137-9025', 'Portugal', 57),
(10, 'Allison Andrivot', 'aandrivot9@washington.edu', 'Polygender', '656-428-5561', 'China', 29),
(11, 'Waylin Hayball', 'whayballa@apple.com', 'Non-binary', '863-715-9858', 'Indonesia', 56),
(12, 'Dunc Stredwick', 'dstredwickb@stumbleupon.com', 'Non-binary', '168-232-6871', 'Indonesia', 34),
(13, 'Annecorinne Chastney', 'achastneyc@psu.edu', 'Non-binary', '673-908-1231', 'Japan', 61),
(14, 'Cornela Christall', 'cchristalld@redcross.org', 'Polygender', '463-647-7495', 'Netherlands', 59),
(15, 'Griff Slad', 'gslade@symantec.com', 'Genderfluid', '824-866-3869', 'Canada', 48),
(16, 'Chrisse Johansson', 'cjohanssonf@ucoz.com', 'Bigender', '818-736-6075', 'China', 38),
(17, 'Heddi McComish', 'hmccomishg@tamu.edu', 'Bigender', '391-616-5310', 'France', 59),
(18, 'Shermie Sodo', 'ssodoh@ucsd.edu', 'Polygender', '193-773-9332', 'Portugal', 28),
(19, 'Sarene Kleinsmuntz', 'skleinsmuntzi@bloglovin.com', 'Bigender', '653-366-4841', 'Philippines', 51),
(20, 'Laurice Sherbrook', 'lsherbrookj@imageshack.us', 'Bigender', '711-839-8819', 'Indonesia', 50),
(21, 'Ruthanne Kane', 'rkanek@tiny.cc', 'Genderfluid', '814-524-3144', 'Philippines', 49),
(22, 'Margaretta Bacchus', 'mbacchusl@msu.edu', 'Agender', '957-926-4913', 'China', 41),
(23, 'Spenser Gowrie', 'sgowriem@dyndns.org', 'Polygender', '589-919-4490', 'Indonesia', 22),
(24, 'Dan Tindley', 'dtindleyn@wisc.edu', 'Genderfluid', '688-507-3134', 'China', 49),
(25, 'Tedmund Romanetti', 'tromanettio@tuttocitta.it', 'Female', '323-931-9277', 'South Africa', 27),
(26, 'Effie Shakspeare', 'eshakspearep@sbwire.com', 'Agender', '839-789-2080', 'Lithuania', 17),
(27, 'Constancia Rangle', 'crangleq@ehow.com', 'Non-binary', '158-951-3804', 'Indonesia', 31),
(28, 'Donnell Gannicleff', 'dgannicleffr@mlb.com', 'Female', '105-601-6443', 'Saudi Arabia', 18),
(29, 'Jobina Cahen', 'jcahens@canalblog.com', 'Agender', '987-154-4678', 'Cyprus', 42),
(30, 'Elana Braikenridge', 'ebraikenridget@samsung.com', 'Non-binary', '690-866-3950', 'Japan', 48),
(31, 'Glenn Kirwin', 'gkirwinu@google.de', 'Male', '679-916-4927', 'China', 65),
(32, 'Mario Meckiff', 'mmeckiffv@mapy.cz', 'Polygender', '206-200-5893', 'Poland', 16),
(33, 'Marilee Leven', 'mlevenw@abc.net.au', 'Female', '626-905-6853', 'China', 31),
(34, 'Haslett Varker', 'hvarkerx@hexun.com', 'Bigender', '783-701-0800', 'Russia', 30),
(35, 'Phedra Corwood', 'pcorwoody@soup.io', 'Genderfluid', '525-625-2535', 'Philippines', 32),
(36, 'Maxim Amyes', 'mamyesz@latimes.com', 'Bigender', '959-618-1221', 'Poland', 62),
(37, 'Amalie Geeson', 'ageeson10@chron.com', 'Bigender', '958-643-5146', 'China', 26),
(38, 'Kendal Tribbeck', 'ktribbeck11@wikia.com', 'Male', '507-353-9379', 'Mexico', 30),
(39, 'Kelila Minshall', 'kminshall12@vinaora.com', 'Female', '664-242-3099', 'Albania', 52),
(40, 'Kittie Englishby', 'kenglishby13@prweb.com', 'Polygender', '986-524-8380', 'Indonesia', 46),
(41, 'Ibrahim Render', 'irender14@naver.com', 'Bigender', '537-791-3362', 'Philippines', 16),
(42, 'Julee Kelle', 'jkelle15@java.com', 'Polygender', '811-423-7117', 'Indonesia', 26),
(43, 'Rowland Petrello', 'rpetrello16@slate.com', 'Agender', '527-291-3044', 'China', 36),
(44, 'Lyndsie Gardner', 'lgardner17@ca.gov', 'Genderfluid', '686-207-1603', 'China', 41),
(45, 'Joela Mahon', 'jmahon18@cmu.edu', 'Bigender', '128-219-4357', 'Indonesia', 50),
(46, 'Britte Goodhand', 'bgoodhand19@livejournal.com', 'Genderfluid', '599-556-3121', 'Malaysia', 19),
(47, 'Garey Gutowski', 'ggutowski1a@spiegel.de', 'Agender', '542-828-2724', 'Ecuador', 28),
(48, 'Tessy Tabart', 'ttabart1b@paypal.com', 'Female', '935-979-8801', 'Ukraine', 26),
(49, 'Chick Firman', 'cfirman1c@fastcompany.com', 'Bigender', '870-720-3471', 'France', 66),
(50, 'Emmalynne Kerans', 'ekerans1d@earthlink.net', 'Genderfluid', '999-674-1688', 'Nigeria', 39),
(51, 'Faina Roblin', 'froblin1e@clickbank.net', 'Non-binary', '315-823-4407', 'Philippines', 25),
(52, 'Emmanuel Bew', 'ebew1f@reference.com', 'Non-binary', '229-541-0886', 'Bangladesh', 26),
(53, 'Brennan Broker', 'bbroker1g@stanford.edu', 'Male', '967-116-1578', 'Ukraine', 58),
(54, 'Germain Sighard', 'gsighard1h@toplist.cz', 'Non-binary', '431-749-4363', 'China', 63),
(55, 'Ulick Doggett', 'udoggett1i@ed.gov', 'Genderfluid', '509-278-6341', 'Nigeria', 51),
(56, 'Rufus Sigfrid', 'rsigfrid1j@alibaba.com', 'Non-binary', '297-354-4660', 'Croatia', 56),
(57, 'Agnese Rosenblad', 'arosenblad1k@nyu.edu', 'Female', '462-614-1033', 'Brazil', 34),
(58, 'Bartholemy McCallum', 'bmccallum1l@unblog.fr', 'Genderqueer', '401-686-1897', 'China', 16),
(59, 'Maryellen Altamirano', 'maltamirano1m@walmart.com', 'Genderqueer', '124-728-4148', 'Brazil', 25),
(60, 'Jedd Clist', 'jclist1n@blogtalkradio.com', 'Agender', '160-823-0497', 'Syria', 39),
(61, 'Titos Probart', 'tprobart1o@hostgator.com', 'Female', '793-460-9279', 'Philippines', 59),
(62, 'Claretta Meade', 'cmeade1p@google.es', 'Bigender', '337-464-8300', 'China', 35),
(63, 'Fayth Warlow', 'fwarlow1q@archive.org', 'Genderfluid', '580-578-9239', 'Russia', 38),
(64, 'Hale Boase', 'hboase1r@businessweek.com', 'Non-binary', '679-329-2175', 'China', 56),
(65, 'Coraline Ruppelin', 'cruppelin1s@noaa.gov', 'Genderfluid', '971-864-4230', 'China', 24),
(66, 'Edwin Haw', 'ehaw1t@360.cn', 'Genderqueer', '226-592-9522', 'Poland', 26),
(67, 'Sophia McKomb', 'smckomb1u@smugmug.com', 'Agender', '705-310-1999', 'China', 22),
(68, 'Jard Tummons', 'jtummons1v@newsvine.com', 'Genderfluid', '895-619-4401', 'China', 56),
(69, 'Wendeline Duval', 'wduval1w@google.ru', 'Female', '617-974-9617', 'Indonesia', 64),
(70, 'Reinhard Heeron', 'rheeron1x@mapy.cz', 'Bigender', '984-848-8387', 'Japan', 33),
(71, 'Fanya Kamenar', 'fkamenar1y@oakley.com', 'Polygender', '788-336-8884', 'Portugal', 51),
(72, 'Powell Deakes', 'pdeakes1z@com.com', 'Male', '337-659-2400', 'Sweden', 52),
(73, 'Laina Durrant', 'ldurrant20@webs.com', 'Genderqueer', '379-578-5417', 'Indonesia', 35),
(74, 'Selma Ascrofte', 'sascrofte21@pcworld.com', 'Genderfluid', '469-976-1800', 'China', 53),
(75, 'Friedrich Denzilow', 'fdenzilow22@buzzfeed.com', 'Bigender', '518-920-7603', 'United States', 26),
(76, 'Lief Mawhinney', 'lmawhinney23@google.com.au', 'Non-binary', '104-696-8003', 'Portugal', 30),
(77, 'Giraldo House', 'ghouse24@paypal.com', 'Bigender', '296-358-4805', 'Indonesia', 16),
(78, 'Haskell Terrington', 'hterrington25@vimeo.com', 'Non-binary', '394-560-6920', 'Russia', 63),
(79, 'My Maleney', 'mmaleney26@vkontakte.ru', 'Male', '255-526-6658', 'Argentina', 35),
(80, 'Bethena Forgie', 'bforgie27@springer.com', 'Male', '244-302-1613', 'El Salvador', 42),
(81, 'Twyla Robichon', 'trobichon28@chron.com', 'Non-binary', '389-458-5902', 'Nigeria', 45),
(82, 'Brittne Weddeburn - Scrimgeour', 'bweddeburn29@cargocollective.com', 'Polygender', '321-380-2610', 'Indonesia', 38),
(83, 'Tate Genge', 'tgenge2a@utexas.edu', 'Non-binary', '924-527-7377', 'Portugal', 42),
(84, 'Rosanna Constance', 'rconstance2b@un.org', 'Genderfluid', '851-413-9455', 'Colombia', 30),
(85, 'Ellswerth McMillan', 'emcmillan2c@npr.org', 'Agender', '600-599-1690', 'Portugal', 54),
(86, 'Bernardine Lascelles', 'blascelles2d@geocities.jp', 'Bigender', '159-182-7893', 'Ukraine', 16),
(87, 'Nollie Talkington', 'ntalkington2e@jalbum.net', 'Non-binary', '826-896-6028', 'China', 42),
(88, 'Garrik Phlipon', 'gphlipon2f@nsw.gov.au', 'Bigender', '247-914-9536', 'Russia', 58),
(89, 'Nappie Jope', 'njope2g@weebly.com', 'Male', '742-648-7995', 'Bangladesh', 40),
(90, 'Catie Jime', 'cjime2h@printfriendly.com', 'Non-binary', '542-254-9099', 'Russia', 21),
(91, 'Gretchen Shane', 'gshane2i@oakley.com', 'Female', '922-528-3951', 'Indonesia', 44),
(92, 'Wilbert Skellon', 'wskellon2j@dailymotion.com', 'Polygender', '512-737-1279', 'Portugal', 48),
(93, 'Shannah MacNulty', 'smacnulty2k@nps.gov', 'Agender', '857-517-0925', 'Macedonia', 59),
(94, 'Valli McGreay', 'vmcgreay2l@fda.gov', 'Agender', '576-802-6698', 'Sweden', 23),
(95, 'Chloe Sallter', 'csallter2m@constantcontact.com', 'Female', '793-130-7190', 'Philippines', 20),
(96, 'Drake Izatt', 'dizatt2n@samsung.com', 'Female', '862-161-4717', 'Poland', 61),
(97, 'Ivonne Sultana', 'isultana2o@is.gd', 'Polygender', '206-824-6748', 'China', 35),
(98, 'Jodie Zienkiewicz', 'jzienkiewicz2p@ameblo.jp', 'Genderqueer', '814-727-5120', 'China', 37),
(99, 'Vidovik Donan', 'vdonan2q@macromedia.com', 'Male', '725-734-0162', 'Nigeria', 38),
(100, 'Hilario Spadelli', 'hspadelli2r@google.co.jp', 'Non-binary', '755-370-5542', 'Indonesia', 28),
(101, 'sven vos', 'test', 'male', '12345', 'japen', 12);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `auth_level`) VALUES
(101, 'test', '$2y$10$AJYvLW/30EijLjfA75brUuZTGTG4TsY6AWILCQKApICGah6zoxShO', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
