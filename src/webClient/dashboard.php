<?php
  include('./../../includes/conexion.php');
  session_start();
  $idUser =$_SESSION['user_id'];
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
  $sqlProducts = "SELECT*FROM productos";
  $result = mysqli_query($conn,$sqlProducts);
?>

<body>
    <div class="wrapper">
        <?php
      include("./../../includes/header.php");
        ?>
        <main>
            <h2 class="titulo-principal">Todos los productos</h2>
            <div class="contenedor-productos">
                <?php
                  while($row = mysqli_fetch_array($result)){
                    $idProduct = $row['id_producto'];
                    ?>
                <div class="producto">
                    <img class="producto-imagen" src="<?php echo "./../../img/".$row['imagen']; ?>" alt="">
                    <form action="./../../crud/agregaCarrito.php" method="post">
                        <div class=" producto-detalles">
                            <h2><?php echo $row['nombre']; ?></h2>
                            <h4 class=" producto-titulo"><?php echo "Descripción: ".$row['description']; ?></h4>
                            <p class="producto-precio"><?php echo "Precio: $".$row['Precio']; ?></p>
                            <p class="producto-precio"><?php echo "Stock: ".$row['stock']; ?></p>

                            <input type="hidden" style="width:30%; margin-left:35%;" id="idProducto" name="idProducto"
                                value="<?php echo $idProduct; ?>">
                            <input type="hidden" style="width:30%; margin-left:35%;" id="idUser" name="idUser"
                                value="<?php echo  $idUser; ?>">
                            <p class="producto-precio">Cantidad a comprar:</p>
                            <div
                                style="display: flexbox; text-align: center; justify-items: center; aling-items: center;">
                                <input type="number" style="width:30%; margin-left:35%;"
                                    class="producto-precio form-control" name="cantidad" id="cantidad" min=1>
                            </div>
                            <?php
                            //idUser=idUser&idProducto=idProducto&cantidad=cantidad
                          if($row['stock'] != 0 && $row['Estado'] == 'Disponible'){ ?>
                            <button type="submit" class=" producto-agregar">Agregar</button>
                            <?php
                          }else{?>
                            <p class="producto-precio">Venta hasta nuevo aviso.</p>
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
            <?php
                }
                ?>
    </div>
    </main>

    </div>
    <?php
      include("./../../includes/foother.php");
    ?>

</body>

</html>