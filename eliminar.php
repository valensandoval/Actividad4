<?php 
if (isset($_POST['eliminar'])) {
    $idCliente = $_POST['id'];

    // Consulta SQL para eliminar el registro
    $eliminar = "DELETE FROM " . $db_name . '.' . $db_table_name . " WHERE idCliente = $idCliente";

    // Ejecutar la consulta
    if (mysqli_query($db_connection, $eliminar)) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($db_connection);
    }
}

 ?>