<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h5>Commande en Cours</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">prix</th>
                    <th scope="col">Date de la commande</th>
                    <th scope="col" colspan="2">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($commandesEnCours as $commande): ?>
                    <tr>
                        <td><?= $commande->getId()?></td>
                        <td><?= $commande->getPrice()?> €</td>
                        <td><?= $commande->getDate()?></td>
                        <td><?= $commande->getStatus()?></td>
                        <td><a href="<?= REQ_TYPE?>/<?= $commande->getId() ?>">detail</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <h5>Commande Fini</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">prix</th>
                    <th scope="col">Date de la commande</th>
                    <th scope="col" colspan="2">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($commandesFini as $commande): ?>
                    <tr>
                        <td><?= $commande->getId()?></td>
                        <td><?= $commande->getPrice()?> €</td>
                        <td><?= $commande->getDate()?></td>
                        <td><?= $commande->getStatus()?></td>
                        <td><a href="<?= REQ_TYPE?>/<?= $commande->getId() ?>">detail</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <h5>Commande Annule</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">prix</th>
                    <th scope="col">Date de la commande</th>
                    <th scope="col" colspan="2">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($commandesAnnul as $commande): ?>
                    <tr>
                        <td><?= $commande->getId()?></td>
                        <td><?= $commande->getPrice()?> €</td>
                        <td><?= $commande->getDate()?></td>
                        <td><?= $commande->getStatus()?></td>
                        <td><a href="<?= REQ_TYPE?>/<?= $commande->getId() ?>">detail</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    


    <div class="col-sm-2"></div>
</div>
