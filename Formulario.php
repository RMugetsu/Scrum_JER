
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<title></title>
</head>
<body>
	<script type="text/javascript">
		var MegaListaM=[];
		var MegaListaO=[];
		var MegaListaG=[];	
		var contadorMas=0;
	</script>
	<input type="button" id="CreateB" name="ButtonCreate" value="New Project" onclick="DeshabButton()"/><br>

	<form method="Post" action="pruebaaaa.php">
		<?php
		if(isset($_POST['CrearProyecto'])){
			$Nombre=$_POST['TextName'];
			$Numero=$_POST['TextSprint'];
			$Owner=$_POST['Owner'];
			$Master=$_POST['Master'];
			$Grupo=$_POST['Grupo'];
			$Descripción=$_POST['TextDescript'];
		}
	?>

	<?php
		$con = mysqli_connect('localhost','admin','1234');
		mysqli_select_db($con, 'test');
		$consultaM="Select Nombre, Id From Usuario Where tipo=1";
		$consultaO="Select Nombre,Id From usuario where tipo=2";
		$consultaG="Select Nombre,Id From grupos";
		$resultatM=mysqli_query($con, $consultaM);
		$resultatO=mysqli_query($con, $consultaO);
		$resultatG=mysqli_query($con, $consultaG);
			while ($registreM = mysqli_fetch_assoc($resultatM)) {
			
	?><script type="text/javascript">
		var NombreM='<?=$registreM["Nombre"]?>';	
		var IdM=<?=$registreM["Id"]?>;
		var ListaM=[IdM,NombreM];
		MegaListaM.push(ListaM);

	</script>
	<?php 
		}
		while ($registreO=mysqli_fetch_assoc($resultatO)) {
			
	?><script type="text/javascript">
		var NombreO='<?=$registreO["Nombre"]?>';
		var IdO=<?=$registreO["Id"]?>;
		var ListaO=[IdO,NombreO];
		MegaListaO.push(ListaO);
	</script>
	<?php
		}
	while ($registreG = mysqli_fetch_assoc($resultatG)) {
			
	?><script type="text/javascript">
		var NombreG='<?=$registreG["Nombre"]?>';	
		var IdG=<?=$registreG["Id"]?>;
		var ListaG=[IdG,NombreG];
		MegaListaG.push(ListaG);

	</script>
	<?php 
		}
	?>

	 <script type="text/javascript">
	 /*	var NombreCom= false;
	 	var SprintCom=false;
	 	var MasterCom=false;
	 	var OwnerCom=false;*/
	 	var construirInput= document.querySelector("input[name=ButtonCreate]");
      	construirInput.addEventListener("click",GenerarForm);
      	

      	function ElementosOcultos(){
      	var Div = document.querySelector("div[id= formulario]");

        Div.style.display ="inline";

        }

		function PasarOption(){
			
			for(var i=0; i<MegaListaM.length;i++){
				var containerM = document.querySelector("Select[name=Master]");	
				var optionM=document.createElement("option");
				var ContenidoM=document.createTextNode(MegaListaM[i][1]);
				optionM.setAttribute("IdMaster",MegaListaM[i][0]);
				optionM.setAttribute("NombreMaster",MegaListaM[i][1]);
				optionM.appendChild(ContenidoM);
				containerM.appendChild(optionM);
			}
			for(var i=0; i<MegaListaO.length;i++){
				var containerO = document.querySelector("Select[name=Owner]");
				var optionO=document.createElement("option");
				var ContenidoO=document.createTextNode(MegaListaO[i][1]);
				optionO.setAttribute("IdOwner",MegaListaO[i][0]);
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
				optionG.setAttribute("IdGrupo",MegaListaG[i][0]);
				optionG.setAttribute("NombreGrupo",MegaListaG[i][1]);
				optionG.appendChild(ContenidoG);
				containerG.appendChild(optionG);
			}
	 }
		function optionGrupo2(){
			for(var i=0; i<MegaListaG.length;i++){
				var containerG = document.querySelector("Select[name=Grupo2]");
				var optionG=document.createElement("option");
				var ContenidoG=document.createTextNode(MegaListaG[i][1]);
				optionG.setAttribute("IdGrupo",MegaListaG[i][0]);
				optionG.setAttribute("NombreGrupo",MegaListaG[i][1]);
				optionG.appendChild(ContenidoG);
				containerG.appendChild(optionG);
			}
	 }

		function Mas(){
			
			var div1 = document.querySelector("div[id=formulario]");
			if (contadorMas<=1){
			 	
			 	contadorMas++;
			 	
			 	addElement(div1,"Select",undefined,[ "name=Grupo"]);
			 	optionGrupo();
			 }

		}




        function GenerarForm () { 
		 
		 
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
		 //addElement(div1,"label",undefined,["name=ErrorNombre"]);
		  addElement(div1,"br");
		  addElement(div1,"input",undefined,["type=text", "name=TextName","required"]);
		  addElement(div1,"br");
  		  addElement(div1,"label","Numero Sprint: ",undefined);
  		  //addElement(div1,"label",undefined,["name=ErrorSprint"]);
		  addElement(div1,"br");
		  addElement(div1,"input",undefined,["type=text", "name=TextSprint","required"]);
		  addElement(div1,"br");
		  addElement(div1,"label","Product Owner: ",undefined);
		  addElement(div1,"br");
		  addElement(div1,"Select",undefined,["name=Owner","required"]);
		  //addElement(div1,"label",undefined,["name=ErrorOwner"]);
		  addElement(div1,"br");
  		  addElement(div1,"label","Scrum Master",undefined);
  		  //addElement(div1,"label",undefined,["name=ErrorMaster"]);
  		  addElement(div1,"br");
		  addElement(div1,"Select",undefined,["name=Master","required"]);
		  
		  addElement(div1,"br");
		  addElement(div1,"label","Grupo: ",undefined);
		  addElement(div1,"br");
		  addElement(div1,"Select",undefined,[ "name=Grupo", "required"]);
		  addElement(div1,"input","+",["type=button","name=mas","onclick=Mas()"]);
		  addElement(div1,"br");
		  addElement(div1,"label","Descripción: ",undefined);
  		  addElement(div1,"br");
		  addElement(div1,"input",undefined,["type=text","name=TextDescript"]);
		  addElement(div1,"br");

		  addElement(div1,"button","Create Project",["name=CrearProyecto"]);
		optionGrupo();
  		PasarOption();
	    ElementosOcultos();
		 // ComprobarAction();
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
	
	</script>
	<!--<?php
	 			$conIn = mysqli_connect('localhost','root','');
				mysqli_select_db($conIn, 'test');
				$consultaIn="Insert into proyecto(Nombre,NumSprint,Descripcion,PO_Id,SM_Id) values('$Nombre',$Numero','$Descripción','$Owner','$Master')";
				if( mysqli_query($conIn, $consultaIn)){
					echo "Valores insertados";
				}
	 		?>-->
</form>

</body>
</html>