<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
	<title></title>
</head>
<body>
	<input type="button" name="ButtonCreate" value="New Project"/><br>
	

	 <script type="text/javascript">
	 	var construirInput= document.querySelector("input[name=ButtonCreate]");
      	construirInput.addEventListener("click",GenerarForm);

      	function ElementosOcultos(){
      	var Div = document.querySelector("div[id= formulario]");

        Div.style.display ="inline";

        }

        function GenerarForm () { 
		  // añade contenido 
		  var body = document.getElementsByTagName("body")[0];
		  addElement(body,"div",undefined,["id=div"]);
		  var DivGuay = document.querySelector("div[id= div]");
		  var Jump = document.createElement("br");

		  body.appendChild(DivGuay);

		  addElement(DivGuay,"Form",undefined,["method=Post","action=#"]);
		  var form= document.querySelector("form");
		  addElement(form,"div",undefined,["style=display:none;", "id=formulario"]);
		  var div1 = document.querySelector("div[id=formulario]");
		  addElement(div1,"label","Nombre Proyecto: ",undefined);
		  addElement(div1,"br");
		  addElement(div1,"input",undefined,["type=text", "name=TextName"]);
		  addElement(div1,"br");
  		  addElement(div1,"label","Numero Sprint: ",undefined);
		  addElement(div1,"br");
		  addElement(div1,"input",undefined,["type=text", "name=TextSprint"]);
		  		  addElement(div1,"br");
		  addElement(div1,"label","Product Owner: ",undefined);
		  		  addElement(div1,"br");
		  addElement(div1,"Select",undefined,["name=Owner"]);
		  		  addElement(div1,"br");
  		  addElement(div1,"label","Scrum Master",undefined);
  		  		  addElement(div1,"br");
		  addElement(div1,"Select",undefined,["name=Master"]);
		  		  addElement(div1,"br");
		  addElement(div1,"lable","Grupo: ",undefined);
		  		  addElement(div1,"br");
		  addElement(div1,"Input",undefined,["type=checkbox", "name=Box"]);
		  		  addElement(div1,"br");
		  addElement(div1,"button","Create Project",undefined);
	  
		  ElementosOcultos();
		}
		    
		 function addElement(parentElement,tag,_text,_arrAttr){
        var elementChild=document.createElement(tag);

        if(_text!=undefined){
          var text=document.createTextNode(_text);

          elementChild.appendChild(text);
      }
      if (_arrAttr !=undefined &&  _arrAttr instanceof Array) { // comprobaciones siempre en instanceof nada de type of

        for (var i = 0; i < _arrAttr.length ; i++) {
          var attrName=_arrAttr[i].split("=")[0];

          var attrValue= _arrAttr[i].split("=")[1];
          elementChild.setAttribute(attrName, attrValue);

        }
      }
       parentElement.appendChild(elementChild);

     }

		
	</script>
	</form>	
		<?php

	 		$conn = mysqli_connect('localhost','ericperez','42gjuntaros','projecte_scrumb');	
	 		$consulta ="SELECT nombre FROM usuario WHERE Tipo= 1;";
	 		$resultat = mysqli_query($conn, $consulta);
	 		if (!$resultat) {
	     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
	     			$message .= 'Consulta realitzada: ' . $consulta;
	     			die($message);
	 		}
	 		while($registre = mysqli_fetch_assoc($resultat)) {
	 			echo $message."<br>";
	 		}
 		?>

	 


</body>
</html>