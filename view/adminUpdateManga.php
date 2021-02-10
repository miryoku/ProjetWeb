<form method="post">
    <input type="hidden" name="id" value="<?= $manga->getId() ?>">
    Titre : <input type="text" name="titre" id="" value="<?= $manga->getTitre() ?> ">
    Desinateur : <input type="text" name="desinateur" id="" value="<?= $manga->getDessinateur() ?>">
    Scenariste : <input type="text" name="scenariste" id="" value="<?= $manga->getScenariste() ?>">
    editeur :<input type="text" name="editeur" id="" value="<?= $manga->getEditeur_oeuvre_origine() ?>">
    genre :
    <?php foreach($categories as $categorie): ?>
        <?=$categorie[1]?><input type="radio" name="categorie" value="<?=$categorie[0]?>" id="" <?php if(strcmp($manga->getCategorie() , $categorie[1])== 0): ?>checked <?php endif ?>>
    <?php endforeach;?>
    <br/>
    <select class="js-example-basic-multiple" name="states[]" multiple required>
   
        
    <?php $j=0;
    foreach($genres as $genre): ?>
            <option value="<?=$genre[0]?>" <?php  if(isset($recupGenre[$j][0]) && strcmp($recupGenre[$j][0],$genre[1])==0):?> selected <?php $j++ ?> <?php endif ?>><?=$genre[1]?></option>
    <?php endforeach;?>
    </select>
    <input type="submit" value="envoie">
</form>




