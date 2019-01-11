//Comienzan las funciones de ordenar o eliminar las especificaiones
function eliminarEspecificacion(element){
	//boton de eliminar
   	var elemento_padre = element.parentNode;
	elemento_padre.parentNode.removeChild(elemento_padre);

}

function posicionArriba(element){
	//boton de flecha arriba
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
	//boton de flecha abajo
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

document.addEventListener('DOMContentLoaded', function(){
    //añade el textfield y el boton de añadir especificaciones
    div_añadir_especificaciones = document.getElementById("div_añadir_especificaciones");
    var texto_añadir = document.createElement("input");
    texto_añadir.setAttribute("type","textfield");
    texto_añadir.setAttribute("id","nueva_especificacion");
    div_añadir_especificaciones.appendChild(texto_añadir);

    //añade el textfield y el boton de añadir especificaciones
    div_añadir_especificaciones = document.getElementById("div_añadir_especificaciones");
    var boton_añadir_espec = document.createElement("a");
    boton_añadir_espec.setAttribute("class","btn-floating btn-large waves-effect waves-light red");
    boton_añadir_espec.setAttribute("id","boton_nueva_especificacion");
    boton_añadir_espec.setAttribute("onclick","añadirEspecificacion()");

    var icono_boton_añadir_espec = document.createElement("i");
    icono_boton_añadir_espec.setAttribute("class","material-icons");

    texto_icono_boton_añadir_espec = document.createTextNode("add");

    icono_boton_añadir_espec.appendChild(texto_icono_boton_añadir_espec);
    boton_añadir_espec.appendChild(icono_boton_añadir_espec);
    div_añadir_especificaciones.appendChild(boton_añadir_espec);
    
});

function añadirEspecificacion(){

	var lista_especificaciones = document.getElementById("lista_especificaciones");
	var ultimo_elemento_lista = lista_especificaciones.lastChild;
	//cogemos el segundo valor (1), ya que el primero pertenece a otra lista,
	//cogemos el padre, y del padre sacamos el ultimo hijo, que sera el ultimo de la lista.
	//a partir de aqui, ya podremos isertar lo del textfield
	var nueva_especificacion = document.getElementById("nueva_especificacion").value;

	if (nueva_especificacion != "") {

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
	}
	else{
		alert("Introduce un nombre");
	}

}
//Terminan las funciones de ordenar o eliminar las especificaiones

//Acordeon
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, {acordion:true});
  });
//termina el acordeon


//esto creara el boton de añadir sprints:
document.addEventListener('DOMContentLoaded', function() {
    var div_sprints = document.getElementById("sprints");
    var boton_añadir_sprints = document.createElement("input");
    boton_añadir_sprints.setAttribute("name","CrearSprint");
    boton_añadir_sprints.setAttribute("type","button");
    boton_añadir_sprints.setAttribute("value","Añadir nuevo sprint");
    boton_añadir_sprints.setAttribute("onclick","generar_formulario_nuevo_sprint()");
    div_sprints.appendChild(boton_añadir_sprints);
  });

