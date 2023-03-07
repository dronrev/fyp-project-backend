-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 12:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmfki_activity_management_system_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `name_activity` varchar(1000) NOT NULL,
  `organizer` varchar(1000) NOT NULL,
  `pengarah` varchar(1000) NOT NULL,
  `tema` varchar(1000) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `date`, `location`, `name_activity`, `organizer`, `pengarah`, `tema`, `time`) VALUES
('a163ce80c300976', '2023-01-28', 'DKP-20', 'Test 1', 'PMFKI', 'Test1', 'Belum jumpa tema ni boi', '00:00:00'),
('a263cf78ba8bed2', '2023-01-30', 'DKP-21', 'Test 2 ', 'Labuan', 'Test5', 'Testtest', '00:00:00'),
('a363d2858c44df9', '2023-02-23', 'Parking Lot FKJ', 'Observing Daryl and Cherissa in the car', 'Vernord Musran', 'BI19110121', 'James Bond', '00:00:00'),
('a563d2a6526b433', '2023-02-11', 'DKP-20', 'Event1', 'Organizererrerer', 'Test1', 'Tema', '00:00:00'),
('a763d745290d873', '2023-02-02', 'Digital Maker Hub', 'Testetets', 'Marc', 'bi19110110', 'Tema', '00:00:00'),
('a863d75243ac3c2', '2023-02-03', 'DKP', 'Marc', 'organzer', 'Test1', 'tema', '00:00:00'),
('a863e5ad758ad3c', '2023-03-01', 'google meet', 'new activity', 'PMFKI', 'bi19110110', 'tema', '00:00:00'),
('a963e3be812ab26', '2022-02-08', 'Digital Maker Hub', 'Moonwalking', 'Joshua Foer', 'bi19110110', 'The Art and Science of Remembering Everything', '00:00:00'),
('a963ef7984592a2', '2023-02-19', 'UMS', 'Video Presentation', 'PMFKI', 'Test1', 'FYP', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_pmfki`
--

CREATE TABLE `admin_pmfki` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_pmfki`
--

INSERT INTO `admin_pmfki` (`username`, `password`, `user_id`) VALUES
('admin1', 'Vvv12123434.,', 'Admin'),
('admin2', 'Aaa12123434.,', 'Admin2');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `user_id` varchar(100) NOT NULL,
  `announcement_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date_created` date DEFAULT NULL,
  `attachment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`user_id`, `announcement_id`, `title`, `subject`, `message`, `date_created`, `attachment`) VALUES
('Admin', 'noti163e598df83ad6', 'Title 2', 'Subject 4', 'H.J. Heinz Co. is eliminating 600 jobs across the U.S. and in Canada, including 350 in Pittsburgh, nearly a third of the operation in its hometown, it said Tuesday. The ketchup maker was sold in June to Buffett\'s Berkshire Hathaway and the Brazilian investment firm 3G Capital for $23.3 billion.', '2023-02-10', ''),
('Admin', 'noti263e5995f04ab5', 'Title 8', 'Subject 10', 'Guinness World Records says the oldest living person verified by original proof of birth is Misao Okawa, a 115-year-old Japanese woman. The oldest verified age was 122 years and 164 days: Jeanne Calment of France, who died in 1997.', '2023-02-10', ''),
('Admin', 'noti363e599945b22d', 'Title 12', 'Subject 13', 'Sharks have swum in the oceans for almost 450 million years. But longevity is only part of the story. That extra few million years of evolution have enabled many shark species to develop some extraordinary abilities as perfect predators.', '2023-02-10', ''),
('Admin', 'noti463e599c849a6c', 'Title 20 ', 'Is the moon a reflection of the sun?', 'Of course, the light we see doesn\'t originate on the Moon -- the Moon (like the planets) shines by reflected sunlight. [Note in passing: the Moon\'s surface is actually quite black. Only about 3% of the Sun\'s light which hits the Moon is reflected. But that\'s enough to light up our night sky.]', '2023-02-10', ''),
('Admin', 'noti563e5b09eccc26', 'Announcement', 'New Subject', 'Messag message mesagege', '2023-02-10', ''),
('Admin', 'noti663ef7ddd37446', 'Video Presentation', 'Video', 'Your video Presentation', '2023-02-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budget_id` varchar(100) NOT NULL,
  `report_id` varchar(100) NOT NULL,
  `speaker` varchar(100) NOT NULL,
  `tempat_pertama` decimal(65,2) NOT NULL,
  `tempat_kedua` decimal(65,2) DEFAULT NULL,
  `tempat_ketiga` decimal(65,2) DEFAULT NULL,
  `peruntukan_hep` decimal(65,2) DEFAULT NULL,
  `yuran_pendapatan` decimal(65,2) DEFAULT NULL,
  `penaja` varchar(100) DEFAULT NULL,
  `name_activity` varchar(100) DEFAULT NULL,
  `penganjur` varchar(100) DEFAULT NULL,
  `pengarah` varchar(100) DEFAULT NULL,
  `pegawai_bertanggungjawab` varchar(100) DEFAULT NULL,
  `bajet_diluluskan` decimal(10,2) DEFAULT NULL,
  `penama_kelulusan` varchar(100) DEFAULT NULL,
  `kelulusan_oleh` varchar(100) DEFAULT NULL,
  `jumlah_cek` varchar(100) DEFAULT NULL,
  `penerima_cek` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budget_id`, `report_id`, `speaker`, `tempat_pertama`, `tempat_kedua`, `tempat_ketiga`, `peruntukan_hep`, `yuran_pendapatan`, `penaja`, `name_activity`, `penganjur`, `pengarah`, `pegawai_bertanggungjawab`, `bajet_diluluskan`, `penama_kelulusan`, `kelulusan_oleh`, `jumlah_cek`, `penerima_cek`) VALUES
('b1010', 'r163b1a0727e296', 'Marc Forbes Kulai', '100.00', '50.00', '30.00', '100.00', '200.00', 'Matthew Kulai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1063d2853ebe39d', 'r363d2853ebd9d4', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1163d285baa751f', 'r463d285baa6e04', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1263d285bbe66b4', 'r563d285bbe320b', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1363d63353de0cf', 'r363d63353dd99b', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1463d633cc720bc', 'r363d633cc71b26', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1563d6343a37975', 'r363d6343a37565', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1663d634aa27044', 'r363d634aa26980', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1763d634b67b535', 'r463d634b67b26e', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1863d65b972f2c5', 'r463d65b972e859', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b1963d7454f13d30', 'r563d7454f13683', 'DR Florence', '500.00', '400.00', '300.00', '1.00', '200.00', 'Marc', 'Drinking Water', NULL, 'Marc', 'Dr Florence', '1000.00', '-', '-', '-', '-'),
('b2063d7548db4acb', 'r663d7548db4205', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b2163e3c51f24ebe', 'r763e3c51f23d14', '500', '0.00', '0.00', '0.00', '200.00', '100.00', 'MR MR', 'Moonwalking', NULL, 'Test', 'Test', '1000.00', '', '', '', ''),
('b2263e5ad7c60393', 'r663e5ad7c5f7a9', '', '0.00', NULL, NULL, NULL, NULL, NULL, 'makna', NULL, 'Haji', 'Dr ', '1000.00', '--', '--', '--', '--'),
('b2363ef7672b6569', 'r763ef7672b4ff6', '', '0.00', NULL, NULL, NULL, NULL, NULL, 'Title', NULL, 'Pengarha', 'Dr Lai ', '0.00', '-', '-', '-', '-'),
('b2463ef79db57f5f', 'r663ef79db54f3a', 'Ryan', '100.00', '50.00', '30.00', '1.00', '500.00', 'Marc', 'Title', NULL, 'Vernord', 'Dr Lai', '200.00', '-', '-', '-', '-'),
('b363c6cbd534eb6', 'r263c6cbd5320a6', 'Vernord Musrn', '500.00', '400.00', '300.00', '1.00', '2.00', 'HEP UMS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b363ce795b1fc19', 'r363ce795b1d030', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b463ce7962cda29', 'r463ce7962cabcd', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b563ce796e6673e', 'r563ce796e66322', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b663ce799a1619b', 'r163ce799a15e6d', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b763ce7b784f683', 'r263ce7b7849b42', '', '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('b863ce80d23714c', 'r163ce80d236e06', 'Si Marc', '500.00', '440.00', '300.00', '200.00', '400.00', 'Si Edly', 'Tajuk Aktiviti', NULL, 'Pengarah Kita', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum e', '200.00', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum e', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum e', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum e', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum e'),
('b963cfadb834b25', 'r263cfadb82a598', '', '0.00', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', '4000.00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` varchar(100) NOT NULL,
  `participants_id` varchar(100) NOT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `report_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `participants_id`, `file_name`, `report_id`) VALUES
('63d11fd51580e', '', NULL, NULL),
('63d11fd51a961', '', NULL, NULL),
('63d11fd51a956', '', NULL, NULL),
('63d11fd51badd', '', NULL, NULL),
('63d11fd51cbed', '', NULL, NULL),
('Test SaveTest Save63d11fd524b8d', '', 'Test Save', '\"r163ce80d236e06\"'),
('OkayyOkayy63d120f4ad221', '', 'Okayy', 'r163ce80d236e06'),
('OkayyOkayy63d120f4ad9e7', '', 'Okayy', 'r163ce80d236e06'),
('OkayyOkayy63d120f4ae8d5', '', 'Okayy', 'r163ce80d236e06'),
('OkayyOkayy63d120f4aeb87', '', 'Okayy', 'r163ce80d236e06'),
('OkayyOkayy63d120f4aebbf', '', 'Okayy', 'r163ce80d236e06'),
('YeahBoiYeahBoi63d1212799213', '', 'YeahBoi', 'r163ce80d236e06'),
('yeahhyeahh63d1218edff39', '', 'yeahh', 'r163ce80d236e06'),
('MarcMarc63d7492dd6983', '', 'Marc', 'r563d7454f13683'),
('ffffffff63d749564d0a9', '', 'ffff', 'r563d7454f13683'),
('ffffffff63d749564d60b', '', 'ffff', 'r563d7454f13683'),
('aaaaaaaa63d7498408d71', '', 'aaaa', 'r563d7454f13683'),
('Test DownloadTest Download63e56527b06c8', '', 'Test Download', 'r163ce80d236e06'),
('Test lagiTest lagi63e5654b6f30c', '', 'Test lagi', 'r163ce80d236e06'),
('TestttttTesttttt63e565bf1fca9', '', 'Testtttt', 'r163ce80d236e06'),
('sdasdasdsasdasdasdsa63e5660d281f7', '', 'sdasdasdsa', 'r163ce80d236e06'),
('sdasdsdasd63e5664cd27c1', '', 'sdasd', 'r163ce80d236e06'),
('asdfasdf63e5668bcbc0e', '', 'asdf', 'r163ce80d236e06'),
('qqqqqqqqqq63e566b4afb78', '', 'qqqqq', 'r163ce80d236e06'),
('qqqqqqqqqq63e566b4afecb', '', 'qqqqq', 'r163ce80d236e06'),
('downloadinggdownloadingg63e566f2a969e', '', 'downloadingg', 'r163ce80d236e06'),
('yaaaayaaaa63e5673a46d10', '', 'yaaaa', 'r163ce80d236e06'),
('asdqwerasdqwer63e5679acda58', '', 'asdqwer', 'r163ce80d236e06'),
('qwezxcqwezxc63e567eb686bd', '', 'qwezxc', 'r163ce80d236e06'),
('try downloadtry download63e568314ae51', '', 'try download', 'r163ce80d236e06'),
('try downloadtry download63e568314b006', '', 'try download', 'r163ce80d236e06'),
('tolonggtolongg63e568887c973', '', 'tolongg', 'r163ce80d236e06'),
('qwerqwer63e5693812428', '', 'qwer', 'r163ce80d236e06'),
('qwerdqwerd63e56993f2141', '', 'qwerd', 'r163ce80d236e06'),
('Test E-certTest E-cert63e5ac180a242', '', 'Test E-cert', 'r163ce80d236e06'),
('ExampleExample63e5af6e1b8d7', '', 'Example', 'r663e5ad7c5f7a9'),
('Video PresentationVideo Presentation63ef7b9ab6444', '', 'Video Presentation', 'r663ef79db54f3a');

-- --------------------------------------------------------

--
-- Table structure for table `cert_template`
--

CREATE TABLE `cert_template` (
  `cert_id` varchar(100) NOT NULL,
  `cert_dir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `email_id` varchar(1000) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`email_id`, `lecturer_id`, `name`, `password`, `role`) VALUES
