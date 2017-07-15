-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2017 at 08:33 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aboutme`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutme`
--

CREATE TABLE `aboutme` (
  `id_aboutme` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail_text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aboutme`
--

INSERT INTO `aboutme` (`id_aboutme`, `name`, `detail_text`) VALUES
(1, 'Chào Mừng Bạn Đến Với Website Cá Nhân của Nguyễn Văn Tân', '<p>My name is Nguyen Van Tan, Quang Nam province I come from, I am an active person and like to mingle with people, interests are; Listening to music, playing badminton, watching movies ...</p>\r\n'),
(2, 'Chào Mừng Bạn Đến Với Website Cá Nhân của Nguyễn Tân', '<p>Ch&agrave;o Mừng Bạn Đến Với Website C&aacute; Nh&acirc;n của Nguyễn T&acirc;n</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `advs`
--

CREATE TABLE `advs` (
  `id_advs` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advs`
--

INSERT INTO `advs` (`id_advs`, `name`, `banner`, `link`) VALUES
(1, 'Hè học gì JAVA hay PHP', 'banner1.jpg', 'https://www.facebook.com/'),
(5, 'Ông hoàng bà chúa', 'c3302cc8c6b122660db24e6452ea8e2f.jpg', 'http://danviet.vn/giai-tri/7-ong-hoang-ba-chua-quang-cao-cua-showbiz-viet-653168.html'),
(7, 'Vì Sao Xanh', 'cb6e53d05b7fc7f4cb41ac50ed4961e0.jpg', 'http://visaoxanh.com/');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_cat` int(255) NOT NULL,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_cat`, `name`) VALUES
(1, 'Thể thao'),
(3, 'Thế giới'),
(4, 'Kinh doanh'),
(16, 'Góc nhin'),
(17, 'Bóng đá');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(12) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(12) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `fullname`, `email`, `address`, `phone`, `content`) VALUES
(23, 'Chào Mừng Bạn Đến Với Website Cá Nhân của tôi', 'vantancnttk13@gmail.', 'Tam Xuân Núi Thành Quảng Nam', 1263751380, '\r\n\r\nKhông gì là không thể\r\nNguyễn Văn Tân\r\n\r\nCuộc sống vẫn vậy nếu nó lấy đi thứ gì của bạn, thì thế nào nó cũng bù lại cho bạn thứ khác, chỉ có điều là bạn có chịu đi tìm ha');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `IP_address` int(12) NOT NULL,
  `local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(255) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `preview_text` text COLLATE utf8_unicode_ci NOT NULL,
  `detail_text` text COLLATE utf8_unicode_ci,
  `id_cat` int(255) NOT NULL,
  `picture` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `read` int(6) NOT NULL,
  `id_user` int(3) NOT NULL,
  `is_active` int(2) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `name`, `preview_text`, `detail_text`, `id_cat`, `picture`, `read`, `id_user`, `is_active`, `date`) VALUES
(50, 'Using the grid bels/1ters it', '', '', 1, '', 0, 1, 1, '25 September'),
(51, 'Using the grid bels/1ters it', '', '', 1, '', 28, 1, 1, '25 September'),
(52, 'Using the grid bels/1ters it', '', '', 1, '00484d31974608e06399534e3b898b27.jpg', 4, 1, 1, '25 September'),
(53, 'Chelsea: Ủng hộ Conte, Abramovich bạo chi nâng cấp hàng thủ', 'Mặc dù để thua liền 2 trận tại Premier League nhưng HLV Conte vẫn được ông chủ Abramovich tin tưởng. Không những vậy tỷ phú Nga còn cam kết cấp tiền chuyển nhượng.', '<p>Sau khi <a href="http://www.24h.com.vn/chelsea-p723c48.html">Chelsea</a> c&oacute; được khởi đầu như &yacute; với 3 v&ograve;ng to&agrave;n thắng, họ c&agrave;ng chơi c&agrave;ng để lộ nhiều điểm yếu. 3 v&ograve;ng gần đ&acirc;y th&agrave;y tr&ograve; <strong>Conte</strong>&nbsp;chỉ kiếm được duy nhất 1 điểm v&agrave; để thủng lưới đến 7 b&agrave;n. Nguy&ecirc;n nh&acirc;n ch&iacute;nh l&agrave; h&agrave;ng thủ khi đội trưởng Terry chấn thương c&ograve;n c&aacute;c t&acirc;n binh chưa đ&oacute;ng g&oacute;p được nhiều.</p>\r\n\r\n<p><img alt="Chelsea: Ủng hộ Conte, Abramovich bạo chi nâng cấp hàng thủ - 1" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474941030-500chelsea1.jpg" /></p>\r\n\r\n<p>HLV Conte vẫn an to&agrave;n sau 3 v&ograve;ng đấu kh&ocirc;ng thắng</p>\r\n\r\n<p>Chelsea gần như đ&aacute;nh mất ho&agrave;n to&agrave;n khả năng ph&ograve;ng ngự. Một đội b&oacute;ng trung b&igrave;nh như Swansea cũng c&oacute; thể l&agrave;m tung lưới Courtois 2 lần. Chưa hết, chuyến l&agrave;m kh&aacute;ch đến <a href="http://www.24h.com.vn/arsenal-p722c48.html">Arsenal</a> vừa qua, Chelsea thua li&ecirc;n tiếp 3 b&agrave;n chỉ trong v&ograve;ng chưa đầy 30 ph&uacute;t (từ ph&uacute;t 11 đến ph&uacute;t 40).</p>\r\n\r\n<p>M&ugrave;a h&egrave; vừa qua, HLV <em>Conte</em> đ&atilde; mang về 2 hậu vệ l&agrave; David Luiz v&agrave; Marcos Alonso. Cả hai t&acirc;n binh n&agrave;y đều đ&atilde; ra s&acirc;n song kh&ocirc;ng tạo ra sự tin tưởng. Rất may cho chiến lược gia người &Yacute; l&agrave; chủ tịch Abramovich th&ocirc;ng cảm cho vấn đề nh&acirc;n sự m&agrave; kh&ocirc;ng truy cứu tr&aacute;ch nhiệm. Ngược lại, tỷ ph&uacute; Nga c&ograve;n tuy&ecirc;n bố sẽ đầu tư để cải thiện h&agrave;ng ph&ograve;ng ngự.</p>\r\n\r\n<p>C&acirc;y viết Sami Mokbel đ&atilde; tiết lộ tr&ecirc;n Daily Mail, &ocirc;ng chủ Abramovic đ&atilde; kh&aacute; vui vẻ trong buổi họp mới đ&acirc;y c&ugrave;ng BLĐ Chelsea. Bất chấp Chelsea đ&atilde; 3 v&ograve;ng li&ecirc;n tiếp kh&ocirc;ng thắng tại <a href="http://www.24h.com.vn/premier-league-2016-2017-c48e2367.html">Premier League</a> v&agrave; để Man City bỏ c&aacute;ch đến 7 điểm tr&ecirc;n bảng xếp hạng. Mặc d&ugrave; vậy, Abramovich khẳng định Conte kh&ocirc;ng c&oacute; lỗi, nguy&ecirc;n nh&acirc;n s&acirc;u xa của sự việc l&agrave; nh&acirc;n sự ở h&agrave;ng thủ.</p>\r\n\r\n<p><img alt="Chelsea: Ủng hộ Conte, Abramovich bạo chi nâng cấp hàng thủ - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474941030-500chelsea2.jpg" /></p>\r\n\r\n<p>Tỷ ph&uacute; Abramovich cam kết cấp tiền chuyển nhượng</p>\r\n\r\n<p>Để giải quyết dứt điểm vấn đề n&agrave;y, Chelsea sẽ mua sắm mạnh tay trong kỳ chuyển nhượng m&ugrave;a đ&ocirc;ng sắp tới. C&ocirc;ng việc của Conte l&agrave; l&ecirc;n danh s&aacute;ch những hậu vệ cần bổ sung v&agrave; Abramovic c&ugrave;ng bộ sậu sẽ c&acirc;n đối t&agrave;i ch&iacute;nh để đưa ra ng&acirc;n s&aacute;ch cụ thể cho phi&ecirc;n chợ v&agrave;o th&aacute;ng Gi&ecirc;ng tới đ&acirc;y.</p>\r\n\r\n<p>Một tin vui kh&aacute;c cho HLV Conte đ&oacute; l&agrave; chấn thương của John Terry đ&atilde; ho&agrave;n to&agrave;n b&igrave;nh phục. Dự kiến, đội trưởng 35 tuổi sẽ ra s&acirc;n trong trận gặp Hull cuối tuần n&agrave;y. Đ&acirc;y sẽ l&agrave; sự bổ sung quan trọng kh&ocirc;ng chỉ chuy&ecirc;n m&ocirc;n m&agrave; c&ograve;n c&oacute; &yacute; nghĩa tinh thần rất lớn cho c&aacute;c cầu thủ Chelsea.</p>\r\n', 17, '56e9f7019533e01a362b274e0a0c8c8e.jpg', 37, 1, 1, '25 September'),
(54, 'Using the grid bels/1ters it', '', '', 4, '8dfea7b40eb201d7b0155c70c5525cc7.jpg', 1, 1, 1, '25 September'),
(60, 'Anh: Bị dọa giết, hiếp sau khi bắt được cá chép khổng lồ', 'Những ngư dân đối thủ dọa giết Tom và cưỡng hiếp bạn gái, con gái của anh, người bắt được con cá chép nặng tới hơn 3 yến.', '<p>Một người c&acirc;u c&aacute; vừa ph&aacute; vỡ kỉ lục, c&acirc;u được con c&aacute; ch&eacute;p lớn nhất nước Anh hồi đầu tuần n&agrave;y. Nhưng chỉ sau đ&oacute; một ng&agrave;y anh đ&atilde; ngay lập tức hối hận v&igrave; đ&atilde; bắt được con c&aacute;.</p>\r\n\r\n<p>Tom Doherty, 33 tuổi, đ&atilde; bắt được con c&aacute; &ldquo;Big Rig&quot; ng&agrave;y 19.9 sau một trận chiến 20 ph&uacute;t tại một hồ nước ở Shropshire, nước Anh.</p>\r\n\r\n<p>Con c&aacute; ch&eacute;p nặng tới gần 32 kg, nặng hơn kỉ lục trước đ&oacute; 1kg.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, n&oacute; đ&atilde; khiến nhiều người giận dữ, cho rằng con c&aacute; được nu&ocirc;i trước khi thả xuống hồ nhiều tuần trước.</p>\r\n\r\n<p>Một số ngư d&acirc;n đối thủ cạnh tranh cảm thấy bị x&uacute;c phạm với điều n&agrave;y. Họ khẳng định tổ chức Angling Trust của Anh kh&ocirc;ng thể x&aacute;c minh đ&acirc;y l&agrave; con c&aacute; lớn nhất.</p>\r\n\r\n<p><img alt="Anh: Bị dọa giết, hiếp sau khi bắt được cá chép khổng lồ - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-22/1474515214-147450997475916-ca-2.jpg" style="width:500px" /></p>\r\n\r\n<p>Tom bắt được con c&aacute; ch&eacute;p h&ocirc;m thứ 2 đầu tuần</p>\r\n\r\n<p>Tom, một nh&acirc;n vi&ecirc;n ng&acirc;n h&agrave;ng đầu tư, giờ đang phải chịu đựng những lời đe dọa đến t&iacute;nh mạng, thậm ch&iacute; bạn g&aacute;i v&agrave; con g&aacute;i của anh cũng bị dọa cưỡng hiếp.</p>\r\n\r\n<p>Tom hiện đang sống ở Basildon, Essex, nước Anh, n&oacute;i: &quot;Một phần trong t&ocirc;i cảm thấy hối hận v&igrave; đ&atilde; bắt được con c&aacute; ch&eacute;p. Ước g&igrave; n&oacute; kh&ocirc;ng g&acirc;y nhiều tranh c&atilde;i như vậy&rdquo;.</p>\r\n\r\n<p>&quot;Đ&atilde; c&oacute; những lời đe dọa t&iacute;nh mạng, t&ocirc;i kh&ocirc;ng hiểu họ nghĩ g&igrave;. Thậm ch&iacute; c&oacute; người c&ograve;n dọa cưỡng hiếp vợ v&agrave; con của t&ocirc;i, d&ugrave; t&ocirc;i kh&ocirc;ng c&oacute; vợ. T&ocirc;i chưa trực tiếp nh&igrave;n thấy những lời đe dọa đ&oacute;, n&oacute; đều được gửi tới c&aacute;c nh&agrave; t&agrave;i trợ của t&ocirc;i. T&ocirc;i kh&ocirc;ng biết ch&iacute;nh x&aacute;c c&oacute; tổng cộng bao nhi&ecirc;u lời đe dọa như vậy&rdquo;.</p>\r\n\r\n<p><img alt="Anh: Bị dọa giết, hiếp sau khi bắt được cá chép khổng lồ - 3" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-22/1474515214-147450997422619-ca-3.jpg" style="width:500px" /></p>\r\n\r\n<p>Hồ nước ở Shropshire, nước Anh, nơi Tom bắt được con c&aacute; kỉ lục</p>\r\n\r\n<p>&quot;Mọi việc xảy ra trong v&ograve;ng 24 tiếng sau khi t&ocirc;i bắt được con c&aacute;. T&ocirc;i nghĩ chuyện n&agrave;y sẽ ng&agrave;y c&agrave;ng tồi tệ. Con c&aacute; vẫn chưa được khẳng định ph&aacute; kỉ lục, đến l&uacute;c đ&oacute; mọi thứ sẽ xấu hơn&rdquo;.</p>\r\n\r\n<p>&quot;T&ocirc;i đang giữ mọi thứ thật k&iacute;n đ&aacute;o v&agrave; hy vọng mọi chuyện sẽ lắng xuống&rdquo;.</p>\r\n\r\n<p>Tom n&oacute;i th&ecirc;m: &quot;T&ocirc;i kh&ocirc;ng nghĩ đến việc b&aacute;o cảnh s&aacute;t trừ khi t&ocirc;i trực tiếp nhận được c&aacute;c lời đe dọa&rdquo;.</p>\r\n\r\n<p>Paul Meehan, gi&aacute;m đốc quản l&yacute; sản phẩm đ&aacute;nh bắt PB, người t&agrave;i trợ Tom, cho biết: &quot;T&ocirc;i đang li&ecirc;n lạc với đội ngũ ph&aacute;p l&yacute; của ch&uacute;ng t&ocirc;i. Ch&uacute;ng t&ocirc;i đ&atilde; nhận được lời đe dọa t&iacute;nh mạng Tom, bạn g&aacute;i v&agrave; con g&aacute;i của anh ấy&rdquo;.</p>\r\n', 3, '6030437494da0d80ad87a1d33b19759e.jpg', 0, 1, 1, '27 September'),
(61, 'Phát hiện cá ngừ khổng lồ như cá mập trôi sông ở Anh', 'Ba tuyển thủ lướt ván chuyên nghiệp đã hết sức bất ngờ khi khi ván lướt đâm trúng xác một con cá ngừ vây xanh khổng lồ trên sông Severn ở Anh', '<p>Theo Mirror, s&ocirc;ng Severn l&agrave; nơi c&oacute; hiện tượng thủy triều l&ecirc;n kỳ th&uacute; do t&aacute;c động của d&ograve;ng nước d&acirc;ng cao ở c&aacute;c đại dương, thu h&uacute;t nhiều tay lướt v&aacute;n chuy&ecirc;n nghiệp đến trải nghiệm cảm gi&aacute;c cưỡi s&oacute;ng đầy h&agrave;o hứng.</p>\r\n\r\n<p>Trong khi đang lướt v&aacute;n, Kev Brady, Steve Burgess v&agrave; Alec Foster (đều 33 tuổi) đ&atilde; đụng tr&uacute;ng v&agrave;o con c&aacute; ngừ v&acirc;y xanh khổng lồ, tr&ocirc;ng như một con c&aacute; mập trắng.</p>\r\n\r\n<p>Con c&aacute; ngừ được cho l&agrave; đ&atilde; bơi v&agrave;o d&ograve;ng s&ocirc;ng Severn do hiện tượng ấm l&ecirc;n của nước. Trong khi đ&oacute;, c&aacute;c chuy&ecirc;n gia tin rằng con c&aacute; tr&ocirc;i v&agrave;o s&ocirc;ng Severn do đuổi theo c&aacute; hồi bơi ngược d&ograve;ng.</p>\r\n\r\n<p><img alt="Phát hiện cá ngừ khổng lồ như cá mập trôi sông ở Anh - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474949568-147494156393684-ca-ngu-4.jpg" style="width:500px" /></p>\r\n\r\n<p>C&aacute; ngừ được cho l&agrave; đ&atilde; bơi v&agrave;o s&ocirc;ng&nbsp;Severn do hiện tượng nước ấm l&ecirc;n.</p>\r\n\r\n<p>Kev chia sẻ tr&ecirc;n mạng x&atilde; hội: &ldquo;Steve ph&aacute;t hiện ra con c&aacute; ngừ b&ecirc;n cạnh v&aacute;n lướt s&oacute;ng&rdquo;. Khi đ&oacute;, Steve h&eacute;t l&ecirc;n: &ldquo;M&igrave;nh đ&atilde; t&igrave;m thấy con c&aacute; d&agrave;i hơn 2 m&eacute;t&rsquo;&rdquo;. Kev kh&ocirc;ng tin v&agrave;o mắt m&igrave;nh v&agrave; nghĩ rằng n&oacute; l&agrave; một con b&ograve; cho đến khi tận mắt chứng kiến.</p>\r\n\r\n<p>Những người sống trong khu vực s&ocirc;ng Severn kh&ocirc;ng ngạc nhi&ecirc;n khi biết tin c&oacute; c&aacute; ngừ xuất hiện. Chuy&ecirc;n gia Dai Francis l&yacute; giải: &ldquo;Thường kh&ocirc;ng c&oacute; c&aacute; ngừ ở v&ugrave;ng biển Anh, nhưng khi nước ấm l&ecirc;n, ch&uacute;ng xuất hiện ng&agrave;y c&agrave;ng nhiều. Nhiệt độ s&ocirc;ng Severn khoảng 17 độ C, ấm hơn so với thời gian n&agrave;y trong năm. Nhiều loại c&aacute; từ bờ biển ph&iacute;a T&acirc;y nước Ph&aacute;p, v&iacute; dụ như vịnh Biscay, sẽ tr&ocirc;i v&agrave;o Anh qua k&ecirc;nh Bristol&rdquo;.</p>\r\n\r\n<p><img alt="Phát hiện cá ngừ khổng lồ như cá mập trôi sông ở Anh - 3" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474949568-147494157382614-ca-ngu-5.jpg" style="width:500px" /></p>\r\n\r\n<p>X&aacute;c c&aacute; ngừ khổng lồ tr&ocirc;i s&ocirc;ng ở Anh.</p>\r\n\r\n<p>Đợt thủy triều lớn hồi cuối tuần qua khiến con c&aacute; ngừ v&agrave; nhiều lo&agrave;i kh&aacute;c tr&ocirc;i từ biển v&agrave;o s&ocirc;ng, &ocirc;ng Francis n&oacute;i th&ecirc;m. &ldquo;Những con c&aacute; lớn theo c&aacute; nhỏ v&agrave; kh&iacute; hậu thay đổi khiến cho ch&uacute;ng xuất hiện ng&agrave;y c&agrave;ng nhiều&rdquo;.</p>\r\n\r\n<p>Mặc d&ugrave; c&oacute; k&iacute;ch thước khổng lồ nhưng con c&aacute; ngừ v&acirc;y xanh n&agrave;y chưa thể s&aacute;nh với con c&aacute; ngừ nặng 238 kg ở ngo&agrave;i khơi B&atilde;i cạn Scarborough ở Biển Đ&ocirc;ng.</p>\r\n\r\n<p>Theo Quỹ Bảo tồn Đời sống Hoang d&atilde; tr&ecirc;n Thế giới (WWF), nếu xe c&aacute; ngừ v&acirc;y xanh l&agrave; xe hơi, ch&uacute;ng được coi như chiếc Ferrari của đại dương v&igrave; vẻ ngo&agrave;i thu h&uacute;t, mạnh mẽ v&agrave; bơi với tốc độ cao.</p>\r\n\r\n<p>Một số lo&agrave;i c&aacute; ngừ v&acirc;y xanh ở Đại T&acirc;y Dương c&oacute; thể d&agrave;i hơn 3 m v&agrave; nặng tới 680 kg. K&iacute;ch thước n&agrave;y lớn hơn con ngựa. C&aacute; ngừ v&acirc;y xanh c&oacute; thể bơi với vận tốc 70 km/giờ tr&ecirc;n qu&atilde;ng đường d&agrave;i.</p>\r\n', 3, '961cf4fe3ca204e2c375af8d5afce583.jpg', 0, 1, 1, '27 September'),
(62, 'Ấn Độ: Chụp "tự sướng" với trăn khổng lồ và cái kết đắng', 'Khi người đàn ông giơ máy ảnh lên, con trăn lao tới và tấn công với tốc độ rất nhanh.', '<p>Một người đ&agrave;n &ocirc;ng ở Ấn Độ với mong muốn chụp selfie với một c&ograve;n trăn đ&atilde; nhận một c&aacute;i kết đắng.</p>\r\n\r\n<p>Con vật khổng lồ đ&atilde; tấn c&ocirc;ng v&agrave; cắn v&agrave;o cổ của người đ&agrave;n &ocirc;ng trước khi anh kịp chụp ảnh.</p>\r\n\r\n<p>Video cho thấy cuộc tấn c&ocirc;ng xảy ra khi con trăn đang bị 3 người đ&agrave;n &ocirc;ng kh&aacute;c v&agrave; 1 đứa trẻ nắm giữ trong tay. Khi người đ&agrave;n &ocirc;ng &aacute;o hồng đến gần v&agrave;&nbsp;giơ m&aacute;y ảnh l&ecirc;n, con trăn lao tới v&agrave; tấn c&ocirc;ng với tốc độ rất nhanh.</p>\r\n\r\n<p>Được biết sự việc xảy ra ở bang Rajasthan Ấn Độ ng&agrave;y 23.9. Rất may người đ&agrave;n &ocirc;ng đ&atilde; &ldquo;b&igrave;nh an v&ocirc; sự&rdquo; với một vết bầm t&iacute;m nhỏ tr&ecirc;n cằm. C&aacute;c quan chức của Bộ L&acirc;m nghiệp đ&atilde; bắt giữ con trăn sau đ&oacute;.</p>\r\n\r\n<p><img alt="Ấn Độ: Chụp &amp;#34;tự sướng&amp;#34; với trăn khổng lồ và cái kết đắng - 1" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-25/1474776015-147477071067519-tran.jpg" style="width:500px" /></p>\r\n\r\n<p>Ch&agrave;ng trai &aacute;o hồng đang định chụp selfie với con trăn khổng lồ</p>\r\n\r\n<p><img alt="Ấn Độ: Chụp &amp;#34;tự sướng&amp;#34; với trăn khổng lồ và cái kết đắng - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-25/1474776015-147477071058503-tran-2.jpg" style="width:500px" /></p>\r\n\r\n<p>...v&agrave; đ&atilde; nhận được một&nbsp;c&aacute;i kết đắng</p>\r\n\r\n<p>Đ&acirc;y kh&ocirc;ng phải lần đầu ti&ecirc;n người d&acirc;n Ấn Độ bắt được trăn &ldquo;khủng&rdquo; v&agrave; hung dữ. Hồi th&aacute;ng 6, d&acirc;n l&agrave;ng Mallik Sobha, Jalpaiguri, miền đ&ocirc;ng Ấn Độ đ&atilde; &ldquo;bắt quả tang&rdquo; một con trăn &quot;tham lam&quot; đang ăn tươi nuốt sống một con d&ecirc;.</p>\r\n\r\n<p>Sau khi nghe thấy tiếng một con d&ecirc; r&ecirc;n rỉ, người d&acirc;n chạy đến v&agrave; ph&aacute;t hiện một con trăn d&agrave;i&nbsp; 6m cuốn chặt cơ thể yếu ớt của con d&ecirc;, v&agrave; cố gắng &ldquo;ăn tươi nuốt sống&rdquo; n&oacute;.</p>\r\n\r\n<p>Narayan Kar, quản l&yacute; rừng nhận diện con trăn thuộc lo&agrave;i trăn mốc. &Ocirc;ng n&oacute;i: &quot;Trăn mốc l&agrave; một trong những lo&agrave;i trăn lớn nhất thế giới. Ch&uacute;ng l&agrave; những cư d&acirc;n rừng nhiệt đới hoạt động về đ&ecirc;m, c&oacute; khả năng bơi tuyệt vời v&agrave; đẻ từ 12-36 trứng c&ugrave;ng một l&uacute;c. Con trăn n&agrave;y r&otilde; r&agrave;ng l&agrave; một con trăn đực.&quot;</p>\r\n', 3, '1e11951f7c3410f218c536fc89ade384.jpg', 0, 1, 1, '27 September'),
(63, 'Thủy quân lục chiến Mỹ muốn huấn luyện với binh sĩ VN', 'Phản ánh sự thay đổi trong những năm gần đây ở khu vực châu Á-Thái Bình Dương, quân đội Mỹ đã có những cuộc tiếp xúc liên tục với phía Việt Nam và hai bên có thể sớm tham gia huấn luyện cùng nhau.', '<p>Đ&acirc;y l&agrave; th&ocirc;ng tin được Trung tướng Lawrence Nicholson, Tư lệnh lực lượng thủy qu&acirc;n lục chiến Mỹ tại <a href="http://www.24h.com.vn/tin-tuc-nhat-ban-c415e3809.html">Nhật Bản</a> khẳng định tr&ecirc;n tạp ch&iacute; Marine Corps Times.</p>\r\n\r\n<p>&ldquo;Lớn l&ecirc;n từ nhỏ, t&ocirc;i biết đến th&ocirc;ng tin về Chiến tranh Việt Nam th&ocirc;ng qua truyền h&igrave;nh mỗi tối. T&ocirc;i gần như kh&ocirc;ng thể tưởng tượng được rằng sau n&agrave;y, m&igrave;nh lại c&oacute; cơ hội đại diện cho qu&acirc;n đội Mỹ tham dự c&aacute;c cuộc họp với Việt nam, để t&igrave;m kiếm cơ hội huấn luyện với lực lượng vũ trang Việt Nam&rdquo;, tướng Nicholson chia sẻ.</p>\r\n\r\n<p>&quot;Việt Nam v&agrave; Malaysia c&oacute; loại t&agrave;u tuần tra nhỏ. Hai nước đều c&oacute; lực lượng hải qu&acirc;n đ&aacute;nh bộ v&agrave; ch&uacute;ng t&ocirc;i muốn xem x&eacute;t, t&igrave;m kiếm cơ hội huấn luyện&quot;.</p>\r\n\r\n<p>Tham gia huấn luyện với binh sĩ Việt Nam l&agrave; &ldquo;cơ hội tuyệt vời&rdquo; đối với Thủy qu&acirc;n lục chiến Mỹ, tướng Nocholson n&oacute;i. Nếu đạt thỏa thuận, đ&acirc;y sẽ l&agrave; sự thay đổi đ&aacute;ng kể trong quan hệ giữa hai nước kể từ thời Chiến tranh Việt Nam.</p>\r\n\r\n<p><img alt="Thủy quân lục chiến Mỹ muốn huấn luyện với binh sĩ VN - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-26/1474863370-147486235039648-13-520a3.jpg" style="width:500px" /></p>\r\n\r\n<p>Thủy qu&acirc;n lục chiến Mỹ.</p>\r\n\r\n<p>Tướng 3 sao Mỹ hiện l&agrave; người gi&aacute;m s&aacute;t tất cả chiến dịch triển khai Thủy qu&acirc;n lục chiến ở V&agrave;nh đai Th&aacute;i B&igrave;nh Dương. &Ocirc;ng dự kiến sẽ đến Việt Nam v&agrave;o th&aacute;ng 10 để thảo luận về c&aacute;c phương &aacute;n đ&agrave;o tạo m&agrave; lực lượng hai nước c&oacute; thể phối hợp.</p>\r\n\r\n<p>&ldquo;T&ocirc;i rất phấn kh&iacute;ch khi nghĩ đến chuyến thăm Việt Nam để t&igrave;m hiểu xem ph&iacute;a Việt Nam mong muốn g&igrave; v&agrave; c&aacute;ch để lực lượng hai nước c&oacute; thể hợp t&aacute;c với nhau nhiều hơn nữa&quot;, tướng Nicholson n&oacute;i.</p>\r\n\r\n<p>&quot;T&ocirc;i vừa dự Hội thảo của c&aacute;c L&atilde;nh đạo lực lượng t&aacute;c chiến hỗn hợp Đổ bộ Th&aacute;i B&igrave;nh Dương ở San Diego. Đại diện của qu&acirc;n đội v&agrave; hải qu&acirc;n Việt Nam đ&atilde; c&oacute; mặt. Đ&oacute; l&agrave; cơ hội để t&ocirc;i gặp gỡ một số đại diện của Việt Nam v&agrave; họ cũng n&ecirc;u mong muốn t&igrave;m hiểu c&aacute;ch phối hợp với qu&acirc;n đội Mỹ nhiều hơn, để c&ugrave;ng l&agrave;m việc với nhau&quot;.</p>\r\n\r\n<p>Việt Nam kh&ocirc;ng phải l&agrave; quốc gia duy nhất c&oacute; thể&nbsp;tham gia huấn luyện với Thủy qu&acirc;n lục chiến của Mỹ ở Th&aacute;i B&igrave;nh Dương.</p>\r\n\r\n<p>H&agrave;n Quốc, Th&aacute;i Lan v&agrave; Indonesia&nbsp;muốn được huấn luyện nhiều hơn với lực lượng Mỹ tr&ecirc;n c&aacute;c t&agrave;u đổ bộ. Nhật Bản thậm ch&iacute; đ&atilde; y&ecirc;u cầu Mỹ gi&uacute;p đỡ đ&agrave;o tạo Trung đo&agrave;n bộ binh miền T&acirc;y tr&ecirc;n đảo Kyushu th&agrave;nh lực lượng thủy qu&acirc;n lục chiến.</p>\r\n', 3, '0461776af341da54a4b74c507e2367d6.jpg', 0, 1, 1, '27 September'),
(64, 'Mỹ bỏ cấm vận vũ khí sát thương, VN có thể mua gì?', 'Với việc Mỹ bỏ cấm vận hoàn toàn vũ khí sát thương, Việt Nam có điều kiện lựa chọn mua các vũ khí, khí tài quan trọng, phù hợp nhu cầu sử dụng.', '<p>Tại cuộc họp b&aacute;o chung giữa Chủ tịch nước Trần Đại Quang v&agrave; Tổng thống <a href="http://www.24h.com.vn/barack-obama-p534c415.html">Barack Obama</a> ng&agrave;y 23.5, &ocirc;ng Obama&nbsp;tuy&ecirc;n bố ch&iacute;nh thức dỡ bỏ ho&agrave;n to&agrave;n lệnh cấm b&aacute;n vũ kh&iacute; s&aacute;t thương cho Việt Nam. Đ&acirc;y l&agrave; một bước tiến quan trọng m&agrave; Chủ tịch nước Trần Đại Quang hoan ngh&ecirc;nh v&agrave; khẳng định &ldquo;l&agrave; một minh chứng quan hệ hai nước đ&atilde; b&igrave;nh thường h&oacute;a ho&agrave;n to&agrave;n&rdquo;.</p>\r\n\r\n<p>Lệnh cậm vấn vũ kh&iacute; s&aacute;t thương của&nbsp;Mỹ bắt nguồn từ sự kiện vịnh Bắc Bộ năm 1964. Năm 1984, Việt Nam bị liệt v&agrave;o danh s&aacute;ch Quy định vũ kh&iacute; trong Bu&ocirc;n b&aacute;n quốc tế (ITAR), ngăn cản c&aacute;c quốc gia c&oacute; t&ecirc;n kh&ocirc;ng được mua b&aacute;n vũ kh&iacute; với Mỹ. D&ugrave; năm 1995 hai nước đ&atilde; b&igrave;nh thường h&oacute;a quan hệ ngoại giao nhưng lệnh cấm vận vũ kh&iacute; vẫn k&eacute;o d&agrave;i hơn 20 năm qua. Dấu mốc lần n&agrave;y thực sự l&agrave; điều m&agrave; cả hai b&ecirc;n c&ugrave;ng mong muốn thời gian qua.</p>\r\n\r\n<p><img alt="My bo lenh cam ban vu khi - 2" src="http://image.24h.com.vn/upload/2-2016/images/2016-05-23/1464002298-1463992500-2--copy-.jpg" style="width:500px" /></p>\r\n\r\n<p>M&aacute;y bay vận tải C-130 Hercules từng xuất hiện ở s&acirc;n bay Nội B&agrave;i trong chuyến thăm của Obama.</p>\r\n\r\n<p>Vũ kh&iacute; s&aacute;t thương được hiểu l&agrave; loại vũ kh&iacute;&nbsp;nhằm mục đ&iacute;ch tối quan trọng l&agrave; trực tiếp&nbsp;ti&ecirc;u diệt nhanh ch&oacute;ng&nbsp;kẻ địch. Những vũ kh&iacute; s&aacute;t thương c&oacute; uy lực lớn, sức c&ocirc;ng ph&aacute; khủng khiếp v&agrave; g&acirc;y chấn thương nghi&ecirc;m trọng l&agrave;m&nbsp;hoặc thiệt mạng ngay tức khắc.</p>\r\n\r\n<p>Vũ kh&iacute; &iacute;t s&aacute;t thương ngược lại nhằm mục đ&iacute;ch g&acirc;y &iacute;t tổn thương nhất cho qu&acirc;n địch v&agrave; hạn chế tối đa ảnh hưởng t&iacute;nh mạng. Trong chiến tranh th&ocirc;ng thường, vũ kh&iacute; s&aacute;t thương l&agrave; một con b&agrave;i quan trọng để &aacute;p chế lực lượng đối phương v&agrave; tung ra đ&ograve;n quyết định gi&agrave;nh chiến thắng cuối c&ugrave;ng.</p>\r\n\r\n<p>Khi lệnh cấm vận vũ kh&iacute; s&aacute;t thương được dỡ bỏ ho&agrave;n to&agrave;n, theo một số chuy&ecirc;n gia nước ngo&agrave;i,&nbsp;Việt Nam nếu muốn&nbsp;c&oacute; thể mua từ Mỹ m&aacute;y bay do th&aacute;m Lockheed P-3 Orion. Đ&acirc;y l&agrave; mẫu m&aacute;y bay 4 động cơ săn ngầm v&agrave; trinh s&aacute;t được Hải qu&acirc;n Mỹ ph&aacute;t triển v&agrave; giới thiệu từ thập kỷ 60.</p>\r\n\r\n<p>Trải qua 50 năm vận h&agrave;nh v&agrave; cải tiến, P-3 vẫn l&agrave; mẫu m&aacute;y bay được nhiều nước ưu ti&ecirc;n sử dụng. Đặc trưng lớn nhất của P-3 l&agrave; hệ thống t&aacute;c chiến điện tử được cải thiện rất lớn. Nhiệm vụ chủ yếu của P-3 l&agrave; gi&aacute;m s&aacute;t v&ugrave;ng biển, trinh s&aacute;t, do th&aacute;m, diệt ngầm, diệt t&agrave;u mặt nước. T&iacute;nh tới năm 2012, tổng cộng 734 chiếc P-3 đ&atilde; được b&aacute;n v&agrave; sử dụng.</p>\r\n\r\n<p><img alt="Mỹ bỏ lệnh cấm bán vũ khí cho Việt Nam - 3" src="http://image.24h.com.vn/upload/2-2016/images/2016-05-23/1464002298-1463992500-3--copy-.jpg" style="width:500px" /></p>\r\n\r\n<p>T&ecirc;n lửa v&aacute;c vai Stinger.</p>\r\n\r\n<p>B&ecirc;n cạnh P-3, vận tải cơ C-130 Hercules cũng c&oacute; thể&nbsp;được mua nếu ph&iacute;a Việt Nam quan t&acirc;m. Lockheed C-130 Hercules l&agrave; một m&aacute;y bay vận tải hạng trung bốn động cơ tua-bin c&aacute;nh quạt v&agrave; l&agrave; loại m&aacute;y bay kh&ocirc;ng vận chiến lược của nhiều lực lượng qu&acirc;n sự tr&ecirc;n thế giới.</p>\r\n\r\n<p>Th&acirc;n m&aacute;y bay C-130 c&oacute; thể thay đổi khiến loại m&aacute;y bay n&agrave;y đ&aacute;p ứng được nhiều vai tr&ograve; từ m&aacute;y bay vũ trang hạng nặng, tấn c&ocirc;ng tr&ecirc;n kh&ocirc;ng, t&igrave;m kiếm v&agrave; cứu hộ, nghi&ecirc;n cứu khoa học, nghi&ecirc;n cứu thời tiết, tiếp dầu tr&ecirc;n kh&ocirc;ng v&agrave; cứu hoả. Chiếc m&aacute;y bay c&oacute; tầm hoạt động khoảng 2.000&nbsp;km.</p>\r\n\r\n<p>Mục 4 của danh s&aacute;ch ITAR gồm rất nhiều loại t&ecirc;n lửa dẫn đường, rocket, ngư l&ocirc;i, bom, m&igrave;n sẽ được ph&eacute;p xuất khẩu sang Việt Nam, nếu Việt Nam c&oacute; nhu cầu. T&ecirc;n lửa được xuất&nbsp;sẽ c&oacute; tầm bắn tối đa 300km v&agrave; mang theo đầu đạn 500kg. Những hệ thống ph&ograve;ng thủ t&ecirc;n lửa hoặc t&ecirc;n lửa chống tăng cũng nằm&nbsp;trong hạng mục n&agrave;y.</p>\r\n\r\n<p>Việt Nam c&oacute; thể mua t&ecirc;n lửa ph&ograve;ng kh&ocirc;ng v&aacute;c vai Stinger sau khi lệnh cấm vận dỡ bỏ ho&agrave;n to&agrave;n. T&ecirc;n lửa Stinger được Mỹ ph&aacute;t triển v&agrave; gia nhập bi&ecirc;n chế từ năm 1981, được sử dụng ở 29 quốc gia to&agrave;n thế giới. T&ecirc;n lửa Stinger d&agrave;i 1,52m, đường k&iacute;nh 10cm. Với trọng lượng 10kg v&agrave; c&oacute; thể khai hỏa từ tr&ecirc;n vai cho tới gắn xe tải, đạn Stinger bay với vận tốc 750m/gi&acirc;y, ti&ecirc;u diệt mục ti&ecirc;u ở khoảng c&aacute;ch 4,8 km v&agrave; độ cao từ 180 - 3.800m. Đầu nổ nặng 3kg, hoạt động theo nguy&ecirc;n l&yacute; chạm nổ, được gắn k&iacute;p nổ v&agrave; đồng hồ hẹn giờ tự hủy.</p>\r\n\r\n<p><img alt="Obama đến Việt Nam - 4" src="http://image.24h.com.vn/upload/2-2016/images/2016-05-23/1464002299-1463992500-4--copy-.jpeg" style="width:500px" /></p>\r\n\r\n<p>M1 Abrams l&agrave; loại xe tăng chiến đấu chủ lực th&ocirc;ng dụng nhất trong qu&acirc;n đội Mỹ.</p>\r\n\r\n<p>Theo Trung tướng Phạm Xu&acirc;n Thệ, nguy&ecirc;n Tư lệnh Qu&acirc;n khu 1,&nbsp;vũ kh&iacute; Mỹ được đ&aacute;nh gi&aacute; hiện đại nhất thế giới, Việt Nam&nbsp;sẽ c&oacute; th&ecirc;m lựa chọn để bảo vệ chủ quyền, an ninh quốc gia. Việc dỡ&nbsp;bỏ cũng&nbsp;tạo điều kiện tốt hơn để Việt Nam mua sắm vũ kh&iacute; từ c&aacute;c nước kh&aacute;c tr&ecirc;n thế giới.&nbsp;</p>\r\n\r\n<p>Tuy nhi&ecirc;n, &ocirc;ng Thệ đ&aacute;nh gi&aacute;, trước mắt việc dỡ bỏ n&agrave;y chưa đem lại nhiều t&aacute;c động. Bởi hiện nay, số lượng vũ kh&iacute; Việt Nam mua của Mỹ vẫn c&ograve;n kh&aacute; &iacute;t v&agrave; khi mua sắm cũng cần một thời gian để l&agrave;m quen, vận h&agrave;nh.</p>\r\n\r\n<p>Trước đ&acirc;y hồi th&aacute;ng 8.2015, Nigeria từng được Mỹ dỡ một phần lệnh cấm vận vũ kh&iacute; sau khi tổ chức khủng bố Boko Haram ho&agrave;nh h&agrave;nh qu&aacute; mạnh ở quốc gia ch&acirc;u Phi n&agrave;y. Khi lệnh cấm được th&aacute;o bỏ, Nigeria c&oacute; thể mua đạn dược, vũ kh&iacute; để ngăn chặn Boko Haram ph&aacute;t triển qu&aacute; mức.</p>\r\n\r\n<p>Ai Cập cũng từng được Mỹ dỡ bỏ lệnh cấm mua vũ kh&iacute; sau khi tổ chức khủng bố IS tăng cường &ldquo;ch&acirc;n rết&rdquo; khiến t&igrave;nh h&igrave;nh v&ocirc; c&ugrave;ng nguy cấp. Sau cuộc điện thoại giữa &ocirc;ng Obama v&agrave; người đồng cấp Sisi, Ai Cập đ&atilde; được&nbsp;mua 12 chiến đấu cơ F-16, 20 t&ecirc;n lửa Harpoon v&agrave; 124 t&ecirc;n lửa M1A1 Abrams hạng nặng nhằm tiễu trừ khủng bố.</p>\r\n', 3, '52dea2ceee4ca103732c8d57965bd017.jpg', 0, 1, 1, '27 September'),
(65, 'Khó tin: Không Messi, Barca đá cúp C1 "đỉnh" hơn', 'Một con số thống kê mới đây chắc chắn sẽ khiến không ít người hâm mộ tiền đạo Lionel Messi cảm thấy ngạc nhiên.', '<p><strong>Messi</strong> đ&atilde; d&iacute;nh chấn thương h&aacute;ng trong trận đấu gặp Atletico vừa qua, dự kiến ch&acirc;n s&uacute;t người Argentina sẽ phải rời xa s&acirc;n cỏ 3 tuần. Điều n&agrave;y đồng nghĩa với việc <a href="http://www.24h.com.vn/lionel-messi-p356c48.html">Messi</a> kh&ocirc;ng thể ra s&acirc;n trận gặp Monchengladbach v&agrave; nhiều khả năng l&agrave; cả trận gặp Man City.</p>\r\n\r\n<p><img alt="Khó tin: Không Messi, Barca đá cúp C1 &quot;đỉnh&quot; hơn - 1" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474958834-500messi.jpg" /></p>\r\n\r\n<p>Kh&ocirc;ng c&oacute; Messi, Barca c&oacute; tỷ lệ thắng cao hơn tại Champions League</p>\r\n\r\n<p>Thiếu vắng Messi thời điểm hiện tại chưa hẳn l&agrave; nỗi lo qu&aacute; lớn bởi <a href="http://www.24h.com.vn/neymar-p359c48.html">Neymar</a> cũng như <a href="http://www.24h.com.vn/luis-suarez-p358c48.html">Suarez</a> đang thể hiện phong độ rất cao tr&ecirc;n h&agrave;ng c&ocirc;ng. Bộ đ&ocirc;i n&agrave;y ho&agrave;n to&agrave;n c&oacute; thể g&aacute;nh v&aacute;c trọng tr&aacute;ch ghi b&agrave;n thay Leo. B&ecirc;n cạnh đ&oacute;, những sai lầm giai đoạn n&agrave;y c&oacute; thể sửa chữa bởi m&ugrave;a giải vẫn c&ograve;n rất d&agrave;i ở ph&iacute;a trước.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, một thống k&ecirc; mới đ&acirc;y sẽ khiến NHM Barca phải giật m&igrave;nh. T&iacute;nh ri&ecirc;ng tại Champions League, Barca thường gi&agrave;nh được kết quả tốt hơn khi kh&ocirc;ng c&oacute; Messi trong đội h&igrave;nh. Đội b&oacute;ng xứ Catalunya đ&atilde; thắng 64,7% số trận thiếu vắng tiền đạo số 10. Trong khi đ&oacute;, với <em>Messi</em> trong đội h&igrave;nh, Barca chỉ thắng 61,2%.</p>\r\n\r\n<p>Cụ thể, Messi đ&atilde; thi đấu 98 trận tại Champions League, gi&uacute;p Barca gi&agrave;nh 60 chiến thắng, 23 trận h&ograve;a v&agrave; để thua 15 trận. Mặt kh&aacute;c, Barca chơi 34 trận m&agrave; kh&ocirc;ng c&oacute; tiền đạo 29 tuổi nhưng thắng 22 trận v&agrave; chỉ 4 lần chịu thất bại.</p>\r\n\r\n<p>Mặc d&ugrave; vậy, với những trận đấu c&oacute; Messi trong đội h&igrave;nh NHM được chứng kiến lối đ&aacute; tấn c&ocirc;ng đẹp mặt v&agrave; hiệu quả hơn. Đ&atilde; c&oacute; 215 b&agrave;n thắng m&agrave; Barca ghi được ở 98 trận đấu Messi g&oacute;p mặt, tương đương 2,2 b&agrave;n mỗi trận. C&ograve;n ở chiều ngược lại, tỷ lệ n&agrave;y l&agrave; 1,8 b&agrave;n/trận (61 b&agrave;n/34 trận).</p>\r\n\r\n<p>Ở chỉ số kiểm so&aacute;t b&oacute;ng, khi c&oacute; Messi cũng cao hơn khi tiền đạo n&agrave;y vắng mặt. Với Messi trong đội h&igrave;nh, Barca kiểm so&aacute;t b&igrave;nh qu&acirc;n 68,8% (kh&ocirc;ng c&oacute; Messi l&agrave; 66,3%). T&iacute;nh hiệu quả ở số đường chuyền ch&iacute;nh x&aacute;c b&ecirc;n phần s&acirc;n đối thủ(*)&nbsp;cũng tương tự. C&oacute; Messi, Barca đạt 86,3% v&agrave; kh&ocirc;ng c&oacute; Messi chỉ l&agrave; 81,4%.</p>\r\n\r\n<p><strong>Thống k&ecirc; th&agrave;nh t&iacute;ch của Barca tại Champions League (Nguồn: Opta)</strong></p>\r\n\r\n<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Th&ocirc;ng số</strong></td>\r\n			<td style="text-align:center"><strong>C&oacute; Messi</strong></td>\r\n			<td>\r\n			<p><strong>Kh&ocirc;ng Messi</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Trận</strong></td>\r\n			<td style="text-align:center"><strong>98</strong></td>\r\n			<td style="text-align:center"><strong>34</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Thắng</strong></td>\r\n			<td style="text-align:center"><strong>60</strong></td>\r\n			<td style="text-align:center"><strong>22</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>H&ograve;a</strong></td>\r\n			<td style="text-align:center"><strong>23</strong></td>\r\n			<td style="text-align:center"><strong>8</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Bại</strong></td>\r\n			<td style="text-align:center"><strong>15</strong></td>\r\n			<td style="text-align:center"><strong>4</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Tỷ lệ thắng</strong></td>\r\n			<td style="text-align:center"><strong>61,2%</strong></td>\r\n			<td style="text-align:center"><strong>64,7%</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>B&agrave;n thắng</strong></td>\r\n			<td style="text-align:center"><strong>215</strong></td>\r\n			<td style="text-align:center"><strong>61</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>B&agrave;n thắng/trận</strong></td>\r\n			<td style="text-align:center"><strong>2,2</strong></td>\r\n			<td style="text-align:center"><strong>1,8</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Kiểm so&aacute;t b&oacute;ng/trận</strong></td>\r\n			<td style="text-align:center"><strong>68,8%</strong></td>\r\n			<td style="text-align:center"><strong>66,3%</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center"><strong>Chuyền ch&iacute;nh x&aacute;c*</strong></td>\r\n			<td style="text-align:center"><strong>86,3%</strong></td>\r\n			<td style="text-align:center"><strong>81,4%</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 17, '57c0520228688b6dfc4b64d443780b17.jpg', 7, 1, 1, '27 September'),
(66, 'Mourinho “cấm khẩu” Rooney: Quyền lực của "Người đặc biệt"', 'Đã có những dấu hiệu đầu tiên cho thấy Rooney không còn là tương lai đối với Mourinho nữa.', '<p>Mourinho&nbsp;để <strong>Rooney</strong> ngồi dự bị suốt 80 ph&uacute;t ch&iacute;nh thức trong trận đấu gặp Leicester City v&agrave; mới đ&acirc;y nhất l&agrave; những lời tuy&ecirc;n bố thẳng thừng với đội trưởng của MU cần phải ho&agrave;n thiện bản th&acirc;n m&igrave;nh trước khi lớn giọng qu&aacute;t th&aacute;o đồng đội.</p>\r\n\r\n<p><img alt="Mourinho “cấm khẩu” Rooney: Quyền lực của &quot;Người đặc biệt&quot; - 1" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474933475-bong-da-rooney2.jpg" /></p>\r\n\r\n<p>Mourinho đ&atilde; qu&aacute; ki&ecirc;n nhẫn với Rooney</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>R&otilde; r&agrave;ng, 2 h&agrave;nh động tr&ecirc;n của &ldquo;Người đặc biệt&rdquo; đối với &ldquo;Quỷ đầu đ&agrave;n&rdquo; Wayne <a href="http://www.24h.com.vn/wayne-rooney-p366c48.html">Rooney</a> đang chứng tỏ &ocirc;ng đ&atilde; vượt qua ranh giới hạn của sự chịu đựng sau những m&agrave;n tr&igrave;nh diễn k&eacute;m cỏi của cậu học tr&ograve; cưng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Mourinho đ&atilde; v&agrave; đang cho thấy động th&aacute;i cứng rắn nhất kể từ khi &ocirc;ng ch&iacute;nh thức cầm qu&acirc;n dẵn dắt <a href="http://www.24h.com.vn/manchester-united-p721c48.html">Manchester United</a>, bởi chưa bao giờ người ta thấy một người nổi tiếng lạnh l&ugrave;ng&nbsp;như Mourinho lại c&oacute; thể ki&ecirc;n nhẫn l&acirc;u đến vậy đối với Rooney.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nhưng giờ b&atilde;o đ&atilde; nổi l&ecirc;n thật sự rồi, &ldquo;G&atilde; Shrek&rdquo; sẽ kh&ocirc;ng c&ograve;n nhiều thời gian khi m&agrave; Mourinho đ&atilde; ch&iacute;nh thức h&agrave;nh động.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đội trưởng của &ldquo;Quỷ đỏ&rdquo; cần nh&igrave;n gương những ng&ocirc;i sao trước đ&acirc;y m&agrave; &ocirc;ng thầy của m&igrave;nh đ&atilde; trảm kh&ocirc;ng tiếc tay, đ&oacute; l&agrave; ch&acirc;n s&uacute;t trứ danh Shevchenko, &ldquo;thi&ecirc;n thần&rdquo; Kaka hay ngay cả Casillas, huyền thoại của <a href="http://www.24h.com.vn/real-madrid-p725c48.html">Real Madrid</a> cũng kh&ocirc;ng c&ograve;n chỗ đứng một khi Mourinho đ&atilde; &ldquo;ngứa mắt&rdquo;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nếu bị cho ra r&igrave;a trong thời gian tới, Rooney cũng kh&oacute; c&oacute; thể tr&aacute;ch ai được bởi anh đ&atilde; c&oacute; qu&aacute; nhiều cơ hội thể hiện m&igrave;nh v&agrave; đương nhi&ecirc;n Mourinho cũng kh&ocirc;ng c&ograve;n c&aacute;ch n&agrave;o kh&aacute;c khi buộc phải loại anh khỏi kế hoạch trong tương lai nếu như Rooney vẫn tiếp tục chơi tệ hại.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dự b&aacute;o ng&ocirc;i sao 30 tuổi&nbsp; hiện đang c&oacute; mức lương cao ngất ngưởng 300.000 bảng mỗi tuần với đ&oacute;ng g&oacute;p &iacute;t ỏi trong thời gian qua sẽ được thương thảo lại hợp đồng trong thời gian ngắn nhất, một l&agrave; giảm lương hoặc l&agrave; ra đi.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đ&acirc;y quả l&agrave; những chuỗi ng&agrave;y kh&oacute; khăn với cầu thủ từng gắn b&oacute; 12 năm với s&acirc;n Old Trafford, nhưng biết l&agrave;m thế n&agrave;o được khi anh đang trở n&ecirc;n qu&aacute; lạc l&otilde;ng đối với MU hiện nay. Thực tế, từ đầu m&ugrave;a tới giờ, R10 chưa bao giờ cho thấy m&igrave;nh xứng đ&aacute;ng l&agrave; đầu t&agrave;u của đội. Thậm ch&iacute; c&ograve;n thường xuy&ecirc;n g&acirc;y thất vọng.</p>\r\n\r\n<p>Loại Rooney r&otilde; r&agrave;ng l&agrave; việc cực chẳng đ&atilde; của Mourinho, khi m&agrave; &ocirc;ng đ&atilde; từng c&oacute; những hy vọng rất đặc biệt về Rooney, người m&agrave; &ocirc;ng lu&ocirc;n t&acirc;m niệm sẽ l&agrave;m một được g&igrave; đ&oacute; khi dẫn dắt đo&agrave;n qu&acirc;n &aacute;o đỏ, thế nhưng giờ đ&acirc;y &ocirc;ng lại buộc phải ra tay &ldquo;thanh trừng&rdquo; cầu thủ m&agrave; &ocirc;ng kh&ocirc;ng mong muốn nhất.</p>\r\n\r\n<p><img alt="Mourinho “cấm khẩu” Rooney: Quyền lực của &quot;Người đặc biệt&quot; - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474933475-bong-da-rooney3.jpg" /></p>\r\n\r\n<p>Rooney cần thời gian nghỉ ngơi v&agrave; xem lại&nbsp;m&igrave;nh</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nhưng sau tất cả, mọi chuyện n&ecirc;n như vậy, sẽ chẳng ai c&ograve;n thấy ngạc nhi&ecirc;n khi Mourinho bỏ Rooney nữa , bởi &ocirc;ng ch&iacute;nh l&agrave; người cuối c&ugrave;ng thấy rằng phải l&agrave;m như thế. Vấn đề hiện tại l&agrave; &ocirc;ng sẽ phải chiến thắng li&ecirc;n tiếp khi để Rooney ngồi ngo&agrave;i như thể muốn chứng minh h&agrave;nh động đ&oacute; l&agrave; đ&uacute;ng v&agrave; n&ecirc;n l&agrave;m.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra, động th&aacute;i &ldquo;bịt mồm&rdquo; Rooney mới đ&acirc;y ch&iacute;nh l&agrave; việc &ocirc;ng muốn khống chế ph&ograve;ng thay đồ cũng như kh&ocirc;ng cho cầu thủ n&agrave;y c&oacute; bất cứ cơ hội n&agrave;o &quot;l&agrave;m phản&quot; khi m&agrave; ch&iacute;nh &ldquo;G&atilde; Shrek&rdquo; phải tự ho&agrave;n thiện m&igrave;nh nếu&nbsp;muốn c&aacute;c đồng đội nể phục.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dự kiến, Wayne Rooney sẽ c&oacute; cơ hội trở lại đội h&igrave;nh xuất ph&aacute;t của MU trong cuộc tiếp đ&oacute;n Zorya tại đấu trường Europa League. Đ&acirc;y sẽ l&agrave; cơ hội để Rooney giải tỏa những &aacute;p lực đang đ&egrave; nặng v&agrave; cạnh tranh vị tr&iacute; ch&iacute;nh thức với c&aacute;c đồng đội một c&aacute;ch s&ograve;ng phẳng.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 17, '8c7aa204a74d0ca048c34727f66c4ad4.jpg', 8, 1, 1, '27 September'),
(67, 'MU: Mourinho “trói” Mata, nhắm Isco thay Rooney', 'Sau khi để Rooney dự bị trong trận thắng Leicester, Mourinho đang tiếp tục lên kế hoạch nhằm loại bỏ hẳn đội trưởng 30 tuổi khỏi đội hình MU.', '<p>Trong giai đoạn MU lao đao với 2 thất bại li&ecirc;n tiếp tại giải ngoại hạng, Mourinho đ&atilde; bị chỉ tr&iacute;ch rất nhiều. B&ecirc;n cạnh &yacute; tưởng chiến thuật ngh&egrave;o n&agrave;n c&ograve;n l&agrave; sự nu&ocirc;ng chiều th&aacute;i qu&aacute; với Wayne <a href="http://www.24h.com.vn/wayne-rooney-p366c48.html">Rooney</a>. Đội trưởng MU li&ecirc;n tục được thi đấu cho d&ugrave; kh&ocirc;ng đ&aacute;p ứng được y&ecirc;u cầu chuy&ecirc;n m&ocirc;n.</p>\r\n\r\n<p><img alt="MU: Mourinho “trói” Mata, nhắm Isco thay Rooney - 1" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474960814-500mata.jpg" /></p>\r\n\r\n<p>Mourinho muốn gia hạn HĐ với Mata</p>\r\n\r\n<p>Cuối tuần qua, Mourinho buộc phải cất Rooney l&ecirc;n ghế dự bị trước qu&aacute; nhiều &aacute;p lực từ dư luận cũng như NHM. MU lập tức lột x&aacute;c ho&agrave;n to&agrave;n, họ chơi tưng bừng v&agrave; ghi đến 4 b&agrave;n thắng v&agrave;o lưới nh&agrave; đương kim v&ocirc; địch Leicester ngay trong hiệp 1. Kết quả đ&oacute; th&ecirc;m một lần khẳng định Rooney l&agrave; mắt x&iacute;ch thừa trong hệ thống hiện tại.</p>\r\n\r\n<p>C&ograve;n rất nhiều nghi vấn xung quanh việc Mourinho thực sự ưu &aacute;i Rooney hay đ&atilde; mượn dư luận để danh ch&iacute;nh ng&ocirc;n luận loại bỏ tiền đạo n&agrave;y, nhưng chỉ biết rằng tương lai của R10 tại MU kh&ocirc;ng c&ograve;n tươi s&aacute;ng nữa.</p>\r\n\r\n<p>Theo th&ocirc;ng tin m&agrave; The Sun đăng tải, Mourinho đang chuẩn bị gia hạn hợp đồng với Juan Mata. Tiền vệ người T&acirc;y Ban Nha kh&ocirc;ng ngừng g&acirc;y ấn tượng mạnh. Anh chơi nhiệt t&igrave;nh, năng nổ v&agrave; vừa trực tiếp ghi b&agrave;n v&agrave;o lưới Leicester sau t&igrave;nh huống phối hợp như đ&aacute; tập c&ugrave;ng Pogba v&agrave; Lingard.</p>\r\n\r\n<p>Được biết, Mata v&agrave; Mourinho đ&atilde; c&oacute; cuộc thảo luận về một thỏa thuận mới. Dự kiến, mọi chuyện sẽ được giải quyết dứt điểm trong giai đoạn lượt đi m&ugrave;a giải n&agrave;y. Hiện tại hợp đồng của Mata c&ograve;n 2 năm nữa c&ugrave;ng mức lương 130.000 bảng/tuần.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ tr&oacute;i ch&acirc;n Mata, Mourinho c&ograve;n muốn tăng cường th&ecirc;m nh&acirc;n lực ở h&agrave;ng tiền vệ. Cũng tr&ecirc;n The Sun, th&ocirc;ng tin Isco sẽ gia nhập MU ngay trong th&aacute;ng Gi&ecirc;ng tới đang nhận được nhiều sự quan t&acirc;m của NHM.</p>\r\n\r\n<p>M&ugrave;a h&egrave; vừa qua Isco tuy&ecirc;n bố ở lại <a href="http://www.24h.com.vn/real-madrid-p725c48.html">Real Madrid</a> để cạnh tranh vị tr&iacute; ch&iacute;nh thức. Tuy nhi&ecirc;n, mọi chuyện kh&ocirc;ng hề được biến chuyển. HLV Zidane kh&ocirc;ng trọng dụng tiền vệ 24 tuổi. T&iacute;nh đến thời điểm n&agrave;y, Isco mới được v&agrave;o s&acirc;n 3 lần v&agrave; tất cả đều từ ghế dự bị.</p>\r\n\r\n<p><strong>Bị Mourinho loại bỏ, Rooney l&ecirc;n kế hoạch chia tay MU</strong></p>\r\n\r\n<p>Cuối c&ugrave;ng sau nhiều ng&agrave;y trăn trở, HLV Jose Mourinho cũng quyết định loại Rooney khỏi đội h&igrave;nh xuất ph&aacute;t của MU ở trận đấu với Leicester cuối tuần qua. Hiệu quả tức th&igrave;, &ldquo;Quỷ đỏ&rdquo; thắng tưng bừng 4-1, trong đ&oacute; người thay vai tr&ograve; &ldquo;số 10&rdquo; của Rooney l&agrave; Juan Mata chơi rực s&aacute;ng.</p>\r\n\r\n<p><img alt="MU: Mourinho “trói” Mata, nhắm Isco thay Rooney - 2" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-27/1474912582-rooney.jpg" /></p>\r\n\r\n<p>Rooney chưa chắc đ&atilde; giải nghệ ở MU</p>\r\n\r\n<p>C&aacute; nh&acirc;n Rooney hiểu rằng ph&iacute;a trước sẽ l&agrave; những ng&agrave;y kh&ocirc;ng mấy vui vẻ với anh ở Old Trafford. Theo tờ Mirror, &ldquo;g&atilde; Shrek&rdquo; đ&atilde; t&iacute;nh đến khả năng chia tay MU sau khi ho&agrave;n th&agrave;nh nốt 3 năm hợp đồng (thời hạn đến ng&agrave;y 30/6/2019).</p>\r\n\r\n<p>Vị thế bị lung lay, trong trường hợp b&aacute;m trụ lại, Rooney sẽ phải chấp nhận giảm s&acirc;u mức lương ngất ngưởng hiện tại 300.000 bảng/tuần. M&agrave; nếu ra đi, đội trưởng 30 tuổi c&oacute; thể sẽ theo ch&acirc;n những Lampard, Gerrard để tới Mỹ &ldquo;dưỡng gi&agrave;&rdquo;.</p>\r\n\r\n<p>Rooney chậm chạp đi nhiều nhưng theo cựu hậu vệ Gary Neville, ch&acirc;n s&uacute;t người Anh vẫn l&agrave; một trong những con b&agrave;i quan trọng của HLV Mourinho. R10 sẽ kh&ocirc;ng mặc định nhận suất đ&aacute; ch&iacute;nh nhưng anh vẫn được d&ugrave;ng lu&acirc;n phi&ecirc;n trong đội h&igrave;nh MU.</p>\r\n\r\n<p>Tuần trước, Rooney đ&aacute; ch&iacute;nh ở League Cup, ngồi dự bị tại <a href="http://www.24h.com.vn/premier-league-2016-2017-c48e2367.html">Premier League</a>. Rất c&oacute; thể, anh sẽ trở lại đội h&igrave;nh xuất ph&aacute;t của MU trong cuộc tiếp đ&oacute;n Zorya tại đấu trường Europa League v&agrave;o giữa tuần n&agrave;y v&agrave; cần thi đấu tốt để hi vọng &ldquo;tuy&ecirc;n chiến&rdquo; s&ograve;ng phẳng với Mata.</p>\r\n', 17, '1ab2ca31ed5328344cbcd432a8bb6568.jpg', 9, 1, 1, '27 September'),
(68, 'MU thắng đậm, Mourinho ', 'Sau trận thắng đậm Leicester City, Mourinho đã có những phát biểu "lấy lòng" Rooney, sau khi để tiền đạo này ngồi dự bị trong trận đấu.', '<p>MU đã trình diễn một trong những trận đấu hay nhất từ đầu mùa, đặc biệt trong hiệp 1, trước Leicester City. Một trong những mấu chốt giúp các cầu thủ <a href="http://www.24h.com.vn/manchester-united-p721c48.html">MU</a> thi đấu tự tin đến từ việc Mourinho đã dũng cảm loại bỏ <a href="http://www.24h.com.vn/wayne-rooney-p366c48.html">Rooney</a> khỏi đội hình xuất phát.</p>\r\n\r\n<p><img alt="MU thắng đậm, Mourinho "xoa dịu" Rooney - 1" src="http://image.24h.com.vn/upload/3-2016/images/2016-09-24/1474729233-rooney-1.jpg" /></p>\r\n\r\n<p>Rooney ngồi trên ghế dự bị trận gặp Leicester</p>\r\n\r\n<p>Sau trận đấu, vị chiến lược gia người Bồ đã có những phát biểu nhằm "xoa dịu" đội trưởng của "Quỷ đỏ". Mourinho cho biết: "Anh ấy vẫn là một cầu thủ lớn đối với tôi, một cầu thủ lớn với CLB và là 1 cầu thủ lớn của nước Anh."</p>\r\n\r\n<p>"Rooney vẫn là một cầu thủ quan trọng của tôi. Tôi tuyệt đối tin tưởng ở anh ấy. Đội nhà thắng trận và chắc chắn anh ấy cũng cảm thấy hạnh phúc như tôi lúc này."</p>\r\n\r\n<p>Lý giải cho quyết định để Rooney trên ghế dự bị, và tin dùng Lingard và Rashford, Mourinho nói: "Họ là 2 cầu thủ rất nhanh nhẹn. Trận đấu này đòi hỏi tốc độ cao, liên tục. Lingard, Rashford đã làm tốt nhiệm vụ của mình. Tôi cần những cầu thủ như vậy chơi xung quanh Ibra để tạo ra những khoảng trống, và những cơ hội ghi bàn."</p>\r\n\r\n<p>Nói về chiến thắng hoành tráng 4-1 trước Leicester, Mourinho tỏ ra bình thản. "Đây là một trận đấu tốt của toàn đội. Không dễ để thắng Leicester, và càng không dễ để thắng theo cách thoái mái và đậm đà như ngày hôm nay." Mourinho khẳng định.</p>\r\n', 17, '26e362d08bba25724cfb4b58c93b15e2.jpg', 3, 1, 0, '27 September');
INSERT INTO `news` (`id_news`, `name`, `preview_text`, `detail_text`, `id_cat`, `picture`, `read`, `id_user`, `is_active`, `date`) VALUES
(69, 'Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 1 Angela Phương Trinh tự tin diện khăn thành áo yếm vạt chéo sau thắt lưng, giúp cô khoe được đôi vai trần cùng tấm lưng nuột nà.  Ra đời từ những năm 40 ', 'Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 1\r\nAngela Phương Trinh tự tin diện khăn thành áo yếm vạt chéo sau thắt lưng, giúp cô khoe được đôi vai trần cùng tấm lưng nuột nà.\r\n\r\nRa đời từ những năm 40 của thế kỉ 20, khăn lụa luôn trở thành món phụ kiện không bao giờ lỗi mốt của phái đẹp. Bất chấp thời gian, khăn lụa vẫn luôn là món thời trang không thể thiếu trong tủ đồ của các cô gái.\r\n\r\nVà không lạ gì khi sao Việt luôn là người tiên phong và tích cực lăng-xê mốt mặc sexy, gợi cảm này. Không quá cầu kỳ, chỉ qua vài bước đơn giản nhưng lại thể hiện rõ ràng sự khéo léo của các giai nhân trong việc biến hóa một chiếc khăn thành áo chỉ trong vài phút. \r\n\r\nBiến khăn lụa thành áo yếm sẽ lựa chọn hoàn hảo cho những người đẹp sở hữu vòng eo con kiến, tấm lưng trần gợi cảm. Hãy cùng xem sao Việt "biến tấu" như thế nào nhé!\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 2\r\n\r\nXuất hiện tại một sự kiện gần đây, Hương Giang Idol lựa chọn cách biến khăn lụa thành áo yếm hình chiếc nơ, có phần đeo cổ gợi cảm. \r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 3\r\n\r\nSiêu mẫu Thanh Hằng nổi bật tại chương trình Vietnam''s Next Top Model khi diện áo yếm đỏ từ khăn lụa, kết hợp với quần cạp cao, ống rộng.\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 4\r\n\r\nNữ ca sĩ Bánh trôi nước trang nhã, thanh lịch khi thắt khăn lụa thành áo yếm khoe vai trần.\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 5\r\n\r\nBà xã Công Vinh cũng không bỏ qua xu hướng này khi phối quần trắng thanh lịch cùng kiểu quấn khăn croptop sành điệu.\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 6\r\n\r\nMột kiểu mặc khăn lụa khác của bà mẹ một con Thủy Tiên. \r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 7\r\n\r\nXuất hiện trong một triển lãm ở Tp. Hồ Chí Minh, Chipu cuốn hút với chiếc áo bằng khăn lụa mặc bên trong áo khoác, phối cùng chân váy hàng hiệu Salvatore Ferragamo.\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 8\r\n\r\nNgười mẫu Minh Triệu nóng bỏng trước bãi biển khi "hô biến" khăn lụa thành bra-top.\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 9\r\n\r\nCa sĩ Phương Thanh hô biến chiếc khăn Gucci khổ rộng thành chiếc đầm liền thân trẻ trung.\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 10\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 11\r\n\r\nMướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 12\r\n\r\nĐây là một số gợi ý thắt khăn giúp mọi cô gái có những chiếc áo "độc nhất vô nhị".', '<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 1" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813780-147580840032500-angela-ph----ng-trinh.jpg" /></p>\r\n\r\n<p>Angela Phương Trinh tự tin&nbsp;diện khăn th&agrave;nh &aacute;o yếm vạt ch&eacute;o sau thắt lưng, gi&uacute;p c&ocirc; khoe được đ&ocirc;i vai trần c&ugrave;ng tấm lưng nuột n&agrave;.</p>\r\n\r\n<p>Ra đời từ những năm 40 của thế kỉ 20, khăn lụa lu&ocirc;n trở th&agrave;nh m&oacute;n phụ kiện kh&ocirc;ng bao giờ lỗi mốt của ph&aacute;i đẹp. Bất chấp thời gian, khăn lụa vẫn lu&ocirc;n l&agrave; m&oacute;n thời trang&nbsp;kh&ocirc;ng thể thiếu trong tủ đồ của c&aacute;c c&ocirc; g&aacute;i.</p>\r\n\r\n<p>V&agrave; kh&ocirc;ng lạ g&igrave; khi sao Việt lu&ocirc;n l&agrave; người ti&ecirc;n phong v&agrave; t&iacute;ch cực&nbsp;lăng-x&ecirc; mốt mặc sexy, gợi cảm n&agrave;y. Kh&ocirc;ng qu&aacute; cầu kỳ, chỉ&nbsp;qua v&agrave;i bước đơn giản nhưng lại thể hiện r&otilde; r&agrave;ng&nbsp;sự kh&eacute;o l&eacute;o của c&aacute;c giai nh&acirc;n trong việc biến h&oacute;a một chiếc khăn th&agrave;nh &aacute;o chỉ trong v&agrave;i ph&uacute;t.&nbsp;</p>\r\n\r\n<p>Biến khăn lụa th&agrave;nh &aacute;o yếm sẽ lựa chọn ho&agrave;n hảo cho những người đẹp&nbsp;sở hữu&nbsp;v&ograve;ng eo con kiến, tấm lưng trần gợi cảm. H&atilde;y&nbsp;c&ugrave;ng xem sao Việt &quot;biến tấu&quot; như thế n&agrave;o nh&eacute;!</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 2" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813781-147580752147397----nh-2.jpg" /></p>\r\n\r\n<p>Xuất hiện tại một sự kiện gần đ&acirc;y, Hương Giang Idol lựa&nbsp;chọn c&aacute;ch biến khăn lụa&nbsp;th&agrave;nh &aacute;o yếm h&igrave;nh chiếc nơ, c&oacute; phần đeo cổ gợi cảm.&nbsp;</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 3" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813781-147580650392793----nh-5.jpg" /></p>\r\n\r\n<p>Si&ecirc;u mẫu Thanh Hằng nổi bật tại chương tr&igrave;nh Vietnam&#39;s Next Top Model&nbsp;khi diện &aacute;o yếm đỏ từ khăn lụa,&nbsp;kết hợp với quần cạp cao, ống rộng.</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 4" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813781-147580651723010----nh-6.jpg" /></p>\r\n\r\n<p>Nữ ca sĩ B&aacute;nh tr&ocirc;i nước&nbsp;trang nh&atilde;, thanh lịch khi thắt khăn lụa&nbsp;th&agrave;nh &aacute;o yếm khoe vai trần.</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 5" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813781-147580652858080----nh-7.jpg" /></p>\r\n\r\n<p>B&agrave; x&atilde; C&ocirc;ng Vinh cũng kh&ocirc;ng bỏ qua xu hướng n&agrave;y khi phối quần&nbsp;trắng thanh lịch c&ugrave;ng kiểu quấn khăn croptop s&agrave;nh điệu.</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 6" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813781-147580660384564----nh-10.jpg" /></p>\r\n\r\n<p>Một kiểu mặc khăn lụa kh&aacute;c của b&agrave; mẹ một con&nbsp;Thủy Ti&ecirc;n.&nbsp;</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 7" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813781-147580655047170----nh-8_1.jpg" /></p>\r\n\r\n<p>Xuất hiện trong một triển l&atilde;m ở&nbsp;Tp. Hồ Ch&iacute; Minh, Chipu cuốn h&uacute;t với chiếc &aacute;o bằng khăn lụa&nbsp;mặc b&ecirc;n trong &aacute;o kho&aacute;c, phối c&ugrave;ng&nbsp;ch&acirc;n v&aacute;y h&agrave;ng hiệu Salvatore Ferragamo.</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 8" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813783-147580661899096----nh-11.jpg" /></p>\r\n\r\n<p>Người mẫu Minh Triệu n&oacute;ng bỏng trước b&atilde;i biển khi &quot;h&ocirc; biến&quot; khăn lụa th&agrave;nh bra-top.</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 9" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813783-147580663032091----nh-12.jpg" /></p>\r\n\r\n<p>Ca sĩ&nbsp;Phương Thanh h&ocirc; biến chiếc khăn Gucci khổ rộng th&agrave;nh chiếc đầm liền th&acirc;n trẻ trung.</p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 10" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813783-147580665537434----nh-13.jpg" /></p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 11" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813788-147580666772379----nh-14.jpg" /></p>\r\n\r\n<p><img alt="Mướt mắt ngắm kiều nữ Vbiz quấn khăn làm áo - 12" src="http://image.24h.com.vn/upload/4-2016/images/2016-10-07/1475813791-1475806677599----nh-15.jpg" /></p>\r\n\r\n<p>Đ&acirc;y l&agrave; một số gợi &yacute; thắt khăn gi&uacute;p mọi c&ocirc; g&aacute;i c&oacute; những chiếc &aacute;o &quot;độc nhất v&ocirc; nhị&quot;.</p>\r\n', 17, '', 0, 1, 0, '08 October');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id_projects` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preview_text` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id_projects`, `name`, `preview_text`, `picture`, `link`) VALUES
(4, 'Dự án trang web thông tin', '<p>Dự &aacute;n mới</p>\r\n', '8de81e9d8316f553f14ab60636a2527e.png', 'https://www.facebook.com/'),
(6, 'Dự án Bnews', '<p>Dự &aacute;n về tin tức đơn giản</p>\r\n', '19bfe70d3aff0cbe3725de3cef2fb3ad.jpg', 'tinhot.hol.es'),
(7, 'Tên dự án', '<p>Đ&acirc;y l&agrave; m&ocirc; tả của dự &aacute;n</p>\r\n', 'e1082c3abf0d7e31d113febb26e74042.png', 'cuoilennhe.com'),
(8, 'Phó Giám đốc', '<p>M&ocirc; tả dự &aacute;n</p>\r\n', '51e1c68eb9a30a238da63269a7ca1ac5.png', 'vnexpress.net');

