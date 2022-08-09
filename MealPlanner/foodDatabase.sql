--
-- Food Database
-- Assignment 2
-- Made by Thomas Graham and Fionn McKercher
--

--
-- Initializing the food database,
-- granting all priveleges on appuser
-- By: Thomas Graham
--
CREATE DATABASE foodDatabase2;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON foodDatabase2.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE foodDatabase2;
--
-- Creating the users table
-- By: Fionn McKercher
--
CREATE TABLE IF NOT EXISTS `users` (
    `userID` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(30) NOT NULL,
    `height` int(11) NOT NULL,
    `weight` int(11) NOT NULL,
	PRIMARY KEY (`userID`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

--
-- Creating the food table
-- By: Thomas Graham
--
CREATE TABLE IF NOT EXISTS `food` (
    `foodID` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(75) NOT NULL,
    `calories` int(6) NOT NULL,
    `foodUserID` int(11) NOT NULL,
    PRIMARY KEY (`foodID`),
    CONSTRAINT FK_Food FOREIGN KEY (`foodUserID`)
    REFERENCES users(`userID`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

--
-- Adding team members as users
-- By: Fionn McKercher
--
INSERT INTO `users` (`userID`, `username`, `height`, `weight`)
VALUES
(1, 'FionnMcK', 180, 172),
(2, 'Tommy G', 410, 218);

--
-- Adding some common food items
-- By: Thomas Graham
--
INSERT INTO `food` (`foodID`, `name`, `calories`, `foodUserID`) VALUES
(1, '2 Cups of Broccoli', 62, 1),
(2, '1 Cup of Rice', 206, 1),
(3, 'Chicken Breast', 239, 1),
(4, '2 Cups of Broccoli', 62, 2),
(5, '1 Cup of Rice', 206, 2),
(6, 'Chicken Breast', 239, 2);


