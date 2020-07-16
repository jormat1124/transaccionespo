<?php

require_once('..\layout\layout.php');
require_once('..\helpers\utilities.php');
require_once('estudiante.php');
require_once('..\service\IServiceBase.php');
require_once('EstudianteServiceCookies.php');

$layout = new Layout(true);
$service = new EstudianteServiceCookie();
$utilities = new Utilities();




if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['carrera']) && isset($_FILES['profilePhoto'])) {

    $newEstu = new Estudiant();

    $newEstu->InicializeData(0, $_POST['nombre'], $_POST['apellido'], $_POST['carrera'], '1', $_POST['materias']);


    $service->Add($newEstu);


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
                    <a href="..\index.php" class="btn btn-warning">Volver atras</a>Crear nuevo super heroe</div>
            </div>


            <div class="card-body">
                <form enctype="multipart/form-data" action="add.php" method="POST">

                    <div class="form-group">
                        <label for="name">Nombre del Estudante</label>
                        <input type="text" class="form-control" id="name" name="nombre" placeholder="Nombre">
                    </div>

                    <div class="form-group">
                        <label for="name">Apellido del Estudiant</label>
                        <input type="text" class="form-control" id="city" name="apellido" placeholder="Apellido">
                    </div>

                    <div class="form-group">
                        <label for="company">Carrera</label>
                        <select class="form-control" id="carrera" name="carrera">
                            <?php
                            foreach ($utilities->carrera as $id => $text) :  ?>
                                <option value="<?php echo $id; ?>"><?php echo $text; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                  
                        <label for="company">Materias Favoritas</label>
                        <?php
                        foreach ($utilities->materia as $id => $text) :  ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="materias" name="materias[]" value="<?php echo $id; ?>">
                                <label class="form-check-label" ><?php echo $text; ?></label>

                            </div>

                        <?php endforeach; ?>
                 

<br>


              
                        <div class="form-group">
                            <label for="photo">Foto de perfil</label>
                            <input type="file" class="form-control" id="photo" value="" name="profilePhoto">
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