-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2024 pada 15.21
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bhinneka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_products`
--

CREATE TABLE `ms_products` (
  `id` varchar(255) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ms_products`
--

INSERT INTO `ms_products` (`id`, `product_code`, `product_name`, `unit`, `description`, `price`) VALUES
('a0a42d56-7bd0-4d8c-839c-a1b070cf8c60', 'PR02', 'Baut Ukuran 18', 'dus', 'Menggabungkan beberapa komponen sehingga tergabung menjadi satu bagian yang memiliki sifat tidak permanen', '110000'),
('ef8c2173-e518-4c9e-8e1c-82c0169ca495', 'PR01', 'Ban Luar', 'pcs', 'Ban adalah bagian penting dari sebuah kendaraan merupakan peranti yang menutupi velg roda dan digunakan untuk melindungi roda dari aus dan kerusakan', '2300000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_users`
--

CREATE TABLE `ms_users` (
  `id` varchar(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ms_users`
--

INSERT INTO `ms_users` (`id`, `fullname`, `username`, `role`, `password`) VALUES
('8adcbf83-e6ba-48ee-a1d7-e4d43a1c85ca', 'Admin', 'admin', 'admin', '$2y$10$r1MsCDl6rAEAtLAnsD7.B.t687QuKgEtIoRaP/OpCPVNqFm7Yso/O'),
('a6e6ef88-9815-455d-a059-9716d6545643', 'Purchasing', 'purcashing', 'purchasing', '$2y$10$I8PvP4tsueWtblvOhwc39.scXhFbPgr.RTgrQudoEgL6.I4srTxHS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_products`
--
ALTER TABLE `ms_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
