-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2024 pada 05.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpuskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kec_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `kec_id`) VALUES
(1, 'Pasar minggu', 1),
(2, 'Cilandak', 2),
(3, 'Jagakarsa', 3),
(4, 'Condet', 4),
(5, 'Tanjung Barat', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paramedis`
--

CREATE TABLE `paramedis` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kategori` enum('Perawat','Paramedis','Teknisi Medis','Ahli Gigi','Asisten Medis','Ahli Gizi','Fisioterapi','Ahli Farmasi','Ahli Kesehatan Masyarakat') DEFAULT NULL,
  `telpon` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `unit_kerja_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- data untuk tabel `paramedis`
--

INSERT INTO `paramedis` (`id`, `nama`, `gender`, `tmp_lahir`, `tgl_lahir`, `kategori`, `telpon`, `alamat`, `unit_kerja_id`) VALUES
(1, 'Dr. Sidik', 'L', 'Jakarta', '1990-01-15', 'Fisioterapi', '0812199057', 'Komplek Puri indah. No. 1', 1),
(2, 'Dr. Nurmila', 'P', 'Jakarta', '1985-05-20', 'Ahli Gigi', '0812074550', 'Komplek jaksa agung.  No. 2', 2),
(3, 'Dr. Siska', 'P', 'Jakarta', '1978-11-10', 'Ahli Gizi', '0812233301', 'Komplek permata indah. No. 3', 3),
(4, 'Dr. Gofari', 'L', 'Jakarta', '1982-09-15', 'Paramedis', '0812109837', 'Komplek pejaten town house. No. 4', 4),
(5, 'Dr. Susi', 'P', 'Jakarta', '1989-07-25', 'Perawat', '0812000908', 'Komplek mutiara gading. No. 5', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kelurahan_id` int(11) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--  data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `kode`, `nama`, `tmp_lahir`, `tgl_lahir`, `gender`, `email`, `alamat`, `kelurahan_id`) VALUES
(1, '00001', 'Agung', 'Jakarta', '2000-03-15', 'L', 'Agung@gmail.com', 'Jl. Duku No. 1', 1),
(2, '00002', 'Sahni', 'Jakarta', '1997-02-31', 'P', 'Shani@gmail.com', 'Jl. Semangka No. 5', 2),
(3, '00003', 'Anchikka', 'Jakarta', '1999-12-31', 'P', 'Anchikka@gmail.com', 'Jl. Melon No. 15', 3),
(4, '00004', 'Boby', 'Jakarta', '2002-04-12', 'L', 'Boby@gmail.com', 'Jl. Rambutan No. 3', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `berat` double DEFAULT NULL,
  `tinggi` double DEFAULT NULL,
  `tensi` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `pasien_id` int(11) DEFAULT NULL,
  `dokter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id`, `tanggal`, `berat`, `tinggi`, `tensi`, `keterangan`, `pasien_id`, `dokter_id`) VALUES
(1, '2024-03-15', 70, 170, '120/80', 'Pasien dalam kondisi Tangan patah.', 1, 1),
(2, '2024-03-16', 58.9, 164, '130/85', 'Pasien mengalami nyeri pada gigi.', 2, 2),
(3, '2024-03-17', 65, 153, '140/90', 'Pasien mengalami demam tinggi.', 3, 3),
(4, '2024-03-18', 66, 168, '110/75', 'Pasien nyeri pada badan bagian kiri.', 4, 4),
(5, '2024-03-19', 72, 180, '150/95', 'Pasien mengalami luka bakar.', 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id`, `nama`) VALUES
(1, 'Poli Rehabilitasi'),
(2, 'Poli Gigi'),
(3, 'Poli Kesehatan Ibu dan Anak'),
(4, 'Poli Penyakit Dalam'),
(5, 'Poli Bedah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paramedis`
--
ALTER TABLE `paramedik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `paramedis`
--
ALTER TABLE `paramedik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `paramedis`
--
ALTER TABLE `paramedis`
  ADD CONSTRAINT `paramedis_1` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerja` (`id`);
COMMIT;

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_1` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`);
COMMIT;

--
-- Ketidakleluasaan untuk tabel `pasien`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`);
  ADD CONSTRAINT `periksa_2` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
