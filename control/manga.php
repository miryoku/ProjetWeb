<?php

require_once("model/Manga.php");
require_once("model/DetailManga.php");
require_once('model/SqlManga.php');
require_once('model/SqlMangaDetail.php');

if(REQ_ACTION && !empty($_POST['send'])){

  
    $sqlManga=new SqlManga();
    $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
    $sqlMangaDetail=new SqlMangaDetail();
    $detail=$sqlMangaDetail->selectTome($manga->getId(),REQ_ACTION);

    if(empty($_SESSION['panier'])){
        $_SESSION['panier']=[];
    }

    print_r($_SESSION['panier']);
    $bool=false;
    foreach($_SESSION['panier'] as $paniers){
       
        if($paniers[0]->getTitre()==$manga->getTitre() && $paniers[1]->getNumero_du_tome()==$detail->getNumero_du_tome()){
            $_SESSION['panier'][0][2]=$paniers[2]+$_POST['quantite'];
            $bool=true;
        }
        
    }

    if(!$bool){
    $array=[];
    array_push($array,$manga,$detail,$_POST['quantite']);
    array_push($_SESSION['panier'],$array);}
    header('Location: '.ROOT_PATH.'panier');

}else if(REQ_ACTION){

    $sqlManga=new SqlManga();
    $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
    $sqlMangaDetail=new SqlMangaDetail();
    $detail=$sqlMangaDetail->selectTome($manga->getId(),REQ_ACTION);

    include('view/mangaDetailNumber.php');
 
}
else if (REQ_TYPE_ID){


    $sqlManga=new SqlManga();
    $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
    $sqlMangaDetail=new SqlMangaDetail();
    $detail=$sqlMangaDetail->all($manga->getId());


    include('view/mangaDetail.php');


}else if(REQ_TYPE) {

    $SqlManga=new SqlManga();
    $mangas=$SqlManga->all();
    include('view/manga.php');
}








