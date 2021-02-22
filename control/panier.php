<?php 

if(isset($_POST['sell'])){

 $sqlSell = new SqlSell();
    $sqlSell->sqlInsertCommande($_SESSION['user']->getId(),$_POST['sell'],date("Y-m-d"));
   $idCommande=$sqlSell->sqlselectLastCommande($_SESSION['user']->getId(),date("Y-m-d"));
   print_r($idCommande); 
   foreach($_SESSION['panier'] as $panier){
        if($panier[1]->getQuantite_stock()-$panier[2]>=0){
            $sqlSell->sqlUpdateCommmandeMangaTomeQuantite($panier[1]->getQuantite_stock()-$panier[2],$panier[1]->getId());
            $sqlSell->sqlInsertElementCommande($idCommande[0],$panier[1]->getId(),$panier[1]->getPrice(),$panier[2]);
        }else{
            //mettre le tome qui ne rengistre pas pour l'affiche plus loins
        }
    }
    //bug de l'insertion de tome avec une double decimal 
    unset($_SESSION['panier']);
    header('Location: '.ROOT_PATH);

}else{
    if(!empty($_POST['delete'])){
        array_splice($_SESSION['panier'],$_POST['delete'],1);
        if(count($_SESSION['panier'])==0){
            unset($_SESSION['panier']);
        }
    } 

    $totArticle=0;
    $tot=0;
    include('view/panier.php');

}