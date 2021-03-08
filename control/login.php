<?php 
require_once('model/SqlLogin.php');



if(isset($_POST['login'])&& !empty($_POST['login'])&& isset($_POST['mdp'])&& !empty($_POST['mdp'])){

    $sqlLogin = new SqlLogin();

    $mdpHash=password_hash($_POST['mdp'],PASSWORD_BCRYPT,['cost'=>12]);
    $user= $sqlLogin->sqlCheckEmail($_POST['login']);


    if(!empty($user) && password_verify($_POST['mdp'],$user->getMdp())){

      $_SESSION['user']=$user;
        header('Location: welcome');
       exit();



    }else{
        /*mdp et user incorecte */
        $_POST['error']=2;
        include('view/login.php');
    }
}elseif(!empty($_POST['login'])||!empty($_POST['mdp'])){
    /*manque un element dans l'envoie */
    $_POST['error']=1;
    include('view/login.php');


}else{
   include('view/login.php');
}
