-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2025 at 05:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_samsung`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_detail_pesanan`
--

CREATE TABLE `tabel_detail_pesanan` (
  `id_detail_pesanan` int NOT NULL,
  `id_pesanan` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_detail_pesanan`
--

INSERT INTO `tabel_detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_produk`, `jumlah`, `harga_satuan`) VALUES
(3, 3, 2, 1, '2659910.00'),
(4, 4, 2, 1, '2659910.00'),
(5, 5, 2, 1, '2659910.00'),
(6, 6, 3, 1, '3499999.00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kategori`
--

CREATE TABLE `tabel_kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_kategori`
--

INSERT INTO `tabel_kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Smartphone'),
(3, 'Tablet'),
(4, 'Wearables');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_keranjang`
--

CREATE TABLE `tabel_keranjang` (
  `id_keranjang` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_keranjang`
--

INSERT INTO `tabel_keranjang` (`id_keranjang`, `id_user`, `id_produk`, `jumlah`, `created_at`) VALUES
(8, 2, 2, 1, '2025-01-11 16:51:46'),
(9, 2, 2, 1, '2025-01-11 16:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pesanan`
--

CREATE TABLE `tabel_pesanan` (
  `id_pesanan` int NOT NULL,
  `id_user` int NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `metode_pembayaran` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pesanan`
--

INSERT INTO `tabel_pesanan` (`id_pesanan`, `id_user`, `tanggal_pesanan`, `total_harga`, `metode_pembayaran`) VALUES
(3, 2, '2025-01-11 22:36:31', '2659910.00', ''),
(4, 2, '2025-01-11 22:37:41', '2659910.00', ''),
(5, 2, '2025-01-11 22:43:07', '2659910.00', ''),
(6, 2, '2025-01-11 22:45:45', '3499999.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_produk`
--

CREATE TABLE `tabel_produk` (
  `id_produk` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `gambar` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `stok` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_produk`
--

INSERT INTO `tabel_produk` (`id_produk`, `nama`, `deskripsi`, `gambar`, `harga`, `stok`, `id_kategori`) VALUES
(2, 'Samsung Galaxy A16 4G', 'Samsung Galaxy A16 4G dibekali dengan layar seluas 6,7 inci Super AMOLED resolusi FHD+ dengan refresh rate 90Hz. Hp ini berjalan dengan sistem antarmuka One UI 6.1 versi terbaru.\r\n\r\nDari segi kualitas kameranya, Galaxy A16 dibekali lensa utama sebesar 50 MP, kamera ultrawide 5 MP, kamera depth sebesar 2 MP dan kamera depan sebesar 8 MP.\r\n\r\nPerformanya ditenagai chipset Helio G99 yang dipadukan dengan dua pilihan memori, yaitu 8/128 GB dan 8/256 GB, serta dilengkapi dengan RAM Plus hingga 8 GB.\r\n\r\nDi sektor baterai sudah berkapasitas 5000mAh ditambah bonus fitur Fast Charging sebesar 25W. Galaxy A16 versi 4G juga akan menerima enam kali pembaruan OS dan 6 tahun pembaruan Samsung Security Maintenance Releases (SMR). \r\n\r\nFitur lainnya dilengkapi dengan Samsung Knox Vault serta sudah mendapatkan sertifikasi IP54 yang membuatnya lebih kuat terhadap cipratan air dan debu.', '1736618295_5aa3e5a01137666bd136.jpg', '2659910', '50', 2),
(3, 'Samsung Galaxy Tab S9 FE', 'Samsung Galaxy Tab S9 FE adalah tablet yang memiliki layar 10.9\" dengan resolusi 1440 x 2304piksel. Spesifikasinya juga sudah dilengkapi kamera utama 8MP dan beberapa fitur lain untuk mendukung pemakaian sehari-hari. Tertarik beli? Temukan dulu penawaran harga Samsung Galaxy Tab S9 FE terbaik mulai dari IDR4.900.000 via iPrice.', '1736618782_f02f795919ce7b84ccc1.jpg', '3499999', '100', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','pelanggan') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama`, `email`, `no_hp`, `alamat`, `password`, `role`) VALUES
(1, 'Rendhi Richardo Ardiansyah', 'rendhi@gmail.com', '', '', '$2y$10$rB11X6S6jL6meIBVl72nE.oo8nRo0GqVEIjOjX7mEvQJgK.E7MjZO', 'pelanggan'),
(2, 'dini', 'dini@gmail.com', '', '', '$2y$10$.O7DGk9LRzDeDT9VxRmVWOAzXDxZqpREgejSQxh/hBS74BkUNQ.Cu', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_detail_pesanan`
--
ALTER TABLE `tabel_detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_produk`
--
ALTER TABLE `tabel_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_detail_pesanan`
--
ALTER TABLE `tabel_detail_pesanan`
  MODIFY `id_detail_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_kategori`
--
ALTER TABLE `tabel_kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  MODIFY `id_keranjang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  MODIFY `id_pesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tabel_produk`
--
ALTER TABLE `tabel_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_detail_pesanan`
--
ALTER TABLE `tabel_detail_pesanan`
  ADD CONSTRAINT `tabel_detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tabel_pesanan` (`id_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `tabel_detail_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tabel_produk` (`id_produk`) ON DELETE CASCADE;

--
-- Constraints for table `tabel_keranjang`
--
ALTER TABLE `tabel_keranjang`
  ADD CONSTRAINT `tabel_keranjang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`),
  ADD CONSTRAINT `tabel_keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tabel_produk` (`id_produk`);

--
-- Constraints for table `tabel_pesanan`
--
ALTER TABLE `tabel_pesanan`
  ADD CONSTRAINT `tabel_pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
