<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Editar Registro</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="group">
        <form action="index.php" method="POST">
            <h2><em>Formulario de Edición</em></h2>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <label for="nombre">Nombre <span><em>(requerido)</em></span></label>
            <input type="text" name="nombre" class="form-input" required value="<?php echo $_GET['nombre']; ?>"/>
            <label for="apellido">Apellido <span><em>(requerido)</em></span></label>
            <input type="text" name="apellido" class="form-input" required value="<?php echo $_GET['apellido']; ?>"/>
            <label for="email">Email <span><em>(requerido)</em></span></label>
            <input type="email" name="email" class="form-input" value="<?php echo $_GET['email']; ?>"/>
            <center>
                <input class="form-btn" name="actualizar" type="submit" value="Actualizar" />
            </center>
        </form>
    </div>
</body>
</html>
