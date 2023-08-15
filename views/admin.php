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
 include "../class/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<style>
  h2
  {
    margin: auto;
    text-align: center;
  }
  .select-wrapper {
  margin-right: 10px;
}
</style>
<title>Administracion</title>
</head>
<body>
<div class="container-fluid justify-content-center">
  <div class="row">
    <nav class="navbar navbar-light bg-light">
      <div class="col-1 col-lg-">
        <img src="../img/pizza.png" alt="Logo" width="60" height="48" class="d-inline-block align-text-top">
      </div>
      <div class="col-5 offset-1 d-lg-none">
      <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Menú
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" data-target="inv">Inventario</a></li>
          <li><a class="dropdown-item" data-target="pro">Productos</a></li>
          <li><a class="dropdown-item" data-target="suc">Sucursales</a></li>
          <li><a class="dropdown-item" data-target="emp">Empleados</a></li>
          <li><a class="dropdown-item" data-target="sol">Solicitudes</a></li>
          <li><a class="dropdown-item" data-target="ing">Ingresos</a></li>
          <li><a class="dropdown-item" data-target="cie">Cierres</a></li>
          <li><a class="dropdown-item" data-target="mov">Movimientos inv</a></li>
          <li><a class="dropdown-item" data-target="mer">Merma</a></li>
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
      <div class="col-5 col-lg-3 d-flex justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a type="button" class="btn btn-sm btn-primary" href="../scripts/cerrarSesion.php">
              Cerrar sesión
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>

<div class="d-lg-flex align-items-start">
  <div class="nav flex-column me-3 bg-light  d-lg-flex d-none" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active d-none" id="none" data-bs-toggle="pill" data-bs-target="#non" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false"></button>
    <button class="nav-link" id="inventario" data-bs-toggle="pill" data-bs-target="#inv" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false">Inventario</button>
    <button class="nav-link" id="productos" data-bs-toggle="pill" data-bs-target="#pro" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Productos</button>
    <button class="nav-link" id="sucursales" data-bs-toggle="pill" data-bs-target="#suc" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Sucursales</button>
    <button class="nav-link" id="personal" data-bs-toggle="pill" data-bs-target="#emp" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Personal</button>
    <button class="nav-link" id="solicitudes" data-bs-toggle="pill" data-bs-target="#sol" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Solicitudes</button>
    <button class="nav-link" id="ingresos" data-bs-toggle="pill" data-bs-target="#ing" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Ingresos</button>
    <button class="nav-link" id="cierres" data-bs-toggle="pill" data-bs-target="#cie" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Cierres</button>
    <button class="nav-link" id="movimientos" data-bs-toggle="pill" data-bs-target="#mov" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Movimientos<br> en inv</button>
    <button class="nav-link" id="merma" data-bs-toggle="pill" data-bs-target="#mer" type="button" role="tab" aria-controls="v-pills-rep" aria-selected="false">Merma</button>
  </div>
  <div class="tab-content w-100" id="v-pills-tabContent">
  <div class="tab-pane fade show active" id="non" role="tabpanel" aria-labelledby="none" tabindex="0">
    <h6 align="center">Selecciona una pestaña en la seccion de la izquierda (arriba en dispositivos moviles).</h6>
    <h6 align="center">Si ya buscaste resultados en alguna, vuelve a ella para visualizarlos.</h6>
    </div>
    <!--INVENTARIO-->
    <div class="tab-pane fade" id="inv" role="tabpanel" aria-labelledby="inventario" tabindex="0">
      <?php include 'Inventario.php'; ?>
    </div>
    <!--PRODUCTOS-->
    <div class="tab-pane fade" id="pro" role="tabpanel" aria-labelledby="productos" tabindex="0">
      <?php include 'Productos.php'; ?>
    </div>
    <!--SUCURSALES-->
    <div class="tab-pane fade" id="suc" role="tabpanel" aria-labelledby="sucursales" tabindex="0">
      <?php include 'Sucursales.php'; ?>
    </div>
    <!--PERSONAL-->
    <div class="tab-pane fade" id="emp" role="tabpanel" aria-labelledby="personal" tabindex="0">
      <?php include 'Personal.php'; ?>
    </div>
    <!--SOLICITUDES-->
    <div class="tab-pane fade" id="sol" role="tabpanel" aria-labelledby="solicitudes" tabindex="0">
      <?php include 'Solicitudes.php'; ?>
    </div>
        <!--SOLICITUDES-->
    <div class="tab-pane fade" id="ing" role="tabpanel" aria-labelledby="ingresos" tabindex="0">
      <?php include 'Ingresos.php'; ?>
    </div>
    <!--PRODUCTOS-->
    <div class="tab-pane fade" id="pro" role="tabpanel" aria-labelledby="productos" tabindex="0">
      <?php include 'Productos.php'; ?>
    </div>
    <!--CIERRES-->
    <div class="tab-pane fade" id="cie" role="tabpanel" aria-labelledby="cierres" tabindex="0">
      <?php include 'ReporCierre.php'; ?>
    </div>
    <!--MOVIMIENTOS-->
    <div class="tab-pane fade" id="mov" role="tabpanel" aria-labelledby="movimento" tabindex="0">
      <?php include 'Movimientos.php'; ?>
    </div>
    <!--MERMA-->
    <div class="tab-pane fade" id="mer" role="tabpanel" aria-labelledby="merma" tabindex="0">
      <?php include 'Merma.php'; ?>
    </div>
      </div>
</div>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
  const dropdownItems = document.querySelectorAll(".dropdown-item");
  const tabContent = document.getElementById("v-pills-tabContent");

  dropdownItems.forEach(function (item) {
    item.addEventListener("click", function (event) {
      event.preventDefault();
      const target = this.getAttribute("data-target");
      showTabContent(target);
    });
  });

  function showTabContent(target) {
    const tabs = tabContent.querySelectorAll(".tab-pane");
    tabs.forEach(function (tab) {
      tab.classList.remove("show", "active");
    });

    const selectedTab = tabContent.querySelector(`#${target}`);
    if (selectedTab) {
      selectedTab.classList.add("show", "active");
    }
  }
});

</script>
</body>
</html>