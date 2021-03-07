<?php


class SqlManga extends Sql{

    protected $class=Manga::class;
    public function __construct(){

        parent::__construct();
        
       
    }

    public function all(){

    $sql="SELECT i.id,i.titre,i.dessinateur,i.scenariste,c.categorie,i.img
        FROM manga AS i,categorie AS c
        WHERE i.id_categorie=c.id and del=true";
    $query=$this->pdo->query($sql);
    $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
    $result= $query->fetchAll();


    return $result;

    }

    public function selectTitre($value){
        $titre = str_replace("-", " ",$value );
        $sql="SELECT i.id,i.titre,i.dessinateur,i.scenariste,i.editeur_oeuvre_origine,c.categorie
            FROM manga AS i,categorie AS c
            WHERE i.id_categorie=c.id and i.titre LIKE :titre";
        $query=$this->pdo->prepare($sql);
        $query->execute(['titre'=>$titre]);
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetch();
        return $result;
    } 

    public function selectTitreID($id){
        $sql="SELECT i.id,i.titre,i.dessinateur,i.scenariste,i.editeur_oeuvre_origine,c.categorie
            FROM manga AS i,categorie AS c
            WHERE i.id_categorie=c.id and i.id = :id";
        $query=$this->pdo->prepare($sql);
        $query->execute(['id'=>$id]);
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetch();
        return $result;
    } 

    public function selectGenre($id){

        $sql="SELECT g.nom FROM genre_transition AS gt, genre AS g WHERE gt.id_genre=g.id AND id_manga=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(['id'=>$id]);
        $result=$query->fetchall();
        return $result;

    }

    public function sqlInsertManga($titre,$dessinateur,$scenariste,$editeur,$categorie,$img){
        $sql="INSERT INTO manga(titre,dessinateur,scenariste,id_categorie,editeur_oeuvre_origine,id_etat,img,del)
        VALUES(:titre,:dessinateur,:scenariste,:categorie,:editeur,:id_etat,:img,:del)";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('titre'=>$titre,'dessinateur'=>$dessinateur,'scenariste'=>$scenariste,'editeur'=>$editeur,'categorie'=>$categorie,'id_etat'=>1,'img'=>$img,'del'=>true)); 
    }

    public function sqlInsertGenre($id,$genres){
        foreach($genres as $genre){
            $sql="INSERT INTO  genre_transition (id_manga,id_genre)VALUES(:id,:id_genre)";
            $query=$this->pdo->prepare($sql);
            $query->execute(array('id'=>$id,'id_genre'=>$genre)); 
        }
    }



    public function sqlUpdateManga($id,$titre,$dessinateur,$scenariste,$editeur_oeuvre_origine,$categorie,$img){

        $sql="UPDATE manga
        SET titre = :titre, dessinateur = :dessinateur, scenariste = :scenariste,id_categorie=:id_categorie,
        editeur_oeuvre_origine=:editeur_oeuvre_origine,id_etat=:id_etat,img=:img
        WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('titre'=>$titre,'dessinateur'=>$dessinateur,
        'scenariste'=>$scenariste,'id_categorie'=>$categorie,'editeur_oeuvre_origine'=>$editeur_oeuvre_origine,'id_etat'=>1,'id'=>$id,'img'=>$img)); 
        

    }

    
    public function sqlUpdateManga1($id,$titre,$dessinateur,$scenariste,$editeur_oeuvre_origine,$categorie){

        $sql="UPDATE manga
        SET titre = :titre, dessinateur = :dessinateur, scenariste = :scenariste,id_categorie=:id_categorie,
        editeur_oeuvre_origine=:editeur_oeuvre_origine,id_etat=:id_etat
        WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('titre'=>$titre,'dessinateur'=>$dessinateur,
        'scenariste'=>$scenariste,'id_categorie'=>$categorie,'editeur_oeuvre_origine'=>$editeur_oeuvre_origine,'id_etat'=>1,'id'=>$id)); 
        

    }

    public function sqlDeleteGenre($id){
        $sql="delete from genre_transition where id_manga=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id'=>$id)); 
    }


    public function LastManga(){

        $sql="select  m.id,m.titre,m.dessinateur,m.scenariste,m.img,c.categorie 
        from manga as m,categorie as c 
        where m.id_categorie=c.id and del=true group by id desc limit 3;";
        $query=$this->pdo->query($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
        $result= $query->fetchAll();
    
    
        return $result;
    
        }



}