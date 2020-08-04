-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 04 août 2020 à 08:08
-- Version du serveur :  10.4.12-MariaDB
-- Version de PHP : 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `content_category`
--

CREATE TABLE `content_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `content_product`
--

CREATE TABLE `content_product` (
  `product_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `content_type`
--

CREATE TABLE `content_type` (
  `category_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200727091054', '2020-07-28 11:15:56', 248),
('DoctrineMigrations\\Version20200731080336', '2020-07-31 10:03:58', 64),
('DoctrineMigrations\\Version20200731080640', '2020-07-31 10:06:44', 112),
('DoctrineMigrations\\Version20200731080948', '2020-07-31 10:09:54', 82),
('DoctrineMigrations\\Version20200731083423', '2020-07-31 10:34:30', 132),
('DoctrineMigrations\\Version20200731091132', '2020-07-31 11:11:40', 126),
('DoctrineMigrations\\Version20200731092042', '2020-07-31 11:20:46', 69),
('DoctrineMigrations\\Version20200731093213', '2020-07-31 11:32:17', 213),
('DoctrineMigrations\\Version20200731093557', '2020-07-31 11:36:10', 479),
('DoctrineMigrations\\Version20200803144429', '2020-08-03 16:44:41', 162);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technical` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_seller` tinyint(1) NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `special` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `technical`, `best_seller`, `featured`, `hot`, `special`, `created_at`, `updated_at`) VALUES
(1, 'Keyboard', 'Ma super description', '{\"mechanique\":false}', 0, 0, 0, 0, '2020-07-31 11:47:31', '2020-07-31 11:47:35'),
(4, 'chromebook', 'pc portable pas comme les autres', '{\"etat\":\"occasion\"}', 1, 1, 1, 1, '2020-07-31 11:49:59', '2020-07-31 11:50:00'),
(5, 'Disque dur', 'Disque dur externe', NULL, 1, 1, 1, 1, '2020-08-03 09:25:03', '2020-08-03 09:25:03'),
(6, 'Clef usb', 'Clef usb', NULL, 0, 0, 1, 1, '2020-08-03 09:35:21', '2020-08-03 09:35:21'),
(7, 'Carte mère', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\r\n                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, 0, 0, 0, 1, '2020-08-03 09:35:35', '2020-08-03 09:35:35'),
(8, 'Carte graphique', NULL, NULL, 0, 0, 0, 0, '2020-08-03 09:35:52', '2020-08-03 09:35:52'),
(9, 'Processeur', NULL, NULL, 0, 0, 0, 0, '2020-08-03 09:36:09', '2020-08-03 09:36:09');

-- --------------------------------------------------------

--
-- Structure de la table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `link`) VALUES
(5, 6, '/assets/images/products/usbKey.jpg'),
(6, 6, '/assets/images/products/usbKey2.jpg'),
(7, 6, '/assets/images/products/usbKey3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `content_category`
--
ALTER TABLE `content_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `IDX_54FBF32E4584665A` (`product_id`),
  ADD KEY `IDX_54FBF32E12469DE2` (`category_id`);

--
-- Index pour la table `content_product`
--
ALTER TABLE `content_product`
  ADD PRIMARY KEY (`product_id`,`product_type_id`),
  ADD KEY `IDX_C42DD1E4584665A` (`product_id`),
  ADD KEY `IDX_C42DD1E14959723` (`product_type_id`);

--
-- Index pour la table `content_type`
--
ALTER TABLE `content_type`
  ADD PRIMARY KEY (`category_id`,`product_type_id`),
  ADD UNIQUE KEY `UNIQ_41BCBAEC14959723` (`product_type_id`),
  ADD KEY `IDX_41BCBAEC12469DE2` (`category_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `content_category`
--
ALTER TABLE `content_category`
  ADD CONSTRAINT `FK_54FBF32E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_54FBF32E4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `content_product`
--
ALTER TABLE `content_product`
  ADD CONSTRAINT `FK_C42DD1E14959723` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`),
  ADD CONSTRAINT `FK_C42DD1E4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `content_type`
--
ALTER TABLE `content_type`
  ADD CONSTRAINT `FK_41BCBAEC12469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_41BCBAEC14959723` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
