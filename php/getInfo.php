<?php
/**
 * Created by PhpStorm.
 * User: alfonsocaro
 * Date: 28/06/17
 * Time: 11:36 AM
 *
 * Clase para La carga de Formulario con la informacion de un Proceso de Contratacion
 *
 * Busca el Elemento por ID gracias a la funcion findRelease de la clase Proceso y retorna el formulario
 */

require_once 'Proceso.php';
$idRelease=$_GET['releaseId'];
$proceso = new Proceso();
foreach ($proceso->findRelease($idRelease) as $proceso) {
    $datosProceso=$proceso;
}
?>
<form class="form-horizontal">
    <fieldset>
        <div class="form-group">
            <label for="entidad" class="col-lg-2 control-label">Entidad</label>
            <div class="col-lg-10">
                <p><?php echo $datosProceso["buyer"]["name"]; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="idConstancia" class="col-lg-2 control-label">Id</label>
            <div class="col-lg-10">
                <p><?php echo $datosProceso["num_constancia"]; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="titulo" class="col-lg-2 control-label">Titulo</label>
            <div class="col-lg-10">
                <p><?php echo $datosProceso["tender"]["title"]; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="clasificacion" class="col-lg-2 control-label">Valor</label>
            <div class="col-lg-10">
                <p><?php echo $datosProceso["tender"]["value"]["amount"]; ?></p>
            </div>
        </div>
        <div class="form-group">
            <label for="textArea" class="col-lg-2 control-label">Detalle</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="textArea"> <?php echo $datosProceso["tender"]["description"]; ?></textarea>
            </div>
        </div>
    </fieldset>
</form>
