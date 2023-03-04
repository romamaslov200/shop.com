-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 04 2023 г., 14:48
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `img` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_p` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `img`, `title`, `text`, `price_p`) VALUES
(21, 'uploads/product/0adb1a9d16eeac885fee70183ffdb7be.jpeg', '123@gmail.com', 'asd', 345);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `password_old` varchar(191) DEFAULT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `admin_status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `password_old`, `avatar`, `admin_status`) VALUES
(13, 'Admin', '', '7815696ecbf1c96e6894b779456d330e', NULL, NULL, NULL, 0),
(14, 'Admin/$EDS', 'bvvana400@gmail.com', '7815696ecbf1c96e6894b779456d330e', NULL, NULL, NULL, 0),
(16, '123@gmail.com', 'john_asdaasdssmith@gmail.com', '$2y$10$GupSEXuyFgMaLqKceYumTesm0BZPNTejzOsRVHRuaOLGNW30jrwdW', NULL, 'asd', 'novavatar.jpg', 0),
(17, '123@gmail.com', '123@1123s.com', '$2y$10$EbJCPcCmDDfLr/rbrQo/4uILGxaoGbq3eOaOktn31cLWMWBySBIli', NULL, '123', 'novavatar.jpg', 0),
(18, 'Admin', 'romanmaslov200@gmail.com', '$2y$10$P5y/dhzt2KySnZmhyG0C2egIQY6t/s8YT19//L5muYMme94lBzG/S', NULL, '123', 'novavatar.jpg', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
