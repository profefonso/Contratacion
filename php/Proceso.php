<?php
/**
 * Created by PhpStorm.
 * User: alfonsocaro
 * Date: 27/06/17
 * Time: 11:45 PM
 *
 * Clase PHP para el control de datos desde los archivos JSON, decodifica y retorna Arreglos con la informacion Deseada
 */


class  Proceso
{
    private $datosEntdades, $datosRelaciones;
    public $jsonEntidades, $jsonRelaciones;

    //Constructor de la Clase que lee y decodifica la informacion JSON
    public function __construct()
    {
        $this->datosEntdades = file_get_contents("../DataBase/entity.json");
        $this->jsonEntidades = json_decode($this->datosEntdades, true);

        $this->datosRelaciones = file_get_contents("../DataBase/releases.json");
        $this->jsonRelaciones = json_decode($this->datosRelaciones, true);
    }

    //Metodo para encontrar una entidad asociada a un proceso de contratacion
    public function findEntidad($entidadName)
    {
        foreach ($this->jsonRelaciones as $key => $val) {
            if ($val['buyer']['name'] === $entidadName) {
                return true;
            }
        }
        return false;
    }

    //Metodo para encontrar las relaciones de una entidad en la data de procesos de contratacion
    public function findListReleases($entidadName)
    {
        $listReleases=array();
        foreach ($this->jsonRelaciones as $key => $val) {
            if ($val['buyer']['name'] === $entidadName) {
                $listReleases[]=$val;
            }
        }
        return $listReleases;
    }

    //Metodo para encontrar un proceso especifico en Array de JSON por Id
    public function findRelease($releaseId)
    {
        $release=array();
        foreach ($this->jsonRelaciones as $key => $val) {
            if ($val['num_constancia'] === $releaseId) {
                $release[]=$val;
            }
        }
        return $release;
    }
}

?>