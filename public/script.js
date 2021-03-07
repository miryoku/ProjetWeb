AppeleAsync(AfficheStat)



function AppeleAsync(callback,data){
	var xhr = new XMLHttpRequest();
	Async(xhr,callback)
	xhr.open("POST","/projetWeb/async/stat.php", true);
	xhr.responseType="json"
	xhr.send(data);
}



function Async(xhr,callback){
	
	xhr.onreadystatechange = function() {
		if(this.readyState==4 && this.status==200){
			console.log(this.response);
			var res=this.response;
			if(res.success){
				callback(res)
			}
			else {
				console.log(res.msg);
				
			}
		}
		else if(this.response==4){
			console.log("une erreur est survenue ...");
		}
	};
}


function AfficheStat(data){

	let topVentes=data.topVente;
	let stringTopVente ='<table class="table table-striped"><thead><tr><th scope="col">Titre</th><th scope="col">numero du tome</th><th scope="col">tome vendu</th></tr></thead><tbody>';
	topVentes.forEach((topVente) =>{
		stringTopVente=stringTopVente+"<tr><td>"+topVente.titre+"</td><td>"+topVente.numero_du_tome+"</td><td>"+topVente.vente+"</td></tr>"
	})
	stringTopVente=stringTopVente+"</tbody></table>"
	document.getElementById("stat").innerHTML=stringTopVente

}



document.getElementById("check").addEventListener("click",function(e){
	if(getComputedStyle(date2).display != "none"){
		document.getElementById("date2").style.display = "none";
	  } else {
		document.getElementById("date2").style.display = "block";
	  }
})



document.getElementById("form").addEventListener("submit",function(e){
	e.preventDefault();
	document.getElementById("stat").innerHTML=""


	var data=new FormData(this);
	if(document.getElementById("checkGraph").checked ){
		AppeleAsync(AfficheChart,data)
	}else{
		
		AppeleAsync(AfficheStat,data)
	}




});


function AfficheChart(data){
	var topVenteTitre = []
	var topVentreQuantite= []
	data.topVente.forEach(topVente => {
		topVenteTitre.push(topVente.titre+' T'+topVente.numero_du_tome)
		topVentreQuantite.push(topVente.vente)
	});
	
	var canvas = document.createElement("canvas");   
	canvas.id = "myChart"; 
	canvas.width=400;
	canvas.height=400;    
	console.log(canvas)        
	document.getElementById("stat").appendChild(canvas)          

	var ctx = document.getElementById('myChart').getContext('2d');
	var myChart = new Chart(ctx, {	
    type: 'bar',
    data: {
        labels: topVenteTitre,
        datasets: [{
            label: 'Ventes',
            data: topVentreQuantite,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
	
});
}


