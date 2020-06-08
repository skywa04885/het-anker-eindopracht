-- Creates the database
CREATE DATABASE IF NOT EXISTS `anker`;

-- Uses the database
USE `anker`;

-- Creates the activities table
CREATE TABLE IF NOT EXISTS `activities` (
    `a_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `a_name` VARCHAR(255) NOT NULL,
    `a_desc` TEXT(2048) NOT NULL,
    `a_location` VARCHAR(128) NOT NULL,
    `a_start_time` TIME NOT NULL,
    `a_end_time` TIME NOT NULL,
    `a_max` INT(11) NOT NULL,
    `a_used` INT(11) NOT NULL DEFAULT 0,
    `a_deadline` DATE,
    `a_image` varchar(255) not null
);

-- Creates the register table
CREATE TABLE IF NOT EXISTS `registrations` (
    `r_activity_id` INT(11) NOT NULL,
    `r_user_id` INT(11) NOT NULL
);

-- Creates the users table
CREATE TABLE IF NOT EXISTS `users` (
    `u_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `u_password` TEXT(1024) NOT NULL,
    `u_email` VARCHAR(255) NOT NULL
);

-- Creates the personal table
CREATE TABLE IF NOT EXISTS `personal` (
    `p_id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `p_personal_number` INT(11) NOT NULL,
    `p_first_letter` CHAR NOT NULL,
    `p_fancy_name` VARCHAR(64),
    `p_last_name` VARCHAR(128),
    `p_email` VARCHAR(255) NOT NULL,
    -- I'm not an idiot, when storing it like this, it will take up only 16 bits / 2 bytes, while an 4 char string would take up 4 bytes
    `p_voucher` SMALLINT(3) NOT NULL
);