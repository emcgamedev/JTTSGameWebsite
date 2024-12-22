-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 04:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `image`) VALUES
(4, 'Jake (Main Character)', 'Personalities: \r\n- Brave and Determined: Jake is fearless and dedicated to protecting the forest. - Caring and Protective: He is compassionate and treats the trees like family. \r\n- Resourceful: Jake uses his surroundings and clever thinking to defend the forest. \r\n- Focused: His goal is to safeguard the trees, no matter the challenge. \r\n\r\nBackstory: \r\n- Jake grew up in a peaceful forest, raised by the ancient trees and animals. As the forest\'s guardian, he vowed to protect it from the greed of illegal loggers. Now, he fights relentlessly to defend the trees, using his strength, wits, and the wisdom of the forest to ensure their survival. His mission is clear: protect the forest at all costs.', 'uploads/Jake_Render-removebg-preview.png'),
(5, 'Jack \"The Woodsman\" Bramble (Enemy)', 'Personality: \r\n- Jack is cunning, resourceful, and fiercely territorial. He is a loner who takes pride in his self-reliance and rugged survival skills. Although gruff and unwelcoming, he has a keen intellect and an eye for exploiting weaknesses. Jack views Jake, the guardian, as an obstacle to his goal of harvesting the forest\'s resources for his own gain.\r\n \r\nBackstory: \r\nJack Bramble is a skilled woodsman turned poacher who sees the forest as a resource to exploit. Once respected for his craftsmanship, he became consumed by greed, overharvesting and ignoring the damage he caused. After clashing with Jake, the forest\'s protector, Jack now uses his knowledge of the land and its harsh summer conditions to outsmart Jake and claim the forest for himself.', 'uploads/Enemy_1_Render-removebg-preview.png'),
(6, 'Great Axe', 'Great Axe is a two-handed weapon designed for delivering devastating, powerful strikes. Its wide, heavy blade makes it ideal for cleaving through multiple enemies or dealing massive damage to a single target. While slower to swing, its force and reach make it a fearsome choice for warriors who prioritize raw strength and heavy impact in battle.', 'uploads/Axe1.jpg'),
(7, 'Tomahawk', 'A Tomahawk is a versatile, lightweight axe with a single-sided blade, designed for both combat and utility. Its compact size allows for quick, precise strikes, making it ideal for throwing or close-quarters combat. Historically used by Native Americans, the tomahawk is a tool that balances practicality with deadly effectiveness.', 'uploads/Axe2.jpg'),
(8, 'Summer Map', 'The vibrant, lush forest of summer is Jake’s starting point as a young guardian. With bright green leaves and warm sunshine, this map introduces players to the basics of the game. However, the peace is shattered as loggers armed with simple axes and saws begin cutting down the trees. Jake must quickly learn to navigate the terrain, fight back with his basic weapons, and collect tokens to upgrade his abilities. It\'s a race against time to stop the destruction and protect the heart of the forest.	\r\n	 ', 'uploads/summer.png'),
(9, 'Autumn Map', 'As the forest enters autumn, the once vibrant trees turn golden and shed their leaves. The loggers, now armed with chainsaws, have become more aggressive, and the threat of forest fires adds a new level of danger. The fiery landscape makes it harder for Jake to protect the trees, and the loggers are more persistent, using fire to burn large areas. Jake must rely on upgraded weapons and new nature-based abilities to extinguish the flames and fend off the increasingly dangerous loggers.', 'uploads/autumn.png'),
(10, 'Winter Map', 'The harsh cold of winter arrives, and the forest is covered in snow, slowing Jake’s movements. The loggers, now equipped with heavy machinery like bulldozers and trucks, are determined to destroy the forest on a massive scale. As the environment grows more treacherous, Jake faces tougher enemies and larger, more destructive logging forces. Strategic upgrades are essential to keep up with the escalating threat, and Jake must use all his skills and the forest’s power to fight back and preserve his home.	', 'uploads/winter.png');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `username`, `password`) VALUES
(1, 'Ben Gabriel Hawid', 'gamedevph02@gmail.com', 'uccgamedev', '$2y$10$Q8NkdpqB8zxnLczOaeFayebDNo9ljpI7.sHSRqMts9/H4IL4fs/Sy'),
(2, 'piolo galindo', 'mamamokalbo@gmail.com', 'vigrid', '$2y$10$TnmN2LbDEA9KUPG1BuQvD.jZQ5iNFQm61hNfbDVg5X.ff/V7Xk1sK'),
(3, 'piolo g', 'piolo@gmail.com', 'vigrid1', '$2y$10$P4gHjnGJ7COuqba9J/9LPehQfa9Oz6uke6YhNHE3QUe/66oCVVaGq'),
(4, 'test1', 'test1@gmail.com', 'test1', '$2y$10$59pLIZaUyTRr1AAtnFe18.bv.J18Djq50/oKAghzQJnfNpHFSqcnW'),
(5, 'test2', 'test2@gmail.com', 'test_2', '$2y$10$C1Hc9bqhfjWiYJxiehxyR.NJ4S/HY0AUxNWlUCFrO.ln0PlwZusaW'),
(6, 'Maria Dela Cruz', 'mdc123@gmail.com', 'mdc123', '$2y$10$qcmnwp78nn8f7lmJz3c2ZOuJXaqHCGYoXhPU/7bgYAf30VAxI44mu'),
(7, 'Piolo Galindo', 'pio2020@gmail.com', 'pio2020', '$2y$10$67TGhkJb0iUGhQpmXjJtwesRSm96euVlXVEIicmFF4ttpCSd18Q82'),
(10, 'piolo galindo', 'ediwaw@gmail.com', 'piotato', '$2y$10$5nSF3X9st84Lbv44CIvKNuhTC7stVneJBoTFn4JfkBSkWRBcip6IO');

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `name`, `position`, `image`) VALUES
(9, 'Ben Gabriel S. Hawid', 'Lead Game Programmer and Project Manager', 'uploads/Hawid.jpg'),
(10, 'Irene R. Diano', 'Researcher and UI Designer', 'uploads/Diano.png'),
(11, 'Timotheo D. Marzol', 'Lead 3D Artist', 'uploads/Marzol.jpg'),
(12, 'Piolo J. Galindo', 'Game Programmer', 'uploads/Galindo.jpg'),
(13, 'Justine G. Barbosa', 'Sound Engineer', 'uploads/BarbosaFinal.png'),
(14, 'Bladimer P. Lozano', '3D Artist', 'uploads/LozanoFinal.png'),
(17, 'Angelo Lazo', '3D Artist', 'uploads/Lazo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `description`, `image`) VALUES
(5, 'Game Overview', 'Jake the Tree Shelter is an immersive 3D adventure and survival game where you take on the role of a guardian of the forest. Your mission is to defend the trees from relentless, greedy loggers who seek to destroy the natural beauty of the land. Use your skills to protect the forest and ensure its survival. Jake the Shelter offers an engaging experience that is available exclusively on PC.	 ', 'uploads/JTTS L1.png'),
(6, 'Target Audience	', 'Our 3D game is suitable for people aged 13+ and is delightful and easy to play.', 'uploads/blank-png.png'),
(7, 'Genre', '3d Adventure Game and Survival Game', 'uploads/summer.png'),
(8, 'Objectives', 'To protect the trees and yourself from the illegal loggers and kill all the enemies.', 'uploads/blank-png.png'),
(9, 'Game Progression', 'The player starts on level 1 in the first map(Summer), each map has 5 levels, unlocking all the levels by clearing each level. Jake can collect coins and health points by killing one of the enemies, these coins can be used to buy upgraded weapons in the shop.', 'uploads/Gameplay.png'),
(10, 'Play Flow', 'Game Start: \r\nThe Player selects the first level in the Summer Map, which is the starter map where they progress through various levels by defending the trees. The game begins with an introductory level that teaches the basic method. \r\n\r\nWave Progression:\r\nEnemies(Illegal loggers) start spawn randomly in the game, marching towards the trees. The player must defend the trees for getting logged. The player have a enemies progression bar where it indicates the total enemies spawned. As time progress more enemies will be spawned. Player can collect coins and health points after eliminating each enemy. \r\n\r\nEnd of level: \r\nthe level ends when the player successfully defeats all waves of enemies. If either the player loses his life and dies or fails to protect all the trees, the game will end as failed. After completing the level, the player will unlock the next level\r\n\r\nLevel Progression: \r\nThe player progresses to the next level, which introduces new types of enemies(illegal loggers). Each stage becomes progressively more difficult with more complex enemy behaviors, requiring the player to adopt their strategy. \r\n\r\nWinning the Game: \r\nthe player must complete all the levels to unlock the next map.', 'uploads/blank-png.png'),
(11, 'Character Movement', 'In \"Jake the Tree Shelter,\" character movement is simple and intuitive, using the following controls: \r\n\r\nW: Walk forward \r\nA: Turn left \r\nS: Move backward \r\nD: Turn right	', 'uploads/Controls.png'),
(12, 'Economy', 'Leaf Token (coin) Earned by defeating enemies or finding them in levels, tokens are used in the shop. Rewards: Defeated enemies may drop tokens or health points, aiding Jake\'s survival and combat.', 'uploads/SHOP coin (3).png'),
(13, 'Rules', '- Protect the trees against the enemies \r\n- Don’t die \r\n- Collect leaf tokens (coins) \r\n- Defeat all enemies on each map', 'uploads/blank-png.png');

-- --------------------------------------------------------

--
-- Table structure for table `installer`
--

CREATE TABLE `installer` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `installer`
--

INSERT INTO `installer` (`id`, `title`, `description`, `image`) VALUES
(8, 'Control System:', 'W - Walk Forward\r\nA - Turn Left\r\nS - Move Backward\r\nD - Turn Right\r\nC - Camera Angle\r\nQ - Planting a Seed\r\nR - Attack\r\nLeft Click(Mouse) - Throwing Weapon ', 'uploads/Controls.png'),
(9, 'Gameplay', 'Summer Map Gameplay Snapshot', 'uploads/Gameplay.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(2, 'Juan Dela Cruz', 'jdc202010@gmail.com', '$2y$10$LjpyZYa5vTrCaT93RP/7C.hfabPPSTclOpzslGkuY0ceW.kEcXKby'),
(3, 'piolo galindo', 'pio123@gmail.com', '$2y$10$FptYkXgPqzMa6nc3Cj0MW.nrubCV/X4q0i4Ua84yLl5.ZhGB4rOly'),
(4, 'Janella Salvador', 'janellasalvador@gmail.com', '$2y$10$JQNhSWuJfYWLekIj4lLbQutp0eMhrfJCg7gQb7JcOFTlRVwKzFJWS'),
(5, 'test_1', 'test1@gmail.com', '$2y$10$gv79SYELK0H9OAIOnhD8Hu7I.FhFbGJqgbYZiPrnWzU85Wfi0sZqe'),
(7, 'Ben Gabriel Hawid', 'carylcute@gmail.com', '$2y$10$3CQXqdGEhs84w9ylOgXUrOoIbnmICWmz6O/K4uj99wJANkddfuaHC'),
(8, 'Ben Gabriel', 'carylcutiee@gmail.com', '$2y$10$Cm1.dwHzPedj2RifjbxnK.KBdGGmTY0wz3JD5c8EKhfN5bh9aPe3i'),
(9, 'piolo galindo', 'ediwaw1@gmail.com', '$2y$10$M9lWEUfVQ.niJtvnlNR..OWUyFzSq9hELjajI0IVbwtxGXHEbTCuy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installer`
--
ALTER TABLE `installer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `installer`
--
ALTER TABLE `installer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
