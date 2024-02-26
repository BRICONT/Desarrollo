<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Inserción de Roles</title>
</head>
<body>

<h2>Insertar Valor de la hora extra</h2>

<form action="vhe.php" method="post">
    Valor de hora extra:<br>
    <input type="number" name="v_h_extra"><br>
  
    
    <input type="submit" value="Insertar Valor">
</form>

<?php
// Archivo de conexión a la base de datos
include '../conexion/db.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor del campo 'tp_usuarios' del formulario
    $v_h_extra = $_POST['v_h_extra'];
    

    // Preparar la consulta SQL para insertar un nuevo registro en la tabla 'roles'
     $sql = "INSERT INTO v_h_extra (v_h_extra) VALUES ($v_h_extra)";

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
