-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 10:43 AM
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
-- Database: `routeready_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bankID` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `accountNo` varchar(20) NOT NULL,
  `bankName` varchar(50) NOT NULL,
  `branchName` varchar(50) NOT NULL,
  `holdersName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bankID`, `user_id`, `accountNo`, `bankName`, `branchName`, `holdersName`) VALUES
(0, '31', '1234567', 'BOC', 'krunegala', 'danudu');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `driver_license` varchar(50) NOT NULL,
  `vehicle_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `age` int(11) NOT NULL,
  `nic_number` varchar(100) NOT NULL,
  `years_of_experience` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `user_id`, `driver_license`, `vehicle_type`, `created_at`, `age`, `nic_number`, `years_of_experience`) VALUES
(4, 27, 'B50406029', 'Car', '2024-04-25 14:20:23', 24, '200011300300', 5),
(5, 31, 'B50406029D', 'Car', '2024-04-26 16:43:54', 30, '200011300301', 11),
(6, 47, 'B53234245DF', 'Van', '2024-04-29 16:59:43', 42, '1231312313213v', 10);

-- --------------------------------------------------------

--
-- Table structure for table `fullday_timetable`
--

CREATE TABLE `fullday_timetable` (
  `b_date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `no_pas` int(11) NOT NULL,
  `driver_id` varchar(100) NOT NULL,
  `vehicle_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fullday_timetable`
--

INSERT INTO `fullday_timetable` (`b_date`, `location`, `no_pas`, `driver_id`, `vehicle_id`) VALUES
('2024-04-30', 'matara', 5, '22', '134');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `medical_report` blob NOT NULL,
  `std_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_days` int(10) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `user_id`, `type`, `medical_report`, `std_date`, `end_date`, `no_of_days`, `reason`, `status`) VALUES
