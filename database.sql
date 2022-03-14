/*
 * database.sql
 *
 * @author brandonjordan
 * @datetime 3/12/2022 22:2
 * @copyright (c) 2022 Brandon Jordan
 */

-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 13, 2022 at 12:19 AM
-- Server version: 5.7.32
-- PHP Version: 8.0.0

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
time_zone = "+00:00";

--
-- Database: `based`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees`
(
    `id`         bigint(20) NOT NULL,
    `first_name` varchar(20) NOT NULL,
    `last_name`  varchar(40) NOT NULL,
    `birth_date` date        NOT NULL,
    `manager_id` bigint(20) DEFAULT NULL,
    `timestamp`  timestamp   NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated`    timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
