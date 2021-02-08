<?php if(!empty($_POST['error'])):?>
    <?php if($_POST['error']==1):?>
        <p>email deja utilise</p>
    <?php elseif($_POST['error']==2):?>
        <p>un(des) champ(s) incomplet(s)</p>
    <?php endif ?>
<?php endif?>

<form action="" method="post">
    <div>
        <label for="Nom">Nom :</label>
        <input type="text" id="nom" name="nom">
    </div>
    <div>
        <label for="prenom">prenom :</label>
        <input type="text" id="prenom" name="prenom">
    </div>
    <div>
        <label for="email">email :</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="mdp">mdp :</label>
        <input type="password" id="mdp" name="mdp">
    </div>
    <div class="button">
        <button type="submit">Envoyer le message</button>
    </div>
</form>