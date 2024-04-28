<?php
include '../includes/conexion.php';

if (isset($_POST['btnPagar'])) {
  $direccion = $_POST['direccion'];
  $idUser = $_POST['id'];
  $metodoPago = $_POST['metodo'];
  $numTarjeta = $_POST['numTarjeta'];
  $cvv = $_POST['cvv'];
  $titular = $_POST['titular'];
}

$ubicacion = "SELECT * FROM Ubicacion_Usuario
  WHERE Estado='Activo' and Id_Usuario = '$idUser'";

$ubicacionResult = mysqli_query($conn, $ubicacion);

if ($ubicacionResult) { // Aquí debería ser $ubicacionResult en lugar de $results
  while ($rowUbicacion = mysqli_fetch_assoc($ubicacionResult)) {
    $ubicacionResponse = $rowUbicacion['Ubicacion'];
  }
}

if ($ubicacionResponse == null || $ubicacionResponse == '') {

  $insertarDireccion = "INSERT INTO Ubicacion_Usuario (Id_Usuario, Ubicacion, Estado) VALUES ('$idUser', '$direccion','Activo')";
  $resultsDireccion = mysqli_query($conn, $insertarDireccion);

  if ($resultsDireccion) {
  } else {
    echo "<script>
        alert('Fallo al Registrar la Dirección. Verifique...');  
        window.location = '../src/webClient/metodo-pago.php';
        </script>";
    return;
  }
} else {
  $updateDireccion = "Update Ubicacion_Usuario set Ubicacion = '$direccion' where Id_Usuario = '$idUser'";
  $resultsDireccion = mysqli_query($conn, $updateDireccion);

  if ($resultsDireccion) {
  } else {
    echo "<script>
        alert('Fallo al Actualizar la Dirección. Verifique...');  
        window.location = '../src/webClient/metodo-pago.php';
        </script>";
    return;
  }
}
///////////////////////////////////////////////////////////////////// FORMA PAGO

if ($metodoPago > 2) {
  $formaPagoResponse = '';

  if (strlen($cvv) > 3) {
    echo "<script>
        alert('El CVV solo debe tener 3 digitos. Verifique...');  
        window.location = '../src/webClient/metodo-pago.php';
        </script>";
    return;
  }else if(!preg_match('/^[0-9]+$/', $cvv)){
    echo "<script>
        alert('El CVV solo debe ser númericos. Verifique...');  
        window.location = '../src/webClient/metodo-pago.php';
        </script>";
    return;
  } else if(!preg_match('/^[0-9]+$/', $numTarjeta)){
    echo "<script>
        alert('El Número de Tarjeta solo debe ser númericos. Verifique...');  
        window.location = '../src/webClient/metodo-pago.php';
        </script>";
    return;
  }else if(strlen($numTarjeta) > 16){
    echo "<script>
        alert('El Número de Tarjeta solo debe tener 16 digitos. Verifique...');  
        window.location = '../src/webClient/metodo-pago.php';
        </script>";
    return;
  }

  $formaPago = "SELECT * FROM Tarjetas_Usuarios
  WHERE Estado='Activo' and id_Usuario = '$idUser' and id_forma_pago = '$metodoPago'";

  $formaPagoResult = mysqli_query($conn, $formaPago);

  if ($formaPagoResult) { // Aquí debería ser $ubicacionResult en lugar de $results
    while ($rowFormaPago = mysqli_fetch_assoc($formaPagoResult)) {
      $formaPagoResponse = $rowFormaPago['Numero_tarjeta'];
    }
  }

  if ($formaPagoResponse == null || $formaPagoResponse == '') {

    $insertarTarjeta = "INSERT INTO Tarjetas_Usuarios (id_usuario, id_forma_pago, Numero_tarjeta, cvv, Titular) VALUES ('$idUser', '$metodoPago','$numTarjeta', '$cvv', '$titular')";
    $resultsFormaPago = mysqli_query($conn, $insertarTarjeta);

    if ($resultsFormaPago) {
    } else {
      echo "<script>
        alert('Fallo al Registrar el Metodo de Pago. Verifique...');  
        window.location = '../src/webClient/metodo-pago.php';
        </script>";
      return;
    }
  } else {
    $updateFormaPago = "Update Tarjetas_Usuarios set Ubicacion = '$direccion', id_forma_pago = '$metodoPago', Numero_tarjeta= '$numTarjeta', cvv= '$cvv', Titular = '$metodoPago' where Id_Usuario = '$idUser' and id_forma_pago = '$metodoPago'";
    $resultsFormaPago = mysqli_query($conn, $updateFormaPago);

    if ($resultsFormaPago) {
    } else {
      echo "<script>
        alert('Fallo al Actualizar el Metodo de Pago. Verifique...');  
        window.location = '../src/webClient/metodo-pago.php';
        </script>";
      return;
    }
  }
}



date_default_timezone_set('America/Costa_Rica');
$fechaHoy = date("Y-m-d");

$products = "SELECT ca.id_producto, sum(ca.stock) as stock, sum(ca.stock*pro.Precio) as total 
FROM  carrito ca 
INNER JOIN productos pro on ca.id_producto = pro.id_producto
WHERE id_usuario = '$idUser' and fechaIngreso = '$fechaHoy' group by id_producto";
$results = mysqli_query($conn, $products);
while ($row = mysqli_fetch_array($results)) {
  $stockProduc = $row['stock'];
  $idProduct = $row['id_producto'];
  $total = $row['total'];
  $buys = "INSERT INTO compras (id_usuario, id_producto, cantidad, precio, id_forma_pago) VALUES ('$idUser', '$idProduct','$stockProduc', '$total', '$metodoPago')";
  mysqli_query($conn, $buys);
}




if (mysqli_query($conn, $products)) {
  $quitarStock = "UPDATE carrito SET Estado = 'Pagado' WHERE id_usuario='$idUser' and Estado='Activo'";
  mysqli_query($conn, $quitarStock);

  echo "<script> 
        alert('Se Genero el pago correctamente!'); 
        window.location = '../src/webClient/dashboard.php';
        </script>";
} else {
  echo "<script>
        alert('Fallo pagar. Verifique...');  
       window.location = '../src/webClient/dashboard.php';
        </script>";
}
