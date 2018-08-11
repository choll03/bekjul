-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jul 2018 pada 10.06
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `no_tagihan_booking` varchar(20) NOT NULL,
  `nama_pemboking` varchar(50) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `orang` int(5) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `dp` int(10) NOT NULL DEFAULT '0',
  `pesanan_khusus` text,
  `status_booking` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `no_tagihan_booking`, `nama_pemboking`, `jenis`, `orang`, `tanggal`, `jam`, `dp`, `pesanan_khusus`, `status_booking`) VALUES
(39, 'BK0715002', 'choll03', 'small', 2, '07/15/2018', '02 : 21 : PM', 10000, '', 'selesai'),
(40, 'BK0715003', 'choll03', 'medium', 4, '07/15/2018', '03 : 01 : PM', 20000, '', 'menunggu konfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_upload`
--

CREATE TABLE `image_upload` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image_upload`
--

INSERT INTO `image_upload` (`id`, `item_id`, `file_name`, `path`) VALUES
(7, 4, 'cc64553241258eaad579d26844703f41.JPG', './upload-foto/cc64553241258eaad579d26844703f41.JPG'),
(8, 3, '11e7cc941e71b3954e59f6c75220e7d5.jpg', './upload-foto/11e7cc941e71b3954e59f6c75220e7d5.jpg'),
(9, 5, '48af0d9d6bf201a3a082a9c827d85b13.png', './upload-foto/48af0d9d6bf201a3a082a9c827d85b13.png'),
(10, 6, '9d051d1fd947946c859912799016f372.png', './upload-foto/9d051d1fd947946c859912799016f372.png'),
(11, 7, '5e358573a757e5f813042209f57f07bf.jpg', './upload-foto/5e358573a757e5f813042209f57f07bf.jpg'),
(12, 8, 'e43344b0f756658f2f8a1e2552e81b69.png', './upload-foto/e43344b0f756658f2f8a1e2552e81b69.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) NOT NULL,
  `no_tagihan` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `total` int(15) NOT NULL,
  `pengirim` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `no_tagihan`, `username`, `date`, `total`, `pengirim`, `alamat`, `status`) VALUES
(21, '8DM4F9', 'choll03', '2018-07-14 09:03:26', 58000, 'Kiki', 'kp. karang Asem', 'selesai'),
(22, '72E48X', 'kiki', '2018-07-14 11:23:50', 20000, 'Kiki', 'kp. arab', 'proses pengiriman'),
(23, 'X0JR2T', 'kiki', '2018-07-14 14:24:58', 54000, 'Kiki', 'kp. swalayan rt9', 'proses pengiriman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(30) NOT NULL,
  `diskon` int(3) NOT NULL DEFAULT '0',
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `nama`, `harga`, `diskon`, `kategori`) VALUES
(3, 'Nasi goreng', 12000, 0, 'makanan'),
(4, 'bubur ayam', 10000, 0, 'makanan'),
(5, 'Ayam Penyet', 14000, 0, 'makanan'),
(6, 'soto', 9000, 0, 'makanan'),
(7, 'mie ayam', 10000, 0, 'makanan'),
(8, 'es coffee', 19000, 0, 'minuman'),
(9, 'es teh manis', 3000, 0, 'minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `send_to` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `send_to`, `title`, `msg`, `status`) VALUES
(68, 'admin', 'admin/booking', 'choll03 booking tempat ', 1),
(69, 'admin', 'admin/booking', 'choll03 booking tempat ', 1),
(70, 'choll03', 'bookingan', 'bookingan anda telah di konfirm', 1),
(71, 'admin', 'admin/booking', 'choll03 booking tempat ', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `invoice_id` int(10) NOT NULL,
  `item_id` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `invoice_id`, `item_id`, `qty`, `total`, `status`) VALUES
(35, 21, 8, 2, 38000, ''),
(36, 21, 7, 2, 20000, ''),
(37, 22, 7, 2, 20000, ''),
(38, 23, 6, 5, 45000, ''),
(39, 23, 9, 3, 9000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `phone`, `level`) VALUES
(1, 'member@member.com', '1234', 'member', '0899880010', 'member'),
(2, 'admin@admin.com', '1234', 'admin', '0219989009', 'admin'),
(3, 'con@col.com', 'dengan147', 'choll03', '0898709980', 'member'),
(4, 'tes@tes.com', '1234', 'kiki', '0884990', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_upload`
--
ALTER TABLE `image_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `image_upload`
--
ALTER TABLE `image_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
