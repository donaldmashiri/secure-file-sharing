-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 03:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airforce`
--

-- --------------------------------------------------------

--
-- Table structure for table `bases`
--

CREATE TABLE `bases` (
  `base_id` int(11) NOT NULL,
  `baseno` varchar(11) NOT NULL,
  `base_name` varchar(255) NOT NULL,
  `base_commander` varchar(255) NOT NULL,
  `base_location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bases`
--

INSERT INTO `bases` (`base_id`, `baseno`, `base_name`, `base_commander`, `base_location`, `password`) VALUES
(1, '12345', 'Manyame Air Base', 'Base Commander - H', 'Harare', 'base_one'),
(2, '56789', 'Thornhill Air Base', 'Base Commander - G', 'Gweru', 'base_two'),
(3, '1011', ' Field Air Force Base', 'Base Commander - C', 'Chegutu', 'base_three');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(11) NOT NULL,
  `doc_title` text NOT NULL,
  `doc_file` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not encrypted',
  `con_level` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `base1` varchar(11) DEFAULT '0',
  `base2` varchar(11) DEFAULT '0',
  `base3` varchar(11) DEFAULT '0',
  `base4` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `doc_title`, `doc_file`, `status`, `con_level`, `date_created`, `base1`, `base2`, `base3`, `base4`) VALUES
(7, 'Test', 'dFpNZ2pLVXh0cGxtZDM1VGp4SG5rMVdnWDZKeWZITzhCNWwybjl1Qnl3YVFKYVBjWWFTVk9PSldsQ2dsWmhURC9ISGk2bEJvcElPR1dyeWk2eXUvcUY2aHRPOVlnVUdDRmNFOEdHeURkZ0RKcHpWdUpzdkFqY0JjeGMzSnlXZTMxOHFiUGJyUWJmL3M5eUlUQThBaWFlSGgvRU12NHhqbUhMdmNwc2tieXR3N3d6eFNpcXJFbmF2ZVJPUG9mVXRtMFgwblV2RTBPMDdrSUZRMjRiNnh3S1RET29LYkZ6QlZOOWpTbzNhUUhqb2xzWThXVUJJSnAxZXV4d04yajRqMFhTOWRnZlV5VkwzOHZqODl4c1pyeWlzeW5CWWVXSjVPR1hmMy9RMUVDSmM9', 'encrypted', 'Medium', '2022-03-25', '1', '2', '1', NULL),
(8, 'What is Lorem Ipsum?', 'R2ZjV1gxbTVMN2JkZVMrK25QS2dRTjFxbXdPMEdSN2M1dWVYeEFHU0JqSDlvZHNDZVNuZXpLNi9Eb0djRlZHcFRMcFA5bWxiaUlaZW5QSXM3SjdJVkQwcWZyQXNDSjB4SlZ6M0V5VUcrTktCRUs4Tmt6cWlzWnc2WUwva21OVm1iSThCbUQ3V2I5c2FZaWN5bitJUnFjQ1ZJV0RLMTFjQ0lIVitJWGZFQnJoOGVocEQzMk5DVUFiTGgycmNETStza3dDak5Yalh6RjROd05GVUZWNlhnR1FKNmEzeE5TbDFRSVdCbnJNRVczdDZOMkpMTll5cEYvQlJKZ2xZS05IaGZGdWZtRW1ObzVJeVlHeU13c21LdkI3alFQQ1FlMVJBeGxCVDdKR2JIZUtEdzNhOWpMZm00ZHlGSW10SWdWTk42eHA3ZXdsdVpwcUtqRnh1L1RmRlN4Kys1UGd6RW9ZNjN2d1NNZnpoeG1EaXh4REo4NEtPYzFpWkx6Um9ySjViZFlCRlQxTEFjZWozMlkxakFBZ2h2THFiR1pzUmVBZ2lRMmI4cDBxSkNGOFdiWnl5UVRRUXZrVUNSdUt0Vkl3S2hUYm1RQnV3M2wvZUo2YnVEZTBsZGRRSjdhcklxbDNiZjVyS3FpVVpJcFpKT1JmSlZWOTRjWTF5bVl3dzgwUE5iNnRnMXFoWlpwbnQ5UkNQcm9TUFlSdm81ZElGUzVlb0lWbkdPdkh1WkVOQ1J1TFR3dGFhaklHTEhnRCs2T29lNDJiaVpmVm5YNnNuenNiUVY2VnlCbjJtWS91L29xSmFVeUtEdTU4WG5CWUxkS1o1b0tTck9ESmlSdk9FR2VDSmVxbW5CY3VtbEtaU2FrNHJ3b0IzWlFFTHZqdXROU1RMWmdBYjV0TTljcXNPYTlzaUxqaUpCQ28zTDNrR0JsMndTeTk0Vm44aE5UbDd2N0pwd25YTWExYndqNEJVK3A0Z1oxemttOFczZlF3WW5jQmFnRDdQNGd0bjljMGtVeWRkY2pOR2I1QmE2clYxdmxxd21SYjBGMlR1cmp4bHk4eW9xMDZwVTJidENTQT0=', 'encrypted', 'High', '2022-03-26', '0', '2', '2', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bases`
--
ALTER TABLE `bases`
  ADD PRIMARY KEY (`base_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bases`
--
ALTER TABLE `bases`
  MODIFY `base_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
