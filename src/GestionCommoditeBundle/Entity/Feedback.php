<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 *
 * @ORM\Table(name="feedback", indexes={@ORM\Index(name="id_commodite", columns={"id_commodite"}), @ORM\Index(name="fk_user_comm", columns={"id_user"})})
 * @ORM\Entity
 */
class Feedback
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_feedback", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFeedback;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=250, nullable=false)
     */
    private $contenu;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer", nullable=false)
     */
    private $rate;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate_acceuil", type="integer", nullable=false)
     */
    private $rateAcceuil;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate_cuisine", type="integer", nullable=false)
     */
    private $rateCuisine;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate_ambiance", type="integer", nullable=false)
     */
    private $rateAmbiance;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate_rqp", type="integer", nullable=false)
     */
    private $rateRqp;

    /**
     * @var integer
     *
     * @ORM\Column(name="average_rate", type="integer", nullable=false)
     */
    private $averageRate;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;

    /**
     * @var \Commodite
     *
     * @ORM\ManyToOne(targetEntity="Commodite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_commodite", referencedColumnName="id_commodite")
     * })
     */
    private $idCommodite;


}

