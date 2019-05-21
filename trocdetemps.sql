-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 sep. 2018 à 23:06
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `trocdetemps`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCateg` int(11) NOT NULL,
  `nomCateg` varchar(150) DEFAULT NULL,
  `photoCateg` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCateg`, `nomCateg`, `photoCateg`) VALUES
(1, 'Musique', 'https://image.noelshack.com/fichiers/2018/22/4/1527779154-musique.jpg'),
(2, 'Bricoloage', 'https://image.noelshack.com/fichiers/2018/22/4/1527779154-bricolage.jpg'),
(3, 'Langues', 'https://image.noelshack.com/fichiers/2018/22/4/1527779154-langue.jpg'),
(4, 'Jardinage', 'https://image.noelshack.com/fichiers/2018/22/4/1527779154-jardinage.jpg'),
(5, 'Informatique', 'https://image.noelshack.com/fichiers/2018/22/4/1527779154-informatique.jpg'),
(6, 'Baby-Sitting', 'https://image.noelshack.com/fichiers/2018/34/6/1535210816-babysitting.jpg'),
(7, 'Aide ménagère', 'https://image.noelshack.com/fichiers/2018/34/6/1535211119-aide-menagere.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `deal`
--

CREATE TABLE `deal` (
  `idDeal` int(11) NOT NULL,
  `dateDeal` date NOT NULL,
  `noteUser1` int(11) NOT NULL,
  `noteUser2` int(11) NOT NULL,
  `idOffreUser1` int(11) NOT NULL,
  `idOffreUser2` int(11) NOT NULL,
  `idEtat` int(11) NOT NULL,
  `idCreateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `deal`
--

INSERT INTO `deal` (`idDeal`, `dateDeal`, `noteUser1`, `noteUser2`, `idOffreUser1`, `idOffreUser2`, `idEtat`, `idCreateur`) VALUES
(1, '2018-06-29', 9, 3, 2, 5, 2, 5),
(2, '2018-06-29', 8, 0, 2, 9, 1, 2),
(3, '2018-06-30', 2, 6, 6, 8, 2, 2),
(4, '2018-08-17', 7, 3, 8, 6, 1, 1),
(5, '2018-08-31', 9, 8, 2, 5, 2, 5),
(6, '2018-09-11', 0, 0, 5, 2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `idDemande` int(11) NOT NULL,
  `descriptionDemande` varchar(300) DEFAULT NULL,
  `dateDemande` date DEFAULT NULL,
  `idService` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`idDemande`, `descriptionDemande`, `dateDemande`, `idService`, `idUser`) VALUES
(1, 'Carrelage à poser dans salle de bain. Environ 30 M2', '2018-06-06', 14, 5),
(2, 'Fuite sous l\'évier de la cuisine', '2018-06-11', 16, 5),
(3, 'Souhaite apprendre l\'alphabet', '2018-06-11', 1, 2),
(4, 'A besoin d\'une tondeuse pour son jardin', '2018-06-11', 11, 2),
(5, 'Souhaite apprendre le langage C# avec NetBeans', '2018-06-14', 20, 1),
(6, 'Apprendre de façon ludique', '2018-06-11', 1, 1),
(7, 'Besoin personnel de développer des sites', '2018-06-07', 19, 5),
(8, 'Besoin d\'ajouter de la RAM à mon PC', '2018-06-19', 18, 5),
(9, 'Apprendre le piano pour débutant', '2018-06-27', 7, 2),
(10, 'J\'ai besoin que l\'on me repasse mes costumes de la semaine ', '2018-08-06', 24, 4),
(11, 'Souvent en déplacement, j\'ai besoin de ménage pour un appartement de 50 m²', '2018-08-16', 25, 3),
(12, 'J\'ai besoin de 8 chemises par semaine', '2018-08-24', 24, 6),
(13, '2 enfants à déposer tous les matins à l\'école', '2018-08-14', 26, 6),
(14, 'Besoin de tondre environ 500 M²', '2018-08-21', 11, 4),
(15, 'Souhaite apprendre les bases de l\'espagnol. Envie de savoir tenir une conversation courante', '2018-08-10', 6, 6),
(16, 'Demo avec SIO2', '2018-09-11', 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `idEtat` int(11) NOT NULL,
  `nomEtat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`idEtat`, `nomEtat`) VALUES
(1, 'En cours'),
(2, 'Validé');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `descriptionOffre` varchar(300) DEFAULT NULL,
  `dateOffre` date DEFAULT NULL,
  `idService` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`idOffre`, `descriptionOffre`, `dateOffre`, `idService`, `idUser`) VALUES
