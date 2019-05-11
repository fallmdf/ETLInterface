-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 11 mai 2019 à 08:35
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `dimention`
--

CREATE TABLE `dimention` (
  `nom_fait` varchar(10) NOT NULL,
  `Departement` int(11) NOT NULL,
  `Milieu` int(11) NOT NULL,
  `Type_etabli` int(11) NOT NULL,
  `Genre` int(11) NOT NULL,
  `Type_client` int(11) NOT NULL,
  `Mois` int(11) NOT NULL,
  `Annee` int(11) NOT NULL,
  `Periode` int(11) NOT NULL,
  `Banque` int(11) NOT NULL,
  `Pays` int(11) NOT NULL,
  `Age` int(11) NOT NULL,
  `Type_compte` int(11) NOT NULL,
  `Regions` int(11) NOT NULL,
  `Categorie_s` int(11) NOT NULL,
  `Type_Assura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dimention`
--

INSERT INTO `dimention` (`nom_fait`, `Departement`, `Milieu`, `Type_etabli`, `Genre`, `Type_client`, `Mois`, `Annee`, `Periode`, `Banque`, `Pays`, `Age`, `Type_compte`, `Regions`, `Categorie_s`, `Type_Assura`) VALUES
('Nbre_compt', 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 1, 2, 2, 0),
('Nbre_agent', 1, 1, 1, 0, 0, 0, 2, 0, 1, 2, 0, 0, 2, 0, 0),
('Nbre_clien', 2, 1, 1, 1, 1, 2, 2, 2, 2, 2, 1, 1, 2, 2, 1),
('Produits', 2, 2, 1, 2, 2, 1, 1, 2, 2, 2, 2, 2, 1, 2, 1),
('Nbre_banqu', 0, 0, 0, 0, 0, 0, 2, 0, 2, 1, 0, 0, 2, 0, 0),
('Nbre_credi', 2, 1, 2, 2, 2, 2, 1, 2, 2, 2, 2, 2, 2, 2, 0),
('Montants_c', 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
('Population', 2, 1, 0, 1, 0, 0, 2, 2, 0, 2, 2, 0, 2, 0, 0),
('Nbre_credi', 2, 2, 1, 2, 2, 2, 1, 2, 2, 2, 2, 2, 1, 1, 0),
('Nbre_monta', 2, 2, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0),
('Montants_e', 1, 1, 2, 1, 2, 2, 1, 2, 2, 1, 2, 2, 2, 2, 0),
('Nbre_sinis', 1, 2, 0, 2, 2, 1, 1, 2, 0, 2, 2, 0, 2, 2, 2),
('Montants_d', 2, 2, 2, 2, 2, 2, 1, 2, 2, 2, 2, 0, 2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dimentions`
--

CREATE TABLE `dimentions` (
  `Departement` varchar(12) NOT NULL,
  `Milieu` varchar(12) NOT NULL,
  `Type_etabli` varchar(12) NOT NULL,
  `Genre` varchar(2) NOT NULL,
  `Type_client` varchar(12) NOT NULL,
  `Mois` varchar(12) NOT NULL,
  `Annee` varchar(12) NOT NULL,
  `Periode` varchar(12) NOT NULL,
  `Banque` varchar(12) NOT NULL,
  `Pays` varchar(12) NOT NULL,
  `Age` int(11) NOT NULL,
  `Type_compte` varchar(12) NOT NULL,
  `Regions` varchar(12) NOT NULL,
  `Categorie_s` varchar(12) NOT NULL,
  `Type_Assura` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dimentions`
--

INSERT INTO `dimentions` (`Departement`, `Milieu`, `Type_etabli`, `Genre`, `Type_client`, `Mois`, `Annee`, `Periode`, `Banque`, `Pays`, `Age`, `Type_compte`, `Regions`, `Categorie_s`, `Type_Assura`) VALUES
('dakar', '', '', '', '', '', '', '', '', '', 0, '', '', '', ''),
('pikine', '', '', '', '', '', '', '', '', '', 0, '', '', '', ''),
('', 'urbain', '', '', '', '', '', '', '', '', 0, '', '', '', ''),
('', 'rural', '', '', '', '', '', '', '', '', 0, '', '', '', ''),
('', '', '', '', '', 'janvier', '', '', '', '', 0, '', '', '', ''),
('Thies', '', '', '', '', '', '', '', '', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `dim_inverse`
--

CREATE TABLE `dim_inverse` (
  `colonne_dim` varchar(10) NOT NULL,
  `Nbre_compte` int(10) NOT NULL,
  `Nbre_agent` int(11) NOT NULL,
  `Nbre_client` int(11) NOT NULL,
  `Produits` int(11) NOT NULL,
  `Nbre_banque` int(11) NOT NULL,
  `Nbre_credit_acc` int(11) NOT NULL,
  `Montants_credit` int(11) NOT NULL,
  `Population_act` int(11) NOT NULL,
  `Nbre_credit_douteux` int(11) NOT NULL,
  `Nbre_montant_douteux` int(11) NOT NULL,
  `Montants_encour` int(11) NOT NULL,
  `Nbre_sinistre` int(11) NOT NULL,
  `Montants_dedom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dim_inverse`
--

INSERT INTO `dim_inverse` (`colonne_dim`, `Nbre_compte`, `Nbre_agent`, `Nbre_client`, `Produits`, `Nbre_banque`, `Nbre_credit_acc`, `Montants_credit`, `Population_act`, `Nbre_credit_douteux`, `Nbre_montant_douteux`, `Montants_encour`, `Nbre_sinistre`, `Montants_dedom`) VALUES
('Departemen', 1, 1, 2, 2, 0, 2, 0, 2, 2, 2, 1, 1, 2),
('Milieu', 1, 1, 1, 2, 0, 1, 1, 1, 2, 2, 1, 2, 2),
('Type_etabl', 1, 1, 1, 1, 0, 2, 0, 0, 1, 1, 2, 0, 2),
('Genre', 1, 0, 1, 2, 0, 2, 0, 1, 2, 2, 1, 2, 2),
('Type_clien', 2, 0, 1, 2, 0, 2, 0, 0, 2, 2, 2, 2, 2),
('Mois', 2, 0, 2, 1, 0, 2, 0, 0, 2, 2, 2, 1, 2),
('Annee', 2, 2, 2, 1, 2, 1, 1, 2, 1, 2, 1, 1, 1),
('Periode', 2, 0, 2, 2, 0, 2, 0, 2, 2, 2, 2, 2, 2),
('Banque', 2, 1, 2, 2, 2, 2, 0, 0, 2, 2, 2, 0, 2),
('Pays', 2, 2, 2, 2, 1, 2, 0, 2, 2, 2, 1, 2, 2),
('Age', 2, 0, 1, 2, 0, 2, 0, 2, 2, 2, 2, 2, 2),
('Type_compt', 1, 0, 1, 2, 0, 2, 0, 0, 2, 2, 2, 0, 0),
('Regions', 2, 2, 2, 1, 2, 2, 0, 2, 1, 2, 2, 2, 2),
('Categorie_', 2, 0, 2, 2, 0, 2, 0, 0, 1, 2, 2, 2, 2),
('Type_Assur', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `faits`
--

CREATE TABLE `faits` (
  `Nbre_compte` int(10) NOT NULL,
  `Nbre_agent` int(11) NOT NULL,
  `Nbre_client` int(11) NOT NULL,
  `Produits` int(11) NOT NULL,
  `Nbre_banque` int(11) NOT NULL,
  `Nbre_credit_acc` int(11) NOT NULL,
  `Montants_credit` int(11) NOT NULL,
  `Population_act` int(11) NOT NULL,
  `Nbre_credit_douteux` int(11) NOT NULL,
  `Nbre_montant_douteux` int(11) NOT NULL,
  `Montants_encour` int(11) NOT NULL,
  `Nbre_sinistre` int(11) NOT NULL,
  `Montants_dedom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `faits`
--

INSERT INTO `faits` (`Nbre_compte`, `Nbre_agent`, `Nbre_client`, `Produits`, `Nbre_banque`, `Nbre_credit_acc`, `Montants_credit`, `Population_act`, `Nbre_credit_douteux`, `Nbre_montant_douteux`, `Montants_encour`, `Nbre_sinistre`, `Montants_dedom`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
