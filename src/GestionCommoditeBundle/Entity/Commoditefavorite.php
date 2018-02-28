<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commoditefavorite
 *
 * @ORM\Table(name="commoditefavorite", indexes={@ORM\Index(name="fk_favourite_comm", columns={"id_commodite"}), @ORM\Index(name="fk_favourite_user", columns={"id_user"})})
 * @ORM\Entity
 */
class Commoditefavorite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_favorite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFavorite;

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

