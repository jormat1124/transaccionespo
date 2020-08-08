<?PHP

class Transaccion
{
    public $id;
    public $datatime;
    public $monto;
    public $descripcion;


    private $utilities;


    public function __construct()
    {

        $this->utilities = new Utilities;
    }

    public function InicializeData($id, $datatime, $monto, $descripcion)
    {

        $this->id = $id;
        $this->datatime = $datatime;
        $this->monto = $monto;
        $this->descripcion = $descripcion;
    }

    public function set($data)
    {
        foreach ($data as $key => $value) $this->{$key} = $value;
    }
}
