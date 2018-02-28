<?php

namespace GestionMatchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pronostics
 *
 * @ORM\Table(name="pronostics", indexes={@ORM\Index(name="fk_id_user", columns={"id_user"}), @ORM\Index(name="fk_match_prono", columns={"Id_Match"})})
 * @ORM\Entity
 */
class Pronostics
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Prono", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProno;

    /**
     * @var float
     *
     * @ORM\Column(name="CoteEquipeA", type="float", precision=10, scale=0, nullable=false)
     */
    private $coteequipea;

    /**
     * @var float
     *
     * @ORM\Column(name="CoteX", type="float", precision=10, scale=0, nullable=false)
     */
    private $cotex;

    /**
     * @var float
     *
     * @ORM\Column(name="CoteEquipeB", type="float", precision=10, scale=0, nullable=false)
     */
    private $coteequipeb;

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
     * @var \Matches
     *
     * @ORM\ManyToOne(targetEntity="Matches")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Match", referencedColumnName="Id_Match")
     * })
     */
    private $idMatch;


}

