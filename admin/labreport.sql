-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 08:13 AM
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
-- Database: `labreport`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(2, 'Haematology'),
(3, 'Microbiology'),
(4, 'Clinical Pathology'),
(5, 'Serology'),
(6, 'Virology'),
(7, 'Immunology'),
(8, 'Histopathology'),
(9, 'Endocrinology'),
(10, 'Tumour Marker'),
(11, 'Chemistry'),
(12, 'BIO CHEMISTRY'),
(13, 'Special chemistry'),
(14, 'SERUM ELECTROLYES'),
(15, 'MYCOLOGY'),
(16, 'Bacteriology'),
(17, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `mobile`, `website`, `address`) VALUES
(1, 'AW Soft Solutions', '03467998485', 'www.instagram/awposterdesigners.com', 'Masood Market Street # 5 Shop 8 Dera Ismail Khan');

-- --------------------------------------------------------

--
-- Table structure for table `doctorpayment`
--

CREATE TABLE `doctorpayment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_phone` varchar(15) NOT NULL,
  `d_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`d_id`, `d_name`, `d_phone`, `d_address`) VALUES
(1, 'Asif', '000000000', 'Dera Ismail Khan');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_phone` varchar(15) NOT NULL,
  `p_age` varchar(5) NOT NULL,
  `p_sex` varchar(10) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `p_status` int(11) NOT NULL,
  `p_charges` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`p_id`, `p_name`, `p_phone`, `p_age`, `p_sex`, `doctor_id`, `p_status`, `p_charges`, `date`) VALUES
