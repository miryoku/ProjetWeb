<div class="row">
<div class="col-sm-2">
<div style="height:10%; "></div>
        <form method="post">
            <?php foreach($categories as $categorie): ?>
                <div class="mb-3 form-check">
                    <input type="radio" class="form-check-input" id="exampleCheck1" name="categorie" value=" <?=$categorie[0]?>">
                    <label class="form-check-label" for="exampleCheck1"> <?=$categorie[1]?>   </label>
                </div>
            <?php endforeach ?>
            <button type="submit" class="btn btn-primary">Recherche</button>
        </form>
    <div class="col-sm-3"></div>
    
</div>
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




   
 



        