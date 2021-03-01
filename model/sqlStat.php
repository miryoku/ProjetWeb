<?php

class SqlStat extends Sql{

    public function __construct(){
        parent::__construct();
    }

    public function selectTopVente(){
        $sql="select  m.titre as titre,mt.numero_du_tome as numero_du_tome,sum(quantite) as vente 
        from elementdelacommande as e, manga_tome as mt, manga as m
        where e.id_manga=mt.id and m.id=mt.id_manga 
        group by  e.id_manga  ORDER BY sum(quantite) desc limit 3";
        $query=$this->pdo->prepare($sql);
        $query->execute();
        $result=$query->fetchall();
    
        return $result;
    
        }

        public function selectLaPlusgrosseCommande(){
            $sql="select c.id,u.email,max(c.price) as max from commande as c, userdb as u where c.id_user=u.id";
            $query=$this->pdo->prepare($sql);
            $query->execute();
            $result=$query->fetchall();
    
            return $result;
        }
    
    
}