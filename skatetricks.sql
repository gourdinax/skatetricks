-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 30 mai 2021 à 21:16
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `skatetricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `classement`
--

CREATE TABLE `classement` (
  `id_tricks` varchar(64) NOT NULL,
  `log_user` varchar(64) NOT NULL,
  `note` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classement`
--

INSERT INTO `classement` (`id_tricks`, `log_user`, `note`) VALUES
('900 (skateboarding)', 'Axel', 1),
('Casper (skateboarding)', 'Test', 1),
('Flip trick', 'Test', 1),
('900 (skateboarding)', 'Test', 1),
('Casper (skateboarding)', 'Axel', 1),
('Frontside and backside', 'Axel', 1),
('Kickturn', 'Axel', 1),
('50-50', 'Axel', 1),
('Flip trick', 'Axel', 1),
('Caveman (skateboarding)', 'Axel', 1),
('Frontside and backside', 'sisilafamille', 1),
('Flip trick', 'sisilafamille', 1),
('Test ', 'Axel', 1),
('Frontside and backside', 'TestProjet', 1);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id_tricks` varchar(64) NOT NULL,
  `id_commentaire` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(256) NOT NULL,
  `auteur` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `forum`
--

INSERT INTO `forum` (`id_tricks`, `id_commentaire`, `commentaire`, `auteur`) VALUES
('50-50', 1, 'Trop facile ce tricks', 'Axel'),
('50-50', 8, 'Super figure !', 'Test'),
('50-50', 9, 'J\'adore !', 'Axel'),
('50-50', 10, 'Je kiff ce tricks', 'Test'),
('900 (skateboarding)', 11, 'yoo', 'Axel'),
('Frontside and backside', 12, 'Lets goooooo !', 'Axel'),
('900 (skateboarding)', 13, 'oui', 'Axel'),
('Flip trick', 14, 'Trop easy', 'Axel'),
('Flip trick', 15, 'Moi je fait ca bien', 'sisilafamille'),
('900 (skateboarding)', 16, 'wojdioqs\r\n', 'Axel'),
('Frontside and backside', 17, 'Super figure !', 'Axel'),
('Frontside and backside', 18, 'Wow je kiff cette figure', 'TestProjet');

-- --------------------------------------------------------

--
-- Structure de la table `tricks`
--

CREATE TABLE `tricks` (
  `id_tricks` varchar(64) NOT NULL,
  `desc_tricks` text NOT NULL,
  `validation` tinyint(4) NOT NULL DEFAULT 0,
  `auteur` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tricks`
--

INSERT INTO `tricks` (`id_tricks`, `desc_tricks`, `validation`, `auteur`) VALUES
('360 flip à la corto', 'Le 360 flip est une combinaison entre une 360 pop shove-it (une rotation latérale a 360°) et un kickflip, c\'est un trick que l\'on apprend généralement après quelque temps de pratique. Pour faire un 360 flip, il faut réaliser un mouvement sec de la cheville dans le coin intérieur bas, avec le pied arrière et étendre son pied avant devant soi pour accueillir la planche en fin de rotation. Il faut aussi maintenir ses épaules droites ainsi que bien rester au dessus de la planche tout au long de la rotation. Bonne session et courage ;-)\r\n', 1, 'sisilafamille'),
('Daulphin flip', 'flip nimorte quoi', 1, 'Axel'),
('Le 540', 'Rotation de 540° dans n\'importe quel sens.', 0, 'TestProjet'),
('mel heel flip', 'mellymioum qui fait un saut derriere la board et qui roule en patate', 1, 'Axel'),
('Shov it', 'Le shove-it, ou varial, est une figure de skateboard inventée avant le ollie. Elle consiste à faire tourner la planche de 180° sous les pieds du skateur.\r\n\r\nPour faire un shove-it, le skateur se tient sur sa planche, saute légèrement et pousse l\'arrière de sa planche (appelé le tail) vers le bas et le côté. Bien que le tail ne touche pas le sol et que la planche ne s\'élève pas de plus de quelques centimètres dans les airs, le skateboard effectue une rapide rotation de 180°. Le skateboarder rattrape alors sa planche avec les pieds à l\'issue de la rotation et retombe dessus. ', 1, 'Axel'),
('SlimaneFlip', 'Kickflip 180', 0, 'Axel'),
('TestPHP', 'Ceci est un test pour le rapport', 0, 'Axel');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `log_user` varchar(64) NOT NULL,
  `pwd_user` text NOT NULL,
  `droit` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`log_user`, `pwd_user`, `droit`) VALUES
('Axel', '$2y$10$t/gfyYeXCiNtSgToLD8JJOXeVQses6tfYIweKPe8j.jyee/iEx3xC', 1),
('mellymioum', '$2y$10$0Sc.4PT4m/QPt/ldZGyKRelEZ0JWdawJNuo4nM9iRSXQ1JNc2YqN2', 0),
('sisilafamille', '$2y$10$dWKm1qJHO7lzA01.dOoen.iICErJnjtaPcPMPbFXNZt6oQ5ykvoM6', 0),
('Test', '$2y$10$PDuUTimgmc.RDilRln398eszTm20AdumS9avY8SNW2m6VQZgMfsDq', 0),
('Testeur', '$2y$10$2QxeWUbIwudVGAFUZ5t4BeejYvgkS3JLT87YqMLb8ikOdQ.P1Mjk2', 0),
('TestProjet', '$2y$10$u.KgjbTxpgTmc9UxDVD5NOkD0Qn79H78W9kYgNFUIz8tVfo5BHQ2i', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD UNIQUE KEY `id_commentaire` (`id_commentaire`);

--
-- Index pour la table `tricks`
--
ALTER TABLE `tricks`
  ADD PRIMARY KEY (`id_tricks`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`log_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_commentaire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
