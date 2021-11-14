<?php
//include("connect_db.php");

//$miconexion = new connect_db;

//ERROR variable User <--false null autentication-->
session_start();
	require("connect_db.php");

	$username=$_POST['mail'];
	$pass=$_POST['pass'];


	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$username'");
	if($f2=mysqli_fetch_assoc($sql2)){
		if($pass==$f2['pasadmin']){
			$_SESSION['id']=$f2['id'];
			$_SESSION['user']=$f2['user'];
			$_SESSION['rol']=$f2['rol'];
   //el GET antes de POST tenia imcopatibilidad en el archivo debido a codigo viejo
			echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script>';
			echo "<script>location.href='admin.php'</script>";
		
		}
	}
