-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 02:21 PM
-- Server version: 8.0.32
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int NOT NULL,
  `course_id` int NOT NULL,
  `student_id` int NOT NULL,
  `certificate_name` varchar(30) NOT NULL,
  `certificate_description` text NOT NULL,
  `certificate_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `course_id`, `student_id`, `certificate_name`, `certificate_description`, `certificate_date`) VALUES
(2, 1, 1, 'Introduction to Programming', 'หนังสือรับรองการจบหลักสูตร Introduction to Programming', '2022-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `course_info`
--

CREATE TABLE `course_info` (
  `course_id` int NOT NULL,
  `instructor_id` int NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `instructor` varchar(50) NOT NULL,
  `length` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pdf_upload` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_info`
--

INSERT INTO `course_info` (`course_id`, `instructor_id`, `course_name`, `description`, `instructor`, `length`, `created_at`, `url`, `pdf_upload`) VALUES
(1, 1, 'Introduction to Programming', 'หลักสูตรนี้สอนพื้นฐานการเขียนโปรแกรมโดยใช้ Python', 'Jane Smith', 8, '2023-04-13 03:42:30', '', NULL),
(17, 17, 'Python', 'Python เป็นภาษาการเขียนโปรแกรมที่ใช้อย่างแพร่หลายในเว็บแอปพลิเคชัน การพัฒนาซอฟต์แวร์ เป็นภาษาที่ใช้ง่ายที่สุดในการเรียนรู้', 'Thanarat Srihapol', 12, '2023-05-18 22:05:28', 'http://localhost/Developer/view_course.php?id=17', 'uploads/python.pdf'),
(18, 18, 'Finance', 'Finance เป็นเรื่องที่เกี่ยวกับการเงินโดยเฉพาะการหาค่าดอกเบี้ยที่ดีที่สุดในการฝากธนาคารหรือลงทุน เป็นวิชาที่สำคัญมากๆในตลาดการศึกษา', 'Nopphanon Namjaiyen', 20, '2023-05-18 22:08:39', 'http://localhost/Developer/view_course.php?id=18', 'uploads/Finance.pdf'),
(19, 19, 'SQL', 'Structured Query Language (SQL) เป็นภาษาโปรแกรมสำหรับจัดเก็บและประมวลผลข้อมูลในฐานข้อมูลต่างๆเพื่อเป็นฐานข้อมูลในการนำหยิบมาใช้', 'Bodin Phamsaro', 16, '2023-05-18 22:10:11', 'http://localhost/Developer/view_course.php?id=19', 'uploads/SQL.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_info`
--

