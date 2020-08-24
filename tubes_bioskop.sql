-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 03:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$TUYIpHPRIWmZhFybxKP33.dMfwZboDHGFHirh2ibx.9WbEz7k/uUC', 'admin'),
(3, 'Yolanda', 'yolanda@gmail.com', '$2y$10$wazDOBmf80NyCMaU5LKpOOSzyxRkGh97tLWniQMB5vM7XQc2uf2Am', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `status` enum('member','nonmember') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `email`, `password`, `nama`, `no_telepon`, `status`) VALUES
(15, 'rifqiramdhani8@gmail.com', '$2y$10$bY11PhcFtfddJ1OFgoA5t.50XosKoXEtwmU0TTL0V3xwXYwWruHQe', 'Rifqi Ramdhani', '081393003129', 'member'),
(16, 'ruyatsy@gmail.com', '$2y$10$HsJ9RDATE9Rgm2QRZSX96uMBYgmd0Z3/MIBf6sdlSEGCMwmnwcy3u', 'Ruyatsyah', '08229928837718', 'nonmember');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `id_dt_jadwal` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_studio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`id_dt_jadwal`, `id_admin`, `id_jadwal`, `id_film`, `id_studio`) VALUES
(1, 1, 3, 1, 2),
(2, 1, 4, 16, 1),
(3, 1, 3, 1, 1),
(4, 1, 3, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `durasi` varchar(10) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `kategori` varchar(5) NOT NULL,
  `direktori` varchar(50) NOT NULL,
  `tanggal_tayang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul`, `durasi`, `genre`, `kategori`, `direktori`, `tanggal_tayang`) VALUES
