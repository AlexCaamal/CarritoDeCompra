<?php
  include '../includes/conexion.php';
  $id = $_GET['idProducts'];
  $iduser = $_GET['idUser'];
$cant = $_GET['cantidad'];
  date_default_timezone_set('America/Costa_Rica');
  $fechaHoy = date("Y-m-d");

  $query ="DELETE FROM  carrito WHERE id_producto = '$id' and id_usuario='$iduser' and fechaIngreso='$fechaHoy'";

  

if(mysqli_query($conn, $query)){
    $stockProducts ="UPDATE productos SET stock = (stock + '$cant') WHERE id_producto = '$id' ";
    mysqli_query($conn, $stockProducts);
	echo "<script> 
    alert('Se elimino correctamente!'); 
    window.location = '../src/webClient/carrito.php'; 
    </script>";  
} else{
    echo "<script>
    alert('Fallo al eliminar. Verifique...');  
    window.location = '../src/webClient/carrito.php';
    </script>";  
  
}
?>