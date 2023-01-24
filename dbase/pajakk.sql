-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 13 Sep 2022 pada 23.39
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajakk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `kode` int(11) NOT NULL,
  `bidang` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`kode`, `bidang`) VALUES
(1, 'Kepala'),
(2, 'Sekretariat'),
(3, 'Bidang Pendaftaran'),
(4, 'Bidang Penetapan'),
(5, 'Bidang Penagihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fiskal`
--

CREATE TABLE `fiskal` (
  `nomorfiskal` varchar(50) NOT NULL,
  `namapemilik` varchar(100) DEFAULT NULL,
  `namausaha` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `npwp` varchar(25) DEFAULT NULL,
  `jenisusaha` varchar(100) DEFAULT NULL,
  `tanggalawal` date DEFAULT NULL,
  `tanggalakhir` date DEFAULT NULL,
  `tanggalcetak` date DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fiskal`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `golr`
--

CREATE TABLE `golr` (
  `gorl` varchar(7) NOT NULL,
  `pangkat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `golr`
--

INSERT INTO `golr` (`gorl`, `pangkat`) VALUES
('HONORER', 'PEGAWAI HONORER'),
('Ia', 'JURU MUDA'),
('Ib', 'JURU MUDA TK.I'),
('Ic', 'JURU'),
('Id', 'JURU TK.I'),
('IIa', 'PENGATUR MUDA'),
('IIb', 'PENGATUR MUDA TK.I'),
('IIc', 'PENGATUR'),
('IId', 'PENGATUR TK.I'),
('IIIa', 'PENATA MUDA'),
('IIIb', 'PENATA MUDA TINGKAT I'),
('IIIc', 'PENATA'),
('IIId', 'PENATA TK.I'),
('IVa', 'PEMBINA'),
('IVb', 'PEMBINA TK.I'),
('IVc', 'PEMBINA UTAMA MUDA'),
('IVd', 'PEMBINA UTAMA MADYA'),
('IVe', 'PEMBINA UTAMA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakakses`
--

CREATE TABLE `hakakses` (
  `akses` varchar(30) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hakakses`
--

INSERT INTO `hakakses` (`akses`, `keterangan`) VALUES
('1', 'superadmin'),
('2', 'admin'),
('3', 'pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `idjabat` int(11) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `ttd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`idjabat`, `jabatan`, `ttd`) VALUES
(1, 'Kepala Badan Pendapatan Daerah', 1),
(2, 'Sekretaris', NULL),
(3, 'Kepala Bidang Pajak', 1),
(4, 'Kepala Bidang Retribusi', 1),
(5, 'Kepala Bidang Penagihan dan Keberatan', 1),
(6, 'Kepala Bidang PBB dan BPHTB', 1),
(7, 'Kepala Seksi Pendaftaran dan Pendataan', NULL),
(8, 'Kepala Seksi Pemeriksaan', NULL),
(9, 'Kepala Seksi Penetapan', NULL),
(10, 'Kepala Seksi Pembukuan dan Pemeriksaan', NULL),
(11, 'Kepala Seksi Pembukuan dan Pelaporan', NULL),
(12, 'Kepala Seksi Penagihan', NULL),
(13, 'Kepala Seksi Keberatan', NULL),
(14, 'Kepala Seksi Pengendalian', NULL),
(15, 'Staf', NULL),
(16, 'Staf Honorer', NULL),
(17, 'Bendahara Penerimaan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `golr` varchar(7) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `bidang` varchar(50) DEFAULT NULL,
  `akses` int(11) DEFAULT NULL,
  `aktif` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `golr`, `jabatan`, `password`, `bidang`, `akses`, `aktif`, `foto`) VALUES
('00000000000000001', 'EKO WINARTO', 'HONORER', 'Staf', '1234567', 'Bidang Pendaftaran', 3, 1, NULL),
('00000000000000002', 'SONY PREDIANSAH', 'HONORER', 'Staf', '123', 'Bidang Penetapan', 2, 1, NULL),
('19691997121001', 'Akin Yogobi', 'IIIc', NULL, '020569', NULL, 3, 1, NULL),
('197112312003121048', 'PETRUS UROPMABIN, S.E.', 'IIIc', 'Kepala Badan Pendapatan Daerah', 'kepala', 'Kepala', 2, 1, NULL),
('197712072003121007', 'Pius singpanki', 'IIIb', NULL, '071277', NULL, 3, 1, NULL),
('197804032008011018', 'marthen Bitibalyo', 'IIIc', 'Kepala Bidang Pajak', 'bitbal', 'Bidang Pendaftaran', 3, 1, 'IMG_20220524_143117.jpg'),
('198012042006051002', 'MERUKOL KALAKMABIN. S.IP', 'IIIc', NULL, '041280', NULL, 3, 1, NULL),
('198112142015071001', 'VICKY ANTONIO PRAYOGA S.T.,M.AK.', 'IIIc', 'Staf', 'slemania', 'Sekretariat', 1, 1, 'IMG_4249.png'),
('198405262006051002', 'Pabean Fredrik Yogi', 'IIb', NULL, '122683', NULL, 3, 1, NULL),
('198411072009091001', 'paulus kogoya', 'IIId', NULL, 'paul', NULL, 3, 1, NULL),
('198503152009091002', 'Mamfred Bidana,Sos', 'IIId', NULL, 'manuel85', NULL, 3, 1, NULL),
('198601112010031004', 'Ringgo Singpanky ', 'IIIb', NULL, 'singpanky86', NULL, 3, 1, NULL),
('198602232011042001', 'Anastasia Bamulki', 'IIIa', NULL, 'anastasiabamulki86ayahogoit', NULL, 3, 1, NULL),
('audit', 'audit', 'IIIa', NULL, 'audit', NULL, 3, NULL, NULL),
('omtoni', 'vicky', 'IIIc', 'Staf', 'tes', 'Bidang Pendaftaran', 3, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemda`
--

CREATE TABLE `pemda` (
  `Nama_Pemda` varchar(255) NOT NULL,
  `ibu_kota` varchar(255) DEFAULT NULL,
  `Bupati` varchar(255) DEFAULT NULL,
  `jbt_kaban` varchar(100) DEFAULT NULL,
  `nama_kaban` varchar(255) DEFAULT NULL,
  `nip_kaban` varchar(25) DEFAULT NULL,
  `gol_kaban` varchar(7) DEFAULT NULL,
  `jbt_kabid` varchar(100) DEFAULT NULL,
  `nama_kabid` varchar(255) DEFAULT NULL,
  `nip_kabid` varchar(25) DEFAULT NULL,
  `gol_kabid` varchar(7) DEFAULT NULL,
  `nama_bend` varchar(255) DEFAULT NULL,
  `nip_bend` varchar(25) DEFAULT NULL,
  `gol_bend` varchar(7) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `system_name` varchar(255) DEFAULT NULL,
  `text_align` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemda`
--

INSERT INTO `pemda` (`Nama_Pemda`, `ibu_kota`, `Bupati`, `jbt_kaban`, `nama_kaban`, `nip_kaban`, `gol_kaban`, `jbt_kabid`, `nama_kabid`, `nip_kabid`, `gol_kabid`, `nama_bend`, `nip_bend`, `gol_bend`, `bank`, `system_name`, `text_align`) VALUES
('KABUPATEN PEGUNUNGAN BINTANG', 'OKSIBIL', 'SPEI YAN BIRDANA', 'KEPALA BADAN PENDAPATAN DAERAH', 'PETRUS UROPMABIN,S.E., M.Ak', '19711231 200312 1 084', 'IIId', 'KEPALA BIDANG PAJAK DAN RETRIBUSI', 'MARTEN BITIBALYO, S.E., M.M.', '19780403 200801 1 018', 'IIId', 'NIKSON SIPKA', '19920606 201704 1 001', 'IIb', 'Bank Papua Kantor Cabang Oksibil', 'SI-PAREDA', 'left-to-right');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `rekap`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `rekap` (
`npwprd` varchar(50)
,`nama` varchar(203)
,`ketetapan` int(11)
,`setoran` decimal(32,0)
,`obyek` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekbank`
--

CREATE TABLE `rekbank` (
  `norek` varchar(255) NOT NULL,
  `nmrek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekbank`
--

INSERT INTO `rekbank` (`norek`, `nmrek`) VALUES
('0018', 'OTSUS'),
('1080106000016', 'RKUD'),
('1080106000042', 'PAD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklo`
--

CREATE TABLE `reklo` (
  `kodeLO` varchar(20) NOT NULL,
  `namaLO` varchar(255) DEFAULT NULL,
  `kodeLRA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklo`
--

INSERT INTO `reklo` (`kodeLO`, `namaLO`, `kodeLRA`) VALUES
('8.1.01.06.01.0001', 'Pajak Hotel/Penginapan/Losmen/Guest House', '4.1.01.06.01.0001'),
('8.1.01.07.02.0001', 'Pajak Rumah Makan dan Sejenisnya', '4.1.01.07.02.0001'),
('8.1.01.10.02.0001', 'Pajak Penerangan Jalan Sumber Lain', '4.1.01.10.02.0001'),
('8.1.02.01.02.0001', 'Retribusi Pelayanan Persampahan/ Kebersihan', '4.1.02.01.02.0001'),
('8.1.02.02.01.0001', 'Retribusi Pemakaian Kekayaan Daerah', '4.1.02.02.01.0001'),
('8.1.02.02.01.0002', 'Pemakaian Rumah Dinas Eselon II', '4.1.02.02.01.0002'),
('8.1.02.02.01.0003', 'Pemakaian Rumah Dinas Eselon III', '4.1.02.02.01.0003'),
('8.1.02.02.01.0004', 'Pemakaian Rumah Dinas Eselon IV', '4.1.02.02.01.0004'),
('8.1.02.02.01.0005', 'Pemakaian Rumah Dinas Staf', '4.1.02.02.01.0005'),
('8.1.04.01.02.0001', 'Hasil Penjualan Peralatan dan Mesin', '4.1.04.01.02.0001'),
('8.1.04.02.03.0001', 'Hasil Selisih Lebih Tukar Menukar Gedung dan Bangunan', '4.1.04.02.03.0001'),
('8.1.04.02.04.0001', 'Hasil Selisih Lebih Tukar Menukar Jalan, Jaringan, dan Irigasi', '4.1.04.02.04.0001'),
('8.1.04.03.05.0001', 'Hasil dari Kerja Sama Penyediaan Infrastruktur', '4.1.04.03.05.0001'),
('8.1.04.04.01.0001', 'Hasil Kerja Sama Daerah', '4.1.04.04.01.0001'),
('8.1.04.05.01.0001', 'Jasa Giro pada Kas Daerah', '4.1.04.05.01.0001'),
('8.1.04.05.02.0001', 'Jasa Giro pada Kas di Bendahara', '4.1.04.05.02.0001'),
('8.1.04.06.01.0001', 'Hasil Pengelolaan Dana Bergulir', '4.1.04.06.01.0001'),
('8.1.04.08.01.0001', 'Tuntutan Ganti Kerugian Daerah terhadap Bendahara', '4.1.04.08.01.0001'),
('8.1.04.09.01.0001', 'Penerimaan Komisi, Potongan, atau Bentuk Lain', '4.1.04.09.01.0001'),
('8.1.04.11.01.0001', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan', '4.1.04.11.01.0001'),
('8.1.04.15.04.0001', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas', '4.1.04.15.04.0001'),
('8.1.04.15.05.0001', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan', '4.1.04.15.03.0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklo1`
--

CREATE TABLE `reklo1` (
  `kode1` varchar(1) NOT NULL,
  `nama1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklo1`
--

INSERT INTO `reklo1` (`kode1`, `nama1`) VALUES
('8', 'PENDAPATAN DAERAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklo2`
--

CREATE TABLE `reklo2` (
  `kode2` varchar(3) NOT NULL,
  `nama2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklo2`
--

INSERT INTO `reklo2` (`kode2`, `nama2`) VALUES
('8.1', 'PENDAPATAN ASLI DAERAH (PAD)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklo3`
--

CREATE TABLE `reklo3` (
  `kode3` varchar(6) NOT NULL,
  `nama3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklo3`
--

INSERT INTO `reklo3` (`kode3`, `nama3`) VALUES
('8.1.01', 'Pajak Daerah'),
('8.1.02', 'Retribusi Daerah'),
('8.1.03', 'Hasil Pengelolaan Kekayaan Daerah yang Sah'),
('8.1.04', 'Lain-lain PAD yang Sah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklo4`
--

CREATE TABLE `reklo4` (
  `kode4` varchar(9) NOT NULL,
  `nama4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklo4`
--

INSERT INTO `reklo4` (`kode4`, `nama4`) VALUES
('8.1.01.06', 'Pajak Hotel'),
('8.1.01.07', 'Pajak Restoran'),
('8.1.01.08', 'Pajak Hiburan'),
('8.1.01.10', 'Pajak Penerangan Jalan'),
('8.1.02.01', 'Retribusi Jasa Umum'),
('8.1.02.02', 'Retribusi Jasa Usaha'),
('8.1.02.03', 'Retribusi Perizinan Tertentu'),
('8.1.03.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Deviden) atas Penyertaan Modal pada BUMN'),
('8.1.03.02', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Deviden) atas Penyertaan Modal pada BUMD'),
('8.1.03.03', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Deviden) atas Penyertaan Modal pada Perusahaan Milik Swasta'),
('8.1.04.01', 'Hasil Penjualan BMD yang Tidak Dipisahkan'),
('8.1.04.02', 'Hasil Selisih Lebih Tukar Menukar BMD yang Tidak Terpisahkan'),
('8.1.04.03', 'Hasil Pemanfaatan BMD yang Tidak Terpisahkan'),
('8.1.04.04', 'Hasil Kerja Sama Daerah'),
('8.1.04.05', 'Jasa Giro'),
('8.1.04.06', 'Hasil Pengelolaan Dana Bergulir'),
('8.1.04.07', 'Pendapatan Bunga'),
('8.1.04.08', 'Penerimaan atas Tuntutan Ganti Kerugian Keuangan Daerah'),
('8.1.04.09', 'Penerimaan Komisi, Potongan atau Bentuk Lain'),
('8.1.04.11', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan'),
('8.1.04.12', 'Pendapatan Denda Pajak Daerah'),
('8.1.04.13', 'Pendapatan Denda Retribusi Daerah'),
('8.1.04.15', 'Pendapatan dari Pengembalian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklo5`
--

CREATE TABLE `reklo5` (
  `kode5` varchar(12) NOT NULL,
  `nama5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklo5`
--

INSERT INTO `reklo5` (`kode5`, `nama5`) VALUES
('8.1.01.06.01', 'Pajak Hotel'),
('8.1.01.07.01', 'Pajak Restoran dan Sejenisnya'),
('8.1.01.07.02', 'Pajak Rumah Makan dan Sejenisnya'),
('8.1.01.08.09', 'Pajak Panti Pijat, Refleksi, Mandi Uap/Spa dan Pusat Kebugaran (Fitness Center)'),
('8.1.01.10.01', 'Pajak Penerangan Jalan Dihasilkan Sendiri'),
('8.1.02.01.02', 'Retribusi Pelayanan Persampahan / Kebersihan'),
('8.1.02.02.01', 'Retribusi Pemakaian Kekayaan Daerah'),
('8.1.04.01.02', 'Hasil Penjualan Peralatan dan Mesin'),
('8.1.04.02.03', 'Hasil Selisih Lebih Tukar Menukar Gedung dan Bangunan'),
('8.1.04.02.04', 'Hasil Selisih Lebih Tukar Menukar Jalan, Jaringan, dan Irigasi'),
('8.1.04.03.05', 'Hasil dari Kerja Sama Penyediaan Infrastruktur'),
('8.1.04.04.01', 'Hasil Kerja Sama Daerah'),
('8.1.04.05.01', 'Jasa Giro pada Kas Daerah'),
('8.1.04.05.02', 'Jasa Giro pada Kas di Bendahara'),
('8.1.04.06.01', 'Hasil Pengelolaan Dana Bergulir'),
('8.1.04.08.01', 'Tuntutan Ganti Kerugian Daerah terhadap Bendahara'),
('8.1.04.09.01', 'Penerimaan Komisi, Potongan, atau Bentuk Lain'),
('8.1.04.11.01', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan'),
('8.1.04.15.03', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan'),
('8.1.04.15.04', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklra`
--

CREATE TABLE `reklra` (
  `kodelra` varchar(20) NOT NULL,
  `namalra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklra`
--

INSERT INTO `reklra` (`kodelra`, `namalra`) VALUES
('1.1.01.01.02.0001', 'Kas di Bendahara Pengeluaran'),
('4.1.01.06.01.0001', 'Pajak Hotel/Penginapan/Losmen/Guest House/Wisma'),
('4.1.01.07.02.0001', 'Pajak Rumah Makan dan Sejenisnya'),
('4.1.01.10.02.0001', 'Pajak Penerangan Jalan Sumber Lain'),
('4.1.02.01.02.0001', 'Retribusi Pelayanan Persampahan/ Kebersihan'),
('4.1.02.02.01.0001', 'Retribusi Penyewaan Tanah dan Bangunan'),
('4.1.02.02.01.0002', 'Pemakaian Rumah Dinas Eselon II'),
('4.1.02.02.01.0003', 'Pemakaian Rumah Dinas Eselon III'),
('4.1.02.02.01.0004', 'Pemakaian Rumah Dinas Eselon IV'),
('4.1.02.02.01.0005', 'Pemakaian Rumah Dinas Staf'),
('4.1.02.02.04.0002', 'Retribusi Pelayanan Penyediaan Tempat Kegiatan Usaha'),
('4.1.02.02.06.0001', 'Retribusi Tempat Penginapan/Pesanggrahan/Vila'),
('4.1.02.03.03.0001', 'Retribusi Izin Trayek untuk Menyediakan Pelayanan Angkutan Umum'),
('4.1.03.01.01.0001', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN'),
('4.1.04.01.02.0001', 'Hasil Penjualan Peralatan dan Mesin'),
('4.1.04.02.03.0001', 'Hasil Selisih Lebih Tukar Menukar Gedung dan Bangunan'),
('4.1.04.02.04.0001', 'Hasil Selisih Lebih Tukar Menukar Jalan, Jaringan, dan Irigasi'),
('4.1.04.03.05.0001', 'Hasil dari Kerja Sama Penyediaan Infrastruktur'),
('4.1.04.04.01.0001', 'Hasil Kerja Sama Daerah'),
('4.1.04.05.01.0001', 'Jasa Giro pada Kas Daerah'),
('4.1.04.05.02.0001', 'Jasa Giro pada Kas di Bendahara'),
('4.1.04.06.01.0001', 'Hasil Pengelolaan Dana Bergulir'),
('4.1.04.07.01.0001', 'Pendapatan Bunga atas Penempatan Uang Pemerintah Daerah'),
('4.1.04.08.01.0001', 'Tuntutan Ganti Kerugian Daerah terhadap Bendahara'),
('4.1.04.09.01.0001', 'Penerimaan Komisi, Potongan, atau Bentuk Lain'),
('4.1.04.11.01.0001', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan'),
('4.1.04.15.03.0001', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan'),
('4.1.04.15.04.0001', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklra1`
--

CREATE TABLE `reklra1` (
  `kode1` varchar(1) NOT NULL,
  `nama1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklra1`
--

INSERT INTO `reklra1` (`kode1`, `nama1`) VALUES
('4', 'PENDAPATAN DAERAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklra2`
--

CREATE TABLE `reklra2` (
  `kode2` varchar(3) NOT NULL,
  `nama2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklra2`
--

INSERT INTO `reklra2` (`kode2`, `nama2`) VALUES
('4.1', 'PENDAPATAN ASLI DAERAH (PAD)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklra3`
--

CREATE TABLE `reklra3` (
  `kode3` varchar(6) NOT NULL,
  `nama3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklra3`
--

INSERT INTO `reklra3` (`kode3`, `nama3`) VALUES
('4.1.01', 'Pajak Daerah'),
('4.1.02', 'Retribusi Daerah'),
('4.1.03', 'Hasil Pengelolaan Kekayaan Daerah yang Sah'),
('4.1.04', 'Lain-lain PAD yang Sah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklra4`
--

CREATE TABLE `reklra4` (
  `kode4` varchar(9) NOT NULL,
  `nama4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklra4`
--

INSERT INTO `reklra4` (`kode4`, `nama4`) VALUES
('4.1.01.06', 'Pajak Hotel'),
('4.1.01.07', 'Pajak Restoran'),
('4.1.01.08', 'Pajak Hiburan'),
('4.1.01.10', 'Pajak Penerangan Jalan'),
('4.1.02.01', 'Retribusi Jasa Umum'),
('4.1.02.02', 'Retribusi Jasa Usaha'),
('4.1.02.03', 'Retribusi Perizinan Tertentu'),
('4.1.03.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Deviden) atas Penyertaan Modal pada BUMN'),
('4.1.03.02', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Deviden) atas Penyertaan Modal pada BUMD'),
('4.1.03.03', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Deviden) atas Penyertaan Modal pada Perusahaan Milik Swasta'),
('4.1.04.01', 'Hasil Penjualan BMD yang Tidak Dipisahkan'),
('4.1.04.02', 'Hasil Selisih Lebih Tukar Menukar BMD yang Tidak Terpisahkan'),
('4.1.04.03', 'Hasil Pemanfaatan BMD yang Tidak Terpisahkan'),
('4.1.04.04', 'Hasil Kerja Sama Daerah'),
('4.1.04.05', 'Jasa Giro'),
('4.1.04.06', 'Hasil Pengelolaan Dana Bergulir'),
('4.1.04.07', 'Pendapatan Bunga'),
('4.1.04.08', 'Penerimaan atas Tuntutan Ganti Kerugian Keuangan Daerah'),
('4.1.04.09', 'Penerimaan Komisi, Potongan atau Bentuk Lain'),
('4.1.04.11', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan'),
('4.1.04.12', 'Pendapatan Denda Pajak Daerah'),
('4.1.04.13', 'Pendapatan Denda Retribusi Daerah'),
('4.1.04.15', 'Pendapatan dari Pengembalian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklra5`
--

CREATE TABLE `reklra5` (
  `kode5` varchar(12) NOT NULL,
  `nama5` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reklra5`
--

INSERT INTO `reklra5` (`kode5`, `nama5`) VALUES
('4.01.02.02', 'Retribusi Tempat Penginapan/Pesanggrahan/Vila'),
('4.1.01.06.01', 'Pajak Hotel'),
('4.1.01.07.01', 'Pajak Restoran dan Sejenisnya'),
('4.1.01.07.02', 'Pajak Rumah Makan dan Sejenisnya'),
('4.1.01.08.09', 'Pajak Panti Pijat, Refleksi, Mandi Uap/Spa dan Pusat Kebugaran (Fitness Center)'),
('4.1.01.10.01', 'Pajak Penerangan Jalan Dihasilkan Sendiri'),
('4.1.02.01.02', 'Retribusi Pelayanan Persampahan / Kebersihan'),
('4.1.02.02.01', 'Retribusi Pemakaian Kekayaan Daerah'),
('4.1.02.02.04', 'Retribusi Terminal'),
('4.1.02.02.06', 'Retribusi Tempat Penginapan/Pesanggrahan/Vila'),
('4.1.02.03.03', 'Retribusi Izin Trayek untuk Menyediakan Pelayanan Angkutan Umum'),
('4.1.03.01.01', 'Bagian Laba yang Dibagikan kepada Pemerintah Daerah (Dividen) atas Penyertaan Modal pada BUMN'),
('4.1.04.01.02', 'Hasil Penjualan Peralatan dan Mesin'),
('4.1.04.02.03', 'Hasil Selisih Lebih Tukar Menukar Gedung dan Bangunan'),
('4.1.04.02.04', 'Hasil Selisih Lebih Tukar Menukar Jalan, Jaringan, dan Irigasi'),
('4.1.04.03.05', 'Hasil dari Kerja Sama Penyediaan Infrastruktur'),
('4.1.04.04.01', 'Hasil Kerja Sama Daerah'),
('4.1.04.05.01', 'Jasa Giro pada Kas Daerah'),
('4.1.04.05.02', 'Jasa Giro pada Kas di Bendahara'),
('4.1.04.06.01', 'Hasil Pengelolaan Dana Bergulir'),
('4.1.04.07.01', 'Pendapatan Bunga atas Penempatan Uang Pemerintah Daerah'),
('4.1.04.08.01', 'Tuntutan Ganti Kerugian Daerah terhadap Bendahara'),
('4.1.04.09.01', 'Penerimaan Komisi, Potongan, atau Bentuk Lain'),
('4.1.04.11.01', 'Pendapatan Denda atas Keterlambatan Pelaksanaan Pekerjaan'),
('4.1.04.15.03', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Gaji dan Tunjangan'),
('4.1.04.15.04', 'Pendapatan dari Pengembalian Kelebihan Pembayaran Perjalanan Dinas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpd`
--

CREATE TABLE `skpd` (
  `tahun` int(11) NOT NULL,
  `skpd` varchar(50) NOT NULL,
  `npwpd` varchar(50) NOT NULL,
  `penetapan` date DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `perbulan` int(11) DEFAULT NULL,
  `pokok` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `ketetapan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skpd`
--

INSERT INTO `skpd` (`tahun`, `skpd`, `npwpd`, `penetapan`, `jatuhtempo`, `obyek`, `perbulan`, `pokok`, `denda`, `ketetapan`, `tanggal`) VALUES
(2022, '01 A', 'P.2.0000065.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-06-02'),
(2022, '03 A', 'P.2.0000009.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-01-31'),
(2022, '03 B', 'P.2.0000049.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-01-31'),
(2022, '05 A', 'P.2.0000075.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-01-31'),
(2022, '05 B', 'P.2.0000076.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-02-03'),
(2022, '05 C', 'P.20000009.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-03-05'),
(2022, '05 D', 'P.20000007.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-03-05'),
(2022, '05 E', 'P.2.0000026.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-05-15'),
(2022, '05 F', 'P.2.0000068.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-05-05'),
(2022, '06 A', 'P.2.0000041.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-01-07'),
(2022, '06 B', 'P.2.0000077.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-06-05'),
(2022, '06 C', 'P.2.0000078.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-06-01'),
(2022, '06 F', 'P.2.0000074.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-04-21'),
(2022, '07 A', 'P.2.0000014.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-01-01'),
(2022, '07 B', 'P.2.0000079.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-07-27'),
(2022, '08 A', 'P.2.0000071.27.1', '2022-01-01', '2022-12-31', 'Pajak Rumah Makan dan Sejenisnya', 200000, 2400000, 0, 2400000, '2022-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skrd`
--

CREATE TABLE `skrd` (
  `tahun` int(11) NOT NULL,
  `skrd` varchar(50) NOT NULL,
  `npwrd` varchar(50) NOT NULL,
  `penetapan` date DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `perbulan` int(11) DEFAULT NULL,
  `pokok` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `ketetapan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skrd`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `sspd`
--

CREATE TABLE `sspd` (
  `tahun` int(11) NOT NULL,
  `sspd` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `skpd` varchar(50) NOT NULL,
  `npwpd` varchar(50) NOT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nmrek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sspd`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `ssrd`
--

CREATE TABLE `ssrd` (
  `tahun` int(11) NOT NULL,
  `ssrd` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `skrd` varchar(50) NOT NULL,
  `npwpd` varchar(50) NOT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nmrek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ssrd`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `stpd`
--

CREATE TABLE `stpd` (
  `tahun` varchar(4) NOT NULL,
  `nostpd` varchar(25) NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `skpd` varchar(255) DEFAULT NULL,
  `ketetapan` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `strd`
--

CREATE TABLE `strd` (
  `tahun` varchar(4) NOT NULL,
  `nostrd` varchar(25) NOT NULL,
  `npwpd` varchar(255) NOT NULL,
  `skrd` varchar(255) DEFAULT NULL,
  `ketetapan` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sts`
--

CREATE TABLE `sts` (
  `tahun` int(11) NOT NULL,
  `nosts` varchar(30) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nilai` decimal(16,2) DEFAULT NULL,
  `norek` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sts`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `obyek` varchar(50) NOT NULL,
  `bulan` int(11) DEFAULT NULL,
  `perbulan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`obyek`, `bulan`, `perbulan`) VALUES
('Pajak Rumah Makan dan Sejenisnya', 12, 200000),
('Pemakaian Rumah Dinas Eselon II', 12, 200000),
('Pemakaian Rumah Dinas Eselon III', 12, 175000),
('Pemakaian Rumah Dinas Eselon IV', 12, 150000),
('Pemakaian Rumah Dinas Staf', 12, 100000),
('Retribusi Pelayanan Persampahan/ Kebersihan', 12, 182000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd`
--

CREATE TABLE `ttd` (
  `idjabat` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `golr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ttd`
--

INSERT INTO `ttd` (`idjabat`, `nip`, `nama`, `golr`) VALUES
(1, '19711231 200312 1 084', 'PETRUS UROPMABIN,S.E., M.Ak', 'IIId'),
(3, '19780403 200801 1 018', 'MARTEN BITIBALYO, S.E., M.M.', 'IIId'),
(4, '12345', 'ESAU UROPMABIN', 'IIIc'),
(5, '19801204 200605 1 002', 'MERUKOL KALAKMABIN, S.IP., M.Ak', 'IIIc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vcstrd`
--

CREATE TABLE `vcstrd` (
  `tahun` varchar(4) DEFAULT NULL,
  `namapemilik` varchar(100) DEFAULT NULL,
  `namausaha` varchar(100) DEFAULT NULL,
  `alamatpemilik` varchar(255) DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `npwpd` varchar(255) DEFAULT NULL,
  `nostpd` varchar(25) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `ketetapan` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vestpd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vestpd` (
`tahun` int(11)
,`npwpd` varchar(50)
,`skpd` varchar(50)
,`ketetapan` int(11)
,`obyek` varchar(255)
,`jatuhtempo` date
,`namausaha` varchar(100)
,`nilai` decimal(32,0)
,`nostpd` varchar(25)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vestpd1`
--

CREATE TABLE `vestpd1` (
  `tahun` int(11) DEFAULT NULL,
  `npwpd` varchar(50) DEFAULT NULL,
  `skpd` varchar(50) DEFAULT NULL,
  `ketetapan` int(11) DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `namausaha` varchar(100) DEFAULT NULL,
  `nilai` decimal(32,0) DEFAULT NULL,
  `nostpd` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vestrd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vestrd` (
`tahun` int(11)
,`npwpd` varchar(50)
,`skpd` varchar(50)
,`ketetapan` int(11)
,`obyek` varchar(255)
,`jatuhtempo` date
,`namausaha` varchar(100)
,`nilai` decimal(32,0)
,`nostpd` varchar(25)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vestrd1`
--

CREATE TABLE `vestrd1` (
  `tahun` int(11) DEFAULT NULL,
  `npwpd` varchar(50) DEFAULT NULL,
  `skpd` varchar(50) DEFAULT NULL,
  `ketetapan` int(11) DEFAULT NULL,
  `obyek` varchar(255) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `namausaha` varchar(100) DEFAULT NULL,
  `nilai` decimal(32,0) DEFAULT NULL,
  `nostpd` varchar(25) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpenerimaan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpenerimaan` (
`tahun` int(11)
,`tanggal` date
,`uraian` varchar(50)
,`keterangan` varchar(255)
,`nilai` decimal(16,2)
,`obyek` varchar(255)
,`kode` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpiutang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpiutang` (
`tahun` int(11)
,`sk` varchar(50)
,`tanggal` date
,`ketetapan` int(11)
,`npwpd` varchar(50)
,`obyek` varchar(255)
,`namausaha` varchar(100)
,`kode` varchar(255)
,`setoran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpiutang1`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpiutang1` (
`tahun` int(11)
,`sk` varchar(50)
,`tanggal` date
,`ketetapan` int(11)
,`npwpd` varchar(50)
,`obyek` varchar(255)
,`namausaha` varchar(100)
,`kode` varchar(20)
,`setoran` decimal(32,0)
,`kodeLO` varchar(20)
,`namaLO` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpiutang2`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpiutang2` (
`tahun` int(11)
,`sk` varchar(50)
,`tanggal` date
,`ketetapan` int(11)
,`npwpd` varchar(50)
,`obyek` varchar(255)
,`namausaha` varchar(100)
,`kode` varchar(20)
,`setoran` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vskpd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vskpd` (
`npwprd` varchar(50)
,`namausaha` varchar(100)
,`namapemilik` varchar(100)
,`skpd` varchar(50)
,`ketetapan` int(11)
,`bulan` int(2)
,`tahun` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vskrd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vskrd` (
`npwprd` varchar(50)
,`namausaha` varchar(100)
,`namapemilik` varchar(100)
,`skrd` varchar(50)
,`ketetapan` int(11)
,`bulan` int(2)
,`tahun` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vsspd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vsspd` (
`npwprd` varchar(50)
,`namausaha` varchar(100)
,`namapemilik` varchar(100)
,`skpd` varchar(50)
,`ketetapan` int(11)
,`nilai` decimal(32,0)
,`tahun` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vssrd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vssrd` (
`npwprd` varchar(50)
,`namausaha` varchar(100)
,`namapemilik` varchar(100)
,`skrd` varchar(50)
,`ketetapan` int(11)
,`nilai` decimal(32,0)
,`tahun` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vstpd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vstpd` (
`npwprd` varchar(50)
,`namausaha` varchar(100)
,`namapemilik` varchar(100)
,`skpd` varchar(50)
,`ketetapan` int(11)
,`nilai` decimal(32,0)
,`tahun` int(11)
,`nostpd` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vstrd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vstrd` (
`npwprd` varchar(50)
,`namausaha` varchar(100)
,`namapemilik` varchar(100)
,`skrd` varchar(50)
,`ketetapan` int(11)
,`nilai` decimal(32,0)
,`tahun` int(11)
,`nostrd` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vtstpd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vtstpd` (
`tahun` int(11)
,`npwpd` varchar(50)
,`skpd` varchar(50)
,`ketetapan` int(11)
,`obyek` varchar(255)
,`jatuhtempo` date
,`namausaha` varchar(100)
,`nilai` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vtstrd`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vtstrd` (
`tahun` int(11)
,`npwpd` varchar(50)
,`skpd` varchar(50)
,`ketetapan` int(11)
,`obyek` varchar(255)
,`jatuhtempo` date
,`namausaha` varchar(100)
,`nilai` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wpr`
--

CREATE TABLE `wpr` (
  `npwprd` varchar(50) NOT NULL,
  `namapemilik` varchar(100) DEFAULT NULL,
  `alamatpemilik` varchar(255) DEFAULT NULL,
  `namausaha` varchar(100) DEFAULT NULL,
  `jenisusaha` varchar(50) DEFAULT NULL,
  `alamatusaha` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `situ` varchar(30) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `jenis` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wpr`
--

-- --------------------------------------------------------

--
-- Struktur untuk view `rekap`
--
DROP TABLE IF EXISTS `rekap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rekap`  AS SELECT `wpr`.`npwprd` AS `npwprd`, concat(`wpr`.`namausaha`,' / ',`wpr`.`namapemilik`) AS `nama`, ifnull(`vpiutang`.`ketetapan`,0) AS `ketetapan`, ifnull(`vpiutang`.`setoran`,0) AS `setoran`, ifnull(`vpiutang`.`obyek`,if(left(`wpr`.`npwprd`,1) = 'P','Pajak Rumah Makan dan Sejenisnya',if(left(`wpr`.`npwprd`,3) = 'R.1','Retribusi Pelayanan Persampahan/ Kebersihan','tidak terdaftar'))) AS `obyek` FROM (`wpr` left join `vpiutang` on(`wpr`.`npwprd` = `vpiutang`.`npwpd`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vestpd`
--
DROP TABLE IF EXISTS `vestpd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vestpd`  AS SELECT `vtstpd`.`tahun` AS `tahun`, `vtstpd`.`npwpd` AS `npwpd`, `vtstpd`.`skpd` AS `skpd`, `vtstpd`.`ketetapan` AS `ketetapan`, `vtstpd`.`obyek` AS `obyek`, `vtstpd`.`jatuhtempo` AS `jatuhtempo`, `vtstpd`.`namausaha` AS `namausaha`, `vtstpd`.`nilai` AS `nilai`, `stpd`.`nostpd` AS `nostpd`, `stpd`.`tanggal` AS `tanggal` FROM (`vtstpd` left join `stpd` on(`vtstpd`.`tahun` = `stpd`.`tahun` and `vtstpd`.`skpd` = `stpd`.`skpd` and `vtstpd`.`npwpd` = `stpd`.`npwpd`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vestrd`
--
DROP TABLE IF EXISTS `vestrd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vestrd`  AS SELECT `vtstrd`.`tahun` AS `tahun`, `vtstrd`.`npwpd` AS `npwpd`, `vtstrd`.`skpd` AS `skpd`, `vtstrd`.`ketetapan` AS `ketetapan`, `vtstrd`.`obyek` AS `obyek`, `vtstrd`.`jatuhtempo` AS `jatuhtempo`, `vtstrd`.`namausaha` AS `namausaha`, `vtstrd`.`nilai` AS `nilai`, `strd`.`nostrd` AS `nostpd`, `strd`.`tanggal` AS `tanggal` FROM (`vtstrd` left join `strd` on(`vtstrd`.`tahun` = `strd`.`tahun` and `vtstrd`.`skpd` = `strd`.`skrd` and `vtstrd`.`npwpd` = `strd`.`npwpd`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpenerimaan`
--
DROP TABLE IF EXISTS `vpenerimaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpenerimaan`  AS SELECT `sspd`.`tahun` AS `tahun`, `sspd`.`tanggal` AS `tanggal`, `sspd`.`sspd` AS `uraian`, `sspd`.`keterangan` AS `keterangan`, `sspd`.`nilai` AS `nilai`, `sspd`.`obyek` AS `obyek`, `reklra`.`kodelra` AS `kode` FROM (`sspd` join `reklra` on(`sspd`.`obyek` = `reklra`.`namalra`)) union all select `ssrd`.`tahun` AS `tahun`,`ssrd`.`tanggal` AS `tanggal`,`ssrd`.`ssrd` AS `uraian`,`ssrd`.`keterangan` AS `keterangan`,`ssrd`.`nilai` AS `nilai`,`ssrd`.`obyek` AS `obyek`,`reklra`.`kodelra` AS `kode` from (`ssrd` join `reklra` on(`ssrd`.`obyek` = `reklra`.`namalra`)) union all select `sts`.`tahun` AS `tahun`,`sts`.`tanggal` AS `tanggal`,`sts`.`nosts` AS `uraian`,`sts`.`keterangan` AS `keterangan`,`sts`.`nilai` AS `nilai`,`sts`.`obyek` AS `obyek`,`reklra`.`kodelra` AS `kode` from (`sts` join `reklra` on(`sts`.`obyek` = `reklra`.`namalra`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpiutang`
--
DROP TABLE IF EXISTS `vpiutang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpiutang`  AS SELECT `skrd`.`tahun` AS `tahun`, `skrd`.`skrd` AS `sk`, `skrd`.`jatuhtempo` AS `tanggal`, `skrd`.`ketetapan` AS `ketetapan`, `skrd`.`npwrd` AS `npwpd`, `skrd`.`obyek` AS `obyek`, (select `wpr`.`namausaha` from `wpr` where `wpr`.`npwprd` = `skrd`.`npwrd`) AS `namausaha`, (select `reklra`.`namalra` from `reklra` where `reklra`.`namalra` = `skrd`.`obyek`) AS `kode`, (select ifnull(sum(`ssrd`.`nilai`),0) from `ssrd` where `ssrd`.`skrd` = `skrd`.`skrd`) AS `setoran` FROM `skrd` union all select `skpd`.`tahun` AS `tahun`,`skpd`.`skpd` AS `sk`,`skpd`.`jatuhtempo` AS `tanggal`,`skpd`.`ketetapan` AS `ketetapan`,`skpd`.`npwpd` AS `npwpd`,`skpd`.`obyek` AS `obyek`,(select `wpr`.`namausaha` from `wpr` where `wpr`.`npwprd` = `skpd`.`npwpd`) AS `namausaha`,(select `reklra`.`namalra` from `reklra` where `reklra`.`namalra` = `skpd`.`obyek`) AS `kode`,(select ifnull(sum(`sspd`.`nilai`),0) from `sspd` where `sspd`.`skpd` = `skpd`.`skpd`) AS `setoran` from `skpd`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpiutang1`
--
DROP TABLE IF EXISTS `vpiutang1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpiutang1`  AS SELECT `a`.`tahun` AS `tahun`, `a`.`skpd` AS `sk`, `a`.`jatuhtempo` AS `tanggal`, `a`.`ketetapan` AS `ketetapan`, `a`.`npwpd` AS `npwpd`, `a`.`obyek` AS `obyek`, `c`.`namausaha` AS `namausaha`, `d`.`kodelra` AS `kode`, (select ifnull(sum(`b`.`nilai`),0) from `sspd` `b` where `b`.`skpd` = `a`.`skpd`) AS `setoran`, `e`.`kodeLO` AS `kodeLO`, `e`.`namaLO` AS `namaLO` FROM (((`skpd` `a` join `wpr` `c`) join `reklra` `d`) join `reklo` `e`) WHERE `a`.`npwpd` = `c`.`npwprd` AND `a`.`obyek` = `d`.`namalra` AND `d`.`kodelra` = `e`.`kodeLRA` AND octet_length(trim(`a`.`skpd`)) > 0 union all select `a`.`tahun` AS `tahun`,`a`.`skrd` AS `sk`,`a`.`jatuhtempo` AS `tanggal`,`a`.`ketetapan` AS `ketetapan`,`a`.`npwrd` AS `npwpd`,`a`.`obyek` AS `obyek`,`c`.`namausaha` AS `namausaha`,`d`.`kodelra` AS `kode`,(select ifnull(sum(`b`.`nilai`),0) from `ssrd` `b` where `b`.`skrd` = `a`.`skrd`) AS `setoran`,`e`.`kodeLO` AS `kodeLO`,`e`.`namaLO` AS `namaLO` from (((`skrd` `a` join `wpr` `c`) join `reklra` `d`) join `reklo` `e`) where `a`.`npwrd` = `c`.`npwprd` and `a`.`obyek` = `d`.`namalra` and `d`.`kodelra` = `e`.`kodeLRA` and octet_length(trim(`a`.`skrd`)) > 0  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpiutang2`
--
DROP TABLE IF EXISTS `vpiutang2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpiutang2`  AS SELECT `a`.`tahun` AS `tahun`, `a`.`skrd` AS `sk`, `a`.`jatuhtempo` AS `tanggal`, `a`.`ketetapan` AS `ketetapan`, `a`.`npwrd` AS `npwpd`, `a`.`obyek` AS `obyek`, `c`.`namausaha` AS `namausaha`, `d`.`kodelra` AS `kode`, (select ifnull(sum(`b`.`nilai`),0) from `ssrd` `b` where `b`.`skrd` = `a`.`skrd`) AS `setoran` FROM ((`skrd` `a` join `wpr` `c`) join `reklra` `d`) WHERE `a`.`npwrd` = `c`.`npwprd` AND `a`.`obyek` = `d`.`namalra` AND octet_length(trim(`a`.`skrd`)) > 00  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vskpd`
--
DROP TABLE IF EXISTS `vskpd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vskpd`  AS SELECT `wpr`.`npwprd` AS `npwprd`, `wpr`.`namausaha` AS `namausaha`, `wpr`.`namapemilik` AS `namapemilik`, `skpd`.`skpd` AS `skpd`, ifnull(`skpd`.`ketetapan`,0) AS `ketetapan`, month(`skpd`.`penetapan`) AS `bulan`, `skpd`.`tahun` AS `tahun` FROM (`wpr` left join `skpd` on(`wpr`.`npwprd` = `skpd`.`npwpd`)) WHERE `wpr`.`jenis` = 'p' AND `wpr`.`status` = 11111111  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vskrd`
--
DROP TABLE IF EXISTS `vskrd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vskrd`  AS SELECT `wpr`.`npwprd` AS `npwprd`, `wpr`.`namausaha` AS `namausaha`, `wpr`.`namapemilik` AS `namapemilik`, `skrd`.`skrd` AS `skrd`, ifnull(`skrd`.`ketetapan`,0) AS `ketetapan`, month(`skrd`.`penetapan`) AS `bulan`, `skrd`.`tahun` AS `tahun` FROM (`wpr` left join `skrd` on(`wpr`.`npwprd` = `skrd`.`npwrd`)) WHERE `wpr`.`jenis` = 'r' AND `wpr`.`status` = 11111111  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vsspd`
--
DROP TABLE IF EXISTS `vsspd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vsspd`  AS SELECT `wpr`.`npwprd` AS `npwprd`, `wpr`.`namausaha` AS `namausaha`, `wpr`.`namapemilik` AS `namapemilik`, `skpd`.`skpd` AS `skpd`, `skpd`.`ketetapan` AS `ketetapan`, (select ifnull(sum(`sspd`.`nilai`),0) from `sspd` where `skpd`.`skpd` = `sspd`.`skpd` and `skpd`.`npwpd` = `sspd`.`npwpd` and `skpd`.`tahun` = `sspd`.`tahun`) AS `nilai`, `skpd`.`tahun` AS `tahun` FROM (`wpr` left join `skpd` on(`wpr`.`npwprd` = `skpd`.`npwpd`)) WHERE `wpr`.`jenis` = 'p' AND `wpr`.`status` = 1 AND octet_length(trim(`skpd`.`skpd`)) > 00  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vssrd`
--
DROP TABLE IF EXISTS `vssrd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vssrd`  AS SELECT `wpr`.`npwprd` AS `npwprd`, `wpr`.`namausaha` AS `namausaha`, `wpr`.`namapemilik` AS `namapemilik`, `skrd`.`skrd` AS `skrd`, `skrd`.`ketetapan` AS `ketetapan`, (select ifnull(sum(`ssrd`.`nilai`),0) from `ssrd` where `skrd`.`skrd` = `ssrd`.`skrd` and `skrd`.`npwrd` = `ssrd`.`npwpd` and `skrd`.`tahun` = `ssrd`.`tahun`) AS `nilai`, `skrd`.`tahun` AS `tahun` FROM (`wpr` left join `skrd` on(`wpr`.`npwprd` = `skrd`.`npwrd`)) WHERE `wpr`.`jenis` = 'r' AND `wpr`.`status` = 1 AND octet_length(trim(`skrd`.`skrd`)) > 00  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vstpd`
--
DROP TABLE IF EXISTS `vstpd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vstpd`  AS SELECT `vsspd`.`npwprd` AS `npwprd`, `vsspd`.`namausaha` AS `namausaha`, `vsspd`.`namapemilik` AS `namapemilik`, `vsspd`.`skpd` AS `skpd`, `vsspd`.`ketetapan` AS `ketetapan`, `vsspd`.`nilai` AS `nilai`, `vsspd`.`tahun` AS `tahun`, `stpd`.`nostpd` AS `nostpd` FROM (`vsspd` left join `stpd` on(`vsspd`.`skpd` = `stpd`.`skpd`)) WHERE `vsspd`.`tahun` = '2022' AND ifnull(`vsspd`.`ketetapan`,0) - ifnull(`vsspd`.`nilai`,0) <> 00  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vstrd`
--
DROP TABLE IF EXISTS `vstrd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vstrd`  AS SELECT `vssrd`.`npwprd` AS `npwprd`, `vssrd`.`namausaha` AS `namausaha`, `vssrd`.`namapemilik` AS `namapemilik`, `vssrd`.`skrd` AS `skrd`, `vssrd`.`ketetapan` AS `ketetapan`, `vssrd`.`nilai` AS `nilai`, `vssrd`.`tahun` AS `tahun`, `strd`.`nostrd` AS `nostrd` FROM (`vssrd` left join `strd` on(`vssrd`.`skrd` = `strd`.`skrd` and `vssrd`.`tahun` = `strd`.`tahun`)) WHERE `vssrd`.`tahun` = '2022' AND ifnull(`vssrd`.`ketetapan`,0) - ifnull(`vssrd`.`nilai`,0) <> 00  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vtstpd`
--
DROP TABLE IF EXISTS `vtstpd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtstpd`  AS SELECT `a`.`tahun` AS `tahun`, `a`.`npwpd` AS `npwpd`, `a`.`skpd` AS `skpd`, `a`.`ketetapan` AS `ketetapan`, `a`.`obyek` AS `obyek`, `a`.`jatuhtempo` AS `jatuhtempo`, `c`.`namausaha` AS `namausaha`, (select ifnull(sum(`b`.`nilai`),0) from `sspd` `b` where `a`.`tahun` = `b`.`tahun` and `a`.`skpd` = `b`.`skpd`) AS `nilai` FROM (`skpd` `a` join `wpr` `c`) WHERE `a`.`npwpd` = `c`.`npwprd` AND octet_length(trim(`a`.`skpd`)) > 00  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vtstrd`
--
DROP TABLE IF EXISTS `vtstrd`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtstrd`  AS SELECT `a`.`tahun` AS `tahun`, `a`.`npwrd` AS `npwpd`, `a`.`skrd` AS `skpd`, `a`.`ketetapan` AS `ketetapan`, `a`.`obyek` AS `obyek`, `a`.`jatuhtempo` AS `jatuhtempo`, `c`.`namausaha` AS `namausaha`, (select ifnull(sum(`b`.`nilai`),0) from `ssrd` `b` where `a`.`tahun` = `b`.`tahun` and `a`.`skrd` = `b`.`skrd`) AS `nilai` FROM (`skrd` `a` join `wpr` `c`) WHERE `a`.`npwrd` = `c`.`npwprd` AND octet_length(trim(`a`.`skrd`)) > 00  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `fiskal`
--
ALTER TABLE `fiskal`
  ADD PRIMARY KEY (`nomorfiskal`);

--
-- Indeks untuk tabel `golr`
--
ALTER TABLE `golr`
  ADD PRIMARY KEY (`gorl`);

--
-- Indeks untuk tabel `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`akses`) USING BTREE;

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idjabat`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `pemda`
--
ALTER TABLE `pemda`
  ADD PRIMARY KEY (`Nama_Pemda`);

--
-- Indeks untuk tabel `rekbank`
--
ALTER TABLE `rekbank`
  ADD PRIMARY KEY (`norek`);

--
-- Indeks untuk tabel `reklo`
--
ALTER TABLE `reklo`
  ADD PRIMARY KEY (`kodeLO`);

--
-- Indeks untuk tabel `reklo1`
--
ALTER TABLE `reklo1`
  ADD PRIMARY KEY (`kode1`);

--
-- Indeks untuk tabel `reklo2`
--
ALTER TABLE `reklo2`
  ADD PRIMARY KEY (`kode2`);

--
-- Indeks untuk tabel `reklo3`
--
ALTER TABLE `reklo3`
  ADD PRIMARY KEY (`kode3`);

--
-- Indeks untuk tabel `reklo4`
--
ALTER TABLE `reklo4`
  ADD PRIMARY KEY (`kode4`);

--
-- Indeks untuk tabel `reklo5`
--
ALTER TABLE `reklo5`
  ADD PRIMARY KEY (`kode5`);

--
-- Indeks untuk tabel `reklra`
--
ALTER TABLE `reklra`
  ADD PRIMARY KEY (`kodelra`);

--
-- Indeks untuk tabel `reklra1`
--
ALTER TABLE `reklra1`
  ADD PRIMARY KEY (`kode1`);

--
-- Indeks untuk tabel `reklra2`
--
ALTER TABLE `reklra2`
  ADD PRIMARY KEY (`kode2`);

--
-- Indeks untuk tabel `reklra3`
--
ALTER TABLE `reklra3`
  ADD PRIMARY KEY (`kode3`);

--
-- Indeks untuk tabel `reklra4`
--
ALTER TABLE `reklra4`
  ADD PRIMARY KEY (`kode4`);

--
-- Indeks untuk tabel `reklra5`
--
ALTER TABLE `reklra5`
  ADD PRIMARY KEY (`kode5`);

--
-- Indeks untuk tabel `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`skpd`,`tahun`,`npwpd`) USING BTREE;

--
-- Indeks untuk tabel `skrd`
--
ALTER TABLE `skrd`
  ADD PRIMARY KEY (`skrd`,`tahun`,`npwrd`) USING BTREE;

--
-- Indeks untuk tabel `sspd`
--
ALTER TABLE `sspd`
  ADD PRIMARY KEY (`tahun`,`sspd`,`skpd`,`npwpd`) USING BTREE;

--
-- Indeks untuk tabel `ssrd`
--
ALTER TABLE `ssrd`
  ADD PRIMARY KEY (`tahun`,`ssrd`,`skrd`,`npwpd`) USING BTREE;

--
-- Indeks untuk tabel `stpd`
--
ALTER TABLE `stpd`
  ADD PRIMARY KEY (`tahun`,`nostpd`);

--
-- Indeks untuk tabel `strd`
--
ALTER TABLE `strd`
  ADD PRIMARY KEY (`tahun`,`nostrd`) USING BTREE;

--
-- Indeks untuk tabel `sts`
--
ALTER TABLE `sts`
  ADD PRIMARY KEY (`nosts`,`tahun`) USING BTREE;

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`obyek`);

--
-- Indeks untuk tabel `ttd`
--
ALTER TABLE `ttd`
  ADD PRIMARY KEY (`idjabat`);

--
-- Indeks untuk tabel `wpr`
--
ALTER TABLE `wpr`
  ADD PRIMARY KEY (`npwprd`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idjabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
