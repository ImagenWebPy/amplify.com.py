function cargarPantallasLed(url) {
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function ()
        {},
        success: function (data) {
            $("#divPantallasLed").html("");
            $("#divPantallasLed").html(data.contenido);
            $("#paginador").html(data.paginador);
        },
        error: function ()
        {}
    });
}

function cargarContenidoAsuncion(url) {
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function ()
        {},
        success: function (data) {
            $("#divContenidoAsuncion").html("");
            $("#divContenidoAsuncion").html(data.contenido);
            $("#paginador").html(data.paginador);
        },
        error: function ()
        {}
    });
}

function cargarContenidoGranAsuncion(url) {
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function ()
        {},
        success: function (data) {
            $("#divContenidoGranAsuncion").html("");
            $("#divContenidoGranAsuncion").html(data.contenido);
            $("#paginador").html(data.paginador);
        },
        error: function ()
        {}
    });
}
function cargarContenidoRuteros(url) {
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function ()
        {},
        success: function (data) {
            $("#divContenidoRuteros").html("");
            $("#divContenidoRuteros").html(data.contenido);
            $("#paginador").html(data.paginador);
        },
        error: function ()
        {}
    });
}
function cargarContenidoUrbanos(url) {
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function ()
        {},
        success: function (data) {
            $("#divContenidoUrbanos").html("");
            $("#divContenidoUrbanos").html(data.contenido);
            $("#paginador").html(data.paginador);
        },
        error: function ()
        {}
    });
}
function cargarIconicos(url) {
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function ()
        {},
        success: function (data) {
            $("#divIconicos").html("");
            $("#divIconicos").html(data.contenido);
            $("#paginador").html(data.paginador);
        },
        error: function ()
        {}
    });
}
function cargarBuses(url) {
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function ()
        {},
        success: function (data) {
            $("#divBuses").html("");
            $("#divBuses").html(data.contenido);
            $("#paginador").html(data.paginador);
        },
        error: function ()
        {}
    });
}
/**
 * Funcion que cera y esconde los labels de error
 * @param {array} labels
 * @returns {undefined}
 */
function resetLabels(params) {
    for (i = 0; i < params.length; i++) {
        $(params[i]).html('');
        $(params[i]).css('display', 'none');
    }
}
function visitasPaginas(url, fechaInicio, fechaFin, mostrar = 10) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptVisitasPaginas',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin, mostrar: mostrar},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#visitasPaginas').html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 20px;"></i>');
        },
        success: function (data)
        {
            $('#visitasPaginas').html(data);
        }
    });
}

function cantidadVisitasDia(url, fechaInicio, fechaFin, mostrar = 10) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptCantidadVisitasDia',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#cantidadVisitasDia').html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 20px;"></i>');
        },
        success: function (data)
        {
            $('#cantidadVisitasDia').html(data);
        }
    });
}

function usuarios(url, fechaInicio, fechaFin) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptUsuarios',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#usuarios').html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 20px;"></i>');
            $('#usuariosNuevos').html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 20px;"></i>');
            $('#sesiones').html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 20px;"></i>');
        },
        success: function (data)
        {
            $('#usuarios').html(data.usuarios);
            $('#usuariosNuevos').html(data.usuariosNuevos);
            $('#sesiones').html(data.sesiones);
        }
    });

}

function dispositivos(url, fechaInicio, fechaFin) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptDispositivos',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#dispositivos').html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 20px;"></i>');
        },
        success: function (data)
        {
            $('#dispositivos').html(data);
        }
    });
}

function paginasSesion(url, fechaInicio, fechaFin) {
    $.ajax({
        type: "POST",
        url: url + 'admin/rptPaginasSesion',
        async: true,
        data: {fechaInicio: fechaInicio, fechaFin: fechaFin},
        dataType: 'json',
        beforeSend: function () {
            // this is where we append a loading image
            $('#paginas_sesion').html('<i class="fa fa-spinner fa-spin" aria-hidden="true" style="font-size: 20px;"></i>');
        },
        success: function (data)
        {
            $('#paginas_sesion').html(data);
        }
    });
}