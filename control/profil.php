<?php
require_once('model/SqlnotObject.php');
require_once('model/SqlLogin.php');
if(!empty($_SESSION['user'])){
    if(REQ_TYPE_ID=="insert"&&!empty($_POST['rue'])&&!empty($_POST['numero'])&&!empty($_POST['cp'])&&!empty($_POST['pays'])&&!empty($_POST['localite']) ){
        $sqlNotObect=new SqlnotObject();

        if(!empty($_POST['numBoite'])){
            $sqlNotObect->insertAddresse($_POST['rue'],$_POST['numero'],$_POST['cp'],$_POST['localite'],$_POST['pays'],$_SESSION['user']->getId(),$_POST['numBoite']);
        }else{
            $sqlNotObect->insertAddresse($_POST['rue'],$_POST['numero'],$_POST['cp'],$_POST['localite'],$_POST['pays'],$_SESSION['user']->getId());
        }
        header('Location: '.ROOT_PATH.'profil');
    }else if(REQ_TYPE_ID=="insert"){
        include('view/header.php');
        include('view/insertAdresse.php');

    }else if(REQ_TYPE_ID=="mdp"&&!empty($_POST['NewMdp'])&&!empty($_POST['lastMdp'])){
       

        if( password_verify($_POST['lastMdp'],$_SESSION['user']->getMdp())){
            $mdpHash=password_hash($_POST['NewMdp'],PASSWORD_BCRYPT,['cost'=>12]);
            $sqlLogin=new SqlLogin();
            $sqlLogin->sqlUpdateMdp($mdpHash,$_SESSION['user']->getId());
            $_SESSION['user']->setMdp($mdpHash);
            header('Location: '.ROOT_PATH.'profil');
        }else{
            include('view/header.php');
            $_POST['error']=1;
            include('view/modifierMdp.php');
            
        }

    }else if(REQ_TYPE_ID=="mdp"){
        include('view/header.php');
        include('view/modifierMdp.php');
    
    }else if(REQ_TYPE_ID=="update"&&!empty($_POST['rue'])&&!empty($_POST['numero'])&&!empty($_POST['localite'])&&!empty($_POST['cp'])&&!empty($_POST['pays'])){ 
        $sqlNotObect= new SqlnotObject();
        if(!empty($_POST['numBoite'])){
            $sqlNotObect->sqlUpdateAddresse($_POST['rue'],$_POST['numero'],$_POST['localite'],$_POST['cp'],$_POST['pays'],REQ_ACTION,$_POST['numBoite']);
        }else{
            $sqlNotObect->sqlUpdateAddresse($_POST['rue'],$_POST['numero'],$_POST['localite'],$_POST['cp'],$_POST['pays'],REQ_ACTION);
        }
        header('Location: '.ROOT_PATH.'profil');

        }else if(REQ_TYPE_ID=="update"){ 
        $sqlNotObect=new SqlnotObject();
        $adresse=$sqlNotObect->selectAddresse(REQ_ACTION,true);
        include('view/header.php');
        include('view/updateAdresse.php');
    }else if(REQ_TYPE_ID=="delete"){ 
        $sqlNotObect=new SqlnotObject();
        $adresse=$sqlNotObect->sqlDeleteAddresse(REQ_ACTION);
        header('Location: '.ROOT_PATH.'profil');
    }else if(REQ_TYPE) {
        $sqlNotObect=new SqlnotObject();
        $addresses=$sqlNotObect->selectAddresse($_SESSION['user']->getId(),false);
        include('view/header.php');
        include('view/profil.php');
    }
   

}else{  
    include('view/header.php');
    include("view/404.php");
} include('view/footer.php');


