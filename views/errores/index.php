<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Error</title>
</head>

<body>
    <div class="container">
        <div class="text-center mt-5">
            <h1>
                Oops!</h1>
            <h2>
                Error 404</h2>
            <div class="error-details">
                La página que buscas no se ha encontrado
            </div>
            <div class="error-actions">
                <a href="<?php echo constant("URL") ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                    Ir a inicio </a>
            </div>
        </div>

    </div>
</body>

</html>