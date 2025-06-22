-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 22 2025 г., 10:42
-- Версия сервера: 8.0.34-26-beget-1-1
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `qwerta0a_11`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bookings`
--
-- Создание: Июн 13 2025 г., 06:02
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `kitten_id` int NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'активен',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `kitten_id`, `status`, `created_at`) VALUES
(5, 21, 11, 'подтвержденный', '2025-06-17 09:33:49');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--
-- Создание: Июн 13 2025 г., 06:02
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(5, 'вмчстс', 'reginamuratova20@gmail.com', 'сколько стоят котята до 5 месяцев?', '2025-03-18 11:06:38'),
(7, 'Лилит', 'user1@mail.bk', 'Надо ли делать прививки ваши котятам до 3 месяцев?', '2025-03-31 07:32:10'),
(9, 'Vfrcbv', 'maks@mail.ru', 'Сколько стоит котёнок?', '2025-06-17 09:35:50');

-- --------------------------------------------------------

--
-- Структура таблицы `kittens`
--
-- Создание: Июн 13 2025 г., 06:02
--

DROP TABLE IF EXISTS `kittens`;
CREATE TABLE `kittens` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('свободен','забронирован','продан') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'свободен',
  `mother_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `litter_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `gender` enum('мужской','женский') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `character` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievements` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kittens`
--

INSERT INTO `kittens` (`id`, `name`, `age`, `description`, `image_url`, `images`, `status`, `mother_name`, `father_name`, `litter_number`, `birth_date`, `gender`, `color`, `character`, `achievements`, `price`) VALUES
(11, 'Мурзик', 6, 'Этот мейн-кун — настоящий ласковый гигант. Он обожает обниматься и всегда ищет компанию своих хозяев. Макс также очень терпелив и отлично ладит с детьми.', 'uploads/654225.jpg', NULL, 'забронирован', 'Мурза', 'Эпик', 'В1', '2025-01-18', 'мужской', 'Черепаха Серый', 'игривый, дружелюбный и очень ласковый. С пушистым мехом и большими ушками, он станет отличным компан', 'Этот котёнок ещё маленький, но с каждым днём он становится всё более уверенным в себе и скоро достигнет вершин своего потенциала!', '5000.00'),
(12, 'Мурзина', 4, 'Этот котёнок — пушистый комочек счастья с большими, любопытными глазами и игривым нравом. Его шерсть мягкая и приятная на ощупь.', 'uploads/cat1-3.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', 'В1', '2024-12-18', 'женский', 'Черный', 'Котёнок игривый и любопытный, всегда готов к приключениям и играм. Он ласковый и дружелюбный, легко ', 'Ласковый компаньон: Становление любимцем семьи, который всегда поддерживает и радует своих хозяев.', '7000.00'),
(13, 'Лилит', 1, 'Этот мейн-кун — настоящий ласковый гигант. Он обожает обниматься и всегда ищет компанию своих хозяев. Макс также очень терпелив и отлично ладит с детьми.', 'uploads/1113.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', 'В8', '2025-03-18', 'мужской', 'ляля', 'ляля', 'ляля', '7000.00'),
(14, 'Жужа', 2, 'Этот мейн-кун — настоящий ласковый гигант. Он обожает обниматься и всегда ищет компанию своих хозяев. Макс также очень терпелив и отлично ладит с детьми.', 'uploads/1114.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', 'В1', '2025-03-14', 'женский', 'Черепаха Серый', 'ляля', 'ляляля', '6000.00'),
(16, 'Лёльчик', 3, 'Этот мейн-кун — настоящий ласковый гигант. Он обожает обниматься и всегда ищет компанию своих хозяев. Макс также очень терпелив и отлично ладит с детьми.', 'uploads/1116.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', 'В1', '2025-03-06', 'мужской', 'Серый', 'ляля', 'ляля', '6700.00'),
(17, 'Виви', 3, 'Этот мейн-кун — настоящий ласковый гигант. Он обожает обниматься и всегда ищет компанию своих хозяев. Макс также очень терпелив и отлично ладит с детьми.', 'uploads/1117.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', 'В1', '2025-03-06', 'мужской', 'ляля', 'ляля', 'ляля', '8000.00'),
(18, 'Мурлик', 2, 'Добрый котёнок, ласковый. Приучен к лотку. Победитель конкурса.', 'uploads/656574.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', '3', '2025-07-04', 'женский', 'Черный, пятнистый', 'Добрый, ласковый', 'Награда &amp;amp;quot;Зрительский симпатель&amp;amp;quot;', '12000.00'),
(19, 'Дудик', 1, 'Умный котёнок, но очень шкодный.', 'uploads/упа.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', '2', '2025-06-06', 'мужской', 'Черный, пятнистый', 'Добрый, ласковый', 'Пока нет', '12334.00'),
(20, 'Жужак', 2, 'Добрый, котёнок приучен к лотку.', 'uploads/2222.jpg', NULL, 'свободен', 'Озля', 'Фукси', '3', '2025-06-26', 'мужской', 'Серый', 'Добрый, ласковый', 'Мир-ласк', '10000.00'),
(21, 'Люси', 1, 'Он обожает обниматься и всегда ищет компанию своих хозяев. Макс также очень терпелив и отлично ладит.', 'uploads/kitten_684fa2c083ec46.80341040.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', 'В1', '2025-06-11', 'женский', 'Серый', 'Добрый, ласковый', 'Пока не достиг.', '10000.00'),
(22, 'Люси', 1, 'Он обожает обниматься и всегда ищет компанию своих хозяев. Макс также очень терпелив и отлично ладит.', 'uploads/cat1-2.jpg', NULL, 'свободен', 'Мурзина', 'Эпик', 'В1', '2025-06-11', 'женский', 'Серый', 'Добрый, ласковый', 'Пока не достиг.', '10000.00'),
(23, 'Люси', 3, 'Она обожает обниматься и всегда ищет компанию своих хозяев. Макс также очень терпелив и отлично ладит.', 'uploads/cat66 (7).jpg', NULL, 'свободен', ' Ляля', 'Эпик', '2', '2025-06-19', 'женский', 'Черепаха Серый', 'Добрый, ласковый', 'Пока не достиг.', '12000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
-- Создание: Июн 13 2025 г., 06:02
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `is_admin`) VALUES
(2, 'user1', 'user1', 'user1@example.com', 0),
(4, 'admin', 'admin', '', 1),
(20, 'Регина ', '12345', 'reg.muratova@mail.ru', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kitten_id` (`kitten_id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kittens`
--
ALTER TABLE `kittens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `kittens`
--
ALTER TABLE `kittens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`kitten_id`) REFERENCES `kittens` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
