<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario de Registro SCIII</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
<?php
//--------------- Conexión a la base de datos --------------
require("connection.php");

//---------------- Eliminar --------------------------

include("eliminar.php");

//---------------- Actualizar --------------------------

if (isset($_POST['actualizar'])) {
    $idCliente = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    // Consulta SQL para actualizar el registro
    $actualizar = "UPDATE " . $db_name . '.' . $db_table_name . " SET nombre = '$nombre', apellido = '$apellido', email = '$email' WHERE idCliente = $idCliente";

    // Ejecutar la consulta
    if (mysqli_query($db_connection, $actualizar)) {
        echo "Registro actualizado correctamente.";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($db_connection);
    }
}

//-----------------Consulta Base datos --------------------

$resultado = mysqli_query($db_connection, "SELECT * FROM " . $db_name . '.' . $db_table_name);
?>

<div class="group">
    <form action="registro.php" method="POST">
    <h2><em>Formulario de Registro</em></h2>  
         
          <label for="nombre">Nombre <span><em>(requerido)</em></span></label>
          <input type="text" name="nombre" class="form-input" required/>   
          
          <label for="apellido">Apellido <span><em>(requerido)</em></span></label>
          <input type="text" name="apellido" class="form-input" required/>    

          <label for="email">Email <span><em>(requerido)</em></span></label>
          <input type="email" name="email" class="form-input" required/>

          <label for="password">Contraseña <span><em>(requerido)</em></span></label>
          <input type="password" name="password" class="form-input" required/> 
          
         <center> 
            <input class="form-btn" name="submit" type="submit" value="Guardar" />
         </center>
        </p>
    </form>
</div>
<div>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        
    <?php

     while ($fila = $resultado->fetch_assoc()) {
        echo "<tr><td>";
        echo $fila['idCliente']."</td><td>";
        echo $fila['nombre']."</td><td>";
        echo $fila['apellido']."</td><td>";
        echo $fila['email']."</td><td>";
        echo "<form method='POST' action='index.php'>";
        echo "<input type='hidden' name='id' value='" . $fila['idCliente'] . "'>";
        echo "<input type='submit' class='btn btn-danger' name='eliminar' value='Eliminar'>";
        echo "</form></td><td>";
        echo "<form method='GET' action='editar.php'>";
        echo "<input type='hidden' name='id' value='" . $fila['idCliente'] . "'>";
        echo "<input type='hidden' name='nombre' value='" . $fila['nombre'] . "'>";
        echo "<input type='hidden' name='apellido' value='" . $fila['apellido'] . "'>";
        echo "<input type='hidden' name='email' value='" . $fila['email'] . "'>";
        echo "<input type='submit' class='btn btn-warning' name='editar' value='Editar'>";
        echo "</form></td></tr>";        
    }
    mysqli_close($db_connection);
    ?>
    </tbody>
  </table>
</div>
</body>
</html>
