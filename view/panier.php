
<h1>Panier</h1>
<?php if(isset($_SESSION['panier'])): ?>
<?php $i=0; foreach($_SESSION['panier'] as $paniers): ?>

    <h2><?= $paniers[0]->getTitre() ?></h2>
    <p>Tome <?=$paniers[1]->getNumero_du_tome() ?></p>
    <?php if($paniers[0]->getDessinateur()==$paniers[0]->getScenariste()): ?>
        <p><?=$paniers[0]->getDessinateur() ?></p>
    <?php else: ?>
        <p><?=$paniers[0]->getDessinateur() ?>,<?=$paniers[0]->getScenariste(); ?></p>
      
    <?php endif ?>

    <p><?=$paniers[2] ?></p>
    <p><?=$paniers[1]->getPrice()*$paniers[2] ?> €</p>
   <form method="post">
   <input type="hidden" name="delete" value="<?= ($i==0)?"0.00" : $i ?>">
   <input type="submit" value="supprime">
   </form>
   
<?php $totArticle=$totArticle+$paniers[2];
 $tot=$tot+$paniers[1]->getPrice()*$paniers[2];
  $i++;
 endforeach //$i sert a empeche un bug , quand on on envoie la value 0 ca ne functione aps donc faut envoie 0.00?>

Panier <?= $totArticle ?>

<form method="post">
        <input type="hidden" name="sell" value="<?=$tot?>"> <!-- ne pas mettre un input parce que on peux le change -->
        <input type="submit" value="envoie">
</form>


<?php else: ?>

<p>Panier vide</p>

<?php endif ?>