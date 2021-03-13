<?php
require('../config/main.php');

require_once("../model/Connection.php");
require_once('../model/Sql.php');
require_once('../model/SqlSearch.php');


$success =1 ;
$msg="une erreur est survenue (search.php)";

$sqlSearch=new SqlSearch();
$liste=$sqlSearch->selectManga($_POST['p']);

$listeManga=[];
foreach($liste as $record)
{
    $data['id']= $record['id'];
    $data['titre']= utf8_decode($record['titre']);
    $data['img']= $record['img'];
array_push($listeManga,$data);	
}

$res = ["success"=>$success, "msg"=>$msg,"listeManga"=>$listeManga];

echo json_encode($res);