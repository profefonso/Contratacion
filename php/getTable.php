<?php
/**
 * Created by PhpStorm.
 * User: alfonsocaro
 * Date: 27/06/17
 * Time: 5:41 PM
 *
 * Archivo PHP para Carga de la tabla con los procesos de contratacion validados por entidad
 *
 * Utiliza la funcion findListReleases de la Clase Proceso y retorna tabla con informacion
 */

require_once 'Proceso.php';
$entidadName=$_GET['entidadName'];
echo "<h2>$entidadName</h2>";
$proceso = new Proceso();
?>
<h3>Procesos Contractuales</h3>
<table id="grid-basic" class="table table-condensed table-hover table-striped">
    <thead>
    <tr class="success">
        <th data-column-id="id" data-order="desc" data-identifier="true">Constancia No</th>
        <th data-column-id="sender">Fecha</th>
        <th data-column-id="received" data-order="desc">Valor</th>
        <th data-column-id="estado">Estado</th>
        <th data-column-id="detalle" data-formatter="link" data-sortable="false">Detalle</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($proceso->findListReleases($entidadName) as $relacion) {
        echo "<tr>";
        echo "<td>".$relacion["num_constancia"]."</td>";
        echo "<td>".$relacion["publishedDate"]."</td>";
        echo "<td>".$relacion["tender"]["value"]["amount"]."</td>";
        echo "<td>".$relacion["tender"]["status"]."</td>";
        echo "<td><a href='#' class=\"btn_detalle btn btn-info btn-sm\">Ver</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<script>
    $("#grid-basic").bootgrid({
        selection: true,
        multiSelect: true,
        formatters: {
            "link": function(column, row)
            {
                var idE='"'+row.id+'"';
                return "<a onclick='detalle("+idE+")' href=\"#\">" + column.id + ": " + row.id + "</a>";
            }
        }
    });
</script>


