<?php
require_once('layout\layout.php');
require_once('helpers\utilities.php');
require_once('transacciones\transacciones.php');
require_once('service\IServiceBase.php');
require_once('transacciones\TransaccionServiceCookies.php');

$layout = new Layout(false);
$utilities = new utilities();
$service = new TransaccionServiceCookie();





$listado = $service->GetList();


//var_dump($listadoEstudiante);



?>

<script type="text/javascript">

function ConfirmacionDelete(){

  var repuesta = confirm("Estas seguro que deseas eliminar la transaccion");

  if(respuesta == true){
    return true;
  }
  else
  {
    return false;
  }

}

</script>


<?php $layout->printHeader(); ?>



<main role="main">

  <section class="jumbotron text-center">
    <div class="container">


      <a href="transacciones\add.php" class="btn btn-primary ">Crear nueva Transaccion</a>

    </div>



  </section>

  <div class="col-md-9"></div>
  <div class="col-md-6 my-2 text-center">
  </div>
  </div>

  <div class="album py-1 bg-light">
    <div class="container">
      <div class="row ">



        <?php if (empty($listado)) : ?>
          <h2>No hay transacciones resgistrada, registralas aqui: <a href="transacciones\add.php">Añadir </a> </h2>
        <?php else : ?>


          <div class="row">



            <?php foreach ($listado as $trans) : ?>
              <div class="col-md-4" style="margin-top: 2%;">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">ID: <?php echo $trans->id; ?></h5>
                      <h5 class="card-text">fecha: <?php echo $trans->datatime; ?></h5>
                      <h5 class="card-text">fecha: <?php echo $trans->monto; ?></h5>
                      <h5 class="card-text">fecha: <?php echo $trans->descripcion; ?></h5>
                       
                            <a href="transacciones\edit.php?id=<?php echo $trans->id; ?>"  class="btn btn-primary ">Editar</a>
                            <a href="transacciones\delete.php?id=<?php echo $trans->id; ?>" type="button" class="btn btn-danger " onclick="return confirm('Estas seguro que deseas eliminar el transaccion')">Eliminar</a>
                  </div>
                </div>
              </div>


            <?php endforeach; ?>

          <?php endif; ?>



          </div>
      </div>
    </div>
  </div>


</main>
<?php $layout->printFooter(); ?>