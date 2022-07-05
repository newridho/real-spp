-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 02:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

CREATE TABLE `jenis_bayar` (
  `th_pelajaran` char(9) NOT NULL,
  `tingkat` varchar(3) NOT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`th_pelajaran`, `tingkat`, `jumlah`) VALUES
('2021/2022', 'X', 150000),
('2021/2022', 'XI', 150000),
('2021/2022', 'XII', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` varchar(4) NOT NULL,
  `jurusan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `jurusan`) VALUES
('111', 'Teknik Komputer dan Jaringan'),
('222', 'Teknik Elektronika Industri'),
('333', 'Rekayasa Perangkat Lunak'),
('444', 'Teknik Bisnis Sepeda Motor'),
('555', 'Teknik Kendaraan Ringan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas` varchar(8) NOT NULL DEFAULT '',
  `th_pelajaran` char(9) NOT NULL DEFAULT '',
  `nis` char(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas`, `th_pelajaran`, `nis`) VALUES
('X RPL 1', '2021/2022', '2378'),
('X RPL 1', '2021/2022', '2441'),
('X RPL 2', '2021/2022', '2365'),
('X RPL 2', '2021/2022', '2388'),
('X RPL 3', '2021/2022', '2361'),
('X RPL 3', '2021/2022', '2403'),
('X RPL 4', '2021/2022', '2353'),
('X RPL 4', '2021/2022', '2384'),
('X TBSM 2', '2021/2022', '0044575240'),
('X TBSM 2', '2021/2022', '0045016021'),
('X TBSM 2', '2021/2022', '0057920846'),
('X TBSM 2', '2021/2022', '0058668032'),
('X TKJ 1', '2021/2022', '2397'),
('X TKJ 1', '2021/2022', '2416'),
('X TKJ 1', '2021/2022', '2438'),
('X TKJ 2', '2021/2022', '2313'),
('X TKJ 2', '2021/2022', '2317'),
('X TKJ 2', '2021/2022', '2337'),
('X TKJ 3', '2021/2022', '2343'),
('X TKJ 3', '2021/2022', '2354'),
('X TKJ 4', '2021/2022', '2320'),
('XI TEI 2', '2021/2022', '0017789196'),
('XII RPL ', '2021/2022', '2028'),
('XII RPL ', '2021/2022', '2032'),
('XII RPL ', '2021/2022', '2040'),
('XII RPL ', '2021/2022', '2064'),
('XII RPL ', '2021/2022', '2091'),
('XII RPL ', '2021/2022', '2103'),
('XII RPL ', '2021/2022', '2110'),
('XII RPL ', '2021/2022', '2124');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kelas` varchar(8) NOT NULL,
  `nis` char(10) NOT NULL,
  `bulan` varchar(45) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kelas`, `nis`, `bulan`, `tgl_bayar`, `jumlah`) VALUES
('', '', 'January', '2021-10-14', 150000),
('X', '12345678', 'January', '2021-07-13', 100000),
('XII RPL ', '2233', 'February', '2021-11-07', 150000),
('XII RPL ', '2233', 'January', '2021-11-07', 150000),
('XIIRPL2', '1111', 'April', '2021-11-06', 150000),
('XIIRPL2', '1111', 'February', '2021-11-06', 150000),
('XIIRPL2', '1111', 'January', '2021-11-06', 150000),
('XIIRPL2', '1111', 'March', '2021-11-06', 150000),
('XIIRPL2', '1111', 'May', '2021-11-07', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `idjurusan` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `idjurusan`) VALUES
('2028', 'AHMAD ALAN LESTARI', '333'),
('2032', 'ALIFATUS SINTIA DEVI', '333'),
('2040', 'AUDIZA SALSABILLA REVIYANTI', '333'),
('2064', 'IMAM SYAFII', '333'),
('2091', 'NUR AZIZAH', '333'),
('2103', 'RIDHO LESTARI ARDIANSYAH', '333'),
('2110', 'SAPUTRA DWINANDA', '333'),
('2124', 'WITA DEWI NURJANNAH', '333'),
('2312', 'AHMAD REZA RISKY NUR HAIKAL', '333'),
('2313', 'AHMAD WAHYU ANGGORO', '111'),
('2317', 'AMELIA SALSABILA', '111'),
('2320', 'ANANG SATRIO', '111'),
('2337', 'Della Nur Khasanah', '111'),
('2343', 'DHIERA FANNESHA MAULINA', '111'),
('2353', 'CHOIRUL SETYAWAN', '111'),
('2354', 'ELSA SAFITRI', '111'),
('2361', 'DINI ROSITA PUTRI', '333'),
('2365', 'EGA GOFUR TRIWAHANA', '333'),
('2378', 'HAFIDZ NAVIDHA RIZKY', '333'),
('2384', 'INDAH PURWANTI', '333'),
('2388', 'LOLA LUNA', '333'),
('2397', 'NUR SALSA BILA', '111'),
('2403', 'MUHAMMAD AINUL ABIDIN', '333'),
('2416', 'RIZAL SETIAWAN', '111'),
('2438', 'VIKA DIAN MAHELLA', '111'),
('2441', 'RYAN RAMADHAN', '333');

-- --------------------------------------------------------

--
-- Table structure for table `tapel`
--

CREATE TABLE `tapel` (
  `id` int(11) NOT NULL,
  `tapel` char(9) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tapel`
--

INSERT INTO `tapel` (`id`, `tapel`) VALUES
(1, '2021/2022'),
(2, '2020/2021'),
(3, '2014/2015'),
(4, '2015/2016'),
(5, '2016/2017'),
(6, '2017/2018'),
(7, '2018/2019'),
(8, '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `admin`, `fullname`) VALUES
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 0, 'Kasir'),
(9, 'ridho', '926a161c6419512d711089538c80ac70', 1, 'SuperRidho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`th_pelajaran`,`tingkat`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas`,`th_pelajaran`,`nis`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kelas`,`nis`,`bulan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
