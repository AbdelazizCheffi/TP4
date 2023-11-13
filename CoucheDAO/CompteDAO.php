<?php
require_once 'Database.php';

class CompteDAO {
    private $db; // Assuming you have a database connection here

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert(CompteDTO $compte) {
        $query = "INSERT INTO comptes (ID_compte, Type_compte, Solde, Date_ouverture, Client_ID, ID_lignecompte) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssss", $compte->ID_compte, $compte->Type_compte, $compte->Solde, 
                          $compte->Date_ouverture, $compte->Client_ID, $compte->ID_lignecompte);
        
        return $stmt->execute();
    }

    public function getById($id) {
        $query = "SELECT * FROM comptes WHERE ID_compte = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function update(CompteDTO $compte) {
        $query = "UPDATE comptes SET Type_compte = ?, Solde = ?, Date_ouverture = ?, 
                  Client_ID = ?, ID_lignecompte = ? WHERE ID_compte = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssss", $compte->Type_compte, $compte->Solde, $compte->Date_ouverture, 
                          $compte->Client_ID, $compte->ID_lignecompte, $compte->ID_compte);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM comptes WHERE ID_compte = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        
        return $stmt->execute();
    }
}

?>
