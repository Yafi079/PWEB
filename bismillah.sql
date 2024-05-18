-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 09:44 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bismillah`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `ID_Dokter` int(10) NOT NULL,
  `ID_Poli` int(11) NOT NULL,
  `Nama_dokter` varchar(50) NOT NULL,
  `Nomor_telepon` varchar(20) NOT NULL,
  `emailDokter` varchar(255) NOT NULL,
  `Tanggal_lahir` date NOT NULL,
  `Jenis_kelamin` varchar(10) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `passDokter` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`ID_Dokter`, `ID_Poli`, `Nama_dokter`, `Nomor_telepon`, `emailDokter`, `Tanggal_lahir`, `Jenis_kelamin`, `Alamat`, `passDokter`) VALUES
(1, 1, 'Dr. Muhammad Yafi', '08632726737', 'yafi@dokter.bhayangkara.com', '1998-12-01', 'laki-laki', 'Margorejo, Boyolali', '$2y$10$OuPG7HMsfkz8Jz9xD2EfGe4dNrSqN8eY1/4gTwOK3zbPzlfKKC3QS'),
(2, 2, 'Dr. Almendo', '08876543546', 'almendo@dokter.bhayangkara.com', '2012-12-06', 'Laki-laki', 'Papua barat', '$2y$10$7hVGWjl6ee1uTNY6xeRFf.cAerjOtdXhQfm/TveucrKTvOqS7GnE2'),
(3, 2, 'Dr. Novandy dzaky', '08435675543', 'novandy@dokter.bhayangkara.com', '2004-12-16', 'Laki-laki', 'Jakarta ', '$2y$10$2F1gaNLhvMy5uXcRPY3h3u6b0isDRO3l4RBKVLGguZ0SGwSCRXNHu'),
(4, 3, 'Dr. Miranda Tedjasaputra', '628745695412', 'miranda@dokter.bhayangkara.com', '1982-12-10', 'Perempuan', 'Sukolilo, Surabaya', '$2y$10$cPq8jaGBqDn5kN2jghzwsOhPXoyfwmGqE2qeScMgpM7QQ/mLb1baG\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `financial_report`
--

CREATE TABLE `financial_report` (
  `ID_pasien` int(10) NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `Kategori` varchar(255) DEFAULT NULL,
  `Detail` varchar(255) DEFAULT NULL,
  `Total` int(10) DEFAULT NULL,
  `hargabagian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial_report`
--

INSERT INTO `financial_report` (`ID_pasien`, `Tanggal`, `Kategori`, `Detail`, `Total`, `hargabagian`) VALUES
(8, '2023-02-09', 'kamar', 'VIP', 4000000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pemeriksaan`
--

