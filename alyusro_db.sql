-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 11:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alyusro_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agen`
--

CREATE TABLE `agen` (
  `id_agen` int(11) NOT NULL,
  `user_id_agen` varchar(25) NOT NULL,
  `user_id_jemaah` varchar(50) NOT NULL,
  `no_reg_agen` varchar(25) NOT NULL,
  `nama_agen` varchar(100) NOT NULL,
  `nik_agen` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `status_pernikahan` varchar(25) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kota_agen` varchar(25) NOT NULL,
  `alamat_agen` varchar(255) NOT NULL,
  `no_telp_agen` varchar(50) NOT NULL,
  `email_agen` varchar(50) NOT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `daftar_via` varchar(25) NOT NULL,
  `paket_agen` varchar(50) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `total_saldo_agen` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agen`
--

INSERT INTO `agen` (`id_agen`, `user_id_agen`, `user_id_jemaah`, `no_reg_agen`, `nama_agen`, `nik_agen`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_pernikahan`, `pekerjaan`, `kota_agen`, `alamat_agen`, `no_telp_agen`, `email_agen`, `riwayat_penyakit`, `nama_bank`, `no_rekening`, `atas_nama`, `daftar_via`, `paket_agen`, `nominal_pembayaran`, `total_saldo_agen`, `status_pembayaran`) VALUES
(3, 'CMS-002-0002', 'CMS-000-0002', 'AL-000002', 'Muhammad Ibnu sholah ', '0003', 'Ciamis', '1971-12-09', 'Laki-Laki', 'Lajang', 'LAINNYA', 'CIAMIS', 'paricariang RT 021/009 panjalu', '085351181110', 'ibnu@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(4, 'BDO-003-0003', 'BDO-000-0003', 'AL-000013', 'Rahmat Mulyana', '0004', 'Bandung', '1978-12-23', 'Laki-Laki', 'Lajang', 'LAINNYA', 'Bandung', 'Jl. Awi Bitung no 272 / 143 C RT 02 RW 08', '082118708210', 'rahmatmulyana@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(5, 'BDO-004-0004', 'BDO-000-0004', 'AL-000013', 'ATIH ROHAYATI', '0005', 'Sumedang', '1967-02-04', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Dusun cibulakan. RT 001/RW 008\r\nDesa Pasir biru\r\nKec. Rancakalong \r\nKab. Sumedang Jawa Barat', '081329287780', 'atihrohayati@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(6, 'BDO-005-0005', 'BDO-000-0005', 'AL-000013', 'Mellyana Sopyani', '0006', 'Bandung ', '1972-05-14', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Jl. Sarimadu no.59 blok 24 Sarijadi Bandung', '081214415570', 'mellyana@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(7, 'BDO-006-0006', 'BDO-000-0006', 'AL-000013', 'Hesti Sutari', '0007', 'Banjar', '1967-04-27', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Komp. Bumi Harapan Blok EE5 / 18  Cibiru Bandung', '081947026800', 'hestisutari@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(8, 'TSY-007-0007', 'TSY-000-0007', 'AL-000013', 'puput irmawijayanti', '0009', 'Tasikmalaya ', '1988-08-20', 'Perempuan', 'Lajang', 'LAINNYA', 'Tasikmalaya', 'Toko Arkan jln situ gede Nagrog 004/004 linggajaya kec. Mangkubumi kota ', '085659633555', 'puput@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(9, 'BDO-008-0008', 'BDO-000-0008', 'AL-000013', 'Aulia Sidiq ', '0008', 'Bandung ', '2000-10-19', 'Laki-Laki', 'Lajang', 'LAINNYA', 'Bandung', 'Jl Phh Mustofa no 5 02 01 Neglasari cibeunying Kaler kota Bandung', '085759108883', 'auliasidiq@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(10, 'BSI-09-0009', 'BSI-000-0009', 'AL-000013', 'Sumantri', '0010', 'Bekasi ', '1982-08-18', 'Laki-Laki', 'Lajang', 'LAINNYA', 'BEKASI', 'Perumahan anastra village blok D5 no 35 RT 015 RW 016 Sarimukti Cibitung Bekasi Jawa barat.', '085311814304', 'sumantri@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(11, 'BDO-010-0010', 'BDO-000-0010', 'AL-000013', 'SINTIA MEILINDA', '3273204205990002', 'Bandung', '1999-05-02', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Jl Purwakarta 3 No 15', '-', 'sintia@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(12, 'BDO-011-0011', 'BDO-000-0011', 'AL-000013', 'Nurlina', '00011', 'Bandung', '1970-03-04', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'kp cibodas rt 04/rw 07 Desa. Pangauban kec. Batujajar. Kab. Bandung barat', '0831-0211-3603', 'nurlina@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(13, 'BDO-012-0013', 'BDO-000-0013', 'AL-000015', 'Santy Susanty', '0012', 'Bandung', '1970-02-07', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Jl. Sarimadu no.59 blok 24 Sarijadi Bandung', '081214415570', 'santy@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_subsidi_agen`
--

CREATE TABLE `detail_subsidi_agen` (
  `id_detail_subsidi_agen` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id_agen` varchar(50) NOT NULL,
  `nominal_subsidi` int(11) NOT NULL,
  `no_reg_umrah_jemaah` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(11) NOT NULL,
  `no_registrasi` varchar(25) NOT NULL,
  `tanggal_donasi` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `jumlah_donasi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `history_pembayaran`
--

CREATE TABLE `history_pembayaran` (
  `id_history_pembayaran` int(11) NOT NULL,
  `id_tagihan_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `tujuan_pembayaran` int(11) NOT NULL,
  `no_reg_umrah_jemaah` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_pembayaran`
--

INSERT INTO `history_pembayaran` (`id_history_pembayaran`, `id_tagihan_pembayaran`, `tanggal_pembayaran`, `tujuan_pembayaran`, `no_reg_umrah_jemaah`, `jumlah`, `nama_bank`, `no_rekening`, `atas_nama`, `username`) VALUES
(10, 9, '2023-04-18', 1, 'AL-000001', 34800000, 'Mandiri', '130-000-920-1131', 'Satini', 'Deni'),
(11, 10, '2023-04-18', 1, 'AL-000002', 45000000, 'Mandiri', '1310010891036', 'Muhammad Ibnu sholah ', 'Deni'),
(12, 11, '2023-04-18', 1, 'AL-000003', 45000000, 'BCA', '4490265681', 'Rahmat Mulyana', 'Deni'),
(13, 12, '2023-04-18', 1, 'AL-000004', 45000000, 'Mandiri', '131 00 1982034 1 ', 'ATIH ROHAYATI', 'Deni'),
(14, 13, '2023-04-18', 1, 'AL-000005', 45000000, 'BCA', '5140434941', 'Mellyana Sopyani', 'Deni'),
(15, 14, '2023-04-18', 1, 'AL-000006', 45000000, 'BCA', '2800552373', 'Hesti Sutari', 'Deni'),
(16, 16, '2023-04-18', 1, 'AL-000008', 45000000, 'Mandiri', '1310005189479', 'puput irmawijayanti', 'Deni'),
(17, 17, '2023-04-18', 1, 'AL-00009', 45000000, 'BCA', '4372371360', 'Aulia Sidiq ', 'Deni'),
(18, 18, '2023-04-18', 1, 'AL-000010', 45000000, 'BCA', '8421-056-056', 'Sumantri', 'Deni'),
(19, 19, '2023-04-18', 1, 'AL-000011', 45000000, 'BSI', '7129884589', 'SINTIA MEILINDA', 'Deni'),
(20, 20, '2023-04-18', 1, 'AL-000012', 45000000, 'Mandiri', '1320026290347', 'Nurlina', 'Deni'),
(21, 21, '2023-04-18', 1, 'AL-000013', 2750000, 'BTPN', '90340279898', 'NUR TIARA ARTINI', 'rachman'),
(22, 22, '2023-04-18', 1, 'AL-000014', 0, 'BCA', ' 5140434941', 'Santy Susanty', 'admin'),
(23, 23, '2023-04-18', 1, 'AL-000014', 10200000, 'BCA', ' 5140434941', 'Santy Susanty', 'admin'),
(24, 24, '2023-04-19', 1, 'AL-000014', 4800000, 'BCA', ' 5140434941', 'Santy Susanty', 'admin'),
(25, 25, '2023-05-02', 1, 'AL-000015', 7000000, 'mandiri', '-', 'NENENG CUCU HERAWATI', 'rachman'),
(26, 26, '2023-05-02', 1, 'AL-000016', 34700000, 'BNI', '-', 'AI RUSTIKA', 'rachman'),
(27, 27, '2023-05-02', 1, 'AL-000017', 2700000, 'BCA', '-', 'NENI MARTINI', 'rachman'),
(28, 28, '2023-05-02', 1, 'AL-000018', 45000000, 'MANDIRI', '1560010284638', 'BAMBANG EKO SUPRIYANTO', 'rachman'),
(29, 29, '2023-05-02', 1, 'AL-000019', 15000000, '-', '-', '-', 'rachman'),
(30, 30, '2023-05-02', 1, 'AL-000020', 150000, 'bca', '-', '-', 'rachman'),
(31, 31, '2023-05-02', 2, 'AL-000021', 100000, '-', '-', '-', 'rachman'),
(32, 32, '2023-05-05', 1, 'AL-000022', 2700000, '-', '-', '-', 'rachman'),
(33, 33, '2023-05-10', 1, 'AL-000023', 20000000, '-', '-', '-', 'Yudha Negara'),
(34, 34, '2023-05-22', 1, 'AL-000024', 15000000, '-', '-', '-', 'Yudha Negara'),
(35, 35, '2023-05-22', 1, 'AL-000025', 2700000, '-', '-', '-', 'Yudha Negara'),
(36, 36, '2023-05-22', 1, 'AL-000026', 0, '-', '-', '-', 'Yudha Negara'),
(37, 37, '2023-05-22', 1, 'AL-000027', 3000, '-', '-', '-', 'Yudha Negara'),
(38, 39, '2023-05-22', 1, 'AL-000029', 4000000, '-', '-', '-', 'Yudha Negara'),
(39, 38, '2023-05-22', 1, 'AL-000028', 3000000, '-', '-', '-', 'Yudha Negara'),
(40, 42, '2023-05-24', 1, 'AL-000030', 2700000, '-', '-', '-', 'Yudy Ahadiyat'),
(41, 43, '2023-05-24', 1, 'AL-000031', 2700000, '-', '-', '-', 'Yudy Ahadiyat'),
(42, 44, '2023-05-24', 1, 'AL-000020', 2550000, 'bca', '-', '-', 'Yudy Ahadiyat'),
(43, 46, '2023-05-24', 1, 'AL-000032', 0, 'BJB SYARIAH', '5140209005896', 'UDIN SAMSUDIN', 'Yudha Negara'),
(44, 47, '2023-05-24', 1, 'AL-000032', 2700000, 'BJB SYARIAH', '5140209005896', 'UDIN SAMSUDIN', 'rachman'),
(45, 48, '2023-05-24', 1, 'AL-000033', 2700000, '-', '-', '-', 'rachman'),
(46, 56, '2023-05-24', 1, 'AL-000041', 2700000, '-', '-', '-', 'Yudha Negara'),
(47, 55, '2023-05-24', 1, 'AL-000040', 2700000, '-', '-', '-', 'Yudha Negara'),
(48, 54, '2023-05-24', 1, 'AL-000039', 2700000, '-', '-', '-', 'Yudha Negara'),
(49, 53, '2023-05-24', 1, 'AL-000038', 2700000, '-', '-', '-', 'Yudha Negara'),
(50, 52, '2023-05-24', 1, 'AL-000037', 2700000, '-', '-', '-', 'Yudha Negara'),
(51, 51, '2023-05-24', 1, 'AL-000036', 2700000, '-', '-', '-', 'Yudha Negara'),
(52, 50, '2023-05-24', 1, 'AL-000035', 2700000, '-', '-', '-', 'Yudha Negara'),
(53, 49, '2023-05-24', 1, 'AL-000034', 2700000, '-', '-', '-', 'Yudha Negara'),
(54, 57, '2023-05-24', 1, 'AL-000037', 10800000, '-', '-', '-', 'Yudha Negara'),
(55, 58, '2023-05-24', 1, 'AL-000036', 10800000, '-', '-', '-', 'Yudha Negara'),
(56, 59, '2023-05-24', 1, 'AL-000035', 7300000, '-', '-', '-', 'Yudha Negara'),
(57, 60, '2023-05-24', 1, 'AL-000034', 22300000, '-', '-', '-', 'Yudha Negara'),
(58, 61, '2023-05-24', 1, 'AL-000042', 2700000, '-', '-', '-', 'Yudha Negara'),
(59, 62, '2023-05-24', 1, 'AL-000043', 2700000, '-', '-', '-', 'Yudha Negara'),
(60, 63, '2023-05-24', 1, 'AL-000044', 2700000, '-', '-', '-', 'admin'),
(61, 65, '2023-05-24', 1, 'AL-000046', 2700000, '-', '-', '-', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_text`
--

CREATE TABLE `informasi_text` (
  `id_informasi_text` int(11) NOT NULL,
  `isi_informasi_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi_text`
--

INSERT INTO `informasi_text` (`id_informasi_text`, `isi_informasi_text`) VALUES
(1, 'ARBAIND - PT. Alyusro Bandung Indonesia, berdiri 12 Desember 2022');

-- --------------------------------------------------------

--
-- Table structure for table `jemaah`
--

CREATE TABLE `jemaah` (
  `id_jemaah` int(11) NOT NULL,
  `type_jemaah` int(11) NOT NULL,
  `user_id_jemaah` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `status_pernikahan` varchar(25) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jemaah`
--

INSERT INTO `jemaah` (`id_jemaah`, `type_jemaah`, `user_id_jemaah`, `nama`, `nik`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_pernikahan`, `pekerjaan`, `alamat`, `kota`, `no_telp`, `email`, `riwayat_penyakit`) VALUES
(13, 1, '-', 'Rachman Sofyan', '0001', '-', '2023-04-18', '-', '-', '-', '-', '-', '-', '-', '-'),
(14, 1, '-', 'Master Admin', '0000', '-', '2023-04-18', '-', '-', '-', '-', '-', '-', '-', '-'),
(18, 2, 'CMS-000-0002', 'Muhammad Ibnu sholah ', '0003', 'Ciamis', '1971-12-09', 'Laki-Laki', 'Lajang', 'LAINNYA', 'paricariang RT 021/009 panjalu', 'CIAMIS', '085351181110', 'ibnu@gmail.com', '-'),
(19, 2, 'BDO-000-0003', 'Rahmat Mulyana', '0004', 'Bandung', '1978-12-23', 'Laki-Laki', 'Lajang', 'LAINNYA', 'Jl. Awi Bitung no 272 / 143 C RT 02 RW 08', 'Bandung', '082118708210', 'rahmatmulyana@gmail.com', '-'),
(20, 2, 'BDO-000-0004', 'ATIH ROHAYATI', '0005', 'Sumedang', '1967-02-04', 'Perempuan', 'Lajang', 'LAINNYA', 'Dusun cibulakan. RT 001/RW 008\r\nDesa Pasir biru\r\nKec. Rancakalong \r\nKab. Sumedang Jawa Barat', 'Bandung', '081329287780', 'atihrohayati@gmail.com', '-'),
(21, 2, 'BDO-000-0005', 'Mellyana Sopyani', '0006', 'Bandung ', '1972-05-14', 'Perempuan', 'Lajang', 'LAINNYA', 'Jl. Sarimadu no.59 blok 24 Sarijadi Bandung', 'Bandung', '081214415570', 'mellyana@gmail.com', '-'),
(22, 2, 'BDO-000-0006', 'Hesti Sutari', '0007', 'Banjar', '1967-04-27', 'Perempuan', 'Lajang', 'LAINNYA', 'Komp. Bumi Harapan Blok EE5 / 18  Cibiru Bandung', 'Bandung', '081947026800', 'hestisutari@gmail.com', '-'),
(23, 2, 'TSY-000-0007', 'puput irmawijayanti', '0009', 'Tasikmalaya ', '1988-08-20', 'Perempuan', 'Lajang', 'LAINNYA', 'Toko Arkan jln situ gede Nagrog 004/004 linggajaya kec. Mangkubumi kota ', 'Tasikmalaya', '085659633555', 'puput@gmail.com', '-'),
(24, 2, 'BDO-000-0008', 'Aulia Sidiq ', '0008', 'Bandung ', '2000-10-19', 'Laki-Laki', 'Lajang', 'LAINNYA', 'Jl Phh Mustofa no 5 02 01 Neglasari cibeunying Kaler kota Bandung', 'Bandung', '085759108883', 'auliasidiq@gmail.com', '-'),
(25, 2, 'BSI-000-0009', 'Sumantri', '0010', 'Bekasi ', '1982-08-18', 'Laki-Laki', 'Lajang', 'LAINNYA', 'Perumahan anastra village blok D5 no 35 RT 015 RW 016 Sarimukti Cibitung Bekasi Jawa barat.', 'BEKASI', '085311814304', 'sumantri@gmail.com', '-'),
(26, 2, 'BDO-000-0010', 'SINTIA MEILINDA', '3273204205990002', 'Bandung', '1999-05-02', 'Perempuan', 'Lajang', 'LAINNYA', 'Jl Purwakarta 3 No 15', 'Bandung', '-', 'sintia@gmail.com', '-'),
(27, 2, 'BDO-000-0011', 'Nurlina', '00011', 'Bandung', '1970-03-04', 'Perempuan', 'Lajang', 'LAINNYA', 'kp cibodas rt 04/rw 07 Desa. Pangauban kec. Batujajar. Kab. Bandung barat', 'Bandung', '0831-0211-3603', 'nurlina@gmail.com', '-'),
(28, 1, 'BDO-010-0012', 'NUR TIARA ARTINI ', '32730353029500002', 'bandung', '1995-02-13', 'Perempuan', 'Lajang', 'KARYAWAN SWASTA', 'JL SOEKARNO HATTA GG HAJI HASAN I BANDUNG', 'Bandung', '08815751050', 'nurtiaraartini@gmail.com', '-'),
(30, 2, 'BDO-000-0013', 'Santy Susanty', '0012', 'Bandung', '1970-02-07', 'Perempuan', 'Lajang', 'LAINNYA', 'Jl. Sarimadu no.59 blok 24 Sarijadi Bandung', 'Bandung', '081214415570', 'santy@gmail.com', '-'),
(31, 2, 'BDO-005-0014', 'NENENG CUCU HERAWATI', '3204285602710013', 'BANDUNG', '1971-02-16', 'Perempuan', '', 'MENGURUS RUMAH TANGGA', 'KP CICALENGKA RT 005 RW 004 MEKARMUKTI KEC CIHAMPE;LAS', 'Bandung', '-', 'nenengcucuher@gmail.com', '-'),
(32, 1, 'BDO-005-0015', 'AI RUSTIKA.SPD.I', '3204144402800003', 'bandung', '1980-02-04', 'Perempuan', 'Menikah', 'PENGUSAHA', 'KP WAAS RT004/001 SUKASARI PAMEUNGPEUK', 'Bandung', '-', 'airustika80@gmail.com', '-'),
(33, 2, 'BDO-005-0016', 'NENI MARTINI', '3273244309750001', 'BANDUNG', '1975-09-03', 'Perempuan', 'Lajang', 'MENGURUS RUMAH TANGGA', 'JL ATLETIK 6 NO 1 RT005/013 SUKAMISKIN ARCAMANIK', 'Bandung', '-', 'nenimartini75@gmail.com', '-'),
(34, 2, 'BSI-09--0017', 'BAMBANG EKO SUPRIYANTO', '3245', 'bekasi', '1982-05-10', 'Laki-Laki', 'Lajang', 'PENGUSAHA', 'PERUM ANASTRA VILLAGE B3 NO 8 RT002/015 SASRI MUKTI KEC CIBITUNG BEKASI JAWA BARAT', 'BEKASI', '087879317268', 'bambangeko@gmail.com', '-'),
(35, 1, 'BDO-005-0018', 'IDA SAIDAH', '3217105204690017', 'BANDUNG', '1969-04-12', 'Perempuan', 'Menikah', 'MENGURUS RUMAH TANGGA', 'KP CISARONGGE RT003/010 MEKARMUKTI CIHAMPELAS BANDUNG BARAT', 'Bandung', '-', 'idasaidah70@gmail.com', '-'),
(36, 1, 'BDO-000-0026', 'IMAN ', '324155', 'BANDUNG', '1978-05-17', 'Laki-Laki', 'Lajang', 'TENTARA', 'sekemirung kaler no234', 'Bandung', '0876543567', 'iman@gmail.com', 'sesak napas'),
(37, 1, '-', 'WIGI GOJIN', '546328769', 'berlin', '1988-03-09', 'Laki-Laki', 'Lajang', 'PEDAGANG CUANKIE', 'JL ANGIN RIBUT NO 78', 'BEKASI', '08976543345', 'YOWGYLKGH@GMAIL.COM', 'SESAK NAPAS'),
(38, 1, 'CMS-006-0019', 'NIA KANIA', '3207305207540001', 'CIAMIS', '1954-07-12', 'Perempuan', 'Menikah', 'MENGURUS RUMAH TANGGA', 'DUSUN CIMANGGU RT 001 RW 009 CISAGA KAB CIAMIS', 'CIAMIS', '-', 'niakania@gmail.com', '-'),
(39, 1, 'BDO-008-0020', 'NIA KURNIASIH ', '327324490950003', 'BANDUNG', '1959-09-09', 'Perempuan', 'Menikah', 'MENGURUS RUMAH TANGGA', 'JL MEKARJAYA NO 44', 'Bandung', '087858013745', 'NIAKURNASIH@GMAIL.COM', '-'),
(40, 2, 'BDO-004-0021', 'SITI SAODAH', '3211204702650002', 'SUMEDANG', '1965-02-07', 'Perempuan', '', 'PENSIUNAN', 'SUKAWANGI RT017/007 TANJUNG MEKAR TANJUNG KERTA KAB SUMEDANG', 'Bandung', '087844585873', 'sitisaodah@gmail.com', '-'),
(41, 2, 'BDO-008-0022', 'WINDI SAMSUDIN', '3273180408820002', 'CILILIN', '1982-08-04', 'Laki-Laki', 'Lajang', 'LAINNYA', 'PHH MUSTOFA NO 15 KOTA BANDUNG', 'Bandung', '082118202093', 'windis@gmail.com', '-'),
(42, 1, '-', 'TATANG ', '3211201507570008', 'SUMEDANG', '1957-07-15', 'Laki-Laki', 'Menikah', 'PETANI', 'JL RAYA JATI RT002/001 SUKATANI TANJUNG MEKAR KAB SUMEDANG', 'Bandung', '-', 'tatang@gmail.com', '-'),
(43, 1, 'BDO-004-0024', 'RUKMINI', '3212046412640001', 'SUMEDANG', '1964-12-24', 'Perempuan', 'Menikah', 'PETANI', 'JL RAYA JATI RT 002 001 SUKATANI TANJUNG MEKAR KAB SUMEDANG', 'Bandung', '-', 'rukmini@gmail.com', '-'),
(44, 1, 'BDO-004-0023', 'NURLAELA', '3211185205830018', 'SUMEDANG', '1983-05-12', 'Perempuan', 'Menikah', 'LAINNYA', 'LINGKUNGAN PANYINGKIRAN RT003/002 DESA SITU SUMEDANG UTARA', 'Bandung', '-', 'nurlaela@gmail.com', '-'),
(45, 1, 'BDO-000-0024', 'yudy', '3204', 'bandung', '2023-05-24', 'Laki-Laki', 'Menikah', 'TENTARA', 'jl adhyaksa', 'Bandung', '081', 'yudyahadyat@gmail.com', '-'),
(46, 1, 'BDO-002-0025', 'ahadyat', '32004', 'bandung', '2023-05-10', 'Laki-Laki', 'Menikah', 'KEPOLISIAN', 'bandung', 'Bandung', '08', 'yudyahadyat@gmail.com', '-'),
(47, 2, 'BSI-09--0026', 'UDIN SAMSUDIN', '-', 'BEKASI', '1963-03-12', 'Laki-Laki', '', 'LAINNYA', 'KP GEMPOL RT002/004 DESA SUKARAHAYU TAMBELANG KAB BEKASI', 'BEKASI', '082112979163', 'udinsamsudin@gmail.com', '-'),
(48, 2, 'BDO-012-0027', 'SATINI', '3273084601750001', 'BANDUNG', '1975-01-06', 'Perempuan', 'Lajang', 'LAINNYA', 'JL KAPT ABDUL HAMID NO 96/167 ', 'Bandung', '-', 'satini@gmail.com', '-'),
(49, 1, 'BSI-09--0029', 'ADA', '3216044909600002', 'BEKASI', '1960-09-09', 'Perempuan', 'Menikah', 'MENGURUS RUMAH TANGGA', 'KP BARU RT 001 RW 002 DESA SUKARAHAYU TAMBELANG KAB BEKASI', 'BEKASI', '-', 'ada@gmail.com', '-'),
(50, 1, 'BSI-09--0029', 'DIMAH', '3216044102520001', 'BEKASI', '1952-02-01', 'Perempuan', 'Menikah', 'MENGURUS RUMAH TANGGA', 'KP BARU RT 004 RT 001 SUKARAHAYU TAMBELANG KAB BEKASI', 'BEKASI', '-', 'dimah@gmail.com', '-'),
(51, 1, 'BSI-09--0029', 'RODIAH', '3216045102740001', 'BEKASI', '1974-02-11', 'Perempuan', 'Menikah', 'PEDAGANG', 'KP BARU RT 002 RW 002 SUKARAHAYU TAMBELANG KAB BEKASI', 'BEKASI', '-', 'rodiah@gmail.com', '-'),
(52, 1, 'BSI-09--0029', 'SAIT', '3216041604720002', 'BEKASI', '1972-04-16', 'Laki-Laki', 'Menikah', 'PEDAGANG', 'KP BARU RT002 RW 002 SUKARAHAYU KEC TAMBELANG KAB BEKASI', 'BEKASI', '-', 'sait@gmail.com', '-'),
(53, 1, 'BSI-09--0029', 'NUR SAKILAH MAWLIDA', '3216044503110003', 'BEKASI', '2011-03-05', 'Perempuan', 'Lajang', 'LAINNYA', 'KP BARU RT 003 RW 001 SUKARAHAYU KEC TAMBELANG KAB BEKASI', 'BEKASI', '-', 'nur@gmail.com', '-'),
(54, 1, 'BSI-09--0029', 'OSIH', '3216047112740004', 'BEKASI', '1974-12-31', 'Perempuan', 'Menikah', 'MENGURUS RUMAH TANGGA', 'KP BARU RT 003 RW 001 SUKARAHAYU KEC TAMBELANG  KAB BEKASI', 'BEKASI', '-', 'osuh@gmail.com', '-'),
(55, 1, 'BSI-09--0029', 'SANDI', '3216042909710001', 'BEKASI', '1971-09-29', 'Laki-Laki', 'Menikah', 'PENGUSAHA', 'Kp Baru RT 003 RW 001 DESA SUKARAHAYU KEC TAMBELANG KAB BEKASI', 'BEKASI', '-', 'sandi@gmail.com', '-'),
(56, 1, 'BSI-09--0028', 'SURYANI', '3216045608750001', 'BEKASI', '1975-08-16', 'Perempuan', 'Menikah', 'MENGURUS RUMAH TANGGA', 'KP BARU RT 003 RW 001 SUKARAHYU KEC TAMBELANG KAB BEKASI', 'BEKASI', '-', 'suryani@gmail.com', '-'),
(57, 1, 'CMS-003-0029', 'KARNASIH', '3207164810560003', 'CIAMIS ', '1956-10-08', 'Perempuan', 'Lajang', 'MENGURUS RUMAH TANGGA', 'DUSUN SAMARAN RT002/004 MEKARSARI KEC TAMBAK SARI KAB CIAMIS ', 'CIAMIS', '-', 'karnasih@gmail.com', '-'),
(58, 1, 'CMS-003-0030', 'UUN HUNAH', '3207154404580001', 'Ciamis', '1958-05-14', 'Perempuan', 'Menikah', 'PENSIUNAN', 'Dusun Rancah Hilir RT 06 RT 05 Desa Rancah Kecamatan Rancah Kabupaten Ciamis', 'CIAMIS', '-', 'mulyana5646@gmail.com', '-'),
(59, 1, 'BDO-003-0031', 'RADEN LENY NURANY', '327314710640003', 'Bandung', '1964-07-31', 'Perempuan', 'Lajang', 'MENGURUS RUMAH TANGGA', 'LEMAHNEUNDEUT I RT 08 RW 07', 'Bandung', '-', 'mulyana5646@gmail.com', '-'),
(60, 1, '-', 'MAMAN SURYAMAN', '3273261211600001', 'Bandung', '1960-11-12', 'Laki-Laki', 'Menikah', 'PENGUSAHA', 'JALAN PALINTANG KAMPUNG RANCA NO 03 RT 03 RW 06 KELURAHAN PASIR WANGI KECAMATAN UJUNG BERUNG KOTA BANDUNG', '', '082120542956', 'mulyana5646@gmail.com', '-'),
(61, 1, 'BDO-003-0032', 'HANILA HAENI', '3273264302640001', 'CIAMIS', '1964-02-03', 'Perempuan', 'Menikah', 'MENGURUS RUMAH TANGGA', 'JALAN PALINTANG NO 03 RT 03 RW 06 KELURAHAN PASIR WANGI KECAMATAN UJUNG BERUNG KOTA BANDUNG', 'Bandung', '081214354603', 'mulyana5646@gmail.com', '-');

-- --------------------------------------------------------

--
-- Table structure for table `kelengkapan_umrah`
--

CREATE TABLE `kelengkapan_umrah` (
  `id_kelengkapan` int(11) NOT NULL,
  `no_reg_umrah_jemaah` varchar(25) NOT NULL,
  `mukena_bergo` int(11) DEFAULT 0,
  `sejadah` int(11) DEFAULT 0,
  `tas_paspor` int(11) NOT NULL DEFAULT 0,
  `buku_doa` int(11) NOT NULL DEFAULT 0,
  `souvenir` int(11) NOT NULL DEFAULT 0,
  `seragam_batik` int(11) NOT NULL DEFAULT 0,
  `koper_bagasi_cabin` int(11) NOT NULL DEFAULT 0,
  `bantal_leher` int(11) NOT NULL DEFAULT 0,
  `syal` int(11) NOT NULL DEFAULT 0,
  `kain_ihrom` int(11) NOT NULL DEFAULT 0,
  `sabuk` int(11) NOT NULL,
  `kerudung` int(11) NOT NULL,
  `tas_sandal` int(11) NOT NULL,
  `baju_koko` int(11) NOT NULL,
  `status_kelengkapan` int(11) NOT NULL DEFAULT 0,
  `petugas_pengirim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelengkapan_umrah`
--

INSERT INTO `kelengkapan_umrah` (`id_kelengkapan`, `no_reg_umrah_jemaah`, `mukena_bergo`, `sejadah`, `tas_paspor`, `buku_doa`, `souvenir`, `seragam_batik`, `koper_bagasi_cabin`, `bantal_leher`, `syal`, `kain_ihrom`, `sabuk`, `kerudung`, `tas_sandal`, `baju_koko`, `status_kelengkapan`, `petugas_pengirim`) VALUES
(7, 'AL-000001', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(8, 'AL-000002', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(9, 'AL-000003', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(10, 'AL-000004', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(11, 'AL-000005', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(12, 'AL-000006', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(13, 'AL-000007', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(14, 'AL-000008', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(15, 'AL-000009', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(16, 'AL-000010', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(17, 'AL-000011', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(18, 'AL-000012', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(19, 'AL-000013', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(20, 'AL-000014', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(21, 'AL-000014', 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, '-'),
(22, 'AL-000015', 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, '-'),
(23, 'AL-000016', 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, '-melly'),
(24, 'AL-000017', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(25, 'AL-000018', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(26, 'AL-000019', 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, '-'),
(27, 'AL-000020', NULL, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, '-'),
(28, 'AL-000021', NULL, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, '-'),
(29, 'AL-000022', 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(30, 'AL-000023', 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(31, 'AL-000024', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(32, 'AL-000025', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(33, 'AL-000027', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(34, 'AL-000028', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(35, 'AL-000029', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(36, 'AL-000030', NULL, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, '-'),
(37, 'AL-000031', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(38, 'AL-000032', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(39, 'AL-000033', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(40, 'AL-000034', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(41, 'AL-000035', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(42, 'AL-000036', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(43, 'AL-000037', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(44, 'AL-000038', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(45, 'AL-000039', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(46, 'AL-000040', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(47, 'AL-000041', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(48, 'AL-000042', 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, '-RAHMAT MULYANA'),
(49, 'AL-000043', 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0, '-RAHMAT MULYANA'),
(50, 'AL-000044', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(51, 'AL-000045', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-'),
(52, 'AL-000046', 1, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `kode_kota`
--

CREATE TABLE `kode_kota` (
  `id_kode_kota` int(11) NOT NULL,
  `kode_kota` varchar(10) NOT NULL,
  `nama_kota` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_kota`
--

INSERT INTO `kode_kota` (`id_kode_kota`, `kode_kota`, `nama_kota`) VALUES
(1, 'AEG', 'Padang Sidempuan'),
(2, 'BKS', 'Bengkulu'),
(3, 'BTH', 'Batam'),
(4, 'BTJ', 'Banda Aceh'),
(5, 'DJB', 'Jambi'),
(6, 'DTB', 'Siborong-Borong'),
(7, 'DUM', 'Dumai'),
(8, 'FLZ', 'Sibolga'),
(9, 'GNS', 'Gunung Sitoli'),
(10, 'KNO', 'Medan, Deli Serdang'),
(11, 'LLG', 'Lubuklinggau'),
(12, 'LSE', 'Kepulauan Batu'),
(13, 'MEQ', 'Suka Makmue'),
(14, 'MES', 'Medan'),
(15, 'NTX', 'Ranai'),
(16, 'PDG', 'Padang'),
(17, 'PGK', 'Pangkal Pinang'),
(18, 'PKU', 'Pekanbaru'),
(19, 'PLM', 'Palembang'),
(20, 'RKI', 'Sipora'),
(21, 'SIW', 'Simalungun, Toba Samosir'),
(22, 'SNX', 'Sinabang'),
(23, 'TJQ', 'Tanjung Pandan'),
(24, 'TKG', 'Bandar Lampung'),
(25, 'TNJ', 'Tanjung Pinang'),
(26, 'TXE', 'Takengon'),
(27, 'BDO', 'Bandung'),
(28, 'BTO', 'Tangerang'),
(29, 'BWX', 'Banyuwangi'),
(30, 'BXW', 'Bawean'),
(31, 'CBN', 'Cirebon'),
(32, 'CGK', 'Jakarta, Tangerang'),
(33, 'CKP', 'Cikampek'),
(34, 'CXP', 'Cilacap'),
(35, 'DPK', 'Depok'),
(36, 'JBB', 'Jember'),
(37, 'JKS', 'Jakarta Selatan'),
(38, 'JKT', 'Jakarta'),
(39, 'JOG', 'Yogyakarta'),
(40, 'KJT', 'Majalengka'),
(41, 'MLG', 'Malang'),
(42, 'PCB', 'Tangerang Selatan'),
(43, 'PPJ', 'Kepulauan Seribu'),
(44, 'SOC', 'Surakarta'),
(45, 'SRG', 'Semarang'),
(46, 'SUB', 'Surabaya'),
(47, 'TSY', 'Tasikmalaya'),
(48, 'AMP', 'Tojo Una-Una'),
(49, 'BUW', 'Bau-Bau'),
(50, 'GTO', 'Gorontalo'),
(51, 'KDI', 'Kendari'),
(52, 'KSR', 'Selayar'),
(53, 'LLO', 'Luwu'),
(54, 'MDC', 'Manado'),
(55, 'MJU', 'Mamuju'),
(56, 'MNA', 'Melonguane'),
(57, 'MOH', 'Morowali'),
(58, 'MXB', 'Masamba'),
(59, 'NAH', 'Sangihe'),
(60, 'PLW', 'Palu'),
(61, 'PSJ', 'Poso'),
(62, 'PUM', 'Kolaka'),
(63, 'UPG', 'Makassar'),
(64, 'BDJ', 'Banjarmasin'),
(65, 'BEJ', 'Tanjung Redep, Berau'),
(66, 'BPN', 'Balikpapan'),
(67, 'BXT', 'Bontang'),
(68, 'DTD', 'Mahakam Ulu'),
(69, 'KTG', 'Ketapang'),
(70, 'LBW', 'Long Bawan'),
(71, 'LPU', 'Long Apung'),
(72, 'NNX', 'Nunukan'),
(73, 'PKN', 'Pangkalanbun'),
(74, 'PKY', 'Palangkaraya'),
(75, 'PNK', 'Pontianak'),
(76, 'PSU', 'Putussibau'),
(77, 'SMQ', 'Sampit'),
(78, 'SQG', 'Sintang'),
(79, 'SRI', 'Samarinda'),
(80, 'TJS', 'Tanjung Selor'),
(81, 'TRK', 'Tarakan'),
(82, 'AGD', 'Anggi'),
(83, 'AYX', 'Ayawasi'),
(84, 'BIK', 'Biak'),
(85, 'BXB', 'Babo'),
(86, 'DJJ', 'Jayapura'),
(87, 'FKQ', 'Fakfak'),
(88, 'FOO', 'Schouten'),
(89, 'KNG', 'Kaimana'),
(90, 'MKQ', 'Merauke'),
(91, 'MKW', 'Manokwari'),
(92, 'NBX', 'Nabire'),
(93, 'NTI', 'Bintuni'),
(94, 'ORG', 'Oksibil'),
(95, 'SOQ', 'Sorong'),
(96, 'TIM', 'Timika'),
(97, 'WMX', 'Puncak Jaya'),
(98, 'WSR', 'Wasior'),
(99, 'AHI', 'Amahai'),
(100, 'AMQ', 'Ambon'),
(101, 'BJK', 'Benjina'),
(102, 'DOB', 'Dobo'),
(103, 'GLX', 'Galela'),
(104, 'JIO', 'Moa'),
(105, 'KAZ', 'Kao'),
(106, 'LAH', 'Labuha'),
(107, 'LUV', 'Tual'),
(108, 'NAM', 'Namlea'),
(109, 'NDA', 'Banda'),
(110, 'NRE', 'Namrole'),
(111, 'OTI', 'Morotai'),
(112, 'SXK', 'Saumlaki'),
(113, 'TTE', 'Ternate'),
(114, 'WUB', 'Buli'),
(115, 'ABU', 'Atambua'),
(116, 'BMU', 'Bima'),
(117, 'DPS', 'Denpasar'),
(118, 'ENE', 'Ende'),
(119, 'KOE', 'Kupang'),
(120, 'LBJ', 'Labuan Bajo'),
(121, 'LOP', 'Mataram'),
(122, 'MOF', 'Maumere'),
(123, 'SAU', 'Savu'),
(124, 'SWQ', 'Sumbawa Besar'),
(125, 'TMC', 'Waikabubak'),
(126, 'WGP', 'Waingapu'),
(127, 'CMS', 'CIAMIS'),
(128, 'BSI', 'BEKASI');

-- --------------------------------------------------------

--
-- Table structure for table `laskar`
--

CREATE TABLE `laskar` (
  `id_laskar` int(11) NOT NULL,
  `user_id_laskar` varchar(25) NOT NULL,
  `user_id_jemaah` varchar(50) NOT NULL,
  `no_reg_laskar` varchar(25) NOT NULL,
  `nama_laskar` varchar(100) NOT NULL,
  `nik_laskar` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `status_pernikahan` varchar(25) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `kota_laskar` varchar(25) NOT NULL,
  `alamat_laskar` varchar(255) NOT NULL,
  `no_telp_laskar` varchar(50) NOT NULL,
  `email_laskar` varchar(50) NOT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `daftar_via` varchar(25) NOT NULL,
  `paket_laskar` varchar(50) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `total_saldo_laskar` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laskar`
--

INSERT INTO `laskar` (`id_laskar`, `user_id_laskar`, `user_id_jemaah`, `no_reg_laskar`, `nama_laskar`, `nik_laskar`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `status_pernikahan`, `pekerjaan`, `kota_laskar`, `alamat_laskar`, `no_telp_laskar`, `email_laskar`, `riwayat_penyakit`, `nama_bank`, `no_rekening`, `atas_nama`, `daftar_via`, `paket_laskar`, `nominal_pembayaran`, `total_saldo_laskar`, `status_pembayaran`) VALUES
(7, 'BDO-001--A', '', 'AL-000015', 'NENENG CUCU HERAWATI', '3273201908920001', 'BANDUNG ', '1974-05-14', 'Perempuan', 'Menikah', 'WIRASWASTA', 'Bandung', 'CILILIN', '-', 'sofyanrachmantea@yahoo.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(8, 'BDO-002-0011-A', 'BDO-000-0011', 'AL-000015', 'Nurlina', '00011', 'Bandung', '1970-03-04', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'kp cibodas rt 04/rw 07 Desa. Pangauban kec. Batujajar. Kab. Bandung barat', '0831-0211-3603', 'nurlina@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(9, 'BDO-003-0005-A', 'BDO-000-0005', 'AL-000015', 'Mellyana Sopyani', '0006', 'Bandung ', '1972-05-14', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Jl. Sarimadu no.59 blok 24 Sarijadi Bandung', '081214415570', 'mellyana@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(10, 'BDO-004-0003-A', 'BDO-000-0003', 'AL-000015', 'Rahmat Mulyana', '0004', 'Bandung', '1978-12-23', 'Laki-Laki', 'Lajang', 'LAINNYA', 'Bandung', 'Jl. Awi Bitung no 272 / 143 C RT 02 RW 08', '082118708210', 'rahmatmulyana@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(11, 'BDO-005-0014-A', 'BDO-005-0014', 'AL-000016', 'NENENG CUCU HERAWATI', '3204285602710013', 'BANDUNG', '1971-02-16', 'Perempuan', '', 'MENGURUS RUMAH TANGGA', 'Bandung', 'KP CICALENGKA RT 005 RW 004 MEKARMUKTI KEC CIHAMPE;LAS', '-', 'nenengcucuher@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(12, 'BDO-006-0016-A', 'BDO-005-0016', 'AL-000018', 'NENI MARTINI', '3273244309750001', 'BANDUNG', '1975-09-03', 'Perempuan', 'Lajang', 'MENGURUS RUMAH TANGGA', 'Bandung', 'JL ATLETIK 6 NO 1 RT005/013 SUKAMISKIN ARCAMANIK', '-', 'nenimartini75@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(13, 'BDO-007-0004-A', 'BDO-000-0004', 'AL-000018', 'ATIH ROHAYATI', '0005', 'Sumedang', '1967-02-04', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Dusun cibulakan. RT 001/RW 008\r\nDesa Pasir biru\r\nKec. Rancakalong \r\nKab. Sumedang Jawa Barat', '081329287780', 'atihrohayati@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(14, 'CMS-008-0002-A', 'CMS-000-0002', 'AL-000018', 'Muhammad Ibnu sholah ', '0003', 'Ciamis', '1971-12-09', 'Laki-Laki', 'Lajang', 'LAINNYA', 'CIAMIS', 'paricariang RT 021/009 panjalu', '085351181110', 'ibnu@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(15, 'BDO-09-0006-A', 'BDO-000-0006', 'AL-000018', 'Hesti Sutari', '0007', 'Banjar', '1967-04-27', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Komp. Bumi Harapan Blok EE5 / 18  Cibiru Bandung', '081947026800', 'hestisutari@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(16, 'TSY-010-0007-A', 'TSY-000-0007', 'AL-000018', 'puput irmawijayanti', '0009', 'Tasikmalaya ', '1988-08-20', 'Perempuan', 'Lajang', 'LAINNYA', 'Tasikmalaya', 'Toko Arkan jln situ gede Nagrog 004/004 linggajaya kec. Mangkubumi kota ', '085659633555', 'puput@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(17, 'BDO-011-0008-A', 'BDO-000-0008', 'AL-000018', 'Aulia Sidiq ', '0008', 'Bandung ', '2000-10-19', 'Laki-Laki', 'Lajang', 'LAINNYA', 'Bandung', 'Jl Phh Mustofa no 5 02 01 Neglasari cibeunying Kaler kota Bandung', '085759108883', 'auliasidiq@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(18, 'BSI-012-0009-A', 'BSI-000-0009', 'AL-000018', 'Sumantri', '0010', 'Bekasi ', '1982-08-18', 'Laki-Laki', 'Lajang', 'LAINNYA', 'BEKASI', 'Perumahan anastra village blok D5 no 35 RT 015 RW 016 Sarimukti Cibitung Bekasi Jawa barat.', '085311814304', 'sumantri@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(19, 'BDO-013-0013-A', 'BDO-000-0013', 'AL-000018', 'Santy Susanty', '0012', 'Bandung', '1970-02-07', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'Jl. Sarimadu no.59 blok 24 Sarijadi Bandung', '081214415570', 'santy@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(20, 'BSI-014-0017-A', 'BSI-09--0017', 'AL-000019', 'BAMBANG EKO SUPRIYANTO', '3245', 'bekasi', '1982-05-10', 'Laki-Laki', 'Lajang', 'PENGUSAHA', 'BEKASI', 'PERUM ANASTRA VILLAGE B3 NO 8 RT002/015 SASRI MUKTI KEC CIBITUNG BEKASI JAWA BARAT', '087879317268', 'bambangeko@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(21, 'BDO-015-0021-A', 'BDO-004-0021', 'AL-000026', 'SITI SAODAH', '3211204702650002', 'SUMEDANG', '1965-02-07', 'Perempuan', '', 'PENSIUNAN', 'Bandung', 'SUKAWANGI RT017/007 TANJUNG MEKAR TANJUNG KERTA KAB SUMEDANG', '087844585873', 'sitisaodah@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(22, 'BDO-016-0022-A', 'BDO-008-0022', 'AL-000027', 'WINDI SAMSUDIN', '3273180408820002', 'CILILIN', '1982-08-04', 'Laki-Laki', 'Lajang', 'LAINNYA', 'Bandung', 'PHH MUSTOFA NO 15 KOTA BANDUNG', '082118202093', 'windis@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(23, 'BSI-017-0026-A', 'BSI-09--0026', 'AL-000033', 'UDIN SAMSUDIN', '-', 'BEKASI', '1963-03-12', 'Laki-Laki', '', 'LAINNYA', 'BEKASI', 'KP GEMPOL RT002/004 DESA SUKARAHAYU TAMBELANG KAB BEKASI', '082112979163', 'udinsamsudin@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0),
(24, 'BDO-018-0027-A', 'BDO-012-0027', 'AL-000034', 'SATINI', '3273084601750001', 'BANDUNG', '1975-01-06', 'Perempuan', 'Lajang', 'LAINNYA', 'Bandung', 'JL KAPT ABDUL HAMID NO 96/167 ', '-', 'satini@gmail.com', '-', '-', '-', '-', '-', '-', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manifestasi_umrah`
--

CREATE TABLE `manifestasi_umrah` (
  `id_manifestasi_umrah` int(11) NOT NULL,
  `no_reg_umrah_jemaah` varchar(25) NOT NULL,
  `paspor` int(11) NOT NULL DEFAULT 0,
  `vaksin_covid` int(11) NOT NULL DEFAULT 0,
  `vaksin_meningitis` int(11) NOT NULL DEFAULT 0,
  `pas_foto_3_4` int(11) NOT NULL DEFAULT 0,
  `pas_foto_4_6` int(11) NOT NULL DEFAULT 0,
  `surat_nikah` int(11) NOT NULL DEFAULT 0,
  `fotocopy_ktp` int(11) NOT NULL DEFAULT 0,
  `tiket_pesawat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manifestasi_umrah`
--

INSERT INTO `manifestasi_umrah` (`id_manifestasi_umrah`, `no_reg_umrah_jemaah`, `paspor`, `vaksin_covid`, `vaksin_meningitis`, `pas_foto_3_4`, `pas_foto_4_6`, `surat_nikah`, `fotocopy_ktp`, `tiket_pesawat`) VALUES
(7, 'AL-000001', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'AL-000002', 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'AL-000003', 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'AL-000004', 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'AL-000005', 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'AL-000006', 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'AL-000007', 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'AL-000008', 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'AL-000009', 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'AL-000010', 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'AL-000011', 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'AL-000012', 0, 0, 0, 0, 0, 0, 0, 0),
(19, 'AL-000013', 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'AL-000014', 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'AL-000014', 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'AL-000015', 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'AL-000016', 0, 0, 0, 0, 0, 0, 0, 0),
(24, 'AL-000017', 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'AL-000018', 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'AL-000019', 0, 0, 0, 0, 0, 0, 0, 0),
(27, 'AL-000020', 0, 0, 0, 0, 0, 0, 0, 0),
(28, 'AL-000021', 0, 0, 0, 0, 0, 0, 0, 0),
(29, 'AL-000022', 0, 0, 0, 0, 0, 0, 0, 0),
(30, 'AL-000023', 0, 0, 0, 0, 0, 0, 0, 0),
(31, 'AL-000024', 0, 0, 0, 0, 0, 0, 0, 0),
(32, 'AL-000025', 0, 0, 0, 0, 0, 0, 0, 0),
(33, 'AL-000027', 0, 0, 0, 0, 0, 0, 0, 0),
(34, 'AL-000028', 0, 0, 0, 0, 0, 0, 0, 0),
(35, 'AL-000029', 0, 0, 0, 0, 0, 0, 0, 0),
(36, 'AL-000030', 0, 0, 0, 0, 0, 0, 0, 0),
(37, 'AL-000031', 0, 0, 0, 0, 0, 0, 0, 0),
(38, 'AL-000032', 0, 0, 0, 0, 0, 0, 0, 0),
(39, 'AL-000033', 0, 0, 0, 0, 0, 0, 0, 0),
(40, 'AL-000034', 0, 0, 0, 0, 0, 0, 0, 0),
(41, 'AL-000035', 0, 0, 0, 0, 0, 0, 0, 0),
(42, 'AL-000036', 0, 0, 0, 0, 0, 0, 0, 0),
(43, 'AL-000037', 0, 0, 0, 0, 0, 0, 0, 0),
(44, 'AL-000038', 0, 0, 0, 0, 0, 0, 0, 0),
(45, 'AL-000039', 0, 0, 0, 0, 0, 0, 0, 0),
(46, 'AL-000040', 0, 0, 0, 0, 0, 0, 0, 0),
(47, 'AL-000041', 0, 0, 0, 0, 0, 0, 0, 0),
(48, 'AL-000042', 0, 0, 0, 0, 0, 0, 0, 0),
(49, 'AL-000043', 0, 0, 0, 0, 0, 0, 0, 0),
(50, 'AL-000044', 0, 0, 0, 0, 0, 0, 0, 0),
(51, 'AL-000045', 0, 0, 0, 0, 0, 0, 0, 0),
(52, 'AL-000046', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `paket_keberangkatan`
--

CREATE TABLE `paket_keberangkatan` (
  `id_paket_keberangkatan` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `tanggal_keberangkatan` date NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `jumlah_kuota` int(11) NOT NULL,
  `kuota_masuk` int(11) NOT NULL,
  `sisa_kuota` int(11) NOT NULL,
  `nominal_ujroh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket_keberangkatan`
--

INSERT INTO `paket_keberangkatan` (`id_paket_keberangkatan`, `nama_paket`, `tanggal_keberangkatan`, `harga_paket`, `jumlah_kuota`, `kuota_masuk`, `sisa_kuota`, `nominal_ujroh`) VALUES
(7, 'Master Inject', '2023-04-18', 15000000, 100, 0, 100, 0),
(8, 'quad', '2023-05-09', 35500000, 60, 0, 60, 700000),
(9, 'TRIPLE', '2023-05-09', 37000000, 35, 0, 35, 700000),
(10, 'DOUBLE', '2023-05-09', 38000000, 15, 0, 15, 700000),
(11, 'quad', '2023-10-06', 34700000, 450, 0, 450, 700000),
(12, 'TRIPLE', '2023-10-06', 36200000, 60, 0, 60, 700000),
(13, 'DOUBLE', '2023-10-06', 37700000, 35, 0, 35, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `pasangan_umrah`
--

CREATE TABLE `pasangan_umrah` (
  `id_pasangan_umrah` int(11) NOT NULL,
  `parent_user_id_jemaah` varchar(50) NOT NULL,
  `user_id_jemaah` varchar(50) NOT NULL,
  `status_hubungan` varchar(59) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `no_registrasi` varchar(50) NOT NULL,
  `jenis_pendataran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nik` varchar(50) NOT NULL,
  `status_pendaftaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `no_registrasi`, `jenis_pendataran`, `tanggal`, `nik`, `status_pendaftaran`) VALUES
(15, 'AL-000001', 1, '2023-04-18', '0002', 0),
(16, 'AL-000002', 1, '2023-04-18', '0003', 0),
(17, 'AL-000003', 1, '2023-04-18', '0004', 0),
(18, 'AL-000004', 1, '2023-04-18', '0005', 0),
(19, 'AL-000005', 1, '2023-04-18', '0006', 0),
(20, 'AL-000006', 1, '2023-04-18', '0007', 0),
(22, 'AL-000008', 1, '2023-04-18', '0009', 0),
(23, 'AL-000009', 1, '2023-04-18', '0008', 0),
(24, 'AL-000010', 1, '2023-04-18', '0010', 0),
(25, 'AL-000011', 1, '2023-04-18', '3273204205990002', 0),
(26, 'AL-000012', 1, '2023-04-18', '00011', 0),
(27, 'AL-000013', 1, '2023-04-18', '32730353029500002', 0),
(29, 'AL-000014', 1, '2023-04-18', '0012', 0),
(30, 'AL-000015', 1, '2023-05-02', '3204285602710013', 0),
(31, 'AL-000016', 1, '2023-05-02', '3204144402800003', 0),
(32, 'AL-000017', 1, '2023-05-02', '3273244309750001', 0),
(33, 'AL-000018', 1, '2023-05-02', '3245', 0),
(34, 'AL-000019', 1, '2023-05-02', '3217105204690017', 0),
(35, 'AL-000020', 1, '2023-05-02', '324155', 0),
(36, 'AL-000021', 2, '2023-05-02', '546328769', 0),
(37, 'AL-000022', 1, '2023-05-05', '3207305207540001', 0),
(38, 'AL-000023', 1, '2023-05-10', '327324490950003', 0),
(39, 'AL-000024', 1, '2023-05-22', '3211204702650002', 0),
(40, 'AL-000025', 1, '2023-05-22', '3273180408820002', 0),
(41, 'AL-000026', 3, '2023-05-22', '3273180408820002', 0),
(42, 'AL-000027', 1, '2023-05-22', '3211201507570008', 0),
(43, 'AL-000028', 1, '2023-05-22', '3212046412640001', 0),
(44, 'AL-000029', 1, '2023-05-22', '3211185205830018', 0),
(45, 'AL-000030', 1, '2023-05-24', '3204', 0),
(46, 'AL-000031', 1, '2023-05-24', '32004', 0),
(47, 'AL-000032', 1, '2023-05-24', '-', 0),
(48, 'AL-000033', 1, '2023-05-24', '3273084601750001', 0),
(49, 'AL-000034', 1, '2023-05-24', '3216044909600002', 0),
(50, 'AL-000035', 1, '2023-05-24', '3216044102520001', 0),
(51, 'AL-000036', 1, '2023-05-24', '3216045102740001', 0),
(52, 'AL-000037', 1, '2023-05-24', '3216041604720002', 0),
(53, 'AL-000038', 1, '2023-05-24', '3216044503110003', 0),
(54, 'AL-000039', 1, '2023-05-24', '3216047112740004', 0),
(55, 'AL-000040', 1, '2023-05-24', '3216042909710001', 0),
(56, 'AL-000041', 1, '2023-05-24', '3216045608750001', 0),
(57, 'AL-000042', 1, '2023-05-24', '3207164810560003', 0),
(58, 'AL-000043', 1, '2023-05-24', '3207154404580001', 0),
(59, 'AL-000044', 1, '2023-05-24', '327314710640003', 0),
(60, 'AL-000045', 1, '2023-05-24', '3273261211600001', 0),
(61, 'AL-000046', 1, '2023-05-24', '3273264302640001', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subsidi_agen`
--

CREATE TABLE `subsidi_agen` (
  `id_subsidi_agen` int(11) NOT NULL,
  `nominal_subsidi_agen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subsidi_agen`
--

INSERT INTO `subsidi_agen` (`id_subsidi_agen`, `nominal_subsidi_agen`) VALUES
(4, 225000);

-- --------------------------------------------------------

--
-- Table structure for table `tabungan_umrah_jemaah`
--

CREATE TABLE `tabungan_umrah_jemaah` (
  `id_tabungan_umrah_jemaah` int(11) NOT NULL,
  `no_reg_umrah_jemaah` varchar(25) NOT NULL,
  `tanggal_menabung` date NOT NULL,
  `jumlah_menabung` int(11) NOT NULL,
  `saldo_tabungan` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `goal_terakhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabungan_umrah_jemaah`
--

INSERT INTO `tabungan_umrah_jemaah` (`id_tabungan_umrah_jemaah`, `no_reg_umrah_jemaah`, `tanggal_menabung`, `jumlah_menabung`, `saldo_tabungan`, `status_pembayaran`, `goal_terakhir`) VALUES
(1, 'AL-000021', '2023-05-02', 100000, 100000, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tagihan_pembayaran`
--

CREATE TABLE `tagihan_pembayaran` (
  `id_tagihan_pembayaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_reg_umrah_jemaah` varchar(25) NOT NULL,
  `nominal_tagihan` int(11) NOT NULL,
  `jenis_tagihan` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan_pembayaran`
--

INSERT INTO `tagihan_pembayaran` (`id_tagihan_pembayaran`, `tanggal`, `no_reg_umrah_jemaah`, `nominal_tagihan`, `jenis_tagihan`, `status`) VALUES
(9, '2023-04-18', 'AL-000001', 34800000, 1, 1),
(10, '2023-04-18', 'AL-000002', 45000000, 1, 1),
(11, '2023-04-18', 'AL-000003', 45000000, 1, 1),
(12, '2023-04-18', 'AL-000004', 45000000, 1, 1),
(13, '2023-04-18', 'AL-000005', 45000000, 1, 1),
(14, '2023-04-18', 'AL-000006', 45000000, 1, 1),
(16, '2023-04-18', 'AL-000008', 45000000, 1, 1),
(17, '2023-04-18', 'AL-000009', 45000000, 1, 1),
(18, '2023-04-18', 'AL-000010', 45000000, 1, 1),
(19, '2023-04-18', 'AL-000011', 45000000, 1, 1),
(20, '2023-04-18', 'AL-000012', 45000000, 1, 1),
(21, '2023-04-18', 'AL-000013', 2750000, 1, 1),
(23, '2023-04-18', 'AL-000014', 10200000, 1, 1),
(24, '2023-04-19', 'AL-000014', 4800000, 1, 1),
(25, '2023-05-02', 'AL-000015', 7000000, 1, 1),
(26, '2023-05-02', 'AL-000016', 34700000, 1, 1),
(27, '2023-05-02', 'AL-000017', 2700000, 1, 1),
(28, '2023-05-02', 'AL-000018', 45000000, 1, 1),
(29, '2023-05-02', 'AL-000019', 15000000, 1, 1),
(30, '2023-05-02', 'AL-000020', 150000, 1, 1),
(31, '2023-05-02', 'AL-000021', 100000, 2, 1),
(32, '2023-05-05', 'AL-000022', 2700000, 1, 1),
(33, '2023-05-10', 'AL-000023', 20000000, 1, 1),
(34, '2023-05-22', 'AL-000024', 15000000, 1, 1),
(35, '2023-05-22', 'AL-000025', 2700000, 1, 1),
(36, '2023-05-22', 'AL-000026', 0, 3, 1),
(37, '2023-05-22', 'AL-000027', 3000, 1, 1),
(38, '2023-05-22', 'AL-000028', 3000000, 1, 1),
(39, '2023-05-22', 'AL-000029', 4000000, 1, 1),
(40, '2023-05-23', 'AL-000030', 2997000, 1, 0),
(41, '2023-05-24', 'AL-000025', 2700000, 1, 0),
(42, '2023-05-24', 'AL-000030', 2700000, 1, 1),
(43, '2023-05-24', 'AL-000031', 2700000, 1, 1),
(44, '2023-05-24', 'AL-000020', 2550000, 1, 1),
(45, '2023-05-24', 'AL-000020', 5000000, 1, 0),
(46, '2023-05-24', 'AL-000032', 0, 1, 1),
(47, '2023-05-24', 'AL-000032', 2700000, 1, 1),
(48, '2023-05-24', 'AL-000033', 2700000, 1, 1),
(49, '2023-05-24', 'AL-000034', 2700000, 1, 1),
(50, '2023-05-24', 'AL-000035', 2700000, 1, 1),
(51, '2023-05-24', 'AL-000036', 2700000, 1, 1),
(52, '2023-05-24', 'AL-000037', 2700000, 1, 1),
(53, '2023-05-24', 'AL-000038', 2700000, 1, 1),
(54, '2023-05-24', 'AL-000039', 2700000, 1, 1),
(55, '2023-05-24', 'AL-000040', 2700000, 1, 1),
(56, '2023-05-24', 'AL-000041', 2700000, 1, 1),
(57, '2023-05-24', 'AL-000037', 10800000, 1, 1),
(58, '2023-05-24', 'AL-000036', 10800000, 1, 1),
(59, '2023-05-24', 'AL-000035', 7300000, 1, 1),
(60, '2023-05-24', 'AL-000034', 22300000, 1, 1),
(61, '2023-05-24', 'AL-000042', 2700000, 1, 1),
(62, '2023-05-24', 'AL-000043', 2700000, 1, 1),
(63, '2023-05-24', 'AL-000044', 2700000, 1, 1),
(64, '2023-05-24', 'AL-000045', 0, 1, 0),
(65, '2023-05-24', 'AL-000046', 2700000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ujroh`
--

CREATE TABLE `ujroh` (
  `id_ujroh` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_ujroh` varchar(25) NOT NULL,
  `nominal_ujroh` int(11) NOT NULL,
  `user_id_jemaah` varchar(25) NOT NULL,
  `no_reg_umrah_jemaah` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umrah_jemaah`
--

CREATE TABLE `umrah_jemaah` (
  `id_umrah_jemaah` int(11) NOT NULL,
  `no_reg_umrah_jemaah` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `daftar_via` varchar(25) NOT NULL,
  `nik_jemaah` varchar(25) NOT NULL,
  `nama_bank` varchar(25) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `user_id_agen` varchar(25) NOT NULL,
  `user_id_referall` varchar(25) NOT NULL,
  `ktp_jemaah` varchar(255) NOT NULL,
  `jenis_umrah` int(11) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `total_saldo_jemaah` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `status_kelengkapan` int(11) NOT NULL,
  `status_manifestasi` int(11) NOT NULL,
  `target_paket_keberangkatan` int(11) NOT NULL,
  `id_paket_keberangkatan` int(11) NOT NULL DEFAULT 0,
  `jenis_ujroh` varchar(25) NOT NULL,
  `status_umrah` int(11) NOT NULL,
  `status_booking` varchar(25) NOT NULL DEFAULT 'Non-Booking',
  `nomor_tiket` varchar(50) NOT NULL,
  `terakhir_menabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umrah_jemaah`
--

INSERT INTO `umrah_jemaah` (`id_umrah_jemaah`, `no_reg_umrah_jemaah`, `tanggal_daftar`, `daftar_via`, `nik_jemaah`, `nama_bank`, `no_rekening`, `atas_nama`, `user_id_agen`, `user_id_referall`, `ktp_jemaah`, `jenis_umrah`, `nominal_pembayaran`, `total_saldo_jemaah`, `status_pembayaran`, `status_kelengkapan`, `status_manifestasi`, `target_paket_keberangkatan`, `id_paket_keberangkatan`, `jenis_ujroh`, `status_umrah`, `status_booking`, `nomor_tiket`, `terakhir_menabung`) VALUES
(15, 'AL-000002', '2023-04-18', 'Online', '0003', 'Mandiri', '1310010891036', 'Muhammad Ibnu sholah ', 'BDO-000-000', 'BDO-000-000', '0003.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(16, 'AL-000003', '2023-04-18', 'Online', '0004', 'BCA', '4490265681', 'Rahmat Mulyana', 'BDO-000-000', 'BDO-000-000', '0004.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(17, 'AL-000004', '2023-04-18', 'Online', '0005', 'Mandiri', '131 00 1982034 1 ', 'ATIH ROHAYATI', 'BDO-000-000', 'BDO-000-000', '0005.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(18, 'AL-000005', '2023-04-18', 'Online', '0006', 'BCA', '5140434941', 'Mellyana Sopyani', 'BDO-000-000', 'BDO-000-000', '0006.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(19, 'AL-000006', '2023-04-18', 'Online', '0007', 'BCA', '2800552373', 'Hesti Sutari', 'BDO-000-000', 'BDO-000-000', '0007.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(21, 'AL-000008', '2023-04-18', 'Online', '0009', 'Mandiri', '1310005189479', 'puput irmawijayanti', 'BDO-000-000', 'BDO-000-000', '0008.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(22, 'AL-000009', '2023-04-18', 'Online', '0008', 'BCA', '4372371360', 'Aulia Sidiq ', 'BDO-000-000', 'BDO-000-000', '0008.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(23, 'AL-000010', '2023-04-18', 'Online', '0010', 'BCA', '8421-056-056', 'Sumantri', 'BDO-000-000', 'BDO-000-000', '0010.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(24, 'AL-000011', '2023-04-18', 'Online', '3273204205990002', 'BSI', '7129884589', 'SINTIA MEILINDA', 'BDO-000-000', 'BDO-000-000', '3273204205990002.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(25, 'AL-000012', '2023-04-18', 'Online', '00011', 'Mandiri', '1320026290347', 'Nurlina', 'BDO-000-000', 'BDO-000-000', '00011.jpg', 1, 45000000, 45000000, 1, 2, 2, 0, 7, 'Ujroh', 2, 'BOOKING', '', NULL),
(26, 'AL-000013', '2023-04-18', 'Agen', '32730353029500002', 'BTPN', '90340279898', 'NUR TIARA ARTINI', 'BDO-010-0010	', 'BDO-010-0010	', '32730353029500002.jpeg', 1, 2750000, 2750000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(28, 'AL-000014', '2023-04-18', 'Online', '0012', 'BCA', ' 5140434941', 'Santy Susanty', 'BDO-000-000', 'BDO-000-000', '0012.jpg', 1, 10200000, 15000000, 1, 2, 0, 0, 7, 'Ujroh', 0, 'Non-Booking', '', NULL),
(29, 'AL-000015', '2023-05-02', 'Agen', '3204285602710013', 'mandiri', '-', 'NENENG CUCU HERAWATI', 'BDO-005-0005', 'BDO-003-0005-A', '3204285602710013.jpeg', 1, 7000000, 7000000, 1, 1, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(30, 'AL-000016', '2023-05-02', 'Agen', '3204144402800003', 'BNI', '-', 'AI RUSTIKA', 'BDO-005-0005', 'BDO-003-0005-A', '3204144402800003.jpeg', 1, 34700000, 34700000, 1, 2, 0, 0, 11, 'Ujroh', 0, 'Non-Booking', '', NULL),
(31, 'AL-000017', '2023-05-02', 'Agen', '3273244309750001', 'BCA', '-', 'NENI MARTINI', 'BDO-005-0005', 'BDO-003-0005-A', '3273244309750001.jpeg', 1, 2700000, 2700000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(32, 'AL-000018', '2023-05-02', 'Agen', '3245', 'MANDIRI', '1560010284638', 'BAMBANG EKO SUPRIYANTO', 'BSI-09-0009', 'BSI-012-0009-A', '3245.jpeg', 1, 45000000, 45000000, 1, 0, 0, 0, 11, 'Ujroh', 0, 'Non-Booking', '', NULL),
(33, 'AL-000019', '2023-05-02', 'Agen', '3217105204690017', '-', '-', '-', 'BDO-005-0005', 'BDO-003-0005-A', '3217105204690017.jpeg', 1, 15000000, 15000000, 1, 2, 0, 0, 8, 'Ujroh', 0, 'Non-Booking', '', NULL),
(34, 'AL-000020', '2023-05-02', 'Agen', '324155', 'bca', '-', '-', 'BDO-000-000', 'BDO-000-000', '324155.jpeg', 1, 150000, 2700000, 1, 2, 0, 0, 11, 'Ujroh', 0, 'Non-Booking', '', NULL),
(35, 'AL-000021', '2023-05-02', 'Agen', '546328769', '-', '-', '-', 'BDO-000-000', 'BDO-000-000', '546328769.jpeg', 2, 100000, 100000, 1, 2, 0, 11, 11, 'Ujroh', 0, 'Non-Booking', '', '2023-05-02'),
(36, 'AL-000022', '2023-05-05', 'Agen', '3207305207540001', '-', '-', '-', 'BDO-006-0006', 'BDO-09-0006-A', '3207305207540001.jpeg', 1, 2700000, 2700000, 1, 1, 0, 0, 11, 'Ujroh', 0, 'Non-Booking', '', NULL),
(37, 'AL-000023', '2023-05-10', 'Agen', '327324490950003', '-', '-', '-', 'BDO-008-0008', 'BDO-011-0008-A', '327324490950003.jpeg', 1, 20000000, 20000000, 1, 1, 0, 0, 11, 'Ujroh', 0, 'Non-Booking', '', NULL),
(38, 'AL-000024', '2023-05-22', 'Agen', '3211204702650002', '-', '-', '-', 'BDO-004-0004', 'BDO-007-0004-A', '3211204702650002.jpeg', 1, 15000000, 15000000, 1, 0, 0, 0, 7, 'Ujroh', 0, 'Non-Booking', '', NULL),
(39, 'AL-000025', '2023-05-22', 'Agen', '3273180408820002', '-', '-', '-', 'BDO-008-0008', 'BDO-011-0008-A', '3273180408820002.jpg', 1, 2700000, 2700000, 1, 0, 0, 0, 11, 'Ujroh', 0, 'Non-Booking', '', NULL),
(40, 'AL-000027', '2023-05-22', 'Agen', '3211201507570008', '-', '-', '-', 'BDO-004-0004', 'BDO-015-0021-A', '3211201507570008.jpg', 1, 3000000, 3000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(41, 'AL-000028', '2023-05-22', 'Agen', '3212046412640001', '-', '-', '-', 'BDO-004-0004', 'BDO-015-0021-A', '3212046412640001.jpeg', 1, 3000000, 3000000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(42, 'AL-000029', '2023-05-22', 'Agen', '3211185205830018', '-', '-', '-', 'BDO-004-0004', 'BDO-015-0021-A', '3211185205830018.jpeg', 1, 4000000, 4000000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(43, 'AL-000030', '2023-05-24', 'Agen', '3204', '-', '-', '-', 'BDO-000-000', 'BDO-000-000', '3204.jpg', 1, 2700000, 2700000, 1, 2, 0, 0, 0, 'Ujroh', 0, 'Non-Booking', '', NULL),
(44, 'AL-000031', '2023-05-24', 'Agen', '32004', '-', '-', '-', 'CMS-002-0002', 'BSI-012-0009-A', '32004.jpg', 1, 2700000, 2700000, 1, 0, 0, 0, 13, 'Ujroh', 0, 'Non-Booking', '', NULL),
(45, 'AL-000032', '2023-05-24', 'Agen', '-', 'BJB SYARIAH', '5140209005896', 'UDIN SAMSUDIN', 'BSI-09-0009', 'BSI-012-0009-A', '-.jpeg', 1, 0, 2700000, 1, 0, 0, 0, 0, 'Ujroh', 0, 'Non-Booking', '', NULL),
(46, 'AL-000033', '2023-05-24', 'Agen', '3273084601750001', '-', '-', '-', 'BDO-012-0013', 'BDO-013-0013-A', '3273084601750001.jpeg', 1, 2700000, 2700000, 1, 1, 0, 0, 0, 'Ujroh', 0, 'Non-Booking', '', NULL),
(47, 'AL-000034', '2023-05-24', 'Agen', '3216044909600002', '-', '-', '-', 'BSI-09-0009', 'BSI-017-0026-A', '3216044909600002.jpg', 1, 2700000, 25000000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(48, 'AL-000035', '2023-05-24', 'Agen', '3216044102520001', '-', '-', '-', 'BSI-09-0009', 'BSI-017-0026-A', '3216044102520001.jpg', 1, 2700000, 10000000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(49, 'AL-000036', '2023-05-24', 'Agen', '3216045102740001', '-', '-', '-', 'BSI-09-0009', 'BSI-017-0026-A', '3216045102740001.jpg', 1, 2700000, 13500000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(50, 'AL-000037', '2023-05-24', 'Agen', '3216041604720002', '-', '-', '-', 'BSI-09-0009', 'BSI-017-0026-A', '3216041604720002.jpg', 1, 2700000, 13500000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(51, 'AL-000038', '2023-05-24', 'Agen', '3216044503110003', '-', '-', '-', 'BSI-09-0009', 'BSI-017-0026-A', '3216044503110003.jpg', 1, 2700000, 2700000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(52, 'AL-000039', '2023-05-24', 'Agen', '3216047112740004', '-', '-', '-', 'BSI-09-0009', 'BSI-017-0026-A', '3216047112740004.jpg', 1, 2700000, 2700000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(53, 'AL-000040', '2023-05-24', 'Agen', '3216042909710001', '-', '-', '-', 'BSI-09-0009', 'BSI-017-0026-A', '3216042909710001.jpg', 1, 2700000, 2700000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(54, 'AL-000041', '2023-05-24', 'Agen', '3216045608750001', '-', '-', '-', 'BSI-09-0009', 'BSI-017-0026-A', '3216045608750001.jpg', 1, 2700000, 2700000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(55, 'AL-000042', '2023-05-24', 'Agen', '3207164810560003', '-', '-', '-', 'BDO-003-0003', 'BDO-004-0003-A', '3207164810560003.jpg', 1, 2700000, 2700000, 1, 2, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(56, 'AL-000043', '2023-05-24', 'Agen', '3207154404580001', '-', '-', '-', 'BDO-003-0003', 'BDO-004-0003-A', '3207154404580001.jpg', 1, 2700000, 2700000, 1, 2, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(57, 'AL-000044', '2023-05-24', 'Agen', '327314710640003', '-', '-', '-', 'BDO-003-0003', 'BDO-004-0003-A', '327314710640003.jpg', 1, 2700000, 2700000, 1, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(58, 'AL-000045', '2023-05-24', 'Agen', '3273261211600001', '-', '-', '-', 'BDO-003-0003', 'BDO-004-0003-A', '3273261211600001.jpg', 1, 0, 0, 0, 0, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL),
(59, 'AL-000046', '2023-05-24', 'Agen', '3273264302640001', '-', '-', '-', 'BDO-003-0003', 'BDO-004-0003-A', '3273264302640001.jpg', 1, 2700000, 2700000, 1, 2, 0, 0, 11, 'Paket A', 0, 'Non-Booking', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_jemaah` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `terakhir_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_jemaah`, `nama_user`, `email`, `password`, `role`, `terakhir_login`) VALUES
(17, 14, 'admin', 'admin@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Admin', '2023-05-22 14:00:53'),
(18, 13, 'rachman', 'rachmansofyan80@gmail.com', 'aec7e942f898c6163c9abc327d26c7d6', 'Admin', '2023-05-26 10:37:35'),
(19, 18, 'Ibnu', 'ibnu@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '2023-04-18 03:06:18'),
(20, 19, 'Rahmat', 'rahmat@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '2023-05-24 16:20:51'),
(21, 20, 'Atih', 'atihrohayati@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '0000-00-00 00:00:00'),
(22, 21, 'Mellyana', 'mellyana@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '2023-05-11 16:51:19'),
(23, 22, 'Hesti', 'hestisutari@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '2023-05-22 12:32:49'),
(24, 23, 'Puput', 'puput@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '0000-00-00 00:00:00'),
(25, 24, 'Aulia', 'auliasidiq@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '2023-05-10 12:33:53'),
(26, 25, 'Sumantri', 'sumantri@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '0000-00-00 00:00:00'),
(27, 26, 'Sintia', 'sintia@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '2023-04-18 13:41:49'),
(28, 27, 'Nurlina', 'nurlina@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '0000-00-00 00:00:00'),
(29, 26, 'wigi putu', 'putuwigi21@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Keberangkatan', '2023-05-26 14:41:01'),
(30, 13, 'Yudha Negara', 'yudha.negara@ymail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Admin', '2023-05-26 10:18:36'),
(31, 13, 'rahmatbono', 'rahmatbono@gmail.com', '64f9e8a190315e206220128d510cb869', 'Marketing', '2023-05-10 13:11:21'),
(32, 30, 'santi susanty', 'santy@gmail.com', '01a5f5db2d97bd6b389e7a20bd889708', 'Agen', '0000-00-00 00:00:00'),
(33, 14, 'DENI SETIADI', 'deni_cendo25@yahoo.com', 'b2e795bda389f78265b4b3db8c49697e', 'Admin', '2023-05-22 14:46:29'),
(34, 14, 'IA NURMAYANTI', 'nurmayantiia036@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Admin', '2023-05-22 14:48:00'),
(35, 14, 'HERI KURNIAWAN', 'kheri4371@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Admin', '0000-00-00 00:00:00'),
(36, 14, 'Yudy Ahadiyat', 'yudyahadyat@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Admin', '2023-05-24 16:31:44'),
(37, 14, 'sri eka', 'srieka111@yahoo.com', '3b5a9be1d823ed6406fbe4c272301fe3', 'Admin Pendaftaran', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agen`
--
ALTER TABLE `agen`
  ADD PRIMARY KEY (`id_agen`);

--
-- Indexes for table `detail_subsidi_agen`
--
ALTER TABLE `detail_subsidi_agen`
  ADD PRIMARY KEY (`id_detail_subsidi_agen`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `history_pembayaran`
--
ALTER TABLE `history_pembayaran`
  ADD PRIMARY KEY (`id_history_pembayaran`);

--
-- Indexes for table `informasi_text`
--
ALTER TABLE `informasi_text`
  ADD PRIMARY KEY (`id_informasi_text`);

--
-- Indexes for table `jemaah`
--
ALTER TABLE `jemaah`
  ADD PRIMARY KEY (`id_jemaah`);

--
-- Indexes for table `kelengkapan_umrah`
--
ALTER TABLE `kelengkapan_umrah`
  ADD PRIMARY KEY (`id_kelengkapan`);

--
-- Indexes for table `kode_kota`
--
ALTER TABLE `kode_kota`
  ADD PRIMARY KEY (`id_kode_kota`);

--
-- Indexes for table `laskar`
--
ALTER TABLE `laskar`
  ADD PRIMARY KEY (`id_laskar`);

--
-- Indexes for table `manifestasi_umrah`
--
ALTER TABLE `manifestasi_umrah`
  ADD PRIMARY KEY (`id_manifestasi_umrah`);

--
-- Indexes for table `paket_keberangkatan`
--
ALTER TABLE `paket_keberangkatan`
  ADD PRIMARY KEY (`id_paket_keberangkatan`);

--
-- Indexes for table `pasangan_umrah`
--
ALTER TABLE `pasangan_umrah`
  ADD PRIMARY KEY (`id_pasangan_umrah`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `subsidi_agen`
--
ALTER TABLE `subsidi_agen`
  ADD PRIMARY KEY (`id_subsidi_agen`);

--
-- Indexes for table `tabungan_umrah_jemaah`
--
ALTER TABLE `tabungan_umrah_jemaah`
  ADD PRIMARY KEY (`id_tabungan_umrah_jemaah`);

--
-- Indexes for table `tagihan_pembayaran`
--
ALTER TABLE `tagihan_pembayaran`
  ADD PRIMARY KEY (`id_tagihan_pembayaran`);

--
-- Indexes for table `ujroh`
--
ALTER TABLE `ujroh`
  ADD PRIMARY KEY (`id_ujroh`);

--
-- Indexes for table `umrah_jemaah`
--
ALTER TABLE `umrah_jemaah`
  ADD PRIMARY KEY (`id_umrah_jemaah`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agen`
--
ALTER TABLE `agen`
  MODIFY `id_agen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `detail_subsidi_agen`
--
ALTER TABLE `detail_subsidi_agen`
  MODIFY `id_detail_subsidi_agen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history_pembayaran`
--
ALTER TABLE `history_pembayaran`
  MODIFY `id_history_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `informasi_text`
--
ALTER TABLE `informasi_text`
  MODIFY `id_informasi_text` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jemaah`
--
ALTER TABLE `jemaah`
  MODIFY `id_jemaah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `kelengkapan_umrah`
--
ALTER TABLE `kelengkapan_umrah`
  MODIFY `id_kelengkapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `kode_kota`
--
ALTER TABLE `kode_kota`
  MODIFY `id_kode_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `laskar`
--
ALTER TABLE `laskar`
  MODIFY `id_laskar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `manifestasi_umrah`
--
ALTER TABLE `manifestasi_umrah`
  MODIFY `id_manifestasi_umrah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `paket_keberangkatan`
--
ALTER TABLE `paket_keberangkatan`
  MODIFY `id_paket_keberangkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pasangan_umrah`
--
ALTER TABLE `pasangan_umrah`
  MODIFY `id_pasangan_umrah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `subsidi_agen`
--
ALTER TABLE `subsidi_agen`
  MODIFY `id_subsidi_agen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabungan_umrah_jemaah`
--
ALTER TABLE `tabungan_umrah_jemaah`
  MODIFY `id_tabungan_umrah_jemaah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tagihan_pembayaran`
--
ALTER TABLE `tagihan_pembayaran`
  MODIFY `id_tagihan_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `ujroh`
--
ALTER TABLE `ujroh`
  MODIFY `id_ujroh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `umrah_jemaah`
--
ALTER TABLE `umrah_jemaah`
  MODIFY `id_umrah_jemaah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
