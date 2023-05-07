<?php
  include('./../../includes/conexion.php');
  $id = $_GET['idProducts'];
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
     include("./../../includes/head.php");
?>
    <link rel="stylesheet" href="./../../css/main.css">
</head>

<?php

$query ="SELECT*FROM productos WHERE id_producto ='$id'";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)){
	$name = $row['nombre'];
	$description = $row['description'];
    $cant = $row['stock'];
    $precio = $row['Precio'];
}
  
?>

<body class="text-bg-secondary p-3">
    <div class="container formLogin text-bg-info p-5">
        <div class="alert alert-secondary lb-login" role="alert">
            Aumentar STOCK
        </div>
        <form action=" ./../../crud/plusStock_Products.php?idProducts=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Producto</label>
                <input value="<?php echo  $name; ?>" type="text" class="form-control" id="producto" name="producto"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripción</label>
                <input value="<?php echo  $description; ?>" type="text" class="form-control" id="descripcion"
                    name="descripcion" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                <input value="<?php echo  $cant; ?>" type="number" class="form-control" id="cantidad" name="cantidad">
            </div>
            <br>
            <div class=" mb-3">
                <select class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
                    name="pet" required>
                    <?php 
                            if($cant == 0){
                                echo '<option value="No Disponible">No Disponible</option>';
                            }else if($cant > 0){
                                echo '<option value="Disponible">Disponible</option>';
                                echo '<option value="No Disponible">No Disponible</option>';
                            }
                        ?>">

                </select>
            </div>

            <br>
            <a href="./dashboard.php" type="submit" class="btn btn-outline-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Actualizar Stock</button>

        </form>
    </div>

</body>

</html>