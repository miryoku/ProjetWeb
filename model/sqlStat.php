<?php

class SqlStat extends Sql{

    public function __construct(){
        parent::__construct();
    }

    public function selectTopVente($number=3,$firstDate=null,$secondDate=null){
       
        $sql="select  m.titre as titre,mt.numero_du_tome as numero_du_tome,sum(quantite) as vente 
        from elementdelacommande as e, manga_tome as mt, manga as m";
            if(!empty($firstDate)||!empty($secondDate)){
                $sql.=" , commande as c ";
            } 
        $sql.=" where e.id_manga=mt.id and m.id=mt.id_manga"; 
            if(!empty($firstDate)&&!empty($secondDate)){
                $sql.=' and e.id_commande=c.id and c.date_de_la_commande>=:firstDate and c.date_de_la_commande<=:secondDate';
            }else if(!empty($firstDate)){
                $sql.=' and e.id_commande=c.id and c.date_de_la_commande= :firstDate';
            }
        $sql.=" group by  e.id_manga  ORDER BY sum(quantite) desc limit ".$number;

        $query=$this->pdo->prepare($sql);
        
        if(!empty($firstDate)&&!empty($secondDate)){
            $query->execute(array('firstDate'=>$firstDate,'secondDate'=>$secondDate));
        }else if(!empty($firstDate)){
            $query->execute(array('firstDate'=>$firstDate));
        }else{
            $query->execute();
        }
        $result=$query->fetchall();
    
        return $result;
    
        }


        public function selectLaPlusgrosseCommande($firstDate=null,$secondDate=null){
            $sql="select c.id,u.email,max(c.price) as max from commande as c, userdb as u where c.id_user=u.id";
            if(!empty($firstDate)&&!empty($secondDate)){
                $sql.=' and c.date_de_la_commande>=:firstDate and c.date_de_la_commande<=:secondDate ';
            }else if(!empty($firstDate)){
                $sql.=' and c.date_de_la_commande=:firstDate';
            }
            $query=$this->pdo->prepare($sql);
            if(!empty($firstDate)&&!empty($secondDate)){
                $query->execute(array('firstDate'=>$firstDate,'secondDate'=>$secondDate));
            }else if(!empty($firstDate)){
                $query->execute(array('firstDate'=>$firstDate));
            }else{
                $query->execute();
            }
            $result=$query->fetchall();
    
            return $result;
        }
    
        public function selectNombreDeLeNombreDecommande($firstDate=null,$secondDate=null){

            $sql="select count(*) as nombreCommande from commande ";
            if(!empty($firstDate)&&!empty($secondDate)){
                $sql.=' where date_de_la_commande>=:firstDate and date_de_la_commande<=:secondDate ';
            }else{
                $sql.=' where date_de_la_commande=:firstDate';
            }

            $query=$this->pdo->prepare($sql);
            if(!empty($firstDate)&&!empty($secondDate)){
                $query->execute(array('firstDate'=>$firstDate,'secondDate'=>$secondDate));
            }else if(!empty($firstDate)){
                $query->execute(array('firstDate'=>$firstDate));
            }else{
                $query->execute(array('firstDate'=>date("Y-m-d")));
            }
            $result=$query->fetchall();
    
            return $result;
        }

        


        public function selectMoyenDesCommandes($firstDate=null,$secondDate=null){

            $sql="select avg(price) as moyenne from commande  ";
            if(!empty($firstDate)&&!empty($secondDate)){
                $sql.=' where date_de_la_commande>=:firstDate and date_de_la_commande<=:secondDate ';
            }else{
                $sql.=' where date_de_la_commande=:firstDate';
            }

            $query=$this->pdo->prepare($sql);
            if(!empty($firstDate)&&!empty($secondDate)){
                $query->execute(array('firstDate'=>$firstDate,'secondDate'=>$secondDate));
            }else if(!empty($firstDate)){
                $query->execute(array('firstDate'=>$firstDate));
            }else{
                $query->execute(array('firstDate'=>date("Y-m-d")));
            }
            $result=$query->fetchall();
    
            return $result;


        }


}