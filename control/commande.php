<?php 
 
if(!empty($_SESSION['user'])){
    if(REQ_ACTION=="commande"){
        $sqlSell = new SqlSell();
        $sqlSell->sqlUpdateCommmandeStatus(3,REQ_TYPE_ID);
        header('Location: '.ROOT_PATH.'commande');

    }else if(REQ_TYPE_ID){
        $SqlCommandeDetail=new SqlCommandeDetail();
        $SqlMangaDetail=new SqlMangaDetail();
        $SqlManga=new SqlManga();
        $details=$SqlCommandeDetail->afficheCommandeDetailUser(REQ_TYPE_ID);
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
        $SqlCommande=new SqlCommande();
        $commandes=$SqlCommande->afficheCommandeAllUser($_SESSION['user']->getEmail());
        include('view/commandeListUser.php');

    }
}else{include('view/404.php');}