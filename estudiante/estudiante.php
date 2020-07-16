<?PHP

class Estudiant{
    public $id;
    public $nombre;
    public $apellido;
    public $carreraId;
    public $estadoId;
    public $materias=array();
    public $profilePhoto;


    private $utilities;


    public function __construct(){

            $this->utilities = New Utilities;
    }

    public function InicializeData($id, $nombre, $apellido, $carreraId,$estadoId,$materias){

        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->carreraId = $carreraId;
        $this->estadoId = $estadoId;
        $this->materias = $materias;


    }


    public function set($data)
{
    foreach($data as $key => $value)$this->{$key} = $value;
}

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

    


}