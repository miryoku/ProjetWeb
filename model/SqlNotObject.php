<?php 


class SqlnotObject extends Sql{

    public function __construct(){
        parent::__construct();
    }

    public function afficheGenreAll(){

        $sql="select id,nom,def_genre from genre";  
        $query=$this->pdo->prepare($sql);
        $query->execute();
        $result=$query->fetchall();
        return $result;
    }

    public function afficheCategoryAll(){
        $sql="select id,categorie from categorie";
        $query=$this->pdo->prepare($sql);
        $query->execute();
        $result=$query->fetchall();
        return $result;
    }

    public function RecupGenre($id){
        $sql="SELECT g.nom
            FROM genre_transition AS gt, genre AS g
            WHERE gt.id_genre=g.id AND gt.id_manga=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id'=>$id));
        $result=$query->fetchall();
        return $result;
    }

}