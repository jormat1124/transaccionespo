<?php

require_once('..\layout\layout.php');
require_once('..\helpers\utilities.php');
require_once('transacciones.php');
require_once('..\service\IServiceBase.php');
require_once('TransaccionServiceCookies.php');
require_once('../helpers\FileHandler\JsonFileHandler.php');
require_once('../helpers\FileHandler\JsonFileHandler.php');
require_once('../transacciones\TransaccionServiceFile.php');


$layout = new Layout(true);
$utilities = new utilities();
$service = new TransaccionServiceFile();


$datatime=$utilities->getDateTime();


if (isset($_POST['monto']) && isset($_POST['descripcion'])) {

    $newTran = new Transaccion();

    $newTran->InicializeData(0,$datatime, $_POST['monto'], $_POST['descripcion']);


    $service->Add($newTran);


    header("Location: ../index.php");

    exit();
}



?>


<?php $layout->printHeader(true); ?>
<main role="main">

    <div style="margin-top: 2%;" class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">

                <div class="card-header bg-dark text-light">
                    <a href="..\index.php" class="btn btn-warning">Volver atras</a>  Crear nueva transaccion</div>
            </div>


            <div class="card-body">
                <form enctype="multipart/form-data" action="add.php" method="POST">

                    <div class="form-group">
                        <label for="name">Monto</label>
                        <input type="number" class="form-control" id="monto" name="monto" placeholder="Monto">
                    </div>

                    <div class="form-group">
                        <label for="name">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
                    </div>

                    


                  
                 

<br>


              

                    <button type="submit" class="btn btn-success">Guardar</button>

                </form>
            </div>
        </div>
    </div>


    </div>
    <div class="col-md-3"></div>
    </div>



</main>
<?php $layout->printFooter(true); ?>