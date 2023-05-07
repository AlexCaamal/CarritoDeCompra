<?php
  include '../includes/conexion.php';
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $user = $_POST['usuario'];
  $password = $_POST['password'];
  
$query ="INSERT INTO clientes (nombre, apellido, usuario, password) values('$nombre', '$apellido','$user', '$password')";

if(mysqli_query($conn, $query)){
	    echo "<script> 
    alert('Se agrego correctamente!'); 
    window.location = '../login.php'; 
    </script>";  
} else{
    echo "<script>
    alert('Fallo al crear cuenta Verifique...');  
    window.location = '../resgistrar.php';
    </script>";  
  
}
  
?>