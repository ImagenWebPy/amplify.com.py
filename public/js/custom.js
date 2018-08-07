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