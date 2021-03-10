

<div class="card text-center">
  <div class="card-header">
    Information
  </div>
  <div class="card-body">
    <h5 class="card-title"> <?=$manga->getTitre()?></h5>
    <p class="card-text">
        <?php if($manga->getDessinateur()==$manga->getScenariste()): ?>
            Le dessinateur et scenariste : <?=$manga->getDessinateur()?>
        <?php else: ?>
            Le dessinateur : <?=$manga->getDessinateur()?></br>
            Le scenariste : <?=$manga->getScenariste()?>
        <?php endif ?>
        </br>Type : <?=$manga->getCategorie()?>
        </br>Maison d'edition : <?=$manga->getEditeur_oeuvre_origine()?>
    </p>
  </div>
</div>
<div class="row">
<div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="row">        
    <?php foreach($details as $detail):?>
        <div class="col-sm-3">
            <div class="card" >
            <img src="/<?=RACINE?>/img/<?=$detail->getImg()?>" class="card-img-top" alt="image du tome <?=$detail->getNumero_du_tome() ?> du manga <?= $manga->getTitre()?>">
                <div class="card-body">
                    <h5 class="card-title"><?=$detail->getNumero_du_tome() ?></h5>
                    <a href="<?=REQ_TYPE_ID?>/<?=$detail->getNumero_du_tome()?>" class="btn btn-primary">Detail du tome</a>
                </div>
            </div>
         </div>

    <?php endforeach?>
    </div>
    </div>

    <div class="col-sm-2"></div>
</div>

