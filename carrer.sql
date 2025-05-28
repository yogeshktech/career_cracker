-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2025 at 01:52 PM
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
-- Database: `carrer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `profile_image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@gmail.com', '', '2025-05-02 02:03:35', '$2y$12$1U5y/a9PkJnMdrZhN.xF6.4z6QU5736qpXk2IR1xTD1SHujWO5icS', NULL, '2025-05-02 02:03:35', '2025-05-02 02:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `blog_image` text NOT NULL,
  `description` text NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog_image`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Master IT Excellence with Our Service Transition and Operations Course', 'uploads/blogs/1746291837_1732878720_BANER_Perforce-week-of-gratitude-gift-2.jpg', '<p>In today&#39;s fast-paced digital world, delivering seamless and stable IT services is more critical than ever. Whether you&#39;re an aspiring IT professional or a seasoned manager looking to upskill, our <strong>Service Transition and Operations Course</strong> is designed to prepare you for real-world challenges and help you excel in managing key IT service processes.</p>\r\n\r\n<h3><strong>Why This Course Matters</strong></h3>\r\n\r\n<p>Organizations today rely heavily on IT services to operate efficiently. Any disruption &mdash; be it a major incident, recurring problem, or poorly managed change &mdash; can impact business continuity and customer satisfaction. That&rsquo;s where robust service management practices come into play.</p>\r\n\r\n<p>This course bridges the gap between IT service design and operations, focusing on the essential practices that ensure a smooth <strong>transition</strong> and <strong>stable operation</strong> of IT services.</p>\r\n\r\n<h3><strong>What You Will Learn</strong></h3>\r\n\r\n<p>Our comprehensive curriculum covers the following key areas:</p>\r\n\r\n<p>✅ <strong>Major Incident Management</strong></p>\r\n\r\n<p>Learn how to respond swiftly and effectively to high-impact incidents, minimizing downtime and restoring services with confidence.</p>\r\n\r\n<p>✅ <strong>Problem Management</strong></p>\r\n\r\n<p>Go beyond quick fixes. Master the art of identifying root causes, preventing future incidents, and improving overall service reliability.</p>\r\n\r\n<p>✅ <strong>Change Management</strong></p>\r\n\r\n<p>Gain the skills to implement changes to IT services with minimal risk and disruption, ensuring business continuity and user satisfaction.</p>\r\n\r\n<h3><strong>Who Should Take This Course?</strong></h3>\r\n\r\n<p>This course is ideal for:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>IT Service Managers</p>\r\n	</li>\r\n	<li>\r\n	<p>System Administrators</p>\r\n	</li>\r\n	<li>\r\n	<p>Incident and Problem Managers</p>\r\n	</li>\r\n	<li>\r\n	<p>Change Coordinators</p>\r\n	</li>\r\n	<li>\r\n	<p>Anyone looking to build or enhance their ITSM (IT Service Management) capabilities</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Whether you&#39;re new to IT operations or aiming to formalize your knowledge, this training offers valuable insights and practical tools to elevate your career.</p>\r\n\r\n<h3><strong>Why Choose Us?</strong></h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Industry-Relevant Curriculum:</strong> Based on real-world scenarios and ITIL best practices</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Expert Instructors:</strong> Learn from professionals with years of hands-on experience</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Practical Approach:</strong> Interactive sessions, case studies, and templates</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Flexible Learning:</strong> Online and in-person options available</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3><strong>Get Started Today</strong></h3>\r\n\r\n<p>Don&rsquo;t wait for service failures to realize the importance of IT operations. Take a proactive step in your professional growth and organizational success.</p>\r\n\r\n<p>👉 <strong>Enroll now</strong> in the <strong>Service Transition and Operations Course</strong> and ensure your IT services are always a step ahead.</p>', '2', '2025-05-03 11:31:11', '2025-05-12 04:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('career_cracker_cache_admin@gmail.com|127.0.0.1', 'i:3;', 1747135490),
('career_cracker_cache_admin@gmail.com|127.0.0.1:timer', 'i:1747135490;', 1747135490),
('career_cracker_cache_yogeshkumar0798@gmail.com|127.0.0.1', 'i:1;', 1748254167),
('career_cracker_cache_yogeshkumar0798@gmail.com|127.0.0.1:timer', 'i:1748254167;', 1748254167);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carriers`
--

