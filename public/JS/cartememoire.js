//Le jeu comporte 10 motifs différents qui sont numérotés de 1 à 10.
//Le tableau est initialisé avec les numéros de motifs qui se suivent
var motifsCartes=[1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10];
//Le codage utilisé pour l'état des cartes est le suivant :
//0 : face cachée
//1 : face visible
//-1 : enlevée
//Au départ toutes les cartes sont présentées de dos.
var etatsCartes=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]; 
var cartesRetournees=[];
var nbPairesTrouvees=0;
var imgCartes=document.getElementById("tapis").getElementsByTagName("img");	
for(var i=0;i<imgCartes.length;i++){
	imgCartes[i].noCarte=i; //Ajout de la propriété noCarte à l'objet img
	imgCartes[i].onclick=function(){
		controleJeu(this.noCarte);
	}                      
}
initialiseJeu();
//La fonction majAffichage met à jour l'affichage de la carte dont on passe le numéro en paramètre.
//L'affichage rendu dépend de l'état actuel de la carte (donné par le tableau etatsCartes) :
//état 0 : carte face cachée, on affichage l'image de dos de carte : fondcarte.png,
//état 1 : carte retournée, on affiche l'image du motif correspondant, on notera que les différentes images des motifs sont dans les fichiers nommés carte1.png, carte2.png, etc.,
//état -1 : carte enlevée du jeu, on cache l'élément img.
function majAffichage(noCarte){
	switch(etatsCartes[noCarte]){
		case 0:
			imgCartes[noCarte].src="../image/cartes/fondcarte.png";
			break;
		case 1:
			imgCartes[noCarte].src="../image/cartes/carte"+motifsCartes[noCarte]+".png";
			break;
		case -1:
			imgCartes[noCarte].style.visibility="hidden";
			break;
	}
}
function rejouer(){
	alert("Bravo !");
	location.reload();
}
function initialiseJeu(){
	for(var position=motifsCartes.length-1; position>=1; position--){
		var hasard=Math.floor(Math.random()*(position+1));
		var sauve=motifsCartes[position];
		motifsCartes[position]=motifsCartes[hasard];
		motifsCartes[hasard]=sauve;
	}
}
function controleJeu(noCarte){
	if(cartesRetournees.length<2){
		if(etatsCartes[noCarte]==0){
			etatsCartes[noCarte]=1;
			cartesRetournees.push(noCarte);
			majAffichage(noCarte);
		}
		if(cartesRetournees.length==2){
			var nouveauEtat=0;
			if(motifsCartes[cartesRetournees[0]]==motifsCartes[cartesRetournees[1]]){
				nouveauEtat=-1;
				nbPairesTrouvees++;
			}

			etatsCartes[cartesRetournees[0]]=nouveauEtat;
			etatsCartes[cartesRetournees[1]]=nouveauEtat;
			setTimeout(function(){
				majAffichage(cartesRetournees[0]);
				majAffichage(cartesRetournees[1]);
				cartesRetournees=[];
				if(nbPairesTrouvees==10){
					rejouer();
				}
			},750);
		}
	}
}