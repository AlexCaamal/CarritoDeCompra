<?php
  include '../includes/conexion.php';
  $id = $_GET['idProducts'];

  $query ="DELETE FROM  productos WHERE id_producto = '$id'";

if(mysqli_query($conn, $query)){
	    echo "<script> 
    alert('Se elimino correctamente!'); 
    window.location = '../src/webAdmin/dashboard.php'; 
    </script>";  
} else{
    echo "<script>
    alert('Fallo al eliminar. Verifique...');  
    window.location = '../src/webAdmin/dashboard.php';
    </script>";  
  
}
?>