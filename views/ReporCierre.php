<?php
session_start();
include '../class/database.php';
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <title>Inventario</title>
</head>
<body>
<div class="container mt-3">
<div class="btn-group d-flex bg-light" role="group" style="overflow-x: auto; white-space: nowrap; width: 100%;">
    <a class="btn btn-warning flex-fill" href="admin.php">Volver al inicio</a>
    <a class="btn btn-primary flex-fill" href="Inventario.php">Inventario</a>
    <a class="btn btn-primary flex-fill" href="Ordenes.php">Órdenes</a>
    <a class="btn btn-primary flex-fill" href="Productos.php">Productos</a>
    <a class="btn btn-primary flex-fill" href="Sucursales.php">Sucursales</a>
    <a class="btn btn-primary flex-fill" href="Personal.php">Personal</a>
    <a class="btn btn-primary flex-fill" href="Solicitudes.php">Solicitudes</a>
    <a class="btn btn-primary flex-fill" href="Ingresos.php">Ingresos</a>
    <a class="btn btn-primary flex-fill disabled" href="ReporCierre.php" aria-disabled="true">Cierres</a>
    <a class="btn btn-primary flex-fill" href="Movimientos.php">Movimientos en inv</a>
    <a class="btn btn-primary flex-fill" href="Merma.php">Merma</a>
</div>
</div>
<?php
  $fechaActual = date("d/m/Y");
  $db = new Database();
  $db->conectarDB();
    echo "<h4 align='center'>Reporte de <strong>cierre de turno</strong> de todas las sucursales ";
    echo
    "</h4>"; ?>
    <h4 align='center'>Selecciona solamente fecha inicial para ver resultados de tal fecha.</h4>
    <h4 align='center'>Selecciona ambas fechas para ver resultados en ese rango.</h4>
    <div class="container">
    <form class="" method="post">
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label class="form-label" for="fec01">Buscar con fecha inicial:</label>
                <input type="date" class="form-control" name="fec1" id="fec01" max="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-12 col-lg-4 mb-3">
                <label class="form-label" for="fec02">Buscar con fecha final:</label>
                <input type="date" class="form-control" name="fec2" id="fec02" max="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="col-12 col-lg-4 mb-3">
                <label class="form-label" for="suc">Buscar por sucursal: (Obligatorio)</label>
                <?php
                $db = new Database();
                $db->conectarDB();
                $cadena = "SELECT ID_SUC,NOMBRE FROM SUCURSALES WHERE ESTADO = 'ACTIVO'";
                $reg = $db->seleccionar($cadena);
                echo "<div class='me-2'>
                <select name='suc' class='form-select'>
                <option value='0' disabled selected>Seleccionar sucursal...</option>";
                foreach ($reg as $value) {
                    echo "<option value='" . $value->ID_SUC . "'>" . $value->NOMBRE . "</option>";
                }
                echo "<option value='999'>VER TODAS</option>";
                echo "</select>
                </div>";
                ?>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input class="btn btn-primary" type="submit" value="Buscar" name="CIERRES">
        </div>
    </form>
