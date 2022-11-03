<?php
    //Creamos el array con los productos y sus precios
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
                <a class="navbar-brand" href="#">Inicio</a>
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
                        <a class="form-inline mt-2 mt-md-0 btn btn-info" href="./carrito.php" method="POST" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg></a>
					        </div>
	              </div>
              </div>
            </nav>
        </header>
      <br>
      <!-- Añadimos hr para poder ver el botón accordation-->
    <hr>
    <!-- Añadimos los botones de accordation en el body --> 
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header color" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Televisores Smart TV y Smartphones
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
          <!--Añadimos imagen del producto y especificaciones dentro del accordation, con el código card -->
          <div class="card" style="width: 18rem;">
            <img src="./img/samsung.jpg"  class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Televisor</text></img>
            <form action="carrito.php" method="POST">
            <div class="card-body">
            <h2>Tecnología</h2>
            <p class="card-text">Elige entre nuestra diferente gama de Smart TV de la que disponemos: Samsung, Xiaomi, Sony, etc:</p>           
            <div class="form-group mx-sm-3">
            <!--Creamos el desplegable -->
            <select class="form-select" aria-label="Default select example" name="txtProducto" name="txtPrecio">
            <option selected> Productos </option>
            <?php
            //Creamos un foreach para recorrer la lista de productos indicados en el array
              foreach ($ListaProducts as $productos => $precio):
             ?>
                <option value="<?php echo $productos; ?>">
                <?php echo $productos; ?>
                <?php echo "-  $precio; €/u"?>
                </option>
                <?php endforeach ?>
                </select>
              </option>
           <br>
               <!--Indicamos la cantidad poniendo un mínimo de cero para que no se habilite números negativos a la hora de elegir cantidad de producto-->
           <p>Cantidad:<input type="number" name="txtPrecio" min="0" value="0" style="width:50px"></p>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <!-- Botón para añadir al carrito el artículo a la cesta-->
            <input class="btn btn-info" type="submit" name="btnCarrito" value="Añadir al carrito">
           </form>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>