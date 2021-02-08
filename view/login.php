<?php if(!empty($_POST['error'])):?>
    <?php if($_POST['error']==2):?>
        <p>identifiant incorrect</p>
    <?php elseif($_POST['error']==1):?>
        <p>manque un element</p>
    <?php endif ?>
<?php endif ?>

<form action="" method="post">
    <div>
        <label for="name">Login :</label>
        <input type="text" id="login" name="login">
    </div>
    <div>
        <label for="name">mdp :</label>
        <input type="password" id="mdp" name="mdp">
    </div>
    <div class="button">
        <button type="submit">Envoyer le message</button>
    </div>
</form>