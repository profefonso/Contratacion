/**
 * Created by alfonsocaro on 27/06/17.
 *
 * Script Base Para el tratamiento del frontEnd Trabajo con Ajax y control de Elementos
 */
$(document).ready(function() {
    $(".selectentidad select").empty();
    $(".loadselect").css("display","block");
    loadDataMSG();
    loadDataAction();

    $("#btnConsulta").click(function () {
        loadTableAction();
    });

    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('.generapdf').click(function () {
        doc.fromHTML($('.loadInfoDetalle').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('Detalle.pdf');
    });
});

// Funcion para cargar Modal de Espera
function loadDataMSG() {
    $('#myModal').modal('show');
}

// Funcion Para Gargar lista Desplegable de Entidades Validas
function loadDataAction() {
    $.ajax({
        type: "GET",
        url: "php/getEntidades.php",
        //data: dataString,
        success: function(data) {
            //Cargamos finalmente el contenido deseado
            $('.selectentidad').fadeIn(1000).html(data);
            $(".loadselect").css("display","none");
            $('#myModal').modal('hide');
        }
    });
}

// Funcion para Cargar Tabla de Procesos asocciados a una Entidad
function loadTableAction() {
    loadDataMSG();
    var dataString=$(".entidadSel").val();
    $.ajax({
        type: "GET",
        url: "php/getTable.php",
        data: {entidadName : dataString},
        success: function(data) {
            //Cargamos finalmente el contenido deseado
            $('.tablePlace').fadeIn(1000).html(data);
            $('#myModal').modal('hide');
        }
    });
}

//Funcion para mostrar la informacion de un Proceso de Contratacion
function detalle(idRelacion) {
    loadDataMSG();
    var dataString=idRelacion;
    $.ajax({
        type: "GET",
        url: "php/getInfo.php",
        data: {releaseId : dataString},
        success: function(data) {
            //Cargamos finalmente el contenido deseado
            $('.loadInfoDetalle').fadeIn(1000).html(data);
            $('#myModal').modal('hide');
            $('#infoModal').modal('show');
        }
    });
}