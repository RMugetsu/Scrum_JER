function generarError(){
	var divError = document.querySelector("div[id=error]");
	var mensaje = document.createElement("LABEL");
	var contenido = document.createTextNode("Esto es un mensaje de prueba");
	mensaje.setAttribute("for","Esto es un mensaje de prueba");
	var img = document.createElement("IMG");
	img.setAttribute("src","img/error.png");
	img.setAttribute("class","ImgError animacion");
	var salto = document.createElement("BR");
	divError.appendChild(img);
	divError.appendChild(contenido);
	divError.appendChild(salto);
}