-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 10:13 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `รหัส_Admin` varchar(50) NOT NULL,
  `Username_Admin` varchar(50) NOT NULL,
  `Password_Admin` varchar(50) NOT NULL,
  `ชื่อ_สกุล_Admin` varchar(50) NOT NULL,
  `เบอร์โทร_Admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`รหัส_Admin`, `Username_Admin`, `Password_Admin`, `ชื่อ_สกุล_Admin`, `เบอร์โทร_Admin`) VALUES
('AM001', 'Premkamon', 'jinglebell', 'เปรมกมล ขาวสว่าง', '0811422578'),
('AM002', 'Peerapat', 'nicepeerapat', 'พีรภัทร เทียนสวัสดิ์', '0827896523'),
('AM003', 'Onpreeya', 'bubblepp', 'อรปรียา พึ่งชู', '0837417485'),
('AM004', 'Thanakit', 'armza55', 'ธนกฤต เจริญกิจ', '0846635296');

-- --------------------------------------------------------

--
-- Table structure for table `cd_dvd`
--

CREATE TABLE `cd_dvd` (
  `รหัส_CD_DVD` varchar(50) NOT NULL,
  `ชื่อ_CD_DVD` varchar(50) NOT NULL,
  `ราคา_CD_DVD` int(11) NOT NULL,
  `จำนวน_CD_DVD` int(11) NOT NULL,
  `รหัสประเภท_CD_DVD` varchar(50) NOT NULL,
  `วันที่นำเข้า` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cd_dvd`
--

