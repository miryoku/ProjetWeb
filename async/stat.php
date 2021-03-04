<?php
require('../config/main.php');
require_once("../model/User.php");
require_once("../model/Connection.php");
require_once('../model/Sql.php');
require_once("../model/Manga.php");
require_once("../model/DetailManga.php");
require_once('../model/SqlManga.php');
require_once('../model/SqlMangaDetail.php');
require_once('../model/SqlLogin.php');
require_once('../model/SqlnotObject.php');
require_once('../model/Commande.php');
require_once('../model/SqlCommande.php');
require_once('../model/CommandeDetail.php');
require_once('../model/SqlCommandeDetail.php');
require_once('../model/SqlSell.php');
require_once('../model/SqlStat.php');




    $records = array();

    $success =1 ;
    $msg="une erreur est survenue (script.php)";
    $sqlStat=new SqlStat();


    if(!empty($_POST['date1'])&&!empty($_POST['date2'])){
        $maxCommande=$sqlStat->selectLaPlusgrosseCommande($_POST['date1'],$_POST['date2']);
    }else if(!empty($_POST['date1'])){
        $maxCommande=$sqlStat->selectLaPlusgrosseCommande($_POST['date1']);
    }else if(!empty($_POST['date2'])){
        $maxCommande=$sqlStat->selectLaPlusgrosseCommande($_POST['date2']);
    }else{
        $maxCommande=$sqlStat->selectLaPlusgrosseCommande();
    }



    $topClientCommande=[];
    foreach($maxCommande as $record)
    {
        $data['id']= $record['id'];
        $data['email']= utf8_decode($record['email']);
        $data['max']= $record['max'];
    array_push($topClientCommande,$data);	
    }

        if(!empty($_POST['date1'])&&!empty($_POST['date2'])){
            $top=$sqlStat->selectTopVente($_POST['quant'],$_POST['date1'],$_POST['date2']);
            $NombreDecommande=$sqlStat->selectNombreDeLeNombreDecommande($_POST['date1'],$_POST['date2']);
            $moyenneDesCommande=$sqlStat->selectMoyenDesCommandes($_POST['date1'],$_POST['date2']);
        }else if(!empty($_POST['date1'])){
            $top=$sqlStat->selectTopVente($_POST['quant'],$_POST['date1']);  
            $NombreDecommande=$sqlStat->selectNombreDeLeNombreDecommande($_POST['date1']);
            $moyenneDesCommande=$sqlStat->selectMoyenDesCommandes($_POST['date1']);
        }else if(!empty($_POST['date2'])){
            $top=$sqlStat->selectTopVente($_POST['quant'],$_POST['date2']);
            $NombreDecommande=$sqlStat->selectNombreDeLeNombreDecommande($_POST['date2']);
            $moyenneDesCommande=$sqlStat->selectMoyenDesCommandes($_POST['date2']);
        }else{
            $top=$sqlStat->selectTopVente();
            $NombreDecommande=$sqlStat->selectNombreDeLeNombreDecommande();
            $moyenneDesCommande=$sqlStat->selectMoyenDesCommandes();
        }

    $topVente=[];
    unset($data);
    foreach($top as $record)
    {
        $data['titre']= utf8_decode($record['titre']);
        $data['numero_du_tome']= $record['numero_du_tome'];
        $data['vente']= $record['vente'];
        array_push($topVente,$data);	
    }

    $Commande=[];
    unset($data);
    foreach($NombreDecommande as $record)
    {
        $data['nombreCommande']=$record['nombreCommande'];
      
        array_push($Commande,$data);	
    }

    $moyenne=[];
    unset($data);
    foreach($moyenneDesCommande as $record)
    {
        $data['moyenne']=$record['moyenne'];
      
        array_push($moyenne,$data);	
    }

    $res = ["success"=>$success, "msg"=>$msg,"TopClient"=>$topClientCommande,"topVente"=>$topVente,"nombreDeCommande"=>$Commande,"moyenneCommande"=>$moyenne];

echo json_encode($res);

