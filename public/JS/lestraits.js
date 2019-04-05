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
     var result = new Array(true,true,true,true,true)
     var clickX = new Array();
     var clickY = new Array();
     var canvasActuel;
    //C'est ici que l'on placera tout le code servant à nos dessins.
       
        for(i=0;i<=4;i++){       	
        	intervalle[i] = 90/(i+1);
        	contexts[i].beginPath();//On démarre un nouveau tracé
        	contexts[i].moveTo(0, 50-intervalle[i]/2);
        	contexts[i].lineTo(1000,50-intervalle[i]/2);
        	contexts[i].moveTo(0, 50+intervalle[i]/2);
        	contexts[i].lineTo(1000,50+intervalle[i]/2);
        	contexts[i].stroke();//On trace seulement les lignes.
	        contexts[i].closePath();
        }
        
        function Coordonnees(a, b){		//constructeur d'objet ElementHTML
        	  this.x = a;
        	  this.y = b;
        }
        
        
        function Dessin(e){   
        if(paint[canvasActuel] == false){
        	return 0;
        }
          var mouseX = e.pageX - this.offsetLeft;
          var mouseY = e.pageY - this.offsetTop;
          clickX.push(mouseX);
          clickY.push(mouseY);
          contexts[canvasActuel].strokeStyle = "#000";
          contexts[canvasActuel].lineJoin = "round";
          contexts[canvasActuel].lineWidth = 4;
          contexts[canvasActuel].beginPath();
          if ( clickX.length == 1){
        	  contexts[canvasActuel].moveTo(clickX[0]-1, clickY[0]);
          }else{
        	  contexts[canvasActuel].moveTo(clickX[clickX.length-2], clickY[clickY.length -2]);
          }
         
          contexts[canvasActuel].lineTo(clickX[clickX.length-1], clickY[clickY.length-1]);
          contexts[canvasActuel].closePath();
          contexts[canvasActuel].stroke();
        }   
        
       
        function PaintNo(){
        	paint[canvasActuel] = false;
         }
        
        function updateBtn1(){
        	btn[0].value = 'recomencer';
        	canvasActuel= 0;
	    	contexts[0].beginPath();//On démarre un nouveau tracé
            contexts[0].strokeStyle = "#000";
            contexts[0].lineJoin = "miter";
            contexts[0].lineWidth = 1;
        	contexts[0].clearRect(0, 0, width, height);
	    	contexts[0].moveTo(0, 50-intervalle[0]/2);
	    	contexts[0].lineTo(1000,50-intervalle[0]/2);
	    	contexts[0].moveTo(0, 50+intervalle[0]/2);
	    	contexts[0].lineTo(1000,50+intervalle[0]/2);
	    	contexts[0].stroke();//On trace seulement les lignes.
	        contexts[0].closePath();
	        paint[0]=true;
	        clickX = [];
	        clickY = [];
        }
       
        function updateBtn2(){
        	canvasActuel = 1;
        	btn[1].value = 'recomencer';
	    	contexts[1].beginPath();//On démarre un nouveau tracé
        	contexts[1].clearRect(0, 0, width, height);
            contexts[1].strokeStyle = "#000";
            contexts[1].lineJoin = "miter";
            contexts[1].lineWidth = 1;
	    	contexts[1].moveTo(0, 50-intervalle[1]/2);
	    	contexts[1].lineTo(1000,50-intervalle[1]/2);
	    	contexts[1].moveTo(0, 50+intervalle[1]/2);
	    	contexts[1].lineTo(1000,50+intervalle[1]/2);
	    	contexts[1].stroke();//On trace seulement les lignes.
	        contexts[1].closePath();
	        paint[1]=true;
	        clickX = [];
	        clickY = [];
        }
        
        function updateBtn3(){
        	canvasActuel = 2;
        	btn[2].value = 'recomencer';
	    	contexts[2].beginPath();//On démarre un nouveau tracé
        	contexts[2].clearRect(0, 0, width, height);
            contexts[2].strokeStyle = "#000";
            contexts[2].lineJoin = "miter";
            contexts[2].lineWidth = 1;
	    	contexts[2].moveTo(0, 50-intervalle[2]/2);
	    	contexts[2].lineTo(1000,50-intervalle[2]/2);
	    	contexts[2].moveTo(0, 50+intervalle[2]/2);
	    	contexts[2].lineTo(1000,50+intervalle[2]/2);
	    	contexts[2].stroke();//On trace seulement les lignes.
	        contexts[2].closePath();
	        paint[2]=true;
	        clickX = [];
	        clickY = [];
        }
        
        function updateBtn4(){
        	canvasActuel = 3
        	btn[3].value = 'recomencer';
        	contexts[3].clearRect(0, 0, width, height);
	    	contexts[3].beginPath();//On démarre un nouveau tracé
            contexts[3].strokeStyle = "#000";
            contexts[3].lineJoin = "miter";
            contexts[3].lineWidth = 1;
	    	contexts[3].moveTo(0, 50-intervalle[3]/2);
	    	contexts[3].lineTo(1000,50-intervalle[3]/2);
	    	contexts[3].moveTo(0, 50+intervalle[3]/2);
	    	contexts[3].lineTo(1000,50+intervalle[3]/2);
	    	contexts[3].stroke();//On trace seulement les lignes.
	        contexts[3].closePath();
	        paint[3]=true;
	        clickX = [];
	        clickY = [];
        }
        
        function updateBtn5(){
        	canvasActuel = 4;
        	btn[4].value = 'recomencer';
	    	contexts[4].beginPath();//On démarre un nouveau tracé
            contexts[4].strokeStyle = "#000";
            contexts[4].lineJoin = "miter";
            contexts[4].lineWidth = 1;
        	contexts[4].clearRect(0, 0, width, height);
	    	contexts[4].moveTo(0, 50-intervalle[4]/2);
	    	contexts[4].lineTo(1000,50-intervalle[4]/2);
	    	contexts[4].moveTo(0, 50+intervalle[4]/2);
	    	contexts[4].lineTo(1000,50+intervalle[4]/2);
	    	contexts[4].stroke();//On trace seulement les lignes.
	        contexts[4].closePath();
	        paint[4] = true;
	        clickX = [];
	        clickY = [];
        }
        
    	///// EVENEMENT /////
       	document.getElementById('canvas1').addEventListener('mousemove',Dessin);
    	document.getElementById('canvas1').addEventListener('mousedown',PaintNo);
    	document.getElementById('canvas1').addEventListener('mouseleave',PaintNo);
    	
    	document.getElementById('canvas2').addEventListener('mousemove',Dessin);
    	document.getElementById('canvas2').addEventListener('mousedown',PaintNo);
    	document.getElementById('canvas2').addEventListener('mouseleave',PaintNo);

    	document.getElementById('canvas3').addEventListener('mousemove',Dessin);
    	document.getElementById('canvas3').addEventListener('mousedown',PaintNo);
    	document.getElementById('canvas3').addEventListener('mouseleave',PaintNo);
    	
    	document.getElementById('canvas4').addEventListener('mousemove',Dessin);
    	document.getElementById('canvas4').addEventListener('mousedown',PaintNo);
    	document.getElementById('canvas4').addEventListener('mouseleave',PaintNo);
    	
    	document.getElementById('canvas5').addEventListener('mousemove',Dessin);
    	document.getElementById('canvas5').addEventListener('mousedown',PaintNo);
    	document.getElementById('canvas5').addEventListener('mouseleave',PaintNo);

   	 	btn[0].addEventListener('click', updateBtn1);
   	 	btn[1].addEventListener('click', updateBtn2);
   	 	btn[2].addEventListener('click', updateBtn3);
   	 	btn[3].addEventListener('click', updateBtn4);
   	 	btn[4].addEventListener('click', updateBtn5); 
}
