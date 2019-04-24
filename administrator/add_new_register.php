<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../styles/add_new_register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).on('click', '#registrar', function(){
            var data = {
              id_user: $("#id_user").val(),
              name: $("#name").val(),
              description: $("#description").val(),
              value: $("#value").val()
            }
            $.post('../administrator/save_register.php', data)
            .done(function(respuesta){
              var success = 'success_add';
              window.location.href = '../administrator/view_register.php?status='+success;
            });
          });
      });
    </script>
  </head>
  <?php session_start(); ?>
  <body style="background-color: #00bfff;">
    <div class="container" style="position: relative; top: 10px;" align="center">
      <div class="container-body-primary" align="center" style="position: relative; top: 100px;">
        <div class="container-body" style="width: 40%;">
          <form>
            <div class="titlecontainer">
              <h1>Nuevo registro</h1>
            </div>
            <div class="container">
              <input type="hidden" id="id_user" value="<?php echo $_SESSION['id_user']; ?>" name="">
              <label for="Usuario"><b>Nombre</b></label>
              <input type="text" placeholder="Ingresar el nombre" name="name" id="name" required>
              <label for="Password"><b>Descripción</b></label>
              <input type="text" placeholder="Ingresar la descripción" name="description" id="description" required>
              <label for="Password"><b>Valor</b></label>
              <input type="number" placeholder="Ingresar el valor" name="value" id="value" required>
              <button type="button" id="registrar">Registrar</button>
            </div>
            <div class="container" style="background-color:#f1f1f1">
              <a type="button" href="../administrator/view_register.php" class="cancelbtn">Volver</a>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </body>
</html>