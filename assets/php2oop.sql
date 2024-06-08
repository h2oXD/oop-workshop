-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 08, 2024 lúc 05:26 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`id`, `name`, `avatar`) VALUES
(1, 'Trông Anh Ngược', '/assets/uploads/1717693962client_img.jpg'),
(2, 'Giả Hành Tôn', '/assets/uploads/171769395435212.jpg'),
(3, 'Tôn Hành Giả', '/assets/uploads/171769345506f76bfb-f21d-4477-8bf5-8278173a204d.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Tên danh mục',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian khởi tạo',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sức khoẻ', '2024-06-03 08:29:07', '2024-06-03 08:29:07'),
(3, 'Thể thao', '2024-06-03 08:29:25', '2024-06-03 08:29:25'),
(4, 'Du lịch', '2024-06-03 08:29:25', '2024-06-03 08:29:25'),
(5, 'Giải trí', '2024-06-03 08:29:32', '2024-06-03 08:29:32'),
(6, 'Giáo dục', '2024-06-03 08:32:00', '2024-06-03 08:32:00'),
(7, 'Chính trị', '2024-06-03 15:41:30', '2024-06-07 21:33:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `category_id` int NOT NULL COMMENT 'Danh mục bài viết',
  `author_id` int NOT NULL COMMENT 'Tác giả',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Tiêu đề',
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Ảnh bìa',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Nội dung',
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Mô tả ngắn',
  `view` int NOT NULL DEFAULT '0' COMMENT 'Số lượt xem',
  `status` enum('draft','published') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Draft: Bản nháp,\r\nPublished:Công khai',
  `is_editors_pick` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 là NO,\r\n1 Là YES',
  `is_trending` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 là NO,\r\n1 là YES',
  `is_show_home` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 là NO,\r\n1 là YES',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian khởi tạo',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `author_id`, `title`, `thumbnail`, `content`, `excerpt`, `view`, `status`, `is_editors_pick`, `is_trending`, `is_show_home`, `created_at`, `updated_at`) VALUES
