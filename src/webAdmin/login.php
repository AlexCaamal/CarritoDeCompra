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
        <div class="alert alert-info lb-login" role="alert">
            LOGIN
            <br>
            ADMINISTRADOR
        </div>
        <form action=" ./../../crud/loginAdmin.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
    </div>

</body>

</html>