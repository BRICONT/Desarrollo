<?php

include 'conexion/conexion_be.php';

$nombres_completos = $_POST['nombres_completos'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena =  $_POST['contrasena'];
//validacion de campos vacios 
if ($nombres_completos != '' and $correo != '' and $contrasena != '' and $usuario != '') {
    //encriptamiento de contraseña
    $contrasena = hash('sha512', $contrasena);

    $query = "INSERT INTO usuarios(nombres_completos, correo, usuario, contrasena) 
          VALUES ('$nombres_completos', '$correo', '$usuario', '$contrasena' )";
    //verificar que el correo no se repita en la base de datos

    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE
           correo='$correo'");
    if (mysqli_num_rows($verificar_correo) > 0) {
        echo '
            <script>
               alert("Este correo ya esta en uso, intente con otro men");
               window.location = "../prueba.php";
            </script>
            ';
        //exit();
    }

    //verificare que el usuario no se repita en la base de datos

    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario ='$usuario'");
    if (mysqli_num_rows($verificar_usuario) > 0) {
        echo '
           <script>
              alert("Este usuario ya esta en uso, intente con otro men");
              window.location = "prueba.php";
           </script>
           ';
        // exit();
    }
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo '
    <script>
         alert("Usuario almacenado exitosamente");
         window.location = "prueba.php";       
    </script>
    ';
    } else {
        echo '
    <script>
         alert("Usuario no almacenado intentalo de muevo");
         window.location = "prueba.php";
    </script>
    ';
    }

    mysqli_close($conexion);
} else {
    echo '
    <script>
         alert("no s epermiten campos vacios");
         window.location = "prueba.php";
    </script>
    ';
}
