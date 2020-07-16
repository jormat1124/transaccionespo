<?php 

class TransaccionServiceCookie implements IServiceBase{


    private $Utilities;
    private $cookiesName;


    public function __construct()
    {
        $this->Utilities = new Utilities();
        $this->cookiesName = 'transacciones';
    }

    public function GetList()
    {
        $listado = array();

        if(isset($_COOKIE[$this->cookiesName])){

            $listadoDecode = json_decode($_COOKIE[$this->cookiesName],false);
             foreach($listadoDecode as $elementDecode){

                $element = new Transaccion();
                $element->set($elementDecode);

                array_push($listado,$element);
    

             }
           

        }else{
            setcookie($this->cookiesName,json_encode($listado),$this->Utilities->GetCookieTime(),"/");
        }
        return $listado;
    }   
    
    public function GetById($id)
    {
        $listado = $this->GetList();
        $trans = $this->Utilities->searchProperty($listado,'id',$id)[0];
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
        setcookie($this->cookiesName,json_encode($listado),$this->Utilities->GetCookieTime(),"/");
        
    }


    //Falata por editar
public function Update($id,$entity){
    
    
    //$element = $this->GetById($id);

    $listado = $this->GetList();

    $elementIndex = $this->Utilities->getIndexElement($listado,'id',$id);


    $listado[$elementIndex] = $entity;

 

    setcookie($this->cookiesName,json_encode($listado),$this->Utilities->GetCookieTime(),'/');


}

public function Delete($id){
    $listado = $this->GetList();

    $elementIndex = $this->Utilities->getIndexElement($listado,'id',$id);

    unset($listado[$elementIndex]);


    $listado= array_values($listado);
    setcookie($this->cookiesName,json_encode($listado), $this->Utilities->GetCookieTime(), "/");
}
}


?>