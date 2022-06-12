-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 10 juin 2022 à 19:14
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inscription_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tbhistoriquepaie`
--

CREATE TABLE `tbhistoriquepaie` (
  `id` int(11) NOT NULL,
  `matricule` varchar(20) DEFAULT NULL,
  `datePaie` datetime DEFAULT current_timestamp(),
  `montant` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbhistoriquepaie`
--

INSERT INTO `tbhistoriquepaie` (`id`, `matricule`, `datePaie`, `montant`) VALUES
(35, 'younouss', '2022-06-10 17:10:32', '100000.00'),
(36, 'younouss', '2022-06-10 17:10:38', '3000.00'),
(37, 'younouss', '2022-06-10 17:10:46', '60000.00'),
(38, 'younouss', '2022-06-10 17:10:52', '4000.00'),
(39, 'badiallo', '2022-06-10 17:11:12', '500000.00'),
(40, 'marietou', '2022-06-10 17:11:29', '4500.00'),
(41, 'marietou', '2022-06-10 17:11:35', '78000.00'),
(42, 'marietou', '2022-06-10 17:11:49', '300000.00'),
(43, 'sounkalo', '2022-06-10 17:12:14', '250000.00'),
(44, 'sounkalo', '2022-06-10 17:12:20', '78000.00'),
(45, 'sounkalo', '2022-06-10 17:12:26', '172000.00');

-- --------------------------------------------------------

--
-- Structure de la table `tb_eleve`
--

CREATE TABLE `tb_eleve` (
  `matricule` varchar(20) NOT NULL,
  `prenom` varchar(80) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `dateNaissance` varchar(50) DEFAULT NULL,
  `classe` varchar(20) NOT NULL,
  `montantPaye` decimal(8,2) DEFAULT NULL,
  `quartier` varchar(80) NOT NULL,
  `contacTuteur` varchar(30) NOT NULL,
  `situation_classe` varchar(30) NOT NULL,
  `situation_ecole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_eleve`
--

INSERT INTO `tb_eleve` (`matricule`, `prenom`, `nom`, `sexe`, `dateNaissance`, `classe`, `montantPaye`, `quartier`, `contacTuteur`, `situation_classe`, `situation_ecole`) VALUES
('badiallo', 'Badiallo', 'Keita', 'female', '2022-06-06', '5eme', '500000.00', 'hamdallaye', '66035300', 'nouveau', 'ancien'),
('marietou', 'marietou', 'cisse', 'female', '1985-12-14', '6eme', '382500.00', 'hamdallaye', '66035300', 'redoublant', 'ancien'),
('sounkalo', 'sounkalo', 'sidibe', 'male', '2022-06-15', '5eme', '500000.00', 'bamako', '66035300', 'nouveau', 'nouveau'),
('younouss', 'Younouss', 'Bore', 'male', '2022-06-30', '7eme', '167000.00', 'Bamako', '66035300', 'nouveau', 'nouveau');

-- --------------------------------------------------------

--
-- Structure de la table `tb_frais`
--

CREATE TABLE `tb_frais` (
  `classe` varchar(20) NOT NULL,
  `montant` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tb_frais`
--

INSERT INTO `tb_frais` (`classe`, `montant`) VALUES
('1ere', '100000.00'),
('3eme', '200000.00'),
('5eme', '500000.00'),
('6eme', '500000.00'),
('7eme', '200000.00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tbhistoriquepaie`
--
ALTER TABLE `tbhistoriquepaie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`matricule`);

--
-- Index pour la table `tb_eleve`
--
ALTER TABLE `tb_eleve`
  ADD PRIMARY KEY (`matricule`),
  ADD KEY `fk2` (`classe`);

--
-- Index pour la table `tb_frais`
--
ALTER TABLE `tb_frais`
  ADD PRIMARY KEY (`classe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tbhistoriquepaie`
--
ALTER TABLE `tbhistoriquepaie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tbhistoriquepaie`
--
ALTER TABLE `tbhistoriquepaie`
  ADD CONSTRAINT `fk` FOREIGN KEY (`matricule`) REFERENCES `tb_eleve` (`matricule`);

--
-- Contraintes pour la table `tb_eleve`
--
ALTER TABLE `tb_eleve`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`classe`) REFERENCES `tb_frais` (`classe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
