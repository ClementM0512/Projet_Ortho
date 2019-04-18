	var contexts = new Array(document.getElementById('canvasgauche').getContext("2d"),document.getElementById('canvasdroit').getContext("2d"));
	var decalages = new Array(document.getElementById('canvasgauche').getBoundingClientRect(),document.getElementById('canvasdroit').getBoundingClientRect());
//canvasGauche = document.getElementById('canvas1');
//	canvasDroit = document.getElementById('canvas2');
//    contextGauche = canvasGauche.getContext("2d");
//    contextDroit = canvasDroit.getContext("2d");
    var CoordonneesPoints = new Array(new Array(),new Array());
    var tailleCanvas = 600;
    var interligne = tailleCanvas/30;
    var margePoint = 7*interligne;
    var interPoint = 8*interligne;
    var stopEvenement=0;
    var paint=0;
    
    function Coordonnees(a, b){		//constructeur d'objet ElementHTML
    	  this.x = a;
    	  this.y = b;
    }
    
    function Interversion(tab,ind1,ind2)
    {
    	var coor = tab[ind1];
    	tab[ind1] = tab[ind2];
    	tab[ind2] = coor;
    	return tab;
    }
    function TriPoints(tab)
    {
    	var tableau = new Array(0,0,0,0,0,0,0,0,0);
    	var index = 1;
    	//////////// Tri croissant par coordonnées ///////
    	while(index)
    	{
    		index=0;
	    	for(var i = 0; i<tab.length-1; i++)
	    	{
	    		if((tab[i].x + tab[i].y) > (tab[i+1].x + tab[i+1].y))
	    		{
	    			tab = Interversion(tab, i, i+1);
	    			index++;
	    		}
	    	}
    	}
    	tableau[0] = tab[0];
    	tableau[8] = tab[8];
    	if(tab[1].x > tab[2].x) 
    	{
    		tableau[3] = tab[2];
    		tableau[1] = tab[1];
    	}
    	else
    	{
    		tableau[1] = tab[2];
    		tableau[3] = tab[1];
    	}
    	
    	if(tab[3].x>tab[4].x)
    	{
    		tableau[2] = tab[3];
    		if(tab[4].x > tab[5].x)
    		{
    			tableau[4] = tab[4];
    			tableau[6] = tab[5];
    		}
    		else
    		{    			
    			tableau[4] = tab[5];
    			tableau[6] = tab[4];
    		}
    	}
    	else
    	{
    		if(tab[3].x>tab[5].x)
    		{
    			tableau[2] = tab[4];
				tableau[4] = tab[3];
				tableau[6] = tab[5];
    		}
    		else
    		{
    			if(tab[4].x>tab[5].x)
    			{
    				tableau[2] = tab[4];
    				tableau[4] = tab[5];
    				tableau[6] = tab[3];
    			}
    			else
    			{
    				tableau[2] = tab[5];
    				tableau[4] = tab[4];
    				tableau[6] = tab[3];
    			}
    		}
    	}
    	if(tab[6].x>tab[7].x)
    	{
    		tableau[5]=tab[6];
    		tableau[7]=tab[7];
    	}
    	else	
    	{
    		tableau[5]=tab[7];
    		tableau[7] = tab[6];
    	}
    	console.log(tableau);
    	return tableau;
    	
    }
    
    function Liaison(context,tabCoords)
    {
    	//alert(tabCoords[4].x + "|" + tabCoords[4].y);
    	tabCoords = TriPoints(tabCoords);
    	//alert(tabCoords[4].x + "|" + tabCoords[4].y);
    	for(i=0;i<3;i++)
    	{
    		for(j=0;j<2;j++)
    		{
	    		context.beginPath();
				context.lineWidth = 2;    
			    context.strokeStyle = '#EE0';
				context.moveTo(tabCoords[i*3 +j].x,tabCoords[i*3 +j].y);
		    	context.lineTo(tabCoords[i*3 +1 +j].x,tabCoords[i*3 +1 +j].y);
		    	context.moveTo(tabCoords[i + 3*j].x,tabCoords[i + 3*j].y);
		    	context.lineTo(tabCoords[i +3 + 3*j].x,tabCoords[i +3 + 3*j].y);
		    	context.closePath();
		    	context.stroke();
    		}
    	}
    }
    
    function ClickGauche(e){    	
      stopEvenement++;				//Eviter que la fonction s'execute deux fois
      if((stopEvenement%2)==0 || paint!=0) return 0;
      var mouseX = e.pageX - decalages[0].left;
      var mouseY = e.pageY - decalages[0].top;
      CoordonneesPoints[0].push(new Coordonnees(mouseX,mouseY));
      contexts[0].strokeStyle = "#0D0";
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
    	  	paint=1;
    	  }
    }   
    
    function ClickDroit(e){  
    	
        stopEvenement++;				//Eviter que la fonction s'execute deux fois
        if((stopEvenement%2)==0 || paint!=1) return 0;
        var mouseX = e.pageX - decalages[1].left;
        var mouseY = e.pageY - decalages[1].top;
        CoordonneesPoints[1].push(new Coordonnees(mouseX,mouseY));
        contexts[1].strokeStyle = "#0A0";
        contexts[1].lineJoin = "round";
        contexts[1].lineWidth = 10;
        contexts[1].beginPath();
        contexts[1].moveTo(mouseX-1, mouseY);
        contexts[1].lineTo(mouseX, mouseY);
        contexts[1].closePath();
        contexts[1].stroke();
        if(CoordonneesPoints[1].length==9)
      	  {
      	  	Liaison(contexts[1], CoordonneesPoints[1]);
      	  	paint=2;
      	  }
    } 
    
    for(h=0;h<2;h++)
    {
   ///////////////////////////  DESSINS   /////////////////////////////////////
	    contexts[h].lineWidth = 0.5;    
	    contexts[h].strokeStyle = '#00A';
	    contexts[h].beginPath();
	    /// CADRILLAGE ///
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
	document.getElementById('canvasgauche').addEventListener('mousedown',ClickGauche);
	document.getElementById('canvasdroit').addEventListener('mousedown',ClickDroit);
	