('bi19110110@student.ums.edu.my', 0, 'Example Exapmle', '$2y$10$Yw4F5N2rx5I0f/yhgpH6L.cg3APgQT/xOo6vVvXKqmxL2aMjB7qRK', 'lecturer'),
('vvv@gmail.com', 4, 'MR DEKAN', '$2y$10$SRA0018JLti.Djyp.ajlBuVUMgBCdAY/UldpjyOJ8Fme/YFXWNYiK', 'DEKAN'),
('bernordmusran27@gmail.com', 5, 'MR TDA', '$2y$10$oSzC9hN9xtzJq9fCaQSiOe.GCvvyGTk5Wvo13qWylF4Kb8Uqq7.tC', 'TDA');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `matric_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `participants_id` int(11) NOT NULL,
  `report_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`matric_no`, `name`, `participants_id`, `report_id`) VALUES
('BI19110027', 'Edly Ryan Malexius', 6, '\"r163afbfd496147\"'),
('bi191100115', 'MOHD YUSRIM BIN KARIM', 7, '\"r163b1a0727e296\"'),
('Biyyyyyyyy', 'John', 8, '\"r163b1a0727e296\"'),
('Bixxxxxxxx', 'Johnny', 9, '\"r163b1a0727e296\"'),
('BI19110027', 'Vernord Musran', 10, '\"r163b1a0727e296\"'),
('BI19110118', 'Chris Hansen Jualin', 11, '\"r163b1a0727e296\"'),
('BI19110118', 'Chris Hansen Jualin', 12, '\"r463b988b705ae5\"'),
('Bixxxxxxxx', 'Johnny', 13, '\"r463b988b705ae5\"'),
('BI19110027', 'Vernord Musran', 14, '\"r463b988b705ae5\"'),
('bi191100115', 'MOHD YUSRIM BIN KARIM', 15, '\"r463b988b705ae5\"'),
('Biyyyyyyyy', 'John', 16, '\"r463b988b705ae5\"'),
('BI19110285', 'Ryidzman Robin', 17, '\"r463b988b705ae5\"'),
('BI19110110', 'Vernord Musran', 23, '\"r163ce80d236e06\"'),
('BI12341234', 'Ronaldo', 24, 'r163ce80d236e06'),
('BI19110118', 'Chris Hansen Jualin', 26, '\"r163ce80d236e06\"'),
('Bixxxxxxxx', 'Johnny', 27, '\"r163ce80d236e06\"'),
('bi191100115', 'MOHD YUSRIM BIN KARIM', 28, '\"r163ce80d236e06\"'),
('Biyyyyyyyy', 'John', 29, '\"r163ce80d236e06\"'),
('BI19110110', 'Vernord Musran', 30, '\"r563d7454f13683\"'),
('BI19110027', 'Vernord Musran', 31, '\"r563d7454f13683\"'),
('BI19110118', 'Chris Hansen Jualin', 32, '\"r563d7454f13683\"'),
('bi191100115', 'MOHD YUSRIM BIN KARIM', 33, '\"r563d7454f13683\"'),
('BI19110027', 'Vernord Musran', 36, '\"r663e5ad7c5f7a9\"'),
('Biyyyyyyyy', 'John', 37, '\"r663e5ad7c5f7a9\"'),
('BI19110118', 'Chris Hansen Jualin', 38, '\"r663e5ad7c5f7a9\"'),
('Bixxxxxxxx', 'Johnny', 39, '\"r663e5ad7c5f7a9\"'),
('bi191100115', 'MOHD YUSRIM BIN KARIM', 40, '\"r663e5ad7c5f7a9\"'),
('BI00012321', 'Guru', 41, '\"r663e5ad7c5f7a9\"'),
('BI19123098', 'John Johnson', 42, '\"r763ef7672b4ff6\"'),
('BI19110118', 'Chris Hansen Jualin', 43, '\"r763ef7672b4ff6\"'),
('bi191100115', 'MOHD YUSRIM BIN KARIM', 44, '\"r763ef7672b4ff6\"'),
('Bixxxxxxxx', 'Johnny', 45, '\"r763ef7672b4ff6\"'),
('BI19110027', 'Vernord Musran', 46, '\"r763ef7672b4ff6\"'),
('Biyyyyyyyy', 'John', 47, '\"r763ef7672b4ff6\"'),
('BI1234565', 'Musran Vernord', 48, '\"r663ef79db54f3a\"'),
('BI19110118', 'Chris Hansen Jualin', 49, '\"r663ef79db54f3a\"'),
('BI19110027', 'Vernord Musran', 50, '\"r663ef79db54f3a\"'),
('bi191100115', 'MOHD YUSRIM BIN KARIM', 51, '\"r663ef79db54f3a\"'),
('Bixxxxxxxx', 'Johnny', 52, '\"r663ef79db54f3a\"');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `username` varchar(100) DEFAULT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `course_id` varchar(100) DEFAULT NULL,
  `user_role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `activity_id` varchar(50) NOT NULL,
  `cadangan` mediumtext NOT NULL,
  `budget_id` varchar(10) NOT NULL,
  `impak_program` mediumtext NOT NULL,
  `introduction` mediumtext NOT NULL,
  `involvement` mediumtext NOT NULL,
  `jemputan_vip` mediumtext NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `objective` text NOT NULL,
  `organizer` varchar(100) NOT NULL,
  `pencapaian` mediumtext NOT NULL,
  `perkara_hendak_maklum` mediumtext NOT NULL,
  `report_id` varchar(50) NOT NULL,
  `rumusan` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `comment` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`activity_id`, `cadangan`, `budget_id`, `impak_program`, `introduction`, `involvement`, `jemputan_vip`, `lecturer_id`, `objective`, `organizer`, `pencapaian`, `perkara_hendak_maklum`, `report_id`, `rumusan`, `status`, `title`, `user_id`, `comment`) VALUES
('a163ce80c300976', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?', 'Vernord', 0, 'Objektif Laporan', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?', 'r163ce80d236e06', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis et in aliquam harum cumque ipsum est quaerat dolor vitae esse beatae, tempore quasi eius enim, itaque, nam quas voluptas? Odio?', 2, 'Is the moon a reflection of the sun?', 'Test1', 'No comment'),
('a263cf78ba8bed2', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ipsum debitis veniam voluptatem tempore cumque similique? Nostrum deserunt deleniti vel quibusdam in facere quam magnam numquam ducimus autem. Sunt, alias.', '', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ipsum debitis veniam voluptatem tempore cumque similique? Nostrum deserunt deleniti vel quibusdam in facere quam magnam numquam ducimus autem. Sunt, alias.', 'Pendahuluan', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ipsum debitis veniam voluptatem tempore cumque similique? Nostrum deserunt deleniti vel quibusdam in facere quam magnam numquam ducimus autem. Sunt, alias.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ipsum debitis veniam voluptatem tempore cumque similique? Nostrum deserunt deleniti vel quibusdam in facere quam magnam numquam ducimus autem. Sunt, alias.', 0, 'Objektif 2', '', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ipsum debitis veniam voluptatem tempore cumque similique? Nostrum deserunt deleniti vel quibusdam in facere quam magnam numquam ducimus autem. Sunt, alias.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ipsum debitis veniam voluptatem tempore cumque similique? Nostrum deserunt deleniti vel quibusdam in facere quam magnam numquam ducimus autem. Sunt, alias.', 'r263cfadb82a598', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure ipsum debitis veniam voluptatem tempore cumque similique? Nostrum deserunt deleniti vel quibusdam in facere quam magnam numquam ducimus autem. Sunt, alias.', 0, 'Cuba Tukar Lagi', 'BI12000000', NULL),
('a363d2858c44df9', '', '', '', '', '', '', 0, '', '', '', '', 'r363d634aa26980', '', 0, '', 'bi19110110', NULL),
('a763d745290d873', 'Cadangan', '', 'Impakk', 'Pendahuluan', 'Marc', 'Edly', 0, '1. Objektif 1', '', 'Pencapaian', 'Marc orang kaya', 'r563d7454f13683', 'Rumusan', 4, 'Drikking Water', 'bi19110110', 'Cannot be submitted yet.'),
('a963ef7984592a2', 'Cadangan', '', 'Impak', 'Introduction', 'Involvement', 'Jemputan Jemputan Mr Marc', 0, 'Objective', '', 'Pencapain', 'Perkara', 'r663ef79db54f3a', 'Rumusan', 3, 'Title', 'Test1', 'The Report is not complete'),
('a963e3be812ab26', '', '', '', '', '', '', 0, '', '', '', '', 'r763e3c51f23d14', '', 0, '', 'bi19110110', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thecandidate`
--

