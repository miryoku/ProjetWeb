
<table>
    <tr>
        <th>Id</th>
        <th>prix</th>
        <th>Date de la commande</th>
        <th>Status</th>
    </tr>
    <?php foreach($commandes as $commandes): ?>
        <tr>
            <td><?= $commandes->getId()?></td>
            <td><?= $commandes->getPrice()?> €</td>
            <td><?= $commandes->getDate()?></td>
            <td><?= $commandes->getStatus()?></td>
            <td><a href="<?= REQ_TYPE?>/<?= $commandes->getId() ?>">detail</a></td>
           </tr>
    <?php endforeach ?>
</table>

