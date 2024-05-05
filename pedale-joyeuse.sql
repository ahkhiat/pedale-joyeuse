-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : dim. 05 mai 2024 à 23:35
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pedale-joyeuse`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) DEFAULT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `adresse1`, `adresse2`, `code_postal`, `ville`, `email`, `telephone`) VALUES
(2, 'Andrieux', 'Benjamin', '73 avenue de Toulon', '', 13006, 'MARSEILLE 06', 'andrieux.benjamin1@gmail.com', '0667882151'),
(3, 'auber', 'jonathan', '54 rue bidon', '', 13000, 'Marseille', 'john@john.fr', '0404040404');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `prix_ht` decimal(10,2) NOT NULL,
  `prix_ttc` decimal(10,2) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `date`, `prix_ht`, `prix_ttc`, `id_client`, `id_user`) VALUES
(1, '2023-05-10 12:45:42', 0.00, 0.00, 2, 1),
(2, '2023-05-10 14:05:44', 0.00, 0.00, 2, 1),
(3, '2023-05-10 14:07:41', 0.00, 0.00, 2, 1),
(4, '2023-05-10 14:11:06', 0.00, 0.00, 2, 1),
(5, '2023-05-10 14:11:21', 0.00, 0.00, 2, 1),
(6, '2023-05-10 14:12:27', 0.00, 0.00, 2, 1),
(7, '2023-05-10 14:16:25', 0.00, 0.00, 2, 1),
(8, '2023-05-10 14:17:32', 0.00, 0.00, 2, 1),
(9, '2023-05-10 14:19:41', 0.00, 0.00, 2, 1),
(10, '2023-05-10 14:21:06', 0.00, 0.00, 2, 1),
(11, '2023-05-10 14:34:57', 0.00, 0.00, 2, 1),
(12, '2023-05-10 15:21:44', 0.00, 0.00, 2, 1),
(13, '2023-05-10 15:23:10', 0.00, 0.00, 2, 1),
(14, '2023-05-10 15:31:29', 0.00, 0.00, 2, 1),
(15, '2023-05-10 15:35:05', 0.00, 0.00, 2, 1),
(16, '2023-05-10 15:45:43', 0.00, 0.00, 2, 1),
(17, '2023-05-11 08:40:52', 0.00, 0.00, 2, 1),
(18, '2023-05-11 09:16:15', 216.20, 259.44, 2, 1),
(19, '2023-05-11 12:44:49', 256.30, 295.56, 2, 1),
(20, '2023-05-11 12:58:22', 827.20, 988.64, 3, 1),
(21, '2023-05-12 08:51:11', 150.00, 176.00, 3, 3),
(22, '2023-05-15 10:48:55', 235.80, 282.96, 2, 3),
(26, '2024-05-03 00:00:00', 325.00, 374.00, 2, 3),
(27, '2024-05-03 00:00:00', 120.50, 144.60, 2, 3),
(28, '2024-04-12 00:00:00', 177.00, 212.40, 2, 3),
(29, '2024-05-04 00:00:00', 15.00, 16.50, 2, 1),
(30, '2024-05-04 00:00:00', 554.00, 644.80, 3, 1),
(31, '2024-05-04 00:00:00', 416.50, 499.80, 2, 1),
(32, '2024-05-04 00:00:00', 252.00, 302.40, 2, 1),
(33, '2024-05-04 00:00:00', 1100.00, 1320.00, 2, 2),
(34, '2024-05-04 00:00:00', 55.00, 66.00, 2, 3),
(35, '2024-05-05 00:00:00', 110.00, 132.00, 2, 3),
(36, '2024-05-05 00:00:00', 131.00, 157.20, 3, 3),
(37, '2024-04-12 00:00:00', 106.20, 127.44, 2, 1),
(38, '2024-03-22 00:00:00', 70.80, 84.96, 3, 1),
(39, '2024-01-26 00:00:00', 90.00, 108.00, 2, 1),
(40, '2024-02-13 00:00:00', 421.90, 498.28, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_facture`
--

