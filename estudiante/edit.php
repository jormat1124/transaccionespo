<?php

require_once('..\layout\layout.php');
require_once('..\helpers\utilities.php');
require_once('estudiante.php');
require_once('..\service\IServiceBase.php');
require_once('EstudianteServiceCookies.php');

$layout = new Layout(true);
$service = new EstudianteServiceCookie();
$utilities = new Utilities();

if (isset($_GET['id'])) {

    $EstuId = $_GET['id'];
    $element = $service->GetById($EstuId);

    if (isset($_POST['nombre']) && isset($_POST['apellido'])) {

        $updateEstu = new Estudiant();

        $updateEstu->InicializeData(0, $_POST['nombre'], $_POST['apellido'], $_POST['carrera'], '1', $_POST['materias']);

        $service->Update($EstuId, $updateEstu);


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
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $element->nombre; ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $element->apellido; ?>">
                    </div>





                    <div class="form-group">
                        <label for="company">Estado</label>
                        <select class="form-control" id="estado" name="estado">
                            <?php
                            foreach ($utilities->estado as $id => $text) :  ?>

                                <?php if ($id == $element->estado) : ?>

                                    <option value="<?php echo $id; ?>"><?php echo $text; ?></option>
                                <?php else : ?>

                                    <option value="<?php echo $id; ?>"><?php echo $text; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="company">Carrera</label>
                        <select class="form-control" id="carrera" name="carrera">
                            <?php
                            foreach ($utilities->carrera as $id => $text) :  ?>

                                <?php if ($id == $element->carrera) : ?>

                                    <option value="<?php echo $id; ?>"><?php echo $text; ?></option>
                                <?php else : ?>

                                    <option value="<?php echo $id; ?>"><?php echo $text; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="company">Materias Favoritas</label>
                        <select class="form-control" id="materia" name="materia">
                            <?php
                            foreach ($utilities->carrera as $id => $text) :  ?>

                                <?php if ($id == $element->carrera) : ?>

                                    <option value="<?php echo $id; ?>"><?php echo $text; ?></option>
                                <?php else : ?>

                                    <option value="<?php echo $id; ?>"><?php echo $text; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <label for="materia">Materias Favoritas</label>
                    <?php

                $contador = 0;
                    foreach ($utilities->materia as $id => $text) :  ?>
                     
                        <?php if ($id == (isset($element->materias[$id-1]))) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="materias" name="materias[]" value="<?php echo $id; ?>" checked>
                                <label class="form-check-label"><?php echo $text;?></label>
                                

                            </div>

                        <?php else : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="materias" name="materias[]" value="<?php echo $id; ?>">
                                <label class="form-check-label"><?php echo $text; ?></label>

                            </div>

                        <?php endif; ?>

                        
                    <?php $contador++; endforeach; ?>




                    <div class="col-md-4" style="margin-top: 2%;">
                        <div class="card" style="width: 18rem;">

                            <?php if ($element->profilePhoto == "" || $element->profilePhoto == null) : ?>
                                <img class="bd-placeholder-img card-img-top" src="<?php echo "../assets/img/estudent/default.gif" ?>" width="50%" height="225" aria-label="Placeholder: Thumbnail">


                            <?php else : ?>
                                <img class="bd-placeholder-img card-img-top" src="<?php echo "../assets/img/estudent/" . $element->profilePhoto; ?>" width="50%" height="225" aria-label="Placeholder: Thumbnail">


                            <?php endif; ?>

                        </div>
                    </div>




                    <div class="card-body">
                        <div class="form-group">
                            <label for="photo">Foto de perfil</label>
                            <input type="file" class="form-control" id="photo" value="" name="profilePhoto">
                        </div>
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