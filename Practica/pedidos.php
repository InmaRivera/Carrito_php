<?php
session_start();
// Definir las  variables  con el valor de las cookies. 
$numeroPedidos = $_COOKIE['numeroPedidos'] ?? 0;
$ultimoPedido = $_COOKIE['ultimoPedido'] ?? '';

// si el acceso a la pagina se hace por metodo post significa que se ha pulsado el boton de borrar historial
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $numeroPedidos = 0;
    $ultimoPedido = '';
    setcookie('numeroPedidos', '');
    setcookie('ultimoPedido', '');

}
// llamamos a la variable objeto
 else if (isset($_SESSION['objeto'])) 
{ 
    // Con la función "unset()" eliminamos la variable para eliminar el historial
    unset($_SESSION['objeto']); 

    // Actualizamos las cookies
    $numeroPedidos = $numeroPedidos + 1;
    $ultimoPedido = date('d/m/Y');
    setcookie('numeroPedidos', $numeroPedidos);
    setcookie('ultimoPedido', $ultimoPedido);
}
?>
<!--Código HTML-->
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <title>Cookies carrito compra</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="/assets/css/site.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <link href="./css/cart.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <!--Barra de navegación fija-->
            <nav class="navbar navbar-expand-md fixed-top" style="background-color: #c7eef5;">
                <a class="navbar-brand" href="./inicio.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="./inicio.php">Productos<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./carrito.php">Compras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./pedidos.php">Historial</a>
                        </li>
                    </ul>
                           <!-- carrito de la compra -->
	                <div class="blockcart cart-preview inactive">
                       <!--Cuando cliquemos en el botón del carrito nos manda a la cesta para ver todo lo que hemos añadido -->
                       <a class="btn btn-info" href="./carrito.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
				      </a>
					</div>
	                </div>
                    <br>
                </div>
            </nav>
        </header>
        <br>
        <hr class="featurette-divider">
<div class="card-body">
<!-- Creamos la instrucción para comprobar si las cookies no están vacías-->
<?php if (!empty($numeroPedidos) && !empty($ultimoPedido)): ?>
    <!--Y mostramos el número de pedidos realizados-->
    <h3>Historial de pedidos: 
    <br><?php echo "<b>$numeroPedidos pedido(s)</b>.";?></h3>
    <br>
    <p class="color">
        <!--Mostramos la fecha del ultimo pedido realizado-->
         <?php echo "Fecha del último pedido realizado:<b> $ultimoPedido </b>."; ?>
    </p>
    <hr>
    <!--Añadimos botones para eliminar historial pedido o seguir comprando-->
    <form method="post" action="pedidos.php">
    <p class="color"><b>¿Qué desea hacer?</b></p>
        <button type="submit" class="btn btn-danger">Eliminar pedido</button>
        <a href="inicio.php" class="btn btn-info">Seguir comprando</a>
    </form>
<?php else: ?>
    <!-- Creamos un boton con "href" para volver al inicio en caso de no tener ningún pedido.  -->
    <h3 class="card-title">Actualmente no tiene ningún pedido.</h3>
    <hr>
    <a href= "inicio.php" class="btn btn-info">Volver al inicio</a>
   
<?php endif ?>
</div>
</body>
</html>
