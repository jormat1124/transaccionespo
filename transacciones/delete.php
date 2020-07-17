<?php 





require_once('..\layout\layout.php');
require_once('..\helpers\utilities.php');
require_once('transacciones.php');
require_once('..\service\IServiceBase.php');
require_once('TransaccionServiceCookies.php');
require_once('../helpers\FileHandler\iFileHandler.php');
require_once('../helpers\FileHandler\JsonFileHandler.php');
require_once('../transacciones\TransaccionServiceFile.php');


$service = new TransaccionServiceFile();

$isContaintId =  isset($_GET['id']);

if($isContaintId){
    $tran = $_GET['id'];


    $service->delete($tran);

    header("Location: ../index.php");
    exit();

  }



?>