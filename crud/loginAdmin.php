<?php
  include '../includes/conexion.php';
  $user = $_POST['usuario'];
  $password = $_POST['password'];
  $success = false;
  
$query ="SELECT*FROM user WHERE Usuario='$user' AND password='$password'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
	$success = true;
	$user_id = $row['id'];
	$user_firstname = $row['nombre'];
}

if($success == true){
	session_start();
	$_SESSION['admin_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['user_firstname'] = $user_firstname;
	header("location: ../src/webAdmin/dashboard.php");
} else{
    echo "<script>
    alert('Usuario y/o Contraseña Incorrectas. Verifique...');  
    window.location = '../src/webAdmin/login.php';
    </script>";  
  
}
  
?>