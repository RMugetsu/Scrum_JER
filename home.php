<!DOCTYPE html>
<html>
<head>
	<title>Vista Proyectos</title>
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
		$con = mysqli_connect('localhost','admin','1234');
		$idusuario = mysqli_real_escape_string($con, $_SESSION['Id']);
		mysqli_select_db($con, 'projecte_scrumb');
		if ($_SESSION['Tipo']=="1") {
			$consulta = "SELECT p.Id, p.Nombre, p.NumSprint as Sprints, p.PO_Id as PO, p.SM_Id as SM FROM proyecto p, usuario u Where p.SM_Id = '$idusuario' AND '$idusuario'=u.Id";
		}elseif($_SESSION['Tipo']=="2"){
			$consulta = "SELECT p.Id, p.Nombre, p.NumSprint as Sprints, p.PO_Id as PO, p.SM_Id as SM FROM proyecto p, usuario u Where p.PO_Id = '$idusuario' AND '$idusuario'=u.Id";
		}elseif ($_SESSION['Tipo']=="3") {
			$consulta = "SELECT p.Id, p.Nombre, p.NumSprint as Sprints, p.PO_Id as PO, p.SM_Id as SM FROM proyecto p, grupos g, usuario u Where '$idusuario'=u.Id AND u.IdGrupo=g.id AND g.IdProyecto=p.Id";
		}
		$resultat = mysqli_query($con, $consulta);
			while($registre = mysqli_fetch_assoc($resultat))
 				{
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
			<img src="img/usuario.png" id="imgUsuario">
			<?php echo "<label>Usuario: ".$_SESSION['Nombre']."</label>";?>
		</div>
		<div id="session">
			<a href="logout.php"><img src="img/cerrar.png" id="imgCerrar"></a>
		</div>
	</div>
	<div  id="error" class="animacion2" style="display: none"></div>
	<br>
	<br>
	<br>
	<br>
	<div>
		<div id="pro" class="grid" class="animacion2">
			<h4>Listado de Proyectos</h4>
		</div>
		
		<div id="generarError">
			<button onclick="generarError()">Generar Error</button>
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
			var contenedor = document.querySelector("div[id=pro]");
			var element = document.createElement("A");
			var contenido = document.createTextNode(proyects[i][1]);
			element.setAttribute("Identidicador",proyects[i][0]);
			element.setAttribute("Nombre",proyects[i][1]);
			element.setAttribute("NSprint",proyects[i][2]);
			element.setAttribute("PO",proyects[i][3]);
			element.setAttribute("SM",proyects[i][4]);
			element.setAttribute("class","linksProyectos");
			element.setAttribute("href","detalleProyectos.php?proyect="+proyects[i][1]);
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
				boton.setAttribute("value","Nuevo Proyecto");
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
		mysqli_select_db($con, 'projecte_scrumb');
		$consultaM="Select Nombre, Id From usuario Where tipo=1";
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
		var tipo = <?=$_SESSION['Tipo']?>;

		
	 	var construirInput= document.querySelector("input[name=ButtonCreate]");
      	construirInput.addEventListener("click",GenerarForm);


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
		  addElement(div1,"br");
		  addElement(div1,"input",undefined,["type=text", "name=TextName","id=TextName","required"]);
		  addElement(div1,"br");
  		  addElement(div1,"label","Numero Sprint: ",undefined);
		  addElement(div1,"br");
		  addElement(div1,"input",undefined,["type=text", "name=TextSprint","id=TextSprint","required"]);
		  addElement(div1,"br");
		  addElement(div1,"label","Product Owner: ",undefined);
		  addElement(div1,"br");
		  addElement(div1,"Select",undefined,["name=Owner","id=Owner","required"]);
		  addElement(div1,"br");
  		  addElement(div1,"label","Scrum Master",undefined);
  		  addElement(div1,"br");
		  addElement(div1,"Select",undefined,["name=Master","id=Master","required"]);		  
		  addElement(div1,"br");
		  addElement(div1,"label","Grupo: ",undefined);
		  addElement(div1,"br");
		  addElement(div1,"Select",undefined,[ "name=Grupo", "id=Grupo","required"]);
		  addElement(div1,"input","+",["type=button","name=mas","onclick=Mas()"]);
		  addElement(div1,"br");
		  addElement(div1,"label","Descripción: ",undefined);
  		  addElement(div1,"br");
		  addElement(div1,"input",undefined,["type=text","name=TextDescript"]);
		  addElement(div1,"br");
		  addElement(div1,"button","Create Project",["type=submit","name=CrearProyecto", "onclick=ComprobarAction()"]);
		  var SelectOwner= document.querySelector("Select[name=Owner]");
		  var SelectMaster= document.querySelector("Select[name=Master]");
		  var SelectGrupo= document.querySelector("Select[name=Grupo]");
		  addElement(SelectOwner,"option","--",undefined);
		  addElement(SelectMaster,"option","--",undefined);
		  addElement(SelectGrupo,"option","--",undefined);
		  optionGrupo();
  		  PasarOption();
	      ElementosOcultos();
		}
		    
	</script>
</form>
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

	 <script type="text/javascript">
	 	if(tipo=="1"){
	 		var construirInput= document.querySelector("input[name=ButtonCreate]");
      		construirInput.addEventListener("click",GenerarForm);
      	}
    </script>
	 <script type="text/javascript">
	 /*	var NombreCom= false;
	 	var SprintCom=false;
	 	var MasterCom=false;
	 	var OwnerCom=false;*/
	 	if(tipo=="1"){
	 		var construirInput= document.querySelector("input[name=ButtonCreate]");
      		construirInput.addEventListener("click",GenerarForm);
      	}
    </script>
</html>