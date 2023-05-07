<?php
  include '../includes/conexion.php';
  $id=$_GET['idProducts'];
  $cantidad = $_POST['cantidad'];

  $query ="UPDATE productos SET stock= stock + '$cantidad' WHERE id_producto='$id'";

if(mysqli_query($conn, $query)){
	    echo "<script> 
    alert('Se Actualizo Stock correctamente!'); 
    window.location = '../src/webAdmin/dashboard.php'; 
    </script>";  
} else{
    echo "<script>
    alert('Fallo al Actualizar Stock. Verifique...');  
    window.location = '../src/webAdmin/plus_Products.php';
    </script>";  
}
?>