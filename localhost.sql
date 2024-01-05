-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 09, 2023 at 04:20 PM
-- Server version: 8.0.34-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wcss_grad_gradB`
--
CREATE DATABASE IF NOT EXISTS `gradB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gradB`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(128) NOT NULL,
  `admin_email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`) VALUES
(11, 'Arham Islam', 'aisla1@ocdsb.ca'),
(13, 'Enes', 'egenc2@ocdsb.ca'),
(21, 'Testing Admin', 'tester@ADMIN.com'),
(22, 'Daniel', 'dsohr1@ocdsb.ca'),
(26, 'Abdul Rasool', 'araso2@ocdsb.ca'),
(27, 'Stephen Emmell', 'stephen.emmell@ocdsb.ca');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `award_id` int NOT NULL,
  `award_name` varchar(256) NOT NULL,
  `award_is_always` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`award_id`, `award_name`, `award_is_always`) VALUES
(1, 'smartPerson', 0),
(3, 'Top 1%', 0),
(7, 'Ontario Secondary School Diploma', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int NOT NULL,
  `log_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_message` varchar(1024) NOT NULL,
  `log_user_id` int NOT NULL,
  `log_type` enum('ADMIN','STUDENT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `log_timestamp`, `log_message`, `log_user_id`, `log_type`) VALUES
(1, '2023-06-09 21:51:54', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(2, '2023-06-09 21:52:01', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(3, '2023-06-09 21:52:43', 'araso2@ocdsb.ca logged in', 12, 'ADMIN'),
(4, '2023-06-09 21:54:53', 'araso2@ocdsb.ca logged in', 12, 'ADMIN'),
(5, '2023-06-09 22:00:42', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(6, '2023-06-09 22:01:34', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(7, '2023-06-09 22:01:41', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(8, '2023-06-09 22:01:46', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(9, '2023-06-09 22:01:50', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(10, '2023-06-09 22:03:41', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(11, '2023-06-09 22:03:50', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(12, '2023-06-09 22:03:52', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(13, '2023-06-09 22:04:48', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(14, '2023-06-09 22:07:10', 'araso2@ocdsb.ca logged in', 12, 'ADMIN'),
(15, '2023-06-09 22:07:45', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(16, '2023-06-09 22:08:03', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(17, '2023-06-09 22:08:11', 'araso2@ocdsb.ca logged in', 12, 'ADMIN'),
(18, '2023-06-09 22:09:06', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(19, '2023-06-10 04:36:14', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(20, '2023-06-11 03:09:52', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(21, '2023-06-12 17:33:18', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(22, '2023-06-12 20:26:22', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(23, '2023-06-12 21:43:35', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(24, '2023-06-12 21:46:50', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(25, '2023-06-12 22:10:51', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(26, '2023-06-12 22:23:14', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(27, '2023-06-13 01:15:35', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(28, '2023-06-13 02:16:24', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(29, '2023-06-13 02:19:25', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(30, '2023-06-13 14:12:47', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(31, '2023-06-13 18:18:28', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(32, '2023-06-13 19:01:23', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(33, '2023-06-13 20:35:03', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(34, '2023-06-13 21:47:08', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(35, '2023-06-13 21:51:33', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(36, '2023-06-13 21:51:55', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(37, '2023-06-13 22:09:45', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(38, '2023-06-13 22:12:40', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(39, '2023-06-13 22:24:18', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(40, '2023-06-13 22:27:29', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(41, '2023-06-13 22:31:17', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(42, '2023-06-13 22:34:34', 'An error was submitted from the landing page', -1, 'STUDENT'),
(43, '2023-06-13 22:34:46', 'An error was submitted from the landing page', -1, 'STUDENT'),
(44, '2023-06-13 22:34:53', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(45, '2023-06-13 22:41:54', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(46, '2023-06-13 22:44:30', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(47, '2023-06-13 23:37:05', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(48, '2023-06-13 23:41:50', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(49, '2023-06-14 00:03:31', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(50, '2023-06-14 01:20:08', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(51, '2023-06-14 01:20:22', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(52, '2023-06-14 01:24:40', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(53, '2023-06-14 01:24:46', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(54, '2023-06-14 01:27:16', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(55, '2023-06-14 01:28:07', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(56, '2023-06-14 01:31:57', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(57, '2023-06-14 01:32:07', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(58, '2023-06-14 01:32:46', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(59, '2023-06-14 01:32:52', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(60, '2023-06-14 01:33:55', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(61, '2023-06-14 01:46:02', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(62, '2023-06-14 01:53:47', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(63, '2023-06-14 03:13:45', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(64, '2023-06-14 03:31:51', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(65, '2023-06-14 03:32:17', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(66, '2023-06-14 03:32:26', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(67, '2023-06-14 03:32:37', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(68, '2023-06-14 03:33:30', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(69, '2023-06-14 03:35:46', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(70, '2023-06-14 03:42:48', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(71, '2023-06-14 03:42:56', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(72, '2023-06-14 03:43:07', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(73, '2023-06-14 03:43:48', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(74, '2023-06-14 03:43:57', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(75, '2023-06-14 03:44:04', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(76, '2023-06-14 04:09:08', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(77, '2023-06-14 04:13:54', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(78, '2023-06-14 11:53:32', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(79, '2023-06-14 11:58:16', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(80, '2023-06-14 11:59:16', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(81, '2023-06-14 12:01:49', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(82, '2023-06-14 12:21:16', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(83, '2023-06-14 12:28:26', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(84, '2023-06-14 12:31:50', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(85, '2023-06-14 12:47:39', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(86, '2023-06-14 12:47:44', 'flameblade296yt@gmail.com has submitted an error', 21, 'STUDENT'),
(87, '2023-06-14 12:48:46', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(88, '2023-06-14 12:53:05', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(89, '2023-06-14 15:09:31', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(90, '2023-06-14 18:49:39', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(91, '2023-06-14 19:52:24', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(92, '2023-06-14 19:52:37', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(93, '2023-06-14 21:14:01', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(94, '2023-06-14 21:14:38', 'daniel.sohrabi.2005@gmail.com has submitted an error', 22, 'STUDENT'),
(95, '2023-06-14 21:19:48', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(96, '2023-06-14 21:20:19', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(97, '2023-06-14 21:26:04', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(98, '2023-06-14 21:45:41', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(99, '2023-06-14 21:48:05', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(100, '2023-06-14 21:48:12', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(101, '2023-06-14 22:00:16', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(102, '2023-06-14 22:00:29', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(103, '2023-06-14 22:00:52', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(104, '2023-06-14 22:01:13', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(105, '2023-06-14 22:03:11', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(106, '2023-06-14 23:48:00', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(107, '2023-06-14 23:53:40', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(108, '2023-06-14 23:56:27', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(109, '2023-06-15 00:00:51', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(110, '2023-06-15 00:41:43', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(111, '2023-06-15 00:42:03', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(112, '2023-06-15 01:38:51', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(113, '2023-06-15 01:41:55', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(114, '2023-06-15 01:47:12', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(115, '2023-06-15 02:15:26', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(116, '2023-06-15 02:17:11', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(117, '2023-06-15 02:18:02', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(118, '2023-06-15 02:19:01', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(119, '2023-06-15 02:29:54', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(120, '2023-06-15 02:31:42', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(121, '2023-06-15 02:32:03', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(122, '2023-06-15 02:39:32', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(123, '2023-06-15 12:30:09', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(124, '2023-06-15 12:38:16', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(125, '2023-06-15 12:38:21', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(126, '2023-06-15 13:20:05', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(127, '2023-06-15 13:29:23', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(128, '2023-06-15 13:29:58', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(129, '2023-06-15 13:31:12', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(130, '2023-06-15 13:35:34', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(131, '2023-06-15 13:36:13', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(132, '2023-06-15 13:49:05', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(133, '2023-06-15 13:50:05', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(134, '2023-06-15 13:56:58', 'An error was submitted from the landing page', -1, 'STUDENT'),
(135, '2023-06-15 13:57:03', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(136, '2023-06-15 14:01:42', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(137, '2023-06-15 14:03:06', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(138, '2023-06-15 14:12:43', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(139, '2023-06-15 16:26:37', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(140, '2023-06-15 16:26:38', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(141, '2023-06-15 16:43:45', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(142, '2023-06-15 20:13:19', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(143, '2023-06-15 20:27:12', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(144, '2023-06-15 20:29:13', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(145, '2023-06-15 20:29:34', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(146, '2023-06-15 22:25:10', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(147, '2023-06-15 22:25:18', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(148, '2023-06-15 23:25:59', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(149, '2023-06-15 23:26:17', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(150, '2023-06-15 23:26:24', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(151, '2023-06-16 00:40:55', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(152, '2023-06-16 00:45:12', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(153, '2023-06-16 02:18:47', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(154, '2023-06-16 02:33:14', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(155, '2023-06-16 02:33:48', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(156, '2023-06-16 02:42:54', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(157, '2023-06-16 02:43:58', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(158, '2023-06-16 02:44:08', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(159, '2023-06-16 02:44:16', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(160, '2023-06-16 02:44:40', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(161, '2023-06-16 02:44:54', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(162, '2023-06-16 02:45:35', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(163, '2023-06-16 02:47:50', 'flameblade296yt@gmail.com has submitted an error', 21, 'STUDENT'),
(164, '2023-06-16 02:49:03', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(165, '2023-06-16 03:09:54', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(166, '2023-06-16 04:07:49', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(167, '2023-06-16 04:07:58', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(168, '2023-06-16 04:11:52', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(169, '2023-06-16 04:11:57', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(170, '2023-06-16 04:13:31', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(171, '2023-06-16 04:13:35', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(172, '2023-06-16 04:14:39', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(173, '2023-06-16 04:14:45', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(174, '2023-06-16 04:14:48', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(175, '2023-06-16 04:23:40', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(176, '2023-06-16 04:38:25', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(177, '2023-06-16 04:53:05', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(178, '2023-06-16 04:54:11', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(179, '2023-06-16 04:56:51', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(180, '2023-06-16 04:57:55', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(181, '2023-06-16 11:58:06', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(182, '2023-06-16 11:59:10', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(183, '2023-06-16 12:00:12', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(184, '2023-06-16 12:01:45', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(185, '2023-06-16 12:02:08', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(186, '2023-06-16 12:02:55', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(187, '2023-06-16 12:10:26', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(188, '2023-06-16 12:10:38', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(189, '2023-06-16 12:10:39', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(190, '2023-06-16 12:11:05', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(191, '2023-06-16 12:11:12', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(192, '2023-06-16 12:11:54', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(193, '2023-06-16 12:12:02', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(194, '2023-06-16 12:13:03', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(195, '2023-06-16 12:13:14', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(196, '2023-06-16 12:13:51', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(197, '2023-06-16 12:14:09', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(198, '2023-06-16 12:14:23', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(199, '2023-06-16 12:14:36', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(200, '2023-06-16 12:14:46', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(201, '2023-06-16 12:15:49', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(202, '2023-06-16 12:16:08', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(203, '2023-06-16 12:16:14', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(204, '2023-06-16 12:16:23', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(205, '2023-06-16 12:16:33', 'flameblade296yt@gmail.com has saved data', 21, 'STUDENT'),
(206, '2023-06-16 12:17:03', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(207, '2023-06-16 12:17:16', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(208, '2023-06-16 12:17:27', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(209, '2023-06-16 12:23:01', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(210, '2023-06-16 13:02:55', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(211, '2023-06-16 15:32:10', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(212, '2023-06-16 15:32:29', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(213, '2023-06-16 18:00:28', 'stephen.emmell@ocdsb.ca logged in', 20, 'STUDENT'),
(214, '2023-06-16 18:00:50', 'stephen.emmell@ocdsb.ca has saved data', 20, 'STUDENT'),
(215, '2023-06-16 18:24:34', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(216, '2023-06-17 00:01:32', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(217, '2023-06-17 00:49:25', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(218, '2023-06-17 00:49:46', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(219, '2023-06-17 00:50:01', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(220, '2023-06-17 14:42:38', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(221, '2023-06-17 15:48:59', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(222, '2023-06-17 15:49:07', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(223, '2023-06-17 17:22:31', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(224, '2023-06-17 17:36:55', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(225, '2023-06-17 17:37:01', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(226, '2023-06-17 18:41:57', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(227, '2023-06-17 18:42:04', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(228, '2023-06-17 18:56:21', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(229, '2023-06-17 18:56:43', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(230, '2023-06-17 18:56:49', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(231, '2023-06-17 18:57:09', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(232, '2023-06-17 19:10:00', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(233, '2023-06-17 19:10:06', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(234, '2023-06-17 19:10:31', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(235, '2023-06-17 19:12:21', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(236, '2023-06-17 19:20:34', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(237, '2023-06-17 19:29:02', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(238, '2023-06-17 19:38:33', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(239, '2023-06-17 19:47:54', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(240, '2023-06-17 19:48:46', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(241, '2023-06-17 19:53:57', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(242, '2023-06-17 19:54:42', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(243, '2023-06-17 19:55:50', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(244, '2023-06-17 19:57:52', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(245, '2023-06-17 20:00:30', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(246, '2023-06-17 20:36:02', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(247, '2023-06-17 20:36:10', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(248, '2023-06-17 20:36:45', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(249, '2023-06-17 20:37:13', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(250, '2023-06-17 20:37:24', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(251, '2023-06-17 20:37:33', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(252, '2023-06-17 20:37:51', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(253, '2023-06-17 20:38:40', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(254, '2023-06-17 20:38:46', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(255, '2023-06-17 20:38:53', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(256, '2023-06-17 20:39:16', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(257, '2023-06-17 20:39:51', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(258, '2023-06-17 20:40:25', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(259, '2023-06-17 20:41:35', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(260, '2023-06-17 20:45:03', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(261, '2023-06-17 20:54:01', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(262, '2023-06-17 20:56:35', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(263, '2023-06-17 21:03:34', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(264, '2023-06-17 21:03:46', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(265, '2023-06-17 21:03:53', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(266, '2023-06-17 21:12:21', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(267, '2023-06-17 21:12:25', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(268, '2023-06-17 21:25:46', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(269, '2023-06-17 21:26:44', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(270, '2023-06-17 21:26:51', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(271, '2023-06-17 21:27:03', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(272, '2023-06-17 22:53:49', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(273, '2023-06-17 22:53:57', 'daniel.sohrabi.2005@gmail.com has saved data', 22, 'STUDENT'),
(274, '2023-06-17 22:54:05', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(275, '2023-06-18 00:34:08', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(276, '2023-06-18 00:38:05', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(277, '2023-06-18 00:38:14', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(278, '2023-06-18 00:39:11', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(279, '2023-06-18 00:39:20', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(280, '2023-06-18 00:39:33', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(281, '2023-06-18 00:39:52', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(282, '2023-06-18 00:40:07', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(283, '2023-06-18 02:18:33', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(284, '2023-06-18 02:29:06', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(285, '2023-06-18 02:29:16', 'daniel.sohrabi.2005@gmail.com has submitted an error', 22, 'STUDENT'),
(286, '2023-06-18 02:29:18', 'daniel.sohrabi.2005@gmail.com has submitted an error', 22, 'STUDENT'),
(287, '2023-06-18 02:29:21', 'daniel.sohrabi.2005@gmail.com has submitted an error', 22, 'STUDENT'),
(288, '2023-06-18 02:29:23', 'daniel.sohrabi.2005@gmail.com has submitted an error', 22, 'STUDENT'),
(289, '2023-06-18 02:29:24', 'daniel.sohrabi.2005@gmail.com has submitted an error', 22, 'STUDENT'),
(290, '2023-06-18 02:29:57', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(291, '2023-06-18 02:36:58', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(292, '2023-06-18 03:50:20', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(293, '2023-06-18 03:51:36', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(294, '2023-06-18 03:52:27', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(295, '2023-06-18 03:56:33', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(296, '2023-06-18 03:56:53', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(297, '2023-06-18 03:56:59', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(298, '2023-06-18 03:57:05', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(299, '2023-06-18 04:10:26', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(300, '2023-06-18 06:26:51', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(301, '2023-06-18 08:28:04', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(302, '2023-06-18 08:28:13', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(303, '2023-06-18 08:44:51', 'An error was submitted from the landing page', -1, 'STUDENT'),
(304, '2023-06-18 08:46:46', 'An error was submitted from the landing page', -1, 'STUDENT'),
(305, '2023-06-18 08:46:57', 'An error was submitted from the landing page', -1, 'STUDENT'),
(306, '2023-06-18 08:47:04', 'An error was submitted from the landing page', -1, 'STUDENT'),
(307, '2023-06-18 08:47:12', 'An error was submitted from the landing page', -1, 'STUDENT'),
(308, '2023-06-18 08:47:15', 'An error was submitted from the landing page', -1, 'STUDENT'),
(309, '2023-06-18 17:32:41', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(310, '2023-06-18 17:44:39', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(311, '2023-06-18 18:12:47', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(312, '2023-06-18 18:15:38', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(313, '2023-06-18 18:44:18', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(314, '2023-06-18 18:44:23', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(315, '2023-06-18 18:44:30', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(316, '2023-06-18 18:45:29', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(317, '2023-06-18 18:47:10', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(318, '2023-06-18 19:22:08', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(319, '2023-06-18 19:22:31', 'abdulawesome0@gmail.com has saved data', 2, 'STUDENT'),
(320, '2023-06-18 19:29:11', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(321, '2023-06-18 21:25:53', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(322, '2023-06-18 21:27:51', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(323, '2023-06-18 21:29:43', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(324, '2023-06-18 21:30:26', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(325, '2023-06-18 21:31:35', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(326, '2023-06-18 21:32:17', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(327, '2023-06-18 21:32:25', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(328, '2023-06-18 21:36:05', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(329, '2023-06-18 21:36:15', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(330, '2023-06-18 21:58:32', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(331, '2023-06-18 22:00:52', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(332, '2023-06-18 22:01:06', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(333, '2023-06-18 22:01:17', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(334, '2023-06-18 22:01:26', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(335, '2023-06-18 22:02:05', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(336, '2023-06-18 22:03:02', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(337, '2023-06-18 22:45:01', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(338, '2023-06-18 23:00:34', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(339, '2023-06-18 23:56:00', 'daniel.sohrabi.2005@gmail.com logged in', 22, 'STUDENT'),
(340, '2023-06-18 23:56:13', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(341, '2023-06-19 00:01:15', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(342, '2023-06-19 00:20:52', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(343, '2023-06-19 00:27:37', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(344, '2023-06-19 00:28:31', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(345, '2023-06-19 00:29:13', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(346, '2023-06-19 00:30:57', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(347, '2023-06-19 00:52:20', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(348, '2023-06-19 02:45:29', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(349, '2023-06-19 02:47:57', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(350, '2023-06-19 02:49:05', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(351, '2023-06-19 02:49:07', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(352, '2023-06-19 02:53:32', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(353, '2023-06-19 02:53:51', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(354, '2023-06-19 02:54:25', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(355, '2023-06-19 02:54:34', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(356, '2023-06-19 02:54:54', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(357, '2023-06-19 02:55:10', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(358, '2023-06-19 02:57:13', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(359, '2023-06-19 02:57:41', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(360, '2023-06-19 02:57:44', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(361, '2023-06-19 02:57:52', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(362, '2023-06-19 02:58:29', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(363, '2023-06-19 03:18:01', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(364, '2023-06-19 03:45:07', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(365, '2023-06-19 05:27:24', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(366, '2023-06-19 13:22:22', 'egenc2@ocdsb.ca logged in', 13, 'ADMIN'),
(367, '2023-06-19 13:32:09', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(368, '2023-06-19 13:33:49', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(369, '2023-06-19 13:40:22', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(370, '2023-06-19 13:47:46', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(371, '2023-06-19 14:04:16', 'stephen.emmell@ocdsb.ca logged in', 27, 'ADMIN'),
(372, '2023-06-19 14:29:31', 'dsohr1@ocdsb.ca logged in', 22, 'ADMIN'),
(373, '2023-06-19 14:32:00', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(374, '2023-06-19 22:29:59', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(375, '2023-06-19 23:18:46', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(376, '2023-06-20 00:06:48', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(377, '2023-06-20 02:42:10', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(378, '2023-06-20 04:01:52', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(379, '2023-06-20 04:13:42', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(380, '2023-06-20 04:29:59', 'flameblade296yt@gmail.com logged in', 21, 'STUDENT'),
(381, '2023-06-21 22:22:53', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(382, '2023-06-23 13:54:32', 'emmellst@gmail.com logged in', 10, 'STUDENT'),
(383, '2023-06-23 13:55:13', 'emmellst@gmail.com has saved data', 10, 'STUDENT'),
(384, '2023-06-23 13:55:39', 'emmellst@gmail.com has submitted an error', 10, 'STUDENT'),
(385, '2023-06-23 15:25:18', 'stephen.emmell@ocdsb.ca logged in', 27, 'ADMIN'),
(386, '2023-06-23 22:24:27', 'stephen.emmell@ocdsb.ca logged in', 27, 'ADMIN'),
(387, '2023-06-23 23:49:42', 'stephen.emmell@ocdsb.ca logged in', 27, 'ADMIN'),
(388, '2023-06-23 23:58:21', 'emmellst@gmail.com logged in', 10, 'STUDENT'),
(389, '2023-06-23 23:58:31', 'emmellst@gmail.com has saved data', 10, 'STUDENT'),
(390, '2023-06-24 21:36:00', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(391, '2023-06-24 21:40:33', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(392, '2023-06-24 21:42:26', 'abdulawesome0@gmail.com logged in', 2, 'STUDENT'),
(393, '2023-06-24 21:43:37', 'aisla1@ocdsb.ca logged in', 11, 'ADMIN'),
(394, '2023-06-24 21:44:24', 'abdulawesome0@gmail.com has submitted an error', 2, 'STUDENT'),
(395, '2023-06-24 21:44:32', 'araso2@ocdsb.ca logged in', 26, 'ADMIN'),
(396, '2023-06-30 18:47:26', 'stephen.emmell@ocdsb.ca logged in', 27, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int NOT NULL,
  `msg_email` varchar(128) NOT NULL,
  `msg_text` varchar(1024) NOT NULL,
  `msg_stud_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `msg_email`, `msg_text`, `msg_stud_id`) VALUES
