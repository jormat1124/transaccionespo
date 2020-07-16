<?PHP

class Transaccion{
    public $id;
    public $datatime;
    public $monto;
    public $descripcion;
  

    private $utilities;


    public function __construct(){

            $this->utilities = New Utilities;
    }

    public function InicializeData($id, $datatime, $monto, $descripcion){

        $this->id = $id;
        $this->datatime = $datatime;
        $this->monto = $monto;
        $this->descripcion = $descripcion;
       


    }

    public function set($data)
{
    foreach($data as $key => $value)$this->{$key} = $value;
}/* 

    function getCarreraName(){

        if($this->carreraId !=0 && $this->carreraId !=null){
            return $this->utilities->carrera[$this->carreraId];
        }


    }

    function getEstado(){

        if($this->estadoId !=0 && $this->estadoId !=null){
            return $this->utilities->estado[$this->estadoId];
        }


    }


    function getMateriaName($mate){

       
        if($mate !=0 && $mate !=null){
            return $this->utilities->materia[$mate];
        }
    }
*/
    


}