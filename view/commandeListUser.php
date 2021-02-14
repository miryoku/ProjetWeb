
    <table>
        <tr>    
            <th>Numero de la commande</th>
            <th>Prix</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php $i=1; foreach($commandes as $commande): ?>
            <tr>
                <td> <?= $i++ ?></td>
                <td> <?= $commande->getPrice() ?></td>
                <td> <?= $commande->getDate() ?></td>
                <td> <?= $commande->getStatus() ?></td >
                <td><a href="<?=REQ_TYPE?>/<?= $commande->getId_commande()?>">Detail</a></td>
            </tr>
        <?php endforeach ?>
    </table>




