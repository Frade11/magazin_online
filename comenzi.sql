-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 18 2025 г., 18:59
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `market_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comenzi`
--

CREATE TABLE `comenzi` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `produs` varchar(100) NOT NULL,
  `cantitate` int(11) NOT NULL,
  `data_comenzii` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comenzi`
--

INSERT INTO `comenzi` (`id`, `nume`, `prenume`, `telefon`, `email`, `produs`, `cantitate`, `data_comenzii`) VALUES
(1, 'Popa', 'Mihai', '0712345601', 'mihai.popa@email.com', 'Laptop ASUS ROG Strix G15', 1, '2025-11-18 17:20:55'),
(2, 'Ionescu', 'Ana-Maria', '0723456702', 'ana.ionescu@email.com', 'Laptop Dell XPS 13', 1, '2025-11-18 17:20:55'),
(3, 'Stan', 'Cristian', '0734567803', 'cristian.stan@email.com', 'Laptop HP Pavilion 15', 1, '2025-11-18 17:20:55'),
(4, 'Radu', 'Elena', '0745678904', 'elena.radu@email.com', 'Laptop Lenovo ThinkPad X1', 1, '2025-11-18 17:20:55'),
(5, 'Dobre', 'Alexandru', '0756789015', 'alexandru.dobre@email.com', 'Laptop Apple MacBook Pro 14\"', 1, '2025-11-18 17:20:55'),
(6, 'Neagu', 'Gabriela', '0767890126', 'gabriela.neagu@email.com', 'Laptop Acer Swift 3', 1, '2025-11-18 17:20:55'),
(7, 'Florea', 'Andrei', '0778901237', 'andrei.florea@email.com', 'Laptop MSI Katana GF66', 1, '2025-11-18 17:20:55'),
(8, 'Munteanu', 'Ioana', '0789012348', 'ioana.munteanu@email.com', 'Laptop Microsoft Surface Laptop 5', 1, '2025-11-18 17:20:55'),
(9, 'Costea', 'Vlad', '0790123459', 'vlad.costea@email.com', 'Laptop Lenovo Legion 5', 1, '2025-11-18 17:20:55'),
(10, 'Tudor', 'Laura', '0701234560', 'laura.tudor@email.com', 'Laptop ASUS ZenBook 14', 1, '2025-11-18 17:20:55'),
(11, 'Gurdis', 'Artemii', '079988192', 'gurdis.artemii@gmail.com', 'Laptop Asus rog stric g16', 1, '2025-11-18 17:44:36'),
(12, 'Cioban', 'Adrian', '0783738402', 'Cioban.adrian@gmail.com', 'Laptop Lenovo legion 5 pro', 2, '2025-11-18 17:50:26'),
(13, 'Colcotin', 'Ivan', '072366784', 'colcotin.ivan@gmail.com', 'Laptop Asus vivo book', 2, '2025-11-18 17:53:47');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
