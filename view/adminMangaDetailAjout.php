

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h5 class="card-title"><?= $manga->getTitre() ?></h5>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $manga->getId() ?>">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Numero du tome </label>
                <input type="number" class="form-control" id="nTome" aria-describedby="nTomeHelp" name="nTome" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Resume du tome </label>
                <textarea class="form-control" name="resume" rows="5" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date de sortie </label>
                <input type="date" class="form-control" id="date" aria-describedby="dateHelp" name="date" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prix </label>
                <input type="number" class="form-control" id="price" aria-describedby="priceHelp" name="price" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">quantite en stock </label>
                <input type="number" class="form-control" id="quantite" aria-describedby="quantiteHelp" name="quantite" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ean </label>
                <input type="text" class="form-control" id="ean" aria-describedby="eanHelp" name="ean" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image </label>
                <input type="file" class="form-control" id="uploaded_file" aria-describedby="ImageHelp" name="uploaded_file" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-sm-2"></div>
</div>