-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2024 at 03:58 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iselco`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `api_id` int NOT NULL,
  `method` varchar(45) DEFAULT NULL,
  `params` text,
  `api_response` text,
  `status` varchar(45) DEFAULT NULL,
  `request_at` datetime DEFAULT NULL,
  `response_at` datetime DEFAULT NULL,
  `authorized` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `api_logs`
--

INSERT INTO `api_logs` (`api_id`, `method`, `params`, `api_response`, `status`, `request_at`, `response_at`, `authorized`) VALUES
(1, 'POST', '{\"api\\/doTransact\":\"\",\"mobile\":\"09457192433\",\"amount\":\"1\",\"refNumber\":\"34466451321\",\"accountNumber\":\"1232456789\",\"first_name\":\"john\",\"last_name\":\"doe\",\"remarks\":\"test\",\"email\":\"test@gmail.com\",\"transaction_type\":\"qr\"}', NULL, NULL, '2024-01-14 12:08:11', NULL, NULL),
(2, NULL, '{\"message\":\"Created Successfully!\",\"data\":{\"app_uuid\":\"0aa91257-2baa-437e-886c-d3cfce9552ce\",\"payment_type\":\"p2m\",\"method\":\"dynamic\",\"txn_type\":44,\"raw_string\":null,\"reference_number\":\"240114040812557408000020\",\"created_at\":\"2024-01-14T04:08:12.559628Z\",\"txn_ref\":6030325,\"acq_info\":null}}', NULL, NULL, NULL, NULL, NULL),
(3, 'POST', '{\"api\\/doTransact\":\"\",\"accountNumber\":\"12322\",\"email\":\"w@gmail.com\",\"phone\":\"09123456789\",\"transaction_type\":\"qr\"}', NULL, NULL, '2024-01-14 12:30:16', NULL, NULL),
(4, NULL, '{\"message\":\"Created Successfully!\",\"data\":{\"app_uuid\":\"0aa91257-2baa-437e-886c-d3cfce9552ce\",\"payment_type\":\"p2m\",\"method\":\"dynamic\",\"txn_type\":44,\"raw_string\":\"00020101021228840015ph.ppmi.p2micro0111RUGUPHM1XXX0325001731104000000000000000104100010105039050300052047311530360854041.005802PH5924NET GLOBAL SOLUTIONS INC6010Pasig City62610012ph.ppmi.qrph021109123456789050788236450708PTR102670803***88440012ph.ppmi.qrph0124010707202317052066170844630411EE\",\"reference_number\":\"240114043017134139000021\",\"created_at\":\"2024-01-14T04:30:17.136285Z\",\"txn_ref\":8823645,\"acq_info\":\"010707202317052066170844\"}}', NULL, NULL, NULL, NULL, NULL),
(5, 'POST', '{\"api\\/doTransact\":\"\",\"accountNumber\":\"12322\",\"email\":\"w@gmail.com\",\"phone\":\"09123456789\",\"transaction_type\":\"qr\"}', NULL, NULL, '2024-01-14 12:30:33', NULL, NULL),
(6, NULL, '{\"message\":\"Created Successfully!\",\"data\":{\"app_uuid\":\"0aa91257-2baa-437e-886c-d3cfce9552ce\",\"payment_type\":\"p2m\",\"method\":\"dynamic\",\"txn_type\":44,\"raw_string\":\"00020101021228840015ph.ppmi.p2micro0111RUGUPHM1XXX0325001731104000000000000000104100010105039050300052047311530360854041.005802PH5924NET GLOBAL SOLUTIONS INC6010Pasig City62610012ph.ppmi.qrph021109123456789050771546300708PTR102670803***88440012ph.ppmi.qrph012401070720231705206634069863047411\",\"reference_number\":\"240114043034373797000022\",\"created_at\":\"2024-01-14T04:30:34.373904Z\",\"txn_ref\":7154630,\"acq_info\":\"010707202317052066340698\"}}', NULL, NULL, NULL, NULL, NULL),
(7, NULL, '{\"message\":\"Created Successfully!\",\"data\":{\"app_uuid\":\"0aa91257-2baa-437e-886c-d3cfce9552ce\",\"payment_type\":\"p2m\",\"method\":\"dynamic\",\"txn_type\":44,\"raw_string\":\"00020101021228840015ph.ppmi.p2micro0111RUGUPHM1XXX03250017311040000000000000001041000101050390503000520473115303608540813806.005802PH5924NET GLOBAL SOLUTIONS INC6010Pasig City62610012ph.ppmi.qrph021109511223436050794969730708PTR102670803***88440012ph.ppmi.qrph0124010707202317052453789928630443AF\",\"reference_number\":\"240114151618601424000031\",\"created_at\":\"2024-01-14T15:16:18.603612Z\",\"txn_ref\":9496973,\"acq_info\":\"010707202317052453789928\"}}', NULL, NULL, NULL, NULL, NULL),
(8, NULL, '{\"message\":\"Created Successfully!\",\"data\":{\"app_uuid\":\"0aa91257-2baa-437e-886c-d3cfce9552ce\",\"payment_type\":\"p2m\",\"method\":\"dynamic\",\"txn_type\":44,\"raw_string\":\"00020101021228840015ph.ppmi.p2micro0111RUGUPHM1XXX032500173110400000000000000010410001010503905030005204731153036085409142516.005802PH5924NET GLOBAL SOLUTIONS INC6010Pasig City62610012ph.ppmi.qrph021109511223436050721428890708PTR102670803***88440012ph.ppmi.qrph01240107072023170529575321956304666A\",\"reference_number\":\"240115051553324928000023\",\"created_at\":\"2024-01-15T05:15:53.327080Z\",\"txn_ref\":2142889,\"acq_info\":\"010707202317052957532195\"}}', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_callback`
--

