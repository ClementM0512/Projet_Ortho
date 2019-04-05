var canvas = document.getElementById('canvas');
var context = canvas.getContext("2d");
var image = document.getElementById('yeux');
var buttons = document.querySelectorAll("button");
var clicks = new Array();
var paint;
var stopEvenement = 0;
var choixBouton = 0;
var nbClick = 0;
var elemActuel;


function Coordonnees(a, b, c){		//constructeur d'objet ElementHTML
	  this.x = a;
	  this.y = b;
	  this.type = c;
}
////// AFFICHAGE IMAGE ////////////
image.addEventListener("load", AffichageImage);
function AffichageImage(){context.drawImage(image, 125, 100, 925, 400);}
//////////////////////////////////
function Plus(coordonnees)
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

function addClick(x, y, type)
{
  clicks.push(new Coordonnees(x,y,type));
}

function redraw(){ 
  elemActuel = clicks.length -1;
  if(choixBouton == 1)
  {
	  context.beginPath();
	  context.strokeStyle = "#0";
      context.lineWidth = 3;
	  if(clicks[elemActuel-1] && clicks[elemActuel-1].type == 1)
	  {
		  context.moveTo(clicks[elemActuel-1].x,clicks[elemActuel-1].y);
	  }
	  else
	  {
		  context.moveTo(clicks[elemActuel].x-1,clicks[elemActuel].y);
	  }
	  context.lineTo(clicks[elemActuel].x,clicks[elemActuel].y);
	  context.closePath();
      context.stroke();
  }
  else if(choixBouton == 2)
  {
	  Plus(clicks[elemActuel]);
  }
  else if(choixBouton == 3)
  {
	  context.beginPath();
	  context.strokeStyle = "#0";
	  context.lineWidth = 2;
	  context.moveTo(clicks[elemActuel].x-8, clicks[elemActuel].y);
	  context.lineTo(clicks[elemActuel].x+8, clicks[elemActuel].y);
	  context.closePath();
	  context.stroke();
  }
  else return;
  context.strokeStyle = "#0";
  context.lineJoin = "round";
  context.lineWidth = 2;

  for(var i=0; i < clickX.length; i++) {		
    context.beginPath();
    if(clicks[i] && i){
      context.moveTo(clickX[i-1], clickY[i-1]);
     }else{
       context.moveTo(clickX[i]-1, clickY[i]);
     }
     context.lineTo(clickX[i], clickY[i]);
     context.closePath();
     context.stroke();
  }
}

function Down(e){
  if(choixBouton == 0) return 0;
  stopEvenement++;				//Eviter que la fonction s'execute deux fois
  if((stopEvenement%2)==0) return 0;
  var mouseX = e.pageX  - this.offsetLeft;
  var mouseY = e.pageY - this.offsetTop;
  
  if(choixBouton == 1) paint = true;
  
  clicks.push(new Coordonnees(mouseX, mouseY, choixBouton));
  redraw();
}
function Move(e){
  stopEvenement++;				//Eviter que la fonction s'execute deux fois
  if((stopEvenement%2)==0) return 0;
  if(paint){
    var mouseX = e.pageX - this.offsetLeft;
    var mouseY = e.pageY - this.offsetTop;
    clicks.push(new Coordonnees(mouseX, mouseY, choixBouton));
    redraw();
  }
}
function Up(){
  paint = false;
  clicks.push(0);
}
///////// EVENEMENTS SOURIS ///////////
canvas.addEventListener('mousedown',Down);
canvas.addEventListener('mousemove',Move);
canvas.addEventListener('mouseup',Up);
canvas.addEventListener('mouseleave',Up);


//canvas.addEventListener('mousedown',Down);

///////// EVENEMENTS BOUTONS ///////////////
buttons[2].addEventListener('click', EcritureLibre);
buttons[0].addEventListener('click', EcriturePlus);
buttons[1].addEventListener('click', EcritureMoins);

function EcritureLibre(){choixBouton = 1;}
function EcriturePlus(){choixBouton = 2; paint=false;}
function EcritureMoins(){choixBouton = 3; paint=false;}






