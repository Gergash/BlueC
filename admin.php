<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index1.php");
}elseif ($_SESSION['rol']==2) {
	header("Location:index.php");
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>BlueC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<!-- ... -->
	<link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
<body data-offset="40" background="images/fondotot.jpg" style="background-attachment: fixed">
<div class="container">
<header class="header">
<div class="row">
	
</div>
</header>

  <!-- Navbar
    ================================================== -->

<div class="navbar">
  <div class="navbar-inner">
	<div class="container">
	  <div class="nav-collapse">
		<ul class="nav">
			<li class=""><a href="admin.php">ADMINISTRADOR DEL SITIO</a></li>
			 
	
		</ul>
		<form action="#" class="navbar-search form-inline" style="margin-top:6px">
		
		</form>
		<ul class="nav pull-right">
		<li><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a></li>
			  <li><a href="desconectar.php"> Cerrar Cesión </a></li>
			 		 
		</ul>
	  </div><!-- /.nav-collapse -->
	</div>
  </div><!-- /navbar-inner -->
</div>

<!-- ======================================================================================================================== -->
<div class="row">
	
	
		
	<div class="span12">

		<div class="caption">
		
<!--///////////////////////////////////////////////////Empieza cuerpo del documento interno////////////////////////////////////////////-->
		<h2> Administración de usuarios registrados</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Tabla de Usuarios</h4>
		<div class="row-fluid">
		



			<?php

				require("connect_db.php");
				$sql=("SELECT * FROM login");
	
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				$query=mysqli_query($mysqli,$sql);

				echo "<table border='1'; class='table table-hover';>";
					echo "<tr class='warning'>";
						echo "<td>Id</td>";
						echo "<td>Usaurio</td>";
						echo "<td>TI</td>";
						echo "<td>Correo</td>";
						echo "<td>Falta del estudiante</td>";
						echo "<td>fecha de la falta</td>";
						echo "<td>Editar</td>";
						echo "<td>Borrar</td>";
					echo "</tr>";

			    
			?>
			  
			<?php 
				 while($arreglo=mysqli_fetch_array($query)){
				  	echo "<tr class='success'>";
				    	echo "<td>$arreglo[0]</td>";
				    	echo "<td>$arreglo[1]</td>";
				    	echo "<td>$arreglo[2]</td>";
				    	echo "<td>$arreglo[3]</td>";
				    	echo "<td>$arreglo[4]</td>";
				    	echo "<td>$arreglo[5]</td>";

				    	echo "<td><a href='actualizar.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";
						echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='images/eliminar.png' class='img-rounded'/></a></td>";
						

						
					echo "</tr>";
				}

				echo "</table>";

					extract($_GET);
					if(@$idborrar==2){
		
						$sqlborrar="DELETE FROM login WHERE id=$id";
						$resborrar=mysqli_query($mysqli,$sqlborrar);
						echo '<script>alert("REGISTRO ELIMINADO")</script> ';
						//header('Location: proyectos.php');
						echo "<script>location.href='admin.php'</script>";
					}

			?>
			
				  
			  			  
			  
		
		
		<div class="span8">
		
		</div>	
		</div>	
		<br/>
		


		
		
		 <!-- formulario registro -->

	<form method="post" action="" >
	<fieldset>
		<div>
		<legend class="legend" ><b>Registro</b></legend>
		<div class="form-group">
		<label class="labels"><b>Nombre del estudiante</b></label>
		<input class="inputs"  type="text" name="realname" class="form-control"/>
		</div>
		<div class="form-group">
		<label class="labels"><b>Email del padre del estudiante</b></label>
		<input class="inputs" type="text" name="nick" class="form-control"/>
		</div>
		<div class="form-group">
		<label class="labels"><b>Tarjeta de identidad del usuario</b></label>
		<input class="inputs" type="password" name="pass" class="form-control"/>
		</div>
		<div class="form-group">
		<label class="labels" ><b>Repita la tarjeta de identidad</b></label>
		<input class="inputs" type="password" name="rpass" class="form-control"/>
		</div>
		<div class="form-group">
		<label class="labels" ><b>fecha de la falta</b></label>
		<input class="inputs" type="date" name="Dat" class="form-control"/>
		</div>
		<div class="form-group">
		<label class="labels" ><b>describa la falta</b></label>
		<textarea class="inputs form-control" type="text" name="falt" rows="10" cols="20">
		</textarea>
		</div>
		</div>
    <div>
		<input  class="btn btn-primary" type="submit" name="submit" value="Registrar"/>
	</div>
	</fieldset>
	</form>
	</div>
	<?php
			if(isset($_POST['submit'])){
				require("registro.php");
			}
	?>
	<!--Fin formulario registro -->



		
		
		</div>

		


		

<!--///////////////////////////////////////////////////Termina cuerpo del documento interno////////////////////////////////////////////-->
</div>

	</div>
</div>
<!-- Footer
      ================================================== -->
<hr class="soften"/>
<footer class="footer">

<hr class="soften"/>

 </footer>
</div><!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</style>
  </body>
</html>