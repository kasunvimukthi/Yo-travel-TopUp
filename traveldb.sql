-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 08:05 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` int(255) NOT NULL,
  `A_Name` varchar(255) NOT NULL,
  `A_Password` varchar(255) NOT NULL,
  `A_Email` varchar(255) NOT NULL,
  `A_Number` int(10) NOT NULL,
  `A_Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `ID` int(255) NOT NULL,
  `Date` date NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `all_icons`
--

CREATE TABLE `all_icons` (
  `ID` int(10) NOT NULL,
  `Icons` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `catogory`
--

CREATE TABLE `catogory` (
  `C_ID` int(255) NOT NULL,
  `C_Name` varchar(255) NOT NULL,
  `C_Image` longblob NOT NULL,
  `C_Details` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chat_bot`
--

CREATE TABLE `chat_bot` (
  `ID` int(11) NOT NULL,
  `Questions` varchar(1000) NOT NULL,
  `Answers` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `E_mail` varchar(255) NOT NULL,
  `Subject` varchar(500) NOT NULL,
  `Body` varchar(2000) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guider`
--

CREATE TABLE `guider` (
  `ID` int(255) NOT NULL,
  `G_Name` varchar(255) NOT NULL,
  `G_Contact_No` varchar(255) NOT NULL,
  `G_Email` varchar(255) NOT NULL,
  `G_Password` varchar(255) NOT NULL,
  `Latitude` varchar(255) NOT NULL,
  `Longitude` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Age` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guider_alocate`
--

CREATE TABLE `guider_alocate` (
  `ID` int(255) NOT NULL,
  `G_ID` int(255) NOT NULL,
  `P_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `ID` int(255) NOT NULL,
  `Act_ID` int(255) NOT NULL,
  `Acc_ID` int(255) NOT NULL,
  `Icon` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_Number` int(255) NOT NULL,
  `User_ID` int(255) NOT NULL,
  `T_ID` int(255) NOT NULL,
  `I_Date` date NOT NULL,
  `I_Time` time NOT NULL,
  `T_end_date` date NOT NULL,
  `T_start_date` date NOT NULL,
  `U_children` varchar(255) NOT NULL,
  `U_adults` varchar(255) NOT NULL,
  `U_child_cost` double(10,2) NOT NULL,
  `U_adult_cost` double(10,2) NOT NULL,
  `A_Adult_Cost` double(10,2) NOT NULL,
  `A_Child_Cost` double(10,2) NOT NULL,
  `P_type` varchar(15) NOT NULL,
  `T_Cost` double(10,2) NOT NULL,
  `Request` varchar(10000) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `no_of_travelers`
--

CREATE TABLE `no_of_travelers` (
  `T_ID` int(255) NOT NULL,
  `Package_Name` varchar(255) NOT NULL,
  `No_of_Travelers` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `Travel_ID` int(255) NOT NULL,
  `C_ID` int(255) NOT NULL,
  `T_Name` varchar(255) NOT NULL,
  `T_Image` longblob NOT NULL,
  `T_Details` mediumtext NOT NULL,
  `T_Adult_Cost` double(10,2) NOT NULL,
  `T_Child_Cost` double(10,2) NOT NULL,
  `T_Adult_S_Price` double(10,2) NOT NULL,
  `T_Child_S_Price` double(10,2) NOT NULL,
  `T_Locations` varchar(255) NOT NULL,
  `T_Map` varchar(500) NOT NULL,
  `T_Start_Date` date DEFAULT NULL,
  `T_End_Date` date DEFAULT NULL,
  `Available_Seat` int(255) NOT NULL,
  `Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package_status`
--

CREATE TABLE `package_status` (
  `T_ID` int(255) NOT NULL,
  `No_of_Package` int(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` int(255) NOT NULL,
  `I_ID` int(255) NOT NULL,
  `Payment_Slip` longblob NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prediction`
--

CREATE TABLE `prediction` (
  `ID` int(255) NOT NULL,
  `P_ID` int(255) NOT NULL,
  `P_Name` varchar(255) NOT NULL,
  `P_Start_Date` varchar(255) NOT NULL,
  `No_of_pacenger` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prediction_chart`
--

CREATE TABLE `prediction_chart` (
  `P_Name` varchar(255) NOT NULL,
  `M_B_Month_C` int(255) NOT NULL,
  `P_Month_C` int(255) NOT NULL,
  `N_Month_C` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profit_loss`
--

CREATE TABLE `profit_loss` (
  `ID` int(255) NOT NULL,
  `Date` date NOT NULL,
  `Profit_Loss` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_accommodation`
--

CREATE TABLE `p_accommodation` (
  `ID` int(255) NOT NULL,
  `P_ID` int(255) NOT NULL,
  `A_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_activity`
--

CREATE TABLE `p_activity` (
  `ID` int(255) NOT NULL,
  `P_ID` int(255) NOT NULL,
  `Act_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_accommodation`
--

CREATE TABLE `t_accommodation` (
  `ID` int(255) NOT NULL,
  `A_Name` varchar(255) NOT NULL,
  `A_summary` varchar(1000) NOT NULL,
  `A_Location` varchar(255) NOT NULL,
  `A_Details` varchar(10000) NOT NULL,
  `A_Link` varchar(1000) NOT NULL,
  `A_Image` longblob NOT NULL,
  `Style` varchar(255) NOT NULL,
  `No_of_rooms` int(10) NOT NULL,
  `Key_features` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_activities`
--

CREATE TABLE `t_activities` (
  `ID` int(255) NOT NULL,
  `A_Name` varchar(255) NOT NULL,
  `A_summary` varchar(1000) NOT NULL,
  `A_Location` varchar(255) NOT NULL,
  `A_Details` varchar(1000) NOT NULL,
  `A_Image` longblob NOT NULL,
  `A_Map` varchar(1000) NOT NULL,
  `A_Duration` varchar(255) NOT NULL,
  `A_Best_Time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_conditions`
--

CREATE TABLE `t_conditions` (
  `ID` int(255) NOT NULL,
  `T_ID` int(255) NOT NULL,
  `Conditions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_highlights`
--

CREATE TABLE `t_highlights` (
  `ID` int(255) NOT NULL,
  `T_ID` int(255) NOT NULL,
  `Highlights` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_image`
--

CREATE TABLE `t_image` (
  `ID` int(255) NOT NULL,
  `T_ID` int(255) NOT NULL,
  `A_ID` int(255) NOT NULL,
  `AC_ID` int(255) NOT NULL,
  `T_Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_includes`
--

CREATE TABLE `t_includes` (
  `ID` int(255) NOT NULL,
  `T_ID` int(255) NOT NULL,
  `Includes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_itinerary`
--

CREATE TABLE `t_itinerary` (
  `ID` int(255) NOT NULL,
  `T_ID` int(255) NOT NULL,
  `I_Date` varchar(255) NOT NULL,
  `I_Locations` varchar(255) NOT NULL,
  `I_Details` varchar(1000) NOT NULL,
  `I_Accommodations` varchar(255) NOT NULL,
  `I_Activities` varchar(255) NOT NULL,
  `I_Image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_map`
--

CREATE TABLE `t_map` (
  `ID` int(255) NOT NULL,
  `T_ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Lat` float(10,6) DEFAULT NULL,
  `lon` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(255) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `Age` int(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `Phone_Number` int(10) NOT NULL,
  `U_Status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `ID` int(255) NOT NULL,
  `IP` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `all_icons`
--
ALTER TABLE `all_icons`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `catogory`
--
ALTER TABLE `catogory`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `chat_bot`
--
ALTER TABLE `chat_bot`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guider`
--
ALTER TABLE `guider`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guider_alocate`
--
ALTER TABLE `guider_alocate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_Number`);

--
-- Indexes for table `no_of_travelers`
--
ALTER TABLE `no_of_travelers`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Travel_ID`);

--
-- Indexes for table `package_status`
--
ALTER TABLE `package_status`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prediction`
--
ALTER TABLE `prediction`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `profit_loss`
--
ALTER TABLE `profit_loss`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_accommodation`
--
ALTER TABLE `p_accommodation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_activity`
--
ALTER TABLE `p_activity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_accommodation`
--
ALTER TABLE `t_accommodation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_activities`
--
ALTER TABLE `t_activities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_conditions`
--
ALTER TABLE `t_conditions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_highlights`
--
ALTER TABLE `t_highlights`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_image`
--
ALTER TABLE `t_image`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_includes`
--
ALTER TABLE `t_includes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_itinerary`
--
ALTER TABLE `t_itinerary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_map`
--
ALTER TABLE `t_map`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `all_icons`
--
ALTER TABLE `all_icons`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catogory`
--
ALTER TABLE `catogory`
  MODIFY `C_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_bot`
--
ALTER TABLE `chat_bot`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guider`
--
ALTER TABLE `guider`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guider_alocate`
--
ALTER TABLE `guider_alocate`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_Number` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `no_of_travelers`
--
ALTER TABLE `no_of_travelers`
  MODIFY `T_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `Travel_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_status`
--
ALTER TABLE `package_status`
  MODIFY `T_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prediction`
--
ALTER TABLE `prediction`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profit_loss`
--
ALTER TABLE `profit_loss`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_accommodation`
--
ALTER TABLE `p_accommodation`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_activity`
--
ALTER TABLE `p_activity`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_accommodation`
--
ALTER TABLE `t_accommodation`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_activities`
--
ALTER TABLE `t_activities`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_conditions`
--
ALTER TABLE `t_conditions`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_highlights`
--
ALTER TABLE `t_highlights`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_image`
--
ALTER TABLE `t_image`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_includes`
--
ALTER TABLE `t_includes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_itinerary`
--
ALTER TABLE `t_itinerary`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_map`
--
ALTER TABLE `t_map`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
