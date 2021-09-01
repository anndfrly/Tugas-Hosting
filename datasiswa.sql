-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Agu 2021 pada 13.23
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdatasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tdts`
--

CREATE TABLE `tdts` (
  `id_s` int(11) NOT NULL,
  `nis` varchar(8) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `ttl` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tdts`
--

INSERT INTO `tdts` (`id_s`, `nis`, `nama`, `ttl`) VALUES
(1, '11907026', 'Ananda Firly Hako', 'Jakarta, 07 April 2004'),
(2, '11907060', 'Diadiva Rinasri', 'Jakarta, 06 Agustus 2002'),
(11, '11907766', 'Ananda Dilan Rifandy', 'Bogor, 04 Juni 2029'),
(12, '11906677', 'Aninda Dhiya Disa', 'Bogor, 08 Juli 2036');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tdts`
--
ALTER TABLE `tdts`
  ADD PRIMARY KEY (`id_s`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tdts`
--
ALTER TABLE `tdts`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
