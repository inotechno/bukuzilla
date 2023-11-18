-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2021 pada 11.59
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukuzilla`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `no_akun` varchar(5) NOT NULL,
  `sub_no_akun` varchar(5) DEFAULT NULL,
  `level_akun` int(11) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `saldo_awal` bigint(20) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status_akun` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `no_akun`, `sub_no_akun`, `level_akun`, `nama_akun`, `saldo_awal`, `created_by`, `created_at`, `status_akun`) VALUES
(1, '1000', '', 1, 'AKTIVA', 0, 1, '2021-08-10 23:28:16', 'T'),
(2, '1100', '', 2, 'AKTIVA LANCAR', 0, 1, '2021-08-10 23:28:16', 'T'),
(3, '1110', '', 3, 'KAS', 0, 1, '2021-08-10 23:28:16', 'T'),
(4, '1110', '0001', 4, 'KAS BESAR', 10000000, 1, '2021-08-10 23:28:16', 'Y'),
(5, '1110', '0002', 4, 'KAS KECIL', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(6, '1111', '', 3, 'BANK', 0, 1, '2021-08-10 23:28:16', 'T'),
(7, '1111', '0001', 4, 'BANK BCA AC 2183832328', 10000000, 1, '2021-08-10 23:28:16', 'Y'),
(8, '1111', '0002', 4, 'BANK BRI GIRO 008401003733307 ', 10000000, 1, '2021-08-10 23:28:16', 'Y'),
(9, '1111', '0003', 4, 'MANDIRI 163.00.7700055.5 ', 10000000, 1, '2021-08-10 23:28:16', 'Y'),
(10, '1111', '0004', 4, 'BANK DANAMON GIRO 8800162367', 10000000, 1, '2021-08-10 23:28:16', 'Y'),
(11, '1111', '0005', 4, 'BANK INTRANSIT', 1000000, 1, '2021-08-10 23:28:16', 'Y'),
(12, '1112', '', 3, 'PIUTANG', 0, 1, '2021-08-10 23:28:16', 'T'),
(13, '1112', '0001', 4, 'PIUTANG GIRO', 1000000, 1, '2021-08-10 23:28:16', 'Y'),
(14, '1112', '0002', 4, 'PIUTANG DAGANG', 15000000, 1, '2021-08-10 23:28:16', 'Y'),
(15, '1112', '0003', 4, 'PIUTANG KARYAWAN', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(16, '1112', '0004', 4, 'PIUT CLAIM', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(17, '1112', '0005', 5, 'PIUT CLAIM STD ULI', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(18, '1112', '0006', 4, 'PIUTANG LAIN-LAIN', 0, 1, '2021-08-10 23:28:16', 'Y'),
(19, '1112', '0007', 5, 'PLL TKL', 0, 1, '2021-08-10 23:28:16', 'Y'),
(20, '1112', '0008', 5, 'PLL SEMENTARA', 0, 1, '2021-08-10 23:28:16', 'Y'),
(21, '1112', '0009', 5, 'PIUT KAS KURANG/LEBIH SETOR', 500000, 1, '2021-08-10 23:28:16', 'Y'),
(22, '1113', '', 3, 'PERSEDIAAN BARANG DAGANG', 0, 1, '2021-08-10 23:28:16', 'T'),
(23, '1113', '0001', 4, 'PERSED ULI/MIX', 1000000, 1, '2021-08-10 23:28:16', 'Y'),
(24, '1113', '0002', 4, 'PERSED SPAREPART', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(25, '1113', '0003', 4, 'PERSED OLI', 1000000, 1, '2021-08-10 23:28:16', 'Y'),
(26, '1114', '', 3, 'BIAYA BAYAR DI MUKA', 0, 1, '2021-08-10 23:28:16', 'T'),
(27, '1114', '0001', 4, 'ASURANSI BAYAR DI MUKA', 0, 1, '2021-08-10 23:28:16', 'Y'),
(28, '1114', '0002', 4, 'UANG MUKA', 0, 1, '2021-08-10 23:28:16', 'Y'),
(29, '1115', '', 3, 'PAJAK', 0, 1, '2021-08-10 23:28:16', 'T'),
(30, '1115', '0001', 4, 'PPH 21', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(31, '1115', '0002', 4, 'PPH 23', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(32, '1115', '0003', 4, 'PPH 25', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(33, '1115', '0004', 4, 'PPN MASUKAN', 5000000, 1, '2021-08-10 23:28:16', 'Y'),
(34, '1200', '', 2, 'AKTIVA TETAP', 0, 1, '2021-08-10 23:28:16', 'T'),
(35, '1210', '', 3, 'TANAH', 0, 1, '2021-08-10 23:28:16', 'Y'),
(36, '1220', '', 3, 'BANGUNAN', 0, 1, '2021-08-10 23:28:16', 'T'),
(37, '1220', '0001', 4, 'GEDUNG KANTOR', 50000000, 1, '2021-08-10 23:28:16', 'Y'),
(38, '1220', '0002', 4, 'GUDANG', 50000000, 1, '2021-08-10 23:28:16', 'Y'),
(39, '1220', '0003', 4, 'MESS KARYAWAN', 20000000, 1, '2021-08-10 23:28:16', 'Y'),
(40, '1220', '0004', 4, 'GUDANG BARU', 50000000, 1, '2021-08-10 23:28:16', 'Y'),
(41, '1230', '', 3, 'KENDARAAN', 30000000, 1, '2021-08-10 23:28:16', 'Y'),
(42, '1240', '', 3, 'INVENTARIS KANTOR', 20000000, 1, '2021-08-10 23:28:16', 'Y'),
(43, '4000', '', 1, 'PENDAPATAN', 0, 1, '2021-08-10 23:28:16', 'T'),
(44, '4000', '0001', 2, 'PENJUALAN', 500000, 1, '2021-08-10 23:28:16', 'Y'),
(45, '4000', '0002', 2, 'RETUR PENJUALAN', 0, 1, '2021-08-10 23:28:16', 'Y'),
(46, '4000', '0003', 2, 'POT PENJUALAN', 0, 1, '2021-08-10 23:28:16', 'Y'),
(47, '5000', '', 1, 'BIAYA OPERASIONAL', 0, 1, '2021-08-10 23:28:16', 'T'),
(48, '5100', '', 2, 'BIAYA PENJUALAN TEAM', 0, 1, '2021-08-10 23:28:16', 'T'),
(49, '5101', '', 3, 'BY PRESTASI / SALESMAN', 0, 1, '2021-08-10 23:28:16', 'Y'),
(50, '5102', '', 3, 'BY TRAINING', 0, 1, '2021-08-10 23:28:16', 'Y'),
(51, '5103', '', 3, 'BY MAKAN', 0, 1, '2021-08-10 23:28:16', 'Y'),
(52, '5104', '', 3, 'BY BBM.TOL.PARKIR OPERASIONAL', 0, 1, '2021-08-10 23:28:16', 'T'),
(53, '5104', '0001', 4, 'BY BBM AHMAD FATONI', 0, 1, '2021-08-10 23:28:16', 'Y'),
(54, '5104', '0002', 5, 'BY PARKIR AHMAD FATONI', 0, 1, '2021-08-10 23:28:16', 'Y'),
(55, '5104', '0003', 5, 'BY TOL AHMAD FATONI', 0, 1, '2021-08-10 23:28:16', 'Y'),
(56, '5200', '', 2, 'BIAYA ADM DAN UMUM', 0, 1, '2021-08-10 23:28:16', 'T'),
(57, '5201', '', 3, 'BY TENAGA KERJA DAN ADM', 0, 1, '2021-08-10 23:28:16', 'T'),
(58, '5201', '0001', 4, 'BY GAJI', 0, 1, '2021-08-10 23:28:16', 'Y'),
(59, '5201', '0002', 4, 'BY THR', 0, 1, '2021-08-10 23:28:16', 'Y'),
(60, '5201', '0003', 4, 'BY TUNJANGAN', 0, 1, '2021-08-10 23:28:16', 'Y'),
(61, '5201', '0004', 4, 'BY PESANGON', 0, 1, '2021-08-10 23:28:16', 'Y'),
(62, '5202', '', 3, 'BY LEMBUR KARYAWAN', 0, 1, '2021-08-10 23:28:16', 'Y'),
(63, '5203', '', 3, 'BY PERALATAN/PERLENGKAPAN', 0, 1, '2021-08-10 23:28:16', 'T'),
(64, '5203', '0001', 4, 'BY PERALATAN KANTOR', 0, 1, '2021-08-10 23:28:16', 'Y'),
(65, '5203', '0002', 4, 'BY ATK', 0, 1, '2021-08-10 23:28:16', 'Y'),
(66, '5203', '0003', 4, 'BY MATERAI', 0, 1, '2021-08-10 23:28:16', 'Y'),
(67, '5204', '', 3, 'BY LISTRIK / TELEPON / AIR / INTERNET', 0, 1, '2021-08-10 23:28:16', 'T'),
(68, '5204', '0001', 4, 'BY LISTRIK', 0, 1, '2021-08-10 23:28:16', 'Y'),
(69, '5204', '0002', 4, 'BY TELEPON', 0, 1, '2021-08-10 23:28:16', 'Y'),
(70, '5204', '0003', 4, 'BY AIR', 0, 1, '2021-08-10 23:28:16', 'Y'),
(71, '5204', '0004', 4, 'BY INTERNET', 0, 1, '2021-08-10 23:28:16', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `no_voucher` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `tgl_voucher` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `no_voucher`, `description`, `tgl_voucher`, `created_by`, `created_at`) VALUES
(11, 'TK/08/001', 'PENJUALAN', '2021-08-01', 1, '2021-08-07 00:38:36'),
(12, 'KK/01/001', 'BY LISTRIK', '2021-08-08', 1, '2021-08-07 00:41:03'),
(13, 'KK/08/001', 'TAMBAH KAS KECIL', '2021-08-08', 1, '2021-08-10 05:52:17'),
(14, 'TK/02/2021', 'SAFRI', '2021-09-01', 1, '2021-09-01 08:36:55'),
(15, 'TKR/02/12', 'ASDAS', '2021-09-07', 1, '2021-09-01 08:53:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `sub_menu` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL DEFAULT 'text-primary'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `link`, `level`, `sub_menu`, `icon`, `color`) VALUES
(1, 'Company Profile', 'companyprofile', 1, 0, 'settings-gear-65', 'text-success'),
(2, 'Daftar Users', 'Users', 1, 0, 'circle-08', 'text-warning'),
(3, 'Master Account', 'account', 1, 0, 'map-big', 'text-info'),
(4, 'Saldo Awal', 'saldoAwal', 1, 0, 'money-coins', 'text-danger'),
(5, 'Transaksi Jurnal', 'transaksijurnal', 1, 0, 'collection', 'text-warning'),
(6, 'Inquiry Ledger', 'InquiryLedger', 1, 0, 'single-copy-04', 'text-warning'),
(7, 'Periksa Transaksi', 'PeriksaTransaksi', 1, 0, 'sound-wave', 'text-success'),
(8, 'Posting Transaksi', 'PostingTransaksi', 1, 0, 'send', 'text-info'),
(9, 'Laporan', '', 1, 0, 'single-copy-04', 'text-warning'),
(10, 'Laporan Rugi Laba', 'LaporanRugiLaba', 1, 9, 'map-big', 'text-secondary'),
(11, 'Laporan Neraca', 'LaporanNeraca', 1, 9, 'map-big', 'text-secondary'),
(12, 'Laporan BukuBesar', 'LaporanBukuBesar', 1, 9, 'map-big', 'text-secondary'),
(100, 'Company Profile', 'companyprofile', 2, 0, 'settings-gear-65', 'text-success'),
(101, 'Transaksi Jurnal', 'transaksijurnal', 2, 0, 'collection', 'text-warning'),
(102, 'Inquiry Ledger', 'InquiryLedger', 2, 0, 'single-copy-04', 'text-warning'),
(200, 'Company Profile', 'companyprofile', 3, 0, 'settings-gear-65', 'text-success'),
(201, 'Laporan', '', 3, 0, 'single-copy-04', 'text-warning'),
(202, 'Laporan Rugi Laba', 'LaporanRugiLaba', 3, 9, 'map-big', 'text-secondary'),
(203, 'Laporan Neraca', 'LaporanNeraca', 3, 9, 'map-big', 'text-secondary'),
(204, 'Laporan BukuBesar', 'LaporanBukuBesar', 3, 9, 'map-big', 'text-secondary');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `jenis_perusahaan` varchar(50) NOT NULL,
  `nama_direktur` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(10) NOT NULL,
  `logo` text NOT NULL,
  `alamat` text NOT NULL,
  `tgl_pendirian` date NOT NULL,
  `jumlah_karyawan` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `nama_perusahaan`, `jenis_perusahaan`, `nama_direktur`, `email`, `telepon`, `logo`, `alamat`, `tgl_pendirian`, `jumlah_karyawan`, `status`, `created_at`, `update_at`) VALUES
(1, 'PT. Fajar Pangan Lestari', 'Distributor Unilever', 'Tantyo Nugroho', 'ptfpl@ymail.com', '02549085', 'logo-perusahaan.png', 'Jl. Raya Cilegon Km. 03 Kec. Taktakan Kel. Drangong\r\n', '2021-01-13', 50, 'Swasta', '2020-12-27 14:32:25', '2021-08-16 19:19:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_jurnal`
--

CREATE TABLE `transaksi_jurnal` (
  `trx_id` int(11) NOT NULL,
  `trx_id_jurnal` int(11) NOT NULL,
  `trx_id_account` int(11) NOT NULL,
  `trx_debit` bigint(20) NOT NULL,
  `trx_kredit` bigint(20) NOT NULL,
  `trx_description` text NOT NULL,
  `posting_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_jurnal`
--

INSERT INTO `transaksi_jurnal` (`trx_id`, `trx_id_jurnal`, `trx_id_account`, `trx_debit`, `trx_kredit`, `trx_description`, `posting_at`) VALUES
(16, 11, 4, 50000, 0, 'SAFRI', '2021-09-02 13:28:18'),
(17, 11, 44, 0, 100000, 'SAFRI 01/08', '2021-09-02 13:28:18'),
(18, 12, 68, 360000, 0, 'BY LISTRIK AGUSTUS', '2021-09-02 13:28:18'),
(20, 12, 4, 0, 360000, 'BY LISTRIK AGUSTUS', '2021-09-02 13:28:18'),
(21, 11, 45, 50000, 0, 'RETUR SAFRI 01/08', '2021-09-02 13:28:18'),
(23, 14, 4, 100000, 0, 'CICILAN', '2021-09-02 13:28:18'),
(24, 14, 5, 0, 100000, 'SASD', '2021-09-02 13:28:18'),
(25, 15, 14, 0, 10000, 'ASDA', '2021-09-02 13:28:18'),
(26, 15, 4, 10000, 0, 'ASD', '2021-09-02 13:28:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cookie` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `foto`, `level`, `status`, `cookie`, `created_at`) VALUES
(1, 'admin', 'a67914b3c95e94116c0d3aaebd389abce91fe7bb7fb10b7e6406030b9f5d4f8669a08c7c7c944e75eafa3af22dd6dc648cad73989ee3df4a022dad9bf8e92a68', 'General Ledger', 'admin.png', 1, 1, '8QL3cSO1EtGboVkZuyU7SWC2OQF93KjvaDeiYrTXyepJYq0ds4tkXGv8BD1jmEL6', '2021-06-01 20:42:15'),
(2, 'staff', '28cc64d18906ba7fa196e9d353c7ff02190b9c56484e71c10a449066f9956d0923b1f81abe1ae542ea50a34fc1c4ba21a48f5c90fdd3c896d80d1e7d6d948e9b', 'Staff', 'staff.png', 2, 1, 'J6wUw3MmpFiey0QYfjNCNEGLrIR35WphEauK5iZ6X1xsLv9u1SVBObDcq4l7CK9Q', '2021-08-05 17:01:13'),
(3, 'chief', '39bc12d855383cbba73dc4f4c34d31662d2e1da855739a8a497f8665675234d402c24b902ab9da99db327e0c44f97a051580e8e7874fb0a09bf00419c12a03b0', 'Chief Accounting', 'chief.jpg', 3, 1, NULL, '2021-08-05 17:06:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_group`
--

CREATE TABLE `users_group` (
  `id_group` int(11) NOT NULL,
  `nama_group` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_group`
--

INSERT INTO `users_group` (`id_group`, `nama_group`, `level`) VALUES
(1, 'Administrator', 1),
(2, 'Staff', 2),
(3, 'Chief Accounting', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi_jurnal`
--
ALTER TABLE `transaksi_jurnal`
  ADD PRIMARY KEY (`trx_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id_group`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaksi_jurnal`
--
ALTER TABLE `transaksi_jurnal`
  MODIFY `trx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
