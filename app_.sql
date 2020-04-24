-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 08:07 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_berita`
--

CREATE TABLE `app_berita` (
  `id` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `judul` text NOT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_update` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_berita`
--

INSERT INTO `app_berita` (`id`, `id_pengurus`, `judul`, `gambar`, `isi`, `tanggal`, `tanggal_update`) VALUES
(1, 3, 'Ini Panduan Puasa Aman dan Sehat untuk Ibu Hamil', '../berita/file/dmssucz6ysfxu17t0hmd.png', '<p>Catat, Ini Panduan Puasa Aman dan Sehat untuk Ibu Hamil</p>\r\n\r\n<p>Hamil memang bukan kondisi yang dilarang untuk berpuasa. Namun agar janin dan ibu tetap sehat selama berpuasa maka ibu hamil harus memperhatikan asupan yang dikonsumsi ya.</p>\r\n\r\n<p>Disampaikan dr. Juwalita Surapsari, M. Gizi, Sp.GK &ndash; dokter spesialis gizi klinik RS Pondok Indah &ndash; Pondok Indah, secara medis, ibu hamil yang diperbolehkan berpuasa ketika sudah memasuki trisemester dua dan tiga.</p>\r\n', '2019-05-02 16:13:45', '2019-06-30 05:54:32'),
(2, 3, '4 Makanan yang Tingkatkan Risiko Keguguran', '../berita/file/ib5pbhixe6usppsndvqp.png', '<p>Terlepas dari masalah gaya hidup dan masalah genetik, ada makanan tertentu yang dapat meningkatkan risiko keguguran. Berikut daftarnya seperti melansir Thehealthsite.</p>\r\n\r\n<p>1. Nanas Buah satu ini sejak lama dikatakan dapat meningkatian risiko keguguran karena kandungan bromelainnya. Mengonsumsi nanas dapat melunakkan leher rahim dan memicu kontraksi yang menyebabkan keguguran.</p>\r\n\r\n<p>2. Pepaya Pepaya juga disebut mengandung komponen yang bertindak sebagai pencahar dan dapat memicu keguguran. Pepaya yang dimaksud ialah pepaya mentah atau belum sepenuhnya matang.</p>\r\n\r\n<p>3. Produk susu mentah Produk susu yang tidak dipasteurisasi seperti susu dan keju feta dapat membawa bakteri pembawa penyakit seperti Listeria monocytogenes yang dapat menyebabkan keguguran. Karenanya ibu hamik disarankan untuk tidak mengonsumsi produk tersebut.</p>\r\n\r\n<p>4. Telur Telur membawa bakteri yang disebut salmonella yang dapat menyebabkan sakit usus atau bahkan keguguran, khususnya jika mengonsumsinya dengan tidak matang atau setengah matang. Maka dari itu, hati-hati memasaknya.</p>\r\n', '2019-05-02 16:24:00', '2019-06-30 15:21:37'),
(3, 4, 'Studi: Konsumsi Minyak Ikan Saat Hamil Buat Pertumbuhan Anak Lebih Baik', '../berita/file/5vy5ngzmazc2g64q2j04.png', '<p><p><strong>Suara.com -&nbsp;</strong>Sebuah&nbsp;<a href=\"https://www.suara.com/tag/studi\">studi</a>&nbsp;menyebutkan, wanita hamil yang mengonsumsi suplemen&nbsp;<a href=\"https://www.suara.com/tag/minyak-ikan\">minyak ikan</a>&nbsp;bisa meningkatkan&nbsp;<a href=\"https://www.suara.com/tag/pertumbuhan-bayi\">pertumbuhan bayi</a>&nbsp;hingga ia usia 6 tahun.&nbsp;</p></p><p><p>Mengonsumsi suplemen asam lemak tak jenuh seperti minyak ikan, dikaitkan dengan anak-anak yang memiliki massa lemak dan massa&nbsp;<a href=\"https://www.suara.com/tag/tulang\">tulang</a>&nbsp;yang lebih tinggi pada usia enam tahun dalam penelitian ini, yang diterbitkan dalam jurnal&nbsp;<em>The BMJ.</em></p></p><p><p>Hans Bisgaard, Profesor Pediatrics di Unviersity Copenhagen dan penulis penelitian ini, mengatakan, &quot;Studi ini membuktikan kesehatan dan penyakit tidak hanya ditentukan oleh paparan genetika dan pasca-kelahiran,&quot; dikutip&nbsp;<em>HiMedik</em>&nbsp;dari&nbsp;<em>newsweek</em>.</p>\r\n</p>', '2019-05-02 16:50:05', '2019-05-02 16:50:05'),
(5, 1, 'Sering Mual Saat Hamil Pertanda Miliki Bayi Cerdas', '../berita/file/mxfkz1yvcmfy1qza141a.png', '<p><strong>Liputan6, Jakarta -</strong>&nbsp;Penelitian yang diterbitkan dalam&nbsp;<em>The Journal of Pediatrics</em>mengungkapkan bahwa mual yang terjadi selama kehamilan adalah tanda calon bayi cerdas. Selain itu, semakin tinggi intensitas mual, semakin tinggi pula prediksi kecerdasan anak-anak.</p>\r\n', '2019-05-11 16:26:18', '2019-05-12 13:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `app_checkup`
--

CREATE TABLE `app_checkup` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tanggal_cek` date NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `keluhan` text NOT NULL,
  `tekanan_darah` varchar(225) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `umur_kehamilan` int(11) NOT NULL,
  `tinggi_fundus` text NOT NULL,
  `denyut_jantung` text NOT NULL,
  `hasil` text NOT NULL,
  `letak_janin` text NOT NULL,
  `tindakan` text NOT NULL,
  `nasehat` text NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_checkup`
--

INSERT INTO `app_checkup` (`id`, `id_pasien`, `id_pengurus`, `id_jadwal`, `tanggal_cek`, `gambar`, `keluhan`, `tekanan_darah`, `berat_badan`, `umur_kehamilan`, `tinggi_fundus`, `denyut_jantung`, `hasil`, `letak_janin`, `tindakan`, `nasehat`, `tanggal_kembali`, `tanggal_update`) VALUES
(3, 5, 4, 4, '2019-05-12', '', '<p>Tidak ada</p>\r\n', '110', 130, 14, '<p>Baik sekali.</p>\r\n', '110', '', 'bagus', '<p>Pemberian Terapi</p>\r\n', '<p>Banyak Mengkonsumsi Buah</p>\r\n', '2019-05-20', '2019-05-12 13:38:46'),
(11, 9, 3, 11, '2019-06-22', '../jadwal-checkup/file/wnceb86iz2i6v181sttu.png', '<p>Sering mual</p>\r\n', '110', 80, 11, '4 cm', '110', '<p>Baik</p>\r\n', 'bagus', '<p>Pemberian Obat</p>\r\n', '<p>Jangan sering berlari.</p>\r\n', '2019-07-23', '2019-06-27 22:33:22'),
(12, 3, 3, 12, '2019-06-30', '../jadwal-checkup/file/dt6w31ih8hndh0rjkijm.png', '<p>Sering mual dan sering pusing</p>\r\n', '110', 100, 14, '5 cm', '110', '<p>Sangat baik.</p>\r\n', 'normal', '<p>Pemberian obat Fe.</p>\r\n', '<p>Jangan terlalu kecapekan</p>\r\n', '2019-08-20', '2019-06-30 05:54:06'),
(13, 3, 3, 15, '2019-06-30', '', '<p>Sering mual dan susah tidur</p>\r\n', '110', 90, 15, '3 cm', '110', '<p>Sangat Baik.</p>\r\n', 'normal', '<p>Pemberian Terapi</p>\r\n', '<p>Jangan begadangan, tidurkan saja ibu</p>\r\n', '2019-08-22', '2019-06-30 06:08:00'),
(14, 3, 3, 22, '2019-07-09', '../jadwal-checkup/file/yx2qm7v55sg6xmidkrey.png', '<p>Sering Mual</p>\r\n', '115', 98, 19, '3 cm', '110', '<p>Baik</p>\r\n', 'normal', '<p>Pemberian Obat</p>\r\n', '<p>Tidak ada.</p>\r\n', '2019-08-16', '2019-07-09 01:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `app_jadwal`
--

CREATE TABLE `app_jadwal` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `trisemester` int(3) NOT NULL,
  `tanggal_checkup` date NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `tanggal_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_jadwal`
--

INSERT INTO `app_jadwal` (`id`, `id_pasien`, `id_pengurus`, `trisemester`, `tanggal_checkup`, `tanggal_dibuat`, `tanggal_update`) VALUES
(4, 5, 4, 1, '2019-05-12', '2019-05-12', '2019-05-12 13:37:47'),
(5, 5, 4, 2, '2019-05-20', '2019-05-12', '2019-05-12 13:38:46'),
(11, 9, 3, 1, '2019-06-22', '2019-06-22', '2019-06-22 14:49:55'),
(12, 3, 3, 1, '2019-06-30', '2019-06-30', '2019-06-30 04:02:50'),
(15, 3, 3, 2, '2019-06-30', '2019-06-30', '2019-06-30 04:50:45'),
(21, 1, 3, 1, '2019-07-03', '2019-06-30', '2019-06-30 15:28:40'),
(22, 3, 3, 2, '2019-07-09', '2019-07-09', '2019-07-09 01:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `app_laporan`
--

CREATE TABLE `app_laporan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_kejadian` datetime NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT '0',
  `tanggal_penanganan` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_laporan`
