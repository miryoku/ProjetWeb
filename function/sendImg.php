<?php 

function insertImg($img){

    $maxSize = 500000;
    $validExt =array('.jpg','jpeg','.gif','.png');

    if($img['error']>0)
    {
        return [1,"une erreur est survenue ors du transfert"];
        die;
    }

    $fileSize =$img['size'];
    if($fileSize>$maxSize){
        return [1,"le fichier est trop gros !"];
        die;
    }

    $fileName = $img['name'];
    $fileExt = '.'.strtolower(substr(strrchr($fileName,'.'),1));
    if(!in_array($fileExt,$validExt))
    {
        
        return [1,"le fichier n'est pas une image"];
        die;
    }

    $tmpName = $img["tmp_name"];
    $uniqueName = md5(uniqid(rand(),true));
    $fileName=$uniqueName.$fileExt;
    $resultat = move_uploaded_file($tmpName,"img/".$fileName);

    if($resultat){
        return [0,$fileName];
    }

}