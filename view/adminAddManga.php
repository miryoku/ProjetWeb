<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputTitre" class="form-label">Titre </label>
                <input type="text" class="form-control" id="titre" aria-describedby="titreHelp" name="titre" required>
            </div>
            <div class="mb-3">
                <label for="exampleDesinateur" class="form-label">Desinateur </label>
                <input type="text" class="form-control" id="desinateur" aria-describedby="DesinateurHelp" name="desinateur" required>
            </div>
            <div class="mb-3">
                <label for="exampleScenariste" class="form-label">Scenariste </label>
                <input type="text" class="form-control" id="scenariste" aria-describedby="ScenaristeHelp" name="scenariste" required>
            </div>
            <div class="mb-3">
                <label for="exampleediteur" class="form-label">editeur </label>
                <input type="text" class="form-control" id="editeur" aria-describedby="editeurHelp" name="editeur" required>
            </div>
            <?php foreach($categories as $categorie): ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="categorie" id="categorie"  value="<?=$categorie[0]?>">
                <label class="form-check-label" for="flexRadioDefault1">
                    <?=$categorie[1]?>
                </label>
            </div>   
            <?php endforeach;?>   
            <select class="form-select" multiple aria-label="multiple select" name="states[]">
                <?php foreach($genres as $genre): ?>
                    <option value="<?=$genre[0]?>"><?=$genre[1]?></option>
                <?php endforeach;?>
            </select>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">Image </label>
                <input type="file" class="form-control" id="uploaded_file" aria-describedby="uploaded_fileHelp" name="uploaded_file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>



