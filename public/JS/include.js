
//function Changement()
//{
//	document.write("<script type=\"text\/javascript\" src=\"/JS/chronomots.js\"><\/script>");
//}
//
//var h1 = document.querySelector("h1");
//h1.addEventListener("click", Changement);


//
//document.write("<script type=\"text\/javascript\" src=\"/JS/chronomots.js\"><\/script>");




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

