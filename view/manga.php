<div class="row">
<div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="row">
        <?php foreach($mangas as $manga):?>
           
                <div class="col-sm-3">
                    <div class="card" >
                    <img src="/<?=RACINE?>/img/<?=$manga->getImg()?>" class="card-img-top" alt="image du manga <?=$manga->getTitre() ?>" >
                        <div class="card-body">
                            <h5 class="card-title"><?=$manga->getTitre()?></h5>
                            <?php if($manga->getDessinateur()==$manga->getScenariste()): ?>
                                <p class="card-text"><?=$manga->getDessinateur()?></p>
                            <?php else:?>
                                <p class="card-text"><?=$manga->getDessinateur()?>/<?=$manga->getScenariste()?></p>
                            <?php endif?>
                            <p class="card-text"><?=$manga->getCategorie()?></p>
                            <a href="<?=REQ_TYPE?>/<?=$manga->getTitreUrl()?>" class="btn btn-primary">Detail de la serie</a>
                        </div>
                    </div>
                </div>
            
            
        <?php endforeach?>
        </div>
    </div>

    <div class="col-sm-2"></div>
</div>




   
 



        