	canvas = document.getElementById('canvas');
    context = canvas.getContext("2d");
    var clickX = new Array();
    var clickY = new Array();
    var clickJointure = new Array();
    var paint;
    var interligne = 20;
    function addClick(x, y, jointure)
    {
      clickX.push(x);
      clickY.push(y);
      clickJointure.push(jointure);
    }

    function redraw(){
      context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Efface le canvas  
      context.strokeStyle = "#0";
      context.lineJoin = "round";
      context.lineWidth = 100;

      for(var i=0; i < clickX.length; i++) {		
        context.beginPath();
        if(clickJointure[i] && i){
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
      var mouseX = e.pageX - 120 - this.offsetLeft;
      var mouseY = e.pageY - this.offsetTop;
      paint = true;
      addClick(mouseX, mouseY, false);
      redraw();
    }
    function Move(e){
      if(paint){
        var mouseX = e.pageX - 120 - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop;
        addClick(mouseX, mouseY, true);
        redraw();
      }    
   
    context.lineWidth = "1";

    context.strokeStyle = '#00A';
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
    
	context.stroke();
	
	///////////////// Fonction de dessinage ///////////////////
	
	