CREATE TABLE `thecandidate` (
  `id` int(100) NOT NULL,
  `vote_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `candidate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thecandidate`
--

INSERT INTO `thecandidate` (`id`, `vote_id`, `user_id`, `candidate`) VALUES
(13, 'voting63db9d4573e5a', 'BI10100100', 'PRESIDENT'),
(14, 'voting63db9d4573e5a', 'BI1234122', 'PRESIDENT'),
(15, 'voting63db9d4573e5a', 'Test5', 'SETIAUSAHA'),
(16, 'voting63db9d4573e5a', 'Test1', 'BENDAHARI'),
(17, 'voting63db9d4573e5a', 'Test2', 'BENDAHARI'),
(18, 'voting63dbc873acb74', 'BI12000000', 'PRESIDENT'),
(20, 'voting63dbc873acb74', 'Test6', 'BENDAHARI'),
(26, 'voting63e4e11a988ef', 'BI1234122', 'PRESIDENT'),
(27, 'voting63e5ab4481cc6', 'BI19110069', 'PRESIDENT'),
(28, 'voting63e5ab4481cc6', 'BI19110118', 'PRESIDENT'),
(29, 'voting63e4e0c743341', 'BI12000000', 'PRESIDENT'),
(30, 'voting63e4e0c743341', 'Test3', 'PRESIDENT'),
(31, 'voting63ef7f35eefa7', 'BI19123012', 'PRESIDENT'),
(32, 'voting63ef7f35eefa7', 'Test6', 'PRESIDENT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `course_id` varchar(10) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profilepic` varchar(1000) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `cawangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`course_id`, `email_id`, `password`, `profilepic`, `username`, `user_id`, `user_role`, `cawangan`) VALUES
('UH6481001 ', 'bernordmusran27@gmail.com', '$2y$10$//yHTBp37unG1Xl8hppC..GghABdwqhqhQqNniQ4ahCGO/xhNztIS', '', 'Bernardo Silva', 'BI10100100', 'student', 'KK'),
('UH6481003 ', 'bernordmusran@gmail.com', '$2y$10$5aAUecoyRM4nb4owQKvyseiwuRBcVlpdkSyND4FI81qPB5g1OIg1S', 'BI12000000prof_pic.jpeg', 'Vernord Musran', 'BI12000000', 'student', 'Labuan'),
('UH6481001 ', 'masonmount@gmail.com', '$2y$10$QGczoiK.akCFbyJhTGIjvOQsJOXoImyLYo8MKNIystHYPkdtQ4bTa', '', 'Mason Mount', 'BI1230987', 'student', 'KK'),
('HC14', 'harul@gmail.com', '$2y$10$5HqEyhaHrY6bSiyIHJ7COu3Q4dIVrky2CdNkg/8HIdLDyxPIKQm2q', '', 'Harul', 'BI1234122', 'student', 'KK'),
('UH6481002 ', 'new@gmail.com', '$2y$10$.YBsWEQD1oiCqAcMhQEIae0ITkqpWcUjJ7Jnxf5FWqmhRNPSKPy.W', 'bi123456700prof_pic.jpeg', 'New User', 'bi123456700', 'student', 'KK'),
('UH6481001 ', 'josh@gmail.com', '$2y$10$6bG5h52aP0.6muzNWymSZesQvHwT67YLhyUlJKqB8tjv4Wl5.atWe', '', 'Josh Josh', 'bi1909438', 'student', 'KK'),
('UH6481001 ', 'zhariffraw@gmail.com', '$2y$10$SzY2xbZBoRAilnId0IWKGuUgV6y6jPliLsEyswvppCqeKxJpmB8eC', '', 'ZHARIFF BIN OMARHATTA', 'BI19110069', 'student', 'KK'),
('UH6481001 ', 'vernordmusran27@gmail.com', '$2y$10$1UtOmlGGNRzQUyM98ie51eBS.lA54MuR1FoINp6CufD/Yi8wPcWeq', 'bi19110110prof_pic.png', 'Vernord Musran', 'bi19110110', 'student', 'KK'),
('UH6481001 ', 'bi19110118@student.ums.edu.my', '$2y$10$09pRZa8UgAAYNUyX8QsarORDKwKstQrFp90FSYHB8pvbag3eIZqe.', '', 'Chris Hansen Jualin', 'BI19110118', 'student', 'KK'),
('UH6481001 ', 'vharon@email.com', '$2y$10$0b2157iPQyxUQ0hfukl1XOSCiCO320t/EGH099Gk.w1jQ/y7CLZD6', 'BI19110121prof_pic.png', 'Vharon Putih', 'BI19110121', 'student', 'KK'),
('UH6481002 ', 'josh@test.com', '$2y$10$bFI2lmavvnwawI9qESuc6elrYHbVpPh48RFyx6LCt821YlbIiDrY6', '', 'Joshua Foer', 'BI19123012', 'student', 'KK'),
('UH6481001 ', 'smithjames@test.com', '$2y$10$OmruOs3tW4ghF9G0TYspVeTSNX01taLll9a2iNWffKFUDL6aHQOBW', 'Test1prof_pic.png', 'Smith James', 'Test1', 'PMFKIKK', 'KK'),
('UH6481002 ', 'johnsonjon@test.com', '$2y$10$eBv7ABblBppW1B1y6zFHg.wKMiYDnav9wP8pZh5AopBGRH/E7Y132', '', 'Johnson John', 'Test2', 'student', 'KK'),
('UH6481003 ', 'williamsrobert@test.com', '$2y$10$Wl7YfeANwSatsslghGjOr.dJqHtJIU8MV7uqSbjmnMzW22KkU8O/i', '', 'Williams Robert', 'Test3', 'student', 'Labuan'),
('UH6481004 ', 'brownmichael@test.com', '$2y$10$6q4tHMiX7qeAYfQEGWMVKe7YPX4dUXyPPS2nNb.ymxvu5CJzCZkYC', 'Test5prof_pic.png', 'Brown Michael', 'Test5', 'PMFKIKAL', 'Labuan'),
('HC14', 'joneswilliam@test.com', '$2y$10$Q6ozMXmfSraJF9DmErozzO5rWxqnAd6gmvqR5mC056xxy6uj4TvGO', '', 'Jones William', 'Test6', 'student', 'KK');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `vote_id` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `candidate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`vote_id`, `id`, `name`, `user_id`, `candidate`) VALUES
('voting63dbc873acb74', 107, '', 'BI12000000', 'PRESIDENT'),
('voting63dbc873acb74', 108, '', 'Test6', 'BENDAHARI'),
('voting63db9d4573e5a', 109, '', 'BI10100100', 'PRESIDENT'),
('voting63db9d4573e5a', 110, '', 'Test5', 'SETIAUSAHA'),
('voting63db9d4573e5a', 111, '', 'Test2', 'BENDAHARI'),
('voting63db9d4573e5a', 112, '', 'Test5', 'SETIAUSAHA'),
('voting63db9d4573e5a', 113, '', 'Test2', 'BENDAHARI'),
('voting63db9d4573e5a', 114, '', 'BI10100100', 'PRESIDENT'),
('voting63e4e11a988ef', 115, '', 'BI1234122', 'PRESIDENT'),
('voting63e5ab4481cc6', 116, '', 'BI19110069', 'PRESIDENT'),
('voting63ef7f35eefa7', 117, '', 'BI19123012', 'PRESIDENT');

