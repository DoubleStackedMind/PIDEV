<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur", indexes={@ORM\Index(name="fk_equipe", columns={"ID_Equipe"})})
 * @ORM\Entity
 */
class Joueur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IDJoueur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idjoueur;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="Numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datedenaissance", type="date", nullable=false)
     */
    private $datedenaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="LieuNaissance", type="string", length=255, nullable=false)
     */
    private $lieunaissance;

    /**
     * @var float
     *
     * @ORM\Column(name="Taille", type="float", precision=10, scale=0, nullable=false)
     */
    private $taille;

    /**
     * @var float
     *
     * @ORM\Column(name="Poids", type="float", precision=10, scale=0, nullable=false)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="Nationalite", type="string", length=255, nullable=false)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="Poste1", type="string", length=255, nullable=false)
     */
    private $poste1;

    /**
     * @var string
     *
     * @ORM\Column(name="Poste2", type="string", length=255, nullable=true)
     */
    private $poste2;

    /**
     * @var string
     *
     * @ORM\Column(name="Poste3", type="string", length=255, nullable=true)
     */
    private $poste3;

    /**
     * @var integer
     *
     * @ORM\Column(name="Cout", type="integer", nullable=false)
     */
    private $cout;

    /**
     * @var integer
     *
     * @ORM\Column(name="Buts", type="integer", nullable=false)
     */
    private $buts;

    /**
     * @var integer
     *
     * @ORM\Column(name="Selections", type="integer", nullable=false)
     */
    private $selections;

    /**
     * @var integer
     *
     * @ORM\Column(name="Participations", type="integer", nullable=false)
     */
    private $participations;

    /**
     * @var string
     *
     * @ORM\Column(name="Pied", type="string", length=255, nullable=false)
     */
    private $pied;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageJoueur1", type="string", length=255, nullable=false)
     */
    private $imagejoueur1;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageJoueur2", type="string", length=255, nullable=false)
     */
    private $imagejoueur2;

    /**
     * @var string
     *
     * @ORM\Column(name="ImageJoueur3", type="string", length=255, nullable=false)
     */
    private $imagejoueur3;

    /**
     * @var integer
     *
     * @ORM\Column(name="ButsMarque", type="integer", nullable=true)
     */
    private $butsmarque;

    /**
     * @var \Equipe
     *
     * @ORM\ManyToOne(targetEntity="Equipe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_Equipe", referencedColumnName="IDEquipe")
     * })
     */
    private $idEquipe;


}

