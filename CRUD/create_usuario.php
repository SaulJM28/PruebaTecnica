<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/normalize.css">
    <link rel="stylesheet" type="text/css" href="./css/estilos_create_usuario.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./js/create_usuario.js"></script>
</head>

<body>
    <div class="container-fluid ">
        <div class="div" id="mensaje"></div>
        <div class="row Banner__titulo_fondo">
            <div class="col col-sm-3 justify-content-center align-items-center">
                <p id="atras" class="volver"><i class="fas fa-arrow-left"></i> Volver a la tabla</p>
            </div>
            <div class="col col-sm-6 justify-content-center align-items-center">
                <p class="titulo">Crear usuario</p>
            </div>
            <div class="col col-sm-3">
            </div>
        </div>
        <form method="POST" id="formulario">
            <div class="row justify-content-center align-items-center formulario__fondo">
                <div class="col col-sm-6 inputs__fondo">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre">
                        <small id="nombre_mensaje" class="form-text text-muted">Solo se aceptan letras.</small>
                    </div>
                    <div class="form-group">
                        <label for="ap1">Puesto</label>
                        <input type="text" class="form-control" name="puesto" id="puesto" placeholder="Ingrese el puesto">
                        <small id="nombre_mensaje" class="form-text text-muted">Solo se aceptan letras.</small>
                    </div>
                    <div class="form-group">
                        <label for="ap2">Ubicacion</label>
                        <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ingrese la ubicacion">
                        <small id="nombre_mensaje" class="form-text text-muted">Solo se aceptan letras.</small>
                    </div>
                    <button type="button" class="btn btn-success float-right" id="crearusuario"><i class="fas fa-plus"></i> Agregar</button>
                </div>
            </div>
        </form>

    </div>
</body>

</html>