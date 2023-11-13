<?php
// BanqueDTO.php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="banque")
 */
class BanqueDTO {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $ID_Banque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_Banque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse_Banque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_BIC;

    // Add getters and setters as needed
}
