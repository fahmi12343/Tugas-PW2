-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 23 Des 2019 pada 04.58
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang_369`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `KdBrg` varchar(6) NOT NULL DEFAULT '',
  `NmBrg` varchar(50) DEFAULT NULL,
  `Satuan` varchar(10) DEFAULT NULL,
  `HargaBrg` varchar(10) DEFAULT NULL,
  `Stok` int(3) DEFAULT NULL,
  `KdKategori` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`KdBrg`, `NmBrg`, `Satuan`, `HargaBrg`, `Stok`, `KdKategori`) VALUES
('BRG001', 'korsi', 'kilo', '10000', 2, 'KTG001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buktipesan`
--

CREATE TABLE `buktipesan` (
  `NoPesan` varchar(7) NOT NULL DEFAULT '',
  `TglPesan` date DEFAULT NULL,
  `KdPlg` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buktipesan`
--

INSERT INTO `buktipesan` (`NoPesan`, `TglPesan`, `KdPlg`) VALUES
('PSN001', '2019-12-23', 'PLG003'),
('PSN002', '2019-12-23', 'PLG001'),
('PSN003', '2019-12-23', 'PLG001'),
('PSN004', '2019-12-23', 'PLG002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detilpesan`
--

CREATE TABLE `detilpesan` (
  `NoPesan` varchar(6) NOT NULL,
  `KdBrg` varchar(6) NOT NULL,
  `HargaBrg` varchar(10) NOT NULL,
  `JmlPesan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detilpesan`
--

INSERT INTO `detilpesan` (`NoPesan`, `KdBrg`, `HargaBrg`, `JmlPesan`) VALUES
('PSN001', 'BRG001', '10000', 1),
('PSN002', 'BRG001', '10000', 2),
('PSN003', 'BRG001', '10000', 2),
('PSN004', 'BRG001', '10000', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `KdKategori` varchar(6) NOT NULL DEFAULT '',
  `NmKategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`KdKategori`, `NmKategori`) VALUES
('KTG001', 'Barang'),
('KTG002', 'Kertas'),
('KTG003', 'Kayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nurfahmiazis19@gmail.com', '$2y$10$IuOPhvmw2wGr4zgigJ9ZJev1qaDQ9ENH3hC/TMIjFWs9lpsCQi8TS', '2019-12-13 01:33:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `KdPlg` varchar(6) NOT NULL DEFAULT '',
  `NmPlg` varchar(50) DEFAULT NULL,
  `AlamatPlg` varchar(50) DEFAULT NULL,
  `TelpPlg` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`KdPlg`, `NmPlg`, `AlamatPlg`, `TelpPlg`) VALUES
('PLG001', 'dasdsd', '132', '132132'),
('PLG002', 'dasdsd', 'wqewq', '213123'),
('PLG003', '1232', '3wqewqewqe', '123132123132213'),
('PLG004', 'wqeqweq', 'weqweqweq', '12321'),
('PLG005', '321321', 'qeweqwe', '12312'),
('PLG006', '132ewqq', '1323weqw', '12323'),
('PLG007', '123123wqeqwe', 'qeqweqweqe13eqewq', '132213231'),
('PLG008', 'wqe123123', 'ewqewq12323', '123123'),
('PLG009', 'qqq', 'qqq', '111'),
('PLG010', '123wqeqwe', 'qwe', '133333'),
('PLG011', '23213qwewqe', '123wqewq', '123323232');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nur Fahmi Azis', 'nurfahmiazis19@gmail.com', NULL, '$2y$10$Iu3n.b/cyRUKHKkSJegfqOdnKdVu2uizE66HDonLXHNUKDSzwrs1W', NULL, '2019-12-12 01:40:18', '2019-12-12 01:40:18'),
(2, 'nur Fahmi Azis', '2@wwqwe', NULL, '$2y$10$t0RdBNqhjemMxRmvBKuWZu8X8seCTqd1LGCIGSsjqPUPCT1bw3Nnq', NULL, '2019-12-13 01:33:50', '2019-12-13 01:33:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`KdBrg`),
  ADD KEY `KdKategori` (`KdKategori`);

--
-- Indeks untuk tabel `buktipesan`
--
ALTER TABLE `buktipesan`
  ADD PRIMARY KEY (`NoPesan`),
  ADD KEY `buktipesan_ibfk_1` (`KdPlg`);

--
-- Indeks untuk tabel `detilpesan`
--
ALTER TABLE `detilpesan`
  ADD KEY `NoPesan` (`NoPesan`),
  ADD KEY `KdBrg` (`KdBrg`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KdKategori`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`KdPlg`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`KdKategori`) REFERENCES `kategori` (`KdKategori`);

--
-- Ketidakleluasaan untuk tabel `detilpesan`
--
ALTER TABLE `detilpesan`
  ADD CONSTRAINT `detilpesan_ibfk_1` FOREIGN KEY (`KdBrg`) REFERENCES `barang` (`KdBrg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
