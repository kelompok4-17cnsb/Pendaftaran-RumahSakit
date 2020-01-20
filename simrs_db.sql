-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2020 at 08:19 PM
-- Server version: 5.7.28-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simrs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `numbers`
--

CREATE TABLE `numbers` (
  `n` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `numbers`
--

INSERT INTO `numbers` (`n`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(8) UNSIGNED ZEROFILL NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `spesialis` varchar(100) NOT NULL,
  `lokasi_praktek` varchar(255) NOT NULL,
  `jadwal_praktek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `lokasi_praktek`, `jadwal_praktek`) VALUES
(00000001, 'Rahman', 'Umum', 'Rs. Al-Ihsan Lt. 3', 'Senin,Rabu,Kamis,Sabtu'),
(00000002, 'Reti', 'Mata', 'Rs. Al-Ihsan Lt. 3', 'Senin,Rabu,Jumat,Sabtu'),
(00000003, 'Arnold', 'THT', 'Rs. Al-Ihsan Lt. 2', 'Selasa,Rabu,Jumat,Minggu'),
(00000004, 'm DEDE', 'Jantung', 'Rs. Al-Ihsan Lt. 1', 'Selasa,Sabtu'),
(00000005, 'Ridwan', 'Umum', 'Rs. Al-Ihsan Lt. 1', 'Senin,Rabu,Kamis,Sabtu'),
(00000006, 'Irfan', 'Bedah', 'Rs. Al-Ihsan Lt. 1', 'Senin,Kamis,Jumat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` int(8) UNSIGNED ZEROFILL NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `j_kelamin` char(1) NOT NULL,
  `ttl_pasien` date NOT NULL,
  `usia` int(3) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `kota_pasien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama_pasien`, `j_kelamin`, `ttl_pasien`, `usia`, `alamat_pasien`, `kota_pasien`) VALUES
(00000002, 'Fadli P', 'L', '1975-09-15', 44, 'Baleendah', 'Bandung'),
(00000003, 'Ani S', 'P', '1975-11-12', 44, 'Banjaran', 'Bandung'),
(00000006, 'Sulastri', 'P', '1998-01-01', 22, 'Bandung', 'Bandung'),
(00000007, 'rio', 'L', '1997-12-01', 23, 'kp bojong malaka', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekmed`
--

CREATE TABLE `tb_rekmed` (
  `no_medrek` int(8) UNSIGNED ZEROFILL NOT NULL,
  `id_pasien` int(8) UNSIGNED ZEROFILL NOT NULL,
  `keluhan` text NOT NULL,
  `poli` varchar(100) NOT NULL,
  `id_dokter` int(8) UNSIGNED ZEROFILL NOT NULL,
  `penyakit` varchar(255) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekmed`
--

INSERT INTO `tb_rekmed` (`no_medrek`, `id_pasien`, `keluhan`, `poli`, `id_dokter`, `penyakit`, `status`) VALUES
(00000001, 00000001, 'Sakit Kepala, Badan Meriang, Pegel Linu', 'Umum', 00000001, NULL, 'Rawat Jalan'),
(00000005, 00000007, 'SAKIT KEPALA', 'Umum', 00000001, '', 'Rawat Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(8) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `tgl_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama_user`, `tgl_created`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '2019-12-28'),
(2, 'pendaftaran', 'beb9fb4aa4fbb632a8e029ca1c63e6af', 'Front Office', '2019-12-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_rekmed`
--
ALTER TABLE `tb_rekmed`
  ADD PRIMARY KEY (`no_medrek`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `id_pasien` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_rekmed`
--
ALTER TABLE `tb_rekmed`
  MODIFY `no_medrek` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
