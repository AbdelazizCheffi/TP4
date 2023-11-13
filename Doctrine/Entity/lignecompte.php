<?php
// LigneCompteDTO.php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="lignecompte")
 */
class LigneCompteDTO {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $ID_lignecompte;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_transation;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type_transaction;

    /**
     * @ORM\ManyToOne(targetEntity="CompteDTO")
     * @ORM\JoinColumn(name="Compte_id", referencedColumnName="ID_compte")
     */
    private $Compte_id;

    // Add getters and setters as needed
}
