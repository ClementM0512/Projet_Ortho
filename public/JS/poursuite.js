function EnregistrementResultat()
{
	Requete2(EnvoiDonnees); 
}

function ResultatExercice(){
	
	document.body.removeChild(document.querySelector("input"));				//Suppression du bouton "Fini"
										
    
    
    elementsHtml=[													//Affichage resultat et boutons 
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

function Miseenplace()
{
	histoireChoisie = document.querySelector('select'); 
	histoire = recuperationAjax[document.querySelector('select').value];         //recuperation de la bonne histoire en utilisant qui est le premier caractere de chaque element de la liste déroulante
	var editNbMotsSouhaite = document.getElementById("nbMotsSouhaite");
	nbMotsSouhaite = editNbMotsSouhaite.value;		//Recuperation du nombre de mots
	var texteExercice = TexteDecoupage(nbMotsSouhaite);			//Decoupage du texte
	
	// Suppression du body courant
	SuppressionPage();	//Supprime toute la page
	//CreationElement du nouveau body
	
	var elementsHtml = [
		new ElementHtml('h1',"Poursuite"),
		new ElementHtml('p',texteExercice),
	];
	CreationElement(elementsHtml);
	var body = document.querySelector("body");
	body.style.textAlign = "center";
	var p = document.querySelector("p");
	p.style.marginLeft = "100px";
	p.style.marginRight = "100px";
	p.style.fontSize = "1.3em";   
}

var histoire;
var nbMotsSouhaite = 0;
var recuperationAjax;
for(i=0;i<document.querySelector('select').length;i++)
{
	document.querySelector("select")[i].value = i; 	
}

Requete(RecuperationDonnee); //Recupere un tableau contenant les histoires
var inputs = document.querySelectorAll("input");
//inputs[0].addEventListener("click", EditerHistoire);
inputs[4].addEventListener("click", Miseenplace);		//creation d'un evenement click sur le bouton associé à la fonction ExecutionExercice
