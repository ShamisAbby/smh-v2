-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 04:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smh`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aswID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `aswBdy` varchar(255) NOT NULL,
  `questID` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `crsID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `docID` int(11) NOT NULL,
  `crsName` varchar(100) NOT NULL,
  `crsCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`crsID`, `studID`, `docID`, `crsName`, `crsCode`) VALUES
(1, 2, 1, 'Computer Science', 'DCS/DINF 1002'),
(2, 1, 2, 'Data Management', 'DNIF/DCS 002'),
(3, 2, 3, 'Web Development', 'DCS/DINF 113'),
(4, 1, 4, 'Data Management', 'SSD 003'),
(7, 32, 7, 'Data Management', 'DINF 1002');

-- --------------------------------------------------------

--
-- Table structure for table `ctl_no`
--

CREATE TABLE `ctl_no` (
  `ctl_NoID` int(11) NOT NULL,
  `ctl_Nos` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ctl_no`
--

INSERT INTO `ctl_no` (`ctl_NoID`, `ctl_Nos`) VALUES
(1, 987654321),
(2, 554433221),
(3, 657389583),
(4, 435465783),
(5, 354658694);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `docID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `docTittle` varchar(100) NOT NULL,
  `docDesc` varchar(100) NOT NULL,
  `docPrice` varchar(100) NOT NULL,
  `docPath` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`docID`, `studID`, `docTittle`, `docDesc`, `docPrice`, `docPath`, `status`) VALUES
(1, 2, 'Introduction to Computer ', 'This is document for Introduction to Computer  from Computer Science uploaded to test user 1', 'Tsh500', 'hasnetDoc_1684603115.pdf', 1),
(2, 1, 'file base and database', 'This is file for file bade and data base  from Data Management uploaded to test user 2', 'Tsh500', 'shamicDoc_1684603211.pdf', 1),
(3, 2, 'Laravel Frame-work', 'Install Composer: Download and install Composer from the official website', 'Tsh500', 'hasnetDoc_1685573093.pdf', 1),
(4, 1, 'Introduction to Programing ', 'saklalgshdlHJV\\D HJSALDJVHAJ DHVCASFJBSDHAVHFGSVAJFVCXHJGAFHADSVHGCSAJGFASGHJggdshkbfdgsdl', 'Tsh500', 'shamicDoc_1685969700.pdf', 1),
(7, 32, 'Introduction to Computer ', 'lorem', 'Tsh500', 'KassimDoc_1690958989.pdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `questBdy` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questID`, `userID`, `questBdy`, `time`) VALUES
(2, 2, 'Hello! how to create live server for php project', '2023-05-27 09:42:50'),
(3, 4, ' I got an error My laravel project in not display any style it show only html', '2023-05-27 09:57:47'),
(4, 2, 'Hey', '2023-05-29 11:19:06'),
(5, 2, 'Jamani eeeeh Nisaidieni Ku-deploy  project yang ya Angular katika git hub', '2023-06-22 06:12:52'),
(8, 21, 'How?', '2023-08-02 06:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `studName` varchar(100) NOT NULL,
  `studReg` varchar(100) NOT NULL,
  `studAccnt` varchar(100) NOT NULL,
  `studPhone` varchar(100) NOT NULL,
  `studNet` varchar(50) NOT NULL,
  `studCrs` varchar(50) NOT NULL,
  `studYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studID`, `userID`, `studName`, `studReg`, `studAccnt`, `studPhone`, `studNet`, `studCrs`, `studYear`) VALUES