--

INSERT INTO `app_laporan` (`id`, `id_pasien`, `lokasi`, `keterangan`, `tanggal_kejadian`, `status`, `tanggal_penanganan`) VALUES
(1, 1, 'https://goo.gl/maps/gXsEB3PYfo2WYE3P8', 'pendarahan', '2019-04-28 22:00:00', '1', '2019-04-28 22:18:51'),
(2, 1, 'https://goo.gl/maps/gXsEB3PYfo2WYE3P8', 'pendarahan', '2019-05-06 13:12:00', '1', '2019-05-06 13:38:11'),
(3, 3, 'https://goo.gl/maps/gXsEB3PYfo2WYE3P8', '', '2019-05-08 22:39:00', '1', '2019-05-15 14:03:35'),
(4, 4, 'https://goo.gl/maps/gXsEB3PYfo2WYE3P8', '', '2019-05-08 22:39:00', '1', '2019-06-30 05:37:00'),
(5, 4, 'https://goo.gl/maps/gXsEB3PYfo2WYE3P8', '', '2019-06-09 22:39:00', '1', '2019-07-08 16:40:40'),
(6, 1, 'https://goo.gl/maps/gXsEB3PYfo2WYE3P8', 'pendarahan', '2019-07-08 16:42:00', '0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `app_pasien`
--

CREATE TABLE `app_pasien` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` date NOT NULL,
  `kepala_keluarga` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `prediksi_kelahiran` date NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_pasien`
--

INSERT INTO `app_pasien` (`id`, `nik`, `password`, `nama`, `ttl`, `kepala_keluarga`, `alamat`, `telp`, `prediksi_kelahiran`, `id_pengurus`, `status`, `tanggal`) VALUES
(1, '163140714111051', '202cb962ac59075b964b07152d234b70', 'Dummy', '1997-02-09', 'Dummy Husband', 'Malang Raya', '081234567890', '2020-01-22', 3, 1, '2019-04-28'),
(3, '163140714111057', '202cb962ac59075b964b07152d234b70', 'Fitriana', '1996-02-29', 'Dummy Husband 2', 'Malang Raya', '081234567890', '2020-02-22', 3, 1, '2019-05-02'),
(4, '163140714111055', '202cb962ac59075b964b07152d234b70', 'Alma', '1998-02-09', 'Dummy Husband 3', 'Malang Raya', '081234567890', '2020-01-22', 4, 0, '2019-05-02'),
(5, '163140714111002', '202cb962ac59075b964b07152d234b70', 'Anisa Solihah', '1996-10-16', 'Dummy Husband 4', 'Malang Raya', '081234567890', '2020-02-13', 4, 0, '2019-05-12'),
(9, '1234567897890', '202cb962ac59075b964b07152d234b70', 'Bella Dwi', '1997-02-09', 'Chandra Yogi A', 'Malang Raya', '081234567890', '2020-03-03', 3, 1, '2019-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `app_pengurus`
--

CREATE TABLE `app_pengurus` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `reset_password` text NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `rumah_sakit` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_pengurus`
--

INSERT INTO `app_pengurus` (`id`, `nip`, `nama`, `username`, `password`, `reset_password`, `alamat`, `jabatan`, `rumah_sakit`, `type`, `status`, `tanggal`) VALUES
(1, '1234567890', 'Bella Dwi', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', '202cb962ac59075b964b07152d234b70', 'Malang', 'IT Support', 'Gallery Chandra', 'superadmin', 'active', '2019-04-23'),
(2, '163140714111051', 'Elfa fatimah', 'elfa', '51be175064b4f48b156dcb82fbff3d03', '202cb962ac59075b964b07152d234b70', 'Jombang', 'Administrasi', 'Gallery Chandra', 'admin', 'active', '2019-04-24'),
(3, '163140714111001', 'Adhitama', 'adhitama', '7438ff8d795914da59e373e91bb8d39d', '202cb962ac59075b964b07152d234b70', 'Malang', 'Dokter Obgyn', 'Gallery Chandra', 'dokter', 'active', '2019-04-24'),
(4, '1631407141110042', 'Gelia', 'gelia', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Pringsewu', 'Dokter Obgyn', 'Gallery Chandra', 'dokter', 'active', '2019-04-28'),
(5, '163140714111063', 'Kiki', 'kiki', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Malang Raya', 'Dokter Obgyn', 'Gallery Chandra', 'dokter', 'active', '2019-05-12'),
(6, '163140714111072', 'Aufa', 'aufa', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Malang Raya', 'Administrasi', 'Gallery Chandra', 'admin', 'active', '2019-05-15'),
(7, '163140714111053', 'Gita Kusuma Wardani', 'gita', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Malang Raya', 'Dokter Obgyn', 'Gallery Chandra', 'dokter', 'active', '2019-06-22'),
(8, '163140714111054', 'Fadil', 'fadil', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Malang Raya', 'Dokter Obgyn', 'Gallery Chandra', 'dokter', 'active', '2019-06-22'),
(9, '163140714111055', 'Anisa Nur Istiqoah', 'anisanri', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Malang Raya', 'Administrasi', 'Gallery Chandra', 'admin', 'active', '2019-06-22'),
(11, '163140714111062', 'Ely Tsabisani', 'ely', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Malang Raya', 'Bidan', 'Gallery Chandra', 'bidan', 'active', '2019-06-22'),
(19, '163140714111056', 'abel', 'abella', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 'Malang Raya', 'administrator', 'Gallery Chandra', 'admin', 'active', '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `app_pertanyaan`
--

CREATE TABLE `app_pertanyaan` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(110) NOT NULL,
  `id_pengurus` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jawaban` text NOT NULL,
  `tanggal_jawab` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_pertanyaan`
--

INSERT INTO `app_pertanyaan` (`id`, `id_pasien`, `pertanyaan`, `gambar`, `id_pengurus`, `tanggal`, `jawaban`, `tanggal_jawab`) VALUES
(23, 4, 'Kenapa perut saya mual ya dok ?', '', 4, '2019-05-13', '', '2019-05-13 05:52:33'),
(27, 1, 'Kenapa perut saya mual ya dok ?', '', 3, '2019-05-13', '<p>Biasa itu bu</p>\r\n', '2019-05-13 05:52:33'),
(28, 1, 'Kenapa perut saya mual ya dok ?', '', 3, '2019-05-13', '', '2019-05-13 05:52:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_berita`
--
ALTER TABLE `app_berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indexes for table `app_checkup`
--
ALTER TABLE `app_checkup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_checkup_ibfk_3` (`id_jadwal`),
  ADD KEY `app_checkup_ibfk_4` (`id_pengurus`),
  ADD KEY `app_checkup_ibfk_1` (`id_pasien`);

--
-- Indexes for table `app_jadwal`
--
ALTER TABLE `app_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_jadwal_ibfk_3` (`id_pengurus`),
  ADD KEY `app_jadwal_ibfk_2` (`id_pasien`);

--
-- Indexes for table `app_laporan`
--
ALTER TABLE `app_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indexes for table `app_pasien`
--
ALTER TABLE `app_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengurus` (`id_pengurus`);

--
-- Indexes for table `app_pengurus`
--
ALTER TABLE `app_pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_pertanyaan`
--
ALTER TABLE `app_pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_pertanyaan_ibfk_1` (`id_pasien`),
  ADD KEY `app_pertanyaan_ibfk_2` (`id_pengurus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_berita`
--
ALTER TABLE `app_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `app_checkup`
--
ALTER TABLE `app_checkup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `app_jadwal`
--
ALTER TABLE `app_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `app_laporan`
--
ALTER TABLE `app_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `app_pasien`
--
ALTER TABLE `app_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `app_pengurus`
--
ALTER TABLE `app_pengurus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `app_pertanyaan`
--
ALTER TABLE `app_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_berita`
--
ALTER TABLE `app_berita`
  ADD CONSTRAINT `app_berita_ibfk_1` FOREIGN KEY (`id_pengurus`) REFERENCES `app_pengurus` (`id`);

--
-- Constraints for table `app_checkup`
--
ALTER TABLE `app_checkup`
  ADD CONSTRAINT `app_checkup_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `app_jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `app_jadwal`
--
ALTER TABLE `app_jadwal`
  ADD CONSTRAINT `app_jadwal_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `app_pasien` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `app_laporan`
--
ALTER TABLE `app_laporan`
  ADD CONSTRAINT `app_laporan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `app_pasien` (`id`);

--
-- Constraints for table `app_pasien`
--
ALTER TABLE `app_pasien`
  ADD CONSTRAINT `app_pasien_ibfk_1` FOREIGN KEY (`id_pengurus`) REFERENCES `app_pengurus` (`id`);

--
-- Constraints for table `app_pertanyaan`
--
ALTER TABLE `app_pertanyaan`
  ADD CONSTRAINT `app_pertanyaan_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `app_pasien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
