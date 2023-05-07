<?php
  include '../includes/conexion.php';
  $IdUser = $_GET['idUser'];
  date_default_timezone_set('America/Costa_Rica');
  $fechaHoy = date("Y-m-d");


  $querySearchProducts ="SELECT id_producto, sum(stock) as stock FROM  carrito WHERE id_usuario = '$IdUser' and fechaIngreso = '$fechaHoy' group by id_producto";
  $result = mysqli_query($conn,$querySearchProducts);
  while($row = mysqli_fetch_array($result)){
    $cant = $row['stock'];
    $idProduct = $row['id_producto'];
    $queryUpdateProducts ="UPDATE productos SET stock = (stock + '$cant') WHERE id_producto = '$idProduct'";
    mysqli_query($conn, $queryUpdateProducts);
  }
  
  $query ="DELETE FROM  carrito WHERE id_usuario = '$IdUser' and fechaIngreso = '$fechaHoy'";

if(mysqli_query($conn, $query)){
	    echo "<script> 
    alert('Se Vacio el Carrito correctamente!'); 
    window.location = '../src/webClient/carrito.php'; 
    </script>";  
} else{
    echo "<script>
    alert('Fallo al Vaciar el Carrito. Verifique...');  
    window.location = '../src/webClient/carrito.php';
    </script>";  
  
}
?>