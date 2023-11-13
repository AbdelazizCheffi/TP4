

--
-- Base de données : `banque`
--
CREATE DATABASE IF NOT EXISTS Banque;

USE Banque;
-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE `agence` (
  `ID_Agence` int(20) NOT NULL,
  `Nom_Agence` varchar(255) NOT NULL,
  `Adresse_agence` varchar(255) NOT NULL,
  `Telephone_agence` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `code_BIC` varchar(255) NOT NULL,
  `Banque_id` int(20) NOT NULL,
  `ID_Conseiller` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `banque`
--

CREATE TABLE `banque` (
  `ID_Banque` int(20) NOT NULL,
  `Nom_Banque` varchar(255) NOT NULL,
  `Adresse_Banque` varchar(255) NOT NULL,
  `code_BIC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(20) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse_postale` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Sexe` varchar(255) NOT NULL,
  `Salaire` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `date_naissance`, `adresse_postale`, `Email`, `Sexe`, `Salaire`) VALUES
(1, 'Doe', 'John', '1990-05-15', '123 Main St, City', 'john.doe@example.com', 'Male', 50000),
(2, 'Smith', 'Jane', '1985-09-20', '456 Elm St, Town', 'jane.smith@example.com', 'Female', 60000),
(3, 'Johnson', 'Michael', '1978-12-10', '789 Oak St, Village', 'michael.johnson@example.com', 'Male', 75000),
(4, 'Williams', 'Emily', '1992-03-25', '101 Pine St, County', 'emily.williams@example.com', 'Female', 55000),
(5, 'Brown', 'Chris', '1980-07-05', '111 Cedar St, Town', 'chris.brown@example.com', 'Male', 65000);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `ID_compte` int(20) NOT NULL,
  `Type_compte` varchar(255) NOT NULL,
  `Solde` int(20) NOT NULL,
  `Date_ouverture` date NOT NULL,
  `Client_ID` int(20) NOT NULL,
  `ID_lignecompte` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `conseiller_bancaire`
--

CREATE TABLE `conseiller_bancaire` (
  `ID_Conseiller` int(20) NOT NULL,
  `Nom_Conseiller` varchar(255) NOT NULL,
  `Telephone_Conseiller` varchar(255) NOT NULL,
  `Email_Conseiller` varchar(255) NOT NULL,
  `Agence_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `lignecompte`
--

CREATE TABLE `lignecompte` (
  `ID_lignecompte` int(20) NOT NULL,
  `Date_transation` date NOT NULL,
  `Montant` int(20) NOT NULL,
  `Type_transaction` varchar(255) NOT NULL,
  `Compte_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`ID_Agence`),
  ADD KEY `Banque_id` (`Banque_id`),
  ADD KEY `ID_Conseiller` (`ID_Conseiller`);

--
-- Index pour la table `banque`
--
ALTER TABLE `banque`
  ADD PRIMARY KEY (`ID_Banque`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`ID_compte`),
  ADD KEY `Client_ID` (`Client_ID`),
  ADD KEY `ID_lignecompte` (`ID_lignecompte`);

--
-- Index pour la table `conseiller_bancaire`
--
ALTER TABLE `conseiller_bancaire`
  ADD PRIMARY KEY (`ID_Conseiller`),
  ADD KEY `Agence_id` (`Agence_id`);

--
-- Index pour la table `lignecompte`
--
ALTER TABLE `lignecompte`
  ADD PRIMARY KEY (`ID_lignecompte`),
  ADD KEY `Compte_id` (`Compte_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `agence`
--
ALTER TABLE `agence`
  MODIFY `ID_Agence` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `banque`
--
ALTER TABLE `banque`
  MODIFY `ID_Banque` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `ID_compte` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `conseiller_bancaire`
--
ALTER TABLE `conseiller_bancaire`
  MODIFY `ID_Conseiller` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lignecompte`
--
ALTER TABLE `lignecompte`
  MODIFY `ID_lignecompte` int(20) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agence`
--
ALTER TABLE `agence`
  ADD CONSTRAINT `agence_ibfk_1` FOREIGN KEY (`Banque_id`) REFERENCES `banque` (`ID_Banque`),
  ADD CONSTRAINT `agence_ibfk_2` FOREIGN KEY (`ID_Conseiller`) REFERENCES `conseiller_bancaire` (`ID_Conseiller`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`Client_ID`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`ID_lignecompte`) REFERENCES `lignecompte` (`ID_lignecompte`);

--
-- Contraintes pour la table `conseiller_bancaire`
--
ALTER TABLE `conseiller_bancaire`
  ADD CONSTRAINT `conseiller_bancaire_ibfk_1` FOREIGN KEY (`Agence_id`) REFERENCES `agence` (`ID_Agence`);

--
-- Contraintes pour la table `lignecompte`
--
ALTER TABLE `lignecompte`
  ADD CONSTRAINT `lignecompte_ibfk_1` FOREIGN KEY (`Compte_id`) REFERENCES `compte` (`ID_compte`);
COMMIT;