(44, 'abdulawesome0@gmail.com', 'error', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int NOT NULL,
  `setting_name` varchar(128) NOT NULL,
  `setting_value` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_value`) VALUES
(1, 'Stud_LogIn_Allow', '1'),
(2, 'Stud_Edit_Allow', '1'),
(3, 'Stud_ErrorLog_Allow', '1'),
(4, 'Deadline_Date', '2023-06-30'),
(5, 'Deadline_Time', '23:59'),
(6, 'Max_MemMoment_Char', '150'),
(7, 'Slide_Time', '5s'),
(8, 'Test', '0');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `show_id` int NOT NULL,
  `show_long_name` varchar(128) NOT NULL,
  `show_short_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`show_id`, `show_long_name`, `show_short_name`) VALUES
(1, 'ShowA', 'A'),
(2, 'ShowB', 'B'),
(68, 'Testing long new show', 'NewShow');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int NOT NULL,
  `stud_num` varchar(16) NOT NULL,
  `stud_email` varchar(64) NOT NULL,
  `stud_lname` varchar(64) NOT NULL,
  `stud_fname` varchar(64) NOT NULL,
  `stud_mem_moment` varchar(4096) NOT NULL DEFAULT '',
  `stud_scholarships` varchar(1024) NOT NULL DEFAULT '',
  `stud_awards` varchar(1024) NOT NULL DEFAULT '',
  `stud_future_plans` varchar(1024) NOT NULL DEFAULT '',
  `stud_which_show` int DEFAULT NULL,
  `stud_enabled` int NOT NULL DEFAULT '1',
  `stud_css` varchar(1024) NOT NULL DEFAULT '',
  `stud_has_saved` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `stud_num`, `stud_email`, `stud_lname`, `stud_fname`, `stud_mem_moment`, `stud_scholarships`, `stud_awards`, `stud_future_plans`, `stud_which_show`, `stud_enabled`, `stud_css`, `stud_has_saved`) VALUES
