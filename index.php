<?php
require_once('layout\layout.php');
require_once('helpers\utilities.php');
require_once('estudiante\estudiante.php');
require_once('service\IServiceBase.php');
require_once('estudiante\EstudianteServiceCookies.php');

$layout = new Layout(false);
$utilities = new utilities();
$service = new EstudianteServiceCookie();





$listadoEstudiante = $service->GetList();


//var_dump($listadoEstudiante);


if (!empty($listadoEstudiante)) {

  if (isset($_GET['carreraId'])) {
    $listadoEstudiante = $utilities->searchProperty($listadoEstudiante, 'carreraId', $_GET['carreraId']);
  }
}

?>

<script type="text/javascript">

function ConfirmacionDelete(){

  var repuesta = confirm("Estas seguro que deseas eliminar el estudiante?");

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


      <a href="estudiante\add.php" class="btn btn-primary ">Crear nuevo heroe</a>

    </div>



  </section>

  <div class="col-md-9"></div>
  <div class="col-md-6 my-2 text-center">

    <div class="btn-group">

      <?php

      foreach ($utilities->carrera as $id => $text) :  ?>

        <a href="index.php?carreraId=<?php echo $id; ?>" class="btn btn-dark text-light"><?php echo $text; ?></a>


      <?php endforeach; ?>



      <a href="index.php" class="btn btn-dark text-light">Todos</a>



    </div>


  </div>
  </div>

  <div class="album py-1 bg-light">
    <div class="container">
      <div class="row ">



        <?php if (empty($listadoEstudiante)) : ?>
          <h2>No hay Heroes resgistrado, registralo aqui: <a href="estudiante\add.php"></a> </h2>
        <?php else : ?>


          <div class="row">



            <?php foreach ($listadoEstudiante as $estu) : ?>
              <div class="col-md-4" style="margin-top: 2%;">
                <div class="card" style="width: 18rem;">

                  <?php if ($estu->profilePhoto == "" || $estu->profilePhoto == null) : ?>
                    <img class="bd-placeholder-img card-img-top" src="<?php echo "assets/img/estudent/default.gif" ?>" width="50%" height="250" aria-label="Placeholder: Thumbnail">


                  <?php else : ?>
                    <img class="bd-placeholder-img card-img-top" src="<?php echo "assets/img/estudent/" . $estu->profilePhoto; ?>" width="50%" height="250" aria-label="Placeholder: Thumbnail">


                  <?php endif; ?>




                  </svg>


                  <div class="card-body">
                    <h5 class="card-title">Nombre: <?php echo $estu->nombre; ?></h5>
                      <h5 class="card-text">Apellido: <?php echo $estu->apellido; ?></h5>
                        <h5 class="card-text">Estado: <?php echo $estu->getEstado(); ?></h5>
                          <h5 class="card-text">Carrera: <?php echo $estu->getCarreraName(); ?></h5>
                          <h5>Materias favoritas</h5>
                            <?php foreach ($estu->materias as $mate) {
                              echo '<h6>' . $estu->getMateriaName($mate) . '<h6/> ';
                            } ?>
                            <a href="estudiante\edit.php?id=<?php echo $estu->id; ?>"  class="btn btn-primary ">Editar</a>
                            <a href="estudiante\delete.php?id=<?php echo $estu->id; ?>" type="button" class="btn btn-danger " onclick="return confirm('Estas seguro que deseas eliminar el estudiante')">Eliminar</a>
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