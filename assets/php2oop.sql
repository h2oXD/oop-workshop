-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 06, 2024 lúc 05:59 AM
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
(1, 'Trông Anh Ngược', NULL),
(2, 'Giả Hành Tôn', NULL);

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
(2, 'Đời sống', '2024-06-03 08:29:07', '2024-06-03 08:29:07'),
(3, 'Thể thao', '2024-06-03 08:29:25', '2024-06-03 08:29:25'),
(4, 'Du lịch', '2024-06-03 08:29:25', '2024-06-03 08:29:25'),
(5, 'Giải trí', '2024-06-03 08:29:32', '2024-06-03 08:29:32'),
(6, 'Giáo dục', '2024-06-03 08:32:00', '2024-06-03 08:32:00'),
(7, 'Chính trị', '2024-06-03 15:41:30', '2024-06-03 15:41:30');

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
(1, 3, 2, 'Vinicius hay nhất Champions League 2023-2024', '/assets/uploads/171743949835212.jpg', '<p class=\"Normal\">Theo th&ocirc;ng số&nbsp;<em>Whoscored</em>, Vinicius được chấm điểm cao nhất Champions League m&ugrave;a n&agrave;y, trung b&igrave;nh 7,82 điểm mỗi trận, tr&ecirc;n Antoine Griezmann 7,73, Phil Foden 7,70 v&agrave; Jude Bellingham 7,63 điểm. X&eacute;t số b&agrave;n thắng, Vinicius cũng chỉ đứng sau Vua ph&aacute; lưới Harry Kane v&agrave; Kylian Mbappe - hai cầu thủ c&ugrave;ng ghi t&aacute;m b&agrave;n. C&ograve;n nếu t&iacute;nh cả b&agrave;n thắng lẫn kiến tạo, Vinicius cũng chỉ k&eacute;m Kane.</p>\r\n<p class=\"Normal\"><a href=\"https://vnexpress.net/chu-de/vinicius-junior-3330\" rel=\"dofollow\" data-itm-source=\"#vn_source=Detail-TheThao_BongDa_ChampionsLeague-4753898&amp;vn_campaign=Box-InternalLink&amp;vn_medium=Link-Vinicius&amp;vn_term=Desktop&amp;vn_thumb=0\" data-itm-added=\"1\">Vinicius</a> đ&atilde; chơi s&aacute;u m&ugrave;a giải c&ugrave;ng Real, ghi 83 b&agrave;n trong 264 trận, đoạt 12 danh hiệu, trong đ&oacute; c&oacute; hai Champions League. Anh thường chơi tiền đạo tr&aacute;i, nhưng được ph&eacute;p đ&aacute; tự do, di chuyển linh hoạt. Hầu hết đường l&ecirc;n b&oacute;ng của Real đều qua ch&acirc;n ng&ocirc;i sao n&agrave;y, v&agrave; ch&iacute;nh HLV Carlo Ancelotti v&agrave; Bellingham cũng ủng hộ Vinicius đoạt Quả B&oacute;ng V&agrave;ng 2024.</p>', 'UEFA chọn tiền đạo Vinicius Junior làm cầu thủ hay nhất mùa giải Champions League vừa qua, khi anh góp công lớn giúp Real Madrid đăng quang.', 0, 'published', 0, 0, 1, '2024-06-03 18:31:38', '2024-06-03 18:31:38'),
(14, 7, 2, '123456', '/assets/uploads/17175986591234123.jpg', '<p>1234567123</p>', '12345678', 0, 'draft', 1, 1, 1, '2024-06-05 14:44:19', '2024-06-05 14:44:19'),
(15, 7, 1, '123456', '/assets/uploads/1717599038tải xuống.jpg', '<p>1231231</p>', '12345678', 0, 'draft', 0, 1, 1, '2024-06-05 14:50:38', '2024-06-05 14:50:38');

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
(14, 5),
(14, 4),
(14, 3),
(14, 2),
(15, 3),
(15, 2);

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
(15, 'Huu Hao', NULL, 'fixbugandcry@gmail.com', '$2y$10$iXVbbgCJNo.WQyEGXxyzguT8Y.1z6Fu4aKygGYGf0d4x75Qhp48iW', 1, '2024-06-06 03:50:03', '2024-06-06 03:50:03'),
(16, 'Nguyen Huu Hao', NULL, 'haonhph45336@fpt.edu.vn', '$2y$10$9mD5V5lwXjI3u8XtmhZAw.fHYU9cLGvakT4yEg16q9cKlrVeDxs/S', 0, '2024-06-06 03:59:28', '2024-06-06 03:59:28'),
(18, 'Nguyen Huu Hao', NULL, 'fixbugandcry2@gmail.com', '$2y$10$oqR/l7HL3EayK0t0nAb.lu2UJa8Qr3cNhbeGRtG3CZ/ZQwPJqxWgC', 0, '2024-06-06 04:01:41', '2024-06-06 04:01:41');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
