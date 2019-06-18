function EnregistrementResultat()
{
	Requete2(EnvoiDonnees); 
}

function Redimensionnement(){
	this.size = 20;
	this.placeholder = "";
}

function ResultatExercice(){
	var secondTemps = new Date().getTime();		//Enregistrement du temps actuel
	
	var tempsLecture = (Math.round((secondTemps-premierTemps)/100)/10);		//Calcul du temps de lecture arrondi au dixieme
	alert(nbMotsSouhaite);
	var motsParSeconde = (Math.round(10*nbMotsSouhaite/tempsLecture))/10;	//Calcul du nombre de mots lus par seconde
	var txtResultat = "Votre temps est de " + tempsLecture + " secondes, votre score est donc de " + motsParSeconde +" mots/s.";
	//document.body.removeChild(document.querySelector("input"));				//Suppression du bouton "Fini"
				
    
    elementsHtml=[													//Affichage resultat et boutons 
    	new ElementHtml("p", txtResultat)
//    	new ElementHtml("input","Recommencer"), 
    	];    
    
//    var aLien1 = document.createElement("a");
//    aLien1.href = "/exercices/chronomots";
//    var aLien2 = document.createElement("a");
//    aLien2.href = "/exercices";   
    //Creation affichage resultat, boutons recommencer et quitter associes à des evenement "click" qui redirige vers la page voulue
    CreationElement(elementsHtml);    
//    var inputs = document.querySelectorAll("input");
//    inputs[0].addEventListener("click", EnregistrementResultat);
//    aLien1.appendChild(inputs[1]);
//    aLien2.appendChild(inputs[2]);
//    document.body.appendChild(aLien1);
//    document.body.appendChild(aLien2);
    alert("dd");
    
    if(document.getElementById("enregistrement").checked==true){
		var exerciceNom = document.getElementById("exercice").innerHTML;
		var patientNom = document.getElementById("patient").innerHTML;
		alert(patientNom +" / "+exerciceNom);
		var url = "/envoiajax?score=" + motsParSeconde + "&exercice="+ exerciceNom +"&patient=" + patientNom + "&bilan=1";
		
		EnregistrementResultat(EnvoiDonnees, url);
	}
    
}

function ExecutionExercice()
{
	
	histoireChoisie = document.querySelector('select'); 
	histoire = recuperationAjax[document.querySelector('select').value];         //recuperation de la bonne histoire en utilisant qui est le premier caractere de chaque element de la liste déroulante
	if((isNaN(editNbMotsSouhaite.value)) || (editNbMotsSouhaite.value<0) || (histoire.length<editNbMotsSouhaite.value)){ // Test si le nbMotsSouhaité est une valeur acceptable et affiche un message d'erreur dans le cas contraire
		var entreeEronee = editNbMotsSouhaite.value;
		editNbMotsSouhaite.value = "";
		var erreurTexte;
		if(isNaN(entreeEronee)){erreurTexte = "'"+ entreeEronee +"' n'est pas un nombre.";}
		else if(entreeEronee<0){erreurTexte = "'"+ entreeEronee +"' est inferieur à 0.";}
		else{erreurTexte = "'"+ entreeEronee +"' est supérieur à la longueur du texte ("+ histoire.length +").";}
		editNbMotsSouhaite.placeholder = erreurTexte;
		editNbMotsSouhaite.size = erreurTexte.length;
		return 0;
	}
		
	histoireChoisie = document.querySelector('select'); 
	histoire = recuperationAjax[document.querySelector('select').value];         //recuperation de la bonne histoire en utilisant qui est le premier caractere de chaque element de la liste déroulante
	
	premierTemps = new Date().getTime();	//Enregistrement du temps actuel
	if(!editNbMotsSouhaite.value){var texteExercice = histoire;nbMotsSouhaite = histoire.split(' ').length;} // Si aucune valeur entrée -> texte en entier
	else{var texteExercice = TexteDecoupage(editNbMotsSouhaite.value);nbMotsSouhaite=editNbMotsSouhaite.value;} 	//Decoupage du texte
				
	
	
	SuppressionPage();	//Supprime toute la partie exercice de la page
	//CreationElement du nouveau body
	
	var elementsHtml = [
		new ElementHtml('p',texteExercice)
		//new ElementHtml('input', 'Fini')
	];
	CreationElement(elementsHtml);
	btFin = document.querySelector("input");   
    btFin.addEventListener("click",ResultatExercice);
    document.body.addEventListener('keydown',ResultatExercice, {once : true});
}
var editNbMotsSouhaite = document.getElementById("nbMotsSouhaite");
var histoire;
var premierTemps = new Date().getTime();
var nbMotsSouhaite = 0;
var recuperationAjax;
for(i=0;i<document.querySelector('select').length;i++)
{
	document.querySelector("select")[i].value = i; 	
}

Requete(RecuperationDonnee); //Recupere un tableau contenant les histoires
var input = document.getElementById("Lancement");
//inputs[0].addEventListener("click", EditerHistoire);
input.addEventListener("click", ExecutionExercice);		//creation d'un evenement click sur le bouton associé à la fonction ExecutionExercice
editNbMotsSouhaite.addEventListener("click", Redimensionnement);