CREATE TABLE `instructor_info` (
  `instructor_id` int NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instructor_info`
--

INSERT INTO `instructor_info` (`instructor_id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `phone`) VALUES
(1, 'Tanapat', 'Muneekul', 'pon10420@gmail.com', 'password123', '2023-04-13 03:42:21', ''),
(8, 'I Here', 'Too', '61412421421@gmail.com', '$2y$10$6aMjXtx/JZFQ4LKad3UhMOuCpzvJZ12McUO8uK2YwF7OtDJJYBk4.', '2023-05-15 17:28:25', '123213214'),
(9, 'sada', 'sadasd', '630500344@kmitl.ac.th', '$2y$10$j3Le1vLu2GJ4VnxELG0H5e7ebdelzAGojukb7vDegicjHa32bhnIW', '2023-05-15 18:02:07', '12313'),
(10, 'sadas', 'asdasd', 'voppa10pp@gmail.com', '$2y$10$Nrdi5DtOUm8f4JGzZUwNteLwGfLgrlsEn5cvtrnyRam/iCjsWosC.', '2023-05-16 03:36:49', '1231'),
(11, 'dasda', 'sadasd', 'voppa1p0@gmail.com', '$2y$10$BjDIn/IoN88KDXfM/NrIVOPig7fmqXrJa.ZJ3TLpAYN4Y8dA2poEa', '2023-05-16 03:50:58', '1231'),
(12, 'dsad', 'sad', 'voppa101232sad4@gmail.com', '$2y$10$fq8bbNhMuZEeaDYgFEBCreA7QUf6sgeKUd8lZQKvCm5X52z1lmwOG', '2023-05-16 03:59:11', '1231'),
(13, 'dsa', 'asdasd', 'voppa10p1231p@gmail.com', '$2y$10$o3a6jsIxSzykofTzV9OdJ.VtMT9xSCGS9D08T/nJ/z2QxPtBQNjGq', '2023-05-16 04:03:08', '123123'),
(15, 'dsa', 'asdasd', 'voppa10p12a311p@gmail.com', '$2y$10$vWFFHeXHdPyatVqKQghmC.MG9ZAYlSY1SYJonrDd2glHDu6WkCWL6', '2023-05-16 04:06:13', '123123'),
(16, 'atgdag', 'dafgdag', 'asd@gmail.com', '$2y$10$Mxwz297KfiE7VvISHB/kLu4C1A5pGdNFjW2Aw3HXYzGvSPMOFmiNS', '2023-05-17 13:46:09', '12313'),
(17, 'Thanarat', 'Srihapol', 'thanarat@gmail.com', '$2y$10$i6y0otG0CV7ic.DJoNRP7ezTbT6YoqXTpiM9jXguoJH97OsMuSnqq', '2023-05-18 22:02:10', '012 345 6789'),
(18, 'Nopphanon', 'Namjaiyen', 'nopphanon@gmail.com', '$2y$10$NpGwCxHzCxWu/UFoeBSB..ryZ6sVSvXE/D3C46hqcqq3sem/sSBLe', '2023-05-18 22:07:14', '033 111 4444'),
(19, 'Bodin', 'Phamsaro', 'Bodin@gmail.com', '$2y$10$yjsL76WFfrxfa61GCHdAAueaT.JJ9zAio5PCKjzt1EQB.HZK0wpEu', '2023-05-18 22:09:26', '099 888 7777');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int NOT NULL,
  `course_id` int NOT NULL,
  `lesson_name` varchar(50) NOT NULL,
  `video_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `course_id`, `lesson_name`, `video_link`) VALUES
(7, 17, 'EP.1 รู้จักภาษา Python', 'https://youtu.be/N1fnq4MF3AE'),
(8, 17, 'EP.2 Python ขั้นพื้นฐาน', 'https://youtu.be/2_TK8JYJiwQ'),
(9, 17, 'EP.3 Python ขั้นสูงสุด', 'https://youtu.be/_G-yOINsXvE'),
(10, 18, 'EP.1 Time Value of Money', 'https://youtu.be/MhvjCWfy-lw'),
(11, 18, 'EP.2 Continuous Payment and Annuity', 'https://youtu.be/WRy6Q85RMDE'),
(12, 18, 'EP.3  Approximation of Interest Rate', 'https://youtu.be/mFI58RRCDbs'),
(13, 19, 'EP.1 Starting MySQL', 'https://youtu.be/D5243hqy2BM'),
(14, 19, 'EP.2 Basic SELECT statements', 'https://youtu.be/5utv73Gmi0c'),
(15, 19, 'EP.3 Advanced SELECT Statements', 'https://youtu.be/RgzcEy82dsU');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int NOT NULL,
  `student_id` int NOT NULL,
  `payment_status` enum('Paid','Unpaid') NOT NULL,
  `started_at` date NOT NULL,
  `end_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `student_id`, `payment_status`, `started_at`, `end_at`) VALUES
