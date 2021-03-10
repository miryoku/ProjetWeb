var racine="projetweb"

var stat =document.getElementById("stat");
var check=document.getElementById("check")
var form=document.getElementById("form")
var search=document.getElementById("search")



	if(stat){
		AppeleAsync("stat",AfficheStat)
	}

	if(check){
		check.addEventListener("click",function(e){
			if(getComputedStyle(date2).display != "none"){
				document.getElementById("date2").style.display = "none";
			} else {
				document.getElementById("date2").style.display = "block";
			}
		})
	}

	if(form){
		form.addEventListener("submit",function(e){
			e.preventDefault();
			document.getElementById("stat").innerHTML=""


			var data=new FormData(this);
			if(document.getElementById("checkGraph").checked ){
				AppeleAsync("stat",AfficheChart,data)
			}else{
				
				AppeleAsync("stat",AfficheStat,data)
			}

		});
	}

	search.addEventListener("submit",function(e){
		e.preventDefault();
		var data=new FormData(this);
		AppeleAsync("search",AfficheSearch,data)

	})

function AfficheSearch(data){
	let listMangas=data.listeManga;
	let string ='<h5>Manga</h5><table class="table table-striped"><thead><tr><th scope="col" colspan="2">manga</th></tr></thead><tbody>';
	listMangas.forEach((listManga) =>{
		string=string+"<tr><td><a href='/"+racine+"/manga/"+listManga.titre.split(' ').join('-')+"'><img src='/"+racine+"/img/"+listManga.img+"' width='100' height='100'></a></td><td>"+listManga.titre+"</td></tr>"
	})
	string=string+"</tbody></table>"

	document.getElementById("ici").innerHTML=string

}







function AppeleAsync(ressource,callback,data){
	var xhr = new XMLHttpRequest();
	Async(xhr,callback)
	xhr.open("POST","/"+racine+"/async/"+ressource+".php", true);
	xhr.responseType="json"
	xhr.send(data);
}


function Async(xhr,callback){
	
	xhr.onreadystatechange = function() {
		if(this.readyState==4 && this.status==200){
			//console.log(this.response);
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
	let stringTopVente ='<h5>Meilleur Vente</h5><table class="table table-striped"><thead><tr><th scope="col">Titre</th><th scope="col">numero du tome</th><th scope="col">tome vendu</th></tr></thead><tbody>';
	topVentes.forEach((topVente) =>{
		stringTopVente=stringTopVente+"<tr><td>"+topVente.titre+"</td><td>"+topVente.numero_du_tome+"</td><td>"+topVente.vente+"</td></tr>"
	})
	stringTopVente=stringTopVente+"</tbody></table>"
	stringTopVente=stringTopVente+afficheNextStat(data)
	document.getElementById("stat").innerHTML=stringTopVente

}

function afficheNextStat(data){
	let stringTopVente='<h5>Stat</h5><table class="table table-striped"><thead><tr><th scope="col">La plus grosse commande</th><th scope="col">Moyenne des commande</th><th scope="col">nombre de commande</th></tr></thead><tbody><tr>'
	stringTopVente=stringTopVente+"<td>"+data.TopClient[0].max+"</td><td>"+data.moyenneCommande[0].moyenne+"</td><td>"+data.nombreDeCommande[0].nombreCommande+"</td>"
	stringTopVente=stringTopVente+"</tr></tbody></table>"
	
	return stringTopVente
}

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

	let afficheStat=afficheNextStat(data)
	document.getElementById("stat").innerHTML=afficheStat
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


