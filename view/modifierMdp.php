<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <?php if(!empty($_POST['error'])): ?>
        <div class="alert alert-danger">Mot de passe pas identique </div>
    <?php endif ?>
    <form method="post">
            <div class="mb-3">
                <label for="exampleInputTitre" class="form-label">Ancien mdp </label>
                <input type="password" class="form-control" id="lastMdp" aria-describedby="rueHelp" name="lastMdp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputTitre" class="form-label">Nouveau mdp </label>
                <input type="password" class="form-control" id="NewMdp" aria-describedby="rueHelp" name="NewMdp" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    <div class="col-sm-2"></div>
</div>

