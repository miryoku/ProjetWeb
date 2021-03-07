<script src="/projetWeb/public/chart.js"></script>

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">

        <form id='form'>
            
        <div class="mb-3">
            <label for="exampledate" class="form-label">la 1 date </label>
            <input type="date" class="form-control" id="date1" aria-describedby="dateHelp" name="date1">
        </div>
        <div class="mb-3">
            <input  aria-describedby="dateHelp" class="form-check-input" type="checkbox" name="check" id="check">
        </div>
        <div class="mb-3" id="date2" style="display:none">
            <label for="exampledate" class="form-label">la 2 date </label>
            <input type="date" class="form-control"  aria-describedby="dateHelp" name="date2" >
        </div>
        <div class="mb-3">
            <label for="exampledate" class="form-label">Nonbre d'article a afficher</label>
            <input aria-describedby="dateHelp" class="form-control" type="number" name="quant" id="quant" value="3">
        </div>
       <button class="btn btn-primary" >send</button>
       <div class="mb-3">
            <label for="exampledate" class="form-label">Afficher le graph</label>
            <input  aria-describedby="dateHelp" class="form-check-input" type="checkbox" name="checkGraph" id="checkGraph" value="off">
        </div>
        </form>
        <div id="stat">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
       
    </div>





    <div class="col-sm-2"></div>
</div>






<script src="/projetWeb/public/script.js"></script>