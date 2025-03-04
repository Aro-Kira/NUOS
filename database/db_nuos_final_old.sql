-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 02:58 AM
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
-- Database: `db_nuos_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `assigned_by` varchar(100) NOT NULL,
  `assigned_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `form_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `reason_for_joining` text NOT NULL,
  `section` text NOT NULL,
  `contact_number` int(11) NOT NULL,
  `address` text NOT NULL,
  `skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`form_id`, `membership_id`, `reason_for_joining`, `section`, `contact_number`, `address`, `skills`) VALUES
(1, 3, 'wow', 'IT236', 2147483647, 'kahit saan', 'matulog'),
(2, 4, 'kasi po gusto ko', 'IT236', 2147483647, 'kahit saan', 'matulog');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`) VALUES
(1, 'BS Computer Science'),
(2, 'BS Business Admin'),
(3, 'BS Fine Arts'),
(4, 'BS Biology'),
(5, 'BS IT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `event_title` varchar(250) NOT NULL,
  `event_date` date NOT NULL,
  `event_location` text NOT NULL,
  `event_description` text NOT NULL,
  `event_poster` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `org_id`, `event_title`, `event_date`, `event_location`, `event_description`, `event_poster`) VALUES
(1, 6, 'Tech Seminar', '2024-06-01', 'Auditorium', '', ''),
(2, 6, 'Basketball Match', '2024-06-05', 'Gym', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `membership_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`membership_id`, `student_id`, `org_id`, `status_id`, `status`) VALUES
(1, 2023133019, 6, 1, 'Pending'),
(2, 2024135567, 6, 2, 'Pending'),
(3, 2023133013, 6, 1, 'Pending'),
(4, 2023133014, 6, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_org`
--

CREATE TABLE `tbl_org` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(150) NOT NULL,
  `org_type_id` int(11) NOT NULL,
  `org_description` text NOT NULL,
  `org_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_org`
--

INSERT INTO `tbl_org` (`org_id`, `org_name`, `org_type_id`, `org_description`, `org_logo`) VALUES
(6, 'Codability Tech', 1, 'A student organization focused on coding and technology.', 'https://imgur.com/xL41CNa.jpg'),
(18, 'GREEN', 1, 'luntian', 'https://i.imgur.com/3a16ZfA.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_org_type`
--

CREATE TABLE `tbl_org_type` (
  `org_type_id` int(11) NOT NULL,
  `org_type_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_org_type`
--

INSERT INTO `tbl_org_type` (`org_type_id`, `org_type_name`) VALUES
(1, 'Academic'),
(2, 'Non-Academic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Adviser'),
(3, 'Officer'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(150) NOT NULL,
  `status_type` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_name`, `status_type`) VALUES
(1, 'Pending', 'Membership'),
(2, 'Pending', 'Membership'),
(3, 'Pending', 'Event Registration'),
(4, 'Pending', 'Event Registration');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_std`
--

CREATE TABLE `tbl_std` (
  `student_id` int(11) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_std`
--

INSERT INTO `tbl_std` (`student_id`, `lname`, `fname`, `mname`, `course_id`, `year_id`, `user_id`) VALUES
(2023133013, 'Manantan', 'Aro', 'Flin', 1, 1, 8),
(2023133014, 'manantan', 'nazh', 'mitch', 1, 1, 9),
(2023133019, 'Platilla', 'Harrieth', 'Belarde', 5, 2, 4),
(2024135567, 'BiglangBuka', 'Maya', 'Asim', 4, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(13) NOT NULL,
  `role_id` int(11) NOT NULL,
  `instiemail` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `role_id`, `instiemail`, `description`, `password`) VALUES
(1, 1, 'admin1@students.nu-fairview.edu.ph', 'System admin', 'pass123'),
(2, 2, 'adviser1@students.nu-fairview.edu.ph', 'Adviser for org1', 'pass234'),
(3, 3, 'officer1@students.nu-fairview.edu.ph', 'Org1 president', 'pass345'),
(4, 4, 'platillahar@students.nu-fairview.edu.ph', 'Regular student', 'tubolniM1tch'),
(5, 4, 'student2@students.nu-fairview.edu.ph', 'Regular student', 'pass567'),
(6, 4, 'student2@students.nu-fairview.edu.ph', 'Regular student', 'pass567'),
(8, 2, 'aro@students.nu-fairview.edu.ph', 'Regular User', 'aroflin1'),
(9, 2, 'mitchnazharo@students.nu-fairview.edu.ph', 'Regular User', 'aroflin1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yearlvl`
--

CREATE TABLE `tbl_yearlvl` (
  `year_id` int(11) NOT NULL,
  `year_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_yearlvl`
--

INSERT INTO `tbl_yearlvl` (`year_id`, `year_name`) VALUES
(1, 'Freshman'),
(2, 'Sophomore'),
(3, 'Junior'),
(4, 'Senior'),
(5, 'Irregular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id2` (`user_id`);

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `membership_id4` (`membership_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `org_id3` (`org_id`);

--
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `org_id` (`org_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `tbl_org`
--
ALTER TABLE `tbl_org`
  ADD PRIMARY KEY (`org_id`),
  ADD KEY `org_type_id` (`org_type_id`);

--
-- Indexes for table `tbl_org_type`
--
ALTER TABLE `tbl_org_type`
  ADD PRIMARY KEY (`org_type_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_std`
--
ALTER TABLE `tbl_std`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `year_id` (`year_id`),
  ADD KEY `user_id5` (`user_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `tbl_yearlvl`
--
ALTER TABLE `tbl_yearlvl`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_org`
--
ALTER TABLE `tbl_org`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_org_type`
--
ALTER TABLE `tbl_org_type`
  MODIFY `org_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_yearlvl`
--
ALTER TABLE `tbl_yearlvl`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`);

--
-- Constraints for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD CONSTRAINT `membership_id4` FOREIGN KEY (`membership_id`) REFERENCES `tbl_membership` (`membership_id`);

--
-- Constraints for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD CONSTRAINT `org_id3` FOREIGN KEY (`org_id`) REFERENCES `tbl_org` (`org_id`);

--
-- Constraints for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD CONSTRAINT `org_id` FOREIGN KEY (`org_id`) REFERENCES `tbl_org` (`org_id`),
  ADD CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `tbl_status` (`status_id`),
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `tbl_std` (`student_id`);

--
-- Constraints for table `tbl_std`
--
ALTER TABLE `tbl_std`
  ADD CONSTRAINT `course_id` FOREIGN KEY (`course_id`) REFERENCES `tbl_course` (`course_id`),
  ADD CONSTRAINT `user_id5` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`user_id`),
  ADD CONSTRAINT `year_id` FOREIGN KEY (`year_id`) REFERENCES `tbl_yearlvl` (`year_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
