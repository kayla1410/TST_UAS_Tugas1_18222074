-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 04:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendidikan_microservices`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `day` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `duration` int(11) NOT NULL,
  `credits` int(2) NOT NULL,
  `semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `day`, `start_time`, `duration`, `credits`, `semester`) VALUES
(1, 'Teknologi Sistem Terintegrasi', 'Senin', '07:00:00', 100, 2, 4),
(2, 'Teknologi Sistem Terintegrasi', 'Selasa', '09:00:00', 50, 1, 4),
(3, 'Dasar Inteligensi Artifisial', 'Senin', '09:00:00', 50, 1, 4),
(4, 'Dasar Inteligensi Artifisial', 'Selasa', '07:00:00', 100, 2, 4),
(5, 'Interaksi Manusia Komputer', 'Rabu', '07:00:00', 100, 2, 4),
(6, 'Interaksi Manusia Komputer', 'Kamis', '09:00:00', 50, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` int(11) NOT NULL,
  `semester` int(2) NOT NULL,
  `ip_sem1` float NOT NULL,
  `ip_sem2` float NOT NULL,
  `ip_sem3` float NOT NULL,
  `ip_sem4` float NOT NULL,
  `ip_sem5` float NOT NULL,
  `ip_sem6` float NOT NULL,
  `ip_sem7` float NOT NULL,
  `ip_sem8` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`no`, `id`, `nama`, `nim`, `semester`, `ip_sem1`, `ip_sem2`, `ip_sem3`, `ip_sem4`, `ip_sem5`, `ip_sem6`, `ip_sem7`, `ip_sem8`) VALUES
(1, 1, 'Kayla Dyara', 18222074, 6, 3.5, 3.7, 3.5, 3.5, 4, 0, 0, 0),
(2, 2, 'Monica Angela Hartono', 18222078, 4, 3, 3.2, 3.5, 4, 0, 0, 0, 0),
(3, 3, 'Tamara Mayranda Lubis', 18222026, 3, 3.4, 4, 0, 0, 0, 0, 0, 0),
(10, 10, 'Keryn Deslia Andeskar', 18222090, 3, 3, 3.2, 0, 4, 0, 0, 0, 0);

--
-- Triggers `students`
--
DELIMITER $$
CREATE TRIGGER `auto_fill_no` BEFORE INSERT ON `students` FOR EACH ROW BEGIN
    SET NEW.no = NEW.id; -- Atau gunakan logika lain jika sebaliknya
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `students_courses`
--

CREATE TABLE `students_courses` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `grade` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_courses`
--

INSERT INTO `students_courses` (`id`, `student_id`, `course_id`, `semester`, `grade`) VALUES
(1, 1, 1, 0, ''),
(3, 1, 3, 0, ''),
(5, 1, 5, 1, ''),
(8, 2, 1, 4, ''),
(9, 2, 3, 4, ''),
(10, 2, 5, 4, ''),
(11, 10, 1, 4, ''),
(12, 10, 3, 4, ''),
(13, 10, 5, 4, ''),
(14, 1, 2, 4, ''),
(15, 1, 6, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`no`, `id`, `nama`) VALUES
(1, 1, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','teacher','student','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`no`, `id`, `username`, `password`, `role`) VALUES
(5, 2, 'admin', '$2y$10$Pn8VaKRjzFJbYKVPp0Ov3u0goxl6SJXDCMfqdoA3PHRH6nLwyk21a', 'admin'),
(6, 1, 'kayla', '$2y$10$qJgi.kWuwB63LriWW6IV7.j90KcIg2SYON5aRK6u9qsIwmKRQ.ZDa', 'student'),
(7, 2, 'monic', '$2y$10$LQ6GyfNka8pLizk0wyJjcucQtqhGqqpa9cXffP96gKns8DJVjRJ/i', 'student'),
(9, 10, 'kerlyn', '$2y$10$vLcsjKjP8OK9eqtByAFciuDcRqTLIdXPBYeUjhDhbEWx2Nk4F.jwq', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18222073;

--
-- AUTO_INCREMENT for table `students_courses`
--
ALTER TABLE `students_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students_courses`
--
ALTER TABLE `students_courses`
  ADD CONSTRAINT `students_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `students_courses_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
