	var contexts = new Array(document.getElementById('canvasgauche').getContext("2d"),document.getElementById('canvasdroit').getContext("2d"));
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
    
    function Liaison(context,tabCoords)
    {
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
      if((stopEvenement%2)==0) return 0;
      var mouseX = e.pageX - 120 - this.offsetLeft;
      var mouseY = e.pageY - 20 - this.offsetTop;
      CoordonneesPoints[0].push(new Coordonnees(mouseX,mouseY));
      contexts[0].strokeStyle = "#EE0";
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
    	  }
    }   
    
    function ClickDroit(e){    	
        stopEvenement++;				//Eviter que la fonction s'execute deux fois
        if((stopEvenement%2)==0) return 0;
        var mouseX = e.pageX - 120 - this.offsetLeft;
        var mouseY = e.pageY - 20 - this.offsetTop;
        CoordonneesPoints[1].push(new Coordonnees(mouseX,mouseY));
        contexts[1].strokeStyle = "#EE0";
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
	