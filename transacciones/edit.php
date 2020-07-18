
<?php


require_once('..\layout\layout.php');
require_once('..\helpers\utilities.php');
require_once('transacciones.php');
require_once('..\service\IServiceBase.php');
require_once('TransaccionServiceCookies.php');
require_once('../helpers\FileHandler\iFileHandler.php');
require_once('../helpers\FileHandler\JsonFileHandler.php');
require_once('../helpers\FileHandler\SerializationFileHandler.php');
require_once('../transacciones\TransaccionServiceFile.php');


$layout = new Layout(true);
$utilities = new utilities();
$service = new TransaccionServiceFile();


$datatime=$utilities->getDateTime();



if (isset($_GET['id'])) {

    $TranId = $_GET['id'];
    $element = $service->GetById($TranId);

    if (isset($_POST['monto']) && isset($_POST['descripcion'])) {

        $update = new Transaccion();

        $update->InicializeData($TranId,$datatime, $_POST['monto'], $_POST['descripcion']);

        $service->Update($TranId, $update);


        header("Location: ../index.php");
        exit();
    }
} else {
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
                    <a href="..\index.php" class="btn btn-warning">Volver atras</a>Editando al super hero</div>
            </div>


            <div class="card-body">
                <form enctype="multipart/form-data" action="edit.php?id=<?php echo $element->id; ?>" method="POST">

                    <div class="form-group">
                        <label for="name">monto</label>
                        <input type="number" class="form-control" id="monto" name="monto" value="<?php echo $element->monto; ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">Apellido</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $element->descripcion; ?>">
                    </div>


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