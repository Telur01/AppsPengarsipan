-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 11:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dpmptsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktif`
--

CREATE TABLE `tb_aktif` (
  `id_aktif` int(5) NOT NULL,
  `no_berkas` varchar(30) NOT NULL,
  `no_item_arsip` varchar(30) NOT NULL,
  `kode_klasifikasi` varchar(30) NOT NULL,
  `uraian_informasi` text NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  `keterangan` text NOT NULL,
  `document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aktif`
--

INSERT INTO `tb_aktif` (`id_aktif`, `no_berkas`, `no_item_arsip`, `kode_klasifikasi`, `uraian_informasi`, `tanggal`, `jumlah`, `keterangan`, `document`) VALUES
(1, '1020304050', '3', '1020/VIII/DPMPTSP/2023', 'Lorem Ipsum', '2023-10-09', 1, 'Lorem Arsip', '2140-4775-1-PB.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsipboss`
--

CREATE TABLE `tb_arsipboss` (
  `id_arsipboss` int(5) NOT NULL,
  `no_pendaftaran` varchar(23) NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `no_sk_lengkap` varchar(12) NOT NULL,
  `jenis_izin` varchar(30) NOT NULL,
  `jenis_layanan` varchar(20) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `alamat_persil` text NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `wilayah` varchar(30) NOT NULL,
  `peruntukan` varchar(100) NOT NULL,
  `tanggal_ttd` date NOT NULL,
  `ruang` varchar(5) NOT NULL,
  `rak` varchar(3) NOT NULL,
  `box` varchar(3) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` int(4) NOT NULL,
  `file1` text NOT NULL,
  `file2` text NOT NULL,
  `file3` text NOT NULL,
  `file4` text NOT NULL,
  `file5` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_biodata`
--

CREATE TABLE `tb_biodata` (
  `id_biodata` int(3) NOT NULL,
  `NIP` int(18) NOT NULL,
  `tempat_tanggal_lahir` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_biodata`
--

INSERT INTO `tb_biodata` (`id_biodata`, `NIP`, `tempat_tanggal_lahir`, `agama`) VALUES
(4, 123456, 'Majalengka, 03 November 2000', 'islam'),
(5, 1020304050, '', ''),
(6, 20301040, '', ''),
(7, 1020304050, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumentasi`
--

CREATE TABLE `tb_dokumentasi` (
  `id_dokumentasi` int(5) NOT NULL,
  `waktu` datetime NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `peserta` text NOT NULL,
  `keterangan` text NOT NULL,
  `foto_kegiatan` text NOT NULL,
  `berita_acara` text NOT NULL,
  `notulen` text NOT NULL,
  `daftar_hadir` text NOT NULL,
  `surat_undangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_inaktif`
--

CREATE TABLE `tb_inaktif` (
  `id_inaktif` int(5) NOT NULL,
  `nomor_arsip` varchar(30) NOT NULL,
  `kode_klasifikasi` varchar(30) NOT NULL,
  `uraian_informasi` text NOT NULL,
  `kurun_waktu` varchar(10) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `ket_nomor_box` int(5) NOT NULL,
  `daftar_arsip` text NOT NULL,
  `berita_acara` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inaktif`
--

INSERT INTO `tb_inaktif` (`id_inaktif`, `nomor_arsip`, `kode_klasifikasi`, `uraian_informasi`, `kurun_waktu`, `jumlah`, `ket_nomor_box`, `daftar_arsip`, `berita_acara`, `date_created`) VALUES
(1, '10203050', '123', 'Lorem Ipsum', '5 Hari', 1, 20, 'document.pdf', '3411201117_LionyPuspitaDewi_DSEC_Proposal_Metpen.pdf', '2023-10-09 11:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_monitoring`
--

CREATE TABLE `tb_monitoring` (
  `id_monitoring` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `no_izin` varchar(40) NOT NULL,
  `jenis_izin` varchar(50) NOT NULL,
  `jenis_layanan` varchar(100) NOT NULL,
  `nama_pemohon` varchar(30) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `alamat_persil` text NOT NULL,
  `peruntukan` text NOT NULL,
  `document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_izin` varchar(40) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `nama_peminjam` varchar(30) NOT NULL,
  `lokasi_izin` text NOT NULL,
  `unit_kerja` text NOT NULL,
  `jenis_arsip` varchar(30) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `keperluan_peminjaman` text NOT NULL,
  `keterangan` text NOT NULL,
  `document` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `no_izin`, `nama_pemilik`, `nama_peminjam`, `lokasi_izin`, `unit_kerja`, `jenis_arsip`, `jumlah`, `keperluan_peminjaman`, `keterangan`, `document`) VALUES
(1, '2022-08-29', '2022-08-29', '503.648.1/3353/BPPT 10 September 2012', 'N.NURDJAMAN, SE., MM, Untuk PT. GLOBAL PERSADA NUSANTARA', 'Arwiani - Umi (Sekretariat)', '-', 'DPMPTSP', 'Izin Mendirikan Bangunan (IMB)', 1, 'Cek arsip IMB untuk permohonan Legalisir', 'Arsip Konversional Ada', 'Sosialisasi_TA1_Ganjil_-_Mhs_pptx.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_biodata` int(3) NOT NULL,
  `kode_user` varchar(6) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `level` enum('administrator','kepala_bagian','staff') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_biodata`, `kode_user`, `nama_lengkap`, `email`, `username`, `password`, `level`, `date_created`) VALUES
(13, 4, 'US001', 'Cecep M Zakariya', 'Cpmzkrya03@gmail.com', 'Cpmzkrya03', '$2y$10$XWwDOZs4NwHBYK/LJMBi9uLFq2BXuQScFTUpAzBd7ehrJb4ni21Uu', 'administrator', '2023-10-27 18:24:11'),
(18, 7, 'US002', 'Nurul Fadhilah Anwar', '', 'Fadhil', '$2y$10$tE4NMMg6hzEc1USsKhWjaukWY1jmBmP3lvg2SQZhSP9SJv3scs8dy', 'kepala_bagian', '2023-10-31 08:29:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aktif`
--
ALTER TABLE `tb_aktif`
  ADD PRIMARY KEY (`id_aktif`);

--
-- Indexes for table `tb_arsipboss`
--
ALTER TABLE `tb_arsipboss`
  ADD PRIMARY KEY (`id_arsipboss`);

--
-- Indexes for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indexes for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `tb_inaktif`
--
ALTER TABLE `tb_inaktif`
  ADD PRIMARY KEY (`id_inaktif`);

--
-- Indexes for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aktif`
--
ALTER TABLE `tb_aktif`
  MODIFY `id_aktif` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_arsipboss`
--
ALTER TABLE `tb_arsipboss`
  MODIFY `id_arsipboss` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  MODIFY `id_biodata` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  MODIFY `id_dokumentasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_inaktif`
--
ALTER TABLE `tb_inaktif`
  MODIFY `id_inaktif` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  MODIFY `id_monitoring` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
