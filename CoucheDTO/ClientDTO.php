<?php

class ClientDTO {
    public $id_client;
    public $nom_client;
    public $prenom_client;
    public $date_naissance;
    public $adresse_postale;
    public $Email;
    public $Sexe;
    public $Salaire;

    public function __construct($id_client, $nom_client, $prenom_client, $date_naissance, $adresse_postale, $Email, $Sexe, $Salaire) {
        $this->id_client = $id_client;
        $this->nom_client = $nom_client;
        $this->prenom_client = $prenom_client;
        $this->date_naissance = $date_naissance;
        $this->adresse_postale = $adresse_postale;
        $this->Email = $Email;
        $this->Sexe = $Sexe;
        $this->Salaire = $Salaire;
    }
}

?>
