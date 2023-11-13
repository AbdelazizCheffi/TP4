<?php
// CompteDTO.php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="compte")
 */
class CompteDTO {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $ID_compte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type_compte;

    /**
     * @ORM\Column(type="integer")
     */
    private $Solde;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_ouverture;

    /**
     * @ORM\ManyToOne(targetEntity="ClientDTO")
     * @ORM\JoinColumn(name="Client_ID", referencedColumnName="id_client")
     */
    private $Client_ID;

    /**
     * @ORM\ManyToOne(targetEntity="LigneCompteDTO")
     * @ORM\JoinColumn(name="ID_lignecompte", referencedColumnName="ID_lignecompte")
     */
    private $ID_lignecompte;

    // Add getters and setters as needed
}
