<?php 

class EstudianteServiceCookie implements IServiceBase{


    private $Utilities;
    private $cookiesName;


    public function __construct()
    {
        $this->Utilities = new Utilities();
        $this->cookiesName = 'estudiante';
    }

    public function GetList()
    {
        $listadoEstudiante = array();

        if(isset($_COOKIE[$this->cookiesName])){

            $listadoEstudianteDecode = json_decode($_COOKIE[$this->cookiesName],false);
             foreach($listadoEstudianteDecode as $elementDecode){

                $element = new Estudiant();
                $element->set($elementDecode);

                array_push($listadoEstudiante,$element);
    

             }
           

        }else{
            setcookie($this->cookiesName,json_encode($listadoEstudiante),$this->Utilities->GetCookieTime(),"/");
        }
        return $listadoEstudiante;
    }   
    
    public function GetById($id)
    {
        $listadoEstudiante = $this->GetList();
        $estu = $this->Utilities->searchProperty($listadoEstudiante,'id',$id)[0];
        return $estu;

    }


    public function Add($entity){
        $listadoEstudiante = $this->GetList();
        $estuId=1;

        if(!empty($listadoEstudiante)){
            $lastEstu = $this->Utilities->getLastElement($listadoEstudiante);
            $estuId = $lastEstu->id + 1;
            
        }

        $entity->id = $estuId;
        $entity->profilePhoto = "";

        if (isset($_FILES['profilePhoto'])) {

            $photoFile = $_FILES['profilePhoto'];

            if ($photoFile['error' == 4]) {
                $entity->profilePhoto = "";
            } else {

                

                $typeReplace = str_replace("image/", "",  $_FILES['profilePhoto']['type']);
                $type =   $photoFile['type'];
                $size =   $photoFile['size'];
                $name =  $estuId . '.' . $typeReplace;
                $tmpname =   $photoFile['tmp_name'];

                $success = $this->Utilities->uploadImage('../assets/img/estudent/', $name, $tmpname, $type, $size);

                if ($success) {
                    $entity->profilePhoto = $name;
                }
            }
        }
        array_push($listadoEstudiante,$entity);
        setcookie($this->cookiesName,json_encode($listadoEstudiante),$this->Utilities->GetCookieTime(),"/");
        
    }


    //Falata por editar
public function Update($id,$entity){
    
    
    $element = $this->GetById($id);

    $listadoEstudiante = $this->GetList();

    $elementIndex = $this->Utilities->getIndexElement($listadoEstudiante,'id',$id);

    if(isset($_FILES['profilePhoto'])){

        $photoFile = $_FILES['profilePhoto'];

        if($photoFile['error' == 4]){
            $entity->profilePhoto = $element->profilePhoto;
        }else{

        $typeReplace = str_replace("image/","", $photoFile['type']);
        $type =  $photoFile['type'];
        $size =  $photoFile['size'];
        $name =  $id . '.' . $typeReplace;
        $tmpname = $photoFile['tmp_name'];

        $success = $this->Utilities->uploadImage('../assets/img/estudent/',$name,$tmpname,$type,$size);
        if($success){
            $entity->profilePhoto = $name;
        }
    }
        


    }

    $listadoEstudiante[$elementIndex] = $entity;

    setcookie($this->cookiesName,json_encode($listadoEstudiante),$this->Utilities->GetCookieTime(),'/');

}

public function Delete($id){
    $listadoHeroes = $this->GetList();

    $elementIndex = $this->Utilities->getIndexElement($listadoHeroes,'id',$id);

    unset($listadoHeroes[$elementIndex]);


    $listadoHeroes= array_values($listadoHeroes);
    setcookie($this->cookiesName,json_encode($listadoHeroes), $this->Utilities->GetCookieTime(), "/");
}
}


?>