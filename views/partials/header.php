<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/32df401300.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>Blog</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo RUTA;?>">Blog</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

                <form class="d-flex"  action="<?php echo RUTA;?>buscar.php" method='GET'>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busqueda">
                    <button class="btn btn-outline-success icono fa fa-search" type="submit"></button>
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active fab fa-twitter" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fab fa-facebook" aria-current="page" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"> Contactar <i
                                class="fa fa-envelope"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>