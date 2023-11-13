<?php
require_once 'Database.php';

class AgenceDAO {
    private $db; // Assuming you have a database connection here

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert(AgenceDTO $agence) {
        $query = "INSERT INTO agences (ID_Agence, Nom_Agence, Adresse_agence, Telephone_agence, Email, code_BIC, Banque_id, ID_Conseiller) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssssss", $agence->ID_Agence, $agence->Nom_Agence, $agence->Adresse_agence, 
                          $agence->Telephone_agence, $agence->Email, $agence->code_BIC, 
                          $agence->Banque_id, $agence->ID_Conseiller);
        
        return $stmt->execute();
    }

    public function getById($id) {
        $query = "SELECT * FROM agences WHERE ID_Agence = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function update(AgenceDTO $agence) {
        $query = "UPDATE agences SET Nom_Agence = ?, Adresse_agence = ?, Telephone_agence = ?, 
                  Email = ?, code_BIC = ?, Banque_id = ?, ID_Conseiller = ? WHERE ID_Agence = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssssssss", $agence->Nom_Agence, $agence->Adresse_agence, 
                          $agence->Telephone_agence, $agence->Email, $agence->code_BIC, 
                          $agence->Banque_id, $agence->ID_Conseiller, $agence->ID_Agence);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM agences WHERE ID_Agence = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        
        return $stmt->execute();
    }
}

?>