(1, 2, 'Shamis Aziz', 'DIT/11/21/055/TZ', '5756855647', '0772800257', 'Zantel', 'BITAM', 2),
(2, 4, 'Abdull Hamid', 'DIT/11/21/067/tz', '4565434567', '0774251462', 'Zantel', 'BITAM', 2),
(31, 20, 'Juma', 'DIT/11/21/067/TZ', '0777800257', '0774251462', 'Vodacom', 'DIT', 3),
(32, 21, 'Khamis', 'DIT/11/21/067/TZ', '0777800257', '0772453257', 'Airtel', 'BITAM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `techrID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `techrName` varchar(100) NOT NULL,
  `teachrPhone` varchar(50) NOT NULL,
  `techrCourse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`techrID`, `userID`, `techrName`, `teachrPhone`, `techrCourse`) VALUES
(1, 5, 'Kassim Khamis', '0772854257', 'DCS/DINF 1302'),
(2, 6, 'Kassim Khamis', '0772854257', 'DCS/DINF 1002');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `controllNo` int(20) NOT NULL,
  `docID` int(11) NOT NULL,
  `transDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transID`, `studID`, `controllNo`, `docID`, `transDate`) VALUES
(4, 2, 2147483647, 1, '2023-06-25 20:22:41'),
(5, 1, 2147483647, 4, '2023-06-25 20:35:12'),
(6, 1, 2147483647, 1, '2023-06-26 10:58:05'),
(7, 2, 2147483647, 3, '2023-07-01 07:52:01'),
(10, 32, 987654321, 2, '2023-08-02 07:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userMail` varchar(100) NOT NULL,
  `roleID` int(11) NOT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPass`, `userMail`, `roleID`, `lastLogin`) VALUES
(1, 'Admin', '8cb2237d0679ca88db6464eac60da96345513964', 'admin@gmail.com', 1, '2023-08-01 22:52:03'),
(2, 'shamic', '8cb2237d0679ca88db6464eac60da96345513964', 'shamis@gmail.com', 3, '2023-08-01 22:58:20'),
(4, 'hasnet', '8cb2237d0679ca88db6464eac60da96345513964', 'hasnet@gmail.com', 3, '2023-08-01 20:53:06'),
(5, 'teacher3', '8cb2237d0679ca88db6464eac60da96345513964', 'teacher3@gmail.com', 2, '2023-06-29 19:55:49'),
(6, 'teacher1', '8cb2237d0679ca88db6464eac60da96345513964', 'teacher1@gmail.com', 2, '2023-08-01 22:50:45'),
(20, 'Abass', '8cb2237d0679ca88db6464eac60da96345513964', 'juma@gmail.com', 3, '2023-08-02 05:50:32'),
(21, 'Kassim', '8cb2237d0679ca88db6464eac60da96345513964', 'khamis@gmail.com', 3, '2023-08-02 06:46:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aswID`),
  ADD KEY `aswTK_stud` (`userID`),
  ADD KEY `aswFK_quest` (`questID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`crsID`),
  ADD KEY `corsFK_doc` (`docID`);

--
-- Indexes for table `ctl_no`
--
ALTER TABLE `ctl_no`
  ADD PRIMARY KEY (`ctl_NoID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`docID`),
  ADD KEY `docFK_stud` (`studID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questID`),
  ADD KEY `questFK_stud` (`userID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studID`),
  ADD KEY `userID_FK_stud` (`userID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`techrID`),
  ADD KEY `userID_FK_teacher` (`userID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transID`),
  ADD KEY `transFK_stud` (`studID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID_FK` (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aswID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `crsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ctl_no`
--
ALTER TABLE `ctl_no`
  MODIFY `ctl_NoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `techrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answr_FK_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aswFK_quest` FOREIGN KEY (`questID`) REFERENCES `questions` (`questID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `corsFK_doc` FOREIGN KEY (`docID`) REFERENCES `documents` (`docID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `docFK_stud` FOREIGN KEY (`studID`) REFERENCES `students` (`studID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `quest_FK_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `userID_FK_stud` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `userID_FK_teacher` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transFK_stud` FOREIGN KEY (`studID`) REFERENCES `students` (`studID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roleID_FK` FOREIGN KEY (`roleID`) REFERENCES `roles` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
