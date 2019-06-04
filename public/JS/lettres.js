var cartesHaut = document.querySelectorAll("span.Haut");
var cartesBas = document.querySelectorAll("span.Bas");
var CarteCible;
var state = 0; //0: Depart/ 1: Carte Selectionnée
var transition;
var nbCartes = 4;

for(var i=0; i<nbCartes; i++)
{
		cartesHaut[i].addEventListener("click", Selection);
		cartesBas[i].addEventListener("click", Selection);
}


function Selection(){	
		var DoAgain;
		if(state)
    {
    		transition = CarteCible.innerHTML;
	        CarteCible.innerHTML = this.innerHTML;
	        CarteCible.style.backgroundColor = "white";
	        this.innerHTML = transition;
	        this.style.backgroundColor = "grey";
    		CarteCible.style.borderColor = 'yellow';
    		state=0;
    }
    else
    {
    		if(this.className=="Carte Haut")
        {
						if(this.innerHTML=="")
            {
            		return 0;
            }
            else
            {
            		DoAgain = 0;
                while(DoAgain<nbCartes)
                {
                		if(cartesBas[DoAgain].innerHTML=="")
                    {
                    		cartesBas[DoAgain].innerHTML = this.innerHTML;
                    		cartesBas[DoAgain].style.backgroundColor = "grey";
                    		this.innerHTML = "";
                    		this.style.backgroundColor = "white";
                    		DoAgain = nbCartes;
                    }
                    else
                    {
                    		DoAgain++;
                    }
                }
            }
        }
        else
        {
          this.style.borderColor = 'green';
            CarteCible = this;
            state=1;
        }		
		}
}
