window.onload = function()
{

	 var contexts = new Array(document.getElementById('canvas1').getContext("2d"),document.getElementById('canvas2').getContext("2d"),document.getElementById('canvas3').getContext("2d"),document.getElementById('canvas4').getContext("2d"),document.getElementById('canvas5').getContext("2d"));
	 var bounds = new Array(document.getElementById('canvas1').getBoundingClientRect(),document.getElementById('canvas2').getBoundingClientRect(),document.getElementById('canvas3').getBoundingClientRect(),document.getElementById('canvas4').getBoundingClientRect(),document.getElementById('canvas5').getBoundingClientRect())
	 var btn = document.querySelectorAll("input");
     var CoordonneesPoints = new Array(new Array(),new Array(),new Array(),new Array(),new Array());
     var paint = new Array(false,false,false,false,false); 	//autorise ou non le tracé des points
     var intervalle= new Array();							//defini l'intervalle entre le trait du haut et celuis du bas
     var height = 1000;										//longeur des canevas
     var width = 100;										//largeur des canevas
     var result = new Array(false,false,false,false,false)	//permet d'obtenir le resultat
     var clickX = new Array();								//tableau des ordonés X
     var clickY = new Array();								//tableau des absyse Y
     var canvasActuel;										//variable int permet de savoir sur quelle canevas on agit
     var color = "#000";									//couleur des trait
     var sortie = false										//detecte les sortie du cannevas et des deux traits
    
     // C'est ici que l'on placera tout le code servant à nos dessins.
////////////////////////////////////////////////////////////////////initialisation des canevas avec les dessins ////////////////////////////////
        for(i=0;i<=4;i++){       	
        	intervalle[i] = 90/(i+1);
        	contexts[i].beginPath();// On démarre un nouveau tracé
        	contexts[i].moveTo(0, 50-intervalle[i]/2);
        	contexts[i].lineTo(1000,50-intervalle[i]/2);
        	contexts[i].moveTo(0, 50+intervalle[i]/2);
        	contexts[i].lineTo(1000,50+intervalle[i]/2);
        	contexts[i].moveTo(50, 50-intervalle[i]/2);
        	contexts[i].lineTo(50,50+intervalle[i]/2);
        	contexts[i].moveTo(980, 50-intervalle[i]/2);
        	contexts[i].lineTo(980,50+intervalle[i]/2);
        	contexts[i].stroke();// On trace seulement les lignes.
	        contexts[i].closePath();
        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////fonction qui trace a l'endroit ou la sourris passe////////////////////////////////////////////////////
        function Dessin(mouseX,mouseY){   

          clickX.push(mouseX);
          clickY.push(mouseY);
          contexts[canvasActuel].strokeStyle = color;
          contexts[canvasActuel].lineJoin = "round";
          contexts[canvasActuel].lineWidth = 1;
          contexts[canvasActuel].beginPath();
          if ( clickX.length == 1){
        	  contexts[canvasActuel].moveTo(clickX[0]-1, clickY[0]);
          }else{
        	  contexts[canvasActuel].moveTo(clickX[clickX.length-2], clickY[clickY.length -2]);
          }
          if(clickY[clickY.length-1] > (50+intervalle[canvasActuel]/2) || clickY[clickY.length-1] < (50-intervalle[canvasActuel]/2)){
        	  result[canvasActuel]= false;
        	  sortie[0] = true;
        	  color = "#F00";
          }
          else{
        	  color = "#000";
          }
          if(clickX[clickX.length-1] >= 980 && clickX[0] <= 50){
        	
          	 btn[canvasActuel+1].value = 'Recommencer';
          	 paint[canvasActuel]= false;
          	 
          	 if(sortie == false){
          		 result[canvasActuel]= true;
          	 }
          	 sortie = false;
          }
          contexts[canvasActuel].lineTo(clickX[clickX.length-1], clickY[clickY.length-1]);
          contexts[canvasActuel].closePath();
          contexts[canvasActuel].stroke();
        } 
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////recuperation des coordoner et evoie a la fonction ci dessus////////////////////     
        function Dessin1(e){   
            if(paint[0] == true){
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for
													// finger #1
                        touchX=touch.pageX - bounds[0].left;
                        touchY=touch.pageY - bounds[0].top;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
            	 var mouseX = e.clientX - bounds[0].left;
                 var mouseY = e.clientY - bounds[0].top;
            	Dessin(mouseX,mouseY);
                }
            }
        }

        function Dessin2(e){   
            if(paint[1] == true){
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for
													// finger #1
                        touchX=touch.pageX - bounds[1].left;
                        touchY=touch.pageY - bounds[1].top;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
                	 var mouseX = e.clientX - bounds[1].left;
                     var mouseY = e.clientY - bounds[1].top;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }
        function Dessin3(e){   
            if(paint[2] == true){
  
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for
													// finger #1
                        touchX=touch.pageX - bounds[2].left;
                        touchY=touch.pageY - bounds[2].top;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
                	 var mouseX = e.clientX - bounds[2].left;
                     var mouseY = e.clientY - bounds[2].top;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }
        function Dessin4(e){   
            if(paint[3] == true){
            	
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for
													// finger #1
                        touchX=touch.pageX - bounds[3].left;
                        touchY=touch.pageY - bounds[3].top;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
                	 var mouseX = e.clientX - bounds[3].left;
                     var mouseY = e.clientY - bounds[3].top;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }
        function Dessin5(e){   
            if(paint[4] == true){
            	
                if(e.touches) {
                    if (e.touches.length == 1) { // Only deal with one finger
                        var touch = e.touches[0]; // Get the information for
													// finger #1
                        touchX=touch.pageX - bounds[4].left;
                        touchY=touch.pageY - bounds[4].top;
                    }
                	Dessin(touchX,touchY);
                	event.preventDefault();	
                }else if(e.pageX){
                	 var mouseX = e.clientX - bounds[4].left;
                     var mouseY = e.clientY - bounds[4].top;
                 
            	Dessin(mouseX,mouseY);
                }
            }
        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////remet a zero quand on recommence un dessin//////////////////////////////////////////////////////////////////////////////////////////////////////////////      
         function Update(){
        	 for (var i = 0; i < 4; i++) {
        		  btn[i].value = 'Commencer';
        		  paint[i]= false;
        		}
        	 btn[canvasActuel+1].value = 'Tracer';
         	contexts[canvasActuel].beginPath();// On démarre un nouveau tracé
            contexts[canvasActuel].strokeStyle = "#000";
            contexts[canvasActuel].lineJoin = "miter";
            contexts[canvasActuel].lineWidth = 1;
        	contexts[canvasActuel].clearRect(0, 0, height, width);
	    	contexts[canvasActuel].moveTo(0, 50-intervalle[canvasActuel]/2);
	    	contexts[canvasActuel].lineTo(1000,50-intervalle[canvasActuel]/2);
	    	contexts[canvasActuel].moveTo(0, 50+intervalle[canvasActuel]/2);
	    	contexts[canvasActuel].lineTo(1000,50+intervalle[canvasActuel]/2);
        	contexts[canvasActuel].moveTo(50, 50-intervalle[canvasActuel]/2);
        	contexts[canvasActuel].lineTo(50,50+intervalle[canvasActuel]/2);
        	contexts[canvasActuel].moveTo(980, 50-intervalle[canvasActuel]/2);
        	contexts[canvasActuel].lineTo(980,50+intervalle[canvasActuel]/2);
	    	contexts[canvasActuel].stroke();// On trace seulement les lignes.
	        contexts[canvasActuel].closePath();
	        paint[canvasActuel]=true;
	        clickX = [];
	        clickY = [];
	        sortie = false;
         }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////appelle de la function ci dessus///////////////////////////////////////////////////////////////////////////////

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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
///////////////////////////////////remet a zero tout les canvas ///////////////////////////////////////////////////////////////////////////////////////
        function updateAll(){
        	for(i=0;i<=4;i++){
        	canvasActuel = i;
        	result[canvasActuel]= false;
        	Update();
         	paint[canvasActuel] = false;
         	btn[canvasActuel+1].value = 'Commencer'
        	}
        }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        function PaintNo(){
	        clickX = [];
	        clickY = [];
         }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
       

        

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

   	 	btn[1].addEventListener('click', updateBtn1);
   	 	btn[2].addEventListener('click', updateBtn2);
   	 	btn[3].addEventListener('click', updateBtn3);
   	 	btn[4].addEventListener('click', updateBtn4);
   	 	btn[5].addEventListener('click', updateBtn5); 

   	 	btn[6].addEventListener('click', updateAll);
   		btn[7].addEventListener('click', Requete2);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
//////////////////////////////////////fin de l'exercice//////////////////////////////
////////////////////////////////affichage resultat et enregistrement//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      

   		var textresultat = document.querySelectorAll("p");
   	 
   	 	
   	 	var info;
   		Resultat();
   		
   	 	function Resultat(){
   	 		
   	    info = 0;
   		 for(i=0;i<=result.length-1;i++){
   			 if(result[i] == true){
   				 info += 1;
   			 }
   		 }
   		textresultat[2].innerHTML = "vous avez reussi " + info + " exercices";
   		setTimeout(Resultat,10000); // rappel après 0.1 secondes = 100 millisecondes////////
   		return info;
   	}
   	 	
   	 function Requete2(callback) {
   		
   		var xhr = new XMLHttpRequest();
   				xhr.onreadystatechange = function() {
   					
   					if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
   						return callback(xhr.responseText);	
   					}
   				};	
   				var id = document.querySelectorAll("p");
   		var url = "/envoiajax?score="+Resultat()+"&exercice=4&patient="+ id[2].innerHTML +"&user="+ id[1].innerHTML +"&bilan=1"
   		xhr.open("GET", url, true);
   		xhr.send(null);	
   	}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////      
}
