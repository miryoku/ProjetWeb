<?php 

if(REQ_TYPE_ID){
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
    

  /* foreach($array as $wesh){
        

        print_r($wesh[0]);
        echo "</br>";echo "</br>";echo "</br>";echo "</br>";
        print_r($wesh[1]);
        echo "</br>";echo "</br>";echo "</br>";echo "</br>";
        print_r($wesh[2]);
        echo "</br>";echo "</br>";echo "</br>";echo "</br>";
        echo "------------------</br>";
    }*/
    include('view/commandeDetail.php');


}else if(REQ_TYPE) {
    $SqlCommande=new SqlCommande();
    $commandes=$SqlCommande->afficheCommandeAllUser($_SESSION['user']->getEmail());
    include('view/commandeListUser.php');

}