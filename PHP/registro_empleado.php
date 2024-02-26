<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro_empleado</title>
  <link rel="stylesheet" href="css/Registro_empleado.css">
</head>

<body>
  <form class="login-form">
    <h3 style="color: red;">hola aqui se registran los usuarios que seran autorizados para poder crear una cuenta</h3>

    <p class="login-text">
      <span class="fa-stack fa-lg">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-lock fa-stack-1x"></i>
      </span>
    </p>
    <input type="number" class="login-username" autofocus="true" required="true" placeholder="Documento" />

    <label for="cargo">Cargo:</label>
    <select id="cargo" class="login-username" autofocus="true" required="true">
      <option value="" disabled selected>Selecciona un cargo</option>
      <option value="granjero">Granjero</option>
      <option value="cocinero">Cocinero</option>
      <option value="concerje">Conserje</option>
    </select>

    <label for="rol">Rol:</label>
    <select id="rol" class="login-password" required="true">
      <option value="" disabled selected>Selecciona un rol</option>
      <option value="admin">Administrador</option>
      <option value="empleado">Empleado</option>
      <option value="desarrollador">Desarrollador</option>
    </select>

    <button class="login-submit">Registrar</button>
  </form>
  <div class="underlay-photo"></div>
  <div class="underlay-black"></div>
</body>

</html>