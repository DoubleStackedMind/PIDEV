<?php

namespace GestionMatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe", uniqueConstraints={@ORM\UniqueConstraint(name="Nom_Groupe", columns={"Nom_Groupe"})}, indexes={@ORM\Index(name="fk_EquipeA", columns={"EquipeA"}), @ORM\Index(name="fk_EquipeB", columns={"EquipeB"}), @ORM\Index(name="fk_EquipeC", columns={"EquipeC"}), @ORM\Index(name="fk_EquipeD", columns={"EquipeD"})})
 * @ORM\Entity
 */
class Groupe
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Groupe", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nomGroupe;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_A", type="integer", nullable=false)
     */
    private $pointsA;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_B", type="integer", nullable=false)
     */
    private $pointsB;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_C", type="integer", nullable=false)
     */
    private $pointsC;

    /**
     * @var integer
     *
     * @ORM\Column(name="Points_D", type="integer", nullable=false)
     */
    private $pointsD;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_butA", type="integer", nullable=false)
     */
    private $nbrButa;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_butB", type="integer", nullable=false)
     */
    private $nbrButb;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_butC", type="integer", nullable=false)
     */
    private $nbrButc;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_butD", type="integer", nullable=false)
     */
    private $nbrButd;

    /**
     * @var integer
     *
     * @ORM\Column(name="W_A", type="integer", nullable=false)
     */
    private $wA;

    /**
     * @var integer
     *
     * @ORM\Column(name="W_B", type="integer", nullable=false)
     */
    private $wB;

    /**
     * @var integer
     *
     * @ORM\Column(name="W_C", type="integer", nullable=false)
     */
    private $wC;

    /**
     * @var integer
     *
     * @ORM\Column(name="W_D", type="integer", nullable=false)
     */
    private $wD;

    /**
     * @var integer
     *
     * @ORM\Column(name="D_A", type="integer", nullable=false)
     */
    private $dA;

    /**
     * @var integer
     *
     * @ORM\Column(name="D_B", type="integer", nullable=false)
     */
    private $dB;

    /**
     * @var integer
     *
     * @ORM\Column(name="D_C", type="integer", nullable=false)
     */
    private $dC;

    /**
     * @var integer
     *
     * @ORM\Column(name="D_D", type="integer", nullable=false)
     */
    private $dD;

    /**
     * @var integer
     *
     * @ORM\Column(name="L_A", type="integer", nullable=false)
     */
    private $lA;

    /**
     * @var integer
     *
     * @ORM\Column(name="L_B", type="integer", nullable=false)
     */
    private $lB;

    /**
     * @var integer
     *
     * @ORM\Column(name="L_C", type="integer", nullable=false)
     */
    private $lC;

    /**
     * @var integer
     *
     * @ORM\Column(name="L_D", type="integer", nullable=false)
     */
    private $lD;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="GestionEJBundle\Entity\Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EquipeD", referencedColumnName="IDEquipe")
     * })
     */
    private $equiped;

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
     *   @ORM\JoinColumn(name="EquipeC", referencedColumnName="IDEquipe")
     * })
     */
    private $equipec;

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

