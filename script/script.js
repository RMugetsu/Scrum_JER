var controlError = 0;
function generarError(error){
	var divError = document.querySelector("div[id=error]");
	if(controlError==0){
		divError.style.display= "block";
		controlError++;
	}
	var mensaje = document.createElement("LABEL");
	var contenido = document.createTextNode("Esto es un mensaje de prueba");
	mensaje.setAttribute("for",'Esto es un mensaje de prueba');
	var img = document.createElement("IMG");
	img.setAttribute("src","img/error.png");
	img.setAttribute("class","ImgError animacion");
	var salto = document.createElement("BR");
	divError.appendChild(img);
	divError.appendChild(contenido);
	divError.appendChild(salto);
	//activarEfecto();
}
/*function activarEfecto(){
	var errores = document.getElementById("error").childNodes;
	if (errores.length>1) {
		for (var i = 0; i<errores.length; i++) {
			errores[i].removeAttribute("class");
			errores[i].setAttribute("class","ImgError animacion");
		}	
	}
}*/