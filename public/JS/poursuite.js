function EnregistrementResultat()
{
	Requete2(EnvoiDonnees); 
}

function ResultatExercice(){
	
	document.body.removeChild(document.querySelector("input"));				//Suppression du bouton "Fini"
										
    
    
    elementsHtml=[															//Affichage resultat et boutons 
    	new ElementHtml("input","Recommencer"), 
    	new ElementHtml("input","Quitter")
    	];    
    var aLien1 = document.createElement("a");
    aLien1.href = "/exercices/poursuite";
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
var temoin = 0;
var time;
function enlevementlettre()
{
	var hist = document.querySelectorAll('p');
	var texte = hist[3].innerHTML.split('');
	if(texte[temoin]){
		
		if(texte[temoin] == ' ' || texte[temoin] == 'I' || texte[temoin] == ','){
			texte[temoin]= ' .';
			temoin = temoin + 2;
		}else{
			texte[temoin]= '. .';
			temoin = temoin + 3;
		}

		hist[3].innerHTML = texte.join('');
		setTimeout(enlevementlettre,time.value); 
	}
}

function Miseenplace()
{
	
	histoireChoisie = document.querySelector('select'); 
	histoire = recuperationAjax[document.querySelector('select').value];         //recuperation de la bonne histoire en utilisant qui est le premier caractere de chaque element de la liste déroulante
	var editNbMotsSouhaite = document.getElementById("nbMotsSouhaite");
	nbMotsSouhaite = editNbMotsSouhaite.value;		//Recuperation du nombre de mots
	var texteExercice = TexteDecoupage(nbMotsSouhaite);			//Decoupage du texte
	
	
	var texttest = texteExercice.split('');
	var i = 0;
	while(texttest[i]){

		if(texteExercice.charCodeAt(i) >= 97){
			texttest[i] = texteExercice.charCodeAt(i)-32;
			texttest[i] = String.fromCharCode(texttest[i]);
		}
		i++;
	}
//	texttest = texttest.join('');
	time = document.getElementById("vitesse");

	// Suppression du body courant
	SuppressionPage();	//Supprime toute la page
	//CreationElement du nouveau body
	
	var elementsHtml = [
		new ElementHtml('h1',"Poursuite"),
		new ElementHtml('p',texttest.join('')),
	];
	
	CreationElement(elementsHtml);


	setTimeout(enlevementlettre,1000); // appel après 0.1 secondes = 100 millisecondes////////

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
inputs[3].addEventListener("click", Miseenplace);		//creation d'un evenement click sur le bouton associé à la fonction ExecutionExercice
