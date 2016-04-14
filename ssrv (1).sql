-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2015 at 02:23 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ssrv`
--

-- --------------------------------------------------------

--
-- Table structure for table `consists_of`
--

CREATE TABLE IF NOT EXISTS `consists_of` (
  `stationID` char(4) NOT NULL,
  `trainID` char(5) NOT NULL,
  `stopNumber` decimal(2,0) NOT NULL,
  PRIMARY KEY (`stationID`,`trainID`,`stopNumber`),
  KEY `fk_Consists_Of_trainID` (`trainID`,`stopNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consists_of`
--

INSERT INTO `consists_of` (`stationID`, `trainID`, `stopNumber`) VALUES
('4367', '77546', '1'),
('1299', '77546', '2'),
('1208', '77546', '3'),
('1350', '77546', '4'),
('4386', '77546', '5'),
('1327', '77546', '6');

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_ticket`
--
CREATE TABLE IF NOT EXISTS `display_ticket` (
`PNR` char(10)
,`lastName` varchar(15)
,`firstName` varchar(15)
,`gender` char(1)
,`age` decimal(3,0)
,`seatNo` varchar(5)
,`reservationStatus` varchar(15)
,`trainID` char(5)
,`classType` varchar(10)
,`dateOfBooking` date
,`fromStationID` char(4)
,`toStationID` char(4)
);
-- --------------------------------------------------------

--
-- Table structure for table `online_user`
--

