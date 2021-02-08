<form method="post">
    Titre : <input type="text" name="titre" id="">
    Desinateur : <input type="text" name="desinateur" id="">
    Scenariste : <input type="text" name="scenariste" id="">
    editeur :<input type="text" name="editeur" id="">
    <?php foreach($categories as $categorie): ?>
        <?=$categorie[1]?><input type="radio" name="categorie" value="<?=$categorie[0]?>" id="">
    <?php endforeach;?>
    <br/>
    <select class="js-example-basic-multiple" name="states[]" multiple>
        <?php foreach($genres as $genre): ?>
            <option value="<?=$genre[0]?>"><?=$genre[1]?></option>
        <?php endforeach;?>
    </select>
    <input type="submit" value="envoie">

</form>



