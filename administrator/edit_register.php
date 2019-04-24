<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../styles/add_new_register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).on('click', '#editar', function(){
            var data = {
              name: $("#name").val(),
              description: $("#description").val(),
              value: $("#value").val(),
              id: $("#id").val()
            }
            $.post('../administrator/save_edit_register.php', data)
            .done(function(respuesta){
              var success = 'success_edit';
              window.location.href = '../administrator/view_register.php?status='+success;
            });
          });
      });
    </script>
  </head>
  <?php
    $id_register = $_GET['id']; 
    require '../connect/connect.php';
    $sql = $connect->prepare("SELECT * FROM goods where id_good = ?");
    $sql->bind_param('i', $id_register);
    $sql->execute();
    $result = $sql->get_result();
    $fetch=$result->fetch_assoc();
  ?>
  <body style="background-color: #00bfff;">
    <div class="container" style="position: relative; top: 10px;" align="center">
      <div class="container-body-primary" align="center" style="position: relative; top: 100px;">
        <div class="container-body" style="width: 40%;">
          <form>
            <div class="titlecontainer">
              <h1>Editar registro</h1>
            </div>
            <div class="container">
              <input type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
              <label for="Usuario"><b>Nombre</b></label>
              <input type="text" placeholder="Ingresar el nombre" name="name" id="name" required value="<?php echo $fetch['name']; ?>">
              <label for="Password"><b>Descripción</b></label>
              <input type="text" placeholder="Ingresar la descripción" name="description" id="description" required value="<?php echo $fetch['description']; ?>">
              <label for="Password"><b>Valor</b></label>
              <input type="number" placeholder="Ingresar el valor" name="value" id="value" required value="<?php echo $fetch['value']; ?>">
              <button type="button" id="editar">Editar</button>
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