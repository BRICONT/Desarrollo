<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Inserción de Roles</title>
</head>
<body>

<h2>Insertar Nuevo Estado</h2>

<form action="estados.php" method="post">
    Estado:<br>
    <input type="text" name="tp_estado"><br>
    
    
    <input type="submit" value="Insertar Estado">
</form>

<?php
// Archivo de conexión a la base de datos
include '../conexion/db.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor del campo 'tp_usuarios' del formulario
    $tp_estado = $_POST['tp_estado'];
    

    // Preparar la consulta SQL para insertar un nuevo registro en la tabla 'roles'
     $sql = "INSERT INTO estado (Estado) VALUES ('$tp_estado')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo rol insertado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

</body>
</html>
