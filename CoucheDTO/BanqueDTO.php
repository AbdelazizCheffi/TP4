<?php
class BanqueDTO {
    public $ID_Banque;
    public $Nom_Banque;
    public $Adresse;
    public $code_BIC;

    public function __construct($ID_Banque, $Nom_Banque, $Adresse, $code_BIC) {
        $this->ID_Banque = $ID_Banque;
        $this->Nom_Banque = $Nom_Banque;
        $this->Adresse = $Adresse;
        $this->code_BIC = $code_BIC;
    }

}
?>