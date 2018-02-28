<?php

namespace GestionShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignedecommande
 *
 * @ORM\Table(name="lignedecommande", indexes={@ORM\Index(name="fk_commande", columns={"commande"}), @ORM\Index(name="fk_prod", columns={"idproduit"})})
 * @ORM\Entity
 */
class Lignedecommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="IdLigne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idligne;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=10)
     */
    private $etat;

    /**
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param int $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @var Commandes
     *
     * @ORM\ManyToOne(targetEntity="GestionShopBundle\Entity\Commandes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="commande", referencedColumnName="id")
     * })
     */
    private $commandes;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="MyApp\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $id_user;

    /**
     * @var Produits
     *
     * @ORM\ManyToOne(targetEntity="GestionShopBundle\Entity\Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproduit", referencedColumnName="id_produit")
     * })
     */
    private $idproduit;

    /**
     * @return int
     */
    public function getIdligne()
    {
        return $this->idligne;
    }

    /**
     * @param int $idligne
     */
    public function setIdligne($idligne)
    {
        $this->idligne = $idligne;
    }

    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    /**
     * @return Commandes
     */
    public function getCommande()
    {
        return $this->commandes;
    }

    /**
     * @param Commandes $commandes
     */
    public function setCommande($commandes)
    {
        $this->commandes = $commandes;
    }

    /**
     * @return \User
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param \User $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return Produits
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * @param Produits $idproduit
     */
    public function setIdproduit($idproduit)
    {
        $this->idproduit = $idproduit;
    }

}

