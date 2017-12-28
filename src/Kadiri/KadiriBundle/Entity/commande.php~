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
     * @ORM\ManyToOne(targetEntity="Kadiri\KadiriBundle\Entity\medecin" , inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medecin;

    /**
     * @ORM\ManyToMany(targetEntity="Kadiri\KadiriBundle\Entity\Produits", cascade={"persist"})
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

    /**
     * Set medecin
     *
     * @param \Kadiri\KadiriBundle\Entity\medecin $medecin
     *
     * @return commande
     */
    public function setMedecin(\Kadiri\KadiriBundle\Entity\medecin $medecin)
    {
        $this->medecin = $medecin;

        return $this;
    }

    /**
     * Get medecin
     *
     * @return \Kadiri\KadiriBundle\Entity\medecin
     */
    public function getMedecin()
    {
        return $this->medecin;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add produit
     *
     * @param \Kadiri\KadiriBundle\Entity\Produits $produit
     *
     * @return commande
     */
    public function addProduit(\Kadiri\KadiriBundle\Entity\Produits $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \Kadiri\KadiriBundle\Entity\Produits $produit
     */
    public function removeProduit(\Kadiri\KadiriBundle\Entity\Produits $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }
}