-- --------------------------------------------------------

--
-- Table structure for table `vote_check`
--

CREATE TABLE `vote_check` (
  `vote_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vote_check`
--

INSERT INTO `vote_check` (`vote_id`, `user_id`, `id`) VALUES
('voting63dbc873acb74', 'bi19110110', 24),
('voting63db9d4573e5a', 'bi19110110', 25),
('voting63db9d4573e5a', 'Test1', 26),
('voting63e4e11a988ef', 'bi19110110', 27),
('voting63e5ab4481cc6', 'Test1', 28),
('voting63ef7f35eefa7', 'bi19110110', 29);

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `vote_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `cawangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`vote_id`, `title`, `date`, `cawangan`) VALUES
('voting63db9d4573e5a', 'AJK AKTIVITI BARU', '2023-02-24', 'KK'),
('voting63e4e0c743341', 'NEW VOTE ACTIVITY', '2023-02-17', 'Labuan'),
('voting63e4e11a988ef', 'UBAH TAJUK', '2023-02-11', 'KK'),
('voting63e5ab4481cc6', 'TITLE', '2023-02-10', 'KK'),
('voting63ef7f35eefa7', 'NEW PMFKI PRESIDENT', '2023-02-17', 'KK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admin_pmfki`
--
ALTER TABLE `admin_pmfki`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budget_id`);

--
-- Indexes for table `cert_template`
--
ALTER TABLE `cert_template`
  ADD PRIMARY KEY (`cert_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participants_id`),
  ADD KEY `report_id` (`report_id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activity_id` (`activity_id`,`budget_id`,`lecturer_id`);

--
-- Indexes for table `thecandidate`
--
ALTER TABLE `thecandidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_check`
--
ALTER TABLE `vote_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`vote_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lecturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participants_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `thecandidate`
--
ALTER TABLE `thecandidate`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `vote_check`
--
ALTER TABLE `vote_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
