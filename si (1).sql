-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Mar 2023 pada 16.29
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_a` int(5) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama_admin` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_a`, `nik`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, '1', 'eca', '1', 'c20ad4d76fe97759aa27a0c99bff6710', 'admin'),
(2, '1', 'eca', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pelayanan`
--

CREATE TABLE `jenis_pelayanan` (
  `id_jenis` int(5) NOT NULL,
  `nama_pelayanan` varchar(30) NOT NULL,
  `syarat1` varchar(30) NOT NULL,
  `syarat2` varchar(30) NOT NULL,
  `syarat3` varchar(30) NOT NULL,
  `syarat4` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pelayanan`
--

INSERT INTO `jenis_pelayanan` (`id_jenis`, `nama_pelayanan`, `syarat1`, `syarat2`, `syarat3`, `syarat4`) VALUES
(1, 'Surat Keterangan Tidak Mampu', 'Photocopy KK', 'Photocopy KTP ', '', ''),
(2, 'Surat Pengantar Gaji', 'FC KK', 'FC KTP', 'FC KIS', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_keluarga`
--

CREATE TABLE `kartu_keluarga` (
  `id_kk` int(5) NOT NULL,
  `no_kk` char(16) NOT NULL,
  `alamat` text NOT NULL,
  `rt_rw` varchar(10) NOT NULL,
  `desa_kelurahan` varchar(25) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten_kota` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kartu_keluarga`
--

INSERT INTO `kartu_keluarga` (`id_kk`, `no_kk`, `alamat`, `rt_rw`, `desa_kelurahan`, `kecamatan`, `kabupaten_kota`, `provinsi`) VALUES
(1, '1871567835478988', 'Jl. Hi. Agus Salim No 145', '001/012', 'Kaliawi ', 'Tanjung Karang Pusat', 'Bandar Lampung', 'Lampung'),
(3, '1871567835478993', 'Jl. Soemantri Brojonegoro No 10', '005/001', 'Rajabasa Utama', 'Rajabasa', 'Bandar Lampung', 'Lampung'),
(4, '1809010075315726', 'Jl Perwira, No 16', '007/012', 'Negeri Sakti', 'Gedong Tataan', 'Pesawaran', 'Lampung`'),
(5, '1809011145137856', 'Jl. Niti Hukum, No 154', '008/010', 'Beringin Raya', 'Tanjung Karang Barat', 'Bandar Lampung', 'Lampung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_m` int(5) NOT NULL,
  `kk_id` int(5) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Kristen','Buddha','Hindu','Konghucu') NOT NULL,
  `pekerjaan` enum('TNI/POLRI','PNS','Guru','Pedagang','Wiraswasta/Pegawai Swasta','Ibu Rumah Tangga','Tidak Bekerja','Pelajar/Mahasiswa') NOT NULL,
  `status` enum('Menikah','Belum Menikah','Cerai Mati','Cerai Hidup') NOT NULL,
  `kedudukan` enum('Kepala Keluarga','Istri','Anak','Keluarga Lain') NOT NULL,
  `level` enum('masyarakat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_m`, `kk_id`, `nik`, `nama`, `password`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pekerjaan`, `status`, `kedudukan`, `level`) VALUES
(3, 4, '1809012546317849', 'Nesya Anita Putri', '202cb962ac59075b964b07152d234b70', 'Bandar Lampung', '2002-01-03', 'Perempuan', 'Islam', 'Pelajar/Mahasiswa', 'Belum Menikah', 'Anak', 'masyarakat'),
(6, 5, '1809002406010004', 'Faris Ubad Alfharuq', '73278a4a86960eeb576a8fd4c9ec6997', 'Bandar Lampung', '2001-06-21', 'Laki-Laki', 'Islam', 'Wiraswasta/Pegawai Swasta', 'Belum Menikah', 'Kepala Keluarga', 'masyarakat'),
(7, 4, '1809012445721367', 'Wahyu Tiono', '55b9f96736cb23e0188fac3b1c30f397', 'Sukarame', '2000-02-10', 'Laki-Laki', 'Kristen', 'Pedagang', 'Menikah', 'Anak', 'masyarakat'),
(8, 1, '1871564546913542', 'Gusti Ayu Dewi Lestari', '25f9e794323b453885f5181f1b624d0b', 'Raman Utara', '2000-10-05', 'Perempuan', 'Buddha', 'Ibu Rumah Tangga', 'Menikah', 'Istri', 'masyarakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(5) NOT NULL,
  `jenis_id` int(5) NOT NULL,
  `a_id` int(5) NOT NULL,
  `m_id` int(5) NOT NULL,
  `tanggal_pelayanan` date NOT NULL,
  `status_p` enum('Ditolak','Diproses','Telah di Upload') NOT NULL,
  `file` varchar(200) NOT NULL,
  `syarat` varchar(200) NOT NULL,
  `balasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelayanan`
--

INSERT INTO `pelayanan` (`id_pelayanan`, `jenis_id`, `a_id`, `m_id`, `tanggal_pelayanan`, `status_p`, `file`, `syarat`, `balasan`) VALUES
(1, 1, 1, 3, '2023-03-11', 'Telah di Upload', 'Bab-5_OK10.pdf', 'afdf', 'fdfdfd'),
(2, 1, 1, 6, '2023-03-11', 'Ditolak', '', 'Yayasan_Dharma_Wacana_(PKDW)_Yayasan_Dharma_Wacana_(PKDW)_Notifikasi_Invoice_1610772452.pdf', 'ai kepo ya anda ini'),
(3, 2, 1, 6, '2023-03-11', 'Ditolak', '', 'FORM_II-11_Pengajuan_Tema_dari_mahasiswa-Nesya_Anita_Putri.pdf', 'kepo'),
(4, 1, 1, 3, '2023-03-11', 'Ditolak', '', 'Bab-5_OK101.pdf', 'kamu nanyea');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_a`);

--
-- Indeks untuk tabel `jenis_pelayanan`
--
ALTER TABLE `jenis_pelayanan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `kk` (`kk_id`);

--
-- Indeks untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`),
  ADD KEY `admin` (`a_id`),
  ADD KEY `masyarakat` (`m_id`),
  ADD KEY `jenis` (`jenis_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_a` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jenis_pelayanan`
--
ALTER TABLE `jenis_pelayanan`
  MODIFY `id_jenis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kartu_keluarga`
--
ALTER TABLE `kartu_keluarga`
  MODIFY `id_kk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_m` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `kk` FOREIGN KEY (`kk_id`) REFERENCES `kartu_keluarga` (`id_kk`);

--
-- Ketidakleluasaan untuk tabel `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `aaddd` FOREIGN KEY (`a_id`) REFERENCES `admin` (`id_a`),
  ADD CONSTRAINT `jennis` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_pelayanan` (`id_jenis`),
  ADD CONSTRAINT `masss` FOREIGN KEY (`m_id`) REFERENCES `masyarakat` (`id_m`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
