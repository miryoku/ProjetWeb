<?php


class SqlManga extends Sql{

    protected $class=Manga::class;
    public function __construct(){

        parent::__construct();
        
       
    }

    public function all(){

    $sql="SELECT i.id,i.titre,i.dessinateur,i.scenariste,c.categorie
        FROM item AS i,categorie AS c
        WHERE i.id_categorie=c.id";
    $query=$this->pdo->query($sql);
    $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
    $result= $query->fetchAll();


    return $result;

    }

    public function selectTitre($value){
        $titre = str_replace("-", " ",$value );
        $sql="SELECT i.id,i.titre,i.dessinateur,i.scenariste,i.editeur_oeuvre_origine,c.categorie
            FROM item AS i,categorie AS c
            WHERE i.id_categorie=c.id and i.titre LIKE :titre";
        $query=$this->pdo->prepare($sql);
        $query->execute(['titre'=>$titre]);
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetch();
        return $result;
    } 

    

    public function sqlInsertManga($titre,$dessinateur,$scenariste,$editeur,$categorie){
        $sql="INSERT INTO item(titre,dessinateur,scenariste,id_categorie,editeur_oeuvre_origine,id_etat)
        VALUES(:titre,:dessinateur,:scenariste,:categorie,:editeur,:id_etat)";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('titre'=>$titre,'dessinateur'=>$dessinateur,'scenariste'=>$scenariste,'editeur'=>$editeur,'categorie'=>$categorie,'id_etat'=>1)); 
    }

    public function sqlInsertGenre($id,$genres){
        foreach($genres as $genre){
            $sql="INSERT INTO genre_transition(id_item,id_genre)VALUES(:id,:id_genre)";
            $query=$this->pdo->prepare($sql);
            $query->execute(array('id'=>$id,'id_genre'=>$genre)); 
        }
    }

    public function sqlUpdateManga(){}

}