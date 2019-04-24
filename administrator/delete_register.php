<?php 
    require '../connect/connect.php';
    $id = $_REQUEST['id'];
    $sql = $connect->prepare("DELETE FROM goods WHERE id_good = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
?>