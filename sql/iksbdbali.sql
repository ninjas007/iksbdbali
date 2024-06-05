/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Katolik','Kristen','Hindu','Buddha','Konghucu') NOT NULL,
  `nomor_hp` varchar(20) DEFAULT NULL,
  `alamat_asal` varchar(255) DEFAULT NULL,
  `alamat_domisili` varchar(255) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `alamat_tempat_kerja` varchar(255) DEFAULT NULL,
  `pendidikan_id` int(11) DEFAULT NULL,
  `pendidikan_jurusan` varchar(200) DEFAULT NULL,
  `hobi` varchar(255) DEFAULT NULL,
  `status` enum('Kawin','Belum Kawin') NOT NULL,
  `nama_pasangan` varchar(255) DEFAULT NULL COMMENT 'EMPTY',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `anggota_anak`;
CREATE TABLE `anggota_anak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `agama` enum('Islam','Katolik','Kristen','Hindu','Buddha','Konghucu') NOT NULL,
  `orang_tua_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5057 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `anggota` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `nomor_hp`, `alamat_asal`, `alamat_domisili`, `pekerjaan`, `alamat_tempat_kerja`, `pendidikan_id`, `pendidikan_jurusan`, `hobi`, `status`, `nama_pasangan`) VALUES
(5, 'Fugit laboriosam u', 'Voluptas consequatur', '1979-03-04', 'Laki-laki', 'Hindu', 'Enim eos sunt sunt ', 'Cillum libero ad aut', 'Voluptas adipisci es', 'Eiusmod omnis nihil ', 'Quia tempor sunt exe', 3, 'Est nulla aut labore', 'Eaque ea explicabo ', 'Belum Kawin', '');
INSERT INTO `anggota` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `nomor_hp`, `alamat_asal`, `alamat_domisili`, `pekerjaan`, `alamat_tempat_kerja`, `pendidikan_id`, `pendidikan_jurusan`, `hobi`, `status`, `nama_pasangan`) VALUES
(6, 'Test 2 Edit', 'Vel do dolores est d', '2017-06-20', 'Perempuan', 'Kristen', 'Est consequatur qui', 'Est ut eum sit persp', 'Esse corporis volupt', 'Dolorem reprehenderi', 'Amet temporibus qui', 1, 'Commodo quod laudant', 'Minus excepturi laud', 'Kawin', 'Adipisicing possimus');
INSERT INTO `anggota` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `nomor_hp`, `alamat_asal`, `alamat_domisili`, `pekerjaan`, `alamat_tempat_kerja`, `pendidikan_id`, `pendidikan_jurusan`, `hobi`, `status`, `nama_pasangan`) VALUES
(7, 'Adipisicing possimus', 'Tenetur reprehenderi', '2018-03-15', 'Laki-laki', 'Katolik', 'Ut quod quidem vitae', 'Optio eaque quia la', 'Do reprehenderit cu', 'Dolorem in ea volupt', 'Cupidatat tempor ali', 1, 'Et corporis consequu', 'Voluptate reprehende', 'Kawin', 'Pasangan 1');
INSERT INTO `anggota` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `nomor_hp`, `alamat_asal`, `alamat_domisili`, `pekerjaan`, `alamat_tempat_kerja`, `pendidikan_id`, `pendidikan_jurusan`, `hobi`, `status`, `nama_pasangan`) VALUES
(8, 'Ada anak Anggota 1', 'A quo vitae delectus', '1980-12-01', 'Laki-laki', 'Konghucu', 'Culpa laborum Aliqu', 'Blanditiis quis unde', 'Nulla soluta fugit ', 'Laborum Quia ipsum ', 'Praesentium voluptas', 2, 'Aut amet soluta ali', 'Asperiores impedit ', 'Kawin', 'sasdf'),
(9, 'Belum kawin anggota', 'Consequatur Anim se', '2016-07-20', 'Laki-laki', 'Hindu', 'Dolores sint illo o', 'A aliquam ut nihil m', 'Corporis officia qui', 'Sit accusantium err', 'Consequatur autem c', 1, 'Voluptatem cupidatat', 'Proident qui fuga ', 'Kawin', 'Fugit laboriosam u'),
(10, 'Quo pariatur Nesciu', 'Alias obcaecati volu', '1991-05-02', 'Laki-laki', 'Kristen', 'Ut neque illo quo a ', 'Et explicabo Vitae ', 'Deserunt ut voluptas', 'Et sunt dolores in q', 'Ducimus vero irure ', 9, 'Incidunt et aut sit', 'Tempor delectus vol', 'Kawin', 'sadfaf'),
(11, 'Non rem sunt beatae', 'Perferendis rerum co', '2004-08-13', 'Laki-laki', 'Islam', 'Nesciunt aute minus', 'Error aut minim repu', 'Possimus dicta aut ', 'Proident dolorem do', 'Distinctio Minus ea', 3, 'Ut ullam maxime magn', 'Voluptate earum aliq', 'Belum Kawin', ''),
(12, 'Tenetur vitae cumque', 'Expedita fugit temp', '1995-10-18', 'Laki-laki', 'Hindu', 'Quisquam qui amet u', 'Dolorum perferendis ', 'Minim magni ullamco ', 'Nobis recusandae Fu', 'Voluptatum odit volu', 4, 'Cupidatat odit cupid', 'Voluptatem dolore qu', 'Kawin', 'asf'),
(13, 'Quibusdam fugit ull', 'Ipsum in animi in d', '1984-03-27', 'Laki-laki', 'Konghucu', 'Natus ut vel ea solu', 'Non sunt aute verit', 'Consectetur sunt nul', 'Earum aute laborum n', 'Dolore consequat Ne', 2, 'Dolores ullam praese', 'Aliqua Adipisci qui', 'Belum Kawin', ''),
(14, 'Ipsum laborum Est d', 'Nesciunt impedit i', '2009-08-12', 'Laki-laki', 'Hindu', 'Tempor nesciunt mol', 'Iure est esse ad as', 'Qui perferendis offi', 'Commodi quos illum ', 'Qui voluptas ducimus', 1, 'Omnis est voluptati', 'Consequat Dolores u', 'Kawin', 'asaf'),
(15, 'Ipsum mollitia bland', 'Maiores iure laudant', '2015-05-26', 'Perempuan', 'Kristen', 'Soluta quis debitis ', 'Non ipsa quaerat la', 'Voluptas omnis sed o', 'Pariatur Et aut Nam', 'Omnis neque repellen', 1, 'Quis explicabo Quos', 'Sit cum et laudanti', 'Belum Kawin', '');

