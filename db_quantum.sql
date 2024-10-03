-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Okt 2024 pada 12.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quantum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` longblob DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `preview` text DEFAULT NULL,
  `content` text NOT NULL,
  `seo_meta` text DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `image`, `release_date`, `author`, `preview`, `content`, `seo_meta`, `category`, `tags`, `created_at`, `slug`) VALUES
(10, 'Tren Video Marketing Perusahaan Korporat', 0x75706c6f6164732f766964656f2d6d61726b6574696e672e6a7067, '2023-10-02', 'Tiara Rosivaningtyas', 'Tren Video Marketing Perusahaan Korporat Berapa jam waktu yang kamu butuhkan untuk scroll video-video di TikTok maupun Instagram Reels? Atau berapa banyak video yang kamu tonton di YouTube dalam sehari? Menonton video di platform-platform tersebut memang sudah menjadi candu tersendiri, karena video yang muncul berbeda-beda setiap harinya. Apalagi, saat ini masyarakat cenderung lebih menyukai konten berbasis audio-visual dibandingkan lainnya.', '<p>Berapa jam waktu yang kamu butuhkan untuk scroll video-video di TikTok maupun Instagram Reels? Atau berapa banyak video yang kamu tonton di YouTube dalam sehari?</p>\r\n<p>Menonton video di platform-platform tersebut memang sudah menjadi candu tersendiri, karena video yang muncul berbeda-beda setiap harinya. Apalagi, saat ini masyarakat cenderung lebih menyukai konten berbasis audio-visual dibandingkan lainnya.</p>\r\n<p>Tren-tren video terus bermunculan dan membuat orang-orang mau tidak mau mengikutinya. Tak mau ketinggalan, para pelaku usaha juga berlomba-lomba untuk mempromosikan bisnisnya. Tidak hanya pelaku usaha kecil atau kelas UMKM, namun juga pada perusahaan korporat.</p>\r\n<p>Video marketing telah menjadi salah satu terobosan bagi perusahaan korporat untuk mengenalkan bisnisnya kepada calon konsumen. Dengan memasarkan bisnis menggunakan media video, konsumen dapat lebih memahami produk dan perusahaan.</p>\r\n<p>Apalagi, saat ini trend sosial media juga sudah berkembang ke arah video, seperti YouTube, TikTok, bahkan Instagram dengan fitur reels-nya.</p>\r\n<p>Tipe audio visual dipercaya menjadi media yang paling disukai, karena mudah diterima dan mudah dicerna. Perusahaan korporat berlomba-lomba untuk menyajikan konten yang segar dan kreatif untuk mendapatkan perhatian audiens.</p>\r\n<p><strong><span style=\"font-size: 14pt;\">Tren Pemasaran Video Instagram </span></strong></p>\r\n<p>Instagram merupakan salah satu sosial media hits yang digemari generasi muda, bahkan hingga saat ini.</p>\r\n<p>Meskipun pada awalnya Instagram berbasis gambar atau foto, namun seiring perkembangannya, justru saat ini konten video mendapatkan tanggapan yang lebih besar, hingga menjadi tren tersendiri.</p>\r\n<p>Tren video Instagram dipengaruhi oleh adanya fitur-fitur berbasis video seperti Reels, Live, dan Instagram Story. Fitur-fitur ini juga didukung oleh filter, audio, efek, dan lainnya.</p>\r\n<p>Perbedaan ketiganya terletak pada fungsi dan durasi masing-masing fitur. <strong>Reels </strong>memiliki durasi yang lebih panjang dari Instagram Story dan bisa masuk ke dalam feeds. Oleh karena itu, reels biasa digunakan dalam pembuatan konten.</p>\r\n<p><strong>Instagram Story</strong> memiliki durasi hingga satu menit saja dan postingan tersebut hanya bertahan selama 24 jam saja. Umumnya instagram story digunakan untuk memposting teaser, promosi singkat, maupun peristiwa <em>real-time</em> di balik layar.</p>\r\n<p>Di antara ketiganya, <strong>Instagram Live</strong> adalah fitur yang lebih berbeda, hal ini karena penonton dapat menyaksikannya secara real time dengan durasi yang tak terbatas. Biasanya, Instagram Live digunakan untuk mengenalkan produk dan berinteraksi secara langsung dengan pemirsa.</p>\r\n<p>Munculnya konten kreator di platform Instagram, atau biasa disebut selebgram juga turut meramaikan beragamnya tren video di Instagram. Hal ini tentu saja juga dimanfaatkan perusahaan korporat sebagai salah satu media pemasaran produk yang mereka jual.</p>\r\n<p>Akhirnya, saat ini sebagian besar brand telah memiliki akun Instagram masing-masing untuk mempromosikan atau menjual produk, dengan frekuensi postingan video yang meningkat dengan pesat.</p>\r\n<p>Melalui konten video di Instagram, perusahaan dapat menjangkau audiens yang lebih luas sekaligus dapat berinteraksi dengan pelanggan ataupun calon pelanggan.</p>\r\n<p>Video yang biasanya diproduksi oleh perusahaan korporat bisa berupa video <strong>branding</strong>, video produk, tutorial, edukasi, maupun mengikuti tren-tren yang sudah ada.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Tren Pemasaran Video TikTok</strong></span></p>\r\n<p>TikTok saat ini menjadi salah satu platform populer yang mengalami kenaikan pesat, terutama sejak pandemi. Pandemi membuat penggunaan media sosial menjadi meningkat di tengah rasa bosan penerapan pembatasan sosial dan karantina wilayah. Dikutip dari katadata.co.id, sejak pandemi hingga tahun 2022, jumlah pengguna TikTok di Indonesia meningkat hingga 207,69%.</p>\r\n<p>Kenaikan pesat ini disebabkan karena TikTok memiliki fitur &lsquo;<em>For Your Page</em>&rsquo; atau biasa disingkat FYP yang menyesuaikan minat masing-masing pengguna dan aktivitas sebelumnya. Tidak heran ketika kita membuka TikTok, rasanya sulit untuk berhenti karena apa yang disajikan sesuai dengan apa yang ingin kita lihat.</p>\r\n<p>TikTok memungkinkan penggunanya untuk merekam, mengkreasikan, maupun hanya sekedar menonton video berdurasi pendek, hingga maksimal 10 menit. Sisi menarik dari TikTok adalah tren video yang tidak ada habisnya.</p>\r\n<p>Selalu ada tren baru dan konten yang segar setiap harinya. Tren video, challenges, suara, humor, dan lainnya. TikTok juga membebaskan penggunanya untuk berekspresi dan kreatif. Hal ini juga didukung dengan fitur sound, efek, template, stitch, duet, hingga siaran langsung.</p>\r\n<p>Meskipun pada awalnya TikTok digunakan untuk video-video bersifat hiburan dan komedi, namun saat ini TikTok banyak digunakan untuk konten edukasi, kecantikan, memasak, hingga marketing atau pemasaran.</p>\r\n<p>TikTok dapat digunakan perusahaan korporat untuk mempromosikan bisnisnya. Platform ini memberikan peluang untuk meningkatkan <em>brand awareness</em> dengan terhubung dengan khalayak luas dengan pendekatan yang santai sekaligus pribadi.</p>\r\n<p>Perusahaan korporat juga dapat menjalin kerja sama dengan <em>influencer </em>atau TikTok Creator untuk mempromosikan produknya. Semakin banyak <em>followers</em>, maka produk tersebut akan menjangkau audiens yang lebih besar.</p>\r\n<p>Disamping mengenalkan bisnis secara organik, TikTok juga dapat digunakan untuk beriklan, bahkan terdapat beberapa jenis iklan di TikTok seperti In-feeds Ads, Pop Up Ads (pengambilalihan merek), TopView Ads, tantangan hashtag bermerek, dan efek bermerek.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Tren Pemasaran Video YouTube</strong></span></p>\r\n<p>Sebelum Instagram dan TikTok, YouTube telah menjadi media sosial yang digunakan untuk berbagi konten video sejak dulu. Ibaratnya, platform ini merupakan sesepuh dalam dunia tren video. Platform ini sangat luas dan memiliki jutaan pengguna aktif di seluruh dunia.</p>\r\n<p>Berbeda dengan TikTok dan Instagram, yang mayoritas digunakan anak-anak muda dan dewasa, YouTube memiliki pengguna yang lebih bervariasi dan tersebar dari balita hingga lanjut usia.</p>\r\n<p>YouTube marketing dapat digunakan untuk mengenalkan sekaligus meningkatkan penjualan produk. Umumnya, video marketing yang dibagikan melalui YouTube berupa demonstrasi produk, review barang, testimonial pelanggan, penjelasan dan tutorial, maupun konten edukasi.</p>\r\n<p>Kelebihan YouTube marketing dibandingkan platform lainnya adalah lebih besarnya kesempatan untuk muncul di hasil pencarian teratas <em>search engine Google</em>. Ini akan menciptakan <em>backlink </em>secara tidak langsung pada situs web perusahaan</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Tren Pemasaran Video UGC Creator</strong></span></p>\r\n<p>Tren pemasaran video melalui <em>User Generated Content Creator</em> saat ini menjadi tren yang sangat ramai dibicarakan. Biasanya, konten yang dibagikan bisa berupa review, video sinematik, video produk, video edukasi, <em>user experience</em> dan konten lainnya. Platform yang biasanya digunakan antara lain TikTok, Instagram, dan YouTube.</p>\r\n<p>Jika beberapa tahun silam orang yang mempromosikan produk biasanya <em>public figure</em> seperti selebriti, tokoh penting, <em>influencer</em>, dan <em>content creator</em> yang biasa disebut selebgram, seleb TikTok, maupun <em>YouTubers</em>, maka tren ini memungkinkan semua pengguna media sosial membuat konten promosi sebuah produk.</p>\r\n<p>Perusahaan korporat biasanya menyukai video buatan UGC Creator karena terasa lebih organik. Pemirsa juga biasanya lebih percaya pada teknik pemasaran UGC Creator, karena konten yang dibuat terasa lebih nyata dan jujur.</p>\r\n<p>Saat ini, justru pemasaran secara hard selling seperti iklan maupun endorsement yang dilakukan para public figure cenderung kurang mempengaruhi penjualan, karena dianggap tidak autentik.</p>\r\n<p>Keunggulan lain dari tren pemasaran video UGC Creator adalah kemampuannya dalam mendapatkan konten yang autentik sebanyak-banyaknya. Semakin banyak UGC Creator yang membuat konten terkait produk tertentu, semakin luas pula jangkauan audiens dan brand awareness produk tersebut.</p>\r\n<p>Konten video UGC Creator juga membuat perusahaan lebih menghemat biaya pemasaran. Hal ini karena umumnya UGC Creator membuat konten secara cuma-cuma, dan apabila berbayar jauh lebih murah daripada endorsement untuk public figure. Selain itu juga dapat mengurangi biaya produksi dan distribusi konten</p>\r\n<p>UGC Creator dapat membuat perusahaan lebih mengerti suara pelanggan sehingga dapat membangun kredibilitas dan kepercayaan jangka panjang.</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Tren Video Marketing yang Mempengaruhi Perusahaan Korporat</strong></span></p>\r\n<p>Meskipun tren-tren yang telah disebutkan memiliki peran dalam mempromosikan produk dan membantu meningkatkan penjualannya, namun terdapat beberapa tren yang dirasa paling efektif dibanding lainnya. Lalu, tren video marketing seperti apakah yang mempengaruhi perusahaan korporat secara efektif?</p>\r\n<ul>\r\n<li>Live Video</li>\r\n</ul>\r\n<p>Hampir seluruh platform sosial media memiliki fitur video siaran langsung. Keunggulan dari video live ini adalah kemudahannya dalam menjangkau audiens dan menarik konsumen baru. Live video juga dapat memungkinkan perusahaan berdialog secara langsung dengan calon pembelinya.</p>\r\n<ul>\r\n<li>Video Produk</li>\r\n</ul>\r\n<p>Video yang memamerkan produk secara jelas disertai dengan tautan untuk pembelian yang bisa diakses oleh calon konsumen biasanya juga memiliki pengaruh besar bagi perusahaan korporat.</p>\r\n<p>Apalagi, saat ini di TikTok sudah difasilitasi dengan etalase atau yang biasa disebut dengan &lsquo;keranjang kuning&rsquo;. Hal ini dinilai mempermudah calon konsumen untuk melakukan pembelian tanpa meninggalkan media sosial yang sedang dibuka.</p>\r\n<ul>\r\n<li>Video Tutorial</li>\r\n</ul>\r\n<p>Video tutorial, unboxing, edukasi, dan sejenisnya juga memiliki pengaruh terhadap perusahaan korporat. Hal ini karena video-video tersebut akan membuat calon konsumen merasa lebih dekat dan lebih tau mengenai produk yang akan dijual.</p>\r\n<p><strong>Setelah mengetahui tren video marketing yang memberikan pengaruh pada perusahaan korporat, kamu bisa menerapkannya untuk bisnismu. Terlepas dari apapun jenis kontennya, dan dimanapun platform yang digunakan, kreativitas dan konsistensi adalah kuncinya. Selamat mencoba!</strong></p>', '', 'video marketing', '#videomarketing #video #marketing', '2024-09-15 11:09:34', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','users') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'users1', 'd351331735b1980b6dee831c10abbc0b', 'users');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
