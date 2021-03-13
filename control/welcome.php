<?php



require_once("model/Manga.php");
require_once('model/SqlManga.php');

include('view/header.php');

$sqlManga=new SqlManga();
$mangas=$sqlManga->LastManga();
$sqlMangaDetail=new SqlMangaDetail();
$mangaDetails=$sqlMangaDetail->selectLastSorti();

$details=[];
foreach($mangaDetails as $mangaDetail){
    $trans=[];
    $result=$sqlManga->selectTitreID($mangaDetail->getId_manga());
    array_push($trans,$result,$mangaDetail);
    array_push($details,$trans);
}


include('view/welcome.php');
include('view/footer.php');

?>