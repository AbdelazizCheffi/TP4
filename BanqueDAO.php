<?php
require_once 'Database.php';

class BanqueDAO {
    private $db; // Assuming you have a database connection here

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert(BanqueDTO $banque) {
        $query = "INSERT INTO banques (ID_Banque, Nom_Banque, Adresse, code_BIC) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $banque->ID_Banque, $banque->Nom_Banque, $banque->Adresse, $banque->code_BIC);
        
        return $stmt->execute();
    }

    public function getById($id) {
        $query = "SELECT * FROM banques WHERE ID_Banque = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function update(BanqueDTO $banque) {
        $query = "UPDATE banques SET Nom_Banque = ?, Adresse = ?, code_BIC = ? WHERE ID_Banque = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ssss", $banque->Nom_Banque, $banque->Adresse, $banque->code_BIC, $banque->ID_Banque);
        
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM banques WHERE ID_Banque = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $id);
        
        return $stmt->execute();
    }
}

?>
