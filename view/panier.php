<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <h1>Panier</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col" colspan="2">Article</th>
                <th scope="col">Prix à l’unité</th>
                <th scope="col">Quantité</th>
                <th scope="col">Montant </th>
                </tr>
            </thead>
            <?php if(isset($_SESSION['panier'])): ?>
                <?php $i=0; foreach($_SESSION['panier'] as $paniers): ?>
                    <tbody>
                        <tr>
                            <td><img src="img/<?= $paniers[1]->getImg()?>" alt="" width="150" height="150"></td>
                            <td><?= $paniers[0]->getTitre() ?> <?=$paniers[1]->getNumero_du_tome() ?></td>
                            <td><?=$paniers[1]->getPrice()?>
                            <form method="post">
                                <input type="hidden" name="delete" value="<?= ($i==0)?"0.00" : $i ?>">
                                <input type="submit" value="supprime" class="btn btn-danger">
                            </form>
                            </td>
                            <td><?=$paniers[2] ?></td>
                            <td><?=$paniers[1]->getPrice()*$paniers[2] ?></td>
                        </tr>
                    </tbody>
                <?php $i++; endforeach ?>
                    <tfoot>
                        <tr>
                            <td colspan="4"> 
                                <?=$_SESSION['sumPanier']?>
                            </td>
                            <td>
                            <?php if(!empty($_SESSION['user'])): ?>
                                <form method="post">
                                    <input type="submit" value="Commander" name="sell" class="btn btn-primary">
                                </form>
                            <?php else: ?>
                                <a class="btn btn-primary" href="<?=ROOT_PATH?>login">Se connecter</a>
                                <a class="btn btn-primary" href="<?=ROOT_PATH?>inscription">S'inscire</a>
                            <?php endif ?>
                            </td>
                        </tr>
                    </tfoot>
            <?php else:?>
                <tbody>
                    <tr>
                        <td  colspan="5">
                            <h5>Il n'y a pas d'articles dans le panier</h5>
                        </td>
                    </tr>
                </tbody>
            <?php endif?>
        </table>
    </div>
    <div class="col-sm-2"></div>
</div>