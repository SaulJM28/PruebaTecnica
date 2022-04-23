$(document).ready(function() {
    //alert("hello word");
    $('#crearusuario').click(function() {
        const expresiones = {
            texto: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        }
        //var datos= $('#formulario').serialize();
        nombre = $("#nombre").val();
        puesto = $("#puesto").val();
        ubicacion = $("#ubicacion").val();

        if (nombre == "" && puesto == "" && ubicacion == "" ) {
            mensaje("los campos estan vacios", "danger");
        } else if (!expresiones.texto.test(nombre)) {
            mensaje("El campo Nombre solo se acepta caracteres", "danger");
        } else if (!expresiones.texto.test(puesto)) {
            mensaje("El campo Puesto solo se acepta caracteres", "danger");
        } else if (!expresiones.texto.test(ubicacion)) {
            mensaje("El campo Ubicacion solo se acepta caracteres", "danger");
        } else {
            $.ajax({
                type: "POST",
                url: "./includes/insert_usuario_back.php",
                data: {
                    nombre: nombre,
                    puesto: puesto,
                    ubicacion: ubicacion
                },
                success: function(r) {
                    if (r == 1) {
                        mensaje("Los datos han sido registrados con exito", "success");
                        limpiar_datos();
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