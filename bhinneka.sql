-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Apr 2024 pada 19.44
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
('d00c3b74-c5bb-499f-8688-53755c4596e5', 'PR03', 'Oli Mesin', 'liter', 'Oli mesin', '125000'),
('ef8c2173-e518-4c9e-8e1c-82c0169ca495', 'PR01', 'Ban Luar', 'pcs', 'Ban adalah bagian penting dari sebuah kendaraan merupakan peranti yang menutupi velg roda dan digunakan untuk melindungi roda dari aus dan kerusakan', '2300000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_suppliers`
--

CREATE TABLE `ms_suppliers` (
  `id` varchar(255) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ms_suppliers`
--

INSERT INTO `ms_suppliers` (`id`, `supplier_name`, `address`, `phone`) VALUES
('3780085a-7c58-4f99-92f5-00898fe16209', 'PT. Sentosa', 'Jl. Bypass Cirebon', '087161726122'),
('6f436fc9-d4fb-4745-b8f8-9ae8a1f1c2d6', 'PT. Berkah Jaya', 'Jalan Sehat', '081828128344');

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
('a6e6ef88-9815-455d-a059-9716d6545643', 'Purchasing', 'purchasing', 'purchasing', '$2y$10$r1MsCDl6rAEAtLAnsD7.B.t687QuKgEtIoRaP/OpCPVNqFm7Yso/O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_po`
--

CREATE TABLE `tr_po` (
  `id` varchar(250) NOT NULL,
  `po_code` varchar(100) NOT NULL,
  `id_supplier` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `notes` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tr_po`
--

INSERT INTO `tr_po` (`id`, `po_code`, `id_supplier`, `total`, `date`, `notes`) VALUES
('a8689fe2-7e17-4bb6-b881-f4b6b46cdf48', 'PO20240403185418', '6f436fc9-d4fb-4745-b8f8-9ae8a1f1c2d6', '2550000', '2024-04-03', 'test'),
('c31f49eb-7e6f-4391-80bf-74338456dab1', 'PO20240403185726', '3780085a-7c58-4f99-92f5-00898fe16209', '125000', '2024-04-03', 'test lagi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_po_detail_product`
--

CREATE TABLE `tr_po_detail_product` (
  `id` varchar(250) NOT NULL,
  `id_po` varchar(250) NOT NULL,
  `id_product` varchar(250) NOT NULL,
  `qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tr_po_detail_product`
--

INSERT INTO `tr_po_detail_product` (`id`, `id_po`, `id_product`, `qty`) VALUES
('24f5f779-70bc-4703-9a9a-b3fc422a4186', 'PO20240403185418', 'd00c3b74-c5bb-499f-8688-53755c4596e5', '2'),
('2b6bffba-9c39-4576-b607-13a4d914edda', 'PO20240403185726', 'd00c3b74-c5bb-499f-8688-53755c4596e5', '1'),
('d4771416-f639-4f69-968d-fed0dd95de0a', 'PO20240403185418', 'ef8c2173-e518-4c9e-8e1c-82c0169ca495', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ms_products`
--
ALTER TABLE `ms_products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_suppliers`
--
ALTER TABLE `ms_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_users`
--
ALTER TABLE `ms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tr_po`
--
ALTER TABLE `tr_po`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tr_po_detail_product`
--
ALTER TABLE `tr_po_detail_product`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
