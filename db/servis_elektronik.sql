-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2026 at 03:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servis_elektronik`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `problem_description` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `service_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `problem_description`, `order_date`, `status`, `created_at`) VALUES
(1, 1, 'Suki Mau Coba Dulu', '086572834956', 'suki@gmail.com', 'Jln suki No.8 Perumahan suki suki', 'AC suki rusak, suki mau coba benerin dulu.', '2025-12-20', 'pending', '2025-12-18 20:52:41'),
(2, 6, 'Dodol Kerik', '086876430975', 'dodol@gmail.com', 'Jln dodol No.10 cluster dodol kerik', 'dodol mau benerin kipas angin, karna kipas angin dodol rusak.', '2025-12-18', 'pending', '2025-12-18 20:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`, `image_url`, `category`, `duration`, `created_at`) VALUES
(1, 'Servis AC', 'Servis AC lengkap termasuk pembersihan, isi freon, dan pengecekan komponen', 150000.00, 'https://serviceacfortune.com/wp-content/uploads/2021/08/Perbaikan-AC-01-1024x768.jpg', 'Air Conditioner', '2-3 Jam', '2025-12-18 20:28:51'),
(2, 'Servis Mesin Cuci', 'Perbaikan dan perawatan mesin cuci satu dan dua tabung', 120000.00, 'https://pusatjayateknik.com/wp-content/uploads/2023/01/serviceman-repairs-broken-washing-machine-near-beige-wall-Copy-2.jpg', 'Laundry', '1-2 Hari', '2025-12-18 20:28:51'),
(3, 'Servis Kulkas', 'Servis kulkas dan freezer termasuk perbaikan cooling system', 180000.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTCrlEMagQbmCBHAHgYetQVQVse6OuLYI7FNQ&s', 'Refrigerator', '1-2 Hari', '2025-12-18 20:28:51'),
(4, 'Servis TV', 'Perbaikan TV LED, LCD, dan Plasma berbagai ukuran', 100000.00, 'https://alarsenalelectronics.com/wp-content/uploads/2024/06/depositphotos_137860252-stock-photo-technician-repairing-television-at-home-1.webp', 'Television', '3-5 Hari', '2025-12-18 20:28:51'),
(5, 'Servis Laptop', 'Hardware dan software repair untuk semua merk laptop', 200000.00, 'https://maestronik.com/wp-content/uploads/2023/03/jasa-servis-laptop.jpg', 'Computer', '3-5 Hari', '2025-12-18 20:28:51'),
(6, 'Servis Kipas Angin', 'Perbaikan dan perawatan kipas angin berdiri dan dinding', 75000.00, 'https://www.vinindo.co.id/usr/media/173_ilustrasi_memperbaiki_kipas_angin.jpg', 'Fan', '1-2 Jam', '2025-12-18 20:28:51'),
(7, 'Servis Kompor', 'Layanan servis kompor adalah proses pemeliharaan, perbaikan, atau pemulihan kompor yang mengalami masalah fungsional. ', 50000.00, 'https://d9z08rm53j0ai.cloudfront.net/images/news/service-kompor-gas/image.jpg', 'Kitchen', '2-3 Jam', '2025-12-18 20:47:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
