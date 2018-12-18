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


      	function ElementosOcultos(){
      	var Div = document.querySelector("div[id= formulario]");

        Div.style.display ="inline";

        }
		 function addElement(parentElement,tag,_text,_arrAttr){
        var elementChild=document.createElement(tag);

        if(_text!=undefined){
          var text=document.createTextNode(_text);

          elementChild.appendChild(text);
      }
      if (_arrAttr !=undefined &&  _arrAttr instanceof Array) {

        for (var i = 0; i < _arrAttr.length ; i++) {
          var attrName=_arrAttr[i].split("=")[0];

          var attrValue= _arrAttr[i].split("=")[1];
          elementChild.setAttribute(attrName, attrValue);

        }
      }
       parentElement.appendChild(elementChild);

     }

	function DeshabButton(){

	    document.getElementById("CreateB").disabled=true;
	    }

//Comprobaciones de Formulario
	var NombreCom= false;
 	var SprintCom=false;
 	var MasterCom=false;
 	var OwnerCom=false;
    	function ComprobarAction(){
			ComprobarNombre();
			ComprobarSprint();
			ComprobarMaster();
			ComprobarOwner();
			MensajeComprobar();
		
		}

		function ComprobarNombre(){
			
			if (document.getElementById('TextName').value == undefined) {
				NombreCom = false;
			}
			else{
				NombreCom = true;
			}
		}
		function ComprobarSprint(){

			if (document.getElementById('TextSprint').value == "") {
				SprintCom = false;
			}
			else{
				SprintCom = true;
			}
		}
		function ComprobarMaster(){
			var SelectMaster = document.getElementsByClassName("Master")[0];
		    if(document.querySelector('input[name=Master]').value =="--"){
		    	MasterCom = false;
		    }
		    else{
		    	MasterCom = true;
		    }
		}
		function ComprobarOwner(){
			var SelectOwner = document.getElementsByClassName("Owner");
		    if(document.querySelector('input[name=Owner]').value =="--" ){
		    	OwnerCom = false;
		    }
		    else{
		    	OwnerCom = true;

		    }

		}
		function MensajeComprobar(){
			if (NombreCom == false ) {
				  generarError("El proyecto necesita un nombre.");
			}
			if (SprintCom == false) {
				generarError("El proyecto necesita un numero de Sprint.");
			}
			if (MasterCom == false) {
				generarError("Selecciona un Scrum Master.");
			}
			if (OwnerCom == false) {
				generarError("Selecciona un Product Owner.");
			}
			
			else if (NombreCom == true && SprintCom == true 
			&& MasterCom == true && OwnerCom == true) {
				document.getElementsByClassName("CrearProyecto").value=true;
			}
		}
	
// Pasar Opciones a los Select:
		function PasarOption(){
			
			for(var i=0; i<MegaListaM.length;i++){
				var containerM = document.querySelector("Select[name=Master]");	
				var optionM=document.createElement("option");
				var ContenidoM=document.createTextNode(MegaListaM[i][1]);
				optionM.setAttribute("value",MegaListaM[i][0]);
				optionM.setAttribute("NombreMaster",MegaListaM[i][1]);
				optionM.appendChild(ContenidoM);
				containerM.appendChild(optionM);
			}
			for(var i=0; i<MegaListaO.length;i++){
				var containerO = document.querySelector("Select[name=Owner]");
				var optionO=document.createElement("option");
				var ContenidoO=document.createTextNode(MegaListaO[i][1]);
				optionO.setAttribute("value",MegaListaO[i][0]);
				optionO.setAttribute("NombreOwner",MegaListaO[i][1]);
				optionO.appendChild(ContenidoO);
				containerO.appendChild(optionO);
				
			}
			

		}
	
		function optionGrupo(){
			for(var i=0; i<MegaListaG.length;i++){
				var containerG = document.querySelector("Select[name=Grupo]");
				var optionG=document.createElement("option");
				var ContenidoG=document.createTextNode(MegaListaG[i][1]);
				optionG.setAttribute("value",MegaListaG[i][0]);
				optionG.setAttribute("NombreGrupo",MegaListaG[i][1]);
				optionG.appendChild(ContenidoG);
				containerG.appendChild(optionG);


			}
	 }
		
	 //
		function Mas(){
			

			var div1 = document.querySelector("div[id=formulario]");

			if (contadorMas<=1){
			 	contadorMas++;
			 	
			 	var itm = document.querySelector("Select[name=Grupo]");

				var clon = itm.cloneNode(true);

				var btnMAS =document.querySelector("Input[name=mas]");

				div1.insertBefore(clon, btnMAS);
			 }

		}
