<?php

class SqlSell extends Sql{
    public function __construct(){
        parent::__construct();
    }

    public function sqlInsertCommande($idUser,$price,$date){
        $sql="insert into commande(id_user,id_status,price,date_de_la_commande)
            values(:idUser,:id_status,:price,:date)";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('idUser'=>$idUser,'id_status'=>1,'price'=>$price,'date'=>$date));

    }

    public function sqlselectLastCommande($idUser,$price,$date){
        $sql="SELECT id FROM commande 
        WHERE id_user=:idUser AND price=:price AND date_de_la_commande=:dates ORDER BY id DESC LIMIT 1";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('idUser'=>$idUser,'price'=>$price,'dates'=>$date));
        $result=$query->fetch();

        return $result;
    }

    public function sqlInsertElementCommande($idCommande,$IdManga,$prix,$quant){
        $sql="insert into elementdelacommande(id_commande,id_manga,prix,quantite)
              values(:id_command,:id_manga,:prix,:quant)";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id_command'=>$idCommande,'id_manga'=>$IdManga,'prix'=>$prix,'quant'=>$quant));

    }

    public function sqlUpdateCommmandeStatus($idStatus,$id){
        $sql="UPDATE commande SET id_status=:idStatus WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('idStatus'=>$idStatus,'id'=>$id));
        
    }

    public function sqlUpdateCommmandeMangaTomeQuantite($quant,$id){
        $sql="UPDATE manga_tome SET quantite_stock=:quant WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('quant'=>$quant,'id'=>$id));
        
    }


}



