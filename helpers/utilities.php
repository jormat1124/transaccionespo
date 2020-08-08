<?php

class Utilities
{
    public function GetCookieTime()
    {
        return time() + 60 * 60 * 24 * 30;
    }

    public function getLastElement($list)
    {
        $countList = count($list);
        $lastElement = $list[$countList - 1];


        return $lastElement;
    }

    
    public function searchProperty($list, $property, $value)
    {
        $filter = [];

        foreach ($list as $item) {
            if ($item->$property == $value) {
                array_push($filter, $item);
            }
        }
        return $filter;
    }

    public function getIndexElement($list, $property, $value)
    {
        $index = 0;

        foreach ($list as $key => $item) {
            if ($item->$property == $value) {
                $index = $key;
            }
        }
        return $index;
    }

    public function getDateTime(){
        //$datatime = new DateTime("today",new DateTimeZone("America/Santo_Domingo"));
        ini_set('date.timezone','America/Santo_Domingo');
        $datatime = date("Y-m-d H:i:s",time());
        return $datatime;
    }

    public function uptadatenew($data){

        $photoFile = $data;

        $typeReplace = str_replace("tmp/", "",  $photoFile['type']);

        $tmpname =   $photoFile['tmp_name'];
    
        $path = $tmpname;
       
            $path = $tmpname;
            $file = fopen($path,"r");
                $contents = fread($file,filesize($path));
                fclose($file);
              
        $listadoDecode = unserialize($contents);
        $listado = array();
        foreach ($listadoDecode as $elementDecode) {
    
            $element = new Transaccion();
            $element->set($elementDecode);
    
            array_push($listado, $element);
        }
    
        return($listado);
    }
/*
    public function uploadImage($directory, $name, $tmpFile, $type, $size)
    {

        $isSuccess = false;

        if (($type == "image/gif")
            || ($type == "image/jpeg")
            || ($type == "image/png")
            || ($type == "image/jpg")
            || ($type == "image/JPG")
            || ($type == "image/pjpeg") && ($size < 1000000)
        ) {

            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);

                if (file_exists($directory)) {

                    $this->uploadFile($directory . $name, $tmpFile);
                    $isSuccess = true;
                }
            } else {
                $this->uploadFile($directory . $name, $tmpFile);

                $isSuccess = true;
            }
        } else {
            $isSuccess = false;
        }

        return $isSuccess;
    }
    private function uploadFile($name, $tmpFile)
    {

        if (file_exists($name)) {
            unlink($name);
        }
        move_uploaded_file($tmpFile, $name);
    }
*/}


?>