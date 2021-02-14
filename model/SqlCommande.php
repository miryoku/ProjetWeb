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

}