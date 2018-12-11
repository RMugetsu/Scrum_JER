<!DOCTYPE html>
<html>
<head>
	<title>Vista Projectos</title>
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript">
		var proyects = [];
	</script>
	<script type="text/javascript" src="script/script.js" defer></script>
</head>
<body>
	<?php
		session_start();
		$con = mysqli_connect('localhost','root','');
		mysqli_select_db($con, 'projecte_scrumb');
		$consulta = "SELECT Id, Nombre, NumSprint as Sprints, PO_Id as PO, SM_Id as SM FROM proyecto";
		$resultat = mysqli_query($con, $consulta);
			while($registre = mysqli_fetch_assoc($resultat))
 				{
 					//print_r($registre);
 					?><script type="text/javascript">
						var id = <?php echo $registre["Id"]?>;
						var nombre = '<?php echo $registre["Nombre"]?>';
						var sprints = <?php echo $registre["Sprints"]?>;
						var po = <?php echo $registre["PO"]?>;
						var sm = <?php echo $registre["SM"]?>;
						var proyecto = [id,nombre,sprints,po,sm];
						proyects.push(proyecto);
					</script>
					<?php
 				}
	?>
	<div id="cabecera">
		<div id="titulo">
			<label>Bienvenido a la mejor pagina de gestion de SCRUM</label>
		</div>
		<div id="usuario">
			<?php echo "<label>Usuario: ".$_SESSION['Nombre']."</label>";?>
		</div>
	</div>
	<br>
	<br>
	<br>
	<br>
	<div>
		<h2>Listado de Projectos</h2>
		<div id="grid" class="animacion2">
		</div>
		<div id="generarError">
			<button onclick="generarError()">Generar Error</button>
		</div>
		<div  id="error" class="animacion2" style="display: none">
		</div>
	</div>
	




	<div id="formulario">
		<form>
			
		</form>
	</div>

</body>
	<script type="text/javascript">
		var MegaListaM=[];
		var MegaListaO=[];
		var MegaListaG=[];	
		var contadorMas=0;
	</script>
	<script type="text/javascript">
		var tipo = <?=$_SESSION['Tipo']?>;


		function generarProyectos(){
		for (var i = 0; i < proyects.length; i++) {
			var salto = document.createElement("BR");
			var contenedor = document.querySelector("div[id=grid]");
			var element = document.createElement("A");
			var contenido = document.createTextNode(proyects[i][1]);
			element.setAttribute("Identidicador",proyects[i][0]);
			element.setAttribute("NSprint",proyects[i][2]);
			element.setAttribute("PO",proyects[i][3]);
			element.setAttribute("SM",proyects[i][4]);
			element.setAttribute("class","linksProyectos");
			element.setAttribute("href","#");
			element.appendChild(contenido);
			contenedor.appendChild(element);
			contenedor.appendChild(salto);
			}
		}
	generarProyectos();
		function botonFormulario(){
			if(tipo=="1"){
				var cuerpo = document.querySelector("div[id=formulario]");
				var boton = document.createElement("Input");
				boton.setAttribute("type","button");
				boton.setAttribute("id","CreateB");
				boton.setAttribute("name","ButtonCreate");
				boton.setAttribute("value","Nuevo Projecto");
				boton.setAttribute("onclick","DeshabButton()");
				boton.setAttribute("class","ubicar");
				cuerpo.appendChild(boton);
			}
		}
		botonFormulario();
		  function DeshabButton(){

	     	document.getElementById("CreateB").disabled=true;
	     }

	</script>

<form method="Post" action="<?php echo $_SERVER['PHP_SELF']?>">
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
		$con = mysqli_connect('localhost','root','');
		mysqli_select_db($con, 'projecte_scrumb');
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
		  addElement(div1,"br");
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


/*
    	function ComprobarAction(){
			ComprobarNombre();
			ComprobarSprint();
			ComprobarMaster();
			ComprobarOwner();
			MensajeComprobar();
		
		}

		function ComprobarNombre(){
			
			if (document.getElementsByClassName("TextName").value == null) {
				NombreCom = false;
			}
			else{
				NombreCom = true;
			}
		}
		function ComprobarSprint(){

			if (document.getElementsByClassName("TextSprint").value == null) {
				SprintCom = false;
			}
			else{
				SprintCom = true;
			}
		}
		function ComprobarMaster(){
			var SelectMaster = document.getElementsByClassName("Master");
		    if(SelectMaster.selectedIndex !=0 )
		    	MasterCom = true;
		    else{
		    	MasterCom = false;
		    }
		}
		function ComprobarOwner(){
			var SelectOwner = document.getElementsByClassName("Owner");
		    if(SelectOwner.selectedIndex !=0 )
		    	OwnerCom = true;
		    else{
		    	OwnerCom = false;
		    }
		}
		function MensajeComprobar(){
			if (NombreCom == false ) {
				 document.getElementsByClassName('ErrorNombre').innerHTML ="El proyecto necesita un nombre.";
			}
			else if (SprintCom == false) {
				document.getElementsByClassName('ErrorSprint').innerHTML ="El proyecto necesita un numero de Sprint.";
			}
			else if (MasterCom == false) {
				document.getElementsByClassName('ErrorMaster').innerHTML ="Selecciona un Scrum Master.";
			}
			else if (OwnerCom == false) {
				document.getElementsByClassName('ErrorOwner').innerHTML ="Selecciona un Product Owner.";
			}
			
			else if (NombreCom == true && SprintCom == true 
			&& MasterCom == true && OwnerCom == true) {
				document.getElementsByClassName("CrearProyecto").value=true;
			}
		}
*/		
	</script>

	<script type="text/javascript">
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
			
			var div1 = document.querySelector("input[name=mas]");
			if (contadorMas<=1){
			 	
			 	contadorMas++;
			 	
			 	addElement(div1,"Select",undefined,[ "name=Grupo2"]);
			 	var  i1= document.querySelector("Button[name=Mas")
			 	i1.insertBefore()
			 	optionGrupo2();
			 }

		}

	 /*	
	 	
	 			$conIn = mysqli_connect('localhost','root','');
				mysqli_select_db($conIn, 'projecte_scrumb');
				$consultaIn="Insert into proyecto(Nombre,NumSprint,Descripcion,PO_Id,SM_Id) values('$Nombre',$Numero','$Descripción','$Owner','$Master')";
				if( mysqli_query($conIn, $consultaIn)){
					echo "Valores insertados";
				}
	 		?>*/
	</script>
</form>

</html>