-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2022 pada 02.49
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_kendaraan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `name_customer` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL,
  `name_employee` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `level` enum('admin','employee') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Struktur dari tabel `type_kendaraan`
--

CREATE TABLE `type_kendaraan` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(11) NOT NULL,
  `name_merk` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `name_kendaraan` varchar(100) DEFAULT NULL,
  `transmisi` varchar(10) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `plat` varchar(10) DEFAULT NULL,
  `status` enum('ready','rented','no-available') DEFAULT 'ready',
  `price` int(11) DEFAULT NULL,
  `merk_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `create_at` date DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `kendaraan_id` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `name_supplier` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier_kendaraan`
--

CREATE TABLE `supplier_kendaraan` (
  `kendaraan_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `enter_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `merk_id` (`merk_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD KEY `pemesanan_id` (`pemesanan_id`),
  ADD KEY `kendaraan_id` (`kendaraan_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `supplier_kendaraan`
--
ALTER TABLE `supplier_kendaraan`
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `kendaraan_id` (`kendaraan_id`);

--
-- Indeks untuk tabel `type_kendaraan`
--
ALTER TABLE `type_kendaraan`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `type_kendaraan`
--
ALTER TABLE `type_kendaraan`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`merk_id`) REFERENCES `merk` (`id_merk`),
  ADD CONSTRAINT `kendaraan_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type_kendaraan` (`id_type`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id_employee`);

--
-- Ketidakleluasaan untuk tabel `supplier_kedaraan`
--
ALTER TABLE `supplier_kendaraan`
  ADD CONSTRAINT `supplier_kedaraan_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `supplier_kedaraan_ibfk_2` FOREIGN KEY (`kendaraan_id`) REFERENCES `kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`,`name_customer`, `email`, `phone`, `address`) VALUES
(1,'Koko', 'koko@email.com', '08912333411', 'jl.kembang'),
(2,'Andi', 'andi@email.com', '08112333189', 'jl.himalama'),
(3,'Nanda', 'nanda@email.com', '08599124818', 'jl.koala');

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`id_employee`, `name_employee`, `username`, `password`, `phone`, `level`) VALUES
(1, 'fayi', 'fayi', '123', '890','admin'),
(2, 'koko', 'koko', '123', '890','employee');

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`name_merk`) VALUES
('BMW'),('TOYOTA'),('NISSAN'),('HYUNDAI'),('HONDA'),
('FORD'),('CHEVROLET'),('CHRYSLER'),('LANCIA'),('MITSUBISHI'),
('SUZUKI'),('SUBARU'),('MAZDA'),('JEEP'),('MERCEDES');

--
-- Dumping data untuk tabel `type_kendaraan`
--

INSERT INTO `type_kendaraan` (`name_type`) VALUES
('MOBIL'),('SEPEDA MOTOR');

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan`
(`merk_id`,`type_id`,`name_kendaraan`, `transmisi`, `color`, `plat`, `price`)
VALUES
('1','1','BMW M3','Manual','Black','L 1233 RP','410000'),
('2','1','TOYOTA SUPRA MK4','Manual','White','L 1251 T','400000'),
('3','1','NISSAN GT-R','Manual','White','L 1434 A','420000'),
('4','1','Hyundai Creta','Automatic','White','L 1134 B','260000'),
('4','1','Hyundai IONIQ 5','Automatic','White','L 11 B','460000'),
('5','1','HONDA CRV','Manual','White','L 4241 C','300000'),
('6','1','FORD FUSION','Automatic','White','L 1223 D','360000'),
('6','1','FORD MUSTANG MACH-E','Automatic','White','L 8221 D','260000');


--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan`
(`customer_id`,`employee_id`,`create_at`,`order_date`, `return_date`, `duration`)
VALUES
('1','1','2020-01-01','2020-01-01','2020-01-05','5'),
('2','1','2018-01-04','2018-01-04','2018-01-08','4');

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan`
(`pemesanan_id`,`kendaraan_id`,`total_price`)
VALUES
('1','5','2300000'),('2','2','1600000');


--
-- Dumping data untuk tabel `supplier`
--
INSERT INTO `supplier` 
(`name_supplier`, `email`, `phone`, `address`) 
VALUES
('Cera', 'cera@email.com', '810123889', 'jl.a'),
('Lamp', 'lamp@email.com', '820232311', 'jl.b'),
('Osac', 'osac@email.com', '830001111', 'jl.c');

--
-- Dumping data untuk tabel `supplier_kedaraan`
--
INSERT INTO `supplier_kendaraan`
(`kendaraan_id`,`supplier_id`,`enter_at`)
VALUES
('1','1','2020-01-01'),('2','1','2020-01-12'),
('3','2','2020-01-12'),('4','3','2020-01-11'),
('5','3','2020-01-23'),('6','2','2020-01-23'),
('7','2','2020-01-11'),('8','1','2020-01-12');