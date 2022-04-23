<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style></style>
    <link rel="stylesheet" type="text/css" href="./css/normalize.css">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>



    <script src="./js/principal.js" type="text/javascript"></script>
    <script src="./js/jquery-3.2.1.min.js"></script>

    
    <!-- Links para dataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <!-- Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.53/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

</head>

<body>
    <div class="container-fluid ">
        <div class="titulo">
            <p>Usuarios</p>
        </div>
        <div class="row">
            <div class="col col-sm-12 table-responsive">
                <button class="btn btn-success float-left" onclick="create_usuario()"><i class="fas fa-plus"></i> Agregar</button>
                <br>
                <br>

                <table class="table table-hover" id="myTable">
                    <thead class="tabla__head_style">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Ubicacion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="tabla__body_style">
                        <?php
                        include("./includes/conexion.php");
                        $consulta = "select * from usuarios;";
                        $datos = mysqli_query($enlace, $consulta);
                        while ($dato = mysqli_fetch_assoc($datos)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $dato['id_usu']; ?></th>
                                <td><?php echo $dato['nombre']; ?></td>
                                <td><?php echo $dato['puesto']; ?></td>
                                <td><?php echo $dato['ubicacion']; ?></td>
                                <td>
                                    <div class="btn__grupo">
                                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#delete_usuario" onclick="delete_usuario(<?php echo $dato['id_usu']; ?>)" alt="Eliminar"><i class="fas fa-trash"></i></button>
                                        <button type="button" class="btn btn-primary" onclick="update_usuario(<?php echo $dato['id_usu']; ?>)" alt="Editar"><i class="far fa-edit"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        mysqli_close($enlace);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h3 class="modal-title" id="exampleModalLabel">¿Estas seguro de eliminar el usuario?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="id_modal">
            <p id="nombre__modal"></p>
            <p id="puesto__modal"></p>
            <p id="ubicacion__modal"></p>
            <div class="div" id="mensaje"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" onclick="delete_usuario_modal()">Eliminar Usuario</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>


