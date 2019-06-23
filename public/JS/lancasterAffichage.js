var contexts = new Array(document.getElementById('canvasgauche').getContext("2d"),document.getElementById('canvasdroit').getContext("2d")); //Surface de dessin des canvas


document.getElementById('canvasgauche').width = window.innerWidth/3;
document.getElementById('canvasgauche').height = window.innerWidth/3;
document.getElementById('canvasdroit').width = window.innerWidth/3;
document.getElementById('canvasdroit').height = window.innerWidth/3;

// tableau des longueur entre coordonnées de l'écran et celle des canvas 
var decalages = new Array(document.getElementById('canvasgauche').getBoundingClientRect(),document.getElementById('canvasdroit').getBoundingClientRect());


var CoordonneesPoints = new Array(new Array(),new Array());  // Tableau de tableau contenant des éléments "Point"
var tailleCanvas = window.innerWidth/3;
var interligne = tailleCanvas/30;
var margePoint = 7*interligne;
var interPoint = 8*interligne;

function Point(a, b, seen){		//constructeur d'objet Point
	  this.x = a;
	  this.y = b;
	  this.seen = seen;
}

/////////// FUNCTION DE LIAISON //////////////

function Liaison(context,tabCoords)
{
	for(i=0;i<3;i++)
	{
		for(j=0;j<2;j++)
		{
    		context.beginPath();
			context.lineWidth = 2;    
		    context.strokeStyle = '#EE0';
		    if((tabCoords[i*3 +j].seen) && (tabCoords[i*3 +1 +j].seen))
		    {
		    	context.moveTo(tabCoords[i*3 +j].x,tabCoords[i*3 +j].y);
		    	context.lineTo(tabCoords[i*3 +1 +j].x,tabCoords[i*3 +1 +j].y);
		    }
		    if((tabCoords[i + 3*j].seen) && (tabCoords[i + 3*j +3].seen))
	    	{
		    	context.moveTo(tabCoords[i + 3*j].x,tabCoords[i + 3*j].y);
		    	context.lineTo(tabCoords[i +3 + 3*j].x,tabCoords[i +3 + 3*j].y);
	    	}
	    	context.closePath();
	    	context.stroke();
		}
	}
}
/////////////////////////////////

/////////// AFFICHAGE CADRILLAGE ET POINTS

for(h=0;h<2;h++)
{
	 /// CADRILLAGE ///
    contexts[h].lineWidth = 0.5;    
    contexts[h].strokeStyle = '#00A';
    contexts[h].beginPath();
    for(i=0;i<31;i++)
    {
    	contexts[h].moveTo(interligne*i,0);
    	contexts[h].lineTo(interligne*i,tailleCanvas);      
    }
    for(i=0;i<31;i++)
    {
    	contexts[h].moveTo(0,interligne*i);
    	contexts[h].lineTo(tailleCanvas,interligne*i);      
    }
    contexts[h].closePath();
	contexts[h].stroke();

//// POINTS /////

	for(i=0;i<3;i++)
	{
		for(j=0;j<3;j++)
		{		
			contexts[h].beginPath();
			contexts[h].lineJoin = "round";
			contexts[h].lineWidth = 8;    
		    contexts[h].strokeStyle = '#00B';
			contexts[h].moveTo(margePoint -1 + j*interPoint, margePoint + i*interPoint);
	    	contexts[h].lineTo(margePoint + j*interPoint, margePoint + i*interPoint);
	    	contexts[h].closePath();
	    	contexts[h].stroke();
		}
	}
}


//////////// RECUPERATION DES COORDONNEES //////////////////////////
var coordonnees = document.getElementById("coordonnees").innerHTML;
//var coordonnees = "116;115;1/262;114;1/410;114;1/123;252;1/253;250;1/308;248;1/129;373;1/271;363;1/415;363;1/116;115;1/262;114;1/410;114;1/123;252;1/253;250;1/308;248;1/129;373;1/271;363;1/415;363;1/"
var coordonneesTab = coordonnees.split('/');
var coordonneesActuTab;
var x,y,seen;

for(j=0;j<2;j++)
{
	for(k=0;k<9;k++)
	{
		coordonneesActuTab = coordonneesTab[k + 8*j].split(';');
		x = parseFloat(coordonneesActuTab[0]);
		y = parseFloat(coordonneesActuTab[1]);
		seen = parseFloat(coordonneesActuTab[2]);
		CoordonneesPoints[j].push(new Point(x,y,seen));
	}
}



for(var f=0;f<2;f++)
{
	Liaison(contexts[f], CoordonneesPoints[f]);
}




////////////////////////////////////////////////////////////////////







