<?php
  include '../includes/conexion.php';
  $idUser = $_POST['idUser'];
  $idProduct =  $_POST['idProducto'];
  $cant = $_POST['cantidad'];
  $stockProduc=""; 
  

 $Products ="SELECT stock FROM productos WHERE id_producto='$idProduct'";
 $result = mysqli_query($conn,$Products);
  while($row = mysqli_fetch_array($result)){
	$stockProduc = $row['stock'];
}

if($stockProduc<$cant){
  echo "<script>
    alert('Stock Insuficiente. Verifique...');  
    window.location = '../src/webClient/dashboard.php';
    </script>";  
  
}else if($stockProduc>=$cant){
    $query ="INSERT INTO carrito (id_usuario, stock, id_producto) values('$idUser', '$cant','$idProduct')";
    if(mysqli_query($conn, $query)){
        $quitarStock ="UPDATE productos SET stock = stock - '$cant' WHERE id_producto='$idProduct'";
        mysqli_query($conn, $quitarStock);
      
        echo "<script> 
        alert('Se agrego al Carrito correctamente!'); 
        window.location = '../src/webClient/dashboard.php';
        </script>";  
    } else{
        echo "<script>
        alert('Fallo al agregar. Verifique...');  
        window.location = '../src/webClient/dashboard.php';
        </script>";  
    }
}

?>