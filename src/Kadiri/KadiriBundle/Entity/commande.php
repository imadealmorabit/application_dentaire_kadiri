<?php

namespace Kadiri\KadiriBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Kadiri\KadiriBundle\Repository\commandeRepository")
 */
class commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="medecin", type="integer")
     */
    private $medecin;

    /**
     * @var int
     *
     * @ORM\Column(name="produits", type="integer")
     */
    private $produits;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set medecin
     *
     * @param integer $medecin
     *
     * @return commande
     */
    public function setMedecin($medecin)
    {
        $this->medecin = $medecin;

        return $this;
    }

    /**
     * Get medecin
     *
     * @return int
     */
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * Set produits
     *
     * @param integer $produits
     *
     * @return commande
     */
    public function setProduits($produits)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return int
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return commande
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}

