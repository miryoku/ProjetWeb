
<div class="row">

    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <?php if(!empty($_POST['error'])):?>
        <?php if($_POST['error']==2):?>
            <div class="alert alert-danger">identifiant incorrect</div>
        <?php elseif($_POST['error']==1):?>
        
            <div class="alert alert-danger">manque un element</div>
        <?php endif ?>
    <?php endif ?>
    <form  method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Adresse Mail</label>
            <input type="email" class="form-control" id="login" name="login" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="mdp" name="mdp">
        </div>

        <button type="submit" class="btn btn-primary">Connecte</button>
    </form>
    </div>
    <div class="col-sm-2"></div>
</div>