<?php
    echo $manga;
    echo "</br>";
    echo $detail;
    print_r($detail);

?>
<img src="/projetWeb/img/<?= $detail->getImg() ?>" alt="">
<?php if($detail->getQuantite_stock()!=0): ?>    
<form action="" method="post">
    quantite  <select name="quantite">
    <option value="1" selected>1</option>
    <?php for($i=2;$i<10 && $i<=$detail->getQuantite_stock();$i++): ?>
    <option value="<?=$i?>"><?=$i?></option>
   <?php endfor ?>

  </select>
    <input type="submit" name="send" value="Envoie">

</form>
<?php endif ?>