(1, 'Pratique la guitare depuis 10 ans', '2018-06-14', 9, 5),
(2, 'Propose un cours pour l\'écrit', '2018-05-26', 1, 5),
(3, 'Cours pour débutants ou confirmés', '2018-06-14', 8, 5),
(4, 'Tondeuse électrique. Etat neuf', '2018-06-01', 11, 5),
(5, 'Toutes réparations possibles. Très bien équipé.', '2018-06-10', 16, 2),
(6, 'Expert sur le framework .NET', '2018-06-11', 20, 2),
(7, 'Expert sur le pack office Microsoft', '2018-06-11', 17, 1),
(8, 'Pratique le piano depuis 25 ans', '2018-06-13', 7, 1),
(9, 'Des bases jusqu\'à l\'apprentissage d\'un framework', '2018-06-04', 19, 1),
(10, 'Des études de paysagiste. Toutes tailles d\'arbres', '2018-06-15', 12, 5),
(11, 'Expert Word depuis la version 97', '2018-06-13', 17, 5),
(12, 'demo avec thomas et pierre', '2018-06-13', 6, 5),
(13, 'Dispo tous les matins pour amener votre enfant de votre domicile à l\'école', '2018-08-26', 27, 4),
(14, 'Donne cours de saxo que je pratique depuis 15 ans. Pour débutants ou confirmés', '2018-08-22', 10, 4),
(15, 'Tous types de travaux de maçonnerie. Petits ou gros œuvres.', '2018-08-15', 21, 3),
(16, 'Parle couramment. Je sais aussi écrire. Pour débutants ou experts.', '2018-08-26', 5, 3),
(17, 'Bricoleur dans l\'âme. J\'adore monter des meubles.', '2018-08-16', 22, 6),
(18, 'Suite office ou Pack Office de chez Microsoft. Tous les logiciels.', '2018-08-28', 17, 6),
(19, 'Certifié sur le framework .NET. Des bases jusqu\'à du perfectionnement sur le langage C#', '2018-08-26', 20, 4),
(20, 'Sait démonter et remonter un PC. Capable de dépanner logiciel et matériel', '2018-08-09', 18, 4),
(21, 'Repasse tous types de linges même les chemises', '2018-08-12', 24, 3),
(22, 'Équipé pour élaguer vos arbres même à grande hauteur.', '2018-08-07', 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idService` int(11) NOT NULL,
  `nomService` varchar(150) DEFAULT NULL,
  `photoService` varchar(150) NOT NULL,
  `idCateg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `nomService`, `photoService`, `idCateg`) VALUES
