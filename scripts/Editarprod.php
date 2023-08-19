<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/boot.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="../img/pizza.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ysabeau+Office:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Tu Perfil</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">

    

    

<link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
      #img{
        height: 400px;
        width: 400px;
      }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="checkout.css" rel="stylesheet">
  </head>
  <?php
session_start();
extract($_POST);
include '../class/database.php';
$db = new Database();
$db->conectarDB();
  $consulta1 = "SELECT P.CODIGO, P.NOMBRE, P.TAMANO, P.DESCRIPCION, P.PRECIO, P.img_prod FROM PRODUCTOS P
  WHERE P.CODIGO = '$COD';";
  $tabla = $db->seleccionar($consulta1);
    foreach($tabla as $registro){}
?>
    <div class="d-flex">
        <a class="btn btn-primary" href="../views/Productos.php">Regresar</a>
        <h1 align="center" style="margin-left: 30%;">Editar Producto</h1>
    </div>

    
  <body class="bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">

      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>
  
    

<div class="container">
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last text-center">
        <h2>Cambiar imagen</h2>
      <?php
$imgchida = $registro->img_prod;
echo "<img src='$imgchida' alt='img' id = 'img' class='rounded-circle'>";
?>
 
 <!-- cambio de foto de perfil -->
 <div class="row g-3 text-center">
<form action="../scripts/Editarprod.php" method="post" enctype="multipart/form-data" >
<div class="col-sm-9 col-lg-10">
<input type="hidden" name="COD" value="<?php echo $registro->CODIGO; ?>">
              <input class="form-control" type="file" name="archivo" id="archivo">
            </div>
            
            <div class="col-sm-3 col-lg-2 ">
              <button type="submit" class="btn btn-secondary " value="Subir archivo">Cambiar imagen</button>
            </div>
            </form>
</div>

   <?php
require '../vendor/autoload.php'; // Carga el autoload del AWS SDK para PHP

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
// Verificar si se envió el formulario con un archivo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo"])) {
  $archivoTemporal = $_FILES["archivo"]["tmp_name"];
  $nombreArchivo = $_FILES["archivo"]["name"];
// Configura el cliente de Amazon S3

$credentials = [
    'key'    => 'AKIAV5QGATLUOBCH7VWK',
    'secret' => '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',
];

$s3Client = new S3Client([
    'version'     => 'latest',
    'region'      => 'us-east-1', // Cambia a tu región preferida
    'credentials' => $credentials,
]);
// Ruta de destino en S3 donde quieres guardar la imagen
$destinoEnS3 = 'imagenes/'.$nombreArchivo;

// Intenta subir la imagen a S3
try {
    $result = $s3Client->putObject([
        'Bucket' => 'toys-pizza',
        'Key'    => $destinoEnS3,
        'SourceFile' => $archivoTemporal,
    ]);

    // Si todo salió bien, la imagen se subió correctamente a S3
    extract($_POST);
    $cadena = "UPDATE PRODUCTOS SET img_prod='https://toys-pizza.s3.amazonaws.com/imagenes/$nombreArchivo' WHERE CODIGO = $registro->CODIGO;";
    $db->ejecutarsql($cadena);

} catch (S3Exception $e) {
    // En caso de error, captura la excepción y muestra un mensaje
    echo "Error al subir la imagen a Amazon S3: {$e->getMessage()}";
}
}
?>
      </div>
      <div class="col-md-7 col-lg-8">
        <h2 class="mb-3 text-center">Información del producto</h2>
        
          <div class="row g-3" style="padding: 10px;">
            <div class="col-sm-12">
             <h3> <label for="firstName" class="form-label">Nombre</label></h3>
             <h4> <label for="firstName" class="form-label"><?php echo $registro->NOMBRE;?> </label> </h4>
            </div>



            <div class="col-12">
            <h3> <label for="firstName" class="form-label">Tamaño o presentacion</label></h3>
             <h4> <label for="firstName" class="form-label d-block p-2  "><?php echo $registro->TAMANO;?> </label> </h4>
            </div>

            <div class="col-12">
            <h3> <label for="firstName" class="form-label">Descripcion del producto</label></h3>
             <h4> <label for="firstName" class="form-label d-block p-2  "><?php echo $registro->DESCRIPCION;?> </label> </h4>
            </div>

            <div class="col-12">
            <h3> <label for="firstName" class="form-label">Precio Unitario</label></h3>
             <h4> <label for="firstName" class="form-label d-block p-2  "><?php echo $registro->PRECIO;?> </label> </h4>
            </div>
              <form action="../scripts/editarproda.php" method="post">
          <input type="hidden" name="id" value="<?php echo $registro->CODIGO; ?>">
          <input type="hidden" name="nombre" value="<?php echo $registro->NOMBRE; ?>">
          <input type="hidden" name="precio" value="<?php echo $registro->PRECIO; ?>">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Editar Producto</button>
        </form>
      </div>
    </div>
  </main>
</div>
</div>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js//checkout.js"></script></body>
</html>
