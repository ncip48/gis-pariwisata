-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 06:15 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis-pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_etiket`
--

CREATE TABLE `tbl_etiket` (
  `id_etiket` int(11) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `kode_pesanan` varchar(100) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `no_pemesan` varchar(20) NOT NULL,
  `tanggal_rencana` date NOT NULL,
  `tanggal_expired` datetime DEFAULT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_etiket`
--

INSERT INTO `tbl_etiket` (`id_etiket`, `id_wisata`, `kode_pesanan`, `nama_pemesan`, `no_pemesan`, `tanggal_rencana`, `tanggal_expired`, `jumlah_orang`, `total`) VALUES
(4, 5, 'ETK-20230518131057', 'Raditya', '081234567890', '2023-05-20', '2023-05-18 20:10:51', 3, 33000),
(7, 3, 'ETK-20230523110834', 'John Doe', '11111', '2023-05-24', '2023-05-23 18:08:34', 2, 10000),
(8, 9, 'ETK-20230525222349', 'John Doe', '11111', '2023-05-25', '2023-05-26 05:23:49', 1, 20000),
(9, 9, 'ETK-20230605203040', 'John Doe', '11111', '2023-06-06', '2023-06-06 03:30:40', 2, 40000),
(10, 2, 'ETK-20230605210306', 'John Does', '11111', '2023-06-19', '2023-06-06 04:03:06', 3, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_icon`
--

CREATE TABLE `tbl_icon` (
  `id_icon` int(11) NOT NULL,
  `nama_icon` varchar(255) DEFAULT NULL,
  `icon` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_icon`
--

INSERT INTO `tbl_icon` (`id_icon`, `nama_icon`, `icon`) VALUES
(1, 'Wisata Kolam Renang', 'kolamrenang.png'),
(2, 'Wisata Benteng', 'iconbenteng.png'),
(3, 'Wisata Pantai', 'iconpantai.png'),
(4, 'Wisata Gunung/Bukit', 'icongunung.png'),
(5, 'Wisata Waduk', 'iconwaduk.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_json`
--

CREATE TABLE `tbl_json` (
  `id_json` int(11) NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `geojson` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_json`
--

INSERT INTO `tbl_json` (`id_json`, `nama_file`, `geojson`) VALUES
(1, 'wisata', 'wisata.geojson');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id` int(11) NOT NULL,
  `id_etiket` int(11) NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id`, `id_etiket`, `nama_pengunjung`) VALUES
(1, 9, 'Budi'),
(2, 9, 'Anita'),
(3, 10, 'Kirana'),
(4, 10, 'Adi'),
(5, 10, 'Tukiyem');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(255) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `no_telpon`, `foto`) VALUES
(1, 'Farida', 'rifngatulfarida1@gmail.com', '123456', '081328690810', 'foto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wisata`
--

CREATE TABLE `tbl_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_tempat` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  `kec` varchar(255) DEFAULT NULL,
  `kab` varchar(255) DEFAULT NULL,
  `prov` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `id_icon` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_wisata`
--

INSERT INTO `tbl_wisata` (`id_wisata`, `nama_tempat`, `alamat`, `desa`, `kec`, `kab`, `prov`, `latitude`, `longitude`, `deskripsi`, `gambar`, `id_icon`, `harga`) VALUES
(1, 'Pantai Menganti', 'Kebumen', 'Karangduwur', 'Ayah', 'Kebumen', 'Jawa Tengah', '-7.769964478234369', '109.41271547908781', 'Pantai Menganti memiliki karang terjal dengan bukit serta tebing yang menjulang tinggi dibibir pantai. Pantai Menganti memiliki pasir putih yang menawan. Pantai ini juga sebagai Tempat Pelelangan Ikan (TPI) sehingga kegiatan nelayan menjadi hal lumrah di pantai ini. Keindahannya memukau siapapun yang berkunjung ke Pantai Menganti. Perpaduan ombak, pasir putih, nelayan, bukit dan tebing hijau akan menghadirkan keindahan tersendiri. Di bagian barat Pantai Menganti terdapat tebing raksasa yang memanjang. Jika musim hujan tiba, Tebing tersebut akan mengucurkan air terjun. Tak tanggung-tanggung, terdapat empat air terjun disana.\r\n', 'pmenganti.jpg', 3, 20000),
(2, 'Pantai Logending', 'Kebumen', 'Ayah', 'Ayah', 'Kebumen', 'Jawa Tengah', '-7.7275556927325875', '109.39445454197687', 'Pantai Logending merupakan perpaduan antara pantai dan hutan menjadi daya tarik tersendiri bagi para wisatawan. Obyek wisata ini sangat cocok untuk mereka, khususnya remaja yang suka berpetualang dan camping.\r\nBerbagai fasilitas telah disediakan meliputi area parkir luas yang cukup untuk menampung lebih dari 100 Bus, MCK, Mushola, dan Penginapan, taman bermain, warung pedagang, panggung pertunjukan, dan perahu nelayan, serta souvenir kerajinan anyaman dari daun pandan dan kerajinan kerang.\r\n<br>Di sana juga tersedia berbagai makanan khas seperti grobi, gula kelapa, ikan hasil tangkapan para nelayan. Objek wisata pantai ini terletak sekitar 54 km barat daya Kebumen atau 33 km selatan Gombong. Pantai Logending panjang mencapai 200 m merupakan pantai landai berpasir. Bagian timurnya dibatasi oleh terbing terjal batugamping, sementara S. Bodo di sebelah barat merupakan batas administrasi dengan Kabupaten Cilacap. Perjalanan menuju objek wisata dari arah Jatijajar akan mengikuti lereng barat kawasan kars Gombong Selatan.\r\n</br>\r\n\r\n', 'plogending.jpg', 3, 5000),
(3, 'Waduk Sepor', 'Kebumen ', 'Sempor', 'Sepor', 'Kebumen', 'Jawa Tengah', '-7.559975440065073', '109.48627648367244', 'Obyek wisata Waduk Sempor memang bukanlah nama yang asing lagi bagi dunia kepariwisataan kita. Dibalik fungsinya sebagai sarana irigasi teknis bagi ribuan hektar sawah di wilayah Gombong, waduk ini juga menyimpan potensi yang besar sebagai obyek wisata. Selain daya tarik alamnya yang begitu besar, obyek wisata ini juga dilengkapi dengan berbagai sarana pendukung, antara lain wisma-wisma penginapan yang bisa disewa secara perorangan maupun rombongan. Selain sebagai obyek berwisata, tempat ini juga cocok dijadikan tempat untuk seminar, rapat kejra dan kegiatan lainnya, karena selain tempatnya tenang, juga memiliki sarana yang memadai untuk kegiatan tersebut.\r\n\r\n<br>Daya tarik utama obyek wisata ini adalah alamnya. Waduk seluas puluhan hektar yang terletak di Desa Sempor, Kecamatan Sempor ini, bila diamati begitu mirip sebuah danau alam yang dipagari oleh perbukitan. Perbukitan tersebut ditanami ribuan batang pohon pinus oleh Perhutani yang dalam waktu-waktu tertentu disadap getahnya. Dengan dukungan iklim yang memiliki curah hujan cukup melingkari sang \"danau\". Walhasil, harmoni alam yang tercipat dari perpaduan waduk dengan sang sabuk hijau merupakan lukisan hidup yang begitu mempesona. Melihat riak-riak air di danau buatan itu, ketenangan seakan menyelusup ke dalam jiwa sanubari kita. Menatap hamparan pinus, sepertinya kita mendapatkan kesejukan dan keteduhan yang tiada tara. Mendapatkan suguhan yang sungguh memperkaya batin seperti itu, seolah diri kita enggan beranjak dari tempat ini.</br>\r\n\r\n', 'waduksempor.jpg', 5, 5000),
(4, 'Benteng Van Der Wijck', 'Kebumen', 'Sidayutengah, Sidayu', 'Gombong', 'Kebumen', 'Jawa Tengah', '-7.59919029111878', '109.51762162662278', 'Benteng Van Der Wijck adalah benteng pertahanan Hindia Belanda yang dibangun sekitar tahun 1820 atau permulaan abad ke 19. Benteng ini terletak di kota Gombong, sekitar 20 km sebelah barat dari Ibukota kabupaten Kebumen, Jawa Tengah, 7 km Barat Kota Karanganyar, atau 100 km dari Yogyakarta.\r\n\r\n<br>Nama benteng ini diambil dari Van Der Wijck, yang kemungkinan nama komandan pada saat itu. Nama benteng ini terpampang pada pintu sebelah kanan.</br>\r\n\r\n<br>Benteng ini kadang dihubungkan dengan nama Frans David Cochius (1787-1876), seorang Jenderal yang bertugas di daerah barat Bagelen yang namanya juga diabadikan menjadi nama Benteng Generaal Cochius. Benteng ini merupakan benteng persegi delapan satu-satunya di Indonesia.</br>\r\n', 'bentengvan.jpg', 2, 25000),
(9, 'Gading Splash Water', 'Kebumen', 'Pejagoan ', 'Pejagoan', 'Kebumen', 'Jawa Tengah', '-7.672941267985936', '109.6436215522868', 'Memiliki luas destinasi kurang lebih 1,5 hektar, obyek wisata Gading Splash Water (GSW) Kebumen menyuguhkan spot menarik didalamnya.\r\n\r\nTempat kece yang siap memanjakan hari libur anda bersama keluarga tercinta di Kebumen Jawa Tengah.\r\nObyek wisata Gading Paradise Splash Waterpark berada tidak jauh dari pusat kota Kebumen Jawa Tengah.\r\n\r\nSehingga para wisatawan bisa mengunjungi tempat piknik Keluarga di Kebumen ini dengan mudah baik menggunakan kendaraan umum maupun pribadi.\r\n\r\nButuh waktu kurang lebih 5 menit saja dari pusat kota menggunakan kendaraan ketika inginkan explore Gading Kebumen.', 'gading1.jpg', 1, 20000),
(5, 'Pemandian Air Panas Krakal', 'Kebumen', 'Krakal', 'Alian', 'Kebumen', 'Jawa Tengah', '-7.614143478845947', '109.69954023508987', 'PAP Krakal berlokasi di desa Krakal Kecamatan Alian, Kebumen. Tempat pemandian air panas ini terletak 11 km timur laut Kebumen, menempati kawasan dataran di kaki Pegunungan Serayu Selatan. Pebukitan di sekitar objek geowisata ini menyingkapkan batuan Formasi halang yang berumur Miosen Tengah-Pliosen Awal (16-3 juta tahun), berupa perulangan batupasir dan batulempung yang bersifat tufan. Mula jadi atau genesa terbentuknya mata air panas di daerah ini tidak berhubungan langsung dengan kegiatan magmatik. Hal tersebut ditunjukkan oleh kandungan belerangnya yang sangat kecil. Air panas Krakal mengandung sulfat (SO4) yang tinggi, yaitu sekitar 1.236 mg/liter. Sedang amonia dan fluoridanya masing-masing 3,9 dan 0,7 mg/liter.\r\n\r\n<br>Suhu air yang berkisar antara 39-42C berkaitan dengan induksi panas yang ditimbulkan oleh gesekan bongkah batuan akibat sesar. Pemunculannya ke permukaan dikarenakan muka air tanah yang telah terpanasi itu terpotong oleh bidang topografi, atau ke luar melalui retakan di sepanjang jalur sesar yang ada. Mata air panas Krakal sudah dimanfaatkan untuk pemandian sejak tahun 1905, di mana dari beberapa sumber yang ada air disalurkan melalui pipa ke dalam bak-bak pemandian. Nilai kesadahan yang mencapai 320,13 menyebabkan pipa sering tersumbat. Derajat keasamannya yang tinggi (pH=8,5) menyebabkan air tersebut rasanya pahit. Banyak masyarakat percaya bahwa air dipemandian bisa menyembuhkan berbagai penyakit kulit. Objek wisata alam ini sudah dilengkapi dengan tempat parkir, mushola, MCK, dan taman bermain yang tertata baik. Sebagai tempat pemandian, dibangun bilik-bilik kecil yang dilengkapi dengan bak untuk berendam dan 6 Kamar VIP.</br>\r\n\r\n', 'krakal.jpg', 1, 11000),
(6, 'Wisata Alam Jembangan', 'Kebumen', 'Jembangan', 'Poncowarno', 'Kebumen', 'Jawa Tengah', '-7.6544469273832645', '109.77111853271047', 'Jembangan Kebumen menyuguhkan sebuah wisata alam dengan hamparan luas telaga dan hutan hijau yang mengelilingi. Wisata Jembangan Kebumen berdiri sejak tahun 2011 dan menjadi salah satu destinasi populer untuk dijadikan tujuan liburan dan rekreasi.\r\n\r\n<br>Tempat wisata anak di Kebumen satu ini menyediakan berbagai macam permainan dan wahana untuk sensasi berlibur yang berbeda dari biasanya.  Mulai dari sepeda air, zona outbound, kebun binatang, perahu bebek, area bermain anak, kolam memancing dan masih banyak lagi.</br>\r\n\r\n', 'jembangan.jpg', 5, 10000),
(10, 'Pantai Pecaron', 'Di sini', '-', '-', '-', '-', '-7,7707761', '109,4185053', 'sdfsdf', 'High_resolution_wallpaper_background_ID_77701808093.jpg', 5, 15000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_etiket`
--
ALTER TABLE `tbl_etiket`
  ADD PRIMARY KEY (`id_etiket`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_etiket`
--
ALTER TABLE `tbl_etiket`
  MODIFY `id_etiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_wisata`
--
ALTER TABLE `tbl_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
