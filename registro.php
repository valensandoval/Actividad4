<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="usuarios";
$db_table_name="cliente";

//Conexión por procedimientos
$db_connection = mysqli_connect($db_host, $db_user, $db_password);
 
if (!$db_connection) { 
	die('No se ha podido conectar a la base de datos');
} 

$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);
$subs_pass = utf8_decode($_POST['password']);
$resultado=mysqli_query($db_connection, "SELECT * FROM ". $db_name . '.'.$db_table_name." WHERE Email = '".$subs_email."'");
 
if (mysqli_num_rows($resultado)>0)
{
 
header('Location: Fail.html');
 
} else {
	
	$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombre` , `apellido` , `email` , `password`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '", "' . $subs_pass . '")';
 
mysqli_select_db($db_connection, $db_name);
$retry_value = mysqli_query($db_connection, $insert_value);
if (!$retry_value) {
   die('Error: ' . mysqli_error());
}
	
header('Location: Success.html');
}
 
mysqli_close($db_connection);
?>