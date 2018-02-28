<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicules
 *
 * @ORM\Table(name="vehicules", uniqueConstraints={@ORM\UniqueConstraint(name="id_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Vehicules
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_vehicule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVehicule;

    /**
     * @var string
     *
     * @ORM\Column(name="immatriculation", type="string", length=50, nullable=false)
     */
    private $immatriculation;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=50, nullable=false)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="image_permis", type="string", length=255, nullable=false)
     */
    private $imagePermis;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_assurance", type="integer", nullable=false)
     */
    private $numAssurance;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=50, nullable=false)
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_places", type="integer", nullable=false)
     */
    private $nbPlaces;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;


}

