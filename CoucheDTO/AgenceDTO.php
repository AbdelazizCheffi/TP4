<?php
class AgenceDTO {
    public $ID_Agence;
    public $Nom_Agence;
    public $Adresse_agence;
    public $Telephone_agence;
    public $Email;
    public $code_BIC;
    public $Banque_id;
    public $ID_Conseiller;

    public function __construct($ID_Agence, $Nom_Agence, $Adresse_agence, $Telephone_agence, $Email, $code_BIC, $Banque_id, $ID_Conseiller) {
        $this->ID_Agence = $ID_Agence;
        $this->Nom_Agence = $Nom_Agence;
        $this->Adresse_agence = $Adresse_agence;
        $this->Telephone_agence = $Telephone_agence;
        $this->Email = $Email;
        $this->code_BIC = $code_BIC;
        $this->Banque_id = $Banque_id;
        $this->ID_Conseiller = $ID_Conseiller;
    }

}

?>