<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../styles/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).on('click', '#loguear', function(){
            var data = {
              username: $("#username").val(),
              password: $("#password").val(),
            }
            $.post('session.php', data)
            .done(function(respuesta){
              if(respuesta == 1){
                window.location.href = '../administrator/view_register.php';
              }else{
                alert("credenciales incorrectas");
              }
            });
          });
      });
    </script>
  </head>
  <body>
    <div class="container-body-primary" align="center" style="position: relative; top: 100px;">
      <div class="container-body" style="width: 40%;">
        <form>
          <div class="titlecontainer">
            <h1>Iniciar sesión</h1>
          </div>
          <div class="container">
            <label for="Usuario"><b>Usuario</b></label>
            <input type="text" placeholder="Ingresar el usuario" name="username" id="username" required>
            <label for="Password"><b>Contraseña</b></label>
            <input type="password" placeholder="Ingresar la contraseña" name="password" id="password" required>
            <button type="button" id="loguear">Iniciar sesión</button>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button"  class="cancelbtn">Cancel</button>
          </div>
        </form> 
      </div>
    </div>
  </body>
</html>
 