</div>
  <?php
        if (isset($_POST['CIERRES']) && ((isset($_POST['suc']) && $_POST['suc'] != 0)))
        {
          ?>
    <div class="container d-lg-none d-block">
      <h6 align="center">Desliza la tabla para ver toda la informacion</h6>
    </div>
    <?php
          extract($_POST);
          $valor = 0;
          $cadena = "SELECT S.NOMBRE AS 'Sucursal', BC.FECHA AS 'Fecha', BC.INSUMO AS 'Insumo', 
      BC.CANTIDAD_ANTERIOR AS 'Inventario_Inicial', BC.CANTIDAD_NUEVA AS 'Inventario_Final',
      BC.CANTIDAD_NUEVA - BC.CANTIDAD_ANTERIOR AS 'Diferencia'
      FROM BitacoraCierre BC
      INNER JOIN SUCURSALES S ON S.ID_SUC = BC.Sucursal";

      if ($suc != 999) {
          $cadena .= " WHERE BC.SUCURSAL = $suc";
      }
      if (isset($_POST['fec1']) && $_POST['fec1'] !== "" && !isset($_POST['fec2'])) {
          $fechaFiltrada = $_POST['fec'];
          if ($suc != 999) {
              $cadena .= " AND BC.FECHA = '$fechaFiltrada'";
          } else {
              $cadena .= " WHERE BC.FECHA = '$fechaFiltrada'";
          }
      }
      if ((isset($_POST['fec1']) && $_POST['fec1'] !== "") && (isset($_POST['fec2']) && $_POST['fec2'] !== "")) {
          $fechaFiltrada = $_POST['fec1'];
          $fechaFiltrada2 = $_POST['fec2'];
          if ($suc != 999){
            $cadena .= " AND Fecha BETWEEN '$fechaFiltrada' AND '$fechaFiltrada2'";
          } else {
            $cadena .= " WHERE Fecha BETWEEN '$fechaFiltrada' AND '$fechaFiltrada2'";
        }
      }

      if(isset($_POST['nom'])) {
          $nom = $_POST['nom'];
          if ($suc != 999 || (isset($_POST['fec']) && $_POST['fec'] !== "")) {
              $cadena .= " AND BC.INSUMO like '%$nom%'";
          } else {
              $cadena .= " WHERE BC.INSUMO like '%$nom%'";
          }
      }

      $tabla = $db->seleccionar($cadena);
    ?>
    <div class="container justify-content-center">
    <div class="table-responsive">
        <?php
        echo "<table class='table table-hover' id='DetalleCie'>";
        echo "<thead class='table-primary' align='center'>";
        echo "<tr>";
        if (isset($_POST['suc']) && ($_POST['suc'] == 999 || $_POST['suc'] == 0)) {
            $valor = 1;
            echo "<th class='sortable'>Sucursal</th>";
        }
        echo "<th class='col-2 col-lg-3 sortable'>Fecha</th>";
        echo "<th class='col-2 col-lg-3 sortable'>Insumo</th>";
        echo "<th class='col-1 col-lg-1 sortable'>Inventario_Inicial</th>";
        echo "<th class='col-1 col-lg-1 sortable'>Inventario_Final</th>";
        echo "<th class='col-1 col-lg-3 sortable'>Diferencia</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody align='center'>";
        foreach ($tabla as $registro) {
            echo "<tr>";
            if (isset($_POST['suc']) && ($_POST['suc'] == 999 || $_POST['suc'] == 0)) {
                echo "<td>$registro->Sucursal</td>";
            }
            echo "<td>$registro->Fecha</td>";
            echo "<td>$registro->Insumo</td>";
            echo "<td>$registro->Inventario_Inicial</td>";
            echo "<td>$registro->Inventario_Final</td>";
            echo "<td>$registro->Diferencia</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        ?>
    </div>
</div>

  <?php
  echo '<script>saveActiveTab("cierres");</script>';
  }
  else {
  ?>
  <div class="container">
    <h4 align="center">Por favor, selecciona una sucursal primero.</h4>
  </div>
  <?php
  }?>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const fec1Input = document.getElementById("fec01");
        const fec2Input = document.getElementById("fec02");

        fec1Input.addEventListener("input", function() {
            if (fec1Input.value === "") {
                fec2Input.disabled = true;
                fec2Input.value = "";
            } else {
                fec2Input.disabled = false;
            }
        });

        // Deshabilitar fec2 inicialmente si fec1 está vacío
        if (fec1Input.value === "") {
            fec2Input.disabled = true;
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fec1Input = document.getElementById("fec01");
        const fec2Input = document.getElementById("fec02");

        fec1Input.addEventListener("input", function() {
            if (fec1Input.value === "") {
                fec2Input.disabled = true;
                fec2Input.value = "";
            } else {
                fec2Input.disabled = false;
                fec2Input.min = fec1Input.value;
            }
        });

        // Deshabilitar fec2 inicialmente si fec1 está vacío
        if (fec1Input.value === "") {
            fec2Input.disabled = true;
        }
    });
</script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
    $('#DetalleCie').DataTable({
        "order": [[<?php echo $valor; ?>, 'desc']]
    });
});
  </script>

</body>
</html>