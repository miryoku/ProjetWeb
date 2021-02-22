<p><?= $manga->getTitre() ?></p>

<form method="post">
    <input type="hidden" name="id" value="<?= $detail->getId() ?>">
    Numero du tome : <input type="number" name="nTome" id="" required value="<?=$detail->getNumero_du_tome()?>">
    Resume du tome : <textarea name="resume" id="" cols="30" rows="10" required ><?=$detail->getResume_du_tome()?></textarea>
    Date de sortie : <input type="date" name="date" id="" required value="<?=$detail->getDate_de_sortie()?>">
    Prix : <input type="number" name="price" required value="<?=$detail->getPrice()?>">
    quantite en stock : <input type="number" name="quantite" id="" required value="<?=$detail->getQuantite_stock()?>"> 
    ean : <input type="text" name="ean" required value="<?=$detail->getEan()?>">
    <input type="submit" value="envoie">
    
</form>