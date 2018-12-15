//Comienzan las funciones de ordenar o eliminar las especificaiones
function eliminarEspecificacion(element){

   	var elemento_padre = element.parentNode;
	elemento_padre.parentNode.removeChild(elemento_padre);

}

function posicionArriba(element){

   	var elemento_anterior = element.parentNode.previousSibling;
   	var elemento_seleccionado = element.parentNode.cloneNode(true);
   	var abuelo = element.parentNode.parentNode;

   	if (elemento_anterior !=null){
    	var elemento_padre = element.parentNode;
    	elemento_padre.parentNode.removeChild(elemento_padre);
    	abuelo.insertBefore(elemento_seleccionado, elemento_anterior);
    }

}

function posicionAbajo(element){

	var elemento_posterior1 = element.parentNode.nextSibling;
	var elemento_posterior2 = element.parentNode.nextSibling.nextSibling;
	var elemento_seleccionado = element.parentNode.cloneNode(true);
	var abuelo = element.parentNode.parentNode;

	if (elemento_posterior1 !=null){
	   	var elemento_padre = element.parentNode;
	   	elemento_padre.parentNode.removeChild(elemento_padre);
	   	abuelo.insertBefore(elemento_seleccionado, elemento_posterior2);
	}

}

function añadirEspecificacion(){

	var lista_especificaciones = document.getElementsByTagName("li")[1].parentNode
	var ultimo_elemento_lista = lista_especificaciones.lastChild;
	console.log(ultimo_elemento_lista);
	//cogemos el segundo valor (1), ya que el primero pertenece a otra lista,
	//cogemos el padre, y del padre sacamos el ultimo hijo, que sera el ultimo de la lista.
	//a partir de aqui, ya podremos isertar lo del textfield
	var nueva_especificacion = document.getElementById("nueva_especificacion").value;

	var divprueba = document.getElementById("prueba");
	var nuevo_li = document.createElement("li");
	nuevo_li.setAttribute("class", "collection-item");
	nuevo_li.setAttribute("id", "listado_esp");
	var texto_nueva_esp = document.createTextNode(nueva_especificacion);
	nuevo_li.appendChild(texto_nueva_esp);

	//botones subir bajar y eliminar
	var boton_eliminar = document.createElement("img");
	boton_eliminar.setAttribute("class","secondary-content boton_eliminar");
	boton_eliminar.setAttribute("onclick","eliminarEspecificacion(this)")
	boton_eliminar.setAttribute("src","img/eliminar.png");
	boton_eliminar.setAttribute("height","25");
	nuevo_li.appendChild(boton_eliminar);

	var flecha_abajo = document.createElement("img");
	flecha_abajo.setAttribute("class","secondary-content flecha_abajo");
	flecha_abajo.setAttribute("onclick","posicionAbajo(this)")
	flecha_abajo.setAttribute("src","img/flecha_arriba.svg");
	flecha_abajo.setAttribute("height","25");
	nuevo_li.appendChild(flecha_abajo);

	var flecha_arriba = document.createElement("img");
	flecha_arriba.setAttribute("class","secondary-content flecha_arriba");
	flecha_arriba.setAttribute("onclick","posicionArriba(this)")
	flecha_arriba.setAttribute("src","img/flecha_arriba.svg");
	flecha_arriba.setAttribute("height","25");
	nuevo_li.appendChild(flecha_arriba);

	lista_especificaciones.appendChild(nuevo_li);

	//lista_especificaciones.insertBefore(nueva_especificacion,ultimo_elemento_lista);


}
//Terminan las funciones de ordenar o eliminar las especificaiones
