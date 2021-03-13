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

    
    public function insertAddresse($rue,$numero,$cp,$localite,$pays,$id_userdb,$numBoite=null){        
        $sql="INSERT INTO addresse(rue,numero,numBoite,cp,localite,pays,id_userdb,del)
        VALUES(:rue,:numero,:numBoite,:cp,:localite,:pays,:id_userdb,:del);";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('rue'=>$rue,'numero'=>$numero,'numBoite'=>$numBoite,'cp'=>$cp,'localite'=>$localite,'pays'=>$pays,'id_userdb'=>$id_userdb,'del'=>true)); 
    }

    public function selectAddresse($id,$isid){
        $sql="select rue,numero,numBoite,cp,localite,pays,id from addresse where del=true";
        if($isid){
           $sql.=" and id=:id"; 
        }else{
            $sql.=" and id_userdb=:id";
        }

        $query=$this->pdo->prepare($sql);
        $query->execute(array('id'=>$id));
        $result=$query->fetchall();
        return $result;
    }

    public function sqlUpdateAddresse($rue,$numero,$cp,$localite,$pays,$id,$numBoite=null){
        $sql="UPDATE addresse
        SET  rue = :rue, numero =  :numero, cp = :cp,localite=:localite,pays=:pays,numBoite=:numBoite
        WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('rue'=>$rue,'numero'=>$numero,'cp'=>$cp,'localite'=>$localite,'pays'=>$pays,'numBoite'=>$numBoite,'id'=>$id)); 
    
    }
    public function sqlDeleteAddresse($id){
        $sql="UPDATE addresse
        SET  del=:del
        WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('del'=>false,'id'=>$id)); 
    
    }

}