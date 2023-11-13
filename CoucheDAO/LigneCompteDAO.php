<?php
require_once 'Database.php';

class LigneCompteDAO {
    private $db; // Assuming you have a database connection here

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert(LigneCompteDTO $ligneCompte) {
        $query = "INSERT INTO lignecomptes (ID_lignecompte, Date_transation, montant, Type_transaction, Compte_id) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $ligneCompte->ID_lignecompte, $ligneCompte->Date_transation, 
                          $ligneCompte->montant, $ligneCompte->Type_transaction, $ligneCompte->Compte_id);
        
        return $stmt->execute();
    }

    public function getById($id) {
        $query = "SELECT * FROM lignecomptes WHERE ID_lignecompte = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function update(LigneCompteDTO $ligneCompte) {
        $query = "UPDATE lignecomptes SET Date_transation = ?, montant = ?, Type_transaction = ?, 
                  Compte_id = ? WHERE ID_lignecompte = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $ligneCompte->Date_transation, $ligneCompte->montant, 
                          $ligneCompte->Type_transaction, $ligneCompte->Compte_id, $ligneCompte->ID_lignecompte);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM lignecomptes WHERE ID_lignecompte = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        
        return $stmt->execute();
    }
}

?>