CREATE TABLE `tbl_callback` (
  `cb_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iselco_data`
--

CREATE TABLE `tbl_iselco_data` (
  `islc_id` int NOT NULL,
  `AccountNumber` int DEFAULT NULL,
  `ConsumerName` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `AccountStatus` varchar(100) DEFAULT NULL,
  `UnpaidMonth` varchar(100) DEFAULT NULL,
  `Others` varchar(100) DEFAULT NULL,
  `TranformerRental` decimal(10,2) DEFAULT NULL,
  `CapitalShare` decimal(10,2) DEFAULT NULL,
  `Surcharges` decimal(10,2) DEFAULT NULL,
  `BOMdivagma` decimal(10,2) DEFAULT NULL,
  `BillsAndAdjustment` decimal(10,2) DEFAULT NULL,
  `TotalAmountB` decimal(10,2) DEFAULT NULL,
  `ConsumerType` double DEFAULT NULL,
  `PaymentStatus` varchar(100) DEFAULT NULL,
  `BillNumber` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_iselco_data`
--

INSERT INTO `tbl_iselco_data` (`islc_id`, `AccountNumber`, `ConsumerName`, `Address`, `AccountStatus`, `UnpaidMonth`, `Others`, `TranformerRental`, `CapitalShare`, `Surcharges`, `BOMdivagma`, `BillsAndAdjustment`, `TotalAmountB`, `ConsumerType`, `PaymentStatus`, `BillNumber`) VALUES
(1, 101010008, 'ENVIRONMENTAL POLICE(STN.#4)', 'PILAPIL ST.SN VICENTE, ILA. ISA.', 'DISCO', 'Nov 2019', '0.00', 0.00, 20.00, 656.46, 0.00, 13129.25, 13805.71, 0, 'UNPAID', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `TransId` int NOT NULL,
  `AccountNumber` varchar(45) DEFAULT NULL,
  `ConsumerName` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `UnpaidMonth` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `AccountStatus` varchar(50) DEFAULT NULL,
  `ReferenceNo` varchar(100) DEFAULT NULL,
  `Others` decimal(10,2) DEFAULT NULL,
  `TranformerRental` decimal(10,2) DEFAULT NULL,
  `CapitalShare` decimal(10,2) DEFAULT NULL,
  `Surcharges` decimal(10,2) DEFAULT NULL,
  `BOMdivagma` decimal(10,2) DEFAULT NULL,
  `BillsAndAdjustment` decimal(10,2) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `ConsumerType` varchar(50) DEFAULT NULL,
  `PaymentStatus` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `DatePaid` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`TransId`, `AccountNumber`, `ConsumerName`, `Address`, `Email`, `Phone`, `UnpaidMonth`, `AccountStatus`, `ReferenceNo`, `Others`, `TranformerRental`, `CapitalShare`, `Surcharges`, `BOMdivagma`, `BillsAndAdjustment`, `TotalAmount`, `ConsumerType`, `PaymentStatus`, `DatePaid`) VALUES
(1, '101010013', '\"DAMASO, ROMMEL\"', '\"SAN VICENTE - A, ILAGAN, ISABELA\"', 'e@email.com', '09123456789', 'Nov 2019', 'DISCO', 'TEST-12345', 0.00, 0.00, 50.00, 57.72, 0.00, 1154.33, 1262.00, '0.00', 'PAID', '2024-01-14 19:33:53'),
(2, '101010013', '\"DAMASO, ROMMEL\"', '\"SAN VICENTE - A, ILAGAN, ISABELA\"', 'e@email.com', '09123456789', 'May 2020', 'DISCO', 'TEST-12325', 0.00, 0.00, 50.00, 57.72, 0.00, 1154.33, 1262.00, '0.00', 'UNPAID', '2024-01-14 19:33:53'),
(3, '101010013', '\"DAMASO, ROMMEL\"', '\"SAN VICENTE - A, ILAGAN, ISABELA\"', 'e@email.com', '09123456789', 'Nov 2023', 'DISCO', 'TEST-3232', 0.00, 0.00, 50.00, 57.72, 0.00, 1154.33, 1262.00, '0.00', 'UNPAID', '2024-01-14 19:33:53'),
(4, '101032042', '\"LALISAN, JONATHAN\"', '\"SAN VICENTE - C, ILAGAN, ISABELA\"', 'galitrupert1522@gmail.com', '09511223436', 'Jul 2021', 'ACTIVE', '2142889', 0.00, 0.00, 0.00, 0.00, 0.00, 141568.16, 141568.00, '0', 'CREATED', '2024-01-15 13:15:52'),
(5, '101032042', '\"LALISAN, JONATHAN\"', '\"SAN VICENTE - C, ILAGAN, ISABELA\"', 'galitrupert1522@gmail.com', '09511223436', 'Dec 2023', 'ACTIVE', '2142889', 0.00, 0.00, 0.00, 0.00, 0.00, 948.13, 948.00, '0', 'CREATED', '2024-01-15 13:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `UserId` int NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Fullname` varchar(50) DEFAULT NULL,
  `MobileNumber` varchar(50) DEFAULT NULL,
  `EmailAddress` varchar(50) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `UserType` varchar(50) DEFAULT NULL,
  `AccountStatus` varchar(50) DEFAULT NULL,
  `AccountState` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`UserId`, `UserName`, `Password`, `Fullname`, `MobileNumber`, `EmailAddress`, `DateCreated`, `UserType`, `AccountStatus`, `AccountState`) VALUES
(1, 'Test', '1234', 'Test Account', '09511223438', 'e@email.com', '2024-01-14 21:41:45', 'superadmin', 'VERIFIED', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `tbl_callback`
--
ALTER TABLE `tbl_callback`
  ADD PRIMARY KEY (`cb_id`);

--
-- Indexes for table `tbl_iselco_data`
--
ALTER TABLE `tbl_iselco_data`
  ADD PRIMARY KEY (`islc_id`),
  ADD UNIQUE KEY `BillNumber` (`BillNumber`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`TransId`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`UserId`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `api_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_callback`
--
ALTER TABLE `tbl_callback`
  MODIFY `cb_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_iselco_data`
--
ALTER TABLE `tbl_iselco_data`
  MODIFY `islc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `TransId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `UserId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
