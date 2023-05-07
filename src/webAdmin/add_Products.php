<!DOCTYPE html>
<html lang="en">

<head>
    <?php
     include("./../../includes/head.php");
?>
    <link rel="stylesheet" href="./../../css/main.css">
</head>

<body class="text-bg-secondary p-3">
    <div class="container formLogin text-bg-info p-5">
        <div class="alert alert-secondary lb-login" role="alert">
            Nuevo Producto
        </div>
        <form action=" ./../../crud/add_Products.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="producto" name="producto">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio">
            </div>
            <div class="mb-3">
                <div class="input-group">

                    <input type="file" class="form-control" id="inputGroupFile04" name="inputGroupFile04"
                        aria-describedby=" inputGroupFileAddon04" aria-label="Upload">
                </div>
            </div>
            <a href="./dashboard.php" type="submit" class="btn btn-outline-danger">Cancelar</a>
            <button type="submit" class="btn btn-success">Registar Producto</button>

        </form>
    </div>

</body>

</html>