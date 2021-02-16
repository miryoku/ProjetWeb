<?php 

if(!empty($_POST['delete'])){
    echo $_POST['delete'];
    array_splice($_SESSION['panier'],$_POST['delete'],1);
   
} 

include('view/panier.php');