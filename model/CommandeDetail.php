<?php 

class CommandeDetail
{
    private $id;
    private $id_commande;
    private $id_manga;
    private $prix;
    private $quantite;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_commande
     */ 
    public function getId_commande()
    {
        return $this->id_commande;
    }

    /**
     * Set the value of id_commande
     *
     * @return  self
     */ 
    public function setId_commande($id_commande)
    {
        $this->id_commande = $id_commande;

        return $this;
    }

    /**
     * Get the value of id_manga
     */ 
    public function getId_manga()
    {
        return $this->id_manga;
    }

    /**
     * Set the value of id_manga
     *
     * @return  self
     */ 
    public function setId_manga($id_manga)
    {
        $this->id_manga = $id_manga;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }
}