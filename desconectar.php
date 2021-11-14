<?php 
session_start();
//Utilizacion de la variable session start cambiado de peticion GET a POST
         //    |----------Identificador de usuario en cuestion
         //    |
         //    V 
if($_SESSION['user']){	
	session_destroy();//<!-------metodo destructor de la session actualas de admin
	header("location:index.php");
	//si el usuario usa metodo Destroy para cierre de sesion en modo administrador
	//devolucion a index.php
}
else{
	header("location:index1.php");
	//devolucion a index.php
}
?>