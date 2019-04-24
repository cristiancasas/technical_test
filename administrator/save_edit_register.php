<?php 
    require '../connect/connect.php';
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $value = $_REQUEST['value'];
    $id = $_REQUEST['id'];
    $sql = $connect->prepare("UPDATE goods SET name = ?, description = ?, value = ? WHERE id_good = ?");
    $sql->bind_param('sssi', $name, $description, $value, $id);
    $sql->execute();
?>