-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2019 pada 02.36
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkarir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` varchar(30) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `sandi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `sandi`) VALUES
('admin', 'administrator', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbagian`
--

CREATE TABLE `tbbagian` (
  `idBagian` varchar(11) NOT NULL,
  `namaBagian` varchar(1000) NOT NULL,
  `jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbbagian`
--

INSERT INTO `tbbagian` (`idBagian`, `namaBagian`, `jenis`) VALUES
('A1', 'Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester', 'Pengabdian'),
('A2', 'Melaksanakan pengembangan hasil pendidikan, dan penelitian yang dapat dimanfaatkan oleh masyarakat/ industry setiap program', 'Pengabdian'),
('A3', 'Memberi latihan/penyuluhan/ penataran/ceramah pada masyarakat, terjadwal/terprogram:', 'Pengabdian'),
('A4', 'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan  tugas pemerintahan dan pembangunan', 'Pengabdian'),
('A5', 'Membuat/menulis karya pengabdian pada masyarakat yang tidak dipublikasikan,tiap karya', 'Pengabdian'),
('P1', 'Menjadi anggota dalam suatu Panitia/Badan  pada Perguruan Tinggi', 'penunjang'),
('P10', 'Mempunyai prestasi di bidang olahraga/ Humaniora', 'penunjang'),
('P11', 'Keanggotaan dalam tim penilai jabatan akademik dosen (tiap semester)', 'penunjang'),
('P2', 'Menjadi anggota panitia/badan pada lembaga  pemerintah', 'penunjang'),
('P3', 'Menjadi anggota organisasi profesi ', 'penunjang'),
('P4', 'Mewakili Perguruan Tinggi/Lembaga Pemerintah  duduk dalam Panitia Antar Lembaga, tiap kepanitiaan', 'penunjang'),
('P5', 'Menjadi anggota delegasi Nasional ke pertemuan Internasional', 'penunjang'),
('P6', 'Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun)', 'penunjang'),
('P7', 'Berperan serta aktif dalam pertemuan ilmiah', 'penunjang'),
('P8', 'Mendapat tanda jasa/penghargaan ', 'penunjang'),
('P9', 'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional ', 'penunjang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbagian1`
--

CREATE TABLE `tbbagian1` (
  `idBag1` int(11) NOT NULL,
  `namaBag1` varchar(500) NOT NULL,
  `idBagian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbbagian1`
--

INSERT INTO `tbbagian1` (`idBag1`, `namaBag1`, `idBagian`) VALUES
(1, 'Sebagai Ketua/Wakil Ketua merangkap Anggota, tiap tahun', 'P1'),
(2, 'Sebagai Anggota, tiap tahun', 'P1'),
(3, 'Panitia Pusat sebagai Ketua/Wakil Ketua, tiap kepanitiaan', 'P2'),
(4, 'Panitia Pusat sebagai Anggota, tiap kepanitiaan', 'P2'),
(5, 'Panitia Daerah, sebagai Ketua/Wakil Ketua, tiap kepanitiaan', 'P2'),
(6, 'Panitia Daerah, sebagai Anggota, tiap kepanitiaan', 'P2'),
(7, 'Tingkat Internasional, sebagai Pengurus, tiap periode jabatan', 'P3'),
(8, 'Tingkat Internasional, sebagai Anggota atas permintaan, tiap periode jabatan', 'P3'),
(9, 'Tingkat Internasional, sebagai Anggota,  tiap periode jabatan', 'P3'),
(10, 'Tingkat Nasional, sebagai Pengurus, tiap periode jabatan', 'P3'),
(11, 'Tingkat Nasional, sebagai Anggota, atas permintaan, tiap periode jabatan', 'P3'),
(12, 'Tingkat Nasional, sebagai Anggota, tiap periode jabatan', 'P3'),
(13, 'Sebagai Ketua delegasi, tiap kegiatan', 'P5'),
(14, ' Sebagai Anggota, tiap kegiatan ', 'P5'),
(15, 'Editor/dewan penyunting/dewan redaksi  jurnal ilmiah internasional', 'P6'),
(16, 'Editor/dewan penyunting/dewan redaksi  jurnal ilmiah nasional', 'P6'),
(17, 'Tingkat Internasional/Nasional/Regional sebagai Ketua, tiap kegiatan', 'P7'),
(18, 'Tingkat Internasional/Nasional/Regional sebagai Anggota/peserta, tiap kegiatan', 'P7'),
(19, 'Di lingkungan Perguruan Tinggi sebagai Ketua, tiap kegiatan', 'P7'),
(20, 'Di lingkungan Perguruan Tinggi sebagai Anggota/peserta, tiap kegiatan', 'P7'),
(21, 'Penghargaan/tanda jasa Satya lencana 30 tahun', 'P8'),
(22, 'Penghargaan/tanda jasa Satya lencana 20 tahun', 'P8'),
(23, 'Penghargaan/tanda jasa Satya lencana 10 tahun', 'P8'),
(24, 'Tingkat Internasional, tiap tanda jasa/penghargaan', 'P8'),
(25, 'Tingkat Nasional, tiap tanda  jasa/penghargaan', 'P8'),
(26, 'Tingkat Daerah/Lokal, tiap tanda jasa/penghargaan', 'P8'),
(27, 'Buku SMTA atau setingkat, tiap buku', 'P9'),
(28, 'Buku SMTP atau setingkat, tiap buku', 'P9'),
(29, 'Buku SD atau setingkat, tiap buku', 'P9'),
(30, 'Tingkat Internasional, tiap piagam/medali', 'P10'),
(31, ' Tingkat Nasional, tiap piagam/medali ', 'P10'),
(32, ' Tingkat Daerah/Lokal, tiap piagam/medali ', 'P10'),
(33, 'Dalam satu semester atau lebih,Tingkat Internasional tiap program ', 'A3'),
(34, 'Dalam satu semester atau lebih,Tingkat Nasional, tiap program ', 'A3'),
(35, 'Dalam satu semester atau lebih,Tingkat Lokal, tiap program', 'A3'),
(36, 'Kurang dari satu semester dan minimal satu bulan, Tingkat Internasional : tiap program ', 'A3'),
(37, 'Kurang dari satu semester dan minimal satu bulan, Tingkat Nasional, tiap program', 'A3'),
(38, 'Kurang dari satu semester dan minimal satu bulan, Tingkat Lokal, tiap program ', 'A3'),
(39, 'Kurang dari satu semester dan minimal satu bulan, Insidental, tiap kegiatan/program', 'A3'),
(40, 'Berdasarkan bidang keahlian, tiap program ', 'A4'),
(41, 'Berdasarkan penugasan  lembaga terguruan tinggi,  tiap program ', 'A4'),
(42, 'Berdasarkan fungsi/jabatan tiap program ', 'A4'),
(43, '-', 'A1'),
(44, '-', 'A2'),
(45, '-', 'A5'),
(46, '-', 'P4'),
(47, '-', 'P11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdosen`
--

CREATE TABLE `tbdosen` (
  `idDosen` varchar(10) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `noSeri` varchar(50) NOT NULL,
  `tempatLahir` varchar(25) NOT NULL,
  `tglLahir` varchar(15) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `statusDosen` varchar(25) NOT NULL,
  `jafa` varchar(25) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `pengguna` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbdosen`
--

INSERT INTO `tbdosen` (`idDosen`, `nidn`, `nama`, `noSeri`, `tempatLahir`, `tglLahir`, `jk`, `noTelp`, `prodi`, `statusDosen`, `jafa`, `golongan`, `jabatan`, `userName`, `pass`, `pengguna`) VALUES
('DS-A-0001', '0730128201', 'Vivi Aida Fitria, S.Si., M.Si', '365365378908', 'Malang', '04/23/2018', 'Perempuan', '081330071901', 'TI', 'Dosen PNS DPK', 'Asisten Ahli', '--', 'DOSEN', 'admin', 'admin2', 'Admin'),
('DS-A-0002', '0730128201', 'Rina Dewi Indahsari, S.Kom., M.Kom.', '78685687', 'Malang', '06/19/1984', 'Perempuan', '436464', 'TI', 'Dosen Tetap Yayasan', 'Asisten Ahli', 'Penata Muda-III a', 'WAKIL KETUA I', 'DS-A-0002', 'user', 'User'),
('DS-A-0003', '3276537653756', 'Jaenal Arifin S.Kom, MM, M.Kom', '6876986986', 'Malang', '06/17/1980', 'Laki-Laki', '08565758578', 'TI', 'Dosen PNS DPK', '--', 'Penata Muda-III a', 'KAPRODI', 'DS-A-0003', 'DS-A-0003', 'User'),
('DS-A-0004', '32436132652', 'Muhammad Rofiq, S.T, M.T', '456456456', 'Malang', '07/25/2018', 'Laki-Laki', '083536535636', 'SK', 'Dosen Tetap Yayasan', 'Asisten Ahli', '--', 'KETUA', 'DS-A-0004', 'DS-A-0004', 'User'),
('DS-A-0006', '1234567890', 'SAMSUL a', '123456', 'Malang', '07/03/2018', 'Laki-Laki', '777888999', 'SK', 'Dosen Tetap Yayasan', 'Asisten Ahli', 'Penata Muda Tingkat I-III b', 'KAPRODI', 'DS-A-0006', 'DS-A-0006', 'User'),
('DS-A-0007', '4763472437', 'Lukman Hakim, S.T, M.T', '5785875975900', 'Malang', '08/28/2018', 'Laki-Laki', '083536535636', 'TI', 'Dosen Tetap Yayasan', '--', 'Penata Muda-III a', 'DOSEN', 'DS-A-0007', 'DS-A-0007', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdupak`
--

CREATE TABLE `tbdupak` (
  `id` int(10) NOT NULL,
  `pendDiperhitungkan` varchar(500) NOT NULL,
  `jabAkademik` varchar(50) NOT NULL,
  `TMTAkademik` varchar(15) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `TMTPangkat` varchar(15) NOT NULL,
  `masaGolLama` varchar(50) NOT NULL,
  `masaGolBaru` varchar(50) NOT NULL,
  `TMTGolBaru` varchar(15) NOT NULL,
  `kodeBidang` varchar(25) NOT NULL,
  `namaBidang` varchar(50) NOT NULL,
  `kreditSekarang` int(10) NOT NULL,
  `kreditDiusulkan` int(10) NOT NULL,
  `idDosen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbdupak`
--

INSERT INTO `tbdupak` (`id`, `pendDiperhitungkan`, `jabAkademik`, `TMTAkademik`, `pangkat`, `TMTPangkat`, `masaGolLama`, `masaGolBaru`, `TMTGolBaru`, `kodeBidang`, `namaBidang`, `kreditSekarang`, `kreditDiusulkan`, `idDosen`) VALUES
(1, 'S2, Matematika, Kekhususan/Minat: Matematika Modelling', 'TENAGA PENGAJAR', '--', '--', '--', '--', '--', '--', 'PENDIDIKAN', 'Pendidikan Matematika', 850, 1050, 'DS-A-0001'),
(2, 'asdasdasdasa', 'TENAGA PENGAJAR', '-', '-', '-', '-', '-', '-', 'TEKNIK', '-', 100, 150, 'DS-A-0001'),
(3, 'Sistem Pakar', 'ASISTEN AHLI', '--', '--', '--', '--', '--', '--', 'TEKNIK', 'Teknik Informatika', 100, 150, 'DS-A-0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblv1`
--

CREATE TABLE `tblv1` (
  `idLv1` varchar(10) NOT NULL,
  `namaKegiatanLv1` varchar(500) NOT NULL,
  `jenisKegiatanLv1` varchar(50) NOT NULL,
  `kodeKegiatanLv1` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblv1`
--

INSERT INTO `tblv1` (`idLv1`, `namaKegiatanLv1`, `jenisKegiatanLv1`, `kodeKegiatanLv1`) VALUES
('IL0001', 'Menghasilkan karya ilmiah sesuai dengan bidang ilmunya', 'Penelitian', '-'),
('IL0002', 'Hasil penelitian atau hasil pemikiran yang didesiminasikan ', 'Penelitian', '-'),
('IL0003', 'Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan)', 'Penelitian', 'II.A.2'),
('IL0004', 'Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN) ', 'Penelitian', 'II.B'),
('IL0005', 'Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)', 'Penelitian', 'II.C'),
('IL0006', 'Membuat rancangan dan karya teknologi/seni yang dipatenkan secara nasional atau internasional', 'Penelitian', '-'),
('IL0007', 'Membuat rancangan dan karya teknologi yang tidak dipatenkan; rancangan dan karya seni monumental/ seni pertunjukan; karya sastra:', 'Penelitian', '-'),
('IL0008', 'Membuat rancangan dan karya seni/seni pertunjukan yang tidak mendapatkan HKI*)', 'Penelitian', 'II.E.4'),
('IL0009', 'Mengikuti pendidikan formal dan memperoleh gelar/sebutan/ijazah:', 'Pengajaran', '-'),
('IL0010', 'Mengikuti diklat prajabatan golongan III', 'Pengajaran', 'I.A.2'),
('IL0011', 'Melaksanakan perkuliahan/tutorial/perkuliahan praktikum dan membimbing,menguji serta menyelenggarakan pendidikan di laboratorium, praktik keguruan, bengkel/studio/kebun percobaan/teknologi pengajaran dan praktik lapangan (setiap semester):', 'Pengajaran', 'II.A'),
('IL0012', 'Membimbing seminar mahasiswa (setiap semester)', 'Pengajaran', 'II.B'),
('IL0013', 'Membimbing KKN, Praktik Kerja Nyata, Praktik Kerja Lapangan (setiap semester)', 'Pengajaran', 'II.C'),
('IL0014', 'Membimbing dan ikut membimbing dalam menghasilkan disertasi, tesis, skripsi dan laporan akhir studi yang sesuai bidang penugasannya:', 'Pengajaran', '-'),
('IL0015', 'Bertugas sebagai penguji pada ujian akhir/Profesi (setiap mahasiswa):', 'Pengajaran', '-'),
('IL0016', 'Membina kegiatan mahasiswa di bidang akademik dan kemahasiswaan, termasuk dalam kegiatan ini adalah membimbing mahasiswa menghasilkan produk saintifik (setiap semester) ', 'Pengajaran', 'II.F'),
('IL0017', 'Mengembangkan program kuliah yang mempunyai nilai kebaharuan metode atau substansi (setiap produk)', 'Pengajaran', 'II.G'),
('IL0018', 'Mengembangkan bahan pengajaran/ bahan kuliah yang mempunyai nilai kebaharuan  (setiap produk),', 'Pengajaran', '-'),
('IL0019', 'Menyampaikan orasi ilmiah di tingkat perguruan tinggi', 'Pengajaran', 'II-I'),
('IL0020', 'Menduduki jabatan pimpinan perguruan tinggi (setiap semester):', 'Pengajaran', '-'),
('IL0021', 'Membimbing dosen yang mempunyai jabatan akademik lebih rendah setiap semester (bagi dosen Lektor Kepala ke atas):', 'Pengajaran', '-'),
('IL0022', 'Melaksanakan kegiatan detasering dan pencangkokan di luar institusi tempat bekerja setiap semester (bagi dosen Lektor kepala ke atas):', 'Pengajaran', '-'),
('IL0023', 'Melaksanakan pengembangan diri untuk meningkatkan kompetensi:', 'Pengajaran', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblv2`
--

CREATE TABLE `tblv2` (
  `idLv2` varchar(10) NOT NULL,
  `namaKegiatanLv2` varchar(500) NOT NULL,
  `kodeKegiatanLv2` varchar(25) NOT NULL,
  `idLv1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblv2`
--

INSERT INTO `tblv2` (`idLv2`, `namaKegiatanLv2`, `kodeKegiatanLv2`, `idLv1`) VALUES
('IL20001', 'Hasil penelitian atau hasil pemikiran yang dipublikasikan dalam bentuk buku', '-', 'IL0001'),
('IL20002', 'Hasil penelitian atau hasil pemikiran dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter):', '-', 'IL0001'),
('IL20003', 'Hasil penelitian atau hasil pemikiran yang dipublikasikan:', '-', 'IL0001'),
('IL20004', 'Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN):', '-', 'IL0002'),
('IL20005', 'Disajikan dalam bentuk poster dan dimuat dalam prosiding yang dipublikasikan:', '-', 'IL0002'),
('IL20006', 'Disajikan dalam seminar/simposium/ lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan:', '-', 'IL0002'),
('IL20007', 'Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/ simposium/ lokakarya, tetapi dimuat dalam prosiding:', '-', 'IL0002'),
('IL20008', 'Hasil penelitian/pemikiran yang disajikan dalam koran/majalah  populer/umum', 'II.A.1.d', 'IL0002'),
('IL20009', 'Internasional (paling sedikit diakui oleh 4 Negara)', 'II.D.1', 'IL0006'),
('IL20010', 'Nasional', 'II.D.2', 'IL0006'),
('IL20011', 'Tingkat Internasional', 'II.E.1', 'IL0007'),
('IL20012', 'Tingkat Nasional', 'II.E.2', 'IL0007'),
('IL20013', 'Tingkat Lokal', 'II.E.3', 'IL0007'),
('IL20014', '-', '-', 'IL0003'),
('IL20015', '-', '-', 'IL0004'),
('IL20016', '-', '-', 'IL0005'),
('IL20017', '-', '-', 'IL0008'),
('IL20018', 'Doktor/sederajat ', 'I.A.1.a', 'IL0009'),
('IL20019', 'Magister/sederajat ', 'I.A.1.b', 'IL0009'),
('IL20020', '-', '-', 'IL0010'),
('IL20021', 'Asisten Ahli untuk:', '-', 'IL0011'),
('IL20022', 'Lektor/Lektor Kepala/Profesor untuk:', '-', 'IL0011'),
('IL20023', 'Kegiatan pelaksanaan pendidikan untuk pendidikan dokter klinis', '-', 'IL0011'),
('IL20024', '-', '-', 'IL0012'),
('IL20025', '-', '-', 'IL0013'),
('IL20026', 'Pembimbing Utama per orang (setiap mahasiswa):', '-', 'IL0014'),
('IL20027', 'Pembimbing Pendamping/Pembantu per orang (setiap mahasiswa):', '-', 'IL0014'),
('IL20028', 'Ketua penguji', 'II.E.1', 'IL0015'),
('IL20029', 'Anggota Penguji', 'II.E.2', 'IL0015'),
('IL20030', '-', '-', 'IL0016'),
('IL20031', '-', '-', 'IL0017'),
('IL20032', 'Buku Ajar', 'II.H.1', 'IL0018'),
('IL20033', 'Diktat,Modul, Petunjuk praktikum, Model, Alat bantu, Audio visual, Naskah tutorial, Job sheet praktikum terkait dengan mata kuliah yang diampu ', 'II.H.2', 'IL0018'),
('IL20034', '-', '-', 'IL0019'),
('IL20035', 'Rektor', 'II.J.1', 'IL0020'),
('IL20036', 'Wakil rektor/dekan/direktur program pasca sarjana/ketua lembaga', 'II.J.2', 'IL0020'),
('IL20037', 'Ketua sekolah tinggi/pembantu dekan/asisten direktur program pasca sarjana/direktur politeknik/koordinator kopertis', 'II.J.3', 'IL0020'),
('IL20038', 'Pembantu ketua sekolah tinggi/pembantu direktur politeknik', 'II.J.4', 'IL0020'),
('IL20039', 'Direktur Akademi', 'II.J.5', 'IL0020'),
('IL20040', 'Pembantu direktur politeknik, ketua jurusan/ bagian pada universitas/ institut/sekolah tinggi', 'II.J.6', 'IL0020'),
('IL20041', 'Pembantu direktur akademi/ketua jurusan/ketua prodi pada universitas/politeknik/akademi, sekretaris jurusan/bagian pada universitas/institut/sekolah tinggi', 'II.J.7', 'IL0020'),
('IL20042', 'Sekretaris jurusan pada politeknik/akademi dan kepala laboratorium (bengkel) universitas/institut/sekolah tinggi/politeknik/akademi', 'II.J.8', 'IL0020'),
('IL20043', 'Pembimbing pencangkokan', 'II.K.1', 'IL0021'),
('IL20044', 'Reguler', 'II.K.2', 'IL0021'),
('IL20045', 'Detasering', 'II.L.1', 'IL0022'),
('IL20046', 'Pencangkokan', 'II.L.2', 'IL0022'),
('IL20047', 'Lamanya lebih dari 960 jam', 'II.M.1', 'IL0023'),
('IL20048', 'Lamanya antara  641- 960 jam', 'II.M.2', 'IL0023'),
('IL20049', 'Lamanya antara 481- 640 jam', 'II.M.3', 'IL0023'),
('IL20050', 'Lamanya antara 161- 480 jam', 'II.M.4', 'IL0023'),
('IL20051', 'Lamanya antara   81- 160 jam', 'II.M.5', 'IL0023'),
('IL20052', 'Lamanya antara 30 - 80 jam', 'II.M.6', 'IL0023'),
('IL20053', 'Lamanya antara 10 - 30 jam', 'II.M.7', 'IL0023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblv3`
--

CREATE TABLE `tblv3` (
  `idLv3` varchar(10) NOT NULL,
  `namaKegiatanLv3` varchar(50) NOT NULL,
  `idLv2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblv3`
--

INSERT INTO `tblv3` (`idLv3`, `namaKegiatanLv3`, `idLv2`) VALUES
('IL30001', 'Buku referensi', 'IL20001'),
('IL30002', 'Monograf', 'IL20001'),
('IL30003', 'Internasional', 'IL20002'),
('IL30004', 'Nasional', 'IL20002'),
('IL30005', 'Jurnal internasional bereputasi (terindeks pada da', 'IL20003'),
('IL30006', 'Jurnal internasional terindeks pada database inter', 'IL20003'),
('IL30007', 'Jurnal internasional terindekss pada database inte', 'IL20003'),
('IL30008', 'Jurnal Nasional terakreditasi ', 'IL20003'),
('IL30009', 'Jurnal Nasional berbahasa Indonesia  terindeks pad', 'IL20003'),
('IL30010', 'Jurnal Nasional', 'IL20003'),
('IL30011', 'Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB ', 'IL20003'),
('IL30012', 'Internasonal', 'IL20004'),
('IL30013', 'Nasional', 'IL20004'),
('IL30014', 'Internasonal', 'IL20005'),
('IL30015', 'Nasional', 'IL20005'),
('IL30016', 'Internasonal', 'IL20006'),
('IL30017', 'Nasional', 'IL20006'),
('IL30018', 'Internasonal', 'IL20007'),
('IL30019', 'Nasional', 'IL20007'),
('IL30020', '-', 'IL20008'),
('IL30021', '-', 'IL20009'),
('IL30022', '-', 'IL20010'),
('IL30023', '-', 'IL20011'),
('IL30024', '-', 'IL20012'),
('IL30025', '-', 'IL20013'),
('IL30026', '-', 'IL20014'),
('IL30027', '-', 'IL20015'),
('IL30028', '-', 'IL20016'),
('IL30029', '-', 'IL20017'),
('IL30030', '-', 'IL20018'),
('IL30031', '-', 'IL20019'),
('IL30032', '-', 'IL20020'),
('IL30033', 'beban mengajar 10 sks pertama', 'IL20021'),
('IL30034', 'beban mengajar 2 sks berikutnya', 'IL20021'),
('IL30035', 'beban mengajar 10 sks pertama', 'IL20022'),
('IL30036', 'beban mengajar 2 sks berikutnya', 'IL20022'),
('IL30037', 'Melakukan pengajaran untuk peserta   pendidikan do', 'IL20023'),
('IL30038', 'Melakukan pengajaran   Konsultasi spesialis  kepad', 'IL20023'),
('IL30039', 'Melakukan pemeriksaan luar dengan pembimbingan ter', 'IL20023'),
('IL30040', 'Melakukan pemeriksaan dalam dengan pembimbingan te', 'IL20023'),
('IL30041', 'Menjadi saksi ahli dengan  pembimbingan terhadap p', 'IL20023'),
('IL30042', '-', 'IL20024'),
('IL30043', '-', 'IL20025'),
('IL30044', 'Disertasi', 'IL20026'),
('IL30045', 'Tesis', 'IL20026'),
('IL30046', 'Skripsi', 'IL20026'),
('IL30047', 'Laporan akhir studi ', 'IL20026'),
('IL30048', 'Disertasi', 'IL20027'),
('IL30049', 'Tesis', 'IL20027'),
('IL30050', 'Skripsi', 'IL20027'),
('IL30051', 'Laporan akhir studi', 'IL20027'),
('IL30052', '-', 'IL20028'),
('IL30053', '-', 'IL20029'),
('IL30054', '-', 'IL20030'),
('IL30055', '-', 'IL20031'),
('IL30056', '-', 'IL20032'),
('IL30057', '-', 'IL20033'),
('IL30058', '-', 'IL20034'),
('IL30059', '-', 'IL20035'),
('IL30060', '-', 'IL20036'),
('IL30061', '-', 'IL20037'),
('IL30062', '-', 'IL20038'),
('IL30063', '-', 'IL20039'),
('IL30064', '-', 'IL20040'),
('IL30065', '-', 'IL20041'),
('IL30066', '-', 'IL20042'),
('IL30067', '-', 'IL20043'),
('IL30068', '-', 'IL20044'),
('IL30069', '-', 'IL20045'),
('IL30070', '-', 'IL20046'),
('IL30071', '-', 'IL20047'),
('IL30072', '-', 'IL20048'),
('IL30073', '-', 'IL20049'),
('IL30074', '-', 'IL20050'),
('IL30075', '-', 'IL20051'),
('IL30076', '-', 'IL20052'),
('IL30077', '-', 'IL20053');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbmatkul`
--

CREATE TABLE `tbmatkul` (
  `idMatkul` varchar(10) NOT NULL,
  `kodeMatkul` varchar(10) NOT NULL,
  `namaMatkul` varchar(50) NOT NULL,
  `sksMatkul` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbmatkul`
--

INSERT INTO `tbmatkul` (`idMatkul`, `kodeMatkul`, `namaMatkul`, `sksMatkul`) VALUES
('MK-0001', 'MK-0001', 'Pendidikan Agama', '2'),
('MK-0002', 'MK-0002', 'Pemograman Dasar', '3'),
('MK-0003', 'MK-0003', 'Bahasa Inggris I', '2'),
('MK-0004', 'MK-0004', 'Matematika', '3'),
('MK-0005', 'MK-0005', 'Bisnis Praktis I', '3'),
('MK-0006', 'MK-0006', 'Konsep Teknologi', '2'),
('MK-0007', 'MK-0007', 'Komputer Desain I', '2'),
('MK-0008', 'MK-0008', 'Teknik Pemprograman', '3'),
('MK-0009', 'MK-0009', 'Komputer Desain II', '2'),
('MK-0010', 'MK-0010', 'Aljabar Linier', '3'),
('MK-0011', 'MK-0011', 'Pemprograman Beorientasi Obyek I', '3'),
('MK-0012', 'MK-0012', 'Sistem Informasi Geografis', '2'),
('MK-0013', 'MK-0013', 'Pemprograman Terstruktur I', '3'),
('MK-0014', 'MK-0014', 'Bisnis Praktis II', '3'),
('MK-0015', 'MK-0015', 'Bahasa Ingris II', '2'),
('MK-0016', 'MK-0016', 'Teknik Digital', '3'),
('MK-0017', 'MK-0017', 'Sistem Informasi Manajemen', '2'),
('MK-0018', 'MK-0018', 'Pemprograman JAVA', '2'),
('MK-0019', 'MK-0019', 'Pendidikan Kewarganegaraan', '2'),
('MK-0020', 'MK-0020', 'Sistem Informasi Akuntansi', '3'),
('MK-0021', 'MK-0021', 'Pemprograman Beorientasi Obyek II', '3'),
('MK-0022', 'MK-0022', 'Pemprograman Terstruktur II', '3'),
('MK-0023', 'MK-0003', 'Bahasa Inggris 1', '2'),
('MK-0024', 'MK-0003', 'Bahasa Inggris 1', '2'),
('MK-0025', 'MK-0003', 'Bahasa Inggris 1', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpenelitian`
--

CREATE TABLE `tbpenelitian` (
  `idPenelitian` int(10) NOT NULL,
  `idLv1` varchar(10) NOT NULL,
  `idLv2` varchar(10) NOT NULL,
  `idLv3` varchar(10) NOT NULL,
  `judul` varchar(750) NOT NULL,
  `issn` varchar(50) NOT NULL,
  `tglPenelitian` varchar(50) NOT NULL,
  `satuanHasil` varchar(100) NOT NULL,
  `volumeKegiatan` varchar(50) NOT NULL,
  `angkaKredit` varchar(10) NOT NULL,
  `jumAngkaKredit` varchar(10) NOT NULL,
  `ket` varchar(2000) NOT NULL,
  `berkas` varchar(255) NOT NULL,
  `thn` int(5) NOT NULL,
  `idDosen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpenelitian`
--

INSERT INTO `tbpenelitian` (`idPenelitian`, `idLv1`, `idLv2`, `idLv3`, `judul`, `issn`, `tglPenelitian`, `satuanHasil`, `volumeKegiatan`, `angkaKredit`, `jumAngkaKredit`, `ket`, `berkas`, `thn`, `idDosen`) VALUES
(1, 'IL0001', 'IL20003', 'IL30005', 'Existence of Hopf Bifurcation in a Delay Partial Dependent Predator Prey Model with Allelopathic Effect', '1314-7579', 'Semester genap 2014/2015', 'Jurnal Ilmiah', '1', '10.95', '10.95', 'IJMA: International Journal of  Mathematical Analysis\r\nVol. 09 No. 41 Agustus 2014, hal: 2021-2028 = 8 halaman\r\n', '', 0, 'DS-A-0001'),
(2, 'IL0002', 'IL20006', 'IL30016', 'Stability Analysis of Predator-Prey with Allelopathic Effect', '978-0-7354-1293-4', 'Semester Gasal 2014/2015', 'Proceeding', '1', '0.5', '0.5', 'Prosiding Seminar Internasional Symomath 2014 hal: 59 – 63  = 6 halaman.', '', 2015, 'DS-A-0001'),
(3, 'IL0002', 'IL20004', 'IL30012', 'asdasdasdtttttt', '467243762439', 'pertengahan semester 2016/2017', 'jurnal', '1', '2.5', '2.5', '-fjhsfdhjs', '', 2017, 'DS-A-0002'),
(4, 'IL0007', 'IL20011', 'IL30023', 'Membuat Buku', '0138-2949', '1 Januari 2018', 'Buku', '12', '3', '36', 'Sudah Cetak', '', 2018, 'DS-A-0002'),
(5, 'IL0001', 'IL20001', 'IL30001', 'coba berkas', '1314-7579', 'Semester genap 2014/2015', 'Jurnal Ilmiah', '4', '0.5', '2', 'coba berkas', '1554435754Advanced.pdf', 2015, 'DS-A-0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengabdian`
--

CREATE TABLE `tbpengabdian` (
  `idPengabdian` int(10) NOT NULL,
  `idBagian` varchar(11) NOT NULL,
  `idBag1` int(11) NOT NULL,
  `namaKegiatan` varchar(750) NOT NULL,
  `tglKegiatan` varchar(50) NOT NULL,
  `satuanHasil` varchar(100) NOT NULL,
  `jumVolumKegiatan` varchar(50) NOT NULL,
  `angkaKredit` varchar(10) NOT NULL,
  `jumAngkaKredit` varchar(10) NOT NULL,
  `ket` varchar(2000) NOT NULL,
  `berkas` varchar(250) NOT NULL,
  `thn` varchar(5) NOT NULL,
  `idDosen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpengabdian`
--

INSERT INTO `tbpengabdian` (`idPengabdian`, `idBagian`, `idBag1`, `namaKegiatan`, `tglKegiatan`, `satuanHasil`, `jumVolumKegiatan`, `angkaKredit`, `jumAngkaKredit`, `ket`, `berkas`, `thn`, `idDosen`) VALUES
(1, 'A3', 39, 'Memberi pelatihan tentang pembelajaran matematika dengan operator dasar untuk anak sekolah dasar berbasis mobile.', '09/15/2015', '1 sks/ program', '1', '1', '1', 'IV.C.2/1\r\n-Scan surat tugas ketua LP3M No. 009/C-LP3M/IX/2015 tgl. 17-09-2015\r\n-Scan sertifikat sebagai pemateri\r\n-Soft copy materi dan absensi peserta pengabdian.\r\n-Legalisir surat tugas ketua LP3M No. 009/C-LP3M/IX/2015 tgl. 17-09-2015\r\n-Legalisir sertifikat sebagai pemateri\r\n-Dokumentasi materi dan absensi peserta pengabdian yang dilegalisir', '', '2015', 'DS-A-0001'),
(3, 'A2', 44, 'asdasd', 'pertengahan semester 2017/2018', 'sertifikat', '1', '0.25', '0.25', 'asdasd', '', '2018', 'DS-A-0001'),
(4, 'A3', 33, 'pelatihan pembuatan program pengabdian dan penelitian serta penunjang', '07/31/2018', 'Sertifikat', '12', '1', '12', 'pelatihan pembuatan program pengabdian dan penelitian serta penunjang pelatihan', '', '2018', 'DS-A-0002'),
(5, 'A2', 44, 'gddfgdfd', '22 Juni 2018', 'vjh', '1', '1', '1', 'ghfhgfdghcvb', '', '2018', 'DS-A-0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengajaran`
--

CREATE TABLE `tbpengajaran` (
  `idPengajaran` int(11) NOT NULL,
  `idLv1` varchar(10) NOT NULL,
  `idLv2` varchar(10) NOT NULL,
  `idLv3` varchar(10) NOT NULL,
  `uraian` varchar(750) NOT NULL,
  `tglPengajaran` varchar(50) NOT NULL,
  `satuanHasil` varchar(100) NOT NULL,
  `jumVolumKegiatan` varchar(50) NOT NULL,
  `angkaKredit` varchar(10) NOT NULL,
  `jumAngkaKredit` varchar(10) NOT NULL,
  `ket` varchar(2000) NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `thn` varchar(5) NOT NULL,
  `idDosen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpengajaran`
--

INSERT INTO `tbpengajaran` (`idPengajaran`, `idLv1`, `idLv2`, `idLv3`, `uraian`, `tglPengajaran`, `satuanHasil`, `jumVolumKegiatan`, `angkaKredit`, `jumAngkaKredit`, `ket`, `file`, `thn`, `idDosen`) VALUES
(1, 'IL0009', 'IL20019', 'IL30031', 'Lulus S2', '27 Agustus 2014', 'Ijazah S2', '1', '150', '150', '1\r\nScan Ijazah S2 asli\r\nLegalisir ijazah S2\r\nLegalisir transkrip S2\r\n', '15471077765b56aecd2a162.pdf', '2014', 'DS-A-0001'),
(2, 'IL0011', 'IL20021', 'IL30033', 'Matematika : 3 sks, mengajar 2 kelas = 6 sks', 'Semester gasal 2014/2015', '10 sks pertama', '10', '0.5', '5', '-', '1554433039testing.pdf', '2015', 'DS-A-0001'),
(3, 'IL0011', 'IL20021', 'IL30034', 'Matematika Diskrit : 3 sks, mengajar 2 kelas = 6 sks', 'Semester gasal 2014/2015', '2 sks berikut-nya', '2', '0.25', '0.5', '-Scan SK Ketua No. 846/ KA/ STMIK-ASIA/ IX/ 2014 tgl. 10-09-2014\r\n-Legalisir SK Ketua No. 846/ KA/ STMIK-ASIA/ IX/ 2014 tgl. 10-09-2014\r\n-Lampiran SK Ketua', '', '2015', 'DS-A-0001'),
(6, 'IL0011', 'IL20021', 'IL30033', 'Matematika : 3 sks, mengajar 3 kelas = 9 sks', 'Semester gasal 2015/2016', '10 sks pertama', '10', '0.5', '5', 'asdasd', '', '2016', 'DS-A-0001'),
(7, 'IL0011', 'IL20021', 'IL30034', 'Matematika Diskrit : 3 sks, mengajar 1 kelas = 3 sks', 'Semester gasal 2015/2016', '2 sks berikut-nya', '2', '0.25', '0.5', '-Scan SK Ketua No. 722/ KA/ STMIK-ASIA/ IX/ 2015 tgl. 1-09-2015\r\n-Legalisir SK Ketua No. 722/ KA/ STMIK-ASIA/ IX/ 2015 tgl. 1-09-2015\r\n-Lampiran SK Ketua', '', '2016', 'DS-A-0001'),
(8, 'IL0016', 'IL20030', 'IL30054', 'Penasehat Akademik 29 mahasiswa', 'Semester gasal  2014/2015', 'setiap semester', '1', '2', '2', '-Scan SK Pembantu Ketua I STMIK No. 864/ KI/ STMIK-ASIA /III/2014 tgl. 1-09-2014\r\n-Legalisir SK Pembantu Ketua I STMIK No. 864/ KI/ STMIK-ASIA /III/2014 tgl. 1-09-2014\r\n-Lampiran SK Ketua', '', '2015', 'DS-A-0001'),
(9, 'IL0016', 'IL20030', 'IL30054', 'Penasehat Akademik 29 mahasiswa', 'Semester genap 2014/2015', 'setiap semester', '1', '2', '2', '-Scan SK Pembantu Ketua I STMIK No. 190/ KI/ STMIK-ASIA /III/2015 tgl. 1-03-2015\r\n-Legalisir SK Pembantu Ketua I STMIK No. 190/ KI/ STMIK-ASIA /III/2015 tgl. 1-03-2015\r\n-Lampiran SK Ketua', '', '2015', 'DS-A-0001'),
(10, 'IL0016', 'IL20030', 'IL30054', 'Penasehat Akademik 29 mahasiswa', 'Semester gasal 2015/2016', 'setiap semester', '1', '2', '2', '-Scan SK Pembantu Ketua I STMIK No. 732/ K1/ STMIK-ASIA /IX/2015 tgl.1-10-2015\r\n-Legalisir SK Pembantu Ketua I STMIK No. 732/ K1/ STMIK-ASIA /IX/2015 tgl. 1-10-2015\r\n-Lampiran SK Ketua', '', '2016', 'DS-A-0001'),
(11, 'IL0009', 'IL20019', 'IL30031', 'Lulus S2', '27 Agustus 2013', 'Ajizah S2', '1', '150', '150', '-', '', '2013', 'DS-A-0002'),
(12, 'IL0011', 'IL20023', 'IL30037', 'asdasd', 'Semester Genap 2017/2018', 'asdasdasd', '2', '0.25', '0.5', 'blablablabla', '', '2018', 'DS-A-0001'),
(13, 'IL0009', 'IL20018', 'IL30030', '55', 'Semester Genap 2017/2018', 'Sertifikat', '1', '4', '4', '555', '', '2018', 'DS-A-0002'),
(14, 'IL0020', 'IL20038', 'IL30062', 'uu', '2 September 2017', 'uu', '09', '08', '72', 'uu', '', '2017', 'DS-A-0002'),
(15, 'IL0009', 'IL20019', 'IL30031', 'asdf', 'Semester gasal 2014/2015', 'ijazah', '1', '1', '1', 'aaaa', '15471077765b56aecd2a162.pdf', '2015', 'DS-A-0001'),
(16, 'IL0009', 'IL20019', 'IL30031', 'menyelesaikan pendidikan S2', 'Semester genap 2014/2015', 'Ijazah', '1', '1.5', '1.5', 'berkas pelengkap berupa fotocopy ijazah S2', '1554433842OOP dengan ruby.pdf', '2015', 'DS-A-0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengampu`
--

CREATE TABLE `tbpengampu` (
  `idPengampu` varchar(10) NOT NULL,
  `idDosen` varchar(10) NOT NULL,
  `idMatkul` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpenunjang`
--

CREATE TABLE `tbpenunjang` (
  `idPenunjang` int(10) NOT NULL,
  `idBagian` varchar(11) NOT NULL,
  `idBag1` int(11) NOT NULL,
  `namaKegiatan` varchar(750) NOT NULL,
  `tglKegiatan` varchar(50) NOT NULL,
  `satuanHasil` varchar(100) NOT NULL,
  `jumVolumKegiatan` varchar(50) NOT NULL,
  `angkaKredit` varchar(10) NOT NULL,
  `jumAngkaKredit` varchar(10) NOT NULL,
  `ket` varchar(2000) NOT NULL,
  `berkas` varchar(250) NOT NULL,
  `thn` varchar(5) NOT NULL,
  `idDosen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbpenunjang`
--

INSERT INTO `tbpenunjang` (`idPenunjang`, `idBagian`, `idBag1`, `namaKegiatan`, `tglKegiatan`, `satuanHasil`, `jumVolumKegiatan`, `angkaKredit`, `jumAngkaKredit`, `ket`, `berkas`, `thn`, `idDosen`) VALUES
(1, 'P1', 1, 'Panitia Pengenalan Kehidupan Kampus Mahasiswa Baru (PKKMB)', 'Semester Genap 2017/2018', 'Sertifikat', '1', '1', '1', 'Scan surat tugas ketua No. 1009/KA/ PERTI-ASIA/ X/2014 tgl. 7-10-2014', '', '2018', 'DS-A-0001'),
(2, 'P7', 18, 'Peserta Workshop Hibah Buku Teks Perguruan Tinggi & Hibah Penelitian Dosen', '03/14/2018', 'Sertifikat', '1', '0.5', '0.5', 'VI.F.2/2\r\n-Scan surat tugas ketua LP3M No. 001/C-LP3M/ / IX/2015 tgl. 28-09-2015\r\n-Scan sertifikat asli menjadi peserta\r\n-Legalisir surat tugas ketua  LP3M No. 001/C-LP3M//IX/2015 tgl. 28-09-2015\r\n', '', '2018', 'DS-A-0001'),
(3, 'P7', 20, 'Peserta Workshop Sistem Penjaminan Mutu Internal sebagai Awal Tercapainya Lulusan Berkualitas dan Berdaya Saing Tinggi', 'Semester  gasalTA. 2015/2016', 'Sertifikat', '1', '1', '1', 'VI.F.2/3\r\n-Scan surat tugas pembantu ketua 1  No. 800/K1/ STMIK-ASIA/ IX/2015 tgl. 28-09-2015\r\n-Scan sertifikat asli menjadi peserta\r\n-Legalisir surat tugas pembantu ketua 1 No. No. 800/K1/ STMIK-ASIA/ IX/2015 tgl. 28-09-2015\r\n', '', '2016', 'DS-A-0001'),
(4, 'P3', 8, 'shsfdhjsf', '03/26/2018', 'sertfikat', '1', '1', '1', 'fsjdfjsfdj', '', '2018', 'DS-A-0002'),
(5, 'P10', 31, 'asdasdasdasd', '04/04/2018', 'sertfikat', '1', '1', '1', 'gsjdgksjgdkjdsgjk', '', '2018', 'DS-A-0001'),
(6, 'P10', 31, 'asdasdasd', 'pertengahan semester 2017/2018', 'sertifikat', '1', '0.98', '0.98', 'asdsagsgf', '', '2018', 'DS-A-0001'),
(8, 'P3', 7, 'Seminar', '22 Juni 2018', 'Setifikat', '2', '1', '2', 'Selesai', '', '2018', 'DS-A-0002'),
(9, 'P1', 2, 'dasgfdgd', 'semester genap 2018/2019', 'Sertifikat', '1', '5', '5', 'sgdfs', '', '2019', 'DS-A-0002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbbagian`
--
ALTER TABLE `tbbagian`
  ADD PRIMARY KEY (`idBagian`);

--
-- Indeks untuk tabel `tbbagian1`
--
ALTER TABLE `tbbagian1`
  ADD PRIMARY KEY (`idBag1`),
  ADD KEY `idBagian` (`idBagian`);

--
-- Indeks untuk tabel `tbdosen`
--
ALTER TABLE `tbdosen`
  ADD PRIMARY KEY (`idDosen`);

--
-- Indeks untuk tabel `tbdupak`
--
ALTER TABLE `tbdupak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDosen` (`idDosen`);

--
-- Indeks untuk tabel `tblv1`
--
ALTER TABLE `tblv1`
  ADD PRIMARY KEY (`idLv1`);

--
-- Indeks untuk tabel `tblv2`
--
ALTER TABLE `tblv2`
  ADD PRIMARY KEY (`idLv2`);

--
-- Indeks untuk tabel `tblv3`
--
ALTER TABLE `tblv3`
  ADD PRIMARY KEY (`idLv3`),
  ADD KEY `idLv2` (`idLv2`);

--
-- Indeks untuk tabel `tbmatkul`
--
ALTER TABLE `tbmatkul`
  ADD PRIMARY KEY (`idMatkul`);

--
-- Indeks untuk tabel `tbpenelitian`
--
ALTER TABLE `tbpenelitian`
  ADD PRIMARY KEY (`idPenelitian`),
  ADD KEY `tbpenelitian_ibfk_1` (`idDosen`);

--
-- Indeks untuk tabel `tbpengabdian`
--
ALTER TABLE `tbpengabdian`
  ADD PRIMARY KEY (`idPengabdian`),
  ADD KEY `tbpengabdian_ibfk_1` (`idDosen`);

--
-- Indeks untuk tabel `tbpengajaran`
--
ALTER TABLE `tbpengajaran`
  ADD PRIMARY KEY (`idPengajaran`),
  ADD KEY `idDosen` (`idDosen`);

--
-- Indeks untuk tabel `tbpengampu`
--
ALTER TABLE `tbpengampu`
  ADD PRIMARY KEY (`idPengampu`),
  ADD KEY `idDosen` (`idDosen`),
  ADD KEY `idMatkul` (`idMatkul`);

--
-- Indeks untuk tabel `tbpenunjang`
--
ALTER TABLE `tbpenunjang`
  ADD PRIMARY KEY (`idPenunjang`),
  ADD KEY `idBag1` (`idBag1`),
  ADD KEY `idBagian` (`idBagian`),
  ADD KEY `tbpenunjang_ibfk_1` (`idDosen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbbagian1`
--
ALTER TABLE `tbbagian1`
  MODIFY `idBag1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbbagian1`
--
ALTER TABLE `tbbagian1`
  ADD CONSTRAINT `tbbagian1_ibfk_1` FOREIGN KEY (`idBagian`) REFERENCES `tbbagian` (`idBagian`);

--
-- Ketidakleluasaan untuk tabel `tbdupak`
--
ALTER TABLE `tbdupak`
  ADD CONSTRAINT `tbdupak_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `tbdosen` (`idDosen`);

--
-- Ketidakleluasaan untuk tabel `tblv3`
--
ALTER TABLE `tblv3`
  ADD CONSTRAINT `tblv3_ibfk_1` FOREIGN KEY (`idLv2`) REFERENCES `tblv2` (`idLv2`);

--
-- Ketidakleluasaan untuk tabel `tbpenelitian`
--
ALTER TABLE `tbpenelitian`
  ADD CONSTRAINT `tbpenelitian_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `tbdosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbpengabdian`
--
ALTER TABLE `tbpengabdian`
  ADD CONSTRAINT `tbpengabdian_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `tbdosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbpengajaran`
--
ALTER TABLE `tbpengajaran`
  ADD CONSTRAINT `tbpengajaran_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `tbdosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbpengampu`
--
ALTER TABLE `tbpengampu`
  ADD CONSTRAINT `tbpengampu_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `tbdosen` (`idDosen`),
  ADD CONSTRAINT `tbpengampu_ibfk_2` FOREIGN KEY (`idMatkul`) REFERENCES `tbmatkul` (`idMatkul`);

--
-- Ketidakleluasaan untuk tabel `tbpenunjang`
--
ALTER TABLE `tbpenunjang`
  ADD CONSTRAINT `tbpenunjang_ibfk_1` FOREIGN KEY (`idDosen`) REFERENCES `tbdosen` (`idDosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpenunjang_ibfk_2` FOREIGN KEY (`idBag1`) REFERENCES `tbbagian1` (`idBag1`),
  ADD CONSTRAINT `tbpenunjang_ibfk_3` FOREIGN KEY (`idBagian`) REFERENCES `tbbagian` (`idBagian`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