INSERT INTO `cd_dvd` (`รหัส_CD_DVD`, `ชื่อ_CD_DVD`, `ราคา_CD_DVD`, `จำนวน_CD_DVD`, `รหัสประเภท_CD_DVD`, `วันที่นำเข้า`) VALUES
('CR001', 'chowder', 200, 100, 'CARTOON', '2565-10-20'),
('CR002', 'barbie', 200, 100, 'CARTOON', '2565-10-20'),
('CR003', 'เบนเท็น', 200, 100, 'CARTOON', '2565-10-20'),
('CR004', 'doctor stone', 200, 100, 'CARTOON', '2565-10-20'),
('CR005', 'one punch man', 200, 100, 'CARTOON', '2565-10-20'),
('CR006', 'pink panther', 200, 100, 'CARTOON', '2565-10-20'),
('CR007', 'prince of tennis', 200, 100, 'CARTOON', '2565-10-20'),
('CR008', 'กินทามะ', 200, 100, 'CARTOON', '2565-10-20'),
('CR009', 'โคนัน', 200, 100, 'CARTOON', '2565-10-20'),
('CR010', 'ชินจัง', 200, 100, 'CARTOON', '2565-10-20'),
('CR011', 'โดเรม่อน', 200, 100, 'CARTOON', '2565-10-20'),
('CR012', 'นารูโตะ', 200, 100, 'CARTOON', '2565-10-20'),
('CR013', 'แฟรี่เทล', 200, 100, 'CARTOON', '2565-10-20'),
('CR014', 'รีบอน', 200, 100, 'CARTOON', '2565-10-20'),
('CR015', 'วินนี่เดอะพูห์', 200, 100, 'CARTOON', '2565-10-20'),
('DM001', 'คาถามงคลจักรวาล 8 ทิศ', 200, 100, 'DHARMA', '2565-10-20'),
('DM002', 'คุ่มือมนุษย์', 200, 100, 'DHARMA', '2565-10-20'),
('DM003', 'จิตคือข้าวสาร อวิชชาคือข้าวเปลือก', 200, 100, 'DHARMA', '2565-10-20'),
('DM004', 'ด้วยแรงอธิษฐาน', 200, 100, 'DHARMA', '2565-10-20'),
('DM005', 'ทางลัดสู่สันติสุข', 200, 100, 'DHARMA', '2565-10-20'),
('DM006', 'ธรรมะน้ำเย็น', 200, 100, 'DHARMA', '2565-10-20'),
('DM007', 'ธัมมจักกัปปวัตตนสูตร', 200, 100, 'DHARMA', '2565-10-20'),
('DM008', 'แนวทางและวิธีการปฏิบัติธรรมที่ถูกต้อง', 200, 100, 'DHARMA', '2565-10-20'),
('DM009', 'พระพุทธเจ้ามีดีอย่างไร', 200, 100, 'DHARMA', '2565-10-20'),
('DM010', 'เพลงคาถาชินบัญชร', 200, 100, 'DHARMA', '2565-10-20'),
('DM011', 'ศึกษาธรรม ปฏิบัติธรรม 5', 200, 100, 'DHARMA', '2565-10-20'),
('DM012', 'ศึกษาธรรม ปฏิบัติธรรม4', 200, 100, 'DHARMA', '2565-10-20'),
('DM013', 'สุดยอดพระคาถา', 200, 100, 'DHARMA', '2565-10-20'),
('DM014', 'หลวงปู่มั่น', 200, 100, 'DHARMA', '2565-10-20'),
('DM015', 'หลวงพ่อปราโมทย์', 200, 100, 'DHARMA', '2565-10-20'),
('GE001', 'battle filed', 600, 100, 'GAMES', '2565-10-20'),
('GE002', 'call of duty', 600, 100, 'GAMES', '2565-11-18'),
('GE003', 'dragonball z', 600, 100, 'GAMES', '2565-10-20'),
('GE004', 'fifa', 600, 100, 'GAMES', '2565-10-20'),
('GE005', 'final fantasy', 600, 100, 'GAMES', '2565-10-20'),
('GE006', 'ghost', 600, 100, 'GAMES', '2565-10-20'),
('GE007', 'God of War', 600, 100, 'GAMES', '2565-11-18'),
('GE008', 'GTA', 600, 100, 'GAMES', '2565-10-20'),
('GE009', 'horizon', 600, 100, 'GAMES', '2565-10-20'),
('GE010', 'jump force', 600, 100, 'GAMES', '2565-10-20'),
('GE011', 'mario', 600, 100, 'GAMES', '2565-10-20'),
('GE012', 'pokemon legends', 600, 100, 'GAMES', '2565-10-20'),
('GE013', 'spiderman', 600, 100, 'GAMES', '2565-10-20'),
('GE014', 'the sim', 600, 100, 'GAMES', '2565-10-20'),
('GE015', 'yu gi oh', 600, 100, 'GAMES', '2565-10-20'),
('MC001', '17นาที', 400, 100, 'MUSIC', '2565-10-20'),
('MC002', 'all of me', 400, 100, 'MUSIC', '2565-10-20'),
('MC003', 'case143', 400, 100, 'MUSIC', '2565-10-20'),
('MC004', 'ddu du ddu du', 400, 100, 'MUSIC', '2565-10-20'),
('MC005', 'enchanted', 400, 100, 'MUSIC', '2565-10-20'),
('MC006', 'thunerous', 400, 100, 'MUSIC', '2565-10-20'),
('MC007', 'yummy', 400, 100, 'MUSIC', '2565-10-20'),
('MC008', 'คาเฟอีน', 400, 100, 'MUSIC', '2565-10-20'),
('MC009', 'ใจสั่งมา', 400, 100, 'MUSIC', '2565-10-20'),
('MC010', 'ช่อดอกไม้', 400, 100, 'MUSIC', '2565-10-20'),
('MC011', 'ฝนตกไหม', 400, 100, 'MUSIC', '2565-10-20'),
('MC012', 'แฟนเก็บ', 400, 100, 'MUSIC', '2565-10-20'),
('MC013', 'ยาใจคนจน', 400, 100, 'MUSIC', '2565-10-20'),
('MC014', 'วนิพก', 400, 100, 'MUSIC', '2565-10-20'),
('MC015', 'เสมอ', 400, 100, 'MUSIC', '2565-10-20'),
('MV001', '365DAYS', 400, 100, 'MOVIE', '2565-10-20'),
('MV002', 'กวนมึนโฮ', 400, 100, 'MOVIE', '2565-10-20'),
('MV003', 'จอห์นวิค', 400, 100, 'MOVIE', '2565-10-20'),
('MV004', 'เชอร์ล็อกโฮมส์', 400, 100, 'MOVIE', '2565-10-20'),
('MV005', 'ไททานิค', 400, 100, 'MOVIE', '2565-10-20'),
('MV006', 'นเรศวร', 400, 100, 'MOVIE', '2565-10-20'),
('MV007', 'ไบค์แมน', 400, 100, 'MOVIE', '2565-10-20'),
('MV008', 'ฟรีแลนซ์..ห้ามป่วย ห้ามพัก ห้ามรักหมอ', 400, 100, 'MOVIE', '2565-10-20'),
('MV009', 'แฟนเดย์', 400, 100, 'MOVIE', '2565-10-20'),
('MV010', 'รถไฟฟ้ามาหานะเธอ', 400, 100, 'MOVIE', '2565-10-20'),
('MV011', 'แสงกระสือ', 400, 100, 'MOVIE', '2565-10-20'),
('MV012', 'หลวงพี่แจ๊ส5G', 400, 100, 'MOVIE', '2565-10-20'),
('MV013', 'อิท', 400, 100, 'MOVIE', '2565-10-20'),
('MV014', 'แอนนาเบล', 400, 100, 'MOVIE', '2565-11-18'),
('MV015', 'ฮาวทูทิ้ง...ทิ้งอย่างไรไม่ให้เหลือเธอ', 400, 100, 'MOVIE', '2565-10-20');

