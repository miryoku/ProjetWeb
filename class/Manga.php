<?php 

class Manga
{
    private $id;
    private $titre;
    private $dessinateur;
    private $scenariste;
    private $editeur_oeuvre_origine;
    private $categorie;
    private $genre;



    public function __toString(){
        return $this->getId(). " / ". $this->getTitre() . " / ". $this->getCategorie()."</br>";
    }

    public function getTitreUrl(){
        return  str_replace(" ", "-", $this->titre);
        
    }



    /**
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of editeur_oeuvre_origine
     */ 
    public function getEditeur_oeuvre_origine()
    {
        return $this->editeur_oeuvre_origine;
    }

    /**
     * Set the value of editeur_oeuvre_origine
     *
     * @return  self
     */ 
    public function setEditeur_oeuvre_origine($editeur_oeuvre_origine)
    {
        $this->editeur_oeuvre_origine = $editeur_oeuvre_origine;

        return $this;
    }

    /**
     * Get the value of scenariste
     */ 
    public function getScenariste()
    {
        return $this->scenariste;
    }

    /**
     * Set the value of scenariste
     *
     * @return  self
     */ 
    public function setScenariste($scenariste)
    {
        $this->scenariste = $scenariste;

        return $this;
    }


    /**
     * Get the value of dessinateur
     */ 
    public function getDessinateur()
    {
        return $this->dessinateur;
    }

    /**
     * Set the value of dessinateur
     *
     * @return  self
     */ 
    public function setDessinateur($dessinateur)
    {
        $this->dessinateur = $dessinateur;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

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
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }
}

