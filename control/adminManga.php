<?php

require_once("function/sendImg.php");
require_once('model/SqlnotObject.php');
if(!empty($_SESSION['user']) &&$_SESSION['user']->getName_role()=="admin"){


    /*if(REQ_ACTION2=="delete"){
        $sqlMangaDetail=new SqlMangaDetail();
        $sqlMangaDetail->sqlDeleteMangaDetail(REQ_ACTION);
        header('Location: '.ROOT_PATH.'adminManga/'.REQ_TYPE_ID);
    }else*/ if(REQ_ACTION2=="update"&& !empty($_POST['nTome'])&& !empty($_POST['resume'])&& !empty($_POST['date'])&& !empty($_POST['price'])&& !empty($_POST['quantite'])&& !empty($_POST['ean'])){
        $sqlMangaDetail=new SqlMangaDetail();
        if(!empty($_FILES['uploaded_file']['name'])){
            $nomFile=insertImg($_FILES['uploaded_file']);
            $sqlMangaDetail->sqlUpdateMangaDetail($_POST['id'],  $_POST['nTome'],$_POST['resume'],$_POST['date'],$_POST['price'],$_POST['quantite'],$_POST['ean'],$nomFile[1]);
   
        }else{
            $sqlMangaDetail->sqlUpdateMangaDetail1($_POST['id'],  $_POST['nTome'],$_POST['resume'],$_POST['date'],$_POST['price'],$_POST['quantite'],$_POST['ean']);
        }      
       header('Location: '.ROOT_PATH.'adminManga/'.REQ_TYPE_ID);
    }else if(REQ_ACTION2=="update"){
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
        include("view/adminupdateMAngaDetail.php");
    }
    else if(REQ_TYPE_ID=="updateManga"&&!empty($_POST['titre'])&&!empty($_POST['desinateur'])&&!empty($_POST['scenariste'])&&!empty($_POST['editeur'])&&!empty($_POST['categorie'])&& !empty($_POST['states'])){
    
        $sqlManga=new SqlManga();
        if(!empty($_FILES['uploaded_file']['name'])){
            $nomFile=insertImg($_FILES['uploaded_file']);
            $sqlManga-> sqlUpdateManga($_POST["id"],$_POST['titre'],$_POST['desinateur'],$_POST['scenariste'],$_POST['editeur'],$_POST['categorie'],$nomFile[1]);
        
        }else{
            $sqlManga-> sqlUpdateManga1($_POST["id"],$_POST['titre'],$_POST['desinateur'],$_POST['scenariste'],$_POST['editeur'],$_POST['categorie']);
        }    
       
        $sqlManga->sqlDeleteGenre($_POST["id"]);
        $sqlManga->sqlInsertGenre($_POST["id"],$_POST["states"]);
        header('Location: '.ROOT_PATH.'adminManga');
        
    }
    else if(REQ_TYPE_ID=="updateManga"){
    
        $sqlManga=new SqlManga();
        $manga=$sqlManga->selectTitre(REQ_ACTION);
        $SqlnotObject=new SqlNotObject();
        $categories=$SqlnotObject->afficheCategoryAll();
        $genres=$SqlnotObject->afficheGenreAll();
        if(empty($manga)){
            include('view/404.php');
            exit();
        }
        $recupGenre=$SqlnotObject->RecupGenre($manga->getId());
        include("view/adminUpdateManga.php");

    }
    else if(REQ_TYPE_ID=="insertManga" &&!empty($_POST['titre'])&&!empty($_POST['desinateur'])&&!empty($_POST['scenariste'])&&!empty($_POST['editeur'])&&!empty($_POST['categorie'])&& !empty($_POST['states'])){
       $nomFile=insertImg($_FILES['uploaded_file']);
        echo $_POST['categorie'];
       $sqlManga=new SqlManga();
        $sqlManga->sqlInsertManga($_POST['titre'],$_POST['desinateur'],$_POST['scenariste'],$_POST['editeur'],$_POST['categorie'],$nomFile[1]);
        $recup=$sqlManga->selectTitre($_POST['titre']);
        //$sqlManga->sqlInsertGenre($recup->getId(),$_POST['states']);
        header('Location: '.ROOT_PATH.'adminManga');

        
    }
    else if(REQ_TYPE_ID=="insertManga"){

        $SqlnotObject=new SqlNotObject();
        $categories=$SqlnotObject->afficheCategoryAll();
        $genres=$SqlnotObject->afficheGenreAll();
        include("view/adminAddManga.php");

    }
    else if(REQ_ACTION=="insert" && !empty($_POST['nTome'])&& !empty($_POST['resume'])&& !empty($_POST['date'])&& !empty($_POST['price'])&& !empty($_POST['quantite'])&& !empty($_POST['ean'])){

       
        $nomFile=insertImg($_FILES['uploaded_file']);
        $sqlMangaDetail=new SqlMangaDetail();
        $sqlMangaDetail->sqlInsertMangaDetail($_POST['id'],  $_POST['nTome'],$_POST['resume'],$_POST['date'],$_POST['price'],$_POST['quantite'],$_POST['ean'],$nomFile[1]);
        header('Location: '.ROOT_PATH.'adminManga/'.REQ_TYPE_ID);
    }

    else if(REQ_ACTION=="insert"){
    
        $sqlManga=new SqlManga();
        $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
        include('view/adminMangaDetailAjout.php');
    }

    else if(REQ_ACTION){

        $sqlManga=new SqlManga();
        $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
        $sqlMangaDetail=new SqlMangaDetail();
        if(empty($manga)){
            include('view/404.php');
            exit();
        }
        $detail=$sqlMangaDetail->selectTome($manga->getId(),REQ_ACTION);
        if(empty($detail)){
            include('view/404.php');
            exit();
        }
        $manga->setGenre($sqlManga->selectGenre($manga->getId()));
        include('view/mangaDetailNumber.php');


    }else if (REQ_TYPE_ID){

        $sqlManga=new SqlManga();
        $manga=$sqlManga->selectTitre(REQ_TYPE_ID);
        if(empty($manga)){
            include('view/404.php');
            exit();
        }
        
        $sqlMangaDetail=new SqlMangaDetail();
        $details=$sqlMangaDetail->all($manga->getId());
        include('view/adminMangaDetail.php');


    }else if(REQ_TYPE) {

        $SqlManga=new SqlManga();
        $mangas=$SqlManga->all();
        include('view/adminManga.php');
    }else{
        include('view/404.php');
    }

}else{include('view/404.php');}