(14, 7, 2, 'Tiêu đề của bài viết xxxxxx', '/assets/uploads/1717697403bg3 - Copy.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '12345678', 0, 'published', 0, 0, 1, '2024-06-05 14:44:19', '2024-06-05 14:44:19'),
(15, 7, 1, 'Tiêu đề của bài viết zzzzzz', '/assets/uploads/17176973721713510314452.png', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '12345678', 0, 'published', 0, 0, 1, '2024-06-05 14:50:38', '2024-06-05 14:50:38'),
(16, 4, 1, 'Lorem Ipsum is simply dummy text of the printing', '/assets/uploads/17176960249340403bbea3bd310d03df2e22ad8f49.webp', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 10, 'published', 0, 1, 1, '2024-06-06 17:47:04', '2024-06-06 17:47:04'),
(17, 6, 3, 'Tiêu đề bài viết 111111', '/assets/uploads/1717807023img1.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Tiêu đề bài viết 111111', 1, 'published', 0, 0, 1, '2024-06-06 18:23:38', '2024-06-06 18:23:38'),
(18, 6, 3, 'Tiêu đề bài viết 22222', '/assets/uploads/17176982441337500.png', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Tiêu đề bài viết 22222', 0, 'published', 0, 0, 1, '2024-06-06 18:24:04', '2024-06-06 18:24:04'),
(19, 4, 2, 'Tiêu đề bài viết 21231231', '/assets/uploads/1717698296bg.jpg', '<p>12312312312</p>', '12345678', 2, 'published', 0, 0, 1, '2024-06-06 18:24:56', '2024-06-06 18:24:56'),
(20, 5, 1, '\\(^_^)/', '/assets/uploads/17176984141350453.png', '<p>12313124124</p>', '12345678', 36, 'published', 0, 0, 1, '2024-06-06 18:26:54', '2024-06-06 18:26:54'),
(21, 3, 2, 'Điều kiện nào để Việt Nam đi tiếp ở vòng loại World Cup?', '/assets/uploads/17177384621.jpg', '<p class=\"Normal\">Việt Nam đang đứng thứ ba bảng F với s&aacute;u điểm, &iacute;t hơn Indonesia một điểm, ngang hiệu số b&agrave;n thắng bại (-2). V&ograve;ng loại quy định đội n&agrave;o c&oacute; hiệu số b&agrave;n thắng bại tốt hơn sẽ đứng tr&ecirc;n, trong c&aacute;c đội bằng điểm. V&igrave; thế, nếu Việt Nam v&agrave; Indonesia bằng điểm nhau ở lượt cuối, thầy tr&ograve; Kim chắc chắn c&oacute; hiệu số tốt hơn v&agrave; đứng tr&ecirc;n.</p>\r\n<p class=\"Normal\">Địa điểm thi đấu hai trận cuối kh&ocirc;ng đứng về ph&iacute;a Việt Nam, bởi đội phải l&agrave;m kh&aacute;ch tr&ecirc;n s&acirc;n Basra ở Iraq. Trong khi đ&oacute;, Indonesia được chơi tr&ecirc;n s&acirc;n nh&agrave; Bung Karno gặp Philippines. Iraq to&agrave;n thắng năm trận đ&atilde; qua v&agrave; chắc chắn đi tiếp, c&ograve;n Philippines đ&atilde; bị loại v&igrave; mới kiếm một điểm.</p>\r\n<p class=\"Normal\">Việt Nam đ&atilde; gặp Iraq s&aacute;u trận trước đ&acirc;y, m&agrave; chưa thắng trận n&agrave;o (h&ograve;a một v&agrave; thua năm). Ở cả bốn cuộc đối đầu gần nhất, đại diện T&acirc;y &Aacute; đều thắng s&aacute;t n&uacute;t, với tỷ số 1-0 hoặc 3-2. HLV Jesus Casas cũng n&oacute;i rằng Iraq sẽ kh&ocirc;ng bu&ocirc;ng xu&ocirc;i ở lượt cuối, v&igrave; thế đo&agrave;n qu&acirc;n của Kim hứa hẹn sẽ trải qua trận đấu kh&oacute; khăn.</p>\r\n<p class=\"Normal\">Thầy tr&ograve; HLV Kim Sang-sik cũng phải chờ đợi Philippines l&agrave;m n&ecirc;n bất ngờ tại Jakarta. Trong năm cuộc đối đầu gần nhất, Philippines thắng một, h&ograve;a ba v&agrave; thua một trận trước Indonesia. Trận đấu tới tại Bung Karno diễn ra l&uacute;c 19h30, sớm hơn v&agrave;i tiếng so với trận Iraq - Việt Nam. Nếu Indonesia thắng Philippines, trận đấu tại Basra sẽ chỉ c&ograve;n t&iacute;nh thủ tục với Việt Nam. C&ograve;n nếu Indonesia kh&ocirc;ng thắng, quyền tự quyết sẽ trở lại tay thầy tr&ograve; Kim.</p>\r\n<p class=\"Normal\">Đội v&agrave;o v&ograve;ng loại ba World Cup 2026 cũng sẽ gi&agrave;nh suất dự VCK Asian Cup 2027 tại Arab Saudi. C&ograve;n đội dừng bước ở v&ograve;ng loại hai World Cup, sẽ phải đ&aacute; v&ograve;ng loại Asian Cup. Kỳ trước,&nbsp;<a href=\"https://vnexpress.net/chu-de/doi-tuyen-bong-da-viet-nam-443\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_CacGiaiKhac-4755367&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-VietNam&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Việt Nam</a> l&agrave; đại diện duy nhất của Đ&ocirc;ng Nam &Aacute; v&agrave;o v&ograve;ng loại ba World Cup. Lần n&agrave;y, sẽ c&oacute; &iacute;t nhất một đội trong khu vực l&agrave;m được điều đ&oacute;, l&agrave; Việt Nam hoặc Indonesia.</p>', '12345678', 5, 'published', 1, 0, 1, '2024-06-07 05:34:22', '2024-06-07 05:34:22'),
(22, 3, 3, 'HLV Shin Tae-yong trách cầu thủ Indonesia', '/assets/uploads/1717738677Studio Ghibli — The Art Of Your Name - Kimi No Na Wa 君の名は。Part One___.jpg', '<p class=\"Normal\">\"T&ocirc;i lấy l&agrave;m tiếc v&igrave; đội tuyển mắc qu&aacute; nhiều lỗi\", HLV Shin Tae-yong n&oacute;i ở họp b&aacute;o sau trận đấu tr&ecirc;n s&acirc;n Bung Karno chiều 6/6. \"Những sai s&oacute;t đến từ c&aacute; nh&acirc;n, d&ugrave; tổng thể đội b&oacute;ng chơi hay\".</p>\r\n<p class=\"Normal\">Trước trận, HLV Shin tự tin tuy&ecirc;n bố Indonesia hướng đến chiến thắng trước đầu bảng Iraq. Thực tế, với t&aacute;m cầu thủ mang d&ograve;ng m&aacute;u lai ở đội h&igrave;nh xuất ph&aacute;t, Indonesia kiểm so&aacute;t hiệp một với ba cơ hội c&oacute; thể ăn b&agrave;n, nhưng đều bỏ lỡ. Khi Iraq tung Ali Jasim v&agrave; Youssef Amyn đầu hiệp hai, thế trận đảo chiều. H&agrave;ng thủ Indonesia sụp đổ bởi những sai lầm.</p>\r\n<p class=\"Normal\">Ph&uacute;t 53, Justin Hubner long ng&oacute;ng để b&oacute;ng chạm tay dẫn đến phạt đền gi&uacute;p Aymen Hussein ghi b&agrave;n. S&aacute;u ph&uacute;t sau, đội trưởng Jordi Amat chậm ch&acirc;n phạm lỗi với Youssef Amyn ngay trước cơ hội đối mặt thủ m&ocirc;n, dẫn đến thẻ đỏ trực tiếp. Đến ph&uacute;t 88, thủ m&ocirc;n Ernando Ari xử l&yacute; mạo hiểm trong v&ograve;ng cấm để mất b&oacute;ng tạo điều kiện cho Ali Jasim ghi b&agrave;n v&agrave;o lưới trống, ấn định tỷ số 2-0.</p>\r\n<p class=\"Normal\"><a href=\"https://vnexpress.net/chu-de/shin-tae-yong-5882\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_CacGiaiKhac-4755325&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-HlvShin&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">HLV Shin&nbsp;</a>cho biết kh&ocirc;ng kh&iacute; to&agrave;n đội trong ph&ograve;ng thay đồ kh&ocirc;ng tệ, nhưng thủ m&ocirc;n Ernando ngồi một m&igrave;nh v&agrave; cảm thấy c&oacute; lỗi. \"T&ocirc;i sẽ kh&ocirc;ng n&oacute;i chuyện với cậu ấy trong một, hai ng&agrave;y\", Shin cho hay. \"Nhưng v&agrave;i ng&agrave;y tới cậu ấy sẽ ổn\".</p>\r\n<p class=\"Normal\">Đ&acirc;y l&agrave; trận thua thứ ba li&ecirc;n tiếp của Indonesia trước Iraq, trước đ&oacute; l&agrave; thất bại 0-5 cũng ở v&ograve;ng loại hai World Cup 2026 v&agrave; 1-3 tại v&ograve;ng bảng Asian Cup 2024. Kết quả lần n&agrave;y khiến Indonesia lỡ cơ hội tiến s&aacute;t hơn đến tấm v&eacute; v&agrave;o v&ograve;ng loại ba World Cup 2026.</p>\r\n<p class=\"Normal\">Hiện, họ vẫn đứng nh&igrave; bảng F với bảy điểm, nhưng chỉ c&ograve;n hơn Việt Nam một điểm. Cả hai đội đều đang c&oacute; hiệu số -2. Ở lượt cuối ng&agrave;y 11/6, nếu Indonesia thua Philippines, Việt Nam chỉ cần một điểm trước Iraq l&agrave; đi tiếp. Tại giải n&agrave;y, khi hai đội bằng điểm, hiệu số b&agrave;n thắng bại l&agrave; chỉ số được x&eacute;t đến đầu ti&ecirc;n.</p>', 'HLV Shin Tae-yong không hài lòng khi các cầu thủ Indonesia mắc nhiều sai lầm dẫn đến trận thua Iraq 0-2 ở lượt năm bảng F vòng loại hai World Cup 2026.', 1, 'published', 0, 0, 1, '2024-06-07 05:35:31', '2024-06-07 05:35:31'),
(23, 3, 1, 'PSG chê Mbappe không có phẩm giá', '/assets/uploads/17177385782.jpg', '<p>Theo b&aacute;o Ph&aacute;p&nbsp;<em>Le Parisien</em>, lời chỉ tr&iacute;ch của Mbappe trong họp b&aacute;o tr&ecirc;n tuyển h&ocirc;m 4/6 nhắm v&agrave;o Chủ tịch Nasser Al Khelaifi, d&ugrave; anh kh&ocirc;ng n&oacute;i đ&iacute;ch danh. Sau đ&oacute;, b&aacute;o li&ecirc;n lạc với PSG ngay, để chờ đợi phản hồi. Họ dẫn lời một nguồn tin trong đội, cho biết: \"Mbappe ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; phẩm gi&aacute; khi chỉ tr&iacute;ch l&atilde;nh đạo đội b&oacute;ng. Chủ tịch Khelaifi kh&ocirc;ng bao giờ đưa ra quyết định độc đo&aacute;n l&ecirc;n đội b&oacute;ng\".</p>\r\n<p class=\"Normal\">Nguồn tin &aacute;m chỉ Mbappe kh&ocirc;ng c&oacute; ph&eacute;p lịch sự, bởi tr&ecirc;n l&yacute; thuyết anh vẫn c&ograve;n hợp đồng với PSG. Hợp đồng n&agrave;y chỉ hết hạn cuối th&aacute;ng 6/2024, nhưng anh vẫn được ph&eacute;p k&yacute; với Real Madrid. CLB T&acirc;y Ban Nha đ&atilde; c&ocirc;ng bố Mbappe h&ocirc;m 3/6, v&agrave; ri&ecirc;ng b&agrave;i đăng của họ tr&ecirc;n mạng x&atilde; hội&nbsp;<em>X</em>&nbsp;đ&atilde; thu h&uacute;t hơn 115 triệu lượt xem.</p>\r\n<p class=\"Normal\">V&igrave; thế, cuộc họp b&aacute;o của Mbappe tr&ecirc;n tuyển Ph&aacute;p, trước thềm Euro 2024, lại&nbsp;<a href=\"https://vnexpress.net/mbappe-psg-tung-khong-muon-toi-choi-bong-nua-4754362.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_LaLiga-4754497&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-XoayQuanhVanDeOClb&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">xoay quanh vấn đề ở CLB</a>. \"PSG đ&atilde; n&oacute;i thẳng mặt t&ocirc;i, một c&aacute;ch hung tợn, rằng họ kh&ocirc;ng muốn t&ocirc;i chơi b&oacute;ng nữa\", tiền đạo 26 tuổi n&oacute;i. \"HLV Luis Enrique v&agrave; Gi&aacute;m đốc thể thao Luis Campos đ&atilde; cứu t&ocirc;i, nếu kh&ocirc;ng t&ocirc;i đ&atilde; kh&ocirc;ng thể đặt ch&acirc;n l&ecirc;n s&acirc;n cỏ nữa. Đ&oacute; l&agrave; sự thật, cũng l&agrave; l&yacute; do v&igrave; sao t&ocirc;i biết ơn Campos v&agrave; Enrique\".</p>\r\n<p class=\"Normal\">Nguồn tin&nbsp;<a href=\"https://vnexpress.net/chu-de/paris-saint-germain-99\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_LaLiga-4754497&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Psg&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">PSG</a>&nbsp;phản hồi ph&aacute;t biểu n&agrave;y rằng: \"Ngay cả HLV Enrique cũng từng n&oacute;i sẵn s&agrave;ng cho Mbappe dự bị. Nhưng chỉ cần cậu ấy n&oacute;i g&igrave; đ&oacute;, b&aacute;o ch&iacute; lại in ra như thể đ&oacute; l&agrave; sự thật\".</p>\r\n<p class=\"Normal\">Quan hệ giữa Mbappe v&agrave; Khelaifi xấu đi từ h&egrave; 2023, khi thủ qu&acirc;n tuyển Ph&aacute;p tuy&ecirc;n bố sẽ tự do ra đi sau đ&oacute; một năm. Chủ tịch người Qatar từng n&oacute;i sẽ kh&ocirc;ng bao giờ b&aacute;n Mbappe cho Real Madrid, d&ugrave; người đồng cấp Florentino Perez từng đề nghị gần 200 triệu USD. Tuy nhi&ecirc;n lần n&agrave;y, PSG mất trắng Mbappe, d&ugrave; từng bỏ ra 196 triệu USD để chi&ecirc;u mộ anh từ Monaco.</p>\r\n<p class=\"Normal\">PSG đ&atilde; c&aacute;ch ly&nbsp;<a href=\"https://vnexpress.net/chu-de/kylian-mbappe-287\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_LaLiga-4754497&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Mbappe&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Mbappe</a> khỏi đội một, kh&ocirc;ng cho đi du đấu tiền m&ugrave;a giải. Anh c&oacute; nguy cơ phải nghỉ chơi cả m&ugrave;a giải qua, nhưng cuối c&ugrave;ng đạt được thỏa thuận bỏ 87 triệu USD \"ph&iacute; trung th&agrave;nh\", để được thi đấu. Anh ghi 44 b&agrave;n tr&ecirc;n mọi đấu trường, chiếm 35% số b&agrave;n to&agrave;n đội, gi&uacute;p PSG đoạt cả ba danh hiệu trong nước. Trong video chia tay PSG, Mbappe cảm ơn nhiều nh&acirc;n vật quan trọng trong đội, nhưng kh&ocirc;ng c&oacute; chủ tịch Khelaifi.</p>', 'Nguồn tin từ PSG nhận xét tiền đạo Kylian Mbappe không có chút phẩm giá nào khi trách lãnh đạo đội bóng, một ngày sau khi gia nhập Real Madrid', 1, 'published', 0, 1, 1, '2024-06-07 05:36:18', '2024-06-07 05:36:18'),
(24, 3, 3, 'Ronaldo: \'Đến lượt tôi dõi theo Mbappe\'', '/assets/uploads/17177386573.png', '<p class=\"Normal\">Sau hơn hai tiếng đăng b&agrave;i,&nbsp;<a href=\"https://vnexpress.net/chu-de/kylian-mbappe-287\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_LaLiga-4753938&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Mbappe&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Mbappe</a>&nbsp;nhận được b&igrave;nh luận của Ronaldo. \"Đến lượt t&ocirc;i d&otilde;i theo cậu\", thủ qu&acirc;n Al Nassr viết, k&egrave;m biểu tượng đ&ocirc;i mắt. \"T&ocirc;i phấn kh&iacute;ch khi chuẩn bị được xem cậu thắp s&aacute;ng Bernabeu. Hala Madrid\".</p>\r\n<p class=\"Normal\">Ronaldo đang giữ kỷ lục ghi nhiều b&agrave;n nhất mọi thời ở Real, với 450 b&agrave;n trong 438 trận, v&agrave; anh cũng l&agrave; thần tượng một thời của Mbappe. Sau nhiều năm bộc lộ ham muốn chơi cho Real, Mbappe ra đi theo dạng tự do từ PSG h&egrave; 2024,&nbsp;<a href=\"https://vnexpress.net/vi-sao-mbappe-phai-giam-93-luong-tai-real-madrid-4753659.html\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_LaLiga-4753938&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-ChapNhanGiam93%Luong&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">chấp nhận giảm 93% lương</a>&nbsp;để cập bến Bernabeu. C&ograve;n Ronaldo đ&atilde; rời Real h&egrave; 2018, chơi cho Juventus, Man Utd v&agrave; hiện l&agrave; Al Nassr.</p>\r\n<p class=\"Normal\">Kh&ocirc;ng chỉ&nbsp;<a href=\"https://vnexpress.net/chu-de/cristiano-ronaldo-194\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_LaLiga-4753938&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Ronaldo&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Ronaldo</a>, nhiều nh&acirc;n vật kh&aacute;c tại Real cũng ch&agrave;o đ&oacute;n Mbappe gia nhập đương kim v&ocirc; địch Champions League v&agrave; La Liga. Cựu thủ m&ocirc;n Iker Casillas viết tr&ecirc;n mạng x&atilde; hội&nbsp;<em>X</em>: \"Ch&agrave;o mừng Mbappe tới CLB tốt nhất thế giới. Kh&ocirc;ng bao giờ l&agrave; qu&aacute; muộn, nếu ch&uacute;ng ta thấy hạnh ph&uacute;c. Với cậu, chặng đường chinh phục danh hiệu Champions League thứ 16 đ&atilde; bắt đầu\".</p>\r\n<p class=\"Normal\">Tiền đạo Rodrygo b&igrave;nh luận thả tim, k&egrave;m lời ch&uacute;c: \"Ch&agrave;o mừng Mbappe\". Tiền vệ Jude Bellingham th&igrave; đăng h&igrave;nh chế bốn cầu thủ, gồm Mbappe, Vinicius, Rodrygo v&agrave; ch&iacute;nh anh, k&egrave;m biểu tượng nhăn mặt. C&ograve;n Vinicius lại tri &acirc;n gi&aacute;m đốc tuyển trạch Juni Calafat, khi &ocirc;ng c&oacute; c&ocirc;ng đ&agrave;m ph&aacute;n v&agrave; thuyết phục nhiều cầu thủ gia nhập Real nhiều năm qua.</p>', 'Tiền đạo 39 tuổi Cristiano Ronaldo bình luận rằng anh phấn khích khi sắp được xem Kylian Mbappe', 17, 'published', 0, 1, 1, '2024-06-07 05:37:37', '2024-06-07 21:26:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`) VALUES
(20, 4),
(20, 3),
(20, 2),
(19, 3),
(19, 2),
(15, 3),
(15, 2),
(18, 5),
(18, 4),
(18, 3),
(14, 5),
(14, 4),
(14, 3),
(17, 5),
(17, 4),
(17, 3),
(22, 5),
(22, 4),
(22, 3),
(23, 5),
(23, 4),
(23, 3),
(23, 2),
(21, 5),
(21, 4),
(21, 3),
(16, 5),
(16, 4),
(16, 3),
(24, 5),
(24, 4),
(24, 3),
(24, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Javascript', '2024-06-03 08:33:10', '2024-06-03 08:33:10'),
(3, 'PHP', '2024-06-03 08:33:10', '2024-06-03 08:33:10'),
(4, 'C++', '2024-06-03 08:33:10', '2024-06-03 08:33:10'),
(5, 'Python', '2024-06-03 16:11:45', '2024-06-03 16:11:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Họ và tên',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'Ảnh đại diện',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Email',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Mật khẩu',
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 là Member,\r\n1 là Admin',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian khởi tạo',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời gian cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullName`, `avatar`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(15, 'Huu Hao', '/assets/uploads/171769273855664.jpg', 'fixbugandcry@gmail.com', '$2y$10$iXVbbgCJNo.WQyEGXxyzguT8Y.1z6Fu4aKygGYGf0d4x75Qhp48iW', 0, '2024-06-06 03:50:03', '2024-06-06 03:50:03'),
(16, 'Nguyen Huu Hao', '/assets/uploads/171769272006f76bfb-f21d-4477-8bf5-8278173a204d.jpg', 'haonhph45336@fpt.edu.vn', '$2y$10$9mD5V5lwXjI3u8XtmhZAw.fHYU9cLGvakT4yEg16q9cKlrVeDxs/S', 1, '2024-06-06 03:59:28', '2024-06-06 03:59:28'),
(18, 'Nguyen Huu Hao', '/assets/uploads/1717692710Tom and Jerry.jpg', 'fixbugandcry2@gmail.com', '$2y$10$oqR/l7HL3EayK0t0nAb.lu2UJa8Qr3cNhbeGRtG3CZ/ZQwPJqxWgC', 0, '2024-06-06 04:01:41', '2024-06-06 04:01:41'),
(19, 'huuhao', '/assets/uploads/171769163850f076b8-41a4-4473-8ae4-82afc865abad.jpg', 'nguoidung1@gmail.com', '$2y$10$N7kyBS8LDTJxoFxHaPYeRuc3De99Lcu4sIe4q7meVs1Bbsxtm7/gS', 0, '2024-06-06 16:33:58', '2024-06-06 16:33:58'),
(20, 'Admin', '/assets/uploads/1717739237577e2993-5c63-41ba-b49a-79631a18a480.jpg', 'admin@gmail.com', '$2y$10$m7sn2lXJqUBmVPfuJEBskerGxSMTh8oJUtEzaEsnA6.Hu3qeuS/7C', 1, '2024-06-06 17:49:57', '2024-06-06 17:49:57');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `posts_ibfk_2` (`author_id`);

--
-- Chỉ mục cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
