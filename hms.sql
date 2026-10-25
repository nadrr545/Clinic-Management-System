-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2022 at 09:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '123456', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) NOT NULL,
  `doctorId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `consultancyFees` int(11) NOT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `userStatus` int(11) NOT NULL,
  `doctorStatus` int(11) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'دندانپزشک', 7, 1, 1500000, '2022-09-09', '10:22', '2022-09-10 07:20:18', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `submitDateTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `guest_name`, `Email`, `PhoneNo`, `subject`, `submitDateTime`) VALUES
(1, 'جواد رضوی', 'test1@gmail.com', '91252325', ' خیلی عالی بود', '2022-08-23 14:29:04'),
(2, 'ویدا رضایی', 'test2@gmail.com', '2526625', 'پیام شما ارسال شد', '2022-08-23 14:29:04'),
(3, 'علی عظیمی', 'test3@gmail.com', '895265521', ' یک پیام تستی', '2022-08-23 14:29:44'),
(4, 'رضا خواجوی', 'test4@gmail.com', '0915326000', ' پیام تستی دوم', '2022-08-23 14:33:32'),
(5, 'تست', 'test@demo.com', '0123456', ' این یک پیام تستی است.', '2022-09-10 07:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `docFees` varchar(255) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `docEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'دندانپزشک', 'دکتر علی صمیمی', 'اتاق 24', '850000', 285703354, 'ali@gmail.com', '123456', '2016-12-29 06:25:37', ''),
(3, 'متخصص قرنیه و چشم', 'دکتر مریم اسلامی', 'طبقه 15 اتاق 24', '1500000', 523699999, 'maryam@gmail.com', '123456', '2017-01-07 07:43:35', ''),
(4, 'پزشک عمومی', 'دکتر رضا عباسی', 'طبقه 3 اتاق 12', '1600000', 25668888, 'reza@gmail.com', '123456', '2017-01-07 07:45:09', ''),
(5, 'متخصص پوست', 'دکتر رقیه حبیبی', 'اتاق 15', '8500000', 442166644646, 'ro-habibi@gmail.com', '123456', '2017-01-07 07:47:07', ''),
(6, 'متخصص قلب و عروق', 'دکتر اسماعیل رحمانی', 'اتاق 18', '1250000', 45497964, 'esmaeil@test.com', '123456', '2017-01-07 07:52:50', ''),
(7, 'دندانپزشک', 'دکتر پروانه عباس پور', 'اتاق 45', '1500000', 852888888, 'parvaneh@demo.com', '123456', '2017-01-07 08:08:58', ''),
(8, 'متخصص مغز و اعصاب', 'امیر عباسیان', 'تبریز', '500', 914235, 'amir@gmail.com', '123456', '2022-08-22 12:33:05', ''),
(9, 'متخصص زنان و زایمان', 'علی اصلانی', 'شیراز', '15000', 912000000, 'aslani@gmail.com', '123456', '2022-08-23 12:53:46', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 7, 'parvaneh@demo.com', 0x3132372e302e302e3100000000000000, '2022-09-10 07:21:41', '10-09-2022 11:51:53 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'متخصص زنان و زایمان', '2016-12-28 06:37:25', '24-08-2022 01:55:42 PM'),
(2, 'پزشک عمومی', '2016-12-28 06:38:12', '24-08-2022 01:56:35 PM'),
(3, 'متخصص پوست', '2016-12-28 06:38:48', '24-08-2022 01:56:54 PM'),
(5, 'متخصص قلب و عروق', '2016-12-28 06:39:51', '24-08-2022 01:59:38 PM'),
(6, 'دندانپزشک', '2016-12-28 06:40:08', '24-08-2022 01:59:54 PM'),
(7, 'متخصص مغز و اعصاب', '2016-12-28 06:41:18', '24-08-2022 02:00:11 PM'),
(9, 'متخصص قرنیه و چشم', '2016-12-28 07:37:39', '24-08-2022 02:00:32 PM'),
(10, 'جراح عمومی', '2017-01-07 08:07:53', '24-08-2022 02:01:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'mina@gmail.com', 0x3132372e302e302e3100000000000000, '2022-09-10 07:19:47', '10-09-2022 11:50:38 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(1, 'مینا رضایی', 'خیابان 2 کوچه5 پلاک 4', 'تهران', 'زن', 'mina@gmail.com', '123456', '2016-12-26 07:03:09', ''),
(2, 'علی جلیلی', 'کوچه 4 پلاک 20', 'شیراز', 'مرد', 'jalili@gmail.com', '123456', '2016-12-30 05:34:39', ''),
(3, 'ابراهیم آبادی', 'کوچه 8 پلاک 9', 'تبریز', 'مرد', 'ebrahim@gmail.com', '123456', '2017-01-07 06:36:53', ''),
(4, 'رسول عبادی', 'خیابان 1کوچه1 پلاک 4', 'مشهد', 'مرد', 'rasul@gmail.com', '123456', '2017-01-07 07:41:14', ''),
(5, 'شهلا حبیبی', 'خیابان 19 کوچه 55 پلاک 4', 'اصفهان', 'زن', 'shahla@gmail.com', '123456', '2017-01-07 08:00:26', ''),
(6, 'علی رضایی', 'خیابان 22 کوچه1 پلاک 4', 'تهران', 'مرد', 'ali-re@demo.com', '123456', '2022-08-22 14:59:17', ''),
(7, 'فاطمه', 'خیابان 1 کوچه 2', 'کرج', 'زن', 'fati123@gmail.com', '123456', '2022-09-10 06:28:26', ''),
(8, 'محمد', 'خیابان 43 کوچه 12', 'تبریز', 'مرد', 'mohammad@demo.com', '123456', '2022-09-10 06:36:50', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
