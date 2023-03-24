-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mars 2023 à 14:30
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `entreprise3`
--

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id_employes` int(3) NOT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `genre` enum('f','m') NOT NULL,
  `service` varchar(30) DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  `salaire` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id_employes`, `prenom`, `nom`, `genre`, `service`, `date_embauche`, `salaire`) VALUES
(350, 'Jean-pierre', 'Laborde', 'm', 'direction', '1999-12-09', 5100),
(415, 'Thomas', 'Winter', 'm', 'commercial', '2000-05-03', 3750),
(417, 'Chloe', 'Dubar', 'f', 'production', '2001-09-05', 2100),
(491, 'Elodie', 'Fellier', 'f', 'secretariat', '2002-02-22', 1800),
(509, 'Fabrice', 'Grand', 'm', 'comptabilite', '2003-02-20', 2100),
(547, 'Melanie', 'Collier', 'f', 'commercial', '2004-09-08', 3300),
(592, 'Laura', 'Blanchet', 'f', 'direction', '2005-06-09', 4700),
(627, 'Guillaume', 'Miller', 'm', 'commercial', '2006-07-02', 2100),
(655, 'Celine', 'Perrin', 'f', 'commercial', '2006-09-10', 2900),
(699, 'Julien', 'Cottet', 'm', 'secretariat', '2007-01-18', 1590),
(701, 'Mathieu', 'Vignal', 'm', 'informatique', '2008-12-03', 2200),
(739, 'Thierry', 'Desprez', 'm', 'secretariat', '2009-11-17', 1700),
(780, 'Amandine', 'Thoyer', 'f', 'communication', '2010-01-23', 1700),
(802, 'Damien', 'Durand', 'm', 'informatique', '2010-07-05', 2450),
(876, 'Nathalie', 'Martin', 'f', 'juridique', '2012-01-12', 3400),
(900, 'Benoit', 'Lagarde', 'm', 'production', '2013-01-03', 2750);

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id_info` int(3) NOT NULL,
  `id_employes` int(3) NOT NULL,
  `profil` text DEFAULT NULL,
  `photo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id_info`, `id_employes`, `profil`, `photo`) VALUES
(1, 415, 'Il a l’habitude de gérer la clientèle même si cet aspect du métier n’est pas toujours simple au regard du niveau d’exigence demandé.', '415.jpg'),
(2, 491, 'Passionnée par l’automobile et secrétaire expérimentée, a eut l’occasion de lier ses deux centres d’intérêt avec le métier.', '491.jpg'),
(3, 699, 'Il maîtrise parfaitement les logiciels de facturation et de prise de rendez-vous, ce qui devrait lui permet de rapidement réussir les missions proposeées.\r\nTechnicien informatique confirmé  avec 6 ans d’expérience, spécialisé dans le support des parcs informatiques d’entreprises.', '699.jpg'),
(4, 417, 'est capable de mettre les besoins des clients et des utilisateurs au cœur de ses missions en s\'assurant d’instruire et former ces derniers aux bonnes pratiques.', '417.jpg'),
(5, 350, 'optimise les coûts et performances de maintenance avec une réactivitée impressionante en s\'assurant de la priorité des tâches attendues\r\nest capable de garantir aux clients un support rapide et précis pour réduire au mieux la durée des pannes et leur impact sur la productivité.', '350.jpg'),
(6, 509, 'Grâce à ses expériences passées et à sa formation il a pu acquérir les compétences nécessaires pour mener à bien les différentes missions.', '509.jpg'),
(7, 592, 'son parcours lui a donc permis de développer ses qualités relationnelles et ses compétences dans la matière ', '592.jpg'),
(8, 627, 'employe particulièrement motivé par son tarvail, dynamique et doté d\'une grande capacité d\'adaptation.', '627.jpg'),
(9, 655, 'Il a l’habitude de gérer la clientèle même si cet aspect du métier n’est pas toujours simple au regard du niveau d’exigence demandé.', '655.jpg'),
(10, 739, 'Passionné par l’automobile et secrétaire expérimenté, a eut l’occasion de lier ses deux centres d’intérêt avec le métier.', '739.jpg'),
(11, 701, 'Il maîtrise parfaitement les logiciels de facturation et de prise de rendez-vous, ce qui devrait lui permet de rapidement réussir les missions proposeées.', '701.jpg'),
(12, 780, 'Technicien informatique confirmé  avec 6 ans d’expérience, spécialisé dans le support des parcs informatiques d’entreprises.', '780.jpg'),
(13, 802, 'est capable de mettre les besoins des clients et des utilisateurs au cœur de ses missions en s\'assurant d’instruire et former ces derniers aux bonnes pratiques.', '802.jpg'),
(15, 876, 'est capable de garantir aux clients un support rapide et précis pour réduire au mieux la durée des pannes et leur impact sur la productivité.', '876.jpg'),
(16, 900, 'Grâce à ses expériences passées et à sa formation il a pu acquérir les compétences nécessaires pour mener à bien les différentes missions.', '900.jpg'),
(19, 547, 'son parcours lui a donc permis de développer ses qualités relationnelles et ses compétences dans la matière', '547.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id_employes`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_employes` (`id_employes`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id_employes` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id_info` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_ibfk_1` FOREIGN KEY (`id_employes`) REFERENCES `employes` (`id_employes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
