<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./../../includes/conexion.php');
    include('./../../includes/head.php');
    session_start();
    $idUser = $_SESSION['user_id'];

    ?>
    <link rel="stylesheet" href="./../../css/main.css">
</head>

<body>
    <?php
    $sqlCarrito = "SELECT COUNT(DISTINCT ca.id_producto) as cantidad FROM carrito ca 
                        WHERE ca.id_usuario = ' $idUser' and Estado='Activo'";
    $result2 = mysqli_query($conn, $sqlCarrito);
    while ($row1 = mysqli_fetch_array($result2)) {
        $catCarrito = $row1['cantidad'];
    }
    ?>

    <div class="wrapper">
        <aside>
            <header>
                <h1 class="logo"> Tienda</h1>
            </header>
            <nav>
                <ul>
                    <li><a class="boton-menu boton-volver" href="./dashboard.php"><i class="bi bi-arrow-return-left"></i>Seguir comprando</a></li>
                    <li><a class="boton-menu boton-categoria" href="./carrito.php"><i class="bi bi-cart-fill"></i>Carrito <span class="numero">
                                <?php echo  $catCarrito; ?> </span></a></li>
                    <li><a class="boton-menu boton-categoria active" href="./compras.php"><i class="bi bi-bag-fill"></i>Compras</a></li>
                    <li><a href="./../../includes/logout.php?user=Client" class="boton-menu boton-categoria btn btn-danger"><i class=" bi bi-arrow-right-circle-fill"></i>Cerrar sesion</a></li>
                </ul>
            </nav>

        </aside>
        <main>
            <h2 class="titulo-principal">Compras Realizadas</h2>
            <?php
            $sql = "SELECT co.id_compra venta, co.cantidad cantidad, co.fechaCompra, 
            CONCAT(cli.nombre, ' ', cli.apellido) fullname, fr.MetodoPago metodo
            FROM compras co 
            inner JOIN clientes cli on co.id_usuario = cli.id 
            inner JOIN Metodo_Pago fr on co.id_forma_pago = fr.Id
            WHERE co.id_usuario = '$idUser' ORDER BY co.fechaCompra desc 
            ";
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
                    echo '<td class="bg-white p-2">
                    <a href="www.google.com">
                    <ion-icon name="eye-outline"></ion-icon>
                    </a>
                                    
                    </td>';
                    echo '</tr>';
                }
                ?>
            </table>

        </main>
    </div>
    <?php
    include('../../includes/foother.php');
    ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>