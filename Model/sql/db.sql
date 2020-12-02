CREATE DATABASE IF NOT EXISTS `db_employee_monitoring_system`;

CREATE TABLE IF NOT EXISTS `tbl_employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(2)  NOT NULL DEFAULT 1,
  `department_id` int(11) NOT NULL  DEFAULT 1,
  `emp_details_id` int(11) NOT NULL,
  `emp_id_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`employee_id`)
)engine=InnoDB;

CREATE TABLE IF NOT EXISTS `tbl_employee_details` (
  `emp_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_Name` varchar(30) NOT NULL,
  `middle_Name` varchar(30) NOT NULL,
  `last_Name` varchar(30) NOT NULL,
  `age`  int(3) NOT NULL,
  `gender` VARCHAR(6) NOT NULL CHECK (`gender` IN ('Male', 'Female')),
  `address` varchar(255) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `emp_image` varchar(255) DEFAULT NULL,
  `date_hire` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`emp_details_id`)
)engine=InnoDB;

CREATE TABLE IF NOT EXISTS   `tbl_department` (
    `department_id` INT(11) NOT NULL AUTO_INCREMENT ,
    `department` varchar(11) NOT NULL DEFAULT 'Unassigned',
    `status` varchar(10) NOT NULL DEFAULT 'Active',
    PRIMARY KEY (`department_id`)
)engine=InnoDB;


CREATE TABLE IF NOT EXISTS   `tbl_role` (
    `role_id` INT(2) NOT NULL AUTO_INCREMENT ,
    `role` varchar(11) NOT NULL DEFAULT 'Employee',
    PRIMARY KEY (`role_id`)
)engine=InnoDB;

CREATE TABLE IF NOT EXISTS   `tbl_attendance` (
    `attendance_id` INT(11) NOT NULL AUTO_INCREMENT ,
    `employee_id` int(11) NOT NULL,
    `time_in`  datetime NOT NULL DEFAULT current_timestamp(),
    `time_out`  datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`attendance_id`)
)engine=InnoDB;

ALTER TABLE `tbl_employees`
  ADD CONSTRAINT `fk_employees_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role`(`role_id`)
ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employees_department` FOREIGN KEY (`department_id`) REFERENCES `tbl_department`(`department_id`)
ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employees_details` FOREIGN KEY (`emp_details_id`) REFERENCES `tbl_employee_details`(`emp_details_id`)
ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tbl_attendance`
  ADD CONSTRAINT `fk_attendance_employees` FOREIGN KEY (`employee_id`) REFERENCES `tbl_employees`(`employee_id`)
ON DELETE CASCADE ON UPDATE CASCADE;
