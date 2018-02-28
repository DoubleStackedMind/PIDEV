<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commodite
 *
 * @ORM\Table(name="commodite")
 * @ORM\Entity
 */
class Commodite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commodite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommodite;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=false)
     */
    private $categorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="tel", type="integer", nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="horraire", type="string", length=255, nullable=false)
     */
    private $horraire;

    /**
     * @var boolean
     *
     * @ORM\Column(name="carte_credit", type="boolean", nullable=false)
     */
    private $carteCredit;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alcool", type="boolean", nullable=false)
     */
    private $alcool;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ticket_resto", type="boolean", nullable=false)
     */
    private $ticketResto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="non_fumeur", type="boolean", nullable=false)
     */
    private $nonFumeur;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=6000, nullable=false)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float", precision=10, scale=0, nullable=false)
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lng", type="float", precision=10, scale=0, nullable=false)
     */
    private $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=2555, nullable=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=false)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="zip", type="integer", nullable=false)
     */
    private $zip;


}