CREATE TABLE `ligne_facture` (
  `quantite` int(11) NOT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_facture` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ligne_facture`
--

INSERT INTO `ligne_facture` (`quantite`, `id_produit`, `id_facture`) VALUES
(2, 1, 11),
(3, 3, 11),
(2, 1, 12),
(4, 4, 12),
(2, 1, 13),
(2, 2, 14),
(2, 3, 15),
(3, 5, 15),
(2, 1, 16),
(3, 3, 16),
(2, 1, 17),
(3, 3, 17),
(2, 1, 18),
(3, 4, 18),
(2, 4, 19),
(3, 2, 19),
(1, 3, 19),
(3, 4, 20),
(1, 2, 20),
(2, 3, 20),
(10, 1, 20),
(2, 1, 21),
(1, 2, 21),
(3, 1, 22),
(2, 4, 22),
(3, 1, 26),
(4, 2, 26),
(1, 3, 27),
(1, 1, 27),
(5, 4, 28),
(1, 15, 29),
(5, 2, 30),
(10, 4, 30),
(3, 12, 31),
(8, 11, 31),
(4, 1, 31),
(9, 5, 32),
(20, 1, 33),
(1, 1, 34),
(2, 1, 35),
(2, 3, 36),
(3, 4, 37),
(2, 4, 38),
(5, 11, 39),
(2, 1, 40),
(2, 2, 40),
(3, 3, 40),
(1, 4, 40);

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`id`, `nom`, `prenom`, `password`, `role`) VALUES
(1, 'Dupond', 'Benjamin', '$2y$10$L3v.Q085/m47cHmfEtgrSuVMFEZyyhuiSW9quJUtW4VO8dlF73G62', 1),
(3, 'admin', '', '$2y$10$qhazqDzGeXscn.qCaJQBUOUmtZ9i64X0ZuHBAwTU1eTipnO0c1Qhu', 2),
(4, 'Martin', 'Charles', '1223456', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `reference` varchar(5) NOT NULL,
  `price_ht` decimal(4,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `alerte` int(11) NOT NULL,
  `id_tva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `name`, `reference`, `price_ht`, `stock`, `alerte`, `id_tva`) VALUES
(1, 'Doussofess', 'SD', 55.00, 20, 15, 2),
(2, 'Duracuir', 'SC', 40.00, 15, 10, 1),
(3, 'Voiclair', 'VC', 65.50, 17, 15, 2),
(4, 'Korn2vach', 'GT', 35.40, 14, 12, 2),
(5, 'MacGyver', 'MG', 28.00, 9, 10, 2),
(11, 'MainDouce', 'MD', 18.00, 11, 10, 2),
(12, 'PiedDacier', 'PDA', 17.50, 12, 5, 2),
(15, 'JambePoilue', 'JP', 15.00, 20, 25, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE `tva` (
  `id` int(11) NOT NULL,
  `taux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`id`, `taux`) VALUES
(1, 10),
(2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `pswd`, `nom`, `prenom`, `created_at`) VALUES
(1, 'ahkhiat@hotmail.com', 'admin', '$2y$10$vytOQo7Icr9BtTpaawDy1OhpN4iqT/SCio5GUk5dfL8aT0jvwB8L.', 'Leung', 'Thierry', '2024-05-03 15:02:08'),
(2, 'jean@gmail.com', 'vendeur', '$2y$10$h/nBQHo57EJHxNEK8Qi7LOuJwC0A76f.JG0M.2hRwQph88X16Crc2', 'Martin', 'Jean', '2024-05-03 15:09:06'),
(3, 'macron@gmail.com', 'vendeur', '$2y$10$rY757GXrZu0IIHTEyphfl.TabZxCFGZ3XhuQeAER0EocWJcvNvJxa', 'Macron', 'Manu', '2024-05-03 16:42:47');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_clients_id_clients_facture` (`id_client`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `ligne_facture`
--
ALTER TABLE `ligne_facture`
  ADD KEY `FK_produits_id_produits_ligne_facture` (`id_produit`),
  ADD KEY `FK_facture_id_facture_ligne_facture` (`id_facture`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tva_id_tva_produits` (`id_tva`);

--
-- Index pour la table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `tva`
--
ALTER TABLE `tva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `FK_clients_id_clients_facture` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `ligne_facture`
--
ALTER TABLE `ligne_facture`
  ADD CONSTRAINT `FK_facture_id_facture_ligne_facture` FOREIGN KEY (`id_facture`) REFERENCES `facture` (`id`),
  ADD CONSTRAINT `FK_produits_id_produits_ligne_facture` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_tva_id_tva_produits` FOREIGN KEY (`id_tva`) REFERENCES `tva` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