(1, 1, 'Paid', '2022-01-01', '2022-03-31'),
(2, 17, 'Paid', '2023-05-18', '2023-06-18'),
(3, 31, 'Paid', '2023-05-18', '2023-06-18'),
(4, 32, 'Paid', '2023-05-18', '2023-06-18'),
(5, 33, 'Paid', '2023-05-18', '2023-06-18'),
(6, 34, 'Paid', '2023-05-18', '2023-06-18'),
(7, 35, 'Paid', '2023-06-07', '2023-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `result_id` int NOT NULL,
  `question_id` int NOT NULL,
  `answer` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz_answers`
--

INSERT INTO `quiz_answers` (`result_id`, `question_id`, `answer`, `is_correct`, `created_at`) VALUES
(2, 4, 'Python software foundation', 1, '2023-05-19 05:12:50'),
(3, 4, 'Intel', 0, '2023-05-19 05:12:50'),
(4, 4, 'Nvidia', 0, '2023-05-19 05:12:50'),
(5, 4, 'Microsoft', 0, '2023-05-19 05:12:50'),
(6, 5, 'PythonIDE', 0, '2023-05-19 05:13:59'),
(7, 5, 'Java scrip', 1, '2023-05-19 05:13:59'),
(8, 5, 'SPE', 0, '2023-05-19 05:13:59'),
(9, 5, 'Pycharm', 0, '2023-05-19 05:13:59'),
(10, 6, 'เรื่องของบรรทัด', 0, '2023-05-19 05:14:36'),
(11, 6, 'เรื่องของการเว้นวรรคหรือแบ่งล็อก', 0, '2023-05-19 05:14:36'),
(12, 6, 'เรื่องของข้อความ', 0, '2023-05-19 05:14:36'),
(13, 6, 'เรื่องของการรัน', 1, '2023-05-19 05:14:36'),
(14, 7, 'ตัวดำเนินการเปรียบเทียบ', 0, '2023-05-19 05:15:05'),
(15, 7, 'ตัวดำเนินการทางคณิตศาสตร์', 1, '2023-05-19 05:15:05'),
(16, 7, 'ตัวดำเนินการทางตรรกะ', 0, '2023-05-19 05:15:05'),
(17, 7, ' ตัวดำเนินการในการกำหนดค่า', 0, '2023-05-19 05:15:05'),
(18, 8, 'คือโครงสร้างของข้อมูล', 0, '2023-05-19 05:15:36'),
(19, 8, 'คือชื่อที่ใช้ในการเก็บค่าหรือกำหนดค่า', 1, '2023-05-19 05:15:36'),
(20, 8, ' คือเครื่องหมายที่ใช้ในการดำเนินการ', 0, '2023-05-19 05:15:36'),
(21, 8, 'ไม่มีข้อถูก', 0, '2023-05-19 05:15:36'),
(22, 9, 'เก็บค่าได้เพียงค่าเดียว', 0, '2023-05-19 05:17:11'),
(23, 9, 'เปลี่ยนแปลงค่าไม่ได้', 0, '2023-05-19 05:17:11'),
(24, 9, 'เก็บค่าทศนิยม', 1, '2023-05-19 05:17:11'),
(25, 9, 'เก็บค่าที่เป็นตัวอักษร', 0, '2023-05-19 05:17:11'),
(26, 10, 'ตัวแปร List', 0, '2023-05-19 05:18:12'),
(27, 10, ' ตัวแปร Array', 0, '2023-05-19 05:18:12'),
(28, 10, 'ตัวแปร Tuple', 1, '2023-05-19 05:18:12'),
(29, 10, ' ไม่มีข้อถูก', 0, '2023-05-19 05:18:12'),
(30, 11, 'ตัวแปร List', 0, '2023-05-19 05:18:39'),
(31, 11, 'ตัวแปร Array', 0, '2023-05-19 05:18:39'),
(32, 11, 'ตัวแปร Tuple', 0, '2023-05-19 05:18:39'),
(33, 11, 'ตัวแปร Dictinary', 1, '2023-05-19 05:18:39'),
(34, 12, 'การแบ่ง Blockจะจบอัตโนมัติเมื่อขึ้น Tap ใหม่', 0, '2023-05-19 05:19:33'),
(35, 12, 'จะมี eilf กี่ขั้นก็ได้', 0, '2023-05-19 05:19:33'),
(36, 12, 'ภายใต้เงื่อนไขจะมี Statements ก็ได้', 0, '2023-05-19 05:19:33'),
(37, 12, 'สามารถเขียนเงื่อนไขได้เพียงเงื่อนไขเดียว', 1, '2023-05-19 05:19:33'),
(38, 13, 'การทำงานซ้ำจนกว่าจะตรงตามเงื่อนไข', 0, '2023-05-19 05:19:59'),
(39, 13, 'ไม่สามารถกำหนดขอบเขตการทำงานได้', 0, '2023-05-19 05:19:59'),
(40, 13, 'การทำงานไปเรื่อยๆของโปรแกรม', 0, '2023-05-19 05:19:59'),
(41, 13, 'การกำหนดเงื่อนไขให้โปรแกรม', 1, '2023-05-19 05:19:59'),
(42, 14, '1,000', 0, '2023-05-19 05:29:53'),
(43, 14, '2,000', 0, '2023-05-19 05:29:53'),
(44, 14, '4,000', 0, '2023-05-19 05:29:53'),
(45, 14, '6,000', 1, '2023-05-19 05:29:53'),
(46, 15, '51,000', 0, '2023-05-19 05:30:26'),
(47, 15, '52,000', 0, '2023-05-19 05:30:26'),
(48, 15, '54,000', 0, '2023-05-19 05:30:26'),
(49, 15, '56,000', 1, '2023-05-19 05:30:26'),
(50, 16, ' 120,068', 0, '2023-05-19 05:31:15'),
(51, 16, ' 120,608', 0, '2023-05-19 05:31:15'),
(52, 16, '120,680', 0, '2023-05-19 05:31:15'),
(53, 16, ' 126,680', 1, '2023-05-19 05:31:15'),
(54, 17, '26,680', 1, '2023-05-19 05:31:44'),
(55, 17, ' 26,080', 0, '2023-05-19 05:31:44'),
(56, 17, ' 20,680', 0, '2023-05-19 05:31:44'),
(57, 17, '20,608', 0, '2023-05-19 05:31:44'),
(58, 18, ' 112,800', 0, '2023-05-19 05:32:06'),
(59, 18, ' 113,000', 0, '2023-05-19 05:32:06'),
(60, 18, '113,500', 1, '2023-05-19 05:32:06'),
(61, 18, ' 113,700', 0, '2023-05-19 05:32:06'),
(62, 19, ' 3 ปี', 0, '2023-05-19 05:32:32'),
(63, 19, ' 4 ปี', 0, '2023-05-19 05:32:32'),
(64, 19, ' 5 ปี', 0, '2023-05-19 05:32:32'),
(65, 19, ' 6 ปี', 1, '2023-05-19 05:32:32'),
(66, 20, '8%', 0, '2023-05-19 05:33:01'),
(67, 20, ' 8.5%', 0, '2023-05-19 05:33:01'),
(68, 20, '9%', 0, '2023-05-19 05:33:01'),
(69, 20, '10%', 1, '2023-05-19 05:33:01'),
(70, 21, '108,420', 0, '2023-05-19 05:33:34'),
(71, 21, '108,240', 1, '2023-05-19 05:33:34'),
(72, 21, '108,620', 0, '2023-05-19 05:33:34'),
(73, 21, '111,400', 0, '2023-05-19 05:33:34'),
(74, 22, '10,121', 0, '2023-05-19 05:33:59'),
(75, 22, ' 11,121', 1, '2023-05-19 05:33:59'),
(76, 22, ' 12,121', 0, '2023-05-19 05:33:59'),
(77, 22, ' 13,121', 0, '2023-05-19 05:33:59'),
(78, 23, '33,700', 0, '2023-05-19 05:34:33'),
(79, 23, '33,800', 1, '2023-05-19 05:34:33'),
(80, 23, '33,900', 0, '2023-05-19 05:34:33'),
(81, 23, '34,000', 0, '2023-05-19 05:34:33'),
(82, 24, 'boolean', 1, '2023-05-19 05:37:44'),
(83, 24, 'Float', 0, '2023-05-19 05:37:44'),
(84, 24, 'integer', 0, '2023-05-19 05:37:44'),
(85, 24, 'string', 0, '2023-05-19 05:37:44'),
(86, 25, 'boolean', 0, '2023-05-19 05:38:18'),
(87, 25, 'Float', 0, '2023-05-19 05:38:18'),
(88, 25, 'integer ', 0, '2023-05-19 05:38:18'),
(89, 25, 'string', 1, '2023-05-19 05:38:18'),
(90, 26, 'boolean', 0, '2023-05-19 05:38:48'),
(91, 26, 'Float', 1, '2023-05-19 05:38:48'),
(92, 26, 'integer', 0, '2023-05-19 05:38:48'),
(93, 26, 'string', 0, '2023-05-19 05:38:48'),
(94, 27, 'boolean', 0, '2023-05-19 05:39:20'),
(95, 27, 'Float', 0, '2023-05-19 05:39:20'),
(96, 27, 'integer', 0, '2023-05-19 05:39:20'),
(97, 27, 'string', 1, '2023-05-19 05:39:20'),
(98, 28, 'เครื่องหมาย แอนด์ ( & )', 0, '2023-05-19 05:39:54'),
(99, 28, 'เครื่องหมาย เซมิโคลล่อน ( ; )', 0, '2023-05-19 05:39:54'),
(100, 28, 'เครื่องหมายคอมม่า ( , )', 1, '2023-05-19 05:39:54'),
(101, 28, 'เครื่องหมายคำถาม ( ? )', 0, '2023-05-19 05:39:54'),
(102, 29, 'HAVING', 0, '2023-05-19 05:40:22'),
(103, 29, 'GROUP BY', 1, '2023-05-19 05:40:22'),
(104, 29, 'SUM', 0, '2023-05-19 05:40:22'),
(105, 29, 'WHERE', 0, '2023-05-19 05:40:22'),
(106, 30, ' ลบข้อมูลทั้งหมดออกจากตาราง user', 0, '2023-05-19 05:40:54'),
(107, 30, 'แก้ไขข้อมูลในตาราง user ให้ตรงกัน', 0, '2023-05-19 05:40:54'),
(108, 30, 'เปลี่ยนข้อมูลจากตาราง user', 0, '2023-05-19 05:40:54'),
(109, 30, 'แสดงผลข้อมูลทั้งหมดจากตาราง user', 1, '2023-05-19 05:40:54'),
(110, 31, 'INSERT * INTO USER', 0, '2023-05-19 05:41:23'),
(111, 31, 'SELECT * FROM USER', 1, '2023-05-19 05:41:23'),
(112, 31, 'DELETE * FROM USER', 0, '2023-05-19 05:41:23'),
(113, 31, 'UPDATE * FROM USER UPDATE * FROM USER', 0, '2023-05-19 05:41:23'),
(114, 32, 'ORDER BY NAME', 0, '2023-05-19 05:41:49'),
(115, 32, 'ORDER BY NAME DSC', 0, '2023-05-19 05:41:49'),
(116, 32, 'GROUP BY NAME', 1, '2023-05-19 05:41:49'),
(117, 32, 'WHERE NAME ASC', 0, '2023-05-19 05:41:49'),
(118, 33, 'VIEW', 0, '2023-05-19 05:42:16'),
(119, 33, 'SELECT', 0, '2023-05-19 05:42:16'),
(120, 33, 'LIKE', 0, '2023-05-19 05:42:16'),
(121, 33, 'SHOW', 1, '2023-05-19 05:42:16'),
(122, 1, 'Python software foundation', 0, '2023-05-19 06:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `question_id` int NOT NULL,
  `course_id` int NOT NULL,
  `question` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `correct_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`question_id`, `course_id`, `question`, `created_at`, `correct_answer`) VALUES
