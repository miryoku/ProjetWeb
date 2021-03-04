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

	let stringTopVente ="<table><tr><th>Titre</th><th>numero du tome</th><th>tome vendu</th></tr>";

	
	topVentes.forEach((topVente) =>{
		stringTopVente=stringTopVente+"<tr><td>"+topVente.titre+"</td><td>"+topVente.numero_du_tome+"</td><td>"+topVente.vente+"</td></tr>"
	})

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
	var data=new FormData(this);


		AppeleAsync(AfficheStat,data)
	



	

	/*var val = document.getElementById("value")
	var popup = document.getElementById("myPopup");
	console.log(popup.classList)
	if(val.value.length!=0){
	//popup.classList.toggle("show");//permet de supprime si il existe et d'ajoute si il existe pas
	popup.classList.add("show")
	}else{
		popup.classList.remove("show")
	}	
	e.preventDefault();
	var data=new FormData(this);
	AppeleAsync(AfficheListPopUp,data)
	return false;*/
});


