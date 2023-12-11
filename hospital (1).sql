-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 12:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '100000000', 'admin@gmail.com', '2023-12-04 03:58:42', '$2y$10$xMcNrcLREGoKNJspORGv/eb.bs8R.FkN/YbFKI/NVxCQJVpw03ZeG', NULL, '2023-12-04 03:58:42', '2023-12-06 04:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `appoitments`
--

CREATE TABLE `appoitments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `times` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appoitments`
--

INSERT INTO `appoitments` (`id`, `doctor_id`, `patient_id`, `service_id`, `date`, `start_time`, `end_time`, `times`, `status`, `description`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2023-12-16', '11:00', '00:00', '11:00,00:00', 'booked', 'dd', '7fbOnSXo', '2023-12-10 05:41:38', '2023-12-10 06:29:21'),
(2, 1, 1, 1, '2023-12-17', '22:00', '23:00', '22:00,23:00', 'booked', 'helksdf jsd', 'kQlEd68G', '2023-12-10 07:46:17', '2023-12-10 07:48:25'),
(4, 1, 1, 2, '2023-12-16', '22:44', '23:44', '22:44,23:44', 'pending', 'ddd', 'lNzzvO9N', '2023-12-11 03:54:17', '2023-12-11 03:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `appoitment_images`
--

CREATE TABLE `appoitment_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appoitment_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appoitment_images`
--

INSERT INTO `appoitment_images` (`id`, `appoitment_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, 'uploads/1702288457.png', '2023-12-11 03:54:18', '2023-12-11 03:54:18'),
(2, 4, 'uploads/1702288458.png', '2023-12-11 03:54:18', '2023-12-11 03:54:18'),
(3, 4, 'uploads/1702288458.png', '2023-12-11 03:54:18', '2023-12-11 03:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `room_id`, `title`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 2, 'B-201', 1, '2023-12-06 04:28:49', '2023-12-06 04:28:49'),
(2, 1, 'B-I-203', 1, '2023-12-06 04:29:06', '2023-12-06 04:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `centerals`
--

CREATE TABLE `centerals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centerals`
--

INSERT INTO `centerals` (`id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'centeral', '01759216367', 'centeral@gamil.com', NULL, '$2y$10$lOeEr5CCZJYrzxtQWl8hj.xQAjTYuIlWK.FJQ12IYrA2BdFQIeFAa', NULL, '2023-12-10 09:56:30', '2023-12-10 09:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `custom_notifications`
--

CREATE TABLE `custom_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `from_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `to_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_notifications`
--

INSERT INTO `custom_notifications` (`id`, `from_id`, `from_type`, `to_id`, `to_type`, `purpose`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Doctor', 1, 'Patient', 'appoitment approved', 'here you can join \r\n\r\nhtppss: /df9ujs/sdfsfjksdjf', 0, '2023-12-10 06:29:45', '2023-12-10 06:29:45'),
(2, 1, 'Patient', 1, 'Doctor', 'appoitment Request. Code: kQlEd68G', 'helksdf jsd', 0, '2023-12-10 07:46:18', '2023-12-10 07:46:18'),
(3, 1, 'Doctor', 1, 'Patient', 'appoitment approved. Code: kQlEd68G', 'sdfsdf\r\nsdfkl\r\n jkljfd', 0, '2023-12-10 07:48:25', '2023-12-10 07:48:25'),
(4, 1, 'Doctor', 1, 'Patient', 'prescription sended. Code: grDaSyYO', '', 1, '2023-12-10 07:49:43', '2023-12-11 04:17:24'),
(5, 1, 'Patient', 1, 'Doctor', 'appoitment Request. Code: lNzzvO9N', 'ddd', 1, '2023-12-11 03:54:18', '2023-12-11 04:13:27'),
(6, 1, 'Centeral', 1, 'Patient', 'Attachment added', 'Previous reports added', 0, '2023-12-11 04:39:38', '2023-12-11 04:39:38'),
(7, 1, 'Centeral', 5, 'Patient', 'Attachment added', 'Previous reports added', 0, '2023-12-11 04:47:47', '2023-12-11 04:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Surgeon', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `designation_id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `gender`, `blood_group`, `address`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'doctor', '01321155413', 'doctor@gmail.com', '2023-12-04 03:58:42', '$2y$10$DQCMlV54OaQ2X3f.OCbXYOgccY/ZqBoGShG/8S.7lJNh8s2SBtqJ6', 'Male', 'O+', 'Airport, Dhaka, Bangladesh', NULL, 1, '2023-12-04 03:58:42', '2023-12-06 05:29:42'),
(3, NULL, 'Fulton', '01321155413', 'foxs4@hotmail.com', NULL, '$2y$10$PwcrGU53xI3p1umpAr3GUeFCE94AkntK0KrWos954WJ5U6Oybgr/a', NULL, NULL, NULL, NULL, 1, '2023-12-05 05:07:50', '2023-12-05 05:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_for` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double NOT NULL DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_materials`
--

CREATE TABLE `expense_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'X-ray machines', '2023-12-06 06:17:47', '2023-12-06 06:17:47'),
(2, 'CT machines', '2023-12-06 06:18:04', '2023-12-06 06:18:04'),
(3, 'MRI machines', '2023-12-06 06:18:14', '2023-12-06 06:18:14'),
(4, 'Thermometer', '2023-12-06 06:18:24', '2023-12-06 06:18:24'),
(5, 'Cotton wool', '2023-12-06 06:18:34', '2023-12-06 06:18:34'),
(6, 'Surgical mask', '2023-12-06 06:18:44', '2023-12-06 06:18:44'),
(7, 'Stethoscope', '2023-12-06 06:18:52', '2023-12-06 06:18:52'),
(8, 'Oxygen mask', '2023-12-06 06:19:01', '2023-12-06 06:19:01'),
(9, 'Eye chart', '2023-12-06 06:19:10', '2023-12-06 06:19:10'),
(10, 'Scales', '2023-12-06 06:19:20', '2023-12-06 06:19:20'),
(11, 'Blood pressure monitor', '2023-12-06 06:19:27', '2023-12-06 06:19:27'),
(12, 'Pregnancy testing kit', '2023-12-06 06:19:35', '2023-12-06 06:19:35'),
(13, 'Thermometer', '2023-12-06 06:19:50', '2023-12-06 06:19:50'),
(14, 'Resuscitator', '2023-12-06 06:20:02', '2023-12-06 06:20:02'),
(15, 'Ambulance', '2023-12-06 06:20:12', '2023-12-06 06:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Paracetamol', '2023-12-05 05:49:04', '2023-12-05 06:14:25'),
(3, 'Diazepam', '2023-12-05 06:14:37', '2023-12-05 06:14:37'),
(4, 'Amitriptyline', '2023-12-05 06:14:46', '2023-12-05 06:14:46'),
(5, 'Metronidazole', '2023-12-05 06:14:57', '2023-12-05 06:14:57'),
(6, 'Gabapentin', '2023-12-05 06:15:04', '2023-12-05 06:15:04'),
(7, 'Trazodone', '2023-12-05 06:15:13', '2023-12-05 06:15:13'),
(8, 'Albendazole', '2023-12-05 06:15:21', '2023-12-05 06:15:21'),
(9, 'Ondansetron', '2023-12-05 06:15:29', '2023-12-05 06:15:29'),
(10, 'Acetylsalicylic acid', '2023-12-05 06:15:40', '2023-12-05 06:15:40'),
(11, 'Aripiprazole', '2023-12-05 06:15:47', '2023-12-05 06:15:47'),
(12, 'Clonazepam', '2023-12-05 06:15:56', '2023-12-05 06:15:56'),
(13, 'Ibuprofen', '2023-12-05 06:16:05', '2023-12-05 06:16:05'),
(14, 'Amoxicillin', '2023-12-05 06:16:13', '2023-12-05 06:16:13'),
(15, 'Mirtazapine', '2023-12-05 06:16:21', '2023-12-05 06:16:21'),
(16, 'Paroxetine', '2023-12-05 06:16:29', '2023-12-05 06:16:29'),
(17, 'Alprazolam', '2023-12-05 06:16:39', '2023-12-05 06:16:39'),
(18, 'Azithromycin', '2023-12-05 06:16:52', '2023-12-05 06:16:52'),
(19, 'Naproxen', '2023-12-05 06:16:59', '2023-12-05 06:16:59'),
(20, 'Diclofenac', '2023-12-05 06:17:06', '2023-12-05 06:17:06'),
(21, 'Amlodipine', '2023-12-05 06:17:14', '2023-12-05 06:17:14'),
(22, 'Lorazepam', '2023-12-05 06:17:21', '2023-12-05 06:17:21'),
(23, 'Sodium valproate', '2023-12-05 06:17:30', '2023-12-05 06:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_prescriptions`
--

CREATE TABLE `medicine_prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prescription_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_prescriptions`
--

INSERT INTO `medicine_prescriptions` (`id`, `prescription_id`, `medicine_id`, `note`, `created_at`, `updated_at`) VALUES
(3, 9, 1, '2 pcs daily', '2023-12-06 09:29:17', '2023-12-06 09:29:17'),
(4, 9, 3, '1 dos daily before eating food', '2023-12-06 09:29:17', '2023-12-06 09:29:17'),
(5, 9, 4, '3 dos', '2023-12-06 09:44:12', '2023-12-06 09:44:12'),
(6, 10, 3, 'dd edte', '2023-12-06 09:51:23', '2023-12-06 09:51:44'),
(7, 10, 4, 'eed', '2023-12-06 09:51:23', '2023-12-06 09:51:23'),
(8, 11, 4, 'sdfsf', '2023-12-10 07:49:43', '2023-12-10 07:49:43'),
(9, 11, 5, 'ewrwe', '2023-12-10 07:49:43', '2023-12-10 07:49:43');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_04_085818_create_admins_table', 1),
(6, '2023_12_04_085907_create_designations_table', 1),
(7, '2023_12_04_085935_create_doctors_table', 1),
(8, '2023_12_05_111037_create_rooms_table', 2),
(9, '2023_12_05_112140_create_services_table', 2),
(10, '2023_12_05_112335_create_medicines_table', 2),
(12, '2023_12_05_113657_create_beds_table', 3),
(13, '2023_12_06_120936_create_materials_table', 4),
(14, '2023_12_06_122127_create_expenses_table', 5),
(15, '2023_12_06_123410_create_expense_materials_table', 5),
(20, '2023_12_06_124040_create_prescriptions_table', 6),
(21, '2023_12_06_124802_create_medicine_prescriptions_table', 6),
(23, '2023_12_07_115136_create_schedules_table', 7),
(27, '2023_12_10_090743_create_appoitments_table', 8),
(28, '2023_12_10_121334_create_custom_notifications_table', 9),
(29, '2023_12_10_152551_create_centerals_table', 10),
(30, '2023_12_10_152620_create_patient_attachments_table', 10),
(31, '2023_12_11_093320_create_appoitment_images_table', 11);

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
-- Table structure for table `patient_attachments`
--

CREATE TABLE `patient_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `centeral_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_attachments`
--

INSERT INTO `patient_attachments` (`id`, `patient_id`, `centeral_id`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'uploads/1702291177.png', '2023-12-11 04:39:37', '2023-12-11 04:39:37'),
(2, 1, 1, 'uploads/1702291177.png', '2023-12-11 04:39:38', '2023-12-11 04:39:38'),
(3, 5, 1, 'uploads/15084709991702291667.png', '2023-12-11 04:47:47', '2023-12-11 04:47:47'),
(4, 5, 1, 'uploads/2949252741702291667.png', '2023-12-11 04:47:47', '2023-12-11 04:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `patient_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symptoms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `doctor_id`, `patient_id`, `invoice`, `symptoms`, `diagnosis`, `date`, `note`, `reference`, `created_at`, `updated_at`) VALUES
(9, 3, 7, 'yRJawMxQ', 'treatmant edited', 'favopr edited', '2023-12-06 15:28:16', 'updated', NULL, '2023-12-06 09:29:17', '2023-12-06 09:52:30'),
(10, 1, 1, 'MJYEGEuB', 'sdfe d', 'sdfed', '2023-12-06 15:51:06', 'please urgent edte', 'edte', '2023-12-06 09:51:23', '2023-12-07 02:49:43'),
(11, 1, 1, 'grDaSyYO', 'sdfdsf', 'erewr', '2023-12-17 13:49:17', 'erewr', 'kQlEd68G', '2023-12-10 07:49:43', '2023-12-10 07:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'ICU Room', '2023-12-05 05:42:23', '2023-12-05 05:42:23'),
(2, 'Operation Theator', '2023-12-05 05:43:24', '2023-12-05 05:43:24'),
(4, 'RM-503', '2023-12-05 05:43:52', '2023-12-05 05:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `dayname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `doctor_id`, `dayname`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Saturday', '11:00,22:44,20:30', '00:00,23:44,21:30', '2023-12-07 08:41:47', '2023-12-07 08:57:50'),
(2, 1, 'Sunday', '22:00', '23:00', '2023-12-07 08:59:02', '2023-12-07 08:59:02'),
(3, 1, 'Tuesday', '19:05', '21:05', '2023-12-07 09:05:36', '2023-12-07 09:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'X-Ray', '2023-12-05 05:45:18', '2023-12-05 05:45:18'),
(2, 'Surgery', '2023-12-05 05:45:28', '2023-12-05 05:45:28'),
(3, 'Treatment', '2023-12-05 05:45:40', '2023-12-05 05:45:40'),
(4, 'Diagnostics', '2023-12-05 05:45:54', '2023-12-05 05:45:54'),
(5, 'ICU', '2023-12-05 05:46:14', '2023-12-05 05:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `email_verified_at`, `password`, `gender`, `blood_group`, `address`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Patient', '0173887872', 'patient@gmail.com', '2023-12-04 03:58:42', '$2y$10$BwUTMl58Xc2mgq4be8Hg6.VtN.loY7Lo1NOgp11codXCe.KHxmdPO', 'Male', 'AB+', 'Khilkhet, Dhaka, bangladesh', NULL, 1, NULL, '2023-12-04 03:58:42', '2023-12-07 05:32:26'),
(5, 'Fulton', '01759216367', 'superadmin@hms.com', NULL, '$2y$10$DZ4XESMc699a9JDuUbfvPOhqRJ0mWQkHsliYX.H7ROhJU0Jj87o.O', 'Male', 'O+', 'superadmin', NULL, 1, NULL, '2023-12-04 08:36:33', '2023-12-04 08:36:33'),
(6, 'abul', '0173887872', 'test@gmail.com', NULL, '$2y$10$eKTP52nVPtYravE2pfPfe.65mJgwv9RHx.NixG14Zk5koa0M8NfCO', 'Female', 'B+', 'test', NULL, 1, NULL, '2023-12-04 09:00:30', '2023-12-04 09:00:44'),
(7, 'Team', '01321155413', 'team@gmail.com', NULL, '$2y$10$kIt64vlJRJsRGflDaiD1p.qcasFXyJLdTpK3PY.nEsKA7T2xP7IAu', NULL, NULL, NULL, NULL, 1, NULL, '2023-12-05 05:04:58', '2023-12-05 05:04:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appoitments`
--
ALTER TABLE `appoitments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appoitments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appoitments_patient_id_foreign` (`patient_id`),
  ADD KEY `appoitments_service_id_foreign` (`service_id`);

--
-- Indexes for table `appoitment_images`
--
ALTER TABLE `appoitment_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appoitment_images_appoitment_id_foreign` (`appoitment_id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beds_room_id_foreign` (`room_id`);

--
-- Indexes for table `centerals`
--
ALTER TABLE `centerals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `centerals_email_unique` (`email`);

--
-- Indexes for table `custom_notifications`
--
ALTER TABLE `custom_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_materials`
--
ALTER TABLE `expense_materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_materials_expense_id_foreign` (`expense_id`),
  ADD KEY `expense_materials_material_id_foreign` (`material_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_prescriptions`
--
ALTER TABLE `medicine_prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_prescriptions_prescription_id_foreign` (`prescription_id`),
  ADD KEY `medicine_prescriptions_medicine_id_foreign` (`medicine_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patient_attachments`
--
ALTER TABLE `patient_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_attachments_patient_id_foreign` (`patient_id`),
  ADD KEY `patient_attachments_centeral_id_foreign` (`centeral_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_doctor_id_foreign` (`doctor_id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedules_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appoitments`
--
ALTER TABLE `appoitments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appoitment_images`
--
ALTER TABLE `appoitment_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `centerals`
--
ALTER TABLE `centerals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_notifications`
--
ALTER TABLE `custom_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_materials`
--
ALTER TABLE `expense_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `medicine_prescriptions`
--
ALTER TABLE `medicine_prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `patient_attachments`
--
ALTER TABLE `patient_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoitments`
--
ALTER TABLE `appoitments`
  ADD CONSTRAINT `appoitments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appoitments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appoitments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `appoitment_images`
--
ALTER TABLE `appoitment_images`
  ADD CONSTRAINT `appoitment_images_appoitment_id_foreign` FOREIGN KEY (`appoitment_id`) REFERENCES `appoitments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `beds_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `expense_materials`
--
ALTER TABLE `expense_materials`
  ADD CONSTRAINT `expense_materials_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expense_materials_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `medicine_prescriptions`
--
ALTER TABLE `medicine_prescriptions`
  ADD CONSTRAINT `medicine_prescriptions_medicine_id_foreign` FOREIGN KEY (`medicine_id`) REFERENCES `medicines` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `medicine_prescriptions_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_attachments`
--
ALTER TABLE `patient_attachments`
  ADD CONSTRAINT `patient_attachments_centeral_id_foreign` FOREIGN KEY (`centeral_id`) REFERENCES `centerals` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `patient_attachments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