// funcion para generar el formulario del nuevo sprint
function generar_formulario_nuevo_sprint() {
	deshabilitarBotonNuevoSprint();
	var div_nuevo_sprint = document.getElementById("nuevo_sprint");
	var form_nuevo_sprint = document.createElement("form");
	form_nuevo_sprint.setAttribute("action","#");
	form_nuevo_sprint.setAttribute("id","form_nuevo_sprint");

	//crea el label y el date de la fecha inicio
	var label_inicio_nuevo_sprint = document.createElement("label");
	var texto_inicio_nuevo_sprint = document.createTextNode("Fecha inicio");
	label_inicio_nuevo_sprint.appendChild(texto_inicio_nuevo_sprint);
	form_nuevo_sprint.appendChild(label_inicio_nuevo_sprint);

	var fecha_inicio_nuevo_sprint = document.createElement("input");
	fecha_inicio_nuevo_sprint.setAttribute("id","fecha_inicial_sprint");
	fecha_inicio_nuevo_sprint.setAttribute("type","date");
	//fecha_inicio_nuevo_sprint.setAttribute("required","true");
	form_nuevo_sprint.appendChild(fecha_inicio_nuevo_sprint);

	form_nuevo_sprint.appendChild(document.createElement("br"));

	//crea el label y el date de la fecha final
	var label_final_nuevo_sprint = document.createElement("label");
	var texto_final_nuevo_sprint = document.createTextNode("Fecha final");
	label_final_nuevo_sprint.appendChild(texto_final_nuevo_sprint);
	form_nuevo_sprint.appendChild(label_final_nuevo_sprint);

	var fecha_final_nuevo_sprint = document.createElement("input");
	fecha_final_nuevo_sprint.setAttribute("id","fecha_final_sprint");
	fecha_final_nuevo_sprint.setAttribute("type","date");
	//fecha_final_nuevo_sprint.setAttribute("required","true");
	form_nuevo_sprint.appendChild(fecha_final_nuevo_sprint);

	//crea el label y el introducir un numero de horas
	var label_horasDisponibles_nuevo_sprint = document.createElement("label");
	var texto_horasDisponibles_nuevo_sprint = document.createTextNode("Horas disponibles para el sprint");
	label_horasDisponibles_nuevo_sprint.appendChild(texto_horasDisponibles_nuevo_sprint);
	form_nuevo_sprint.appendChild(label_horasDisponibles_nuevo_sprint);

	var numero_horasDisponibles_nuevo_sprint = document.createElement("input");
	numero_horasDisponibles_nuevo_sprint.setAttribute("id","numero_horas_disponibles");
	numero_horasDisponibles_nuevo_sprint.setAttribute("type","number");
	//numero_horasDisponibles_nuevo_sprint.setAttribute("max","999");
	//numero_horasDisponibles_nuevo_sprint.setAttribute("required","true");
	form_nuevo_sprint.appendChild(numero_horasDisponibles_nuevo_sprint);

	//crea el boton de enviar
	var boton_nuevo_sprint = document.createElement("input");
	boton_nuevo_sprint.setAttribute("type","button");
	boton_nuevo_sprint.setAttribute("value","Insertar Sprint");
	boton_nuevo_sprint.setAttribute("onclick","comprobarFechas()");
	form_nuevo_sprint.appendChild(boton_nuevo_sprint);

	div_nuevo_sprint.appendChild(form_nuevo_sprint);
}

function deshabilitarBotonNuevoSprint() {
	document.getElementsByName("CrearSprint")[0].disabled = true;
}

function comprobarFechas() {
	var fecha_actual = new Date();
	var fecha_actual_comparacion = fecha_actual.getTime();
	var horas_disponibles = document.getElementById("numero_horas_disponibles").value;

	var fecha_inicio_sprint = document.getElementById("fecha_inicial_sprint").value;
	var fecha_fin_sprint = document.getElementById("fecha_final_sprint").value;

	var fecha_inicio_sprint_valor = new Date(fecha_inicio_sprint).getTime();
	var fecha_fin_sprint_valor = new Date(fecha_fin_sprint).getTime();

	if (fecha_inicio_sprint == "") {
		alert("rellena la fecha de inicio")
	}
	else if (fecha_inicio_sprint_valor < fecha_actual_comparacion) {
		alert("fecha de inicio elegida es anterior a hoy");
	}
	else if (fecha_fin_sprint == "") {
		alert("rellena la fecha de fin")
	}
	else if (fecha_fin_sprint_valor < fecha_actual_comparacion) {
		alert("fecha de fin elegida es anterior a hoy");
	}
	else if (fecha_fin_sprint_valor < fecha_inicio_sprint_valor) {
		alert("fecha de fin es anterior a la fecha de inicio");
	}
	else if (horas_disponibles < 1) {
		alert("las horas no pueden ser menos de 1");
	}
	else if (horas_disponibles > 999) {
		alert("las horas no pueden ser mas de 999");
	}

}

function paginaAnterior(){
	document.location = "home.php";
}