<?php
      include('./../../includes/conexion.php');
      $idUser = $_GET['id']
      
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./../../includes/head.php');
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
                    <li><a class="boton-menu boton-carrito active" href="./carrito.php"><i class="bi bi-cart-fill"></i>Carrito <span class="numero">
                                <?php echo  $catCarrito; ?> </span></a></li>
                    <br>
                    <li><a href="./../../includes/logout.php?user=Client" class="boton-menu boton-categoria btn btn-danger"><i class=" bi bi-arrow-right-circle-fill"></i>Cerrar sesion</a></li>
                </ul>
            </nav>

        </aside>
        <main>
            <h2 class="titulo-principal">Metodo de Pago</h2>
            <div class="contenedor-carrito">
                <div style="display: flex;" class="carrito-acciones">
                    <div class="carrito-acciones-izquierda">
                        <a class="carrito-acciones-vaciar" href="./carrito.php">Regresar</a>
                    </div>
                </div>
                <div>
                    <?php
                    $metodoPago = "SELECT * FROM Metodo_Pago
                        WHERE Estado='Activo'";
                    $results = mysqli_query($conn, $metodoPago);
                    if ($results) {
                        // Iterar sobre los resultados y generar las opciones del select
                        echo "<select id='metodo_pago' name='metodo_pago'>";
                        echo "<option value='0'>Seleccione</option>";
                        while ($row2 = mysqli_fetch_assoc($results)) {
                            // Obtener el nombre del método de pago y su ID (suponiendo que hay un campo "id" en la tabla)
                            $idMetodoPago = $row2['Id'];
                            $nombreMetodoPago = $row2['MetodoPago'];

                            echo "<option value='$idMetodoPago'>$nombreMetodoPago</option>";
                        }
                        echo "</select>"; // Cierra el elemento select
                    } else {
                        // Manejar el caso en que la consulta falle
                        echo "Error al ejecutar la consulta: " . mysqli_error($conn);
                    }
                    ?>
                    <div id="trasferDiv" style="display: none;">
                        <br>
                        <p>Registra y realiza una transferencia a la compañia</p>
                        <br>
                        <div class="containerTarget" style="display: flex; justify-content: center; color: white; padding: 2%;">
                            <div class="flip-card" style="flex-grow: 1; ">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <p class="heading_8264">MASTERCARD</p>
                                        <div style="max-width: 100%; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 2.5%;">
                                            <svg version="1.1" class="chip" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 50 50" xml:space="preserve">
                                                <image id="image0" width="50" height="50" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAMAAAAp4XiDAAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                                                        AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAB6VBMVEUAAACNcTiVeUKVeUOY
                                                        fEaafEeUeUSYfEWZfEaykleyklaXe0SWekSZZjOYfEWYe0WXfUWXe0WcgEicfkiXe0SVekSXekSW
                                                        ekKYe0a9nF67m12ZfUWUeEaXfESVekOdgEmVeUWWekSniU+VeUKVeUOrjFKYfEWliE6WeESZe0GS
                                                        e0WYfES7ml2Xe0WXeESUeEOWfEWcf0eWfESXe0SXfEWYekSVeUKXfEWxklawkVaZfEWWekOUekOW
                                                        ekSYfESZe0eXekWYfEWZe0WZe0eVeUSWeETAnmDCoWLJpmbxy4P1zoXwyoLIpWbjvXjivnjgu3bf
                                                        u3beunWvkFWxkle/nmDivXiWekTnwXvkwHrCoWOuj1SXe0TEo2TDo2PlwHratnKZfEbQrWvPrWua
                                                        fUfbt3PJp2agg0v0zYX0zYSfgkvKp2frxX7mwHrlv3rsxn/yzIPgvHfduXWXe0XuyIDzzISsjVO1
                                                        lVm0lFitjVPzzIPqxX7duna0lVncuHTLqGjvyIHeuXXxyYGZfUayk1iyk1e2lln1zYTEomO2llrb
                                                        tnOafkjFpGSbfkfZtXLhvHfkv3nqxH3mwXujhU3KqWizlFilh06khk2fgkqsjlPHpWXJp2erjVOh
                                                        g0yWe0SliE+XekShhEvAn2D///+gx8TWAAAARnRSTlMACVCTtsRl7Pv7+vxkBab7pZv5+ZlL/UnU
                                                        /f3SJCVe+Fx39naA9/75XSMh0/3SSkia+pil/KRj7Pr662JPkrbP7OLQ0JFOijI1MwAAAAFiS0dE
                                                        orDd34wAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0IDx2lsiuJAAACLElEQVRIx2Ng
                                                        GAXkAUYmZhZWPICFmYkRVQcbOwenmzse4MbFzc6DpIGXj8PD04sA8PbhF+CFaxEU8iWkAQT8hEVg
                                                        OkTF/InR4eUVICYO1SIhCRMLDAoKDvFDVhUaEhwUFAjjSUlDdMiEhcOEItzdI6OiYxA6YqODIt3d
                                                        I2DcuDBZsBY5eVTr4xMSYcyk5BRUOXkFsBZFJTQnp6alQxgZmVloUkrKYC0qqmji2WE5EEZuWB6a
                                                        lKoKdi35YQUQRkFYPpFaCouKIYzi6EDitJSUlsGY5RWVRGjJLyxNy4ZxqtIqqvOxaVELQwZFZdkI
                                                        JVU1RSiSalAt6rUwUBdWG1CP6pT6gNqwOrgCdQyHNYR5YQFhDXj8MiK1IAeyN6aORiyBjByVTc0F
                                                        qBoKWpqwRCVSgilOaY2OaUPw29qjOzqLvTAchpos47u6EZyYnngUSRwpuTe6D+6qaFQdOPNLRzOM
                                                        1dzhRZyW+CZouHk3dWLXglFcFIflQhj9YWjJGlZcaKAVSvjyPrRQ0oQVKDAQHlYFYUwIm4gqExGm
                                                        BSkutaVQJeomwViTJqPK6OhCy2Q9sQBk8cY0DxjTJw0lAQWK6cOKfgNhpKK7ZMpUeF3jPa28BCET
                                                        amiEqJKM+X1gxvWXpoUjVIVPnwErw71nmpgiqiQGBjNzbgs3j1nus+fMndc+Cwm0T52/oNR9lsdC
                                                        S24ra7Tq1cbWjpXV3sHRCb1idXZ0sGdltXNxRateRwHRAACYHutzk/2I5QAAACV0RVh0ZGF0ZTpj
                                                        cmVhdGUAMjAyMy0wMi0xM1QwODoxNToyOSswMDowMEUnN7UAAAAldEVYdGRhdGU6bW9kaWZ5ADIw
                                                        MjMtMDItMTNUMDg6MTU6MjkrMDA6MDA0eo8JAAAAKHRFWHRkYXRlOnRpbWVzdGFtcAAyMDIzLTAy
                                                        LTEzVDA4OjE1OjI5KzAwOjAwY2+u1gAAAABJRU5ErkJggg=="></image>
                                            </svg>
                                            <svg version="1.1" class="contactless" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 50 50" xml:space="preserve">
                                                <image id="image0" width="50" height="50" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAQAAAC0NkA6AAAABGdBTUEAALGPC/xhBQAAACBjSFJN
                                                        AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZ
                                                        cwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0IEzgIwaKTAAADDklEQVRYw+1XS0iUURQ+f5qPyjQf
                                                        lGRFEEFK76koKGxRbWyVVLSOgsCgwjZBJJYuKogSIoOonUK4q3U0WVBWFPZYiIE6kuArG3VGzK/F
                                                        fPeMM/MLt99/NuHdfPd888/57jn3nvsQWWj/VcMlvMMd5KRTogqx9iCdIjUUmcGR9ImUYowyP3xN
                                                        GQJoRLVaZ2DaZf8kyjEJALhI28ELioyiwC+Rc3QZwRYyO/DH51hQgWm6DMIh10KmD4u9O16K49it
                                                        VoPOAmcGAWWOepXIRScAoJZ2Frro8oN+EyTT6lWkkg6msZfMSR35QTJmjU0g15tIGSJ08ZZMJkJk
                                                        HpNZgSkyXosS13TkJpZ62mPIJvOSzC1bp8vRhhCakEk7G9/o4gmZdbpsTcKu0m63FbnBP9Qrc15z
                                                        bkbemfgNDtEOI8NO5L5O9VYyRYgmJayZ9nPaxZrSjW4+F6Uw9yQqIiIZwhp2huQTf6OIvCZyGM6g
                                                        DJBZbyXifJXr7FZjGXsdxADxI7HUJFB6iWvsIhFpkoiIiGTJfjJfiCuJg2ZEspq9EHGVpYgzKqwJ
                                                        qSAOEwuJQ/pxPvE3cYltJCLdxBLiSKKIE5HxJKcTRNeadxfhDiuYw44zVs1dxKwRk/uCxIiQkxKB
                                                        sSctRVAge9g1E15EHE6yRUaJecRxcWlukdRIbGFOSZCMWQA/iWauIP3slREHXPyliqBcrrD71Amz
                                                        Z+rD1Mt2Yr8TZc/UR4/YtFnbijnHi3UrN9vKQ9rPaJf867ZiaqDB+czeKYmd3pNa6fuI75MiC0uX
                                                        XSR5aEMf7s7a6r/PudVXkjFb/SsrCRfROk0Fx6+H1i9kkTGn/E1vEmt1m089fh+RKdQ5O+xNJPUi
                                                        cUIjO0Dm7HwvErEr0YxeibL1StSh37STafE4I7zcBdRq1DiOkdmlTJVnkQTBTS7X1FYyvfO4piaI
                                                        nKbDCDaT2anLudYXCRFsQBgAcIF2/Okwgvz5+Z4tsw118dzruvIvjhTB+HOuWy8UvovEH6beitBK
                                                        xDyxm9MmISKCWrzB7bSlaqGlsf0FC0gMjzTg6GgAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjMtMDIt
                                                        MTNUMDg6MTk6NTYrMDA6MDCjlq7LAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDIzLTAyLTEzVDA4OjE5
                                                        OjU2KzAwOjAw0ssWdwAAACh0RVh0ZGF0ZTp0aW1lc3RhbXAAMjAyMy0wMi0xM1QwODoxOTo1Nisw
                                                        MDowMIXeN6gAAAAASUVORK5CYII="></image>
                                            </svg>
                                        </div>
                                        <p class="number">9759 2484 5269 6576</p>
                                        <p class="expiry">1 2 / 2 4</p>
                                        <div style="max-width: 100%; width: 100%; display: flex; justify-content: space-between; align-items: center; padding: 5%; padding-top: 0%;">
                                            <p class="name">Electrodomesticos S.A de C.V</p>
                                            <svg class="logoTarget" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="36" height="36" viewBox="0 0 48 48">
                                                <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                                                <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                                                <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flip-card-back">
                                        <div class="strip">Jose Alfredo Pech Nuñez</div>
                                        <div class="signature"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $ubicacionResponse = "";

                        $ubicacion = "SELECT * FROM Ubicacion_Usuario
                                     WHERE Estado='Activo' and Id_Usuario = $idUser";

                        $ubicacionResult = mysqli_query($conn, $ubicacion);

                        if ($ubicacionResult) { // Aquí debería ser $ubicacionResult en lugar de $results
                            while ($rowUbicacion = mysqli_fetch_assoc($ubicacionResult)) {
                                $ubicacionResponse = $rowUbicacion['Ubicacion'];
                            }
                        }
                        ?>
                        <br>
                        <form action="./../../crud/acceptedBuys.php" method="POST">
                            <div style="display: flex;" class="carrito-acciones" style="padding-top: 3%;">
                                <input type="hidden" value="<?php echo $idUser; ?>" name="id">
                                <input type="hidden" name="metodo" id="metodTransfer">
                                <input type="hidden" required name="numTarjeta">
                                <input type="hidden" required name="cvv">
                                <input type="hidden" required name="titular">
                                <div class="carrito-acciones-izquierda">
                                    <input type="text" value="<?php echo $ubicacionResponse; ?>" required name="direccion">

                                    <?php
                                    if ($ubicacionResponse == null || $ubicacionResponse == '') {
                                    ?>
                                        <span style="color: red;">Ingrese un Domicilio</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="carrito-acciones-derecha">
                                    <button type="submit" class="btn btn-outline-success" name="btnPagar">Pagar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="tarjetaDevDiv" style="display: none;">
                        <form action="./../../crud/acceptedBuys.php" style="max-width: 100%; width: 100%;" method="POST">
                            <input type="hidden" value="<?php echo $idUser; ?>" name="id">
                            <input type="hidden" name="metodo" id="metodDEv">
                            <br><br>
                            <h2 style="font-size: 1rem;"> Número Tarjeta</h2>
                            <input type="text" required name="numTarjeta">
                            <br><br>
                            <h2 style="font-size: 1rem;"> CVV</h2>
                            <input type="text" required name="cvv">
                            <br><br>
                            <h2 style="font-size: 1rem;"> Titular</h2>
                            <input type="text" required name="titular">
                            <br><br>
                            <div style="display: flex;" class="carrito-acciones" style="padding-top: 3%;">
                                <div class="carrito-acciones-izquierda">
                                    <h2 style="font-size: 1rem;"> Domicilio</h2>
                                    <input type="text" value="<?php echo $ubicacionResponse; ?>" required name="direccion">

                                    <?php
                                    if ($ubicacionResponse == null || $ubicacionResponse == '') {
                                    ?>
                                        <span style="color: red;">Ingrese un Domicilio</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <br><br>
                                <div class="carrito-acciones-derecha d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-success" name="btnPagar">Pagar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="tarjetaCredDiv" style="display: none;">
                        <form action="./../../crud/acceptedBuys.php" style="max-width: 100%; width: 100%;" method="post">
                            <input type="hidden" value="<?php echo $idUser; ?>" name="id">
                            <input type="hidden" name="metodo" id="metodCred">
                            <br><br>
                            <h2 style="font-size: 1rem;"> Número Tarjeta</h2>
                            <input type="text" required name="numTarjeta">
                            <br><br>
                            <h2 style="font-size: 1rem;"> CVV</h2>
                            <input type="text" required name="cvv">
                            <br><br>
                            <h2 style="font-size: 1rem;"> Titular</h2>
                            <input type="text" required name="titular">
                            <br><br>
                            <div style="display: flex;" class="carrito-acciones" style="padding-top: 3%;">
                                <div class="carrito-acciones-izquierda">
                                    <h2 style="font-size: 1rem;"> Domicilio</h2>
                                    <input type="text" value="<?php echo $ubicacionResponse; ?>" required name="direccion">

                                    <?php
                                    if ($ubicacionResponse == null || $ubicacionResponse == '') {
                                    ?>
                                        <span style="color: red;">Ingrese un Domicilio</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <br><br>
                                <div class="carrito-acciones-derecha d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-success" name="btnPagar">Pagar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </main>
    </div>
    <?php
    include('../../includes/foother.php');
    ?>
    <script>
        // Función para mostrar u ocultar los divs según el método de pago seleccionado
        document.getElementById('metodo_pago').addEventListener('change', function() {
            var metodoPago = this.value;
            var trasferDiv = document.getElementById('trasferDiv');
            var tarjetaDevDiv = document.getElementById('tarjetaDevDiv');
            var tarjetaCredDiv = document.getElementById('tarjetaCredDiv');
            // Oculta todos los divs
            trasferDiv.style.display = 'none';
            tarjetaDevDiv.style.display = 'none';
            tarjetaCredDiv.style.display = 'none';

            if (metodoPago == '2') {
                trasferDiv.style.display = 'block';
                document.getElementById('metodTransfer').value = metodoPago;
            } else if (metodoPago == '4') {
                tarjetaDevDiv.style.display = 'flex';
                document.getElementById('metodDEv').value = metodoPago;
            } else if (metodoPago == '3') {
                tarjetaCredDiv.style.display = 'flex';
                document.getElementById('metodCred').value = metodoPago;
            }
        });
    </script>
</body>

</html>