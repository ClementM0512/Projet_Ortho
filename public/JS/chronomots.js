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
	histoireChoisie = document.querySelector('select'); 
	histoire = recuperationAjax[document.querySelector('select').value];         //recuperation de la bonne histoire en utilisant qui est le premier caractere de chaque element de la liste déroulante
	premierTemps = new Date().getTime();	//Enregistrement du temps actuel
	var editNbMotsSouhaite = document.getElementById("nbMotsSouhaite");
	nbMotsSouhaite = editNbMotsSouhaite.value;		//Recuperation du nombre de mots
	var texteExercice = TexteDecoupage(nbMotsSouhaite);			//Decoupage du texte
	
	// Suppression du body courant
	SuppressionPage();	//Supprime toute la page
	//CreationElement du nouveau body
	
	var elementsHtml = [
		new ElementHtml('h1',"Chronomots"),
		new ElementHtml('p',texteExercice),
		new ElementHtml('input', 'Fini')
	];
	CreationElement(elementsHtml);
	var body = document.querySelector("body");
	body.style.textAlign = "center";
	var p = document.querySelector("p");
	p.style.marginLeft = "100px";
	p.style.marginRight = "100px";
	p.style.fontSize = "1.3em";
	btFin = document.querySelector("input");   
    btFin.addEventListener("click",ResultatExercice);
    document.body.addEventListener('keydown',ResultatExercice);
}

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




