<?php 
if(REQ_ACTION){
    $sqlCommande=new SqlCommande();
    $commande=$sqlCommande->afficheIdCommande(REQ_TYPE_ID);
    echo REQ_ACTION;
    if(REQ_ACTION=="annuler"){
        $status=3;
    }else{
        $status=2;
    }
    $sqlCommande->updateStatusCommande(REQ_TYPE_ID, $status);
    header('Location: '.ROOT_PATH.'adminCommande');
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

    include("view/adminAfficheCommandeDetail.php");
}else  if(REQ_TYPE){
    
    $sqlCommande=new SqlCommande();
    $commandes=$sqlCommande->afficheAllCommandeNotTermine();
    include("view/adminAfficheCommande.php");
}