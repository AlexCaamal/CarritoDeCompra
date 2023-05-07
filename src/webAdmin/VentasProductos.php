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
        <aside>
            <header>
                <h1 class="logo"> Tienda Online</h1>
                <h1 class="logo"> ADMINISTRADOR</h1>
            </header>
            <nav>
                <ul class="menu">
                    <li><a href="./VentasProductos.php" class="boton-menu boton-categoria active"><i
                                class="bi bi-arrow-right-circle-fill"></i>Ventas</a>
                    </li>
                    <li><a href="./dashboard.php" class="boton-menu boton-categoria "><i
                                class="bi bi-arrow-right-circle-fill"></i>Todos
                            lo productos</a></li>

                    <li><a href="./../../includes/logout.php?user=Admin"
                            class="boton-menu boton-categoria btn btn-danger"><i
                                class=" bi bi-arrow-right-circle-fill"></i>Cerrar sesion</a></li>

                </ul>
            </nav>
        </aside>
        <main>
            <h2 class="titulo-principal">Todos los productos</h2>
            <div class="btn-add-products">
                <a href="./add_Products.php" type="button" class=" btn btn-outline-success">Añadir Nuevo producto</a>
            </div>
            <?php
            $sql ="SELECT co.id_compra venta, co.cantidad cantidad, co.precio precio, co.fechaCompra, 
            CONCAT(cli.nombre, ' ', cli.apellido) fullname, pro.nombre nameProduct, pro.description description, pro.imagen imagen
            FROM compras co 
            inner JOIN productos pro on co.id_producto = pro.id_producto 
            inner JOIN clientes cli on co.id_usuario = cli.id ORDER BY co.id_compra desc
            ";
               $productQueyr = mysqli_query($conn,$sql);
            ?>

            <br>
            <table class="table table-success table-striped">
                <tr class="bg-gray-100 border-b-2 border-gray-200 p-2 text-center">
                    <th class="p-2">ID Venta</th>
                    <th class="p-2">Producto</th>
                    <th class="p-2">Descripción</th>
                    <th class="p-2">Cantidad</th>
                    <th class="p-2">Total</th>
                    <th class="p-2">Cliente</th>
                    <th class="p-2">Imagen</th>
                </tr>
                <?php
		while($row = $productQueyr->fetch_assoc()) {
			echo'<tr style="font-size: 25px;"class="text-center">';
				echo'<td class="bg-white p-2">'.$row["venta"].'</td>';
				echo'<td class="bg-white p-2">'.$row["nameProduct"].'</td>';
				echo'<td class="bg-white p-2">'.$row["description"].'</td>';
				echo'<td class="bg-white p-2">'.$row["cantidad"].'</td>';
				echo'<td class="bg-white p-2">'.$row["precio"].'</td>';
                echo'<td class="bg-white p-2">'.strtoupper($row["fullname"]).'</td>';
                echo'<td class="bg-white p-2"><img class="carrito-producto-imagen" src="./../../img/'.$row['imagen'].'" alt="">'.'</td>';
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