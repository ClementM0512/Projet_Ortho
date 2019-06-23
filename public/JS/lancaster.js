
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
    
    var resultat = "";
    var state=1;  // 1:canvasgauche/2:canvasdroit/3:stopecriture/0:PointNonVu
    
    
    function Point(a, b, seen){		//constructeur d'objet Point
    	  this.x = a;
    	  this.y = b;
    	  this.seen = seen;
    }
    
    
    
    
    ////////////////// FONCTION INTERVERSION ENTRE DEUX ELEMENT D'UN TABLEAU
    function Interversion(tab,ind1,ind2)
    {
    	var coor = tab[ind1];
    	tab[ind1] = tab[ind2];
    	tab[ind2] = coor;
    	return tab;
    }
    
    
    ///////////////////// FONCTION TRI DES POINTS //////////////////////////
    function TriPoints(tab)
    {
    	var tableau = tab.slice(); //Copie du tableau en parametre
    	var doAgain = true;
    	while(doAgain)				// Tri du tableau par la coordonnée y des points croissante : 3 groupes
    	{
    		doAgain=false;
	    	for(var i = 0; i<tableau.length-1; i++)
	    	{
	    		if((tableau[i].y) > (tableau[i+1].y))
	    		{
	    			tableau = Interversion(tab, i, i+1);
	    			doAgain=true;
	    		}
	    	}
    	}
    	
    	doAgain = true;
    	while(doAgain)				// Tri du tableau par la coordonnée x des points croissante dans chaque groupe
    	{
    		doAgain=false;
	    	for(var i = 0; i<3; i++)
	    	{
	    		for(var j = 0; j<2; j++)
	    		{
	    			if((tableau[j+i*3].x) > (tableau[j+1 +i*3].x))
	    			{
	    				tableau = Interversion(tableau, j + i*3, j+1+i*3);
		    			doAgain=true;
	    			}
	    		}
	    	}
    	}
    	
    	/////////////// DETECTION D'ERREUR : SI DANS LES GROUPES AYANT DES Y SIMILAIRES, DELTA Y EST SUPERIEURE A DELTA X ENTRE DEUX POINTS IL Y A UNE ERREUR ////////////////////////////
    	for(var i = 0; i<3; i++)
    	{
    		for(var j = 0; j<2; j++)
    		{
    			if(Math.abs(tableau[j +i*3].y - tableau[j+1+i*3].y) > Math.abs(tableau[j+i*3].x - tableau[j+1+i*3].x))
    			{
	    			doAgain=true;
	    			break;
    			}
    		}
    	}
    	
    	if(doAgain) 		// S'IL Y A BIEN UNE ERREUR ONT REFAIT LE TRI EN COMMENCANT PAR LES X PUIS LES Y
    	{
    		tableau = tab.slice();
        	while(doAgain)
        	{
        		doAgain=false;
    	    	for(var i = 0; i<tableau.length-1; i++)
    	    	{
    	    		if((tableau[i].x) > (tableau[i+1].x))
    	    		{
    	    			tableau = Interversion(tableau, i, i+1);
    	    			doAgain=true;
    	    		}
    	    	}
        	}
        	doAgain = true;
        	while(doAgain)
        	{
        		doAgain=false;
    	    	for(var i = 0; i<3; i++)
    	    	{
    	    		for(var j = 0; j<2; j++)
    	    		{
    	    			if((tableau[j+i*3].y) > (tableau[j+1 +i*3].y))
    	    			{
    	    				tableau = Interversion(tableau, j + i*3, j+1+i*3);
    		    			doAgain=true;
    	    			}
    	    		}
    	    	}
        	}
    	}
    	return tableau;  
    }
    
    ///////////////////////// FONCTION LIAISON ENTRE CHAQUE POINT //////////////////////////////////
    function Liaison(context,tabCoords)
    {
    	tabCoords = TriPoints(tabCoords);
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
    	if((state==3) && (document.getElementById("enregistrement").checked==true))
		{
    		for(i=0;i<2;i++)
    		{
    			for(j=0;j<9;j++)
    			{
    				resultat += "" + CoordonneesPoints[i][j].x + ";" + CoordonneesPoints[i][j].y + ";" + CoordonneesPoints[i][j].seen + "/"; 
    			}	
    		}
    		var exerciceNom = document.getElementById("exercice").innerHTML;
    		var patientNom = document.getElementById("patient").innerHTML;
    		var url = "/envoiajax?score=" + resultat + "&exercice="+ exerciceNom +"&patient=" + patientNom + "&bilan=true";
    		Enregistrement(EnvoiDonnees, url);
		}
    }
    
    
    
    ////////////////// FONCTION ENREGISTREMENT ET AFFICHAGE POINT CANVAS GAUCHE ET DROIT //////////////////////////////// 
    function ClickCanvasGauche(e){    	
      if(state>1) return 0;
      var mouseX = e.pageX - decalages[0].left;
      var mouseY = e.pageY - decalages[0].top;
      CoordonneesPoints[0].push(new Point(mouseX,mouseY,state));
      
	  contexts[0].strokeStyle = state?"#0D0":"#AAA";
      contexts[0].lineJoin = "round";
      contexts[0].lineWidth = 10;
      contexts[0].beginPath();
      contexts[0].moveTo(mouseX-1, mouseY);
      contexts[0].lineTo(mouseX, mouseY);
      contexts[0].closePath();
      contexts[0].stroke();
      
      if(CoordonneesPoints[0].length==9)
    	  {
    	  	Liaison(contexts[0], CoordonneesPoints[0]);
    	  	state=2;
    	  }
      else {state=1;}
    }   
    
    function ClickCanvasDroit(e){  
    	
        if((state!=2) && (state!=0)) return 0;
        var mouseX = e.pageX - decalages[1].left;
        var mouseY = e.pageY - decalages[1].top;
        CoordonneesPoints[1].push(new Point(mouseX,mouseY,state));
    	
        contexts[1].strokeStyle = state?"#0D0":"#AAA";
        contexts[1].lineJoin = "round";
        contexts[1].lineWidth = 10;
        contexts[1].beginPath();
        contexts[1].moveTo(mouseX-1, mouseY);
        contexts[1].lineTo(mouseX, mouseY);
        contexts[1].closePath();
        contexts[1].stroke();
        
        if(CoordonneesPoints[1].length==9)
      	  {
        	state=3;
      	  	Liaison(contexts[1], CoordonneesPoints[1]);
      	  }
        else {state=2;}
    } 
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
    
    function PointNonVu(){state=0;} // Clic sur un canvas après avoir appuyé sur le bouton "Point non vu"
    
    
    
    ///////////////////////////  DESSINS   /////////////////////////////////////
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
	///// EVENEMENT /////
	document.getElementById('canvasgauche').addEventListener('mousedown',ClickCanvasGauche);
	document.getElementById('canvasdroit').addEventListener('mousedown',ClickCanvasDroit);
	document.querySelector('button').addEventListener("click", PointNonVu);
	