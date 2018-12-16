var controlError = 0;
function generarError(error){
	var divError = document.querySelector("div[id=error]");
	if(controlError==0){
		divError.style.display= "block";
		controlError++;
	}
	var mensaje = document.createElement("LABEL");
	var contenido = document.createTextNode(error);
	mensaje.setAttribute("for",error);
	var img = document.createElement("IMG");
	img.setAttribute("name","imgErrores")
	img.setAttribute("src","img/error.png");
	img.setAttribute("class","ImgError animacion");
	var salto = document.createElement("BR");
	divError.appendChild(img);
	divError.appendChild(contenido);
	divError.appendChild(salto);
	var newDiv = divError.cloneNode(true);
	reiniciarAnimacionErrores();
}
function reiniciarAnimacionErrores(){
	var divError = document.querySelector("div[id=error]");
	var newDiv = divError.cloneNode(true);
	divError.parentNode.replaceChild(newDiv,divError);
}
//Acordeon
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, {acordion:true});
  });