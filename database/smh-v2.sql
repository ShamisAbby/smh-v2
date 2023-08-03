-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 06:12 AM
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
  `studID` int(11) NOT NULL,
  `techrID` int(11) NOT NULL,
  `aswBdy` varchar(255) NOT NULL,
  `questID` int(11) NOT NULL
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
(2, 1, 2, 'Data Management', 'DNIF/DCS 002');

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
(2, 1, 'file bade and data base', 'This is file for file bade and data base  from Data Management uploaded to test user 2', 'Tsh500', 'shamicDoc_1684603211.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `techrID` int(11) NOT NULL,
  `questBdy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `studPhone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studID`, `userID`, `studName`, `studReg`, `studAccnt`, `studPhone`) VALUES
(1, 2, 'Shamis Aziz', 'DIT/11/21/055/TZ', '5756855647', '0772800257'),
(2, 4, 'Abdull Majib', 'DIT/11/21/067/tz', '4565434567', '0774251462');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `techrID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `techrName` varchar(100) NOT NULL,
  `techrCourse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `transDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(1, 'Admin', '8cb2237d0679ca88db6464eac60da96345513964', 'admin@gmail.com', 1, '2023-05-20 16:40:22'),
(2, 'shamic', '8cb2237d0679ca88db6464eac60da96345513964', 'shamis@gmail.com', 3, '2023-05-20 17:58:05'),
(3, 'teacher1', '8cb2237d0679ca88db6464eac60da96345513964', 'teacher1@gmail.com', 3, '2023-05-20 17:58:29'),
(4, 'hasnet', '8cb2237d0679ca88db6464eac60da96345513964', 'hasnet@gmail.com', 3, '2023-05-20 16:51:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aswID`),
  ADD KEY `aswTK_stud` (`studID`),
  ADD KEY `aswFK_tech` (`techrID`),
  ADD KEY `aswFK_quest` (`questID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`crsID`),
  ADD KEY `corsFK_doc` (`docID`);

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
  ADD KEY `questFK_stud` (`studID`),
  ADD KEY `questFK_tech` (`techrID`);

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
  MODIFY `aswID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `crsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `techrID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `aswFK_quest` FOREIGN KEY (`questID`) REFERENCES `questions` (`questID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aswFK_tech` FOREIGN KEY (`techrID`) REFERENCES `teachers` (`techrID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aswTK_stud` FOREIGN KEY (`studID`) REFERENCES `students` (`studID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `questFK_stud` FOREIGN KEY (`studID`) REFERENCES `students` (`studID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questFK_tech` FOREIGN KEY (`techrID`) REFERENCES `teachers` (`techrID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `userID_FK_stud` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

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