CREATE TABLE `hasil_pemeriksaan` (
  `ID_pemeriksaan` int(10) NOT NULL,
  `ID_Dokter` int(10) DEFAULT NULL,
  `ID_pasien` int(10) DEFAULT NULL,
  `Tanggal_pemeriksaan` date DEFAULT NULL,
  `Suhu_badan` int(10) DEFAULT NULL,
  `Tekanan_darah` varchar(100) DEFAULT NULL,
  `Berat_badan` int(10) DEFAULT NULL,
  `Riwayat_alergi` varchar(255) DEFAULT NULL,
  `Keluhan_masuk` varchar(255) DEFAULT NULL,
  `Diagnosa_utama` varchar(255) DEFAULT NULL,
  `Diagnosa_sekunder` varchar(255) DEFAULT NULL,
  `Waktu_pemeriksaan` time DEFAULT NULL,
  `Tindakan` varchar(255) DEFAULT NULL,
  `Instruksi_lanjutan` varchar(255) DEFAULT NULL,
  `Pemeriksaan_fisik` varchar(255) DEFAULT NULL,
  `Hasil_pemeriksaan_penunjang` varchar(255) DEFAULT NULL,
  `Catatan` varchar(255) DEFAULT NULL,
  `Cara_keluar` enum('Melarikan diri','Dijinkan pulang','Pindah rumah sakit','Pulang paksa') DEFAULT NULL,
  `Kondisi_pasien` enum('Sembuh','Membaik','Belum sembuh','Meninggal','Perlu pengawasan') DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `kategori_pasien` enum('Rawat inap','Rawat jalan') DEFAULT NULL,
  `Ruang_rawat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_pemeriksaan`
--

INSERT INTO `hasil_pemeriksaan` (`ID_pemeriksaan`, `ID_Dokter`, `ID_pasien`, `Tanggal_pemeriksaan`, `Suhu_badan`, `Tekanan_darah`, `Berat_badan`, `Riwayat_alergi`, `Keluhan_masuk`, `Diagnosa_utama`, `Diagnosa_sekunder`, `Waktu_pemeriksaan`, `Tindakan`, `Instruksi_lanjutan`, `Pemeriksaan_fisik`, `Hasil_pemeriksaan_penunjang`, `Catatan`, `Cara_keluar`, `Kondisi_pasien`, `Status`, `kategori_pasien`, `Ruang_rawat`) VALUES
(1, 1, 1, '2022-12-01', 39, '140/80', 60, 'alergi ganja', 'badan pegal dan sesak nafas', 'covid 19', 'asma', '10:20:00', 'Di lakukan rawat inap', 'diberi obat', 'kurang istirahat', 'bisa di kirimkan di kamar untuk treatment', 'pola makan yang sesuai', 'Pindah rumah sakit', 'Meninggal', 'membaik', 'Rawat jalan', ''),
(6, 1, 1, '2022-12-02', 23, NULL, NULL, NULL, NULL, '', '', NULL, '', '', '', '', '', NULL, 'Perlu pengawasan', NULL, 'Rawat inap', ''),
(7, 1, 1, '2022-12-03', 23, NULL, NULL, NULL, NULL, 'iuy', 'rtrc', NULL, 'terc', 'tyhgrtfr', 'uyhygt', 'uhyt', 'iuhyt', NULL, 'Belum sembuh', NULL, 'Rawat inap', ''),
(8, 1, 1, '2024-12-06', 43, '129/80', 70, NULL, NULL, 'tgrfe', 'yhrtgr', '17:18:24', 'ujyhrtgr', 'ujtyhrtgr', 'utyrtgr', 'utyrt', 'iymutnyrtbvr', 'Dijinkan pulang', 'Membaik', 'memburuk', 'Rawat inap', ''),
(9, 1, 2, '2022-12-31', 50, '130/80', 70, 'alergi uang', 'mual', 'gangguan pada perut', 'gangguan pada rahim', '15:34:41', 'dilakukan rawat', 'menunggu dokter', 'badan tidak mendukung', 'bukti rontgen menyatakan hamil', 'pola makannya', 'Pulang paksa', 'Perlu pengawasan', 'waspada\r\n', 'Rawat inap', ''),
(31, 1, 3, '2022-11-02', 45, '100/80', 69, 'alergi obat', 'pusing', 'kurang uang', 'tugas berlebih', '22:11:43', 'dilakukan rawat jalan', 'inap', 'periksa', 'kurang sehat', 'tidak ada catatan', 'Pindah rumah sakit', 'Sembuh', 'bagus', 'Rawat jalan', ''),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xgfhcvghbkj', 'xfghkj', NULL, 'fchvjhbj', 'gfghjbj', 'fcjyhk', 'fhcgvjhb', 'erorrr', NULL, 'Belum sembuh', NULL, 'Rawat inap', ''),
(36, NULL, 2, '2023-01-12', NULL, NULL, NULL, NULL, NULL, 'xdfhgjkbn', 'fchgjkl', NULL, 'cvghbjk', 'dfhgjkb', 'tdrfyguhb', 'trftgyh', 'erorrrrrr', 'Melarikan diri', 'Membaik', 'lumayan', 'Rawat inap', ''),
(38, NULL, 3, '2023-01-13', NULL, NULL, NULL, NULL, NULL, 'xdtcfhvgjh', 'tfhvgbjk', NULL, 'dgfhvbj', 'tdfhgjbk', 'gfh', 'tfvghbnj', 'coba id', NULL, 'Sembuh', 'baik', 'Rawat inap', ''),
(39, NULL, 2, '2022-12-03', NULL, NULL, NULL, NULL, NULL, 'yrtulyhij', 'dtcfvgbh', NULL, 'tryvguhbnj', 'fchvgbjk', 'tryvuhbinj', 'cfvghbj', 'covba', NULL, 'Perlu pengawasan', NULL, 'Rawat inap', ''),
(40, NULL, 3, '2022-12-09', NULL, NULL, NULL, NULL, NULL, 'Sehat wal&#039;afiat', 'pusing EAS', NULL, 'Liburan panjang', 'camping', 'sehat ', 'stress', 'healing', 'Dijinkan pulang', 'Membaik', NULL, 'Rawat jalan', ''),
(41, NULL, 3, '2022-12-01', NULL, NULL, NULL, NULL, NULL, 'tes buttton', 'tes', NULL, 'tes', 'tes', 'tes', 'tes', 'tes', 'Melarikan diri', 'Belum sembuh', NULL, 'Rawat inap', ''),
(42, NULL, 3, '2022-12-10', NULL, NULL, NULL, NULL, NULL, '', 'fgbvfdd', NULL, '', 'c', '', 'dvdsc', 'cek cek resep dan tujuan', 'Melarikan diri', 'Belum sembuh', NULL, 'Rawat jalan', ''),
(43, NULL, 3, '2022-12-22', NULL, NULL, NULL, NULL, NULL, 'cek', 'cek', NULL, 'cek', 'cek', 'cek', 'cek', 'cek rujukan dan resep', 'Melarikan diri', 'Belum sembuh', NULL, 'Rawat inap', ''),
(45, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Hamil muda', 'bengkak bagian dalam', NULL, 'bedah perut', 'menunggu pemeriksaan selanjutnya', 'fisik normal', 'normal', 'akan dilakukan sesar', 'Pindah rumah sakit', 'Belum sembuh', NULL, 'Rawat inap', ''),
(46, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Hamil muda', 'bengkak bagian dalam', NULL, 'bedah perut', 'menunggu pemeriksaan selanjutnya', 'fisik normal', 'normal', 'akan dilakukan sesar', 'Pindah rumah sakit', 'Belum sembuh', NULL, 'Rawat inap', ''),
(47, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'gfgb', 'tcfhgj', NULL, 'fhvgbjn', 'ffvgh', 'cfgjh', 'dhgjn', 'fcghj', 'Melarikan diri', 'Belum sembuh', NULL, 'Rawat inap', ''),
(48, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'uygtf', 'tbhvgcf', NULL, 'hutygrfter', 'uthygrfter', 'juhtygfrtr', 'jiuhgyft', 'ijuhgyftr', 'Dijinkan pulang', 'Membaik', NULL, 'Rawat inap', ''),
(49, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'uygtf', 'tbhvgcf', NULL, 'hutygrfter', 'uthygrfter', 'juhtygfrtr', 'jiuhgyft', 'ijuhgyftr', 'Dijinkan pulang', 'Membaik', NULL, 'Rawat inap', ''),
(50, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'uygtf', 'tbhvgcf', NULL, 'hutygrfter', 'uthygrfter', 'juhtygfrtr', 'jiuhgyft', 'ijuhgyftr', 'Dijinkan pulang', 'Membaik', NULL, 'Rawat inap', ''),
(56, NULL, 1, '0000-00-00', 0, '', 0, '', 'mual mual', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Rawat inap', ''),
(73, 2, 1, '0000-00-00', 0, ' ', 0, '', '', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', ''),
(74, 2, 1, '2022-12-12', 0, ' asdf', 0, 'asdf', 'asfdasdf', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', 'asdfasd'),
(75, 2, 1, '2023-01-07', 33, ' 56', 78, 'batuk', 'benjol di kepala', '', '', '15:02:00', '', '', '', '', '', '', '', '', '', '900'),
(76, 2, 1, '2025-06-20', 0, ' ', 0, '', '', '', '', '00:00:00', '', '', '', '', '', '', '', '', '', ''),
(77, 2, 1, '2026-10-14', 23, ' 56/89', 50, 'lidah buaya', 'gatal gatal', 'pusing', 'mual', '16:45:00', 'operasi otak', 'rawat', '~~~', 'kena mental', 'istirahat yang cukup', 'Dijinkan pulang', 'Sembuh', '', 'Rawat inap', '567'),
(78, 2, 1, '2023-03-17', 43, ' 43/54', 54, 'alergi dingin', 'muntah', 'pusing', 'mual', '16:56:00', 'operasi otak', 'rawat inap', '~~~~', 'kena mental', 'istirahat', 'Dijinkan pulang', 'Membaik', '', 'Rawat inap', ''),
(79, NULL, 8, '2022-12-23', 30, '30/30', 30, 'gula', 'pusing', 'mual', 'mual', '15:00:00', 'dirawat', 'rawat', 'sehat', 'sehat', 'istirahat', 'Dijinkan pulang', 'Membaik', 'bagus', 'Rawat jalan', '1324'),
(80, 1, 8, '2024-01-01', 30, '30/30', 30, 'gula', 'pusing', 'pusing', 'pusing', '15:00:00', 'rawat jalan', '\r\n``', 'sehat', 'sehat', 'istirahat', 'Melarikan diri', 'Membaik', 'bagus', 'Rawat jalan', '3030'),
(84, 3, 11, '0000-00-00', 33, ' 58/98', 0, 'batuk', 'dssfa', 'batuk pilek', 'pilek', '00:00:00', 'operasi sesar', 'belah perutnya', 'agak sakit', 'tidak ada', 'tidak ada', 'Melarikan diri', 'Membaik', 'bagus', 'Rawat inap', '65445'),
(85, 3, 13, '2022-12-16', 58, ' 25', 65, 'jkfdkl', 'dalkdfj', 'asdfasd', 'kjadfjslk', '02:05:00', 'lkdjfalk', 'lkjaldkfj', 'lkjdsflk', 'ladjfsl', 'adlfkjalksf', 'Melarikan diri', 'Membaik', '', 'Rawat inap', '567'),
(86, 1, 15, '2022-12-18', 37, ' 58/96', 98, 'durian', 'batuk batuk pusing', 'pegal linu', 'pegal pegal', '14:20:00', 'operasi', 'tidak ada', 'agak sakit', 'asdfas', '-', 'Melarikan diri', 'Membaik', '', 'Rawat jalan', '203'),
(87, 1, 15, '2026-01-01', 37, ' 435', 47, '~~~~~', 'pusing fp', 'pusign fp', 'pusing fp', '05:00:00', 'pusing fp', 'pusign fp', 'pusing fp', 'pusing fp', 'pusing fp', 'Melarikan diri', 'Membaik', '', 'Rawat inap', '123456'),
(88, 1, 15, '2050-01-01', 45, ' 54', 23, 'shgrf', 'rsthgrfre', 'gjjhgdf', 'pusinh', '00:00:00', 'grfdc', 'rcsd', 'htgrfs', 'rgtef', 'ini data', 'Melarikan diri', 'Membaik', '', 'Rawat inap', '76543'),
(89, 1, 15, '2222-02-22', 43, ' 32', 54, 'nfgbdtgr', 'tgrf', '', 'hgfd', '22:22:00', 'fvdsc', '', '', '', '', 'Melarikan diri', 'Belum sembuh', '', 'Rawat jalan', '6543');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_guide`
--

CREATE TABLE `medicine_guide` (
  `ID_pasien` int(10) NOT NULL,
  `pagi` varchar(255) DEFAULT NULL,
  `siang` varchar(100) DEFAULT NULL,
  `malam` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nik`
--

CREATE TABLE `nik` (
  `NIKPasien` char(16) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nik`
--

INSERT INTO `nik` (`NIKPasien`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`) VALUES
('0050866722091034', 'Arabelle Seeds', '84965 Sachs Circle', 'Junín', '1994-06-02', 'Female'),
('0061568564374038', 'Anneliese Joust', '0171 Dwight Junction', 'Bantogon', '1995-09-01', 'Female'),
('0405360346612763', 'Anatollo Denisovo', '45 Oriole Way', 'Krajan Langenharjo', '2009-03-18', 'Male'),
('0582980438430327', 'Kaihelga', '4345 Dexter Plaza', 'Shuangpu', '2014-05-09', 'Male'),
('0591523676665570', 'Byron Normanville', '39 Amoth Way', 'Matriz de Camaragibe', '1998-07-03', 'Male'),
('0665971582728970', 'Quintana Norcross', '6584 Myrtle Hill', 'Wenquan', '1998-11-18', 'Female'),
('0675861821596534', 'Seward Bolus', '84972 Dahle Trail', 'Tyrnyauz', '1996-11-04', 'Agender'),
('0701952015367281', 'Darwin Reubbens', '100 Independence Circle', 'Chicama', '2007-05-16', 'Male'),
('0705599855440394', 'Muhammad Farrih', '0565 Colorado Place', 'Salinas', '1990-12-16', 'Female'),
('0742879473871198', 'Bridgette Hing', '77 Steensland Place', 'Lutowiska', '2011-04-22', 'Genderfluid'),
('0940255663669113', 'Alick Huburn', '4 Sage Lane', 'Zhongguan', '2005-03-21', 'Male'),
('0978033635762156', 'Reinwald Fesby', '5334 Orin Alley', 'Notre-Dame-des-Prairies', '1991-07-02', 'Male'),
('1060498494251702', 'Sheppard Seson', '7 Clemons Avenue', 'Poniklá', '2016-11-09', 'Male'),
('1120142011106773', 'Winonah Di Napoli', '693 Parkside Park', 'Parabcan', '1999-07-12', 'Female'),
('1213882994710621', 'Yasmeen McSperrin', '9 Basil Center', 'Kimry', '2002-11-12', 'Female'),
('1228941391100017', 'Lolly Danels', '07 Elmside Road', 'Ginatilan', '2003-06-29', 'Female'),
('1340946387640547', 'Anastassia Karolowski', '68 Lakewood Gardens Way', 'Nova Lima', '1993-07-11', 'Female'),
('1454475065827896', 'Cecilio Vreiberg', '481 Sunnyside Parkway', 'Estância', '1995-01-07', 'Male'),
('1639994786797747', 'Courtney Richt', '6 Kensington Circle', 'Tangkanpulit', '2009-06-29', 'Male'),
('1764600364043719', 'Rickard Jacobsson', '62380 Pearson Center', 'Sokal’', '1993-05-09', 'Male'),
('1873244518738121', 'Dulci Colisbe', '67427 Charing Cross Street', 'Cisitu', '2004-12-16', 'Female'),
('1918916264400918', 'Odette Rippen', '86 Nova Point', 'San José del Guaviare', '1991-06-18', 'Female'),
('1932419312636166', 'Dena Bolle', '11719 Arapahoe Place', 'Delareyville', '1996-07-01', 'Female'),
('2028828220157886', 'Farrih Mahabbataka', '94 Kipling Place', 'Shuangtang', '1995-11-29', 'Male'),
('2108770786580897', 'Farrih Mahabbataka', '0 Annamark Street', 'Mojkovac', '2000-08-07', 'Female'),
('2157921038479396', 'Alexi Peterffy', '8 Ramsey Plaza', 'Jisegumen', '1991-04-18', 'Female'),
('2180061301897001', 'Henrieta Macveigh', '32 Mendota Avenue', 'Marihatag', '2003-06-07', 'Female'),
('2378968663586505', 'Morgun Naismith', '519 Lerdahl Avenue', 'Batticaloa', '2004-01-30', 'Male'),
('2601823448958452', 'Roxana Courtes', '79 Forest Run Hill', 'Blagoveshchensk', '2000-01-27', 'Female'),
('2612710067767113', 'Trudi Dulany', '95 Bartillon Circle', 'Frutal', '2003-08-27', 'Female'),
('2772841165341380', 'Neilla Shivell', '20924 Clove Park', 'Benchu', '2007-07-20', 'Agender'),
('2879455668597381', 'Winnifred Haxell', '1862 Sycamore Court', 'Solna', '2003-10-25', 'Female'),
('2880967071142149', 'Maurita Lovick', '46 Meadow Vale Plaza', 'Lalapanzi', '2012-02-12', 'Female'),
('2934029760203677', 'Therine Langcaster', '780 Meadow Valley Circle', 'Krasnyy Luch', '2007-01-11', 'Female'),
('2944323874964118', 'Fonsie Guittet', '4 Lyons Junction', 'Rerawere', '2000-06-19', 'Male'),
('2956722509185359', 'Willem Netherclift', '6 Derek Plaza', 'San Jose', '2010-03-22', 'Male'),
('2979084528911395', 'Launce Rens', '4 Pine View Hill', 'Cishan', '2017-05-21', 'Polygender'),
('3101853996425607', 'Mead Shee', '689 Norway Maple Point', 'Ashford', '1998-10-11', 'Female'),
('3159171663090716', 'Luciano Yeats', '143 Coleman Terrace', 'São João de Meriti', '2018-03-26', 'Male'),
('3210461195485074', 'Garv Gaylor', '738 Oriole Alley', 'Henglian', '1997-07-04', 'Male'),
('3345904264471061', 'Willa Kincade', '9 Summerview Point', 'Sanxi', '2015-11-04', 'Non-binary'),
('3389339888044672', 'Arleta Brunger', '406 Becker Alley', 'Raub', '2001-01-20', 'Female'),
('3436060802008157', 'Sibylla Dimberline', '5246 Spohn Way', 'Ruzhany', '2012-01-26', 'Female'),
('3482424175683055', 'Orelee Older', '51 Morningstar Pass', 'Tsil’na', '2003-05-21', 'Female'),
('3643788944182745', 'Onfroi McGougan', '6 Carioca Court', 'Eséka', '2009-02-23', 'Male'),
('3711579157132485', 'Mil Whatsize', '54 Division Point', 'Salamnunggal', '2007-06-07', 'Female'),
('3797530560550037', 'Antonius Satterfitt', '1848 Acker Parkway', 'Mirandela', '2002-08-11', 'Male'),
('3964475298056817', 'Sacha Skellington', '03 6th Court', 'Chengzi', '2001-06-29', 'Female'),
('4340220533718168', 'Valeda Paradis', '84078 Transport Avenue', 'Fargo', '2011-09-03', 'Female'),
('4377689069528262', 'Homer Sirmond', '64 Morningstar Street', 'Buenaventura', '2016-04-12', 'Male'),
('4688078070500292', 'Jenica Standeven', '34265 Tony Avenue', 'Thanatpin', '1999-09-22', 'Female'),
('4695058856659115', 'Nataline MacTimpany', '398 Burrows Parkway', 'Torbeck', '2008-12-06', 'Non-binary'),
('4770942985642261', 'Daniel Foley', '859 Bartillon Circle', 'Daxi', '2007-05-21', 'Male'),
('4789946036657347', 'Jerrilyn Knoller', '75912 Magdeline Avenue', 'Slatina', '2003-03-10', 'Female'),
('5046877404968332', 'Riva Deinert', '3 Sycamore Trail', 'Piekielnik', '1997-04-10', 'Female'),
('5066875132362086', 'Brenna Toderi', '51 Atwood Pass', 'Novyye Kuz’minki', '2013-10-17', 'Female'),
('5092960946353676', 'Anthia Sharplin', '9 Fairfield Avenue', 'Venado Tuerto', '2013-03-03', 'Agender'),
('5100735969185712', 'Yasmin Patria', '15444 Beilfuss Terrace', 'Tây Ninh', '2013-02-14', 'Female'),
('5124547662002635', 'Celestyna Mandry', '053 4th Hill', 'Porto Calvo', '2006-04-18', 'Female'),
('5135256178308240', 'Konstantine Lackington', '3 Spenser Trail', 'Gilowice', '1998-08-21', 'Male'),
('5258305669878062', 'Letta Netley', '154 Pennsylvania Terrace', 'Cuozheqiangma', '2018-05-22', 'Female'),
('5562651832514925', 'Noach Keppy', '48 Golf Plaza', 'Louis Trichardt', '2009-11-26', 'Male'),
('5635323805000738', 'Darn Yurinov', '885 Chive Way', 'Bruxelles', '2001-05-18', 'Male'),
('5656808296365472', 'Marlin Hatley', '4 Eastlawn Junction', 'Quetigny', '2010-09-06', 'Male'),
('5818349508157869', 'Sonnie Sprasen', '7865 Gerald Parkway', 'Palon', '2012-06-15', 'Female'),
('5872200429805124', 'Daryl Settle', '591 Cherokee Place', 'Lawepakam', '2005-03-04', 'Male'),
('5927257277796937', 'Eleni Cloughton', '3840 Magdeline Street', 'Aroroy', '1993-12-12', 'Female'),
('6035056789051588', 'Eveleen Bonefant', '7971 Badeau Lane', 'Fumin', '2008-11-11', 'Female'),
('6043684205745885', 'Keane Filyushkin', '1716 Schurz Circle', 'Ampanihy', '2005-04-30', 'Male'),
('6329245590858530', 'Ianthe Brodie', '2 Havey Avenue', 'Irirum', '2002-08-01', 'Genderqueer'),
('6351399226234589', 'Wallie Burchard', '9751 Manley Drive', 'Guadalupe', '1996-09-01', 'Female'),
('6406697089115076', 'Spike Dallinder', '8 David Alley', 'Santa Catalina', '2006-05-20', 'Male'),
('6683342289563849', 'Kassie Trayte', '6 Harbort Court', 'Milín', '1999-03-15', 'Female'),
('6743269581203713', 'Saleem Berthelmot', '7 8th Center', 'Salaš Crnobarski', '2014-08-16', 'Male'),
('7035791670655187', 'Becky Winsom', '7 Bowman Way', 'Matwaḩ', '2011-02-06', 'Genderfluid'),
('7117561883650284', 'Louise Walklott', '89 Caliangt Street', 'Brejo Santo', '2017-06-04', 'Female'),
('7251737811439465', 'Farr Mingus', '7 Lawn Terrace', 'Leńcze', '1993-09-19', 'Male'),
('7282626257189296', 'Tomi Sacaze', '8 Alpine Circle', 'Ḩablah', '2009-01-23', 'Female'),
('7300923536012991', 'Fabe Balfe', '48897 Springs Avenue', 'Vardane', '1997-06-05', 'Male'),
('7332472443729066', 'Clark Klug', '08 Marquette Avenue', 'Cachachi', '2011-12-16', 'Male'),
('7467510108859976', 'Lorianna Randell', '538 Golf Course Hill', 'Chaihe', '1997-12-25', 'Female'),
('7517975835142272', 'Edd Balazot', '500 Carpenter Pass', 'Paris 15', '2016-05-10', 'Male'),
('7533634297250794', 'Rozalin Campanelli', '411 Troy Court', 'Hernani', '1999-05-20', 'Female'),
('7542857638646789', 'Jo ann Stagge', '58935 Hoepker Crossing', 'Talawakele', '2004-08-30', 'Female'),
('7601612567228380', 'Grace Dowyer', '812 Loomis Court', 'Itacarambi', '2017-04-06', 'Male'),
('7731280883898065', 'Margery Heaven', '321 Buell Way', 'Joinville', '2009-04-25', 'Female'),
('7784821541784015', 'Reinhold Oulner', '2992 Butternut Avenue', 'Gritsovskiy', '2002-10-22', 'Male'),
('8198407023112893', 'Culley Innes', '65238 Prentice Park', 'Gulao', '2008-03-11', 'Male'),
('8589090254793476', 'Madelin Blight', '7351 Barby Court', 'Cikandang', '1998-03-11', 'Female'),
('8608021714931795', 'Wilhelm Allden', '689 Village Hill', 'Liujia', '2018-01-26', 'Male'),
('8650644446804135', 'Edin Davidde', '77967 Melvin Trail', 'Sangke', '2003-08-03', 'Female'),
('8901546842141152', 'Emelia Meryett', '8665 Anthes Alley', 'Grazhdanskoye', '2004-07-28', 'Female'),
('8914950881645563', 'Loella Sinnie', '0164 Pankratz Drive', 'Heshang', '2015-12-28', 'Female'),
('9110421731208155', 'Ware Sturton', '60933 Pierstorff Drive', 'Youlan', '2000-03-20', 'Male'),
('9370161559985493', 'Arlen Hofner', '3 Hoard Road', 'Caicara', '2011-12-22', 'Female'),
('9426608436009636', 'Gothart McKeachie', '6581 Kinsman Court', 'Guanqing', '1998-03-28', 'Male'),
('9501479793687120', 'Jdavie Lettice', '5412 Calypso Crossing', 'Toksovo', '2003-01-19', 'Male'),
('9834222722740673', 'Lorrayne Darrigrand', '36286 Sycamore Trail', 'Villa Nueva', '2012-06-23', 'Female'),
('9893387267226688', 'Sibbie Tremain', '8 Elgar Park', 'Dushang', '2016-05-26', 'Female'),
('9905929333887288', 'Blanca Smaling', '68 Park Meadow Point', 'Boulsa', '2016-03-02', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `ID_pasien` int(10) NOT NULL,
  `nik_pasien` char(16) NOT NULL,
  `emailPasien` varchar(50) NOT NULL,
  `passPasien` varchar(100) NOT NULL,
  `Ruang_rawat` varchar(255) DEFAULT NULL,
  `Nomor_telepon` varchar(20) DEFAULT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`ID_pasien`, `nik_pasien`, `emailPasien`, `passPasien`, `Ruang_rawat`, `Nomor_telepon`, `verification_code`, `email_verified_at`) VALUES
(1, '0050866722091034', '', '', '5003', '085156041879', '', NULL),
(2, '0061568564374038', '', '', '4576', '2345678', '', NULL),
(3, '0405360346612763', '', '', '5433', '085156041879', '', NULL),
(7, '0582980438430327', 'hahaha@gmail.com', '1234567891011', '', '', '', '0000-00-00 00:00:00'),
(8, '0675861821596534', 'muhammadyafixmipa1@gmail.com', '$2y$10$PSRfrNCoLUhWh..wq.mBbe7bMAdIolfcahi5fFhvdoEXtdbP7XYwa', '2435', '08123456765', '341473', '0000-00-00 00:00:00'),
(11, '0705599855440394', '', '', '', '', '443622', '0000-00-00 00:00:00'),
(12, '1228941391100017', 'tatrilp52@gmail.com', '$2y$10$OxiNCQ53aGysdDHLaI/MYeITRoQOtlYyHOGSZhuTHRaoL9SRB14ii', '', '', '153126', '0000-00-00 00:00:00'),
(13, '1918916264400918', 'jenagena9@gmail.com', '$2y$10$RD6pX4WhtZvwCdU3Qu.nAOKd1k7nlmlL1AF5.J/ADG9NQA0Y78YVW', '', '', '147483', '0000-00-00 00:00:00'),
(14, '0675861821596534', 'aldo@gmail.com', '$2y$10$dwO535EAzrQAxiYaBj19QOhQtCkzuDu9NWkcJUAyMQR6g.Tr7wSWG', '', '', '112449', '0000-00-00 00:00:00'),
(15, '2108770786580897', 'arsyadafarih72@gmail.com', '$2y$10$Gu7og/dvAZekRnwcGx/56uznMfuGh5VrzYmOVHukTNMXpt3F5AanS', '', '', '861834', '0000-00-00 00:00:00'),
(16, '1918916264400918', 'asdfljalskdfjla@gmail.com', '$2y$10$KzD2I6TJQq6.d6fu9hsTtu1fqAPeUchdUBqlo911c6EbyZAFpCgve', '', '', '117012', '0000-00-00 00:00:00'),
(17, '1454475065827896', 'muhaikal2002@gmail.com', '$2y$10$RBzaHhVrnb0EosM2QmK81.IHiRo0JhxymLGXGx9bF6qXnIk9.ok/i', '', '', '278855', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pas_kosong`
--

CREATE TABLE `pas_kosong` (
  `ID_kos` int(11) NOT NULL,
  `Kondisi_pasien` varchar(100) NOT NULL,
  `Tanggal_pemeriksaan` varchar(100) NOT NULL,
  `Nama_dokter` varchar(100) NOT NULL,
  `Suhu_badan` varchar(100) NOT NULL,
  `Tekanan_darah` varchar(100) NOT NULL,
  `Berat_badan` varchar(100) NOT NULL,
  `nama_pol` varchar(100) NOT NULL,
  `Nama_obat` varchar(100) NOT NULL,
  `Dosis` varchar(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `Diagnosa_utama` varchar(11) NOT NULL,
  `Ruang_rawat` varchar(100) NOT NULL,
  `Total` varchar(100) NOT NULL,
  `Tanggal` varchar(100) NOT NULL,
  `kategori_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pas_kosong`
--

INSERT INTO `pas_kosong` (`ID_kos`, `Kondisi_pasien`, `Tanggal_pemeriksaan`, `Nama_dokter`, `Suhu_badan`, `Tekanan_darah`, `Berat_badan`, `nama_pol`, `Nama_obat`, `Dosis`, `Keterangan`, `Diagnosa_utama`, `Ruang_rawat`, `Total`, `Tanggal`, `kategori_pasien`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `ID_perawat` int(11) NOT NULL,
  `nama_perawat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `emailPerawat` varchar(100) NOT NULL,
  `passPerawat` char(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`ID_perawat`, `nama_perawat`, `no_telepon`, `alamat`, `emailPerawat`, `passPerawat`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(1, 'Schehani Nabila', '0874385443', 'Semarang jawa tengah', 'nabila@perawat.bhayangkara.com', '$2y$10$LpFfB3zlurwZKf3EnWQo1ej9X7K33mSll5SbJTRzZ7OQNOxIQnCAi', '2004-12-09', 'Perempuan'),
(2, 'Siti Zubaidah', '6285444556', 'Keputih, Surabaya', 'siti@perawat.bhayangkara.com', '$2y$10$yjdWNCo.2NEM4bWEIw3gbeK8aPJ/8n1nfl49l3r4Kml9VvsbTuNLK', '1995-12-14', 'Perempuan'),
(3, 'Ayu Asmari', '62546546456', 'MER, Surabaya', 'ayu@perawat.bhayangkara.com', '$2y$10$vX8a1Bup.COHFsPDO7msfeD8V/XZNUpQU1prgr3oARqlowRNm9mGW', '1995-12-03', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_pol` int(11) NOT NULL,
  `nama_pol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id_pol`, `nama_pol`) VALUES
(1, 'Poliklinik Gizi'),
(2, 'Poliklinik Umum'),
(3, 'Poliklinik Penyakit Dalam');

-- --------------------------------------------------------

--
-- Table structure for table `req_pasien`
--

CREATE TABLE `req_pasien` (
  `id_upco` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `ruang` int(11) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `aktivitas` varchar(250) NOT NULL,
  `id_perawat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `req_pasien`
--

INSERT INTO `req_pasien` (`id_upco`, `id_pasien`, `id_dokter`, `ruang`, `tgl_periksa`, `aktivitas`, `id_perawat`) VALUES
(1, 1, 1, 2832, '2022-12-31', 'akan di lakukan pengecekan suhu', 0),
(2, 1, 2, 94, '0000-00-00', 'Flail joint, left hand', 0),
(3, 2, 3, 41, '0000-00-00', 'Poisn by oth prim systemic and hematolog agents, self-harm', 0),
(4, 2, 4, 76, '0000-00-00', 'Displ spiral fx shaft of rad, unsp arm, 7thN', 0),
(5, 2, 4, 55, '0000-00-00', 'Spacecraft fire injuring occupant', 0),
(6, 3, 2, 46, '0000-00-00', 'Path fx, unsp ulna and radius, subs for fx w delay heal', 0),
(7, 3, 3, 62, '0000-00-00', 'Unsp fx navicular bone of left wrist, subs for fx w malunion', 0),
(104, 8, 1, 0, '2022-12-28', '', 0),
(106, 7, 3, 0, '2022-12-28', '', 0),
(107, 7, 1, 0, '2022-12-19', '', 0),
(108, 7, 1, 0, '2022-12-19', '', 0),
(109, 7, 1, 0, '2022-12-19', '', 0),
(110, 7, 2, 0, '2022-12-27', '', 0),
(111, 7, 1, 0, '2022-12-18', '', 0),
(112, 3, 2, 0, '0000-00-00', '', 0),
(113, 8, 2, 0, '2023-01-06', '', 0),
(114, 8, 1, 0, '2023-01-01', '', 0),
(115, 8, 1, 0, '2023-01-01', '', 0),
(116, 8, 1, 0, '2023-12-12', '', 0),
(117, 8, 2, 0, '2023-01-07', '', 0),
(123, 8, 2, 0, '2022-12-28', '', 0),
(124, 11, 3, 0, '2022-12-16', '', 0),
(125, 13, 3, 0, '2022-12-17', '', 0),
(126, 15, 1, 0, '2022-12-18', '', 0),
(127, 8, 1, 0, '2023-01-06', '', 0),
(128, 8, 4, 0, '2222-01-01', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `ID_resep` int(10) NOT NULL,
  `ID_pemeriksaan` int(10) NOT NULL,
  `ID_Dokter` int(10) DEFAULT NULL,
  `ID_pasien` int(10) DEFAULT NULL,
  `Nama_obat` varchar(255) DEFAULT NULL,
  `Dosis` int(10) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`ID_resep`, `ID_pemeriksaan`, `ID_Dokter`, `ID_pasien`, `Nama_obat`, `Dosis`, `Keterangan`) VALUES
(2, 1, 1, 1, 'paracetamol', 100, 'sehari2 kali'),
(3, 9, 1, 2, 'obat mual', 1000, '3 hari sekali'),
(4, 31, 1, 3, 'obat mata', 20, 'minum obat 1 kali seminggu'),
(9, 77, 2, 1, 'panadol', 0, 'mabok'),
(10, 77, 2, 1, 'Autan', 100, 'sehari 3 kali'),
(11, 78, 2, 8, 'Autan', 100, 'sehari sekali'),
(12, 47, 4, 2, 'Autan', 88, 'sehari 1 kli'),
(13, 84, 3, 11, 'panadol', 0, 'sampe mabok'),
(14, 85, 3, 13, 'panadol', 0, 'alfdjlaksdj'),
(15, 86, 1, 15, 'panadol', 3, 'secukupnya'),
(16, 87, 1, 15, 'ganja', 1000, 'setiap hari'),
(17, 88, 1, 15, 'Autan', 100, 'sehari'),
(18, 89, 1, 15, 'yfdvf', 0, 'hbgvf');

-- --------------------------------------------------------

--
-- Table structure for table `rujukan`
--

CREATE TABLE `rujukan` (
  `ID_rujukan` int(10) NOT NULL,
  `ID_pemeriksaan` int(10) NOT NULL,
  `ID_Dokter` int(10) DEFAULT NULL,
  `ID_pasien` int(10) DEFAULT NULL,
  `Tujuan_rujukan` varchar(255) DEFAULT NULL,
  `Dari_rujukan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rujukan`
--

INSERT INTO `rujukan` (`ID_rujukan`, `ID_pemeriksaan`, `ID_Dokter`, `ID_pasien`, `Tujuan_rujukan`, `Dari_rujukan`) VALUES
(1, 1, 1, 1, 'Rumah sakit sarjito', 'Rumah sakit sutomo'),
(2, 9, 1, 2, 'boyolali', 'ITS'),
(3, 31, 1, 8, 'Boyolali rumah sakit', 'ITS medical center');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`ID_Dokter`),
  ADD KEY `fk_idpoli` (`ID_Poli`);

--
-- Indexes for table `financial_report`
--
ALTER TABLE `financial_report`
  ADD KEY `FKFinancial_536097` (`ID_pasien`);

--
-- Indexes for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD PRIMARY KEY (`ID_pemeriksaan`) USING BTREE,
  ADD UNIQUE KEY `ID_pemeriksaan` (`ID_pemeriksaan`),
  ADD KEY `FKHasil_Peme749711` (`ID_Dokter`),
  ADD KEY `FKHasil_Peme591422` (`ID_pasien`);

--
-- Indexes for table `medicine_guide`
--
ALTER TABLE `medicine_guide`
  ADD KEY `FKMedicine_G938745` (`ID_pasien`);

--
-- Indexes for table `nik`
--
ALTER TABLE `nik`
  ADD PRIMARY KEY (`NIKPasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`ID_pasien`),
  ADD KEY `fk_nik_1` (`nik_pasien`);

--
-- Indexes for table `pas_kosong`
--
ALTER TABLE `pas_kosong`
  ADD PRIMARY KEY (`ID_kos`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`ID_perawat`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_pol`);

--
-- Indexes for table `req_pasien`
--
ALTER TABLE `req_pasien`
  ADD PRIMARY KEY (`id_upco`),
  ADD KEY `fk_idpasien_up` (`id_pasien`),
  ADD KEY `fk_id_dokt` (`id_dokter`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`ID_resep`),
  ADD KEY `ID_pemeriksaan` (`ID_pemeriksaan`),
  ADD KEY `ID_Dokter` (`ID_Dokter`),
  ADD KEY `ID_pasien` (`ID_pasien`);

--
-- Indexes for table `rujukan`
--
ALTER TABLE `rujukan`
  ADD PRIMARY KEY (`ID_rujukan`),
  ADD KEY `FKRujukan947963` (`ID_pemeriksaan`,`ID_Dokter`,`ID_pasien`),
  ADD KEY `rujukan_ibfk_1` (`ID_Dokter`),
  ADD KEY `ID_pasien` (`ID_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `ID_Dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  MODIFY `ID_pemeriksaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `ID_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `perawat`
--
ALTER TABLE `perawat`
  MODIFY `ID_perawat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id_pol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `req_pasien`
--
ALTER TABLE `req_pasien`
  MODIFY `id_upco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `ID_resep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rujukan`
--
ALTER TABLE `rujukan`
  MODIFY `ID_rujukan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_idpoli` FOREIGN KEY (`ID_Poli`) REFERENCES `poliklinik` (`id_pol`);

--
-- Constraints for table `financial_report`
--
ALTER TABLE `financial_report`
  ADD CONSTRAINT `FKFinancial_536097` FOREIGN KEY (`ID_pasien`) REFERENCES `pasien` (`ID_pasien`);

--
-- Constraints for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD CONSTRAINT `FKHasil_Peme591422` FOREIGN KEY (`ID_pasien`) REFERENCES `pasien` (`ID_pasien`),
  ADD CONSTRAINT `FKHasil_Peme749711` FOREIGN KEY (`ID_Dokter`) REFERENCES `dokter` (`ID_Dokter`);

--
-- Constraints for table `medicine_guide`
--
ALTER TABLE `medicine_guide`
  ADD CONSTRAINT `FKMedicine_G938745` FOREIGN KEY (`ID_pasien`) REFERENCES `pasien` (`ID_pasien`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `fk_nik_1` FOREIGN KEY (`nik_pasien`) REFERENCES `nik` (`NIKPasien`);

--
-- Constraints for table `req_pasien`
--
ALTER TABLE `req_pasien`
  ADD CONSTRAINT `fk_id_dokt` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`ID_Dokter`),
  ADD CONSTRAINT `fk_idpasien_up` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`ID_pasien`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`ID_pemeriksaan`) REFERENCES `hasil_pemeriksaan` (`ID_pemeriksaan`),
  ADD CONSTRAINT `resep_ibfk_2` FOREIGN KEY (`ID_Dokter`) REFERENCES `dokter` (`ID_Dokter`),
  ADD CONSTRAINT `resep_ibfk_3` FOREIGN KEY (`ID_pasien`) REFERENCES `pasien` (`ID_pasien`);

--
-- Constraints for table `rujukan`
--
ALTER TABLE `rujukan`
  ADD CONSTRAINT `rujukan_ibfk_1` FOREIGN KEY (`ID_Dokter`) REFERENCES `dokter` (`ID_Dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rujukan_ibfk_2` FOREIGN KEY (`ID_pasien`) REFERENCES `pasien` (`ID_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rujukan_ibfk_3` FOREIGN KEY (`ID_pemeriksaan`) REFERENCES `hasil_pemeriksaan` (`ID_pemeriksaan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
