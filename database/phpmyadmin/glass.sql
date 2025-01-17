-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2025 lúc 06:13 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `glass`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
                          `id` bigint(20) UNSIGNED NOT NULL,
                          `name` varchar(255) NOT NULL,
                          `content` text DEFAULT NULL,
                          `logo` varchar(255) DEFAULT NULL,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `content`, `logo`, `created_at`, `updated_at`) VALUES
                                                                                       (1, 'Gucci', NULL, 'uploads//01JHF21T9PC7RBKFWTAE0G2HDV.webp', '2025-01-05 07:07:40', '2025-01-13 05:26:42'),
                                                                                       (2, 'Ray-Ban', NULL, 'uploads//01JHF2DKCRAH4KAGK6A3YP61K7.jpg', '2025-01-05 07:07:40', '2025-01-13 05:33:08'),
                                                                                       (3, 'Oakley', NULL, NULL, '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                                       (4, 'BOLON', NULL, NULL, '2025-01-13 22:58:45', '2025-01-13 22:58:45'),
                                                                                       (5, 'MOLSION', NULL, NULL, '2025-01-14 03:05:32', '2025-01-14 03:05:32'),
                                                                                       (6, 'POVINO', NULL, NULL, '2025-01-14 07:28:41', '2025-01-14 07:28:41'),
                                                                                       (7, 'ANCCI', NULL, NULL, '2025-01-14 08:20:29', '2025-01-14 08:20:29'),
                                                                                       (9, 'REXO', NULL, NULL, '2025-01-15 13:17:09', '2025-01-15 13:17:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `customer_id` bigint(20) UNSIGNED NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
                              `id` bigint(20) UNSIGNED NOT NULL,
                              `quantity` int(11) NOT NULL,
                              `cart_id` bigint(20) UNSIGNED NOT NULL,
                              `version_id` bigint(20) UNSIGNED NOT NULL,
                              `created_at` timestamp NULL DEFAULT NULL,
                              `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cats`
--

CREATE TABLE `cats` (
                        `id` bigint(20) UNSIGNED NOT NULL,
                        `name` varchar(255) NOT NULL,
                        `promotion_id` bigint(20) UNSIGNED DEFAULT NULL,
                        `created_at` timestamp NULL DEFAULT NULL,
                        `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cats`
--

INSERT INTO `cats` (`id`, `name`, `promotion_id`, `created_at`, `updated_at`) VALUES
                                                                                  (1, 'Sản phẩm mới', 2, '2025-01-09 23:38:59', '2025-01-13 09:20:02'),
                                                                                  (2, 'Sản phẩm mừng tết 2025', 1, '2025-01-09 23:39:36', '2025-01-09 23:39:36'),
                                                                                  (3, 'Test', NULL, '2025-01-11 15:19:11', '2025-01-11 15:19:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat_posts`
--

CREATE TABLE `cat_posts` (
                             `id` bigint(20) UNSIGNED NOT NULL,
                             `title` varchar(255) NOT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cat_posts`
--

INSERT INTO `cat_posts` (`id`, `title`, `created_at`, `updated_at`) VALUES
                                                                        (1, 'Thể thao', '2025-01-05 07:07:39', '2025-01-05 07:07:39'),
                                                                        (2, 'Du lịch', '2025-01-05 07:07:39', '2025-01-05 07:07:39'),
                                                                        (3, 'Thời trang', '2025-01-05 07:07:39', '2025-01-05 07:07:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat_products`
--

CREATE TABLE `cat_products` (
                                `id` bigint(20) UNSIGNED NOT NULL,
                                `cat_id` bigint(20) UNSIGNED NOT NULL,
                                `product_id` bigint(20) UNSIGNED NOT NULL,
                                `created_at` timestamp NULL DEFAULT NULL,
                                `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cat_products`
--

INSERT INTO `cat_products` (`id`, `cat_id`, `product_id`, `created_at`, `updated_at`) VALUES
                                                                                          (1, 1, 1, NULL, NULL),
                                                                                          (2, 2, 1, NULL, NULL),
                                                                                          (6, 3, 2, NULL, NULL),
                                                                                          (7, 3, 3, NULL, NULL),
                                                                                          (8, 3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
                             `id` bigint(20) UNSIGNED NOT NULL,
                             `name` varchar(255) NOT NULL,
                             `email` varchar(255) NOT NULL,
                             `phone` varchar(255) NOT NULL,
                             `address` varchar(255) NOT NULL,
                             `password` varchar(255) NOT NULL,
                             `google_id` varchar(255) DEFAULT NULL,
                             `facebook_id` varchar(255) DEFAULT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `password`, `google_id`, `facebook_id`, `created_at`, `updated_at`) VALUES
    (1, 'Trần Trường Vy', 'trantuongvy10@gmail.com', '0948066514', 'Cần Thơ', '12345678', '2', '1', '2025-01-11 15:34:13', '2025-01-11 15:36:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exports`
--

CREATE TABLE `exports` (
                           `id` bigint(20) UNSIGNED NOT NULL,
                           `completed_at` timestamp NULL DEFAULT NULL,
                           `file_disk` varchar(255) NOT NULL,
                           `file_name` varchar(255) DEFAULT NULL,
                           `exporter` varchar(255) NOT NULL,
                           `processed_rows` int(10) UNSIGNED NOT NULL DEFAULT 0,
                           `total_rows` int(10) UNSIGNED NOT NULL,
                           `successful_rows` int(10) UNSIGNED NOT NULL DEFAULT 0,
                           `user_id` bigint(20) UNSIGNED NOT NULL,
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_import_rows`
--

CREATE TABLE `failed_import_rows` (
                                      `id` bigint(20) UNSIGNED NOT NULL,
                                      `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
                                      `import_id` bigint(20) UNSIGNED NOT NULL,
                                      `validation_error` text DEFAULT NULL,
                                      `created_at` timestamp NULL DEFAULT NULL,
                                      `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `uuid` varchar(255) NOT NULL,
                               `connection` text NOT NULL,
                               `queue` text NOT NULL,
                               `payload` longtext NOT NULL,
                               `exception` longtext NOT NULL,
                               `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
                          `id` bigint(20) UNSIGNED NOT NULL,
                          `link` text NOT NULL,
                          `version_id` bigint(20) UNSIGNED NOT NULL,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `link`, `version_id`, `created_at`, `updated_at`) VALUES
                                                                                  (11, 'uploads//01JHGY4WAHK3K4Y6KGGGBA8MTN.webp', 4, '2025-01-13 22:56:57', '2025-01-13 22:56:57'),
                                                                                  (12, 'uploads//01JHGY4WAMFB4408WZ088H495G.webp', 4, '2025-01-13 22:56:57', '2025-01-13 22:56:57'),
                                                                                  (13, 'uploads//01JHGYCFQQS67HXAGVAAYXYFRW.png', 5, '2025-01-13 23:01:06', '2025-01-13 23:01:06'),
                                                                                  (14, 'uploads//01JHGYCFQTKSJMKP1HSK1XCTGW.png', 5, '2025-01-13 23:01:06', '2025-01-13 23:01:06'),
                                                                                  (15, 'uploads//01JHGYCFQV60VPQ2RBKV64D5TC.png', 5, '2025-01-13 23:01:06', '2025-01-13 23:01:06'),
                                                                                  (16, 'uploads//01JHH031HMVHSPZXHYRHD891N1.png', 6, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (17, 'uploads//01JHH031HR58SFVM9J1SC32N0R.png', 6, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (18, 'uploads//01JHH031HT7S2ZS85BKQS926J7.png', 6, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (19, 'uploads//01JHH031HZP6WC9PP5SCN65GR8.png', 7, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (20, 'uploads//01JHH031J1M1FBAZJJFTN9P5V0.png', 7, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (21, 'uploads//01JHH031J3D6B3VCE440QSH4VQ.png', 7, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (22, 'uploads//01JHH031J6NPSQAEQAD77DK8CV.png', 8, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (23, 'uploads//01JHH031J80SPPBQ9PY708REDM.png', 8, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (24, 'uploads//01JHH031JA0D8R585CD6F6BQ40.png', 8, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                  (25, 'uploads//01JHHCMQWK8G3JVX62F4BSW1EP.jpg', 9, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (26, 'uploads//01JHHCMQWR1F6JQ4RHGBDMACDP.jpg', 9, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (27, 'uploads//01JHHCMQWTRCGRK7ZTQA7J3Q7J.jpg', 9, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (28, 'uploads//01JHHCMQWYA18Y0Z1NCRNVTT1Y.jpg', 10, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (29, 'uploads//01JHHCMQX1ECYSFF1CTQDEGZK3.jpg', 10, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (30, 'uploads//01JHHCMQX3DAHTJVXZ80HB9ENE.jpg', 10, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (31, 'uploads//01JHHCMQX7M2Q9M7N4AP2BRJY9.jpg', 11, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (32, 'uploads//01JHHCMQX9JTHS3XCN46RBVJ78.jpg', 11, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (33, 'uploads//01JHHCMQXB67F7P7XKCT8TCEQ9.jpg', 11, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                  (34, 'uploads//01JHHKNY24DMRWJCTNDF1JKND7.jpg', 12, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (35, 'uploads//01JHHKNY29WJW1XCE4JRYG9H5E.jpg', 12, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (36, 'uploads//01JHHKNY2DMBV9NV85V49SB82B.jpg', 12, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (37, 'uploads//01JHHKNY2JKF97M4HP4XXX6J7J.png', 13, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (38, 'uploads//01JHHKNY2NHCS78MBAW0H0E8XR.png', 13, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (39, 'uploads//01JHHKNY2R81SXXJTAG3XX49H9.png', 13, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (40, 'uploads//01JHHKNY303F8HWEVE4KSXZMMM.jpg', 14, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (41, 'uploads//01JHHKNY34E0QBND8S5F0FCMRZ.jpg', 14, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (42, 'uploads//01JHHKNY375RABZFFWQJZ5SH6X.jpg', 14, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                  (43, 'uploads//01JHHVPMY6D13H91NNFDQ77QKF.jpg', 15, '2025-01-14 07:33:28', '2025-01-14 07:33:28'),
                                                                                  (44, 'uploads//01JHHVPMYDS9BE382D2QACAEN0.jpg', 16, '2025-01-14 07:33:28', '2025-01-14 07:33:28'),
                                                                                  (45, 'uploads//01JHHVPMYJVRJ40QE3RTQ8PP8G.jpg', 17, '2025-01-14 07:33:28', '2025-01-14 07:33:28'),
                                                                                  (46, 'uploads//01JHHXMZYNGQ8EZC38RV953W40.jpg', 18, '2025-01-14 08:07:31', '2025-01-14 08:07:31'),
                                                                                  (47, 'uploads//01JHHXMZYZH8VWYG6S9DTD4FAD.jpg', 19, '2025-01-14 08:07:31', '2025-01-14 08:07:31'),
                                                                                  (48, 'uploads//01JHHXMZZ4K1MNATC9GFEDJSYC.jpg', 20, '2025-01-14 08:07:31', '2025-01-14 08:07:31'),
                                                                                  (49, 'uploads//01JHHXSPDQJX71H4D5BJ6QE6AW.jpg', 21, '2025-01-14 08:10:05', '2025-01-14 08:10:05'),
                                                                                  (50, 'uploads//01JHHXSPE0DY8N9RWNDNS5AJ4V.jpg', 22, '2025-01-14 08:10:05', '2025-01-14 08:10:05'),
                                                                                  (51, 'uploads//01JHHY1VVNWGRD4R1SFBW9GA82.jpg', 23, '2025-01-14 08:14:33', '2025-01-14 08:14:33'),
                                                                                  (52, 'uploads//01JHHY1VVVESY58NN6VSZBBHK4.jpg', 24, '2025-01-14 08:14:33', '2025-01-14 08:14:33'),
                                                                                  (53, 'uploads//01JHHY5VMBMW4G95ZZBQ3YNHY0.jpg', 25, '2025-01-14 08:16:44', '2025-01-14 08:16:44'),
                                                                                  (54, 'uploads//01JHHY5VMF1JN7FW9PCD2AN41J.jpg', 26, '2025-01-14 08:16:44', '2025-01-14 08:16:44'),
                                                                                  (55, 'uploads//01JHHYAE8DPHY51W89EN9X997C.png', 27, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                  (56, 'uploads//01JHHYAE8HJQ008VDFK1EN5ERN.png', 27, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                  (57, 'uploads//01JHHYAE8MFKE22E2P9542G2JT.png', 27, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                  (58, 'uploads//01JHHYAE8RRK720XZCGC8T4EKH.png', 28, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                  (59, 'uploads//01JHHYAE8VNHBD5HBY4H3YBBAY.png', 28, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                  (60, 'uploads//01JHHYAE8YFAE85NDRME0GTSZ9.png', 28, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                  (61, 'uploads//01JHHYEKSVMGJFJERRZFCPE33X.png', 29, '2025-01-14 08:21:31', '2025-01-14 08:21:31'),
                                                                                  (62, 'uploads//01JHHYEKT0S7DTC8TPSX7AN812.png', 29, '2025-01-14 08:21:31', '2025-01-14 08:21:31'),
                                                                                  (63, 'uploads//01JHHYEKT2BCQRCHQFZKJDWQEN.png', 29, '2025-01-14 08:21:31', '2025-01-14 08:21:31'),
                                                                                  (64, 'uploads//01JHHYJ2S1FG6DD4NVPPKR89YH.png', 30, '2025-01-14 08:23:24', '2025-01-14 08:23:24'),
                                                                                  (65, 'uploads//01JHHYJ2S4MTMHYRAP1VENYZZJ.jpg', 30, '2025-01-14 08:23:24', '2025-01-14 08:23:24'),
                                                                                  (66, 'uploads//01JHHYPHFF4BQK3CWZWFXZH52C.png', 31, '2025-01-14 08:25:50', '2025-01-14 08:25:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `imports`
--

CREATE TABLE `imports` (
                           `id` bigint(20) UNSIGNED NOT NULL,
                           `completed_at` timestamp NULL DEFAULT NULL,
                           `file_name` varchar(255) NOT NULL,
                           `file_path` varchar(255) NOT NULL,
                           `importer` varchar(255) NOT NULL,
                           `processed_rows` int(10) UNSIGNED NOT NULL DEFAULT 0,
                           `total_rows` int(10) UNSIGNED NOT NULL,
                           `successful_rows` int(10) UNSIGNED NOT NULL DEFAULT 0,
                           `user_id` bigint(20) UNSIGNED NOT NULL,
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
                               `id` varchar(255) NOT NULL,
                               `name` varchar(255) NOT NULL,
                               `total_jobs` int(11) NOT NULL,
                               `pending_jobs` int(11) NOT NULL,
                               `failed_jobs` int(11) NOT NULL,
                               `failed_job_ids` longtext NOT NULL,
                               `options` mediumtext DEFAULT NULL,
                               `cancelled_at` int(11) DEFAULT NULL,
                               `created_at` int(11) NOT NULL,
                               `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materials`
--

CREATE TABLE `materials` (
                             `id` bigint(20) UNSIGNED NOT NULL,
                             `name` varchar(255) NOT NULL,
                             `created_at` timestamp NULL DEFAULT NULL,
                             `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `materials`
--

INSERT INTO `materials` (`id`, `name`, `created_at`, `updated_at`) VALUES
                                                                       (1, 'Nhựa', '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                       (2, 'Kim loại', '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                       (3, 'Titan', '2025-01-14 03:06:56', '2025-01-14 03:06:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
                              `id` int(10) UNSIGNED NOT NULL,
                              `migration` varchar(255) NOT NULL,
                              `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
                                                          (1, '2014_10_12_000000_create_users_table', 1),
                                                          (2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
                                                          (3, '2019_08_19_000000_create_failed_jobs_table', 1),
                                                          (4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
                                                          (5, '2024_06_04_220809_create_pages_table', 1),
                                                          (6, '2024_06_04_221903_create_cat_posts_table', 1),
                                                          (7, '2024_06_04_222210_create_posts_table', 1),
                                                          (8, '2024_06_07_200035_create_brands_table', 1),
                                                          (9, '2024_06_07_200626_create_origins_table', 1),
                                                          (10, '2024_06_07_200743_create_materials_table', 1),
                                                          (11, '2024_06_07_201057_create_styles_table', 1),
                                                          (12, '2024_06_07_201322_create_shapes_table', 1),
                                                          (13, '2024_06_07_202308_create_promotions_table', 1),
                                                          (14, '2024_06_07_203100_create_products_table', 1),
                                                          (15, '2024_06_07_213027_create_cats_table', 1),
                                                          (16, '2024_06_07_215540_create_cat_products_table', 1),
                                                          (17, '2024_06_07_215850_create_versions_table', 1),
                                                          (18, '2024_06_07_220819_create_images_table', 1),
                                                          (19, '2024_06_07_220952_create_customers_table', 1),
                                                          (20, '2024_06_07_221609_create_carts_table', 1),
                                                          (21, '2024_06_07_222309_create_cart_items_table', 1),
                                                          (22, '2024_06_07_222755_create_review_pros_table', 1),
                                                          (23, '2024_06_07_223330_create_orders_table', 1),
                                                          (24, '2024_06_07_223615_create_order_items_table', 1),
                                                          (25, '2024_12_27_081030_create_job_batches_table', 1),
                                                          (26, '2024_12_27_081030_create_notifications_table', 1),
                                                          (27, '2024_12_27_081307_create_imports_table', 1),
                                                          (28, '2024_12_27_081308_create_exports_table', 1),
                                                          (29, '2024_12_27_081309_create_failed_import_rows_table', 1),
                                                          (30, '2024_12_29_063025_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
                                         `permission_id` bigint(20) UNSIGNED NOT NULL,
                                         `model_type` varchar(255) NOT NULL,
                                         `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
                                   `role_id` bigint(20) UNSIGNED NOT NULL,
                                   `model_type` varchar(255) NOT NULL,
                                   `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
                                                                        (1, 'App\\Models\\User', 1),
                                                                        (1, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
                                 `id` char(36) NOT NULL,
                                 `type` varchar(255) NOT NULL,
                                 `notifiable_type` varchar(255) NOT NULL,
                                 `notifiable_id` bigint(20) UNSIGNED NOT NULL,
                                 `data` text NOT NULL,
                                 `read_at` timestamp NULL DEFAULT NULL,
                                 `created_at` timestamp NULL DEFAULT NULL,
                                 `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
                          `id` bigint(20) UNSIGNED NOT NULL,
                          `customer_id` bigint(20) UNSIGNED NOT NULL,
                          `status` enum('pending','done','cancel') NOT NULL DEFAULT 'pending',
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `order_id` bigint(20) UNSIGNED NOT NULL,
                               `version_id` bigint(20) UNSIGNED NOT NULL,
                               `quantity` int(11) NOT NULL,
                               `price` bigint(20) UNSIGNED NOT NULL,
                               `image` varchar(255) DEFAULT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `origins`
--

CREATE TABLE `origins` (
                           `id` bigint(20) UNSIGNED NOT NULL,
                           `name` varchar(255) NOT NULL,
                           `created_at` timestamp NULL DEFAULT NULL,
                           `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `origins`
--

INSERT INTO `origins` (`id`, `name`, `created_at`, `updated_at`) VALUES
                                                                     (1, 'Ý', '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                     (2, 'Mỹ', '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                     (3, 'Nhật Bản', '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                     (4, 'Trung Quốc', '2025-01-05 07:07:40', '2025-01-05 07:07:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `title` varchar(255) NOT NULL,
                         `content` text NOT NULL,
                         `thumbnail` varchar(255) DEFAULT NULL,
                         `user_id` bigint(20) UNSIGNED NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `title`, `content`, `thumbnail`, `user_id`, `created_at`, `updated_at`) VALUES
                                                                                                       (1, 'Chính sách', 'Nội dung chính sách', 'https://picsum.photos/200/300', 2, '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                                                       (2, 'Liên hệ', 'Nội dung liên hệ', 'https://picsum.photos/200/300', 2, '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                                                       (3, 'Giới thiệu', 'Nội dung giới thiệu', 'https://picsum.photos/200/300', 1, '2025-01-05 07:07:40', '2025-01-05 07:07:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
                                         `email` varchar(255) NOT NULL,
                                         `token` varchar(255) NOT NULL,
                                         `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `name` varchar(255) NOT NULL,
                               `guard_name` varchar(255) NOT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
                                                                                       (1, 'view_page', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (2, 'view_any_page', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (3, 'create_page', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (4, 'update_page', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (5, 'reorder_page', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (6, 'delete_page', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (7, 'delete_any_page', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (8, 'view_post', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (9, 'view_any_post', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (10, 'create_post', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (11, 'update_post', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (12, 'reorder_post', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (13, 'delete_post', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (14, 'delete_any_post', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (15, 'view_product', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (16, 'view_any_product', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (17, 'create_product', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (18, 'update_product', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (19, 'reorder_product', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (20, 'delete_product', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (21, 'delete_any_product', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (22, 'view_role', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (23, 'view_any_role', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (24, 'create_role', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (25, 'update_role', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (26, 'reorder_role', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (27, 'delete_role', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (28, 'delete_any_role', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (29, 'view_user', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (30, 'view_any_user', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (31, 'create_user', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (32, 'update_user', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (33, 'reorder_user', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (34, 'delete_user', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38'),
                                                                                       (35, 'delete_any_user', 'web', '2025-01-05 07:23:38', '2025-01-05 07:23:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
                                          `id` bigint(20) UNSIGNED NOT NULL,
                                          `tokenable_type` varchar(255) NOT NULL,
                                          `tokenable_id` bigint(20) UNSIGNED NOT NULL,
                                          `name` varchar(255) NOT NULL,
                                          `token` varchar(64) NOT NULL,
                                          `abilities` text DEFAULT NULL,
                                          `last_used_at` timestamp NULL DEFAULT NULL,
                                          `expires_at` timestamp NULL DEFAULT NULL,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `title` varchar(255) NOT NULL,
                         `content` text NOT NULL,
                         `thumbnail` varchar(255) DEFAULT NULL,
                         `status` enum('show','hide') NOT NULL DEFAULT 'show',
                         `user_id` bigint(20) UNSIGNED NOT NULL,
                         `catpost_id` bigint(20) UNSIGNED NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `thumbnail`, `status`, `user_id`, `catpost_id`, `created_at`, `updated_at`) VALUES
                                                                                                                               (1, 'Bài viết số 0', 'Nội dung bài viết số 0', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:39', '2024-11-25 10:29:25'),
                                                                                                                               (2, 'Bài viết số 1', 'Nội dung bài viết số 1', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:39', '2024-12-09 23:30:25'),
                                                                                                                               (3, 'Bài viết số 2', 'Nội dung bài viết số 2', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:39', '2024-11-22 06:10:05'),
                                                                                                                               (4, 'Bài viết số 3', 'Nội dung bài viết số 3', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:39', '2024-12-02 20:31:07'),
                                                                                                                               (5, 'Bài viết số 4', 'Nội dung bài viết số 4', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:39', '2024-11-08 15:55:20'),
                                                                                                                               (6, 'Bài viết số 5', 'Nội dung bài viết số 5', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:39', '2024-11-02 10:54:20'),
                                                                                                                               (7, 'Bài viết số 6', 'Nội dung bài viết số 6', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:39', '2024-11-13 12:31:47'),
                                                                                                                               (8, 'Bài viết số 7', 'Nội dung bài viết số 7', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:39', '2024-12-05 18:59:39'),
                                                                                                                               (9, 'Bài viết số 8', 'Nội dung bài viết số 8', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:39', '2024-12-01 21:15:02'),
                                                                                                                               (10, 'Bài viết số 9', 'Nội dung bài viết số 9', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:39', '2024-11-05 04:29:15'),
                                                                                                                               (11, 'Bài viết số 10', 'Nội dung bài viết số 10', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:39', '2024-12-28 04:21:06'),
                                                                                                                               (12, 'Bài viết số 11', 'Nội dung bài viết số 11', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:39', '2024-11-28 08:16:30'),
                                                                                                                               (13, 'Bài viết số 12', 'Nội dung bài viết số 12', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:39', '2024-12-27 05:30:32'),
                                                                                                                               (14, 'Bài viết số 13', 'Nội dung bài viết số 13', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:39', '2024-11-18 10:52:06'),
                                                                                                                               (15, 'Bài viết số 14', 'Nội dung bài viết số 14', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:39', '2024-11-17 06:38:56'),
                                                                                                                               (16, 'Bài viết số 15', 'Nội dung bài viết số 15', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:39', '2024-11-18 17:08:58'),
                                                                                                                               (17, 'Bài viết số 16', 'Nội dung bài viết số 16', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:39', '2024-11-04 13:44:11'),
                                                                                                                               (18, 'Bài viết số 17', 'Nội dung bài viết số 17', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:39', '2024-11-11 02:28:16'),
                                                                                                                               (19, 'Bài viết số 18', 'Nội dung bài viết số 18', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:39', '2024-11-07 04:26:23'),
                                                                                                                               (20, 'Bài viết số 19', 'Nội dung bài viết số 19', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:39', '2024-11-09 12:15:45'),
                                                                                                                               (21, 'Bài viết số 20', 'Nội dung bài viết số 20', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:39', '2024-12-10 04:01:15'),
                                                                                                                               (22, 'Bài viết số 21', 'Nội dung bài viết số 21', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-25 20:26:58'),
                                                                                                                               (23, 'Bài viết số 22', 'Nội dung bài viết số 22', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-11-22 06:21:53'),
                                                                                                                               (24, 'Bài viết số 23', 'Nội dung bài viết số 23', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-22 09:53:30'),
                                                                                                                               (25, 'Bài viết số 24', 'Nội dung bài viết số 24', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:40', '2024-12-23 16:05:43'),
                                                                                                                               (26, 'Bài viết số 25', 'Nội dung bài viết số 25', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:40', '2024-12-13 01:09:28'),
                                                                                                                               (27, 'Bài viết số 26', 'Nội dung bài viết số 26', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-13 17:21:41'),
                                                                                                                               (28, 'Bài viết số 27', 'Nội dung bài viết số 27', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-11-09 14:01:18'),
                                                                                                                               (29, 'Bài viết số 28', 'Nội dung bài viết số 28', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-11 16:26:33'),
                                                                                                                               (30, 'Bài viết số 29', 'Nội dung bài viết số 29', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-27 21:38:52'),
                                                                                                                               (31, 'Bài viết số 30', 'Nội dung bài viết số 30', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-11-25 15:44:39'),
                                                                                                                               (32, 'Bài viết số 31', 'Nội dung bài viết số 31', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-02 00:54:24'),
                                                                                                                               (33, 'Bài viết số 32', 'Nội dung bài viết số 32', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-17 22:29:21'),
                                                                                                                               (34, 'Bài viết số 33', 'Nội dung bài viết số 33', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-11-23 12:16:25'),
                                                                                                                               (35, 'Bài viết số 34', 'Nội dung bài viết số 34', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-11-26 22:18:00'),
                                                                                                                               (36, 'Bài viết số 35', 'Nội dung bài viết số 35', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-11-13 22:31:23'),
                                                                                                                               (37, 'Bài viết số 36', 'Nội dung bài viết số 36', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-12-17 07:14:03'),
                                                                                                                               (38, 'Bài viết số 37', 'Nội dung bài viết số 37', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-11-21 18:59:31'),
                                                                                                                               (39, 'Bài viết số 38', 'Nội dung bài viết số 38', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-12-10 18:23:26'),
                                                                                                                               (40, 'Bài viết số 39', 'Nội dung bài viết số 39', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-12-15 22:36:16'),
                                                                                                                               (41, 'Bài viết số 40', 'Nội dung bài viết số 40', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-29 21:01:00'),
                                                                                                                               (42, 'Bài viết số 41', 'Nội dung bài viết số 41', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-27 06:13:08'),
                                                                                                                               (43, 'Bài viết số 42', 'Nội dung bài viết số 42', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-12-16 05:53:37'),
                                                                                                                               (44, 'Bài viết số 43', 'Nội dung bài viết số 43', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:40', '2024-11-23 01:38:36'),
                                                                                                                               (45, 'Bài viết số 44', 'Nội dung bài viết số 44', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-03 08:41:38'),
                                                                                                                               (46, 'Bài viết số 45', 'Nội dung bài viết số 45', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-12-08 01:42:06'),
                                                                                                                               (47, 'Bài viết số 46', 'Nội dung bài viết số 46', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-12-03 08:45:36'),
                                                                                                                               (48, 'Bài viết số 47', 'Nội dung bài viết số 47', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-11-10 00:38:11'),
                                                                                                                               (49, 'Bài viết số 48', 'Nội dung bài viết số 48', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-11-16 06:41:27'),
                                                                                                                               (50, 'Bài viết số 49', 'Nội dung bài viết số 49', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-11-04 10:56:26'),
                                                                                                                               (51, 'Bài viết số 50', 'Nội dung bài viết số 50', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-23 23:11:30'),
                                                                                                                               (52, 'Bài viết số 51', 'Nội dung bài viết số 51', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-12-05 15:03:25'),
                                                                                                                               (53, 'Bài viết số 52', 'Nội dung bài viết số 52', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-12-21 10:29:49'),
                                                                                                                               (54, 'Bài viết số 53', 'Nội dung bài viết số 53', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-11-02 05:58:44'),
                                                                                                                               (55, 'Bài viết số 54', 'Nội dung bài viết số 54', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-11-04 14:02:24'),
                                                                                                                               (56, 'Bài viết số 55', 'Nội dung bài viết số 55', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-11-10 05:31:05'),
                                                                                                                               (57, 'Bài viết số 56', 'Nội dung bài viết số 56', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:40', '2024-12-23 13:32:24'),
                                                                                                                               (58, 'Bài viết số 57', 'Nội dung bài viết số 57', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-13 09:48:46'),
                                                                                                                               (59, 'Bài viết số 58', 'Nội dung bài viết số 58', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-11-03 10:08:01'),
                                                                                                                               (60, 'Bài viết số 59', 'Nội dung bài viết số 59', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-12-04 07:16:45'),
                                                                                                                               (61, 'Bài viết số 60', 'Nội dung bài viết số 60', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-12-05 07:44:46'),
                                                                                                                               (62, 'Bài viết số 61', 'Nội dung bài viết số 61', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-11-25 05:40:35'),
                                                                                                                               (63, 'Bài viết số 62', 'Nội dung bài viết số 62', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-11-20 01:47:44'),
                                                                                                                               (64, 'Bài viết số 63', 'Nội dung bài viết số 63', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-11-29 19:45:44'),
                                                                                                                               (65, 'Bài viết số 64', 'Nội dung bài viết số 64', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-21 17:52:03'),
                                                                                                                               (66, 'Bài viết số 65', 'Nội dung bài viết số 65', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-18 13:06:25'),
                                                                                                                               (67, 'Bài viết số 66', 'Nội dung bài viết số 66', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-23 17:02:52'),
                                                                                                                               (68, 'Bài viết số 67', 'Nội dung bài viết số 67', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-12-07 16:01:57'),
                                                                                                                               (69, 'Bài viết số 68', 'Nội dung bài viết số 68', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-11-23 12:05:53'),
                                                                                                                               (70, 'Bài viết số 69', 'Nội dung bài viết số 69', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-11-21 13:36:47'),
                                                                                                                               (71, 'Bài viết số 70', 'Nội dung bài viết số 70', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-12-02 07:41:44'),
                                                                                                                               (72, 'Bài viết số 71', 'Nội dung bài viết số 71', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-11-13 02:56:45'),
                                                                                                                               (73, 'Bài viết số 72', 'Nội dung bài viết số 72', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-29 12:13:25'),
                                                                                                                               (74, 'Bài viết số 73', 'Nội dung bài viết số 73', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-12-13 04:13:45'),
                                                                                                                               (75, 'Bài viết số 74', 'Nội dung bài viết số 74', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-12-04 02:14:31'),
                                                                                                                               (76, 'Bài viết số 75', 'Nội dung bài viết số 75', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-12-16 11:58:58'),
                                                                                                                               (77, 'Bài viết số 76', 'Nội dung bài viết số 76', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-12-23 21:39:15'),
                                                                                                                               (78, 'Bài viết số 77', 'Nội dung bài viết số 77', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-11-06 16:02:50'),
                                                                                                                               (79, 'Bài viết số 78', 'Nội dung bài viết số 78', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-11-28 10:07:25'),
                                                                                                                               (80, 'Bài viết số 79', 'Nội dung bài viết số 79', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-12-10 15:30:50'),
                                                                                                                               (81, 'Bài viết số 80', 'Nội dung bài viết số 80', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-24 19:18:30'),
                                                                                                                               (82, 'Bài viết số 81', 'Nội dung bài viết số 81', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-11-04 04:59:21'),
                                                                                                                               (83, 'Bài viết số 82', 'Nội dung bài viết số 82', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-12-02 08:38:11'),
                                                                                                                               (84, 'Bài viết số 83', 'Nội dung bài viết số 83', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-11-21 18:55:48'),
                                                                                                                               (85, 'Bài viết số 84', 'Nội dung bài viết số 84', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-03 23:52:54'),
                                                                                                                               (86, 'Bài viết số 85', 'Nội dung bài viết số 85', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-22 17:59:13'),
                                                                                                                               (87, 'Bài viết số 86', 'Nội dung bài viết số 86', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-13 10:05:25'),
                                                                                                                               (88, 'Bài viết số 87', 'Nội dung bài viết số 87', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-11-29 22:20:25'),
                                                                                                                               (89, 'Bài viết số 88', 'Nội dung bài viết số 88', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-11-07 22:10:05'),
                                                                                                                               (90, 'Bài viết số 89', 'Nội dung bài viết số 89', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-11-17 22:38:47'),
                                                                                                                               (91, 'Bài viết số 90', 'Nội dung bài viết số 90', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:40', '2024-11-04 20:54:55'),
                                                                                                                               (92, 'Bài viết số 91', 'Nội dung bài viết số 91', 'https://picsum.photos/200/300', 'show', 1, 2, '2025-01-05 07:07:40', '2024-12-12 23:50:13'),
                                                                                                                               (93, 'Bài viết số 92', 'Nội dung bài viết số 92', 'https://picsum.photos/200/300', 'show', 1, 3, '2025-01-05 07:07:40', '2024-11-05 22:39:53'),
                                                                                                                               (94, 'Bài viết số 93', 'Nội dung bài viết số 93', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-09 16:00:30'),
                                                                                                                               (95, 'Bài viết số 94', 'Nội dung bài viết số 94', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-11-22 06:07:36'),
                                                                                                                               (96, 'Bài viết số 95', 'Nội dung bài viết số 95', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-12-01 10:27:23'),
                                                                                                                               (97, 'Bài viết số 96', 'Nội dung bài viết số 96', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-12-06 02:49:53'),
                                                                                                                               (98, 'Bài viết số 97', 'Nội dung bài viết số 97', 'https://picsum.photos/200/300', 'show', 2, 1, '2025-01-05 07:07:40', '2024-12-17 23:04:39'),
                                                                                                                               (99, 'Bài viết số 98', 'Nội dung bài viết số 98', 'https://picsum.photos/200/300', 'show', 2, 2, '2025-01-05 07:07:40', '2024-11-30 02:24:32'),
                                                                                                                               (100, 'Bài viết số 99', 'Nội dung bài viết số 99', 'https://picsum.photos/200/300', 'show', 1, 1, '2025-01-05 07:07:40', '2024-11-28 20:51:02'),
                                                                                                                               (101, 'Bài viết số 100', 'Nội dung bài viết số 100', 'https://picsum.photos/200/300', 'show', 2, 3, '2025-01-05 07:07:40', '2024-11-03 19:51:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
                            `id` bigint(20) UNSIGNED NOT NULL,
                            `name` varchar(255) NOT NULL,
                            `description` text NOT NULL,
                            `origin_id` bigint(20) UNSIGNED NOT NULL,
                            `material_id` bigint(20) UNSIGNED NOT NULL,
                            `style_id` bigint(20) UNSIGNED NOT NULL,
                            `shape_id` bigint(20) UNSIGNED NOT NULL,
                            `brand_id` bigint(20) UNSIGNED NOT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `origin_id`, `material_id`, `style_id`, `shape_id`, `brand_id`, `created_at`, `updated_at`) VALUES
                                                                                                                                                     (1, 'Kính Mát A-MO Chống UV400 kiểu dáng thời trang - Summer Collection Sunglasses', '<h2>Mô tả sản phẩm</h2><p>Thương hiệu kính AMO được biết đến tại châu Á nhờ chất liệu cao cấp và quy trình chế tác thủ công tỉ mỉ bằng tay, cho ra đời những chiếc kính bền bỉ, tiện dụng và sành điệu phù hợp với mọi phong cách và lứa tuổi. Ngày nay, AMO đang nhanh chóng trở thành cơn sốt trong giới yêu thời trang.</p><p>Đặc biệt, mắt kính của thương hiệu này ngăn cản tối ưu tia UV từ ánh nắng Mặt Trời giúp ngăn chặn các bệnh về mắt. Thiết kế vừa vặn với nhiều hình dáng gương mặt, khi đeo tạo sự hài hòa, cân đối giữa hai bên thái dương, mắt và sóng mũi. Từng sản phẩm của AMO được gia công tỉ mỉ và sắc sảo đến từng chi tiết nhằm duy trì tuổi thọ và tính thẩm mỹ lâu dài.</p><p>nbsp;</p><p>Thương hiệu: AMO</p><p>Giới tính: Unisex</p><p>nbsp;</p><p>Kích thước</p><p>Độ rộng tròng: 51mm</p><p>Cầu kính: 15mm</p><p>Chiều dài gọng: 140mm</p><p>nbsp;</p><p>Màu sắc gọng kính: Đen</p><p>Màu sắc tròng kính: Đen</p><p>Chất liệu gọng: Nhựa</p><p>Hình dạng kính: Vuông</p><p>Chức năng: Chống UV</p><p>Phân loại kính: Kính chống nắng / Sunglasses</p><p><br></p>', 3, 1, 3, 2, 3, '2025-01-05 07:07:40', '2025-01-13 22:56:57'),
                                                                                                                                                     (2, 'Kính Nam BOLON BH7031 B05', '<h2>Mô tả sản phẩm</h2><h1><strong>Về Thương Hiệu BOLON</strong></h1><p><strong>Bolon Eyewear</strong> là thương hiệu kính mắt nổi tiếng thế giới của tập đoàn Essilor với phong cách tinh tế từ kinh đô thời trang Paris cùng chất liệu cao cấp và kỹ thuật chế tác kính tinh xảo của Ý. Được ra đời từ những năm 1990, hiện nay, Bolon là một trong những thương hiệu hàng đầu thế giới với những mẫu kính thời trang mang phong cách thiết kế châu Âu có cấu tạo đặc biệt dành riêng cho người châu Á.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:400,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/store_810022010ebb4f1faf828d01cb03bdb2_grande.jpg&quot;,&quot;width&quot;:600}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/store_810022010ebb4f1faf828d01cb03bdb2_grande.jpg\" width=\"600\" height=\"400\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>Bolon được bình chọn là TOP 5 thương hiệu bán chạy nhất Châu Á. Thương hiệu này được phân phối tại các quốc gia được xem là thiên đường mua sắm của thế giới: Thái Lan, Singapore, Hồng Kông, Malaysia, Hàn Quốc, Ý, Pháp….</p><h1>&nbsp;</h1><h1><strong>Về Gọng Kính Nam BOLON BH7031 B05</strong></h1><p><strong>Gọng Kính Nam BOLON BH7031 B05 </strong>mang đến sự thanh lịch và nhã nhặn với thiết kế tinh tế cùng chất liệu cao cấp. Màu sắc tối giản dễ mang nhưng lại tạo điểm nhấn cho vẻ ngoại hình hiện đại, sang trọng.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/4_a1fe4726693a40cea43e59ca659d8c0d_grande.png&quot;}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/4_a1fe4726693a40cea43e59ca659d8c0d_grande.png\" width=\"600\" height=\"600\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>&nbsp;</p><p>Với thiết kế đệm mũi tiện dụng, chiếc kính không chỉ mang lại cảm giác thoải mái mà còn thể hiện sự chăm sóc đến từng chi tiết. Sự kết hợp tinh tế giữa kiểu dáng hiện đại và chất liệu chất lượng cao làm cho <strong>Gọng Kính Nam BOLON BH7031 B05 </strong>trở thành biểu tượng của phong cách và sự độc đáo.</p><h2>&nbsp;</h2><h2><strong>THÔNG TIN CHI TIẾT&nbsp;</strong></h2><p><strong>KHUNG KÍNH</strong>HÌNH DẠNG GỌNG: Chữ nhậtCHẤT LIỆU GỌNG: TitaniumMÀU GỌNG: Gun Metal |&nbsp; &nbsp; &nbsp;<strong>KÍCH THƯỚC</strong>ĐỘ RỘNG TRÒNG: 53 mm CẦU KÍNH: 18 mmCHIỀU DÀI CÀNG KÍNH: 148 mm | &nbsp;<br><br></p><p><br></p>', 4, 2, 2, 2, 4, '2025-01-05 07:07:40', '2025-01-13 23:01:06'),
                                                                                                                                                     (3, 'Kính Nam BOLON BJ5176 B16', '<h2>Mô tả sản phẩm</h2><h1><strong>Về Thương Hiệu BOLON</strong></h1><p><strong>Bolon Eyewear</strong> là thương hiệu kính mắt nổi tiếng thế giới của tập đoàn Essilor với phong cách tinh tế từ kinh đô thời trang Paris cùng chất liệu cao cấp và kỹ thuật chế tác kính tinh xảo của Ý. Được ra đời từ những năm 1990, hiện nay, Bolon là một trong những thương hiệu hàng đầu thế giới với những mẫu kính thời trang mang phong cách thiết kế châu Âu có cấu tạo đặc biệt dành riêng cho người châu Á.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:400,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/store_810022010ebb4f1faf828d01cb03bdb2_grande.jpg&quot;,&quot;width&quot;:600}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/store_810022010ebb4f1faf828d01cb03bdb2_grande.jpg\" width=\"600\" height=\"400\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>Bolon được bình chọn là TOP 5 thương hiệu bán chạy nhất Châu Á. Thương hiệu này được phân phối tại các quốc gia được xem là thiên đường mua sắm của thế giới: Thái Lan, Singapore, Hồng Kông, Malaysia, Hàn Quốc, Ý, Pháp….</p><h1>&nbsp;</h1><h1><strong>Về Gọng Kính Nam BOLON BJ5176 B16&nbsp;</strong></h1><p><strong>Gọng Kính Nam BOLON BJ5176 B16 </strong>mang đến sự thanh lịch và nhã nhặn với thiết kế tinh tế cùng chất liệu cao cấp. Màu sắc đầy tinh tế không chỉ làm nổi bật chiếc kính mà còn tạo điểm nhấn cho vẻ ngoại hình hiện đại, sang trọng.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:600,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/1_fc3fb0e36a874875a2796569b98e7402_grande.png&quot;,&quot;width&quot;:600}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/1_fc3fb0e36a874875a2796569b98e7402_grande.png\" width=\"600\" height=\"600\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>&nbsp;</p><p>Với thiết kế đệm mũi tiện dụng, chiếc kính không chỉ mang lại cảm giác thoải mái mà còn thể hiện sự chăm sóc đến từng chi tiết. Sự kết hợp tinh tế giữa kiểu dáng hiện đại và chất liệu chất lượng cao làm cho <strong>Gọng Kính Nam BOLON BJ5176 B16 </strong>trở thành biểu tượng của phong cách và sự độc đáo.</p><h2>&nbsp;</h2><h2><strong>THÔNG TIN CHI TIẾT&nbsp;</strong></h2><p><strong>KHUNG KÍNH</strong>HÌNH DẠNG GỌNG: VuôngCHẤT LIỆU GỌNG: TR90MÀU GỌNG: Xám |&nbsp; &nbsp; &nbsp;<strong>KÍCH THƯỚC</strong>ĐỘ RỘNG TRÒNG: 52 mm CẦU KÍNH: 19 mmCHIỀU DÀI CÀNG KÍNH: 148 mm | &nbsp;</p><h2>&nbsp;</h2><h2><strong>HƯỚNG DẪN BẢO QUẢN KÍNH</strong></h2><p>Bảo quản kính trong hộp khi không sử dụng.</p><p>Không chạm tay vào tròng kính, không đặt úp tròng kính xuống các bề mặt để tránh trầy xước.</p><p>Dùng 2 tay cầm vào 2 càng kính và kéo thẳng khi đeo hoặc tháo kính để tránh biến dạng.</p><p>Thường xuyên vệ sinh kính bằng nước rửa kính và khăn lau kính chuyên dụng.</p><p><br></p>', 4, 1, 1, 4, 4, '2025-01-05 07:07:40', '2025-01-13 23:30:54'),
                                                                                                                                                     (4, 'Kính Nam MOLSION MA6011 B10', '<h2>Mô tả sản phẩm</h2><h1><strong>Về thương hiệu MOLSION</strong></h1><p>Molsion là thương hiệu mắt kính nổi tiếng với phong cách thiết kế ấn tượng dành riêng cho giới trẻ, và hầu như các sản phẩm của Molsion đều lấy cảm hứng từ thiết kế, nghệ thuật và văn hóa nhạc pop.</p><p>Có lẽ vì thế, dù mang thương hiệu có nguồn gốc từ nước Pháp nhưng lại rất được ưa chuộng ở nhiều nước ở châu Á. Thật không ngẫu nhiên mà Molsion đã chọn người đại diện thương hiệu này bởi các ngôi sao điện ảnh Hoa ngữ nổi tiếng như Dương Mịch, Huỳnh Hiểu Minh hay ngôi sao Hàn Quốc nổi tiếng Park Shin Hye.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:600,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/molsion_aa51d5a4477c48f9bb83edff5dfa77d8_grande.png&quot;,&quot;width&quot;:600}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/molsion_aa51d5a4477c48f9bb83edff5dfa77d8_grande.png\" width=\"600\" height=\"600\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>&nbsp;</p><h1><strong>Về Gọng Kính Nam MOLSION MA6011 B10</strong></h1><p><br><strong>Gọng Kính Nam MOLSION MA6011 B10</strong> được thiết kế tinh tế tạo nên phong cách thời trang vô cùng trẻ trung, trở thành sự lựa chọn hàng đầu của nhiều tín đồ thời trang. <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:600,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/1_763c03b1876e4941ae08e026bc25dbb4_grande.jpg&quot;,&quot;width&quot;:600}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/1_763c03b1876e4941ae08e026bc25dbb4_grande.jpg\" width=\"600\" height=\"600\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p><strong>MOLSION MA6011 B10 </strong>được làm từ chất liệu Titanium cao cấp, bền nhẹ. Thiết kế hiện đại, phong cách thời trang trẻ trung, năng động, dễ dàng kết hợp với nhiều kiểu trang phục.&nbsp;</p><h2>&nbsp;</h2><h2><strong>THÔNG TIN CHI TIẾT&nbsp;</strong></h2><p><strong>KHUNG KÍNH</strong>HÌNH DẠNG GỌNG: TrònMÀU GỌNG: Vàng Viền Nhựa ĐenCHẤT LIỆU GỌNG: TR/Titanium |&nbsp; &nbsp;&nbsp;<br><br></p><p><br></p>', 4, 3, 2, 1, 5, '2025-01-05 07:07:40', '2025-01-14 03:10:17'),
                                                                                                                                                     (5, 'Kính Nam BOLON BA7023 B15', '<h1><strong>Về Gọng Kính Nam BOLON BA7023 B15</strong></h1><p><strong>Gọng Kính Nam BOLON BA7023 B15</strong> mang đến sự thanh lịch và nhã nhặn với thiết kế tinh tế cùng chất liệu cao cấp. Màu sắc đầy tinh tế không chỉ làm nổi bật chiếc kính mà còn tạo điểm nhấn cho vẻ ngoại hình hiện đại, sang trọng.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:600,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/1_325f1426f9f14598b2aef1c9db15d9aa_grande.jpg&quot;,&quot;width&quot;:600}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/1_325f1426f9f14598b2aef1c9db15d9aa_grande.jpg\" width=\"600\" height=\"600\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>Với đệm mũi linh hoạt, chiếc kính không chỉ mang lại cảm giác thoải mái mà còn thể hiện sự chăm sóc đến từng chi tiết. Sự kết hợp tinh tế giữa kiểu dáng hiện đại và chất liệu chất lượng cao làm cho <strong>Gọng Kính Nam BOLON BA7023 B15 </strong>trở thành biểu tượng của phong cách và sự độc đáo.</p><h2>&nbsp;</h2><p><br></p>', 4, 3, 2, 5, 4, '2025-01-05 07:07:40', '2025-01-14 05:13:16'),
                                                                                                                                                     (11, 'Kính mát POVINO GMS620TS', '<p><strong>Thương hiệu</strong> | POVINO<br><strong>Thiết kế gọng</strong> | <a href=\"https://matkinhtamduc.com/thiet-ke-gong/nguyen-khung/\">Nguyên khung</a><br><strong>Thiết kế ve mũi</strong> | <a href=\"https://matkinhtamduc.com/thiet-ke-ve-mui/khong-ve-mui/\">Không ve mũi</a><br><strong>Kiểu dáng gọng</strong> | <a href=\"https://matkinhtamduc.com/kieu-dang-gong/gong-kinh-vuong/\">GỌNG KÍNH VUÔNG</a><br><strong>Chất liệu gọng kính</strong> | <a href=\"https://matkinhtamduc.com/chat-lieu-gong/nhua-kim-loai/\">Nhựa &amp; Kim loại</a><br><strong>Màu sắc</strong> | <a href=\"https://matkinhtamduc.com/mau-sac/den/\">Đen</a>, <a href=\"https://matkinhtamduc.com/mau-sac/doi-moi/\">Đồi mồi</a>, <a href=\"https://matkinhtamduc.com/mau-sac/reu/\">Rêu</a><br><strong>Size kính</strong> | <a href=\"https://matkinhtamduc.com/size-kinh/l/\">L</a></p>', 1, 2, 2, 4, 6, '2025-01-14 07:33:28', '2025-01-14 07:33:28'),
                                                                                                                                                     (12, 'Kính mát POVINO SJMM75RX', '<p><a href=\"https://matkinhtamduc.com/kinh-mat/\"><strong>Kính mát</strong></a><strong> POVINO SJMM75RX</strong></p><ul><li>Thương hiệu: POVINO</li><li>Mã sản phẩm: SJMM75RX</li><li>Chất liệu: Nhựa Acetate</li><li>Sản phẩm chính hãng được bảo hành có đầy đủ tem, hộp kính và khăn lau kính.</li></ul><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C73.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C73.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C73.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C73.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C73-1.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C73-1.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C73-1.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C73-1.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C62.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C62.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C62.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C62.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure></p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C62-1.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C62-1.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C62-1.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C62-1.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C6.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C6.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C6.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C6.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C6-1.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C6-1.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C6-1.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM75RX-C6-1.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure></p><p><strong>ĐẾN VỚI TÂM ĐỨC:</strong></p><ul><li>Trải nghiệm không gian mua sắm hoàn toàn mới, kính được bày trí theo phong cách châu Âu, khách hàng có thể thỏa sức lựa chọn và thử kính không giới hạn</li><li>Luôn có nhân viên tư vấn để bạn chọn được mẫu kính phù hợp nhất với khuôn mặt, tạo điểm nhấn và thay đổi phong cách</li><li><strong>ĐO MẮT MIỄN PHÍ</strong> thực hiện bởi KTV Khúc Xạ BV Mắt TPHCM hơn 10 năm kinh nghiệm cùng trang thiết bị máy móc hiện đại &amp; tự động.</li></ul>', 1, 1, 3, 3, 6, '2025-01-14 08:07:31', '2025-01-14 08:07:31'),
                                                                                                                                                     (13, 'Kính mát POVINO SM130', '<p><a href=\"https://matkinhtamduc.com/kinh-mat/\"><strong>Kính mát</strong></a><strong> POVINO SM130</strong></p><ul><li>Thương hiệu: POVINO</li><li>Mã sản phẩm: <strong>SM130</strong></li><li>Chất liệu: Nhựa&amp;Kim loại</li><li>Sản phẩm chính hãng được bảo hành có đầy đủ tem, hộp kính và khăn lau kính.</li></ul><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C11.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C11.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C11.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C11.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C12.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C12.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C12.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C12.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C13.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C13.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C13.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C13.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure></p><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C1.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C1.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C1.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C1.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C6-1.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C6-1.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C6-1.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C6-1.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C6.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C6.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C6.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/M130C6.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure></p>', 1, 1, 1, 4, 6, '2025-01-14 08:10:05', '2025-01-14 08:10:05'),
                                                                                                                                                     (14, 'Kính mát POVINO SM1026', '<p><a href=\"https://matkinhtamduc.com/kinh-mat/\"><strong>Kính mát</strong></a><strong> POVINO SM1026</strong></p><ul><li>Thương hiệu: POVINO</li><li>Mã sản phẩm: SM1026</li><li>Chất liệu: Nhựa Acetate</li><li>Sản phẩm chính hãng được bảo hành có đầy đủ tem, hộp kính và khăn lau kính.</li></ul><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C31.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C31.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C31.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C31.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C31-1.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C31-1.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C31-1.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C31-1.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C15-1.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C15-1.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C15-1.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-M1026-C15-1.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure></p>', 1, 1, 1, 4, 6, '2025-01-14 08:14:33', '2025-01-14 08:14:33'),
                                                                                                                                                     (15, 'Kính mát POVINO SJMM68RX', '<p><a href=\"https://matkinhtamduc.com/kinh-mat/\"><strong>Kính mát</strong></a><strong> POVINO SJMM68RX</strong></p><ul><li>Thương hiệu: POVINO</li><li>Mã sản phẩm: SJMM68RX</li><li>Chất liệu: Nhựa Acetate</li><li>Sản phẩm chính hãng được bảo hành có đầy đủ tem, hộp kính và khăn lau kính.</li></ul><p><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C12.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C12.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C12.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C12.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C12-1.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C12-1.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C12-1.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C12-1.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure> <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:330,&quot;href&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C6.jpg&quot;,&quot;url&quot;:&quot;https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C6.jpg&quot;,&quot;width&quot;:330}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><a href=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C6.jpg\"><img src=\"https://matkinhtamduc.com/wp-content/uploads/2024/06/S-JMM68RX-C6.jpg\" width=\"330\" height=\"330\"><figcaption class=\"attachment__caption\"></figcaption></a></figure></p>', 1, 2, 2, 1, 6, '2025-01-14 08:16:44', '2025-01-14 08:16:44'),
                                                                                                                                                     (16, 'Kính Mát Unisex RAYBAN 0RB4391D 601/9365', '<h1><strong>Về Thương Hiệu RAY-BAN</strong></h1><p>Phong cách vượt thời gian, sống chất, và tự do là những giá trị cốt lõi của <strong>Ray-Ban</strong>, một thương hiệu dẫn đầu trong cả kính mát và kính thường cho nhiều thế hệ người tiêu dùng. Từ khi ra mắt mẫu kính đầy tính thương hiệu Aviator, dành riêng cho những phi công Hoa Kỳ, <strong>Ray-Ban</strong> luôn dẫn đầu xu hướng trong việc thay đổi nhận thức văn hoá, và đã trở thành một biểu tượng của việc thể hiện chất riêng, được tin yêu bởi những người nổi tiếng và có sức ảnh hưởng khắp toàn cầu.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:1170,&quot;url&quot;:&quot;https://media.ray-ban.com/cms/resource/image/735172/landscape_ratio144x65/2592/1170/29d9353c65024861db7fd1e3ed405c66/83CBDF1FBB6EFAC17923A68A1A93BE09/pdp-banner-wayfarer-d.jpg&quot;,&quot;width&quot;:2592}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://media.ray-ban.com/cms/resource/image/735172/landscape_ratio144x65/2592/1170/29d9353c65024861db7fd1e3ed405c66/83CBDF1FBB6EFAC17923A68A1A93BE09/pdp-banner-wayfarer-d.jpg\" width=\"2592\" height=\"1170\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>&nbsp;</p><h1><strong>Về Kính Mát Unisex RAYBAN 0RB4391D 601/9365</strong></h1><p><strong>Kính Mát Unisex RAYBAN 0RB4391D 601/9365</strong> là dòng kính mát cao cấp đến từ thương hiệu Ray-Ban nổi tiếng, tạo nên phong cách thời trang vô cùng trẻ trung, cuốn hút với kiểu dáng tinh tế và hiện đại, trở thành lựa chọn hàng đầu của nhiều tín đồ thời trang.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:480,&quot;url&quot;:&quot;https://product.hstatic.net/200000689681/product/106_4aa8c672c4dd47ad8b447f18b795adca_large.png&quot;,&quot;width&quot;:480}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://product.hstatic.net/200000689681/product/106_4aa8c672c4dd47ad8b447f18b795adca_large.png\" width=\"480\" height=\"480\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p><br><br></p><p><br></p>', 4, 3, 1, 3, 2, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                                                                                     (17, 'Kính Mát Nam ANCCI AC33207 C5', '<h1><strong>Về thương hiệu kính ANCCI</strong></h1><p><strong>ANCCI là một thương hiệu mắt kính cao cấp</strong> được thành lập vào năm 2012 với ý tưởng tạo ra những sản phẩm mang đậm phong cách đương đại và sang trọng. Sản phẩm của ANCCI được chế tạo từ các chất liệu cao cấp như titan, nhôm và acetate, mang đến độ bền và độ cứng tốt. Thương hiệu này chú trọng đến từng chi tiết trên sản phẩm, từ khung kính đến tròng kính, để đảm bảo chất lượng tuyệt đối và sự thoải mái khi sử dụng. Với sự kết hợp tinh tế giữa phong cách đương đại và sự tiện dụng, ANCCI mang đến cho khách hàng những sản phẩm mắt kính thời trang và độc đáo. Với những giá trị này, ANCCI đã nhanh chóng trở thành một trong những thương hiệu mắt kính được ưa chuộng và tin tưởng tại thị trường Việt Nam.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:600,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/2_844f872a7d554d11962ca03dc2f68897_grande.png&quot;,&quot;width&quot;:600}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/2_844f872a7d554d11962ca03dc2f68897_grande.png\" width=\"600\" height=\"600\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p><br></p>', 4, 2, 2, 4, 7, '2025-01-14 08:21:31', '2025-01-14 08:21:31'),
                                                                                                                                                     (18, 'Kính Mát Nam ANCCI AC201252 M02', '<h1><strong>Về thương hiệu kính ANCCI</strong></h1><p><strong>ANCCI là một thương hiệu mắt kính cao cấp</strong> được thành lập vào năm 2012 với ý tưởng tạo ra những sản phẩm mang đậm phong cách đương đại và sang trọng. Sản phẩm của ANCCI được chế tạo từ các chất liệu cao cấp như titan, nhôm và acetate, mang đến độ bền và độ cứng tốt. Thương hiệu này chú trọng đến từng chi tiết trên sản phẩm, từ khung kính đến tròng kính, để đảm bảo chất lượng tuyệt đối và sự thoải mái khi sử dụng. Với sự kết hợp tinh tế giữa phong cách đương đại và sự tiện dụng, ANCCI mang đến cho khách hàng những sản phẩm mắt kính thời trang và độc đáo. Với những giá trị này, ANCCI đã nhanh chóng trở thành một trong những thương hiệu mắt kính được ưa chuộng và tin tưởng tại thị trường Việt Nam.</p><p><br></p>', 4, 2, 2, 4, 7, '2025-01-14 08:23:24', '2025-01-14 08:23:24'),
                                                                                                                                                     (19, 'Kính Nữ MOLSION MS7016 B90', '<h1><strong>Về thương hiệu MOLSION</strong></h1><p>Molsion là thương hiệu mắt kính nổi tiếng với phong cách thiết kế ấn tượng dành riêng cho giới trẻ, và hầu như các sản phẩm của Molsion đều lấy cảm hứng từ thiết kế, nghệ thuật và văn hóa nhạc pop.</p><p>Có lẽ vì thế, dù mang thương hiệu có nguồn gốc từ nước Pháp nhưng lại rất được ưa chuộng ở nhiều nước ở châu Á. Thật không ngẫu nhiên mà Molsion đã chọn người đại diện thương hiệu này bởi các ngôi sao điện ảnh Hoa ngữ nổi tiếng như Dương Mịch, Huỳnh Hiểu Minh hay ngôi sao Hàn Quốc nổi tiếng Park Shin Hye.<figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:1200,&quot;url&quot;:&quot;https://cdn.shopify.com/s/files/1/0075/8379/3219/files/5D4_7279-HDR-Edit.jpg?2017009978449766671&quot;,&quot;width&quot;:1200}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://cdn.shopify.com/s/files/1/0075/8379/3219/files/5D4_7279-HDR-Edit.jpg?2017009978449766671\" width=\"1200\" height=\"1200\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p>Molsion thể hiện phương châm thuần túy cho phong cách sản phẩm của mình \"Thời trang và sự phát triển, biến hóa không ngừng của xu hướng thời trang thế giới”.</p><p>&nbsp;</p><h1><strong>Về Gọng Kính Nữ MOLSION MS7016 B90</strong></h1><p><br><strong>Gọng Kính Nữ MOLSION MS7016 B90 </strong>được thiết kế tinh tế tạo nên phong cách thời trang vô cùng sang trọng và trở thành sự lựa chọn hàng đầu của nhiều tín đồ thời trang. <figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:2160,&quot;url&quot;:&quot;https://file.hstatic.net/200000689681/file/3_f96b120998b8400297a051021739d52e.jpg&quot;,&quot;width&quot;:2160}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://file.hstatic.net/200000689681/file/3_f96b120998b8400297a051021739d52e.jpg\" width=\"2160\" height=\"2160\"><figcaption class=\"attachment__caption\"></figcaption></figure></p><p><strong>Kính Mát Nữ MOLSION MS7016 B90</strong> được làm từ chất liệu cao cấp, bền bỉ. Thiết kế độc đáo, sang trọng, tạo nên phong cách cho người đeo và phù hợp với nhiều dáng khuôn mặt.</p><h2>&nbsp;</h2><h2><strong>THÔNG TIN CHI TIẾT&nbsp;</strong></h2><p><strong>KHUNG KÍNH</strong>HÌNH DẠNG GỌNG: Đa giác MÀU GỌNG: HồngCHẤT LIỆU GỌNG: Kim loại MÀU TRÒNG: Hồng |&nbsp; &nbsp; &nbsp; <strong>KÍCH THƯỚC</strong>ĐỘ RỘNG TRÒNG: 63mm CẦU KÍNH: 13mmCHIỀU DÀI CÀNG KÍNH: 150mm | &nbsp;</p><p>&nbsp;</p><h2><strong>HƯỚNG DẪN BẢO QUẢN KÍNH</strong></h2><p>Bảo quản kính trong hộp khi không sử dụng.</p><p>Không chạm tay vào tròng kính, không đặt úp tròng kính xuống các bề mặt để tránh trầy xước.</p><p>Dùng 2 tay cầm vào 2 càng kính và kéo thẳng khi đeo hoặc tháo kính để tránh biến dạng.</p><p>Thường xuyên vệ sinh kính bằng nước rửa kính và khăn lau kính chuyên dụng.</p><p>Xem thêm</p><p><br></p>', 4, 2, 3, 5, 5, '2025-01-14 08:25:50', '2025-01-14 08:25:50'),
                                                                                                                                                     (20, 'sđ', '<p>sdsd</p>', 1, 2, 2, 1, 1, '2025-01-15 02:50:10', '2025-01-15 02:50:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
                              `id` bigint(20) UNSIGNED NOT NULL,
                              `name` varchar(255) NOT NULL,
                              `description` varchar(255) NOT NULL,
                              `code` varchar(255) NOT NULL,
                              `type` enum('percentage','fixed') NOT NULL,
                              `value` varchar(255) NOT NULL,
                              `status` enum('active','inactive') NOT NULL,
                              `start_date` datetime NOT NULL,
                              `end_date` datetime NOT NULL,
                              `created_at` timestamp NULL DEFAULT NULL,
                              `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `description`, `code`, `type`, `value`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
                                                                                                                                                    (1, 'Tết  2025', '# Siêu sale bùng nổ  \n\n> Chỉ duy nhất hôm nay\n\n## Mã khuyến mãi \n`TET2025`\n\nQuy trình áp dụng :\n* Copy Khuyến mãi này\n* Cho vào ô khuyến mãi\n* Ấn áp dụng\n', 'Tet2025', 'percentage', '5', 'active', '2025-01-10 06:23:16', '2025-01-11 06:24:34', '2025-01-09 23:21:58', '2025-01-09 23:21:58'),
                                                                                                                                                    (2, 'Sale sập sàn', 'sdfsdf', '55', 'fixed', '1000', 'active', '2025-01-13 16:22:02', '2025-01-14 16:23:08', '2025-01-13 09:18:57', '2025-01-13 09:18:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_pros`
--

CREATE TABLE `review_pros` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `content` text NOT NULL,
                               `star` int(11) NOT NULL,
                               `product_id` bigint(20) UNSIGNED NOT NULL,
                               `customer_id` bigint(20) UNSIGNED NOT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `guard_name` varchar(255) NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
    (1, 'super_admin', 'web', '2025-01-05 07:07:39', '2025-01-05 07:07:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
                                        `permission_id` bigint(20) UNSIGNED NOT NULL,
                                        `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
                                                                    (1, 1),
                                                                    (2, 1),
                                                                    (3, 1),
                                                                    (4, 1),
                                                                    (5, 1),
                                                                    (6, 1),
                                                                    (7, 1),
                                                                    (8, 1),
                                                                    (9, 1),
                                                                    (10, 1),
                                                                    (11, 1),
                                                                    (12, 1),
                                                                    (13, 1),
                                                                    (14, 1),
                                                                    (15, 1),
                                                                    (16, 1),
                                                                    (17, 1),
                                                                    (18, 1),
                                                                    (19, 1),
                                                                    (20, 1),
                                                                    (21, 1),
                                                                    (22, 1),
                                                                    (23, 1),
                                                                    (24, 1),
                                                                    (25, 1),
                                                                    (26, 1),
                                                                    (27, 1),
                                                                    (28, 1),
                                                                    (29, 1),
                                                                    (30, 1),
                                                                    (31, 1),
                                                                    (32, 1),
                                                                    (33, 1),
                                                                    (34, 1),
                                                                    (35, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shapes`
--

CREATE TABLE `shapes` (
                          `id` bigint(20) UNSIGNED NOT NULL,
                          `name` varchar(255) NOT NULL,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `shapes`
--

INSERT INTO `shapes` (`id`, `name`, `created_at`, `updated_at`) VALUES
                                                                    (1, 'Tròn', '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                    (2, 'Vuông', '2025-01-05 07:07:40', '2025-01-13 22:59:15'),
                                                                    (3, 'Chữ nhật', '2025-01-05 07:07:40', '2025-01-05 07:07:40'),
                                                                    (4, 'Oval', '2025-01-13 23:26:56', '2025-01-13 23:26:56'),
                                                                    (5, 'Phi hình học', '2025-01-14 05:10:02', '2025-01-14 05:10:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `styles`
--

CREATE TABLE `styles` (
                          `id` bigint(20) UNSIGNED NOT NULL,
                          `name` varchar(255) NOT NULL,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `styles`
--

INSERT INTO `styles` (`id`, `name`, `created_at`, `updated_at`) VALUES
                                                                    (1, 'Trẻ Trung', '2025-01-05 07:07:40', '2025-01-13 22:59:34'),
                                                                    (2, 'Hiện Đại', '2025-01-05 07:07:40', '2025-01-13 22:59:48'),
                                                                    (3, 'Classic', '2025-01-05 07:07:40', '2025-01-13 23:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) NOT NULL,
                         `remember_token` varchar(100) DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
                                                                                                                               (1, 'Vinh', 'vinh10@gmail.com', NULL, '$2y$12$kD0QTo1FOOKsngkGrSBfw.OTWYG5beaw5dZ9nTchTJ99JUpU9T/7e', NULL, '2025-01-05 07:07:39', '2025-01-05 07:07:39'),
                                                                                                                               (2, 'Hiếu', 'tranmanhhieu10@gmail.com', NULL, '$2y$12$WHbtsjQD.Cvz1lX0cAXcben/mpm4s6D7qfR4a.9QdjqjOxSZF/9Au', '6HHFGxwmBzxjjkS5M9tqQvh4DMiSbiZAlXHfTTEAJnaxdHhhlV7w5SdhpmmI', '2025-01-05 07:07:39', '2025-01-05 07:07:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `versions`
--

CREATE TABLE `versions` (
                            `id` bigint(20) UNSIGNED NOT NULL,
                            `price` int(10) UNSIGNED NOT NULL,
                            `stock` int(10) UNSIGNED NOT NULL DEFAULT 0,
                            `size` varchar(255) NOT NULL,
                            `color` varchar(255) NOT NULL,
                            `product_id` bigint(20) UNSIGNED NOT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `versions`
--

INSERT INTO `versions` (`id`, `price`, `stock`, `size`, `color`, `product_id`, `created_at`, `updated_at`) VALUES
                                                                                                               (4, 349000, 23, 'S', 'Đen', 1, '2025-01-13 22:56:57', '2025-01-14 06:00:50'),
                                                                                                               (5, 3380000, 23, 'M', 'Xám', 2, '2025-01-13 23:01:06', '2025-01-13 23:01:06'),
                                                                                                               (6, 2880000, 3323, 'M', 'Xám', 3, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                                               (7, 2880000, 33, 'M', 'Nâu', 3, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                                               (8, 2880000, 22, 'M', 'Đen', 3, '2025-01-13 23:30:54', '2025-01-13 23:30:54'),
                                                                                                               (9, 2580000, 45, 'M', 'Vàng', 4, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                                               (10, 2580000, 45, 'M', 'Xám', 4, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                                               (11, 2480000, 45, 'M', 'Nâu', 4, '2025-01-14 03:10:17', '2025-01-14 03:10:17'),
                                                                                                               (12, 3180000, 33, 'M', 'Xám', 5, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                                               (13, 3180000, 33, 'M', 'Hồng', 5, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                                               (14, 3180000, 33, 'M', 'Vàng', 5, '2025-01-14 05:13:16', '2025-01-14 05:13:16'),
                                                                                                               (15, 1112000, 445, 'L', 'Xanh rêu', 11, '2025-01-14 07:33:28', '2025-01-14 07:33:28'),
                                                                                                               (16, 1112000, 445, 'L', 'Nâu', 11, '2025-01-14 07:33:28', '2025-01-14 07:33:28'),
                                                                                                               (17, 1112000, 445, 'L', 'Đen', 11, '2025-01-14 07:33:28', '2025-01-14 07:33:28'),
                                                                                                               (18, 1112000, 22, 'XL', 'Đen', 12, '2025-01-14 08:07:31', '2025-01-14 08:07:31'),
                                                                                                               (19, 1112000, 22, 'XL', 'Vàng', 12, '2025-01-14 08:07:31', '2025-01-14 08:07:31'),
                                                                                                               (20, 1112000, 22, 'XL', 'Xám', 12, '2025-01-14 08:07:31', '2025-01-14 08:07:31'),
                                                                                                               (21, 1112000, 454, 'S', 'Đen', 13, '2025-01-14 08:10:05', '2025-01-14 08:10:05'),
                                                                                                               (22, 1112000, 454, 'S', 'Xám', 13, '2025-01-14 08:10:05', '2025-01-14 08:10:05'),
                                                                                                               (23, 1121000, 34, 'L', 'Xanh rêu', 14, '2025-01-14 08:14:33', '2025-01-14 08:14:33'),
                                                                                                               (24, 1121000, 34, 'L', 'Đen', 14, '2025-01-14 08:14:33', '2025-01-14 08:14:33'),
                                                                                                               (25, 1120000, 33, 'L', 'Xanh rêu', 15, '2025-01-14 08:16:44', '2025-01-14 08:16:44'),
                                                                                                               (26, 1120000, 33, 'L', 'Nâu', 15, '2025-01-14 08:16:44', '2025-01-14 08:16:44'),
                                                                                                               (27, 3980000, 342, 'M', 'Đen', 16, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                                               (28, 3980000, 342, 'M', 'Nâu', 16, '2025-01-14 08:19:14', '2025-01-14 08:19:14'),
                                                                                                               (29, 880000, 43, 'M', 'Xám', 17, '2025-01-14 08:21:31', '2025-01-14 08:21:31'),
                                                                                                               (30, 684000, 34, 'S', 'Đen', 18, '2025-01-14 08:23:24', '2025-01-14 08:23:24'),
                                                                                                               (31, 1110000, 22, 'XL', 'Hồng', 19, '2025-01-14 08:25:50', '2025-01-14 08:25:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
    ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
    ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_version_id_foreign` (`version_id`);

--
-- Chỉ mục cho bảng `cats`
--
ALTER TABLE `cats`
    ADD PRIMARY KEY (`id`),
  ADD KEY `cats_promotion_id_foreign` (`promotion_id`);

--
-- Chỉ mục cho bảng `cat_posts`
--
ALTER TABLE `cat_posts`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cat_products`
--
ALTER TABLE `cat_products`
    ADD PRIMARY KEY (`id`),
  ADD KEY `cat_products_cat_id_foreign` (`cat_id`),
  ADD KEY `cat_products_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Chỉ mục cho bảng `exports`
--
ALTER TABLE `exports`
    ADD PRIMARY KEY (`id`),
  ADD KEY `exports_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
    ADD PRIMARY KEY (`id`),
  ADD KEY `failed_import_rows_import_id_foreign` (`import_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
    ADD PRIMARY KEY (`id`),
  ADD KEY `images_version_id_foreign` (`version_id`);

--
-- Chỉ mục cho bảng `imports`
--
ALTER TABLE `imports`
    ADD PRIMARY KEY (`id`),
  ADD KEY `imports_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `materials`
--
ALTER TABLE `materials`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
    ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
    ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
    ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
    ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_version_id_foreign` (`version_id`);

--
-- Chỉ mục cho bảng `origins`
--
ALTER TABLE `origins`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
    ADD PRIMARY KEY (`id`),
  ADD KEY `pages_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
    ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
    ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_catpost_id_foreign` (`catpost_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`id`),
  ADD KEY `products_origin_id_foreign` (`origin_id`),
  ADD KEY `products_material_id_foreign` (`material_id`),
  ADD KEY `products_style_id_foreign` (`style_id`),
  ADD KEY `products_shape_id_foreign` (`shape_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promotions_code_unique` (`code`);

--
-- Chỉ mục cho bảng `review_pros`
--
ALTER TABLE `review_pros`
    ADD PRIMARY KEY (`id`),
  ADD KEY `review_pros_product_id_foreign` (`product_id`),
  ADD KEY `review_pros_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
    ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `shapes`
--
ALTER TABLE `shapes`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `styles`
--
ALTER TABLE `styles`
    ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `versions`
--
ALTER TABLE `versions`
    ADD PRIMARY KEY (`id`),
  ADD KEY `versions_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cats`
--
ALTER TABLE `cats`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cat_posts`
--
ALTER TABLE `cat_posts`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cat_products`
--
ALTER TABLE `cat_products`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `exports`
--
ALTER TABLE `exports`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `imports`
--
ALTER TABLE `imports`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `origins`
--
ALTER TABLE `origins`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `review_pros`
--
ALTER TABLE `review_pros`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `shapes`
--
ALTER TABLE `shapes`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `styles`
--
ALTER TABLE `styles`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `versions`
--
ALTER TABLE `versions`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
    ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
    ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_version_id_foreign` FOREIGN KEY (`version_id`) REFERENCES `versions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cats`
--
ALTER TABLE `cats`
    ADD CONSTRAINT `cats_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `cat_products`
--
ALTER TABLE `cat_products`
    ADD CONSTRAINT `cat_products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `cats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cat_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `exports`
--
ALTER TABLE `exports`
    ADD CONSTRAINT `exports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
    ADD CONSTRAINT `failed_import_rows_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
    ADD CONSTRAINT `images_version_id_foreign` FOREIGN KEY (`version_id`) REFERENCES `versions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `imports`
--
ALTER TABLE `imports`
    ADD CONSTRAINT `imports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
    ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
    ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
    ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
    ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_version_id_foreign` FOREIGN KEY (`version_id`) REFERENCES `versions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `pages`
--
ALTER TABLE `pages`
    ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
    ADD CONSTRAINT `posts_catpost_id_foreign` FOREIGN KEY (`catpost_id`) REFERENCES `cat_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
    ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `products_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `origins` (`id`),
  ADD CONSTRAINT `products_shape_id_foreign` FOREIGN KEY (`shape_id`) REFERENCES `shapes` (`id`),
  ADD CONSTRAINT `products_style_id_foreign` FOREIGN KEY (`style_id`) REFERENCES `styles` (`id`);

--
-- Các ràng buộc cho bảng `review_pros`
--
ALTER TABLE `review_pros`
    ADD CONSTRAINT `review_pros_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_pros_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
    ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `versions`
--
ALTER TABLE `versions`
    ADD CONSTRAINT `versions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
