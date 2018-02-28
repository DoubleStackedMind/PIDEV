<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipetype
 *
 * @ORM\Table(name="equipetype", indexes={@ORM\Index(name="FK_j1", columns={"joueur1"}), @ORM\Index(name="FK_j2", columns={"joueur2"}), @ORM\Index(name="FK_j3", columns={"joueur3"}), @ORM\Index(name="FK_j4", columns={"joueur4"}), @ORM\Index(name="FK_j5", columns={"joueur5"}), @ORM\Index(name="FK_j6", columns={"joueur6"}), @ORM\Index(name="FK_j7", columns={"joueur7"}), @ORM\Index(name="FK_j8", columns={"joueur8"}), @ORM\Index(name="FK_j9", columns={"joueur9"}), @ORM\Index(name="FK_j10", columns={"joueur10"}), @ORM\Index(name="FK_j11", columns={"joueur11"})})
 * @ORM\Entity
 */
class Equipetype
{
    /**
     * @var \User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userid", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur1", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur1;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur10", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur10;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur11", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur11;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur2", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur2;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur3", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur3;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur4", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur4;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur5", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur5;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur6", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur6;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur7", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur7;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur8", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur8;

    /**
     * @var \Joueur
     *
     * @ORM\ManyToOne(targetEntity="Joueur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="joueur9", referencedColumnName="IDJoueur")
     * })
     */
    private $joueur9;


}

