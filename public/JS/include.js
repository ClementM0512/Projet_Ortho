function Requete(callback) {
	var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					return callback(xhr.responseText);	
				}
			};		
	xhr.open("GET", "/sendarticle", false);
	xhr.send(null);	
}
function RecuperationDonnee(sData) {
	recuperationAjax = JSON.parse(sData);	
}


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

function SuppressionPage()						//Suppression de tous les noeuds enfant de body -nbElemStatique
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





