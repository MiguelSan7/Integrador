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
    if (basename($_SERVER['PHP_SELF']) === 'admin.php') {
    } else {
        header("Location: admin.php");
        exit;
    }
  } elseif ($_SESSION["rol"] == 2) { 
    header("Location: ../index.php");
    exit;
  }
  include "../class/database.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<style>
  #tabla
  {
    margin: auto;
    width: 90%;
  }
  #tabla-xs
  {
    margin: auto;
    width: 60%;
  }
  h2
  {
    margin: auto;
    text-align: center;
  }
  .select-wrapper {
  margin-right: 10px;
}
@media (max-width:576) {
  #ocultar{
    display: none;
  }
}
@media (min-width: 576px){
  cont-nav{
  flex:1;}
}
</style>
<title>Administracion</title>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="col-lg-2 d-none d-lg-block">
        <img src="../img/pizza.png" alt="Logo" width="60" height="48" class="d-inline-block align-text-top">
      </div>
      <div class="col-3 col-lg-4">
      <div class="dropdown ml-3">
      <button class="btn btn-secondary dropdown-toggle d-lg-none d-block" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Menú
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" data-target="#inv">Inventario</a></li>
          <li><a class="dropdown-item" data-target="#pro">Productos</a></li>
          <li><a class="dropdown-item" data-target="#emp">Personal</a></li>
          <li><a class="dropdown-item" data-target="#sol">Solicitudes</a></li>
          <li><a class="dropdown-item" data-target="#ing">Ingresos</a></li>
          <li><a class="dropdown-item" data-target="#cie">Cierres</a></li>
          <li><a class="dropdown-item" data-target="#mov">Movimientos inv</a></li>
        </ul>
      </div>
      </div>
      <div class="col-lg-4 d-none d-lg-block">
        <?php
        if (isset($_SESSION['usuario'])) 
        {
          echo "<h4 class='mr-5'>Usuario: ".$_SESSION['usuario']."</h4>";
        }
        ?>
      </div>
      <div class="col-3 col-lg-2 d-flex align-items-center">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a type="button" class="btn btn-sm btn-primary" href="../scripts/cerrarSesion.php">
              Cerrar sesion
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
<div class="d-lg-flex align-items-start">
  <div class="nav flex-column me-3 bg-light d-lg-flex d-none" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active" id="inventario" data-bs-toggle="pill" data-bs-target="#inv" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Inventario</button>
    <button class="nav-link" id="productos" data-bs-toggle="pill" data-bs-target="#pro" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Productos</button>
    <button class="nav-link" id="personal" data-bs-toggle="pill" data-bs-target="#emp" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Personal</button>
    <button class="nav-link" id="solicitudes" data-bs-toggle="pill" data-bs-target="#sol" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Solicitudes</button>
    <button class="nav-link" id="ingresos" data-bs-toggle="pill" data-bs-target="#ing" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Ingresos</button>
<<<<<<< HEAD
    <button class="nav-link" id="cierre" data-bs-toggle="pill" data-bs-target="#cie" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Cierres</button>
    <button class="nav-link" id="movimientos" data-bs-toggle="pill" data-bs-target="#mov" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Movimientos<br> en inv</button>
=======
    <button class="nav-link" id="cie" data-bs-toggle="pill" data-bs-target="#cie" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Cierres</button>
    <button class="nav-link" id="productos" data-bs-toggle="pill" data-bs-target="#pro" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Productos</button>
>>>>>>> a1fc7d817ff273894346e518e325ad3a2b7f05c2
  </div>
  <div class="tab-content w-100" id="v-pills-tabContent">
    <!--INVENTARIO-->
    <div class="tab-pane fade show active" id="inv" role="tabpanel" aria-labelledby="inventario" tabindex="0">
      <?php include 'Inventario.php'; ?>
    </div>
    <!--PRODUCTOS-->
    <div class="tab-pane fade" id="pro" role="tabpanel" aria-labelledby="productos" tabindex="0">
      <?php include 'Productos.php'; ?>
    </div>
    <!--PERSONAL-->
    <div class="tab-pane fade" id="emp" role="tabpanel" aria-labelledby="personal" tabindex="0">
      <?php include 'Personal.php'; ?>
    </div>
    <!--Reportes-->
    <div class="tab-pane fade" id="sol" role="tabpanel" aria-labelledby="solicitude" tabindex="0">
      <?php include 'Solicitudes.php'; ?>
    </div>
    <div class="tab-pane fade" id="ing" role="tabpanel" aria-labelledby="ingresos" tabindex="0">
      <?php include 'Ingresos.php'; ?>
    </div>
    <div class="tab-pane fade" id="pro" role="tabpanel" aria-labelledby="productos" tabindex="0">
      <?php include 'Productos.php'; ?>
    </div>
    <div class="tab-pane fade" id="cie" role="tabpanel" aria-labelledby="cierre" tabindex="0">
      <?php include 'ReporCierre.php'; ?>
    </div>
    <div class="tab-pane fade" id="mov" role="tabpanel" aria-labelledby="movimento" tabindex="0">
      <?php include 'Movimientos.php'; ?>
    </div>
      </div>
</div>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const dropdownOptions = document.querySelectorAll(".dropdown-item[data-target]");

  dropdownOptions.forEach(option => {
    option.addEventListener("click", function() {
      const targetPaneId = option.getAttribute("data-target");
      const targetPane = document.querySelector(targetPaneId);

      if (targetPane) {
        // Activate the selected tab-pane and deactivate others
        const allTabPanes = document.querySelectorAll(".tab-pane");
        allTabPanes.forEach(pane => {
          pane.classList.remove("show", "active");
        });
        targetPane.classList.add("show", "active");
      }
    });
  });
});
</script>

</body>
</html>