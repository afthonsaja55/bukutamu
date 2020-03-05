-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2020 pada 13.30
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kppn_blitar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id` int(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tgl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bukutamu`
--

INSERT INTO `bukutamu` (`id`, `jam`, `uraian`, `keterangan`, `tgl`) VALUES
(32, '1576469276', 'Kantor KPP Blitar', 'Pengajuan SPM', '2019-12-16'),
(33, '1582777174', 'halo gan', 'seksi anjirr', '2020-02-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(255) NOT NULL,
  `id_lokasi` varchar(255) NOT NULL,
  `id_jam` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `tgl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `id_lokasi`, `id_jam`, `kondisi`, `tgl`) VALUES
(34, 'Gedung I', '22.00', 'Aman', '2020-01-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_jam`
--

CREATE TABLE `laporan_jam` (
  `id` int(255) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_jam`
--

INSERT INTO `laporan_jam` (`id`, `jam`) VALUES
(8, '02.00'),
(9, '06.00'),
(10, '10.00'),
(11, '14.00'),
(12, '18.00'),
(13, '22.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_lokasi`
--

CREATE TABLE `laporan_lokasi` (
  `id` int(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_lokasi`
--

INSERT INTO `laporan_lokasi` (`id`, `lokasi`) VALUES
(1, 'Gedung I'),
(2, 'Gedung II'),
(3, 'Ruang Server'),
(4, 'Lingkungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_pegawai`
--

CREATE TABLE `laporan_pegawai` (
  `id` int(255) NOT NULL,
  `id_peg` varchar(255) NOT NULL,
  `id_peg1` varchar(255) NOT NULL,
  `id_peg2` varchar(255) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan_pegawai`
--

INSERT INTO `laporan_pegawai` (`id`, `id_peg`, `id_peg1`, `id_peg2`, `tgl`, `waktu`) VALUES
(18, 'Sutrisno', 'Yuri Gagarin Jaya', 'Agung', '2019-12-16', '1576469360'),
(19, 'Sutrisno', 'Puji Hartanto', 'Yuri Gagarin Jaya', '2020-01-25', '1579966732');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(255) NOT NULL,
  `nama_peg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_peg`) VALUES
(1, 'Sutrisno'),
(3, 'Puji Hartanto'),
(4, 'Yuri Gagarin Jaya'),
(5, 'Syaifudin'),
(6, 'Sumantri'),
(7, 'Supriyanto'),
(8, 'Agung'),
(9, 'Suryanto'),
(10, 'Sudarwoko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'M. Nofa Fika Afthon', 'mnofafikaafthon55@gmail.com', 'afthon.jpg', '$2y$10$GL39Pva8LzVUzbyXfbMC0e03ps33E1raMf9sZsiTK7VGCtzommSIS', 1, 1, 1554641305),
(2, 'admin kppn blitar', 'admin@kppnblitar.com', 'logokppn.png', '$2y$10$tPvSoQwDBzo6u1NWgEykiOpue5vzzJiHcIOufjnGWEqy3p4w7JgwO', 2, 1, 1565930242),
(4, 'Testing', 'testing@kppnblitar.com', 'default.jpg', '$2y$10$u/1prjPiy3xyboBaX3BZQe6eo1Rv8JmaxcOy.hGA8Rth1aQ3vtcv2', 5, 1, 1570720938);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 2, 4),
(10, 1, 5),
(11, 2, 5),
(12, 1, 6),
(14, 2, 6),
(15, 5, 2),
(16, 5, 6),
(17, 1, 8),
(18, 1, 9),
(19, 2, 8),
(20, 2, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User\r\n'),
(3, 'Menu'),
(4, 'Laporan'),
(5, 'Pegawai'),
(6, 'Print Laporan'),
(8, 'Waktu & Tempat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Moderator'),
(2, 'Admin'),
(5, 'Member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fa fa-tachometer', 1),
(2, 2, 'Profil Saya', 'user', 'fa fa-user', 1),
(3, 2, 'Ubah Profil', 'user/edit', 'fa  fa-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fa fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fa fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fa fa-user-secret', 1),
(7, 2, 'Ubah Password', 'user/changepassword', 'fa fa-key', 1),
(9, 1, 'Tambah User', 'admin/tambahuser', 'fa fa-user-plus', 1),
(10, 4, 'Laporan Bukutamu', 'laporan', 'fa fa-address-book', 1),
(11, 4, 'Laporan Security', 'laporan/security', 'fa fa-file-archive-o', 1),
(12, 5, 'Tambah Pegawai', 'pegawai', 'fa fa-users', 1),
(13, 5, 'Tambah Jadwal Pegawai', 'pegawai/tambah', 'fa  fa-calendar-o', 1),
(14, 6, 'Data Laporan', 'printdata/index', 'fa fa-file-pdf-o', 1),
(16, 8, 'Tambah Waktu', 'waktu', 'fa fa-clock-o', 1),
(17, 8, 'Tambah Tempat', 'waktu/tempat', 'fa fa-building-o', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_jam`
--
ALTER TABLE `laporan_jam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_lokasi`
--
ALTER TABLE `laporan_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_pegawai`
--
ALTER TABLE `laporan_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `laporan_jam`
--
ALTER TABLE `laporan_jam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `laporan_lokasi`
--
ALTER TABLE `laporan_lokasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `laporan_pegawai`
--
ALTER TABLE `laporan_pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
