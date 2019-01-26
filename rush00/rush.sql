SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `rush` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rush`;

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `category` text NOT NULL,
  `name` text NOT NULL,
  `value` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `goods` (`category`, `name`, `value`, `image`) VALUES
('CPU', 'Intel Core I9 Xth', 500, 'cpu1.jpeg'),
('CPU', 'Intel Core I9 9th', 450, 'cpu2.jpg'),
('Laptop', 'HP', 1199, 'laptop1.jpeg'),
('Laptop', 'AlienWare', 2099, 'laptop5.jpg'),
('Laptop', 'Mustang', 1999, 'laptop4.png'),
('Laptop', 'Asus', 1499, 'laptop5.jpg'),
('RAM', 'Corsair 8GB', 79, 'ram1.jpg'),
('CPU', 'Intel Core 2 Duo', 79, 'cpu3.jpg'),
('RAM', 'TridentZ 8GB', 99, 'ram3.jpg'),
('PC', 'Asus X', 600, 'pc1.jpg'),
('PC', 'Asus XS', 750, 'pc2.jpg'),
('PC', 'FUNNY PC NAME', 999, 'pc3.png'),
('PC', 'AlienWare PC', 999, 'pc4.jpg'),
('PC', 'Lenovo QSX', 299, 'pc5.jpeg'),
('PC', 'Dell x-500', 1199, 'pc6.jpg');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `name` text NOT NULL,
  `ordering` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `login`, `pass`) VALUES
(1, 'admin', '62113f4bee29d32330ea0c3ff6a59f6e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
