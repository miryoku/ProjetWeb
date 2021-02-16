
<h1>Panier</h1>
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
   
<?php $i++; endforeach ?>

Panier <?= count($_SESSION['panier']) ?>