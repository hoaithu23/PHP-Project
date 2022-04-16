-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 23, 2022 lúc 08:52 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `wdmdb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wdm_admin`
--

CREATE TABLE `wdm_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wdm_admin`
--

INSERT INTO `wdm_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'thuan', 'thuanle1598@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'quoc viet', 'quocvietpro', 'hoathuan', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wdm_brand`
--

CREATE TABLE `wdm_brand` (
  `brandId` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wdm_brand`
--

INSERT INTO `wdm_brand` (`brandId`, `brandName`) VALUES
(2, 'Dell'),
(3, 'Samsung'),
(4, 'Toshiba'),
(5, 'Panasonic'),
(6, 'LG'),
(7, 'Aqua'),
(8, 'Sony'),
(9, 'Iphone'),
(10, 'Oppo'),
(11, 'Asus'),
(12, 'Acer'),
(13, 'MSI'),
(14, 'Lenovo'),
(15, 'Electrolux'),
(16, 'Boss');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wdm_cart`
--

CREATE TABLE `wdm_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `sid` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wdm_cart`
--

INSERT INTO `wdm_cart` (`cartId`, `productId`, `sid`, `productName`, `price`, `quantity`, `image`) VALUES
(29, 10, 'j0rf3mgogin7djvr9f0sknkvnh', 'Tủ lạnh Samsung Inverter 380 lít RT38K5982DX', '15.290.000', 1, '015bd61a8f.png'),
(30, 12, 'j0rf3mgogin7djvr9f0sknkvnh', 'Tủ lạnh Panasonic Inverter 322 lít NR-BV360WSVN', ' 16.290.000', 1, 'cf4cf29015.png'),
(31, 31, 'j0rf3mgogin7djvr9f0sknkvnh', 'Điện thoại OPPO Reno6 Z 5G 8GB/128GB Bạc', '8.490.000', 1, '795c70af49.png'),
(33, 10, 'bid10as9081hbmk87trv6082i8', 'Tủ lạnh Samsung Inverter 380 lít RT38K5982DX', '15290000', 1, '015bd61a8f.png'),
(70, 42, '0sh455ls0e9n0nc29t1tdvv4d2', 'Máy lạnh Panasonic Inverter 2 HP CU/CS-XU18XKH-8', '23990000', 1, '0367d8f28c.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wdm_category`
--

CREATE TABLE `wdm_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wdm_category`
--

INSERT INTO `wdm_category` (`catId`, `catName`) VALUES
(5, 'Máy giặt'),
(6, 'Máy điều hòa'),
(7, 'Tivi'),
(8, 'Tủ lạnh'),
(10, 'Điện thoại'),
(11, 'Laptop'),
(16, 'Quạt hơi nước');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wdm_customer`
--

CREATE TABLE `wdm_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wdm_customer`
--

INSERT INTO `wdm_customer` (`id`, `name`, `address`, `phone`, `email`, `password`) VALUES
(18, 'Lê Quén', 'Hồ Chí Minh', '0973100740', 'thuanle1598@gmail.com', '4a1f48b04255aa8859123770ec6295c8'),
(19, 'Quén HE', 'DMC', '02313132', 'thuanle1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(20, 'TOMIz', 'qqwew', '13123123', 'tomiz@gmail.com', '44e9c1c84fc149887f73e92e1f5b94b9');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wdm_order`
--

CREATE TABLE `wdm_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wdm_order`
--

INSERT INTO `wdm_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(25, 10, 'Tủ lạnh Samsung Inverter 380 lít RT38K5982DX', 18, 1, '15290000', '015bd61a8f.png', 2, '2022-03-22 18:20:16'),
(26, 11, 'Tủ lạnh Panasonic Inverter 366 lít NR-TL381GPKV', 18, 1, '15490000', 'f817794f4e.png', 2, '2022-03-22 18:20:16'),
(27, 12, 'Tủ lạnh Panasonic Inverter 322 lít NR-BV360WSVN', 18, 1, '16290000', 'cf4cf29015.png', 1, '2022-03-22 18:30:24'),
(28, 10, 'Tủ lạnh Samsung Inverter 380 lít RT38K5982DX', 18, 1, '15290000', '015bd61a8f.png', 1, '2022-03-22 18:39:45'),
(29, 10, 'Tủ lạnh Samsung Inverter 380 lít RT38K5982DX', 18, 1, '15290000', '015bd61a8f.png', 2, '2022-03-22 18:40:08'),
(30, 11, 'Tủ lạnh Panasonic Inverter 366 lít NR-TL381GPKV', 18, 1, '15490000', 'f817794f4e.png', 1, '2022-03-22 18:45:57'),
(31, 9, 'Tủ lạnh Samsung Inverter 208 lít RT20HAR8DBU', 18, 1, '6590000', '3ada86a90c.jpg', 1, '2022-03-22 18:49:22'),
(32, 9, 'Tủ lạnh Samsung Inverter 208 lít RT20HAR8DBU', 18, 1, '6590000', '3ada86a90c.jpg', 1, '2022-03-23 04:04:40'),
(33, 10, 'Tủ lạnh Samsung Inverter 380 lít RT38K5982DX', 18, 1, '15290000', '015bd61a8f.png', 1, '2022-03-23 04:25:20'),
(37, 44, 'Quạt điều hoà Boss FEAB-409-G', 18, 1, '4490000', '872b9183a9.png', 0, '2022-03-23 07:48:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wdm_product`
--

CREATE TABLE `wdm_product` (
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) UNSIGNED NOT NULL,
  `brandId` int(11) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wdm_product`
--

INSERT INTO `wdm_product` (`productId`, `productName`, `catId`, `brandId`, `description`, `price`, `image`, `type`) VALUES
(9, 'Tủ lạnh Samsung Inverter 208 lít RT20HAR8DBU', 8, 3, '<p>Tủ lạnh Samsung Inverter 236 l&iacute;t RT22M4032BY thiết kế nhỏ gọn, nổi bật với m&agrave;u đen giả gương sang trọng n&acirc;ng tầm cho kh&ocirc;ng gian căn bếp của gia đ&igrave;nh bạn. Đặc biệt, sản phẩm c&ograve;n được ưa chuộng nhờ nhiều t&iacute;nh năng như c&ocirc;ng nghệ Inverter, bộ lọc than hoạt t&iacute;nh Deodorizer... gi&uacute;p thực phẩm lu&ocirc;n tươi ngon v&agrave; giữ nguy&ecirc;n chất dinh dưỡng. Dung t&iacute;ch tủ lạnh Samsung 208 l&iacute;t với ngăn đ&aacute; 53 l&iacute;t v&agrave; ngăn lạnh 155 l&iacute;t đ&aacute;p ứng nhu cầu cho gia đ&igrave;nh nhỏ, c&oacute; số lượng từ 2-3 th&agrave;nh vi&ecirc;n.</p>', '6590000', '3ada86a90c.jpg', 0),
(10, 'Tủ lạnh Samsung Inverter 380 lít RT38K5982DX', 8, 3, '<p><span style=\"color: #000000;\"><span style=\"color: #000000;\">Tủ lạnh</span>&nbsp;Samsung Inverter 380 l&iacute;t RT38K5982DX&nbsp;c&oacute; dung t&iacute;ch thực l&ecirc;n đến 380 l&iacute;t v&agrave; dung t&iacute;ch tổng 394 l&iacute;t,&nbsp; trong đ&oacute; ngăn đ&aacute; l&agrave; 86 l&iacute;t, ngăn m&aacute;t 294 l&iacute;t gi&uacute;p bạn kh&ocirc;ng phải lo lắng về nơi bảo quản trong những ng&agrave;y nhiều thực phẩm. Thiết kế hiện đại&nbsp; với gam m&agrave;u nổi bật sẽ tăng th&ecirc;m vẻ tinh tế, hiện đại cho&nbsp;<span style=\"color: #000000;\">kh&ocirc;ng gian bếp</span>&nbsp;của gia đ&igrave;nh bạn.</span></p>', '15290000', '015bd61a8f.png', 1),
(11, 'Tủ lạnh Panasonic Inverter 366 lít NR-TL381GPKV', 8, 5, '<p><span>Tủ lạnh Panasonic Inverter 366 l&iacute;t NR-TL381GPKV</span><span>&nbsp;thuộc d&ograve;ng&nbsp;</span><span>tủ lạnh ngăn đ&aacute; tr&ecirc;n</span><span>, dung t&iacute;ch 366 l&iacute;t th&iacute;ch hợp sử dụng cho những gia đ&igrave;nh từ 3 - 4 người. C&ocirc;ng nghệ&nbsp;Blue Ag+ tr&ecirc;n tủ lạnh d&ugrave;ng &aacute;nh s&aacute;ng xanh để k&iacute;ch hoạt tinh thể bạc Ag+ nhằm ức chế sự hoạt động của vi khuẩn v&agrave; giảm m&ugrave;i h&ocirc;i đ&aacute;ng kể, nhờ đ&oacute; thực phẩm tr&aacute;nh được t&igrave;nh trạng bị hỏng trong khoảng thời gian ngắn. Kh&ocirc;ng chỉ vậy,&nbsp;c&ocirc;ng nghệ n&agrave;y c&ograve;n g&oacute;p phần mang lại luồng kh&iacute; tươi m&aacute;t b&ecirc;n trong ngăn tủ, gi&uacute;p người d&ugrave;ng cảm thấy thoải m&aacute;i v&agrave; h&agrave;i l&ograve;ng hơn mỗi khi mở cửa tủ lạnh.</span></p>', '15490000', 'f817794f4e.png', 1),
(12, 'Tủ lạnh Panasonic Inverter 322 lít NR-BV360WSVN', 8, 5, '<p class=\"short-descr-col-1\">Tổng dung t&iacute;ch 322 l&iacute;t rộng r&atilde;i thoải m&aacute;i lưu trữ thưc phẩm</p>', '16290000', 'cf4cf29015.png', 1),
(13, 'Tủ lạnh Toshiba Inverter 493 Lít GR-RS637WE-PMV(06)', 8, 4, '<p><span>Tủ lạnh Toshiba Inverter 493 L&iacute;t GR-RS637WE-PMV(06)&nbsp;</span><span>sở hữu&nbsp;</span><span>thiết kế tủ lạnh 2 cửa side by side đơn giản,</span><span>&nbsp;tinh tế với gam m&agrave;u x&aacute;m, tay cầm nổi bo cong mạnh mẽ,&nbsp;tạo điểm nhấn nổi bật cho kh&ocirc;ng gian của bạn. Với lối thiết kế tối giản, ph&ugrave; hợp với mọi phong c&aacute;ch nội thất. Với dung t&iacute;ch l&ecirc;n đến 493, sẽ đ&aacute;p ứng nhu cầu lưu trữ thực phẩm cho gia đ&igrave;nh c&oacute; đ&ocirc;ng th&agrave;nh vi&ecirc;n (4 - 5 người).</span></p>', '21390000', 'a9169eedad.png', 0),
(14, 'Tủ lạnh Panasonic Inverter 550 lít NR-DZ601YGKV', 8, 5, '<p class=\"short-descr-col-1\">Tủ lạnh Panasonic c&oacute; dung t&iacute;ch 550L th&iacute;ch hợp cho gia đ&igrave;nh tr&ecirc;n 5 người</p>', '40790000', 'dbca7d26c7.png', 1),
(15, 'Smart Tivi Samsung Crystal UHD 4K 50 inch UA50AU7000KXXV', 7, 3, '<p><span>Smart Tivi Samsung Crystal UHD 4K 50 inch UA50AU7000KXXV thuộc d&ograve;ng&nbsp;</span><span>smart tivi</span><span>&nbsp;hiện đại với những c&ocirc;ng nghệ nổi bật mang đến cho bạn trải nghiệm xem ho&agrave;n hảo đậm chất điện ảnh. C&ocirc;ng nghệ PurColor c&oacute; khả năng tăng cường th&ecirc;m nhiều dải m&agrave;u sắc gi&uacute;p những khung h&igrave;nh&nbsp;th&ecirc;m rực rỡ v&agrave; gần với m&agrave;u tự nhi&ecirc;n nhất.</span></p>', '13890000', '97ddc269e4.png', 1),
(16, 'Smart Tivi Samsung Crystal UHD 4K 55 inch UA55AU9000KXXV', 7, 3, '<p><span>Smart Tivi Samsung Crystal UHD 4K 55 inch UA55AU9000KXXV sở hữu thiết kế Airslim&nbsp;với độ mỏng ấn tượng h&ograve;a quyện ho&agrave;n hảo v&agrave;o kh&ocirc;ng gian nội thất tạo n&ecirc;n tổng thể liền mạch thu h&uacute;t mọi &aacute;nh nh&igrave;n. Với k&iacute;ch thước lớn 55 inch, tivi th&iacute;ch hợp bố tr&iacute; ở những kh&ocirc;ng gian rộng v&agrave; sang trọng như ph&ograve;ng kh&aacute;ch, ph&ograve;ng họp lớn, ph&ograve;ng hội nghị,... Chiếc&nbsp;</span>smart tivi<span>&nbsp;đến từ thương hiệu Samsung nổi bật với những c&ocirc;ng nghệ như: c&ocirc;ng nghệ&nbsp;Dynamic Crystal Color t&aacute;i hiện m&agrave;u sắc ch&acirc;n thực, độ ph&acirc;n giải 4K hiển thị h&igrave;nh ảnh sắc n&eacute;t, c&ocirc;ng nghệ &acirc;m thanh theo chuyển động Object Tracking Sound Lite,... Giờ đ&acirc;y, bạn c&oacute; thể tận hưởng trọn vẹn niềm vui giải tr&iacute; ngay tại nh&agrave;.</span></p>', '18490000', 'a698c1174e.png', 1),
(17, 'Google Tivi Sony 4K 55 inch XR-55X90J VN3', 7, 8, '<p><span>Google Tivi Sony 4K 55 inch XR-55X90J VN3 sở hữu thiết kế sang trọng, m&agrave;n h&igrave;nh tr&agrave;n viền tinh tế h&ograve;a quyện ho&agrave;n hảo v&agrave;o kh&ocirc;ng gian nội thất. Với độ ph&acirc;n giải 4K (sắc n&eacute;t gấp 4 lần tivi Full HD),&nbsp;</span><span>tivi Sony 4K</span><span>&nbsp;hiển thị h&igrave;nh ảnh ch&acirc;n thực, r&otilde; n&eacute;t đến từng chi tiết. Giờ đ&acirc;y, bạn sẽ được đắm ch&igrave;m trong những khung h&igrave;nh điện ảnh tuyệt đẹp, m&agrave;u sắc tự nhi&ecirc;n c&ugrave;ng &acirc;m thanh rung cảm như rạp chiếu phim ngay tại căn nh&agrave; của m&igrave;nh. Tất cả được kết hợp ho&agrave;n hảo tr&ecirc;n tivi Sony XR-X90J series.</span></p>', '23350000', '4ff80dcd76.png', 1),
(18, 'Android Tivi OLED Sony 4K 55 inch XR-55A90J VN3', 7, 8, '<p><span>Android Tivi OLED Sony 4K 55 inch XR-55A90J VN3 sở hữu thiết kế thanh mảnh, viền mỏng tinh tế g&oacute;p phần l&agrave;m nổi bật kh&ocirc;ng gian nội thất của gia đ&igrave;nh. C&ocirc;ng nghệ&nbsp;XR Picture&nbsp;ph&acirc;n t&iacute;ch ch&eacute;o v&agrave; tối ưu h&agrave;ng trăm ngh&igrave;n yếu tố chỉ trong t&iacute;ch tắc cho độ tương phản v&ocirc; tận, cho h&igrave;nh ảnh s&acirc;u, tự nhi&ecirc;n v&agrave; ch&acirc;n thật như bước ra từ cuộc sống. B&ecirc;n cạnh đ&oacute;, OLED Tivi Sony c&ograve;n sở hữu nhiều c&ocirc;ng nghệ hiện đại như:&nbsp;C&ocirc;ng nghệ XR Triluminos PRO,&nbsp;XR Contrast,&nbsp;XR Motion Clarity, c&ocirc;ng nghệ n&acirc;ng cấp &acirc;m thanh v&ograve;m sống động cho trải nghiệm xem sống động v&agrave; ch&acirc;n thực cả nghe lẫn nh&igrave;n.&nbsp;</span></p>', '52850000', 'bfb85e2350.png', 1),
(19, 'Máy giặt LG Inverter 11 kg FV1411S4P', 5, 6, '<p><span>M&aacute;y giặt LG Inverter 11 kg FV1411S4P sẽ l&agrave;m bạn h&agrave;i l&ograve;ng khi được LG trang bị&nbsp;</span><span>C&ocirc;ng nghệ AI DD c&oacute; khả năng chuẩn đo&aacute;n khối lượng đồ giặt, độ mềm sợi vải, từ đ&oacute; đưa ra mức giặt v&agrave; chương tr&igrave;nh giặt ph&ugrave; hợp nhất.</span></p>', '15990000', '04fd160f56.png', 1),
(20, 'Máy giặt LG Inverter 11 kg FV1411S3B', 5, 6, '<p><span>M&aacute;y giặt LG Inverter 11 kg FV1411S3B sẽ l&agrave;m bạn h&agrave;i l&ograve;ng khi được LG trang bị&nbsp;</span><span>C&ocirc;ng nghệ AI DD c&oacute; khả năng chuẩn đo&aacute;n khối lượng đồ giặt, độ mềm sợi vải, từ đ&oacute; đưa ra mức giặt v&agrave; chương tr&igrave;nh giặt ph&ugrave; hợp nhất.&nbsp;</span></p>', '16690000', '8c98b2dbb2.png', 1),
(21, 'Máy giặt Toshiba Inverter 9.5 Kg TW-BK105G4V(SS)', 5, 4, '<p><span>M&aacute;y giặt Toshiba Inverter 9.5 Kg TW-BK105G4V(SS)</span><span>sở hữu kiểu thiết kế mang phong c&aacute;ch&nbsp;</span><span>Takumi Nhật Bản,</span><span>&nbsp;l&agrave; sự kết hợp của Mộng - Ng&agrave;m v&agrave; R&atilde;nh &acirc;m dương. Bộ khung m&aacute;y vững chắc, cho m&aacute;y hoạt động &ecirc;m &aacute;i ở tốc độ cao. Kết cấu liền khối v&agrave; sắc n&eacute;t với vẻ ngo&agrave;i sang trọng c&ugrave;ng n&uacute;m vặn mượt m&agrave;, chuyển động &ecirc;m &aacute;i</span></p>', '10490000', '8d75466886.png', 0),
(22, 'Máy giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK)', 5, 4, '<p><span>M&aacute;y giặt Toshiba Inverter 8.5 kg TW-BK95S2V(WK) thu&ocirc;c d&ograve;ng m&aacute;y giặt Inverter hiện đại với nhiều ưu điểm nổi bật như: tiết kiệm điện năng, vận h&agrave;nh &ecirc;m &aacute;i, giảm phai m&agrave;u quần &aacute;o v&agrave; đ&aacute;nh bay vết bẩn mạnh mẽ. Với khối lượng 8.5 kg, chiếc&nbsp;</span><span>m&aacute;y giặt</span><span>&nbsp;l&agrave; sự lựa chọn th&iacute;ch hợp cho gia đ&igrave;nh c&oacute; khoảng 3 -5 th&agrave;nh vi&ecirc;n.&nbsp;</span></p>', '8490000', '4be8a1e0c1.png', 1),
(23, 'Máy giặt Aqua Inverter 9 kg AQD-A900F.S', 5, 7, '<p><span>M&aacute;y giặt Aqua Inverter 9 kg AQD-A900F.S -&nbsp;</span><a title=\"M&aacute;y giặt cửa trước\" href=\"https://www.nguyenkim.com/may-giat/?sort_by=position&amp;sort_order=desc&amp;features_hash=72-6127\" rel=\"noopener noreferrer\" target=\"_blank\">M&aacute;y</a> giặt cửa trước<span>&nbsp;c&oacute; thiết kế gọn g&agrave;ng tiết kiệm diện t&iacute;ch, với th&acirc;n m&aacute;y mỏng,&nbsp;tiết kiệm 12%&nbsp;diện t&iacute;ch so với m&aacute;y giặt th&ocirc;ng thường. K&iacute;ch thước&nbsp;lồng giặt 525 mm gi&uacute;p việc giặt giũ quần &aacute;o c&oacute; k&iacute;ch cỡ lớn sẽ trở n&ecirc;n dễ d&agrave;ng,&nbsp;giảm xoắn rối v&agrave; sạch hơn. Với khối lượng giặt 9 kg,&nbsp;</span>m&aacute;y giặt Aqua<span>&nbsp;n&agrave;y l&agrave; lựa chọn ph&ugrave; hợp cho những gia đ&igrave;nh c&oacute; khoảng 3 - 5 th&agrave;nh vi&ecirc;n.</span></p>', '9490000', '4c1555eb09.png', 0),
(24, 'Máy giặt Aqua 9 kg AQW-S90CT (H2)', 5, 7, '<p><span>M&aacute;y giặt Aqua 9 kg AQW-S90CT (H2) c&oacute; thiết kế cửa tr&ecirc;n c&ugrave;ng khối lượng giặt 9kg th&iacute;ch hợp sử dụng cho gia đ&igrave;nh c&oacute; từ 4 - 6 th&agrave;nh vi&ecirc;n. Kh&ocirc;ng chỉ sở hữu thiết kế bắt mắt,&nbsp;</span>m&aacute;y giặt&nbsp;cửa tr&ecirc;n<span>&nbsp;c&ograve;n được trang bị những c&ocirc;ng nghệ v&agrave; t&iacute;nh năng hiện đại hứa hẹn sẽ l&agrave; một trợ thủ đắc lực gi&uacute;p c&ocirc;ng việc giặt giũ trở n&ecirc;n nhanh ch&oacute;ng v&agrave; tiện lợi hơn.</span></p>', '5390000', '30d2da63a4.png', 0),
(25, 'Điện thoại Samsung Galaxy Z Fold 3 5G 512GB Đen', 10, 3, '<p><span>Điện thoại Samsung Galaxy Z Fold 3 5G 512GB Đen vẫn</span><span>&nbsp;giữ nguy&ecirc;n ngoại h&igrave;nh c&ugrave;ng cơ chế m&agrave;n h&igrave;nh gập mở dạng quyển s&aacute;ch như của tiền nhiệm. Chỉ cần v&agrave;i thao t&aacute;c đơn giản, bạn đ&atilde; hồ biến chiếc smartphone th&agrave;nh một chiếc m&aacute;y t&iacute;nh bảng một c&aacute;ch dễ d&agrave;ng v&agrave; ngược lại. Phần khung viền được sử dụng hợp kim nh&ocirc;m Armor Aluminum cứng c&aacute;p, bền bỉ hơn 10% so với c&aacute;c vật liệu trước đ&acirc;y Samsung từng sản xuất. Với cấu tạo chắc chắn n&agrave;y sẽ gi&uacute;p người d&ugrave;ng y&ecirc;n t&acirc;m tận hưởng c&aacute;c hoạt động y&ecirc;u th&iacute;ch một c&aacute;ch trọn vẹn nhất. Bộ khớp nối bản lề mới gi&uacute;p kết nối bộ khung của Galaxy Z Fold3 ho&agrave;n hảo hơn, tăng cao độ bền khi đ&oacute;ng mở li&ecirc;n tục v&agrave; cố định cực kỳ chắc chắn, gi&uacute;p trải nghiệm sử dụng thoải m&aacute;i nhất. Phần mặt lưng Mặt lưng của Z Fold 3 được l&agrave;m nh&aacute;m hơn, hạn chế b&aacute;m bẩn, mồ h&ocirc;i hay dấu v&acirc;n tay trong qu&aacute; tr&igrave;nh ch&uacute;ng ta sử dụng m&aacute;y.</span></p>', '38990000', 'd1f3722fb9.png', 0),
(26, 'Điện thoại Samsung S22 Ultra 12GB/512GB Xanh Lá', 10, 3, '<p class=\"short-descr-col-1\"><span>M&agrave;n h&igrave;nh cong 6.8 inch, tần số qu&eacute;t 120Hz, tr&ecirc;n tấm nền&nbsp;Dynamic AMOLED 2X</span></p>', '36990000', 'aa3e503957.png', 0),
(27, 'Điện thoại Samsung S22 Plus 8GB/256GB Đen', 10, 3, '<p class=\"short-descr-col-1\"><span>Samsung S22 Plus sở hữu thiết kế c&aacute;c g&oacute;c cạnh bo cong mềm mại, sang trọng</span></p>', '27490000', '79136caa31.png', 0),
(28, 'Điện thoại iPhone 13 Pro 256GB Xanh Dương', 10, 9, '<p class=\"short-descr-col-1\">iPhone 13 Pro c&oacute; khả năng kh&aacute;ng nước chuẩn IP68 cho bạn y&ecirc;n t&acirc;m sử dụng</p>', '31390000', 'c25c4b5abb.png', 0),
(29, 'Điện thoại iPhone 12 128GB Đỏ', 10, 9, '<p>Apple ra mắt iPhone 12<span>&nbsp;128GB Đỏ với cạnh khung vu&ocirc;ng vắn. Với thiết kế&nbsp;</span>iPhone 12 128GB Đỏ<span>&nbsp;sẽ tạo được độ chắc chắn khi người d&ugrave;ng cầm nắm thiết bị hơn so với khung bo tr&ograve;n như trước đ&acirc;y iPhone 11, X,... Điện thoại&nbsp;</span>Apple iPhone 12<span>&nbsp;</span><span>mang đến độ bền vượt trội v&agrave; diện mạo b&oacute;ng bẩy sang trọng hơn.</span><span>&nbsp;M&agrave;u đỏ nổi bật thể hiện r&otilde; n&eacute;t c&aacute; t&iacute;nh của người d&ugrave;ng.</span></p>', '19990000', '9db36b178b.png', 0),
(30, 'Điện thoại iPhone 13 Pro Max 1TB Xanh Dương', 10, 9, '<p class=\"short-descr-col-1\">iPhone 13 Pro Max kh&aacute;ng nước bụi chuẩn IP68 cho bạn y&ecirc;n t&acirc;m sử dụng</p>', '49990000', 'cf693ab956.png', 1),
(31, 'Điện thoại OPPO Reno6 Z 5G 8GB/128GB Bạc', 10, 10, '<p>Điện thoại OPPO Reno6 Z 5G 8GB/128GB Bạcn<span>&nbsp;được trang bị l&ecirc;n đến 3 camera chuy&ecirc;n nghiệp, camera ch&iacute;nh 64 MP, camera g&oacute;c si&ecirc;u rộng 8 MP v&agrave; camera macro 2 MP c&ugrave;ng camera trước 32 MP gi&uacute;p bạn lu&ocirc;n bắt trọn mọi cảm x&uacute;c trong khung h&igrave;nh, thoải m&aacute;i ghi lại những khoảnh khắc trong cuộc sống một c&aacute;ch ấn tượng nhất. B&ecirc;n cạnh đ&oacute;, OPPO c&ograve;n t&iacute;nh năng năng &ldquo;Ch&acirc;n dung Bokeh Flare&rdquo; kh&ocirc;ng chỉ đơn thuần dừng lại ở x&oacute;a ph&ocirc;ng, m&agrave; c&ograve;n xử l&yacute; chủ thể v&agrave; hậu cảnh một c&aacute;ch độc lập, từ đ&oacute; kết hợp c&ugrave;ng c&ocirc;ng nghệ AI chỉnh &aacute;nh s&aacute;ng ph&iacute;a sau th&agrave;nh ph&ocirc;ng nền ảo diệu l&agrave;m cho tổng thể bức ảnh lung linh hơn v&agrave; nghệ thuật hơn.</span></p>', '8490000', '795c70af49.png', 1),
(32, 'Điện thoại OPPO Reno4 Xanh thiên hà', 10, 10, '<p><span>Điện thoại OPPO Reno4 Xanh thi&ecirc;n h&agrave;&nbsp;</span><span>l&agrave; sản phẩm mới nhất của thương hiệu đ&igrave;nh đ&aacute;m Oppo. V&igrave; thế, thiết kế b&ecirc;n ngo&agrave;i của&nbsp;</span>smartphone&nbsp;<span>rất được ch&uacute; &yacute; trong lần ra mắt vừa rồi. Đ&acirc;y hẳn sẽ l&agrave; chiếc điện thoại khiến độ thời thượng của bạn tăng th&ecirc;m gấp bội khi sở hữu kiểu d&aacute;ng thanh mảnh được kho&aacute;c l&ecirc;n m&igrave;nh gam m&agrave;u Xanh thi&ecirc;n h&agrave;.</span></p>', '7490000', 'af52d4d67a.png', 0),
(33, 'Laptop MSI GF63 Thin 11UC-443VN I5-11400H/8GB/512GB/Win10', 11, 13, '<p class=\"short-descr-col-1\">Bộ vi xử l&yacute; Intel Core i5-11400H gi&uacute;p trải nghiệm game ổn định</p>', '24490000', '82457ca6c7.png', 0),
(34, 'Laptop MSI GF63 i7-10750H/8GB/512GB/Win10 (GF6310SC-020VN)', 11, 13, '<p><span>Laptop MSI GF63 i7-10750H/8GB/512GB/Win10 (GF6310SC-020VN) - C</span><span>hiếc&nbsp;</span><span>laptop gaming</span><span>&nbsp;xịn s&ograve; hội tụ đầy đủ c&aacute;c yếu tố tuyệt vời từ cấu h&igrave;nh chip xử l&yacute;, dung lượng RAM đến kh&ocirc;ng gian lưu trữ hay thiết kế hiện đại.&nbsp;Laptop MSI đ</span><span>ược trang bị</span><span>&nbsp;</span>bộ vi xử l&yacute; Intel<span>&nbsp;i7 thế hệ 10,&nbsp;tốc độ xung nhịp 2.6GHz c&oacute; thể &eacute;p xung l&ecirc;n tận 5.0GHz c&ugrave;ng 12MB, kết hợp 6 nh&acirc;n 12 luồng xử l&yacute; c&aacute;c t&aacute;c vụ cực kỳ nhanh ch&oacute;ng v&agrave; dễ d&agrave;ng. B&ecirc;n cạnh đ&oacute;,&nbsp;</span><span>Bộ vi xử l&yacute; mới nhất mạnh hơn tới 15% so với thế hệ trước. Xung nhịp đơn nh&acirc;n cực cao cho trải nghiệm chơi game tuyệt hảo. Nhờ đ&oacute; m&agrave; tất cả c&aacute;c t&aacute;c vụ, từ<span>&nbsp;trải nghiệm&nbsp;</span><span>chơi game</span><span>, học tập, l&agrave;m việc hay xem&nbsp;</span><span>phim Netflix</span><span>&nbsp;giải tr&iacute; tuyệt vời nhất m&agrave; kh&ocirc;ng bị gi&aacute;n đoạn bởi hiện tượng giật lag</span><span>.</span></span></p>', '21840000', '043df593eb.png', 1),
(35, 'Laptop Asus VivoBook A415EA i5-1135G7/8GB/512GB/Win11 (EB1474W)', 11, 11, '<p class=\"short-descr-col-1\">Bộ vi xử l&yacute; Intel Core i5-1135G7 gi&uacute;p xử l&yacute; tốt c&aacute;c t&aacute;c vụ học tập, văn ph&ograve;ng</p>', '17850000', 'dba656129e.png', 0),
(36, 'Laptop Asus VivoBook X515EA i3-1115G4/4GB/512GB/Win11 (BQ2351W)', 11, 11, '<p class=\"short-descr-col-1\">M&agrave;n h&igrave;nh 15.6 inch FHD cho trải nghiệm h&igrave;nh ảnh r&otilde; n&eacute;t, m&atilde;n nh&atilde;n</p>', '13290000', '00c2d4479b.png', 0),
(37, 'Laptop Acer Nitro 5 Gaming AN515-45-R6EV R5 5600H/8GB/512GB/Win11 (NH.QBMSV.006)', 11, 12, '<p class=\"short-descr-col-1\">Bộ vi xử l&yacute;&nbsp;AMD&nbsp;Ryzen 5 5600H gi&uacute;p xử l&yacute; tốt c&ocirc;ng việc, chơi game ổn định</p>', '22790000', '7745fed5ff.png', 0),
(38, 'Laptop Acer Nitro 5 Gaming AN515-57-54MV I5-11400H/8GB/512GB NH.QENSV.003', 11, 12, '<p class=\"short-descr-col-1\">Chip&nbsp;Intel Core i5-11400H&nbsp;xử l&yacute; t&aacute;c vụ văn ph&ograve;ng tốt, chơi game ổn định</p>', ' 25170000', '3262eff2ca.png', 0),
(39, 'Laptop Dell Vostro 3400 i7-1165G7/8GB/512GB/Win11 (V4I7015W1)', 11, 2, '<p class=\"short-descr-col-1\">Bộ vi xử l&yacute; Intel Core i7-1165G7 xử l&yacute; c&ocirc;ng việc nhanh ch&oacute;ng, mượt m&agrave;</p>', '24690000', '6a9db99c45.png', 0),
(40, 'Laptop Dell Inspiron 15 3511 i7-1165G7/8GB/512GB/Win11 (70270652)', 11, 2, '<p class=\"short-descr-col-1\">Bộ vi xử l&yacute; Intel Core&nbsp;i7-1165G7 gi&uacute;p xử l&yacute; tốt c&aacute;c t&aacute;c vụ học tập, văn ph&ograve;ng</p>', ' 24690000', 'ef4f6732ca.png', 0),
(41, 'Máy lạnh Panasonic Inverter 2 HP CU/CS-PU18WKH-8M', 6, 5, '<p><span>M&aacute;y lạnh Panasonic&nbsp;Inverter 2 HP CU/CS-PU18WKH-8M</span><span>&nbsp;c&oacute; thiết kế đơn giản, t&ocirc;ng m&agrave;u trắng hiện đại với c&aacute;c đường bo cong&nbsp;</span><span>mang đến vẻ sang trọng cho kh&ocirc;ng gian nội thất gia đ&igrave;nh bạn. M&aacute;y c&oacute;&nbsp;c&ocirc;ng suất l&agrave;m m&aacute;t 2 HP, ph&ugrave; hợp cho c&aacute;c ph&ograve;ng c&oacute; diện t&iacute;ch lớn từ 20 - 30m2 như ph&ograve;ng kh&aacute;ch, ph&ograve;ng ngủ master hay căn hộ studio.&nbsp;B&ecirc;n cạnh đ&oacute;, m&aacute;y sở hữu c&ocirc;ng nghệ Inverter t&acirc;n tiến kh&ocirc;ng tạo tiếng ồn lớn hay rung, vận h&agrave;nh &ecirc;m &aacute;i, tiện dụng d&ugrave;ng khi đi ngủ. Kh&ocirc;ng chỉ mang lại hiệu quả hoạt động &ecirc;m, c&ocirc;ng nghệ Inverter c&ograve;n tiết kiệm điện năng ti&ecirc;u thụ đến 70%, giảm bớt chi ph&iacute; tiền điện h&agrave;ng th&aacute;ng cho gia đ&igrave;nh bạn.</span></p>', '19390000', '519e0630b5.png', 0),
(42, 'Máy lạnh Panasonic Inverter 2 HP CU/CS-XU18XKH-8', 6, 5, '<p class=\"short-descr-col-1\">Tận hưởng cảm gi&aacute;c m&aacute;t mẻ nhanh ch&oacute;ng với chế độ iAUTO-X v&agrave; c&ocirc;ng nghệ&nbsp;P-Tech</p>', '23990000', '0367d8f28c.png', 0),
(43, 'Tủ lạnh Samsung Inverter 680 lít SBS RS62R5001B4', 8, 3, '<p><span>Tủ Lạnh Samsung RS62R5001B4 SV 680 Lít SBS</span><span>&nbsp;g&acirc;y ấn tượng với thiết kế phẳng, g&oacute;c cạnh c&ugrave;ng bề mặt th&eacute;p kh&ocirc;ng gỉ cao cấp, n&acirc;ng tầm đẳng cấp cho to&agrave;n bộ gian bếp. Đ&acirc;y là lựa chọn ho&agrave;n hảo cho mọi phong c&aacute;ch thiết kế nội thất.</span></p>', '20650000', 'bff07f6e01.png', 1),
(44, 'Quạt điều hoà Boss FEAB-409-G', 16, 16, '<p><span>Quạt điều ho&agrave; Boss FEAB-409-G sở hữu phong c&aacute;ch thiết kế sang trọng, c&aacute;c chi tiết được tinh giảm bớt, đi c&ugrave;ng m&agrave;u x&aacute;m, tạo n&ecirc;n tổng thể tinh tế, ph&ugrave; hợp với mọi kh&ocirc;ng gian nội thất. Dưới đế quạt c&ograve;n được t&iacute;ch hợp th&ecirc;m 4 b&aacute;nh xe linh hoạt, thuận tiện di chuyển qua c&aacute;c ph&ograve;ng. B&ecirc;n cạnh đ&oacute;, d</span><span>iện t&iacute;ch l&agrave;m m&aacute;t của quạt l&ecirc;n đến 30m2 quạt ph&ugrave; hợp với kh&ocirc;ng gian ph&ograve;ng ngủ, ph&ograve;ng kh&aacute;ch, ph&ograve;ng ăn,...</span></p>', '4490000', '872b9183a9.png', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `wdm_admin`
--
ALTER TABLE `wdm_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `wdm_brand`
--
ALTER TABLE `wdm_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `wdm_cart`
--
ALTER TABLE `wdm_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `wdm_category`
--
ALTER TABLE `wdm_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `wdm_customer`
--
ALTER TABLE `wdm_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `wdm_order`
--
ALTER TABLE `wdm_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `wdm_product`
--
ALTER TABLE `wdm_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `productId` (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `wdm_admin`
--
ALTER TABLE `wdm_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `wdm_brand`
--
ALTER TABLE `wdm_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `wdm_cart`
--
ALTER TABLE `wdm_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `wdm_category`
--
ALTER TABLE `wdm_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `wdm_customer`
--
ALTER TABLE `wdm_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `wdm_order`
--
ALTER TABLE `wdm_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `wdm_product`
--
ALTER TABLE `wdm_product`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `wdm_cart`
--
ALTER TABLE `wdm_cart`
  ADD CONSTRAINT `wdm_cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `wdm_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wdm_order`
--
ALTER TABLE `wdm_order`
  ADD CONSTRAINT `wdm_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `wdm_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `wdm_order_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `wdm_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `wdm_product`
--
ALTER TABLE `wdm_product`
  ADD CONSTRAINT `wdm_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `wdm_category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `wdm_product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `wdm_brand` (`brandId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
