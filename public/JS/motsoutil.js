function MoteurJeu()
{
	var texte = recuperationAjax[document.querySelector('select').value];         //recuperation de la bonne histoire en utilisant qui est le premier caractere de chaque element de la liste déroulante
	nbMotsATrouver = document.getElementById("nbMotsATrouver").value;							//nombre de mots a trouver

	
	if((!nbMotsATrouver) || (isNaN(nbMotsATrouver)) || (nbMotsATrouver<0) || (nbMotsATrouver>Math.round(texte.split(' ').length/7))){ // Test si le nbMotsSouhaité est une valeur acceptable et affiche un message d'erreur dans le cas contraire
		
		return 0;
	}
	
	
	var boutons = new Array();			//bouton pour choisir le mots
	var motsATrouver = new Array();		//Les mots effacer à retrouver
	var motsTrouves = new Array();		//Les mots choisis par l'utilisateur
	var indexMots = new Array();		//La place des mots a chercher dans le texte afin de pouvoir changer sa couleur a la fin en fonction de la reussite ou non de l'user
	var tailleMinMots = 4;				//Taille minimale des mots a enlever
	var recadrageTaille = 0;			//Variable qui permet de changer la taille min si aucun mots assez petits
	
	var tab = new Array();				//Tableau des parties de phrase ou se trouvent les mots à retrouver
	var index = 0;						//Variable incrémentée dans une fonction servant à couper le texte en 'nbMotsATrouver' petits texte, puis sert a savoir quel partie de texte afficher
	var verif = 0;						//Sert a savoir si un mots a enlever a ete trouver pour chaque petit texte, sinon on reduit la taille grace a "recadrageTaille"
	var transition;						//Sert a garder en memoire
	
	SuppressionPage();
	div = document.createElement("div");
	document.getElementById('application').appendChild(div);
	p = document.createElement("p");
	document.getElementById('application').appendChild(p);
	pRes = document.createElement("p");
	document.getElementById('application').appendChild(pRes);
	/////////////	Mets une structure de deux chaines : partie de texte entiere/partie de texte trouée, dans tableau	//////////////
	function DoubleTexte(full, cut)
	{
		this.full = full;
	    this.cut = cut;
	}
	for(i=0;i<nbMotsATrouver;i++)
	{
		tab.push(new DoubleTexte(new Array(), new Array()));
	}
	
	////////	Decoupe le texte lorsque il y a un point (si partie assez grande) ou lorsque superieur a 9 caractere
	for(var i =0; i<texte.split(" ").length;i++)
	{
		tab[index].full.push(texte.split(' ')[i]);
	    tab[index].cut.push(texte.split(' ')[i]);
	    if((texte.split(' ')[i].indexOf('.')!=-1) || (tab[index].cut.length>9)){index++;}
	    if(index==nbMotsATrouver) {break;}
	}
	
	index = 0;
	
	
	//////////////  Fait des trou dans le texte a trou (cut), garde les mots a trouver en memoire puis converti les tableau en chaine
	for(i=0;i<nbMotsATrouver;i++)
	{
		for(var j=0; j<(tab[i].cut).length;j++)
		{
    		if((tab[i].cut[j]).length<tailleMinMots) {        	
	        	motsATrouver.push(tab[i].cut[j]);
	        	tab[i].cut[j]="_____";
	        	indexMots.push(j);
				verif++;
				break;
	        }
	        if((!verif) && (j+1==tab[i].cut.length))
	        {
	        	tailleMinMots++;
	            recadrageTaille++;
	            j=0;
	        }
	    }
	    tab[i].cut = tab[i].cut.join(' ');
	    verif=0;
	    tailleMinMots-=recadrageTaille;
	    recadrageTaille=0;
	}
	
	//////////////  Mets les mots a trouver dans un nouveau tableau et les melanges aléatoirement
	var aleatoire = Math.round(Math.random()*10);
	var motsChange = motsATrouver.slice();
	for(j=0; j<aleatoire;j++)
	{
		for(i=0;i<motsChange.length-1;i++)
		{
			if(j%2==0)
			{
				transition = motsChange[i];
				motsChange[i] = motsChange[i+1];
				motsChange[i+1] = transition;
			}  
		}
	}
	
//	var div = document.getElementById("motschoix");
//	var p = document.querySelector('p');
	
	///////////// Place les boutons dans le html
	for(i=0;i<motsATrouver.length;i++)
	{
	  boutons.push(document.createElement("input"));
	  boutons[i].type = "button";
	  boutons[i].value = motsChange[i];
	  div.appendChild(boutons[i]);
	  boutons[i].addEventListener("click", deroulement);
	}
	
	///////////// Ecrit la premiere partie du texte a trou
	//texte = document.createTextNode(tab[index].cut);
	p.innerHTML+= " " + tab[index].cut;
	
	function deroulement()
	{
		index++;				// PArtie du texte suivante
		motsTrouves.push(this.value);			//Sauvegarde du mots choisi
		if(index<nbMotsATrouver)					//Ecriture de la nouvelle partie avec mots a trouver
		{
			p.innerHTML+= " " + tab[index].cut;
		}
		///// FIN /////
		else if(index==nbMotsATrouver)
		{
			var res = 0;
			// CALCUL RESULTAT //
			for(i=0;i<motsATrouver.length;i++)
			{
				if(motsATrouver[i]==motsTrouves[i])  //Si mots est bon : vert si faux : rouge
				{
					tab[i].full[indexMots[i]] = "<span id=\"motsJuste\">"+tab[i].full[indexMots[i]] +"</span>";
					res++;
				}
				else
				{
					tab[i].full[indexMots[i]] = "<span id=\"motsFaux\">"+tab[i].full[indexMots[i]] +"</span>";
				}
				tab[i].full = tab[i].full.join(' ');
			}
			// AFFICHAGE TEXTE ENTIER AVEC RESULTAT ET ENREGISTREMENT//
			p.innerHTML=tab[0].full;
			for(i=1;i<tab.length;i++)
			{
				p.innerHTML+=" " + tab[i].full;
			}
			pRes.innerHTML = "Le score est de " + res + " mots trouvés sur " + nbMotsATrouver;
			
			if(document.getElementById("enregistrement").checked==true){
				var exerciceNom = document.getElementById("exercice").innerHTML;
				var patientNom = document.getElementById("patient").innerHTML;
				var url = "/envoiajax?score=" + (res*1000/nbMotsATrouver) + "&exercice="+ exerciceNom +"&patient=" + patientNom + "&bilan=null";
				Enregistrement(EnvoiDonnees, url);
			}		
			
		}
	}
}


var histoire;
var nbMotsATrouver = 0;
var recuperationAjax;
for(i=0;i<document.querySelector('select').length;i++)
{
	document.querySelector("select")[i].value = i; 	
}
Requete(RecuperationDonnee); //Recupere un tableau contenant les histoires
var btnLancement = document.getElementById("Lancement");
btnLancement.addEventListener("click", MoteurJeu);		//creation d'un evenement click sur le bouton associé à la fonction ExecutionExercice

