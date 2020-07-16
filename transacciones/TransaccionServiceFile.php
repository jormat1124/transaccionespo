<?php 

class TransaccionServiceFile implements IServiceBase{


    private $Utilities;
    public $filehandler;
    public $directory;
    public $filename;


    public function __construct()
    {
        $this->Utilities = new Utilities();
        $this->directory = "data";
        $this->filename = "transaciones";
        $this->filehandler = new JsonFileHandler($this->directory,$this->filename);
      
    }

    public function GetList()
    {
        $listado = array();

        if (isset($_COOKIE[$this->cookiesName])) {

            $listadoDecode = $this->filehandler->ReadFile();
            foreach ($listadoDecode as $elementDecode) {

                $element = new Transaccion();
                $element->set($elementDecode);

                array_push($listado, $element);
            }
        } else {
            $this->filehandler->SaveFile($listado);
        }
        return $listado;
    }

    public function GetById($id)
    {
        $listado = $this->GetList();
        $trans = $this->Utilities->searchProperty($listado, 'id', $id)[0];
        return $trans;
    }


    public function Add($entity){
        $listado = $this->GetList();
        $tranId=1;

        if(!empty($listado)){
            $lastTrans = $this->Utilities->getLastElement($listado);
            $tranId = $lastTrans->id + 1;
            
        }
        $entity->id = $tranId;

        array_push($listado,$entity);
        $this->filehandler->SaveFile($listado);
        
    }


    //Falata por editar
public function Update($id,$entity){
    
    
    //$element = $this->GetById($id);

    $listado = $this->GetList();

    $elementIndex = $this->Utilities->getIndexElement($listado,'id',$id);


    $listado[$elementIndex] = $entity;

 

    $this->filehandler->SaveFile($listado);


}

public function Delete($id){
    $listado = $this->GetList();

    $elementIndex = $this->Utilities->getIndexElement($listado,'id',$id);

    unset($listado[$elementIndex]);


    $listado= array_values($listado);
    $this->filehandler->SaveFile($listado);
}
}


?>