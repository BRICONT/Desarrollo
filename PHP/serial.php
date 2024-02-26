<?php

include "../conexion/conexion.php";

function generarClave($longitud)
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $clave = '';
    for (
        $i = 0;
        $i < $longitud;
        $i++
    ) {
        $clave .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $clave;
}
$claveGenerada = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Generar la clave 
    $claveGenerada = generarClave(25);
} ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Claves</title>
</head>

<body>
    <h1>Generador de Claves</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="generar" value="Generar Clave">
        <br><br>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
            <p>Clave generada: <?php echo $claveGenerada; ?></p>
            <button type="submit" name="guardar" value="<?php echo $claveGenerada; ?>">Guardar Clave</button>
            <button type="submit" name="noGuardar" value="">No Guardar Clave</button>
        <?php endif; ?>
    </form>

    <?php
    // Si se presionó el botón de guardar la clave
    if (isset($_POST['guardar'])) {
        $nuevaClave = $_POST['guardar'];
        // Insertar la clave en la tabla
        $sql = "INSERT INTO tabla_claves (numero) VALUES ('$nuevaClave')";

        if ($conexion->query($sql) === TRUE) {
            echo "Clave guardada correctamente en la base de datos.";
        } else {
            echo "Error al guardar la clave: " . $conexion->error;
        }
    }

    // Si se presionó el botón de no guardar la clave
    if (isset($_POST['noGuardar'])) {
        echo "Clave no guardada.";
    }

    // Cerrar conexión
    $conexion->close();
    ?>
</body>

</html>