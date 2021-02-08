<?php




if(REQ_ACTION){

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








