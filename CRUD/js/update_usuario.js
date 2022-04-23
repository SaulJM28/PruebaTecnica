var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var id = urlParams.get('id');

function mensaje(mensaje, stilo) {
    $("#mensaje").html('<div class="alert alert-' + stilo + ' alert-dismissible fade show" style="position:fixed;top: 20px; right:50px;"><button type=button class=close data-dismiss=alert>&times;</button><strong>Aviso: </strong>' + mensaje + '</div>');
    setTimeout(() => {
        $("#mensaje").html("");
    }, 1500);

}

function limpiar_datos() {
    $("#nombre").val("");
    $("#puesto").val("");
    $("#ubicacion").val("");
}

function Get_datos() {
    $.ajax({
        type: "POST",
        url: "./includes/Get_usuariobyID.php",
        data: {
            id_usu: id
        },
        async: true,
        beforeSend: function() {

        },
        success: function(response) {

            if (response != 'noData') {
                let info = JSON.parse(response);
                $("#nombre").val(info.nombre);
                $("#puesto").val(info.puesto);
                $("#ubicacion").val(info.ubicacion);
                //console.log(info);
            }else {
                let dataUsuarios = "No hay registros con ese ID";
               // console.log(dataUsuarios);
            }



        },
        error: function(error) {
            console.log(error);
        }
    });
}

$(document).ready(function() {
    Get_datos();
    $('#actualizar_usuario').click(function() {
        const expresiones = {
            texto: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
            numero: /^\d{1,2}$/ // 7 a 14 numeros.
        }
        //var datos= $('#formulario').serialize();
        nombre = $("#nombre").val();
        puesto = $("#puesto").val();
        ubicacion = $("#ubicacion").val();

        if (nombre == "" && puesto == "" && ubicacion == "") {
            mensaje("los campos estan vacios", "danger");
        } else if (!expresiones.texto.test(nombre)) {
            mensaje("El campo nombre solo se acepta caracteres", "danger");
        } else if (!expresiones.texto.test(puesto)) {
            mensaje("El campo Primer apellido solo se acepta caracteres", "danger");
        } else if (!expresiones.texto.test(ubicacion)) {
            mensaje("El campo Segundo apellido solo se acepta caracteres", "danger");
        } 
        else {
            $.ajax({
                type: "POST",
                url: "./includes/update_usuario_back.php",
                data: {
                    id_usu: id,
                    nombre: nombre,
                    puesto: puesto,
                    ubicacion: ubicacion,
                },
                success: function(r) {
                    if (r == 1) {
                        mensaje("Los datos se han actualizado con exito", "success");
                        //limpiar_datos();
                        setTimeout(() => {
                            $(location).attr('href', "index.php");
                        }, 1000);
                    } else {
                        mensaje("Ocurrio un error", "danger");
                    }
                }
            });
        }

    });

    $('#atras').click(function() {
        $(location).attr('href', "index.php");
    });
});