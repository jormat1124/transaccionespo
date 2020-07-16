<?php 


require_once('..\layout\layout.php');
 require_once('..\helpers\utilities.php');  
 require_once('estudiante.php');
 require_once('..\service\IServiceBase.php');
require_once('EstudianteServiceCookies.php');

$service = new EstudianteServiceCookie();

$isContaintId =  isset($_GET['id']);

if($isContaintId){
    $heroId = $_GET['id'];


    $service->delete($heroId);

    header("Location: ../index.php");
    exit();

  }



?>