function create_usuario() {
  setTimeout(() => {
    window.location.href = `./create_usuario.php?`;
  }, 100);
}

function update_usuario(id) {
  setTimeout(() => {
    window.location.href = `./update_usuario.php?id=${id}`;
  }, 100);
}

function delete_usuario(id) {
  $.ajax({
    type: "POST",
    url: "./includes/Get_usuariobyID.php",
    data: {
      id_usu: id,
    },
    async: true,
    beforeSend: function () {},
    success: function (response) {
      if (response != "noData") {
        let info = JSON.parse(response);
        $("#id_modal").val(info.id_usu);
        $("#nombre__modal").html("<strong>Nombre:</strong> " + info.nombre);
        $("#puesto__modal").html("<strong>Puesto:</strong> " + info.puesto);
        $("#ubicacion__modal").html(
          "<strong>Ubicacion:</strong> " + info.ubicacion
        );
      } else {
        let dataUsuarios = "No hay registros con ese ID";
        // console.log(dataUsuarios);
      }
    },
    error: function (error) {
      console.log(error);
    },
  });
}

function delete_usuario_modal() {
  let id_modal = $("#id_modal").val();
  //ert(id_modal);
  $.ajax({
    type: "POST",
    url: "./includes/delete_usuario_back.php",
    data: {
      id_usu: id_modal,
    },
    success: function (r) {
      if (r == 1) {
        mensaje("Se ha eliminado el usuario correctamente", "success");
        setTimeout(() => {
          $(location).attr("href", "index.php");
        }, 1000);
      } else {
        mensaje("Ocurrio un error", "danger");
      }
    },
  });
}

function mensaje(mensaje, stilo) {
  $("#mensaje").html(
    '<div class="alert alert-' +
      stilo +
      ' alert-dismissible fade show" ><button type=button class=close data-dismiss=alert>&times;</button><strong>Aviso: </strong>' +
      mensaje +
      "</div>"
  );
  setTimeout(() => {
    $("#mensaje").html("");
  }, 1500);
}

//datatable
$(document).ready(function () {

    $('#myTable').DataTable({
        "dom": 'Bfrtilp',
        "responsive": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        },
        "order": [
            [0, "asc"]
        ],
        buttons: [{
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i>',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success'
        },
        {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i>',
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-danger'
        },
    ]
    });

   
});
