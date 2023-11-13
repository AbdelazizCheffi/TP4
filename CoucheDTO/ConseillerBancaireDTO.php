<?php


class ConseillerBancaireDTO {
    public $ID_Conseiller;
    public $Nom_Conseiller;
    public $Telephone_Conseiller;
    public $Email_Conseiller;
    public $Agence_id;

    public function __construct($ID_Conseiller, $Nom_Conseiller, $Telephone_Conseiller, $Email_Conseiller, $Agence_id) {
        $this->ID_Conseiller = $ID_Conseiller;
        $this->Nom_Conseiller = $Nom_Conseiller;
        $this->Telephone_Conseiller = $Telephone_Conseiller;
        $this->Email_Conseiller = $Email_Conseiller;
        $this->Agence_id = $Agence_id;
    }


}

?>