-- --------------------------------------------------------

--
-- Table structure for table `saying`
--

CREATE TABLE `saying` (
  `id_saying` int(12) NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saying`
--

INSERT INTO `saying` (`id_saying`, `content`, `author`) VALUES
(1, 'Nếu bạn luôn buồn phiền, hãy dùng hy vọng để chữa trị; hạnh phúc lớn nhất của nhân loại chính là biết hi vọng', 'Khuyết danh'),
(2, 'Cuộc sống vẫn vậy nếu nó lấy đi thứ gì của bạn, thì thế nào nó cũng bù lại cho bạn thứ khác, chỉ có điều là bạn có chịu đi tìm hay không thôi', 'Hạt giồng tâm hồn'),
(3, 'Không gì là không thể\r\n', 'Nguyễn Văn Tân'),
(5, 'ádfghjk\r\n', 'qưeqưe'),
(6, '<p>Kh&ocirc;ng g&igrave; l&agrave; kh&ocirc;ng thể ! Chi c&oacute; thể bạn kh&ocirc;ng tin m&agrave; th&ocirc;i</p>\r\n', 'Khuyết Danh');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(12) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `name`, `picture`) VALUES
(8, 'Ảnh 3', '017ac72223bc74ed19b86b51edc8ae9b.jpg'),
(9, 'Ảnh 2', '39457c56079bfdddefbe51c049fd20d5.jpg'),
(11, 'Ảnh 1', 'e4140247bfbb19e778493d1051098808.jpg'),
(12, 'Ảnh 4', 'c1403e28be0c815ff0974b4213d02e15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `statistical`
--

CREATE TABLE `statistical` (
  `id_statistical` int(12) NOT NULL,
  `date` date NOT NULL,
  `view` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistical`
--

INSERT INTO `statistical` (`id_statistical`, `date`, `view`) VALUES
(3, '2016-10-03', 2),
(4, '2016-10-04', 5),
(12, '2016-10-02', 64),
(13, '2016-10-05', 1),
(14, '2016-10-06', 2),
(15, '2016-10-08', 5),
(16, '2016-11-19', 2),
(17, '2017-07-15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE `useronline` (
  `tgtmp` int(15) NOT NULL DEFAULT '0',
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `local` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(255) NOT NULL,
  `fb_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skill` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` text COLLATE utf8_unicode_ci NOT NULL,
  `Ability` text COLLATE utf8_unicode_ci NOT NULL,
  `workplace` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(12) NOT NULL,
  `active` bit(1) NOT NULL,
  `maxacnhan` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fb_id`, `username`, `first_name`, `last_name`, `password`, `email`, `fullname`, `picture`, `address`, `skill`, `target`, `Ability`, `workplace`, `website`, `phone`, `active`, `maxacnhan`) VALUES
(1, '', 'admin', '', '', '21232f297a57a5a743894a0e4a801fc3', '', 'Nguyễn Văn Tân', 'fb9b4747f1f64847d714f1df467504ad.jpg', 'Tam Xuân Núi Thành Quảng Nam', 'aa', '', '', 'DEV', 'hovanquyen.com', 0, b'1', 0),
(12, '', 'adminaaa', '', '', '8a4458a6b405df26c9a0f3887906610f', '', 'ádasdasdasdasd', '3e2adf1685cff097df80790a896f16f6.jpg', '', '', '', '', '', '', 0, b'1', 0),
(13, '', 'admincfdsfsd', '', '', '12f9cf6998d52dbe773b06f848bb3608', '', 'Nguyễn Văn Tân', '77368a634474ef340b9cb8a4f8d437ef.jpg', '', '', '', '', '', '', 0, b'0', 0),
(15, '', 'tannguyen', 'Tân', 'Nguyễn', '57ba172a6be125cca2f449826f9980ca', 'vantancnttk13@gmail.com', 'Nguyễn Văn Tân', 'de29cb9d3e93e8a12487bd41e55cce14.jpg', '', '', '', '', '', '', 0, b'1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutme`
--
ALTER TABLE `aboutme`
  ADD PRIMARY KEY (`id_aboutme`);

--
-- Indexes for table `advs`
--
ALTER TABLE `advs`
  ADD PRIMARY KEY (`id_advs`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`IP_address`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_projects`);

--
-- Indexes for table `saying`
--
ALTER TABLE `saying`
  ADD PRIMARY KEY (`id_saying`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `statistical`
--
ALTER TABLE `statistical`
  ADD PRIMARY KEY (`id_statistical`);

--
-- Indexes for table `useronline`
--
ALTER TABLE `useronline`
  ADD PRIMARY KEY (`tgtmp`),
  ADD KEY `ip` (`ip`),
  ADD KEY `local` (`local`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutme`
--
ALTER TABLE `aboutme`
  MODIFY `id_aboutme` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `advs`
--
ALTER TABLE `advs`
  MODIFY `id_advs` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_cat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `IP_address` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id_projects` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `saying`
--
ALTER TABLE `saying`
  MODIFY `id_saying` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `statistical`
--
ALTER TABLE `statistical`
  MODIFY `id_statistical` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
