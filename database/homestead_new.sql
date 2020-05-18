-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 12:03 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `angebote`
--

CREATE TABLE `angebote` (
  `id` int(10) NOT NULL,
  `teildarlehen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `darlehensbetrag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sollzinsbindung` int(11) DEFAULT NULL,
  `sollzinssatz` int(11) DEFAULT NULL,
  `eff_jahreszins_pangv` int(11) DEFAULT NULL,
  `kaufpreis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostenumbau` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostennotar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grunderwerbssteuer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maklerkosten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gesamtkosten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eigenkapital` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finanzierungsbedarf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `angebote`
--

INSERT INTO `angebote` (`id`, `teildarlehen`, `darlehensbetrag`, `sollzinsbindung`, `sollzinssatz`, `eff_jahreszins_pangv`, `kaufpreis`, `kostenumbau`, `kostennotar`, `grunderwerbssteuer`, `maklerkosten`, `gesamtkosten`, `eigenkapital`, `finanzierungsbedarf`, `pdf_name`, `customer_id`, `created_at`) VALUES
(466, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '466.pdf', 1, '2020-04-03 07:26:11'),
(467, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '467.pdf', 1, '2020-04-03 07:26:11'),
(468, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '468.pdf', 1, '2020-04-03 07:26:11'),
(469, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '469.pdf', 1, '2020-04-03 07:26:11'),
(470, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '470.pdf', 1, '2020-04-03 07:26:11'),
(471, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '471.pdf', 1, '2020-04-03 07:26:11'),
(472, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '472.pdf', 1, '2020-04-03 07:26:11'),
(473, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '473.pdf', 1, '2020-04-03 07:26:11'),
(474, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '474.pdf', 1, '2020-04-03 07:26:11'),
(475, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '475.pdf', 1, '2020-04-03 07:26:11'),
(476, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '476.pdf', 1, '2020-04-03 07:26:11'),
(477, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '477.pdf', 1, '2020-04-03 07:26:11'),
(478, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '478.pdf', 1, '2020-04-03 07:26:11'),
(479, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '479.pdf', 1, '2020-04-03 07:26:11'),
(480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '480.pdf', 1, '2020-04-03 07:26:11'),
(481, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '481.pdf', 1, '2020-04-03 07:26:11'),
(482, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '482.pdf', 1, '2020-04-03 07:26:11'),
(483, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '483.pdf', 1, '2020-04-03 07:26:11'),
(484, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '484.pdf', 1, '2020-04-03 07:26:11'),
(485, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '485.pdf', 1, '2020-04-03 07:26:11'),
(486, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '486.pdf', 1, '2020-04-03 07:26:11'),
(487, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '487.pdf', 1, '2020-04-03 07:26:11'),
(488, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '488.pdf', 1, '2020-04-03 07:26:11'),
(489, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '489.pdf', 1, '2020-04-03 07:26:11'),
(490, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '490.pdf', 1, '2020-04-03 07:26:11'),
(491, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '491.pdf', 1, '2020-04-03 07:26:11'),
(492, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '492.pdf', 1, '2020-04-03 07:26:11'),
(493, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '493.pdf', 1, '2020-04-03 07:26:11'),
(494, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '494.pdf', 1, '2020-04-03 07:26:11'),
(495, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '495.pdf', 1, '2020-04-03 07:26:11'),
(496, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '496.pdf', 1, '2020-04-03 07:26:11'),
(497, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '497.pdf', 1, '2020-04-03 07:26:11'),
(498, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '498.pdf', 1, '2020-04-03 07:26:11'),
(499, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '499.pdf', 1, '2020-04-03 07:26:11'),
(500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500.pdf', 1, '2020-04-03 07:26:11'),
(501, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '501.pdf', 1, '2020-04-03 07:26:11'),
(502, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '502.pdf', 1, '2020-04-03 07:26:11'),
(503, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '503.pdf', 1, '2020-04-03 07:26:11'),
(504, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '504.pdf', 1, '2020-04-03 07:26:11'),
(505, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '505.pdf', 1, '2020-04-03 07:26:11'),
(506, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '506.pdf', 1, '2020-04-03 07:26:11'),
(507, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '507.pdf', 1, '2020-04-03 07:26:11'),
(508, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '508.pdf', 1, '2020-04-03 07:26:11'),
(509, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '509.pdf', 1, '2020-04-03 07:26:11'),
(510, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '510.pdf', 1, '2020-04-03 07:26:11'),
(511, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '511.pdf', 1, '2020-04-03 07:26:11'),
(512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '512.pdf', 1, '2020-04-03 07:26:11'),
(513, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '513.pdf', 1, '2020-04-03 07:26:11'),
(514, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '514.pdf', 1, '2020-04-03 07:26:11'),
(515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '515.pdf', 1, '2020-04-03 07:26:11'),
(516, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '516.pdf', 1, '2020-04-03 07:26:11'),
(517, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '517.pdf', 1, '2020-04-03 07:26:11'),
(518, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '518.pdf', 1, '2020-04-03 07:26:11'),
(519, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '519.pdf', 1, '2020-04-03 07:26:11'),
(520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '520.pdf', 1, '2020-04-03 07:26:11'),
(521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '521.pdf', 1, '2020-04-03 07:26:11'),
(522, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '522.pdf', 1, '2020-04-03 07:26:11'),
(523, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '523.pdf', 1, '2020-04-03 07:26:11'),
(524, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '524.pdf', 1, '2020-04-03 07:26:11'),
(525, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '525.pdf', 1, '2020-04-03 07:26:11'),
(526, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '526.pdf', 1, '2020-04-03 07:26:11'),
(527, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '527.pdf', 1, '2020-04-03 07:26:11'),
(528, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '528.pdf', 1, '2020-04-03 07:26:11'),
(529, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '529.pdf', 1, '2020-04-03 07:26:11'),
(530, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '530.pdf', 1, '2020-04-03 07:26:11'),
(531, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '531.pdf', 1, '2020-04-03 07:26:11'),
(532, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '532.pdf', 1, '2020-04-03 07:26:11'),
(533, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '533.pdf', 1, '2020-04-03 07:26:11'),
(534, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '534.pdf', 1, '2020-04-03 07:26:11'),
(537, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '535.pdf', 1, '2020-04-04 06:58:23'),
(538, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '538.pdf', 1, '2020-04-04 11:09:33'),
(539, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '539.pdf', 1, '2020-04-04 11:11:39'),
(540, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '540.pdf', 1, '2020-04-04 11:17:48'),
(541, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '541.pdf', 1, '2020-04-04 11:18:37'),
(542, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '542.pdf', 1, '2020-04-04 11:20:59'),
(543, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '543.pdf', 1, '2020-04-04 11:22:24'),
(544, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '544.pdf', 1, '2020-04-08 11:32:56'),
(545, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '545.pdf', 1, '2020-04-08 11:43:18'),
(546, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '546.pdf', 1, '2020-04-08 11:45:21'),
(547, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '547.pdf', 1, '2020-04-08 11:47:11'),
(548, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '548.pdf', 1, '2020-04-08 11:48:19'),
(549, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '549.pdf', 1, '2020-04-08 11:49:24'),
(550, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '550.pdf', 1, '2020-04-08 11:49:53'),
(551, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '551.pdf', 1, '2020-04-08 11:50:56'),
(552, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '552.pdf', 1, '2020-04-08 11:51:26'),
(553, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '553.pdf', 1, '2020-04-08 11:52:58'),
(554, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '554.pdf', 1, '2020-04-08 11:54:17'),
(555, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '555.pdf', 1, '2020-04-08 12:10:21'),
(556, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '556.pdf', 1, '2020-04-08 12:12:41'),
(557, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '557.pdf', 1, '2020-04-08 12:14:07'),
(558, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '558.pdf', 1, '2020-04-08 12:18:38'),
(559, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '559.pdf', 1, '2020-04-08 12:22:51'),
(560, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '560.pdf', 1, '2020-04-08 12:23:44'),
(561, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '561.pdf', 1, '2020-04-08 12:34:21'),
(562, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '562.pdf', 1, '2020-04-08 12:35:31'),
(563, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '563.pdf', 1, '2020-04-08 12:37:19'),
(564, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '564.pdf', 1, '2020-04-08 12:38:34'),
(565, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '565.pdf', 1, '2020-04-08 12:45:29'),
(566, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '566.pdf', 1, '2020-04-08 12:59:15'),
(567, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '567.pdf', 1, '2020-04-08 13:06:49'),
(568, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '568.pdf', 1, '2020-04-08 13:08:55'),
(569, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '569.pdf', 1, '2020-04-08 13:13:25'),
(570, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '570.pdf', 1, '2020-04-08 13:15:52'),
(571, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '571.pdf', 1, '2020-04-08 13:17:12'),
(572, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '572.pdf', 1, '2020-04-08 13:19:42'),
(573, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '573.pdf', 1, '2020-04-08 13:23:13'),
(574, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '574.pdf', 1, '2020-04-08 13:27:30'),
(575, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '575.pdf', 1, '2020-04-08 13:30:59'),
(576, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '576.pdf', 1, '2020-04-08 13:33:46'),
(577, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '577.pdf', 1, '2020-04-08 13:39:03'),
(578, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '578.pdf', 1, '2020-04-08 13:41:01'),
(579, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '579.pdf', 1, '2020-04-08 14:00:23'),
(580, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '580.pdf', 1, '2020-04-08 14:01:54'),
(581, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '581.pdf', 1, '2020-04-08 14:02:32'),
(582, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '582.pdf', 1, '2020-04-08 14:03:18'),
(583, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '583.pdf', 1, '2020-04-08 14:04:12'),
(584, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '584.pdf', 1, '2020-04-08 14:34:47'),
(585, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '585.pdf', 1, '2020-04-08 14:38:41'),
(586, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '586.pdf', 1, '2020-04-08 14:40:18'),
(587, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '587.pdf', 1, '2020-04-08 14:41:36'),
(588, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '588.pdf', 1, '2020-04-08 14:48:30'),
(589, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '589.pdf', 1, '2020-04-08 14:52:18'),
(590, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '590.pdf', 1, '2020-04-08 14:56:19'),
(591, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '591.pdf', 1, '2020-04-08 15:02:24'),
(592, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '592.pdf', 1, '2020-04-08 15:04:37'),
(593, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '593.pdf', 1, '2020-04-08 15:05:47'),
(594, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '594.pdf', 1, '2020-04-08 15:06:19'),
(595, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '595.pdf', 1, '2020-04-08 15:07:26'),
(596, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '596.pdf', 1, '2020-04-08 15:09:52'),
(597, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '597.pdf', 1, '2020-04-08 15:11:10'),
(598, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '598.pdf', 1, '2020-04-08 15:12:05'),
(599, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '599.pdf', 1, '2020-04-08 15:13:36'),
(600, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '600.pdf', 1, '2020-04-08 15:14:15'),
(601, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '601.pdf', 1, '2020-04-08 15:15:51'),
(602, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '602.pdf', 1, '2020-04-08 15:16:47'),
(603, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '603.pdf', 1, '2020-04-08 15:16:56'),
(604, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '604.pdf', 1, '2020-04-08 15:19:00'),
(605, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '605.pdf', 1, '2020-04-08 15:19:28'),
(606, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '606.pdf', 1, '2020-04-08 15:19:35'),
(607, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '607.pdf', 1, '2020-04-08 15:21:26'),
(608, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '608.pdf', 1, '2020-04-08 15:22:41'),
(609, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '609.pdf', 1, '2020-04-08 15:23:26'),
(610, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '610.pdf', 1, '2020-04-08 15:24:06'),
(611, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '611.pdf', 1, '2020-04-08 15:25:21'),
(612, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '612.pdf', 1, '2020-04-08 15:25:59'),
(613, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '613.pdf', 1, '2020-04-08 15:29:06'),
(614, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '614.pdf', 1, '2020-04-08 15:31:54'),
(615, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '615.pdf', 1, '2020-04-08 15:33:27'),
(616, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '616.pdf', 1, '2020-04-08 15:34:12'),
(617, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '617.pdf', 1, '2020-04-08 15:35:21'),
(618, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '618.pdf', 1, '2020-04-08 15:36:24'),
(619, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '619.pdf', 1, '2020-04-08 15:36:45'),
(620, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '620.pdf', 1, '2020-04-08 15:37:38'),
(621, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '621.pdf', 1, '2020-04-08 16:06:43'),
(622, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '622.pdf', 1, '2020-04-08 16:08:07'),
(623, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '623.pdf', 1, '2020-04-08 16:09:10'),
(624, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '624.pdf', 1, '2020-04-08 16:10:18'),
(625, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '625.pdf', 1, '2020-04-08 16:17:50'),
(626, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '626.pdf', 1, '2020-04-08 16:18:00'),
(627, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '627.pdf', 1, '2020-04-08 16:18:09'),
(628, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '628.pdf', 1, '2020-04-08 16:18:26'),
(629, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '629.pdf', 1, '2020-04-08 16:21:56'),
(630, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '630.pdf', 1, '2020-04-08 16:28:59'),
(631, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '631.pdf', 1, '2020-04-08 16:31:49'),
(632, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '632.pdf', 1, '2020-04-08 16:40:57'),
(633, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '633.pdf', 1, '2020-04-08 16:41:53'),
(634, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '634.pdf', 1, '2020-04-08 16:43:17'),
(635, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '635.pdf', 1, '2020-04-08 16:44:07'),
(636, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '636.pdf', 1, '2020-04-08 16:44:53'),
(637, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '637.pdf', 1, '2020-04-08 16:56:37'),
(638, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '638.pdf', 1, '2020-04-09 10:37:17'),
(639, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '639.pdf', 1, '2020-04-09 10:47:29'),
(640, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '640.pdf', 1, '2020-04-09 11:10:41'),
(641, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '641.pdf', 1, '2020-04-09 11:19:04'),
(642, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '642.pdf', 1, '2020-04-09 11:19:27'),
(643, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '643.pdf', 1, '2020-04-09 11:23:10'),
(644, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '644.pdf', 1, '2020-04-09 11:23:28'),
(645, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '645.pdf', 1, '2020-04-09 11:25:54'),
(646, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '646.pdf', 1, '2020-04-09 11:26:00'),
(647, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '647.pdf', 1, '2020-04-09 12:03:02'),
(648, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '648.pdf', 1, '2020-04-09 12:04:47'),
(649, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '649.pdf', 1, '2020-04-09 12:20:59'),
(650, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '650.pdf', 1, '2020-04-09 12:26:03'),
(651, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '651.pdf', 1, '2020-04-13 12:03:57'),
(652, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '652.pdf', 1, '2020-04-15 10:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `calculation`
--

CREATE TABLE `calculation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Finanzbaustein',
  `angebotdate` date DEFAULT NULL,
  `kunden_id` int(191) NOT NULL,
  `enabled` tinyint(2) NOT NULL DEFAULT 1,
  `prepared_by` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `annuities` varchar(255) NOT NULL,
  `to_interest` varchar(255) NOT NULL,
  `effectiveness` varchar(255) NOT NULL,
  `fixed_interest_rates` varchar(255) NOT NULL,
  `monthly_loan` varchar(255) NOT NULL,
  `residual_debt_interest_rate` varchar(255) NOT NULL,
  `calculated_luaf_time` varchar(255) NOT NULL,
  `net_loan_amount` varchar(255) NOT NULL,
  `initial_interest` varchar(255) NOT NULL,
  `optional_sound_recovery` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `calculation`
--

INSERT INTO `calculation` (`id`, `name`, `angebotdate`, `kunden_id`, `enabled`, `prepared_by`, `bank`, `annuities`, `to_interest`, `effectiveness`, `fixed_interest_rates`, `monthly_loan`, `residual_debt_interest_rate`, `calculated_luaf_time`, `net_loan_amount`, `initial_interest`, `optional_sound_recovery`, `created_at`, `updated_at`) VALUES
(1, 'Finanzbaustein1212', '2019-04-04', 1, 1, 5, 'Deutsche Bank', 'ausgesetzt', '2%', '2', '10 Jahre', '917,29', '200.970,44', '33 Jahre, 5 Monate', '325.500', '1%', '2%', '2019-04-03 13:31:07', '2020-04-02 06:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `calc_result`
--

CREATE TABLE `calc_result` (
  `id` int(10) UNSIGNED NOT NULL,
  `kunden_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_period` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_month` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_discount` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,00',
  `borrowing_rate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montly_deposit_val` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_month` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_val` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_to_month` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_to_year` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onetime_unsheduled_month` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onetime_unsheduled_year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `onetime_unsheduled_val` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_borrowing_rate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_repayment_rate_inp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `registery_fees` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repayment_date_inp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_payment_opt` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outstanding_balance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `effective_interest` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `connection_credit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_rate_inp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_maturity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sparsumme` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0,00',
  `monthly_interest` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0,00',
  `monthly_saving` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0,00',
  `monthly_payment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0,00',
  `laufzeit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `bausparer_flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acquisition_fee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bausparer_pay_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `calc_result`
--

INSERT INTO `calc_result` (`id`, `kunden_id`, `loan_period`, `payment_month`, `payment_year`, `payment_discount`, `borrowing_rate`, `montly_deposit_val`, `annual_unsheduled_month`, `annual_unsheduled_year`, `annual_unsheduled_val`, `annual_to_month`, `annual_to_year`, `onetime_unsheduled_month`, `onetime_unsheduled_year`, `onetime_unsheduled_val`, `new_borrowing_rate`, `new_repayment_rate_inp`, `created_at`, `updated_at`, `registery_fees`, `payment_amount`, `repayment_date_inp`, `message_payment_opt`, `outstanding_balance`, `effective_interest`, `connection_credit`, `new_rate_inp`, `total_maturity`, `sparsumme`, `monthly_interest`, `monthly_saving`, `monthly_payment`, `laufzeit`, `bausparer_flag`, `acquisition_fee`, `bausparer_pay_type`) VALUES
(12, '1', '10', '7', '2020', '0.00', '2', '3275,68', '1', '2020', '0', '1', '2024', '12', '2032', '0', '2', '2,55', NULL, NULL, '735,00', '3.619.010,00', '0,91', NULL, '3.984.785,83', '0,01', '3.984.785,83', '13.722,08', '10/1', '356000,00', '593,33', '1186,67', '1780,00', '10', 'false', '1,2', 'one');

-- --------------------------------------------------------

--
-- Table structure for table `checklists`
--

CREATE TABLE `checklists` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `checklists`
--

INSERT INTO `checklists` (`id`, `body`, `category_id`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 0, 1, '2019-06-12 10:32:41', '2019-06-12 07:05:45', '2019-06-12 10:32:41'),
(2, 'Test 2', 0, 1, '2019-06-12 10:32:42', '2019-06-12 07:05:51', '2019-06-12 10:32:42'),
(3, 'TEST', 1, 1, '2019-06-17 10:40:38', '2019-06-17 10:40:32', '2019-06-17 10:40:38'),
(4, 'Kopie Ausweis in Farbe beidseitig', 2, 1, NULL, '2019-06-17 10:41:47', '2019-06-17 10:41:47'),
(5, 'Anbei Darlehensanfrage (bitte ausfüllen und gegenzeichnen)', 2, 1, NULL, '2019-06-17 10:42:03', '2019-06-17 10:42:03'),
(6, 'Lohn- / Gehaltsabrechnungen (die letzten 3)', 3, 1, NULL, '2019-06-17 10:42:34', '2019-06-17 10:42:34'),
(7, 'Abrechnungen Nebentätigkeit (die letzten 3)', 3, 1, NULL, '2019-06-17 10:42:57', '2019-06-17 10:47:31'),
(8, 'Bezügemitteilungen (die letzte)', 3, 1, NULL, '2019-06-17 10:47:24', '2019-06-17 10:47:24'),
(9, 'Lohnsteuerbescheinigung  Vorjahr oder Dezember-Abrechnung des Vorjahres', 3, 1, NULL, '2019-06-17 10:47:43', '2019-06-17 10:47:47'),
(10, 'Letzter vorliegender Einkommensteuerbescheid mit dazugehöriger Erklärung (inkl. aller Anlagen)', 3, 1, NULL, '2019-06-17 10:49:00', '2019-06-17 10:49:20'),
(11, 'Ihre letzten 3 Bilanzen / Gewinnermittlungen sowie die aktuelle BWA mit Summen- und Saldenliste', 3, 1, NULL, '2019-06-17 10:49:15', '2019-06-17 10:49:15'),
(12, 'Elterngeldbescheid', 3, 1, NULL, '2019-06-17 10:49:32', '2019-06-17 10:49:32'),
(13, 'Elterngeldbescheid', 3, 1, '2019-06-17 10:49:53', '2019-06-17 10:49:48', '2019-06-17 10:49:53'),
(14, 'Nachweis sonstige Einkünfte', 3, 1, NULL, '2019-06-17 10:50:07', '2019-06-17 10:50:07'),
(15, 'Aktuelle Renteninformation / Versorgungsauskunft / Beamtenpension / Nachweis privater Rentenversicherungen', 3, 1, NULL, '2019-06-17 10:50:39', '2019-06-17 10:50:39'),
(16, 'Mietaufstellung inkl. Nettokaltmieten', 3, 1, NULL, '2019-06-17 10:50:51', '2019-06-17 10:50:51'),
(17, 'Kopie Mietverträge', 3, 1, NULL, '2019-06-17 10:51:01', '2019-06-17 10:51:01'),
(18, 'Nachweis private Krankenversicherung', 4, 1, NULL, '2019-06-17 11:02:07', '2019-06-17 11:02:07'),
(19, 'Bei bestehenden Immobilienfinanzierungen Kopien der Darlehensverträge mit  letztem Jahreskontoauszug oder aktueller Restschuld', 4, 1, NULL, '2019-06-17 11:02:19', '2019-06-17 11:02:47'),
(20, 'Nachweis Unterhaltsverpflichtungen', 4, 1, NULL, '2019-06-17 11:02:25', '2019-06-17 11:02:44'),
(21, 'Kopie Bankguthaben / Bausparguthaben / Lebensversicherungs-Rückkaufswerte, etc', 4, 1, NULL, '2019-06-17 11:02:41', '2019-06-17 11:02:41'),
(22, 'Kreditverträge Privatkredite bzw. Leasingverträge mit Angabe der monatlichen Belastung  und  letzter Jahreskontoauszug  oder aktueller Restschuld', 5, 1, NULL, '2019-06-17 11:03:01', '2019-06-17 11:03:21'),
(23, 'Exposé oder Link zur Immobilie', 6, 1, NULL, '2019-06-17 11:03:40', '2019-06-17 11:04:59'),
(24, 'Farbfotos von außen', 6, 1, NULL, '2019-06-17 11:03:45', '2019-06-17 11:04:51'),
(25, 'Baubeschreibung', 6, 1, NULL, '2019-06-17 11:03:50', '2019-06-17 11:04:46'),
(26, 'Grundstückskaufvertrag', 6, 1, NULL, '2019-06-17 11:03:57', '2019-06-17 11:04:43'),
(27, 'Grundbuchauszug (nicht älter als 3 Monate)', 6, 1, NULL, '2019-06-17 11:04:10', '2019-06-17 11:04:41'),
(28, 'Aktuelle Flurkarte / Lageplan', 6, 1, NULL, '2019-06-17 11:05:11', '2019-06-17 11:05:11'),
(29, 'Bemaßte Baupläne (Grundriss / Ansicht / Schnitt)', 6, 1, NULL, '2019-06-17 11:05:20', '2019-06-17 11:05:20'),
(30, 'Wohnflächenberechnung', 6, 1, NULL, '2019-06-17 11:05:30', '2019-06-17 11:05:30'),
(31, 'Bruttogrundfläche (BGF)', 6, 1, NULL, '2019-06-17 11:05:45', '2019-06-17 11:05:45'),
(32, 'Erbbaurechtsvertrag', 6, 1, NULL, '2019-06-17 11:05:54', '2019-06-17 11:05:54'),
(33, 'Erbpachtvertrag', 6, 1, NULL, '2019-06-17 11:06:06', '2019-06-17 11:06:06'),
(34, 'Bei Eigentumswohnungen: Teilungserklärung mit Aufteilungsplan', 6, 1, NULL, '2019-06-17 11:07:32', '2019-06-17 11:07:32'),
(35, 'Baukostenaufstellung (Architekt / Bauträger)', 6, 1, NULL, '2019-06-17 11:08:04', '2019-06-17 11:08:04'),
(36, 'Aufstellung der geplanten Eigenleistungen', 6, 1, NULL, '2019-06-17 11:08:12', '2019-06-17 11:08:12'),
(37, 'Detaillierte Aufstellung evtl. geplanter Modernisierungskosten', 6, 1, NULL, '2019-06-17 11:08:20', '2019-06-17 11:08:20'),
(38, 'Mietaufstellung inkl. Nettokaltmieten', 6, 1, NULL, '2019-06-17 11:08:30', '2019-06-17 11:08:30'),
(39, 'Kopie Mietverträge', 6, 1, '2019-06-18 11:37:16', '2019-06-17 11:09:06', '2019-06-18 11:37:16'),
(40, 'Kopie Bankguthaben / Bausparguthaben / Lebensversicherungs-Rückkaufswerte, etc', 7, 1, NULL, '2019-06-17 11:10:30', '2019-06-17 11:10:30'),
(41, 'Grundbuchauszug bei weiterem Immobilienbesitz', 7, 1, NULL, '2019-06-17 11:10:41', '2019-06-17 11:10:41'),
(42, 'Mietverträge', 6, 1, NULL, '2019-06-18 11:37:25', '2019-06-18 11:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_categories`
--

CREATE TABLE `checklist_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `checklist_categories`
--

INSERT INTO `checklist_categories` (`id`, `name`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Test', 1, '2019-06-17 10:41:30', '2019-06-17 10:40:27', '2019-06-17 10:41:30'),
(2, 'Persönliche Unterlagen', 1, NULL, '2019-06-17 10:41:36', '2019-06-17 10:41:36'),
(3, 'Einnahmen', 1, NULL, '2019-06-17 10:42:11', '2019-06-17 10:42:11'),
(4, 'Ausgaben', 1, NULL, '2019-06-17 10:51:11', '2019-06-17 10:51:11'),
(5, 'Verbindlichkeiten', 1, NULL, '2019-06-17 11:03:16', '2019-06-17 11:03:16'),
(6, 'Finanzierungsobjekt', 1, NULL, '2019-06-17 11:03:31', '2019-06-17 11:03:31'),
(7, 'Vermögen', 1, NULL, '2019-06-17 11:09:56', '2019-06-17 11:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_ehepartner`
--

CREATE TABLE `checklist_ehepartner` (
  `kunden_id` int(10) UNSIGNED NOT NULL,
  `checklist_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `checklist_ehepartner`
--

INSERT INTO `checklist_ehepartner` (`kunden_id`, `checklist_id`) VALUES
(1, 1),
(1, 10),
(1, 11),
(1, 12),
(1, 14),
(1, 17),
(1, 21),
(1, 23),
(1, 40),
(1, 36),
(1, 15),
(1, 16),
(1, 41),
(1, 6),
(1, 4),
(1, 5),
(1, 32),
(100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_kunden`
--

CREATE TABLE `checklist_kunden` (
  `kunden_id` int(10) UNSIGNED NOT NULL,
  `checklist_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `checklist_kunden`
--

INSERT INTO `checklist_kunden` (`kunden_id`, `checklist_id`) VALUES
(1, 2),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 31),
(1, 39),
(1, 38),
(1, 32),
(1, 27),
(1, 35),
(1, 4),
(1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `customer_timelines`
--

CREATE TABLE `customer_timelines` (
  `id` int(10) UNSIGNED NOT NULL,
  `kundens_id` int(10) UNSIGNED NOT NULL,
  `calculation_id` int(10) UNSIGNED NOT NULL,
  `darlehen` int(11) NOT NULL,
  `zinsstaz` int(11) NOT NULL,
  `tilgung` int(11) NOT NULL,
  `laufzeit` int(11) NOT NULL,
  `rate_monatl` int(11) NOT NULL,
  `restschuld` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(3) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postal_code` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `street_num` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `address`, `postal_code`, `city`, `street`, `street_num`, `created_at`, `updated_at`) VALUES
(1, 'Nettetal - Kintzelmann', 'dssdf', 47906, 'Nordrhein-Westfalen - Kempen', 'Görtschesweg', 4, '2019-02-26 08:10:18', '2019-02-26 08:10:18'),
(2, 'Hückelhoven - Sternad', NULL, 12345, 'Hückelhoven', 'Hückelstraße', 3, '2019-02-26 08:20:21', '2019-02-26 08:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `immobilies`
--

CREATE TABLE `immobilies` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kaufpreis` int(11) NOT NULL,
  `kosten_umbau_modernisierung` int(11) NOT NULL,
  `kosten_notar_grundbuch` int(11) NOT NULL,
  `grunderwerbssteuer` int(11) NOT NULL,
  `maklerkosten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `kundens`
--

CREATE TABLE `kundens` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vorname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nachname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strasse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plz` int(11) NOT NULL,
  `wohnort` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geburtsdatum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kaufpreis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostenumbau` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kostennotar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grunderwerbssteuer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maklerkosten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gesamtkosten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eigenkapital` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finanzierungsbedarf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ehepartner_enabled` tinyint(2) DEFAULT 0,
  `ehepartner_vorname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_nachname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_telefon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ehepartner_geburtsdatum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kundens`
--

INSERT INTO `kundens` (`id`, `created_at`, `updated_at`, `user_id`, `vorname`, `nachname`, `strasse`, `plz`, `wohnort`, `mail`, `telefon`, `geburtsdatum`, `kaufpreis`, `kostenumbau`, `kostennotar`, `grunderwerbssteuer`, `maklerkosten`, `gesamtkosten`, `eigenkapital`, `finanzierungsbedarf`, `loan_amount`, `ehepartner_enabled`, `ehepartner_vorname`, `ehepartner_nachname`, `ehepartner_mail`, `ehepartner_telefon`, `ehepartner_geburtsdatum`) VALUES
(1, '2019-02-26 08:10:55', '2020-04-16 04:14:55', 5, 'Patrick', 'Dierig', 'Görtschesweg, 4', 47906, 'Nordrhein-Westfalen - Kempen', 'p-dierig@einfachmedial.de', '015204967292', '2017-10-30', '300000', '20000', '2.6', '6.5', '4.87', '361910.00', '0', '361910.00', '3619010.00', 0, 'Bettina', 'Dierig', 'p-dierig@einfachmedial.de', '015204967292', '1993-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_11_21_101915_create_tests_table', 1),
(2, '2018_11_21_130836_create_timeline', 2),
(3, '2018_11_21_134854_update_zeitstrahl_tabelle', 3),
(4, '2018_11_21_161940_update_zeitstrahl_tabelle_zwei', 4),
(5, '2019_06_11_055129_create_checklists_table', 5),
(6, '2019_06_12_092208_create_checklist_ehepartner_table', 6),
(7, '2019_06_12_112354_add_category_column_to_checklists_table', 7),
(8, '2019_06_13_044648_create_checklist_categories_table', 8),
(9, '2019_06_18_123018_create_customer_timelines_table', 9),
(11, '2019_08_24_100742_create_calc_result_table', 10),
(12, '2019_08_26_100613_add_two_columns_to_repayments_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('p-dierig@einfachmedial.de', '$2y$10$JyeHPWr3pd.uj1BKuUVxouxgZUl.jdviX6QPo9u61F49fsStB25jm', '2019-06-05 10:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `repayments`
--

CREATE TABLE `repayments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `zinsen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tilgung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `darlehensrest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundens_id` int(11) NOT NULL,
  `repayment_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonder_tilgung` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `repayments`
--

INSERT INTO `repayments` (`id`, `created_at`, `updated_at`, `zinsen`, `tilgung`, `darlehensrest`, `kundens_id`, `repayment_date`, `rate`, `sonder_tilgung`) VALUES
(9396, '2020-04-16 04:12:34', '2020-04-16 04:12:34', '__', '__', '3619010', 1, '7/2020', '__', '__'),
(9397, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6031.68', '-2756.00', '3621766.00', 1, '8/2020', '3275.68', '0.00'),
(9398, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6036.28', '-2760.60', '3624526.60', 1, '9/2020', '3275.68', '0.00'),
(9399, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6040.88', '-2765.20', '3627291.80', 1, '10/2020', '3275.68', '0.00'),
(9400, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6045.49', '-2769.81', '3630061.60', 1, '11/2020', '3275.68', '0.00'),
(9401, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6050.10', '-2774.42', '3632836.03', 1, '12/2020', '3275.68', '0.00'),
(9402, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6054.73', '-2779.05', '3635615.07', 1, '1/2021', '3275.68', '0.00'),
(9403, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6059.36', '-2783.68', '3638398.75', 1, '2/2021', '3275.68', '0.00'),
(9404, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6064.00', '-2788.32', '3641187.07', 1, '3/2021', '3275.68', '0.00'),
(9405, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6068.65', '-2792.97', '3643980.03', 1, '4/2021', '3275.68', '0.00'),
(9406, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6073.30', '-2797.62', '3646777.65', 1, '5/2021', '3275.68', '0.00'),
(9407, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6077.96', '-2802.28', '3649579.94', 1, '6/2021', '3275.68', '0.00'),
(9408, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6082.63', '-2806.95', '3652386.89', 1, '7/2021', '3275.68', '0.00'),
(9409, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6087.31', '-2811.63', '3655198.52', 1, '8/2021', '3275.68', '0.00'),
(9410, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6092.00', '-2816.32', '3658014.84', 1, '9/2021', '3275.68', '0.00'),
(9411, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6096.69', '-2821.01', '3660835.85', 1, '10/2021', '3275.68', '0.00'),
(9412, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6101.39', '-2825.71', '3663661.56', 1, '11/2021', '3275.68', '0.00'),
(9413, '2020-04-16 04:12:35', '2020-04-16 04:12:35', '6106.10', '-2830.42', '3666491.99', 1, '12/2021', '3275.68', '0.00'),
(9414, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6110.82', '-2835.14', '3669327.13', 1, '1/2022', '3275.68', '0.00'),
(9415, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6115.55', '-2839.87', '3672166.99', 1, '2/2022', '3275.68', '0.00'),
(9416, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6120.28', '-2844.60', '3675011.59', 1, '3/2022', '3275.68', '0.00'),
(9417, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6125.02', '-2849.34', '3677860.93', 1, '4/2022', '3275.68', '0.00'),
(9418, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6129.77', '-2854.09', '3680715.02', 1, '5/2022', '3275.68', '0.00'),
(9419, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6134.53', '-2858.85', '3683573.86', 1, '6/2022', '3275.68', '0.00'),
(9420, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6139.29', '-2863.61', '3686437.47', 1, '7/2022', '3275.68', '0.00'),
(9421, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6144.06', '-2868.38', '3689305.86', 1, '8/2022', '3275.68', '0.00'),
(9422, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6148.84', '-2873.16', '3692179.02', 1, '9/2022', '3275.68', '0.00'),
(9423, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6153.63', '-2877.95', '3695056.97', 1, '10/2022', '3275.68', '0.00'),
(9424, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6158.43', '-2882.75', '3697939.72', 1, '11/2022', '3275.68', '0.00'),
(9425, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6163.23', '-2887.55', '3700827.27', 1, '12/2022', '3275.68', '0.00'),
(9426, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6168.05', '-2892.37', '3703719.64', 1, '1/2023', '3275.68', '0.00'),
(9427, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6172.87', '-2897.19', '3706616.82', 1, '2/2023', '3275.68', '0.00'),
(9428, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6177.69', '-2902.01', '3709518.84', 1, '3/2023', '3275.68', '0.00'),
(9429, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6182.53', '-2906.85', '3712425.69', 1, '4/2023', '3275.68', '0.00'),
(9430, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6187.38', '-2911.70', '3715337.39', 1, '5/2023', '3275.68', '0.00'),
(9431, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6192.23', '-2916.55', '3718253.93', 1, '6/2023', '3275.68', '0.00'),
(9432, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6197.09', '-2921.41', '3721175.34', 1, '7/2023', '3275.68', '0.00'),
(9433, '2020-04-16 04:12:36', '2020-04-16 04:12:36', '6201.96', '-2926.28', '3724101.62', 1, '8/2023', '3275.68', '0.00'),
(9434, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6206.84', '-2931.16', '3727032.78', 1, '9/2023', '3275.68', '0.00'),
(9435, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6211.72', '-2936.04', '3729968.82', 1, '10/2023', '3275.68', '0.00'),
(9436, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6216.61', '-2940.93', '3732909.75', 1, '11/2023', '3275.68', '0.00'),
(9437, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6221.52', '-2945.84', '3735855.59', 1, '12/2023', '3275.68', '0.00'),
(9438, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6226.43', '-2950.75', '3738806.34', 1, '1/2024', '3275.68', '0.00'),
(9439, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6231.34', '-2955.66', '3741762.00', 1, '2/2024', '3275.68', '0.00'),
(9440, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6236.27', '-2960.59', '3744722.59', 1, '3/2024', '3275.68', '0.00'),
(9441, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6241.20', '-2965.52', '3747688.12', 1, '4/2024', '3275.68', '0.00'),
(9442, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6246.15', '-2970.47', '3750658.58', 1, '5/2024', '3275.68', '0.00'),
(9443, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6251.10', '-2975.42', '3753634.00', 1, '6/2024', '3275.68', '0.00'),
(9444, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6256.06', '-2980.38', '3756614.38', 1, '7/2024', '3275.68', '0.00'),
(9445, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6261.02', '-2985.34', '3759599.72', 1, '8/2024', '3275.68', '0.00'),
(9446, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6266.00', '-2990.32', '3762590.04', 1, '9/2024', '3275.68', '0.00'),
(9447, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6270.98', '-2995.30', '3765585.34', 1, '10/2024', '3275.68', '0.00'),
(9448, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6275.98', '-3000.30', '3768585.64', 1, '11/2024', '3275.68', '0.00'),
(9449, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6280.98', '-3005.30', '3771590.93', 1, '12/2024', '3275.68', '0.00'),
(9450, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6285.98', '-3010.30', '3774601.24', 1, '1/2025', '3275.68', '0.00'),
(9451, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6291.00', '-3015.32', '3777616.56', 1, '2/2025', '3275.68', '0.00'),
(9452, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6296.03', '-3020.35', '3780636.91', 1, '3/2025', '3275.68', '0.00'),
(9453, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6301.06', '-3025.38', '3783662.29', 1, '4/2025', '3275.68', '0.00'),
(9454, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6306.10', '-3030.42', '3786692.71', 1, '5/2025', '3275.68', '0.00'),
(9455, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6311.15', '-3035.47', '3789728.19', 1, '6/2025', '3275.68', '0.00'),
(9456, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6316.21', '-3040.53', '3792768.72', 1, '7/2025', '3275.68', '0.00'),
(9457, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6321.28', '-3045.60', '3795814.32', 1, '8/2025', '3275.68', '0.00'),
(9458, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6326.36', '-3050.68', '3798865.00', 1, '9/2025', '3275.68', '0.00'),
(9459, '2020-04-16 04:12:37', '2020-04-16 04:12:37', '6331.44', '-3055.76', '3801920.76', 1, '10/2025', '3275.68', '0.00'),
(9460, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6336.53', '-3060.85', '3804981.62', 1, '11/2025', '3275.68', '0.00'),
(9461, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6341.64', '-3065.96', '3808047.57', 1, '12/2025', '3275.68', '0.00'),
(9462, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6346.75', '-3071.07', '3811118.64', 1, '1/2026', '3275.68', '0.00'),
(9463, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6351.86', '-3076.18', '3814194.82', 1, '2/2026', '3275.68', '0.00'),
(9464, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6356.99', '-3081.31', '3817276.14', 1, '3/2026', '3275.68', '0.00'),
(9465, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6362.13', '-3086.45', '3820362.58', 1, '4/2026', '3275.68', '0.00'),
(9466, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6367.27', '-3091.59', '3823454.17', 1, '5/2026', '3275.68', '0.00'),
(9467, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6372.42', '-3096.74', '3826550.92', 1, '6/2026', '3275.68', '0.00'),
(9468, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6377.58', '-3101.90', '3829652.82', 1, '7/2026', '3275.68', '0.00'),
(9469, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6382.75', '-3107.07', '3832759.90', 1, '8/2026', '3275.68', '0.00'),
(9470, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6387.93', '-3112.25', '3835872.15', 1, '9/2026', '3275.68', '0.00'),
(9471, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6393.12', '-3117.44', '3838989.59', 1, '10/2026', '3275.68', '0.00'),
(9472, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6398.32', '-3122.64', '3842112.23', 1, '11/2026', '3275.68', '0.00'),
(9473, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6403.52', '-3127.84', '3845240.07', 1, '12/2026', '3275.68', '0.00'),
(9474, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6408.73', '-3133.05', '3848373.12', 1, '1/2027', '3275.68', '0.00'),
(9475, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6413.96', '-3138.28', '3851511.39', 1, '2/2027', '3275.68', '0.00'),
(9476, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6419.19', '-3143.51', '3854654.90', 1, '3/2027', '3275.68', '0.00'),
(9477, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6424.42', '-3148.74', '3857803.65', 1, '4/2027', '3275.68', '0.00'),
(9478, '2020-04-16 04:12:38', '2020-04-16 04:12:38', '6429.67', '-3153.99', '3860957.64', 1, '5/2027', '3275.68', '0.00'),
(9479, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6434.93', '-3159.25', '3864116.89', 1, '6/2027', '3275.68', '0.00'),
(9480, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6440.19', '-3164.51', '3867281.40', 1, '7/2027', '3275.68', '0.00'),
(9481, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6445.47', '-3169.79', '3870451.19', 1, '8/2027', '3275.68', '0.00'),
(9482, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6450.75', '-3175.07', '3873626.26', 1, '9/2027', '3275.68', '0.00'),
(9483, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6456.04', '-3180.36', '3876806.63', 1, '10/2027', '3275.68', '0.00'),
(9484, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6461.34', '-3185.66', '3879992.29', 1, '11/2027', '3275.68', '0.00'),
(9485, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6466.65', '-3190.97', '3883183.27', 1, '12/2027', '3275.68', '0.00'),
(9486, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6471.97', '-3196.29', '3886379.56', 1, '1/2028', '3275.68', '0.00'),
(9487, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6477.30', '-3201.62', '3889581.18', 1, '2/2028', '3275.68', '0.00'),
(9488, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6482.64', '-3206.96', '3892788.13', 1, '3/2028', '3275.68', '0.00'),
(9489, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6487.98', '-3212.30', '3896000.43', 1, '4/2028', '3275.68', '0.00'),
(9490, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6493.33', '-3217.65', '3899218.09', 1, '5/2028', '3275.68', '0.00'),
(9491, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6498.70', '-3223.02', '3902441.10', 1, '6/2028', '3275.68', '0.00'),
(9492, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6504.07', '-3228.39', '3905669.49', 1, '7/2028', '3275.68', '0.00'),
(9493, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6509.45', '-3233.77', '3908903.26', 1, '8/2028', '3275.68', '0.00'),
(9494, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6514.84', '-3239.16', '3912142.42', 1, '9/2028', '3275.68', '0.00'),
(9495, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6520.24', '-3244.56', '3915386.98', 1, '10/2028', '3275.68', '0.00'),
(9496, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6525.64', '-3249.96', '3918636.94', 1, '11/2028', '3275.68', '0.00'),
(9497, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6531.06', '-3255.38', '3921892.32', 1, '12/2028', '3275.68', '0.00'),
(9498, '2020-04-16 04:12:39', '2020-04-16 04:12:39', '6536.49', '-3260.81', '3925153.13', 1, '1/2029', '3275.68', '0.00'),
(9499, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6541.92', '-3266.24', '3928419.37', 1, '2/2029', '3275.68', '0.00'),
(9500, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6547.37', '-3271.69', '3931691.06', 1, '3/2029', '3275.68', '0.00'),
(9501, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6552.82', '-3277.14', '3934968.20', 1, '4/2029', '3275.68', '0.00'),
(9502, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6558.28', '-3282.60', '3938250.80', 1, '5/2029', '3275.68', '0.00'),
(9503, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6563.75', '-3288.07', '3941538.87', 1, '6/2029', '3275.68', '0.00'),
(9504, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6569.23', '-3293.55', '3944832.42', 1, '7/2029', '3275.68', '0.00'),
(9505, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6574.72', '-3299.04', '3948131.46', 1, '8/2029', '3275.68', '0.00'),
(9506, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6580.22', '-3304.54', '3951436.00', 1, '9/2029', '3275.68', '0.00'),
(9507, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6585.73', '-3310.05', '3954746.05', 1, '10/2029', '3275.68', '0.00'),
(9508, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6591.24', '-3315.56', '3958061.61', 1, '11/2029', '3275.68', '0.00'),
(9509, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6596.77', '-3321.09', '3961382.70', 1, '12/2029', '3275.68', '0.00'),
(9510, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6602.30', '-3326.62', '3964709.32', 1, '1/2030', '3275.68', '0.00'),
(9511, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6607.85', '-3332.17', '3968041.49', 1, '2/2030', '3275.68', '0.00'),
(9512, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6613.40', '-3337.72', '3971379.21', 1, '3/2030', '3275.68', '0.00'),
(9513, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6618.97', '-3343.29', '3974722.50', 1, '4/2030', '3275.68', '0.00'),
(9514, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6624.54', '-3348.86', '3978071.36', 1, '5/2030', '3275.68', '0.00'),
(9515, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6630.12', '-3354.44', '3981425.80', 1, '6/2030', '3275.68', '0.00'),
(9516, '2020-04-16 04:12:40', '2020-04-16 04:12:40', '6635.71', '-3360.03', '3984785.83', 1, '7/2030', '3275.68', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `hobby` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundens_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `hobby`, `kundens_id`, `created_at`, `updated_at`) VALUES
(1, 'hobby test name', 1, '2018-11-21 18:07:51', '2018-11-21 18:07:51'),
(2, 'hobby test name1', 1, '2018-11-21 18:08:18', '2018-11-21 18:08:18'),
(3, 'hobby test name2_2', 2, '2018-11-21 18:10:12', '2018-11-21 18:10:12');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(10) UNSIGNED NOT NULL,
  `timeline` int(191) DEFAULT NULL,
  `calculation_id` int(11) NOT NULL,
  `kundens_id` int(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finanzierungsbedarf_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jahreszins_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laufzeit_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_monatlich_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restschuld_phase_eins` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finanzierungsbedarf_phase_zwei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jahreszins_phase_zwei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laufzeit_phase_zwei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_monatlich_phase_zwei` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restschuld_ende` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `group` int(11) DEFAULT 0,
  `admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `surname`, `phone`, `mail_address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `group`, `admin`) VALUES
(5, 'Admin User', 'admin@admin.com', 'admin', '1234', 'homezcasdfsdfas', NULL, '$2y$10$C.aRlHjyGj0.ixSzp81Lo.6DQcV9Ii9vx3jRQbA.OQp34RiyFKhOG', 'xoOTPfUQXUPXxAk8NOQrgzb4g3SSeUBXpNmgLrTGMY3XdzHmQP3bXex1CIoz', '2019-02-18 15:23:29', '2019-02-25 10:33:49', 1, 1, 1),
(27, 'Patrick', 'p-dierig@einfachmedial.de', 'Dierig', '015204967292', 'p-dierig@einfachmedial.de', NULL, '$2y$10$fOTD1gNVZmPS6GV6WwanXu0ZZI.3IiEPw0bxXrVSjBs3Z6WS4BZ8S', NULL, '2019-02-26 08:08:34', '2019-02-26 08:10:30', 1, 1, 1),
(28, 'Patrick Dierig', 'patrick.dierig@mkhyp.de', NULL, NULL, NULL, NULL, '$2y$10$p.QK4aA72i2TbQvzcQN6zepBmMgQFEus0uCFkOJEASFNUMRpPLehu', NULL, NULL, NULL, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angebote`
--
ALTER TABLE `angebote`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `calculation`
--
ALTER TABLE `calculation`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `calc_result`
--
ALTER TABLE `calc_result`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `checklist_categories`
--
ALTER TABLE `checklist_categories`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `customer_timelines`
--
ALTER TABLE `customer_timelines`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `immobilies`
--
ALTER TABLE `immobilies`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `kundens`
--
ALTER TABLE `kundens`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`) USING BTREE;

--
-- Indexes for table `repayments`
--
ALTER TABLE `repayments`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `kundel_id_idx` (`repayment_date`) USING BTREE,
  ADD KEY `repayment_date_idx` (`repayment_date`) USING BTREE;

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angebote`
--
ALTER TABLE `angebote`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=653;

--
-- AUTO_INCREMENT for table `calculation`
--
ALTER TABLE `calculation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calc_result`
--
ALTER TABLE `calc_result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `checklist_categories`
--
ALTER TABLE `checklist_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_timelines`
--
ALTER TABLE `customer_timelines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `immobilies`
--
ALTER TABLE `immobilies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kundens`
--
ALTER TABLE `kundens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `repayments`
--
ALTER TABLE `repayments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9517;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
