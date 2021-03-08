<?php 


require_once('model/SqlLogin.php');
require_once('model/SqlnotObject.php');
require_once('model/Commande.php');
require_once('model/SqlCommande.php');
require_once('model/CommandeDetail.php');
require_once('model/SqlCommandeDetail.php');
require_once('model/SqlSell.php');


if(isset($_POST['sell'])){

 $sqlSell = new SqlSell();
    $sqlSell->sqlInsertCommande($_SESSION['user']->getId(),$_SESSION['sumPanier'],date("Y-m-d"));
   $idCommande=$sqlSell->sqlselectLastCommande($_SESSION['user']->getId(),date("Y-m-d"));
   print_r($idCommande); 
   foreach($_SESSION['panier'] as $panier){
        if($panier[1]->getQuantite_stock()-$panier[2]>=0){
            $sqlSell->sqlUpdateCommmandeMangaTomeQuantite($panier[1]->getQuantite_stock()-$panier[2],$panier[1]->getId());
            $sqlSell->sqlInsertElementCommande($idCommande[0],$panier[1]->getId(),$panier[1]->getPrice(),$panier[2]);
        }else{
            //mettre le tome qui ne rengistre pas pour l'affiche plus loins
        }
    }
   
    unset($_SESSION['panier']);
    unset($_SESSION['sumPanier']);
    header('Location: '.ROOT_PATH);

}else{
    if(!empty($_POST['delete'])){
        array_splice($_SESSION['panier'],$_POST['delete'],1);
        if(count($_SESSION['panier'])==0){
            unset($_SESSION['panier']);
        }
    } 

    $totArticle=0;
    $tot=0;

    if(isset($_SESSION['panier'])){
        foreach($_SESSION['panier'] as $paniers){
            $totArticle=$totArticle+$paniers[2];
            $tot=$tot+$paniers[1]->getPrice()*$paniers[2];
        }
        $_SESSION['sumPanier']=$tot;
    }
    

    include('view/panier.php');

}