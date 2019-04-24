<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../styles/view_register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $(document).on('click', '#add_new_register', function(){
            window.location.href = '../administrator/add_new_register.php';
          });

          $(document).on('click', '#edit_register', function(){
            var element = $(this);
            var id_register = element.attr('data-id');
            window.location.href = "../administrator/edit_register.php?id="+id_register;
          });

          $(document).on('click', '#delete_register', function(){
            var element = $(this);
            var data = {
              id: element.attr('data-id')
            }
            $.post('delete_register.php', data)
            .done(function(respuesta){
              var success = 'success_delete';
              window.location.href = '../administrator/view_register.php?status='+success;
            });
          });
          $(document).on('click', '#close_session', function(){
            $.post('../logout/logout.php')
            .done(function(respuesta){
              window.location.href = "../login/login.php";
            })
          });
      });
    </script>
  </head>
  <?php 
    require '../connect/connect.php';
    $sql = $connect->prepare("SELECT * FROM goods");
    $sql->execute();
    $result = $sql->get_result();
    $rows = $result->num_rows;
  ?>
  <body style="background-color: #00bfff;"> 
    <?php  if(isset($_GET) and !empty($_GET) and $_GET['status'] == 'success_add'){ ?>
      <div class="container_width" align="center">
        <div class="container" align="center" style="background-color: green; padding: 10px 0px 10px 0px; width: 70%;">
          <h1 style="font-family: Arial; color: #fff;">Registro guardado con exito</h1>
        </div>
      </div>
    <?php }else if(isset($_GET) and !empty($_GET) and $_GET['status'] == 'success_edit'){ ?>
      <div class="container_width" align="center">
        <div class="container" align="center" style="background-color: orange; padding: 10px 0px 10px 0px; width: 70%;">
          <h1 style="font-family: Arial; color: #fff;">Registro actualizado con exito</h1>
        </div>
      </div>
    <?php }elseif(isset($_GET) and !empty($_GET) and $_GET['status'] == 'success_delete'){ ?>
      <div class="container_width" align="center">
        <div class="container" align="center" style="background-color: red; padding: 10px 0px 10px 0px; width: 70%;">
          <h1 style="font-family: Arial; color: #fff;">Registro eliminado con exito</h1>
        </div>
      </div>
    <?php } ?>
    <br>
    <br>
     <div class="button_close_session" align="center">
      <button type="button" id="close_session" style="padding: 10px; border-radius: 15px; border: 2px red solid;">Cerrar sesión</button>
    </div>
    <div class="container" style="position: relative; top: 90px;" align="center">
      <h1 align="center" style="color: #fefefe; font-size: 45px;">Mis registros</h1>
      <table border=”0″ cellpadding=”0″ cellspacing=”0″ class="tabla" style="width: 70%; align-content: center;">
        <tr>
          <th>Id Registro</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Valor</th> 
          <th colspan="2"><button class="button_add" type="button" id="add_new_register">Agregar nuevo Registro</button></th>
        </tr>
        <?php if($rows > 0){ ?>
          <?php while($fetch=$result->fetch_assoc()){ ?>
            <tr>
              <td><?php echo $fetch['id_good']; ?></td>
              <td><?php echo $fetch['name']; ?></td>
              <td><?php echo $fetch['description']; ?></td>
              <td><?php echo $fetch['value']; ?></td>
              <td><button class="button_edit" data-id="<?php echo $fetch['id_good']; ?>" type="button" id="edit_register">Actualizar</button><button class="button_delete" id="delete_register" data-id="<?php echo $fetch['id_good']; ?>" type="button">Eliminar</button></td>
            </tr>
          <?php } ?>
        <?php }else{ ?>
          <tr>
            <td colspan="6">No hay registros aun</td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </body>
</html>