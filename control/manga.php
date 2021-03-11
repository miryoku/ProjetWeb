<?php




if(REQ_ACTION && !empty($_POST['send'])){

  
    $sqlManga=new SqlManga();
    $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
    $sqlMangaDetail=new SqlMangaDetail();
    $detail=$sqlMangaDetail->selectTome($manga->getId(),REQ_ACTION);

    if(empty($_SESSION['panier'])){
        $_SESSION['panier']=[];
    }

    //print_r($_SESSION['panier']);
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
    exit();

}else if(REQ_ACTION){
    include('view/header.php');
    $sqlManga=new SqlManga();
    $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
    if(empty($manga)){
        include('view/404.php');
        exit();
    }
    $sqlMangaDetail=new SqlMangaDetail();
    $detail=$sqlMangaDetail->selectTome($manga->getId(),REQ_ACTION);
    if(empty($detail)){
        include('view/404.php');
        exit();
    }
    $manga->setGenre($sqlManga->selectGenre($manga->getId()));
    include('view/mangaDetailNumber.php');
 
}
else if (REQ_TYPE_ID){

    include('view/header.php');
    $sqlManga=new SqlManga();
    $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
    if(empty($manga)){
        include('view/404.php');
        exit();
    }
    $sqlMangaDetail=new SqlMangaDetail();
    $details=$sqlMangaDetail->all($manga->getId());
    include('view/mangaDetail.php');


}else if(REQ_TYPE) {
    include('view/header.php');
    $SqlManga=new SqlManga();
    $mangas=$SqlManga->all();
    include('view/manga.php');
}




include('view/footer.php');