INSERT INTO `anggota_anak` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `orang_tua_id`) VALUES
(12, 'Anak pertama', 'adfasf', '2024-05-28', 'Laki-laki', 'Islam', 8);
INSERT INTO `anggota_anak` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `orang_tua_id`) VALUES
(13, 'dua anak', 'kendari', '2024-05-06', 'Laki-laki', 'Katolik', 8);
INSERT INTO `anggota_anak` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `orang_tua_id`) VALUES
(14, 'Anak 1 Edit', 'Et dolor velit offic edit', '1978-10-25', 'Laki-laki', 'Islam', 6);
INSERT INTO `anggota_anak` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `orang_tua_id`) VALUES
(15, 'Anak 2 edit', 'asdfa edit', '2000-02-23', 'Laki-laki', 'Islam', 6),
(16, 'Anak 3 edit', 'asfasd edit', '2024-05-27', 'Laki-laki', 'Islam', 6);

INSERT INTO `pendidikan` (`id`, `nama`) VALUES
(1, 'SD');
INSERT INTO `pendidikan` (`id`, `nama`) VALUES
(2, 'SMP');
INSERT INTO `pendidikan` (`id`, `nama`) VALUES
(3, 'SMA/SMK');
INSERT INTO `pendidikan` (`id`, `nama`) VALUES
(4, 'S1'),
(9, 'S2');

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `date_created`) VALUES
(12, 'Admin Edit', 'admin@mail.com', 'google.png', '$2y$10$MDnhHEnxbywdsnNtNXrDjuL.EvF.zZJd6LYukgW3SDIGD8nYTxAta', 1611383909);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;