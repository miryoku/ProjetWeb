
<table>
    <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Type</th>
        <th><a href="<?=REQ_TYPE?>/insertManga">Ajoute une nouvelle serie</a></th>
    </tr>
    <?php foreach($mangas as $list): ?>
        <tr>
            <td><?= $list->getId()?></td>
            <td><?= $list->getTitre()?></td>
            <td><?= $list->getCategorie()?></td>
            <td><a href="<?=REQ_TYPE?>/<?= $list->getTitreUrl()?>">selection</a></td>
            <td><a href="<?=REQ_TYPE?>/updateManga/<?=$list->getTitreUrl()?>">Modifier</a></td>
        </tr>
    <?php endforeach ?>
</table>

