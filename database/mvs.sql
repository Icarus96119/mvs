/*
 Navicat Premium Data Transfer

 Source Server         : e_xampp_php_7.4.1
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : mvs

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 12/03/2020 22:02:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for angebote
-- ----------------------------
DROP TABLE IF EXISTS `angebote`;
CREATE TABLE `angebote`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teildarlehen` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `darlehensbetrag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sollzinsbindung` int(11) NULL DEFAULT NULL,
  `sollzinssatz` int(11) NULL DEFAULT NULL,
  `eff_jahreszins_pangv` int(11) NULL DEFAULT NULL,
  `kaufpreis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kostenumbau` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kostennotar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `grunderwerbssteuer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `maklerkosten` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gesamtkosten` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `eigenkapital` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `finanzierungsbedarf` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pdf_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `customer_id` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 533 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of angebote
-- ----------------------------
INSERT INTO `angebote` VALUES (466, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '466.pdf', 1);
INSERT INTO `angebote` VALUES (467, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '467.pdf', 1);
INSERT INTO `angebote` VALUES (468, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '468.pdf', 1);
INSERT INTO `angebote` VALUES (469, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '469.pdf', 1);
INSERT INTO `angebote` VALUES (470, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '470.pdf', 1);
INSERT INTO `angebote` VALUES (471, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '471.pdf', 1);
INSERT INTO `angebote` VALUES (472, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '472.pdf', 1);
INSERT INTO `angebote` VALUES (473, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '473.pdf', 1);
INSERT INTO `angebote` VALUES (474, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '474.pdf', 1);
INSERT INTO `angebote` VALUES (475, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '475.pdf', 1);
INSERT INTO `angebote` VALUES (476, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '476.pdf', 1);
INSERT INTO `angebote` VALUES (477, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '477.pdf', 1);
INSERT INTO `angebote` VALUES (478, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '478.pdf', 1);
INSERT INTO `angebote` VALUES (479, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '479.pdf', 1);
INSERT INTO `angebote` VALUES (480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '480.pdf', 1);
INSERT INTO `angebote` VALUES (481, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '481.pdf', 1);
INSERT INTO `angebote` VALUES (482, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '482.pdf', 1);
INSERT INTO `angebote` VALUES (483, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '483.pdf', 1);
INSERT INTO `angebote` VALUES (484, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '484.pdf', 1);
INSERT INTO `angebote` VALUES (485, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '485.pdf', 1);
INSERT INTO `angebote` VALUES (486, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '486.pdf', 1);
INSERT INTO `angebote` VALUES (487, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '487.pdf', 1);
INSERT INTO `angebote` VALUES (488, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '488.pdf', 1);
INSERT INTO `angebote` VALUES (489, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '489.pdf', 1);
INSERT INTO `angebote` VALUES (490, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '490.pdf', 1);
INSERT INTO `angebote` VALUES (491, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '491.pdf', 1);
INSERT INTO `angebote` VALUES (492, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '492.pdf', 1);
INSERT INTO `angebote` VALUES (493, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '493.pdf', 1);
INSERT INTO `angebote` VALUES (494, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '494.pdf', 1);
INSERT INTO `angebote` VALUES (495, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '495.pdf', 1);
INSERT INTO `angebote` VALUES (496, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '496.pdf', 1);
INSERT INTO `angebote` VALUES (497, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '497.pdf', 1);
INSERT INTO `angebote` VALUES (498, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '498.pdf', 1);
INSERT INTO `angebote` VALUES (499, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '499.pdf', 1);
INSERT INTO `angebote` VALUES (500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500.pdf', 1);
INSERT INTO `angebote` VALUES (501, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '501.pdf', 1);
INSERT INTO `angebote` VALUES (502, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '502.pdf', 1);
INSERT INTO `angebote` VALUES (503, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '503.pdf', 1);
INSERT INTO `angebote` VALUES (504, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '504.pdf', 1);
INSERT INTO `angebote` VALUES (505, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '505.pdf', 1);
INSERT INTO `angebote` VALUES (506, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '506.pdf', 1);
INSERT INTO `angebote` VALUES (507, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '507.pdf', 1);
INSERT INTO `angebote` VALUES (508, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '508.pdf', 1);
INSERT INTO `angebote` VALUES (509, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '509.pdf', 1);
INSERT INTO `angebote` VALUES (510, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '510.pdf', 1);
INSERT INTO `angebote` VALUES (511, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '511.pdf', 1);
INSERT INTO `angebote` VALUES (512, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '512.pdf', 1);
INSERT INTO `angebote` VALUES (513, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '513.pdf', 1);
INSERT INTO `angebote` VALUES (514, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '514.pdf', 1);
INSERT INTO `angebote` VALUES (515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '515.pdf', 1);
INSERT INTO `angebote` VALUES (516, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '516.pdf', 1);
INSERT INTO `angebote` VALUES (517, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '517.pdf', 1);
INSERT INTO `angebote` VALUES (518, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '518.pdf', 1);
INSERT INTO `angebote` VALUES (519, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '519.pdf', 1);
INSERT INTO `angebote` VALUES (520, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '520.pdf', 1);
INSERT INTO `angebote` VALUES (521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '521.pdf', 1);
INSERT INTO `angebote` VALUES (522, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '522.pdf', 1);
INSERT INTO `angebote` VALUES (523, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '523.pdf', 1);
INSERT INTO `angebote` VALUES (524, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '524.pdf', 1);
INSERT INTO `angebote` VALUES (525, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '525.pdf', 1);
INSERT INTO `angebote` VALUES (526, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '526.pdf', 1);
INSERT INTO `angebote` VALUES (527, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '527.pdf', 1);
INSERT INTO `angebote` VALUES (528, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '528.pdf', 1);
INSERT INTO `angebote` VALUES (529, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '529.pdf', 1);
INSERT INTO `angebote` VALUES (530, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '530.pdf', 1);
INSERT INTO `angebote` VALUES (531, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '531.pdf', 1);
INSERT INTO `angebote` VALUES (532, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '532.pdf', 1);

-- ----------------------------
-- Table structure for calc_result
-- ----------------------------
DROP TABLE IF EXISTS `calc_result`;
CREATE TABLE `calc_result`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kunden_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_period` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_month` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_year` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_discount` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0,00',
  `borrowing_rate` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `montly_deposit_val` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_month` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_year` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_unsheduled_val` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_to_month` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `annual_to_year` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `onetime_unsheduled_month` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `onetime_unsheduled_year` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `onetime_unsheduled_val` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_borrowing_rate` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_repayment_rate_inp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `registery_fees` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `payment_amount` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `repayment_date_inp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `message_payment_opt` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `outstanding_balance` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `effective_interest` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `connection_credit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `new_rate_inp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total_maturity` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sparsumme` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0,00',
  `monthly_interest` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0,00',
  `monthly_saving` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0,00',
  `monthly_payment` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0,00',
  `laufzeit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '1',
  `bausparer_flag` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `acquisition_fee` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bausparer_pay_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calc_result
-- ----------------------------
INSERT INTO `calc_result` VALUES (12, '1', '10', '7', '2020', '0.00', '2', '3275,68', '1', '2020', '0', '1', '2024', '12', '2032', '0', '2', '2,55', NULL, NULL, '735,00', '356000,00', '9,04', NULL, '0,00', '0,01', '0,00', '1.349,83', '10/1', '356000,00', '593,33', '1186,67', '1780,00', '10', 'false', '1,2', 'one');

-- ----------------------------
-- Table structure for calculation
-- ----------------------------
DROP TABLE IF EXISTS `calculation`;
CREATE TABLE `calculation`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `angebotdate` date NULL DEFAULT NULL,
  `kunden_id` int(191) NOT NULL,
  `enabled` tinyint(2) NOT NULL DEFAULT 1,
  `prepared_by` int(11) NOT NULL,
  `bank` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `annuities` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `to_interest` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `effectiveness` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fixed_interest_rates` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `monthly_loan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `residual_debt_interest_rate` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `calculated_luaf_time` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `net_loan_amount` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `initial_interest` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `optional_sound_recovery` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calculation
-- ----------------------------
INSERT INTO `calculation` VALUES (1, '2019-04-04', 1, 1, 5, 'Deutsche Bank', 'ausgesetzt', '2%', '2', '10 Jahre', '917,29', '200.970,44', '33 Jahre, 5 Monate', '325.500', '1%', '2%', '2019-04-03 19:01:07', '2019-06-19 15:54:36');

-- ----------------------------
-- Table structure for checklist_categories
-- ----------------------------
DROP TABLE IF EXISTS `checklist_categories`;
CREATE TABLE `checklist_categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checklist_categories
-- ----------------------------
INSERT INTO `checklist_categories` VALUES (1, 'Test', 1, '2019-06-17 16:11:30', '2019-06-17 16:10:27', '2019-06-17 16:11:30');
INSERT INTO `checklist_categories` VALUES (2, 'Persönliche Unterlagen', 1, NULL, '2019-06-17 16:11:36', '2019-06-17 16:11:36');
INSERT INTO `checklist_categories` VALUES (3, 'Einnahmen', 1, NULL, '2019-06-17 16:12:11', '2019-06-17 16:12:11');
INSERT INTO `checklist_categories` VALUES (4, 'Ausgaben', 1, NULL, '2019-06-17 16:21:11', '2019-06-17 16:21:11');
INSERT INTO `checklist_categories` VALUES (5, 'Verbindlichkeiten', 1, NULL, '2019-06-17 16:33:16', '2019-06-17 16:33:16');
INSERT INTO `checklist_categories` VALUES (6, 'Finanzierungsobjekt', 1, NULL, '2019-06-17 16:33:31', '2019-06-17 16:33:31');
INSERT INTO `checklist_categories` VALUES (7, 'Vermögen', 1, NULL, '2019-06-17 16:39:56', '2019-06-17 16:39:56');

-- ----------------------------
-- Table structure for checklist_ehepartner
-- ----------------------------
DROP TABLE IF EXISTS `checklist_ehepartner`;
CREATE TABLE `checklist_ehepartner`  (
  `kunden_id` int(10) UNSIGNED NOT NULL,
  `checklist_id` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checklist_ehepartner
-- ----------------------------
INSERT INTO `checklist_ehepartner` VALUES (1, 1);
INSERT INTO `checklist_ehepartner` VALUES (1, 10);
INSERT INTO `checklist_ehepartner` VALUES (1, 11);
INSERT INTO `checklist_ehepartner` VALUES (1, 12);
INSERT INTO `checklist_ehepartner` VALUES (1, 14);
INSERT INTO `checklist_ehepartner` VALUES (1, 17);
INSERT INTO `checklist_ehepartner` VALUES (1, 21);
INSERT INTO `checklist_ehepartner` VALUES (1, 23);
INSERT INTO `checklist_ehepartner` VALUES (1, 40);
INSERT INTO `checklist_ehepartner` VALUES (1, 36);
INSERT INTO `checklist_ehepartner` VALUES (1, 15);
INSERT INTO `checklist_ehepartner` VALUES (1, 16);
INSERT INTO `checklist_ehepartner` VALUES (1, 41);
INSERT INTO `checklist_ehepartner` VALUES (1, 6);
INSERT INTO `checklist_ehepartner` VALUES (1, 4);
INSERT INTO `checklist_ehepartner` VALUES (1, 5);
INSERT INTO `checklist_ehepartner` VALUES (1, 32);
INSERT INTO `checklist_ehepartner` VALUES (100, 200);

-- ----------------------------
-- Table structure for checklist_kunden
-- ----------------------------
DROP TABLE IF EXISTS `checklist_kunden`;
CREATE TABLE `checklist_kunden`  (
  `kunden_id` int(10) UNSIGNED NOT NULL,
  `checklist_id` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checklist_kunden
-- ----------------------------
INSERT INTO `checklist_kunden` VALUES (1, 2);
INSERT INTO `checklist_kunden` VALUES (1, 5);
INSERT INTO `checklist_kunden` VALUES (1, 6);
INSERT INTO `checklist_kunden` VALUES (1, 7);
INSERT INTO `checklist_kunden` VALUES (1, 8);
INSERT INTO `checklist_kunden` VALUES (1, 9);
INSERT INTO `checklist_kunden` VALUES (1, 31);
INSERT INTO `checklist_kunden` VALUES (1, 39);
INSERT INTO `checklist_kunden` VALUES (1, 38);
INSERT INTO `checklist_kunden` VALUES (1, 32);
INSERT INTO `checklist_kunden` VALUES (1, 27);
INSERT INTO `checklist_kunden` VALUES (1, 35);
INSERT INTO `checklist_kunden` VALUES (1, 4);

-- ----------------------------
-- Table structure for checklists
-- ----------------------------
DROP TABLE IF EXISTS `checklists`;
CREATE TABLE `checklists`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checklists
-- ----------------------------
INSERT INTO `checklists` VALUES (1, 'Test', 0, 1, '2019-06-12 16:02:41', '2019-06-12 12:35:45', '2019-06-12 16:02:41');
INSERT INTO `checklists` VALUES (2, 'Test 2', 0, 1, '2019-06-12 16:02:42', '2019-06-12 12:35:51', '2019-06-12 16:02:42');
INSERT INTO `checklists` VALUES (3, 'TEST', 1, 1, '2019-06-17 16:10:38', '2019-06-17 16:10:32', '2019-06-17 16:10:38');
INSERT INTO `checklists` VALUES (4, 'Kopie Ausweis in Farbe beidseitig', 2, 1, NULL, '2019-06-17 16:11:47', '2019-06-17 16:11:47');
INSERT INTO `checklists` VALUES (5, 'Anbei Darlehensanfrage (bitte ausfüllen und gegenzeichnen)', 2, 1, NULL, '2019-06-17 16:12:03', '2019-06-17 16:12:03');
INSERT INTO `checklists` VALUES (6, 'Lohn- / Gehaltsabrechnungen (die letzten 3)', 3, 1, NULL, '2019-06-17 16:12:34', '2019-06-17 16:12:34');
INSERT INTO `checklists` VALUES (7, 'Abrechnungen Nebentätigkeit (die letzten 3)', 3, 1, NULL, '2019-06-17 16:12:57', '2019-06-17 16:17:31');
INSERT INTO `checklists` VALUES (8, 'Bezügemitteilungen (die letzte)', 3, 1, NULL, '2019-06-17 16:17:24', '2019-06-17 16:17:24');
INSERT INTO `checklists` VALUES (9, 'Lohnsteuerbescheinigung  Vorjahr oder Dezember-Abrechnung des Vorjahres', 3, 1, NULL, '2019-06-17 16:17:43', '2019-06-17 16:17:47');
INSERT INTO `checklists` VALUES (10, 'Letzter vorliegender Einkommensteuerbescheid mit dazugehöriger Erklärung (inkl. aller Anlagen)', 3, 1, NULL, '2019-06-17 16:19:00', '2019-06-17 16:19:20');
INSERT INTO `checklists` VALUES (11, 'Ihre letzten 3 Bilanzen / Gewinnermittlungen sowie die aktuelle BWA mit Summen- und Saldenliste', 3, 1, NULL, '2019-06-17 16:19:15', '2019-06-17 16:19:15');
INSERT INTO `checklists` VALUES (12, 'Elterngeldbescheid', 3, 1, NULL, '2019-06-17 16:19:32', '2019-06-17 16:19:32');
INSERT INTO `checklists` VALUES (13, 'Elterngeldbescheid', 3, 1, '2019-06-17 16:19:53', '2019-06-17 16:19:48', '2019-06-17 16:19:53');
INSERT INTO `checklists` VALUES (14, 'Nachweis sonstige Einkünfte', 3, 1, NULL, '2019-06-17 16:20:07', '2019-06-17 16:20:07');
INSERT INTO `checklists` VALUES (15, 'Aktuelle Renteninformation / Versorgungsauskunft / Beamtenpension / Nachweis privater Rentenversicherungen', 3, 1, NULL, '2019-06-17 16:20:39', '2019-06-17 16:20:39');
INSERT INTO `checklists` VALUES (16, 'Mietaufstellung inkl. Nettokaltmieten', 3, 1, NULL, '2019-06-17 16:20:51', '2019-06-17 16:20:51');
INSERT INTO `checklists` VALUES (17, 'Kopie Mietverträge', 3, 1, NULL, '2019-06-17 16:21:01', '2019-06-17 16:21:01');
INSERT INTO `checklists` VALUES (18, 'Nachweis private Krankenversicherung', 4, 1, NULL, '2019-06-17 16:32:07', '2019-06-17 16:32:07');
INSERT INTO `checklists` VALUES (19, 'Bei bestehenden Immobilienfinanzierungen Kopien der Darlehensverträge mit  letztem Jahreskontoauszug oder aktueller Restschuld', 4, 1, NULL, '2019-06-17 16:32:19', '2019-06-17 16:32:47');
INSERT INTO `checklists` VALUES (20, 'Nachweis Unterhaltsverpflichtungen', 4, 1, NULL, '2019-06-17 16:32:25', '2019-06-17 16:32:44');
INSERT INTO `checklists` VALUES (21, 'Kopie Bankguthaben / Bausparguthaben / Lebensversicherungs-Rückkaufswerte, etc', 4, 1, NULL, '2019-06-17 16:32:41', '2019-06-17 16:32:41');
INSERT INTO `checklists` VALUES (22, 'Kreditverträge Privatkredite bzw. Leasingverträge mit Angabe der monatlichen Belastung  und  letzter Jahreskontoauszug  oder aktueller Restschuld', 5, 1, NULL, '2019-06-17 16:33:01', '2019-06-17 16:33:21');
INSERT INTO `checklists` VALUES (23, 'Exposé oder Link zur Immobilie', 6, 1, NULL, '2019-06-17 16:33:40', '2019-06-17 16:34:59');
INSERT INTO `checklists` VALUES (24, 'Farbfotos von außen', 6, 1, NULL, '2019-06-17 16:33:45', '2019-06-17 16:34:51');
INSERT INTO `checklists` VALUES (25, 'Baubeschreibung', 6, 1, NULL, '2019-06-17 16:33:50', '2019-06-17 16:34:46');
INSERT INTO `checklists` VALUES (26, 'Grundstückskaufvertrag', 6, 1, NULL, '2019-06-17 16:33:57', '2019-06-17 16:34:43');
INSERT INTO `checklists` VALUES (27, 'Grundbuchauszug (nicht älter als 3 Monate)', 6, 1, NULL, '2019-06-17 16:34:10', '2019-06-17 16:34:41');
INSERT INTO `checklists` VALUES (28, 'Aktuelle Flurkarte / Lageplan', 6, 1, NULL, '2019-06-17 16:35:11', '2019-06-17 16:35:11');
INSERT INTO `checklists` VALUES (29, 'Bemaßte Baupläne (Grundriss / Ansicht / Schnitt)', 6, 1, NULL, '2019-06-17 16:35:20', '2019-06-17 16:35:20');
INSERT INTO `checklists` VALUES (30, 'Wohnflächenberechnung', 6, 1, NULL, '2019-06-17 16:35:30', '2019-06-17 16:35:30');
INSERT INTO `checklists` VALUES (31, 'Bruttogrundfläche (BGF)', 6, 1, NULL, '2019-06-17 16:35:45', '2019-06-17 16:35:45');
INSERT INTO `checklists` VALUES (32, 'Erbbaurechtsvertrag', 6, 1, NULL, '2019-06-17 16:35:54', '2019-06-17 16:35:54');
INSERT INTO `checklists` VALUES (33, 'Erbpachtvertrag', 6, 1, NULL, '2019-06-17 16:36:06', '2019-06-17 16:36:06');
INSERT INTO `checklists` VALUES (34, 'Bei Eigentumswohnungen: Teilungserklärung mit Aufteilungsplan', 6, 1, NULL, '2019-06-17 16:37:32', '2019-06-17 16:37:32');
INSERT INTO `checklists` VALUES (35, 'Baukostenaufstellung (Architekt / Bauträger)', 6, 1, NULL, '2019-06-17 16:38:04', '2019-06-17 16:38:04');
INSERT INTO `checklists` VALUES (36, 'Aufstellung der geplanten Eigenleistungen', 6, 1, NULL, '2019-06-17 16:38:12', '2019-06-17 16:38:12');
INSERT INTO `checklists` VALUES (37, 'Detaillierte Aufstellung evtl. geplanter Modernisierungskosten', 6, 1, NULL, '2019-06-17 16:38:20', '2019-06-17 16:38:20');
INSERT INTO `checklists` VALUES (38, 'Mietaufstellung inkl. Nettokaltmieten', 6, 1, NULL, '2019-06-17 16:38:30', '2019-06-17 16:38:30');
INSERT INTO `checklists` VALUES (39, 'Kopie Mietverträge', 6, 1, '2019-06-18 17:07:16', '2019-06-17 16:39:06', '2019-06-18 17:07:16');
INSERT INTO `checklists` VALUES (40, 'Kopie Bankguthaben / Bausparguthaben / Lebensversicherungs-Rückkaufswerte, etc', 7, 1, NULL, '2019-06-17 16:40:30', '2019-06-17 16:40:30');
INSERT INTO `checklists` VALUES (41, 'Grundbuchauszug bei weiterem Immobilienbesitz', 7, 1, NULL, '2019-06-17 16:40:41', '2019-06-17 16:40:41');
INSERT INTO `checklists` VALUES (42, 'Mietverträge', 6, 1, NULL, '2019-06-18 17:07:25', '2019-06-18 17:07:25');

-- ----------------------------
-- Table structure for customer_timelines
-- ----------------------------
DROP TABLE IF EXISTS `customer_timelines`;
CREATE TABLE `customer_timelines`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kundens_id` int(10) UNSIGNED NOT NULL,
  `calculation_id` int(10) UNSIGNED NOT NULL,
  `darlehen` int(11) NOT NULL,
  `zinsstaz` int(11) NOT NULL,
  `tilgung` int(11) NOT NULL,
  `laufzeit` int(11) NOT NULL,
  `rate_monatl` int(11) NOT NULL,
  `restschuld` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `postal_code` int(11) NULL DEFAULT NULL,
  `city` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `street` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `street_num` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'Nettetal - Kintzelmann', 'dssdf', 47906, 'Nordrhein-Westfalen - Kempen', 'Görtschesweg', 4, '2019-02-26 13:40:18', '2019-02-26 13:40:18');
INSERT INTO `groups` VALUES (2, 'Hückelhoven - Sternad', NULL, 12345, 'Hückelhoven', 'Hückelstraße', 3, '2019-02-26 13:50:21', '2019-02-26 13:50:21');

-- ----------------------------
-- Table structure for immobilies
-- ----------------------------
DROP TABLE IF EXISTS `immobilies`;
CREATE TABLE `immobilies`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `kaufpreis` int(11) NOT NULL,
  `kosten_umbau_modernisierung` int(11) NOT NULL,
  `kosten_notar_grundbuch` int(11) NOT NULL,
  `grunderwerbssteuer` int(11) NOT NULL,
  `maklerkosten` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kundens
-- ----------------------------
DROP TABLE IF EXISTS `kundens`;
CREATE TABLE `kundens`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `vorname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nachname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `strasse` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plz` int(11) NOT NULL,
  `wohnort` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `geburtsdatum` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kaufpreis` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kostenumbau` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kostennotar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `grunderwerbssteuer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `maklerkosten` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gesamtkosten` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `eigenkapital` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `finanzierungsbedarf` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ehepartner_enabled` tinyint(2) NULL DEFAULT 0,
  `ehepartner_vorname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ehepartner_nachname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ehepartner_mail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ehepartner_telefon` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ehepartner_geburtsdatum` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kundens
-- ----------------------------
INSERT INTO `kundens` VALUES (1, '2019-02-26 13:40:55', '2020-01-09 18:49:20', 5, 'Patrick', 'Dierig', 'Görtschesweg, 4', 47906, 'Nordrhein-Westfalen - Kempen', 'p-dierig@einfachmedial.de', '015204967292', '2017-10-30', '300000', '20000', '2.0', '6.0', '4.0', '356000.00', '0', '356000.00', 0, 'Bettina', 'Dierig', 'p-dierig@einfachmedial.de', '015204967292', '1993-02-12');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2018_11_21_101915_create_tests_table', 1);
INSERT INTO `migrations` VALUES (2, '2018_11_21_130836_create_timeline', 2);
INSERT INTO `migrations` VALUES (3, '2018_11_21_134854_update_zeitstrahl_tabelle', 3);
INSERT INTO `migrations` VALUES (4, '2018_11_21_161940_update_zeitstrahl_tabelle_zwei', 4);
INSERT INTO `migrations` VALUES (5, '2019_06_11_055129_create_checklists_table', 5);
INSERT INTO `migrations` VALUES (6, '2019_06_12_092208_create_checklist_ehepartner_table', 6);
INSERT INTO `migrations` VALUES (7, '2019_06_12_112354_add_category_column_to_checklists_table', 7);
INSERT INTO `migrations` VALUES (8, '2019_06_13_044648_create_checklist_categories_table', 8);
INSERT INTO `migrations` VALUES (9, '2019_06_18_123018_create_customer_timelines_table', 9);
INSERT INTO `migrations` VALUES (11, '2019_08_24_100742_create_calc_result_table', 10);
INSERT INTO `migrations` VALUES (12, '2019_08_26_100613_add_two_columns_to_repayments_table', 11);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('p-dierig@einfachmedial.de', '$2y$10$JyeHPWr3pd.uj1BKuUVxouxgZUl.jdviX6QPo9u61F49fsStB25jm', '2019-06-05 15:51:46');

-- ----------------------------
-- Table structure for repayments
-- ----------------------------
DROP TABLE IF EXISTS `repayments`;
CREATE TABLE `repayments`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `zinsen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tilgung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `darlehensrest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundens_id` int(11) NOT NULL,
  `repayment_date` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sonder_tilgung` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kundel_id_idx`(`repayment_date`) USING BTREE,
  INDEX `repayment_date_idx`(`repayment_date`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7944 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of repayments
-- ----------------------------
INSERT INTO `repayments` VALUES (7823, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '__', '__', '356000', 1, '7/2020', '__', '__');
INSERT INTO `repayments` VALUES (7824, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '593.33', '2682.35', '353317.65', 1, '8/2020', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7825, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '588.86', '2686.82', '350630.84', 1, '9/2020', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7826, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '584.38', '2691.30', '347939.54', 1, '10/2020', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7827, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '579.90', '2695.78', '345243.76', 1, '11/2020', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7828, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '575.41', '2700.27', '342543.49', 1, '12/2020', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7829, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '570.91', '2704.77', '339838.71', 1, '1/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7830, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '566.40', '2709.28', '337129.43', 1, '2/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7831, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '561.88', '2713.80', '334415.63', 1, '3/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7832, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '557.36', '2718.32', '331697.31', 1, '4/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7833, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '552.83', '2722.85', '328974.46', 1, '5/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7834, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '548.29', '2727.39', '326247.07', 1, '6/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7835, '2020-03-12 14:56:53', '2020-03-12 14:56:53', '543.75', '2731.93', '323515.14', 1, '7/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7836, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '539.19', '2736.49', '320778.65', 1, '8/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7837, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '534.63', '2741.05', '318037.60', 1, '9/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7838, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '530.06', '2745.62', '315291.98', 1, '10/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7839, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '525.49', '2750.19', '312541.79', 1, '11/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7840, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '520.90', '2754.78', '309787.01', 1, '12/2021', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7841, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '516.31', '2759.37', '307027.64', 1, '1/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7842, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '511.71', '2763.97', '304263.68', 1, '2/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7843, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '507.11', '2768.57', '301495.10', 1, '3/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7844, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '502.49', '2773.19', '298721.91', 1, '4/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7845, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '497.87', '2777.81', '295944.10', 1, '5/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7846, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '493.24', '2782.44', '293161.66', 1, '6/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7847, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '488.60', '2787.08', '290374.59', 1, '7/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7848, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '483.96', '2791.72', '287582.86', 1, '8/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7849, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '479.30', '2796.38', '284786.49', 1, '9/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7850, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '474.64', '2801.04', '281985.45', 1, '10/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7851, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '469.98', '2805.70', '279179.75', 1, '11/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7852, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '465.30', '2810.38', '276369.37', 1, '12/2022', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7853, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '460.62', '2815.06', '273554.30', 1, '1/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7854, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '455.92', '2819.76', '270734.55', 1, '2/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7855, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '451.22', '2824.46', '267910.09', 1, '3/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7856, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '446.52', '2829.16', '265080.93', 1, '4/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7857, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '441.80', '2833.88', '262247.05', 1, '5/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7858, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '437.08', '2838.60', '259408.45', 1, '6/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7859, '2020-03-12 14:56:54', '2020-03-12 14:56:54', '432.35', '2843.33', '256565.12', 1, '7/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7860, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '427.61', '2848.07', '253717.05', 1, '8/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7861, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '422.86', '2852.82', '250864.23', 1, '9/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7862, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '418.11', '2857.57', '248006.65', 1, '10/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7863, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '413.34', '2862.34', '245144.32', 1, '11/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7864, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '408.57', '2867.11', '242277.21', 1, '12/2023', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7865, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '403.80', '2871.88', '239405.33', 1, '1/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7866, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '399.01', '2876.67', '236528.66', 1, '2/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7867, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '394.21', '2881.47', '233647.19', 1, '3/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7868, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '389.41', '2886.27', '230760.92', 1, '4/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7869, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '384.60', '2891.08', '227869.84', 1, '5/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7870, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '379.78', '2895.90', '224973.95', 1, '6/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7871, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '374.96', '2900.72', '222073.22', 1, '7/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7872, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '370.12', '2905.56', '219167.67', 1, '8/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7873, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '365.28', '2910.40', '216257.27', 1, '9/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7874, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '360.43', '2915.25', '213342.01', 1, '10/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7875, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '355.57', '2920.11', '210421.90', 1, '11/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7876, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '350.70', '2924.98', '207496.93', 1, '12/2024', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7877, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '345.83', '2929.85', '204567.08', 1, '1/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7878, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '340.95', '2934.73', '201632.34', 1, '2/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7879, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '336.05', '2939.63', '198692.71', 1, '3/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7880, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '331.15', '2944.53', '195748.19', 1, '4/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7881, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '326.25', '2949.43', '192798.76', 1, '5/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7882, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '321.33', '2954.35', '189844.41', 1, '6/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7883, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '316.41', '2959.27', '186885.14', 1, '7/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7884, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '311.48', '2964.20', '183920.93', 1, '8/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7885, '2020-03-12 14:56:55', '2020-03-12 14:56:55', '306.53', '2969.15', '180951.79', 1, '9/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7886, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '301.59', '2974.09', '177977.69', 1, '10/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7887, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '296.63', '2979.05', '174998.64', 1, '11/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7888, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '291.66', '2984.02', '172014.63', 1, '12/2025', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7889, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '286.69', '2988.99', '169025.64', 1, '1/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7890, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '281.71', '2993.97', '166031.67', 1, '2/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7891, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '276.72', '2998.96', '163032.71', 1, '3/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7892, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '271.72', '3003.96', '160028.75', 1, '4/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7893, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '266.71', '3008.97', '157019.78', 1, '5/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7894, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '261.70', '3013.98', '154005.80', 1, '6/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7895, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '256.68', '3019.00', '150986.80', 1, '7/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7896, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '251.64', '3024.04', '147962.76', 1, '8/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7897, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '246.60', '3029.08', '144933.69', 1, '9/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7898, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '241.56', '3034.12', '141899.56', 1, '10/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7899, '2020-03-12 14:56:56', '2020-03-12 14:56:56', '236.50', '3039.18', '138860.38', 1, '11/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7900, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '231.43', '3044.25', '135816.14', 1, '12/2026', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7901, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '226.36', '3049.32', '132766.82', 1, '1/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7902, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '221.28', '3054.40', '129712.41', 1, '2/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7903, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '216.19', '3059.49', '126652.92', 1, '3/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7904, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '211.09', '3064.59', '123588.33', 1, '4/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7905, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '205.98', '3069.70', '120518.63', 1, '5/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7906, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '200.86', '3074.82', '117443.81', 1, '6/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7907, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '195.74', '3079.94', '114363.87', 1, '7/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7908, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '190.61', '3085.07', '111278.80', 1, '8/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7909, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '185.46', '3090.22', '108188.59', 1, '9/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7910, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '180.31', '3095.37', '105093.22', 1, '10/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7911, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '175.16', '3100.52', '101992.69', 1, '11/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7912, '2020-03-12 14:56:57', '2020-03-12 14:56:57', '169.99', '3105.69', '98887.00', 1, '12/2027', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7913, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '164.81', '3110.87', '95776.13', 1, '1/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7914, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '159.63', '3116.05', '92660.08', 1, '2/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7915, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '154.43', '3121.25', '89538.83', 1, '3/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7916, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '149.23', '3126.45', '86412.39', 1, '4/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7917, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '144.02', '3131.66', '83280.73', 1, '5/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7918, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '138.80', '3136.88', '80143.85', 1, '6/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7919, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '133.57', '3142.11', '77001.74', 1, '7/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7920, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '128.34', '3147.34', '73854.40', 1, '8/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7921, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '123.09', '3152.59', '70701.81', 1, '9/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7922, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '117.84', '3157.84', '67543.96', 1, '10/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7923, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '112.57', '3163.11', '64380.86', 1, '11/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7924, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '107.30', '3168.38', '61212.48', 1, '12/2028', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7925, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '102.02', '3173.66', '58038.82', 1, '1/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7926, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '96.73', '3178.95', '54859.87', 1, '2/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7927, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '91.43', '3184.25', '51675.62', 1, '3/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7928, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '86.13', '3189.55', '48486.07', 1, '4/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7929, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '80.81', '3194.87', '45291.20', 1, '5/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7930, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '75.49', '3200.19', '42091.01', 1, '6/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7931, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '70.15', '3205.53', '38885.48', 1, '7/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7932, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '64.81', '3210.87', '35674.61', 1, '8/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7933, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '59.46', '3216.22', '32458.38', 1, '9/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7934, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '54.10', '3221.58', '29236.80', 1, '10/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7935, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '48.73', '3226.95', '26009.85', 1, '11/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7936, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '43.35', '3232.33', '22777.52', 1, '12/2029', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7937, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '37.96', '3237.72', '19539.80', 1, '1/2030', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7938, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '32.57', '3243.11', '16296.69', 1, '2/2030', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7939, '2020-03-12 14:56:58', '2020-03-12 14:56:58', '27.16', '3248.52', '13048.17', 1, '3/2030', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7940, '2020-03-12 14:56:59', '2020-03-12 14:56:59', '21.75', '3253.93', '9794.24', 1, '4/2030', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7941, '2020-03-12 14:56:59', '2020-03-12 14:56:59', '16.32', '3259.36', '6534.88', 1, '5/2030', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7942, '2020-03-12 14:56:59', '2020-03-12 14:56:59', '10.89', '3264.79', '3270.09', 1, '6/2030', '3275.68', '0.00');
INSERT INTO `repayments` VALUES (7943, '2020-03-12 14:56:59', '2020-03-12 14:56:59', '5.45', '3270.09', '0.00', 1, '7/2030', '3275.54', '0.00');

-- ----------------------------
-- Table structure for tests
-- ----------------------------
DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `hobby` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kundens_id` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tests
-- ----------------------------
INSERT INTO `tests` VALUES (1, 'hobby test name', 1, '2018-11-21 23:37:51', '2018-11-21 23:37:51');
INSERT INTO `tests` VALUES (2, 'hobby test name1', 1, '2018-11-21 23:38:18', '2018-11-21 23:38:18');
INSERT INTO `tests` VALUES (3, 'hobby test name2_2', 2, '2018-11-21 23:40:12', '2018-11-21 23:40:12');

-- ----------------------------
-- Table structure for timeline
-- ----------------------------
DROP TABLE IF EXISTS `timeline`;
CREATE TABLE `timeline`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `timeline` int(191) NULL DEFAULT NULL,
  `calculation_id` int(11) NOT NULL,
  `kundens_id` int(191) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `finanzierungsbedarf_phase_eins` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jahreszins_phase_eins` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `laufzeit_phase_eins` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_monatlich_phase_eins` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `restschuld_phase_eins` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `finanzierungsbedarf_phase_zwei` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jahreszins_phase_zwei` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `laufzeit_phase_zwei` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_monatlich_phase_zwei` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `restschuld_ende` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `mail_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT 0,
  `group` int(11) NULL DEFAULT 0,
  `admin` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (5, 'Admin User', 'admin@admin.com', 'admin', '1234', 'homezcasdfsdfas', NULL, '$2y$10$C.aRlHjyGj0.ixSzp81Lo.6DQcV9Ii9vx3jRQbA.OQp34RiyFKhOG', 'xoOTPfUQXUPXxAk8NOQrgzb4g3SSeUBXpNmgLrTGMY3XdzHmQP3bXex1CIoz', '2019-02-18 20:53:29', '2019-02-25 16:03:49', 1, 1, 1);
INSERT INTO `users` VALUES (27, 'Patrick', 'p-dierig@einfachmedial.de', 'Dierig', '015204967292', 'p-dierig@einfachmedial.de', NULL, '$2y$10$fOTD1gNVZmPS6GV6WwanXu0ZZI.3IiEPw0bxXrVSjBs3Z6WS4BZ8S', NULL, '2019-02-26 13:38:34', '2019-02-26 13:40:30', 1, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
