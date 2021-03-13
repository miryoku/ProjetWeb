<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputTitre" class="form-label">rue </label>
                <input type="text" class="form-control" id="rue" aria-describedby="rueHelp" name="rue" value="<?=$adresse[0][0]?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleDesinateur" class="form-label">numero </label>
                <input type="text" class="form-control" id="numero" aria-describedby="numeroHelp" name="numero" value="<?=$adresse[0][1]?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleScenariste" class="form-label">numBoite </label>
                <input type="text" class="form-control" id="numBoite" aria-describedby="numBoiteHelp" name="numBoite" value="<?=$adresse[0][2]?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputTitre" class="form-label">localite </label>
                <input type="text" class="form-control" id="localite" aria-describedby="localiteHelp" name="localite" value="<?=$adresse[0][4]?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleediteur" class="form-label">cp </label>
                <input type="text" class="form-control" id="cp" aria-describedby="cpHelp" name="cp" value="<?=$adresse[0][3]?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleediteur" class="form-label">pays </label>
                <input type="text" class="form-control" id="pays" aria-describedby="paysHelp" name="pays" value="<?=$adresse[0][5]?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>



