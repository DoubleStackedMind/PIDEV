<?php

namespace GestionMatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matches
 *
 * @ORM\Table(name="matches", indexes={@ORM\Index(name="fk_equipa", columns={"EquipeA"}), @ORM\Index(name="fk_equipb", columns={"EquipeB"})})
 * @ORM\Entity
 */
class Matches
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Match", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMatch;

    /**
     * @var string
     *
     * @ORM\Column(name="Id_groupe", type="string", length=20, nullable=false)
     */
    private $idGroupe;

    /**
     * @var string
     *
     * @ORM\Column(name="Phase", type="string", length=20, nullable=false)
     */
    private $phase;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Match", type="date", nullable=false)
     */
    private $dateMatch;

    /**
     * @var string
     *
     * @ORM\Column(name="Lieu_Match", type="string", length=20, nullable=false)
     */
    private $lieuMatch;

    /**
     * @var string
     *
     * @ORM\Column(name="Resultat", type="string", length=20, nullable=false)
     */
    private $resultat;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="GestionEJBundle\Entity\Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EquipeA", referencedColumnName="IDEquipe")
     * })
     */
    private $equipea;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="GestionEJBundle\Entity\Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EquipeB", referencedColumnName="IDEquipe")
     * })
     */
    private $equipeb;


}

