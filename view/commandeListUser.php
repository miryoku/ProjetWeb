<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">Numero de la commande</th>
                <th scope="col">Prix</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($commandes as $commande): ?>
                    <tr>
                        <th scope="row"> <?= $i++ ?></th>
                        <td> <?= $commande->getPrice() ?></td>
                        <td> <?= $commande->getDate() ?></td>
                        <td> <?= $commande->getStatus() ?></td >
                        <td><a href="<?=REQ_TYPE?>/<?= $commande->getId_commande()?>">Detail</a></td>
                        <?php if($commande->getStatus()=="en cours"): ?>
                            <td><a href="<?=REQ_TYPE?>/<?= $commande->getId_commande()?>/commande">Annule</a></td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-2"></div>
</div>