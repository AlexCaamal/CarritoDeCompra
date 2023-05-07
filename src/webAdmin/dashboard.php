<?php
  include('./../../includes/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <?php
      include("./../../includes/head.php");
?>

    <link rel="stylesheet" href="./../../css/main.css">
</head>



<body>
    <div class="wrapper">
        <?php
      include("./../../includes/headerAdmin.php");
?>
        <main>
            <h2 class="titulo-principal">Todos los productos</h2>
            <div class="btn-add-products">
                <a href="./add_Products.php" type="button" class=" btn btn-outline-success">Añadir Nuevo producto</a>
            </div>
            <?php
               $productQueyr = mysqli_query($conn,"SELECT*FROM productos");
            ?>

            <br>
            <table class="table table-success table-striped">
                <tr class="bg-gray-100 border-b-2 border-gray-200 p-2 text-center">
                    <th class="p-2">ID Venta</th>
                    <th class="p-2">Producto</th>
                    <th class="p-2">Descripción</th>
                    <th class="p-2">Stock</th>
                    <th class="p-2">Precio</th>
                    <th class="p-2">Estado</th>
                    <th class="p-2">Imagen</th>
                    <th class="w-1/5 p-2">Operaciones</th>
                </tr>
                <?php
		while($row = $productQueyr->fetch_assoc()) {
			echo'<tr style="font-size: 25px;"class="text-center">';
				echo'<td class="bg-white p-2">'.$row["id_producto"].'</td>';
				echo'<td class="bg-white p-2">'.$row["nombre"].'</td>';
				echo'<td class="bg-white p-2">'.$row["description"].'</td>';
				echo'<td class="bg-white p-2">'.$row["stock"].'</td>';
				echo'<td class="bg-white p-2">'.$row["Precio"].'</td>';
				echo'<td class="bg-white p-2">'.$row["Estado"].'</td>';
                echo'<td class="bg-white p-2"><img class="carrito-producto-imagen" src="./../../img/'.$row['imagen'].'" alt="">'.'</td>';
                echo'<td class="bg-white p-2">
                    <a href="./plus_Products.php?idProducts='.$row["id_producto"].'">
                        <ion-icon name="add-circle-sharp"></ion-icon>
                    </a>
                    <a href="./edit_Products.php?idProducts='.$row["id_producto"].'">
                        <ion-icon name="create-outline"></ion-icon>
                    </a>
                    <a class="carrito-producto-eliminar" href="./../../crud/DeleteProducts.php?idProducts='.$row["id_producto"].'">
                        <i class="bi bi-trash3-fill"></i></ion-icon></a>

                </td>';
                echo '</tr>';

                }
                ?>
            </table>

        </main>

    </div>
    <?php
      include("./../../includes/foother.php");
    ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>