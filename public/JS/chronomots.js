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
	document.location.href="chronomots.html";
}
function RedirectionListeApplications()
{
	document.location.href="C:/Users/Pc/Documents/Cours/Projet/javascript/listeappli/listeappli.html";
}
var histoire ="Quand un soldat allemand s'attaque à la fouille d'une maison qu'il soupçonne d'abriter des Juifs, où cherche le faucon ? Il cherche dans la grange, il cherche dans le grenier, il cherche dans la cave, il cherche dans tous les endroits où lui se cacherait. Mais il s'en trouve tellement d'autres où un faucon n'aurait jamais l'idée de se cacher. La raison pour laquelle le Führer m'a enlevé à mes Alpes autrichiennes et envoyé en pleine campagne française aujourd'hui, c'est parce que j'en ai l'idée, moi. Parce que je me rends compte des prouesses extraordinaires dont l'homme est capable une fois qu'il a abandonné toute dignité."



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
    
    
    elementsHtml=[new ElementHtml("input","Recommencer"), new ElementHtml("input","Quitter")];
    
    //Creation boutons recommencer et quitter associes à des evenement "click" qui redirige vers la page voulue
    CreationElement(elementsHtml);
    
    var inputs = document.querySelectorAll("input");
    inputs[0].addEventListener("click",RedirectionApplication);
    inputs[1].addEventListener("click",RedirectionListeApplications);
}

function ExecutionExercice()
{
	alert("ddd");
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