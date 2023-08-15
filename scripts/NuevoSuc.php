<?php
session_start();
if(!isset($_SESSION['rol']))
{
  header('Location: ../index.php');
}
else
 {
  if ($_SESSION["rol"] == 2) {
    header("Location: ../index.php");
    exit;
  } elseif ($_SESSION["rol"] == 3) { 
    header("Location: puntoventa.php");
    exit;
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Nuevo</title>
</head>
<body>
    <?php
    $error = false;
    ?>
<div class="container w-75 p-5">
    <div class="d-flex">
        <a class="btn btn-primary justify-content-center" href="../views/admin.php">Regresar</a>
        <h3 align="center" style="margin-left: 30%;">Añadir Insumo</h3>
    </div>
    <form action="" method="post">
        <input type="hidden" value="ACTIVO" name="estado">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la sucursal:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="dire" class="form-label">Direccion:</label>
            <input type="text" name="dire" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tel" class="form-label">Telefono:</label>
            <input type="text" name="tel" class="form-control" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary">Añadir sucursal</button>
        </div>
    </form>
</div>
<?php
if(isset($_POST['submit']))
{
    try{
        include "../class/database.php";
    $db = new Database();
    $db->conectarDB();
    extract($_POST);
            $cadena = "INSERT INTO SUCURSALES (NOMBRE, DIRECCION, TELEFONO, ESTADO) VALUES ('$nombre', '$dire', '$tel','ACTIVO')";
            $db->ejecutarsql($cadena);
            $db->desconectarDB();
    header("Location: Exito.php");
    exit;
    }
    catch(PDOException $e) 
    {
        header("Location: Fallo.php");
    }
}
?>
</body>
</html>
