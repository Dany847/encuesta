<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <div class="card text-center border-info mt-5">
                    <div class="card-header">
                        Registrar nuevo usuario
                    </div>

                    <div class="card-body">
                        <img src="public/agregar-usuario.png" class="img-thumbnail mb-3" alt="">
                        <?php
                        $this->showMessages();
                        ?>
                        <form action="<?php echo constant("URL"); ?>signup/nuevoUsuario" method="post" class="needs-validation" novalidate>


                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="nombre" id="validationCustom01" required>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="nombre">Apellidos</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="apellidos" id="" required>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="nombre">Cargo</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="cargo" id="" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="nombre">Nombre de usuario</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="usuario" id="" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="nombre">Contraseña</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="password" name="password" id="" required>
                                </div>
                            </div>

                            <p>
                                <input type="submit" class="btn btn-primary" value="Registrar">
                            </p>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Si ya tienes cuenta <a href="<?php echo constant("URL"); ?>login">Inicia sesión</a>
                    </div>
                </div>

            </div>




        </div>
        <div class="col-2"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>