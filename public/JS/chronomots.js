function ResultatExercice(){
	
	var secondTemps = new Date().getTime();		//Enregistrement du temps actuel
	
	var tempsLecture = (Math.round((secondTemps-premierTemps)/100)/10);		//Calcul du temps de lecture arrondi au dixieme
	var motsParSeconde = (Math.round(10*nbMotsSouhaite/tempsLecture))/10;	//Calcul du nombre de mots lus par seconde
	var txtResultat = "Votre temps est de " + tempsLecture + "secondes, votre score est donc de " + motsParSeconde +"mots/s.";
	document.body.removeChild(document.querySelector("input"));				//Suppression du bouton "Fini"
	var paraElem = document.createElement('p');
    var txtElem = document.createTextNode(txtResultat);						
    paraElem.appendChild(txtElem);											
    document.body.appendChild(paraElem);									//Affichage résultat
    
    
    elementsHtml=[new ElementHtml("input","Recommencer"), new ElementHtml("input","Quitter")];
    
    //Creation boutons recommencer et quitter associes à des evenement "click" qui redirige vers la page voulue
    CreationElement(elementsHtml);
    
    var inputs = document.querySelectorAll("input");
    inputs[0].addEventListener("click",RedirectionApplication);
    inputs[1].addEventListener("click",RedirectionListeApplications);
}

function ExecutionExercice()
{
	
	premierTemps = new Date().getTime();	//Enregistrement du temps actuel
	var editNbMotsSouhaite = document.getElementById("nbMotsSouhaite");
	nbMotsSouhaite = editNbMotsSouhaite.value;		//Recuperation du nombre de mots
	var texteExercice = TexteDecoupage(nbMotsSouhaite);			//Decoupage du texte
	
	// Suppression du body courant
	SuppressionPage();	//Supprime toute la page
	
	//CreationElement du nouveau body
	var elementsHtml = [
		new ElementHtml('h1',"CHRONOMOTS"),
		new ElementHtml('p',texteExercice),
		new ElementHtml('input', 'Fini')
	];
	alert("ff");
	CreationElement(elementsHtml);
	
	btFin = document.querySelector("input");    
    btFin.addEventListener("click",ResultatExercice);
    
}

var premierTemps = new Date().getTime();
var nbMotsSouhaite = 0;

var inputs = document.querySelectorAll("input");
inputs[1].addEventListener("click", ExecutionExercice);		//creation d'un evenement click sur le bouton associé à la fonction ExecutionExercice