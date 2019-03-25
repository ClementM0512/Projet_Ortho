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