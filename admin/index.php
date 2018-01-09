<?php
include '../database.php';
session_start();


if(!isset($_SESSION['user']))
    header("Location: http://localhost/bistart/admin/login.php");
?>

<!doctype html>
<html lang="en">
<head>
    <title>Bistart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.css">
</head>

<body>

<script src="../vendor/jquery-3.2.1.min.js"></script>
<script src="../vendor/bootstrap/bootstrap.bundle.min.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href=".">Bistart</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container">
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="index.php?page=user" class="list-group-item list-group-item-action list-group-item-light">User</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Supplier</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Product Categories</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Product</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Product Details</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Product Review</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Social Media</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Transaction</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Transaction Details</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-light">Company Information</a>
                <a href="action/login.php?action=logout" class="list-group-item list-group-item-action list-group-item-light">Logout</a>
            </div>
        </div>
        <div class="col-md-9">
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
<script src="../vendor/bootstrap/bootstrap.js"></script>
</body>
</html>