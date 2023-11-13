<?php
// ConseillerBancaireDTO.php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="conseiller_bancaire")
 */
class ConseillerBancaireDTO {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $ID_Conseiller;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_Conseiller;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone_Conseiller;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email_Conseiller;

    /**
     * @ORM\ManyToOne(targetEntity="AgenceDTO")
     * @ORM\JoinColumn(name="Agence_id", referencedColumnName="ID_Agence")
     */
    private $Agence_id;

    // Add getters and setters as needed
}
