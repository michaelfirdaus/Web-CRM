-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 07:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jakarta', '7', 1, '2021-02-24 05:00:51', '2021-02-24 05:00:51'),
(2, 'Gading Serpong', '8', 1, '2021-02-24 05:01:02', '2021-02-24 05:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `name`, `email`, `phonenumber`, `dob`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alfin Utama', 'alfinutama@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(2, 'Leonardo', 'leonardo@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(3, 'Arkaan', 'arkaan@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(4, 'Arman Ketut', 'armanketut@sample.com', '6280000000', '1974-08-30', 'Jakarta', 1, NULL, NULL),
(5, 'Chandra', 'chandra@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(6, 'Lim Jaya', 'limjaya@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(7, 'Christopher Rinto', 'christopherrinto@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(8, 'Hariman Budiman', 'harimanbudiman@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(9, 'Daffa', 'daffa@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(10, 'Erico Zaels', 'ericozaels@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(11, 'Eric Martin', 'ericmartin@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(12, 'Erwin', 'erwin@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(13, 'Halim Perdana', 'halimperdana@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(14, 'Gede Ibnu', 'gedeibnu@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(15, 'Handy Bambang', 'handybambang@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(16, 'Hartono Herlambang', 'hartonoherlambang@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(17, 'Azyu Abil', 'azyuabil@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(18, 'Karim Abdul', 'karimabdul@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(19, 'Issaac Vincent', 'issaacvincent@sample.com', '6280000000', '1986-03-19', 'Jakarta', 1, NULL, NULL),
(20, 'Johnny Abdi', 'johnnyabdi@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(21, 'Joko Purnama', 'jokopurnama@sample.com', '6280000000', '1982-01-30', 'Jakarta', 1, NULL, NULL),
(22, 'Sunitro', 'sunitro@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(23, 'Erlangga', 'erlangga@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(24, 'Lukas Bell', 'lukasbell@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(25, 'Marcello Boediono', 'marcellocoediono@sample.com', '6280000000', '1990-12-22', 'Jakarta', 1, NULL, NULL),
(26, 'Prio Gema', 'priogema@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(27, 'Rendy', 'rendy@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(28, 'Reza', 'reza@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(29, 'Ricky', 'ricky@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(30, 'Rijal Muhammad', 'rijalmuhammad@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(31, 'Roland', 'roland@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(32, 'Azis Abdul', 'azisabdul@sample.com', '6280000000', '1997-07-20', 'Jakarta', 1, NULL, NULL),
(33, 'Vincentius Mamot', 'vincentiusmamot@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(34, 'Wengkie', 'wengkie@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(35, 'Wihandi', 'wihandi@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(36, 'William Geovandi', 'williamgeovandi@sample.com', '6280000000', '1980-01-01', 'Jakarta', 0, NULL, NULL),
(37, 'Williams Joko', 'williamsjoko@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL),
(38, 'Gavin Yohanes', 'gavinyohanes@sample.com', '6280000000', '1980-01-01', 'Jakarta', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coach_program`
--

CREATE TABLE `coach_program` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach_id` bigint(20) NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coach_program`
--

INSERT INTO `coach_program` (`id`, `coach_id`, `program_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10, NULL, NULL),
(2, 16, 10, NULL, NULL),
(3, 16, 7, NULL, NULL),
(4, 37, 7, NULL, NULL),
(5, 4, 6, NULL, NULL),
(6, 6, 6, NULL, NULL),
(7, 7, 6, NULL, NULL),
(8, 16, 6, NULL, NULL),
(9, 4, 9, NULL, NULL),
(10, 7, 9, NULL, NULL),
(11, 19, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participant_id` bigint(20) NOT NULL,
  `programname_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `participant_id`, `programname_id`, `created_at`, `updated_at`) VALUES
(1, 7000501, 1, '2021-02-24 06:01:42', '2021-02-24 06:01:42'),
(2, 7000501, 3, '2021-02-24 06:01:45', '2021-02-24 06:01:45'),
(3, 8000504, 2, '2021-02-24 06:01:55', '2021-02-24 06:01:55'),
(4, 8000504, 4, '2021-02-24 06:02:04', '2021-02-24 06:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `jobconnectors`
--

CREATE TABLE `jobconnectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobconnectors`
--

INSERT INTO `jobconnectors` (`id`, `name`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PT. ABC', 'Jakarta', 1, '2021-02-24 05:33:49', '2021-02-24 05:33:49'),
(2, 'PT. Sukses Selalu', 'Gading Serpong', 1, '2021-02-24 05:34:00', '2021-02-24 05:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobconnector_participant`
--

CREATE TABLE `jobconnector_participant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participant_id` bigint(20) NOT NULL,
  `jobconnector_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `application_status` int(11) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastedited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobconnector_participant`
--

INSERT INTO `jobconnector_participant` (`id`, `participant_id`, `jobconnector_id`, `date`, `application_status`, `created_by`, `lastedited_by`, `created_at`, `updated_at`) VALUES
(1, 7000501, 1, '2021-03-04', 1, 'User CRM', NULL, '2021-02-24 06:21:57', '2021-02-24 06:21:57'),
(2, 8000502, 2, '2021-02-18', 3, 'User CRM', NULL, '2021-02-24 06:22:13', '2021-02-24 06:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `knows`
--

CREATE TABLE `knows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knows`
--

INSERT INTO `knows` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Alumni', 1, '2021-02-24 05:32:52', '2021-02-24 05:32:52'),
(2, 'Teman', 1, NULL, NULL),
(3, 'Instagram', 1, NULL, NULL),
(4, 'Youtube', 1, NULL, NULL),
(5, 'Facebook', 1, NULL, NULL),
(6, 'Google', 1, NULL, NULL),
(7, 'Iklan', 1, NULL, NULL),
(8, 'Tidak ada Data', 1, NULL, NULL),
(9, 'Lain-lain', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membernumber`
--

CREATE TABLE `membernumber` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `lastnumber` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membernumber`
--

INSERT INTO `membernumber` (`id`, `branch_id`, `lastnumber`, `created_at`, `updated_at`) VALUES
(1, 2, 8000505, '2021-02-24 05:46:05', '2021-02-24 06:09:23'),
(2, 1, 7000503, '2021-02-24 05:51:07', '2021-02-24 06:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_18_083747_create_participants_table', 1),
(5, '2020_12_21_063526_create_transactions_table', 1),
(6, '2020_12_21_064146_create_results_table', 1),
(7, '2020_12_21_064646_create_references_table', 1),
(8, '2020_12_21_065832_create_jobconnectors_table', 1),
(9, '2020_12_21_070052_create_knows_table', 1),
(10, '2020_12_21_070130_create_professions_table', 1),
(11, '2020_12_21_070246_create_coaches_table', 1),
(12, '2020_12_21_070355_create_programs_table', 1),
(13, '2020_12_21_070438_create_branches_table', 1),
(14, '2020_12_22_075649_create_salespersons_table', 1),
(15, '2020_12_23_040010_create_coach_program_table', 1),
(16, '2020_12_26_062820_create_jobconnector_participant_table', 1),
(17, '2021_01_04_104718_create_membernumber_table', 1),
(18, '2021_01_05_104424_create_interests_table', 1),
(19, '2021_01_07_150132_create_programcategory_table', 1),
(20, '2021_01_12_132615_create_programname_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `know_id` bigint(20) NOT NULL,
  `profession_id` bigint(20) NOT NULL,
  `memberreference_id` bigint(20) DEFAULT NULL,
  `memberreference_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_idcard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergencycontact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergencycontact_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_validthru` date DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastedited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `branch_id`, `know_id`, `profession_id`, `memberreference_id`, `memberreference_name`, `profession_detail`, `name`, `pob`, `dob`, `phonenumber`, `address`, `email`, `student_idcard`, `cv_link`, `sp_link`, `emergencycontact_name`, `emergencycontact_phone`, `member_validthru`, `created_by`, `lastedited_by`, `created_at`, `updated_at`) VALUES
(7000501, 1, 3, 11, NULL, NULL, 'Institut Teknologi Bandung', 'Aloysius', 'Bandung', '1999-01-28', '62800000000', 'Villa Permata Utama Blok C-1/7', 'aloysius@sample.com', 'AK00229091', 'https://www.google.com/', 'https://www.google.com/', 'Gunawan Setiadi', '6289000000', '2022-06-21', 'Admin CRM', NULL, '2021-02-24 05:51:08', '2021-02-24 05:51:08'),
(7000502, 1, 7, 24, NULL, NULL, 'Prasetya Mulya', 'Jonathan Setyono', 'Tangerang', '2000-02-04', '62800000000', 'Jalan Akses Utama Barat Kav.1 Blok R1/70', 'jonathansetyono@sample.com', 'JS1990022291', NULL, NULL, 'Setyono', '6289000000', NULL, 'Admin CRM', NULL, '2021-02-24 05:53:01', '2021-02-24 05:53:01'),
(7000503, 1, 1, 4, 7000502, 'Jonathan Setyono', '', 'Kristopher Ardito', 'Jakarta', '1970-04-09', '62800000000', 'Jalan Perjuangan No. 1000', 'kristopher@sample.com', NULL, NULL, NULL, 'Abdi Utur', '6289000000', NULL, 'User CRM', NULL, '2021-02-24 06:08:04', '2021-02-24 06:08:04'),
(8000501, 2, 4, 4, NULL, NULL, 'BINUS University', 'Stephen', 'Tanjung Pinang', '2000-01-07', '62800000000', 'Jalan Maju Terus No.1', 'stephen@sample.com', NULL, NULL, NULL, 'Budiman', '6289000000', '2000-01-07', 'Admin CRM', 'Admin CRM', '2021-02-24 05:46:05', '2021-02-24 05:57:06'),
(8000502, 2, 1, 7, 8000501, 'Stephen', 'Universitas Indonesia', 'Alfonos Tiber', 'Kalimantan Selatan', '1985-06-08', '62800000000', 'Jalan Berlian Utama No.5', 'alfonostiber@sample.com', 'AC00112002', NULL, NULL, 'Tiber Guizot', '6289000000', NULL, 'Admin CRM', NULL, '2021-02-24 05:48:32', '2021-02-24 05:48:32'),
(8000503, 2, 9, 869, NULL, NULL, 'BINUS University', 'Derdian Salim', 'Semarang', '1995-09-09', '62800000000', 'Jalan Alfa Beta No.99', 'derdiansalim@sample.com', NULL, NULL, NULL, 'Salim Utama', '6289000000', '1995-09-09', 'Admin CRM', 'User CRM', '2021-02-24 05:56:50', '2021-02-24 06:06:29'),
(8000504, 2, 1, 1, 8000502, 'Alfonos Tiber', 'PT. Abdi Perkasa', 'Carinna Theodore', 'Jakarta', '2001-01-01', '62800000000', 'Jalan Industri Gaya No. 1', 'carinna@sample.com', 'CT0001992', 'https://www.google.com/', 'https://www.google.com/', 'Alfin Pratama', '6289000000', '2021-06-28', 'Admin CRM', NULL, '2021-02-24 06:01:21', '2021-02-24 06:01:21'),
(8000505, 2, 4, 33, NULL, NULL, 'PT. Properti Inti Utama', 'Pratama Kunto', 'Padang', '1976-11-05', '62800000000', 'Jalan Padang No.1', 'pratama@sample.com', NULL, NULL, NULL, 'Aji Kunto', '6289000000', '2021-03-05', 'User CRM', NULL, '2021-02-24 06:09:24', '2021-02-24 06:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chief Executives', 1, NULL, NULL),
(2, 'General and Operations Managers', 1, NULL, NULL),
(3, 'Legislators', 1, NULL, NULL),
(4, 'Advertising and Promotions Managers', 1, NULL, NULL),
(5, 'Marketing Managers', 1, NULL, NULL),
(6, 'Sales Managers', 1, NULL, NULL),
(7, 'Public Relations Managers', 1, NULL, NULL),
(8, 'Fundraising Managers', 1, NULL, NULL),
(9, 'Administrative Services Managers', 1, NULL, NULL),
(10, 'Facilities Managers', 1, NULL, NULL),
(11, 'Computer and Information Systems Managers', 1, NULL, NULL),
(12, 'Financial Managers', 1, NULL, NULL),
(13, 'Industrial Production Managers', 1, NULL, NULL),
(14, 'Purchasing Managers', 1, NULL, NULL),
(15, 'Transportation, Storage, and Distribution Managers', 1, NULL, NULL),
(16, 'Compensation and Benefits Managers', 1, NULL, NULL),
(17, 'Human Resources Managers', 1, NULL, NULL),
(18, 'Training and Development Managers', 1, NULL, NULL),
(19, 'Farmers, Ranchers, and Other Agricultural Managers', 1, NULL, NULL),
(20, 'Construction Managers', 1, NULL, NULL),
(21, 'Education and Childcare Administrators, Preschool and Daycare', 1, NULL, NULL),
(22, 'Education Administrators, Kindergarten through Secondary', 1, NULL, NULL),
(23, 'Education Administrators, Postsecondary', 1, NULL, NULL),
(24, 'Education Administrators, All Other', 1, NULL, NULL),
(25, 'Architectural and Engineering Managers', 1, NULL, NULL),
(26, 'Food Service Managers', 1, NULL, NULL),
(27, 'Gambling Managers', 1, NULL, NULL),
(28, 'Entertainment and Recreation Managers, Except Gambling', 1, NULL, NULL),
(29, 'Lodging Managers', 1, NULL, NULL),
(30, 'Medical and Health Services Managers', 1, NULL, NULL),
(31, 'Natural Sciences Managers', 1, NULL, NULL),
(32, 'Postmasters and Mail Superintendents', 1, NULL, NULL),
(33, 'Property, Real Estate, and Community Association Managers', 1, NULL, NULL),
(34, 'Social and Community Service Managers', 1, NULL, NULL),
(35, 'Emergency Management Directors', 1, NULL, NULL),
(36, 'Funeral Home Managers', 1, NULL, NULL),
(37, 'Personal Service Managers, All Other', 1, NULL, NULL),
(38, 'Managers, All Other', 1, NULL, NULL),
(39, 'Agents and Business Managers of Artists, Performers, and Athletes', 1, NULL, NULL),
(40, 'Buyers and Purchasing Agents, Farm Products', 1, NULL, NULL),
(41, 'Wholesale and Retail Buyers, Except Farm Products', 1, NULL, NULL),
(42, 'Purchasing Agents, Except Wholesale, Retail, and Farm Products', 1, NULL, NULL),
(43, 'Claims Adjusters, Examiners, and Investigators', 1, NULL, NULL),
(44, 'Insurance Appraisers, Auto Damage', 1, NULL, NULL),
(45, 'Compliance Officers', 1, NULL, NULL),
(46, 'Cost Estimators', 1, NULL, NULL),
(47, 'Human Resources Specialists', 1, NULL, NULL),
(48, 'Farm Labor Contractors', 1, NULL, NULL),
(49, 'Labor Relations Specialists', 1, NULL, NULL),
(50, 'Logisticians', 1, NULL, NULL),
(51, 'Project Management Specialists', 1, NULL, NULL),
(52, 'Management Analysts', 1, NULL, NULL),
(53, 'Meeting, Convention, and Event Planners', 1, NULL, NULL),
(54, 'Fundraisers', 1, NULL, NULL),
(55, 'Compensation, Benefits, and Job Analysis Specialists', 1, NULL, NULL),
(56, 'Training and Development Specialists', 1, NULL, NULL),
(57, 'Market Research Analysts and Marketing Specialists', 1, NULL, NULL),
(58, 'Business Operations Specialists, All Other', 1, NULL, NULL),
(59, 'Accountants and Auditors', 1, NULL, NULL),
(60, 'Appraisers of Personal and Business Property', 1, NULL, NULL),
(61, 'Appraisers and Assessors of Real Estate', 1, NULL, NULL),
(62, 'Budget Analysts', 1, NULL, NULL),
(63, 'Credit Analysts', 1, NULL, NULL),
(64, 'Financial and Investment Analysts', 1, NULL, NULL),
(65, 'Personal Financial Advisors', 1, NULL, NULL),
(66, 'Insurance Underwriters', 1, NULL, NULL),
(67, 'Financial Risk Specialists', 1, NULL, NULL),
(68, 'Financial Examiners', 1, NULL, NULL),
(69, 'Credit Counselors', 1, NULL, NULL),
(70, 'Loan Officers', 1, NULL, NULL),
(71, 'Tax Examiners and Collectors, and Revenue Agents', 1, NULL, NULL),
(72, 'Tax Preparers', 1, NULL, NULL),
(73, 'Financial Specialists, All Other', 1, NULL, NULL),
(74, 'Computer Systems Analysts', 1, NULL, NULL),
(75, 'Information Security Analysts', 1, NULL, NULL),
(76, 'Computer and Information Research Scientists', 1, NULL, NULL),
(77, 'Computer Network Support Specialists', 1, NULL, NULL),
(78, 'Computer User Support Specialists', 1, NULL, NULL),
(79, 'Computer Network Architects', 1, NULL, NULL),
(80, 'Database Administrators', 1, NULL, NULL),
(81, 'Database Architects', 1, NULL, NULL),
(82, 'Network and Computer Systems Administrators', 1, NULL, NULL),
(83, 'Computer Programmers', 1, NULL, NULL),
(84, 'Software Developers', 1, NULL, NULL),
(85, 'Software Quality Assurance Analysts and Testers', 1, NULL, NULL),
(86, 'Web Developers', 1, NULL, NULL),
(87, 'Web and Digital Interface Designers', 1, NULL, NULL),
(88, 'Computer Occupations, All Other', 1, NULL, NULL),
(89, 'Actuaries', 1, NULL, NULL),
(90, 'Mathematicians', 1, NULL, NULL),
(91, 'Operations Research Analysts', 1, NULL, NULL),
(92, 'Statisticians', 1, NULL, NULL),
(93, 'Data Scientists', 1, NULL, NULL),
(94, 'Mathematical Science Occupations, All Other', 1, NULL, NULL),
(95, 'Architects, Except Landscape and Naval', 1, NULL, NULL),
(96, 'Landscape Architects', 1, NULL, NULL),
(97, 'Cartographers and Photogrammetrists', 1, NULL, NULL),
(98, 'Surveyors', 1, NULL, NULL),
(99, 'Aerospace Engineers', 1, NULL, NULL),
(100, 'Agricultural Engineers', 1, NULL, NULL),
(101, 'Bioengineers and Biomedical Engineers', 1, NULL, NULL),
(102, 'Chemical Engineers', 1, NULL, NULL),
(103, 'Civil Engineers', 1, NULL, NULL),
(104, 'Computer Hardware Engineers', 1, NULL, NULL),
(105, 'Electrical Engineers', 1, NULL, NULL),
(106, 'Electronics Engineers, Except Computer', 1, NULL, NULL),
(107, 'Environmental Engineers', 1, NULL, NULL),
(108, 'Health and Safety Engineers, Except Mining Safety Engineers and Inspectors', 1, NULL, NULL),
(109, 'Industrial Engineers', 1, NULL, NULL),
(110, 'Marine Engineers and Naval Architects', 1, NULL, NULL),
(111, 'Materials Engineers', 1, NULL, NULL),
(112, 'Mechanical Engineers', 1, NULL, NULL),
(113, 'Mining and Geological Engineers, Including Mining Safety Engineers', 1, NULL, NULL),
(114, 'Nuclear Engineers', 1, NULL, NULL),
(115, 'Petroleum Engineers', 1, NULL, NULL),
(116, 'Engineers, All Other', 1, NULL, NULL),
(117, 'Architectural and Civil Drafters', 1, NULL, NULL),
(118, 'Electrical and Electronics Drafters', 1, NULL, NULL),
(119, 'Mechanical Drafters', 1, NULL, NULL),
(120, 'Drafters, All Other', 1, NULL, NULL),
(121, 'Aerospace Engineering and Operations Technologists and Technicians', 1, NULL, NULL),
(122, 'Civil Engineering Technologists and Technicians', 1, NULL, NULL),
(123, 'Electrical and Electronic Engineering Technologists and Technicians', 1, NULL, NULL),
(124, 'Electro-Mechanical and Mechatronics Technologists and Technicians', 1, NULL, NULL),
(125, 'Environmental Engineering Technologists and Technicians', 1, NULL, NULL),
(126, 'Industrial Engineering Technologists and Technicians', 1, NULL, NULL),
(127, 'Mechanical Engineering Technologists and Technicians', 1, NULL, NULL),
(128, 'Calibration Technologists and Technicians', 1, NULL, NULL),
(129, 'Engineering Technologists and Technicians, Except Drafters, All Other', 1, NULL, NULL),
(130, 'Surveying and Mapping Technicians', 1, NULL, NULL),
(131, 'Animal Scientists', 1, NULL, NULL),
(132, 'Food Scientists and Technologists', 1, NULL, NULL),
(133, 'Soil and Plant Scientists', 1, NULL, NULL),
(134, 'Biochemists and Biophysicists', 1, NULL, NULL),
(135, 'Microbiologists', 1, NULL, NULL),
(136, 'Zoologists and Wildlife Biologists', 1, NULL, NULL),
(137, 'Biological Scientists, All Other', 1, NULL, NULL),
(138, 'Conservation Scientists', 1, NULL, NULL),
(139, 'Foresters', 1, NULL, NULL),
(140, 'Epidemiologists', 1, NULL, NULL),
(141, 'Medical Scientists, Except Epidemiologists', 1, NULL, NULL),
(142, 'Life Scientists, All Other', 1, NULL, NULL),
(143, 'Astronomers', 1, NULL, NULL),
(144, 'Physicists', 1, NULL, NULL),
(145, 'Atmospheric and Space Scientists', 1, NULL, NULL),
(146, 'Chemists', 1, NULL, NULL),
(147, 'Materials Scientists', 1, NULL, NULL),
(148, 'Environmental Scientists and Specialists, Including Health', 1, NULL, NULL),
(149, 'Geoscientists, Except Hydrologists and Geographers', 1, NULL, NULL),
(150, 'Hydrologists', 1, NULL, NULL),
(151, 'Physical Scientists, All Other', 1, NULL, NULL),
(152, 'Economists', 1, NULL, NULL),
(153, 'Survey Researchers', 1, NULL, NULL),
(154, 'Industrial-Organizational Psychologists', 1, NULL, NULL),
(155, 'Clinical and Counseling Psychologists', 1, NULL, NULL),
(156, 'School Psychologists', 1, NULL, NULL),
(157, 'Psychologists, All Other', 1, NULL, NULL),
(158, 'Sociologists', 1, NULL, NULL),
(159, 'Urban and Regional Planners', 1, NULL, NULL),
(160, 'Anthropologists and Archeologists', 1, NULL, NULL),
(161, 'Geographers', 1, NULL, NULL),
(162, 'Historians', 1, NULL, NULL),
(163, 'Political Scientists', 1, NULL, NULL),
(164, 'Social Scientists and Related Workers, All Other', 1, NULL, NULL),
(165, 'Agricultural Technicians', 1, NULL, NULL),
(166, 'Food Science Technicians', 1, NULL, NULL),
(167, 'Biological Technicians', 1, NULL, NULL),
(168, 'Chemical Technicians', 1, NULL, NULL),
(169, 'Environmental Science and Protection Technicians, Including Health', 1, NULL, NULL),
(170, 'Geological Technicians, Except Hydrologic Technicians', 1, NULL, NULL),
(171, 'Hydrologic Technicians', 1, NULL, NULL),
(172, 'Nuclear Technicians', 1, NULL, NULL),
(173, 'Social Science Research Assistants', 1, NULL, NULL),
(174, 'Forest and Conservation Technicians', 1, NULL, NULL),
(175, 'Forensic Science Technicians', 1, NULL, NULL),
(176, 'Life, Physical, and Social Science Technicians, All Other', 1, NULL, NULL),
(177, 'Occupational Health and Safety Specialists', 1, NULL, NULL),
(178, 'Occupational Health and Safety Technicians', 1, NULL, NULL),
(179, 'Substance Abuse and Behavioral Disorder Counselors', 1, NULL, NULL),
(180, 'Educational, Guidance, and Career Counselors and Advisors', 1, NULL, NULL),
(181, 'Marriage and Family Therapists', 1, NULL, NULL),
(182, 'Mental Health Counselors', 1, NULL, NULL),
(183, 'Rehabilitation Counselors', 1, NULL, NULL),
(184, 'Counselors, All Other', 1, NULL, NULL),
(185, 'Child, Family, and School Social Workers', 1, NULL, NULL),
(186, 'Healthcare Social Workers', 1, NULL, NULL),
(187, 'Mental Health and Substance Abuse Social Workers', 1, NULL, NULL),
(188, 'Social Workers, All Other', 1, NULL, NULL),
(189, 'Health Education Specialists', 1, NULL, NULL),
(190, 'Probation Officers and Correctional Treatment Specialists', 1, NULL, NULL),
(191, 'Social and Human Service Assistants', 1, NULL, NULL),
(192, 'Community Health Workers', 1, NULL, NULL),
(193, 'Community and Social Service Specialists, All Other', 1, NULL, NULL),
(194, 'Clergy', 1, NULL, NULL),
(195, 'Directors, Religious Activities and Education', 1, NULL, NULL),
(196, 'Religious Workers, All Other', 1, NULL, NULL),
(197, 'Lawyers', 1, NULL, NULL),
(198, 'Judicial Law Clerks', 1, NULL, NULL),
(199, 'Administrative Law Judges, Adjudicators, and Hearing Officers', 1, NULL, NULL),
(200, 'Arbitrators, Mediators, and Conciliators', 1, NULL, NULL),
(201, 'Judges, Magistrate Judges, and Magistrates', 1, NULL, NULL),
(202, 'Paralegals and Legal Assistants', 1, NULL, NULL),
(203, 'Title Examiners, Abstractors, and Searchers', 1, NULL, NULL),
(204, 'Legal Support Workers, All Other', 1, NULL, NULL),
(205, 'Business Teachers, Postsecondary', 1, NULL, NULL),
(206, 'Computer Science Teachers, Postsecondary', 1, NULL, NULL),
(207, 'Mathematical Science Teachers, Postsecondary', 1, NULL, NULL),
(208, 'Architecture Teachers, Postsecondary', 1, NULL, NULL),
(209, 'Engineering Teachers, Postsecondary', 1, NULL, NULL),
(210, 'Agricultural Sciences Teachers, Postsecondary', 1, NULL, NULL),
(211, 'Biological Science Teachers, Postsecondary', 1, NULL, NULL),
(212, 'Forestry and Conservation Science Teachers, Postsecondary', 1, NULL, NULL),
(213, 'Atmospheric, Earth, Marine, and Space Sciences Teachers, Postsecondary', 1, NULL, NULL),
(214, 'Chemistry Teachers, Postsecondary', 1, NULL, NULL),
(215, 'Environmental Science Teachers, Postsecondary', 1, NULL, NULL),
(216, 'Physics Teachers, Postsecondary', 1, NULL, NULL),
(217, 'Anthropology and Archeology Teachers, Postsecondary', 1, NULL, NULL),
(218, 'Area, Ethnic, and Cultural Studies Teachers, Postsecondary', 1, NULL, NULL),
(219, 'Economics Teachers, Postsecondary', 1, NULL, NULL),
(220, 'Geography Teachers, Postsecondary', 1, NULL, NULL),
(221, 'Political Science Teachers, Postsecondary', 1, NULL, NULL),
(222, 'Psychology Teachers, Postsecondary', 1, NULL, NULL),
(223, 'Sociology Teachers, Postsecondary', 1, NULL, NULL),
(224, 'Social Sciences Teachers, Postsecondary, All Other', 1, NULL, NULL),
(225, 'Health Specialties Teachers, Postsecondary', 1, NULL, NULL),
(226, 'Nursing Instructors and Teachers, Postsecondary', 1, NULL, NULL),
(227, 'Education Teachers, Postsecondary', 1, NULL, NULL),
(228, 'Library Science Teachers, Postsecondary', 1, NULL, NULL),
(229, 'Criminal Justice and Law Enforcement Teachers, Postsecondary', 1, NULL, NULL),
(230, 'Law Teachers, Postsecondary', 1, NULL, NULL),
(231, 'Social Work Teachers, Postsecondary', 1, NULL, NULL),
(232, 'Art, Drama, and Music Teachers, Postsecondary', 1, NULL, NULL),
(233, 'Communications Teachers, Postsecondary', 1, NULL, NULL),
(234, 'English Language and Literature Teachers, Postsecondary', 1, NULL, NULL),
(235, 'Foreign Language and Literature Teachers, Postsecondary', 1, NULL, NULL),
(236, 'History Teachers, Postsecondary', 1, NULL, NULL),
(237, 'Philosophy and Religion Teachers, Postsecondary', 1, NULL, NULL),
(238, 'Family and Consumer Sciences Teachers, Postsecondary', 1, NULL, NULL),
(239, 'Recreation and Fitness Studies Teachers, Postsecondary', 1, NULL, NULL),
(240, 'Career/Technical Education Teachers, Postsecondary', 1, NULL, NULL),
(241, 'Postsecondary Teachers, All Other', 1, NULL, NULL),
(242, 'Preschool Teachers, Except Special Education', 1, NULL, NULL),
(243, 'Kindergarten Teachers, Except Special Education', 1, NULL, NULL),
(244, 'Elementary School Teachers, Except Special Education', 1, NULL, NULL),
(245, 'Middle School Teachers, Except Special and Career/Technical Education', 1, NULL, NULL),
(246, 'Career/Technical Education Teachers, Middle School', 1, NULL, NULL),
(247, 'Secondary School Teachers, Except Special and Career/Technical Education', 1, NULL, NULL),
(248, 'Career/Technical Education Teachers, Secondary School', 1, NULL, NULL),
(249, 'Special Education Teachers, Preschool', 1, NULL, NULL),
(250, 'Special Education Teachers, Kindergarten', 1, NULL, NULL),
(251, 'Special Education Teachers, Elementary School', 1, NULL, NULL),
(252, 'Special Education Teachers, Middle School', 1, NULL, NULL),
(253, 'Special Education Teachers, Secondary School', 1, NULL, NULL),
(254, 'Special Education Teachers, All Other', 1, NULL, NULL),
(255, 'Adult Basic Education, Adult Secondary Education, and English as a Second Language Instructors', 1, NULL, NULL),
(256, 'Self-Enrichment Teachers', 1, NULL, NULL),
(257, 'Substitute Teachers, Short-Term', 1, NULL, NULL),
(258, 'Tutors', 1, NULL, NULL),
(259, 'Teachers and Instructors, All Other', 1, NULL, NULL),
(260, 'Archivists', 1, NULL, NULL),
(261, 'Curators', 1, NULL, NULL),
(262, 'Museum Technicians and Conservators', 1, NULL, NULL),
(263, 'Librarians and Media Collections Specialists', 1, NULL, NULL),
(264, 'Library Technicians', 1, NULL, NULL),
(265, 'Farm and Home Management Educators', 1, NULL, NULL),
(266, 'Instructional Coordinators', 1, NULL, NULL),
(267, 'Teaching Assistants, Preschool, Elementary, Middle, and Secondary School, Except Special Education', 1, NULL, NULL),
(268, 'Teaching Assistants, Special Education', 1, NULL, NULL),
(269, 'Teaching Assistants, Postsecondary', 1, NULL, NULL),
(270, 'Teaching Assistants, All Other', 1, NULL, NULL),
(271, 'Educational Instruction and Library Workers, All Other', 1, NULL, NULL),
(272, 'Art Directors', 1, NULL, NULL),
(273, 'Craft Artists', 1, NULL, NULL),
(274, 'Fine Artists, Including Painters, Sculptors, and Illustrators', 1, NULL, NULL),
(275, 'Special Effects Artists and Animators', 1, NULL, NULL),
(276, 'Artists and Related Workers, All Other', 1, NULL, NULL),
(277, 'Commercial and Industrial Designers', 1, NULL, NULL),
(278, 'Fashion Designers', 1, NULL, NULL),
(279, 'Floral Designers', 1, NULL, NULL),
(280, 'Graphic Designers', 1, NULL, NULL),
(281, 'Interior Designers', 1, NULL, NULL),
(282, 'Merchandise Displayers and Window Trimmers', 1, NULL, NULL),
(283, 'Set and Exhibit Designers', 1, NULL, NULL),
(284, 'Designers, All Other', 1, NULL, NULL),
(285, 'Actors', 1, NULL, NULL),
(286, 'Producers and Directors', 1, NULL, NULL),
(287, 'Athletes and Sports Competitors', 1, NULL, NULL),
(288, 'Coaches and Scouts', 1, NULL, NULL),
(289, 'Umpires, Referees, and Other Sports Officials', 1, NULL, NULL),
(290, 'Dancers', 1, NULL, NULL),
(291, 'Choreographers', 1, NULL, NULL),
(292, 'Music Directors and Composers', 1, NULL, NULL),
(293, 'Musicians and Singers', 1, NULL, NULL),
(294, 'Disc Jockeys, Except Radio', 1, NULL, NULL),
(295, 'Entertainers and Performers, Sports and Related Workers, All Other', 1, NULL, NULL),
(296, 'Broadcast Announcers and Radio Disc Jockeys', 1, NULL, NULL),
(297, 'News Analysts, Reporters, and Journalists', 1, NULL, NULL),
(298, 'Public Relations Specialists', 1, NULL, NULL),
(299, 'Editors', 1, NULL, NULL),
(300, 'Technical Writers', 1, NULL, NULL),
(301, 'Writers and Authors', 1, NULL, NULL),
(302, 'Interpreters and Translators', 1, NULL, NULL),
(303, 'Court Reporters and Simultaneous Captioners', 1, NULL, NULL),
(304, 'Media and Communication Workers, All Other', 1, NULL, NULL),
(305, 'Audio and Video Technicians', 1, NULL, NULL),
(306, 'Broadcast Technicians', 1, NULL, NULL),
(307, 'Sound Engineering Technicians', 1, NULL, NULL),
(308, 'Lighting Technicians', 1, NULL, NULL),
(309, 'Photographers', 1, NULL, NULL),
(310, 'Camera Operators, Television, Video, and Film', 1, NULL, NULL),
(311, 'Film and Video Editors', 1, NULL, NULL),
(312, 'Media and Communication Equipment Workers, All Other', 1, NULL, NULL),
(313, 'Chiropractors', 1, NULL, NULL),
(314, 'Dentists, General', 1, NULL, NULL),
(315, 'Oral and Maxillofacial Surgeons', 1, NULL, NULL),
(316, 'Orthodontists', 1, NULL, NULL),
(317, 'Prosthodontists', 1, NULL, NULL),
(318, 'Dentists, All Other Specialists', 1, NULL, NULL),
(319, 'Dietitians and Nutritionists', 1, NULL, NULL),
(320, 'Optometrists', 1, NULL, NULL),
(321, 'Pharmacists', 1, NULL, NULL),
(322, 'Physician Assistants', 1, NULL, NULL),
(323, 'Podiatrists', 1, NULL, NULL),
(324, 'Occupational Therapists', 1, NULL, NULL),
(325, 'Physical Therapists', 1, NULL, NULL),
(326, 'Radiation Therapists', 1, NULL, NULL),
(327, 'Recreational Therapists', 1, NULL, NULL),
(328, 'Respiratory Therapists', 1, NULL, NULL),
(329, 'Speech-Language Pathologists', 1, NULL, NULL),
(330, 'Exercise Physiologists', 1, NULL, NULL),
(331, 'Therapists, All Other', 1, NULL, NULL),
(332, 'Veterinarians', 1, NULL, NULL),
(333, 'Registered Nurses', 1, NULL, NULL),
(334, 'Nurse Anesthetists', 1, NULL, NULL),
(335, 'Nurse Midwives', 1, NULL, NULL),
(336, 'Nurse Practitioners', 1, NULL, NULL),
(337, 'Audiologists', 1, NULL, NULL),
(338, 'Anesthesiologists', 1, NULL, NULL),
(339, 'Cardiologists', 1, NULL, NULL),
(340, 'Dermatologists', 1, NULL, NULL),
(341, 'Emergency Medicine Physicians', 1, NULL, NULL),
(342, 'Family Medicine Physicians', 1, NULL, NULL),
(343, 'General Internal Medicine Physicians', 1, NULL, NULL),
(344, 'Neurologists', 1, NULL, NULL),
(345, 'Obstetricians and Gynecologists', 1, NULL, NULL),
(346, 'Pediatricians, General', 1, NULL, NULL),
(347, 'Physicians, Pathologists', 1, NULL, NULL),
(348, 'Psychiatrists', 1, NULL, NULL),
(349, 'Radiologists', 1, NULL, NULL),
(350, 'Physicians, All Other', 1, NULL, NULL),
(351, 'Ophthalmologists, Except Pediatric', 1, NULL, NULL),
(352, 'Orthopedic Surgeons, Except Pediatric', 1, NULL, NULL),
(353, 'Pediatric Surgeons', 1, NULL, NULL),
(354, 'Surgeons, All Other', 1, NULL, NULL),
(355, 'Acupuncturists', 1, NULL, NULL),
(356, 'Dental Hygienists', 1, NULL, NULL),
(357, 'Healthcare Diagnosing or Treating Practitioners, All Other', 1, NULL, NULL),
(358, 'Medical and Clinical Laboratory Technologists', 1, NULL, NULL),
(359, 'Medical and Clinical Laboratory Technicians', 1, NULL, NULL),
(360, 'Cardiovascular Technologists and Technicians', 1, NULL, NULL),
(361, 'Diagnostic Medical Sonographers', 1, NULL, NULL),
(362, 'Nuclear Medicine Technologists', 1, NULL, NULL),
(363, 'Radiologic Technologists and Technicians', 1, NULL, NULL),
(364, 'Magnetic Resonance Imaging Technologists', 1, NULL, NULL),
(365, 'Medical Dosimetrists', 1, NULL, NULL),
(366, 'Emergency Medical Technicians', 1, NULL, NULL),
(367, 'Paramedics', 1, NULL, NULL),
(368, 'Dietetic Technicians', 1, NULL, NULL),
(369, 'Pharmacy Technicians', 1, NULL, NULL),
(370, 'Psychiatric Technicians', 1, NULL, NULL),
(371, 'Surgical Technologists', 1, NULL, NULL),
(372, 'Veterinary Technologists and Technicians', 1, NULL, NULL),
(373, 'Ophthalmic Medical Technicians', 1, NULL, NULL),
(374, 'Licensed Practical and Licensed Vocational Nurses', 1, NULL, NULL),
(375, 'Medical Records Specialists', 1, NULL, NULL),
(376, 'Opticians, Dispensing', 1, NULL, NULL),
(377, 'Orthotists and Prosthetists', 1, NULL, NULL),
(378, 'Hearing Aid Specialists', 1, NULL, NULL),
(379, 'Health Technologists and Technicians, All Other', 1, NULL, NULL),
(380, 'Health Information Technologists and Medical Registrars', 1, NULL, NULL),
(381, 'Athletic Trainers', 1, NULL, NULL),
(382, 'Genetic Counselors', 1, NULL, NULL),
(383, 'Surgical Assistants', 1, NULL, NULL),
(384, 'Healthcare Practitioners and Technical Workers, All Other', 1, NULL, NULL),
(385, 'Home Health Aides', 1, NULL, NULL),
(386, 'Personal Care Aides', 1, NULL, NULL),
(387, 'Nursing Assistants', 1, NULL, NULL),
(388, 'Orderlies', 1, NULL, NULL),
(389, 'Psychiatric Aides', 1, NULL, NULL),
(390, 'Occupational Therapy Assistants', 1, NULL, NULL),
(391, 'Occupational Therapy Aides', 1, NULL, NULL),
(392, 'Physical Therapist Assistants', 1, NULL, NULL),
(393, 'Physical Therapist Aides', 1, NULL, NULL),
(394, 'Massage Therapists', 1, NULL, NULL),
(395, 'Dental Assistants', 1, NULL, NULL),
(396, 'Medical Assistants', 1, NULL, NULL),
(397, 'Medical Equipment Preparers', 1, NULL, NULL),
(398, 'Medical Transcriptionists', 1, NULL, NULL),
(399, 'Pharmacy Aides', 1, NULL, NULL),
(400, 'Veterinary Assistants and Laboratory Animal Caretakers', 1, NULL, NULL),
(401, 'Phlebotomists', 1, NULL, NULL),
(402, 'Healthcare Support Workers, All Other', 1, NULL, NULL),
(403, 'First-Line Supervisors of Correctional Officers', 1, NULL, NULL),
(404, 'First-Line Supervisors of Police and Detectives', 1, NULL, NULL),
(405, 'First-Line Supervisors of Firefighting and Prevention Workers', 1, NULL, NULL),
(406, 'First-Line Supervisors of Security Workers', 1, NULL, NULL),
(407, 'First-Line Supervisors of Protective Service Workers, All Other', 1, NULL, NULL),
(408, 'Firefighters', 1, NULL, NULL),
(409, 'Fire Inspectors and Investigators', 1, NULL, NULL),
(410, 'Forest Fire Inspectors and Prevention Specialists', 1, NULL, NULL),
(411, 'Bailiffs', 1, NULL, NULL),
(412, 'Correctional Officers and Jailers', 1, NULL, NULL),
(413, 'Detectives and Criminal Investigators', 1, NULL, NULL),
(414, 'Fish and Game Wardens', 1, NULL, NULL),
(415, 'Parking Enforcement Workers', 1, NULL, NULL),
(416, 'Police and Sheriff’s Patrol Officers', 1, NULL, NULL),
(417, 'Transit and Railroad Police', 1, NULL, NULL),
(418, 'Animal Control Workers', 1, NULL, NULL),
(419, 'Private Detectives and Investigators', 1, NULL, NULL),
(420, 'Gambling Surveillance Officers and Gambling Investigators', 1, NULL, NULL),
(421, 'Security Guards', 1, NULL, NULL),
(422, 'Crossing Guards and Flaggers', 1, NULL, NULL),
(423, 'Lifeguards, Ski Patrol, and Other Recreational Protective Service Workers', 1, NULL, NULL),
(424, 'Transportation Security Screeners', 1, NULL, NULL),
(425, 'School Bus Monitors', 1, NULL, NULL),
(426, 'Protective Service Workers, All Other', 1, NULL, NULL),
(427, 'Chefs and Head Cooks', 1, NULL, NULL),
(428, 'First-Line Supervisors of Food Preparation and Serving Workers', 1, NULL, NULL),
(429, 'Cooks, Fast Food', 1, NULL, NULL),
(430, 'Cooks, Institution and Cafeteria', 1, NULL, NULL),
(431, 'Cooks, Private Household', 1, NULL, NULL),
(432, 'Cooks, Restaurant', 1, NULL, NULL),
(433, 'Cooks, Short Order', 1, NULL, NULL),
(434, 'Cooks, All Other', 1, NULL, NULL),
(435, 'Food Preparation Workers', 1, NULL, NULL),
(436, 'Bartenders', 1, NULL, NULL),
(437, 'Fast Food and Counter Workers', 1, NULL, NULL),
(438, 'Waiters and Waitresses', 1, NULL, NULL),
(439, 'Food Servers, Nonrestaurant', 1, NULL, NULL),
(440, 'Dining Room and Cafeteria Attendants and Bartender Helpers', 1, NULL, NULL),
(441, 'Dishwashers', 1, NULL, NULL),
(442, 'Hosts and Hostesses, Restaurant, Lounge, and Coffee Shop', 1, NULL, NULL),
(443, 'Food Preparation and Serving Related Workers, All Other', 1, NULL, NULL),
(444, 'First-Line Supervisors of Housekeeping and Janitorial Workers', 1, NULL, NULL),
(445, 'First-Line Supervisors of Landscaping, Lawn Service, and Groundskeeping Workers', 1, NULL, NULL),
(446, 'Janitors and Cleaners, Except Maids and Housekeeping Cleaners', 1, NULL, NULL),
(447, 'Maids and Housekeeping Cleaners', 1, NULL, NULL),
(448, 'Building Cleaning Workers, All Other', 1, NULL, NULL),
(449, 'Pest Control Workers', 1, NULL, NULL),
(450, 'Landscaping and Groundskeeping Workers', 1, NULL, NULL),
(451, 'Pesticide Handlers, Sprayers, and Applicators, Vegetation', 1, NULL, NULL),
(452, 'Tree Trimmers and Pruners', 1, NULL, NULL),
(453, 'Grounds Maintenance Workers, All Other', 1, NULL, NULL),
(454, 'First-Line Supervisors of Gambling Services Workers', 1, NULL, NULL),
(455, 'First-Line Supervisors of Entertainment and Recreation Workers, Except Gambling Services', 1, NULL, NULL),
(456, 'First-Line Supervisors of Personal Service Workers', 1, NULL, NULL),
(457, 'Animal Trainers', 1, NULL, NULL),
(458, 'Animal Caretakers', 1, NULL, NULL),
(459, 'Gambling Dealers', 1, NULL, NULL),
(460, 'Gambling and Sports Book Writers and Runners', 1, NULL, NULL),
(461, 'Gambling Service Workers, All Other', 1, NULL, NULL),
(462, 'Motion Picture Projectionists', 1, NULL, NULL),
(463, 'Ushers, Lobby Attendants, and Ticket Takers', 1, NULL, NULL),
(464, 'Amusement and Recreation Attendants', 1, NULL, NULL),
(465, 'Costume Attendants', 1, NULL, NULL),
(466, 'Locker Room, Coatroom, and Dressing Room Attendants', 1, NULL, NULL),
(467, 'Entertainment Attendants and Related Workers, All Other', 1, NULL, NULL),
(468, 'Embalmers', 1, NULL, NULL),
(469, 'Crematory Operators', 1, NULL, NULL),
(470, 'Funeral Attendants', 1, NULL, NULL),
(471, 'Morticians, Undertakers, and Funeral Arrangers', 1, NULL, NULL),
(472, 'Barbers', 1, NULL, NULL),
(473, 'Hairdressers, Hairstylists, and Cosmetologists', 1, NULL, NULL),
(474, 'Makeup Artists, Theatrical and Performance', 1, NULL, NULL),
(475, 'Manicurists and Pedicurists', 1, NULL, NULL),
(476, 'Shampooers', 1, NULL, NULL),
(477, 'Skincare Specialists', 1, NULL, NULL),
(478, 'Baggage Porters and Bellhops', 1, NULL, NULL),
(479, 'Concierges', 1, NULL, NULL),
(480, 'Tour Guides and Escorts', 1, NULL, NULL),
(481, 'Travel Guides', 1, NULL, NULL),
(482, 'Childcare Workers', 1, NULL, NULL),
(483, 'Exercise Trainers and Group Fitness Instructors', 1, NULL, NULL),
(484, 'Recreation Workers', 1, NULL, NULL),
(485, 'Residential Advisors', 1, NULL, NULL),
(486, 'Personal Care and Service Workers, All Other', 1, NULL, NULL),
(487, 'First-Line Supervisors of Retail Sales Workers', 1, NULL, NULL),
(488, 'First-Line Supervisors of Non-Retail Sales Workers', 1, NULL, NULL),
(489, 'Cashiers', 1, NULL, NULL),
(490, 'Gambling Change Persons and Booth Cashiers', 1, NULL, NULL),
(491, 'Counter and Rental Clerks', 1, NULL, NULL),
(492, 'Parts Salespersons', 1, NULL, NULL),
(493, 'Retail Salespersons', 1, NULL, NULL),
(494, 'Advertising Sales Agents', 1, NULL, NULL),
(495, 'Insurance Sales Agents', 1, NULL, NULL),
(496, 'Securities, Commodities, and Financial Services Sales Agents', 1, NULL, NULL),
(497, 'Travel Agents', 1, NULL, NULL),
(498, 'Sales Representatives of Services, Except Advertising, Insurance, Financial Services, and Travel', 1, NULL, NULL),
(499, 'Sales Representatives, Wholesale and Manufacturing, Technical and Scientific Products', 1, NULL, NULL),
(500, 'Sales Representatives, Wholesale and Manufacturing, Except Technical and Scientific Products', 1, NULL, NULL),
(501, 'Demonstrators and Product Promoters', 1, NULL, NULL),
(502, 'Models', 1, NULL, NULL),
(503, 'Real Estate Brokers', 1, NULL, NULL),
(504, 'Real Estate Sales Agents', 1, NULL, NULL),
(505, 'Sales Engineers', 1, NULL, NULL),
(506, 'Telemarketers', 1, NULL, NULL),
(507, 'Door-to-Door Sales Workers, News and Street Vendors, and Related Workers', 1, NULL, NULL),
(508, 'Sales and Related Workers, All Other', 1, NULL, NULL),
(509, 'First-Line Supervisors of Office and Administrative Support Workers', 1, NULL, NULL),
(510, 'Switchboard Operators, Including Answering Service', 1, NULL, NULL),
(511, 'Telephone Operators', 1, NULL, NULL),
(512, 'Communications Equipment Operators, All Other', 1, NULL, NULL),
(513, 'Bill and Account Collectors', 1, NULL, NULL),
(514, 'Billing and Posting Clerks', 1, NULL, NULL),
(515, 'Bookkeeping, Accounting, and Auditing Clerks', 1, NULL, NULL),
(516, 'Gambling Cage Workers', 1, NULL, NULL),
(517, 'Payroll and Timekeeping Clerks', 1, NULL, NULL),
(518, 'Procurement Clerks', 1, NULL, NULL),
(519, 'Tellers', 1, NULL, NULL),
(520, 'Financial Clerks, All Other', 1, NULL, NULL),
(521, 'Brokerage Clerks', 1, NULL, NULL),
(522, 'Correspondence Clerks', 1, NULL, NULL),
(523, 'Court, Municipal, and License Clerks', 1, NULL, NULL),
(524, 'Credit Authorizers, Checkers, and Clerks', 1, NULL, NULL),
(525, 'Customer Service Representatives', 1, NULL, NULL),
(526, 'Eligibility Interviewers, Government Programs', 1, NULL, NULL),
(527, 'File Clerks', 1, NULL, NULL),
(528, 'Hotel, Motel, and Resort Desk Clerks', 1, NULL, NULL),
(529, 'Interviewers, Except Eligibility and Loan', 1, NULL, NULL),
(530, 'Library Assistants, Clerical', 1, NULL, NULL),
(531, 'Loan Interviewers and Clerks', 1, NULL, NULL),
(532, 'New Accounts Clerks', 1, NULL, NULL),
(533, 'Order Clerks', 1, NULL, NULL),
(534, 'Human Resources Assistants, Except Payroll and Timekeeping', 1, NULL, NULL),
(535, 'Receptionists and Information Clerks', 1, NULL, NULL),
(536, 'Reservation and Transportation Ticket Agents and Travel Clerks', 1, NULL, NULL),
(537, 'Information and Record Clerks, All Other', 1, NULL, NULL),
(538, 'Cargo and Freight Agents', 1, NULL, NULL),
(539, 'Couriers and Messengers', 1, NULL, NULL),
(540, 'Public Safety Telecommunicators', 1, NULL, NULL),
(541, 'Dispatchers, Except Police, Fire, and Ambulance', 1, NULL, NULL),
(542, 'Meter Readers, Utilities', 1, NULL, NULL),
(543, 'Postal Service Clerks', 1, NULL, NULL),
(544, 'Postal Service Mail Carriers', 1, NULL, NULL),
(545, 'Postal Service Mail Sorters, Processors, and Processing Machine Operators', 1, NULL, NULL),
(546, 'Production, Planning, and Expediting Clerks', 1, NULL, NULL),
(547, 'Shipping, Receiving, and Inventory Clerks', 1, NULL, NULL),
(548, 'Weighers, Measurers, Checkers, and Samplers, Recordkeeping', 1, NULL, NULL),
(549, 'Executive Secretaries and Executive Administrative Assistants', 1, NULL, NULL),
(550, 'Legal Secretaries and Administrative Assistants', 1, NULL, NULL),
(551, 'Medical Secretaries and Administrative Assistants', 1, NULL, NULL),
(552, 'Secretaries and Administrative Assistants, Except Legal, Medical, and Executive', 1, NULL, NULL),
(553, 'Data Entry Keyers', 1, NULL, NULL),
(554, 'Word Processors and Typists', 1, NULL, NULL),
(555, 'Desktop Publishers', 1, NULL, NULL),
(556, 'Insurance Claims and Policy Processing Clerks', 1, NULL, NULL),
(557, 'Mail Clerks and Mail Machine Operators, Except Postal Service', 1, NULL, NULL),
(558, 'Office Clerks, General', 1, NULL, NULL),
(559, 'Office Machine Operators, Except Computer', 1, NULL, NULL),
(560, 'Proofreaders and Copy Markers', 1, NULL, NULL),
(561, 'Statistical Assistants', 1, NULL, NULL),
(562, 'Office and Administrative Support Workers, All Other', 1, NULL, NULL),
(563, 'First-Line Supervisors of Farming, Fishing, and Forestry Workers', 1, NULL, NULL),
(564, 'Agricultural Inspectors', 1, NULL, NULL),
(565, 'Animal Breeders', 1, NULL, NULL),
(566, 'Graders and Sorters, Agricultural Products', 1, NULL, NULL),
(567, 'Agricultural Equipment Operators', 1, NULL, NULL),
(568, 'Farmworkers and Laborers, Crop, Nursery, and Greenhouse', 1, NULL, NULL),
(569, 'Farmworkers, Farm, Ranch, and Aquacultural Animals', 1, NULL, NULL),
(570, 'Agricultural Workers, All Other', 1, NULL, NULL),
(571, 'Fishing and Hunting Workers', 1, NULL, NULL),
(572, 'Forest and Conservation Workers', 1, NULL, NULL),
(573, 'Fallers', 1, NULL, NULL),
(574, 'Logging Equipment Operators', 1, NULL, NULL),
(575, 'Log Graders and Scalers', 1, NULL, NULL),
(576, 'Logging Workers, All Other', 1, NULL, NULL),
(577, 'First-Line Supervisors of Construction Trades and Extraction Workers', 1, NULL, NULL),
(578, 'Boilermakers', 1, NULL, NULL),
(579, 'Brickmasons and Blockmasons', 1, NULL, NULL),
(580, 'Stonemasons', 1, NULL, NULL),
(581, 'Carpenters', 1, NULL, NULL),
(582, 'Carpet Installers', 1, NULL, NULL),
(583, 'Floor Layers, Except Carpet, Wood, and Hard Tiles', 1, NULL, NULL),
(584, 'Floor Sanders and Finishers', 1, NULL, NULL),
(585, 'Tile and Stone Setters', 1, NULL, NULL),
(586, 'Cement Masons and Concrete Finishers', 1, NULL, NULL),
(587, 'Terrazzo Workers and Finishers', 1, NULL, NULL),
(588, 'Construction Laborers', 1, NULL, NULL),
(589, 'Paving, Surfacing, and Tamping Equipment Operators', 1, NULL, NULL),
(590, 'Pile Driver Operators', 1, NULL, NULL),
(591, 'Operating Engineers and Other Construction Equipment Operators', 1, NULL, NULL),
(592, 'Drywall and Ceiling Tile Installers', 1, NULL, NULL),
(593, 'Tapers', 1, NULL, NULL),
(594, 'Electricians', 1, NULL, NULL),
(595, 'Glaziers', 1, NULL, NULL),
(596, 'Insulation Workers, Floor, Ceiling, and Wall', 1, NULL, NULL),
(597, 'Insulation Workers, Mechanical', 1, NULL, NULL),
(598, 'Painters, Construction and Maintenance', 1, NULL, NULL),
(599, 'Paperhangers', 1, NULL, NULL),
(600, 'Pipelayers', 1, NULL, NULL),
(601, 'Plumbers, Pipefitters, and Steamfitters', 1, NULL, NULL),
(602, 'Plasterers and Stucco Masons', 1, NULL, NULL),
(603, 'Reinforcing Iron and Rebar Workers', 1, NULL, NULL),
(604, 'Roofers', 1, NULL, NULL),
(605, 'Sheet Metal Workers', 1, NULL, NULL),
(606, 'Structural Iron and Steel Workers', 1, NULL, NULL),
(607, 'Solar Photovoltaic Installers', 1, NULL, NULL),
(608, 'Helpers--Brickmasons, Blockmasons, Stonemasons, and Tile and Marble Setters', 1, NULL, NULL),
(609, 'Helpers--Carpenters', 1, NULL, NULL),
(610, 'Helpers--Electricians', 1, NULL, NULL),
(611, 'Helpers--Painters, Paperhangers, Plasterers, and Stucco Masons', 1, NULL, NULL),
(612, 'Helpers--Pipelayers, Plumbers, Pipefitters, and Steamfitters', 1, NULL, NULL),
(613, 'Helpers--Roofers', 1, NULL, NULL),
(614, 'Helpers, Construction Trades, All Other', 1, NULL, NULL),
(615, 'Construction and Building Inspectors', 1, NULL, NULL),
(616, 'Elevator and Escalator Installers and Repairers', 1, NULL, NULL),
(617, 'Fence Erectors', 1, NULL, NULL),
(618, 'Hazardous Materials Removal Workers', 1, NULL, NULL),
(619, 'Highway Maintenance Workers', 1, NULL, NULL),
(620, 'Rail-Track Laying and Maintenance Equipment Operators', 1, NULL, NULL),
(621, 'Septic Tank Servicers and Sewer Pipe Cleaners', 1, NULL, NULL),
(622, 'Segmental Pavers', 1, NULL, NULL),
(623, 'Construction and Related Workers, All Other', 1, NULL, NULL),
(624, 'Derrick Operators, Oil and Gas', 1, NULL, NULL),
(625, 'Rotary Drill Operators, Oil and Gas', 1, NULL, NULL),
(626, 'Service Unit Operators, Oil and Gas', 1, NULL, NULL),
(627, 'Excavating and Loading Machine and Dragline Operators, Surface Mining', 1, NULL, NULL),
(628, 'Earth Drillers, Except Oil and Gas', 1, NULL, NULL),
(629, 'Explosives Workers, Ordnance Handling Experts, and Blasters', 1, NULL, NULL),
(630, 'Continuous Mining Machine Operators', 1, NULL, NULL),
(631, 'Roof Bolters, Mining', 1, NULL, NULL),
(632, 'Loading and Moving Machine Operators, Underground Mining', 1, NULL, NULL),
(633, 'Underground Mining Machine Operators, All Other', 1, NULL, NULL),
(634, 'Rock Splitters, Quarry', 1, NULL, NULL),
(635, 'Roustabouts, Oil and Gas', 1, NULL, NULL),
(636, 'Helpers--Extraction Workers', 1, NULL, NULL),
(637, 'Extraction Workers, All Other', 1, NULL, NULL),
(638, 'First-Line Supervisors of Mechanics, Installers, and Repairers', 1, NULL, NULL),
(639, 'Computer, Automated Teller, and Office Machine Repairers', 1, NULL, NULL),
(640, 'Radio, Cellular, and Tower Equipment Installers and Repairers', 1, NULL, NULL),
(641, 'Telecommunications Equipment Installers and Repairers, Except Line Installers', 1, NULL, NULL),
(642, 'Avionics Technicians', 1, NULL, NULL),
(643, 'Electric Motor, Power Tool, and Related Repairers', 1, NULL, NULL),
(644, 'Electrical and Electronics Installers and Repairers, Transportation Equipment', 1, NULL, NULL),
(645, 'Electrical and Electronics Repairers, Commercial and Industrial Equipment', 1, NULL, NULL),
(646, 'Electrical and Electronics Repairers, Powerhouse, Substation, and Relay', 1, NULL, NULL),
(647, 'Electronic Equipment Installers and Repairers, Motor Vehicles', 1, NULL, NULL),
(648, 'Audiovisual Equipment Installers and Repairers', 1, NULL, NULL),
(649, 'Security and Fire Alarm Systems Installers', 1, NULL, NULL),
(650, 'Aircraft Mechanics and Service Technicians', 1, NULL, NULL),
(651, 'Automotive Body and Related Repairers', 1, NULL, NULL),
(652, 'Automotive Glass Installers and Repairers', 1, NULL, NULL),
(653, 'Automotive Service Technicians and Mechanics', 1, NULL, NULL),
(654, 'Bus and Truck Mechanics and Diesel Engine Specialists', 1, NULL, NULL),
(655, 'Farm Equipment Mechanics and Service Technicians', 1, NULL, NULL),
(656, 'Mobile Heavy Equipment Mechanics, Except Engines', 1, NULL, NULL),
(657, 'Rail Car Repairers', 1, NULL, NULL),
(658, 'Motorboat Mechanics and Service Technicians', 1, NULL, NULL),
(659, 'Motorcycle Mechanics', 1, NULL, NULL),
(660, 'Outdoor Power Equipment and Other Small Engine Mechanics', 1, NULL, NULL),
(661, 'Bicycle Repairers', 1, NULL, NULL),
(662, 'Recreational Vehicle Service Technicians', 1, NULL, NULL),
(663, 'Tire Repairers and Changers', 1, NULL, NULL),
(664, 'Mechanical Door Repairers', 1, NULL, NULL),
(665, 'Control and Valve Installers and Repairers, Except Mechanical Door', 1, NULL, NULL),
(666, 'Heating, Air Conditioning, and Refrigeration Mechanics and Installers', 1, NULL, NULL),
(667, 'Home Appliance Repairers', 1, NULL, NULL),
(668, 'Industrial Machinery Mechanics', 1, NULL, NULL),
(669, 'Maintenance Workers, Machinery', 1, NULL, NULL),
(670, 'Millwrights', 1, NULL, NULL),
(671, 'Refractory Materials Repairers, Except Brickmasons', 1, NULL, NULL),
(672, 'Electrical Power-Line Installers and Repairers', 1, NULL, NULL),
(673, 'Telecommunications Line Installers and Repairers', 1, NULL, NULL),
(674, 'Camera and Photographic Equipment Repairers', 1, NULL, NULL),
(675, 'Medical Equipment Repairers', 1, NULL, NULL),
(676, 'Musical Instrument Repairers and Tuners', 1, NULL, NULL),
(677, 'Watch and Clock Repairers', 1, NULL, NULL),
(678, 'Precision Instrument and Equipment Repairers, All Other', 1, NULL, NULL),
(679, 'Maintenance and Repair Workers, General', 1, NULL, NULL),
(680, 'Wind Turbine Service Technicians', 1, NULL, NULL),
(681, 'Coin, Vending, and Amusement Machine Servicers and Repairers', 1, NULL, NULL),
(682, 'Commercial Divers', 1, NULL, NULL),
(683, 'Locksmiths and Safe Repairers', 1, NULL, NULL),
(684, 'Manufactured Building and Mobile Home Installers', 1, NULL, NULL),
(685, 'Riggers', 1, NULL, NULL),
(686, 'Signal and Track Switch Repairers', 1, NULL, NULL),
(687, 'Helpers--Installation, Maintenance, and Repair Workers', 1, NULL, NULL),
(688, 'Installation, Maintenance, and Repair Workers, All Other', 1, NULL, NULL),
(689, 'First-Line Supervisors of Production and Operating Workers', 1, NULL, NULL),
(690, 'Aircraft Structure, Surfaces, Rigging, and Systems Assemblers', 1, NULL, NULL),
(691, 'Coil Winders, Tapers, and Finishers', 1, NULL, NULL),
(692, 'Electrical and Electronic Equipment Assemblers', 1, NULL, NULL),
(693, 'Electromechanical Equipment Assemblers', 1, NULL, NULL),
(694, 'Engine and Other Machine Assemblers', 1, NULL, NULL),
(695, 'Structural Metal Fabricators and Fitters', 1, NULL, NULL),
(696, 'Fiberglass Laminators and Fabricators', 1, NULL, NULL),
(697, 'Timing Device Assemblers and Adjusters', 1, NULL, NULL),
(698, 'Team Assemblers', 1, NULL, NULL),
(699, 'Assemblers and Fabricators, All Other', 1, NULL, NULL),
(700, 'Bakers', 1, NULL, NULL),
(701, 'Butchers and Meat Cutters', 1, NULL, NULL),
(702, 'Meat, Poultry, and Fish Cutters and Trimmers', 1, NULL, NULL),
(703, 'Slaughterers and Meat Packers', 1, NULL, NULL),
(704, 'Food and Tobacco Roasting, Baking, and Drying Machine Operators and Tenders', 1, NULL, NULL),
(705, 'Food Batchmakers', 1, NULL, NULL),
(706, 'Food Cooking Machine Operators and Tenders', 1, NULL, NULL),
(707, 'Food Processing Workers, All Other', 1, NULL, NULL),
(708, 'Extruding and Drawing Machine Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(709, 'Forging Machine Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(710, 'Rolling Machine Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(711, 'Cutting, Punching, and Press Machine Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(712, 'Drilling and Boring Machine Tool Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(713, 'Grinding, Lapping, Polishing, and Buffing Machine Tool Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(714, 'Lathe and Turning Machine Tool Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(715, 'Milling and Planing Machine Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(716, 'Machinists', 1, NULL, NULL),
(717, 'Metal-Refining Furnace Operators and Tenders', 1, NULL, NULL),
(718, 'Pourers and Casters, Metal', 1, NULL, NULL),
(719, 'Model Makers, Metal and Plastic', 1, NULL, NULL),
(720, 'Patternmakers, Metal and Plastic', 1, NULL, NULL),
(721, 'Foundry Mold and Coremakers', 1, NULL, NULL),
(722, 'Molding, Coremaking, and Casting Machine Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(723, 'Multiple Machine Tool Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(724, 'Tool and Die Makers', 1, NULL, NULL),
(725, 'Welders, Cutters, Solderers, and Brazers', 1, NULL, NULL),
(726, 'Welding, Soldering, and Brazing Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(727, 'Heat Treating Equipment Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(728, 'Layout Workers, Metal and Plastic', 1, NULL, NULL),
(729, 'Plating Machine Setters, Operators, and Tenders, Metal and Plastic', 1, NULL, NULL),
(730, 'Tool Grinders, Filers, and Sharpeners', 1, NULL, NULL),
(731, 'Metal Workers and Plastic Workers, All Other', 1, NULL, NULL),
(732, 'Prepress Technicians and Workers', 1, NULL, NULL),
(733, 'Printing Press Operators', 1, NULL, NULL),
(734, 'Print Binding and Finishing Workers', 1, NULL, NULL),
(735, 'Laundry and Dry-Cleaning Workers', 1, NULL, NULL),
(736, 'Pressers, Textile, Garment, and Related Materials', 1, NULL, NULL),
(737, 'Sewing Machine Operators', 1, NULL, NULL),
(738, 'Shoe and Leather Workers and Repairers', 1, NULL, NULL),
(739, 'Shoe Machine Operators and Tenders', 1, NULL, NULL),
(740, 'Sewers, Hand', 1, NULL, NULL),
(741, 'Tailors, Dressmakers, and Custom Sewers', 1, NULL, NULL),
(742, 'Textile Bleaching and Dyeing Machine Operators and Tenders', 1, NULL, NULL),
(743, 'Textile Cutting Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(744, 'Textile Knitting and Weaving Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(745, 'Textile Winding, Twisting, and Drawing Out Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(746, 'Extruding and Forming Machine Setters, Operators, and Tenders, Synthetic and Glass Fibers', 1, NULL, NULL),
(747, 'Fabric and Apparel Patternmakers', 1, NULL, NULL),
(748, 'Upholsterers', 1, NULL, NULL),
(749, 'Textile, Apparel, and Furnishings Workers, All Other', 1, NULL, NULL),
(750, 'Cabinetmakers and Bench Carpenters', 1, NULL, NULL),
(751, 'Furniture Finishers', 1, NULL, NULL),
(752, 'Model Makers, Wood', 1, NULL, NULL),
(753, 'Patternmakers, Wood', 1, NULL, NULL),
(754, 'Sawing Machine Setters, Operators, and Tenders, Wood', 1, NULL, NULL),
(755, 'Woodworking Machine Setters, Operators, and Tenders, Except Sawing', 1, NULL, NULL),
(756, 'Woodworkers, All Other', 1, NULL, NULL),
(757, 'Nuclear Power Reactor Operators', 1, NULL, NULL),
(758, 'Power Distributors and Dispatchers', 1, NULL, NULL),
(759, 'Power Plant Operators', 1, NULL, NULL),
(760, 'Stationary Engineers and Boiler Operators', 1, NULL, NULL),
(761, 'Water and Wastewater Treatment Plant and System Operators', 1, NULL, NULL),
(762, 'Chemical Plant and System Operators', 1, NULL, NULL),
(763, 'Gas Plant Operators', 1, NULL, NULL),
(764, 'Petroleum Pump System Operators, Refinery Operators, and Gaugers', 1, NULL, NULL),
(765, 'Plant and System Operators, All Other', 1, NULL, NULL),
(766, 'Chemical Equipment Operators and Tenders', 1, NULL, NULL),
(767, 'Separating, Filtering, Clarifying, Precipitating, and Still Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(768, 'Crushing, Grinding, and Polishing Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(769, 'Grinding and Polishing Workers, Hand', 1, NULL, NULL),
(770, 'Mixing and Blending Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(771, 'Cutters and Trimmers, Hand', 1, NULL, NULL),
(772, 'Cutting and Slicing Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(773, 'Extruding, Forming, Pressing, and Compacting Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(774, 'Furnace, Kiln, Oven, Drier, and Kettle Operators and Tenders', 1, NULL, NULL),
(775, 'Inspectors, Testers, Sorters, Samplers, and Weighers', 1, NULL, NULL),
(776, 'Jewelers and Precious Stone and Metal Workers', 1, NULL, NULL),
(777, 'Dental Laboratory Technicians', 1, NULL, NULL),
(778, 'Medical Appliance Technicians', 1, NULL, NULL),
(779, 'Ophthalmic Laboratory Technicians', 1, NULL, NULL),
(780, 'Packaging and Filling Machine Operators and Tenders', 1, NULL, NULL),
(781, 'Painting, Coating, and Decorating Workers', 1, NULL, NULL),
(782, 'Coating, Painting, and Spraying Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(783, 'Semiconductor Processing Technicians', 1, NULL, NULL),
(784, 'Photographic Process Workers and Processing Machine Operators', 1, NULL, NULL),
(785, 'Computer Numerically Controlled Tool Operators', 1, NULL, NULL),
(786, 'Computer Numerically Controlled Tool Programmers', 1, NULL, NULL),
(787, 'Adhesive Bonding Machine Operators and Tenders', 1, NULL, NULL),
(788, 'Cleaning, Washing, and Metal Pickling Equipment Operators and Tenders', 1, NULL, NULL),
(789, 'Cooling and Freezing Equipment Operators and Tenders', 1, NULL, NULL),
(790, 'Etchers and Engravers', 1, NULL, NULL),
(791, 'Molders, Shapers, and Casters, Except Metal and Plastic', 1, NULL, NULL),
(792, 'Paper Goods Machine Setters, Operators, and Tenders', 1, NULL, NULL),
(793, 'Tire Builders', 1, NULL, NULL),
(794, 'Helpers--Production Workers', 1, NULL, NULL),
(795, 'Production Workers, All Other', 1, NULL, NULL),
(796, 'Aircraft Cargo Handling Supervisors', 1, NULL, NULL),
(797, 'First-Line Supervisors of Helpers, Laborers, and Material Movers, Hand', 1, NULL, NULL),
(798, 'First-Line Supervisors of Material-Moving Machine and Vehicle Operators', 1, NULL, NULL),
(799, 'First-Line Supervisors of Passenger Attendants', 1, NULL, NULL),
(800, 'First-Line Supervisors of Transportation Workers, All Other', 1, NULL, NULL),
(801, 'Airline Pilots, Copilots, and Flight Engineers', 1, NULL, NULL),
(802, 'Commercial Pilots', 1, NULL, NULL),
(803, 'Air Traffic Controllers', 1, NULL, NULL),
(804, 'Airfield Operations Specialists', 1, NULL, NULL),
(805, 'Flight Attendants', 1, NULL, NULL),
(806, 'Ambulance Drivers and Attendants, Except Emergency Medical Technicians', 1, NULL, NULL),
(807, 'Driver/Sales Workers', 1, NULL, NULL),
(808, 'Heavy and Tractor-Trailer Truck Drivers', 1, NULL, NULL),
(809, 'Light Truck Drivers', 1, NULL, NULL),
(810, 'Bus Drivers, School', 1, NULL, NULL),
(811, 'Bus Drivers, Transit and Intercity', 1, NULL, NULL),
(812, 'Shuttle Drivers and Chauffeurs', 1, NULL, NULL),
(813, 'Taxi Drivers', 1, NULL, NULL),
(814, 'Motor Vehicle Operators, All Other', 1, NULL, NULL),
(815, 'Locomotive Engineers', 1, NULL, NULL),
(816, 'Rail Yard Engineers, Dinkey Operators, and Hostlers', 1, NULL, NULL),
(817, 'Railroad Brake, Signal, and Switch Operators and Locomotive Firers', 1, NULL, NULL),
(818, 'Railroad Conductors and Yardmasters', 1, NULL, NULL),
(819, 'Subway and Streetcar Operators', 1, NULL, NULL),
(820, 'Rail Transportation Workers, All Other', 1, NULL, NULL),
(821, 'Sailors and Marine Oilers', 1, NULL, NULL),
(822, 'Captains, Mates, and Pilots of Water Vessels', 1, NULL, NULL),
(823, 'Motorboat Operators', 1, NULL, NULL),
(824, 'Ship Engineers', 1, NULL, NULL),
(825, 'Bridge and Lock Tenders', 1, NULL, NULL),
(826, 'Parking Attendants', 1, NULL, NULL),
(827, 'Automotive and Watercraft Service Attendants', 1, NULL, NULL),
(828, 'Aircraft Service Attendants', 1, NULL, NULL),
(829, 'Traffic Technicians', 1, NULL, NULL),
(830, 'Transportation Inspectors', 1, NULL, NULL),
(831, 'Passenger Attendants', 1, NULL, NULL),
(832, 'Transportation Workers, All Other', 1, NULL, NULL),
(833, 'Conveyor Operators and Tenders', 1, NULL, NULL),
(834, 'Crane and Tower Operators', 1, NULL, NULL),
(835, 'Dredge Operators', 1, NULL, NULL),
(836, 'Hoist and Winch Operators', 1, NULL, NULL),
(837, 'Industrial Truck and Tractor Operators', 1, NULL, NULL),
(838, 'Cleaners of Vehicles and Equipment', 1, NULL, NULL),
(839, 'Laborers and Freight, Stock, and Material Movers, Hand', 1, NULL, NULL),
(840, 'Machine Feeders and Offbearers', 1, NULL, NULL),
(841, 'Packers and Packagers, Hand', 1, NULL, NULL),
(842, 'Stockers and Order Fillers', 1, NULL, NULL),
(843, 'Gas Compressor and Gas Pumping Station Operators', 1, NULL, NULL),
(844, 'Pump Operators, Except Wellhead Pumpers', 1, NULL, NULL),
(845, 'Wellhead Pumpers', 1, NULL, NULL),
(846, 'Refuse and Recyclable Material Collectors', 1, NULL, NULL),
(847, 'Tank Car, Truck, and Ship Loaders', 1, NULL, NULL),
(848, 'Material Moving Workers, All Other', 1, NULL, NULL),
(849, 'Air Crew Officers', 1, NULL, NULL),
(850, 'Aircraft Launch and Recovery Officers', 1, NULL, NULL),
(851, 'Armored Assault Vehicle Officers', 1, NULL, NULL),
(852, 'Artillery and Missile Officers', 1, NULL, NULL),
(853, 'Command and Control Center Officers', 1, NULL, NULL),
(854, 'Infantry Officers', 1, NULL, NULL),
(855, 'Special Forces Officers', 1, NULL, NULL);
INSERT INTO `professions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(856, 'Military Officer Special and Tactical Operations Leaders, All Other', 1, NULL, NULL),
(857, 'First-Line Supervisors of Air Crew Members', 1, NULL, NULL),
(858, 'First-Line Supervisors of Weapons Specialists/Crew Members', 1, NULL, NULL),
(859, 'First-Line Supervisors of All Other Tactical Operations Specialists', 1, NULL, NULL),
(860, 'Air Crew Members', 1, NULL, NULL),
(861, 'Aircraft Launch and Recovery Specialists', 1, NULL, NULL),
(862, 'Armored Assault Vehicle Crew Members', 1, NULL, NULL),
(863, 'Artillery and Missile Crew Members', 1, NULL, NULL),
(864, 'Command and Control Center Specialists', 1, NULL, NULL),
(865, 'Infantry', 1, NULL, NULL),
(866, 'Special Forces', 1, NULL, NULL),
(867, 'Military Enlisted Tactical Operations and Air/Weapons Specialists and Crew Members, All Other', 1, NULL, NULL),
(868, 'Others', 1, NULL, NULL),
(869, 'Student', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programcategories`
--

CREATE TABLE `programcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programcategories`
--

INSERT INTO `programcategories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Advanced', 1, '2021-02-24 05:01:12', '2021-02-24 05:01:12'),
(2, 'Academic', 1, '2021-02-24 05:01:19', '2021-02-24 05:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `programnames`
--

CREATE TABLE `programnames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programnames`
--

INSERT INTO `programnames` (`id`, `name`, `program_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Algorithm And Programming', 7500000, 1, '2021-02-24 05:01:47', '2021-02-24 05:01:47'),
(2, 'Data Science', 13250000, 1, '2021-02-24 05:01:57', '2021-02-24 05:01:57'),
(3, 'Dicrete Mathematics', 3000000, 1, '2021-02-24 05:03:38', '2021-02-24 05:03:38'),
(4, 'Google SEO', 7800000, 1, '2021-02-24 05:04:42', '2021-02-24 05:04:42'),
(5, 'Digital Marketing', 9000000, 1, '2021-02-24 05:05:14', '2021-02-24 05:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) NOT NULL,
  `programcategory_id` bigint(20) NOT NULL,
  `programname_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastedited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `branch_id`, `programcategory_id`, `programname_id`, `date`, `created_by`, `lastedited_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-02-26', 'Admin CRM', NULL, '2021-02-24 06:02:46', '2021-02-24 06:02:46'),
(2, 2, 2, 1, '2021-02-02', 'Admin CRM', NULL, '2021-02-24 06:02:56', '2021-02-24 06:02:56'),
(3, 2, 2, 1, '2021-02-22', 'Admin CRM', NULL, '2021-02-24 06:03:07', '2021-02-24 06:03:07'),
(4, 2, 1, 2, '2021-02-11', 'Admin CRM', NULL, '2021-02-24 06:03:18', '2021-02-24 06:03:18'),
(5, 1, 1, 2, '2021-02-26', 'Admin CRM', NULL, '2021-02-24 06:03:28', '2021-02-24 06:03:28'),
(6, 2, 2, 4, '2021-03-12', 'Admin CRM', NULL, '2021-02-24 06:03:41', '2021-02-24 06:03:41'),
(7, 2, 2, 4, '2021-04-08', 'Admin CRM', 'Admin CRM', '2021-02-24 06:03:42', '2021-02-24 06:04:05'),
(8, 2, 2, 4, '2021-03-05', 'Admin CRM', NULL, '2021-02-24 06:03:51', '2021-02-24 06:03:51'),
(9, 1, 2, 5, '2021-02-18', 'Admin CRM', 'User CRM', '2021-02-24 06:04:21', '2021-02-24 06:05:39'),
(10, 1, 1, 4, '2021-04-20', 'Admin CRM', 'User CRM', '2021-02-24 06:04:35', '2021-02-24 06:05:32'),
(11, 1, 2, 3, '2021-03-07', 'User CRM', NULL, '2021-02-24 06:05:20', '2021-02-24 06:05:20'),
(12, 1, 1, 2, '2021-02-19', 'User CRM', NULL, '2021-02-24 06:05:58', '2021-02-24 06:05:58'),
(13, 1, 2, 3, '2021-02-11', 'User CRM', NULL, '2021-02-24 06:06:15', '2021-02-24 06:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `participant_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jacket_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skillcertificate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skillcertificate_pickdate` date DEFAULT NULL,
  `attendancecertificate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendancecertificate_pickdate` date DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `transaction_id`, `score`, `grade`, `jacket_size`, `skillcertificate_number`, `skillcertificate_pickdate`, `attendancecertificate_number`, `attendancecertificate_pickdate`, `photo`, `created_at`, `updated_at`) VALUES
(1, 5, 90, 'A', 'L', '2021/XYZ/001-01', '2021-03-12', '2021/XYZ/001-01', '2021-03-12', '1614147804.png', '2021-02-24 06:23:24', '2021-02-24 06:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `salespersons`
--

CREATE TABLE `salespersons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salespersons`
--

INSERT INTO `salespersons` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Michael', 1, '2021-02-24 05:32:27', '2021-02-24 05:32:27'),
(2, 'Hani', 1, '2021-02-24 05:32:34', '2021-02-24 05:32:34'),
(3, 'Beatrice', 1, '2021-02-24 05:32:42', '2021-02-24 05:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) NOT NULL,
  `participant_id` bigint(20) NOT NULL,
  `salesperson_id` bigint(20) NOT NULL,
  `result_id` bigint(20) DEFAULT NULL,
  `result_flag` tinyint(1) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recoaching` tinyint(1) NOT NULL DEFAULT 0,
  `recoaching_count` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastedited_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `program_id`, `participant_id`, `salesperson_id`, `result_id`, `result_flag`, `price`, `note`, `rating`, `rating_text`, `recoaching`, `recoaching_count`, `created_by`, `lastedited_by`, `created_at`, `updated_at`) VALUES
(1, 6, 7000501, 1, NULL, 0, 7800000, '', NULL, '', 0, 0, 'User CRM', NULL, '2021-02-24 06:19:49', '2021-02-24 06:19:49'),
(2, 8, 7000503, 2, NULL, 0, 7800000, '', NULL, '', 0, 0, 'User CRM', NULL, '2021-02-24 06:20:02', '2021-02-24 06:20:02'),
(3, 10, 7000503, 3, NULL, 0, 7800000, '', NULL, '', 0, 0, 'User CRM', NULL, '2021-02-24 06:20:14', '2021-02-24 06:20:14'),
(4, 10, 8000502, 2, NULL, 0, 7800000, '', NULL, '', 0, 0, 'User CRM', NULL, '2021-02-24 06:20:28', '2021-02-24 06:20:28'),
(5, 11, 8000504, 2, 1, 1, 3000000, '', NULL, '', 0, 0, 'User CRM', 'User CRM', '2021-02-24 06:20:45', '2021-02-24 06:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo-cn.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `admin`, `username`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin CRM', 1, 'admin', '$2y$10$izJp1EOw6skFeITLrz/JruqBTYrdJ1leJX.GdMU68FEzkfZpGUknW', 'user-picture.png', NULL, '2021-02-24 04:59:33', '2021-02-24 04:59:33'),
(2, 'User CRM', 0, 'user', '$2y$10$dBrugZ3NK1cjqnAcxCNsa.s1KsIkKRXnWI5WNrFhzzo8/sZlfSDlK', 'user-picture.png', NULL, '2021-02-24 04:59:33', '2021-02-24 04:59:33');

-- --------------------------------------------------------

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coach_program`
--
ALTER TABLE `coach_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobconnectors`
--
ALTER TABLE `jobconnectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobconnector_participant`
--
ALTER TABLE `jobconnector_participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knows`
--
ALTER TABLE `knows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membernumber`
--
ALTER TABLE `membernumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programcategories`
--
ALTER TABLE `programcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programnames`
--
ALTER TABLE `programnames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salespersons`
--
ALTER TABLE `salespersons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `coach_program`
--
ALTER TABLE `coach_program`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobconnectors`
--
ALTER TABLE `jobconnectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobconnector_participant`
--
ALTER TABLE `jobconnector_participant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `knows`
--
ALTER TABLE `knows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `membernumber`
--
ALTER TABLE `membernumber`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8000506;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=870;

--
-- AUTO_INCREMENT for table `programcategories`
--
ALTER TABLE `programcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programnames`
--
ALTER TABLE `programnames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salespersons`
--
ALTER TABLE `salespersons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
