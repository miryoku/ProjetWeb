<?= $manga->getTitre() ?>

<form method="post">
    <input type="hidden" name="id" value="<?= $manga->getId() ?>">
    Numero du tome : <input type="number" name="nTome" id="" required>
    Resume du tome : <textarea name="resume" id="" cols="30" rows="10" required></textarea>
    Date de sortie : <input type="date" name="date" id="" required>
    Prix : <input type="number" name="price" required>
    quantite en stock : <input type="number" name="quantite" id="" required> 
    ean : <input type="text" name="ean" required>
    <input type="submit" value="envoie">

</form>