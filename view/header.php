<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/<?=RACINE?>/public/jquery-3.5.1.slim.min.js"></script>
    <script src="/<?=RACINE?>/public/bootstrap.min.js"></script>



 
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
-->
<script src="/<?=RACINE?>/public/chart.js"></script>

  <script src="/<?=RACINE?>/public/bootstrap.js"></script>
  
<script src="/<?=RACINE?>/public/script.js" defer></script>
   <link rel="stylesheet" href="/<?=RACINE?>/public/bootstrap.css">
    <link rel="stylesheet" href="/<?=RACINE?>/public/style.css">
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?=ROOT_PATH?>">
        <img src="/<?=RACINE?>/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Manga
        </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link" href="<?=ROOT_PATH?>manga">Catalogue</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mon compte
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php if(!isset($_SESSION['user']) ):?>
            <li><a class="dropdown-item" href="<?=ROOT_PATH?>login">Se connecter</a></li>
            <li><a class="dropdown-item" href="<?=ROOT_PATH?>inscription">S'inscire</a></li>
          <?php else: ?>
            <li class="dropdown-item"> Bonjour <?= $_SESSION['user']->getNom() ?></li>
            <li ><a class="dropdown-item" href="<?=ROOT_PATH?>commande">Commande</a></li>
            <li><a class="dropdown-item" href="<?=ROOT_PATH?>logout">Deconnexion</a></li>
          <?php endif?>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
       
        <?php if(isset($_SESSION['user']) &&  strcmp($_SESSION['user']->getName_role(),'admin')!==1):?><!-- strcmp sert a compare 2 string -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           Admin
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="dropdown-item"> <a class="dropdown-item" href="<?=ROOT_PATH?>adminManga">Administration Manga</a></li>
            <li class="dropdown-item"> <a class="dropdown-item" href="<?=ROOT_PATH?>adminCommande">Liste commande a traite</a></li>
            <li class="dropdown-item"> <a class="dropdown-item" href="<?=ROOT_PATH?>adminStatistique">Statistique</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <?php endif?>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=ROOT_PATH?>panier">Panier</a>
        </li>
      </ul>
      <form class="d-flex" id="search">
        <input class="form-control me-2" id="p" name="p"  type="text" placeholder="Search" aria-label="Search">
        
        <button type="submit" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModalCenter">
        Search
        </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          
        <div class="modal-body" id="ici">
          ...
        </div>

      </div>
    </div>
  </div>
      
</form>
    </div>
  </div>
</nav>