(1, 1, 'เมืองหลวงของฝรั่งเศสคืออะไร?', '2023-04-13 03:42:42', '0'),
(4, 17, 'โปรแกรมแบบ Python ปัจจุบันดูแลโดยบริษัทใด', '2023-05-19 05:12:50', '1'),
(5, 17, 'เครื่องมือใด ไม่ได้เป็น เครื่องมือในการเขียนโปรแกรมไพธอน', '2023-05-19 05:13:59', '2'),
(6, 17, 'ข้อควรระวังใดในการเขียนโปรแกรม Python ไม่ถูกต้อง', '2023-05-19 05:14:36', '4'),
(7, 17, '+ - * / เป็นตัวดำเนินการแบบใด ในภาษา Python', '2023-05-19 05:15:05', '2'),
(8, 17, 'ตัวแปร คืออะไร', '2023-05-19 05:15:36', '2'),
(9, 17, 'ข้อใดคือคุณสมบัติของตัวแปรแบบ List', '2023-05-19 05:17:11', '3'),
(10, 17, 'ตัวแปรที่เก็บค่าได้หลายค่า แต่ไม่สามารถเปลี่ยนค่าได้ คือตัวแปรใด', '2023-05-19 05:18:12', '3'),
(11, 17, 'การกำหนดค่าตัวแปรใดที่ต้องอยู่ภายใต้เครื่องหมาย {….}', '2023-05-19 05:18:39', '4'),
(12, 17, 'ข้อใดกล่าวผิดเกี่ยวกับการเขียนโปรแกรมแบบ if', '2023-05-19 05:19:33', '4'),
(13, 17, 'For loop คืออะไร', '2023-05-19 05:19:59', '4'),
(14, 18, 'ลุงพลต้องการกู้เงินจากธนาคาร 50,000 บาท เมื่อคิดอัตราดอกเบี้ย 6% ต่อปี เป็นเวลา 2 ปี เมื่อครบ 2 ปี ลุงพลจะต้องจ่ายดอกเบี้ยเท่าใด', '2023-05-19 05:29:53', '4'),
(15, 18, 'ลุงพลต้องการกู้เงินจากธนาคาร 50,000 บาท เมื่อคิดอัตราดอกเบี้ย 6% ต่อปี เป็นเวลา 2 ปี เมื่อครบ 2 ปี ลุงพลจะต้องจ่ายเงินทั้งหมดเท่าไร', '2023-05-19 05:30:26', '4'),
(16, 18, 'แม่ต้องการกู้เงินจากธนาคาร 100,000 บาท โดยธนาคารคิดทบต้นทุกไตรมาส เป็นเวลา 2 ปี ในอัตราดอกเบี้ยร้อยละ 12 ต่อปี แม่ต้องจ่ายเงินทั้งหมดเท่าไร', '2023-05-19 05:31:15', '4'),
(17, 18, 'แม่ต้องการกู้เงินจากธนาคาร 100,000 บาท โดยธนาคารคิดทบต้นทุกไตรมาส เป็นเวลา 2 ปี ในอัตราดอกเบี้ยร้อยละ 12 ต่อปี แม่ต้องจ่ายดอกเบี้ยทั้งหมดเท่าไร', '2023-05-19 05:31:44', '1'),
(18, 18, 'คุณพ่อนำเงินฝากธนาคารแห่งหนึ่งจำนวน 100,000 บาท โดยธนาคารให้อัตราดอกเบี้ย 4.5% ต่อปี เงินรวมเมื่อสิ้นปีที่ 3 เป็นจำนวนเท่าใด', '2023-05-19 05:32:06', '3'),
(19, 18, 'นักเรียนนำเงินไปลงทุนเป็นจำนวน 42,000 บาท ซึ่งได้ผลตอบแทนในอัตราร้อยละ 3.5 ต่อปี ถ้านักเรียนลงทุนไประยะหนึ่งแล้วปรากฎว่า ได้ดอกเบี้ย 8,820 บาท นักเรียนลงทุนไปเป็นเวลากี่ปี', '2023-05-19 05:32:32', '4'),
(20, 18, 'ปรารถนาต้องการซื้อตู้เย็นราคา 28,500 บาท โดยทางร้านมีข้อเสนอ คือ ทางร้านให้จ่ายงวดแรกเป็นเงินดาวน์ 10% ของราคาตู้เย็น และที่เหลือผ่อนชำระเป็นรายเดือนจำนวน 12 เดือน เดือนที่ 1-11 ผ่อนชำระ 2,255 บาท ปรารถนาเสียดอกเบี้ยให้ทางร้านในอัตราร้อยละเท่าใดต่อปี', '2023-05-19 05:33:01', '4'),
(21, 18, 'แม่นำเงินฝากธนาคารแบบฝากประจำ 24 เดือน จำนวน 100,000 บาท โดยธนาคารให้ดอกเบี้ยแบบทบต้นร้อยละ 4 ต่อปี และคิดทบต้นทุก 6 เดือน เมื่อแม่ฝากครบ 24 เดือน แม่จะมีเงินในบัญชีประมาณเท่าใด', '2023-05-19 05:33:34', '2'),
(22, 18, 'ถ้านักเรียนต้องการเช่าซื้อรถยนต์กับสถาบันการเงินแห่งหนึ่งราคา 500,000 บาท โดยสถาบันการเงินคิดดอกเบี้ยแบบลดต้นลดดอก ร้อยละ 12 ต่อปี กำหนดระยะเวลาเช่าซื้อ 5 ปี โดยต้องผ่อนชำระทุกเดือน นักเรียนต้องผ่อนชำระเดือนละเท่าไร', '2023-05-19 05:33:59', '2'),
(23, 18, 'หากนักเรียนต้องการใช้เงิน 50,000 บาท ในอีก 5 ปี ข้างหน้า จึงคิดจะนำเงินไปฝากธนาคาร จำนวนหนึ่ง โดยธนาคาร จะให้ดอกเบี้ย 8% ต่อปี คิดดอกเบี้ยทบต้นทุก 6 เดือน อยากทราบว่า นักเรียนต้องนำเงินไปฝากธนาคาร ครั้งแรกเป็นจำนวนอย่างน้อยเท่าใดจึงจะมีเงินรวมพอใช้ในอีก 5 ปีข้างหน้า', '2023-05-19 05:34:33', '2'),
(24, 19, 'ข้อมูลชนิดใดที่มีเพียงค่าจริงกับเท็จเท่านั้น', '2023-05-19 05:37:44', '1'),
(25, 19, 'ข้อมูลชนิดใดที่เหมาะกับเก็บจำนวนคน สัตว์ สิ่งของ', '2023-05-19 05:38:18', '4'),
(26, 19, 'ข้อมูลชนิดใดที่เหมาะกับเก็บค่าเกรดเฉลี่ย', '2023-05-19 05:38:48', '2'),
(27, 19, 'ข้อมูลชนิดใดที่เหมาะกับการเก็บชื่อนักเรียน', '2023-05-19 05:39:20', '4'),
(28, 19, 'ในการใช้คำสั่ง select สามารถใช้เครื่องหมายอะไรคั่นระหว่างชื่อฟิลด์ได้', '2023-05-19 05:39:54', '3'),
(29, 19, 'คำสั่งใดต่อไปนี้ที่เป็นคำสั่งในภาษา SQLในการจัดเรียงข้อมูลเป็นกลุ่มตามเงื่อนไขที่กำหนด', '2023-05-19 05:40:22', '2'),
(30, 19, 'คำสั่ง SELECT * FROM user ในภาษา SQL คือ', '2023-05-19 05:40:54', '4'),
(31, 19, 'คำสั่งในภาษา SQL ข้อใดถูกต้อง', '2023-05-19 05:41:23', '2'),
(32, 19, 'คำสั่งใดต่อไปนี้ที่เป็นคำสั่งในภาษา SQLในการจัดเรียงข้อมูลจากตัวแปรเก็บชื่อ (NAME) โดยเรียงจากมากไปหาน้อย', '2023-05-19 05:41:49', '3'),
(33, 19, 'คำสั่งในภาษา SQL ข้อใดที่ใช้เรียกดูข้อมูลจากฐานข้อมูล', '2023-05-19 05:42:16', '4');

