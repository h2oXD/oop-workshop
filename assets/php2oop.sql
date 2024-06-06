-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th6 06, 2024 lúc 06:04 PM
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
(14, 7, 2, '123456', '/assets/uploads/1717689376tải xuống.jpg', '<p>1234567123</p>', '12345678', 0, 'published', 1, 1, 1, '2024-06-05 14:44:19', '2024-06-05 14:44:19'),
(15, 7, 1, '123456', '/assets/uploads/171768933535212.jpg', '<p>1231231</p>', '12345678', 0, 'draft', 0, 1, 1, '2024-06-05 14:50:38', '2024-06-05 14:50:38'),
(16, 4, 1, 'Lorem Ipsum is simply dummy text of the printing', '/assets/uploads/17176960249340403bbea3bd310d03df2e22ad8f49.webp', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 0, 'published', 0, 1, 1, '2024-06-06 17:47:04', '2024-06-06 17:47:04');

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
(15, 3),
(15, 2),
(14, 4),
(14, 3),
(16, 5),
(16, 4),
(16, 3);

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
(20, 'Admin', '/assets/uploads/1717696197664123.jpg', 'admin@gmail.com', '$2y$10$m7sn2lXJqUBmVPfuJEBskerGxSMTh8oJUtEzaEsnA6.Hu3qeuS/7C', 1, '2024-06-06 17:49:57', '2024-06-06 17:49:57');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
