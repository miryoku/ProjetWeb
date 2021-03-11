<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Type</th>
                    <th  colspan="3"><a href="<?=REQ_TYPE?>/insertManga">Ajoute une nouvelle serie</a></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($mangas as $manga): ?>
        <tr>
            <td><?= $manga->getId()?></td>
            <td><?= $manga->getTitre()?></td>
            <td><?= $manga->getCategorie()?></td>
            <td><a href="<?=REQ_TYPE?>/<?= $manga->getTitreUrl()?>">selection</a></td>
            <td><a href="<?=REQ_TYPE?>/updateManga/<?=$manga->getTitreUrl()?>">Modifier</a></td>
            <td><a href="<?=REQ_TYPE?>/delete/<?=$manga->getId()?>">delete</a></td>
        </tr>
    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-2"></div>
</div>
