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
						var id = <?php= $registre["Id"]?>;
						var nombre = '<?php= $registre["Nombre"]?>';
						var sprints = <?php= $registre["Sprints"]?>;
						var po = <?php= $registre["PO"]?>;
						var sm = <?php= $registre["SM"]?>;
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
		<div  id="error" class="animacion2" style="display: none">
		</div>
	</div>
	




	<div id="formulario">
		<form>
			
		</form>
	</div>

</body>
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
				boton.setAttribute("onclick","DeshabButton");
				boton.setAttribute("class","ubicar");
				cuerpo.appendChild(boton);
			}
		}
		botonFormulario();
	</script>
</html>