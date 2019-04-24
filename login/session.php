<?php
	session_start();
	require '../connect/connect.php';
	$user = $_REQUEST['username'];
	$pass = $_REQUEST['password'];
	$sql = $connect->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
	$sql->bind_param('ss', $user, $pass);
	$sql->execute();
	$result = $sql->get_result();
	$fetch=$result->fetch_assoc();
	$rows = $result->num_rows;
	if($rows > 0){
		$_SESSION['id_user'] = $fetch['id_user'];
		$_SESSION['username'] = $fetch['username'];
		$id_user = $fetch['id_user'];
		$sql2 = $connect->prepare("update users set login = 1 WHERE id_user = ?");
		$sql2->bind_param('i', $id_user);
		$sql2->execute();
		echo 1;	
	}else{
		echo 0;
	}	
?>