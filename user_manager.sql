/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

REPLACE INTO `users` (`id`, `fullname`, `phone`, `email`, `gender`, `password`) VALUES
	(2, 'Suhandi', '08878645346', 'suhandi@gmail.com', 'L', '$2y$10$dKQmlxwZES0P09jJl3pNnuqdRT8s2ff0PcBOPHTteLDud8fBqORdG'),
	(3, 'Nur Ifah', '08538866588', 'nurifah@gmail.com', 'P', '$2y$10$7sHTMOmWY0UA18NdV/I1eOOTnlk7O34EvH8F8ur3idOu1op9ZDAM.'),
	(5, 'Syaiful Malik', '08768867885', 'syaifulmalik@gmail.com', 'L', '$2y$10$3Oglzo50qOgpYJ5S5YteOuNsucqO6.WSTHGm8hwMt8/xVjV97dMxW'),
	(7, 'Dewi Dedew', '08675346617', 'ddewii@gmail.com', 'P', '$2y$10$2qsNEk4GtPMjH3fLMb3.W.uSLfqZLxdZqKnrDrqcs0aD9MAdb.Kh.'),
	(8, 'Ayu Tania', '08976572896', 'taniaayu@gmail.com', 'P', '$2y$10$Kttrm/GHwWgtweXs1h5zV.Po0tsfdxn7rAdmdaPr3ERAsHxX4ihYe');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
