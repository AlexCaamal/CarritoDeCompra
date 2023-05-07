      <?php
        include('conexion.php');
        $idUser =$_SESSION['user_id'];
        $sqlCarrito = "SELECT COUNT(DISTINCT ca.id_producto) as cantidad
                        FROM carrito ca 
                        INNER JOIN clientes cli on ca.id_usuario = cli.id
                        WHERE ca.id_usuario = ' $idUser' and ca.Estado='Activo'";
                        $result2 = mysqli_query($conn,$sqlCarrito);
                         while($row1= mysqli_fetch_array($result2)){
                            $catCarrito = $row1['cantidad'];
                           
                         }
        $nombreUser="";
        $sqlname = "SELECT CONCAT(nombre,' ', apellido) as name
                        FROM clientes 
                        WHERE id = '$idUser'";
                        $results2 = mysqli_query($conn,$sqlname);
                         while($rows= mysqli_fetch_array($results2)){
                            $nombreUser = $rows['name'];
                         }
      ?>
      <aside>
          <header>
              <h1> Tienda Online</h1>
              <br>
              <h4> Bienvenido </h4>
              <br>
              <h4> <?php echo strtoupper($nombreUser);?> </h4>
          </header>
          <nav>
              <ul class="menu">
                  <li><button class="boton-menu boton-categoria active"><i
                              class="bi bi-arrow-right-circle-fill"></i>Todos lo productos</button></li>
                  <li><a class="boton-menu boton-carrito" href="./carrito.php"><i class="bi bi-cart-fill"></i>Carrito
                          <span class="numero">
                              <?php
                                echo $catCarrito;
                              ?> </span></a></li>
                  <br>
                  <li><a href="./../../includes/logout.php?user=Client"
                          class="boton-menu boton-categoria btn btn-danger"><i
                              class=" bi bi-arrow-right-circle-fill"></i>Cerrar sesion</a></li>

              </ul>
          </nav>
      </aside>