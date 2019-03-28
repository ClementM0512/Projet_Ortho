////function getXMLHttpRequest() {
////	var xhr = null;
////	
////	if (window.XMLHttpRequest || window.ActiveXObject) {
////		if (window.ActiveXObject) {
////			try {
////				xhr = new ActiveXObject("Msxml2.XMLHTTP");
////			} catch(e) {
////				xhr = new ActiveXObject("Microsoft.XMLHTTP");
////			}
////		} else {
////
////			alert("ok");
////			xhr = new XMLHttpRequest(); 
////		}
////	} else {
////		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
////		return null;
////	}
////	return xhr;
////}
//
////xhr = new XMLHttpRequest();
////xhReq.onload = function(){
////	alert(JSON.parse(this.response));
////}
//
////xhr.open("GET", "/sendarticle", true);
////xhr.send(null);
////nvelem = document.createElement('h1');
////      texte = document.createTextNode("titre");
////      nvelem.appendChild(texte);
////      document.body.appendChild(nvelem);
	

var req;
function request(callback) {
	var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					return callback(xhr.responseText);	
				}
			};		
	xhr.open("GET", "/sendarticle", false);
	xhr.send(null);	
}
function readData(sData) {
	req = JSON.parse(sData);
	return JSON.parse(sData);
	
}
request(readData);








