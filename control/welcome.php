<?php


$SqlManga=new SqlManga();
$mangas=$SqlManga->LastManga();

include('view/welcome.php');


?>