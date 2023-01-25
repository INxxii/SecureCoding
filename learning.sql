-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 04:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `number` int(255) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `question1` varchar(255) NOT NULL,
  `question2` varchar(255) NOT NULL,
  `question3` varchar(255) NOT NULL,
  `question4` varchar(255) NOT NULL,
  `question5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`number`, `exam`, `question1`, `question2`, `question3`, `question4`, `question5`) VALUES
(28, 'ogo7eeVQ53nynDHHQSREeQ==', '7FW0hbU1CQQjuEcgSXzW6Krv23iykZ+u7C4FlgsAgs0=', 'aQB/5m7YPrgusbKPSo8/Y/QRNswFApIab3IWVVGmX8o=', 'lNEC9LOiJl1nre1KBa81Kzc0LBVT1mOA6MCA9vVNwjc=', '+51G7CuNPDHn4/LpPJgaRQ==', '+51G7CuNPDHn4/LpPJgaRQ=='),
(30, 'DdfiXYwlegSNn8PXkz45iA==', 'lNEC9LOiJl1nre1KBa81Kzc0LBVT1mOA6MCA9vVNwjc=', 'aQB/5m7YPrgusbKPSo8/Y/QRNswFApIab3IWVVGmX8o=', '+51G7CuNPDHn4/LpPJgaRQ==', '+51G7CuNPDHn4/LpPJgaRQ==', '+51G7CuNPDHn4/LpPJgaRQ==');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `number` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`number`, `question`, `option1`, `option2`, `option3`, `option4`) VALUES
(0, '', '', '', '', ''),
(23, '7FW0hbU1CQQjuEcgSXzW6Krv23iykZ+u7C4FlgsAgs0=', 'cr0Khg3Y8vFwDzCkRoHLWQ==', 'uf+oBCSxJXQ9PLCSVueW/Q==', 'u73aJ2FEcpl5b8pFpg9XEA==', 'nRj7iF7DkSeoLhZ5fDM7Uw=='),
(26, 'aQB/5m7YPrgusbKPSo8/Y/QRNswFApIab3IWVVGmX8o=', 'HCSdiUMjLlTnzKN/fIkJnQ==', 'uf+oBCSxJXQ9PLCSVueW/Q==', '1QDVgMRQuvVQ+Bfg9rCdRw==', 'jJzbusw+hQ/0JMXIu5rDGw=='),
(27, 'fw8sdj+qNIUDZA9BmyCeyal0r3NI6BiRjivpwQ2ufLA=', '3QWpFB3sV/8CTaKy1DJHYg==', 'tJIrA6LLDbKVJHyiVXpx0g==', '+51G7CuNPDHn4/LpPJgaRQ==', '+51G7CuNPDHn4/LpPJgaRQ=='),
(31, 'lNEC9LOiJl1nre1KBa81Kzc0LBVT1mOA6MCA9vVNwjc=', 'd/IQ6Nb8NqPDlmxBAc9VMxVsWnlekeNwftBTYqrP8BA=', '7LfKN0pX27GO46fmEo5dLsXHCnX/dl4EGMeF5bK/5nY=', 'd/IQ6Nb8NqPDlmxBAc9VM0F66N7VADMOoUxe3KqL95k=', '+51G7CuNPDHn4/LpPJgaRQ==');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privilege` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `privilege`) VALUES
('5J5BUqd4We0V6uDDKG+uOA==', 'BfrlZ7caORxrKm7dMH4s5g==', '7cw8WAJ9qVFGhdNn3PARmQ==', 'BfrlZ7caORxrKm7dMH4s5g=='),
('5KFz111+6N9yc5lNFVmuFQ==', '/QQlT/RTCvM0v1Zbf5ml4A==', '7cw8WAJ9qVFGhdNn3PARmQ==', '/QQlT/RTCvM0v1Zbf5ml4A=='),
('GemJ8bJbDtFlLCAiUWHkQg==', 'oBModtg1DtmbtjzZghDCaQ==', '7cw8WAJ9qVFGhdNn3PARmQ==', '/QQlT/RTCvM0v1Zbf5ml4A=='),
('pq88/eMGoUbnoa/dVVgJlA==', 'lLsWdKfyk+c1pZ9nWPl/Vw==', '7cw8WAJ9qVFGhdNn3PARmQ==', 'lLsWdKfyk+c1pZ9nWPl/Vw==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `number` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `number` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
