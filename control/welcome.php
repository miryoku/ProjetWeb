<?php



require_once("model/Manga.php");
require_once('model/SqlManga.php');



$SqlManga=new SqlManga();
$mangas=$SqlManga->LastManga();



include('view/welcome.php');


?>