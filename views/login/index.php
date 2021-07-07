<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card text-center border-info mt-5">
                    <div class="card-header">
                        Iniciar sesion
                    </div>

                    <div class="card-body">
                        <?php
                        $this->showMessages();
                        ?>
                        <form action="<?php echo constant("URL"); ?>/login/authenticate" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" name="usuario" id="validationCustom01" required>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-4 col-form-label" for="nombre">Password</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="password" name="password" id="" required>
                                </div>

                            </div>
                            <p>
                                <input type="submit" class="btn btn-primary" value="Entrar">
                            </p>
                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        Si no tienes cuenta puedes registrarte <a href="<?php echo constant("URL"); ?>signup">aquí</a>
                    </div>
                </div>

            </div>
            <div class="col-3"></div>

        </div>


    </div>


    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>