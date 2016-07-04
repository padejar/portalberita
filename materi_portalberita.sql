/*
Navicat MySQL Data Transfer

Source Server         : lokal
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : materi_portalberita

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-06-27 11:30:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '$2y$10$Zgp.EO1M6OnGXhWO119cD.j9CMrhWykxgijr0clM8CmvXl2AIJE4O', 'Fajar', 'deadpool.jpg', 'Seorang mahasiswa kupu-kupu di AMIK BSI Tasikmalaya. Hobinya bermain gitar dan bermain game dan tidak jago-jago amat dalam melakukan kedua hal tersebut. Menyukai karakter komik Deadpool karena tingkah-lakunya yang nyeleneh.', 'admin');
INSERT INTO `admin` VALUES ('2', 'achmad', '$2y$10$h/h71onUEpr1Q.S4QjGQkuMXP8p6rd1XP0YIlSIbGCDzlzHa57hoS', 'Achmad ', 'kylo-ren.png', 'Seorang Penyuka Star Wars', 'author');

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `teks_berita` text NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `id_admin` int(11) NOT NULL,
  `dilihat` int(11) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES ('1', 'Hadang Tipu-tipu Online, e-Commerce Mau Diakreditasi', '3', '60e80f7d-1ef6-4dfd-acc8-4b95bad9982e_43.jpg', '<p><strong>Jakarta</strong>&nbsp;- Pemerintah mulai serius membenahi industri e-commerce di Indonesia agar bisa lebih aman dan nyaman. Dengan demikian, hal itu bisa memuluskan misi agar valuasi transaksi jual beli online di negeri ini menembus USD 130 miliar di 2020 mendatang.&nbsp;<br />\r\n<br />\r\nSalah satu wacana untuk membuat e-commerce jadi aman dan nyaman adalah dengan adanya akreditasi untuk perusahaan e-commerce. Tujuannya agar meminimalisir aksi penipuan saat jual beli online.<br />\r\n<br />\r\nMenteri Komunikasi dan Informatika Rudiantara pun berharap, adanya akreditasi e-commerce ini semata-mata bertujuan untuk perlindungan bagi konsumer. Dan untuk proses akreditasi tersebut, semua akan diserahkan kepada asosiasi e-commerce.<br />\r\n<br />\r\n&quot;Proses akreditasi ini juga untuk<em>&nbsp;consumer protection.</em>&nbsp;Nanti prosesnya seperti apa, kita serahkan saja ke asosiasi terkait. Biarkan mereka yang&nbsp;<em>self</em>&nbsp;regulated,&quot; ujarnya saat ditemui di sela Indonesia e-Commerce Summit &amp; Expo di Serpong, Rabu (27/4/2016).<br />\r\n<br />\r\nSementara itu, ditemui di tempat yang sama, Ketua Umum Indonesia e-Commerce Association (idEA) Daniel Tumiwa, berujar, jika akreditasi yang akan diminta oleh pemerintah sudah 80% disiapkan. Ada beberapa syarat yang mesti dilakukan oleh perusahaan e-commerce baru untuk mendapatkan akreditasi.<br />\r\n<br />\r\n&quot;Salah satu syarat utama untuk bisa mendapatkan akreditasi adalah&nbsp;<em>consumer protection</em>. Salah satu contoh<em>consumer protection</em>&nbsp;itu<em>&nbsp;customer service.</em>&nbsp;Bagaimana pelayanan&nbsp;<em>customer service&nbsp;</em>dan soal sekuritinya,&quot; jelas Daniel.<br />\r\n<br />\r\nDaniel menambahkan, selain itu juga, syaratnya adalah mendapatkan rekomendasi dari member idEA. Misalnya saja, ada perusahan e-commerce baru, jika mereka ingin mendapatkan akreditasi, maka mereka harus memiliki koneksi member idEA.<br />\r\n<br />\r\n&quot;Jadi intinya berdasarkan dari rekomendasi member idEA. Itu kalau korporat. Untuk individual kita juga bisa agar mereka menjadi member idEA yang individu. Per bulannya itu Rp 200 ribu. Tapi, setiap bulan mesti kita rutin untuk mengeceknya,&quot; jelasnya.&nbsp;<strong>(rou/ash)</strong>&nbsp;</p>\r\n', '2016-04-28 04:38:59', '1', '3');
INSERT INTO `berita` VALUES ('2', '<i>Wow</i>! Counter-Strike 1.6 Bisa Dimainkan di Smartwatch', '3', 'd16b2af9-4515-462f-a1ca-4e46af5187c8_169.jpg', '<p><strong>Jakarta</strong>&nbsp;- Penggunaan Android Wear memang belum sepopuler smartphone atau tablet. Meski demikian, perangkat wearable ini tak kalah menarik untuk dijadikan platform bermain Counter-Strike 1.6.<br />\r\n<br />\r\nDiperkenalkan pertama kali pada Maret 2014 lalu, smartwatch Android Wear memiliki fungsi utama sebagai fitness tracker. Dua tahun kemudian, wearable gadget ini nyatanya tak hanya berfungsi sebagai fitness tracker, tapi juga platfrom gaming.<br />\r\n<br />\r\nAdalah Dave Bennett, seorang developer merangkap gamer yang berhasil memainkan game classic shooter Valve itu ke dalam perangkat yang lebih mungil bahkan dari smartphone sekalipun. Semua itu dilakukannya menggunakan LG G Watch.<br />\r\n<br />\r\nDikutip&nbsp;<strong>detikINET&nbsp;</strong>dari&nbsp;<em>Phone Arena,</em>&nbsp;Rabu (27/4/2016), untuk bisa memainkan Counter-Strike 1.6, yang dibutuhkan adalah aplikasi Xash3D. Aplikasi ini memungkinkan salinan game Windows seperti Counter-Strike 1.6 untuk berjalan di perangkat Android Wear.&nbsp;<br />\r\n<br />\r\nMeski sukses dijalankan di perangkat Android Wear, bermain Counter-Strike 1.6 dengan lancar sepertinya mustahil. Dengan ukuran layar yang sempit, tentu akan membatasi ruang gerak dan kontrol pemain.<br />\r\n<br />\r\nSebelumnya, seorang developer berhasil meng-convert Counter-Strike 1.6 untuk perangkat smartphone Android. Namun, tetap saja game ini lebih asyik dimainkan melalui platform PC ketimbang smartphone apalagi Android Wear.</p>\r\n', '2016-04-28 04:40:04', '1', '4');
INSERT INTO `berita` VALUES ('3', 'Ini Dia Startup Titipan Presiden Jokowi', '3', '3701ead0-b62c-421a-9313-b33044e552b5.jpg', '<p><strong>Jakarta</strong>&nbsp;- Presiden Joko Widodo secara terang-terangan menyebut nama sejumlah startup kepada para menterinya agar bisa dibantu dan dibimbing supaya bisa sukses. Siapa saja mereka?<br />\r\n<br />\r\n&quot;Saya titip Halodoc, Tanihub, Lima Kilo, dan Nurbaya Initiative. Semua harus betul-betul diberi dorongan agar cepat meloncat ke level berikut,&quot; kata Jokowi saat meresmikan Indonesia E-commerce Summit &amp; Expo di Indonesia Convention Exhibition (ICE), Serpong, Rabu (27/4/2016).<br />\r\n<br />\r\nBukan tanpa maksud para startup itu disebut dan dititipkan untuk dibantu. Karena menurutnya, para startup itu nantinya bisa ikut mendorong Indonesia menjadi The Digital Energy of Asia.&nbsp;<br />\r\n<br />\r\nHalodoc sendiri merupakan layanan dokter virtual. Aplikasi ini juga sempat membuat Menteri Komunikasi dan Informatika Rudiantara terkesima karena bisa menjadi terobosan di industri kesehatan.<br />\r\n<br />\r\nSementara Tanihub, Lima Kilo, dan Nurbaya Initiative, merupakan aplikasi yang menyasar kalangan petani agar bisa ikut terbantu digitalisasi. Jokowi pun berharap akan semakin banyak lagi aplikasi berguna semacam ini nantinya lewat program seribu startup.<br />\r\n<br />\r\n&quot;Mesti dihubungkan juga untuk mencarikan pemuda yang bisa kerjasama agar melangkah ke level lebih atas lagi. Petani nelayan, usaha mikro yang ingin jual produk. Dari kampung, dari desa, musti bisa disambungkan dengan aplikasi-aplikasi,&quot; pungkasnya.&nbsp;<strong>(rou/ash)</strong></p>\r\n', '2016-04-28 04:40:53', '1', '4');
INSERT INTO `berita` VALUES ('4', 'Liverpool Favorit, tapi Villarreal Tak Inferior', '2', 'a27a17b1-5c68-49e4-a5dd-e5233fc7d3c8_43.jpg', '<p><strong>Villarreal</strong>&nbsp;- Villarreal menilai Liverpool lebih difavoritkan untuk lolos ke final Liga Europa. Meski demikian, Villarreal tetap optimistis bisa menyingkirkan Liverpool<br />\r\n<br />\r\nVillarreal dan Liverpool akan saling berhadapan di semifinal Liga Europa. Villarreal akan lebih dulu menjadi tuan rumah pertandingan leg pertama pada Jumat (29/4/2016) dinihari WIB.<br />\r\n<br />\r\nMenilik perjalanan Liverpool musim ini, pelatih Villarreal, Marcelino, menilai calon lawannya itu lebih diunggulkan daripada timnya. Dalam langkahnya menuju semifinal,&nbsp;<em>The Reds&nbsp;</em>menyingkirkan sejumlah tim tangguh seperti Manchester United dan Borussia Dortmund.<br />\r\n<br />\r\nKendati demikian, Marcelino menjamin kalau nyali Villarreal tak akan ciut menghadapi Liverpool. Dia punya keyakinan kalau Villarreal bisa mengatasi tim arahan Juergen Klopp itu.<br />\r\n<br />\r\n&quot;Liverpool mungkin saja favorit. Untuk sejarah mereka, klub, potensi mereka, dan karena telah menyingkirkan Borussia Dortmund mereka dikategorikan demikian. Tapi kami tidak menganggap diri kami inferior. Kami akan melakukan segalanya untuk menyingkirkan tim legendaris,&quot; ujar Marcelino seperti dikutip dari Football Espana.<br />\r\n<br />\r\n&quot;Mereka adalah tim yang sangat bagus dengan pemain-pemain luar biasa yang bermain sangat intens. Mereka punya serangan balik yang luar biasa dan banyak menekan, jadi mereka tidak akan membiarkan kami mengembangkan permainan. Kami harus menemukan solusi untuk melewati tekanan pertama.&quot;<br />\r\n<br />\r\n&quot;Benar bahwa ini akan jadi pertandingan yang indah. Secara keseluruhan, kami punya ide yang hampir sama,&quot; imbuhnya.<br />\r\n<br />\r\n&quot;Kami tidak berada di bawah tekanan. Saya sangat puas dan bersyukur dengan skuat untuk tampil di semifinal. Kami punya harapan dan keyakinan kami bisa menyingkirkan Liverpool, tapi kami selalu mencoba menikmati permainan. Kami merasa istimewa bisa memainkan semifinal ini,&quot; katanya.</p>\r\n', '2016-04-28 04:42:35', '1', '5');
INSERT INTO `berita` VALUES ('5', 'Del Piero Amat Berharap Leicester Juara', '2', 'b51106a4-3b3a-40ff-8a97-58c11fa51e6b_43.jpg', '<p><strong>Jakarta</strong>&nbsp;- Alessandro Del Piero, mantan bintang Juventus dan tim nasional Italia, sungguh berharap Leicester City akan bisa menjuarai Premier League Inggris.<br />\r\n<br />\r\nKiprah Leicester yang secara mengejutkan berada di garis terdepan persaingan Premier League musim ini tidak luput dari pengamatan Del Piero.<br />\r\n<br />\r\nDengan Leicester kini memimpin tujuh angka dari pesaing tunggal, Tottenham Hotspur, saat kedua tim tinggal menyisakan masing-masing tiga pertandingan, Del Piero pun benar-benar berharap The Foxes akan melintasi garis finis di posisinya sekarang.<br />\r\n<br />\r\n&quot;Leicester semakin dekat saja ke titel Premier League,&quot; tulis Del Piero dalam editorial untuk Sky, seperti dikutip oleh&nbsp;<em>Football Italia.</em><br />\r\n<br />\r\n&quot;Saya benar-benar berharap itu akan berakhir seperti harapan kita semua, karena itu akan benar-benar jadi sesuatu untuk dikisahkan kepada cucu di masa mendatang, bahwa tidak ada yang mustahil dalam olahraga,&quot; sebutnya.<br />\r\n<br />\r\nKisah Leicester terasa amat luar biasa mengingat musim lalu justru lebih banyak mengakrabi tempat sebagai juru kunci. Bahkan baru di tujuh pekan terakhir musim itu Leicester bisa merayap naik untuk mengamankan posisi.<br />\r\n<br />\r\nPeruntungan Leicester berubah drastis musim ini karena malah lebih betah di papan atas. Sejak Pekan 22 sampai sekarang, posisi pertama bahkan tidak pernah lepas dari pijakan Leicester yang sejak musim panas lalu ditangani oleh Claudio Ranieri.<br />\r\n<br />\r\nRanieri sendiri bukan sosok asing untuk Del Piero. Peracik taktik asal Italia itu pernah menangani Juve pada kurun waktu Juni 2007-Mei 2009, dengan Del Piero menjadi kapten timnya. Pada musim pertamanya di Turin, Ranieri membawa Bianconeri finis ketiga di Serie A untuk lolos ke Liga Champions--setelah pada musim sebelumnya klub tersebut harus main di kompetisi Serie B.</p>\r\n', '2016-04-28 04:53:50', '2', '6');
INSERT INTO `berita` VALUES ('6', 'Ketika Dominasi Bayern Tidak Berujung Kemenangan', '2', '7ff1a05d-f398-4bf6-916c-a42df63e0551_43.jpg', '<p><strong>Madrid</strong>&nbsp;- Bayern Munich memulai laga di Vicente Calderon dengan tempo lambat, yang mana membuat mereka kebobolan. Namun, semua berubah di babak kedua.<br />\r\n<br />\r\nPada laga di kandang Atletico Madrid itu, Kamis (28/4/2016), Bayern kebobolan ketika pertandingan baru berjalan 11 menit. Atletico, yang bermain dengan greget di babak pertama, sukses mencetak gol setelah Saul Niguez mengecoh empat orang pemain Bayern.<br />\r\n<br />\r\n&quot;Secara keseluruhan, ini pertandingan menarik. Tapi, kami memulai dengan buruk. Gol itu sendiri merupakan konsekuensi dari lambatnya permainan kami,&quot; kata pelatih Bayern, Pep Guardiola.<br />\r\n<br />\r\nDi babak kedua, Bayern bangkit. Mereka tidak membiarkan Atletico mengembangkan permainan. Penguasaan bola nyaris selalu berada dalam kaki-kaki pemain mereka.<br />\r\n<br />\r\nDominasi Bayern itu tergambar jelas dalam statistik. UEFA mencatat, Bayern melepaskan 631 operan sepanjang laga, sedangkan Atletico hanya melepaskan 146 operan.<br />\r\n<br />\r\n&quot;Sayang sekali, kami tidak mendapatkan kemenangan, mengingat di babak kedua kami telah mencoba segalanya,&quot; ujar kiper Bayern, Manuel Neuer, seperti dilansir&nbsp;<em>Soccerway</em>.<br />\r\n<br />\r\n&quot;Di Munich, kami harus benar-benar bangkit,&quot; kata kiper tim nasional Jerman tersebut.<br />\r\n<br />\r\nAtletico, selama di bawah arahan Diego Simeone, memang punya catatan bagus kala bermain di laga Liga Champions di Liga Champions. Dari 17 pertandingan kandang bersama Simeone di kompetisi antarklub Eropa tersebut, mereka memenangi 13 di antaranya dan meraih 14 clean sheet.</p>\r\n', '2016-04-28 04:56:05', '2', '10');
INSERT INTO `berita` VALUES ('8', 'Dimutasi ke Badan Diklat DKI, Rustam Effendi Pagi Ini Belum Terlihat \'Ngantor\'', '1', '280924f1-9f1f-445b-834a-f7bf09d66f59.jpg', '<p><strong>Jakarta</strong>&nbsp;- Mantan Walikota Jakarta Utara Rustam Effendi dimutasikan ke Badan Pendidikan dan Pelatihan (Diklat) DKI Jakarta. Namun hingga pagi ini Rustam masih belum terlihat di kantor barunya.&nbsp;<br />\r\n<br />\r\n&quot;Belum, Pak Rustam hingga hari ini belum terlihat di sini,&quot; kata Sekertaris Badan Diklat, Lutfi Arifin, ketika ditemui detikcom di Kantor Badan Diklat DKI, Gedung Pelayanan Teknis, Jl Abdul Muis, Jakarta Pusat, Kamis (28/4/2016).&nbsp;<br />\r\n<br />\r\nLutfi mengaku sudah mendengar kabar pemindahan Rustam Effendi ke Badan Diklat. Namun hingga pagi ini dirinya belum menerima SK-tembusan mutasi tersebut.&nbsp;<br />\r\n<br />\r\n&quot;Kita di Badan Diklat belum terima (SK), tapi saya sudah dengar pak Rustam dipindah ke sini. Mungkin beliau juga belum terima SK-nya, jadi belum bisa datang ke sini untuk melapor. Kan semua harus dilaporkan dulu,&quot; imbuh dia.&nbsp;</p>\r\n\r\n<p><br />\r\nRustam Effendi akan menempati posisi sebagai Staf Fungsional Umum dengan jabatan teknis ahli. &quot;Nanti kalau Pak Rustam datang akan kami terima sudah ada disediakan ruangannya juga, sedang kami tata. Nanti (Rustam) akan jadi staf fungsional umum,&quot; jelas Lutfi.<br />\r\n<br />\r\nKepala Badan Kepegawaian Daerah (BKD) DKI Agus Suradika menyebut Rustam efektif berkantor di Badan Diklat DKI per tanggal 27 April 2016. Agus menyebut SK Rustam sudah selesai dan siap untuk diproses.<br />\r\n<br />\r\n&quot;Per hari ini SK-nya tapi. Sesuai dengan proses nanti beliau memindahkan sidik jarinya dulu karena kan semua pakai touchscreen. Mungkin proses mulai besok lah (28/4),&quot; kata Agus di ruang kerjanya, Rabu (27/4).</p>\r\n', '2016-04-28 05:03:19', '2', '14');
INSERT INTO `berita` VALUES ('10', 'Sampurasun, Elang Barat Mendarat di Kota Santri', '3', 'c0692b3a-f829-488d-9366-8e5ccd185194_169.jpg', '<p><strong>Tasikmalaya</strong>&nbsp;- Usai menjelajahi sejumlah kota di Pulau Sumatera, drone Ekspedisi Langit Nusantara (Elang Nusa) yang melintas di jalur barat Indonesia (Elang Barat) tiba di tanah Jawa.<br />\r\n<br />\r\nElang Barat mendarat di pulau Jawa pada 27 April lalu. Jakarta menjadi kota pertama yang didarati. Setelah menyambangi Bogor dan Bandung, drone Elang Barat pun tiba di Kota Tasikmalaya pada Sabtu siang (30/4/2016).<br />\r\n<br />\r\nGeneral Manager Sales Telkomsel Area Jawa Barat Hasan Kurdi mengatakan Tasikmalaya menjadi salah satu titik pemberhentian Elang Nusa yang menjelajahi jalur Barat Indonesia. Ini dikarenakan kota yang berada di daerah Parahyangan Timur itu memiliki arti penting bagi Telkomsel.<br />\r\n<br />\r\n&quot;Pengunaan data untuk internet di Tasikmalaya sangat tinggi. Hadirnya Elang Barat sebagai bentuk pembuktian kami bahwa Telkomsel tidak setengah hati memberikan layanan pada masyarakat Kota Tasikmalaya,&quot; ujarnya.</p>\r\n\r\n<p>Begitu tiba di Kota Santri, drone berukuran besar itu langsung disambut sejumlah komunitas. Beberapa diantaranya adalah Penggemar Photografi Tasikmalaya (PFT), Komunitas Photografi Amatir Tasikmalaya (KoFAT), Tasikmalaya Drone Community (TDC) dan Komunitas Cosplay Tasikmalaya.</p>\r\n\r\n<p><br />\r\nElang Barat pun lantas diarak dari Pangkalan Udara (Lanud) TNI AU Wiriadinata menuju lapangan Dadaha yang menjadi pusat kegiatan. Di sepanjang jalan, drone Elang Barat dikawal oleh sejumlah komunitas otomotif, diantaranya Komunitas Yamaha R25 Owners Indonesia (YROI PRIANGAN TIMUR), Komunitas Datsun Go Club Indonesia (DGCI), Komunitas Vespa (MOVE), Komunitas CBR Club Indonesia Region Tasikmalaya, dan Komunitas Blazer Indonesia Club Rayon Tasikmalaya (BAYONET).</p>\r\n\r\n<p>&quot;Kami ingin mengajak masyarakat dan berbagai komunitas di Tasikmalaya dapat melihat lebih dekat drone berukuran besar yang menangkap keindahan Indonesia di jalur Barat dari udara,&quot; kata Hasan.<br />\r\n<br />\r\nSeperti diketahui ekspedisi Elang Nusa berlangsung selama satu bulan penuh, mulai dari 14 April hingga 14 Mei 2016. Lewat ekspedisi ini, Telkomsel mengajak masyarakat Indonesia bersama-sama menguji keandalan jaringan broadband Telkomsel, baik 3G maupun 4G.<br />\r\n<br />\r\n&quot;Berkat kehadiran mobile broadband, saat ini masyarakat Indonesia pun semakin terhubung satu sama lain. Kehadiran layanan broadband dari Telkomsel yang berkualitas di berbagai daerah seperti di Tasikmalaya ini kami harap juga akan mendorong produktivitas masyarakat di berbagai aspek seperti dari sisi ekonomi, pariwisata, industri kreatif, dan lainnya&quot;, tutup Hasan.<br />\r\n<br />\r\nDalam ekspedisi Elang Nusa, dua buah drone berjenis UAV (Unmanned Aerial Vehicle) dengan bentangan sayap hingga 2,5 m akan melintasi lebih dari 50 kota di Indonesia. Keduanya diterbangkan secara bersamaan, menempuh Jalur Barat (Elang Barat) dan Jalur Timur (Elang Timur) Indonesia sepanjang 8.500 km.<br />\r\n<br />\r\nSelama program, kedua drone akan merekam video yang kemudian diunggah melalui jaringan Telkomsel ke www.telkomsel.com/elangnusa, sehingga masyarakat dapat mengikuti perjalanan secara lengkap, baik melalui live streaming maupun recorded.<br />\r\n<br />\r\nElang Barat akan memulai perjalanan dari Sabang dan akan menempuh beberapa kota diantaranya Medan, Palembang, Tasikmalaya, Yogyakarta dan Malang. Sementara Elang Timur, akan berangkat dari Merauke dan bergerak melewati Sorong, Ambon, Manado, Banjarmasin, Makassar, dan Labuan Bajo.<br />\r\n<br />\r\nDi akhir perjalanan kedua drone akan bertemu dan mendarat di Garuda Wisnu Kencana, Bali. Selain menangkap berbagai keindahan dari alam Indonesia, dalam perjalanannya, Elang Barat dan Elang Timur juga akan menyapa masyarakat yang berada di kota-kota yang dilewati.</p>\r\n', '2016-05-01 13:36:11', '2', '25');

-- ----------------------------
-- Table structure for buku_tamu
-- ----------------------------
DROP TABLE IF EXISTS `buku_tamu`;
CREATE TABLE `buku_tamu` (
  `komentar_id` int(11) NOT NULL AUTO_INCREMENT,
  `komentar_pengirim` varchar(100) NOT NULL,
  `komentar_email` varchar(100) NOT NULL,
  `komentar_isi` text NOT NULL,
  `komentar_status` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `komentar_tgl` datetime NOT NULL,
  PRIMARY KEY (`komentar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of buku_tamu
-- ----------------------------
INSERT INTO `buku_tamu` VALUES ('11', 'Adhitya ', 'adhitya@adit.com', 'This blog is very gorgeous!', 'ya', '2016-06-17 11:30:27');
INSERT INTO `buku_tamu` VALUES ('12', 'Fajar', 'fajar@gmail.com', 'Test... test.. test... ', 'ya', '2016-06-17 11:31:52');
INSERT INTO `buku_tamu` VALUES ('13', 'syamsul', 'syamsul@gmail.com', 'kdkdkd dldkdk dkldldldl', 'ya', '2016-06-21 03:33:01');
INSERT INTO `buku_tamu` VALUES ('14', 'Larry Page ', 'larrypage@gmail.com', 'Fjdkkdn kdkdkd kljlajdspfjadsfk kaldjflkjas dfmkajsdfkldsja posdjfjas ', 'tidak', '2016-06-27 06:29:41');

-- ----------------------------
-- Table structure for halaman
-- ----------------------------
DROP TABLE IF EXISTS `halaman`;
CREATE TABLE `halaman` (
  `id_hal` int(11) NOT NULL AUTO_INCREMENT,
  `nm_halaman` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL,
  PRIMARY KEY (`id_hal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of halaman
-- ----------------------------
INSERT INTO `halaman` VALUES ('1', 'Kontak', 'contact.php');
INSERT INTO `halaman` VALUES ('2', 'Tentang Kami', 'about.php');
INSERT INTO `halaman` VALUES ('3', 'Buku Tamu', 'buku-tamu.php');

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES ('1', 'Nasional');
INSERT INTO `kategori` VALUES ('2', 'Olahraga');
INSERT INTO `kategori` VALUES ('3', 'Teknologi');
INSERT INTO `kategori` VALUES ('4', 'Uncategorized');

-- ----------------------------
-- Table structure for pesan
-- ----------------------------
DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan` (
  `pesan_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan_isi` text NOT NULL,
  `status` varchar(5) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`pesan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pesan
-- ----------------------------
INSERT INTO `pesan` VALUES ('3', 'fajar@gmail.com', 'Fajar', 'Ingin testing saja', 'bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... bla... ', 'dibac', '2016-05-01 20:46:59');
INSERT INTO `pesan` VALUES ('4', 'thdarkman61@gmail.com', 'Fajar', 'dfldjfljdlkf', 'dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf dflkjdlfjladsf ', 'dibac', '2016-05-01 20:48:57');
INSERT INTO `pesan` VALUES ('5', 'mencoba@gmail.com', 'Mencoba lagi', 'mencoba', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, commodi corporis alias. Labore velit sequi sit, excepturi fugit aspernatur eum incidunt, quam totam natus placeat.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, commodi corporis alias. Labore velit sequi sit, excepturi fugit aspernatur eum incidunt, quam totam natus placeat.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, commodi corporis alias. Labore velit sequi sit, excepturi fugit aspernatur eum incidunt, quam totam natus placeat.</p>', 'dibac', '2016-05-01 21:05:40');
INSERT INTO `pesan` VALUES ('6', 'dfdf@dfd', 'ddfdf', 'adfsadfasf', 'asdfaaaaaafdddddddd', 'dibac', '2016-05-01 21:06:44');
INSERT INTO `pesan` VALUES ('8', 'fajar', 'Fajar', 'dfdfdf', 'dfkjdflkjdf', 'dibac', '2016-05-03 09:26:11');
INSERT INTO `pesan` VALUES ('12', 'thdarkman61@gmail.com', 'kdkdk', 'kjsladfj', '&lt;img src=&quot;&quot;&gt;', 'dibac', '2016-05-03 18:47:18');
INSERT INTO `pesan` VALUES ('13', 'email@gmail.com', 'nama', 'subjek', '&lt;img src=&quot;images&quot;&gt;', 'dibac', '2016-06-21 04:39:13');
