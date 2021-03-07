
<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    <th scope="col">Numero du tome</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Ean</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($arrays as $array): ?>
                    <tr>
                        <td><?= $array[1]->getTitre()?></td>
                        <td><?=  $array[2]->getNumero_du_tome()?></td>
                        <td><?= $array[0]->getPrix()?></td>
                        <td><?=$array[2]->getEan()?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <a class="btn btn-primary" href="<?= REQ_TYPE_ID?>/confirme">Confirmer</a>
        <a class="btn btn-danger" href="<?= REQ_TYPE_ID?>/annuler">annuler </a>
    </div>
    <div class="col-sm-2"></div>
</div>
