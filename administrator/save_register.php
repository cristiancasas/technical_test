<?php 
    require '../connect/connect.php';
    $id_user = $_REQUEST['id_user'];
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $value = $_REQUEST['value'];
    $sql = $connect->prepare("INSERT INTO goods(id_user, name, description, value)VALUES(?, ?, ?, ?)");
    $sql->bind_param('isss', $id_user, $name, $description, $value);
    $sql->execute();
?>