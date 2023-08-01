<?php
session_start();
if(!isset($_SESSION['rol']))
{
 header('location: ../index.php');
}
else
{
  if ($_SESSION["rol"] == 3) { 
    header("Location: puntoventa.php");
    exit;
  } elseif ($_SESSION["rol"] == 1) { 
    if (basename($_SERVER['PHP_SELF']) === 'Solicitudes.php') {
    } else {
        header("Location: Solicitudes.php");
        exit;
    }
  } elseif ($_SESSION["rol"] == 2) { 
    header("Location: ../index.php");
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
  <title>Solicitudes</title>
</head>
<body>
<?php
$db = new Database();
$db->conectarDB();

if (isset($_POST['sucursal'])) 
{
  $sucursalId = $_POST['sucursal'];
  if ($sucursalId != 0 && $sucursalId != 999) 
  {
    $consulta = "SELECT NOMBRE FROM SUCURSALES WHERE ID_SUC = $sucursalId";
    $sucursal = $db->seleccionar($consulta);
    $Nombre = $sucursal[0]->NOMBRE;
    echo "<h2>Sucursal $Nombre</h2>";
  }
  elseif($sucursalId == 0) 
  {
    ?>
    <div class="container">
        <h4 align="center">Elige una sucursal para iniciar.</h4>
    </div>
    <?php
  }
if (isset($_POST['sucursal']) && $_POST['sucursal'] != 0) 
{
  $sucursalId = $_POST['sucursal'];
  if ($sucursalId != 0 && $sucursalId != 999) {
    $consulta = "SELECT SU.NOMBRE AS 'Sucursal',I.NOMBRE AS 'Insumo',DS.CANTIDAD AS 'Cantidad',
    S.FECHA AS 'Fecha', S.ESTADO AS 'Estado'
    FROM SOLICITUDES S
    INNER JOIN DETALLE_SOLICITUD DS ON DS.SOLICITUD = S.ID_SOLICITUD
    INNER JOIN SUCURSALES SU ON SU.ID_SUC = S.SUCURSAL
    INNER JOIN INVENTARIO I ON I.ID_INS = DS.INVENTARIO 
    WHERE ID_SUC = $sucursalId AND S.ESTADO = 'solicitado';";
    $tabla = $db->seleccionar($consulta);
  } elseif ($sucursalId == 999) {
    $consulta = "SELECT SU.NOMBRE AS 'Sucursal',I.NOMBRE AS 'Insumo', DS.CANTIDAD AS 'Cantidad', S.FECHA AS 'Fecha',S.ESTADO AS 'Estado'
    FROM SOLICITUDES S
    INNER JOIN DETALLE_SOLICITUD DS ON DS.SOLICITUD = S.ID_SOLICITUD
    INNER JOIN SUCURSALES SU ON SU.ID_SUC = S.SUCURSAL
    INNER JOIN INVENTARIO I ON I.ID_INS = DS.INVENTARIO 
    WHERE S.ESTADO = 'solicitado';";
    $tabla = $db->seleccionar($consulta);
  }

  echo "<table class='table table-hover' id='tabla-xs'>";
  echo "<thead class='table-primary' align='center'>";
  echo "<tr>";
  if ($sucursalId == 999) {
    echo "<th>Sucursal</th>";
  }
  echo "<th class='col-4 col-lg-3'>Insumo</th>";
  echo "<th class='col-1 col-lg-1'>Cantidad solicitada</th>";
  echo "<th class='col-4 col-lg-1'>Fecha de solicitud</th>";
  if($sucursalId != 999){
      echo "<th class='col-3 col-lg-1'>Estado</th>";
  }
  echo "</tr>";
  echo "</thead>";
  echo "<tbody align='center'>";
  foreach ($tabla as $registro) 
  {
    echo "<tr>";
    if ($sucursalId == 999) {
      echo "<td>$registro->Sucursal</td>";
    }
    echo "<td>$registro->Insumo</td>";
    echo "<td>$registro->Cantidad</td>";
    echo "<td>$registro->Fecha</td>";
    if($sucursalId != 999) {
          echo "<td>$registro->Estado</td>";
    }
  }
}
$db->desconectarDB();
}
else
{
  ?>
  <div class="container">
      <h4 align="center">Elige una sucursal para iniciar.</h4>
  </div>
  <?php
}
?>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>