<?php
include "database.php";
?>

<!doctype html>
<html lang="en">
<head>
    <title>Bistart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/bootstrap.css">
</head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bistart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="container">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href=".">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=".?page=product">Product</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if(isset($_GET['page'])) {
                            $page = 'pages/' . $_GET['page'] . '.php';
                            include($page);
                        } else {
                            include 'pages/home.php';
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>