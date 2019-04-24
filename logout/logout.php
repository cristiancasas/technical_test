<?php 
	session_start();
    require '../connect/connect.php';
    $id_user = $_SESSION['id_user'];
    $sql = $connect->prepare("UPDATE users SET login = 0 WHERE id_user = ?");
    $sql->bind_param('i', $id_user);
    $sql->execute();
    session_destroy();
?>