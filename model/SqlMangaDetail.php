<?php

class SqlMangaDetail extends Sql{

    protected $class=DetailManga::class;
    public function __construct(){
        parent::__construct();
    }

    public function all($id){
    $sql="SELECT id,numero_du_tome,date_de_sortie,price,quantite_stock,id_manga 
        FROM manga_tome 
        WHERE id_manga = ".$id;
    $query=$this->pdo->query($sql);
    $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
    $result= $query->fetchAll();
    return $result;
    }

    public function selectTome($tome,$num){
        $sql="SELECT id,numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,id_manga,ean 
            FROM manga_tome 
            WHERE id_manga = :id_item and numero_du_tome = :numero_du_tome";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id_item'=>$tome,'numero_du_tome'=>$num));
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetch();

        return $result;

    }

}