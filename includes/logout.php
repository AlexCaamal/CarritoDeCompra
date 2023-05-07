<?php
    session_start();
	session_destroy();
	$user = $_GET['user'];

	if($user == 'Admin'){
		header("location: ./../src/webAdmin/login.php");
	}else if ($user == 'Client'){
		header("location: ./../login.php");
	}

	
?>