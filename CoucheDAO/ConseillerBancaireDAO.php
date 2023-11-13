<?php
require_once 'Database.php';

class ConseillerBancaireDAO {
    private $db; // Assuming you have a database connection here

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert(ConseillerBancaireDTO $conseiller) {
        $query = "INSERT INTO conseillers (ID_Conseiller, Nom_Conseiller, Telephone_Conseiller, Email_Conseiller, Agence_id) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $conseiller->ID_Conseiller, $conseiller->Nom_Conseiller, 
                          $conseiller->Telephone_Conseiller, $conseiller->Email_Conseiller, $conseiller->Agence_id);
        
        return $stmt->execute();
    }

    public function getById($id) {
        $query = "SELECT * FROM conseillers WHERE ID_Conseiller = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function update(ConseillerBancaireDTO $conseiller) {
        $query = "UPDATE conseillers SET Nom_Conseiller = ?, Telephone_Conseiller = ?, 
                  Email_Conseiller = ?, Agence_id = ? WHERE ID_Conseiller = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("sssss", $conseiller->Nom_Conseiller, $conseiller->Telephone_Conseiller, 
                          $conseiller->Email_Conseiller, $conseiller->Agence_id, $conseiller->ID_Conseiller);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM conseillers WHERE ID_Conseiller = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        
        return $stmt->execute();
    }
}

?>
