<?php
if(!isset($_REQUEST['id'])){
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Success - PHP Shopping Cart Tutorial</title>
    <meta charset="utf-8">
    <style>
    .container{width: 100%;padding: 50px;}
    p{color: #34a853;font-size: 18px;}
    </style>
</head>
</head>
<body>
<div class="container">
    <h1>Order Status</h1>
    <p>Your order has submitted successfully. Order ID is #<?php echo $_GET['id']; ?></p>
    <?php include"../Mail/CORREO.php"?>
    <p>Se ha enviado un correo con la confirmacion, favor de checar su correo.</p>
    
    <?php (header("refresh:3 ; ../index.php")) ?>
</div>
</body>
</html>