CREATE TABLE `carriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `resume` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carriers`
--

INSERT INTO `carriers` (`id`, `name`, `email`, `mobile`, `subject`, `resume`, `created_at`, `updated_at`) VALUES
(3, 'yogesh', 'admin@gmail.com', '08650242402', 'qerwegt', 'uploads/resumes/1746450638_yogesh_sir (1).pdf', '2025-05-05 07:40:38', '2025-05-05 07:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `course_id`, `user_id`, `ip_address`, `created_at`, `updated_at`) VALUES
(31, 3, 1, NULL, '2025-05-13 03:57:47', '2025-05-13 05:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` text NOT NULL,
  `status` enum('public','private') NOT NULL DEFAULT 'public',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(12, 'new 1', 'rgtrhyt', 'uploads/category/1746249793_Website (1).jpg', 'public', '2025-05-02 23:53:13', '2025-05-05 05:28:00'),
(13, 'new 2', 'eretgrhytuju', 'uploads/category/1746442705_Image 2.png', 'public', '2025-05-05 05:28:25', '2025-05-05 05:28:25'),
(14, 'test update', 'test', 'uploads/category/1746530232_ragenaizer_profile_qrcode.png', 'public', '2025-05-06 05:47:12', '2025-05-06 05:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mrp` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sale_price` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `is_live_class` varchar(100) DEFAULT NULL,
  `total_lectures` int(11) DEFAULT NULL,
  `language_id` bigint(20) DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `highlights` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `why_choose_us` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `progress` int(11) NOT NULL DEFAULT 0,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_saleable` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `subcategory_id`, `mrp`, `category_id`, `sale_price`, `title`, `thumbnail`, `level`, `duration`, `is_live_class`, `total_lectures`, `language_id`, `overview`, `highlights`, `details`, `why_choose_us`, `created_by`, `progress`, `status`, `created_at`, `updated_at`, `is_saleable`) VALUES
(3, 3, '500', 12, '444', 'new', 'uploads/course/1746264247_Website.jpg', 'Beginner', '5 Hours', NULL, 12, 2, '2weregtrh', 'eqwrwegtr', 'wqeawrest', 'qwewarestr', 2, 100, 'published', '2025-05-03 03:54:07', '2025-05-03 07:46:41', 1),
(4, 2, '490', 12, '444', 'edwfregtr', 'Uploads/course/1746265810_ragenaizer_profile_qrcode.png', 'Beginner', '5 Hours', NULL, 12, 0, 'dfg', 'erty', 'qretrytuy', 'wqewretr', 2, 50, 'published', '2025-05-03 04:20:10', '2025-05-03 04:20:10', 1),
(8, 5, '599', 14, '499', 'new course update', 'Uploads/course/1746530523_674d61cc4f639_71KVHVmSwYL._SL1500_.jpg', 'Beginner', '5 Hours', NULL, 15, 2, 'test', 'test', 'test', 'test', 2, 50, 'published', '2025-05-06 05:52:03', '2025-05-09 06:45:15', 1),
(9, 5, '3000', 14, '2500', 'test product new', 'Uploads/course/1746793670_WhatsApp Image 2025-01-29 at 22.48.03.jpeg', 'Beginner', '5 Hours', NULL, 50, 2, '<h1><strong>wewregtry</strong></h1>', NULL, '<h2>ewregtrhy</h2>', '<h2>ewretry</h2>', 2, 50, 'published', '2025-05-09 06:57:50', '2025-05-27 00:06:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_order`
--

CREATE TABLE `course_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_order`
--

INSERT INTO `course_order` (`order_id`, `course_id`, `price`, `created_at`, `updated_at`) VALUES
(13, 8, 499.00, '2025-05-08 12:12:24', '2025-05-08 12:12:24'),
(14, 4, 444.00, '2025-05-08 23:51:53', '2025-05-08 23:51:53'),
(15, 4, 444.00, '2025-05-09 12:09:40', '2025-05-09 12:09:40'),
(15, 8, 499.00, '2025-05-09 12:09:40', '2025-05-09 12:09:40'),
(15, 9, 2500.00, '2025-05-09 12:09:40', '2025-05-09 12:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `completed_lessons` int(11) NOT NULL DEFAULT 0,
  `progress` int(11) NOT NULL DEFAULT 0,
  `google_meet_link` varchar(255) DEFAULT NULL,
  `google_drive_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`id`, `course_id`, `user_id`, `completed_lessons`, `progress`, `google_meet_link`, `google_drive_link`, `created_at`, `updated_at`) VALUES
(2, 8, 1, 0, 0, 'https://meet.google.com/mmm-xuad-mss', NULL, '2025-05-09 12:09:40', '2025-05-09 12:09:40'),
(3, 4, 1, 0, 0, 'https://meet.google.com/bpf-debs-fdk', NULL, '2025-05-09 12:09:40', '2025-05-09 12:09:40'),
(4, 9, 1, 0, 0, NULL, NULL, '2025-05-09 12:09:40', '2025-05-09 12:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(7, 'yogesh', 'admin@gmail.com', '08650242402', 't46y57u6i7', '2025-05-05 12:39:20', '2025-05-05 12:39:20'),
(9, 'yogesh', 'admin@gmail.com', '08650242402', 'fdgfgh', '2025-05-08 23:59:57', '2025-05-08 23:59:57'),
(10, 'yogesh', 'admin@gmail.com', '08650242402', 'test contact page', '2025-05-12 03:37:56', '2025-05-12 03:37:56'),
(11, 'yogesh', 'admin@gmail.com', '08650242402', '2', '2025-05-12 03:49:20', '2025-05-12 03:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `progress` int(11) NOT NULL DEFAULT 0,
  `completed_lessons` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `email`, `course_id`, `position`, `experience`, `specialization`, `profile_image`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'test', 'admin@gmail.com', 4, 'Lecturer', '3-5 Years', 'Machine Learning', 'uploads/faculties/1746270979_Website.jpg', 'published', 2, '2025-05-03 05:46:19', '2025-05-03 06:41:20'),
(4, 'test', 'admin1234345@gmail.com', 3, 'Lecturer', '3-5 Years', 'Marketing', 'uploads/faculties/1746274412_1731936770_perforce logo.png', 'published', 2, '2025-05-03 06:43:32', '2025-05-03 06:43:32'),
(5, 'new', 'admin123456@gmail.com', 8, 'Lecturer', '3-5 Years', 'Machine Learning', 'uploads/faculties/1746530659_WhatsApp Image 2025-04-23 at 16.12.16.jpeg', 'published', 2, '2025-05-06 05:54:19', '2025-05-06 05:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"96fd7e0c-1092-4b6d-a8bf-bf8100412522\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/bpf-debs-fdk\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746725342,\"delay\":null}', 0, NULL, 1746725342, 1746725342),
(2, 'default', '{\"uuid\":\"10c50cbc-c98e-48a9-ac72-094148207ac2\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/bpf-debs-fdk\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746725369,\"delay\":null}', 0, NULL, 1746725369, 1746725369),
(3, 'default', '{\"uuid\":\"70488726-441b-48bf-9887-c908375e66f6\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/bpf-debs-fdk\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746726628,\"delay\":null}', 0, NULL, 1746726628, 1746726628),
(4, 'default', '{\"uuid\":\"33889527-9efd-4cd0-9ee3-074801ac718d\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/oby-xktp-bbx\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746732864,\"delay\":null}', 0, NULL, 1746732864, 1746732864),
(5, 'default', '{\"uuid\":\"16db7851-87b4-4339-a689-745af212be31\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/mmm-xuad-mss\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746733040,\"delay\":null}', 0, NULL, 1746733040, 1746733040),
(6, 'default', '{\"uuid\":\"eaf51402-554e-4cc1-aa93-909aacc5380f\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:8;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/mmm-xuad-mss\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746735278,\"delay\":null}', 0, NULL, 1746735278, 1746735278),
(7, 'default', '{\"uuid\":\"3670d0e5-3018-468b-9733-0c99c945ec3d\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/bpf-debs-fdk\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746768185,\"delay\":null}', 0, NULL, 1746768185, 1746768185),
(8, 'default', '{\"uuid\":\"4bed58c3-a784-4dec-a094-b6a2b37f9814\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/bpf-debs-fdk\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746780186,\"delay\":null}', 0, NULL, 1746780186, 1746780186),
(9, 'default', '{\"uuid\":\"78e8595d-1def-4088-bd97-41295a74767e\",\"displayName\":\"App\\\\Mail\\\\GoogleMeetLinkNotification\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Mail\\\\SendQueuedMailable\",\"command\":\"O:34:\\\"Illuminate\\\\Mail\\\\SendQueuedMailable\\\":15:{s:8:\\\"mailable\\\";O:35:\\\"App\\\\Mail\\\\GoogleMeetLinkNotification\\\":4:{s:6:\\\"course\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:17:\\\"App\\\\Models\\\\Course\\\";s:2:\\\"id\\\";i:4;s:9:\\\"relations\\\";a:1:{i:0;s:5:\\\"users\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:14:\\\"googleMeetLink\\\";s:36:\\\"https:\\/\\/meet.google.com\\/bpf-debs-fdk\\\";s:2:\\\"to\\\";a:1:{i:0;a:2:{s:4:\\\"name\\\";N;s:7:\\\"address\\\";s:25:\\\"yogeshkumar0798@gmail.com\\\";}}s:6:\\\"mailer\\\";s:4:\\\"smtp\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:13:\\\"maxExceptions\\\";N;s:17:\\\"shouldBeEncrypted\\\";b:0;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:3:\\\"job\\\";N;}\"},\"createdAt\":1746780225,\"delay\":null}', 0, NULL, 1746780225, 1746780225);

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Hindi', '1', '2025-05-03 07:14:42', '2025-05-03 07:14:42'),
(3, 'English', '1', '2025-05-03 07:15:02', '2025-05-03 07:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_02_072009_create_admins_table', 2),
(5, '2025_05_02_112803_create_categories_table', 3),
(6, '2025_05_02_113524_create_categories_table', 4),
(7, '2025_05_03_054840_create_subcategories_table', 5),
(8, '2025_05_03_072919_create_courses_table', 6),
(9, '2025_05_03_090606_create_courses_table', 7),
(10, '2025_05_03_101152_create_carriers_table', 8),
(11, '2025_05_03_104600_create_faculties_table', 9),
(12, '2025_05_03_122136_create_languages_table', 10),
(13, '2025_05_03_133033_create_blogs_table', 11),
(14, '2025_05_04_172824_create_testimonials_table', 12),
(15, '2025_05_05_055257_create_otps_table', 13),
(16, '2025_05_05_093256_create_reviews_table', 14),
(17, '2025_05_05_172415_create_enquiries_table', 15),
(18, '2025_05_06_075420_create_enrollments_table', 16),
(19, '2025_05_06_075430_create_lessons_table', 16),
(20, '2025_05_06_085229_create_purchases_table', 17),
(21, '2025_05_06_123721_create_carts_table', 18),
(22, '2025_05_08_093944_create_orders_table', 19),
(23, '2025_05_08_102910_create_purchases_table', 20),
(24, '2025_05_08_115932_create_course_user_table', 21),
(25, '2025_05_08_131140_create_course_order_table', 22),
(26, '2025_05_08_131325_add_progress_to_course_user_table', 23),
(27, '2025_05_09_065347_create_newsletters_table', 24),
(28, '2025_05_09_114551_modify_user_id_in_reviews_table', 25),
(29, '2025_05_27_052345_add_is_saleable_to_courses_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(2, 'admin@gmail.com', '2025-05-09 02:12:11', '2025-05-09 02:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(13, 1, 499.00, 'cod', 'pending', '2025-05-08 12:12:24', '2025-05-08 12:12:24'),
(14, 1, 444.00, 'cod', 'pending', '2025-05-08 23:51:53', '2025-05-08 23:51:53'),
(15, 1, 3443.00, 'cod', 'pending', '2025-05-09 12:09:40', '2025-05-09 12:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_course`
--

CREATE TABLE `order_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('yogeshkumar0798@gmail.com', '$2y$12$LmnQ5ZVuZvLv8VLHQCeoc.H.IM7FGpvhM/0vrqIyL04Dgmxzc9ZnO', '2025-05-09 01:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','failed','refunded') NOT NULL DEFAULT 'pending',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `course_id`, `course_title`, `amount`, `status`, `date`, `created_at`, `updated_at`) VALUES
(12, 1, 8, 'new course', 499.00, 'completed', '2025-05-08', '2025-05-08 12:12:24', '2025-05-08 12:12:24'),
(13, 1, 4, 'edwfregtr', 444.00, 'completed', '2025-05-09', '2025-05-08 23:51:53', '2025-05-08 23:51:53'),
(14, 1, 9, 'test product new', 2500.00, 'completed', '2025-05-09', '2025-05-09 12:09:40', '2025-05-09 12:09:40'),
(15, 1, 8, 'new course update', 499.00, 'completed', '2025-05-09', '2025-05-09 12:09:40', '2025-05-09 12:09:40'),
(16, 1, 4, 'edwfregtr', 444.00, 'completed', '2025-05-09', '2025-05-09 12:09:40', '2025-05-09 12:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rating` double NOT NULL,
  `comment` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `course_id`, `user_id`, `name`, `email`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 'yogesh', 'admin@gmail.com', 5, 'dsfghg', 0, '2025-05-05 07:01:44', '2025-05-09 05:39:08'),
(2, 8, NULL, 'yogesh', 'admin@gmail.com', 4, 'ewretryt', 1, '2025-05-09 04:48:51', '2025-05-09 04:48:51'),
(3, 8, NULL, 'yogesh', 'admin@gmail.com', 5, 'eregt', 1, '2025-05-09 04:52:04', '2025-05-09 05:37:29'),
(4, 8, NULL, 'yogesh', 'admin@gmail.com', 3, 'wqedwrgrh', 0, '2025-05-09 04:52:27', '2025-05-09 05:37:38'),
(8, 8, NULL, 'Admin', 'admin@gmail.com', 5, 'testting for admin', 0, '2025-05-09 06:20:04', '2025-05-09 06:20:04'),
(9, 8, NULL, 'Admin', 'admin@gmail.com', 5, 'testting for admin', 1, '2025-05-09 06:20:39', '2025-05-09 06:21:09'),
(10, 8, NULL, 'manoj', 'admin@gmail.com', 5, 'drfegtryt', 0, '2025-05-09 06:24:12', '2025-05-09 06:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JKjzrctLS867LQipl7ffVZHOXLP4SxHlF6bkvxhT', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYXdLSlZ6MWZJT1VhdGRVV2lUQ2pGdWdWaGpMbXplOTl5NXNUSDI5WiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1748335984),
('s27QcZS17NCZVlDCFi3oly8M5GmVzFbhCWBoksxy', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTkNWb0U5S1RrTWxzZkdDd2hQaEU3S0xvTjhQS3NWcnk1STRHUDdENCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQyOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vY291cnNlcy9lZGl0LzgiO319', 1748326829);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `status` enum('public','private') NOT NULL DEFAULT 'public',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `description`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(2, 12, 'dfgtrhtj', '4r35t4yh', 'uploads/subcategory/1746254670_Website.jpg', 'public', '2025-05-03 01:14:30', '2025-05-03 01:14:30'),
(3, 12, 'new 1', NULL, 'uploads/subcategory/1746278177_Website.jpg', 'public', '2025-05-03 07:46:17', '2025-05-03 07:46:17'),
(4, 13, 'Category new add third', 'fgtryhtjy', 'uploads/subcategory/1746442850_WhatsApp Image 2025-04-23 at 16.12.16.jpeg', 'public', '2025-05-05 05:30:50', '2025-05-05 05:30:50'),
(5, 14, 'new sub category update', 'test', 'uploads/subcategory/1746530321_670fad2dabd9a_JEFFBACK-PRO-04.jpg', 'public', '2025-05-06 05:48:42', '2025-05-06 05:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `content`, `image`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'yogesh', 'testing for this', 'uploads/testimonials/1746380676_Website (1).jpg', 'developer', '2025-05-04 12:14:36', '2025-05-04 12:14:36'),
(2, 'test', '<p>&quot;I took the ServiceNow Certification course and am now working as a ServiceNow Developer at Accenture with a 15 LPA package. The course provided me with the skills I needed to excel in this high-demand field. Career Cracker&rsquo;s practical approach and expert trainers made all the difference.&quot;</p>', 'uploads/testimonials/1746383169_1732878720_BANER_Perforce-week-of-gratitude-gift-2.jpg', 'wserthy', '2025-05-04 12:56:09', '2025-05-12 06:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `job_title` varchar(100) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  `cover_photo` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact_no`, `job_title`, `bio`, `avatar`, `cover_photo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'yogesh kumar', 'yogeshkumar0798@gmail.com', '8650242405', 'test', 'dfrgtr', 'avatars/WJuXGbuidHHcag31dW9IrYf0HgfWiS3qzrCSOcJk.jpg', 'covers/D7OJIl7gCRfz8DkqVNCtnVhvcwWhwoTt7kZhQ7wJ.jpg', NULL, '$2y$12$mWRTQa2/UB6RdtIoog5RfObrITNLd6n7O/OhS3r5/3Epn4lQI4ceO', 'cSgwhsoNQSZwQXrqBryKLz1h57pAA3f3tuxVt36QNh7skolo5Hshbg7Mhz0p', '2025-05-05 00:47:35', '2025-05-09 12:51:55');

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
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carriers`
--
ALTER TABLE `carriers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_cart_entry` (`course_id`,`user_id`,`ip_address`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `courses_created_by_foreign` (`created_by`);

--
-- Indexes for table `course_order`
--
ALTER TABLE `course_order`
  ADD PRIMARY KEY (`order_id`,`course_id`),
  ADD KEY `course_order_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_user_course_id_foreign` (`course_id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_user_id_foreign` (`user_id`),
  ADD KEY `enrollments_course_id_foreign` (`course_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_email_unique` (`email`),
  ADD KEY `faculties_created_by_foreign` (`created_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_course`
--
ALTER TABLE `order_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_course_order_id_foreign` (`order_id`),
  ADD KEY `order_course_course_id_foreign` (`course_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_course_id_foreign` (`course_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_course_id_foreign` (`course_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carriers`
--
ALTER TABLE `carriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_course`
--
ALTER TABLE `order_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_order`
--
ALTER TABLE `course_order`
  ADD CONSTRAINT `course_order_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `enrollments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_course`
--
ALTER TABLE `order_course`
  ADD CONSTRAINT `order_course_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_course_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
