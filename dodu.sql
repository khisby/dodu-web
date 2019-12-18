-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2019 pada 13.40
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dodu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `ID_JADWAL` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `ID_PENGGUNA` int(11) NOT NULL,
  `JENIS_TRANSAKSI` tinyint(1) NOT NULL,
  `NOMINAL_TRANSAKSI` varchar(255) NOT NULL,
  `KETERANGAN_TRANSAKSI` text NOT NULL,
  `WAKTU_JADWAL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `ID_KATEGORI`, `ID_PENGGUNA`, `JENIS_TRANSAKSI`, `NOMINAL_TRANSAKSI`, `KETERANGAN_TRANSAKSI`, `WAKTU_JADWAL`) VALUES
(2, 6, 1, 0, '300000', 'Langganan internet Indigo', '4'),
(3, 6, 1, 0, '50000', 'Langganan internet MyRepvblik', '31'),
(4, 6, 1, 0, '300000', 'nyicil rumah', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `ID_PENGGUNA` int(255) NOT NULL,
  `NAMA_KATEGORI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `ID_PENGGUNA`, `NAMA_KATEGORI`) VALUES
(1, 1, 'Minum'),
(2, 1, 'Main'),
(3, 6, 'anu'),
(4, 6, 'makan pizza'),
(5, 1, 'Makan'),
(6, 1, 'Bulanan'),
(7, 1, 'kategorique'),
(8, 1, 'kategori dari gui java'),
(9, 10, 'kategori anu'),
(10, 10, 'kategori anu2'),
(11, 1, 'makan murah'),
(12, 1, 'kategoridariapi'),
(13, 1, 'kategoridariapi'),
(14, 1, 'kategoridariapi'),
(15, 1, 'kategoridariapi2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_PENGGUNA` int(11) NOT NULL,
  `NAMA_PENGGUNA` varchar(255) DEFAULT NULL,
  `SUREL_PENGGUNA` varchar(255) DEFAULT NULL,
  `SANDI_PENGGUNA` varchar(255) DEFAULT NULL,
  `TOKEN_PENGGUNA` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `NAMA_PENGGUNA`, `SUREL_PENGGUNA`, `SANDI_PENGGUNA`, `TOKEN_PENGGUNA`) VALUES
(1, 'khisby', 'khisby@gmail.com', 'khisby', ''),
(5, 'Birky', '', '', ''),
(6, 'Birky', 'ab@gamil.com', 'ab', ''),
(7, 'a', 'a', 'a', ''),
(8, 'anu', 'anu@anu.anu', 'anu', ''),
(9, 'asd', 'asd', 'asd', ''),
(10, 'anu', 'anu', 'anu', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `ID_PENGGUNA` int(11) DEFAULT NULL,
  `JENIS_TRANSAKSI` decimal(1,0) DEFAULT NULL,
  `NOMINAL_TRANSAKSI` varchar(255) DEFAULT NULL,
  `KETERANGAN_TRANSAKSI` varchar(255) NOT NULL,
  `WAKTU_TRANSAKSI` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `ID_KATEGORI`, `ID_PENGGUNA`, `JENIS_TRANSAKSI`, `NOMINAL_TRANSAKSI`, `KETERANGAN_TRANSAKSI`, `WAKTU_TRANSAKSI`) VALUES
(1, 1, 1, '0', '10000', 'anu', '2019-10-24 18:30:00.000000'),
(2, 2, 1, '0', '10000000', 'anunya', '2019-10-24 18:30:00.000000'),
(3, 1, 1, '0', '10000000', 'anu lagi', '2019-09-02 18:30:00.000000'),
(4, 1, 1, '0', '1000000', 'anu anu lagi anu', '2019-10-24 18:40:32.000000'),
(6, 1, 1, '0', '100092839', 'masuk ini', '2019-10-25 09:31:16.000000'),
(7, 1, 1, '1', '100000', 'Masuk ini bung', '2019-10-25 09:32:46.000000'),
(9, 4, 6, '1', '10000000', 'beli makan', '2019-10-25 09:38:04.000000'),
(10, 3, 6, '0', '500000', 'pingin anu', '2019-10-25 09:41:29.000000'),
(11, 4, 6, '0', '100000', 'pizza nya anu mas', '2019-10-25 10:22:06.000000'),
(17, 6, 1, '0', '300000', 'Langganan internet Indigo', '2019-10-31 17:43:55.000000'),
(19, 6, 1, '0', '50000', 'Langganan internet MyRepvblik', '2019-10-31 17:53:33.000000'),
(20, 6, 1, '0', '300000', 'Langganan internet Indigo', '2019-11-01 20:24:21.000000'),
(22, 6, 1, '0', '300000', 'Langganan internet Indigo', '2019-11-01 20:24:21.000000'),
(23, 6, 1, '0', '50000', 'Langganan internet MyRepvblik', '2019-11-01 20:24:21.000000'),
(24, 6, 1, '0', '300000', 'Langganan internet Indigo', '2019-11-01 20:24:21.000000'),
(25, 6, 1, '0', '50000', 'Langganan internet MyRepvblik', '2019-11-01 20:24:21.000000'),
(26, 6, 1, '0', '300000', 'Langganan internet Indigo', '2019-11-01 20:24:21.000000'),
(27, 6, 1, '0', '50000', 'Langganan internet MyRepvblik', '2019-11-01 20:24:21.000000'),
(68, 6, 1, '0', '300000', 'Langganan internet Indigo', '2019-11-04 01:30:51.000000'),
(69, 1, 1, '0', '100000', 'Main anu', '2019-11-04 02:49:18.000000'),
(70, 2, 1, '0', '100000', 'anu main anu', '2019-11-04 04:24:00.000000'),
(79, 10, 10, '0', '11', '11', '2019-11-04 11:51:12.000000'),
(80, 10, 10, '1', '10000', 'anua nu ', '2019-11-04 11:51:31.000000'),
(81, 9, 10, '0', '1000', 'anu', '2019-11-04 11:54:02.000000'),
(82, 7, 1, '0', '100000', 'makan di warung', '2019-11-04 12:23:37.000000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID_JADWAL`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`),
  ADD UNIQUE KEY `SUREL_PENGGUNA` (`SUREL_PENGGUNA`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `ID_JADWAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID_PENGGUNA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
