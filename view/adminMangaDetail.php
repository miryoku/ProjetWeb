<table>
    <tr>
        <th>Numero de tome</th>
        <th>Date de sortie</th>
        <th>Prix</th>
        <th>Quantite en stock</th>
        <th><td><a href="<?= REQ_TYPE_ID?>/insert"> Ajout nouveau tome</a></td></th>
    </tr>
    <?php foreach($details as $detail): ?>
        <tr>
            <td><?= $detail->getNumero_du_tome()?></td>
            <td><?= $detail->getDate_de_sortie()?></td>
            <td><?= $detail->getPrice()?></td>
            <td><?= $detail->getQuantite_stock()?></td>
            <td><a href="<?= REQ_TYPE_ID?>/<?= $detail->getNumero_du_tome() ?>"> affiche</a></td>
            <td><a href="<?= REQ_TYPE_ID?>/<?= $detail->getNumero_du_tome() ?>/update"> modifier</a></td>
            <!--<td><a href="<?= REQ_TYPE_ID?>/<?= $detail->getId() ?>/delete"> supprime</a></td>-->
        </tr>
    <?php endforeach ?>
</table>