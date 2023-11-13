<?php

class LigneCompteDTO {
    public $ID_lignecompte;
    public $Date_transation;
    public $montant;
    public $Type_transaction;
    public $Compte_id;

    public function __construct($ID_lignecompte, $Date_transation, $montant, $Type_transaction, $Compte_id) {
        $this->ID_lignecompte = $ID_lignecompte;
        $this->Date_transation = $Date_transation;
        $this->montant = $montant;
        $this->Type_transaction = $Type_transaction;
        $this->Compte_id = $Compte_id;
    }

}


?>