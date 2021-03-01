<?php 

class SqlCommande extends Sql{

    protected $class=Commande::class;
    public function __construct(){
        parent::__construct();
    }

    public function afficheCommandeAllUser($email){
       $sql="select u.id as id_user,c.id as id_commande,s.nom as status,c.price,c.date_de_la_commande as date
        from commande as c, userdb as u, statuscommande AS s
        where c.id_user=u.id AND c.id_status=s.id  and  u.email like :email;";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('email'=>$email));
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetchall();

        return $result;
    }

    public function afficheAllCommandeNotTermine(){
        $sql="SELECT c.id,id_user,s.nom AS status,price,date_de_la_commande as date FROM commande AS c , statuscommande AS s WHERE c.id_status=s.id  AND c.id_status <>2 AND c.id_status <>3";
        $query=$this->pdo->prepare($sql);
        $query->execute();
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetchall();

        return $result;
    }
    public function afficheIdCommande($id){
        $sql="SELECT c.id,id_user,s.nom AS status,price,date_de_la_commande as date FROM commande AS c , statuscommande AS s WHERE c.id_status=s.id and c.id=:id ";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('id'=>$id));
        $query->setFetchMode(PDO::FETCH_CLASS,$this->class);
        $result=$query->fetchall();

        return $result;
    }

    public function updateStatusCommande($id,$idStatus){
        $sql="UPDATE commande
        SET id_status=:idStatus
        WHERE id=:id";
        $query=$this->pdo->prepare($sql);
        $query->execute(array('idStatus'=>$idStatus,'id'=>$id)); 
    }


} 