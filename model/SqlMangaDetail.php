<?php

class SqlMangaDetail extends Sql{

    protected $class=DetailManga::class;
    public function __construct(){
        parent::__construct();
    }

    public function all($id){
    $sql="SELECT id,numero_du_tome,date_de_sortie,price,quantite_stock,id_manga,img
        FROM manga_tome 
        WHERE del=true and id_manga = ".$id;
    $query=$this->pdo->query($sql);
    $query->setFetchMode(PDO::FETCH_CLASS, $this->class);
    $result= $query->fetchAll();
    return $result;
    }

    public function selectTome($tome,$num){
        $sql="SELECT id,numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,id_manga,ean,img 
            FROM manga_tome 
            WHERE id_manga = :id_item and numero_du_tome = :numero_du_tome";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id_item'=>$tome,'numero_du_tome'=>$num));
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetch();

        return $result;

    }

    public function sqlInsertMangaDetail($id,$nbTome,$resume,$date,$price,$quantite,$ean,$img){
        $sql="INSERT INTO manga_tome(numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,id_manga,ean,img,del)
        VALUES(:nbTome,:resum,:dat,:price,:quantite,:id,:ean,:img,:del);";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('nbTome'=>$nbTome,'resum'=>$resume,'dat'=>$date,'price'=>$price,'quantite'=>$quantite,'id'=>$id,'ean'=>$ean,'img'=>$img,'del'=>true)); 
    
    }

    public function sqlUpdateMangaDetail($id,$nbTome,$resume,$date,$price,$quantite,$ean,$img){
        $sql="UPDATE manga_tome
        SET  numero_du_tome = :nbTome, resume_du_tome =  :resum, date_de_sortie = :dat,quantite_stock=:quantite,price=:price,ean=:ean,img=:img
        WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('nbTome'=>$nbTome,'resum'=>$resume,'dat'=>$date,'price'=>$price,'quantite'=>$quantite,'id'=>$id,'ean'=>$ean,'img'=>$img)); 
    
    }

    public function sqlUpdateMangaDetail1($id,$nbTome,$resume,$date,$price,$quantite,$ean){
        $sql="UPDATE manga_tome
        SET  numero_du_tome = :nbTome, resume_du_tome =  :resum, date_de_sortie = :dat,quantite_stock=:quantite,price=:price,ean=:ean
        WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('nbTome'=>$nbTome,'resum'=>$resume,'dat'=>$date,'price'=>$price,'quantite'=>$quantite,'id'=>$id,'ean'=>$ean)); 
    
    }

    /*public function sqlDeleteMangaDetail($id){
        $sql="delete from manga_tome where id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id'=>$id)); 
    }*/

    public function selectTomewithId($id){
        $sql="SELECT id,numero_du_tome,resume_du_tome,date_de_sortie,price,quantite_stock,id_manga,ean,img
            FROM manga_tome 
            WHERE id = :id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id'=>$id));
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetch();

        return $result;

    }

}