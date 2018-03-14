-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 14, 2018 lúc 03:15 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `2012vn_module_a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(300) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `title_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `image`, `title_image`) VALUES
(1, 'Starters\r\n', 'starters', 'davys-classic-prawn-cocktail.jpg\r\n', 'Davy\'s classic prawn cocktail'),
(2, 'Salads\r\n', 'salads', 'gordons-salad.jpg\r\n', 'Gordon\'s Salad'),
(3, 'Sandwiches\r\n', 'sandwiches', 'grilled-goats-cheese.jpg\r\n', 'Grilled goat\'s cheese'),
(4, 'Main courses', 'main-courses', 'kings-wings.jpg\r\n', 'Kings Wings'),
(5, 'Beef\r\n', 'beef', 't-bone-steak.jpg\r\n', 'T-Bone steak'),
(6, 'Desserts', 'desserts', 'english-cheese-board.jpg\r\n', 'English cheese board');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(300) NOT NULL,
  `alias` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `rate` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `cate_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `title`, `alias`, `description`, `price`, `rate`, `score`, `image`, `cate_id`) VALUES
(1, 'Davy\'s classic prawn cocktail', 'davys-classic-prawn-cocktail', 'A selection of prawns, marie rose sauce with a hint of Manzanilla\r\n', 7.85, 7, 24, 'davys-classic-prawn-cocktail.jpg', 1),
(2, 'Warm grilled goat\'s cheese crostini\r\n', 'warm-grilled-goats-cheese-crostini', 'on balsamic dressed mixed leaf\r\n', 5.55, 5, 21, 'warm-grilled-goats-cheese-crostini.jpg', 1),
(3, 'Plate of Scottish smoked salmon\r\n', 'plate-of-scottish-smoked-salmon', 'with lambs leaf dressed with balsamic syrup and pink peppercorns\r\n', 7.95, 8, 32, 'plate-of-scottish-smoked-salmon.jpg', 1),
(4, 'Gordon\'s Salad\r\n', 'gordons-salad', 'Chicory, gorgonzola cheese, pear and dandelion salad with a whole grain mustard dressing\r\n', 9.95, 2, 7, 'gordons-salad.jpg', 2),
(5, 'Grilled Salmon Salad\r\n', 'grilled-salmon-salad', 'Mixed greens with sliced avocado, bacon, cherry tomato, onion and Cheshire with toasted sesame citrus vinaigrette\r\n', 23.95, 2, 6, 'grilled-salmon-salad.jpg', 2),
(6, 'Cobb Salad\r\n', 'cobb-salad', 'Our take on the classic - grilled chicken, hickory-smoked bacon, Stilton cheese, tomato, boiled egg, black olive, English peas, avocado and fresh chives, with a choice of dressing on the side\r\n', 21.15, 4, 17, 'cobb-salad.jpg', 2),
(7, 'Grilled goat\'s cheese\r\n', 'grilled-goats-cheese', 'Warm goat\'s cheese served with roast Mediterranean vegetables and pesto on a toasted ciabatta\r\n', 7.95, 5, 21, 'grilled-goats-cheese.jpg', 3),
(8, 'Cumberland sausage\r\n', 'cumberland-sausage', '6oz Cumberland sausage ring served with red onions, in toasted sourdough bloomer\r\n', 7.25, 4, 13, 'cumberland-sausage.jpg', 3),
(9, 'Kings Wings\r\n', 'kings-wings', 'A dozen spiced chicken wings tossed in our special Guinness Hoisin BBQ sauce, with sesame seeds and green onions\r\n', 15.95, 2, 5, 'kings-wings.jpg', 4),
(10, 'Sausage Rolls\r\n', 'sausage-rolls', 'Banger sausage wrapped in pastry served with our house BBQ and Scotch eggs\r\n', 18.35, 0, 0, 'sausage-rolls.jpg', 4),
(11, 'Bangers and mash\r\n', 'bangers-and-mash', 'Cumberland sausages with traditional mashed potatoes and onion gravy\r\n', 10.95, 2, 6, 'bangers-and-mash.jpg', 4),
(12, 'Fish and chips\r\n', 'fish-n-chips', 'Line caught haddock in beer batter served with chipped potatoes and minted pea puree\r\n', 12.95, 0, 0, 'fish-n-chips.jpg', 4),
(13, 'New season lamb cutlets\r\n', 'new-season-lamb-cutlets', 'Roasted vegetables, sweet potato and chive mash\r\n', 16.25, 0, 0, 'new-season-lamb-cutlets.jpg', 4),
(14, 'Side orders\r\n', 'side-orders', '\"Choose from:\r\n- chipped potatoes or fries\r\n- Jersey Royal potatoes\r\n- traditional mash\r\n- seasonal vegetable selection\r\n- green beans\r\n- mixed leaf salad with house dressing\r\n(Price is for each portion)\"\r\n', 2.85, 0, 0, 'side-orders.jpg', 4),
(15, 'T-Bone steak\r\n', 't-bone-steak', '400g served on the bone. Made up of both sirloin and fillet offering you both the tenderness of the fillet and the flavour of the sirloin\r\n', 28.95, 0, 0, 't-bone-steak.jpg', 5),
(16, 'Sirloin steak\r\n', 'sirloin-steak', 'A juicy, tasty and tender cut of 240g fully trimmed and aged for 21 days\r\n', 23.55, 0, 0, 'sirloin-steak.jpg', 5),
(17, 'Ribeye steak\r\n', 'ribeye-steak', 'Rich marbling is the secret to this succulent and tasty cut of 220g, aged for 28 days\r\n', 20.15, 1, 2, 'ribeye-steak.jpg', 5),
(18, 'English cheese board\r\n', 'english-cheese-board', 'A selection of four British cheeses served with biscuits and green tomato and apple chutney\r\n', 9.75, 2, 7, 'english-cheese-board.jpg', 6),
(19, 'Chocolate tart\r\n', 'chocolate-tart', 'Delicious tart with clotted cream and raspberry coulis\r\n', 5.85, 1, 5, 'chocolate-tart.jpg', 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_category` (`cate_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_category` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