(1, 'Toy Story 4', '120 min', 'Petualangan', '13++', '95169057.jpeg', '2020-07-31'),
(16, 'Sonic', '99 min', 'Komedi', '15 ++', '34504186.jpg', '2020-08-28'),
(17, 'Trip to Greece', '110 min', 'Komedi', '18 ++', '71179432.jpg', '2020-08-22'),
(18, 'The Wretched', '99 min', 'Horror', '18 ++', '25001529.jpg', '2020-08-27'),
(19, 'Military Wilves', '104 min', 'Drama', '18 ++', '14922701.jpg', '2020-08-31'),
(22, 'Dream Horse', '113 min', 'Drama', '15 ++', '43968191.jpg', '2020-09-05'),
(23, 'Blade Runner', '184 min', 'Action', '18 ++', '62679873.jpg', '2020-09-06'),
(24, 'Braveheart', '178 min', 'Drama', '18 ++', '96608229.jpg', '2020-09-07'),
(25, 'Cicade de Deus', '130 min', 'Drama', '18 ++', '99366878.jpg', '2020-09-09'),
(28, 'Gladiator', '195 min', 'Action', '18 ++', '73644071.jpg', '2020-09-13'),
(29, 'Glory', '122 min', 'Drama', '18 ++', '91440666.jpg', '2020-09-14'),
(30, 'Gone Girl', '149 min', 'Drama', '18 ++', '66146127.jpg', '2020-09-15'),
(31, 'Goodfellas', '146 min', 'Drama', '18 ++', '16444837.jpg', '2020-09-16'),
(32, 'Grand Torino', '116 min', 'Drama', '18 ++', '13718107.jpg', '2020-09-16'),
(33, 'Heat', '170 min', 'Drama', '18 ++', '17021149.jpg', '2020-09-17'),
(34, 'Her', '126 min', 'Romantis', '15 ++', '74955577.jpg', '2020-09-18'),
(35, 'Interstellar', '169 min', 'Petualangan', '18 ++', '69049891.jpg', '2020-09-20'),
(37, 'Logan', '137 min', 'Action', '15 ++', '7863612.jpg', '2020-09-29'),
(38, 'Nightcrawler', '117 min', 'Drama', '18 ++', '38110879.jpg', '2020-09-30'),
(39, 'Okuribito', '130 min', 'Drama', '15 ++', '62791236.jpg', '2020-10-01'),
(40, 'Rush', '123 min', 'Drama', '15 ++', '73987329.jpg', '2020-10-02'),
(41, 'Saving Private Ryan', '184 min', 'Drama', '18 ++', '43759296.jpg', '2020-10-03'),
(44, 'The Lion King', '86 min', 'Petualangan', '15 ++', '6710461.jpg', '2020-10-14'),
(46, 'The Prestige', '130 min', 'Drama', '15 ++', '77378249.jpg', '2020-10-16'),
(47, 'Yip Man', '104 min', 'Action', '15 ++', '18969371.jpg', '2020-10-17'),
(48, 'The Shawmshank', '144 min', 'Drama', '18 ++', '56611015.jpg', '2020-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `jam_tayang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jam_tayang`) VALUES
(2, '17:00:00'),
(3, '14:45:00'),
(4, '09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `paket_makanan`
--

CREATE TABLE `paket_makanan` (
  `id_paket_makanan` int(11) NOT NULL,
  `nama_paket_makanan` varchar(50) NOT NULL,
  `harga` int(1) NOT NULL,
  `stok` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_makanan`
--

INSERT INTO `paket_makanan` (`id_paket_makanan`, `nama_paket_makanan`, `harga`, `stok`) VALUES
(1, 'Paket Big Burger dan Cola-cola', 100000, 10),
(2, 'Paket Pop Corn dan Orange Juice', 50000, 15),
(3, 'Paket French Fries dan Avocado Milky', 60000, 10),
(4, 'Cuangki', 10000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `struk`
--

CREATE TABLE `struk` (
  `id_struk` int(11) NOT NULL,
  `id_paket_makanan` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total_harga` int(7) NOT NULL,
  `qty` int(3) NOT NULL,
  `metode_pembayaran` varchar(5) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struk`
--

INSERT INTO `struk` (`id_struk`, `id_paket_makanan`, `id_customer`, `nama`, `email`, `total_harga`, `qty`, `metode_pembayaran`, `tanggal`) VALUES
(1, 2, NULL, 'Rifqi Ramdhani', 'Rifqiramdhani8@gmail.com', 50000, 1, 'GOPAY', '2020-08-01 08:16:35'),
(2, 2, NULL, 'Rifqi Ramdhani', 'Rifqiramdhani8@gmail.com', 50000, 1, 'GOPAY', '2020-08-01 08:16:57'),
(3, 2, NULL, 'Rifqi Ramdhani', 'Rifqiramdhani8@gmail.com', 50000, 1, 'GOPAY', '2020-08-01 08:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `studio`
--

CREATE TABLE `studio` (
  `id_studio` int(11) NOT NULL,
  `nama_studio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studio`
--

INSERT INTO `studio` (`id_studio`, `nama_studio`) VALUES
(1, 'Studio A02'),
(2, 'Studio A01');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_dt_jadwal` int(11) NOT NULL,
  `no_kursi` varchar(100) NOT NULL,
  `jumlah` int(2) NOT NULL,
  `harga_tiket` int(5) NOT NULL,
  `total_harga_tiket` int(6) NOT NULL,
  `tanggal` datetime NOT NULL,
  `metode_pembayaran` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD PRIMARY KEY (`id_dt_jadwal`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `detail_jadwal_ibfk_3` (`id_studio`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `paket_makanan`
--
ALTER TABLE `paket_makanan`
  ADD PRIMARY KEY (`id_paket_makanan`);

--
-- Indexes for table `struk`
--
ALTER TABLE `struk`
  ADD PRIMARY KEY (`id_struk`),
  ADD KEY `id_paket_makanan` (`id_paket_makanan`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id_studio`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_dt_jadwal` (`id_dt_jadwal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  MODIFY `id_dt_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paket_makanan`
--
ALTER TABLE `paket_makanan`
  MODIFY `id_paket_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `struk`
--
ALTER TABLE `struk`
  MODIFY `id_struk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studio`
--
ALTER TABLE `studio`
  MODIFY `id_studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD CONSTRAINT `detail_jadwal_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jadwal_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jadwal_ibfk_3` FOREIGN KEY (`id_studio`) REFERENCES `studio` (`id_studio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jadwal_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `struk`
--
ALTER TABLE `struk`
  ADD CONSTRAINT `struk_ibfk_1` FOREIGN KEY (`id_paket_makanan`) REFERENCES `paket_makanan` (`id_paket_makanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `struk_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`id_dt_jadwal`) REFERENCES `detail_jadwal` (`id_dt_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
