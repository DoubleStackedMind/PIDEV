<?php

namespace GestionEJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GalerieCommodite
 *
 * @ORM\Table(name="galerie_commodite", indexes={@ORM\Index(name="fk_galerie_comm", columns={"id_commodite"})})
 * @ORM\Entity
 */
class GalerieCommodite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_galerie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGalerie;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=250, nullable=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name;

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

