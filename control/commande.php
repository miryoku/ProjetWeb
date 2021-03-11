<?php 



require_once('model/SqlLogin.php');
require_once('model/SqlnotObject.php');
require_once('model/Commande.php');
require_once('model/SqlCommande.php'); 
require_once('model/SqlCommandeDetail.php');
require_once('model/commandeDetail.php');
require_once('model/SqlSell.php');


if(!empty($_SESSION['user'])){
    if(REQ_ACTION=="commande"){
        $sqlSell = new SqlSell();
        $sqlSell->sqlUpdateCommmandeStatus(3,REQ_TYPE_ID);
        header('Location: '.ROOT_PATH.'commande');

    }else if(REQ_TYPE_ID){
        include('view/header.php');
        $SqlCommandeDetail=new SqlCommandeDetail();
        $SqlMangaDetail=new SqlMangaDetail();
        $SqlManga=new SqlManga();
        $details=$SqlCommandeDetail->afficheCommandeDetailUser(REQ_TYPE_ID);
        if(empty($details)){
            include('view/404.php');
            exit();
        }
        $arrays=[];


        foreach($details as $detail){
            $list=[];
            $tomeManga=$SqlMangaDetail->selectTomewithId($detail->getId_manga());
            $manga=$SqlManga->selectTitreID( $tomeManga->getId_manga());
            array_push($list,$detail,$manga,$tomeManga);
            array_push($arrays,$list);


        }
        include('view/commandeDetail.php');


    }else if(REQ_TYPE) {
        include('view/header.php');
        $SqlCommande=new SqlCommande();
        $commandes=$SqlCommande->afficheCommandeAllUser($_SESSION['user']->getEmail());
        include('view/commandeListUser.php');

    }
}else{include('view/header.php');
    include('view/404.php');}
include('view/footer.php');