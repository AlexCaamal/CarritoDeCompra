<?php
include('./../../includes/conexion.php');
$idCompra = $_GET['idCompra'];

if (!$idCompra) {
    echo "<script> 
    alert('La compra selecionada no es valida'); 
    window.location = '../src/webAdmin/VentasProductos.php';
    </script>";
}
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
                    <li><a href="./VentasProductos.php" class="boton-menu boton-categoria active"><i class="bi bi-arrow-right-circle-fill"></i>Ventas</a>
                    </li>
                    <li><a href="./dashboard.php" class="boton-menu boton-categoria "><i class="bi bi-arrow-right-circle-fill"></i>Todos
                            lo productos</a></li>

                    <li><a href="./../../includes/logout.php?user=Admin" class="boton-menu boton-categoria btn btn-danger"><i class=" bi bi-arrow-right-circle-fill"></i>Cerrar sesion</a></li>

                </ul>
            </nav>
        </aside>
        <main>
            <h2 class="titulo-principal">Detalles de la Compra</h2>
            <div style="display: flex;" class="carrito-acciones">
                <div class="carrito-acciones-izquierda">
                    <a class="carrito-acciones-vaciar" href="./VentasProductos.php">Regresar</a>
                </div>
            </div>
            <?php
            $sql = "SELECT co.id_compra venta, co.cantidad cantidad, co.fechaCompra, 
            CONCAT(cli.nombre, ' ', cli.apellido) fullname, fr.MetodoPago metodo
            FROM compras co 
            inner JOIN clientes cli on co.id_usuario = cli.id 
            inner JOIN Metodo_Pago fr on co.id_forma_pago = fr.Id
            WHERE co.id_compra = '$idCompra'";
            $productQueyr = mysqli_query($conn, $sql);
            ?>

            <br>
            <table class="table table-success table-striped">
                <tr class="bg-gray-100 border-b-2 border-gray-200 p-2 text-center">
                    <th class="p-2">ID Venta</th>
                    <th class="p-2">Cantidad</th>
                    <th class="p-2">Cliente</th>
                    <th class="p-2">Método de Pago</th>
                </tr>
                <?php
                while ($row = $productQueyr->fetch_assoc()) {
                    echo '<tr style="font-size: 25px;"class="text-center">';
                    echo '<td class="bg-white p-2">' . $row["venta"] . '</td>';
                    echo '<td class="bg-white p-2">' . $row["cantidad"] . '</td>';
                    echo '<td class="bg-white p-2">' . strtoupper($row["fullname"]) . '</td>';
                    echo '<td class="bg-white p-2">' . strtoupper($row["metodo"]) . '</td>';
                    echo '</tr>';
                }
                ?>
            </table>

            <div class=" carrito-productos">

                <?php
                $sqlProducts = "SELECT SUM(ca.Cantidad) as cantidad, pro.imagen, ca.id_producto, pro.nombre as nombre, pro.Precio as precio, SUM(ca.Cantidad * pro.Precio) as subtotal 
                        FROM Detalle_Compra ca 
                        INNER JOIN productos pro on ca.id_producto = pro.id_producto
                        where id_compra = '$idCompra' group by ca.id_producto";
                $result = mysqli_query($conn, $sqlProducts);
                while ($row = mysqli_fetch_array($result)) {

                ?>
                    <div class="carrito-producto">
                        <img class="carrito-producto-imagen" src="<?php echo $row['imagen']; ?>" alt="">
                        <div class="carrito-producto-titulo">
                            <small>Producto</small>
                            <h3><?php echo $row['nombre']; ?></h3>
                        </div>
                        <div class="carrito-producto-cantidad">
                            <small>Cantidad</small>
                            <p><?php echo $row['cantidad']; ?></p>
                        </div>
                        <div class="carrito-producto-precio">
                            <small>Precio</small>
                            <p><?php echo $row['precio']; ?></p>
                        </div>
                        <div class="carrito-producto-subtotal">
                            <small>Subtotal</small>
                            <p><?php echo $row['subtotal']; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </main>
    </div>
    <?php
    include('../../includes/foother.php');
    ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>