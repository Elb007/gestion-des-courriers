-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 26 fév. 2020 à 14:56
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestioncourrier`
--

-- --------------------------------------------------------

--
-- Structure de la table `affectation`
--

CREATE TABLE `affectation` (
  `id_affectation` int(32) NOT NULL,
  `id_courrier` int(32) NOT NULL,
  `service` varchar(50) NOT NULL,
  `personne` varchar(50) NOT NULL,
  `instructions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affectation`
--

INSERT INTO `affectation` (`id_affectation`, `id_courrier`, `service`, `personne`, `instructions`) VALUES
(58, 13, 'Service 2', 'Personne 2', 'teeeest'),
(59, 4, 'Service 2', 'Personne 2', 'bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `autorisation`
--

CREATE TABLE `autorisation` (
  `idRole` int(32) NOT NULL,
  `idPersonne` int(32) NOT NULL,
  `ajout` int(32) NOT NULL,
  `suppression` int(32) NOT NULL,
  `modification` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `autorisation`
--

INSERT INTO `autorisation` (`idRole`, `idPersonne`, `ajout`, `suppression`, `modification`) VALUES
(1, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `courrier`
--

CREATE TABLE `courrier` (
  `id` int(32) NOT NULL,
  `refExp` varchar(50) NOT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `objet` varchar(50) DEFAULT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `daterecu` date DEFAULT NULL,
  `dateajout` date DEFAULT NULL,
  `expediteur` varchar(50) DEFAULT NULL,
  `souExpediteur` varchar(50) DEFAULT NULL,
  `nature` varchar(50) DEFAULT NULL,
  `typeCourrier` varchar(50) DEFAULT NULL,
  `motscle` varchar(50) DEFAULT NULL,
  `observation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `courrier`
--

INSERT INTO `courrier` (`id`, `refExp`, `ref`, `objet`, `contenu`, `daterecu`, `dateajout`, `expediteur`, `souExpediteur`, `nature`, `typeCourrier`, `motscle`, `observation`) VALUES
(4, 'ensup-100', 'ens/01', 'Demande', 'uploads/342567.txt', '2020-02-06', '2020-02-04', 'Oussama', 'Abdelilah', 'Personnelle', 'Entrant', 'courrier', 'Demande'),
(13, 'ensup-2011', 'aa/23', 'Objet', 'uploads/1678097.docx', '2020-02-14', '2020-02-14', 'Oussama', 'Abdelilah', 'Administrative', 'Entrant', 'courrier', 'Objet'),
(31, 'uu-10', 'hh_5', 'objet', 'uploads/2035030.pdf', '2020-02-15', '2020-02-05', 'Abdelilah', 'Brahim', 'Personnelle', 'Entrant', 'gsd', 'objet');

-- --------------------------------------------------------

--
-- Structure de la table `expediteur`
--

CREATE TABLE `expediteur` (
  `id_expediteur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `expediteur`
--

INSERT INTO `expediteur` (`id_expediteur`, `nom`, `prenom`) VALUES
(1, 'Miraoui', 'Qamir'),
(2, 'Abdelilah', 'Hiadara'),
(3, 'Oussama', 'Tazi');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `id_personne` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id_personne`, `nom`, `prenom`) VALUES
(1, 'Personne 1', 'Personne 1'),
(2, 'Personne 2', 'Personne 2');

-- --------------------------------------------------------

--
-- Structure de la table `personrole`
--

CREATE TABLE `personrole` (
  `id` int(32) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personrole`
--

INSERT INTO `personrole` (`id`, `nom`, `prenom`, `username`, `pwd`) VALUES
(1, 'Bureau', 'ordre', 'bureau', '123'),
(2, 'directeur', 'generale', 'directeur', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `idRole` int(32) NOT NULL,
  `bo` varchar(50) NOT NULL,
  `directeur` varchar(50) NOT NULL,
  `usager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idRole`, `bo`, `directeur`, `usager`) VALUES
(1, 'bo1', 'dr1', 'ug1'),
(2, 'bo2', 'dr2', 'ug2'),
(3, 'bo3', 'dr3', 'ug3');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id_service` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id_service`, `libelle`, `adresse`, `telephone`) VALUES
(1, 'Service 1', 'Casa', '0600000000'),
(2, 'Service 2', 'Rabat', '0600000000');

-- --------------------------------------------------------

--
-- Structure de la table `sousexpediteur`
--

CREATE TABLE `sousexpediteur` (
  `identifiant` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `id_expediteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sousexpediteur`
--

INSERT INTO `sousexpediteur` (`identifiant`, `nom`, `prenom`, `id_expediteur`) VALUES
(1, 'Brahim', 'Hamdi', 1),
(2, 'Amal', 'Haidara', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id_affectation`),
  ADD KEY `id_courrier` (`id_courrier`);

--
-- Index pour la table `autorisation`
--
ALTER TABLE `autorisation`
  ADD KEY `idRole` (`idRole`),
  ADD KEY `idPersonne` (`idPersonne`);

--
-- Index pour la table `courrier`
--
ALTER TABLE `courrier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `expediteur`
--
ALTER TABLE `expediteur`
  ADD PRIMARY KEY (`id_expediteur`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `personrole`
--
ALTER TABLE `personrole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `sousexpediteur`
--
ALTER TABLE `sousexpediteur`
  ADD PRIMARY KEY (`identifiant`),
  ADD KEY `id_expedi` (`id_expediteur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id_affectation` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `courrier`
--
ALTER TABLE `courrier`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `expediteur`
--
ALTER TABLE `expediteur`
  MODIFY `id_expediteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `personnes`
--
ALTER TABLE `personnes`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personrole`
--
ALTER TABLE `personrole`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sousexpediteur`
--
ALTER TABLE `sousexpediteur`
  MODIFY `identifiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`id_courrier`) REFERENCES `courrier` (`id`);

--
-- Contraintes pour la table `autorisation`
--
ALTER TABLE `autorisation`
  ADD CONSTRAINT `autorisation_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`),
  ADD CONSTRAINT `autorisation_ibfk_2` FOREIGN KEY (`idPersonne`) REFERENCES `personrole` (`id`);

--
-- Contraintes pour la table `sousexpediteur`
--
ALTER TABLE `sousexpediteur`
  ADD CONSTRAINT `sousexpediteur_ibfk_1` FOREIGN KEY (`id_expediteur`) REFERENCES `expediteur` (`id_expediteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
