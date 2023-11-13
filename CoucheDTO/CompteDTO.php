<?php

class CompteDTO {
    public $ID_compte;
    public $Type_compte;
    public $Solde;
    public $Date_ouverture;
    public $Client_ID;
    public $ID_lignecompte;

    public function __construct($ID_compte, $Type_compte, $Solde, $Date_ouverture, $Client_ID, $ID_lignecompte) {
        $this->N_compte = $N_compte;
        $this->Type_compte = $Type_compte;
        $this->Solde = $Solde;
        $this->Date_ouverture = $Date_ouverture;
        $this->Client_ID = $Client_ID;
        $this->ID_lignecompte = $ID_lignecompte;
    }

}


?>