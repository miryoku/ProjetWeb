<?php
require_once('model/Commande.php');
require_once('model/SqlCommande.php');
require_once('model/commandeDetail.php'); 
require_once('model/SqlCommandeDetail.php');
require_once('model/SqlSell.php');
require_once('model/SqlNotObject.php');
if(!empty($_SESSION['user']) &&$_SESSION['user']->getName_role()=="admin"){ 
    if(REQ_ACTION){
        $sqlCommande=new SqlCommande();
        $commande=$sqlCommande->afficheIdCommande(REQ_TYPE_ID);

        
        if(REQ_ACTION=="annuler"){
            $status=3;
            $sqlCommandeDetail=new SqlCommandeDetail();
            $commandesDetails=$sqlCommandeDetail->afficheCommandeDetailUser(REQ_TYPE_ID);
            $SqlMangaDetail = new SqlMangaDetail();
            $sqlSell = new SqlSell();
            foreach($commandesDetails as $commandesDetail){
                
                
                $mangaDetail= $SqlMangaDetail->selectTomewithId($commandesDetail->getId_manga());
                
                $sqlSell->sqlUpdateCommmandeMangaTomeQuantite($commandesDetail->getQuantite()+ $mangaDetail->getQuantite_stock(),$commandesDetail->getId_manga());
            
        
            }
        }else{
            $status=2;
        }
        $sqlCommande->updateStatusCommande(REQ_TYPE_ID, $status);
        header('Location: '.ROOT_PATH.'adminCommande');
    }else if(REQ_TYPE_ID){

        include('view/header.php');
        $SqlCommandeDetail=new SqlCommandeDetail();
        $SqlMangaDetail=new SqlMangaDetail();
        $SqlManga=new SqlManga();
        $sqlCommande=new SqlCommande();
        $sqlNotObject=new SqlnotObject();
        $commande=$sqlCommande->afficheIdCommande(REQ_TYPE_ID);
        $user=$sqlNotObject->sqlSelectUser($commande[0]->getId_user());
        $details=$SqlCommandeDetail->afficheCommandeDetailUser(REQ_TYPE_ID);
        $arrays=[];
        if(empty($details)){
            include('view/404.php');
            exit();
        }

        foreach($details as $detail){
            $list=[];
            $tomeManga=$SqlMangaDetail->selectTomewithId($detail->getId_manga());
            $manga=$SqlManga->selectTitreID( $tomeManga->getId_manga());
            array_push($list,$detail,$manga,$tomeManga);
            array_push($arrays,$list);

        }
        
        include("view/adminAfficheCommandeDetail.php");
    }else  if(REQ_TYPE){
        include('view/header.php');
        $sqlCommande=new SqlCommande();
        $commandesEnCours=$sqlCommande->afficheAllCommandeTypeStatus(1);
        $commandesFini=$sqlCommande->afficheAllCommandeTypeStatus(2);
        $commandesAnnul=$sqlCommande->afficheAllCommandeTypeStatus(3);
        include("view/adminAfficheCommande.php");
    }
}else{
    include('view/header.php');
    include('view/404.php');}
include('view/footer.php');