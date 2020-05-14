-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 02:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoita`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `kodeBarang` varchar(45) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `kodeBarang`, `nama`, `stok`, `harga`, `idKategori`) VALUES
(4, '8908001158817', 'FOGG', 39, 25000, 1),
(5, '8997014450216', 'ProChiz', 6, 3000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`idTransaksi`, `idBarang`, `jumlah`, `diskon`) VALUES
(12, 4, 1, 0),
(13, 4, 1, 0),
(14, 4, 1, 0),
(14, 5, 2, 0),
(15, 4, 2, 0),
(15, 5, 3, 0),
(16, 4, 1, 0);

--
-- Triggers `detailtransaksi`
--
DELIMITER $$
CREATE TRIGGER `STOK_TRIGGER` AFTER INSERT ON `detailtransaksi` FOR EACH ROW UPDATE barang SET barang.stok = barang.stok - NEW.jumlah where barang.idBarang = NEW.idBarang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `nama`) VALUES
(1, 'Parfum'),
(9, 'Buku'),
(10, 'Keju');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `noTelp` varchar(13) NOT NULL,
  `idPeran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `nama`, `noTelp`, `idPeran`) VALUES
(1, 'fuu', '123', 1),
(4, 'ita', '088', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peran`
--

CREATE TABLE `peran` (
  `idPeran` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peran`
--

INSERT INTO `peran` (`idPeran`, `nama`) VALUES
(1, 'admin'),
(2, 'pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `idSetting` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`idSetting`, `nama`) VALUES
(1, 'POS58');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `idPegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `tanggal`, `totalHarga`, `idPegawai`) VALUES
(12, '2020-05-12 09:37:13', 25000, 1),
(13, '2020-05-12 09:38:47', 25000, 1),
(14, '2020-05-12 09:39:02', 31000, 1),
(15, '2020-05-12 09:45:44', 59000, 1),
(16, '2020-05-12 09:49:09', 25000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `idKategori` (`idKategori`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD KEY `idTransaksi` (`idTransaksi`),
  ADD KEY `idBarang` (`idBarang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`),
  ADD KEY `idPeran` (`idPeran`);

--
-- Indexes for table `peran`
--
ALTER TABLE `peran`
  ADD PRIMARY KEY (`idPeran`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`idSetting`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idPegawai` (`idPegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idKategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idPegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peran`
--
ALTER TABLE `peran`
  MODIFY `idPeran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `idSetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`);

--
-- Constraints for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_ibfk_1` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`),
  ADD CONSTRAINT `detailtransaksi_ibfk_2` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`idPeran`) REFERENCES `peran` (`idPeran`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
