window.onload = function()
{
    var canvas = document.getElementById('mon_canvas');
        if(!canvas)
        {
            alert("Impossible de récupérer le canvas");
            return;
        }

    var context = canvas.getContext('2d');
        if(!context)
        {
            alert("Impossible de récupérer le context du canvas");
            return;
        }

var ecart = 0;
var intervalle = 0;
    //C'est ici que l'on placera tout le code servant à nos dessins.
        context.beginPath();//On démarre un nouveau tracé
        for(i=0;i<=4;i++){
        	
        	ecrat = 100*i;
        	intervalle = 75/(i+1);
        	
		    context.moveTo(20, (ecrat+100));
		    context.lineTo(900,(ecrat+100));
		    context.moveTo(20, (ecrat+100-intervalle));
		    context.lineTo(900,(ecrat+100-intervalle));

        }
        context.stroke();//On trace seulement les lignes.
        context.closePath();
        
      
}