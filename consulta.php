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

$resultado=mysqli_query($db_connection, "SELECT * FROM ". $db_name . '.'.$db_table_name.);
 
mysqli_close($db_connection);
?>