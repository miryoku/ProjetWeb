<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-3"><img src="/<?=RACINE?>/img/<?=$detail->getImg()?>" class="card-img-top" alt="image du tome <?=$detail->getNumero_du_tome() ?> du manga <?= $manga->getTitre()?>"></div>
    <div class="col-sm-5">
        <table class="table">
            <tbody>
                <tr>
                    <td>Titre</td>
                    <td><?=$manga->getTitre()?></td>
                </tr>
                <tr>
                    <td>Numero du tome</td>
                    <td><?=$detail->getNumero_du_tome()?></td>
                </tr>
                <tr>
                    <td>Prix</td>
                    <td><?=$detail->getPrice()?></td>
                </tr>
                <tr>
                    <td>Dessinateur </td>
                    <td><?=$manga->getDessinateur()?></td>
                </tr>
                <tr>
                    <td>Scenariste </td>
                    <td><?=$manga->getScenariste()?></td>
                </tr>
                <tr>
                    <td>Editeur </td>
                    <td><?=$manga->getEditeur_oeuvre_origine()?></td>
                </tr>
                <tr>
                    <td>Type </td>
                    <td><?=$manga->getCategorie()?></td>
                </tr>
                <tr>
                    <td>Type </td>
                    <td>
 
                        <?php for($i=0;$i!=count($manga->getGenre());$i++): ?> 
                            <?=$manga->getGenre()[$i][0]?>                
                            <?php if($i+1<count($manga->getGenre())): ?>
                                ,
                            <?php endif ?>
                        <?php endfor?>
                    </td>                  
                </tr>
                <tr>
                    <td>Date de sortie</td>
                    <td><?=$detail->getDate_de_sortie()?></td>
                </tr>
                <tr>
                    <td>Ean</td>
                    <td><?=$detail->getEan()?></td>
                </tr>               
            </tbody>
        </table>
        <h5>Resume</h5>
        <p><?=$detail->getResume_du_tome()?></p>


        <?php if($detail->getQuantite_stock()!=0): ?>    
            <form method="post">
                <label for="exampleInputEmail1" class="form-label">Quantite</label>
                <select name="quantite"  class="form-control">
                <option value="1" selected>1</option>
                <?php for($i=2;$i<10 && $i<=$detail->getQuantite_stock();$i++): ?>
                <option value="<?=$i?>"><?=$i?></option>
        <?php endfor ?>

            </select>
                <input type="submit" name="send" value="Ajout au panier"  class="btn btn-primary">
            </form>
        <?php endif ?>
    </div>

    <div class="col-sm-2"></div>

</div>



