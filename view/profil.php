<div class="row">
<div class="col-sm-2">

    <div class="card" >
        <div class="card-body">
            <h5 class="card-title"><?=$_SESSION['user']->getNom()?> <?=$_SESSION['user']->getPrenom()?></h5>
            <p class="card-text"><?=$_SESSION['user']->getEmail()?></p>
            <p class="card-text"><?=$_SESSION['user']->getDate_inscription()?></p>
            <a href="<?=REQ_TYPE?>/mdp" class="btn btn-primary">Modifier le mot de passe</a>
        </div>
    </div>
</div>
    <div class="col-sm-8">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">rue</th>
                    <th scope="col">numero</th>
                    <th scope="col">numBoite</th>
                    <th scope="col">cp</th>
                    <th scope="col">localite</th>
                    <th scope="col">pays</th>
                    <th  colspan="2"><a href="<?=REQ_TYPE?>/insert">Ajoute une nouvelle adresse</a></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($addresses as $addresse): ?>
            <td><?= $addresse[0]?></td>
            <td><?= $addresse[1]?></td>
            <td><?= $addresse[2]?></td>
            <td><?= $addresse[3]?></td>
            <td><?= $addresse[4]?></td>
            <td><?= $addresse[5]?></td>
            <td><a href="<?=REQ_TYPE?>/update/<?=$addresse[6]?>">Modifier</a></td>
            <td><a href="<?=REQ_TYPE?>/delete/<?=$addresse[6]?>">delete</a></td>
        </tr>
    <?php endforeach ?>
            </tbody>
        </table>
    </div>

<div class="col-sm-2"></div>
</div>
