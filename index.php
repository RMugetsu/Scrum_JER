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
			<img src="img/usuario.png" id="imgUsuario">
			<?php echo "<label>Usuario: ".$_SESSION['Nombre']."</label>";?>
		</div>
		<div id="session">
			<a href="logout.php"><img src="img/cerrar.png" id="imgCerrar"></a>
		</div>
	</div>
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