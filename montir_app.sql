-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jan 2025 pada 15.15
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `montir_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `Id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `whatsapp` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`Id`, `username`, `password`, `email`, `whatsapp`) VALUES
(1, 'abc', '$2y$10$LuIKDVPJNygpuMPmqmt3u.7Anu.vWDISNq8/sHbsrHu', '', 0),
(2, 'user', '$2y$10$fd65z1d9RO9w/Od3bv9efuLEWCORcodNxtLarG3Jxuc', '', 0),
(3, 'aaa', '$2y$10$B2TciAEkFN.jtW7f6TAHqeEI.jjozj8WhgTn0qIbXwi', '', 0),
(4, 'admin', '1234', '', 0),
(5, 'roni', '1234', '', 0),
(6, 'pop', '1234', '', 0),
(12, 'pop1', '123', '', 0),
(13, 'ronisntr', '1234', '', 0),
(14, 'ujang', '1234', '', 0),
(15, 'abcd', '1234', '', 0),
(16, 'abcde', '12345', '', 0),
(17, 'jidan', '1234', '', 0),
(18, 'asd', 'dsa', '', 0),
(20, '1234', '321', '', 0),
(21, 'wes', '123', 'ztkholil@gmail.com', 9127132);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
