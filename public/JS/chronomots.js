function EnregistrementResultat()
{
	Requete2(EnvoiDonnees); 
}

function ResultatExercice(){
	
	var secondTemps = new Date().getTime();		//Enregistrement du temps actuel
	
	var tempsLecture = (Math.round((secondTemps-premierTemps)/100)/10);		//Calcul du temps de lecture arrondi au dixieme
	var motsParSeconde = (Math.round(10*nbMotsSouhaite/tempsLecture))/10;	//Calcul du nombre de mots lus par seconde
	var txtResultat = "Votre temps est de " + tempsLecture + " secondes, votre score est donc de " + motsParSeconde +" mots/s.";
	document.body.removeChild(document.querySelector("input"));				//Suppression du bouton "Fini"
										
    
    
    elementsHtml=[													//Affichage resultat et boutons 
    	new ElementHtml("p", txtResultat),
    	new ElementHtml("input","Enregistrer"),
    	new ElementHtml("input","Recommencer"), 
    	new ElementHtml("input","Quitter")
    	];    
    var aLien1 = document.createElement("a");
    aLien1.href = "/exercices/chronomots";
    var aLien2 = document.createElement("a");
    aLien2.href = "/exercices";   
    //Creation affichage resultat, boutons recommencer et quitter associes à des evenement "click" qui redirige vers la page voulue
    CreationElement(elementsHtml);    
    var inputs = document.querySelectorAll("input");
    inputs[0].addEventListener("click", EnregistrementResultat);
    aLien1.appendChild(inputs[1]);
    aLien2.appendChild(inputs[2]);
    document.body.appendChild(aLien1);
    document.body.appendChild(aLien2);
    
}

function ExecutionExercice()
{
	alert("br");
	var histoireChoisie = document.querySelector('select'); 
	histoire = recuperationAjax[histoireChoisie.value[0]-1];         //recuperation de la bonne histoire en utilisant qui est le premier caractere de chaque element de la liste déroulante
	
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
	CreationElement(elementsHtml);
	
	btFin = document.querySelector("input");    
    btFin.addEventListener("click",ResultatExercice);
    
}
var histoire;
var premierTemps = new Date().getTime();
var nbMotsSouhaite = 0;
var recuperationAjax;
Requete(RecuperationDonnee); //Recupere un tableau contenant les histoires
var inputs = document.querySelectorAll("input");
//inputs[0].addEventListener("click", EditerHistoire);
inputs[2].addEventListener("click", ExecutionExercice);		//creation d'un evenement click sur le bouton associé à la fonction ExecutionExercice




