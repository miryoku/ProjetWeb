<?php

if(!empty($_SESSION['user']) &&$_SESSION['user']->getName_role()=="admin"){ 
    include('view/header.php');
    include('view/adminStatistique.php');
}else{
    include('view/header.php');
    include('view/404.php');}
include('view/footer.php');