<?php
// initializ shopping cart class
include 'Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Toy's Pizza</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
</head>
</head>
<body>
<div class="container">
    <h1>Carrito Toys</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Productos</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th> </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '$'.$item["price"].' MX'; ?></td>
            <td><input type="number" min=1 max=5 class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo '$'.$item["subtotal"].' MX'; ?></td>
            <td>
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Tu carrito está vacío...</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="../views/menu-pizza.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> ¡Continuar comprando!</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' MX'; ?></strong></td>
            <?php 
            if(isset($_SESSION["usuario"]))
            {
              echo "<td><a href='checkout.php' class='btn btn-success btn-block'>Confirmar pedido<i class='glyphicon glyphicon-menu-right'></i></a></td>";
            }
            else
            {
                echo"<td><a href='../index.php'>¡Primero debes registrarte y/o iniciar sesión!</a></td>";
            }
            ?>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
</body>
</html>