(2, 'S542351904', 'abdulawesome0@gmail.com', 'Rasool', 'Abdul', '<p>This is my memorable moment of highschool</p>', '[\"Uottawa scholarship \"]', 'smartPerson', '[\"university of ottawa\",\"Software engineering\"]', 68, 1, '', 1),
(3, 'S411485446', 'sgran3@ocdsb.ca', 'Grant', 'Shaun', '<p>111</p>', 'aw', 'Student', '', 1, 0, '1', 0),
(4, 'S293070620', 'marif4@ocdsb.ca', 'Arif', 'Maleeha', '<p>456y</p>', '[]', 'Goofy|smartPerson', '[\"\",\"\"]', 68, 1, '', 0),
(5, 'S502820804', 'mprud2@ocdsb.ca', 'Prudhomme', 'Matt', '', '', 'smartPerson', '', 68, 0, '', 0),
(6, 'S319821103', 'ggamb1@ocdsb.ca', 'Gamble', 'Gill', '', '', 'awarding|awarding|awarding', '', 1, 0, '', 0),
(7, 'S377700784', 'mharm4@ocdsb.ca', 'Harman', 'Madison', '', '', 'smartPerson', '', 2, 0, '', 0),
(8, 'S846941265', 'cluan3@ocdsb.ca', 'Luangpakham', 'Crystal', '', '', 'Top 1%', '', 2, 0, '', 0),
(9, 'S159030348', 'nrask4@ocdsb.ca', 'Raskin', 'Noah', '', '', '', '', 68, 0, '', 0),
(10, 'S981354174', 'emmellst@gmail.com', 'Bruneau', 'Alexander', '<p>memMoment Test</p>', '[\"test1\",\"test3\"]', '', '[\"going to \",\"for that thing\"]', 1, 0, '', 1),
(11, 'S790582627', 'jfitz3@ocdsb.ca', 'Fitzpatrick', 'Josh', '', '', '', '', 1, 0, '', 0),
(12, 'S426587289', 'dwark2@ocdsb.ca', 'Warkentin', 'Devin', '', '', '', '', 68, 0, '', 0),
(13, 'S600628123', 'kmaye1@ocdsb.ca', 'Mayer', 'Kyle', '', '', '|smartPerson', '', 2, 0, '', 0),
(14, 'S263980740', 'jgrib2@ocdsb.ca', 'Gribbon', 'Joey', '', '', '', '', 1, 0, '', 0),
(15, 'S366764529', 'bmart1@ocdsb.ca', 'Martin', 'Bria', '', '', '', '', 2, 0, '', 0),
(16, 'S633877639', 'aelli2@ocdsb.ca', 'Elliott', 'Austin', '', '', '', '', 1, 0, '', 0),
(17, 'S249552607', 'cblas3@ocdsb.ca', 'Blaskavitch', 'Cassy', '', '', '', '', 1, 0, '', 0),
(18, 'S679818062', 'rmcma4@ocdsb.ca', 'McManus', 'Rylie', '', '', '', '', 2, 0, '', 0),
(19, 'S196052097', 'rtrel3@ocdsb.ca', 'Treleaven', 'Rachel', '', '', '', '', 68, 0, '', 0),
(21, 'S104400000', 'flameblade296yt@gmail.com', 'Islam', 'Arham', '<ul>\r\n<li>Grade 12</li>\r\n</ul>', '[\"$40, 000 GOAT Special Scholarship\",\"$10, 000 Entrance Scholarship\",\"$100 Surprise Scholarship\"]', '', '[\"Carleton University\",\"Computer Science\"]', 2, 1, '', 1),
(22, 'S338563687', 'daniel.sohrabi.2005@gmail.com', 'Sohrabi', 'Daniel', '', '[\"Test1\",\"Test3\"]', '', '[\"uOttawa\",\"Software Engineering\"]', 68, 1, '', 1),
(24, 'S090909090', 'arhamstestingaccount@gmail.com', 'testing account', 'arham\'s', '', '', '', '', 68, 0, '', 1),
(25, 'S000111222', '@yahoo.com', 'yahoo', 'boy', '', '', '', '', 68, 0, '', 1),
(26, 'S000333444', '@hotmail.ca', 'hotmail', 'boy', '', '', '', '', 2, 0, '', 1),
(27, 'S999888777', '@outlook.com', 'outllook', 'kid', '', '', '', '', 2, 0, '', 1),
(28, '123', 'a@gmail.com', 'testerr', 'testinggg', '', '', '', '', 68, 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `surroundingSlides`
--

CREATE TABLE `surroundingSlides` (
  `surround_id` int NOT NULL,
  `surround_name` varchar(128) NOT NULL,
  `surround_html` varchar(4096) NOT NULL,
  `surround_active` int NOT NULL DEFAULT '0',
  `surround_order` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surroundingSlides`
--

INSERT INTO `surroundingSlides` (`surround_id`, `surround_name`, `surround_html`, `surround_active`, `surround_order`) VALUES
(52, 'Pre Slide', '<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p style=\"text-align: center;\"><img src=\"https://cdnsm5-ss13.sharpschool.com/UserFiles/Servers/Server_235149/Image/School%20News/West_Carleton_Mascot_Design.png\" alt=\"WCSS Hats, Hoodies and Shirts!!! - West Carleton SS\" width=\"425\" height=\"425\"></p><p style=\"text-align: center;\">PRE SLIDE</p>', -1, 0),
(53, 'Post Slide', '<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p style=\"text-align: center;\"><img src=\"https://cdnsm5-ss13.sharpschool.com/UserFiles/Servers/Server_235149/Image/School%20News/West_Carleton_Mascot_Design.png\" alt=\"WCSS Hats, Hoodies and Shirts!!! - West Carleton SS\" width=\"352\" height=\"352\"></p><p style=\"text-align: center;\">POST SLIDE</p>', 1, 0),
(54, 'Disabled Slide', '', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`show_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `surroundingSlides`
--
ALTER TABLE `surroundingSlides`
  ADD PRIMARY KEY (`surround_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `award_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `show_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `surroundingSlides`
--
ALTER TABLE `surroundingSlides`
  MODIFY `surround_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