(7, '48', 'Sick Leave', '', '2024-05-01', '2024-05-02', 2, 'Sick', '1'),
(8, '48', 'Personal', '', '2024-05-01', '2024-05-09', 9, 'no reason', NULL),
(9, '48', 'Other', '', '2024-05-02', '2024-05-10', 9, 'test field 2', NULL),
(11, '31', 'Sick Leave', '', '2024-04-30', '2024-05-02', 3, '112345678', NULL),
(12, '31', 'Other', '', '2024-04-30', '2024-05-01', 2, '1234', NULL),
(13, '31', 'Sick Leave', '', '2024-04-30', '2024-05-18', 19, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `monthlyreservation`
--

CREATE TABLE `monthlyreservation` (
  `MReservationID` int(11) NOT NULL,
  `ScheduleType` varchar(200) NOT NULL,
  `Route` varchar(200) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `PickUp` varchar(200) NOT NULL,
  `DropOff` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `monthlyreservation`
--

INSERT INTO `monthlyreservation` (`MReservationID`, `ScheduleType`, `Route`, `StartDate`, `EndDate`, `PickUp`, `DropOff`, `id`) VALUES
(2, 'Select', 'Kaluthara', '2024-04-23', '2024-05-22', 'maharagama', 'Matara', 18),
(4, 'FromWork', 'Nugegoda', '2024-04-24', '2024-05-23', '', 'Matara', 18),
(5, 'BothWays', 'Nugegoda', '2024-04-25', '2024-05-24', 'Maharagama', 'Maharagama', 18),
(6, 'BothWays', 'Nugegoda', '2024-04-26', '2024-05-25', 'matara', 'Matara', 25),
(8, 'BothWays', 'Nugegoda', '2024-05-01', '2024-05-31', 'maharagama', 'Maharagama', 29);

-- --------------------------------------------------------

--
-- Table structure for table `outsourcedrivers`
--

CREATE TABLE `outsourcedrivers` (
  `id` int(11) NOT NULL,
  `odriver_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nic_number` varchar(100) NOT NULL,
  `contact_num` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `driver_license` varchar(100) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `vehicle_year` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `r_year` int(11) NOT NULL,
  `vin` varchar(100) NOT NULL,
  `insu_pro` varchar(100) NOT NULL,
  `insu_pr` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `outsourcedrivers`
--

INSERT INTO `outsourcedrivers` (`id`, `odriver_id`, `name`, `age`, `email`, `nic_number`, `contact_num`, `address`, `vehicle_type`, `driver_license`, `years_of_experience`, `vehicle_number`, `vehicle_name`, `vehicle_year`, `model`, `r_year`, `vin`, `insu_pro`, `insu_pr`, `capacity`, `created_at`) VALUES
(2, 35, 'krishan', 25, 'krishan2@gmail.com', '1231312313213v', 2147483647, 'matrara', 'Car', '12313123312', 3, '', '', 0, '', 0, '', '', '', 0, '2024-04-28 21:54:40'),
(3, 36, 'dulaj', 22, 'dulaj@gmail.com', '123132141412', 718210386, 'Colombo', 'Car', '1231132231df', 3, '', '', 0, '', 0, '', '', '', 0, '2024-04-28 22:33:08'),
(5, 42, 'Keheliya', 24, 'keheliyakeheliya2@gmail.com', '1231312313213v', 718210386, 'Colombo', 'Van', 'B50406029D', 4, 'ASA2332', 'Van', 2015, 'Nissan', 2016, '1234553243s', 'dsfsfsfd', 'dsddssfds', 6, '2024-04-29 11:38:01'),
(6, 43, 'Ashan', 24, 'ashan3@gmail.com', '12143414214v', 712592209, 'Galle', 'Van', '23423432fs', 3, 'SRS3424', 'Van', 2015, 'Ford', 2020, '1234553243', 'Selan', '2312424232dst', 10, '2024-04-29 11:40:03'),
(7, 48, 'Krishan Harsha', 27, 'krishanharsha@gmail.com', '12143414214v', 712592209, 'Ebuldeniya', 'Bus', 'B50406029', 5, 'BE2367', 'Bus', 2010, 'Ford Highway AC', 2016, '12314154112', 'Janashakthi', '1234342df234233', 50, '2024-04-29 22:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `out_salary`
--

CREATE TABLE `out_salary` (
  `driver_id` int(11) NOT NULL,
  `number_of_trips` int(11) NOT NULL,
  `basic_payment` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `out_salary`
--

INSERT INTO `out_salary` (`driver_id`, `number_of_trips`, `basic_payment`, `total_amount`, `month`, `year`) VALUES
(22, 2, 2000, 4000, 'April', '2024'),
(22, 2, 2000, 4000, 'April', '2024'),
(22, 3, 2000, 6000, 'April', '2024'),
(31, 5, 2000, 10000, 'April', '2024'),
(31, 5, 2000, 10000, 'April', '2024'),
(31, 5, 2000, 10000, 'April', '2024'),
(31, 5, 2000, 10000, 'April', '2024'),
(31, 6, 2000, 12000, 'April', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `date`) VALUES
(11, 4, 'User Responsibility and Conduct', 'This point emphasizes the importance of user responsibility and proper conduct while utilizing the transport management system. By outlining the requirement to follow all relevant laws and regulations, it ensures that users are aware of their obligations to comply with legal standards. Additionally, by promoting respectful behavior, the system aims to create a positive and safe environment for all users. Failure to comply with these guidelines may result in suspension or termination of user privileges within the platform.', '2024-04-23 19:53:52'),
(12, 4, 'Account Security', 'Users are responsible for maintaining the security of their accounts, including but not limited to safeguarding login credentials such as usernames and passwords. Any unauthorized use of an account must be reported immediately to the system administrators. Users should also refrain from sharing their account details with third parties to prevent unauthorized access.', '2024-04-23 19:54:23'),
(13, 4, 'Fair Usage Policy', 'The transport management system operates under a fair usage policy to ensure equitable access and optimal performance for all users. Users are expected to utilize system resources responsibly and refrain from engaging in activities that may excessively burden the platform or disrupt its operation. This includes but is not limited to spamming, overloading the system with excessive requests, or engaging in any form of malicious activity.', '2024-04-23 19:54:46'),
(14, 4, 'Data Privacy and Confidentiality', 'The transport management system is committed to protecting the privacy and confidentiality of user data in accordance with applicable laws and regulations. Personal information collected from users will be used solely for the purpose of facilitating transportation services and will not be shared with third parties without explicit consent, except as required by law or in the event of a legal obligation.', '2024-04-23 19:55:10'),
(16, 25, 'Reservation and Booking', 'Route Ready provides a platform for users to reserve vehicles for business trips. Users must provide accurate information regarding the date, time, and duration of the trip. Reservations are subject to availability and confirmation by Route Ready.', '2024-04-25 18:38:54'),
(17, 25, 'Vehicle Usage', 'Vehicles provided by Route Ready are for business purposes only. Users are responsible for the safe and lawful operation of the vehicle during the trip. Any unauthorized use of the vehicle is strictly prohibited.', '2024-04-25 18:39:19'),
(18, 25, 'Compliance', 'Users must comply with all applicable laws and regulations while using Route Ready services. Users are responsible for obtaining any necessary permits or licenses required for their trip.', '2024-04-25 18:39:58'),
(19, 25, 'Payment and Billing', 'Users agree to pay all applicable fees and charges associated with their reservations. Payments must be made in accordance with Route Ready&#39;s billing terms and conditions. Route Ready reserves the right to suspend or terminate services for non-payment.', '2024-04-25 18:40:19'),
(20, 25, 'Cancellation and Refunds', 'Users may cancel reservations subject to Route Ready&#39;s cancellation policy. Refunds, if applicable, will be issued in accordance with Route Ready&#39;s refund policy.', '2024-04-25 18:40:50'),
(21, 25, 'Data Privacy', 'Route Ready collects and processes user data in accordance with its privacy policy. User data will only be used for the purpose of providing and improving Route Ready&#39;s services.', '2024-04-25 18:41:23'),
(22, 25, 'Termination of Services', 'Route Ready reserves the right to terminate services or suspend user accounts for violations of these terms and conditions. Users may terminate their account at any time by following the designated process.', '2024-04-25 18:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `day` varchar(10) NOT NULL,
  `time_slot` varchar(30) NOT NULL,
  `activity` varchar(20) NOT NULL,
  `driver_id` varchar(10) NOT NULL,
  `vehicle_id` varchar(10) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`day`, `time_slot`, `activity`, `driver_id`, `vehicle_id`, `date`) VALUES
('Monday', '10:00 PM - 12:00 PM', 'to nugegoda', '12', '12', NULL),
('Friday', '6:00 PM - 8:00 PM', 'dehiwala', '23', '34', NULL),
('Saturday', '10:00 AM - 12:00 NOON', 'to nugegoda', '43', '55', NULL),
('Monday', '6:00 AM - 8:00 AM', 'nawala', '2333', '3434', NULL),
('Monday', '6:00 AM - 8:00 AM', 'pannipitiya', '4433', '5454', NULL),
('Monday', '8:00 PM - 10:00 PM', 'to nugegoda', '9988', '1234', NULL),
('Wednesday', '2:00 PM - 4:00 PM', 'to nugegoda', '6868', '1234', '2024-04-24'),
('Sunday', '6:00 PM - 8:00 PM', 'malabe', '8556', '4776', '2024-04-28'),
('Wednesday', '6:00 AM - 8:00 AM', 'to nugegoda', '2323', '3422', '2024-05-01'),
('Thursday', '6:00 AM - 8:00 AM', 'to nugegoda', '5544', '3364', '2024-05-02'),
('Thursday', '6:00 AM - 8:00 AM', 'to nugegoda', '5544', '3364', '2024-05-02'),
('Wednesday', '12:00 NOON - 2:00 PM', 'townhall', '7856', '4654', '2024-05-01'),
('Wednesday', '12:00 NOON - 2:00 PM', 'townhall', '7856', '4654', '2024-05-01'),
('Sunday', '4:00 PM - 6:00 PM', 'to nugegoda', '5544', '4009', '2024-04-28'),
('Friday', '6:00 AM - 8:00 AM', 'ususus', '6363', '4744', '2024-05-03'),
('Friday', '6:00 AM - 8:00 AM', 'ususus', '6363', '4744', '2024-05-03'),
('Saturday', '6:00 AM - 8:00 AM', 'ref', '2332323', '2332', '2024-05-10'),
('Saturday', '6:00 AM - 8:00 AM', 'hyuh', '3323', '32', '2024-05-04'),
('Saturday', '6:00 AM - 8:00 AM', 'hyuh', '3323', '32', '2024-05-04'),
('Sunday', '6:00 AM - 8:00 AM', 'gygvu', '4534', '9078', '2024-05-05'),
('Saturday', '12:00 NOON - 2:00 PM', 'dsfdf', '434', '34443', '2024-05-04'),
('Tuesday', '10:00 AM - 12:00 NOON', 'sdd', '1234', '1234', '2024-04-30'),
('Tuesday', '10:00 AM - 12:00 NOON', 'sdd', '1234', '1234', '2024-04-30'),
('Tuesday', '10:00 AM - 12:00 NOON', 'sdd', '1234', '1234', '2024-04-30'),
('Tuesday', '6:00 AM - 8:00 AM', 'uuig', '5764', '3543', '2024-04-30'),
('Tuesday', '6:00 AM - 8:00 AM', 'uuig', '5764', '3543', '2024-04-30'),
('Thursday', '6:00 AM - 8:00 AM', '', '', '', '2024-05-02'),
('Saturday', '6:00 AM - 8:00 AM', 'hyuh', '3323', '32', '2024-05-04'),
('Wednesday', '12:00 NOON - 2:00 PM', 'test', '22', '134', '2024-05-01'),
('Wednesday', '6:00 AM - 8:00 AM', 'nugegoda', '22', 'VCEB1234', '2024-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `transportreservation`
--

CREATE TABLE `transportreservation` (
  `ReservationID` int(11) NOT NULL,
  `ScheduleType` varchar(200) NOT NULL,
  `Route` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `PickUp` varchar(200) NOT NULL,
  `DropOff` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transportreservation`
--

INSERT INTO `transportreservation` (`ReservationID`, `ScheduleType`, `Route`, `Date`, `PickUp`, `DropOff`, `id`) VALUES
(2, 'ToWork', 'Kaluthara', '2024-04-22', 'maharagama', '', 18),
(4, 'BothWays', 'Gampaha', '2024-04-22', 'maharagama', 'maharagama', 18),
(5, 'ToWork', 'Awissawella', '2024-04-22', 'maharagama', '', 18),
(9, 'BothWays', 'Kaluthara', '2024-04-25', 'Maharagama', 'Maharagama', 18),
(10, 'BothWays', 'Kaluthara', '2024-04-26', 'Maharagama wattegedara', 'Maharagama', 25),
(11, 'BothWays', 'Nugegoda', '2024-04-28', 'Maharagama', 'Maharagama', 28),
(14, 'ToWork', 'Kaluthara', '2024-05-01', 'panadura', '', 49);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `name`, `company_name`, `contact_num`, `address`, `designation`, `date`, `email`, `password`, `status`) VALUES
(20, 'DR030213', 'Thenuri', '', '01255455226', 'Matara', 'hrmanager', '2024-04-22 22:43:34', 'thenuri2@gmail.com', '$2y$10$Q/.RDweVksnBLR0RUGp1Nuox3X0ceSMiI.oj42csl6Yiy7nM6B2IG', 'approved'),
(22, 'AD00422', 'Ranuri', '', '0711234567', 'Colombo', 'admin', '2024-04-24 18:23:18', 'Ranuri@gmail.com', '$2y$10$vh5EEfUf5cufbk/gwrfwYeSdHZv3q6wtq6zAg51rDu2Qyb76T3piS', 'approved'),
(25, 'HR00422', 'Tharushi', '', '01255455226', 'kaluthara', 'hrmanager', '2024-04-25 14:33:21', 'tharushi@gmail.com', '$2y$10$baAHraa08D36kpgC3vfBJuhIBJUw37ru/0um111MMflv1G3vw3O/K', 'approved'),
(27, 'DR2024', 'Keheliya Thennakoon', '', '1234567890', 'Colombo', 'driver', '2024-04-25 19:50:23', 'keheliya4@gmail.com', '$2y$10$QjDHTdeEDxwgm7F.5.MwvO98v5zJFamz99g4tXqiCNKgpbW8pBGr6', 'approved'),
(28, 'EMP2021', 'danudu', '', '0718210386', 'Matara', 'employee', '2024-04-26 00:24:50', 'danudu@gmail.com', '$2y$10$kcV46.UOx87hJf.jLgQ3CuOd7c3H5Fc6FLOk21MRJIk.Yy7ftGtSS', 'approved'),
(29, 'EMP00422', 'Ravindu', '', '1213242342523', 'Hikkaduwa', 'employee', '2024-04-26 14:40:22', 'ravindu@gmail.com', '$2y$10$rEHqud3NLyxNIltRGBKQSugCRu23gpdB3U.A5K6rchHyTckfyFj2O', 'approved'),
(30, 'EMP3232', 'Rumal', '', '0711234567', 'Kurunegala', 'employee', '2024-04-26 14:49:00', 'rumal@gmail.com', '$2y$10$iSnFGMpZxiyLbEnR6wHIp.tDOmwWX27oA.JcahVphpB.EB9KL0yxC', 'approved'),
(31, 'DR5959', 'Vinupa', '', '01255455226', 'Colombo', 'driver', '2024-04-26 22:13:54', 'vinupa@gmail.com', '$2y$10$xVn59OW2DbESft639p49WOQor96bWInqu3DuMbuCnSG2QlTI53iYG', 'approved'),
(35, '', 'krishan', '', '212121312131', 'matrara', 'osdriver', '2024-04-28 21:54:40', 'krishan2@gmail.com', '$2y$10$asTm2x8mxjF0PMreY1otku1yoC8L7.48w1tLBYRkuTkyfr88bT7x6', 'rejected'),
(36, '', 'dulaj', '', '0718210386', 'Colombo', 'osdriver', '2024-04-28 22:33:08', 'dulaj@gmail.com', '$2y$10$nD.pZMPNPnChlSx24jY81OtdN/HFh6JRZ1cJxVmD9xWOrFVa5hjgy', 'pending'),
(42, '', 'Keheliya', '', '0718210386', 'Colombo', 'osdriver', '2024-04-29 11:38:01', 'keheliyakeheliya2@gmail.com', '$2y$10$3Vw9LXvaNmWUzeayUABvuODLrJODoB4Q4MnyAYbi/S8/Yn9K.ZKUa', 'pending'),
(43, '', 'Ashan', '', '0712592209', 'Galle', 'osdriver', '2024-04-29 11:40:03', 'ashan3@gmail.com', '$2y$10$jhS9zP7iahAMmnOnRVidX.bf.AWmJimAhhU/NhnTmFHTXa6NBDdjm', 'pending'),
(47, 'DR1987', 'Ruwan Chandrasiri', '', '0701234567', 'Thihagoda', 'driver', '2024-04-29 22:29:43', 'ruwan@gmail.com', '$2y$10$i9F0KLaFkvLEFVnxlt5xEuEq53GpLcNB3d/Izz.VV2BpG5OqkgFJO', 'pending'),
(48, '', 'Krishan Harsha', '', '0712592209', 'Ebuldeniya', 'osdriver', '2024-04-29 22:33:58', 'krishanharsha@gmail.com', '$2y$10$HcXt7trtuosWUTbbRpVB3u9qYUVD.v/7bZXKnyvsrlVf9t7unnZcu', 'rejected'),
(49, 'EMP002', 'Saman Kumara', '', '0775347203', '5/7, Galle Road , Colombo', 'employee', '2024-04-30 12:05:01', 'saman@gmail.com', '$2y$10$WBkfqsc9wYQcMdvEULkt1uGpcUKkiBcAibPPPZBhM6IpksOsSChqu', 'approved'),
(50, 'EMP004', 'Prasanna Kumara', '', '0775347294', '5/4, galle road, panadura', '', '2024-04-30 13:11:34', 'prasanna@gmail.com', '$2y$10$hQyQm.PPvnxlFdEBi.bW0uH2BP6T0QbETTUAR6MZCnm1UOOlkwD0a', 'pending'),
(52, 'EMP0604', 'Pasan Samarathunga', 'UCSC', '0712323245', '22/4 , Pathiragoda Rd, Wiharawatta, Maharagama', 'employee', '2024-04-30 14:11:37', 'pasan@gmail.com', '$2y$10$qBGcR/ZO7XZdSDvKK3jMOe6Kl9pCmkPIpz0aBvlaMrJaF5nTFi0Q.', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `vehicledetails`
--

CREATE TABLE `vehicledetails` (
  `ID` int(11) NOT NULL,
  `Registration_Number` varchar(255) NOT NULL,
  `Vehicle_Number` varchar(255) NOT NULL,
  `Vehicle_Name` varchar(255) NOT NULL,
  `Vehicle_Year` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `r_year` int(11) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `insu_pro` varchar(255) NOT NULL,
  `insu_pn` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `V_Image` blob DEFAULT NULL,
  `images1` varchar(255) DEFAULT NULL,
  `images2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vehicledetails`
--

INSERT INTO `vehicledetails` (`ID`, `Registration_Number`, `Vehicle_Number`, `Vehicle_Name`, `Vehicle_Year`, `model`, `r_year`, `vin`, `insu_pro`, `insu_pn`, `capacity`, `V_Image`, `images1`, `images2`) VALUES
(12, 'VCEB1234', 'CEC2423', 'van', 2018, 'model 2', 2016, '232243242322', 'Janashakthi', '123455', 15, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_trips`
--

CREATE TABLE `work_trips` (
  `tripID` int(11) NOT NULL,
  `employee_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `numofPassengers` int(11) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `tripDate` date NOT NULL,
  `tripTime` time NOT NULL,
  `id` int(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_trips`
--

INSERT INTO `work_trips` (`tripID`, `employee_name`, `email`, `reason`, `numofPassengers`, `destination`, `comments`, `tripDate`, `tripTime`, `id`, `status`) VALUES
(4, 'danudu', 'danudu@gmail.com', 'Company visit', 2, 'matara', 'Driver need to wait until we come', '2024-04-23', '03:02:00', 18, ''),
(10, 'danudu', 'danudu@gmail.com', 'dsda', 2, 'matara', 'sdafs', '2024-04-30', '07:20:00', 18, ''),
(12, 'danudu', 'danudu@gmail.com', 'Company visit', 2, 'matara', 'asds', '2024-04-29', '10:36:00', 28, 'approved'),
(13, 'danudu', 'danudu@gmail.com', 'Company visit', 2, 'matara', 'sdfsd', '2024-04-28', '23:36:00', 28, 'approved'),
(14, 'Ravindu', 'ravindu@gmail.com', 'Company visit', 6, 'Kandy', 'no comment', '2024-05-02', '03:00:00', 29, 'pending'),
(17, 'Saman Kumara', 'saman@gmail.com', 'meeting', 4, 'matara', '', '2024-05-01', '19:31:00', 49, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bankID`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `monthlyreservation`
--
ALTER TABLE `monthlyreservation`
  ADD PRIMARY KEY (`MReservationID`);

--
-- Indexes for table `outsourcedrivers`
--
ALTER TABLE `outsourcedrivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportreservation`
--
ALTER TABLE `transportreservation`
  ADD PRIMARY KEY (`ReservationID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `work_trips`
--
ALTER TABLE `work_trips`
  ADD PRIMARY KEY (`tripID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `monthlyreservation`
--
ALTER TABLE `monthlyreservation`
  MODIFY `MReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `outsourcedrivers`
--
ALTER TABLE `outsourcedrivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transportreservation`
--
ALTER TABLE `transportreservation`
  MODIFY `ReservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `work_trips`
--
ALTER TABLE `work_trips`
  MODIFY `tripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
