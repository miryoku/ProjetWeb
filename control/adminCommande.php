<?php

if(!empty($_SESSION['user']) &&$_SESSION['user']->getName_role()=="admin"){ 
    if(REQ_ACTION){
        $sqlCommande=new SqlCommande();
        $commande=$sqlCommande->afficheIdCommande(REQ_TYPE_ID);
        
        if(REQ_ACTION=="annuler"){
            $status=3;
            $sqlCommandeDetail=new SqlCommandeDetail();
            $commandesDetails=$sqlCommandeDetail->afficheCommandeDetailUser(REQ_TYPE_ID);
        
            foreach($commandesDetails as $commandesDetail){
                
                $SqlMangaDetail = new SqlMangaDetail();
                $mangaDetail= $SqlMangaDetail->selectTomewithId($commandesDetail->getId_manga());
                $sqlSell = new SqlSell();
                $sqlSell->sqlUpdateCommmandeMangaTomeQuantite($commandesDetail->getQuantite()+ $mangaDetail->getQuantite_stock(),$commandesDetail->getId_manga());
            
        
            }
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
}else{include('view/404.php');}
