<?php

	$realname=$_POST['realname']; //variables de recoleccion de datos para db en php
	$mail=$_POST['nick'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];
	$Dat=$_POST['Dat'];
	$falt=$_POST['falt'];
 //intercambio de variables para insercion de un nuevo campo en la tabla
	require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$mail'");
	$check_mail=mysqli_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Email ya registrado");</script>';
			}else{
				
				//require("connect_db.php");
//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
				mysqli_query($mysqli,"INSERT INTO login VALUES('','$realname','$pass','$mail','$falt','$Dat','2')"); 
				//echo 'Se ha registrado con exito';
				echo "<script language='javascript'>alert('Estudiante registrado');</script>";
				
			}
			//Tuvo ERROR internal 500 
		}else{
			//mensaje echo presentaba error de comillas
			echo "Las contraseñas son incorrectas";
		}
 
	
?>