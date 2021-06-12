<?php
session_start();
require 'funciones.php';

?>
<!DOCTYPE html>
<html lang="es">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Restaurant "Rancho"</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
  </head>

  <body>
 
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="./panel/index.php"class="navbar-brand" href="index.php">Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
              <a href="carrito.php" class="btn">CARRITO<span class="badge"><?php print cantidadPlatos(); ?></span></a>
            </li> 
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    <div class="container" id="main">
    <div class="input-group">
  
  <style>
    body{
      background-image: url("./upload/cordero.jpg");
    }
    .text-centertitulo-plato{
       font-size: 20px;
       
    }
  .buscador{
   position:relative;
   left:215px;
   width: 45em;
   height: 40px;
   top:-10px;
  }
  .boton{
    position:absolute;
    left:900px;
    height: 40px;
    top:-10px;
  }
  .input-group{
    padding-bottom: 2em;
  
  }
  </style>
  
</div>
        <div class="row">
        
            <?php
              require 'vendor/autoload.php';
              $plato = new Kawschool\Plato;
              $info_platos = $plato->mostrar();
              $cantidad = count($info_platos);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_platos[$x];
            ?>
            
              <div class="col-md-3">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="text-centertitulo-plato"><?php print $item['titulo'] ?></h1>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" class="img-responsive">
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
                    <div class="panel-footer">
                        <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block">
                          <span class="glyphicon glyphicon-shopping-cart"></span> COMPRAR
                        </a>
                    </div>
                  </div>
              
              
              </div>
          <?php
                }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>




        </div>
      

    </div> 

    <!-- Bootstrap JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>
