<?php 

class SqlCommandeDetail extends Sql{

    protected $class=CommandeDetail::class;
    public function __construct(){
        parent::__construct();
    }

    public function afficheCommandeDetailUser($id){
       $sql="select id,id_commande,id_manga,prix 
       from elementdelacommande 
       where id_commande=:id;";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id'=>$id));
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetchall();

        return $result;
    }

}