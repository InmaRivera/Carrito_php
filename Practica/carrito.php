<?php
//Iniciamos sesion
session_start();
#Añadimos lista de productos que estoy comprando
//Array de artículos y precios
$ListaProducts=array(
    "Samsung Smart Tv"=>225,
    "Smart TV Xiaomi TV"=>259,
    "LG"=>330,
    "Televisor Sony"=>230,
    "Smartphone Xiaomi"=>250,
    "Iphone X"=>530,
    "Samsung s22"=>1345,
    "Galaxy A12"=>60,
    "Smart TV Sony"=>452,
    "Honor Smartphone"=>160,
    "Motorola Smartphone"=>145
  );
//con el condicional if veremos si las variables están definidas
if(isset($_POST['txtProducto']) && isset($_POST['txtPrecio']))
{
    $productos = $_POST['txtProducto'];
    $cantidad = $_POST['txtPrecio'];
    //con  esta instrucción validaremos el formulario y lo añadiremos 
    if(is_numeric($cantidad) && $cantidad > 0)
    {
        //Creamos la instrucción vacía para añadir un objeto nuevo
        if(!isset($_SESSION['objeto']))
        {
            $_SESSION['objeto']=[];
        }
        //Con la siguiente instrucción hacemos la suma para que vaya incrementando el precio del nuevo producto más el anterior
        //que ya estuviera seleccionado
        $nuevaCant = $cantidad + ($_SESSION['objeto'][$productos]??0);
        $_SESSION['objeto'][$productos]=$nuevaCant;
    }
}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        <title>Carrito compra</title>
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
	                <div class="blockcart cart-preview inactive">
                         <!--Cuando cliquemos en el botón del carrito nos manda a la cesta para ver todo lo que hemos añadido -->
                        <a class="btn btn-info" href="./carrito.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a>
					</div>
	                </div>
                    <br>
                </div>
            </nav>
        </header>
        <br>
        <hr >
           <!-- Mostramos el historial de lo que hay en el carrito -->
           <div class="card-body color">
                    <?php 
                        if(isset($_SESSION['objeto'])): 
                    ?>
                        <h3 class="card-title">El carrito contiene los siguientes productos:</h3>
                        <ul class="mb-4">
                        <?php $total = 0; ?>
                        <?php foreach($_SESSION['objeto'] as $productos => $cantidad): ?>
                            <?php    
                            $precio = $ListaProducts[$productos] * $cantidad;  
                            //Hacemos la suma del precio de todos los productos
                            $total += $precio;
                            ?>
                            <li> 
                            <!-- Mostramos la lista con los productos seleccionados pa comprar y el total -->
                            <strong><span><?php echo $productos; ?></span></strong>
                                <span><?php echo " x $cantidad"; ?><span>
                                <span><?php echo " = <b>$precio </b>€."; ?><span>
                            </li>
                        <?php endforeach ?>
                        </ul>
                        <h3><?php echo "Total de su pedido: <b>$total</b>€"; ?></h3>
                        <hr>
                          <!-- Creamos dos botones "href" para volver a la pagina principal 
                            o para continuar con la compra -->
                        <p class="color"><b>¿Qué desea hacer?</b></p>
                        <a href="inicio.php" class="btn btn-info">Seguir comprando</a>
                        <a href="pedidos.php" class="btn btn-success">Procesar pedido</a>
                    <?php else: ?>
                        <!-- Si no tenemos nada en el carrito mostramos mensaje que está vacío
                         y añadimos solo el botón de seguir comprando-->
                    <h3 class="card-title">El carrito está vacío</h3>
                    <hr>
                    <a href="inicio.php" class="btn btn-info">Seguir comprando</a>
                <?php endif ?>
            </div>  
</body>
</html>
 