CREATE TABLE IF NOT EXISTS `online_user` (
  `emailID` varchar(40) NOT NULL,
  `upassword` varchar(20) DEFAULT NULL,
  `firstName` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `mobileNumber` char(10) DEFAULT NULL,
  `securityQ` varchar(60) DEFAULT NULL,
  `securityA` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`emailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_user`
--

INSERT INTO `online_user` (`emailID`, `upassword`, `firstName`, `lastName`, `gender`, `DOB`, `mobileNumber`, `securityQ`, `securityA`) VALUES
('angeladavidson@gmail.com', 'everything', 'angela', 'Davidson', 'F', '0000-00-00', '2405669908', 'What was your favorite food as a child?', 'Burger'),
('chrisbrown@gmail.com', '12345', 'Chris', 'Brown', 'M', '0000-00-00', '2405678892', 'what is your pets name?', 'Tom'),
('danchapman76@yahoo.com', 'thui8690k', 'Dan', 'Chapman', 'M', '0000-00-00', '2467893345', 'What is the name of your favorite person in history?', 'Albert Einstein'),
('jake12@yahoo.com', 'wh568lpo', 'Jake', 'Hudson', 'M', '0000-00-00', '3013877725', 'In what city did your mother and father meet?', 'New York'),
('jenniferclarkson12@aol.com', 'k92sfg', 'Jennifer', 'Clarkson', 'F', '0000-00-00', '2405439087', 'what was your childhood name?', 'Jenny');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE IF NOT EXISTS `passenger` (
  `PNR` char(10) NOT NULL,
  `seatNo` varchar(5) NOT NULL,
  `firstName` varchar(15) DEFAULT NULL,
  `lastName` varchar(15) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` decimal(3,0) DEFAULT NULL,
  `reservationStatus` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`PNR`,`seatNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`PNR`, `seatNo`, `firstName`, `lastName`, `gender`, `age`, `reservationStatus`) VALUES
('2900786543', '29', 'Amy', 'Jones', 'F', '45', 'Waitlisted'),
('5568786543', '32', 'Dan', 'Chapman', 'M', '27', 'Waitlisted'),
('5568786543', '5', 'Jennifer', 'Clarkson', 'F', '33', 'Confirmed'),
('8760012344', '27', 'Sean', 'Hart', 'M', '67', 'Confirmed'),
('8760012344', '48', 'Nina', 'Hudson', 'F', '27', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_ticket`
--

CREATE TABLE IF NOT EXISTS `passenger_ticket` (
  `PNR` char(10) NOT NULL,
  `emailID` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`PNR`),
  KEY `fk_Passenger_Ticket_emailID` (`emailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger_ticket`
--

INSERT INTO `passenger_ticket` (`PNR`, `emailID`) VALUES
('2900786543', 'chrisbrown@gmail.com'),
('8760012344', 'jake12@yahoo.com'),
('5568786543', 'jenniferclarkson12@aol.com');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE IF NOT EXISTS `reserves` (
  `emailID` varchar(40) NOT NULL,
  `PNR` char(10) NOT NULL,
  `trainID` char(5) NOT NULL,
  `classType` varchar(10) NOT NULL,
  `dateOfBooking` date NOT NULL,
  `fromStationID` char(4) NOT NULL,
  `toStationID` char(4) NOT NULL,
  PRIMARY KEY (`emailID`,`PNR`,`trainID`,`classType`,`dateOfBooking`,`fromStationID`,`toStationID`),
  KEY `fk_Reserves_PNR` (`PNR`),
  KEY `fk_Reserves_seat` (`trainID`,`classType`,`dateOfBooking`),
  KEY `fk_Reserves_fromStationID` (`fromStationID`),
  KEY `fk_Reserves_toStationID` (`toStationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`emailID`, `PNR`, `trainID`, `classType`, `dateOfBooking`, `fromStationID`, `toStationID`) VALUES
('jake12@yahoo.com', '8760012344', '77546', 'Economy', '2015-12-12', '1208', '1327'),
('jenniferclarkson12@aol.com', '5568786543', '77546', 'Economy', '2015-12-12', '1208', '1327'),
('chrisbrown@gmail.com', '2900786543', '77546', 'Economy', '2015-12-12', '1299', '1327');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `trainID` char(5) NOT NULL,
  `stopNumber` decimal(2,0) NOT NULL,
  `distance` decimal(20,0) DEFAULT NULL,
  `arrivalTime` time DEFAULT NULL,
  `departureTime` time DEFAULT NULL,
  `estArrival` time DEFAULT NULL,
  `estDep` time DEFAULT NULL,
  PRIMARY KEY (`trainID`,`stopNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`trainID`, `stopNumber`, `distance`, `arrivalTime`, `departureTime`, `estArrival`, `estDep`) VALUES
('77546', '1', '0', '12:00:00', '12:10:00', NULL, NULL),
('77546', '2', '220', '09:00:00', '09:05:00', NULL, NULL),
('77546', '3', '590', '13:45:00', '13:55:00', NULL, NULL),
('77546', '4', '720', '15:30:00', '15:35:00', NULL, NULL),
('77546', '5', '890', '16:30:00', '16:35:00', NULL, NULL),
('77546', '6', '950', '17:20:00', '00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seat_availability`
--

CREATE TABLE IF NOT EXISTS `seat_availability` (
  `trainID` char(5) NOT NULL,
  `classType` varchar(10) NOT NULL,
  `availableDate` date NOT NULL,
  `bookedSeats` decimal(3,0) DEFAULT NULL,
  `waitingSeats` decimal(3,0) DEFAULT NULL,
  `availableSeats` decimal(3,0) DEFAULT NULL,
  PRIMARY KEY (`trainID`,`classType`,`availableDate`),
  KEY `fk_Seat_Availability_classType` (`classType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_availability`
--

INSERT INTO `seat_availability` (`trainID`, `classType`, `availableDate`, `bookedSeats`, `waitingSeats`, `availableSeats`) VALUES
('77546', 'Business', '2015-12-12', '220', '0', '30'),
('77546', 'Economy', '2015-12-12', '250', '20', '0'),
('77546', 'General', '2015-12-12', '175', '0', '75');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `stationID` char(4) NOT NULL,
  `stationName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`stationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationID`, `stationName`) VALUES
('1208', 'New York'),
('1299', 'New Haven'),
('1327', 'Washington DC'),
('1350', 'Philadelphia'),
('4367', 'Boston'),
('4386', 'Baltimore');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE IF NOT EXISTS `train` (
  `trainID` char(5) NOT NULL,
  `trainName` char(25) DEFAULT NULL,
  `runningDays` char(10) DEFAULT NULL,
  `startStationID` char(4) DEFAULT NULL,
  `endStationID` char(4) DEFAULT NULL,
  PRIMARY KEY (`trainID`),
  KEY `fk_Train_startStationID` (`startStationID`),
  KEY `fk_Train_endStationID` (`endStationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`trainID`, `trainName`, `runningDays`, `startStationID`, `endStationID`) VALUES
('56789', 'AdventureLand', 'Mondays', '1208', '1299'),
('67545', 'Arrow', 'Fridays', '1350', '4386'),
('77546', 'BlackGold', 'Wednesdays', '4367', '1327');

-- --------------------------------------------------------

--
-- Table structure for table `train_class`
--

CREATE TABLE IF NOT EXISTS `train_class` (
  `class` varchar(10) NOT NULL,
  `fare` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`class`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_class`
--

INSERT INTO `train_class` (`class`, `fare`) VALUES
('Business', '300.00'),
('Economy', '240.00'),
('General', '175.00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `train_route`
--
CREATE TABLE IF NOT EXISTS `train_route` (
`trainID` char(5)
,`trainName` char(25)
,`stationID` char(4)
,`stationName` varchar(20)
,`stopNumber` decimal(2,0)
,`arrivalTime` time
,`departureTime` time
);
-- --------------------------------------------------------

--
-- Structure for view `display_ticket`
--
DROP TABLE IF EXISTS `display_ticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_ticket` AS select `p`.`PNR` AS `PNR`,`p`.`lastName` AS `lastName`,`p`.`firstName` AS `firstName`,`p`.`gender` AS `gender`,`p`.`age` AS `age`,`p`.`seatNo` AS `seatNo`,`p`.`reservationStatus` AS `reservationStatus`,`r`.`trainID` AS `trainID`,`r`.`classType` AS `classType`,`r`.`dateOfBooking` AS `dateOfBooking`,`r`.`fromStationID` AS `fromStationID`,`r`.`toStationID` AS `toStationID` from (`passenger` `p` join `reserves` `r`) where (`p`.`PNR` = `r`.`PNR`);

-- --------------------------------------------------------

--
-- Structure for view `train_route`
--
DROP TABLE IF EXISTS `train_route`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `train_route` AS select `route`.`trainID` AS `trainID`,`train`.`trainName` AS `trainName`,`consists_of`.`stationID` AS `stationID`,`station`.`stationName` AS `stationName`,`route`.`stopNumber` AS `stopNumber`,`route`.`arrivalTime` AS `arrivalTime`,`route`.`departureTime` AS `departureTime` from (((`consists_of` join `route` on(((`consists_of`.`trainID` = `route`.`trainID`) and (`consists_of`.`stopNumber` = `route`.`stopNumber`)))) join `station` on((`consists_of`.`stationID` = `station`.`stationID`))) join `train` on((`route`.`trainID` = `train`.`trainID`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consists_of`
--
ALTER TABLE `consists_of`
  ADD CONSTRAINT `fk_Consists_Of_stationID` FOREIGN KEY (`stationID`) REFERENCES `station` (`stationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Consists_Of_trainID` FOREIGN KEY (`trainID`, `stopNumber`) REFERENCES `route` (`trainID`, `stopNumber`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `fk_Passenger_Ticket_PNR` FOREIGN KEY (`PNR`) REFERENCES `passenger_ticket` (`PNR`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `passenger_ticket`
--
ALTER TABLE `passenger_ticket`
  ADD CONSTRAINT `fk_Passenger_Ticket_emailID` FOREIGN KEY (`emailID`) REFERENCES `online_user` (`emailID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `fk_Reserves_emailID` FOREIGN KEY (`emailID`) REFERENCES `online_user` (`emailID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserves_PNR` FOREIGN KEY (`PNR`) REFERENCES `passenger_ticket` (`PNR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserves_seat` FOREIGN KEY (`trainID`, `classType`, `dateOfBooking`) REFERENCES `seat_availability` (`trainID`, `classType`, `availableDate`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserves_fromStationID` FOREIGN KEY (`fromStationID`) REFERENCES `station` (`stationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reserves_toStationID` FOREIGN KEY (`toStationID`) REFERENCES `station` (`stationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `fk_Route_trainID` FOREIGN KEY (`trainID`) REFERENCES `train` (`trainID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `seat_availability`
--
ALTER TABLE `seat_availability`
  ADD CONSTRAINT `fk_Seat_Availability_trainID` FOREIGN KEY (`trainID`) REFERENCES `train` (`trainID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Seat_Availability_classType` FOREIGN KEY (`classType`) REFERENCES `train_class` (`class`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `fk_Train_startStationID` FOREIGN KEY (`startStationID`) REFERENCES `station` (`stationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Train_endStationID` FOREIGN KEY (`endStationID`) REFERENCES `station` (`stationID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
