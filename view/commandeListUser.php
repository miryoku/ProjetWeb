
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
                <?php if($commande->getStatus()=="en cours"): ?>
                    <td><a href="<?=REQ_TYPE?>/<?= $commande->getId_commande()?>/commande">Annule</a></td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </table>




