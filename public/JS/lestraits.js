window.onload = function()
{

	 var contexts = new Array(document.getElementById('canvas1').getContext("2d"),document.getElementById('canvas2').getContext("2d"),document.getElementById('canvas3').getContext("2d"),document.getElementById('canvas4').getContext("2d"),document.getElementById('canvas5').getContext("2d"));
	 var btn = document.querySelectorAll("input");
     var CoordonneesPoints = new Array(new Array(),new Array(),new Array(),new Array(),new Array());
     var paint = new Array(false,false,false,false,false);
     var ecart = 0;
     var intervalle= new Array();
     var height = 100;
     var width = 1000;
     var result = new Array(false,false,false,false,false)
     var clickX = new Array();
     var clickY = new Array();
     var canvasActuel;
    // C'est ici que l'on placera tout le code servant à nos dessins.
       
        for(i=0;i<=4;i++){       	
        	intervalle[i] = 90/(i+1);
        	contexts[i].beginPath();// On démarre un nouveau tracé
        	contexts[i].moveTo(0, 50-intervalle[i]/2);
        	contexts[i].lineTo(1000,50-intervalle[i]/2);
        	contexts[i].moveTo(0, 50+intervalle[i]/2);
        	contexts[i].lineTo(1000,50+intervalle[i]/2);
        	contexts[i].stroke();// On trace seulement les lignes.
	        contexts[i].closePath();
        }
        
        function Coordonnees(a, b){		// constructeur d'objet ElementHTML
        	  this.x = a;
        	  this.y = b;
        }
        
        
        function Dessin(mouseX,mouseY){   

         
          clickX.push(mouseX);
          clickY.push(mouseY);
          contexts[canvasActuel].strokeStyle = "#000";
          contexts[canvasActuel].lineJoin = "round";
          contexts[canvasActuel].lineWidth = 1;
          contexts[canvasActuel].beginPath();
          if ( clickX.length == 1){
        	  contexts[canvasActuel].moveTo(clickX[0]-1, clickY[0]);
          }else{
        	  contexts[canvasActuel].moveTo(clickX[clickX.length-2], clickY[clickY.length -2]);
          }
          if(clickY[clickY.length-1] > (50+intervalle[canvasActuel]/2) || clickY[clickY.length-1] < (50-intervalle[canvasActuel]/2)){
         	 paint[canvasActuel]= false;
         	 btn[canvasActuel].value = 'recommencer';
         	result[canvasActuel]= false;
         	 alert("vous n'êtes pas arrivé au bout")
         	 }
          if(clickX[clickX.length-1] >= 980){
        	  result[canvasActuel]= true;
          }
          contexts[canvasActuel].lineTo(clickX[clickX.length-1], clickY[clickY.length-1]);
          contexts[canvasActuel].closePath();
          contexts[canvasActuel].stroke();
        } 
        
        function Dessin1(e){   
            if(paint[0] == true){
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for finger #1
                        touchX=touch.pageX-touch.target.offsetLeft;
                        touchY=touch.pageY-touch.target.offsetTop;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
            	 var mouseX = e.pageX - this.offsetLeft;
                 var mouseY = e.pageY - this.offsetTop;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }

        function Dessin2(e){   
            if(paint[1] == true){
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for finger #1
                        touchX=touch.pageX-touch.target.offsetLeft;
                        touchY=touch.pageY-touch.target.offsetTop;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
            	 var mouseX = e.pageX - this.offsetLeft;
                 var mouseY = e.pageY - this.offsetTop;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }
        function Dessin3(e){   
            if(paint[2] == true){
            	
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for finger #1
                        touchX=touch.pageX-touch.target.offsetLeft;
                        touchY=touch.pageY-touch.target.offsetTop;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
            	 var mouseX = e.pageX - this.offsetLeft;
                 var mouseY = e.pageY - this.offsetTop;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }
        function Dessin4(e){   
            if(paint[3] == true){
            	
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for finger #1
                        touchX=touch.pageX-touch.target.offsetLeft;
                        touchY=touch.pageY-touch.target.offsetTop;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
            	 var mouseX = e.pageX - this.offsetLeft;
                 var mouseY = e.pageY - this.offsetTop;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }
        function Dessin5(e){   
            if(paint[4] == true){
            	
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for finger #1
                        touchX=touch.pageX-touch.target.offsetLeft;
                        touchY=touch.pageY-touch.target.offsetTop;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
            	 var mouseX = e.pageX - this.offsetLeft;
                 var mouseY = e.pageY - this.offsetTop;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }
       
       
         function Update(){

         	contexts[canvasActuel].beginPath();// On démarre un nouveau tracé
            contexts[canvasActuel].strokeStyle = "#000";
            contexts[canvasActuel].lineJoin = "miter";
            contexts[canvasActuel].lineWidth = 1;
        	contexts[canvasActuel].clearRect(0, 0, width, height);
	    	contexts[canvasActuel].moveTo(0, 50-intervalle[canvasActuel]/2);
	    	contexts[canvasActuel].lineTo(1000,50-intervalle[canvasActuel]/2);
	    	contexts[canvasActuel].moveTo(0, 50+intervalle[canvasActuel]/2);
	    	contexts[canvasActuel].lineTo(1000,50+intervalle[canvasActuel]/2);
	    	contexts[canvasActuel].stroke();// On trace seulement les lignes.
	        contexts[canvasActuel].closePath();
	        paint[canvasActuel]=true;
	        clickX = [];
	        clickY = [];
         }
         
        function updateBtn1(){
        	
        	canvasActuel= 0;
        	result[canvasActuel]= false;
        	Update();
        }
       
        function updateBtn2(){
        	canvasActuel = 1;
        	result[canvasActuel]= false;
        	Update();
        }
        
        function updateBtn3(){
        	canvasActuel = 2;
        	result[canvasActuel]= false;
        	Update();
        }
        
        function updateBtn4(){
        	canvasActuel = 3
        	result[canvasActuel]= false;
        	Update();
        }
        
        function updateBtn5(){
        	canvasActuel = 4;
        	result[canvasActuel]= false;
        	Update();
        }
        function updateAll(){
        	for(i=0;i<=4;i++){
        	canvasActuel = i;
        	result[canvasActuel]= false;
        	Update();
         	paint[canvasActuel] = false;
         	btn[canvasActuel].value = 'commencer'
        	}
        }
        function PaintNo(){
        	paint[canvasActuel] = false;
        	btn[canvasActuel].value = 'recomencer';
         }
        

        

    	// /// EVENEMENT /////
       	document.getElementById('canvas1').addEventListener('touchleave',PaintNo, false);
       	document.getElementById('canvas1').addEventListener('touchmove', Dessin1, false);
       	document.getElementById('canvas1').addEventListener('mousemove', Dessin1);
       	document.getElementById('canvas1').addEventListener('mousedown', PaintNo);
    	document.getElementById('canvas1').addEventListener('mouseleave',PaintNo);
    	
       	document.getElementById('canvas2').addEventListener('touchmove', Dessin2, false);
       	document.getElementById('canvas2').addEventListener('touchleave',PaintNo, false);
    	document.getElementById('canvas2').addEventListener('mousemove', Dessin2);
    	document.getElementById('canvas2').addEventListener('mousedown', PaintNo);
    	document.getElementById('canvas2').addEventListener('mouseleave',PaintNo);

       	document.getElementById('canvas3').addEventListener('touchmove', Dessin3, false);
       	document.getElementById('canvas3').addEventListener('touchleave',PaintNo, false);
    	document.getElementById('canvas3').addEventListener('mousemove', Dessin3);
    	document.getElementById('canvas3').addEventListener('mousedown', PaintNo);
    	document.getElementById('canvas3').addEventListener('mouseleave',PaintNo);
    	
       	document.getElementById('canvas4').addEventListener('touchmove', Dessin4, false);
       	document.getElementById('canvas4').addEventListener('touchleave',PaintNo, false);
    	document.getElementById('canvas4').addEventListener('mousemove', Dessin4);
    	document.getElementById('canvas4').addEventListener('mousedown', PaintNo);
    	document.getElementById('canvas4').addEventListener('mouseleave',PaintNo);
    	
       	document.getElementById('canvas5').addEventListener('touchmove', Dessin5, false);
       	document.getElementById('canvas5').addEventListener('touchleave',PaintNo, false);
    	document.getElementById('canvas5').addEventListener('mousemove', Dessin5);
    	document.getElementById('canvas5').addEventListener('mousedown', PaintNo);
    	document.getElementById('canvas5').addEventListener('mouseleave',PaintNo);

   	 	btn[0].addEventListener('click', updateBtn1);
   	 	btn[1].addEventListener('click', updateBtn2);
   	 	btn[2].addEventListener('click', updateBtn3);
   	 	btn[3].addEventListener('click', updateBtn4);
   	 	btn[4].addEventListener('click', updateBtn5); 

   	 	btn[5].addEventListener('click', updateAll);
	
   	 	// /////////////////////////////////////////////////////////////////////////////////////////////////fin
		// de l'exercice//////////////////////////////
   	   	    	
   	 	
   	 	var textresultat = document.querySelectorAll("p");
   	 	Resultat();
   	 	
   	 	var info;
   	 	
   	 	function Resultat(){
   	 		
   	    info = 0;
   		 for(i=0;i<=result.length-1;i++){
   			 if(result[i] == true){
   				 info += 1;
   			 }
   		 }
   		 
   		textresultat[0].innerHTML = "vous avez reussi " + info + " exercices";
   		setTimeout(Resultat,100); /*
									 * rappel après 0.1 secondes = 100
									 * millisecondes
									 */
   	}
             
}
