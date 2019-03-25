var header = document.getElementById("change-active");
var btns = document.body.querySelectorAll("li");



btns[0].className = "nav-item change-item";
btns[1].className = "nav-item active change-item"


//var current = document.getElementsByClassName("nav-item active change-item");
//alert(current.textContent);
//current.className = current.className.replace(" active", "");
//btns [1].className += " active";
////halert(btns[0].textContent);
//function ChangeClass() 
//{
//  var current = document.getElementsByClassName("nav-item active change-item");
//  alert(current.textContent);
//  current.className = current.className.replace(" active", "");
//  this.className += " active";
//}
//
//for (var i = 0; i < btns.length; i++) 
//{
//  btns[1].addEventListener("click", ChangeClass());
//}