-- --------------------------------------------------------

--
-- Table structure for table `student_feedback`
--

CREATE TABLE `student_feedback` (
  `feedback_id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `rating` int DEFAULT NULL,
  `comments` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_feedback`
--

INSERT INTO `student_feedback` (`feedback_id`, `student_id`, `course_id`, `rating`, `comments`, `created_at`) VALUES
(2, 1, 1, 5, 'เป็นคอร์สที่มีคุณภาพมากๆครับ มีแต่คนเก่งๆมาสอน ราคาก็ไม่แพง.', '2023-04-13 03:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` int NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `created_at`) VALUES
(1, 'John', 'Doe', 'johndoe@example.com', 'password123', '5551234567', '2023-04-13 03:42:15'),
(17, 'saeasr', 'arfsasrfas', 'voppa10@gmail.com', '$2y$10$6hbQoVsEC2/uvOZ0KyqE7egZOsgZyapeWCItDrODWu0hjDd52g.0W', '1231421412421', '2023-05-01 02:01:18'),
(29, 'dada', 'weq', 'voppa1034@gmail.com', '$2y$10$RhqWiKl7iuuntHAM0Cnpf.QmAYMEeEqn0qjWqFKdWXOvgN5Bjobke', '1234', '2023-05-15 14:13:06'),
(30, 'asda', 'asdad', 'voppa1012324@gmail.com', '$2y$10$upLKrIOPy98Hot5yZf78R.kubTdkIFx3jNLEJyfyA/R3Fef2oAQ/u', '123131', '2023-05-15 14:18:46'),
(31, 'sadasd', 'asdasd', 'voppa10student@gmail.com', '$2y$10$h8ufT2XmKcMMQ1iEPFIoo.kFlO1h.1U8bItf/vTylsa1v8oF3uqfa', '12312313', '2023-05-18 16:07:23'),
(32, 'qwe', 'dsad', 'voppa10sssssssss@gmail.com', '$2y$10$UV4jrbbV2bBR82f2/FPMfezjTQaY6uyctgnOggR4kgPCEyqg3Tk5a', '1231313', '2023-05-18 17:56:42'),
(33, 'asdas', 'sadas', 'voppa101231312312@gmail.com', '$2y$10$HHct0TAa.4soH9d.SU2kRuyXc6qSRkNZHE4CQJzOarZxXepY57AMy', '123131', '2023-05-18 18:00:17'),
(34, 'sadas', 'sadasd', 'sadassad@gmail.com', '$2y$10$hru6nWk1eBtiIPV77KnSLuKSfbJYGyRTmXyf3ijgiajKoM4hP7/Za', '12312412412', '2023-05-18 18:01:34'),
(35, 'fasf', 'asger', 'qweqwe@gmail.com', '$2y$10$W1VRAHShSCYwqaXH6lqQiuqEWDznOZ.wbF1N8Az0DUOhZ/Nnvnru2', '12321314', '2023-06-08 02:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_progress`
--

CREATE TABLE `student_progress` (
  `progress_id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `percentage` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_progress`
--

INSERT INTO `student_progress` (`progress_id`, `student_id`, `course_id`, `percentage`) VALUES
(1, 1, 1, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `course_info`
--
ALTER TABLE `course_info`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `instructor_info`
--
ALTER TABLE `instructor_info`
  ADD PRIMARY KEY (`instructor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student_feedback`
--
ALTER TABLE `student_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student_progress`
--
ALTER TABLE `student_progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_info`
--
ALTER TABLE `course_info`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `instructor_info`
--
ALTER TABLE `instructor_info`
  MODIFY `instructor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `result_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `student_feedback`
--
ALTER TABLE `student_feedback`
  MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `student_progress`
--
ALTER TABLE `student_progress`
  MODIFY `progress_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_info` (`course_id`),
  ADD CONSTRAINT `certificate_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`student_id`);

--
-- Constraints for table `course_info`
--
ALTER TABLE `course_info`
  ADD CONSTRAINT `course_info_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor_info` (`instructor_id`);

--
-- Constraints for table `lesson`
--
ALTER TABLE `lesson`
  ADD CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_info` (`course_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`student_id`);

--
-- Constraints for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD CONSTRAINT `quiz_answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `quiz_question` (`question_id`);

--
-- Constraints for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD CONSTRAINT `quiz_question_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_info` (`course_id`);

--
-- Constraints for table `student_feedback`
--
ALTER TABLE `student_feedback`
  ADD CONSTRAINT `student_feedback_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`student_id`),
  ADD CONSTRAINT `student_feedback_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course_info` (`course_id`);

--
-- Constraints for table `student_progress`
--
ALTER TABLE `student_progress`
  ADD CONSTRAINT `student_progress_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_info` (`student_id`),
  ADD CONSTRAINT `student_progress_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course_info` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
