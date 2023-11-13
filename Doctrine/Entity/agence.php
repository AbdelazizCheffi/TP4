<?php
// AgenceDTO.php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="agence")
 */
class AgenceDTO {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $ID_Agence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_Agence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse_agence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone_agence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_BIC;

    /**
     * @ORM\ManyToOne(targetEntity="BanqueDTO")
     * @ORM\JoinColumn(name="Banque_id", referencedColumnName="ID_Banque")
     */
    private $Banque_id;

    /**
     * @ORM\ManyToOne(targetEntity="ConseillerBancaireDTO")
     * @ORM\JoinColumn(name="ID_Conseiller", referencedColumnName="ID_Conseiller")
     */
    private $ID_Conseiller;

    // Add getters and setters as needed
}
