





<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">N° tome</th>
                    <th scope="col">Date de sortie</th>
                    <th scope="col">Prix</th>
                    <th>Quantite en stock</th>
                    <th colspan="3"><a href="<?= REQ_TYPE_ID?>/insert"> Ajout nouveau tome</a></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($details as $detail): ?>
                    <tr>
                        <td><?= $detail->getNumero_du_tome()?></td>
                        <td><?= $detail->getDate_de_sortie()?></td>
                        <td><?= $detail->getPrice()?></td>
                        <td><?= $detail->getQuantite_stock()?></td>
                        <td><a href="<?= REQ_TYPE_ID?>/<?= $detail->getNumero_du_tome() ?>"> affiche</a></td>
                        <td><a href="<?= REQ_TYPE_ID?>/<?= $detail->getNumero_du_tome() ?>/update"> modifier</a></td>
                        <td><a href="<?= REQ_TYPE_ID?>/<?= $detail->getId() ?>/delete"> supprime</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="col-sm-2"></div>
</div>