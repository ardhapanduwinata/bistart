<?php
include '../database.php';
session_start();

if(isset($_SESSION['user'])) {
    header("Location: http://localhost/bistart/admin/index.php");
}

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

    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <script src="../vendor/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-5 m-auto ">
            <div class="card">
                <div class="card-body">
                    <form action="action/login.php?action=login" method="post" name="formLogin">
                        <div class="form-group">
                            <label for="username1">Username</label>
                            <input type="text" name="username" class="form-control" id="username1" aria-describedby="emailHelp" placeholder="Enter Username">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" name="password" class="form-control" id="password1" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Remember me
                            </label>
                        </div>
                        <input type="submit" value="login" name="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../vendor/bootstrap/bootstrap.js"></script>
</body>
</html>