(1, 'admin', '000', '23 ', 'M', 1, 1, 500, '2024-09-28 11:40:14'),
(2, 'Abdul Wasay', '03439187576', '23 ', 'M', 1, 1, 450, '2024-10-02 15:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `patient_test`
--

CREATE TABLE `patient_test` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_test`
--

INSERT INTO `patient_test` (`id`, `pid`, `tid`, `status`) VALUES
(1, 1, 92, 0),
(2, 2, 6, 1),
(3, 2, 28, 1),
(4, 2, 78, 1);

-- --------------------------------------------------------

--
-- Table structure for table `saverecords`
--

CREATE TABLE `saverecords` (
  `id` int(11) NOT NULL,
  `trid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `result` varchar(255) NOT NULL DEFAULT 'blank_field_with_database'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saverecords`
--

INSERT INTO `saverecords` (`id`, `trid`, `subid`, `result`) VALUES
(1, 2, 25, '7'),
(2, 3, 58, 'huihu'),
(3, 4, 150, '67');

-- --------------------------------------------------------

--
-- Table structure for table `subtest`
--

CREATE TABLE `subtest` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `refrange` text NOT NULL,
  `low` int(11) DEFAULT NULL,
  `high` int(11) DEFAULT NULL,
  `unit` varchar(100) NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subtest`
--

INSERT INTO `subtest` (`id`, `tid`, `sub_name`, `refrange`, `low`, `high`, `unit`, `other`) VALUES
(1, 1, 'Physical Examination', 'head', 0, 0, '', ''),
(2, 1, 'Colour', '', 0, 0, '', ''),
(3, 1, 'Volume', '', 0, 0, '', ''),
(4, 1, 'pH', '', 0, 0, '', ''),
(5, 1, 'Sugar', '', 0, 0, '', ''),
(6, 1, 'Albumin', '', 0, 0, '', ''),
(7, 1, 'BS & BP', '', 0, 0, '', ''),
(8, 1, 'Microscopic Examination', 'head', 0, 0, '', ''),
(9, 1, 'Pus cell', '', 0, 0, '/HPF', ''),
(10, 1, 'Cal.oxalat', '', 0, 0, '/HPF', ''),
(11, 1, 'RBC', '', 0, 0, '/HPF', ''),
(12, 1, 'A. Urates', '', 0, 0, '/HPF', ''),
(13, 1, 'Epith Cell', '', 0, 0, '/HPF', ''),
(14, 1, 'Micro organism', '', 0, 0, '/HPF', ''),
(15, 1, 'Other', '', 0, 0, '/HPF', ''),
(16, 1, 'CASTS', 'head', 0, 0, '', ''),
(17, 1, 'Granular Cast', '', 0, 0, '/HPF', ''),
(18, 1, 'Hyaline Cast', '', 0, 0, '/HPF', ''),
(19, 1, 'WBC Cast', '', 0, 0, '/HPF', ''),
(20, 1, 'RBC  Cast', '', 0, 0, '/HPF', ''),
(21, 2, 'ALBUMIN', '3.5_____5.5', 4, 6, 'mg/dl', ''),
(22, 3, 'C.P.K', 'UPTO_____195', 0, 195, 'U/l', ''),
(23, 4, 'CA 125', 'UPTO_____35', 0, 35, 'U/mL', ''),
(24, 5, 'TestoSterone', '2.00_____8.00', 2, 8, 'ng/ml', ''),
(25, 6, 'S.Total Proteins', '6.0_____8.0', 6, 8, 'g/dl', ''),
(26, 7, 'S.Albumin', '3.5_____5.5', 4, 6, 'g/dl', ''),
(27, 8, 'S.Glubulin', '2.0_____3.5', 2, 4, 'g/dl', ''),
(28, 9, 'HBsAg', '', 0, 0, '', '(by Immunochrometic Method )'),
(29, 9, 'HBsAb', '', 0, 0, '', '(by Immunochrometic Method )'),
(30, 9, 'HBeAg', '', 0, 0, '', '(by Immunochrometic Method )'),
(31, 9, 'HBeAb', '', 0, 0, '', '(by Immunochrometic Method )'),
(32, 9, 'HBcAb', '', 0, 0, '', '(by Immunochrometic Method )'),
(33, 10, 'S.ALT/SGPT', '10_____40', 10, 40, 'U/l', ''),
(34, 11, 'S.AMYLASE', '10_____125', 10, 125, 'U/l', ''),
(35, 12, 'AST', '10_____40', 10, 40, 'U/l', ''),
(36, 13, 'B-HCG', 'Non Pregnant: < 5.0 <br>\n3     Weeks  5-50<br>\n4     Weeks  5-426<br>\n5     Weeks  18-7,340<br>\n6     Weeks  1,080-56,500<br>\n7-8   Weeks  7,650-229,000<br>\n9-12  Weeks  25,700-288,000<br>\n13-16 Weeks 13,300-254,000<br>\n17-24 Weeks 40,060-165,400<br>\n25-40 Weeks 3,640-117,000<br>', 5, 117, 'mIU/ml', ''),
(37, 14, 'DENGUE', 'head', 0, 0, '', ''),
(38, 14, 'IgG', '', 0, 0, '', ''),
(39, 14, 'IgM', '', 0, 0, '', ''),
(40, 14, 'DENGUE NS1', '', 0, 0, '', '(by Immunochrometic Method )'),
(41, 15, 'Na (sodium)', '136_____145', 136, 145, 'mmol/L', ''),
(42, 15, 'K  (Potassium)', '3.5_____5.5', 4, 6, 'mmol/L', ''),
(43, 15, 'Cl (chloride)', '96_____108', 96, 108, 'mmol/L', ''),
(44, 16, 'GLUCOSE (F)', '50_____115', 50, 115, 'mg/dl', ''),
(45, 17, 'BLOOD GROUP', '', 0, 0, '', ''),
(46, 17, 'RH FACTOR', '', 0, 0, '', ''),
(47, 18, 'Haemoglobin', '(M) 12.5_____18.0<br>\n(F) 11.5_____16.5<br>', 13, 17, 'g/dl', ''),
(48, 19, 'TLC(WBC)', '4,000_____11,000', 4, 11, 'c/mm', ''),
(49, 20, 'GLUCOSE (R)', '65_____170', 65, 170, 'mg/dl', ''),
(50, 21, 'IgG', '', 0, 0, '', ''),
(51, 21, 'IgM', '', 0, 0, '', ''),
(52, 22, 'GLYCATED HEMOGLOBIN (HbA1c)', 'Normal:                        5.5 - 6.5% <br>\nGOOD CONTROL:        5.5 – 6.7%<br>\nFAIR CONTROL:          6.8 – 7.7% <br>\nPOOR CONTROL:         > 7.7%<br>', 6, 8, '%', ''),
(53, 23, 'HBsAg', '', 0, 0, '', '(by Immunochrometic Method )'),
(54, 24, 'HCV Ab', '', 0, 0, '', '(by Immunochrometic Method )'),
(55, 25, 'HIV', '', 0, 0, '', '(by Immunochrometic Method )'),
(56, 26, 'LDH', 'Upto_____480', 0, 480, 'U/1', ''),
(57, 27, 'VDRL', '', 0, 0, '', '(by Immunochrometic Method )'),
(58, 28, 'ICT.T.B', '', 0, 0, '', '(by Immunochrometic Method )'),
(59, 29, 'Pv', '', 0, 0, '', ''),
(60, 29, 'Pf', '', 0, 0, '', ''),
(61, 30, 'MP', '', 0, 0, '', ''),
(62, 31, 'URINE FOR PREGNANCY ', '', 0, 0, '', ''),
(63, 32, 'R.A.Factor', 'Negative < 20<br>\nPositive > 20<br>', 20, 40, 'IU/ml', ''),
(64, 33, 'Neutrophil', '40_____75', 40, 75, '%', ''),
(65, 33, 'Lymphocyte', '20_____40', 20, 40, '%', ''),
(66, 33, 'Monocyte', '01_____09', 1, 9, '%', ''),
(67, 33, 'Eosinophil', '01_____05', 1, 5, '%', ''),
(68, 34, 'VITAMIN D3', 'Deficiency :< 10.00<br>\nInsufficiency:10-30<br>\nSufficiency:30-100<br>', 10, 100, 'ng/ml', ''),
(69, 35, 'S.ALT/SGPT', '10_____40', 10, 40, 'U/l', ''),
(70, 35, 'Alk.Phosphatase', '(Adult) Upto___303 <br>\n(Child) Upto___360 <br>', 0, 360, 'U/l', ''),
(71, 35, 'BILIRUBIN (Total)', '0.1_____1.2', 0, 1, 'mg/dl', ''),
(72, 36, 'BILIRUBIN (Total)', '0.1_____1.2', 0, 1, 'mg/dl', ''),
(73, 36, 'Bilirubin Direct', '0.0_____0.25', 0, 0, 'mg/dl', ''),
(74, 36, 'Bilirubin Indirect', '0.05_____0.75', 0, 1, 'mg/dl', ''),
(75, 37, 'ALPHA FETOPROTEIN', '<10.9', 0, 11, 'ng/ml', ''),
(76, 38, 'D-DIMER', 'Negative < 500<br>\nPositive > 500<br>', 0, 500, 'ng/mL', ''),
(77, 39, 'Ferritin', '(M) 30______350<br>\n(F) 20______250<br>', 20, 350, 'ng/mL', ''),
(78, 40, 'Free T4', '8.9_____17.2', 9, 17, 'pg/mL', ''),
(79, 41, 'Bleeding Time', '2:30_____5:30', 2, 5, 'Minute', ''),
(80, 42, 'Clotting Time', '5_____11', 5, 11, 'Minute', ''),
(81, 43, 'Brucella', 'head', 0, 0, '', ''),
(82, 43, 'Abortus', '', 0, 0, '', ''),
(83, 43, 'Melitensis', '', 0, 0, '', ''),
(84, 43, 'Result', '', 0, 0, '', ''),
(85, 44, 'ASO Titer', '<200', 0, 200, 'IU/ML', ''),
(86, 44, 'TITER', '<200', 0, 200, 'IU/ML', ''),
(87, 45, 'RA Factor', '<8', 0, 8, 'IU/ML', ''),
(88, 45, 'TITER', '<8', 0, 8, 'IU/ML', ''),
(89, 46, 'C.R.P', '<6', 0, 6, 'mg/l', ''),
(90, 46, 'TITER', '<6', 0, 6, 'mg/l', ''),
(91, 47, 'S.URIC ACID', '(M) 3.0______7.0 <br>\n(F) 2.5______6.0 <br>', 3, 7, 'mg/dl', ''),
(92, 48, 'RAF QN', 'Cutoff Value for Negative:  < 20 <br>\nCutoff Value for Positive: > 20 <br>', 0, 0, 'IU/ml', ''),
(93, 48, 'Patient Value', '', 0, 0, '', ''),
(94, 49, 'ASO (QUANTITATIVE)', 'Cutoff Value for Negative : < 200 <br>\nCutoff Value for Positive : > 200 <br>', 0, 0, 'IU/ml', ''),
(95, 49, 'Patient Value', '', 0, 0, '', ''),
(96, 50, 'HCV by ELISA', 'Cutoff Value for Negative : <0.90 <br>\nCutoff Value for Indeterminate:0.90,<1.0 <br>\nCutoff Value for Positive: >1.00 <br>', 1, 1, '', ''),
(97, 50, 'Result', '', 1, 1, '', ''),
(98, 51, 'HBsAg by ELISA', 'Cutoff Value for Negative: <0.90 <br>\nCutoff Value for Indeterminate: 0.90,<1.0 <br>\nCutoff Value for Positive : >1.00 <br>', 0, 0, '', ''),
(99, 51, 'Result', '', 0, 0, '', ''),
(100, 52, 'HCV by ELISA', 'Cutoff Value for Negative: <0.90 <br>\nCutoff Value for Positive: >1.0 <br>', 1, 1, '', ''),
(101, 52, 'Result', '', 0, 0, '', ''),
(102, 53, 'HBsAg by ELISA', 'Cutoff Value for Negative:<0.90 <br>\nCutoff Value for Positive:>1.0 <br>', 1, 1, '', ''),
(103, 53, 'Result', '', 0, 1, '', ''),
(104, 54, 'G6PD', '20_____60', 20, 60, 'Minutes', ''),
(105, 55, 'Activated Partial Thromboplastin Time', 'head', 0, 0, '', ''),
(106, 55, 'Control', '', 0, 0, '', ''),
(107, 55, 'Patient', '', 0, 0, '', ''),
(108, 56, 'Prothrambin Time', 'head', 0, 0, '', ''),
(109, 56, 'Control', '', 0, 0, '', ''),
(110, 56, 'Patient', '', 0, 0, '', ''),
(111, 57, 'Prothrambin Time', 'head', 0, 0, '', ''),
(112, 57, 'Control', '', 0, 0, '', ''),
(113, 57, 'Patient', '', 0, 0, '', ''),
(114, 57, 'INR', '', 0, 0, '', ''),
(115, 58, 'Activated Partial Thromboplastin Time', 'head', 0, 0, '', ''),
(116, 58, 'Control', '', 0, 0, '', ''),
(117, 58, 'Patient', '', 0, 0, '', ''),
(118, 58, 'Prothrambin Time', 'head', 0, 0, '', ''),
(119, 58, 'Control', '', 0, 0, '', ''),
(120, 58, 'Patient', '', 0, 0, '', ''),
(121, 58, 'INR', '', 0, 0, '', ''),
(122, 59, 'ESR', '', 0, 0, '', ''),
(123, 60, 'CRP (QUANTITATIVE)', 'Cutoff Value for Negative:<10 <br>\nCutoff Value for Positive: >10 <br>', 1, 1, 'mg/L', ''),
(124, 60, 'Result', '', 0, 0, '', ''),
(125, 61, 'S.CREATININE', '0.5_____1.2', 1, 1, 'mg/dl', ''),
(126, 61, 'B.UREA', '10_____50', 10, 50, 'mg/dl', ''),
(127, 62, 'B.UREA', '10_____50', 10, 50, 'mg/dl', ''),
(128, 63, 'S.CREATININE', '0.5_____1.2', 1, 1, 'mg/dl', ''),
(129, 64, 'S.CALCIUM', '8.5_____10.5', 9, 11, 'mg/dl', ''),
(130, 65, 'Phosphorous', '2.5_____4.5', 3, 5, 'mg/dl', ''),
(131, 66, 'Covid19', 'head', 0, 0, '', ''),
(132, 66, 'Covid19  IgG', '', 0, 0, '', ''),
(133, 66, 'Covid19 IgM', '', 0, 0, '', '<b>Note:</b><br>\r\nThis is Covid-19 or Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-CoV-2)IgM + IgG Antibodies test.\r\nPositive Antibody Test means the patient was previously infected, at least 2-3 weeks prior to sample collection.\r\nCOVID-19 Antibody Test is recommended for the purposes of disease seroprevalence and surveillance studies.\r\n<br><b>Comments:</b><br>\r\nA Non-Reactive test result does not completely rule out the possibility of an infection with SARS-CoV-2, Serum sample from the very early (pre-seroconversion)phase can yield Non-Reactive findings. Therefore, this test cannotbe used to diagnose an acute infection. Also, over time, Antibody titers may decline and eventually become Non-Reactive.\r\n  More studies on this Covid-19 in process and comments and diagnosis may change time to time.\r\n'),
(136, 67, 'URINE FOR SUGAR', '', 0, 0, '', ''),
(137, 68, 'URINE FOR ALBUMIN', '', 0, 0, '', ''),
(138, 69, 'URINE FOR KETONES', '', 0, 0, '', ''),
(139, 70, 'TROP I(Quantitative)', 'please see below', 0, 0, 'ng/ml', ''),
(140, 70, 'RESULTS', '', 0, 0, '', 'Note:-<br> Due to the release kinetic of Tn-I a result below decision limit within the first hour of onset of symptoms does not rule out myocardial infarction with certainity.if myocardial infarction still suspected,repeat the test at appropriate intervals.A negative Trop-I result must not be as sole diagnostic criterion.'),
(141, 71, 'Troponin T', '', 0, 0, '', '( by Immunochrometic Method )'),
(142, 72, 'TOXOPLASMA Anti bodies', '', 0, 0, '', ''),
(143, 73, 'TOXOPLASMA', 'head', 0, 0, '', ''),
(144, 73, 'IgG', '', 0, 0, '', ''),
(145, 73, 'IgM', '', 0, 0, '', ''),
(146, 74, 'S.KETONE', 'UPTO_____05', 0, 5, 'mg/dl', ''),
(147, 75, 'S PROTIN', '6_____8', 6, 8, 'g/dl', ''),
(148, 76, 'T3', 'Adult:      0.8-2.0 <br>\nPediatric: (1-10 year)0.82-2.82<br>\nMale:      (11-15year)0.81-2.33 <br>\nFemale:    (11-15year)0.61-2.09<br>\nMale:      (16-17year)0.71-2.12<br>\nFemale:    (16-17year)0.61-1.51 <br>', 1, 2, 'ng/ml', ''),
(149, 77, 'T4', 'Adult:         5.4-11.5 <br>\nChildren:      6.4-13.3 <br>\nNeonate:       11.8-23.6 <br>', 5, 24, 'ug/dl', ''),
(150, 78, 'TSH', '<b>Adult:</b> 20-54year 0.4-4.2 <br>\n55-87year 0.5-8.9<br>\n<b>Pregnancy:</b><br>\n1st trimester 0.3-4.5<br>\n2nd trimester 0.5-4.6 <br>\n3rd trimester 0.8-5.2 <br>\n<b>Children:</b><br>\n30 Min after birth 25-100<br>\n2-4 days  1.7-9.1<br>\n1 year    0.4-8.6 <br>\n2 years   0.4-7.6 <br>\n3 years   0.3-6.7<br>\n4 to 19 years 0.4-6.2<br>', 0, 6, 'uLU/M', ''),
(151, 79, 'T3', 'Adult:      0.8-2.0 <br>\nPediatric: (1-10 year)0.82-2.82<br>\nMale:      (11-15year)0.81-2.33 <br>\nFemale:    (11-15year)0.61-2.09<br>\nMale:      (16-17year)0.71-2.12<br>\nFemale:    (16-17year)0.61-1.51 <br>', 1, 2, 'ng/ml', ''),
(152, 79, 'T4', 'Adult:         5.4-11.5 <br>\nChildren:      6.4-13.3 <br>\nNeonate:       11.8-23.6 <br>', 5, 24, 'ug/dl', ''),
(153, 79, 'TSH', '<b>Adult:</b> 20-54year 0.4-4.2 <br>\n55-87year 0.5-8.9<br>\n<b>Pregnancy:</b><br>\n1st trimester 0.3-4.5<br>\n2nd trimester 0.5-4.6 <br>\n3rd trimester 0.8-5.2 <br>\n<b>Children:</b><br>\n30 Min after birth 25-100<br>\n2-4 days  1.7-9.1<br>\n1 year    0.4-8.6 <br>\n2 years   0.4-7.6 <br>\n3 years   0.3-6.7<br>\n4 to 19 years 0.4-6.2<br>', 0, 6, '', ''),
(154, 80, 'PSA', '<4.0', 0, 4, 'ng/ml', 'Interpretation:<br>\r\nElevated concentrations of PSA may be observed in old age, acute urinary retention urinary catheterization,prostatitis, benign prostatic hyperplasia, transuretheral resection, after prostatic massage, needle biopsy and following ejaculation as well as in carcinoma prostate.<br>\r\nIf PSA > 40 there is a high change of nodal or metastatic spread.<br>\r\nIf PSA > 100 there is almost certainly metastatic spread.<br>\r\nThe free-to-total ratio (%free PSA) is lower in PCa then in BPH and is specially usefull for the diagnosis of PCa when the total PSA concentration falls in the “grey zone” (4…10ng/ml)\r\n'),
(155, 81, 'WIDAL', 'head', 0, 0, '', ''),
(156, 81, 'TO', '', 0, 0, '', ''),
(157, 81, 'TH', '', 0, 0, '', ''),
(158, 82, 'S.Cholestrol', '<200', 0, 200, 'mg/dl', ''),
(159, 82, 'Triglycerides', '<200', 0, 200, 'mg/dl', ''),
(160, 82, 'H.D.L', '35_____65', 35, 65, 'mg/dl', ''),
(161, 82, 'L.D.L', '<150', 0, 150, 'mg/dl', ''),
(162, 83, 'S.Cholestrol', '<200', 0, 200, 'mg/dl', ''),
(163, 84, 'Triglycerides', '<200', 0, 200, 'mg/dl', ''),
(164, 85, 'ICT TB', 'head', 0, 0, '', ''),
(165, 85, 'IgG', '', 0, 0, '', ''),
(166, 85, 'IgM', '', 0, 0, '', ''),
(167, 86, 'ICT T.B', '', 0, 0, '', '(by Immunochrometic Method )'),
(168, 87, 'STOOL H.PYLORI Ag', '', 0, 0, '', '(by Immunochrometic Method )'),
(169, 88, 'H.PYLORI', '', 0, 0, '', '(by Immunochrometic Method )'),
(170, 89, 'LH', 'Mid cycle surge    9.6-80.0<br>\n    Follicular phase <br>\n    Firs half          1.5-8.0<br>\n    Second half        2.0-8.0<br>\n    Luteal phase       0.2-6.5<br>\n    Male               1.1-7.0<br>\n\n', 10, 8, 'mIU/ml', ''),
(171, 90, 'FSH', 'Adult male     1.7-12.0<br>\n    Adult female<br>\n    First half      3.9-12.0<br>\n    Second half     2.9-9.0<br>\n    Mid cycle peak   6.3-24.0<br>\n    Luteal phase      1.5-7.0<br>\n    Postmenopausal   17.0-95.0<br>', 2, 95, 'mIU/ml', ''),
(172, 91, 'S.Prolactin', 'Male             3.0-25 ng/ml<br>\n    Female<br>\n    Menstrual cycle:  5.0-35 ng/ml <br>\n    Menopausal phase: 5.0-35 ng/ml<br>', 3, 35, 'ng/ml', ''),
(173, 92, 'Haemoglobin', '(M)   12.5______18.0 <br>\n(F)   11.5______16.5', 13, 18, 'g/dl', ''),
(174, 92, 'Total RBC', '4.5_____6.5', 5, 7, 'X10^12/|', ''),
(175, 92, 'HCT', '38_____52', 38, 52, '%', ''),
(176, 92, 'MCV', '75_____95', 75, 95, 'f|', ''),
(177, 92, 'MCH', '26_____32', 26, 32, 'pg', ''),
(178, 92, 'MCHC', '30_____37', 30, 37, 'g/d|', ''),
(179, 92, 'Platelets', '150,000_____450,000', 150, 450, 'c/mm', ''),
(180, 92, 'TLC(WBC)', '4,000_____11,000', 4, 11, 'c/mm', ''),
(181, 92, 'DLC', 'head', 0, 0, '', ''),
(182, 92, 'Neutrophil', '40_____75', 40, 75, '%', ''),
(183, 92, 'Lymphocyte', '20_____50', 20, 50, '%', ''),
(184, 92, 'Monocyte', '01_____09', 1, 9, '%', ''),
(185, 92, 'Eosinophils', '01_____05', 1, 5, '%', ''),
(186, 92, 'Basophils', 'Less Than 1', 0, 1, '%', ''),
(187, 93, 'Platelets', '150,000_____450,000', 150, 450, 'c/mm', ''),
(188, 94, 'Physical Examination', 'head', 0, 0, '', ''),
(189, 94, 'Colour', '', 0, 0, '', ''),
(190, 94, 'Mucus', '', 0, 0, '', ''),
(191, 94, 'Consistency', '', 0, 0, '', ''),
(192, 94, 'Blood', '', 0, 0, '', ''),
(193, 94, 'Microscopic Examination', 'head', 0, 0, '', ''),
(194, 94, 'H.Nana', '', 0, 0, '/HPF', ''),
(195, 94, 'A.lumbricoid', '', 0, 0, '/HPF', ''),
(196, 94, 'Giardia', '', 0, 0, '/HPF', ''),
(197, 94, 'A.Dudianal', '', 0, 0, '/HPF', ''),
(198, 94, 'T,Trichiura', '', 0, 0, '/HPF', ''),
(199, 94, 'Amoeba', '', 0, 0, '/HPF', ''),
(200, 94, 'Pus Cell', '', 0, 0, '/HPF', ''),
(201, 94, 'RBC', '', 0, 0, '/HPF ', ''),
(202, 95, 'Bag No', '', 0, 0, '', ''),
(203, 95, 'Patient Details', 'head', 0, 0, '', ''),
(204, 95, 'Patient’s Blood Group', '', 0, 0, '', ''),
(205, 95, 'Rh Type', '', 0, 0, '', ''),
(206, 95, 'Donor Details', 'head', 0, 0, '', ''),
(207, 95, 'Donor Name', '', 0, 0, '', ''),
(208, 95, 'Donor’s Blood Group', '', 0, 0, '', ''),
(209, 95, 'Rh Type', '', 0, 0, '', ''),
(210, 95, 'Donor Screening', 'head', 0, 0, '', ''),
(211, 95, 'HBsAg', '', 0, 0, '', ''),
(212, 95, 'Anti HCV', '', 0, 0, '', ''),
(213, 95, 'HIV', '', 0, 0, '', ''),
(214, 95, 'Cross Match', '', 0, 0, '', ''),
(215, 96, 'SEMEN ANALYSIS REPORTS ', 'head', 10, 20, '', ''),
(216, 96, 'COLOUR', 'WHITE GRAY', 0, 0, '', ''),
(217, 96, 'VOLUME', '> 1.5_____3.0', 0, 3, 'ML', ''),
(218, 96, 'VISCOSITY', 'NORMAL/THICK/THIN ', 0, 0, '', ''),
(219, 96, 'PH', '7.2_____8.0', 7, 8, '', ''),
(220, 96, 'ABSTINENCE', '3 TO 5', 3, 5, 'DAYS', ''),
(221, 96, 'PUS', '01_____02', 1, 2, '/HPF', ''),
(222, 96, 'RBC', '00_____00', 0, 0, '/HPF', ''),
(223, 96, 'EPITH CELLS', '00_____00', 0, 0, '/HPF', ''),
(224, 96, 'LIQUFECATION TIME', '20_____30', 20, 30, 'MINUTES', ''),
(225, 96, 'MICROSCOPIC EXAMINATION', 'head', 0, 0, '', ''),
(226, 96, 'TOTAL COUNT', '20_____120', 20, 120, 'MILLION/ML', ''),
(227, 96, 'ACTIVE', '>=40', 0, 40, '%', ''),
(228, 96, 'SLUGGISH', '', 0, 0, '%', ''),
(229, 96, 'NON-MOTILE', '', 0, 0, '%', ''),
(230, 96, 'MORPHOLOGY', 'head', 0, 0, '', ''),
(231, 96, 'NORMAL SHAPE', '', 0, 0, '', ''),
(232, 96, 'ABNORMAL SHAPE', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `t_id` int(11) NOT NULL,
  `t_category` int(11) NOT NULL,
  `t_group` varchar(50) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `t_short` varchar(255) NOT NULL,
  `t_charges` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`t_id`, `t_category`, `t_group`, `t_name`, `t_short`, `t_charges`) VALUES
(1, 17, 'Urine', 'URINE R/E', 'URINE R/E', 500),
(2, 2, 'Blood', 'ALBUMIN', 'ALBUMIN', 100),
(3, 2, 'Blood', 'C.P.K', 'C.P.K', 100),
(4, 2, 'Blood', 'CA 125', 'CA 125', 100),
(5, 2, 'Blood', 'TestoSterone', 'TestoSterone', 100),
(6, 2, 'Blood', 'S.Total Proteins', 'S.Total Proteins', 100),
(7, 2, 'Blood', 'S.Albumin', 'S.Albumin', 100),
(8, 2, 'Blood', 'S.Glubulin', 'S.Glubulin', 100),
(9, 5, 'Blood', 'HBV PROFILE', 'HBV PROFILE', 500),
(10, 11, 'Blood', 'S.ALT/SGPT', 'S.ALT', 100),
(11, 11, 'Blood', 'S.AMYLASE', 'S.AMYLASE', 100),
(12, 11, 'Blood', 'AST', 'AST', 100),
(13, 11, 'Blood', 'B-HCG', 'B-HCG', 100),
(14, 5, 'Blood', 'Dengue Profile', 'Dengue', 500),
(15, 11, 'Blood', 'S.ELECTROLYTES', 'S.ELECTROLYTES', 500),
(16, 2, 'Blood', 'GLUCOSE (F)', 'FBS', 100),
(17, 5, 'Blood', 'BLOOD GROUP', 'BLOOD GROUP', 100),
(18, 2, 'Blood', 'Haemoglobin', 'HB', 100),
(19, 2, 'Blood', 'TLC(WBC)', 'TLC', 100),
(20, 11, 'Blood', 'GLUCOSE (R)', 'RBS', 100),
(21, 5, 'Blood', 'TYPHIDOT', 'TYPHIDOT', 300),
(22, 13, 'Blood', 'HbA1c', 'HbA1c', 200),
(23, 5, 'Blood', 'HBsAg', 'HBsAg', 100),
(24, 5, 'Blood', 'HCV Ab', 'HCV Ab', 100),
(25, 5, 'Blood', 'HIV', 'HIV', 100),
(26, 11, 'Blood', 'LDH', 'LDH', 100),
(27, 5, 'Blood', 'VDRL', 'VDRL', 100),
(28, 5, 'Blood', 'ICT.T.B', 'ICT.T.B', 100),
(29, 17, 'Blood', 'MP ICT', 'MP ICT', 300),
(30, 5, 'Blood', 'MP', 'MP', 100),
(31, 5, 'Urine', 'URINE FOR PREGNANCY ', 'PREGNANCY ', 300),
(32, 2, 'Blood', 'R.A.Factor', 'RAF QN', 100),
(33, 2, 'Blood', 'DLC', 'DLC', 400),
(34, 11, 'Blood', 'VITAMIN D3', 'VITAMIN D3', 100),
(35, 11, 'Blood', 'LFTs', 'LFTs', 500),
(36, 11, 'Blood', 'BILIRUBIN Profile', 'BILIRUBIN', 500),
(37, 11, 'Blood', 'ALPHA FETOPROTEIN', 'ALPHA FETOPROTEIN', 300),
(38, 11, 'Blood', 'D-DIMER', 'D-DIMER', 200),
(39, 11, 'Bloood', 'Ferritin', 'Ferritin', 300),
(40, 11, 'Blood', 'Free T4', 'Free T4', 300),
(41, 2, 'Blood', 'Bleeding Time', 'BT', 150),
(42, 2, 'Blood', 'Clotting Time', 'CT', 150),
(43, 5, 'Blood', 'Brucella', 'Brucella', 400),
(44, 5, 'Blood', 'ASO Titer', 'ASO', 150),
(45, 5, 'Blood', 'RA Factor', 'RA Factor', 150),
(46, 5, 'Blood', 'C.R.P', 'C.R.P', 150),
(47, 11, 'blood', 'S.URIC ACID', 'S.URIC ACID', 140),
(48, 5, 'Blood', 'RF (QUANTITATIVE)', 'RAF QN', 350),
(49, 5, 'Blood', 'ASO (QUANTITATIVE)', 'ASO QN', 150),
(50, 5, 'Blood', 'HCV by ELISA', 'HCV by ELISA', 400),
(51, 5, 'Blood', 'HBsAg by ELISA', 'HBsAg by ELISA', 400),
(52, 5, 'Blood', 'HCV by ELISA', 'HCV by ELISA', 300),
(53, 5, 'Blood', 'HBsAg by ELISA', 'HBsAg by ELISA', 400),
(54, 5, 'Blood', 'G6PD', 'G6PD', 300),
(55, 5, 'Blood', 'Activated Partial Thromboplastin Time', 'APTT', 300),
(56, 5, 'Blood', 'Prothrambin Time', 'PT', 400),
(57, 5, 'Blood', 'PT INR', 'PT INR', 500),
(58, 5, 'Blood', 'PT / APTT / INR', 'PT APTT INR', 500),
(59, 5, 'Blood', 'ESR', 'ESR', 600),
(60, 5, 'Blood', 'CRP (QUANTITATIVE)', 'CRP QN', 400),
(61, 2, 'Blood', 'RFTs', 'RFTs', 200),
(62, 2, 'Blood', 'B.UREA', 'B.UREA', 100),
(63, 2, 'Blood', 'S.CREATININE', 'S.CREATININE', 100),
(64, 11, 'Blood', 'S.CALCIUM', 'S.CA++', 400),
(65, 2, 'Blood', 'Phosphorous', 'Phos', 100),
(66, 5, 'blood', 'Covid19', 'Covid19', 600),
(67, 5, 'Blood', 'URINE FOR SUGAR', 'URINE FOR SUGAR', 400),
(68, 5, 'Blood', 'URINE FOR ALBUMIN', 'URINE FOR ALBUMIN', 300),
(69, 5, 'Blood', 'URINE FOR KETONES', 'URINE FOR KETONES', 150),
(70, 11, 'Blood', 'TROP I(Quantitative)', 'TROP I', 200),
(71, 11, 'Blood', 'Troponin T', 'Troponin T', 300),
(72, 5, 'Blood', 'TOXOPLASMA Anti bodies', 'TOXOPLASMA Anti bodies', 500),
(73, 5, 'Blood', 'TOXOPLASMA IgG/IgM', 'TOXOPLASMA IgG/IgM', 500),
(74, 2, 'Blood', 'S.KETONE', 'S.KETONE', 200),
(75, 2, 'Blood', 'S PROTIN', 'S PROTIN', 200),
(76, 2, 'Blood', 'T3', 'T3', 300),
(77, 2, 'Blood', 'T4', 'T4', 300),
(78, 2, 'Blood', 'TSH', 'TSH', 300),
(79, 2, 'Blood', 'TFTs', 'TFTs', 500),
(80, 2, 'Blood', 'PSA', 'PSA', 400),
(81, 2, 'Blood', 'WIDAL', 'WIDAL', 300),
(82, 2, 'Blood', 'LIPID PROFILE', 'LIPID PROFILE', 500),
(83, 2, 'Blood', 'S.Cholestrol', 'S.Cholestrol', 300),
(84, 2, 'Blood', 'Triglycerides', 'Triglycerides', 300),
(85, 5, 'Blood', 'ICT TB lgG/lgM', 'ICT TB lgG/lgM', 300),
(86, 5, 'Blood', 'ICT T.B', 'ICT T.B', 300),
(87, 5, 'Blood', 'STOOL H.PYLORI Ag', 'STOOL H.PYLORI', 400),
(88, 5, 'Blood', 'H.PYLORI', 'H.PYLORI', 300),
(89, 2, 'Blood', 'LH', 'LH', 400),
(90, 2, 'Blood', 'FSH', 'FSH', 500),
(91, 2, 'Blood', 'S.Prolactin', 'S.Prolactin', 150),
(92, 2, 'Blood', 'CBC', 'CBC', 500),
(93, 2, 'Blood', 'Platelets', 'Platelets', 100),
(94, 2, 'blood', 'STOOL R/E', 'STOOL R/E', 500),
(95, 2, 'Blood', 'Cross Matching Blood Group', 'Cross Matching', 300),
(96, 17, 'Blood', 'SEMEN ANALYSIS', 'SEMEN ANALYSIS', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'wasaykhan133', 'Pakistan@133');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorpayment`
--
ALTER TABLE `doctorpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `patient_test`
--
ALTER TABLE `patient_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saverecords`
--
ALTER TABLE `saverecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtest`
--
ALTER TABLE `subtest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctorpayment`
--
ALTER TABLE `doctorpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_test`
--
ALTER TABLE `patient_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saverecords`
--
ALTER TABLE `saverecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subtest`
--
ALTER TABLE `subtest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`d_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
