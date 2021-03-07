<?php
if(!empty($_SESSION['user']) &&$_SESSION['user']->getName_role()=="admin"){ 
    include('view/adminStatistique.php');
}else{include('view/404.php');}