(1, 'Cours de chinois', 'https://image.noelshack.com/fichiers/2018/22/4/1527787818-chinois.png', 3),
(2, 'Cours d\'arabe', 'https://image.noelshack.com/fichiers/2018/22/4/1527787817-arabe.jpg', 3),
(5, 'Cours d\'allemand', 'https://image.noelshack.com/fichiers/2018/22/4/1527787817-allemand.jpg', 3),
(6, 'Cours d\'espagnol', 'https://image.noelshack.com/fichiers/2018/22/4/1527787818-espagnol.jpg', 3),
(7, 'Cours de piano', 'https://image.noelshack.com/fichiers/2018/22/4/1527787847-piano.jpg', 1),
(8, 'Cours de solfège', 'https://image.noelshack.com/fichiers/2018/22/4/1527787865-solfege.jpg', 1),
(9, 'Cours de guitare', 'https://image.noelshack.com/fichiers/2018/22/4/1527787818-guitare.jpg', 1),
(10, 'Cours de saxophone', 'https://image.noelshack.com/fichiers/2018/22/4/1527787865-saxophone.jpg', 1),
(11, 'Prêt d\'une tondeuse', 'https://image.noelshack.com/fichiers/2018/22/4/1527787865-tondeuse.jpg', 4),
(12, 'Taille d\'arbres', 'https://image.noelshack.com/fichiers/2018/22/4/1527787817-arbre.jpg', 4),
(13, 'Prêt d\'une perceuse', 'https://image.noelshack.com/fichiers/2018/22/4/1527787847-perceuse.jpg', 2),
(14, 'Pose de carrelage', 'https://image.noelshack.com/fichiers/2018/22/4/1527787817-carrelage.jpg', 2),
(15, 'Montage meubles', 'https://image.noelshack.com/fichiers/2018/22/4/1527787818-meuble.jpg', 2),
(16, 'Réparation plomberie', 'https://image.noelshack.com/fichiers/2018/22/4/1527787847-plomberie.jpg', 2),
(17, 'Cours bureautique', 'https://image.noelshack.com/fichiers/2018/22/4/1527787817-bureautique.jpg', 5),
(18, 'Réparations diverses', 'https://image.noelshack.com/fichiers/2018/22/4/1527787847-reparation.jpg', 5),
(19, 'Cours PHP', 'https://image.noelshack.com/fichiers/2018/22/4/1527787847-php.png', 5),
(20, 'Cours C#', 'https://image.noelshack.com/fichiers/2018/22/4/1527787817-c.jpg', 5),
(21, 'Maçonnerie', 'https://image.noelshack.com/fichiers/2018/34/6/1535212514-maconnerie.jpg', 2),
(22, 'Meubles en kit', 'https://image.noelshack.com/fichiers/2018/34/6/1535212514-montage.jpg', 2),
(23, 'Pose de parquet', 'https://image.noelshack.com/fichiers/2018/34/6/1535212515-parquet.jpg', 2),
(24, 'Repassage', 'https://image.noelshack.com/fichiers/2018/34/6/1535212515-repassage.jpg', 7),
(25, 'Nettoyage', 'https://image.noelshack.com/fichiers/2018/34/6/1535212514-nettoyage.jpg', 7),
(26, 'Garde d\'enfants', 'https://image.noelshack.com/fichiers/2018/34/6/1535212514-gardeenfants.jpg', 6),
(27, 'Accompagnement enfants', 'https://image.noelshack.com/fichiers/2018/34/6/1535212514-accompagnementenfant.png', 6);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nomUser` varchar(150) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) NOT NULL,
  `photoUser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nomUser`, `login`, `mdp`, `photoUser`) VALUES
(1, 'Castaing Sabine', 'sabine', 's123', 'https://image.noelshack.com/fichiers/2018/22/4/1527779776-avatar2.jpg'),
(2, 'Girard Michel', 'michel', 'm123', 'https://image.noelshack.com/fichiers/2018/22/4/1527779776-avatar3.jpg'),
(3, 'Gand Christophe', 'christophe', 'c123', 'https://image.noelshack.com/fichiers/2018/22/4/1527779776-avatar1.jpg'),
(4, 'Royer Matthieu', 'matthieu', 'm123', 'https://image.noelshack.com/fichiers/2018/22/4/1527779776-avatar4.jpg'),
(5, 'Alison Virginie', 'virginie', 'v123', 'https://image.noelshack.com/fichiers/2018/22/4/1527779777-avatar7.jpg'),
(6, 'Bonnet Jean-François', 'jean', 'j123', 'https://image.noelshack.com/fichiers/2018/22/4/1527779777-avatar8.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCateg`);

--
-- Index pour la table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`idDeal`),
  ADD KEY `Deal_Etat1_FK` (`idEtat`),
  ADD KEY `idOffreUser1` (`idOffreUser1`,`idOffreUser2`),
  ADD KEY `idOffreUser2` (`idOffreUser2`),
  ADD KEY `idCreateur` (`idCreateur`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `Demande_Service_FK` (`idService`),
  ADD KEY `Demande_User0_FK` (`idUser`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`idEtat`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`),
  ADD KEY `Offre_Service_FK` (`idService`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`),
  ADD KEY `Service_Categorie_FK` (`idCateg`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCateg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `deal`
--
ALTER TABLE `deal`
  MODIFY `idDeal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `idEtat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `Deal_Etat1_FK` FOREIGN KEY (`idEtat`) REFERENCES `etat` (`idEtat`),
  ADD CONSTRAINT `deal_ibfk_1` FOREIGN KEY (`idOffreUser1`) REFERENCES `offre` (`idOffre`),
  ADD CONSTRAINT `deal_ibfk_2` FOREIGN KEY (`idOffreUser2`) REFERENCES `offre` (`idOffre`),
  ADD CONSTRAINT `deal_ibfk_3` FOREIGN KEY (`idCreateur`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `Demande_Service_FK` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`),
  ADD CONSTRAINT `Demande_User0_FK` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `Offre_Service_FK` FOREIGN KEY (`idService`) REFERENCES `service` (`idService`),
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `Service_Categorie_FK` FOREIGN KEY (`idCateg`) REFERENCES `categorie` (`idCateg`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
