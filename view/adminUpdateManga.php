



<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $manga->getId() ?>">
            <div class="mb-3">
                <label for="exampleInputTitre" class="form-label">Titre </label>
                <input type="text" class="form-control" id="titre" aria-describedby="titreHelp" name="titre" required  value="<?= $manga->getTitre() ?>">
            </div>
            <div class="mb-3">
                <label for="exampleDesinateur" class="form-label">Desinateur </label>
                <input type="text" class="form-control" id="desinateur" aria-describedby="DesinateurHelp" name="desinateur" required value="<?= $manga->getDessinateur() ?>">
            </div>
            <div class="mb-3">
                <label for="exampleScenariste" class="form-label">Scenariste </label>
                <input type="text" class="form-control" id="scenariste" aria-describedby="ScenaristeHelp" name="scenariste" required value="<?= $manga->getScenariste() ?>">
            </div>
            <div class="mb-3">
                <label for="exampleediteur" class="form-label">editeur </label>
                <input type="text" class="form-control" id="editeur" aria-describedby="editeurHelp" name="editeur" required value="<?= $manga->getEditeur_oeuvre_origine() ?>">
            </div>
            <?php foreach($categories as $categorie): ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="categorie" id="categorie"  value="<?=$categorie[0]?>" <?php if(strcmp($manga->getCategorie() , $categorie[1])== 0): ?>checked <?php endif ?>>
                <label class="form-check-label" for="flexRadioDefault1">
                    <?=$categorie[1]?>
                </label>
            </div>   
            <?php endforeach;?>   
            <select class="form-select" multiple aria-label="multiple select" name="states[]">
                <?php $j=0; foreach($genres as $genre): ?>
                    <option value="<?=$genre[0]?>" <?php  if(isset($recupGenre[$j][0]) && strcmp($recupGenre[$j][0],$genre[1])==0):?> selected <?php $j++ ?> <?php endif ?>><?=$genre[1]?></option>
                <?php endforeach;?>
            </select>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">Image </label>
                <input type="file" class="form-control" id="uploaded_file" aria-describedby="uploaded_fileHelp" name="uploaded_file">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>