-- --------------------------------------------------------

--
-- Table structure for table `การจัดส่ง`
--

CREATE TABLE `การจัดส่ง` (
  `รหัส_การจัดส่ง` varchar(50) NOT NULL,
  `สถานะการจัดส่ง` varchar(50) NOT NULL,
  `เวลาในการบันทึกสถานะ` datetime NOT NULL,
  `รหัส_สมาชิก` int(11) NOT NULL,
  `รหัส_Admin` varchar(50) NOT NULL,
  `วันที่สินค้าจะถึง` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `การจัดส่ง`
--

INSERT INTO `การจัดส่ง` (`รหัส_การจัดส่ง`, `สถานะการจัดส่ง`, `เวลาในการบันทึกสถานะ`, `รหัส_สมาชิก`, `รหัส_Admin`, `วันที่สินค้าจะถึง`) VALUES
('ST1234567890', 'received', '2565-08-15 09:00:00', 1, 'AM001', '17-08-2565'),
('ST2345678901', 'received', '2565-09-15 09:00:00', 2, 'AM002', '17-09-2565'),
('ST3456789012', 'received', '2565-10-15 09:00:00', 3, 'AM003', '17-10-2565'),
('ST4567890123', 'received', '2565-11-15 09:00:00', 4, 'AM004', '17-11-2565'),
('ST5678901234', 'received', '2565-11-15 09:00:00', 5, 'AM001', '17-11-2565');

-- --------------------------------------------------------

--
-- Table structure for table `การเช่า`
--

CREATE TABLE `การเช่า` (
  `รหัส_CD_DVD` varchar(50) NOT NULL,
  `เลขที่ใบเสร็จ` varchar(50) NOT NULL,
  `รหัส_สมาชิก` int(11) NOT NULL,
  `รหัส_Admin` varchar(50) NOT NULL,
  `จำนวนที่เช่า` int(11) NOT NULL,
  `วันเวลาที่เช่า` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `การเช่า`
--

INSERT INTO `การเช่า` (`รหัส_CD_DVD`, `เลขที่ใบเสร็จ`, `รหัส_สมาชิก`, `รหัส_Admin`, `จำนวนที่เช่า`, `วันเวลาที่เช่า`) VALUES
('CR001', '173785070', 1, 'AM001', 1, '2565-08-15 09:00:00'),
('DM001', '173785070', 1, 'AM001', 1, '2565-08-15 09:00:00'),
('GE001', '173785070', 1, 'AM001', 1, '2565-08-15 09:00:00'),
('MC001', '173785070', 1, 'AM001', 1, '2565-08-15 09:00:00'),
('MV001', '173785070', 1, 'AM001', 1, '2565-08-15 09:00:00'),
('GE002', '240908171', 2, 'AM002', 1, '2565-09-15 09:00:00'),
('CR003', '330526956', 3, 'AM003', 1, '2565-10-15 09:00:00'),
('DM003', '330526956', 3, 'AM003', 1, '2565-10-15 09:00:00'),
('CR004', '492907465', 4, 'AM004', 1, '2565-11-15 09:00:00'),
('CR005', '492907465', 4, 'AM004', 1, '2565-11-15 09:00:00'),
('DM004', '492907465', 4, 'AM004', 1, '2565-11-15 09:00:00'),
('CR005', '566593875', 5, 'AM001', 1, '2565-11-15 09:00:00'),
('DM005', '566593875', 5, 'AM001', 1, '2565-11-15 09:00:00'),
('MC005', '566593875', 5, 'AM001', 1, '2565-11-15 09:00:00'),
('MV005', '566593875', 5, 'AM001', 1, '2565-11-15 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ประเภท_cd_dvd`
--

CREATE TABLE `ประเภท_cd_dvd` (
  `รหัสประเภท_CD_DVD` varchar(50) NOT NULL,
  `ชื่อประเภท_CD_DVD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ประเภท_cd_dvd`
--

INSERT INTO `ประเภท_cd_dvd` (`รหัสประเภท_CD_DVD`, `ชื่อประเภท_CD_DVD`) VALUES
('CARTOON', 'การ์ตูน'),
('DHARMA', 'ธรรมะ'),
('GAMES', 'เกมส์'),
('MOVIE', 'ภาพยนตร์'),
('MUSIC', 'เพลง');

-- --------------------------------------------------------

--
-- Table structure for table `สมาชิก`
--

CREATE TABLE `สมาชิก` (
  `รหัส_สมาชิก` int(11) NOT NULL,
  `Username_สมาชิก` varchar(50) NOT NULL,
  `Password_สมาชิก` varchar(50) NOT NULL,
  `ชื่อ_สกุล_สมาชิก` varchar(50) NOT NULL,
  `ที่อยู่_สมาชิก` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `เบอร์โทร_สมาชิก` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `สมาชิก`
--

INSERT INTO `สมาชิก` (`รหัส_สมาชิก`, `Username_สมาชิก`, `Password_สมาชิก`, `ชื่อ_สกุล_สมาชิก`, `ที่อยู่_สมาชิก`, `email`, `เบอร์โทร_สมาชิก`) VALUES
(1, 'somsak', 'somsakeiei', 'สมศักดิ์ รักสนุก', '74/96 พิมลราช บางบัวทอง นนทบุรี 11110', 'somsak@gmail.com', '0854789658'),
(2, 'baramee', 'barameeeiei', 'บารมี สีสรร', '85/100 ตลาดขวัญ เมืองนนทบุรี นนทบุรี 11000', 'baramee@gmail.com', '0867417415'),
(3, 'metasit', 'metasiteiei', 'เมธาสิทธิ์ คิดการใหญ่', '96/302 บ้านใหม่ เมืองนครราชสีมา นครราชสีมา 30000', 'metasit@gmail.com', '0874569635'),
(4, 'sompong', 'sompongeiei', 'สมปอง สองใจ', '100/789 ปากเพรียว เมืองสระบุรี สระบุรี 18000', 'sompong@gmail.com', '0889674585'),
(5, 'somsri', 'somsrieiei', 'สมศรี มีสุข', '208/85 โสนลอย บางบัวทอง นนทบุรี 11110', 'somsri@gmail.com', '0899968571');

-- --------------------------------------------------------

--
-- Table structure for table `ใบเสร็จ`
--

CREATE TABLE `ใบเสร็จ` (
  `เลขที่ใบเสร็จ` varchar(50) NOT NULL,
  `ยอดชำระทั้งหมด` int(11) NOT NULL,
  `จำนวนที่ซื้อ` int(11) NOT NULL,
  `รหัส_สมาชิก` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ใบเสร็จ`
--

INSERT INTO `ใบเสร็จ` (`เลขที่ใบเสร็จ`, `ยอดชำระทั้งหมด`, `จำนวนที่ซื้อ`, `รหัส_สมาชิก`) VALUES
('173785070', 1800, 5, 1),
('240908171', 600, 1, 2),
('330526956', 400, 2, 3),
('492907465', 600, 3, 4),
('566593875', 1200, 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`รหัส_Admin`);

--
-- Indexes for table `cd_dvd`
--
ALTER TABLE `cd_dvd`
  ADD PRIMARY KEY (`รหัส_CD_DVD`);

--
-- Indexes for table `การจัดส่ง`
--
ALTER TABLE `การจัดส่ง`
  ADD PRIMARY KEY (`รหัส_การจัดส่ง`);

--
-- Indexes for table `ประเภท_cd_dvd`
--
ALTER TABLE `ประเภท_cd_dvd`
  ADD PRIMARY KEY (`รหัสประเภท_CD_DVD`);

--
-- Indexes for table `สมาชิก`
--
ALTER TABLE `สมาชิก`
  ADD PRIMARY KEY (`รหัส_สมาชิก`);

--
-- Indexes for table `ใบเสร็จ`
--
ALTER TABLE `ใบเสร็จ`
  ADD PRIMARY KEY (`เลขที่ใบเสร็จ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `สมาชิก`
--
ALTER TABLE `สมาชิก`
  MODIFY `รหัส_สมาชิก` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
