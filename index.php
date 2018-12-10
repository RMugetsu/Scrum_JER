<!DOCTYPE html>
<html>
<head>
	<title>Vista Projectos</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript">
		var proyects = [];
	</script>
	<script type="text/javascript" src="script/script.js" defer></script>
</head>
<body>
	<?
		$con = mysqli_connect('localhost','root','');
		mysqli_select_db($con, 'test');
		$consulta = "SELECT Id, Nombre, NumSprint as Sprints, PO_Id as PO, SM_Id as SM FROM proyecto";
		$resultat = mysqli_query($con, $consulta);
			while($registre = mysqli_fetch_assoc($resultat))
 				{
 					print_r($registre);
 					?><script type="text/javascript">
						var id = <?= $registre["Id"]?>;
						var nombre = '<?= $registre["Nombre"]?>';
						var sprints = <?= $registre["Sprints"]?>;
						var po = <?= $registre["PO"]?>;
						var sm = <?= $registre["SM"]?>;
						var proyecto = [id,nombre,sprints,po,sm];
						proyects.push(proyecto);
					</script>
					<?
 				}
	?>
	<div class="row">
		<div class="col m10">
			Adios
		</div>
		<div class="col m2">
			hola
		</div>
	</div>
	<div class="row"></div>
	<div id="hola"></div>
	<div class="row">
		<div class="col m1">
		</div>
		<div class="col m7" id="grid">
		</div>
		<div class="col m3" id="error">
		</div>
	</div>
	<div id="hola"></div>
	<div class="row">
		<div class="col m1"></div>
		<div class="colm7">
			<button onclick="pruebagenerador()">Crear Projecto</button>
		</div>
	</div>
	<div id="hola"></div>
	<div id="hola"></div>
	<div id="hola"></div>
	<div class="row">
		<div class="col m1"></div>
		<div class="colm7">
			<button onclick="generarError()">Formulario Oculto</button>
		</div>
	</div>
</body>
	<script type="text/javascript">
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
			element.appendChild(contenido);
			contenedor.appendChild(element);
			contenedor.appendChild(salto);
		}
	}
	generarProyectos()

	</script>
</html>