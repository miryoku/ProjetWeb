<?php

if(REQ_TYPE_ID=="updateManga"&&!empty($_POST['titre'])&&!empty($_POST['desinateur'])&&!empty($_POST['scenariste'])&&!empty($_POST['editeur'])&&!empty($_POST['categorie'])&& !empty($_POST['states'])){
 $sqlManga=new SqlManga();
    $sqlManga-> sqlUpdateManga($_POST["id"],$_POST['titre'],$_POST['desinateur'],$_POST['scenariste'],$_POST['editeur'],$_POST['categorie']);
    $sqlManga->sqlDeleteGenre($_POST["id"]);
    $sqlManga->sqlInsertGenre($_POST["id"],$_POST["states"]);
    header('Location: '.ROOT_PATH.'/projetWeb/adminManga');
    
}
elseif(REQ_TYPE_ID=="updateManga"){
   
    $sqlManga=new SqlManga();
    $manga=$sqlManga->selectTitre(REQ_ACTION);
    $SqlnotObject=new SqlNotObject();
    $categories=$SqlnotObject->afficheCategoryAll();
    $genres=$SqlnotObject->afficheGenreAll();
    $recupGenre=$SqlnotObject->RecupGenre($manga->getId());
    include("view/adminUpdateManga.php");

}
else if(REQ_TYPE_ID=="insertManga" &&!empty($_POST['titre'])&&!empty($_POST['desinateur'])&&!empty($_POST['scenariste'])&&!empty($_POST['editeur'])&&!empty($_POST['categorie'])&& !empty($_POST['states'])){
    $sqlManga=new SqlManga();
    $sqlManga->sqlInsertManga($_POST['titre'],$_POST['desinateur'],$_POST['scenariste'],$_POST['editeur'],$_POST['categorie']);
    $recup=$sqlManga->selectTitre($_POST['titre']);
    $sqlManga->sqlInsertGenre($recup->getId(),$_POST['states']);
    header('Location: '.ROOT_PATH.'/projetWeb/adminManga');
    
}
else if(REQ_TYPE_ID=="insertManga"){
   
    $SqlnotObject=new SqlNotObject();
    $categories=$SqlnotObject->afficheCategoryAll();
    $genres=$SqlnotObject->afficheGenreAll();
    include("view/adminAddManga.php");

}
else if(REQ_ACTION){
    echo "coucou";
}else if (REQ_TYPE_ID){

    $sqlManga=new SqlManga();
    $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
    $sqlMangaDetail=new SqlMangaDetail();
    $details=$sqlMangaDetail->all($manga->getId());
    include('view/adminMangaDetail.php');


}else if(REQ_TYPE) {

    $SqlManga=new SqlManga();
    $mangas=$SqlManga->all();
    include('view/adminManga.php');
}








