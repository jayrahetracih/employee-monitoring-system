CREATE DATABASE IF NOT EXISTS `db_employee_monitoring_system`;

CREATE TABLE IF NOT EXISTS `tbl_employees` (
  `Employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `Role_id` int(11) NOT NULL DEFAULT 2,
  `First_Name` varchar(30) NOT NULL,
  `Middle_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Employee_id`)
)engine=InnoDB;

CREATE TABLE IF NOT EXISTS `tbl_roles` (
    `Role_id` int(11) NOT NULL,
    `Designation` varchar(30) NOT NULL,
    `Privilege` int(11) NOT NULL,
    PRIMARY KEY (`Role_id`)
)engine=InnoDB;

ALTER TABLE `tbl_employees`
  ADD CONSTRAINT `fk_employees_roles` FOREIGN KEY (`Role_id`) REFERENCES `tbl_roles`(`Role_id`)
ON DELETE CASCADE ON UPDATE CASCADE;