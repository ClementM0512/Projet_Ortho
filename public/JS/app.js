//////////////////////////////////////////////////////////////////////////////
/**************************** SELECTION PAGE ********************************/
//////////////////////////////////////////////////////////////////////////////

var header = document.getElementById("change-active");
var btns = header.getElementsByClassName("change-item");

function ChangeClass() 
{
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
}

for (var i = 0; i < btns.length; i++) 
{
  btns[i].addEventListener("click", ChangeClass());
}
//////////////////////////////////////////////////////////////////////////////
/******************************* DROP MENU **********************************/
//////////////////////////////////////////////////////////////////////////////
var btnIconMenu = document.getElementById('iconMenu');
btnIconMenu.addEventListener("click", OpenMenu);
var isOpenLink = true;
menuLien = document.getElementById('dropMenu');
menuLienEntier = document.getElementById('dropMenuTotal');
function OpenMenu()
{

    if(isOpenLink) 
    {
      hideLink();
    }
    else
    {
      hideLink();
    }
    
}
function hideLink()
{
  
  menuLien.hidden  =  menuLien.hidden ? false : true ;
  alert("rgeqr");
}