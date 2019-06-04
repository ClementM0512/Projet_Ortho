alert("dd");

var canvas = document.getElementById('canvasDuction');
////////////// CSS ////////////////
canvas.width = window.innerWidth/2;
canvas.height = window.innerHeight /2;
canvas.style.position = "absolute";
///////////////////////////////////
var context = canvas.getContext("2d");
var image = document.querySelector('img');
var boutons = document.querySelectorAll("button");
var coordonnéesClics = new Array();
var choixBouton = 0;
var elemActuel;
var decalage = canvas.getBoundingClientRect();

function Coordonnees(a, b, c){		//constructeur d'objet ElementHTML
	  this.x = a;
	  this.y = b;
	  this.type = c;   //0 : Rien; 1 : Plus; 2 : Moins;
}
////// AFFICHAGE IMAGE ////////////
//image.addEventListener("load", AffichageImage);
function AffichageImage(){context.drawImage(image, 20, 20, canvas.width-20, canvas.height-20);} //Réaffiche l'image sur le canvas
//AffichageImage();

//////////////////////////////////// Dessiner un plus //////////////////
function AffichagePlus(coordonnees)
{
  context.beginPath();
  context.strokeStyle = "#0";
  context.lineWidth = 2;
  context.moveTo(coordonnees.x-8, coordonnees.y);
  context.lineTo(coordonnees.x+8, coordonnees.y);
  context.moveTo(coordonnees.x, coordonnees.y-8);
  context.lineTo(coordonnees.x, coordonnees.y+8);
  context.closePath();
  context.stroke();
}

//fonction AffichageMoins(coordonnees)
//{
//	context.beginPath();
//	context.strokeStyle = "#0";
//	context.lineWidth = 2;
//	context.moveTo(coordonnees.x-8, coordonnees.y);
//	context.lineTo(coordonnees.x+8, coordonnees.y);
//	context.closePath();
//	context.stroke();
//}

//////////////////////////////////// Fonction de dessin /////////////
function Dessin(index = -1)
{ 
	if(index>=0)elemActuel=index;			//Si la fonction est appelée sans argument on utilise la variable elemActuel pour savoir ou nous en sommes de l'affichage sinon on utilise la variable passée en parametre
	else elemActuel = coordonnéesClics.length -1;
	if(coordonnéesClics[elemActuel].type == 1) // Si type = 1 alors Affichage d'un plus Si type = 2 alors Affichage d'un moins
	{
	 AffichagePlus(coordonnéesClics[elemActuel]);
	}
	else if(coordonnéesClics[elemActuel].type == 2)
	{
	 AffichageMoins(coordonnéesClics[elemActuel]);
	}
}
//
function Down(e)	//FOnction associée à un evenement de type "mousedown" -> Recupere les coordonnées de la souris relativement au canvas, les enregistre dans le tableau et appelle la fonction de dessin
{
  if(choixBouton == 0) return 0;
  var mouseX = e.pageX  - decalage.left;
  var mouseY = e.pageY - decalage.top;
  coordonnéesClics.push(new Coordonnees(mouseX, mouseY, choixBouton));
  Dessin();
}
//
//////////////// FONCTION EVENEMENTS LIES AU BOUTONS /////////////
//
function BoutonSuppression() // Boutons suppression : supprime le dernier element du tableau, réaffiche l'image (efface tous les dessins) et réaffiche le tableau 
{	
	choixBouton = 0;
	if(coordonnéesClics.length)
	{
		coordonnéesClics = coordonnéesClics.slice(0, coordonnéesClics.length-1);
		AffichageImage();	
		for(i=0;i<coordonnéesClics.length;i++)
		{
			Dessin(i);
		}
	}
	else
	{
		AffichageImage();
	}
}


function BoutonEcriturePlus(){choixBouton = 1;}
function BoutonEcritureMoins(){choixBouton = 2;}
//
/////////// EVENEMENTS SOURIS ///////////
canvas.addEventListener('mousedown',Down);
//
//
///////// EVENEMENTS BOUTONS ///////////////
boutons[2].addEventListener('click', BoutonSuppression);
boutons[0].addEventListener('click', BoutonEcriturePlus);
boutons[1].addEventListener('click', BoutonEcritureMoins);
//
//
//
//
//
//
//
//
