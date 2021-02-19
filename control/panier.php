<?php 

if(isset($_POST['sell'])){


    $sqlSell = new SqlSell();
    $sqlSell->sqlInsertCommande($_SESSION['user']->getId(),$_POST['sell'],date("Y-m-d"));
    $idCommande=$sqlSell->sqlselectLastCommande($_SESSION['user']->getId(),$_POST['sell'],date("Y-m-d"));
    
    echo $_POST['sell'];
    foreach($_SESSION['panier'] as $panier){

       $sqlSell->sqlInsertElementCommande($idCommande[0],$panier[1]->getId(),$panier[1]->getPrice(),$panier[2]);
    }
    //bug de l'insertion de tome avec une double decimal 
    unset($_SESSION['panier']);
    header('Location: '.ROOT_PATH);

}else{
    if(!empty($_POST['delete'])){
        echo $_POST['delete'];
        array_splice($_SESSION['panier'],$_POST['delete'],1);
    
    } 
    $totArticle=0;
    $tot=0;
    include('view/panier.php');

}