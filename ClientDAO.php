<?php

require_once 'Database.php';


class ClientDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }


    public function findById($id_client) {
        $stmt = $this->conn->prepare("SELECT * FROM client WHERE id_client = :id_client");
        $stmt->bindParam(':id_client', $id_client);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll() {
        $stmt = $this->conn->prepare("SELECT * FROM client");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(ClientDTO $clientDto) {
        $stmt = $this->conn->prepare("INSERT INTO client (nom_client, prenom_client, date_naissance, adresse_postale, Email, Sexe, Salaire) 
                                      VALUES (:nom_client, :prenom_client, :date_naissance, :adresse_postale, :Email, :Sexe, :Salaire)");
        $stmt->bindParam(':nom_client', $clientDto->nom_client);
        $stmt->bindParam(':prenom_client', $clientDto->prenom_client);
        $stmt->bindParam(':date_naissance', $clientDto->date_naissance);
        $stmt->bindParam(':adresse_postale', $clientDto->adresse_postale);
        $stmt->bindParam(':Email', $clientDto->Email);
        $stmt->bindParam(':Sexe', $clientDto->Sexe);
        $stmt->bindParam(':Salaire', $clientDto->Salaire);
        $stmt->execute();
    }

    public function update(ClientDTO $clientDto) {
        $stmt = $this->conn->prepare("UPDATE client SET nom_client = :nom_client, prenom_client = :prenom_client, 
                                      date_naissance = :date_naissance, adresse_postale = :adresse_postale, 
                                      Email = :Email, Sexe = :Sexe, Salaire = :Salaire 
                                      WHERE id_client = :id_client");
        $stmt->bindParam(':nom_client', $clientDto->nom_client);
        $stmt->bindParam(':prenom_client', $clientDto->prenom_client);
        $stmt->bindParam(':date_naissance', $clientDto->date_naissance);
        $stmt->bindParam(':adresse_postale', $clientDto->adresse_postale);
        $stmt->bindParam(':Email', $clientDto->Email);
        $stmt->bindParam(':Sexe', $clientDto->Sexe);
        $stmt->bindParam(':Salaire', $clientDto->Salaire);
        $stmt->bindParam(':id_client', $clientDto->id_client);
        $stmt->execute();
    }

    public function delete($id_client) {
        $stmt = $this->conn->prepare("DELETE FROM client WHERE id_client = :id_client");
        $stmt->bindParam(':id_client', $id_client);
        $stmt->execute();
    }
}
