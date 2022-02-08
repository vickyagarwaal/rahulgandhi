-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2022 at 06:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahulgandhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified`, `role`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vicky', 'vicky', 'upensuni@gmail.com', 1, 'super_admin', NULL, '$2y$10$EMHRkiGn/vxdJCPmBMjHMegGlAqNnp5mmU/EWGH2VgO8SLzWS/XOW', 'kdzFuONIh0DaOFIUc7LWYywGaCUelYfDCLxzC5zFyErdQLEcengTjXsvVmtY', '2021-12-17 11:08:34', '2021-12-17 11:08:34'),
(2, 'paymentgateway', 'paymentgateway', 'paymentgateway@gmail.com', 0, 'super_admin', '125', '$2y$10$Q.4chitttFxIz/ymL97Qf.K08gSTYlOxqoBTh.DJ3yquuF9EZaO1i', 'l6M0vmYZNIhN3Gr2U5025pOAuCnV9UB7rJ1pBPeBkCqKoy7OFz7frDqWzClU', '2022-02-08 08:26:16', '2022-02-08 08:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '[\"admin_manage\",\"about_page_manage\",\"users_manage\",\"quote_manage\",\"newsletter_manage\",\"package_orders_manage\",\"all_payment_logs\",\"pages_manage\",\"menus_manage\",\"widgets_manage\",\"popup_builder\",\"form_builder\",\"blogs_manage\",\"job_post_manage\",\"events_manage\",\"products_manage\",\"donations_manage\",\"knowledgebase\",\"home_variant\",\"topbar_settings\",\"home_page_manage\",\"contact_page_manage\",\"feedback_page_manage\",\"services\",\"case_study\",\"gallery_page\",\"404_page_manage\",\"faq\",\"brand_logos\",\"price_plan\",\"team_members\",\"testimonial\",\"counterup\",\"general_settings\",\"languages\"]', '2020-05-15 10:00:00', '2020-07-27 10:41:15'),
(2, 'Editor', '[\"about_page_manage\",\"quote_manage\",\"newsletter_manage\",\"package_orders_manage\",\"all_payment_logs\",\"pages_manage\",\"blogs_manage\",\"job_post_manage\",\"events_manage\",\"products_manage\",\"donations_manage\",\"knowledgebase\",\"topbar_settings\",\"home_page_manage\",\"contact_page_manage\",\"feedback_page_manage\",\"services\",\"case_study\",\"gallery_page\",\"faq\",\"brand_logos\",\"price_plan\",\"team_members\",\"testimonial\",\"counterup\"]', '2020-05-16 00:34:16', '2020-07-27 10:42:52'),
(3, 'Admin', '[\"users_manage\",\"quote_manage\",\"newsletter_manage\",\"package_orders_manage\",\"all_payment_logs\",\"pages_manage\",\"menus_manage\",\"widgets_manage\",\"popup_builder\",\"form_builder\",\"blogs_manage\",\"job_post_manage\",\"events_manage\",\"products_manage\",\"donations_manage\",\"knowledgebase\",\"topbar_settings\",\"home_page_manage\",\"contact_page_manage\",\"feedback_page_manage\",\"services\",\"case_study\",\"gallery_page\",\"404_page_manage\",\"faq\",\"brand_logos\",\"price_plan\",\"team_members\",\"testimonial\",\"counterup\",\"general_settings\"]', '2020-05-16 00:34:29', '2020-07-27 10:44:24'),
(1, 'Super Admin', '[\"admin_manage\",\"about_page_manage\",\"users_manage\",\"quote_manage\",\"newsletter_manage\",\"package_orders_manage\",\"all_payment_logs\",\"pages_manage\",\"menus_manage\",\"widgets_manage\",\"popup_builder\",\"form_builder\",\"blogs_manage\",\"job_post_manage\",\"events_manage\",\"products_manage\",\"donations_manage\",\"knowledgebase\",\"home_variant\",\"topbar_settings\",\"home_page_manage\",\"contact_page_manage\",\"feedback_page_manage\",\"services\",\"case_study\",\"gallery_page\",\"404_page_manage\",\"faq\",\"brand_logos\",\"price_plan\",\"team_members\",\"testimonial\",\"counterup\",\"general_settings\",\"languages\"]', '2020-05-15 10:00:00', '2020-07-27 10:41:15'),
(2, 'Editor', '[\"about_page_manage\",\"quote_manage\",\"newsletter_manage\",\"package_orders_manage\",\"all_payment_logs\",\"pages_manage\",\"blogs_manage\",\"job_post_manage\",\"events_manage\",\"products_manage\",\"donations_manage\",\"knowledgebase\",\"topbar_settings\",\"home_page_manage\",\"contact_page_manage\",\"feedback_page_manage\",\"services\",\"case_study\",\"gallery_page\",\"faq\",\"brand_logos\",\"price_plan\",\"team_members\",\"testimonial\",\"counterup\"]', '2020-05-16 00:34:16', '2020-07-27 10:42:52'),
(3, 'Admin', '[\"users_manage\",\"quote_manage\",\"newsletter_manage\",\"package_orders_manage\",\"all_payment_logs\",\"pages_manage\",\"menus_manage\",\"widgets_manage\",\"popup_builder\",\"form_builder\",\"blogs_manage\",\"job_post_manage\",\"events_manage\",\"products_manage\",\"donations_manage\",\"knowledgebase\",\"topbar_settings\",\"home_page_manage\",\"contact_page_manage\",\"feedback_page_manage\",\"services\",\"case_study\",\"gallery_page\",\"404_page_manage\",\"faq\",\"brand_logos\",\"price_plan\",\"team_members\",\"testimonial\",\"counterup\",\"general_settings\"]', '2020-05-16 00:34:29', '2020-07-27 10:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialized_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_appointment` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `categories_id`, `title`, `designation`, `location`, `short_description`, `description`, `additional_info`, `experience_info`, `specialized_info`, `booking_info`, `status`, `appointment_status`, `image`, `max_appointment`, `price`, `meta_description`, `meta_title`, `meta_tags`, `og_meta_description`, `og_meta_title`, `og_meta_image`, `user_id`, `created_by`, `slug`, `created_at`, `updated_at`) VALUES
(8, 2, 'Angelica J. Hunt', 'Neurology', '1425 Oakdale Avenue Tampa, FL 33602', 'There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.', '<div>I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.</div><div><br></div><div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>Hong Kong Phooey, number one super guy. Hong Kong Phooey, quicker than the human eye. He’s got style, a groovy style, and a car that just won’t stop. When the going gets tough, he’s really rough, with a Hong Kong Phooey chop (Hi-Ya!). Hong Kong Phooey, number one super guy. Hong Kong Phooey, quicker than the human eye. Hong Kong Phooey, he’s fan-riffic!</div><div><br></div><div>Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.</div>', 'a:2:{i:0;s:37:\"like a bolt of thunder from the blue.\";i:1;s:40:\"forces bringing peace and justice to all\";}', 'a:2:{i:0;s:38:\"Hong Kong Phooey, number one super guy\";i:1;s:26:\"quicker than the human eye\";}', 'a:2:{i:0;s:32:\"He’s got style, a groovy style\";i:1;s:32:\"and a car that just won’t stop\";}', 'a:7:{s:8:\"saturday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,2,3,5\";}s:6:\"sunday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,2,4,3\";}s:6:\"monday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,3,5,4\";}s:7:\"tuesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:3:\"1,3\";}s:9:\"wednesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:9:\"3,5,7,4,6\";}s:8:\"thursday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,2,3,4\";}s:6:\"friday\";a:1:{s:16:\"booking_time_ids\";s:7:\"5,6,7,8\";}}', 'publish', 'yes', '106', 95, 299.00, 'Commodo omnis est a', 'Et ut dolor nulla no', 'Minus et quo ipsum r', 'Lorem eum sit elit', 'Recusandae Ut quibu', '26', NULL, NULL, 'angelica-j-hunt', '2021-06-15 21:30:02', '2021-07-02 18:09:51'),
(9, 2, 'Leonard D. Field', 'Orthopaedics', '3826 Wilson Avenue Richardson, TX 75081', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '<div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</div><div><br></div><div>Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.</div><div><br></div><div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Mutley, you snickering, floppy eared hound. When courage is needed, you’re never around. Those medals you wear on your moth-eaten chest should be there for bungling at which you are best. So, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon. Howwww! Nab him, jab him, tab him, grab him, stop that pigeon now.</div>', 'a:2:{i:0;s:29:\"Barnaby The Bear’s my name,\";i:1;s:27:\"never call me Jack or James\";}', 'a:2:{i:0;s:26:\"I will sing my way to fame\";i:1;s:28:\"Barnaby the Bear’s my name\";}', 'a:2:{i:0;s:23:\"Birds taught me to sing\";i:1;s:31:\"when they took me to their king\";}', 'a:7:{s:8:\"saturday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:9:\"1,2,3,5,4\";}s:6:\"sunday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,2,4,3\";}s:6:\"monday\";a:1:{s:16:\"booking_time_ids\";s:7:\"3,5,4,6\";}s:7:\"tuesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,3,2,4\";}s:9:\"wednesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:9:\"3,5,7,4,6\";}s:8:\"thursday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,2,3,4\";}s:6:\"friday\";a:1:{s:16:\"booking_time_ids\";N;}}', 'publish', 'yes', '104', 95, 399.00, 'Commodo omnis est a', 'Et ut dolor nulla no', 'Minus et quo ipsum r', 'Lorem eum sit elit', 'Recusandae Ut quibu', '105', NULL, NULL, 'leonard-d-field', '2021-06-15 21:32:49', '2021-07-02 18:03:15'),
(10, 3, 'Alfred M. Hill', 'Cardiology', '1872 Northwest Boulevard Fort Lee, NJ 07024', 'I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.', '<div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.</div><div><br></div><div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold.</div>', 'a:2:{i:0;s:41:\"some day we will find The Cities of Gold.\";i:1;s:49:\"Children of the sun, see your time has just begun\";}', 'a:2:{i:0;s:46:\"I never spend much time in school but I taught\";i:1;s:38:\"It’s true I hire my body out for pay\";}', 'a:2:{i:0;s:27:\"Thundercats are on the move\";i:1;s:21:\"Thundercats are loose\";}', 'a:7:{s:8:\"saturday\";a:1:{s:16:\"booking_time_ids\";N;}s:6:\"sunday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:5:\"1,2,4\";}s:6:\"monday\";a:1:{s:16:\"booking_time_ids\";s:7:\"3,5,6,8\";}s:7:\"tuesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"8,7,6,5\";}s:9:\"wednesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:9:\"3,5,7,4,6\";}s:8:\"thursday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,2,3,4\";}s:6:\"friday\";a:1:{s:16:\"booking_time_ids\";s:7:\"2,4,5,3\";}}', 'publish', 'yes', '101', 95, 299.00, 'Commodo omnis est a', 'Et ut dolor nulla no', 'Minus et quo ipsum r', 'Lorem eum sit elit', 'Recusandae Ut quibu', NULL, NULL, NULL, 'alfred-m-hill', '2021-06-15 21:34:55', '2021-07-02 17:47:48'),
(12, 1, 'Milton J. Levis', 'General Surgery', '4631 Vineyard Drive Painesville, OH 44077', 'Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find', '<div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold.</div><div><br></div><div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div>', 'a:2:{i:0;s:36:\"Top Cat! The most effectual Top Cat!\";i:1;s:33:\"He’s the most tip top, Top Cat.\";}', 'a:2:{i:0;s:30:\"This is my boss, Jonathan Hart\";i:1;s:43:\"a self-made millionaire, he’s quite a guy\";}', 'a:2:{i:0;s:26:\"cause when they met it was\";i:1;s:27:\"I take care of both of them\";}', 'a:7:{s:8:\"saturday\";a:1:{s:16:\"booking_time_ids\";N;}s:6:\"sunday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:9:\"1,2,4,6,7\";}s:6:\"monday\";a:1:{s:16:\"booking_time_ids\";s:3:\"3,5\";}s:7:\"tuesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,3,2,6\";}s:9:\"wednesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:5:\"3,5,7\";}s:8:\"thursday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,2,3,4\";}s:6:\"friday\";a:1:{s:16:\"booking_time_ids\";s:1:\"5\";}}', 'publish', 'yes', '100', 95, 199.00, 'Commodo omnis est a', 'Et ut dolor nulla no', 'Minus et quo ipsum r', 'Lorem eum sit elit', 'Recusandae Ut quibu', NULL, NULL, NULL, 'milton-j-levis', '2021-06-15 22:26:08', '2021-07-03 12:52:07'),
(13, 1, 'Orville C. Zuniga', 'Gastrology', '3749 Heavens Way San Juan Capistrano', 'There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.', '<p>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold.</p><p><br></p><p>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</p>', 'a:3:{i:0;s:50:\"Children of the sun, see your time has just begun,\";i:1;s:46:\"Every day and night, with the condor in flight\";i:2;s:34:\"you search for the Cities of Gold.\";}', 'a:3:{i:0;s:19:\"Harvard University.\";i:1;s:25:\"Johns Hopkins University.\";i:2;s:21:\"University of Oxford.\";}', 'a:2:{i:0;s:41:\"some day we will find The Cities of Gold.\";i:1;s:42:\"In search of Earth, flying in to the night\";}', 'a:7:{s:8:\"saturday\";a:1:{s:16:\"booking_time_ids\";N;}s:6:\"sunday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:5:\"1,2,4\";}s:6:\"monday\";a:1:{s:16:\"booking_time_ids\";s:3:\"3,5\";}s:7:\"tuesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:3:\"1,3\";}s:9:\"wednesday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:5:\"3,5,7\";}s:8:\"thursday\";a:2:{s:6:\"status\";s:2:\"on\";s:16:\"booking_time_ids\";s:7:\"1,2,3,4\";}s:6:\"friday\";a:1:{s:16:\"booking_time_ids\";N;}}', 'publish', 'yes', '99', 95, 159.00, 'Commodo omnis est a', 'Et ut dolor nulla no', 'Minus et quo ipsum r', 'Lorem eum sit elit', 'Recusandae Ut quibu', NULL, NULL, NULL, 'orville-c-zuniga', '2021-06-15 22:26:10', '2021-07-03 12:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_bookings`
--

CREATE TABLE `appointment_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_track` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appointment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` double(8,2) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_time_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_attachment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boooked_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_booking_times`
--

CREATE TABLE `appointment_booking_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_booking_times`
--

INSERT INTO `appointment_booking_times` (`id`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, '10:00AM - 11:00AM', 'publish', '2021-06-15 15:32:37', '2021-06-15 15:32:37'),
(2, '11:00AM - 12:00PM', 'publish', '2021-06-15 15:32:46', '2021-06-15 15:32:46'),
(3, '9:00AM - 10:00AM', 'publish', '2021-06-15 15:32:52', '2021-06-15 15:32:52'),
(4, '1:00PM - 2:00PM', 'publish', '2021-06-15 15:32:58', '2021-06-15 15:32:58'),
(5, '3:00PM - 4:00PM', 'publish', '2021-06-15 15:33:06', '2021-06-15 15:33:06'),
(6, '5:00PM - 6:00PM', 'publish', '2021-06-15 15:33:13', '2021-06-15 15:33:13'),
(7, '7:00PM - 8:00PM', 'publish', '2021-06-15 15:33:19', '2021-06-15 15:33:19'),
(8, '9:00PM - 10:00PM', 'publish', '2021-06-15 15:33:25', '2021-06-15 15:33:25'),
(9, '11:00PM - 12:00AM', 'publish', '2021-06-15 15:33:32', '2021-06-15 15:33:32'),
(10, '8:00AM - 9:00AM', 'publish', '2021-06-15 15:33:49', '2021-06-15 15:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_categories`
--

CREATE TABLE `appointment_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_categories`
--

INSERT INTO `appointment_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cardiologists', 'publish', '2021-06-15 19:02:26', '2021-07-03 12:51:43'),
(2, 'Dental', 'publish', '2021-06-15 19:02:31', '2021-06-15 19:04:01'),
(3, 'Eye Care', 'publish', '2021-06-15 19:02:37', '2021-06-15 19:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_reviews`
--

CREATE TABLE `appointment_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ratings` int(10) UNSIGNED DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `user_id`, `title`, `slug`, `tags`, `author`, `content`, `meta_title`, `meta_tags`, `meta_description`, `og_meta_title`, `og_meta_description`, `og_meta_image`, `image`, `status`, `created_at`, `updated_at`) VALUES
(10, 4, 1, 'How to Use CBD Products?', 'the-most-effectual-top-cat-whos-intellectual', 'Aut quis sint lorem,awdawd', 'Vicky', '<p><b>Mutley, you snickering, floppy eared hound. When courage is needed, you’re never around. Those medals you wear on your moth-eaten chest should be there for bungling at which you are best. So, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon. Howwww! Nab him, jab him, tab him, grab him, stop that pigeon now.</b></p><p><b><br></b></p><p><b>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</b></p><p><b><br></b></p><p><b>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</b></p><p><img src=\"http://meadheal.test/assets/uploads/media-uploader/front-view-covid-vaccines-yellow-blue-background-pandemic-color-health-lab-covid-drug-virus-hospital-science-free-space-3-min1625226382.png\" style=\"width: 1521.81px;\"><b><br></b></p><p><b>80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</b></p><p><b><br></b></p><p><b>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</b></p>', 'Molestiae reprehende', 'Qui rem magna deseru', 'Quia qui perspiciati', 'Sed eu assumenda in', 'Adipisci explicabo', '38', '108', 'publish', '2021-07-02 19:09:50', '2022-01-29 08:10:41'),
(11, 5, 1, 'What is CBD?', 'those-medals-you-wear-on-your-moth-eaten', 'Aut quis sint lorem,awdawd', 'Vicky', '<p><b>Mutley, you snickering, floppy eared hound. When courage is needed, you’re never around. Those medals you wear on your moth-eaten chest should be there for bungling at which you are best. So, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon. Howwww! Nab him, jab him, tab him, grab him, stop that pigeon now.</b></p><p><b><br></b></p><p><b>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</b></p><p><b><br></b></p><p><b>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</b></p><p><img src=\"http://meadheal.test/assets/uploads/media-uploader/front-view-covid-vaccines-yellow-blue-background-pandemic-color-health-lab-covid-drug-virus-hospital-science-free-space-3-min1625226382.png\" style=\"width: 1521.81px;\"><b><br></b></p><p><b>80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</b></p><p><b><br></b></p><p><b>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</b></p>', 'Molestiae reprehende', 'Qui rem magna deseru', 'Quia qui perspiciati', 'Sed eu assumenda in', 'Adipisci explicabo', '38', '120', 'publish', '2021-07-02 19:26:19', '2022-01-29 08:10:00'),
(12, 2, 1, 'Why CBD Products Are Useful to us ?', 'birds-taught-me-to-sing-when-they-took-me', 'Aut quis sint lorem,awdawd', 'Vicky', '<p><b>Mutley, you snickering, floppy eared hound. When courage is needed, you’re never around. Those medals you wear on your moth-eaten chest should be there for bungling at which you are best. So, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon. Howwww! Nab him, jab him, tab him, grab him, stop that pigeon now.</b></p><p><b><br></b></p><p><b>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</b></p><p><b><br></b></p><p><b>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</b></p><p><img src=\"http://meadheal.test/assets/uploads/media-uploader/front-view-covid-vaccines-yellow-blue-background-pandemic-color-health-lab-covid-drug-virus-hospital-science-free-space-3-min1625226382.png\" style=\"width: 1521.81px;\"><b><br></b></p><p><b>80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</b></p><p><b><br></b></p><p><b>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</b></p>', 'Molestiae reprehende', 'Qui rem magna deseru', 'Quia qui perspiciati', 'Sed eu assumenda in', 'Adipisci explicabo', '38', '116', 'publish', '2021-07-02 19:37:49', '2022-01-29 08:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Technology', 'publish', '2021-06-05 19:42:18', '2021-06-05 19:42:18'),
(3, 'Business', 'publish', '2021-06-05 19:42:26', '2021-06-05 19:42:26'),
(4, 'Android', 'publish', '2021-06-05 19:42:34', '2021-06-05 19:42:34'),
(5, 'Industry', 'publish', '2021-06-05 19:42:39', '2021-06-05 19:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `counterups`
--

CREATE TABLE `counterups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counterups`
--

INSERT INTO `counterups` (`id`, `title`, `number`, `extra_text`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Range of Products', '10', NULL, 'fas fa-capsules', '2021-06-02 19:24:45', '2022-01-14 01:18:15'),
(2, 'Happy Customers', '250', NULL, 'fas fa-users', '2021-06-02 19:25:04', '2022-01-14 01:19:05'),
(3, 'Expert Doctors', '10', NULL, 'flaticon-doctor', '2021-06-02 19:26:10', '2022-01-14 01:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Can You Overdose On CBD?', 'There is no record of anyone ever overdosing from CBD. CBD is non-toxic.', '2021-06-21 10:56:05', '2022-01-27 07:47:42'),
(2, 'How Much CBD Should I Take Per Day?', 'The ideal serving will vary by person, but we typically recommend starting at 20-30mg daily. Meanwhile, the range typically varies from 5 milligrams to 50 milligrams daily.', '2021-06-21 10:56:19', '2022-01-27 07:47:24'),
(3, 'Do I need a medical prescription to purchase CBD Oil?', 'No, CBD is classified as hemp and is readily available for purchase to all individuals who want to use CBD. Currently, CBD can be found in various retail locations varying from pharmacies to your local health food store.', '2021-06-21 10:56:31', '2022-01-27 07:47:00'),
(4, 'Does CBD Oil Get You High?', 'No, CBD should not get you high. Properly produced and extracted CBD will not get you high and does not contain enough THC in high enough concentrations to produce a high. \r\n​\r\nCBD oil produced by some manufacturers can contain trace amounts of THC. However, here at HempButi, all of our products are produced using a double extraction process to ensure all THC is extracted while leaving the other cannabinoids and terpenes intact.', '2021-06-21 10:56:53', '2022-01-27 07:46:42'),
(5, 'Can I Give My Pet CBD Oil?', 'Yes, you can give pets CBD oil. Pets like dogs, cats, and horses all have a natural endocannabinoid system with CB1 and CB2 receptors, so they can benefit from cannabinoids as well. When it comes to pets, the dosage varies greatly and a bigger dosage doesn\'t always correlate with a bigger animal. It is a good idea to talk with a veterinarian who is familiar with CBD before you give your pet CBD in the form of CBD Dog Chews, CBD Oil Tinctures For Pets or CBD Horse Products.', '2022-01-27 07:48:01', '2022-01-27 07:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `header_bottoms`
--

CREATE TABLE `header_bottoms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_variant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_bottoms`
--

INSERT INTO `header_bottoms` (`id`, `title`, `subtitle`, `offer_title`, `offer_price`, `url`, `icon`, `image`, `home_variant`, `created_at`, `updated_at`) VALUES
(1, 'Qualifed Doctors', NULL, NULL, NULL, NULL, 'flaticon-doctor', NULL, '01', '2021-06-01 00:05:27', '2021-06-01 00:07:44'),
(2, 'Accurate Diagnosis', NULL, NULL, NULL, NULL, 'flaticon-wavy', NULL, '01', '2021-06-01 00:08:04', '2021-06-01 00:08:04'),
(3, 'Modern technology', NULL, NULL, NULL, NULL, 'flaticon-healthy-heart', NULL, '01', '2021-06-01 00:08:26', '2021-06-01 00:08:26'),
(4, 'Best Surgery', NULL, NULL, NULL, NULL, 'flaticon-fitness-2', NULL, '01', '2021-06-01 00:08:58', '2021-06-01 00:08:58'),
(8, 'Lens Cameras', 'Operation Safety', 'Special Offer', 'From $29.00', '#', NULL, '14', '03', '2021-06-01 00:11:41', '2021-06-01 00:11:41'),
(9, 'Surgical Mask', 'Operation Safety', 'Special Offer', 'From $29.00', '#', NULL, '15', '03', '2021-06-01 00:12:07', '2021-07-02 20:23:41'),
(10, 'Oxygen Mask', 'Operation Safety', 'Special Offer', 'From $29.00', '#', NULL, '16', '03', '2021-06-01 00:12:19', '2021-07-02 20:24:22'),
(11, 'Lens Cameras', 'Operation Safety', 'Special Offer', 'From $29.00', '#', NULL, '14', '04', '2021-06-01 00:13:32', '2021-06-01 00:13:32'),
(12, 'Surgical Mask', 'Operation Safety', 'Special Offer', 'From $29.00', '#', NULL, '15', '04', '2021-06-01 00:13:43', '2021-07-03 12:29:27'),
(13, 'Oxygen Mask', 'Operation Safety', 'Special Offer', 'From $29.00', '#', NULL, '16', '04', '2021-06-01 00:13:58', '2021-07-03 12:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `header_sliders`
--

CREATE TABLE `header_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_txt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vdo_btn_txt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vdo_btn_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vdo_btn_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_sliders`
--

INSERT INTO `header_sliders` (`id`, `title`, `subtitle`, `btn_txt`, `btn_url`, `btn_status`, `vdo_btn_txt`, `vdo_btn_url`, `vdo_btn_status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'We\'re Here Care for your ealth & satisfaction', 'Welcome to Medheal health care', 'Our Campaing', '#', NULL, 'Watch Video', 'https://www.youtube.com', NULL, '6', '2021-05-09 19:06:38', '2021-05-09 19:40:04'),
(2, 'We\'re Here Care for your ealth & satisfaction', 'Welcome to Medheal health care', 'Our Campaing', '#', 'on', 'Watch Video', 'https://www.youtube.com', 'on', '7', '2021-05-09 20:13:29', '2021-05-09 20:13:29'),
(3, 'We\'re Here Care for your ealth & satisfaction', 'Welcome to Medheal health care', 'Our Campaing', '#', 'on', 'Watch Video', 'https://www.youtube.com', 'on', '8', '2021-05-09 20:23:52', '2021-05-09 20:23:52'),
(4, 'We\'re Here Care for your ealth & satisfaction', 'Welcome to Medheal health care', 'Our Campaing', '#', 'on', 'Watch Video', 'https://www.youtube.com', 'on', '9', '2021-05-09 20:24:07', '2021-05-09 20:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `image_galleries`
--

CREATE TABLE `image_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_galleries`
--

INSERT INTO `image_galleries` (`id`, `image`, `title`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, '97', 'Bone Operation', 4, '2021-06-05 13:19:53', '2021-07-02 18:12:32'),
(2, '96', 'Bone Operation', 4, '2021-06-05 13:20:14', '2021-07-02 18:12:24'),
(3, '95', 'Bone Operation', 4, '2021-06-05 13:20:24', '2021-07-02 18:12:15'),
(4, '94', 'Teeth Operation', 3, '2021-06-05 13:22:20', '2021-07-02 18:12:05'),
(5, '93', 'Teeth Operation', 3, '2021-06-05 13:22:57', '2021-07-02 18:11:56'),
(6, '92', 'Face Operation', 1, '2021-06-05 13:25:10', '2021-07-02 18:11:46'),
(7, '91', 'Face Operation', 1, '2021-06-05 13:25:19', '2021-07-02 18:11:34'),
(8, '90', 'Face Operation', 1, '2021-06-05 13:25:27', '2021-07-02 18:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery_categories`
--

CREATE TABLE `image_gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_gallery_categories`
--

INSERT INTO `image_gallery_categories` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Face', 'publish', '2021-06-05 12:06:13', '2021-06-05 12:07:58'),
(3, 'Teeth', 'publish', '2021-06-05 13:12:21', '2021-06-05 13:12:21'),
(4, 'Bone', 'publish', '2021-06-05 13:13:16', '2021-06-05 13:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `infobars`
--

CREATE TABLE `infobars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infobars`
--

INSERT INTO `infobars` (`id`, `title`, `details`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Send Us Mail', 'info@example.com', 'flaticon-mail', '2021-05-09 16:29:45', '2021-05-09 16:31:29'),
(2, 'Call To Us', '+91 458 654 528', 'flaticon-call', '2021-05-09 16:30:19', '2021-05-09 16:30:19'),
(3, 'Open Time', 'Mon - Fri 8 Am - 5 Pm', 'flaticon-clock', '2021-05-09 16:32:00', '2021-05-09 16:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `keyfeatures`
--

CREATE TABLE `keyfeatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keyfeatures`
--

INSERT INTO `keyfeatures` (`id`, `title`, `icon`, `description`, `variant`, `created_at`, `updated_at`) VALUES
(1, 'Best Doctors', 'flaticon-doctor', 'With occupancy rates at near capacity and an increasing number.', 'one', '2021-06-07 20:58:29', '2021-06-07 20:58:29'),
(2, 'Best Diagnosis', 'flaticon-wavy', 'With occupancy rates at near capacity and an increasing number.', 'one', '2021-06-07 20:58:50', '2021-06-07 20:59:01'),
(3, 'Modern Kits', 'flaticon-healthy-heart', 'With occupancy rates at near capacity and an increasing number.', 'one', '2021-06-07 20:59:36', '2021-06-07 21:02:08'),
(6, '100% Safe Products', 'far fa-thumbs-up', 'Our Products are 100% Safe', 'two', '2021-06-08 11:20:41', '2022-01-13 09:30:37'),
(7, 'Money Back Gurantee', 'fas fa-hand-holding-usd', 'We offer 100% Money Back Gurantee', 'two', '2021-06-08 11:21:07', '2022-01-13 09:30:55'),
(8, '24/7 Support Staff', 'flaticon-speech-bubbles-with-a-heart-with-a-lifeline', 'You will get 24/7 Support', 'two', '2021-06-08 11:21:40', '2022-01-13 09:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` int(10) UNSIGNED DEFAULT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `default`, `direction`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English (UK)', 'en_GB', 1, 'ltr', 'publish', '2020-01-04 05:58:44', '2021-07-01 21:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `media_uploads`
--

CREATE TABLE `media_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_uploads`
--

INSERT INTO `media_uploads` (`id`, `title`, `path`, `alt`, `size`, `dimensions`, `created_at`, `updated_at`) VALUES
(20, '01-min (1).png', '01-min-11622567474.png', NULL, '4.39 KB', '74 x 74 pixels', '2021-06-01 21:11:14', '2021-06-01 21:11:14'),
(21, '02-min (1).png', '02-min-11622567475.png', NULL, '3.96 KB', '74 x 74 pixels', '2021-06-01 21:11:15', '2021-06-01 21:11:15'),
(22, '03-min (1).png', '03-min-11622567476.png', NULL, '5.04 KB', '80 x 80 pixels', '2021-06-01 21:11:16', '2021-06-01 21:11:16'),
(23, '04-min (1).png', '04-min-11622567478.png', NULL, '4.37 KB', '74 x 74 pixels', '2021-06-01 21:11:18', '2021-06-01 21:11:18'),
(28, 'sign-min.png', 'sign-min1622640494.png', NULL, '1.05 KB', '143 x 38 pixels', '2021-06-02 17:28:14', '2021-06-02 17:28:14'),
(29, '02-min (2).jpg', '02-min-21622640876.jpg', NULL, '33.87 KB', '458 x 571 pixels', '2021-06-02 17:34:36', '2021-06-02 17:34:36'),
(30, '03-min (2).jpg', '03-min-21622640877.jpg', NULL, '20.08 KB', '360 x 307 pixels', '2021-06-02 17:34:37', '2021-06-02 17:34:37'),
(71, 'razorpay1616934785.png', 'razorpay16169347851623750143.png', NULL, '10.06 KB', '1000 x 600 pixels', '2021-06-15 13:42:24', '2021-06-15 13:42:24'),
(74, 'cash-on-delivery.jpg', 'cash-on-delivery1623750169.jpg', NULL, '21.83 KB', '500 x 250 pixels', '2021-06-15 13:42:49', '2021-06-15 13:42:49'),
(81, 'Untitled-1.png', 'untitled-11625028365.png', NULL, '209.55 KB', '1000 x 1000 pixels', '2021-06-30 08:46:05', '2021-06-30 08:46:05'),
(108, '1-min.png', '1-min1625290746.png', NULL, '253.5 KB', '1000 x 1000 pixels', '2021-07-03 09:39:06', '2021-07-03 09:39:06'),
(109, '9-min.png', '9-min1625292815.png', NULL, '89.06 KB', '1000 x 1000 pixels', '2021-07-03 10:13:36', '2021-07-03 10:13:36'),
(110, '13-min.png', '13-min1625292815.png', NULL, '176.14 KB', '1000 x 1000 pixels', '2021-07-03 10:13:36', '2021-07-03 10:13:36'),
(111, 'asset-1-min.png', 'asset-1-min1625292816.png', NULL, '51.35 KB', '1000 x 1000 pixels', '2021-07-03 10:13:36', '2021-07-03 10:13:36'),
(112, 'asset-2-min.png', 'asset-2-min1625292816.png', NULL, '182.54 KB', '1000 x 1000 pixels', '2021-07-03 10:13:36', '2021-07-03 10:13:36'),
(113, 'asset-3-min.png', 'asset-3-min1625292817.png', NULL, '85.15 KB', '1000 x 1000 pixels', '2021-07-03 10:13:37', '2021-07-03 10:13:37'),
(114, 'asset-4-min.png', 'asset-4-min1625292817.png', NULL, '202.47 KB', '1000 x 1000 pixels', '2021-07-03 10:13:37', '2021-07-03 10:13:37'),
(115, 'asset-5-min.png', 'asset-5-min1625292818.png', NULL, '78.76 KB', '1000 x 1000 pixels', '2021-07-03 10:13:38', '2021-07-03 10:13:38'),
(116, 'asset-6-min.png', 'asset-6-min1625292818.png', NULL, '249.55 KB', '1000 x 1000 pixels', '2021-07-03 10:13:38', '2021-07-03 10:13:38'),
(117, 'asset-7-min.png', 'asset-7-min1625292818.png', NULL, '103.96 KB', '1000 x 1000 pixels', '2021-07-03 10:13:39', '2021-07-03 10:13:39'),
(118, 'asset-8-min.png', 'asset-8-min1625292819.png', NULL, '57.43 KB', '1000 x 1000 pixels', '2021-07-03 10:13:39', '2021-07-03 10:13:39'),
(119, 'asset-9-min.png', 'asset-9-min1625292819.png', NULL, '149.72 KB', '1000 x 1000 pixels', '2021-07-03 10:13:39', '2021-07-03 10:13:39'),
(120, 'asset-10-min.png', 'asset-10-min1625292819.png', NULL, '257.86 KB', '1000 x 1000 pixels', '2021-07-03 10:13:40', '2021-07-03 10:13:40'),
(123, 'cbd-oil-hempbuti-removebg-prev.png', 'cbd-oil-hempbuti-removebg-prev1643123506.png', NULL, '159.94 KB', '463 x 477 pixels', '2022-01-25 09:41:46', '2022-01-25 09:41:46'),
(124, 'hempbuti-breadcum.jpg', 'hempbuti-breadcum1643186882.jpg', NULL, '58.64 KB', '1400 x 466 pixels', '2022-01-26 03:18:05', '2022-01-26 03:18:05'),
(125, 'HempButi-logo.png', 'hempbuti-logo1643187735.png', NULL, '8.62 KB', '189 x 51 pixels', '2022-01-26 03:32:15', '2022-01-26 03:32:15'),
(126, 'favicon-32x32.png', 'favicon-32x321643461333.png', NULL, '1009 ', '32 x 32 pixels', '2022-01-29 07:32:13', '2022-01-29 07:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `medical_care_infos`
--

CREATE TABLE `medical_care_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_care_infos`
--

INSERT INTO `medical_care_infos` (`id`, `title`, `icon`, `details`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Hospital and Emergency Care', 'flaticon-health-2', NULL, 'medical_care', '2021-06-01 18:37:50', '2021-06-01 18:38:13'),
(2, 'Hospital and Emergency Care', 'flaticon-heart', NULL, 'medical_care', '2021-06-01 18:38:49', '2021-06-01 18:38:49'),
(6, 'Sunday', NULL, '8:00 AM – 8:00 PM', 'opening_hour', '2021-06-01 18:39:48', '2021-06-01 18:39:48'),
(7, 'Monday', NULL, '8:00 AM – 8:00 PM', 'opening_hour', '2021-06-01 18:40:28', '2021-06-01 18:40:28'),
(8, 'Tuesday', NULL, '8:00 AM – 8:00 PM', 'opening_hour', '2021-06-01 18:40:42', '2021-06-01 18:40:42'),
(9, 'Wednesday', NULL, '8:00 AM – 8:00 PM', 'opening_hour', '2021-06-01 18:40:53', '2021-06-01 18:40:53'),
(10, 'Thursday', NULL, '8:00 AM – 8:00 PM', 'opening_hour', '2021-06-01 18:41:05', '2021-06-01 19:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Primary Menu', '[{\"ptype\":\"custom\",\"id\":2,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Home\",\"purl\":\"@url\"},{\"ptype\":\"static\",\"id\":3,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"about\",\"pname\":\"set title from page settings\",\"children\":[{\"ptype\":\"static\",\"id\":4,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"testimonial\",\"pname\":\"Testimonial\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"static\",\"id\":43,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"image_gallery\",\"pname\":\"Image gallery\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"static\",\"id\":82,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"faq\",\"pname\":\"Faq\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{}]},{\"items_id\":\"6,7,8,9,10,11\",\"ptype\":\"App\\\\MenuBuilder\\\\MegaMenus\\\\ServiceMegaMenu\",\"id\":121,\"antarget\":\"\",\"icon\":\"\"},{\"items_id\":\"2,7,8,9,10,11,12,13\",\"ptype\":\"App\\\\MenuBuilder\\\\MegaMenus\\\\ProductMegaMenu\",\"id\":122,\"antarget\":\"\",\"icon\":\"\"},{\"items_id\":\"8,9,10,12,13\",\"ptype\":\"App\\\\MenuBuilder\\\\MegaMenus\\\\AppointmentMegaMenu\",\"id\":123,\"antarget\":\"\",\"icon\":\"\"},{\"ptype\":\"custom\",\"id\":124,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Pages\",\"purl\":\"#\",\"children\":[{\"ptype\":\"static\",\"id\":125,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"service\",\"pname\":\"Service\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"static\",\"id\":145,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"product\",\"pname\":\"Product\"},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"static\",\"id\":184,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"appointment\",\"pname\":\"Appointment\"},{\"ptype\":\"pages\",\"pid\":3,\"id\":231},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"pages\",\"pid\":4,\"id\":232}]},{\"ptype\":\"static\",\"id\":224,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"blog\",\"pname\":\"Blog\"},{\"ptype\":\"static\",\"id\":225,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"contact\",\"pname\":\"Contact\"}]', 'default', '2021-03-24 18:07:56', '2021-07-05 11:10:22'),
(4, 'Important Links [ENG]', '[{\"ptype\":\"custom\",\"pname\":\"Home\",\"purl\":\"@url\",\"id\":1},{\"ptype\":\"static\",\"pslug\":\"about\",\"pname\":\"About\",\"id\":2},{\"ptype\":\"static\",\"pslug\":\"contact\",\"pname\":\"Contact\",\"id\":3}]', NULL, '2021-03-29 11:31:38', '2021-07-02 19:44:54'),
(6, 'Useful Links [ENG]', '[{\"ptype\":\"custom\",\"id\":2,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Home\",\"purl\":\"@url\"},{\"ptype\":\"static\",\"id\":3,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"blog\",\"pname\":\"Blog\"},{\"ptype\":\"static\",\"id\":4,\"antarget\":\"\",\"icon\":\"\",\"pslug\":\"contact\",\"pname\":\"Contact\"},{\"ptype\":\"custom\",\"id\":5,\"antarget\":\"\",\"icon\":\"fas fa-facebook\",\"pname\":\"Products\",\"purl\":\"\"}]', NULL, '2021-03-29 13:27:29', '2022-01-13 05:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_06_180949_create_admins_table', 1),
(6, '2019_12_07_082524_create_static_options_table', 1),
(15, '2019_12_13_221931_create_languages_table', 1),
(27, '2020_04_14_082508_create_media_uploads_table', 4),
(30, '2014_10_12_000000_create_users_table', 5),
(31, '2020_07_22_132250_create_popup_builders_table', 5),
(33, '2020_04_20_170818_create_orders_table', 6),
(34, '2020_04_21_142420_create_payment_logs_table', 7),
(38, '2021_03_24_140243_create_menus_table', 11),
(46, '2020_06_14_081955_create_widgets_table', 16),
(112, '2021_05_08_113308_create_topbar_infos_table', 17),
(113, '2021_05_08_115323_create_social_icons_table', 18),
(114, '2021_05_09_115439_create_infobars_table', 19),
(115, '2021_05_09_135225_create_header_sliders_table', 20),
(116, '2021_05_31_181909_create_header_bottoms_table', 21),
(118, '2021_06_01_110034_create_medical_care_infos_table', 22),
(119, '2021_06_01_164441_create_testimonials_table', 23),
(125, '2021_03_27_113444_create_counterups_table', 25),
(126, '2021_06_05_164441_create_image_galleries_table', 26),
(127, '2021_06_05_164450_create_image_gallery_categories_table', 26),
(128, '2021_06_05_135321_create_blogs_table', 27),
(129, '2021_06_05_140212_create_blog_categories_table', 27),
(130, '2021_06_06_160856_create_services_table', 28),
(131, '2021_06_06_161439_create_service_categories_table', 29),
(132, '2021_06_07_121922_create_pages_table', 30),
(133, '2021_06_07_162919_create_keyfeatures_table', 31),
(134, '2021_06_08_183807_create_progress_bars_table', 32),
(137, '2021_06_09_081656_create_products_table', 33),
(138, '2021_06_09_081826_create_product_categories_table', 33),
(139, '2021_06_10_150831_create_product_shippings_table', 34),
(140, '2021_06_10_153604_create_product_coupons_table', 35),
(141, '2021_06_10_160315_create_product_orders_table', 36),
(142, '2021_06_10_165104_create_product_ratings_table', 37),
(143, '2021_06_12_203057_create_product_order_tracks_table', 38),
(144, '2021_06_15_104739_create_appointments_table', 38),
(145, '2021_06_15_110337_create_appointment_categories_table', 39),
(146, '2021_06_15_110634_create_appointment_bookings_table', 40),
(147, '2021_06_15_110834_create_appointment_reviews_table', 41),
(148, '2021_06_15_111026_create_appointment_booking_times_table', 42),
(150, '2021_06_16_102650_create_prescriptions_table', 43),
(151, '2021_06_20_120912_create_quotes_table', 44),
(152, '2021_06_21_062206_create_faqs_table', 45),
(153, '2021_06_30_164849_add_new_column_in_presecription_table', 46);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shawonrog@gmail.com', 'gt62syz8Z6ba5V7GTtnBIZchwHJvfZ', NULL),
('shawon9324@gmail.com', '7hAYG5ygkSjbarITWMFYFywmPolQzO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `popup_builders`
--

CREATE TABLE `popup_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_time_end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popup_builders`
--

INSERT INTO `popup_builders` (`id`, `name`, `type`, `title`, `only_image`, `background_image`, `offer_time_end`, `button_text`, `button_link`, `btn_status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'discount popup', 'discount', 'Discount 25%', '84', NULL, '2021-10-14', 'Buy Now', '#', 'on', 'Out believe has requested not how comfort evident.', '2021-03-09 11:27:45', '2021-07-02 10:04:01'),
(3, 'notice popup', 'notice', 'Notice!!', NULL, NULL, NULL, NULL, NULL, NULL, 'She propriety immediate was improving. He or entrance humored likewise moderate. Much nor game son say feel. Fat make met can must form into gate. Me we offending prevailed discovery.', '2021-03-11 19:40:14', '2021-03-11 19:40:14'),
(4, 'super sale', 'only_image', NULL, '83', NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-15 11:32:16', '2021-07-02 09:52:27'),
(5, 'promotion', 'promotion', 'Get It Now', '84', NULL, NULL, 'Buy Now', '#', 'on', 'There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.', '2021-07-02 10:08:06', '2021-07-02 10:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `product_order_id` int(11) DEFAULT NULL,
  `customer_message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_prescription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_feedback_message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `badge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_sold` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_downloadable` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `downloadable_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `tax_percentage` int(11) DEFAULT NULL,
  `is_featured` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `title`, `short_description`, `description`, `attributes_title`, `attributes_description`, `badge`, `slug`, `sku`, `stock_status`, `total_sold`, `image`, `gallery`, `is_downloadable`, `downloadable_file`, `regular_price`, `sale_price`, `sales`, `tax_percentage`, `is_featured`, `status`, `meta_description`, `meta_title`, `meta_tags`, `og_meta_description`, `og_meta_title`, `og_meta_image`, `created_at`, `updated_at`) VALUES
(2, '3', NULL, 'Lady who knows how to take care', 'I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.', '<div>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!</div><div><br></div><div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</div><div><br></div><div>Mutley, you snickering, floppy eared hound. When courage is needed, you’re never around. Those medals you wear on your moth-eaten chest should be there for bungling at which you are best. So, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon. Howwww! Nab him, jab him, tab him, grab him, stop that pigeon now.</div><div><br></div><div>I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.</div>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:32:\"How much tablet in this packet ?\";}', 'a:2:{i:0;s:5:\"150gm\";i:1;s:3:\"50p\";}', '-30%', 'lady-who-knows-how-to-take-care-of-herself', 'modi-recusandae-pla', 'in_stock', '5', '116', NULL, NULL, NULL, '49', '29', 11, NULL, 'on', 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-06-10 17:32:55', '2021-07-03 10:42:53'),
(7, '2', NULL, 'Porro iure recusanda Soaring', 'This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was', '<div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold.</div><div><br></div><div>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!</div><div><br></div><div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.</div><div><br></div><div>80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</div>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:31:\"How many tablet in the bottle ?\";}', 'a:2:{i:0;s:5:\"100gm\";i:1;s:3:\"50p\";}', '-30%', 'autem-libero-aliquam', 'modi-recusandae-pla', 'in_stock', NULL, '114', NULL, NULL, NULL, '599', '399', 11, 15, 'on', 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-06-10 21:16:20', '2021-07-03 10:40:21'),
(8, '2', NULL, 'who says you have to call just', 'helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.', '<div>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</div><div><br></div><div>Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</div><div><br></div><div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.</div><div><br></div><div>Mutley, you snickering, floppy eared hound. When courage is needed, you’re never around. Those medals you wear on your moth-eaten chest should be there for bungling at which you are best. So, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon. Howwww! Nab him, jab him, tab him, grab him, stop that pigeon now.</div><div><br></div><div>Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.&nbsp;</div>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:32:\"How many capsule in the packet ?\";}', 'a:2:{i:0;s:3:\"25g\";i:1;s:3:\"40p\";}', '-30%', 'who-says-you-have-to-call-just', 'modi-recusandae-pla', 'in_stock', NULL, '109', NULL, NULL, NULL, '199', '99', 9, 15, 'on', 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-06-10 21:16:35', '2021-07-03 10:18:09'),
(9, '5', NULL, 'shadowy flight into the dangerous', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '<div>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</div><div><br></div><div>Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</div><div><br></div><div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.</div><div><br></div><div>Mutley, you snickering, floppy eared hound. When courage is needed, you’re never around. Those medals you wear on your moth-eaten chest should be there for bungling at which you are best. So, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon, stop that pigeon. Howwww! Nab him, jab him, tab him, grab him, stop that pigeon now.</div><div><br></div><div>Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.&nbsp;</div>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:28:\"How much capsule in a packet\";}', 'a:2:{i:0;s:3:\"20g\";i:1;s:3:\"20p\";}', '-20%', 'shadowy-flight-into-the-dangerous', 'modi-recusandae-pla', 'in_stock', NULL, '110', '114|113|112|111', NULL, NULL, '499', '299', NULL, 15, 'on', 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-06-10 21:16:37', '2021-07-03 12:47:40'),
(10, '3', NULL, 'shadowy flight into the dangerous', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '<p><b>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</b></p><p><b><br></b></p><p><b>Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</b></p><p><b><br></b></p><p><b>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.</b></p>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:28:\"How much Capsule in a packet\";}', 'a:2:{i:0;s:3:\"5gm\";i:1;s:3:\"10p\";}', '-5%', 'shadowy-flight-into-the-dangerous', 'Modi recusandae Pla', 'in_stock', '100', '108', NULL, NULL, NULL, '299', '199', NULL, 5, 'on', 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-06-10 21:32:29', '2021-07-03 09:41:06'),
(11, '5', NULL, 'Barnaby The Bear’s my name, never', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '<p><b>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</b></p><p><b><br></b></p><p><b>Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</b></p><p><b><br></b></p><p><b>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.</b></p>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:28:\"How much Capsule in a packet\";}', 'a:2:{i:0;s:3:\"5gm\";i:1;s:3:\"10p\";}', '-5%', 'barnaby-the-bears-my-name-never', 'modi-recusandae-pla', 'in_stock', NULL, '120', NULL, NULL, NULL, '299', '149', NULL, 5, NULL, 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-07-03 11:12:05', '2021-07-03 12:48:09'),
(12, '4', NULL, 'Thundercats are on the move loose', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '<p><b>Thundercats are on the move, Thundercats are loose. Feel the magic, hear the roar, Thundercats are loose. Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thunder, thunder, thunder, Thundercats! Thundercats!</b></p><p><b><br></b></p><p><b>Hong Kong Phooey, number one super guy. Hong Kong Phooey, quicker than the human eye. He’s got style, a groovy style, and a car that just won’t stop. When the going gets tough, he’s really rough, with a Hong Kong Phooey chop (Hi-Ya!). Hong Kong Phooey, number one super guy. Hong Kong Phooey, quicker than the human eye. Hong Kong Phooey, he’s fan-riffic!</b></p><p><b><br></b></p><p><b>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!</b></p><p><b><br></b></p><p><b>80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</b></p><p><b><br></b></p><p><b>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold.</b></p>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:28:\"How much Capsule in a packet\";}', 'a:2:{i:0;s:3:\"5gm\";i:1;s:3:\"10p\";}', '-5%', 'thundercats-are-on-the-move-loose', 'modi-recusandae-pla', 'in_stock', NULL, '111', NULL, NULL, NULL, '199', '99', NULL, 5, NULL, 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-07-03 11:52:36', '2021-07-03 12:49:05'),
(13, '4', NULL, 'Hong Kong Phooey, number one super', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '<p><b>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</b></p><p><b><br></b></p><p><b>Hong Kong Phooey, number one super guy. Hong Kong Phooey, quicker than the human eye. He’s got style, a groovy style, and a car that just won’t stop. When the going gets tough, he’s really rough, with a Hong Kong Phooey chop (Hi-Ya!). Hong Kong Phooey, number one super guy. Hong Kong Phooey, quicker than the human eye. Hong Kong Phooey, he’s fan-riffic!</b></p><p><b><br></b></p><p><b>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold.</b></p><p><b><br></b></p><p><b>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.</b></p><p><b><br></b></p><p><b>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!</b></p>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:28:\"How much Capsule in a packet\";}', 'a:2:{i:0;s:3:\"5gm\";i:1;s:3:\"10p\";}', '-5%', 'hong-kong-phooey-number-one-super', 'modi-recusandae-pla', 'in_stock', NULL, '115', NULL, NULL, NULL, '99', '89', NULL, 5, NULL, 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-07-03 11:59:55', '2021-07-03 12:49:00'),
(14, '5', NULL, 'There’s a voice that keeps on calling me', 'Knight Rider, a shadowy flight into the dangerous world of a man who does not exist. Michael Knight, a young loner on a crusade to champion the cause of the innocent, the helpless in a world of criminals who operate above the law.', '<p><b>Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</b></p><p><b><br></b></p><p><b>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!</b></p><p><b><br></b></p><p><b>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold.</b></p><p><b><br></b></p><p><b>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</b></p><p><b><br></b></p><p><b>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</b></p>', 'a:2:{i:0;s:6:\"Weight\";i:1;s:28:\"How much Capsule in a packet\";}', 'a:2:{i:0;s:3:\"5gm\";i:1;s:3:\"10p\";}', '-15%', 'theres-a-voice-that-keeps-on-calling-me', 'modi-recusandae-pla', 'in_stock', NULL, '113', NULL, NULL, NULL, '49', '39', NULL, 5, 'on', 'publish', 'Mollitia voluptatum', 'Non unde nulla delec', 'Quia rerum temporibu', 'Fuga Aut dolorem al', 'Id suscipit enim vol', NULL, '2021-07-03 12:21:27', '2021-07-03 12:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `icon`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Medicine', 'flaticon-syrup', 0, 'publish', '2021-06-09 14:22:33', '2021-06-09 14:22:33'),
(3, 'Labaratory', 'flaticon-flask-1', 0, 'publish', '2021-06-09 14:22:55', '2021-06-09 14:22:55'),
(4, 'Equipment', 'flaticon-stethoscope', 0, 'publish', '2021-06-09 14:23:20', '2021-06-09 14:23:20'),
(5, 'Diagnosis', 'flaticon-pills', 0, 'publish', '2021-06-09 14:23:42', '2021-06-09 14:23:42'),
(6, 'Eye drop', NULL, 3, 'publish', '2021-06-09 14:59:14', '2021-06-09 14:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_coupons`
--

CREATE TABLE `product_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_coupons`
--

INSERT INTO `product_coupons` (`id`, `code`, `discount`, `discount_type`, `expire_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NEWYEAR', '10', 'percentage', '2020-05-12', 'publish', '2021-06-10 19:40:55', '2021-06-10 19:42:15'),
(2, 'SPECIALDISCOUNT', '35', 'amount', '2021-12-10', 'publish', '2021-06-10 19:41:28', '2021-06-10 19:41:28'),
(3, 'NEW', '35', 'amount', '2022-06-10', 'publish', '2021-06-10 19:42:00', '2021-06-10 19:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_track` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_shippings_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_street_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_town` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_district` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `different_shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_street_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_town` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_district` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_items` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `status`, `payment_status`, `coupon_code`, `transaction_id`, `payment_track`, `payment_gateway`, `user_id`, `subtotal`, `coupon_discount`, `shipping_cost`, `product_shippings_id`, `order_created_by`, `total`, `billing_name`, `billing_email`, `billing_phone`, `billing_country`, `billing_street_address`, `billing_town`, `billing_district`, `different_shipping_address`, `shipping_name`, `shipping_email`, `shipping_phone`, `shipping_country`, `shipping_street_address`, `shipping_town`, `shipping_district`, `cart_items`, `created_at`, `updated_at`) VALUES
(25, 'pending', 'complete', NULL, NULL, 'vp7UMX7AZnEdEVpfvm8Y', 'cash_on_delivery', NULL, '1197', '0', '0', '1', NULL, '1376.55', 'Md Ismil', 'okkji.vicky5@gmail.com', '77092181', 'Qatar', 'Najma', 'Doha', 'Qatar', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:1:{i:7;a:5:{s:2:\"id\";i:7;s:5:\"title\";s:28:\"Porro iure recusanda Soaring\";s:8:\"quantity\";i:3;s:4:\"type\";s:8:\"physical\";s:5:\"price\";i:1197;}}', '2022-01-27 09:16:40', '2022-01-27 09:20:24'),
(26, 'pending', 'pending', NULL, NULL, 'osK5bFhCnOoDV1B5J8Nb', 'razorpay', '14', '149', '0', '0', '1', NULL, '156.45', 'Md Ismil', 'okkji.vicky5@gmail.com', '+97477092181', 'Qatar', 'Najma', 'Doha', 'Qatar', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:1:{i:11;a:5:{s:2:\"id\";i:11;s:5:\"title\";s:35:\"Barnaby The Bear’s my name, never\";s:8:\"quantity\";i:1;s:4:\"type\";s:8:\"physical\";s:5:\"price\";i:149;}}', '2022-01-29 15:35:14', '2022-01-29 15:35:14'),
(27, 'pending', 'pending', NULL, NULL, 'H37DuXczNkTZCACEeuz2', 'cash_on_delivery', NULL, '149', '0', '0', '1', NULL, '156.45', 'Md Ismil', 'okkji.vicky5@gmail.com', '77092181', 'Qatar', 'Najma', 'Doha', 'Qatar', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:1:{i:11;a:5:{s:2:\"id\";i:11;s:5:\"title\";s:35:\"Barnaby The Bear’s my name, never\";s:8:\"quantity\";i:1;s:4:\"type\";s:8:\"physical\";s:5:\"price\";i:149;}}', '2022-02-08 07:53:08', '2022-02-08 07:53:08'),
(28, 'pending', 'pending', NULL, NULL, 'Ib3RRQTLPGouK9ZGm30Y', 'razorpay', NULL, '29', '0', '0', '1', NULL, '29', 'Md Ismil', 'okkji.vicky5@gmail.com', '77092181', 'Qatar', 'Najma', 'Doha', 'Qatar', 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:1:{i:2;a:5:{s:2:\"id\";i:2;s:5:\"title\";s:31:\"Lady who knows how to take care\";s:8:\"quantity\";i:1;s:4:\"type\";s:8:\"physical\";s:5:\"price\";i:29;}}', '2022-02-08 11:13:22', '2022-02-08 11:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_order_tracks`
--

CREATE TABLE `product_order_tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ratings` int(10) UNSIGNED DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_shippings`
--

CREATE TABLE `product_shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_default` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_shippings`
--

INSERT INTO `product_shippings` (`id`, `title`, `status`, `description`, `cost`, `order`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Free Shipping', 'publish', 'Shipment will be within 10-15 Days', '0', '1', '1', '2021-06-10 19:24:01', '2021-06-10 19:30:38'),
(2, 'Standard Shipping', 'publish', 'Shipment will be within 5-10 Days.', '5', '2', '0', '2021-06-10 19:25:57', '2021-06-10 19:30:38'),
(3, '2-Day Shipping', 'publish', 'Shipment will be within 2 Days.', '10', '3', NULL, '2021-06-10 19:26:29', '2021-06-10 19:26:29'),
(4, 'Same day delivery', 'publish', 'Shipment will be within 1 Day.', '20', '4', NULL, '2021-06-10 19:27:16', '2021-06-10 19:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `progress_bars`
--

CREATE TABLE `progress_bars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `progress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progress_bars`
--

INSERT INTO `progress_bars` (`id`, `title`, `progress`, `created_at`, `updated_at`) VALUES
(1, 'Treatment', '100', '2021-06-08 23:24:16', '2021-06-08 23:24:16'),
(2, 'Medicine', '70', '2021-06-08 23:24:35', '2021-06-08 23:24:35'),
(3, 'Care', '90', '2021-06-08 23:24:44', '2021-06-08 23:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sr_order` int(10) UNSIGNED DEFAULT NULL,
  `img_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_meta_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `title`, `slug`, `excerpt`, `description`, `icon`, `icon_type`, `sr_order`, `img_icon`, `image`, `status`, `meta_title`, `meta_description`, `meta_tags`, `og_meta_title`, `og_meta_description`, `og_meta_image`, `created_at`, `updated_at`) VALUES
(7, 1, 'Colon cancer', 'colon-cancer', 'There’s a voice that keeps on calling me. Down the road, that’s where', '<div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</div><div><br></div><div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.&nbsp;</div><div><br></div><div><img src=\"http://meadheal.test/assets/uploads/media-uploader/front-view-covid-vaccines-yellow-blue-background-pandemic-color-health-lab-covid-drug-virus-hospital-science-free-space-min1625226386.png\" style=\"width: 1521.81px;\"></div><div><br></div><div><div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</div><div><br></div><div>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!&nbsp;</div></div>', 'flaticon-drug', 'icon', 9, '46', '90', 'publish', 'Quasi voluptate dolo', 'Corrupti et non dol', 'Laudantium qui temp', 'Voluptas qui nisi er', 'Culpa harum consequa', NULL, '2021-07-02 15:56:36', '2021-07-02 15:57:26'),
(8, 1, 'Heart arrhythmia', 'heart-arrhythmia', 'There’s a voice that keeps on calling me. Down the road, that’s where', '<div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</div><div><br></div><div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.&nbsp;</div><div><br></div><div><img src=\"http://meadheal.test/assets/uploads/media-uploader/front-view-covid-vaccines-yellow-blue-background-pandemic-color-health-lab-covid-drug-virus-hospital-science-free-space-min1625226386.png\" style=\"width: 1521.81px;\"></div><div><br></div><div><div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</div><div><br></div><div>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!&nbsp;</div></div>', 'flaticon-medical-laboratory', 'icon', 8, '46', '91', 'publish', 'Quasi voluptate dolo', 'Corrupti et non dol', 'Laudantium qui temp', 'Voluptas qui nisi er', 'Culpa harum consequa', NULL, '2021-07-02 16:08:13', '2021-07-02 16:11:45'),
(9, 4, 'Lung transplant', 'lung-transplant', 'There’s a voice that keeps on calling me. Down the road, that’s where', '<div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</div><div><br></div><div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.&nbsp;</div><div><br></div><div><img src=\"http://meadheal.test/assets/uploads/media-uploader/front-view-covid-vaccines-yellow-blue-background-pandemic-color-health-lab-covid-drug-virus-hospital-science-free-space-min1625226386.png\" style=\"width: 1521.81px;\"></div><div><br></div><div><div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</div><div><br></div><div>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!&nbsp;</div></div>', 'flaticon-drug', 'icon', 7, '46', '93', 'publish', 'Quasi voluptate dolo', 'Corrupti et non dol', 'Laudantium qui temp', 'Voluptas qui nisi er', 'Culpa harum consequa', NULL, '2021-07-02 16:12:54', '2021-07-03 12:52:53'),
(10, 2, 'Dentist', 'dentist', 'There’s a voice that keeps on calling me. Down the road, that’s where', '<div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</div><div><br></div><div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.&nbsp;</div><div><br></div><div><img src=\"http://meadheal.test/assets/uploads/media-uploader/front-view-covid-vaccines-yellow-blue-background-pandemic-color-health-lab-covid-drug-virus-hospital-science-free-space-min1625226386.png\" style=\"width: 1521.81px;\"></div><div><br></div><div><div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</div><div><br></div><div>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!&nbsp;</div></div>', 'flaticon-dentist-date-for-personal-care', 'icon', 6, '46', '94', 'publish', 'Quasi voluptate dolo', 'Corrupti et non dol', 'Laudantium qui temp', 'Voluptas qui nisi er', 'Culpa harum consequa', NULL, '2021-07-02 16:17:14', '2021-07-03 12:53:02'),
(11, 3, 'Gastrology', 'gastrology', 'There’s a voice that keeps on calling me. Down the road, that’s where', '<div>There’s a voice that keeps on calling me. Down the road, that’s where I’ll always be. Every stop I make, I make a new friend. Can’t stay for long, just turn around and I’m gone again. Maybe tomorrow, I’ll want to settle down, Until tomorrow, I’ll just keep moving on.</div><div><br></div><div>Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</div><div><br></div><div>One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, it’s a pretty story. Sharing everything with fun, that’s the way to be. One for all and all for one, Muskehounds are always ready. One for all and all for one, helping everybody. One for all and all for one, can sound pretty corny. If you’ve got a problem chum, think how it could be.&nbsp;</div><div><br></div><div><img src=\"http://meadheal.test/assets/uploads/media-uploader/front-view-covid-vaccines-yellow-blue-background-pandemic-color-health-lab-covid-drug-virus-hospital-science-free-space-min1625226386.png\" style=\"width: 1521.81px;\"></div><div><br></div><div><div>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</div><div><br></div><div>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</div><div><br></div><div>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!&nbsp;</div></div>', 'flaticon-ear', 'icon', 5, '46', '96', 'publish', 'Quasi voluptate dolo', 'Corrupti et non dol', 'Laudantium qui temp', 'Voluptas qui nisi er', 'Culpa harum consequa', NULL, '2021-07-02 16:18:22', '2021-07-02 16:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `status`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Brain Aneurysm', 'publish', 'flaticon-test-1', '2021-06-07 12:55:37', '2021-06-07 12:58:17'),
(2, 'Colon Cancer', 'publish', 'flaticon-cancer', '2021-06-07 12:56:56', '2021-06-07 12:56:56'),
(3, 'Heart Arrhythmia', 'publish', 'flaticon-heart', '2021-06-07 12:57:17', '2021-06-07 12:57:17'),
(4, 'Lung Transplant', 'publish', 'flaticon-medicine-and-health-8', '2021-06-07 12:57:33', '2021-06-07 12:57:33'),
(5, 'Dentist Section', 'publish', 'flaticon-teeth', '2021-06-07 12:57:56', '2021-06-07 12:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE `social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`id`, `name`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(2, 'Youtube', 'fab fa-youtube', '#', '2021-05-09 11:19:54', '2022-02-08 07:49:16'),
(4, 'Instagram', 'fab fa-instagram', '#', '2021-05-09 11:20:49', '2022-02-08 07:49:22'),
(5, 'Twitter', 'flaticon-twitter', '#', '2022-01-26 10:22:23', '2022-02-08 07:49:28'),
(6, 'Facebook', 'fab fa-facebook-f', '#', '2022-01-26 10:32:25', '2022-02-08 07:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `static_options`
--

CREATE TABLE `static_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_options`
--

INSERT INTO `static_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(1, 'site_logo', '71', '2021-05-05 12:36:50', '2022-02-08 07:46:39'),
(2, 'site_favicon', '126', '2021-05-05 12:36:50', '2022-02-08 07:46:39'),
(3, 'site_white_logo', NULL, '2021-05-05 12:36:50', '2022-02-08 07:46:39'),
(4, 'site_breadcrumb_img', '124', '2021-05-05 12:36:50', '2022-02-08 07:46:39'),
(5, 'site_footer_img', NULL, '2021-05-05 12:36:51', '2022-02-08 07:46:40'),
(6, 'site_title', 'Rahulgandhidemo.com', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(7, 'site_tag_line', 'No.1 Ecommerce Platform', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(8, 'site_footer_copyright', '{copy} Copyright {year} . All Right Reserved By  Rahulgandhidemo.com', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(9, 'site_payment_gateway', 'on', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(10, 'disable_user_email_verify', 'on', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(11, 'site_maintenance_mode', NULL, '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(12, 'admin_loader_animation', 'on', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(13, 'site_loader_animation', NULL, '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(14, 'guest_order_system_status', 'on', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(15, 'site_main_color_one', '#e92858', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(16, 'site_main_color_two', '#8dbf4c', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(17, 'site_secondary_color', '#1d2f3c', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(18, 'site_heading_color', '#2d3663', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(19, 'site_paragraph_color', '#54545a', '2021-05-05 13:18:10', '2022-02-08 08:28:54'),
(20, 'site_meta_tags', 'Hemp Products', '2021-05-05 13:38:18', '2022-02-08 07:48:06'),
(21, 'site_meta_description', '#', '2021-05-05 13:38:18', '2022-02-08 07:48:06'),
(22, 'og_meta_title', '#', '2021-05-05 13:38:18', '2022-02-08 07:48:06'),
(23, 'og_meta_description', '#', '2021-05-05 13:38:19', '2022-02-08 07:48:06'),
(24, 'og_meta_site_name', '#', '2021-05-05 13:38:19', '2022-02-08 07:48:07'),
(25, 'og_meta_url', '#', '2021-05-05 13:38:19', '2022-02-08 07:48:07'),
(26, 'og_meta_image', NULL, '2021-05-05 13:38:19', '2022-02-08 07:48:07'),
(27, 'site_disqus_key', 'buxkit', '2021-05-05 13:39:24', '2021-06-09 01:17:38'),
(28, 'site_google_analytics', 'UA-155343796-1', '2021-05-05 13:39:24', '2021-06-09 01:17:38'),
(29, 'tawk_api_key', '<!--Start of Tawk.to Script-->\r\n<script type=\"text/javascript\">\r\n    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\r\n    (function(){\r\n        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\r\n        s1.async=true;\r\n        s1.src=\"https://embed.tawk.to/5e0b3e167e39ea1242a27b69/default\";\r\n        s1.charset=\'UTF-8\';\r\n        s1.setAttribute(\'crossorigin\',\'*\');\r\n        s0.parentNode.insertBefore(s1,s0);\r\n    })();\r\n</script>\r\n<!--End of Tawk.to Script-->', '2021-05-05 13:39:24', '2021-06-09 01:17:38'),
(30, 'site_third_party_tracking_code', NULL, '2021-05-05 13:39:24', '2021-06-09 01:17:39'),
(31, 'site_global_email', 'info@hempbuti.in', '2021-05-05 13:54:31', '2021-12-17 07:06:15'),
(32, 'site_global_email_template', '<p>Hello</p><p>Dear @username</p><p><br></p><p>@message</p><p><br></p><p>Regards</p><p>@company</p>', '2021-05-05 13:54:31', '2021-12-17 07:06:15'),
(33, 'contact_mail_success_message', 'Thanks for your contact!', '2021-05-05 14:13:47', '2021-05-05 14:14:28'),
(34, 'order_mail_success_message', 'Thanks for your order. we will contact you soon.', '2021-05-05 14:14:25', '2021-05-05 14:14:28'),
(35, 'site_smtp_mail_mailer', 'smtp', '2021-05-05 14:17:24', '2021-05-05 14:17:24'),
(36, 'site_smtp_mail_host', 'smtp.example.com', '2021-05-05 14:17:24', '2021-05-05 14:17:24'),
(37, 'site_smtp_mail_port', '587', '2021-05-05 14:17:24', '2021-05-05 14:17:24'),
(38, 'site_smtp_mail_username', 'super_admin', '2021-05-05 14:17:25', '2021-05-05 14:17:25'),
(39, 'site_smtp_mail_password', '12345678', '2021-05-05 14:17:25', '2021-05-05 14:17:25'),
(40, 'site_smtp_mail_encryption', 'ssl', '2021-05-05 14:17:25', '2021-05-05 14:17:25'),
(41, 'site_gdpr_cookie_title', 'Cookies & Privacy', '2021-05-05 15:16:53', '2022-01-27 08:39:24'),
(42, 'site_gdpr_cookie_message', 'Is education residence conveying so so. Suppose shyness say ten behaved morning had. Any unsatiable assistance compliment occasional too reasonably advantages.', '2021-05-05 15:16:53', '2022-01-27 08:39:24'),
(43, 'site_gdpr_cookie_more_info_label', 'More information', '2021-05-05 15:16:53', '2022-01-27 08:39:24'),
(44, 'site_gdpr_cookie_more_info_link', '{url}/p/privacy-policy', '2021-05-05 15:16:53', '2022-01-27 08:39:24'),
(45, 'site_gdpr_cookie_accept_button_label', 'Accept Cookie', '2021-05-05 15:16:53', '2022-01-27 08:39:24'),
(46, 'site_gdpr_cookie_decline_button_label', 'Decline Cookie', '2021-05-05 15:16:53', '2022-01-27 08:39:24'),
(47, 'site_gdpr_cookie_expire', '30', '2021-05-05 15:16:54', '2022-01-27 08:39:24'),
(48, 'site_gdpr_cookie_delay', '5000', '2021-05-05 15:16:54', '2022-01-27 08:39:24'),
(49, 'site_gdpr_cookie_enabled', 'on', '2021-05-05 15:18:01', '2021-05-05 15:18:19'),
(50, 'popup_enable_status', NULL, '2021-05-05 15:23:38', '2021-12-17 07:02:53'),
(51, 'popup_delay_time', '15000', '2021-05-05 15:23:38', '2021-12-17 07:02:54'),
(52, 'popup_selected_id', '1', '2021-05-05 15:23:38', '2021-12-17 07:02:54'),
(53, 'item_purchase_key', 'b81b3614-79e8-4db9-93eb-8797f39b2e01', '2021-05-05 15:32:25', '2021-12-17 05:58:04'),
(54, 'item_license_status', 'verified', '2021-05-05 15:32:25', '2021-12-17 05:58:04'),
(55, 'item_license_msg', 'your licensed has been activated.', '2021-05-05 15:32:25', '2021-12-17 05:58:04'),
(56, 'admin_panel_rtl_status', NULL, '2021-05-05 16:03:03', '2022-02-08 08:28:54'),
(57, 'home_page_variant', '04', NULL, '2022-01-26 10:10:15'),
(59, 'topbar_btn_txt', 'Make an appointment', '2021-05-09 12:27:58', '2021-05-09 14:53:27'),
(60, 'topbar_btn_url', 'https://xgenious.com/', '2021-05-09 12:27:58', '2021-05-09 14:53:27'),
(61, 'topbar_btn_icon', 'fas fa-long-arrow-alt-right', '2021-05-09 12:27:58', '2021-05-09 14:53:27'),
(62, 'topbar_btn_open_external', 'on', '2021-05-09 12:27:58', '2021-05-09 14:53:27'),
(63, 'topbar_variant_home_01', '02', '2021-05-09 14:57:20', '2021-06-30 22:07:08'),
(64, 'topbar_variant_home_02', '02', '2021-05-09 15:06:09', '2021-05-09 15:11:01'),
(65, 'topbar_variant_home_03', '01', '2021-05-09 15:11:13', '2021-12-17 08:21:03'),
(66, 'topbar_variant_home_04', '02', '2021-05-09 15:11:25', '2021-06-27 14:38:19'),
(67, 'header_slider_home_02_static_title', 'We\'re Here Care for your ealth & satisfaction', '2021-05-31 16:04:09', '2021-05-31 18:55:04'),
(68, 'header_slider_home_02_static_details', 'With occupancy rates at near capacity and an increasing number of complex patients, our existing facilities are being enhanced', '2021-05-31 16:04:09', '2021-05-31 18:55:04'),
(69, 'header_slider_home_02_static_image', '10', '2021-05-31 16:04:09', '2021-05-31 18:55:04'),
(70, 'header_slider_home_03_static_title', 'MEDICAL', '2021-05-31 16:07:35', '2021-05-31 19:09:29'),
(71, 'header_slider_home_03_static_subtitle', 'Quality collection of unlimited', '2021-05-31 16:07:35', '2021-05-31 19:09:29'),
(72, 'header_slider_home_03_static_details', 'PRODUCTS & KITS', '2021-05-31 16:07:35', '2021-05-31 19:09:29'),
(73, 'header_slider_home_03_static_btn_title', 'GET STARTED', '2021-05-31 16:07:35', '2021-05-31 19:09:29'),
(74, 'header_slider_home_03_static_btn_url', '#', '2021-05-31 16:07:35', '2021-05-31 19:09:29'),
(75, 'header_slider_home_03_static_btn_status', 'on', '2021-05-31 16:07:35', '2021-05-31 19:09:30'),
(76, 'header_slider_home_03_static_image', '11', '2021-05-31 16:07:35', '2021-05-31 19:09:29'),
(77, 'header_slider_home_03_static_right_section_text', 'FROM', '2021-05-31 16:07:35', '2021-05-31 19:09:29'),
(78, 'header_slider_home_03_static_right_section_sign', '$', '2021-05-31 16:07:35', '2021-05-31 19:09:30'),
(79, 'header_slider_home_03_static_right_section_price', '30', '2021-05-31 16:07:35', '2021-05-31 19:09:30'),
(80, 'header_slider_home_03_static_right_section_image', '13', '2021-05-31 16:07:35', '2021-05-31 19:09:30'),
(81, 'header_slider_home_03_static_right_section_status', 'on', '2021-05-31 16:07:35', '2021-05-31 19:09:30'),
(82, 'header_slider_home_04_static_title', 'India\'s Most Trusted Online CBD & Hemp Store', '2021-05-31 18:49:23', '2022-01-29 07:33:41'),
(83, 'header_slider_home_04_static_subtitle', 'Buy CBD Oil, Hemp Products, Medical Cannabis & Pets CBD', '2021-05-31 18:49:23', '2022-01-29 07:33:41'),
(84, 'header_slider_home_04_static_btn_title', 'BUY HEMP PRODUTS ONLINE', '2021-05-31 18:49:23', '2022-01-29 07:33:41'),
(85, 'header_slider_home_04_static_btn_url', '/product', '2021-05-31 18:49:23', '2022-01-29 07:33:41'),
(86, 'header_slider_home_04_static_btn_status', 'on', '2021-05-31 18:49:23', '2022-01-29 07:33:42'),
(87, 'header_slider_home_04_static_image', '12', '2021-05-31 18:49:23', '2022-01-29 07:33:41'),
(88, 'header_slider_home_04_static_right_section_text', 'FROM', '2021-05-31 18:49:23', '2022-01-29 07:33:41'),
(89, 'header_slider_home_04_static_right_section_sign', 'RS', '2021-05-31 18:49:23', '2022-01-29 07:33:41'),
(90, 'header_slider_home_04_static_right_section_price', '899', '2021-05-31 18:49:24', '2022-01-29 07:33:41'),
(91, 'header_slider_home_04_static_right_section_image', '123', '2021-05-31 18:49:24', '2022-01-29 07:33:42'),
(92, 'header_slider_home_04_static_right_section_status', 'on', '2021-05-31 18:49:24', '2022-01-29 07:33:43'),
(93, 'header_slider_home_02_static_btn_status', NULL, '2021-05-31 18:55:04', '2021-05-31 18:55:04'),
(94, 'header_slider_home_02_static_right_section_status', NULL, '2021-05-31 18:55:04', '2021-05-31 18:55:04'),
(95, 'home_page_medical_care_section_info_title', 'Welcome To Medheal Care', '2021-06-01 20:07:41', '2021-06-29 20:14:34'),
(96, 'home_page_medical_care_section_info_details', 'With occupancy rates at near capacity and an increasing number of complex patients, our existing facilities.', '2021-06-01 20:07:41', '2021-06-29 20:14:34'),
(97, 'home_page_medical_care_section_opening_hour_title', 'Opening Hours', '2021-06-01 20:07:41', '2021-06-29 20:14:34'),
(98, 'home_page_medical_care_section_appointment_title', 'Get Appointments', '2021-06-01 20:07:41', '2021-06-29 20:14:34'),
(99, 'home_page_medical_care_section_opening_bg', '19', '2021-06-01 20:24:45', '2021-06-29 20:14:34'),
(100, 'home_page_medical_care_section_appointment_bg', '18', '2021-06-01 20:24:45', '2021-06-29 20:14:34'),
(101, 'home_page_testimonial_section_title', 'What Our Customers Are Saying', '2021-06-02 12:02:43', '2022-01-13 01:05:29'),
(102, 'home_page_testimonial_section_home_01_display_items', '4', '2021-06-02 12:02:43', '2021-06-02 12:02:43'),
(103, 'home_page_testimonial_section_bg_var1', '24', '2021-06-02 12:02:43', '2022-01-13 01:05:29'),
(104, 'home_page_testimonial_section_home_02_display_items', '2', '2021-06-02 12:03:34', '2021-07-02 19:41:37'),
(105, 'home_page_testimonial_section_bg_var2', '56', '2021-06-02 12:03:34', '2021-07-02 19:41:37'),
(106, 'home_page_testimonial_section_home_03_display_items', '4', '2021-06-02 12:09:53', '2021-12-19 21:59:38'),
(107, 'home_page_testimonial_section_home_04_display_items', '4', '2021-06-02 12:12:56', '2022-01-13 01:05:29'),
(108, 'home_page_concern_section_title', 'Your Health is Our Concern', '2021-06-02 17:26:15', '2021-06-08 22:25:31'),
(109, 'home_page_concern_section_description', 'With occupancy rates at near capacity and an increasing number of complex patients, our existing facilities are being enhanced and new facilities created to meet .', '2021-06-02 17:26:15', '2021-06-08 22:25:31'),
(110, 'home_page_concern_section_name', 'Roger Health', '2021-06-02 17:26:16', '2021-06-08 22:25:31'),
(111, 'home_page_concern_section_designation', 'CEO, Founder', '2021-06-02 17:26:16', '2021-06-08 22:25:31'),
(112, 'home_page_testimonial_section_01_img', '26', '2021-06-02 17:26:16', '2021-06-08 22:25:24'),
(113, 'home_page_testimonial_section_01_bg_img', '27', '2021-06-02 17:26:16', '2021-06-08 22:25:24'),
(114, 'home_page_testimonial_section_01_sign_img', '28', '2021-06-02 17:33:52', '2021-06-08 22:25:24'),
(115, 'home_page_testimonial_section_02_img', '30', '2021-06-02 17:34:56', '2021-06-08 22:25:31'),
(116, 'home_page_testimonial_section_02_bg_img', '29', '2021-06-02 17:34:56', '2021-06-08 22:25:31'),
(117, 'home_page_testimonial_section_02_sign_img', '28', '2021-06-02 17:34:56', '2021-06-08 22:25:31'),
(118, 'home_page_concern_section_vdo_btn_url', 'https://www.youtube.com/watch?v=pgk4rDIegsE', '2021-06-02 18:31:30', '2021-06-08 22:25:31'),
(119, 'home_page_concern_section_vdo_btn_status', 'on', '2021-06-02 18:31:30', '2021-06-08 22:25:31'),
(120, 'home_page_concern_section_vdo_btn_icon', 'fas fa-play', '2021-06-02 18:31:30', '2021-06-08 22:25:31'),
(121, 'site_image_gallery_post_items', '8', '2021-06-05 15:17:33', '2021-06-09 12:11:01'),
(122, 'site_image_gallery_title', 'Our Service Gallery', '2021-06-05 15:17:33', '2021-06-09 12:11:02'),
(123, 'site_image_gallery_description', 'With occupancy rates at near capacity and an increasing number of complex patients, our existing facilities are being enhanced and new facilities created to meet today’s needs.', '2021-06-05 15:17:33', '2021-06-09 12:11:02'),
(124, 'site_image_gallery_bg_img', '44', '2021-06-05 15:17:33', '2021-06-09 12:11:02'),
(125, 'blog_page_item', '4', '2021-06-06 10:25:34', '2021-12-17 07:33:29'),
(126, 'blog_page_recent_post_widget_item', '4', '2021-06-06 10:25:35', '2021-06-22 01:03:30'),
(127, 'blog_page_title', 'Blog', '2021-06-06 10:25:35', '2021-06-22 01:03:30'),
(128, 'blog_page_category_widget_title', 'Category', '2021-06-06 10:25:35', '2021-06-22 01:03:30'),
(129, 'blog_page_recent_post_widget_title', 'Recent Post', '2021-06-06 10:25:35', '2021-06-22 01:03:30'),
(130, 'home_page_latest_blog_section_title', 'Explore CBD News & Articles', '2021-06-06 10:40:20', '2022-01-13 07:02:59'),
(131, 'home_page_latest_blog_section_subtitle', NULL, '2021-06-06 10:40:20', '2021-06-06 10:40:20'),
(132, 'home_page_latest_blog_section_display_item', '3', '2021-06-06 10:40:20', '2022-01-13 07:02:59'),
(133, 'home_page_latest_blog_section_description', NULL, '2021-06-06 10:43:40', '2022-01-13 07:02:59'),
(134, 'service_page_service_items', '8', '2021-06-07 14:51:37', '2021-06-22 01:00:04'),
(135, 'service_page_banner', NULL, '2021-06-07 15:09:17', '2021-06-07 15:09:17'),
(136, 'service_page_category_item', '8', '2021-06-07 15:15:21', '2021-06-07 15:20:31'),
(137, 'service_page_support_title', 'CALL FOR ANY HELP', '2021-06-07 15:15:21', '2021-06-07 15:20:31'),
(138, 'service_page_support_details', '+91 458 654 528', '2021-06-07 15:15:21', '2021-06-07 15:20:31'),
(139, 'service_page_support_icon', 'flaticon-call', '2021-06-07 15:15:21', '2021-06-07 15:20:31'),
(140, 'service_page_support_bg', '48', '2021-06-07 15:15:21', '2021-06-07 15:20:31'),
(141, 'service_page_appointment_title', 'Make An Appointment', '2021-06-07 15:15:21', '2021-06-07 15:20:31'),
(142, 'service_page_appointment_bg', '49', '2021-06-07 15:15:21', '2021-06-07 15:20:31'),
(143, 'service_page_decription', 'Treacherously far so late have immense condescending best logistic service the market all over the world logistic service .', '2021-06-07 15:29:21', '2021-06-22 01:00:03'),
(144, 'service_page_title', 'We Offer Top Medical Services', '2021-06-07 15:29:22', '2021-06-22 01:00:04'),
(145, 'home_page_what_we_do_section_title', 'Find What We Do', '2021-06-07 17:35:39', '2021-06-29 18:39:58'),
(146, 'home_page_what_we_do_section_description', 'Treacherously far so late have immense condescending best logistic service the market all over the world logistic service .', '2021-06-07 17:35:39', '2021-06-29 18:39:58'),
(147, 'home_page_what_we_do_section_display_item', '4', '2021-06-07 17:35:39', '2021-06-07 17:38:49'),
(148, 'home_page_what_we_do_section_display_item_home_02', '3', '2021-06-07 17:48:15', '2021-06-29 18:39:59'),
(149, 'home_page_what_we_do_section_display_item_home_01', '4', '2021-06-07 17:49:06', '2021-06-07 17:49:06'),
(150, 'home_page_expert_section_title', 'Our Highly Specialized Experts Are Deeply Experienced', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(151, 'home_page_expert_section_bg', '50', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(152, 'home_page_expert_section_support_title', 'Call to us', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(153, 'home_page_expert_section_support_details', '+91 458 654 528', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(154, 'home_page_expert_section_support_icon', 'flaticon-call', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(155, 'home_page_expert_section_title_1', 'Donate Blood', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(156, 'home_page_expert_section_bg_1', '51', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(157, 'home_page_expert_section_support_icon_1', 'flaticon-blood-type-ab', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(158, 'home_page_expert_section_title_2', 'Join as Volunteer', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(159, 'home_page_expert_section_bg_2', '52', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(160, 'home_page_expert_section_support_icon_2', 'flaticon-heart-1', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(161, 'home_page_expert_section_icon', 'flaticon-health-2', '2021-06-07 19:55:15', '2021-06-07 19:57:03'),
(162, 'home_page_call_to_us_section_title', 'Get advice on which product is suitable for you and what dose you need to take', '2021-06-07 21:34:46', '2022-01-14 01:19:53'),
(163, 'home_page_call_to_us_section_support_title', 'Book Consultation', '2021-06-07 21:34:46', '2022-01-14 01:19:53'),
(164, 'home_page_call_to_us_section_support_details', '+919920432043', '2021-06-07 21:34:46', '2022-01-14 01:19:53'),
(165, 'home_page_call_to_us_section_support_icon', 'flaticon-call', '2021-06-07 21:34:46', '2022-01-14 01:19:54'),
(166, 'home_page_special_offer_section_title', 'Special offer', '2021-06-08 15:28:35', '2021-07-04 08:33:03'),
(167, 'home_page_special_offer_section_details', 'Face Mask With Nose Pin', '2021-06-08 15:28:35', '2021-07-04 08:33:03'),
(168, 'home_page_special_offer_section_offer_end_date', '2021-11-17', '2021-06-08 15:28:35', '2021-07-04 08:33:03'),
(169, 'home_page_special_offer_section_bg', '53', '2021-06-08 15:28:35', '2021-07-04 08:33:03'),
(170, 'home_page_special_offer_section_btn_status', 'on', '2021-06-08 15:28:35', '2021-07-04 08:33:04'),
(171, 'home_page_special_offer_section_btn_txt', 'ALL PRODUCTS', '2021-06-08 15:28:35', '2021-07-04 08:33:04'),
(172, 'home_page_special_offer_section_btn_url', '#', '2021-06-08 15:28:35', '2021-07-04 08:33:04'),
(173, 'home_page_special_offer_section_bg_right', '54', '2021-06-08 16:22:10', '2021-06-20 21:01:08'),
(174, 'home_page_special_offer_section_btn_status_right', 'on', '2021-06-08 16:22:10', '2021-06-20 21:01:08'),
(175, 'home_page_special_offer_section_btn_txt_right', 'ALL PRODUCTS', '2021-06-08 16:22:10', '2021-06-20 21:01:08'),
(176, 'home_page_special_offer_section_btn_url_right', '#', '2021-06-08 16:22:10', '2021-06-20 21:01:08'),
(177, 'home_page_special_offer_section_bg_2', '55', '2021-06-08 21:04:52', '2021-06-20 21:01:08'),
(178, 'home_page_special_offer_section_title_right', 'Save 30%', '2021-06-08 21:14:33', '2021-06-20 21:01:08'),
(179, 'home_page_special_offer_section_details_right', 'On all covid19 medicine', '2021-06-08 21:14:33', '2021-06-20 21:01:08'),
(180, 'about_page_concern_section_title', 'A Global Leader In The Treatment Of Quality.', '2021-06-08 22:22:28', '2022-01-26 09:49:09'),
(181, 'about_page_concern_section_description', 'With occupancy rates at near capacity and an increasing number of complex patients, our existing facilities are being enhanced and new facilities created to meet .', '2021-06-08 22:22:28', '2022-01-26 09:49:09'),
(182, 'about_page_concern_section_name', 'PALLAVI CHOUKSE & RAHUL GANDHI', '2021-06-08 22:22:28', '2022-01-26 09:49:10'),
(183, 'about_page_concern_section_designation', 'CEO, Founder', '2021-06-08 22:22:28', '2022-01-26 09:49:10'),
(184, 'about_page_concern_section_vdo_btn_url', 'https://www.youtube.com/watch?v=-ZwQtICNbRc', '2021-06-08 22:22:28', '2022-01-26 09:49:10'),
(185, 'about_page_concern_section_vdo_btn_status', NULL, '2021-06-08 22:22:29', '2022-01-26 09:49:11'),
(186, 'about_page_concern_section_vdo_btn_icon', 'fas fa-play', '2021-06-08 22:22:29', '2022-01-26 09:49:11'),
(187, 'about_page_testimonial_section_img', '30', '2021-06-08 22:22:29', '2022-01-26 09:49:12'),
(188, 'about_page_testimonial_section_bg_img', '29', '2021-06-08 22:22:29', '2022-01-26 09:49:12'),
(189, 'about_page_testimonial_section_sign_img', '28', '2021-06-08 22:22:29', '2022-01-26 09:49:12'),
(190, 'about_page_progressbar_section_title', 'Your Health Is Our Concern', '2021-06-08 23:23:42', '2021-06-08 23:30:00'),
(191, 'about_page_progressbar_section_description', 'With occupancy rates at near capacity and an increasing number of complex patients, our existing facilities are being enhanced and new facilities created to meet.', '2021-06-08 23:23:42', '2021-06-08 23:30:00'),
(192, 'about_page_progressbar_section_bg', '56', '2021-06-08 23:23:42', '2021-06-08 23:30:00'),
(193, 'contact_page_map_section_location', 'Laxmi Pharma, GM Road, Patna, Bihar', '2021-06-09 00:52:26', '2022-01-26 03:36:45'),
(194, 'contact_page_map_section_zoom', '10', '2021-06-09 00:52:26', '2022-01-26 03:36:48'),
(195, 'home_page_contact_us_section_title', 'We Are Available 24/7 For Your Support', '2021-06-09 00:52:26', '2022-01-26 03:36:50'),
(196, 'home_page_contact_us_section_contact', '+91 99 2043 2043 (Patna) \r\n+91 82 6991 1489 (Bhopal)', '2021-06-09 00:52:26', '2022-01-26 03:36:50'),
(197, 'home_page_contact_us_section_email', 'Care@hempbuti.in', '2021-06-09 00:52:26', '2022-01-26 03:36:50'),
(198, 'home_page_contact_us_section_address', 'M/s Lakshmi Pharma, Unit 1 & 2, \r\nJai Market, Govind Mitra Road,\r\nPatna – 800001', '2021-06-09 00:52:26', '2022-01-26 03:36:50'),
(199, 'contact_page_contact_form_fields', '{\"field_type\":[\"text\",\"email\",\"tel\",\"textarea\"],\"field_name\":[\"name\",\"email\",\"phone\",\"message\"],\"field_placeholder\":[\"Name\",\"E-mail\",\"Phone\",\"Message\"],\"field_required\":[\"on\",\"on\"]}', '2021-06-09 01:02:10', '2021-07-01 21:24:39'),
(200, 'contact_page_map_section_status', 'on', '2021-06-09 01:08:46', '2021-06-17 13:39:52'),
(201, 'contact_page_contact_section_status', 'on', '2021-06-09 01:08:46', '2021-06-17 13:39:52'),
(202, 'site_google_captcha_v3_site_key', '6LdvUeQUAAAAAHKM02AWBjtKAAL0-AqUk_qkqa0O', '2021-06-09 01:17:39', '2021-06-09 01:17:39'),
(203, 'site_google_captcha_v3_secret_key', '6LdvUeQUAAAAABaCkkQbMY-z2XaqYsLSWwYgB6Ru', '2021-06-09 01:17:39', '2021-06-09 01:17:39'),
(204, 'site_google_captcha_enable', NULL, '2021-06-09 01:20:14', '2022-02-08 08:28:54'),
(205, 'about_page_slug', 'about-us', '2021-06-09 11:50:40', '2021-12-17 07:13:49'),
(206, 'contact_page_slug', 'contact-us', '2021-06-09 11:50:41', '2021-12-17 07:13:49'),
(207, 'blog_page_slug', 'blog', '2021-06-09 11:50:42', '2021-12-17 07:13:49'),
(208, 'price_plan_page_slug', '', '2021-06-09 11:50:42', '2021-06-21 11:36:18'),
(209, 'service_page_slug', 'service', '2021-06-09 11:50:42', '2021-12-17 07:13:49'),
(210, 'product_page_slug', 'product', '2021-06-09 11:50:42', '2021-12-17 07:13:49'),
(211, 'appointment_page_slug', 'doctor', '2021-06-09 11:50:42', '2021-12-17 07:13:49'),
(212, 'about_page_name', 'About', '2021-06-09 11:50:42', '2021-12-17 07:13:49'),
(213, 'about_page_meta_tags', 'about-us', '2021-06-09 11:50:42', '2021-06-21 11:36:18'),
(214, 'about_page_meta_description', NULL, '2021-06-09 11:50:42', '2021-12-17 07:13:49'),
(215, 'contact_page_name', 'Contact', '2021-06-09 11:50:42', '2021-12-17 07:13:50'),
(216, 'contact_page_meta_tags', 'contact-us', '2021-06-09 11:50:42', '2021-06-21 11:36:18'),
(217, 'contact_page_meta_description', NULL, '2021-06-09 11:50:42', '2021-12-17 07:13:50'),
(218, 'blog_page_name', 'Blog', '2021-06-09 11:50:42', '2021-12-17 07:13:50'),
(219, 'blog_page_meta_tags', 'blogs', '2021-06-09 11:50:42', '2021-06-21 11:36:18'),
(220, 'blog_page_meta_description', NULL, '2021-06-09 11:50:42', '2021-12-17 07:13:50'),
(221, 'price_plan_page_name', NULL, '2021-06-09 11:50:42', '2021-06-21 11:36:18'),
(222, 'price_plan_page_meta_tags', NULL, '2021-06-09 11:50:42', '2021-06-21 11:36:18'),
(223, 'price_plan_page_meta_description', NULL, '2021-06-09 11:50:42', '2021-06-21 11:36:18'),
(224, 'service_page_name', 'Service', '2021-06-09 11:50:42', '2021-12-17 07:13:50'),
(225, 'service_page_meta_tags', 'service-page', '2021-06-09 11:50:42', '2021-06-21 11:36:19'),
(226, 'service_page_meta_description', NULL, '2021-06-09 11:50:42', '2021-12-17 07:13:50'),
(227, 'product_page_name', 'Product', '2021-06-09 11:50:43', '2021-12-17 07:13:50'),
(228, 'product_page_meta_tags', 'products', '2021-06-09 11:50:43', '2021-06-21 11:36:19'),
(229, 'product_page_meta_description', NULL, '2021-06-09 11:50:43', '2021-12-17 07:13:50'),
(230, 'appointment_page_name', 'Doctors', '2021-06-09 11:50:43', '2021-12-17 07:13:50'),
(231, 'appointment_page_meta_tags', NULL, '2021-06-09 11:50:43', '2021-06-21 11:36:19'),
(232, 'appointment_page_meta_description', NULL, '2021-06-09 11:50:43', '2021-12-17 07:13:50'),
(233, 'site_admin_dark_mode', 'off', NULL, '2022-01-11 22:31:47'),
(234, 'product_add_to_cart_button_en_GB_text', NULL, '2021-06-10 19:47:26', '2021-06-10 19:47:26'),
(235, 'product_category_en_GB_text', NULL, '2021-06-10 19:47:26', '2021-06-10 19:47:26'),
(236, 'product_price_filter_en_GB_text', NULL, '2021-06-10 19:47:26', '2021-06-10 19:47:26'),
(237, 'product_rating_filter_en_GB_text', NULL, '2021-06-10 19:47:26', '2021-06-10 19:47:26'),
(238, 'product_post_items', '6', '2021-06-10 19:47:26', '2021-06-10 19:50:57'),
(239, 'product_add_to_cart_button_text', 'Add To Cart', '2021-06-10 19:50:57', '2021-06-10 19:50:57'),
(240, 'product_category_text', 'Category', '2021-06-10 19:50:57', '2021-06-10 19:50:57'),
(241, 'product_rating_filter_text', 'Rating Filter', '2021-06-10 19:50:57', '2021-06-10 19:50:57'),
(242, 'product_price_filter_text', 'Price Filter', '2021-06-10 19:50:57', '2021-06-10 19:50:57'),
(243, 'product_single_add_to_cart_text', 'Add To Cart', '2021-06-10 19:55:11', '2021-06-14 18:04:57'),
(244, 'product_single_category_text', 'Category:', '2021-06-10 19:55:11', '2021-06-14 18:04:57'),
(245, 'product_single_sku_text', 'SKU:', '2021-06-10 19:55:11', '2021-06-14 18:04:57'),
(246, 'product_single_description_text', 'Description', '2021-06-10 19:55:11', '2021-06-14 18:04:57'),
(247, 'product_single_attributes_text', 'Additional Information', '2021-06-10 19:55:11', '2021-06-14 18:04:58'),
(248, 'product_single_related_product_text', 'Related Products', '2021-06-10 19:55:11', '2021-06-14 18:04:58'),
(249, 'product_single_ratings_text', 'Ratings', '2021-06-10 19:55:12', '2021-06-14 18:04:58'),
(250, 'product_single_products_review_status', 'on', '2021-06-10 19:55:12', '2021-06-14 18:04:58'),
(251, 'product_single_related_products_status', 'on', '2021-06-10 19:55:56', '2021-06-14 18:04:58'),
(252, 'product_success_page_title', 'Thank you for placing your order @ Hempbuti.in', '2021-06-10 19:59:49', '2022-01-11 05:08:30'),
(253, 'product_success_page_description', NULL, '2021-06-10 19:59:49', '2022-01-11 05:08:30'),
(254, 'product_cancel_page_title', 'Your Payment  is Not Sucessful', '2021-06-10 20:02:33', '2022-01-11 05:07:31'),
(255, 'product_cancel_page_description', NULL, '2021-06-10 20:02:33', '2022-01-11 05:07:32'),
(256, 'product_tax', 'on', '2021-06-10 20:57:13', '2021-06-12 17:44:54'),
(257, 'product_tax_system', 'exclusive', '2021-06-10 20:57:13', '2021-06-12 17:44:54'),
(258, 'product_tax_type', 'individual', '2021-06-10 20:57:13', '2021-06-12 17:44:54'),
(259, 'product_tax_percentage', '15', '2021-06-10 20:57:13', '2021-06-12 17:44:54'),
(260, 'home_page_product_category_section_title', 'Products By Category', '2021-06-11 13:15:00', '2021-07-03 12:30:33'),
(261, 'home_page_product_category_section_display_item_home_03', '8', '2021-06-11 13:31:08', '2021-06-11 13:49:46'),
(262, 'home_page_popular_product_section_title', 'Popular Products', '2021-06-11 20:10:13', '2022-01-13 00:15:38'),
(263, 'home_page_popular_product_section_display_item_home_03', '8', '2021-06-11 20:10:13', '2021-06-11 20:10:13'),
(264, 'home_page_featured_product_section_title', 'Featured Products', '2021-06-12 11:07:29', '2022-01-13 00:12:09'),
(265, 'home_page_featured_product_section_display_item_home_04', '4', '2021-06-12 11:07:29', '2022-01-13 00:12:09'),
(266, 'home_page_best_seller_product_section_title', 'Shop Best Sellers', '2021-06-12 11:11:07', '2022-01-13 00:15:28'),
(267, 'home_page_best_seller_product_section_display_item_home_04', '4', '2021-06-12 11:11:07', '2022-01-13 00:15:28'),
(268, 'cash_on_delivery_preview_logo', '74', '2021-06-12 23:06:19', '2022-01-27 08:57:19'),
(269, 'stripe_preview_logo', '72', '2021-06-12 23:06:20', '2022-01-27 08:57:19'),
(270, 'paystack_preview_logo', '69', '2021-06-12 23:06:20', '2022-01-27 08:57:19'),
(271, 'paystack_public_key', 'pk_test_081a8fcd9423dede2de7b4c3143375b5e5415290', '2021-06-12 23:06:20', '2022-01-27 08:57:19'),
(272, 'paystack_secret_key', 'sk_test_9bd5e9ecd2657e4ee9f22e60a3749a70f6364eb5', '2021-06-12 23:06:20', '2022-01-27 08:57:19'),
(273, 'paystack_merchant_email', 'dvrobin4@gmail.com', '2021-06-12 23:06:20', '2022-01-27 08:57:19'),
(274, 'razorpay_preview_logo', '71', '2021-06-12 23:06:20', '2022-01-27 08:57:19'),
(275, 'paypal_preview_logo', '68', '2021-06-12 23:06:21', '2022-01-27 08:57:19'),
(276, 'paypal_app_client_id', 'ATx-SYQyPtXHw1bZaBDhJUZabxbutIqAqqZORgvgEoK_-9MrAkUzYkbt8pSnUyKNEdNN3aJt8tcpcY1I', '2021-06-12 23:06:21', '2022-01-27 08:57:20'),
(277, 'paypal_app_secret', 'ELJCWPUabUnnMamfw5-ZxaUsvir3KAJrPnAcSeS11znsroi45HP0p7y7vGZcYsBsAAi7Ou6kelCpj69K', '2021-06-12 23:06:21', '2022-01-27 08:57:20'),
(278, 'paytm_preview_logo', '70', '2021-06-12 23:06:21', '2022-01-27 08:57:20'),
(279, 'paytm_merchant_key', '31Q9BhP79JVip77', '2021-06-12 23:06:21', '2022-01-27 08:57:20'),
(280, 'paytm_merchant_mid', 'Websit5239737375544', '2021-06-12 23:06:21', '2022-01-27 08:57:20'),
(281, 'paytm_merchant_website', 'WEBSTAGING', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(282, 'site_global_currency', 'INR', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(283, 'manual_payment_preview_logo', '75', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(284, 'site_manual_payment_name', 'Manual Payment', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(285, 'site_manual_payment_description', '<br>', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(286, 'razorpay_key', 'rzp_test_SXk7LZqsBPpAkj', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(287, 'razorpay_secret', 'Nenvq0aYArtYBDOGgmMH7JNv', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(288, 'stripe_publishable_key', 'pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(289, 'stripe_secret_key', 'sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(290, 'site_global_payment_gateway', NULL, '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(291, 'site_usd_to_ngn_exchange_rate', '380.50', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(292, 'site_euro_to_ngn_exchange_rate', NULL, '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(293, 'mollie_public_key', 'test_SMWtwR6W48QN2UwFQBUqRDKWhaQEvw', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(294, 'mollie_preview_logo', '67', '2021-06-12 23:06:21', '2022-01-27 08:57:21'),
(295, 'flutterwave_preview_logo', '66', '2021-06-12 23:06:21', '2022-01-27 08:57:22'),
(296, 'flutterwave_secret_key', 'FLWSECK_TEST-d37a42d8917db84f1b2f47c125252d0a-X', '2021-06-12 23:06:21', '2022-01-27 08:57:22'),
(297, 'flutterwave_public_key', 'FLWPUBK_TEST-86cce2ec43c63e09a517290a8347fcab-X', '2021-06-12 23:06:21', '2022-01-27 08:57:22'),
(298, 'site_currency_symbol_position', 'left', '2021-06-12 23:06:21', '2022-01-27 08:57:22'),
(299, 'site_default_payment_gateway', 'razorpay', '2021-06-12 23:06:21', '2022-01-27 08:57:22'),
(300, 'manual_payment_gateway', 'on', '2021-06-12 23:06:21', '2022-01-27 08:57:22'),
(301, 'paypal_gateway', NULL, '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(302, 'paytm_test_mode', NULL, '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(303, 'paypal_test_mode', NULL, '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(304, 'paytm_gateway', NULL, '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(305, 'razorpay_gateway', 'on', '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(306, 'stripe_gateway', NULL, '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(307, 'paystack_gateway', NULL, '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(308, 'mollie_gateway', NULL, '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(309, 'cash_on_delivery_gateway', 'on', '2021-06-12 23:06:22', '2022-01-27 08:57:22'),
(310, 'flutterwave_gateway', NULL, '2021-06-12 23:06:22', '2022-01-27 08:57:23'),
(311, 'site_usd_to_usd_exchange_rate', NULL, '2021-06-12 23:06:22', '2021-06-15 13:43:50'),
(312, 'site_usd_to_inr_exchange_rate', '75.04', '2021-06-12 23:06:22', '2021-06-15 13:43:50'),
(313, 'site_inr_to_usd_exchange_rate', NULL, '2021-06-12 23:40:17', '2022-01-27 08:57:24'),
(314, 'site_inr_to_inr_exchange_rate', NULL, '2021-06-12 23:40:17', '2022-01-27 08:57:24'),
(315, 'site_inr_to_ngn_exchange_rate', NULL, '2021-06-12 23:40:17', '2022-01-27 08:57:25'),
(316, 'product_track_order_confirmed_text', 'Order Confirmed', '2021-06-14 17:48:41', '2021-06-14 17:48:41'),
(317, 'product_track_payment_complete_text', 'Payment Complete', '2021-06-14 17:48:41', '2021-06-14 17:48:41'),
(318, 'product_track_payment_pending_text', 'Payment Pending', '2021-06-14 17:48:41', '2021-06-14 17:48:41'),
(319, 'product_track_in_transit_text', 'In Transit', '2021-06-14 17:48:41', '2021-06-14 17:48:41'),
(320, 'product_track_shipped_text', 'Shipped', '2021-06-14 17:48:41', '2021-06-14 17:48:41'),
(321, 'product_track_delivered_text', 'Delivered', '2021-06-14 17:48:41', '2021-06-14 17:48:41'),
(322, 'product_track_order_complete_text', 'Order Complete', '2021-06-14 17:48:41', '2021-06-14 17:48:41'),
(323, 'product_track_order_canceled_text', 'Order Canceled', '2021-06-14 17:48:41', '2021-06-14 17:48:41'),
(324, 'product_single_subcategory_text', 'Sub Category:', '2021-06-14 18:04:57', '2021-06-14 18:04:57'),
(325, 'product_track_status', 'on', '2021-06-15 14:30:34', '2022-02-08 08:28:54'),
(326, 'appointment_single_information_tab_title', 'Information', '2021-06-15 21:40:39', '2021-06-29 15:55:25'),
(327, 'appointment_single_booking_tab_title', 'Booking', '2021-06-15 21:40:39', '2021-06-29 15:55:25'),
(328, 'appointment_single_feedback_tab_title', 'Feedback', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(329, 'appointment_single_appointment_booking_information_text', 'Booking Information', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(330, 'appointment_single_appointment_booking_button_text', 'Book Appointment', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(331, 'appointment_single_appointment_booking_about_me_title', 'About Me', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(332, 'appointment_single_appointment_booking_educational_info_title', 'Education Info', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(333, 'appointment_single_appointment_booking_additional_info_title', 'Additional Info', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(334, 'appointment_single_appointment_booking_specialize_info_title', 'Specialize Info', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(335, 'appointment_single_appointment_booking_client_feedback_title', 'Clients Feedback', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(336, 'appointment_booking_success_page_title', 'Thank You', '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(337, 'appointment_booking_success_page_description', NULL, '2021-06-15 21:40:40', '2021-06-29 15:55:25'),
(338, 'appointment_booking_cancel_page_title', 'Sorry', '2021-06-15 21:40:41', '2021-06-29 15:55:25'),
(339, 'appointment_booking_cancel_page_description', NULL, '2021-06-15 21:40:41', '2021-06-29 15:55:25'),
(340, 'appointment_page_booking_button_text', 'Book Appointment', '2021-06-15 21:40:41', '2021-06-29 15:55:25'),
(341, 'appointment_notify_mail', 'dvrobin4@gmail.com', '2021-06-15 21:40:41', '2021-06-29 15:55:25'),
(342, 'appointment_booking_page_form_fields', '{\"field_type\":[\"select\",\"textarea\"],\"field_name\":[\"your-gender\",\"your-message\"],\"field_placeholder\":[\"Gender\",\"Message\"],\"select_options\":[\"Male\\r\\nFemale\"]}', '2021-06-15 21:44:01', '2021-07-02 13:19:42'),
(343, 'home_page_topbar_section_status', 'on', '2021-06-17 12:53:51', '2022-01-13 00:12:45'),
(344, 'home_page_infobar_section_status', 'on', '2021-06-17 12:53:51', '2021-06-17 12:56:36'),
(345, 'home_page_navbar_section_status', 'on', '2021-06-17 12:53:51', '2022-01-13 00:12:45'),
(346, 'home_page_header_slider_section_status', 'on', '2021-06-17 12:53:51', '2022-01-13 00:12:45'),
(347, 'home_page_keyfeature_section_status', 'on', '2021-06-17 12:53:51', '2022-01-13 00:12:45'),
(348, 'home_page_why_choose_us_section_status', NULL, '2021-06-17 12:53:51', '2021-06-17 12:53:51'),
(349, 'home_page_full_width_service_section_status', NULL, '2021-06-17 12:53:51', '2021-06-17 12:53:51'),
(350, 'home_page_counterup_section_status', 'on', '2021-06-17 12:53:51', '2022-01-13 00:12:45'),
(351, 'home_page_testimonial_section_status', 'on', '2021-06-17 12:53:51', '2022-01-13 00:12:45'),
(352, 'home_page_quote_section_status', NULL, '2021-06-17 12:53:51', '2021-06-17 12:53:51'),
(353, 'home_page_price_plan_section_status', NULL, '2021-06-17 12:53:51', '2021-06-17 12:53:51'),
(354, 'home_page_latest_team_member_section_status', NULL, '2021-06-17 12:53:51', '2021-06-17 12:53:51'),
(355, 'home_page_latest_blog_section_status', 'on', '2021-06-17 12:53:51', '2021-06-17 12:57:02'),
(356, 'home_page_header_bottom_section_status', 'on', '2021-06-17 12:55:57', '2022-01-13 00:12:45'),
(357, 'home_page_medical_care_section_status', 'on', '2021-06-17 12:55:57', '2021-06-17 12:57:02'),
(358, 'home_page_concern_section_status', 'on', '2021-06-17 12:55:57', '2021-06-17 12:57:02'),
(359, 'home_page_service_section_status', 'on', '2021-06-17 12:55:57', '2021-06-17 12:57:02'),
(360, 'home_page_expert_section_status', 'on', '2021-06-17 12:55:58', '2021-06-17 12:57:02'),
(361, 'home_page_appointment_section_status', 'on', '2021-06-17 12:55:58', '2021-06-17 12:57:02'),
(362, 'home_page_image_gallery_section_status', 'on', '2021-06-17 12:55:58', '2021-06-17 12:57:02'),
(363, 'home_page_concern_area_section_status', 'on', '2021-06-17 12:56:28', '2021-06-17 12:56:28'),
(364, 'home_page_call_to_us_section_status', 'on', '2021-06-17 12:56:28', '2021-06-17 12:56:28'),
(365, 'home_page_product_category_section_status', 'on', '2021-06-17 12:56:37', '2022-01-13 00:12:45'),
(366, 'home_page_special_offer_section_status', NULL, '2021-06-17 12:56:37', '2022-01-13 00:12:45'),
(367, 'home_page_popular_products_section_status', 'on', '2021-06-17 12:56:37', '2022-01-13 00:12:45'),
(368, 'home_page_featured_products_section_status', 'on', '2021-06-17 12:56:43', '2022-01-13 00:12:45'),
(369, 'about_page_concern_section_status', 'on', '2021-06-17 13:31:27', '2021-12-19 21:51:47'),
(370, 'about_page_progressbar_section_status', 'on', '2021-06-17 13:31:27', '2021-12-19 21:51:47'),
(371, 'about_page_image_gallery_section_status', NULL, '2021-06-17 13:31:27', '2021-12-19 21:51:47'),
(372, 'about_page_counterup_section_status', 'on', '2021-06-17 13:31:27', '2021-12-19 21:51:47'),
(373, 'contact_page_message_section_status', 'on', '2021-06-17 13:39:52', '2021-06-17 13:39:52'),
(374, 'home_page_appoitnemnt_section_title', NULL, '2021-06-17 19:50:58', '2021-06-17 19:51:03'),
(375, 'home_page_appoitnemnt_section_description', NULL, '2021-06-17 19:50:58', '2021-06-17 19:51:03'),
(376, 'home_page_appoitnemnt_section_display_item', NULL, '2021-06-17 19:50:58', '2021-06-17 19:51:03'),
(377, 'home_page_appointment_section_title', 'Meet Our highly expert teams', '2021-06-17 19:59:29', '2021-07-02 18:10:39'),
(378, 'home_page_appointment_section_description', 'With occupancy rates at near capacity and an increasing number of complex patients, our existing facilities are being enhanced and new facilities created to meet today’s needs.', '2021-06-17 19:59:29', '2021-07-02 18:10:39'),
(379, 'home_page_appointment_section_display_item', '6', '2021-06-17 19:59:29', '2021-07-02 18:10:39'),
(380, 'quote_mail_subject', 'Thank you for your quotation, we will get back to you very soon.', '2021-06-20 16:19:02', '2021-06-20 16:20:37'),
(381, 'quote_page_form_title', 'Request A Quote', '2021-06-20 16:19:02', '2021-06-20 16:20:38'),
(382, 'quote_page_form_button_text', 'Submit Request', '2021-06-20 16:19:02', '2021-06-20 16:20:38'),
(383, 'quote_page_form_mail', 'shawon9324@gmail.com', '2021-06-20 16:19:02', '2021-06-20 16:20:38'),
(384, 'quote_page_slug', 'quote', '2021-06-20 19:04:54', '2021-06-30 15:31:11'),
(385, 'quote_page_name', 'Quote', '2021-06-20 19:04:55', '2021-06-30 15:31:11'),
(386, 'quote_page_meta_tags', 'quote', '2021-06-20 19:04:55', '2021-06-21 11:36:19'),
(387, 'quote_page_meta_description', NULL, '2021-06-20 19:04:55', '2021-06-30 15:31:11'),
(388, 'quote_page_form_fields', '{\"field_type\":[\"text\",\"email\",\"textarea\"],\"field_name\":[\"your-name\",\"your-email\",\"your-message\"],\"field_placeholder\":[\"Name\",\"Email\",\"Message\"],\"field_required\":[\"on\",\"on\",\"on\"]}', '2021-06-20 19:12:50', '2021-06-22 01:31:28'),
(389, 'faq_page_section_title', 'Frequently Asked Quetions', '2021-06-21 11:21:36', '2021-12-19 21:21:02'),
(390, 'faq_page_section_description', NULL, '2021-06-21 11:21:36', '2021-12-19 21:21:03'),
(391, 'faq_page_section_item', '10', '2021-06-21 11:21:37', '2021-12-19 21:21:03'),
(392, 'error_404_page_en_GB_title', NULL, '2021-06-21 11:24:43', '2021-06-21 11:24:43'),
(393, 'error_404_page_en_GB_subtitle', NULL, '2021-06-21 11:24:43', '2021-06-21 11:24:43'),
(394, 'error_404_page_en_GB_paragraph', NULL, '2021-06-21 11:24:43', '2021-06-21 11:24:43'),
(395, 'error_404_page_en_GB_button_text', NULL, '2021-06-21 11:24:43', '2021-06-21 11:24:43'),
(396, 'error_404_page_title', '404', '2021-06-21 11:25:47', '2021-06-21 11:25:47'),
(397, 'error_404_page_subtitle', 'Oops! This Page Could Not Be Found', '2021-06-21 11:25:47', '2021-06-21 11:25:47'),
(398, 'error_404_page_paragraph', 'Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable', '2021-06-21 11:25:47', '2021-06-21 11:25:47'),
(399, 'error_404_page_button_text', 'GO TO HOME PAGE', '2021-06-21 11:25:47', '2021-06-21 11:25:47'),
(400, 'maintain_page_title', 'We are on Scheduled Maintenance', '2021-06-21 11:32:14', '2021-06-21 11:34:14'),
(401, 'maintain_page_description', 'Lose away off why half led have near bed. At engage simple father of period others except. My giving do summer of though narrow marked at. Spring formal no county ye waited.', '2021-06-21 11:32:14', '2021-06-21 11:34:14'),
(402, 'maintain_page_logo', '1', '2021-06-21 11:33:42', '2021-06-21 11:33:42'),
(403, 'maintain_page_background_image', '10', '2021-06-21 11:33:42', '2021-06-21 11:33:42'),
(404, 'faq_page_slug', 'faq', '2021-06-21 11:35:40', '2021-12-17 07:13:49'),
(405, 'faq_page_name', 'Faq', '2021-06-21 11:35:41', '2021-12-17 07:13:50'),
(406, 'faq_page_meta_tags', 'faq', '2021-06-21 11:35:41', '2021-06-21 11:36:19'),
(407, 'faq_page_meta_description', NULL, '2021-06-21 11:35:41', '2021-12-17 07:13:50'),
(408, 'service_single_page_counterup_section_status', 'on', '2021-06-22 00:57:54', '2022-01-11 04:34:35'),
(409, 'service_page_counterup_section_status', 'on', '2021-06-22 00:58:01', '2021-06-22 01:00:04'),
(410, 'blog_page_counterup_section_status', 'on', '2021-06-22 01:03:07', '2021-12-17 07:33:30'),
(411, 'navbar_search_area', 'on', '2021-06-22 01:43:03', '2021-06-22 01:43:03'),
(412, 'navbar_wishlist_area', 'on', '2021-06-22 01:43:03', '2021-06-22 01:43:03'),
(413, 'navbar_shopping_area', 'on', '2021-06-22 01:43:03', '2021-06-22 01:43:03'),
(414, 'shopping_cart_icon', 'flaticon-shopping-cart-2', '2021-06-22 01:43:03', '2021-06-22 01:43:03'),
(415, 'wishlist_cart_icon', 'far fa-heart', '2021-06-22 01:43:03', '2021-06-22 01:43:03'),
(416, 'home_page_medical_care_section_appointment_button_text', 'All Doctor List', '2021-06-29 20:14:34', '2021-06-29 20:14:34'),
(417, 'body_font_family', 'Roboto', '2021-06-29 20:31:11', '2021-07-01 18:56:40'),
(418, 'heading_font_family', 'Montserrat', '2021-06-29 20:31:11', '2021-07-01 18:56:40'),
(419, 'heading_font', 'on', '2021-06-29 20:31:11', '2021-07-01 18:56:40'),
(420, 'body_font_variant', 'a:3:{i:0;s:5:\"0,400\";i:1;s:5:\"0,500\";i:2;s:5:\"0,700\";}', '2021-06-29 20:31:11', '2021-07-01 18:56:40'),
(421, 'heading_font_variant', 'a:4:{i:0;s:5:\"0,400\";i:1;s:5:\"0,500\";i:2;s:5:\"0,600\";i:3;s:5:\"0,700\";}', '2021-06-29 20:31:11', '2021-07-01 18:56:40'),
(422, 'image_gallery_page_slug', 'image-gallery', '2021-06-30 15:30:59', '2021-12-17 07:13:49'),
(423, 'testimonial_page_slug', 'testimonial', '2021-06-30 15:30:59', '2021-12-17 07:13:49'),
(424, 'image_gallery_page_name', 'Image gallery', '2021-06-30 15:30:59', '2021-12-17 07:13:51'),
(425, 'image_gallery_page_meta_description', NULL, '2021-06-30 15:30:59', '2021-12-17 07:13:51'),
(426, 'testimonial_page_name', 'Testimonial', '2021-06-30 15:30:59', '2021-12-17 07:13:52'),
(427, 'testimonial_page_meta_description', NULL, '2021-06-30 15:30:59', '2021-12-17 07:13:54'),
(428, 'prescription_page_slug', 'prescription', '2021-06-30 22:15:55', '2021-12-17 07:13:49'),
(429, 'prescription_page_name', 'Prescription', '2021-06-30 22:15:56', '2021-12-17 07:13:54'),
(430, 'prescription_page_meta_description', NULL, '2021-06-30 22:15:56', '2021-12-17 07:13:54'),
(431, 'prescription_form_title', 'Upload your prescription', NULL, NULL),
(432, 'prescription_button_text', 'Submit Prescription', NULL, NULL),
(433, 'prescription_notify_mail', 'dvrobin4@gmail.com', NULL, NULL),
(434, 'prescription_form_title', 'Upload your prescription', NULL, NULL),
(435, 'prescription_button_text', 'Submit Prescription', NULL, NULL),
(436, 'prescription_notify_mail', 'dvrobin4@gmail.com', NULL, NULL),
(437, 'prescription_form_submission_msg', 'Your prescription request has been submitted successfully.We will get back to you soon!', NULL, NULL),
(438, 'home_page_popular_product_section_display_item_home_04', '4', '2021-07-03 12:30:14', '2022-01-13 00:15:38'),
(439, 'home_page_product_category_section_display_item_home_04', '8', '2021-07-03 12:30:33', '2021-07-03 12:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sunil Shah', 'Its Products is incredibly nutritious. It\'s also rich in healthy fats and high quality protein. I enjoyed using the hemp seeds and powder in my smoothies and loved using hemp seed oil for my salads, skincare and haircare 💓&nbsp; Hemp has excellent wholesome nutritional value. So, it\'s definitely cost-effective.', 'Marketing Executive', '20', '2021-06-01 21:13:31', '2022-01-13 09:57:25'),
(2, 'Arnab Agarwaal', 'I have been suffering from an excessive need to sleep ever since I started my corporate career. I felt sleepy and lethargic in the morning even if I had received over 9  hours of sleep... After using  Product, all the issues has been resolved', 'Businessman', '21', '2021-06-01 21:16:58', '2022-02-08 07:50:40'),
(3, 'Rohit Kumar', 'CBD helped my life in ways I couldn\'t have imagined! I don’t have any medical condition, stress or anxiety but gave it a shot after using  Products', 'Software Developer', '22', '2021-06-01 21:17:09', '2022-02-08 07:50:29'),
(4, 'Raghav Awasti', 'My Family have  been a regular user of hemp powder and hulled hemp seed hearts for 3 months. I needed a better option for supplements because I went vegetarian. Since using the powder and seed hearts I\'ve seen a gradual yet consistent improvement in my activity and energy. It\'s said to be a superfood for a reason and I recommend it for people doing martial arts or working out or not working out alike, for a daily dose of holistic nutrients. Hemp is one stop for a wholesome source of nutrition.', 'Bank Manager', '23', '2021-06-01 21:17:19', '2022-01-13 09:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `topbar_infos`
--

CREATE TABLE `topbar_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topbar_infos`
--

INSERT INTO `topbar_infos` (`id`, `icon`, `details`, `created_at`, `updated_at`) VALUES
(2, 'flaticon-clock-1', 'Mon - Fri: 09.00am - 10.00 pm', '2021-05-09 11:12:48', '2021-05-09 11:24:47'),
(3, 'flaticon-mail', 'contact@xgenious.com', '2021-05-09 11:13:24', '2021-05-09 11:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verify_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified`, `phone`, `email_verify_token`, `address`, `state`, `city`, `zipcode`, `country`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'paymentgateway', 'paymentgateway@gmail.com', 'paymentgateway', NULL, NULL, NULL, NULL, NULL, 'asdf', NULL, 'Afganistan', '$2y$10$RuAIYzJSI.Cx.5tOWv0IwexskTKjSWOmYkIs75nPBPZ93BMIqfq1C', 'KQPfvPKECewmbn197wAUG0homeZuxQDTQeRVuKrNOxGhs6kKaOFthNgYWEmx', '2022-02-08 10:06:35', '2022-02-08 10:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget_order` int(11) DEFAULT NULL,
  `widget_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `widget_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `widget_area`, `widget_order`, `widget_location`, `widget_name`, `widget_content`, `created_at`, `updated_at`) VALUES
(17, NULL, 1, 'footer', 'ContactInfoWidget', 'a:9:{s:2:\"id\";s:2:\"17\";s:11:\"widget_name\";s:17:\"ContactInfoWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"1\";s:12:\"widget_title\";s:12:\"GET IN TOUCH\";s:8:\"location\";s:21:\"GM Road, Patna, India\";s:5:\"phone\";s:18:\"+91 (99) 204 32043\";s:5:\"email\";s:16:\"Info@hempbuti.in\";}', '2021-03-30 14:43:40', '2022-01-13 04:27:27'),
(22, NULL, 2, 'blog', 'BlogCategoryWidget', 'a:7:{s:2:\"id\";s:2:\"22\";s:11:\"widget_name\";s:18:\"BlogCategoryWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:4:\"blog\";s:12:\"widget_order\";s:1:\"2\";s:12:\"widget_title\";s:10:\"Categories\";s:10:\"post_items\";s:1:\"6\";}', '2021-04-16 08:31:58', '2021-06-22 01:07:29'),
(23, NULL, 1, 'blog', 'BlogSearchWidget', 'a:6:{s:2:\"id\";s:2:\"23\";s:11:\"widget_name\";s:16:\"BlogSearchWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:4:\"blog\";s:12:\"widget_order\";s:1:\"1\";s:18:\"widget_title_en_GB\";s:6:\"Search\";}', '2021-04-16 08:32:06', '2021-06-06 17:48:54'),
(28, NULL, 2, 'service', 'ServiceCategoryWidget', 'a:6:{s:2:\"id\";s:2:\"28\";s:11:\"widget_name\";s:21:\"ServiceCategoryWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:7:\"service\";s:12:\"widget_order\";s:1:\"1\";s:10:\"post_items\";s:1:\"5\";}', '2021-06-21 16:08:03', '2021-07-04 09:27:33'),
(29, NULL, 3, 'service', 'ServiceCallUsWidget', 'a:8:{s:2:\"id\";s:2:\"29\";s:11:\"widget_name\";s:19:\"ServiceCallUsWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:7:\"service\";s:12:\"widget_order\";s:1:\"2\";s:10:\"call_us_bg\";s:2:\"48\";s:5:\"title\";s:17:\"CALL FOR ANY HELP\";s:7:\"details\";s:15:\"+91 458 654 528\";}', '2021-06-21 17:05:11', '2021-07-04 09:27:33'),
(31, NULL, 3, 'blog', 'RecentBlogPostWidget', 'a:6:{s:11:\"widget_name\";s:20:\"RecentBlogPostWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:4:\"blog\";s:12:\"widget_order\";s:1:\"3\";s:12:\"widget_title\";s:12:\"Recent Posts\";s:10:\"post_items\";s:1:\"5\";}', '2021-06-29 20:49:05', '2021-06-29 20:49:05'),
(32, NULL, 2, 'footer', 'NavigationMenuWidget', 'a:6:{s:11:\"widget_name\";s:20:\"NavigationMenuWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"2\";s:12:\"widget_title\";N;s:7:\"menu_id\";s:1:\"6\";}', '2022-01-13 05:00:30', '2022-01-13 05:00:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_bookings`
--
ALTER TABLE `appointment_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_booking_times`
--
ALTER TABLE `appointment_booking_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_categories`
--
ALTER TABLE `appointment_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointment_categories_name_unique` (`name`);

--
-- Indexes for table `appointment_reviews`
--
ALTER TABLE `appointment_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_categories_name_unique` (`name`);

--
-- Indexes for table `counterups`
--
ALTER TABLE `counterups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_bottoms`
--
ALTER TABLE `header_bottoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_sliders`
--
ALTER TABLE `header_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galleries`
--
ALTER TABLE `image_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_gallery_categories`
--
ALTER TABLE `image_gallery_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infobars`
--
ALTER TABLE `infobars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyfeatures`
--
ALTER TABLE `keyfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_uploads`
--
ALTER TABLE `media_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_care_infos`
--
ALTER TABLE `medical_care_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `popup_builders`
--
ALTER TABLE `popup_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_coupons`
--
ALTER TABLE `product_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order_tracks`
--
ALTER TABLE `product_order_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_shippings`
--
ALTER TABLE `product_shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress_bars`
--
ALTER TABLE `progress_bars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_options`
--
ALTER TABLE `static_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topbar_infos`
--
ALTER TABLE `topbar_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `appointment_bookings`
--
ALTER TABLE `appointment_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment_booking_times`
--
ALTER TABLE `appointment_booking_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `appointment_categories`
--
ALTER TABLE `appointment_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment_reviews`
--
ALTER TABLE `appointment_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `counterups`
--
ALTER TABLE `counterups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `header_bottoms`
--
ALTER TABLE `header_bottoms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `header_sliders`
--
ALTER TABLE `header_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `image_galleries`
--
ALTER TABLE `image_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image_gallery_categories`
--
ALTER TABLE `image_gallery_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `infobars`
--
ALTER TABLE `infobars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keyfeatures`
--
ALTER TABLE `keyfeatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_uploads`
--
ALTER TABLE `media_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `medical_care_infos`
--
ALTER TABLE `medical_care_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `popup_builders`
--
ALTER TABLE `popup_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_coupons`
--
ALTER TABLE `product_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_order_tracks`
--
ALTER TABLE `product_order_tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_shippings`
--
ALTER TABLE `product_shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `progress_bars`
--
ALTER TABLE `progress_bars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_icons`
--
ALTER TABLE `social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `static_options`
--
ALTER TABLE `static_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=440;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topbar_infos`
--
ALTER TABLE `topbar_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
