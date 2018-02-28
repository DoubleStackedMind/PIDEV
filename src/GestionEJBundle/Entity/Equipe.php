<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity
 */
class Equipe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDEquipe", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idequipe;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Capital", type="string", length=255, nullable=false)
     */
    private $capital;

    /**
     * @var integer
     *
     * @ORM\Column(name="Participations", type="integer", nullable=false)
     */
    private $participations;

    /**
     * @var string
     *
     * @ORM\Column(name="Continent", type="string", length=255, nullable=false)
     */
    private $continent;

    /**
     * @var integer
     *
     * @ORM\Column(name="Victoires", type="integer", nullable=false)
     */
    private $victoires;

    /**
     * @var string
     *
     * @ORM\Column(name="Entraineur", type="string", length=255, nullable=false)
     */
    private $entraineur;

    /**
     * @var integer
     *
     * @ORM\Column(name="ClassementFifa", type="integer", nullable=false)
     */
    private $classementfifa;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchesCM", type="integer", nullable=false)
     */
    private $matchescm;

    /**
     * @var integer
     *
     * @ORM\Column(name="ButsCM", type="integer", nullable=false)
     */
    private $butscm;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchWins", type="integer", nullable=false)
     */
    private $matchwins;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchLosses", type="integer", nullable=false)
     */
    private $matchlosses;

    /**
     * @var integer
     *
     * @ORM\Column(name="MatchDraws", type="integer", nullable=false)
     */
    private $matchdraws;

    /**
     * @var string
     *
     * @ORM\Column(name="Drapeau", type="string", length=2555, nullable=false)
     */
    private $drapeau;

    /**
     * @var string
     *
     * @ORM\Column(name="PhotoEquipe", type="string", length=255, nullable=false)
     */
    private $photoequipe;


}

