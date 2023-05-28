-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 04:18 AM
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
-- Database: `sfs`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getStatus` ()   BEGIN
SELECT COUNT(*) as count, status from stud group by status;
End$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login_admin` (IN `p_email` TEXT, IN `p_password` TEXT)   BEGIN
	declare ret int;
    declare stat int;
    if exists(select * from admin where email = p_email and password = p_password) THEN
    	set stat = (select status from admin where email = p_email and password = p_password);
        if stat = 1 THEN
        	set ret = 1;
        	select *,ret from admin where email = p_email and password = p_password;
        ELSE
        	set ret = 2;
            select ret;
        end if;
    ELSE 
    	set ret = 0;
        	select ret;
    end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login_student` (IN `p_student_id` INT, IN `p_last_name` TEXT)   BEGIN
	declare ret int;
    declare stat int;
    if exists(select * from stud where student_id = p_student_id and last_name = p_last_name) THEN
    	set stat = (select status from stud where student_id = p_student_id and last_name = p_last_name);
        if stat = 1 THEN
        	set ret = 1;
        	select *,ret from stud where student_id = p_student_id and last_name = p_last_name;
        ELSE
        	set ret = 2;
            select ret;
        end if;
    ELSE 
    	set ret = 0;
        	select ret;
    end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_payment` (IN `p_paymentType` INT, IN `p_amount` INT)   BEGIN

INSERT INTO admin(paymentType,amount) VALUES(p_paymentType,p_amount);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_reg` (IN `p_name` TEXT, IN `p_email` TEXT, IN `p_address` TEXT, IN `p_password` TEXT)   BEGIN
DECLARE cout int;

if exists(SELECT * FROM admin WHERE name = p_name) THEN
	set cout = 1;
    SELECT cout;
ELSE
	INSERT INTO admin(name,email,address,password,created) VALUES(p_name,p_email,p_address,p_password,now());
    
    set cout = 0;
    SELECT cout;
    
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_stud` (IN `p_student_id` INT, IN `p_last_name` TEXT, IN `p_first_name` TEXT, IN `p_course` TEXT, IN `p_year_sec` TEXT, IN `p_email` TEXT, IN `p_address` TEXT, IN `p_status` INT(6))   BEGIN
DECLARE cout int;

if exists(SELECT * FROM stud WHERE student_id = p_student_id) THEN
	set cout = 1;
    SELECT cout;
ELSE
	INSERT INTO stud(student_id,last_name,first_name,course,year_sec,email,address,status,date) VALUES(p_student_id,p_last_name,p_first_name,p_course,p_year_sec,p_email,p_address,p_status,now());
    
    set cout = 0;
    SELECT cout;
    
end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_updateStud` (IN `p_student_id` INT, IN `p_id` INT, IN `p_email` TEXT, IN `p_status` INT)   BEGIN
IF p_student_id = '' THEN
	UPDATE stud set email_ = p_email, status = p_status where id = p_id;
else 
    UPDATE stud set student_id = p_student_id, email = p_email, status = p_status where id = p_id;
end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `address`, `password`, `created`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'lapu-lapu city', '21232f297a57a5a743894a0e4a801fc3', '2023-04-27 17:59:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `studId` int(11) NOT NULL,
  `paymentType` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `studId`, `paymentType`, `amount`, `status`) VALUES
(4, 4, 1, 100000, 1),
(5, 3, 2, 50000, 0),
(6, 9, 3, 2000, 1),
(9, 5, 1, 12, 2),
(10, 6, 1, 0, 2),
(11, 6, 1, 123, 1),
(12, 3, 2, 123, 0),
(13, 3, 1, 123, 0),
(14, 3, 2, 123, 0),
(15, 3, 3, 500, 0),
(16, 123, 1, 5000, 1),
(17, 8, 1, 5000, 1),
(18, 8, 2, 2000, 1),
(19, 8, 1, 500, 1),
(20, 123, 2, 1231, 1),
(21, 123, 1, 123123, 2),
(22, 123, 1, 1234578, 2),
(23, 123, 1, 1234567, 2),
(24, 9, 2, 800, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stud`
--

CREATE TABLE `stud` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `course` varchar(225) NOT NULL,
  `year_sec` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stud`
--

INSERT INTO `stud` (`id`, `student_id`, `last_name`, `first_name`, `course`, `year_sec`, `email`, `address`, `status`, `date`) VALUES
(125, 1324, '123', '123', '123', '213', '123', '123', 2, '2023-05-17'),
(126, 98098, '098089', '908-098-09', '8-098-098', '-098-098-098', '-098-098-0', '98-098-098', 2, '2023-05-18'),
(128, 1, '123', 'sdf', 'sdf', 'asdf', 'asdf', 'adsf', 1, '2023-05-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `stud`
--
ALTER TABLE `stud`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stud`
--
ALTER TABLE `stud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
