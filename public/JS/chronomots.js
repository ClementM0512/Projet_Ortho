var req;
function request(callback) {
	var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					return callback(xhr.responseText);	
				}
			};		
	xhr.open("GET", "/sendarticle", false);
	xhr.send(null);	
}
function readData(sData) {
	req = JSON.parse(sData);
	return JSON.parse(sData);
	
}
request(readData);




function ElementHtml(type, texte){		//constructeur d'objet ElementHTML
  this.type = type;
  this.texte = texte;
}


function CreationElement(elemtab)
{
  var nvelem;
  var texte;
  var ul;
  for(i=0;i<elemtab.length;i++)
  {
    if(elemtab[i].type=="ul")
    {       		
	  ul = document.createElement(elemtab[i].type);
	  document.body.appendChild(ul); 
    }
    else if(elemtab[i].type=="input")
    {
    	nvelem = document.createElement(elemtab[i].type);
        nvelem.type = "button";
        nvelem.value = elemtab[i].texte;
        document.body.appendChild(nvelem);
    }
    else if(elemtab[i].type=="li")
    {
      nvelem = document.createElement(elemtab[i].type);
      texte = document.createTextNode(elemtab[i].texte);
      nvelem.appendChild(texte);
      ul.appendChild(nvelem);
    }
    else
    {  
      nvelem = document.createElement(elemtab[i].type);
      texte = document.createTextNode(elemtab[i].texte);
      nvelem.appendChild(texte);
      document.body.appendChild(nvelem);
    }
  }
}

function SuppressionPage()						//Suppression de tous les noeuds enfant de body
{
	while(document.body.childNodes[0])
	{
		document.body.removeChild(document.body.childNodes[0]);	
	}
}
function NouvellePage()
{
	while(document.body.childNodes[0])
	{
		document.body.removeChild(document.body.childNodes[0]);
	}
	var script = document.createElement('script');
    script.src = "parametrage.js";
    document.body.appendChild(script);
}

function TexteDecoupage(nbMotsSouhaite)
{
	var texte = histoire.split(' ');		//Conversion de la chaine de caractere en tableau de mots
	var nbMotsSupprime = texte.length - nbMotsSouhaite + 1;		
	texte.splice(nbMotsSouhaite,nbMotsSupprime);	//Suppression de nbMotsSouhaité à nbMotsSouhaité+nbMotsSupprime
	texte = texte.join(' ');					//Conversion du tableau en chaîne
	return texte; //Renvoie d'une chaine de caracteres de nbMots
}
function RedirectionApplication()
{
	//window.location.reload();
	document.location.href="/chonomots";
}
function RedirectionListeApplications()
{
	alert("fff");
	document.location.href="C:/Users/Pc/Documents/Cours/Projet/javascript/listeappli/listeappli.html";
}



///////////////////////////////////////////////////////

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
    
    
    elementsHtml=[
    	new ElementHtml("input","Recommencer"), 
    	new ElementHtml("input","Quitter")
    	];
    
    var aLien1 = document.createElement("a");
    aLien1.href = "/exercices/chronomots";
    var aLien2 = document.createElement("a");
    aLien2.href = "/exercices";
   
    //Creation boutons recommencer et quitter associes à des evenement "click" qui redirige vers la page voulue
    CreationElement(elementsHtml);
    
    var inputs = document.querySelectorAll("input");
    aLien1.appendChild(inputs[0]);
    aLien2.appendChild(inputs[1]);
    document.body.appendChild(aLien1);
    document.body.appendChild(aLien2);
    
}

function ExecutionExercice()
{
	var histoireChoisie = document.querySelector('select');
	histoire = req[histoireChoisie.value[0]-1];
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

var inputs = document.querySelectorAll("input");
inputs[1].addEventListener("click", ExecutionExercice);		//creation d'un evenement click sur le bouton associé à la fonction ExecutionExercice