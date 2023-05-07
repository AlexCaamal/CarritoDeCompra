<?php
  include '../includes/conexion.php';
  $id=$_POST['id'];
  $name = $_POST['producto'];
  $descripcion = $_POST['descripcion'];
  $cantidad = $_POST['cantidad'];
  $precio = $_POST['precio'];
  $estado = $_POST['status'];
   $image = $_POST['inputGroupFile04'];

  $query ="UPDATE productos SET nombre='$name', description='$descripcion', stock='$cantidad', Precio='$precio', Estado='$estado', imagen='$image' WHERE id_producto='$id'";

if(mysqli_query($conn, $query)){
	    echo "<script> 
    alert('Se Actualizo correctamente!'); 
    window.location = '../src/webAdmin/dashboard.php'; 
    </script>";  
} else{
    echo "<script>
    alert('Fallo al Actualizar. Verifique...');  
    window.location = '../src/webAdmin/add_Products.php';
    </script>";  
}
?>