-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Décembre 2016 à 14:39
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `autorisation`
--

CREATE TABLE `autorisation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `autorisation`
--

INSERT INTO `autorisation` (`id`, `libelle`) VALUES
(1, 'Accepté'),
(2, 'Refusé'),
(3, 'En attente');

-- --------------------------------------------------------

--
-- Structure de la table `type_users`
--

CREATE TABLE `type_users` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_users`
--

INSERT INTO `type_users` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'enregistre'),
(3, 'visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type_user` int(11) DEFAULT NULL,
  `acces` int(11) DEFAULT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int(10) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `couverture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `type_user`, `acces`, `pseudo`, `mdp`, `nom`, `prenom`, `adresse`, `ville`, `cp`, `mail`, `genre`, `couverture`) VALUES
(7, NULL, NULL, 'admin', 'aze', 'zaeazeaze', 'azeaze', 'azeazrn', 'efoinafnae', 88888, 'afeaef@xn--gaegez-hc1c', 'Shônen', 'D:\\xampp\\tmp\\php4643.tmp'),
(8, NULL, NULL, 'test1', 'aze', 'aze', 'aze', 'azeaze', 'azeazeza', 8888, 'aaa@gaa.f', 'Shônen', 'D:\\xampp\\tmp\\php8026.tmp'),
(9, NULL, NULL, 'test4', 'nnoi', 'aze', 'tets', 'fnir', 'ooo', 8888, 'fneri@gm.fr', 'Shônen', 'D:\\xampp\\tmp\\phpE56A.tmp'),
(10, NULL, NULL, 'test2', 'aze', 'aze', 'zae', 'aze', '888', 8888, 'zaeoaz@g.fr', 'Shônen', 'D:\\xampp\\tmp\\php6A8E.tmp'),
(11, NULL, NULL, 'test3', 'aze', 'aze', 'aze', 'aze', 'aze', 888, 'azaa@gg.fr', 'Shônen', 'D:\\xampp\\tmp\\php8127.tmp'),
(12, NULL, NULL, 'test5', 'aze', 'aze', 'aze', 'ettest', 'test', 8888, 'te@gej.fr', 'Shônen', 'D:\\xampp\\tmp\\php3868.tmp');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `autorisation`
--
ALTER TABLE `autorisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_users`
--
ALTER TABLE `type_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD KEY `fk_typeUsers` (`type_user`),
  ADD KEY `fk_acces` (`acces`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `autorisation`
--
ALTER TABLE `autorisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `type_users`
--
ALTER TABLE `type_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_user`) REFERENCES `type_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`acces`) REFERENCES `autorisation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
