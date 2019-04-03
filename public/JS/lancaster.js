	canvas = document.getElementById('canvas1');
    context = canvas.getContext("2d");
    var clicks = new Array();
    var interligne = 20;
    var margePoint = 7*interligne;
    var interPoint = 8*interligne;
    var stopEvenement=0;
    var paint=0;
    
    function Coordonnees(a, b){		//constructeur d'objet ElementHTML
    	  this.x = a;
    	  this.y = b;
    }
    function Liaison(tabCoords)
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
    
    function Down(e){    	
      stopEvenement++;
      if((stopEvenement%2)==0) return 0;
      var mouseX = e.pageX - 120 - this.offsetLeft;
      var mouseY = e.pageY - this.offsetTop;
      clicks.push(new Coordonnees(mouseX,mouseY));
      context.strokeStyle = "#EE0";
      context.lineJoin = "round";
      context.lineWidth = 10;
      context.beginPath();
      context.moveTo(mouseX-1, mouseY);
      context.lineTo(mouseX, mouseY);
      context.closePath();
      context.stroke();
      if(clicks.length==9)
    	  {
    	  	Liaison(clicks);
    	  }
    }   
    
    
   ///////////////////////////  MAIN   /////////////////////////////////////
    context.lineWidth = 0.5;    
    context.strokeStyle = '#00A';
    context.beginPath();
    /// CADRILLAGE ///
    for(i=0;i<31;i++)
    {
    	context.moveTo(interligne*i,0);
    	context.lineTo(interligne*i,600);      
    }
    for(i=0;i<31;i++)
    {
    	context.moveTo(0,interligne*i);
    	context.lineTo(600,interligne*i);      
    }
    context.closePath();
	context.stroke();
	////////////////////
    
	//// POINTS /////
    
	for(i=0;i<3;i++)
	{
		for(j=0;j<3;j++)
		{		
			context.beginPath();
			context.lineJoin = "round";
			context.lineWidth = 8;    
		    context.strokeStyle = '#00B';
			context.moveTo(margePoint -1 + j*interPoint, margePoint + i*interPoint);
	    	context.lineTo(margePoint + j*interPoint, margePoint + i*interPoint);
	    	context.closePath();
	    	context.stroke();
		}
	}
	///////////////
	///// EVENEMENT /////
    canvas.addEventListener('mousedown',Down);
	