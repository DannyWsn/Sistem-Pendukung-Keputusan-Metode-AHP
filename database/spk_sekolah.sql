-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 04:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_supplier`, `total`) VALUES
(57, 11, 0),
(58, 9, 0),
(59, 10, 0),
(60, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_hasil`
--

CREATE TABLE `alternatif_hasil` (
  `id_alternatif_hasil` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `subkriteriaid` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif_hasil`
--

INSERT INTO `alternatif_hasil` (`id_alternatif_hasil`, `id_alternatif`, `subkriteriaid`, `prioritas`) VALUES
(13, 57, 92, 0.25),
(14, 58, 92, 0.42),
(15, 59, 92, 0.2),
(16, 60, 92, 0.14),
(17, 57, 93, 0.5),
(18, 58, 93, 0.15),
(19, 59, 93, 0.16),
(20, 60, 93, 0.18),
(21, 57, 98, 0.14),
(22, 58, 98, 0.2),
(23, 59, 98, 0.27),
(24, 60, 98, 0.39),
(25, 57, 95, 0.14),
(26, 58, 95, 0.2),
(27, 59, 95, 0.27),
(28, 60, 95, 0.39),
(29, 57, 96, 0.14),
(30, 58, 96, 0.18),
(31, 59, 96, 0.3),
(32, 60, 96, 0.38),
(33, 57, 97, 0.14),
(34, 58, 97, 0.18),
(35, 59, 97, 0.3),
(36, 60, 97, 0.38),
(37, 57, 99, 0.27),
(38, 58, 99, 0.39),
(39, 59, 99, 0.2),
(40, 60, 99, 0.14),
(41, 57, 94, 0.25),
(42, 58, 94, 0.25),
(43, 59, 94, 0.25),
(44, 60, 94, 0.25),
(45, 57, 114, 0.25),
(46, 58, 114, 0.25),
(47, 59, 114, 0.25),
(48, 60, 114, 0.25),
(49, 57, 113, 0.25),
(50, 58, 113, 0.25),
(51, 59, 113, 0.25),
(52, 60, 113, 0.25),
(53, 57, 112, 0.25),
(54, 58, 112, 0.25),
(55, 59, 112, 0.25),
(56, 60, 112, 0.25),
(57, 57, 111, 0.25),
(58, 58, 111, 0.25),
(59, 59, 111, 0.25),
(60, 60, 111, 0.25),
(61, 57, 110, 0.25),
(62, 58, 110, 0.25),
(63, 59, 110, 0.25),
(64, 60, 110, 0.25),
(65, 57, 109, 0.25),
(66, 58, 109, 0.25),
(67, 59, 109, 0.25),
(68, 60, 109, 0.25),
(69, 57, 108, 0.25),
(70, 58, 108, 0.25),
(71, 59, 108, 0.25),
(72, 60, 108, 0.25),
(73, 57, 107, 0.25),
(74, 58, 107, 0.25),
(75, 59, 107, 0.25),
(76, 60, 107, 0.25),
(77, 57, 105, 0.25),
(78, 58, 105, 0.25),
(79, 59, 105, 0.25),
(80, 60, 105, 0.25),
(81, 57, 104, 0.2),
(82, 58, 104, 0.27),
(83, 59, 104, 0.39),
(84, 60, 104, 0.14),
(85, 57, 103, 0.25),
(86, 58, 103, 0.25),
(87, 59, 103, 0.25),
(88, 60, 103, 0.25),
(89, 57, 102, 0.25),
(90, 58, 102, 0.25),
(91, 59, 102, 0.25),
(92, 60, 102, 0.25),
(93, 57, 101, 0.25),
(94, 58, 101, 0.25),
(95, 59, 101, 0.25),
(96, 60, 101, 0.25),
(97, 57, 100, 0.25),
(98, 58, 100, 0.25),
(99, 59, 100, 0.25),
(100, 60, 100, 0.25);

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_nilai`
--

CREATE TABLE `alternatif_nilai` (
  `id_alternatif_nilai` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `alternatif_id_dari` int(11) NOT NULL,
  `alternatif_id_tujuan` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif_nilai`
--

INSERT INTO `alternatif_nilai` (`id_alternatif_nilai`, `id_subkriteria`, `alternatif_id_dari`, `alternatif_id_tujuan`, `nilai`) VALUES
(625, 93, 57, 58, 5),
(626, 93, 57, 59, 3),
(627, 93, 57, 60, 2),
(628, 93, 58, 57, 0.2),
(629, 93, 58, 59, 1),
(630, 93, 58, 60, 1),
(631, 93, 59, 57, 0.33),
(632, 93, 59, 58, 1),
(633, 93, 59, 60, 1),
(634, 93, 60, 57, 0.5),
(635, 93, 60, 58, 1),
(636, 93, 60, 59, 1),
(637, 95, 57, 58, 0.5),
(638, 95, 57, 59, 0.5),
(639, 95, 57, 60, 0.5),
(640, 95, 58, 57, 2),
(641, 95, 58, 59, 0.5),
(642, 95, 58, 60, 0.5),
(643, 95, 59, 57, 2),
(644, 95, 59, 58, 2),
(645, 95, 59, 60, 0.5),
(646, 95, 60, 57, 2),
(647, 95, 60, 58, 2),
(648, 95, 60, 59, 2),
(721, 94, 57, 58, 1),
(722, 94, 57, 59, 1),
(723, 94, 57, 60, 1),
(724, 94, 58, 57, 1),
(725, 94, 58, 59, 1),
(726, 94, 58, 60, 1),
(727, 94, 59, 57, 1),
(728, 94, 59, 58, 1),
(729, 94, 59, 60, 1),
(730, 94, 60, 57, 1),
(731, 94, 60, 58, 1),
(732, 94, 60, 59, 1),
(733, 114, 57, 58, 1),
(734, 114, 57, 59, 1),
(735, 114, 57, 60, 1),
(736, 114, 58, 57, 1),
(737, 114, 58, 59, 1),
(738, 114, 58, 60, 1),
(739, 114, 59, 57, 1),
(740, 114, 59, 58, 1),
(741, 114, 59, 60, 1),
(742, 114, 60, 57, 1),
(743, 114, 60, 58, 1),
(744, 114, 60, 59, 1),
(745, 113, 57, 58, 1),
(746, 113, 57, 59, 1),
(747, 113, 57, 60, 1),
(748, 113, 58, 57, 1),
(749, 113, 58, 59, 1),
(750, 113, 58, 60, 1),
(751, 113, 59, 57, 1),
(752, 113, 59, 58, 1),
(753, 113, 59, 60, 1),
(754, 113, 60, 57, 1),
(755, 113, 60, 58, 1),
(756, 113, 60, 59, 1),
(757, 112, 57, 58, 1),
(758, 112, 57, 59, 1),
(759, 112, 57, 60, 1),
(760, 112, 58, 57, 1),
(761, 112, 58, 59, 1),
(762, 112, 58, 60, 1),
(763, 112, 59, 57, 1),
(764, 112, 59, 58, 1),
(765, 112, 59, 60, 1),
(766, 112, 60, 57, 1),
(767, 112, 60, 58, 1),
(768, 112, 60, 59, 1),
(769, 111, 57, 58, 1),
(770, 111, 57, 59, 1),
(771, 111, 57, 60, 1),
(772, 111, 58, 57, 1),
(773, 111, 58, 59, 1),
(774, 111, 58, 60, 1),
(775, 111, 59, 57, 1),
(776, 111, 59, 58, 1),
(777, 111, 59, 60, 1),
(778, 111, 60, 57, 1),
(779, 111, 60, 58, 1),
(780, 111, 60, 59, 1),
(781, 110, 57, 58, 1),
(782, 110, 57, 59, 1),
(783, 110, 57, 60, 1),
(784, 110, 58, 57, 1),
(785, 110, 58, 59, 1),
(786, 110, 58, 60, 1),
(787, 110, 59, 57, 1),
(788, 110, 59, 58, 1),
(789, 110, 59, 60, 1),
(790, 110, 60, 57, 1),
(791, 110, 60, 58, 1),
(792, 110, 60, 59, 1),
(793, 109, 57, 58, 1),
(794, 109, 57, 59, 1),
(795, 109, 57, 60, 1),
(796, 109, 58, 57, 1),
(797, 109, 58, 59, 1),
(798, 109, 58, 60, 1),
(799, 109, 59, 57, 1),
(800, 109, 59, 58, 1),
(801, 109, 59, 60, 1),
(802, 109, 60, 57, 1),
(803, 109, 60, 58, 1),
(804, 109, 60, 59, 1),
(805, 108, 57, 58, 1),
(806, 108, 57, 59, 1),
(807, 108, 57, 60, 1),
(808, 108, 58, 57, 1),
(809, 108, 58, 59, 1),
(810, 108, 58, 60, 1),
(811, 108, 59, 57, 1),
(812, 108, 59, 58, 1),
(813, 108, 59, 60, 1),
(814, 108, 60, 57, 1),
(815, 108, 60, 58, 1),
(816, 108, 60, 59, 1),
(817, 107, 57, 58, 1),
(818, 107, 57, 59, 1),
(819, 107, 57, 60, 1),
(820, 107, 58, 57, 1),
(821, 107, 58, 59, 1),
(822, 107, 58, 60, 1),
(823, 107, 59, 57, 1),
(824, 107, 59, 58, 1),
(825, 107, 59, 60, 1),
(826, 107, 60, 57, 1),
(827, 107, 60, 58, 1),
(828, 107, 60, 59, 1),
(829, 105, 57, 58, 1),
(830, 105, 57, 59, 1),
(831, 105, 57, 60, 1),
(832, 105, 58, 57, 1),
(833, 105, 58, 59, 1),
(834, 105, 58, 60, 1),
(835, 105, 59, 57, 1),
(836, 105, 59, 58, 1),
(837, 105, 59, 60, 1),
(838, 105, 60, 57, 1),
(839, 105, 60, 58, 1),
(840, 105, 60, 59, 1),
(841, 104, 57, 58, 0.5),
(842, 104, 57, 59, 0.5),
(843, 104, 57, 60, 2),
(844, 104, 58, 57, 2),
(845, 104, 58, 59, 0.5),
(846, 104, 58, 60, 2),
(847, 104, 59, 57, 2),
(848, 104, 59, 58, 2),
(849, 104, 59, 60, 2),
(850, 104, 60, 57, 0.5),
(851, 104, 60, 58, 0.5),
(852, 104, 60, 59, 0.5),
(853, 103, 57, 58, 1),
(854, 103, 57, 59, 1),
(855, 103, 57, 60, 1),
(856, 103, 58, 57, 1),
(857, 103, 58, 59, 1),
(858, 103, 58, 60, 1),
(859, 103, 59, 57, 1),
(860, 103, 59, 58, 1),
(861, 103, 59, 60, 1),
(862, 103, 60, 57, 1),
(863, 103, 60, 58, 1),
(864, 103, 60, 59, 1),
(865, 102, 57, 58, 1),
(866, 102, 57, 59, 1),
(867, 102, 57, 60, 1),
(868, 102, 58, 57, 1),
(869, 102, 58, 59, 1),
(870, 102, 58, 60, 1),
(871, 102, 59, 57, 1),
(872, 102, 59, 58, 1),
(873, 102, 59, 60, 1),
(874, 102, 60, 57, 1),
(875, 102, 60, 58, 1),
(876, 102, 60, 59, 1),
(877, 101, 57, 58, 1),
(878, 101, 57, 59, 1),
(879, 101, 57, 60, 1),
(880, 101, 58, 57, 1),
(881, 101, 58, 59, 1),
(882, 101, 58, 60, 1),
(883, 101, 59, 57, 1),
(884, 101, 59, 58, 1),
(885, 101, 59, 60, 1),
(886, 101, 60, 57, 1),
(887, 101, 60, 58, 1),
(888, 101, 60, 59, 1),
(889, 100, 57, 58, 1),
(890, 100, 57, 59, 1),
(891, 100, 57, 60, 1),
(892, 100, 58, 57, 1),
(893, 100, 58, 59, 1),
(894, 100, 58, 60, 1),
(895, 100, 59, 57, 1),
(896, 100, 59, 58, 1),
(897, 100, 59, 60, 1),
(898, 100, 60, 57, 1),
(899, 100, 60, 58, 1),
(900, 100, 60, 59, 1),
(901, 99, 57, 58, 0.5),
(902, 99, 57, 59, 2),
(903, 99, 57, 60, 2),
(904, 99, 58, 57, 2),
(905, 99, 58, 59, 2),
(906, 99, 58, 60, 2),
(907, 99, 59, 57, 0.5),
(908, 99, 59, 58, 0.5),
(909, 99, 59, 60, 2),
(910, 99, 60, 57, 0.5),
(911, 99, 60, 58, 0.5),
(912, 99, 60, 59, 0.5),
(913, 98, 57, 58, 0.5),
(914, 98, 57, 59, 0.5),
(915, 98, 57, 60, 0.5),
(916, 98, 58, 57, 2),
(917, 98, 58, 59, 0.5),
(918, 98, 58, 60, 0.5),
(919, 98, 59, 57, 2),
(920, 98, 59, 58, 2),
(921, 98, 59, 60, 0.5),
(922, 98, 60, 57, 2),
(923, 98, 60, 58, 2),
(924, 98, 60, 59, 2),
(925, 97, 57, 58, 0.5),
(926, 97, 57, 59, 0.5),
(927, 97, 57, 60, 0.5),
(928, 97, 58, 57, 2),
(929, 97, 58, 59, 0.33),
(930, 97, 58, 60, 0.5),
(931, 97, 59, 57, 2),
(932, 97, 59, 58, 3),
(933, 97, 59, 60, 0.5),
(934, 97, 60, 57, 2),
(935, 97, 60, 58, 2),
(936, 97, 60, 59, 2),
(937, 96, 57, 58, 0.5),
(938, 96, 57, 59, 0.5),
(939, 96, 57, 60, 0.5),
(940, 96, 58, 57, 2),
(941, 96, 58, 59, 0.33),
(942, 96, 58, 60, 0.5),
(943, 96, 59, 57, 2),
(944, 96, 59, 58, 3),
(945, 96, 59, 60, 0.5),
(946, 96, 60, 57, 2),
(947, 96, 60, 58, 2),
(948, 96, 60, 59, 2),
(949, 92, 57, 58, 0.33),
(950, 92, 57, 59, 2),
(951, 92, 57, 60, 2),
(952, 92, 58, 57, 3),
(953, 92, 58, 59, 2),
(954, 92, 58, 60, 2),
(955, 92, 59, 57, 0.5),
(956, 92, 59, 58, 0.5),
(957, 92, 59, 60, 2),
(958, 92, 60, 57, 0.5),
(959, 92, 60, 58, 0.5),
(960, 92, 60, 59, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(22, 'Produksi'),
(28, 'Kualitas'),
(29, 'Harga'),
(30, 'Lokasi'),
(31, 'Pengiriman'),
(32, 'Pelayanan');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_hasil`
--

CREATE TABLE `kriteria_hasil` (
  `id_kriteria_hasil` int(16) NOT NULL,
  `id_kriteria` int(16) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_hasil`
--

INSERT INTO `kriteria_hasil` (`id_kriteria_hasil`, `id_kriteria`, `prioritas`) VALUES
(1, 22, 0.15),
(2, 28, 0.45),
(3, 29, 0.24),
(4, 30, 0.05),
(5, 31, 0.07),
(6, 32, 0.04);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `id_kriteria_nilai` int(11) NOT NULL,
  `kriteria_id_dari` int(11) NOT NULL,
  `kriteria_id_tujuan` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id_kriteria_nilai`, `kriteria_id_dari`, `kriteria_id_tujuan`, `nilai`) VALUES
(3591, 22, 28, 0.14),
(3592, 22, 29, 0.33),
(3593, 22, 30, 3),
(3594, 22, 31, 5),
(3595, 22, 32, 5),
(3596, 28, 22, 7),
(3597, 28, 29, 3),
(3598, 28, 30, 7),
(3599, 28, 31, 5),
(3600, 28, 32, 7),
(3601, 29, 22, 3),
(3602, 29, 28, 0.33),
(3603, 29, 30, 5),
(3604, 29, 31, 5),
(3605, 29, 32, 5),
(3606, 30, 22, 0.33),
(3607, 30, 28, 0.14),
(3608, 30, 29, 0.2),
(3609, 30, 31, 0.5),
(3610, 30, 32, 1),
(3611, 31, 22, 0.2),
(3612, 31, 28, 0.2),
(3613, 31, 29, 0.2),
(3614, 31, 30, 2),
(3615, 31, 32, 2),
(3616, 32, 22, 0.2),
(3617, 32, 28, 0.14),
(3618, 32, 29, 0.2),
(3619, 32, 30, 1),
(3620, 32, 31, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kategori`
--

CREATE TABLE `nilai_kategori` (
  `id_nilai` int(11) NOT NULL,
  `nama_nilai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kategori`
--

INSERT INTO `nilai_kategori` (`id_nilai`, `nama_nilai`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang'),
(5, 'Sangat Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subjek` varchar(30) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `id_kriteria`, `id_nilai`) VALUES
(92, 'Kontinuitas pengiriman produk', 22, 0),
(93, 'Kapasitas produksi yang tersedia', 22, 0),
(104, 'Plastik Lit', 28, 0),
(105, 'Karung', 28, 0),
(107, 'Mahal ', 29, 0),
(108, 'Murah', 29, 0),
(109, 'Jauh', 30, 0),
(110, 'Dekat', 30, 0),
(111, 'Cepat', 31, 0),
(112, 'Lambat', 31, 0),
(113, 'Ramah', 32, 0),
(114, 'Galak', 32, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_hasil`
--

CREATE TABLE `subkriteria_hasil` (
  `id_subkriteria_hasil` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_hasil`
--

INSERT INTO `subkriteria_hasil` (`id_subkriteria_hasil`, `id_subkriteria`, `prioritas`) VALUES
(133, 92, 0.12),
(134, 93, 0.88),
(135, 104, 0.83),
(136, 105, 0.17),
(137, 106, 0.31),
(138, 107, 0.83),
(139, 108, 0.17),
(140, 109, 0.8),
(141, 110, 0.2),
(142, 111, 0.86),
(143, 112, 0.14),
(144, 113, 0.86),
(145, 114, 0.14);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_nilai`
--

CREATE TABLE `subkriteria_nilai` (
  `id_subkriteria_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria_id_dari` int(11) NOT NULL,
  `subkriteria_id_tujuan` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_nilai`
--

INSERT INTO `subkriteria_nilai` (`id_subkriteria_nilai`, `id_kriteria`, `subkriteria_id_dari`, `subkriteria_id_tujuan`, `nilai`) VALUES
(737, 22, 92, 93, 0.14),
(738, 22, 93, 92, 7),
(739, 28, 104, 105, 5),
(740, 28, 105, 104, 0.2),
(741, 29, 107, 108, 5),
(742, 29, 108, 107, 0.2),
(743, 30, 109, 110, 4),
(744, 30, 110, 109, 0.25),
(745, 31, 111, 112, 6),
(746, 31, 112, 111, 0.17),
(747, 32, 113, 114, 6),
(748, 32, 114, 113, 0.17);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(40) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `komoditi` text NOT NULL,
  `no_telpon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `komoditi`, `no_telpon`) VALUES
(9, 'PT Adhi Buana Realty', 'Banyumanik, Kota Semarang, Jawa Tengah', 'Biji Plastik', '089776775767'),
(10, 'UD. Mekar Jaya', 'Manahan, Kota Solo, Jawa Tengah', 'Biji Plastik', '088776546654'),
(11, 'CV. Adidaya Abadi', 'Lapindo, Kota Sidoarjo, Jawa Tengah', 'Biji Plastik', '088776546654'),
(12, 'CV. Sentosa Abadi', 'Sayung, Kabupaten Demak, Jawa Tengah', 'Biji Plastik', '088776546654');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'suPo-mllp0t.uEXFBxuWeu01206297e748015fbf', 1501472329, 'c.JN/a5NatMoXrnk5WrY1.', 1268889823, 1681999002, 1, 'Wahyu', 'Saronto', 'admin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(7, 1, 1),
(8, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `alternatif_hasil`
--
ALTER TABLE `alternatif_hasil`
  ADD PRIMARY KEY (`id_alternatif_hasil`);

--
-- Indexes for table `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  ADD PRIMARY KEY (`id_alternatif_nilai`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_hasil`
--
ALTER TABLE `kriteria_hasil`
  ADD PRIMARY KEY (`id_kriteria_hasil`);

--
-- Indexes for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  ADD PRIMARY KEY (`id_kriteria_nilai`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  ADD PRIMARY KEY (`id_subkriteria_hasil`);

--
-- Indexes for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  ADD PRIMARY KEY (`id_subkriteria_nilai`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `alternatif_hasil`
--
ALTER TABLE `alternatif_hasil`
  MODIFY `id_alternatif_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `alternatif_nilai`
--
ALTER TABLE `alternatif_nilai`
  MODIFY `id_alternatif_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=961;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kriteria_hasil`
--
ALTER TABLE `kriteria_hasil`
  MODIFY `id_kriteria_hasil` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `id_kriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3621;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  MODIFY `id_subkriteria_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  MODIFY `id_subkriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=749;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
