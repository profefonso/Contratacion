<?php
/**
 * Created by PhpStorm.
 * User: alfonsocaro
 * Date: 27/06/17
 * Time: 5:41 PM
 *
 * Archivo PHP para la resuesta AJAX de Carga de Entidades a Lista Desplegable Select,
 *
 * Realiza Validacion de Entidades garacias al la Clase Proceso
 */

require_once 'Proceso.php';

$proceso = new Proceso();

echo "<select class='form-control entidadSel'>";

foreach ($proceso->jsonEntidades as $entidad) {
    if($proceso->findEntidad((string)$entidad["_id"]["name"]))
    {
        echo "<option value='".(string)$entidad["_id"]["name"]."'>".(string)$entidad["_id"]["name"]."</option>";
    }

}
echo "</select>";

?>